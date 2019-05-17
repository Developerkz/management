<?php
class ManagerCompanyController{

	public function linkList(){
		if(!User::isAuth()){header("Location:/");}

		$page = "company";
		$title = "Компании";

		$data = Company::all();

		include_once(P."backend/companies/list.php");
		return true;
	}


	public function linkStepone(){
		if(!User::isAuth()){header("Location:/");}

		$page = "company";
		$title = "Шаг 1 | Добавить компанию";


		include_once(P."backend/companies/step1.php");
		return true;
	}


	public function linkSteptwo($id){
		if(!User::isAuth()){header("Location:/");}

		$page = "company";
		$title = "Шаг 2 | Добавить компанию";


		include_once(P."backend/companies/step2.php");
		return true;
	}

	public function linkStepThree($organization_id,$activity_id){
		if(!User::isAuth()){header("Location:/");}

		$page = "company";
		$title = "Шаг 3 | Добавить компанию";


		$company_type = CompanyType::getByParameters($organization_id,$activity_id);
		

		$surname = false;
		$name = false;
		$email = false;
		$password = false;

		$cname = false;
		$website = false;
		$phone = false;
		$address = false;


		$message = false;

		if(isset($_POST["add"])){
			$surname = $_POST["surname"];
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];

			$cname = $_POST["title"];
			$website = $_POST["website"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];

			$errors = false;

			if(!Validate::checkEmail($email)){$errors[] = Validate::errorEmail();}
			if(!Validate::checkPassword($password)){$errors[] = Validate::errorPassword();}
			if(User::checkEmailExist($email)){$errors[] = Validate::emailExist();}
			if(!$errors){
				$user_id = User::add($name,$surname,$email,Setting::encryption($password),3);
				Company::add($user_id,$cname,$website,$phone,$address,$company_type["id"],intval($_SESSION["user"]));
				$message = true;
				header("Location:/manager/company/task/add/".$user_id);
			}
		}



		include_once(P."backend/companies/step3.php");
		return true;
	}


	public function linkAdd(){
		if(!User::isAuth()){header("Location:/");}

		$page = "company";
		$title = "Добавить компанию";

		$company_types = CompanyType::all();

		$surname = false;
		$name = false;
		$email = false;
		$password = false;

		$cname = false;
		$website = false;
		$phone = false;
		$address = false;
		$company_type = false;


		$message = false;

		if(isset($_POST["add"])){
			$surname = $_POST["surname"];
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];

			$cname = $_POST["title"];
			$website = $_POST["website"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			$company_type = $_POST["company_type"];

			$errors = false;

			if(!Validate::checkEmail($email)){$errors[] = Validate::errorEmail();}
			if(!Validate::checkPassword($password)){$errors[] = Validate::errorPassword();}
			if(User::checkEmailExist($email)){$errors[] = Validate::emailExist();}
			if(!$errors){
				$user_id = User::add($name,$surname,$email,Setting::encryption($password),3);


				//Company::add($user_id,$cname,$website,$phone,$address,$company_type,intval($_SESSION["user"]));

				$message = true;


				header("Location:/manager/task/add/".$user_id);
			}
		}

		include_once(P."backend/companies/add.php");
		return true;
	}

	public function linkUpdate($id){
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);

		$page = "company";

		$item = Company::get($id);

		$title = $item["title"];

		$company_types = CompanyType::all();

		$surname = false;
		$name = false;
		$email = false;
		$password = false;

		$cname = false;
		$website = false;
		$phone = false;
		$address = false;
		$company_type = false;


		$message = false;

		if(isset($_POST["update"])){
			$surname = $_POST["surname"];
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];

			if($password != ""){$password = Setting::encryption($password);}
			else{$password = $item["password"];}

			$cname = $_POST["title"];
			$website = $_POST["website"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			$company_type = $_POST["company_type"];

			$errors = false;

			if(!Validate::checkEmail($email)){$errors[] = Validate::errorEmail();}
			if(!Validate::checkPassword($_POST["password"]) AND $_POST["password"] != ""){$errors[] = Validate::errorPassword();}
			if(User::checkEmailExist($email) AND $email != $item["email"]){$errors[] = Validate::emailExist();}
			if(!$errors){
				User::update($id,$name,$surname,$email,$password);
				Company::update($id,$cname,$website,$phone,$address,$company_type);
				$message = true;
				header("refresh: 1; url=/manager/companies");
			}
		}

		include_once(P."backend/companies/update.php");
		return true;
	}


	public function linkDelete($id){		
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);
		User::delete($id);
		header("Location: /manager/companies#deleted");
		return true;
	}



	public function linkTask($id){		
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);

		$page = "company";
		$item = Company::get($id);
		$title = $item["title"];

		$employees = Employee::all();

		$templates = Template::getList($item["company_type_id"]);
		$message = false;

		if(isset($_POST["save"])){
			foreach ($templates as $template) {

				if(isset($_POST["task".$template["id"]]) AND $_POST["task".$template["id"]] == "1"){
					$name = $template["title"];
					$content = $template["content"];
					$month = $_POST["month".$template["id"]];
					$day = $_POST["day".$template["id"]];
					$notify_time = "10:00:00.000000";
					$executor_id = $_POST["executor"];
					Task::add($name,$month,$day,$notify_time,$executor_id,$item["company_id"],$template["id"],$content,$_SESSION["user"]);
				}

				
			}
			$message = true;
			header("refresh: 1; url=/manager/companies");
		}

		include_once(P."backend/companies/task.php");
		return true;
	}
}