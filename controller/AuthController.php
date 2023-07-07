<?php

namespace controller;

use core\Auth;
use core\Controller;
use model\User;

class AuthController extends Controller
{
	public function login()
	{
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$user = User::findByEmailPassword($email, $password);
			if ($user) {
				Auth::setAuth($user);
				exit(json_encode(['ok' => 1]));
			} else {
				exit(json_encode(['msg' => 'Неверные email или пароль']));
			}
		}

		$this->view->render([]);
	}

	public function logout()
	{
		Auth::logout();
		\header('Location:/post/index');
	}

	public function register()
	{
		if ($_POST) {
			if (!isset($_POST['email']) || !isset($_POST['password']))
				exit(json_encode(['error' => 'Не все данные заполнены']));

			$email = $_POST['email'];
			$password = $_POST['password'];

			$emailFound = User::findByEmail($email);
			$user = User::findByEmailPassword($email, $password);

			if (!$user && $emailFound)
				exit(json_encode(['error' => 'данный email уже зарегистрирован. ']));

			Auth::setAuth($user);
			exit(json_encode(['ok' => 1]));
		}
		$this->view->render([]);
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