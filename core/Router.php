<?php


class Router
{
	public static function route($url)
	{
		// Controllers
		$controller = (!empty($url[0])) ? ucwords($url[0]) : DEFAULT_CONTROLLER;
		$controllerName = $controller;
		array_shift($url);
		
		// Action
		$action = (!empty($url[0])) ? $url[0] . 'Action' : 'indexAction';
		$actionName = $action;
		array_shift($url);
		
		// Params
		$queryParams = $url;
		
		$dispatch = new $controller($controllerName, $action);
		
		if (method_exists($controller, $action))
		{
			call_user_func_array([$dispatch, $action], $queryParams);
		}
		else
		{
			die('That method does not exist in the controller "' . $controllerName . '"');
		}
	}
	
	public static function redirect($location)
	{
		if (!headers_sent())
		{
			header('Location: ' . PROOT . $location);
			exit;
		}
		else 
		{
			echo '<script type="text/javascript">';
			echo 'window.location.href="', PROOT, $location, '";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url=', $location, '"/>';
			echo '</noscript>';
			exit;
		}
	}
}