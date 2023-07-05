<?php


namespace model;


class Comment extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'comments';
	}

//	public static function all(){
//		$instance = new self();
//		$sql = "SELECT * FROM `posts`";
//		$res = $instance->db->query($sql,[]);
//		return $res;
//	}

	public static function part($page){
		$offset = (int)$page*3-3;
		$instance = new self();

		$sql = "SELECT * FROM `posts` LIMIT 3 OFFSET {$offset}";
		$res = $instance->db->query($sql,[]);
		return $res;
	}

	public static function create($arr)
	{
		$instance = new static();

		$sql = "INSERT INTO `{$instance->table}` (`text`,`user_id`,`post_id`,`date`) VALUES (?,?,?,?)";
		return $instance->db->execute($sql, $arr);
	}

}