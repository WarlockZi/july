<?php


namespace core;


use model\User;

class Auth
{

	public static function setAuth($user)
	{
		$_SESSION['user'] = $user['id'];
	}
	public static function getUser()
	{
		return User::find($_SESSION['user']);
	}

	public static function getAuth()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']) {
			return true;
		}
		return false;
	}

	public static function logout()
	{
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
	}

	public static function register()
	{
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
	}
}