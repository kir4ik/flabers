<?php

namespace externalAPI;

/**
 * Конвертор для валют - статический класс
 */
class Convertor
{
    private static $res = null; // ответ стороннего сервера (json)

    const API_CCY = 'ccy'; // код валюты
    const API_BASE_CCY = 'base_ccy'; // национальная валюта
    const API_BUY = 'buy'; // покупка валюты
    const API_SALE = 'sale'; // продажа валюты

    // получение данных с другого сервера 
    public static function getRes()
    {
        if (!self::$res) {
            self::setAPI();
        }

        return self::$res;
    }

    /**
     * конвертирует значение из одной валюты в другую
     * 
     * вернёт новое значение в случае успеха
     * иначе false
     *  */ 
    public static function exec($val, String $from, String $to)
    {
        $valutes = json_decode(self::getRes(), true); // доступные валюты

        // поиск нужного курса валюты для конвертации
        foreach($valutes as $valute) {
            // взять курс продажи @from и умножить на значение
            if  ($valute[self::API_CCY] === $from && $valute[self::API_BASE_CCY] === $to) {
                $price = $valute[self::API_SALE];
                
                return (float) $val * (float) $price;
            }
            // взять курс покупки @to - значение разделить на @to
            elseif ($valute[self::API_CCY] === $to && $valute[self::API_BASE_CCY] === $from) {
                $price = $valute[self::API_BUY];
                
                return (float) $val / (float) $price;
            }
        }

        return false;
    }

    /**
     * запрашивает данные у стороннего сервера
     * и запоминает ответ в формате json
     */
    private static function setAPI()
    {
        $ch = curl_init('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        self::$res = curl_exec($ch);
        curl_close($ch);
    }
}