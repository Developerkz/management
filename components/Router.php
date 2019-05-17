<?php 
Class Router{
	private $routes;
	public function __construct(){
		$this->routes = require_once(P.'config/routes.php');
	}
	private function getURI(){
		if(isset($_SERVER["REQUEST_URI"])){
			if($_SERVER["REQUEST_URI"] == '/'){$page = "page";}
			else{
				$page = substr($_SERVER["REQUEST_URI"], 1);
			    if(!preg_match("/^[A-Za-z0-9-\/]{2,100}/", $page)){Setting::page404();}
			}
			return $page;
		}
		else{Setting::page404();}
	}
	public function run(){
		$uri = $this->getURI();
		$page404 = true;
		foreach ($this->routes as $pages => $path) {
			if( preg_match("~$pages~", $uri) ){
				$route      =  preg_replace("~$pages~", $path , $uri);
				$segments   =  explode('/',$route);
				$contName   =  ucfirst(array_shift($segments)).'Controller';
				$actionName =  'link'.ucfirst(array_shift($segments));
				$parameters =  $segments;
				$contFile   =  P.'controllers/'.$contName.'.php';
				if(file_exists($contFile)){require_once($contFile);}
				$obj = new $contName;
				$result = call_user_func_array(array($obj,$actionName), $parameters);
				if($result){$page404 = false;break;}
			}
		}
		if($page404){ Setting::page404(); }
	}
}
?>