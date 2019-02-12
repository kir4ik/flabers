<?php

namespace core;
/**
 * Статический класс
 * предоставляет статические методы с ключевым словом "filter"+ название фильтра
 */
class Cleaner
{
    // дефолтный filter
    const FILTER_DEF = [
        'htmlspecialchars' => true,
        'trim' => true
    ];

    // очистка значения по фильтру
    public static function run($val, Array $filter)
    {
        if (empty($filter)) $filter = self::FILTER_DEF;
        else {
            $filter = array_merge(self::FILTER_DEF, $filter);
        }

        foreach ($filter as $name => $params) {
            if ($params === false) continue;

            $run = "self::filter". ucfirst($name); // имя статического метода фильтрации
            $val = call_user_func($run, $val, $params);
        }

        return $val;
    }

    // меняет значение по паттерну 
    public static function filterRegex($val, $params)
    {
        $pattern = $params;
        $replacement = '';

        if (is_array($params)) {
            $pattern = $params[0];
            $replacement = isset($params[1]) ? $params[1] : $replacement;
        }
        
        return preg_replace($pattern, $replacement, $val);
    }

    public static function filterHtmlspecialchars($val, $params)
    {
        return htmlspecialchars($val);
    }

    public static function filterTrim($val, $params)
    {
        return trim($val);
    }
}