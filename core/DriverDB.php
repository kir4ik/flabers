<?php

namespace core;

class DriverDB
{
    function __construct()
    {
        $this->db = DBConnect::getConnect();
    }
}