<?php

namespace core;

class DBConnect
{
	private static $instance;
	private static $host = 'localhost';
	private static $dbname = 'flabers';
	private static $user = 'root';
	private static $pass = '';

	public static function getConnect()
	{
		if (self::$instance === null) {
			self::$instance = self::getPDO();
		}
		return self::$instance;
	}

	private static function getPDO()
	{
		$dsn = sprintf('%s:host=%s;dbname=%s', 'mysql', self::$host, self::$dbname);
		try {
			$db = new \PDO($dsn, self::$user, self::$pass);
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$db->exec('SET NAMES UTF8');
		} catch (\PDOException $e) {
			echo 'Подключение не удалось: ' . $e->getMessage();
		}
		
		return $db;
	}
}