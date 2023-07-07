<?php


namespace model;


class Post extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'posts';
	}

	public static function withComments($id){
		$instance = new static();
		$sql = "SELECT p.*, c.text as comment, c.date as comment_date ,u.name FROM posts as p inner join comments as c ON p.id=c.post_id inner join users  as u ON u.id=c.user_id WHERE p.id=?";
		$arr = $instance->db->query($sql,[$id]);
		return $arr;
	}



	public static function part($page){
		$offset = (int)$page*10-10;
		$instance = new self();

		$sql = "SELECT * FROM `posts` LIMIT 10 OFFSET {$offset}";
		$res = $instance->db->query($sql,[]);
		return $res;
	}

	public static function create($arr)
	{
		$instance = new static();

		$sql = "INSERT INTO `{$instance->table}` (`title`,`long_text`,`short_text`,`date`) VALUES (?,?,?,?)";
		return $instance->db->execute($sql, $arr);
	}

}