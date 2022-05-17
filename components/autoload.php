<?php

// автозавантаження класів
spl_autoload_register(function($name) {
	$paths = ['/components/', '/models/'];
	
	foreach ($paths as $path)
	{
		$file = ROOT . $path . $name . '.php';
		
		if(file_exists($file))
			require_once $file;
	}
});