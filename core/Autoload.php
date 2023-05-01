<?php
function autoload($class)
{
	$path = ROOT . "/{$class}.php";
	$path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
	if (file_exists($path)) {
		require $path;
	}
}

spl_autoload_register('autoload');