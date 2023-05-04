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
		$orderby = $this->getOrderBy();
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
			'pages' => $this->pagination(),
		];

		$this->view->render($data);
	}

	protected function getOrderBy()
	{
		$cookieVal = Cookie::get('sort');
		return explode('_', $cookieVal);
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

	protected function prepareTaskValues(){
		$task = [];
		$values = [];
		if (isset($_POST['id'])) unset($_POST['id']);
		$_POST['updated'] = '';
		foreach ($_POST as $k => $v) {
			$task[$k] = strip_tags($v);
			$values[] = strip_tags($v);
		}
		return [$task, $values];
	}

	public function create()
	{
		list($task, $values) = $this->prepareTaskValues();
		$id = Task::create($values);
		$task['id'] = $id;

		$admin = Auth::getAuth();
		$task = Common::getFileContent(ROOT . '/view/Task/task.php', compact('task', 'admin'));
		if ($id) {
			$nextPage = $this->getNextPage();
			exit(json_encode(['task' => $task,'nextPage'=>$nextPage]));
		} else {
			exit(json_encode(['Запись не создана']));
		}
	}

	protected function getNextPage(){
		$tasksCount = Task::count();
		if (($tasksCount-3)%3===1){
			$number = $this->pagination();
			return Common::getFileContent(ROOT.'/view/Task/nextPage.php',compact('number'));
		}
		return '';
	}


}