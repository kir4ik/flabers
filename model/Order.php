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

    public function create(Array $data)
    {
        // проверка данных на корректность
        $isSuccess = $this->check($data);
        // данные не корректны
        if (!$isSuccess) return $isSuccess;
        // всё ок
        return $this->driverDB->create($this->table, $this->clean);
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