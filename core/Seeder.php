<?php


namespace core;


class Seeder
{
	protected $faker;

	public function __construct()
	{
		$this->faker = \Faker\Factory::create();

//		$this->fillPosts(20);
//		$this->fillComments(20);
//		$this->fillUsers(2);
	}

	public function fillPosts($count)
	{
		for ($i = 0; $i <= $count; $i++) {
			$p = [];
			$p[] = $this->faker->text(15);//title
			$p[] = $this->faker->text(150);//long_text
			$p[] = $this->faker->text(35);//short_text
			$p[] = $this->faker->date();
			\model\Post::create($p);
		}
	}


	public function fillComments($count)
	{
		for ($i = 0; $i <= $count; $i++) {
			$p = [];
			$p[] = $this->faker->text(55);//text
			$p[] = $this->faker->numberBetween(35, 50);//user_id
			$p[] = $this->faker->numberBetween(219, 239);//post_id
			$p[] = $this->faker->date();
			\model\Comment::create($p);
		}
	}


	public function fillUsers($count)
	{
		\model\User::create([0 => 'vvoronik@yandex.ru', 1 => 'faf3', 2 => 'Виталий']);
		for ($i = 0; $i <= $count; $i++) {
			$u = [];
			$u[] = $this->faker->email();
			$u[] = $this->faker->password();
			$u[] = $this->faker->firstName();
			\model\User::create($u);
		}
	}
}