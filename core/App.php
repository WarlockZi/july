<?php

namespace core;


class App
{
	public function run()
	{
		new Auth();

//		new Seeder();

		$router = new Router();
		$route = $router->getRoute();

		try {
			$controller = '\\controller\\' . $route->controller;
			if (!class_exists($controller))
				header('Location:/post/index');
			$controller = new $controller($route);

			$action = $route->action;
			if (!method_exists($controller, $action)) {
				throw new \Exception('нет метода');
			}
			$controller->$action();
		} catch (\Exception $e) {
			exit('Ошибка');
		}

	}
}