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
//		$user_id = Auth::getUserId();

		$sql = "SELECT * FROM `tasks` ORDER BY `date` ASC";
//		$sql = "SELECT * FROM `tasks` WHERE `user_id`=? ORDER BY `date` ASC";
		$res = $instance->db->query($sql,[]);
		return $res;
	}

}