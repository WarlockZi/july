<?php


namespace core;

use model\Task;
use view\View;

abstract class Controller
{
	protected $view;

	public function __construct($route)
	{
		$this->view = new View($route);
	}

	protected function pagination()
	{
		$tasks = Task::count();
		$count = (int)floor($tasks / 3);
		if ($tasks % 3) $count++;
		return (int)round($count, 0);
	}

}