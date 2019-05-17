<?php
class FrontController{

	public function linkPage(){
		if(User::isAuth()){header("Location:/manager");}
		$email = false;
		$password = false;
		if(isset($_POST["login"])){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$user_id = User::checkData($email,Setting::encryption($password));
			$errors = false;
			if(!Validate::checkEmail($email)){$errors[] = Validate::errorEmail();}
			if(!Validate::checkPassword($password)){$errors[] = Validate::errorPassword();}
			if(!$user_id){$errors[] = Validate::errorLogin();}
			if(!$errors){
				User::auth($user_id);
				header("Location:/manager");
			}
		}
		include_once(P."backend/Login.php");
		return true;
	}

	public function linkLogout(){
		if(!User::isAuth()){header("Location:/");}
		unset($_SESSION["user"]);
		header("Location:/");
		return true;
	}

}