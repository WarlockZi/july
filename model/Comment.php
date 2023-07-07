<?php


namespace model;


class Comment extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'comments';
	}

	public static function create($arr)
	{
		$instance = new static();
		$sql = "INSERT INTO `comments` (`text`,`user_id`,`post_id`,`date`) VALUES (?,?,?,?)";
		return $instance->db->execute($sql, $arr);
	}

}