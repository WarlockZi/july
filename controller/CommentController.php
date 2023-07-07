<?php

namespace controller;


use core\Controller;
use core\Route;
use model\Comment;

class CommentController extends Controller
{
	public function __construct(Route $route)
	{
		parent::__construct($route);
	}


	public function create()
	{
		Comment::create(array_values($_POST));
		exit(json_encode(['Запись не создана']));
	}

}