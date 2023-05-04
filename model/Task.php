<?php


namespace model;


class Task extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'tasks';
	}

	public static function all(){
		$instance = new self();
		$sql = "SELECT * FROM `tasks` ORDER BY `date` ASC";
		$res = $instance->db->query($sql,[]);
		return $res;
	}

	public static function part($page, $orderby){
		$offset = (int)$page*3-3;
		$instance = new self();
		$field = $orderby[0]?$orderby[0]:'name';
		$directions = isset($orderby[1])?$orderby[1]:'ASC';

		$sql = "SELECT * FROM tasks ORDER BY `{$field}` {$directions} LIMIT 3 OFFSET {$offset}";
		$res = $instance->db->query($sql,[]);
		return $res;
	}

}