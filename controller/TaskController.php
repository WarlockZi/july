<?php

namespace controller;


use core\Auth;
use core\Common;
use core\Controller;
use core\Cookie;
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
		$orderby = $this->getOrder();
		if (isset($_POST['page'])) {
			$page = $_POST['page'];
			$tasks = Task::part($page, $orderby);
			$tasks = Common::getFileContent(ROOT . '/view/Task/tasks.php', compact('tasks', 'admin'));
			exit(json_encode(['html' => $tasks]));
		}
		$tasks = Task::part($page, $orderby);
		$tasks = Common::getFileContent(ROOT . '/view/Task/tasks.php', compact('tasks', 'admin'));
		$data = [
			'admin' => $admin,
			'tasks' => $tasks,
			'pages' => self::pagination(),
		];

		$this->view->render($data);
	}

	protected function getOrder()
	{
		$c = Cookie::get('sort');
		return explode('_', $c);
	}

	public function update()
	{
		$admin = Auth::getAuth();
		$task = $_POST;

		$values = [];
		$id = $task['id'];
		unset($task['id']);
		foreach ($task as $k => $v) {
			$set[] = "`$k`=?";
			$values[] = strip_tags($v);
		}
		array_push($set, "`updated`=?");
		$set = implode(',', $set);
		array_push($values, 'обновлено');
		array_push($values, $id);

		Task::update($values, $set);
		$task['id'] = $id;
		$task['updated'] = 'обновлено';
		$taskHtml = Common::getFileContent(ROOT . '/view/Task/task.php', compact('task', 'admin'));
		exit(json_encode(['taskHtml' => $taskHtml]));

	}


	public function create()
	{
		$admin = Auth::getAuth();
		$task = [];
		$values = [];
		if (isset($_POST['id'])) unset($_POST['id']);
		$_POST['updated'] = '';
		foreach ($_POST as $k => $v) {
			$task[$k] = strip_tags($v);
			$values[] = strip_tags($v);
		}

		$id = Task::create($values);
		$task['id'] = $id;
		$task = Common::getFileContent(ROOT . '/view/Task/task.php', compact('task', 'admin'));
		if ($id) {
			exit(json_encode(['task' => $task]));
		} else {
			exit(json_encode(['Запись не создана']));
		}
	}

	public function delete()
	{
		$res = Task::del($_POST['id']);
		if ($res) {
			exit(json_encode(['ok', 'Запись удалена']));
		} else {
			exit(json_encode(['Запись не удалена']));
		}
	}

	public function sort()
	{
		$coockie = Cookie::get('sort');
		$cooc = $_COOKIE;

		if (!isset($_POST['sort'])) return false;


		if (trim()) {
			exit(json_encode(['ok', 'Запись удалена']));
		} else {
			exit(json_encode(['Запись не удалена']));
		}
	}

	public static function pagination()
	{
		$tasks = Task::count();
		$count = (int)floor($tasks / 3);
		if ($tasks % 3) $count++;
		$r = (int)round($count, 0);
		return $r;
	}


}