<?php

namespace install;

use core\DBConnect;

class Installer
{
    function __construct()
    {
        $this->db = DBConnect::getConnect();
        $this->dataTables = include 'tables.php';
    }

    // запускает установку необходимых компонентов
    public function run()
    {
        $this->setTables();
    }

    // создаёт таблицы из массива данных $this->dataTables
    public function setTables()
    {
        foreach($this->dataTables as $table => $fields) {
            $this->createTable($table, $this->getStr($fields));
        }
    }

    // соберает из масива строку в виде "ключ значение,ключ значение"
    private function getStr(Array $fields)
    {
        $tmp = [];
        foreach($fields as $key => $value) {
            array_push($tmp, $key ." ". $value);
        }

        return implode(',', $tmp);
    }
    
    // создаёт таблицу
    private function createTable(String $table, String $fields)
    {
        $sql = sprintf("CREATE TABLE IF NOT EXISTS `%s`(%s) ENGINE = InnoDB;", $table, $fields);
        $this->db->exec($sql);
    }
}