<?php
function __autoload($class){
	$array_paths = array('models/','components/','controllers/');
    foreach ($array_paths as $path){
        $path = P.$path.$class.'.php';
        if(is_file($path)){include($path);}
    }
}
?>