<?php

namespace controller;

use core\Auth;
use core\Common;
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
		$admin = Auth::getAuth();
		$page = 1;
		$orderby = 'name';
		if (isset($_POST['page'])) {
			$page = $_POST['page'];
			$tasks = Task::part($page, $orderby);
			$tasks = Common::getFileContent(ROOT . '/view/Task/tasks.php', compact('tasks', 'admin'));
			exit($tasks);
		}
		$tasks = Task::part($page, $orderby);
		$tasks = Common::getFileContent(ROOT . '/view/Task/tasks.php', compact('tasks', 'admin'));
		$data = [
			'admin' => $admin,
			'tasks' => $tasks,
			'pages' => TaskService::pagination(),
		];

		$this->view->render($data);
	}

	public function update($id)
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
		$admin = Auth::getAuth();
		$task = [];
		$values = [];
		foreach ($_POST as $k => $v) {
			$task[$k] = strip_tags($v);
			$values[] = strip_tags($v);
		}

		$id = Task::create($values);
		$task['id']=$id;
		$task = Common::getFileContent(ROOT.'/view/Task/task.php',compact('task','admin'));
		if ($id) {
			exit(json_encode(['task'=>$task]));
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