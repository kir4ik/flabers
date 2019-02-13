<?php

namespace core;

// API для работы с БД
class DriverDB
{
    // для форматирования строк в маски
    const AFTER = 'AFTER';
    const BEFORE = 'BEFORE';
    const INSERT_CLONE_BEFORE = 'INSERT_CLONE_BEFORE';

    // сортировка
    const SORT_DESC = 'DESC';
    const SORT_ASC = 'ASC';
    
    function __construct()
    {
        $this->db = DBConnect::getConnect();
        $this->statement = null; // последний предопределённый запрос
        $this->lastMask = []; // последние использованные значения для замены масок
    }

    // создаёт новую запись
    public function create(String $table, Array $data)
    {
        $sep = ','; // разделитель
        $maskOpts = [self::BEFORE => ':']; // опции форматирования для получения маски 

        $keys = self::getStrKeys($data, $sep); // названия тбличных данных
        $mask = self::getStrKeys($data, $sep, $maskOpts); // маска для значений

        $sql = sprintf('INSERT INTO `%s`(%s) VALUES (%s)', $table, $keys, $mask);
        $st = $this->db->prepare($sql);

        return $st->execute(self::getArrClaim($data, $maskOpts));
    }

    /**
     * подготовка запроса с условием
     * определяет statement
     * вернёт $this
     *  */
    public function find(String $table, Array $cond = [])
    {
        $sql = sprintf('SELECT * FROM `%s`', $table);

        if (!empty($cond)) {
            $maskOpts = [self::BEFORE => '=:', self::INSERT_CLONE_BEFORE => true]; // => key=:key
            $mask = self::getStrKeys($cond, " AND ", $maskOpts); // => key=:key AND key=:key
            
            $sql .= sprintf(' WHERE %s', $mask);
        }
        $this->lastMask = self::getArrClaim($cond, [self::BEFORE => ':']);
        $this->statement = $this->db->prepare($sql);

        return $this;
    }

    /**
     * устанавливает сортировку в подготовленный запрос
     * работает если определён statement
     *  */ 
    public function sort(Array $cols = [], Bool $isDesc = false)
    {
        if (empty($cols)) return $this; // ничего не делать

        // метод сортировки
        $method = " ". self::SORT_DESC;
        if (!$isDesc) $method = " ". self::SORT_ASC;

        $strSortCols = implode($method.',', $cols) . $method;
        $sql = sprintf('%s ORDER BY %s', $this->statement->queryString, $strSortCols);

        $this->statement = $this->db->prepare($sql);

        return $this;
    }

    /**
     * отправляет подготовленный запрос с выбором полей если указаны
     * возвращает результат запроса (выборки)
     * работает если определён statement
     *  */ 
    public function get(Array $cols = [])
    {
        if (!empty($cols)) {
            $sql = $this->statement->queryString;
            $strCols = implode(',', $cols);
            $sql = substr_replace($sql,  $strCols, strpos($sql, '*'), 1);
            
            $this->statement = $this->db->prepare($sql);
        }
        $this->statement->execute($this->lastMask);
        
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    // форматирует строку в соответствии с опциями
    private static function formatStr(String $str, Array $opts)
    {
        $res = $str;

        if (isset($opts[self::BEFORE])) {
            $res = $opts[self::BEFORE] . $res;
        }
        if (isset($opts[self::AFTER])) {
            $res .= $opts[self::AFTER];
        }
        if ($opts[self::INSERT_CLONE_BEFORE]) {
            $res = $str . $res;
        }

        return $res;
    }

    // вернёт строку ключей, разделёны serarator, форматированный по opts
    private static function getStrKeys(Array $data, String $serarator = ',', Array $opts = [])
    {
        $res = '';
        $keys = array_keys($data);

        foreach($keys as $key) {
            // изменения выходного кдюча
            $key = self::formatStr($key, $opts);
            $res .= $key . $serarator;
        }

        // для удаления serarator с конца
        $pattern = '/'. $serarator . '$/';

        return preg_replace($pattern, '', $res); 
    }

    // заменяет ключ на маску, вернёт изменённый масив
    private static function getArrClaim(Array $data, Array $opts)
    {
        $res = [];

        foreach($data as $key => $val) {
            // изменения выходного кдюча
            $key = self::formatStr($key, $opts);
            $res[$key] = $val;
        }

        return $res; 
    }
}