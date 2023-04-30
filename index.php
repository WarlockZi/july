<?php

use core\App;

session_start();

try {
	require __DIR__ . '/core/bootstrap.php';
	$app = new App();
	$app->run();

} catch (\Exception $e) {
	$mess = $e->getMessage();
	exit($mess);
}