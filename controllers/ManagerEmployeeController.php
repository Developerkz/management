<?php
class ManagerEmployeeController{


	public function linkList(){
		if(!User::isAuth()){header("Location:/");}

		$page = "employee";
		$title = "Сотрудники";

		$data = Employee::all();

		include_once(P."backend/employees/list.php");
		return true;
	}


	public function linkAdd(){
		if(!User::isAuth()){header("Location:/");}

		$page = "employee";
		$title = "Добавить сотрудника";

		$positions = Position::all();



		$surname = false;
		$name = false;
		$email = false;
		$password = false;
		$position = false;
		$message = false;

		if(isset($_POST["add"])){
			$surname = $_POST["surname"];
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$position = $_POST["position"];

			$errors = false;

			if(!Validate::checkEmail($email)){$errors[] = Validate::errorEmail();}
			if(!Validate::checkPassword($password)){$errors[] = Validate::errorPassword();}
			if(User::checkEmailExist($email)){$errors[] = Validate::emailExist();}
			if(!$errors){
				$user_id = User::add($name,$surname,$email,Setting::encryption($password),2);
				Employee::add($user_id,$position,intval($_SESSION["user"]));
				$message = true;
				header("refresh: 1; url=/manager/employees");
			}
		}

		include_once(P."backend/employees/add.php");
		return true;
	}

	public function linkUpdate($id){
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);

		$page = "employee";

		$item = Employee::get($id);

		$title = $item["surname"]." ".$item["name"];

		$positions = Position::all();



		$surname = false;
		$name = false;
		$email = false;
		$password = false;
		$position = false;
		$message = false;

		if(isset($_POST["update"])){
			$surname = $_POST["surname"];
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];

			if($password != ""){$password = Setting::encryption($password);}
			else{$password = $item["password"];}

			$position = $_POST["position"];

			$errors = false;

			if(!Validate::checkEmail($email)){$errors[] = Validate::errorEmail();}
			if(!Validate::checkPassword($_POST["password"]) AND $_POST["password"] != ""){$errors[] = Validate::errorPassword();}
			if(User::checkEmailExist($email) AND $email != $item["email"]){$errors[] = Validate::emailExist();}
			if(!$errors){
				User::update($id,$name,$surname,$email,$password);
				Employee::update($id,$position);
				$message = true;
				header("refresh: 1; url=/manager/employees");
			}
		}

		include_once(P."backend/employees/update.php");
		return true;
	}


	public function linkDelete($id){		
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);
		User::delete($id);
		header("Location: /manager/employees#deleted");
		return true;
	}
}