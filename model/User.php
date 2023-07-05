<?php


namespace model;


class User extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'users';
	}

	public static function create($arr)
	{
		$instance = new static();

		$sql = "INSERT INTO `users` (`email`,`password`,`name`) VALUES (?,?,?)";
		return $instance->db->execute($sql, $arr);
	}

	public static function findByEmail($email)
	{
		$instance = new static();

		$sql = "SELECT * FROM `users` WHERE `email` = ?";
		return $instance->db->execute($sql, [$email]);
	}


}