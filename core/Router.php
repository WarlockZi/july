<?php


class Router
{
	private $route;
	private $patterns = [];
	private $url;

	public function __construct()
	{
		$this->url = $_SERVER['REQUEST_URI'];
		$this->patterns = require __DIR__ . '/routes.php';
		$this->parse();
	}


	public function parse(){
		foreach ($this->patterns as $pattern => $r) {
			if (preg_match("#$pattern#i", $this->url, $matches)) {

				foreach ($matches as $k => $v) {
					if (is_numeric($k)) {
						unset($matches[$k]);
					}
				}
				$matches = array_merge($matches, $r);
				foreach ($matches as $k => $v) {
//					$route->$k = strtolower($v);
				}
//				self::$route = $route;
			}
		}
//		return $route;

	}
}