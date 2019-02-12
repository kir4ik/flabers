<?php

namespace core;

class Validator
{
    const TYPE_STRING = 'string';
    const TYPE_NUMBER = 'number';

    function __construct(Array $rules)
    {
        $this->rules = $rules; // правила по которым проверять
        $this->glossary = $this->getGlossary(); // [правило => проверка]
    }

    public function run(Array $data)
    {
        $res = [
            'isSuccess' => true,
            'data' => []
        ];

        foreach($data as $nameField => $valField) {
            $resCheckField = [
                'isSuccess' => true,
                'errors' => [],
                'clean' => []
            ];

            foreach($this->rules[$nameField] as $nameRule => $valRule) {
                // очистка данных
                $resCheckField['clean'] = $this->cleanField($valField);
                
                $error = call_user_func($this->glossary[$nameRule], $resCheckField['clean'], $valRule);
                
                if ($error !== '') {
                    array_push($resCheckField['errors'], $error);
                    $resCheckField['isSuccess'] = false;
                    $res['isSuccess'] = false;
                }

                // готовый результат проверки поля
                $res['data'][$nameField] = $resCheckField;
            }
        }

        return $res;
    }

    // очистка поля от ненужных сиволов
    public static function cleanField($val)
    {
        return trim(htmlspecialchars($val));
    }

    // true => пустое поле
    public static function isEmpty($val)
    {
        return trim($val) == '';
    }

    // true => значение меньше
    public static function lt($val, $min, $type = self::TYPE_STRING)
    {
        if ($type === self::TYPE_STRING) $val = (string) $val;
        if ($type === self::TYPE_NUMBER) $val = (float) $val;

        if (is_string($val)) {
            return self::isEmpty($val) ? 0 < $min : mb_strlen($val) < $min;
        }

        return $val < $min;
    }

    // true => значение больше
    public static function gt($val, $max, $type = self::TYPE_STRING)
    {
        if ($type === self::TYPE_STRING) $val = (string) $val;
        if ($type === self::TYPE_NUMBER) $val = (float) $val;

        if (is_string($val)) {
            return self::isEmpty($val) ? 0 > $max : mb_strlen($val) > $max;
        }

        return $val > $max;
    }

    // проверка обязательного поля
    private function checkRequired($val, $rule)
    {
        if ($rule && self::isEmpty($val)) {
            return 'error: this field required!';
        }

        return '';
    }

    // проверка на длину
    private function checkLength($val, $rule)
    {
        $error = '';
        
        // определить что будет размером поля
        $type = self::TYPE_STRING;
        if (isset($rule['type'])) $type = $rule['type'];

        if ($type === self::TYPE_STRING) $template = 'кол-во символов';
        else $template = 'значение';

        // проверка размера
        if (isset($rule['min']) && self::lt($val, $rule['min'], $type)) {
            $error = sprintf('%s меньше %s', $template, $rule['min']);
        }
        elseif (isset($rule['max']) && self::gt($val, $rule['max'], $type)) {
            $error = sprintf('%s больше %s', $template, $rule['max']);
        }

        return $error;
    }

    // проверка на число
    private function checkNumber($val, $rule)
    {
        if ($rule && !is_numeric($val)) {
            return 'не число';
        }

        return '';
    }

    // проверка пропустит только алфавитные символы
    private function checkAlphabet($val, $rule)
    {
        $pattern = '/^[a-zA-ZА-Яа-я\\s]+$/iu';
        if (preg_match($pattern, $val) === 0) {
            return 'разрешены только буквы';
        }

        return '';
    }

    // проверка на email
    private function checkEmail($val, $rule)
    {
        if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            return 'не корректный E-mail';
        }

        return '';
    }

    // проверка номера телефона по формату
    public function checkPhone($var, $format)
    {

    }

    private function getGlossary()
    {
        return [
            'required' => function($var, $rule) {
                return $this->checkRequired($var, $rule);
            },
            'length' => function($var, $rule) {
                return $this->checkLength($var, $rule);
            },
            'number' => function($var, $rule) { // числовое
                return $this->checkNumber($var, $rule);
            },
            'alphabet' => function($var, $rule) { // буквенное
                return $this->checkAlphabet($var, $rule);
            },
            'email' => function($var, $rule) { 
                return $this->checkEmail($var, $rule);
            },
            'phone' => function($var, $format) { 
                return $this->checkPhone($var, $format);
            },
        ];
    }
}