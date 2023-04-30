<?php

namespace view;

use core\Common;
use core\Route;

class View
{
	protected $view;
	protected $vars;
	protected $viewPath = ROOT.'/view/';
	protected $layout;
	public function __construct(Route $route)
	{
		$this->view = ucfirst($route->controllerName).'/'.$route->action.'.php';
		$this->layout = $this->viewPath.'layout.php';
	}
	public function setVars($vars){
		$this->vars = $vars;
	}

	public function render(array $data){

		$content = Common::getFileContent($this->viewPath.$this->view, $data);
		$layout = Common::getFileContent($this->layout, compact('content'));
		exit($layout);

	}

}