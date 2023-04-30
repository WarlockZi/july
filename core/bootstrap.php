<?php

define('ROOT',$_SERVER['DOCUMENT_ROOT']);

function autoload($class_name)
{
		$path_to_file = "{$class_name}.php";
		if (file_exists($path_to_file)) {
			require $path_to_file;
		}
}

spl_autoload_register('autoload');

