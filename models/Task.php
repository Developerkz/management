<?php
class Task{

	/*
		Add Task
		@return Boolean	
	*/
	public static function add($name,$month,$day,$notify_time,$executor_id,$company_id,$template_id,$content,$creator_id){

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "INSERT INTO tasks ( name, month, day, notify_time, executor_id, company_id, template_id, content, status, created, creator_id)
			VALUES(:name,:month,:day,:notify_time,:executor_id,:company_id,:template_id,:content, 0, NOW(),:creator_id)";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":name",$name,PDO::PARAM_STR);
		$statement->bindParam(":month",$month,PDO::PARAM_STR);
		$statement->bindParam(":day",$day,PDO::PARAM_STR);
		$statement->bindParam(":notify_time",$notify_time,PDO::PARAM_STR);
		$statement->bindParam(":executor_id",$executor_id,PDO::PARAM_INT);
		$statement->bindParam(":company_id",$company_id,PDO::PARAM_INT);
		$statement->bindParam(":template_id",$template_id,PDO::PARAM_INT);
		$statement->bindParam(":content",$content,PDO::PARAM_STR);
		$statement->bindParam(":creator_id",$creator_id,PDO::PARAM_INT);
		
		//EXECUTE
		return $statement->execute();
	}
	/*
		End Function
	*/




	/*
		Get List Of Tasks
		@return ARRAY()
	*/
	public static function getByUser($executor_id){
		
		//Convertion to integer
		$executor_id = intval($executor_id);

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "
			SELECT
				t.id,
				t.name,
			    t.month,
			    t.day,
			    t.notify_time,
			    t.content,
			    t.created,
			    c.title,
			    u.name as user_name,
			    u.surname as user_surname
			FROM tasks t
			INNER JOIN companies c ON t.company_id = c.id
			INNER JOIN task_templates tt ON t.template_id = tt.id
			INNER JOIN users u ON t.creator_id = u.id
			WHERE t.executor_id = :executor_id
		";

		//Query
		$statement = $db->prepare($sql);

		//Protect from SQL INJECTION
		$statement->bindParam(":executor_id",$executor_id,PDO::PARAM_INT);

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
		Get List Of Tasks
		@return ARRAY()
	*/
	public static function get($id){

		//Convertion to integer
		$id = intval($id);

		//Connection to DB
		$db = $_COOKIE["db"];

		//Fields
		$sql = "
			SELECT * FROM tasks WHERE id = :id
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
}