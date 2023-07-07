<?php


namespace model;

use core\Connection;

class Model
{
	protected $db;
	protected $table;

	public function __construct()
	{
		if (!$this->db) {
			$this->db = new Connection();
		}
	}

	public static function all(){
		$instance = new self();
		$sql = "SELECT * FROM `{this->table}`";
		$res = $instance->db->query($sql,[]);
		return $res;
	}


	public static function login($email, $password)
	{
		$instance = new self();
		$user = $instance->exists($email, $password);

		if ($user) {
			return $user;
		}
	}

	public static function findByEmailPassword($email, $password)
	{
		$instance = new static();
		$sql = "SELECT * FROM `{$instance->table}` WHERE `email`=? AND `password`=?";
		return $instance->db->query($sql, [$email, $password])[0];
	}

	public static function create($arr)
	{
		$instance = new static();

		$table = $instance->getTable();
		$sql = "INSERT INTO `{$table}` (`post`,`name`,`email`) VALUES (?,?,?)";
		$instance->db->execute($sql, $arr);
		$id = $instance->db->lastId();
		return $id;
	}

	public static function count()
	{
		$instance = new static();
		$table = $instance->getTable();
		$sql = "SELECT COUNT(*) FROM `{$table}`";
		try {
			$count = $instance->db->query($sql, []);
			return (int)$count[0]['COUNT(*)'];
		} catch (\Exception $exception) {
			return $exception->getMessage();
		}
	}

	public function getTable()
	{
		return $this->table;
	}

	public static function find($id)
	{
		$instance = new static();

		$sql = "SELECT * FROM `{$instance->table}` WHERE `id`=?";
		try {
			return  $instance->db->query($sql, [$id])[0];
		} catch (\Exception $exception) {
			return $exception->getMessage();
		}
	}

}