<?php

namespace controller;


use core\Auth;
use core\Common;
use core\Controller;
use core\Route;
use model\Post;

class PostController extends Controller
{
	public function __construct(Route $route)
	{
		parent::__construct($route);
	}

	public function edit(){
		$id = $this->route->id;

		$data = [
			'user'=> Auth::getUser(),
			'post' =>Post::withComments($id),
		];

		$this->view->render($data);
	}

	public function index()
	{
		$user = Auth::getUser();
		$page = 1;

		if (isset($_POST['page'])) {
			$page = $_POST['page'];
			$posts = Post::part($page);
			$posts = Common::getFileContent(ROOT . '/view/Post/posts.php', compact('posts', 'admin'));
			exit(json_encode(['html' => $posts]));
		}
		$posts = Post::part($page);
		$posts = Common::getFileContent(ROOT . '/view/Post/posts.php', compact('posts', 'admin'));
		$data = [
			'user' => $user,
			'posts' => $posts,
			'pages' => $this->pagination(),
		];

		$this->view->render($data);
	}


	protected function getNextPage(){
		$postsCount = Post::count();
		if (($postsCount-10)%10===1){
			$number = $this->pagination();
			return Common::getFileContent(ROOT.'/view/Task/nextPage.php',compact('number'));
		}
		return '';
	}

}