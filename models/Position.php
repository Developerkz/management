<?php
class Position{



	/*
		Get List Of Users
		@return ARRAY()
	*/
	public static function all(){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM employee_positions";

		//Query
		$statement = $db->prepare($sql);

		//SET FETCH MODE
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		//EXECUTE
		$statement->execute();


		return $statement->fetchAll();
	}
	/*
		End Function
	*/


}