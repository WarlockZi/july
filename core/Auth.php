<?php


namespace core;


class Auth
{

	public static function setAuth()
	{
		$_SESSION['admin'] = 1;
	}

	public static function getAuth()
	{
		if (isset($_SESSION['admin']) && $_SESSION['admin']) {
			return true;
		}
		return false;
	}

	public static function logout()
	{
		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}
	}

}