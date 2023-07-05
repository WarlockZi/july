<?php

use core\App;

session_start();
define('ROOT',$_SERVER['DOCUMENT_ROOT']);

try {
	require __DIR__ . '/core/Autoload.php';

	$loader = require 'vendor/autoload.php';
//	$loader->add('AppName', __DIR__.'/../src/');

	$app = new App();
	$app->run();

} catch (\Exception $e) {
	$message = $e->getMessage();
	exit($message);
}