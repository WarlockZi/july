<?php


namespace core;

use model\Task;
use view\View;

abstract class Controller
{
	protected $view;

	public function __construct($route)
	{
		$controller = ucfirst($route->controllerName);
		$this->view = new View($route);
	}

	public static function pagination()
	{
		$tasks = Task::count();
		$count = (int)floor($tasks / 3);
		if ($tasks % 3) $count++;
		$r = (int)round($count, 0);
		return $r;
	}
}