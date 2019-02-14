<?php

// для namespaces
function __autoload($className) {
	require_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
}

// страница не найдена завершение работы
function notFound() {
	header("HTTP/1.0 404 Not Found");
	die('404 Not Found');
}

// вернёт новую строку без подстроки  
function customSubstrDel(String $str, String $del) {
    $start = strpos($str, $del);

    if ($start === false) return $str;

    $res = substr_replace($str, '', $start, mb_strlen($del));

    return $res;
}

// если значение существует и не пустое - вернёт его, иначе default значение
function getIsExists($val, $default = '') {
    return empty($val) ? $default : $val;
}

function getAsPrice($val) {
   return number_format((float)$val, 2, '.', ' ');
}