<?php


namespace controller;


use model\Task;

class TaskService
{

	public static function pagination()
	{
		$tasks = Task::count();
		$count = $tasks / 3;
		if ($tasks % 3) $count++;
		$r = (int)round($count, 0);
		return $r;
	}

	public static function getTasks($page, $orderby)
	{
		return Task::part($page, $orderby);
	}


}