<?php

namespace install;

return [
    'orders' => [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'client_name' => 'VARCHAR(50) NOT NULL',
        'client_last_name' => 'VARCHAR(50) NOT NULL',
        'phone' => 'VARCHAR(16) NOT NULL',
        'email' => 'VARCHAR(50) NOT NULL',
        'city' => 'VARCHAR(50) NOT NULL',
        'amount' => 'DOUBLE NOT NULL',
    ],
];