<?php

class Category
{
	// всі категорії
	static function getAll()
	{
		$db = Db::getDb();

		$categories = $db->query('SELECT * FROM `categories`');

		if($categories)
			return $categories->fetch_all(MYSQLI_ASSOC);
	}
}