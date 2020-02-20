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
		
		//acl check
		$grantAccess = self::hasAccess($controllerName, $actionName);
		
		if (!$grantAccess)
		{
			$controller_name = $controller = ACCESS_RESTRICTED;
			$action = 'IndexAction';
		}
		
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
	
	public static function hasAccess($controllerName, $actionName = 'index')
	{
		
		$aclFile = file_get_contents(ROOT . DS . 'app' . DS . 'acl.json');
		$acl = preg_replace('/(\n|\r|\t|\0)/', '', $aclFile);
		$test = $acl;
		$acl = json_decode(str_replace(chr(127), "", $acl), true);
		
		echo strlen($aclFile) . "<br>";
		echo json_last_error_msg();
		echo gettype($aclFile);
		echo gettype($acl);
		echo $acl . "<br>";
		
//		$test = json_decode('{"a":2}');
//		dnd($test);
		
		dnd($acl);
	}
}