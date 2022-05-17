<?php 

// маршрутизатор
class Router
{
	private $routes; // маршрути

	function __construct()
	{
		$this->routes = include(ROOT . '/config/routes.php');
	}

	// рядок запиту
	private function getReqStr()
	{
		$req_str = urldecode($_SERVER['REQUEST_URI']);

		return mb_strlen($req_str) > 1 ? trim($req_str, '/') : $req_str;
	}

	// маршрутизація
	function run()
	{
		$req_str = $this->getReqStr();

		foreach ($this->routes as $pattern => $route)
		{
			if(preg_match("~$pattern~", $req_str))
			{
				// внутрішній маршрут
				$inner_route = preg_replace("~^$pattern$~", $route, $req_str);

				$segms = explode('/', $inner_route);

				$controller_name = ucfirst(array_shift($segms)) . 'Controller';
				$action_name     = 'action' . ucfirst(array_shift($segms));

				if(file_exists($controller_path = ROOT . '/controllers/' . 
					$controller_name . '.php'))
				{
					require_once $controller_path;

					$controller = new $controller_name();

					call_user_func_array([$controller, $action_name], $segms);

					return true;
				}
				else
				{
					require_once ROOT . '/views/404.php';

					return false;
				}
			}
		}

		require_once ROOT . '/views/404.php';
	}
}