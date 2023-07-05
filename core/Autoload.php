<?php
function autoload($class)
{
	$path = ROOT . "/{$class}.php";
	$path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
	if (file_exists($path)) {
		require $path;
	}
}

function composerAutoload(){
	require dirname(__DIR__,1).'/vendor/autoload.php';;
}

spl_autoload_register('autoload');
spl_autoload_register('composerAutoload');
