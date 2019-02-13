<?php

namespace model;

use core\DriverDB;
use core\Validator;

class Order
{
    private $rules = [
        'client_name' => [
            'required' => true,
            'alphabet' => true,
            'length' => ['min' => 2, 'type' => Validator::TYPE_STRING]
        ],
        'client_last_name' => [
            'required' => true,
            'alphabet' => true,
            'length' => ['min' => 2, 'type' => Validator::TYPE_STRING]
        ],
        'phone' => [
            'required' => true,
            'numeric' => true
        ],
        'email' => [
            'required' => true,
            'email' => true
        ],
        'city' => [
            'required' => true,
            'alphabet' => true
        ],
        'amount' => [
            'required' => true,
            'numeric' => true
        ]
    ];

    private $filter = [
        'phone' => [
            'regex' => '/[\-+_()\s]+/'
        ],
    ];

    function __construct()
    {
        $this->driverDB = new DriverDB();
        $this->table = 'orders';
        $this->validator = new Validator($this->rules, $this->filter);
        $this->errors = [];
        $this->clean = []; // читые данные
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
     * отдает записи
     * если критерий не задан = все записи
     *  */ 
    public function get(Array $cols = [], Array $condition = [], Array $sortBy = [], Bool $isDesc = false)
    {
        $condClean = [];
        foreach ($condition as $key => $val) {
            if (!$this->validator::isEmpty($val)) $condClean[$key] = $val;
        }

        $res = $this->driverDB->find($this->table, $condClean)
                    ->sort($sortBy, $isDesc)
                    ->get($cols);
        
        return  $res;
    }

    // пройти валидацию 
    private function check(Array $data)
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