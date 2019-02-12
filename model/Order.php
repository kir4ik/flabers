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
            'length' => ['min' => 10, 'type' => Validator::TYPE_STRING]
        ],
        'client_last_name' => [
            'required' => true,
            'alphabet' => true,
            'length' => ['min' => 10, 'type' => Validator::TYPE_STRING]
        ],
        'phone' => [
            'required' => true,
            'phone' => '+38(___) ___-__-__'
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
            'number' => true
        ]
    ];

    function __construct()
    {
        $this->driverDB = new DriverDB();
        $this->table = 'orders';
        $this->validator = new Validator($this->rules);
        $this->errors = [];
        $this->clean = []; // читые данные
    }

    public function create(Array $data)
    {
        $this->errors = []; // reset errors
        $this->clean = []; // reset clean

        $res = $this->validator->run($data);

        foreach($res['data'] as $field => $dataField) {
            // запись ошибок
            if (!$dataField['isSuccess']) {
                $this->errors[$field] = $dataField['errors'];
            }

            $this->clean[$field] = $dataField['clean'];
        }

        return $res['isSuccess'];
    }
}