<?php

namespace controller;

use core\Route;
use model\Task;

class TaskController extends Controller
{
	public function __construct(Route $route)
	{
		parent::__construct($route);
	}

	public function index()
	{
		$tasks = Task::all();

		$data = [
//			'header' => Header::make('guest', $this->di->get('auth')),
			'content' => $tasks,
		];
		$this->view->render($data);
	}

	public function edit($id)
	{
		if (!$this->di->get('auth')->authorized()) {
			\header("Location:/");
		}
		$post = json_decode($_POST['param']);

		$important = $post->check;
		$date = $post->date;
		$todo = $post->todo;
		$userId = $this->di->get('auth')->user()['id'];
		$params = [$important, $date, $todo, $userId, $id];

		$res = Task::update($params);
		exit(json_encode($res));


	}

	public function create()
	{
		$post = json_decode($_POST['param']);

		$important = $post->check;
		$date = $post->date;
		$todo = $post->todo;
		$userId = $this->di->get('auth')->user()['id'];

		$params = [$important, $date, $todo, $userId];
		$id = Task::create($params);
		if ($id) {
			exit(json_encode(['ok', $id]));
		} else {
			exit(json_encode(['Запись не создана']));
		}
	}

	public function delete($id)
	{
		$res = Task::del($id);
		if ($res) {
			exit(json_encode(['ok', 'Запись удалена']));
		} else {
			exit(json_encode(['Запись не удалена']));
		}
	}
}