<?php

namespace externalAPI;

class Convertor
{
    private static $res = null;

    const API_CCY = 'ccy';
    const API_BASE_CCY = 'base_ccy';
    const API_BUY = 'buy';
    const API_SALE = 'sale';

    public static function init()
    {
        if ($res == null) {
            self::setAPI();
        }
    }

    public static function exec($value, String $from, String $to)
    {
        $valutes = json_decode(self::$res, true);

        foreach($valutes as $valute) {
            if  ($valute[self::API_CCY] === $from && $valute[self::API_BASE_CCY] === $to) {
                $price = $valute[self::API_SALE];
                
                return $value * $price;
            }
            elseif ($valute[self::API_CCY] === $to && $valute[self::API_BASE_CCY] === $from) {
                $price = $valute[self::API_BUY];
                
                return $value / $price;
            }
        }

        return $value;
    }

    private static function setAPI()
    {
        $ch = curl_init('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        self::$res = curl_exec($ch);
        curl_close($ch);
    }
}