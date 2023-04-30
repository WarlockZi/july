<?php


namespace controller;

use core\Route;
use view\View;

abstract class Controller
{
	protected $view;

	public function __construct(Route $route)
	{
		$controller = ucfirst($route->controllerName);
		$this->view = new View($route);
	}
}