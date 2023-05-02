<?php


namespace controller;


use model\Task;

class TaskService
{

	public static function pagination()
	{
		$tasks = Task::count();
		$count = (int)floor($tasks / 3);
		if ($tasks % 3) $count++;
		$r = (int)round($count, 0);
		return $r;
	}

}