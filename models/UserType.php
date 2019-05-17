<?php

class UserType{

	/*
		Get List Of Periods
		@return ARRAY()
	*/
	public static function all(){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM user_types";

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