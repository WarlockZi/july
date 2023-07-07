<?php

namespace core;

class Common
{

	public static function getFileContent($file, $vars = [])
	{
		$file = self::platformSlashes($file);
		extract($vars);
		ob_start();
		require $file;
		return ob_get_clean();
	}

	public static function platformSlashes($path)
	{
		$slash = DIRECTORY_SEPARATOR;
		return str_replace('/', $slash, $path);
	}

}