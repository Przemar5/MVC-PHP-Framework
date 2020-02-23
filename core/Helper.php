<?php

namespace Core;


class Helper
{
	public static function dnd($data)
	{
		self::d($data);
		die;
	}

	public static function d($data)
	{
		echo "<pre>";
		echo '<br/><span style="color:red;">Data</span><br/>';
		var_dump($data);
		echo "</pre>";
	}

	public static function currentPage()
	{
		$currentPage = $_SERVER['REQUEST_URI'];

		if ($currentPage == PROOT || $currentPage == PROOT . DS . 'home/index')
		{
			$currentPage = PROOT . DS . 'home';
		}
		
		return $currentPage;
	}

	public static function getObjectProperties($object)
	{
		return get_object_vars($object);
	}
}