<?php


namespace core;


class Seeder
{
	protected $faker;
	public function __construct()
	{
		$this->faker = \Faker\Factory::create();

		$this->fillPosts(2);
//		$this->fillComments(2);
//		$this->fillUsers(2);
	}

	public function fillPosts($count){
		for ($i = 0; $i<=$count; $i++){
			$p[] = $this->faker->title();
			$p[] = $this->faker->text(15);
			$p[] = $this->faker->paragraphs(2, true);
			$p[] = $this->faker->date();
			\model\Post::create($p);
		}
	}

	public  function fillComments($count){
		for ($i = 0; $i<=$count; $i++){
			$p[] = $this->faker->title();
			$p[] = $this->faker->text();
			$p[] = $this->faker->date();
			$p[] = $this->faker->number();
			\model\Post::create($p);
		}
	}
	public  function fillUsers($count){
		for ($i = 0; $i<=$count; $i++){
			$u[] = $this->faker->email();
			$u[] = $this->faker->password();
			\model\User::create($u);
		}
	}
}