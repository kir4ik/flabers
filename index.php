<?php

function __autoload($className) {
	require_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
}

session_start();

/**
 * Установка таблиц для корректной работы
 * */
use install\Installer;
$installer = new Installer();
$installer->run();

$uri = explode('/', $_GET['uri']);

switch($uri[0]) {
	case 'order':
		$controller = new \controller\Order();
		break;

	default:
		notFound();
}

switch($uri[1]) {
	case 'create':
		$action = 'Create';
		break;
	case 'list':
		$action = 'List';
		break;

	default:
		notFound();
}
$action = sprintf('action%s', $action);

echo '<pre>';
// test convertor
use externalAPI\Convertor;
$test = Convertor::exec(1, 'UAH', 'USD');

echo number_format($test, 2, '.', ' ');
//end test convertor

use core\DriverDB;
$driver = new DriverDB();
$driver->find('orders');
var_dump($driver->st_getSum('amount'));
var_dump($driver->st_get(['id', 'amount']));
echo '</pre>';

$controller->$action();
$controller->render();

// helper
function notFound() {
	header("HTTP/1.0 404 Not Found");
	die('404 Not Found');
}