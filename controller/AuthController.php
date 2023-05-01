<?php

namespace controller;


use core\Auth;
use model\User;

class AuthController extends Controller
{
	public function login()
	{
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			$password = $_POST['password'];

      $user = User::findByNamePassword($name, $password);
			if ($user) {
				Auth::setAuth();
				exit(json_encode(['ok'=>1]));
			}else{
				exit(json_encode(['Неверные email или пароль']));
			}
		}

		$this->view->render([]);
	}


	public function logout()
	{
		Auth::logout();
		\header('Location:/task/index');
	}

	protected function validateEmailPassword(string $email, string $password)
	{
		$validator = new Validate();
		$validator->setMinLength(6)->setNumbers();
		$errors = $validator->password($password);
		if ($errors) {
			exit(json_encode($errors));
		}
	}
}