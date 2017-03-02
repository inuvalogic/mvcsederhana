<?php

namespace Mvc\core;

use \PDO;

class Database
{
	public static $pdo;

	public function init()
	{
		$hostname = 'localhost';
		$dbname = 'latihan';
		$username = 'root';
		$password = '';

		try {
			self::$pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password, array(
				PDO::ATTR_PERSISTENT => true
			));
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e){
			throw new \Exception("Ga bisa connect ke database");
		}
	}
}
