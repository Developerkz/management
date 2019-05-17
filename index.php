<?php

/*
---------------------------------------------


              FRONT CONTROLLER


---------------------------------------------
*/





/*
	Disable Error Display
*/
//ini_set("display_errors",0);
//error_reporting(0);





/*
	Start SESSION
*/
session_start();







/*
	Set ROOT
*/
define("P",dirname(__FILE__)."/");
define("URL","http://".$_SERVER["HTTP_HOST"]."/");
//define("URL","https://".$_SERVER["HTTP_HOST"]."/");

/*
	Start Autoload
*/
require_once(P."components/Autoload.php");


/*
	Create Object Requst
	@return redirect from HTTP:// => HTTPS://
*/
//$request = new Request;






/*
	Create Object DB
	@return connection to DB
*/
$db = new DB;
$_COOKIE["db"] = $db->getConnection();





/*
	Create Object Router
	run Router
*/
$router = new Router;
$router->run();
