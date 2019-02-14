<?php

namespace model;

use core\Validator;

class Order extends BaseModel
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
        parent::__construct('orders');

        $this->validator->init($this->rules, $this->filter);
    }
}