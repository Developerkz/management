<?php
class Company{

	/*
		Get List Of Companies
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
				c.title,
				c.website,
				c.phone,
				c.address,
				c.created,
				u2.name as author_name,
				u2.surname as author_surname
			FROM users u
			INNER JOIN companies c ON c.user_id = u.id
			INNER JOIN users u2 ON c.creator_id = u2.id
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
					c.id as company_id,
					u.name,
					u.surname,
					u.email,
					u.password,
					c.title,
					c.website,
					c.phone,
					c.address,
					c.company_type_id,
					ct.title as type_title
				FROM users u
				INNER JOIN companies c ON c.user_id = u.id
				INNER JOIN company_types ct ON c.company_type_id = ct.id
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
		Add Company
		@return Boolean	
	*/
	public static function add($user_id,$title,$website,$phone,$address,$company_type_id,$creator_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "INSERT INTO companies ( user_id, title, website, phone, address, company_type_id, created, updated, creator_id)
								VALUES(:user_id,:title,:website,:phone,:address,:company_type_id, NOW()  , NOW()  ,:creator_id)";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":user_id",$user_id,PDO::PARAM_INT);
		$statement->bindParam(":title",$title,PDO::PARAM_STR);
		$statement->bindParam(":website",$website,PDO::PARAM_STR);
		$statement->bindParam(":phone",$phone,PDO::PARAM_STR);
		$statement->bindParam(":address",$address,PDO::PARAM_STR);
		$statement->bindParam(":company_type_id",$company_type_id,PDO::PARAM_INT);
		$statement->bindParam(":creator_id",$creator_id,PDO::PARAM_INT);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/



	/*
		Update Company
		@return Boolean	
	*/
	public static function update($user_id,$title,$website,$phone,$address,$company_type_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "UPDATE companies SET title = :title,
									 website = :website,
									 phone = :phone, 
									 address = :address, 
									 company_type_id = :company_type_id,
									 updated = NOW()
								WHERE user_id = :user_id";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":user_id",$user_id,PDO::PARAM_INT);
		$statement->bindParam(":title",$title,PDO::PARAM_STR);
		$statement->bindParam(":website",$website,PDO::PARAM_STR);
		$statement->bindParam(":phone",$phone,PDO::PARAM_STR);
		$statement->bindParam(":address",$address,PDO::PARAM_STR);
		$statement->bindParam(":company_type_id",$company_type_id,PDO::PARAM_INT);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/	

}