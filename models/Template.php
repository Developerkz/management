<?php
class Template{


	/*
		Get List Of Templates
		@return ARRAY()
	*/
	public static function all(){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "
			SELECT
				t.id,
				t.title,
				c.title as company_type_title,
				p.title as period_title
			FROM task_templates t
			INNER JOIN company_types c ON c.id = t.company_type_id
			INNER JOIN periods p ON p.id = t.period_id
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
		Get List Of Templates
		@return ARRAY()
	*/
	public static function getList($company_type_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "
			SELECT
				t.id,
				t.title,
				t.content,
				c.title as company_type_title,
				p.title as period_title
			FROM task_templates t
			INNER JOIN company_types c ON c.id = t.company_type_id
			INNER JOIN periods p ON p.id = t.period_id
			WHERE company_type_id = :company_type_id
			";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":company_type_id",$company_type_id,PDO::PARAM_INT);

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
		Get Template
		@return Array()
	*/
	public static function get($id){

		//Convertion to INTEGER
		$id = intval($id);

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "SELECT * FROM task_templates WHERE id = :id";


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
		Add Template
		@return Array()
	*/
	public static function add($company_type_id,$title,$content,$period_id){


		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "INSERT INTO task_templates ( company_type_id, title, content, period_id) VALUES(:company_type_id,:title,:content,:period_id)";


		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":company_type_id",$company_type_id,PDO::PARAM_INT);
		$statement->bindParam(":title",$title,PDO::PARAM_STR);
		$statement->bindParam(":content",$content,PDO::PARAM_STR);
		$statement->bindParam(":period_id",$period_id,PDO::PARAM_INT);

		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/


	/*
		Update Template
		@return Array()
	*/
	public static function update($id,$company_type_id,$title,$content,$period_id){


		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "UPDATE task_templates SET company_type_id = :company_type_id,
										  title = :title,
										  content = :content,
										  period_id = :period_id 
										WHERE id = :id";


		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":id",$id,PDO::PARAM_INT);
		$statement->bindParam(":company_type_id",$company_type_id,PDO::PARAM_INT);
		$statement->bindParam(":title",$title,PDO::PARAM_STR);
		$statement->bindParam(":content",$content,PDO::PARAM_STR);
		$statement->bindParam(":period_id",$period_id,PDO::PARAM_INT);

		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/





	/*
		Delete Template
		@return Array()
	*/
	public static function delete($id){


		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "DELETE FROM task_templates WHERE id = :id";


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
}