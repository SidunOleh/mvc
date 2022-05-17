<?php

// підключення до бд
class Db {
	public static function getDb()
	{
		$params = include(ROOT . '/config/db.php');

		return new mysqli($params['hostname'], $params['username'],
			$params['password'], $params['database']);
	}
}