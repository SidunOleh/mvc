<?php

class SiteController
{
	// головна сторінка
	function actionIndex()
	{
		// категорії
		$categories   = Category::getAll();
		// останні товари
		$products     = Product::getLatest(1, Product::LIMIT);
		// рекомендовані товари
		$recomm_prods = Product::getRecommended();

		require_once ROOT . '/views/index.php'; // шаблон головної сторінки
	}
}