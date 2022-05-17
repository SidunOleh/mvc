<?php

class ProductController
{
	private $page_in_url = 'page-';

	// каталог
	function actionCatalog($page)
	{
		// категорії
		$categories = Category::getAll();
		// останні товари
		$products   = Product::getLatest($page);

		// пагінація
		$total      = Product::getAllCount();
		$pagination = new Pagination($total, $page, Product::LIMIT, $this->page_in_url);

		require_once ROOT . '/views/catalog.php'; // шаблон каталога
	}

	// сторінка категорій
	function actionCategory($cat_id, $page)
	{
		// категорії
		$categories = Category::getAll();
		// товари з категорії
		$cat_prods  = Product::getFromCategory($cat_id, $page);

		// пагінація
		$total      = Product::getCategoryCount($cat_id);
		$pagination = new Pagination($total, $page, Product::LIMIT, $this->page_in_url);;

		require_once ROOT . '/views/category.php'; // шаблон сторінки категорій
	}

	// сторінка товару
	function actionProduct($prod_id)
	{
		// категорії
		$categories = Category::getAll();
		// товар
		$product    = Product::getProduct($prod_id);

		require_once ROOT . '/views/product.php'; // шаблон сторінки товару
	}
}