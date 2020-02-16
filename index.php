<?php



define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));


// Load configuration and helper functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'libs' . DS . 'helpers' . DS . 'functions.php');

// Autoload classes
function autoload($className)
{
	$path1 = ROOT . DS . 'core' . DS . $className . '.php';
	$path2 = ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php';
	$path3 = ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php';
	
	if (file_exists($path1))
	{
		require_once($path1);
	}
	else if (file_exists($path2))
	{
		require_once($path2);
	}
	else if (file_exists($path3))
	{
		require_once($path3);
	}
}

spl_autoload_register('autoload');
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
//$db = DB::getInstance();

// Route the request
Router::route($url);
//phpinfo();
