<?php


namespace model;


class User extends Model
{
//	private $table = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->table = 'users';
	}




}