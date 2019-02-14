<?php

namespace model;

use core\DriverDB;
use core\Validator;

Abstract class BaseModel
{
    const DEFAULT_COMPARE = '='; // дефолтный знак сравнения для выражений
    
    protected static $compares = [
        '{lt}' => '<',
        '{gt}' => '>',
        '{eq}' => '=',
    ];
    
    function __construct(String $table)
    {
        $this->driverDB = new DriverDB();
        $this->validator = new Validator();
        $this->table = $table;
        $this->errors = [];
        $this->clean = []; // читые данные
        $this->lastQuery = null; // результат последнего запроса
    }

    // если прошли валидацию создаст новую запись
    public function create(Array $data)
    {
        // проверка данных на корректность
        $isSuccess = $this->check($data);
        // данные не корректны
        if (!$isSuccess) return $isSuccess;
        // всё ок
        return $this->driverDB->create($this->table, $this->clean);
    }

    /**
     * можно указывать какие поля вернуть и по каким полям сортировать
     * 
     * вернёт результат последнего запроса
     * если запроса не было - false
     *  */ 
    public function get(Array $cols = [], Array $sortBy = [], Bool $isDesc = false)
    {
        if (!$this->lastQuery) {
            return false;
        }

        $res = $this->lastQuery->st_sort($sortBy, $isDesc)->st_get($cols);
        
        return  $res;
    }

    // вернёт сумму значений из последнего запроса для указанного столбца
    public function getSum(String $col)
    {
        return $this->lastQuery->st_getSum($col);
    }

    // вернёт кол-во найденых записей для последнего запроса
    public function getCount()
    {
        return $this->lastQuery->st_getCount($col);
    }

    // поиск по условию
    public function find(Array $condition = [])
    {
        $condClean = [];
        foreach ($condition as $key => $val) {
            // данных нет - отправлять это поле не нужно
            if ($this->validator::isEmpty($val)) continue;

            $compare = self::DEFAULT_COMPARE; // знак сравнения
            $ComparisonPattern = $this->getComparisonPattern($val); // обычный массив из шаблона и значения для замены знака сравнения
            
            if (!empty($ComparisonPattern)) {
                $val = customSubstrDel($val, $ComparisonPattern[0]); // удалить шаблон из строки
                $compare = $ComparisonPattern[1];
            }

            $condClean[$key][$compare] = $val; // валидный массив с условием для поиска
        }

        $this->lastQuery = $this->driverDB->find($this->table, $condClean);

        return $this;
    }

    /**
     * вернёт массив из 2-х элементов
     * заменяемое выражение и его значение замены
     * если ничего не найдёт - false
     *   */
    protected function getComparisonPattern(String $val)
    {
        $res = [];
        
        foreach(self::$compares as $template => $signCompare) {
            if (strpos($val, $template) === false) continue;
            
            $res = [$template, $signCompare];
            break;
        }

        return $res;
    }

    // пройти валидацию 
    protected function check(Array $data)
    {
        $this->errors = []; // reset errors
        $this->clean = []; // reset clean

        $res = $this->validator->run($data);

        foreach($res['data'] as $field => $dataField) {
            // запись ошибок
            if (!$dataField['isSuccess']) {
                $this->errors[$field] = $dataField['errors'];
            }
            // запись чистых данных
            $this->clean[$field] = $dataField['clean'];
        }

        return $res['isSuccess'];
    }
}