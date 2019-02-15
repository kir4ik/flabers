<?php

include 'functions.php';

session_start();

/**
 * Установка таблиц для корректной работы
 * */
// use install\Installer;
// $installer = new Installer();
// $installer->run();

$uri = explode('/', $_GET['uri']);

switch($uri[0]) {
	case 'order':
		$controller = 'Order';
		break;

	default:
		notFound();
}
if (isset($_REQUEST['r_type']) && $_REQUEST['r_type'] === 'json') {
	$controller .= 'JSON';
}
$controller = sprintf('controller\%s', $controller);
$controller = new $controller();

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

$controller->$action();
$controller->render();