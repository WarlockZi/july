<?php
namespace core;

class Connection
{
	private $dbh;

	public $settings = [
		'prefix' => 'mysql',
		'host' => 'localhost',
		'port' => '3306',
//		'dbname' => 'vvoronk1_1',
		'dbname' => 'test_interview',
		'charset' => 'utf8',
		'user' => 'root',
		'password' => 'root',
	];

	public function __construct()
	{
		$this->connect();
	}

	protected function connect(){
		$dsn = "{$this->settings['prefix']}:host={$this->settings['host']};port={$this->settings['port']};dbname={$this->settings['dbname']};charset={$this->settings['charset']}";

		$options = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
		];

		try {
			$this->dbh = new \PDO($dsn, $this->settings['user'], $this->settings['password'], $options);
		} catch (\PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}
	}


	public function execute($sql, $params)
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($params);
		return $res;
	}
	public function lastId()
	{
		return $this->dbh->lastInsertId();
	}

	public function query($sql, $params)
	{
		$smt = $this->dbh->prepare($sql);
		$result = $smt->execute($params);
		$result = $smt->fetchAll(\PDO::FETCH_ASSOC);

		return $result ? $result : [];
	}

}