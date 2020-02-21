<?php


class Router
{
	public static function route($url)
	{
		// Controllers
		$controller = (!empty($url[0])) ? ucwords($url[0]) . 'Controller' : DEFAULT_CONTROLLER . 'Controller';
		$controllerName = str_replace('Controller', '', $controller);
		array_shift($url);
		
		// Action
		$action = (!empty($url[0])) ? $url[0] . 'Action' : 'indexAction';
		$actionName = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
		array_shift($url);
		
		//acl check
		$grantAccess = self::hasAccess($controllerName, $actionName);
		
		if (!$grantAccess)
		{
			$controller = ACCESS_RESTRICTED . 'Controller';
			$controller_name = ACCESS_RESTRICTED;
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
		$acl = json_decode($aclFile, true);
		$currentUserAcls = ['Guest'];
		$grantAccess = false;
		
		if (Session::exists(CURRENT_USER_SESSION_NAME))
		{
			$currentUserAcls[] = 'LoggedIn';
			
			foreach (currentUser()->acls() as $a)
			{
				$currentUserAcls[] = $a;
			}
		}
		
		foreach ($currentUserAcls as $level)
		{
			if (array_key_exists($level, $acl) && array_key_exists($controllerName, $acl[$level]))
			{
				if (in_array($actionName, $acl[$level][$controllerName]) || in_array('*', $acl[$level][$controllerName]))
				{
					$grantAccess = true;
					
					break;
				}
			}
		}
		
		// Check for denied
		foreach ($currentUserAcls as $level)
		{
			$denied = $acl[$level]['denied'];
			
			if (!empty($denied) && array_key_exists($controllerName, $denied) && in_array($actionName, $denied[$controllerName]))
			{
				$grantAccess = false;
				
				break;
			}
		}
//		
//		dnd(get_defined_vars());
//		
		return $grantAccess;
	}
	
	public static function getMenu($menu)
	{
		$menuArray = [];
		$menuFile = file_get_contents(ROOT . DS . 'app' . DS . $menu . '.json');
		$acl = json_decode($menuFile, true);

		foreach ($acl as $key => $value)
		{
			if (is_array($value))
			{
				$sub = [];
				
				foreach ($value as $k => $v)
				{
					if ($k === 'separator' && !empty($sub))
					{
						$sub[$k] = '';
						
						continue;
					}
					else if ($finalValue = self::get_link($v))
					{
						$sub[$k] = $finalValue;
					}
				}
				
				if (!empty($sub))
				{
					$menuArray[$key] = $sub;
				}
			}
			else
			{
				if ($finalValue = self::get_link($value))
				{
					$menuArray[$key] = $finalValue;
				}
			}
		}
		
		return $menuArray;
	}
	
	private static function get_link($value)
	{
		// Check if is external link
		if (preg_match('/https?:\/\//', $value) == 1)
		{
			return $value;
		}
		else 
		{
			$urlArray = explode('/', $value);
			$controllerName = ucwords($urlArray[0]);
			$actionName = (isset($urlArray[1])) ? $urlArray[1] : '';
			
			if (self::hasAccess($controllerName, $actionName))
			{
				return PROOT . $value;
			}
			return false;
		}
	}
}