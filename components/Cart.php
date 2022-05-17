<?php

// кошик
class Cart
{
	 // добавлення в кошик
	 static function add($prod_id, $count=1)
	 {
	 	$prod_id = (int) $prod_id;
	 	$count   = (int) $count;

	 	$_SESSION['cart'][$prod_id] += $count;
	 }

	 // видалення з кошика
	 static function remove($prod_id)
	 {
	 	unset($_SESSION['cart'][$prod_id]);
	 }

	 // оновлення кошика
	 static function upgrade($cart)
	 {
	 	foreach ($cart as $prod_id => $count)
	 	{
	 		$prod_id = (int) $prod_id;
	 		$count   = (int) $count;

	 		if($count == 0)
	 			unset($_SESSION['cart'][$prod_id]);
	 		else
	 			$_SESSION['cart'][(int) $prod_id] = (int) $count;
	 	}
	 }

	 // товари в кошику
	 static function getProdsList()
	 {
	 	$db = Db::getDb();

	 	// кошик порожній
	 	if(empty($_SESSION['cart'])) return [];

		// товари
	 	$prod_ids   = implode(',', array_keys($_SESSION['cart']));
	 	$cart_prods = $db->query("SELECT prod_id, prod_name, prod_code, prod_img, price 
	 		FROM `products` WHERE prod_id IN (${prod_ids})");

	 	// товари відсутні
	 	if(!$cart_prods) return [];
	 	
	 	$cart_prods = $cart_prods->fetch_all(MYSQLI_ASSOC);
	 
	 	// к-сть товарів
	 	foreach ($cart_prods as $key => $value)
	 	{
	 		$prod_id = $cart_prods[$key]['prod_id'];
	 		$cart_prods[$key]['count'] = $_SESSION['cart'][$prod_id];
	 	}

	 	return $cart_prods;
	 }
}