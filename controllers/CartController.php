<?php

class CartController
{
	// сторінка кошику
	function actionCart()
	{
		$products = Cart::getProdsList();

		require_once ROOT . '/views/cart.php';
	}

	// добавлення в кошик
	function actionAdd($prod_id)
	{
		if(isset($_POST['submit']))
		{
			Cart::add($prod_id, $_POST['count']);

			header('Location: '. $_SERVER['HTTP_REFERER'] . '');
		}

		Cart::add($prod_id, 1);

		header('Location: '. $_SERVER['HTTP_REFERER'] . '');
	}

	// видалення з кошика
	function actionRemove($prod_id)
	{
		Cart::remove($prod_id);

		header('Location: '. $_SERVER['HTTP_REFERER'] . '');
	}

	// оновлення кошика
	function actionUpgrade()
	{
		if(isset($_POST['submit']))
			Cart::upgrade($_POST);

		header('Location: '. $_SERVER['HTTP_REFERER'] . '');
	}
}