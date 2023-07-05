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
		$count = (int)floor($posts / 3);
		if ($posts % 3) $count++;
		return (int)round($count, 0);
	}

}