<?php

namespace core;

class Route
{
	private $admin = false;
	private $controller;
	private $controllerName;
	private $action;
	private $method;
	private $id;
	private $pattern;
	private $url;

	public function __construct()
	{
		$this->url = trim($_SERVER['REQUEST_URI'],'?');
		$this->method = $_SERVER['REQUEST_METHOD'];
	}

	public function __set($name, $val)
	{
		if (property_exists($this, $name)) {
			$this->$name = $val;
		}
	}

	public function __get($name)
	{
		if (property_exists($this, $name)){
			return $this->$name;
		}
		return false;
	}
}