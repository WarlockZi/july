<?php

function autoload($class_name)
{
	$namespaces = [
		'core',
		'model',
		'view',
		'controller'
	];
	foreach ($namespaces as $namespace) {
		$path_to_file = "{$namespace}/{$class_name}.php";
		if (file_exists($path_to_file)) {
			require $path_to_file;
		}
	}
}

spl_autoload_register('autoload');

