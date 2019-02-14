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

$controller->$action();
$controller->render();