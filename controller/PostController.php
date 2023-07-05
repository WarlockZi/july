<?php

namespace controller;


use core\Auth;
use core\Common;
use core\Controller;
use core\Cookie;
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

	public function update()
	{
		$admin = Auth::getAuth();
		$post = $_POST;

		$values = [];
		$id = $post['id'];
		unset($post['id']);
		foreach ($post as $k => $v) {
			$set[] = "`$k`=?";
			$values[] = strip_tags($v);
		}
		array_push($set, "`updated`=?");
		$set = implode(',', $set);
		array_push($values, 'обновлено');
		array_push($values, $id);

		Post::update($values, $set);
		$post['id'] = $id;
		$post['updated'] = 'обновлено';
		$postHtml = Common::getFileContent(ROOT . '/view/Task/task.php', compact('task', 'admin'));
		exit(json_encode(['taskHtml' => $postHtml]));
	}

	public function create()
	{
	  if (!Cookie::get('admin')) exit(json_encode(['auth'=>'Авторизуйтесь']));

	  list($post, $values) = $this->prepareTaskValues();
		$id = Post::create($values);
		$post['id'] = $id;

		$admin = Auth::getAuth();
		$post = Common::getFileContent(ROOT . '/view/Task/task.php', compact('task', 'admin'));
		if ($id) {
			$nextPage = $this->getNextPage();
			exit(json_encode(['task' => $post,'nextPage'=>$nextPage]));
		} else {
			exit(json_encode(['Запись не создана']));
		}
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