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

define('CURRENT_USER_SESSION_NAME', 'Hd";_c5%yX>\PGzb[`&[Z+?u5N8X&.Bpm4)Dykm3vaBz8)[C{ULgB#s:cgT');	// Session name for logged in user
define('REMEMBER_ME_COOKIE_NAME', 'A2&w`:F.^w"+mu\=DB3b8{C?9X*A,q$vF[VF*R?C/NHb}DP%-965s5x`*Kjy');	// Cookie name for logged in user 'remember me'
define('REMEMBER_ME_COOKIE_EXPIRY', 604800);	// Time in seconds for 'remember me' cookie to live (30 days)

