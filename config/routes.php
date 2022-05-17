<?php

// маршрути
return [    
	'cart/upgrade'         => 'cart/upgrade',
	'cart/remove/([0-9]+)' => 'cart/remove/$1',
	'cart/add/([0-9]+)'    => 'cart/add/$1',
	'cart'                 => 'cart/cart',

	'catalog/page-([0-9]+)'=> 'product/catalog/$1',
	'catalog'              => 'product/catalog/1',

	'category/([0-9]+)/page-([0-9]+)' => 'product/category/$1/$2',
	'category/([0-9]+)'               => 'product/category/$1/1',

	'product/([0-9]+)'  => 'product/product/$1',

	'admin'  => 'user/user',
	'user'   => 'user/user',

	'login'  => 'user/login',
	'logout' => 'user/logout',

	'/' => 'site/index',
];