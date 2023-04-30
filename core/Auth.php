<?php


namespace core;


class Auth
{
	protected $id;

	public function __construct()
	{
		if (isset($_SESSION['id']) && $_SESSION['id']){
			$this->id = $_SESSION['id'];
		}
	}


}