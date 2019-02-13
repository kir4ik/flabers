<?php

namespace core;

// API для работы с БД
class DriverDB
{
    const AFTER = 'after';
    const BEFORE = 'before';

    function __construct()
    {
        $this->db = DBConnect::getConnect();
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
     * отдает записи
     * если критерий не задан = все записи
     *  */ 
    public function select(String $table, Array $opts = [])
    {
        // подготовка запроса
        $sql = sprintf('SELECT * FROM `%s`', $table);
        $st = $this->db->prepare($sql);

        if (empty($opts)) {
            $st->execute();
            return $st->fetchAll();
        }
    }

    // форматирует строку в соответствии с опциями
    public static function formatStr(String $str, Array $opts)
    {
        if (isset($opts[self::BEFORE])) {
            $str = $opts[self::BEFORE] . $str;
        }
        if (isset($opts[self::AFTER])) {
            $str .= $opts[self::AFTER];
        }

        return $str;
    }

    // вернёт строку ключей, разделёны serarator, форматированный по opts
    public static function getStrKeys(Array $data, String $serarator = ',', Array $opts = [])
    {
        $res = '';
        
        foreach($data as $key => $val) {
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