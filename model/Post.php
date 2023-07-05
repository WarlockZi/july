<?php


namespace model;


class Post extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'posts';
	}

	public static function all(){
		$instance = new self();
		$sql = "SELECT * FROM `posts`";
		$res = $instance->db->query($sql,[]);
		return $res;
	}

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

		$table = $instance->getTable();
		$sql = "INSERT INTO `{$table}` (`title`,`long_text`,`short_text`,`date`) VALUES (?,?,?,?)";
		return $instance->db->execute($sql, $arr);
	}

}