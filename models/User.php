<?php
class User{


	/*
		Get List Of Users
		@return ARRAY()
	*/
	public static function all(){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM users";

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
		Get User By ID
		@return Array()
	*/
	public static function get($id){

		//Convertion to INTEGER
		$id = intval($id);

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM users WHERE id = :id";


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
		Get User By Email
		@return Array()
	*/
	public static function getEmail($email){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM users WHERE email = :email";


		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":email",$email,PDO::PARAM_STR);

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
		Add User
		@return Boolean	
	*/
	public static function add($name,$surname,$email,$password,$user_type_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "INSERT INTO users ( name, surname, email, password, reg_date, user_type_id, locked)
							VALUES(:name,:surname,:email,:password, NOW()   ,:user_type_id, 0)";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":name",$name,PDO::PARAM_STR);
		$statement->bindParam(":surname",$surname,PDO::PARAM_STR);
		$statement->bindParam(":email",$email,PDO::PARAM_STR);
		$statement->bindParam(":password",$password,PDO::PARAM_STR);
		$statement->bindParam(":user_type_id",$user_type_id,PDO::PARAM_INT);
		
		//EXECUTE
		$statement->execute();


		return $db->lastInsertId();
	}
	/*
		End Function
	*/




	/*
		Update User
		@return Boolean
	*/
	public static function update($id,$name,$surname,$email,$password){

		//Convertion to INTEGER
		$id = intval($id);

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "UPDATE users SET name = :name, 
								 surname = :surname, 
								 email = :email,
								 password = :password
							     WHERE id = :id";



		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":id",$id,PDO::PARAM_INT);
		$statement->bindParam(":name",$name,PDO::PARAM_STR);
		$statement->bindParam(":surname",$surname,PDO::PARAM_STR);
		$statement->bindParam(":email",$email,PDO::PARAM_STR);
		$statement->bindParam(":password",$password,PDO::PARAM_STR);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/








	/*
	-------------------------------
			Delete User
			@return Boolean
	-------------------------------
	*/
	public static function delete($id){

		//Convertion to INTEGER
		$id = intval($id);

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "DELETE FROM users WHERE id = :id";


		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":id",$id,PDO::PARAM_INT);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/



	/*
		Check User Data
		@return user ID
	*/
	public static function checkData($email,$password){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT id FROM users WHERE email = :email AND password = :password AND locked = 0";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":email",$email,PDO::PARAM_STR);
		$statement->bindParam(":password",$password,PDO::PARAM_STR);

		//SET FETCH MODE
		$statement->setFetchMode(PDO::FETCH_NUM);

		//EXECUTE
		$statement->execute();

		//FETCH
		$data = $statement->fetch();

		return $data[0];
	}
	/*
		End Function
	*/



	/*
		Check Email Exist
		@return user ID
	*/
	public static function checkEmailExist($email){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT count(id) FROM users WHERE email = :email";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":email",$email,PDO::PARAM_STR);


		//SET FETCH MODE
		$statement->setFetchMode(PDO::FETCH_NUM);

		//EXECUTE
		$statement->execute();

		//FETCH
		$data = $statement->fetch();

		return $data[0];
	}
	/*
		End Function
	*/


	/*
		Update Password
		@return Boolean
	*/
	public static function updatePassword($email,$password){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "UPDATE users SET password = :password WHERE email = :email";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":email",$email,PDO::PARAM_STR);
		$statement->bindParam(":password",$password,PDO::PARAM_STR);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/




	/*
	-------------------------------
			User Authorization
			@return NULL
	-------------------------------
	*/
	public static function auth($id){
		$id = intval($id);
		$_SESSION["user"] = $id; 
	}
	/*
		End Function
	*/



	/*
	-------------------------------
			User Authorization
			@return NULL
	-------------------------------
	*/
	public static function isAuth(){
		if(isset($_SESSION["user"])){
			return true;
		}
		return false;
	}
	/*
		End Function
	*/



}
?>