<?php
class Employee{



	/*
		Get List Of Employees
		@return ARRAY()
	*/
	public static function all(){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "
			SELECT
				u.id,
				u.name,
				u.surname,
				u.email,
				e.created,
				ep.title as position_title,
				u2.name as author_name,
				u2.surname as author_surname
			FROM users u
			INNER JOIN employees e ON e.user_id = u.id
			INNER JOIN employee_positions ep ON e.position_id = ep.id
			INNER JOIN users u2 ON e.creator_id = u2.id
		";

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
		Get Employee
		@return ARRAY()
	*/
	public static function get($id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "
				SELECT
					u.id,
					u.name,
					u.surname,
					u.email,
					u.password,
					ep.id as position_id,
					ep.title as position_title
				FROM users u
				INNER JOIN employees e ON e.user_id = u.id
				INNER JOIN employee_positions ep ON e.position_id = ep.id
				WHERE u.id = :id
		";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":id",$id,PDO::PARAM_INT);

		//SET FETCH MODE
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		//EXECUTE
		$statement->execute();


		return $statement->fetch();
	}
	/*
		End Function
	*/




	/*
		Add Employee
		@return Boolean	
	*/
	public static function add($user_id,$position_id,$creator_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "INSERT INTO employees ( user_id, position_id, created, updated, creator_id)
								VALUES(:user_id,:position_id, NOW()  , NOW()  ,:creator_id)";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":user_id",$user_id,PDO::PARAM_INT);
		$statement->bindParam(":position_id",$position_id,PDO::PARAM_INT);
		$statement->bindParam(":creator_id",$creator_id,PDO::PARAM_INT);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/



	/*
		Add Employee
		@return Boolean	
	*/
	public static function update($user_id,$position_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "UPDATE employees SET position_id = :position_id, updated = NOW() WHERE user_id = :id";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":id",$user_id,PDO::PARAM_INT);
		$statement->bindParam(":position_id",$position_id,PDO::PARAM_INT);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/

}