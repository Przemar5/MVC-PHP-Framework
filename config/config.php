<?php


define('DEBUG', true);

define('DB_TYPE', 'mysql');	// Database type
define('DB_HOST', '127.0.0.1');	// Database host *** use IP address to avoid DNS lookup
define('DB_USER', 'root');	// Database user
define('DB_PASSWORD', '');	// Database password
define('DB_NAME', 'curtis_parham_framework');	// Database name
	
define('DEFAULT_CONTROLLER', 'Home');	// If there isn't set controller
define('DEFAULT_LAYOUT', 'default');	// If no layout is set in the controller

define('SITE_TITLE', 'Przemek MVC Framework');	// This will be used if no site title is set

define('PROOT', 'http://localhost/files/Eclipse_Workspace/MVC_Framework/main/');	// Set this to '/' for a live server

define('CURRENT_USER_SESSION_NAME', 'HdctykKfb6eku23hj83gT');	// Session name for logged in user
define('REMEMBER_ME_COOKIE_NAME', 'A2h8sl4Wk19jdlDIWbbzi');	// Cookie name for logged in user 'remember me'
define('REMEMBER_ME_COOKIE_EXPIRY', 2592000);	// Time in seconds for 'remember me' cookie to live (30 days)

define('ACCESS_RESTRICTED', 'Restricted');	// Controller name for the restricted redirect