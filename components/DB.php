<?php 
class DB{
	public function getConnection(){
		$params = require_once(P.'config/db_parameters.php');
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn,$params['user'],$params['pass']);
		$db->exec("SET CHARACTER SET utf8");
		return $db;
	}
}
?>