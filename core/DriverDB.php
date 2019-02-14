<?php

namespace core;

/**
 * API для работы с БД
 * методы для работы которых нужен statement идут с префиксом "st_"
 * statement может быть утановлен методом find
 * после этого могут быть вызваны методы для детализации данных
 *  */ 
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
        $this->lastBunch = []; // последний использованный массив соответствий маски и значения
        $this->currentCols = '*'; // default значение для результирующих столбцов (вернутся в ответе все)
    }

    // создаёт новую запись
    public function create(String $table, Array $data)
    {
        $sep = ','; // разделитель
        $maskOpts = [self::BEFORE => ':']; // опции форматирования для получения маски 

        $keys = $this->getStrKeys($data, $sep); // названия тбличных данных
        $mask = $this->getStrKeys($data, $sep, $maskOpts); // маска для значений

        $sql = sprintf('INSERT INTO `%s`(%s) VALUES (%s)', $table, $keys, $mask);
        $st = $this->db->prepare($sql);

        return $st->execute($this->getArrBunch($data, $maskOpts));
    }

    /**
     * подготовка запроса с условием
     * определяет statement
     * $cond должен быть в формате -> [ col => [ compare => val ] ]
     *
     *  вернёт $this
     *  */
    public function find(String $table, Array $cond = [])
    {
        $sql = sprintf('SELECT %s FROM `%s`', $this->currentCols, $table);

        if (empty($cond)) {
            $this->lastBunch = $cond;
            $this->statement = $this->db->prepare($sql);

            return $this;
        }

        $mask = $this->getMaskCompare($cond, $this->lastBunch);
        $sql .= sprintf(' WHERE %s', $mask);

        $this->statement = $this->db->prepare($sql);

        return $this;
    }

    /**
     * устанавливает сортировку в подготовленный запрос
     * работает если определён statement
     *  */ 
    public function st_sort(Array $cols = [], Bool $isDesc = false)
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
    public function st_get(Array $cols = [])
    {
        // замена значения маки для столбцов
        if (!empty($cols)) {
            $sql = $this->statement->queryString;
            $strCols = implode(',', $cols); // новое значение столбцов
            
            $this->st_setCols($strCols); // обновление столбцов в запросе
        }

        $this->statement->execute($this->lastBunch);
        
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    // вернёт сумму значений переданного столбца из соответстующей выборки
    public function st_getSum(String $col)
    {
        $this->st_setCols("SUM($col)");
        $this->statement->execute($this->lastBunch);
        
        return $this->statement->fetch(\PDO::FETCH_NUM)[0];
    }

    // вернёт сумму значений переданного столбца из соответстующей выборки
    public function st_getCount()
    {
        $this->st_setCols("COUNT(*)");
        $this->statement->execute($this->lastBunch);
        
        return $this->statement->fetch(\PDO::FETCH_NUM)[0];
    }

    // установит новое значение столбцов и обновит statement
    private function st_setCols(String $cols)
    {
        $sql = $this->statement->queryString;
        $posStart = strpos($sql, $this->currentCols);
        $len = mb_strlen($this->currentCols);

        $sql = substr_replace($sql,  $cols, $posStart, $len); // замена старого значения
        $this->currentCols = $cols; // запомнить текущее значение

        $this->statement = $this->db->prepare($sql); // обновить statement
    }

    // 
    /**
     * формат для обрабатываемого значения [key => [compare => val]]
     * в $ArrBunchCompare запишет массив соответствий в виде -> [:key => val]
     * вернёт строку для маски на условие WHERE -> 'key compare :key'
     *  */ 
    private function getMaskCompare(Array $arr, &$arrBunchCompare = [])
    {
        $res = '';
        $separator = ' AND ';
        $arrBunchCompare = []; // reset

        foreach($arr as $col => $args) {
            foreach($args as $compare => $val) {
                $mask = ':' . $col;
                $res .= $col . $compare . $mask . $separator;
                
                $arrBunchCompare[$mask] = $val;
            }
        }

        $pattern = '/'. $separator . '$/';
        $res = preg_replace($pattern, '', $res);

        return $res;
    }

    // форматирует строку в соответствии с опциями
    private function formatStr(String $str, Array $opts)
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

    // вернёт строку ключей, разделёны separator, форматированный по opts
    private function getStrKeys(Array $data, String $separator = ',', Array $opts = [])
    {
        $res = '';
        $keys = array_keys($data);

        foreach($keys as $key) {
            // изменения выходного кдюча
            $key = $this->formatStr($key, $opts);
            $res .= $key . $separator;
        }

        // для удаления separator с конца
        $pattern = '/'. $separator . '$/';

        return preg_replace($pattern, '', $res); 
    }

    // заменяет ключ на маску, вернёт изменённый масив
    private function getArrBunch(Array $data, Array $opts)
    {
        $res = [];

        foreach($data as $key => $val) {
            // изменения выходного кдюча
            $key = $this->formatStr($key, $opts);
            $res[$key] = $val;
        }

        return $res; 
    }
}