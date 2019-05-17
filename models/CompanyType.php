<?php
class CompanyType{


	/*
		Get List Of Periods
		@return ARRAY()
	*/
	public static function all(){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM company_types";

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




	/*
		Get List Of Periods
		@return ARRAY()
	*/
	public static function getByParameters($organization_type,$activity_type){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM company_types WHERE organization_type = :organization_type AND activity_type = :activity_type";

		//Query
		$statement = $db->prepare($sql);

		//SQL BIND
		$statement->bindParam(":organization_type",$organization_type,PDO::PARAM_INT);
		$statement->bindParam(":activity_type",$activity_type,PDO::PARAM_INT);

		//SET FETCH MODE
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		//EXECUTE
		$statement->execute();


		return $statement->fetch();
	}
	/*
		End Function
	*/
}