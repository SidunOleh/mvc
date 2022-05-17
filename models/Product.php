<?php

// товар
class Product
{
	const LIMIT = 6; // к-сть товарів на сторінці

	// к-сть всіх товарів
	static function getAllCount()
	{
		$db = Db::getDb();

		$all_count = $db->query("SELECT COUNT(prod_id) as count FROM `products`")->fetch_assoc();

		return $all_count['count'];
	}

	// к-сть товарів в категорії
	static function getCategoryCount($cat_id)
	{
		$db = Db::getDb();

		$cat_count = $db ->query("SELECT COUNT(prod_category) as count FROM `products`
			WHERE prod_category = ${cat_id}")->fetch_assoc();

		return $cat_count['count'];
	}

	// останні товари
	static function getLatest($page)
	{
		$db = Db::getDb();

		$offset = ($page - 1) * self::LIMIT; // зміщення

		$late_prods = $db->query("SELECT prod_id, prod_name, price, prod_img, prod_condition
			FROM `products` ORDER BY prod_id DESC LIMIT ". self::LIMIT ." OFFSET ${offset}");

		if($late_prods)
			return $late_prods->fetch_all(MYSQLI_ASSOC);
	}

	// товари з категорії
	static function getFromCategory($cat_id, $page)
	{
		$db = Db::getDb();

		$offset = ($page - 1) * self::LIMIT; // зміщення

		$cat_prods = $db->query("SELECT prod_id, prod_name, price, prod_img, prod_condition
			FROM `products` WHERE prod_category=${cat_id} LIMIT ". self::LIMIT ." OFFSET ${offset}");

		if($cat_prods)
			return $cat_prods->fetch_all(MYSQLI_ASSOC);
	}

	// рекомендовані товари
	static function getRecommended($limit=false)
	{
		$db = Db::getDb();

		$recomm_prods = $db->query("SELECT prod_id, prod_name, price, prod_img, prod_condition 
			FROM `products` WHERE is_recommended = 1 ". ($limit ? ('LIMIT ' . $limit) : '') ."");

		if($recomm_prods)
			return $recomm_prods->fetch_all(MYSQLI_ASSOC);
	}

	// товар
	static function getProduct($prod_id)
	{
		$db = Db::getDb();

		$product = $db->query("SELECT * FROM `products` WHERE prod_id=${prod_id}");

		return $product->fetch_assoc();
	}
}