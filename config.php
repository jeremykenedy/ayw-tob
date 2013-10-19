<?php

// Globals
define('SERVER', $_SERVER[SERVER_NAME]);
define('MAPI_KEY', 'aI31bITjdl90x');
define('MAPI_URL', 'www.allyourweb.net/monitaur/api');
// Server Specific
switch(SERVER){
	
	case 'www.allyourweb.net':
		define('DEV', false);
		define('ROOT_NODE', "/tob/");
		define('MYSQL_HOST',"ayw-web.allyourweb.net");
		define('MYSQL_USER',"tob_user");
		define('MYSQL_PASS', "tob_web");
		define('MYSQL_DB',"tob");

		break;

	// my dev
	case 'localhost':
		define('DEV', true);
		define('ROOT_NODE', "/ayw-tob/");
		define('MYSQL_HOST',"127.0.0.1");
		define('MYSQL_USER',"root");
		define('MYSQL_PASS', "01dec2006");
		define('MYSQL_DB',"tob");

		break;
}
