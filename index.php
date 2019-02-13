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

// test convertor
use externalAPI\Convertor;
Convertor::init();
$test = Convertor::exec(10000, 'UAH', 'USD');

echo number_format($test, 2, '.', ' ');
//end test convertor

$controller->$action();
$controller->render();

// helper
function notFound() {
	header("HTTP/1.0 404 Not Found");
	die('404 Not Found');
}