<?php


namespace core;

use model\Post;
use view\View;

abstract class Controller
{
	protected $view;
	protected $route;

	public function __construct($route)
	{
		$this->route = $route;
		$this->view = new View($route);
	}

	protected function pagination()
	{
		$posts = Post::count();
		$count = (int)floor($posts / 10);
		if ($posts % 10) $count++;
		return (int)round($count, 0);
	}

}