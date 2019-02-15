<?php

namespace core;

class Validator
{
    const TYPE_STRING = 'string';
    const TYPE_NUMBER = 'number';

    function __construct(Array $rules = [], Array $filter = [])
    {
        $this->rules = $rules; // правила по которым проверять
        $this->filter = $filter; // хранит настройки для фильтрации полей
        $this->glossary = $this->getGlossary(); // [правило => проверка]
    }

    /**
     * Установка правил и фильтра
     */
    public function init(Array $rules, Array $filter = [])
    {
        $this->rules = $rules;
        $this->filter = $filter;
    }

    public function run(Array $data)
    {
        $res = [
            'isSuccess' => true,
            'data' => []
        ];

        foreach($data as $nameField => $valField) {
            // настройка фильтра для поля
            $filter = isset($this->filter[$nameField]) ? $this->filter[$nameField] : [];
            // шаблон результата проверки поля
            $resCheckField = [
                'isSuccess' => true,
                'errors' => [],
                'clean' => Cleaner::run($valField, $filter)
            ];

            foreach($this->rules[$nameField] as $nameRule => $valRule) {
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
            return 'обязательное поле';
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
    private function checkNumeric($val, $rule)
    {
        if ($rule && !is_numeric($val)) {
            return 'не число';
        }

        return '';
    }

    // проверка пропустит только алфавитные символы и пробелы
    private function checkAlphabet($val, $rule)
    {
        $pattern = '/^([a-zA-ZА-Яа-я]+\s*)+$/iu';
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

    private function getGlossary()
    {
        return [
            'required' => function($var, $rule) {
                return $this->checkRequired($var, $rule);
            },
            'length' => function($var, $rule) {
                return $this->checkLength($var, $rule);
            },
            'numeric' => function($var, $rule) { // числовое
                return $this->checkNumeric($var, $rule);
            },
            'alphabet' => function($var, $rule) { // буквенное
                return $this->checkAlphabet($var, $rule);
            },
            'email' => function($var, $rule) {
                return $this->checkEmail($var, $rule);
            }
        ];
    }
}