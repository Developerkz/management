<?php
class ManagerTemplateController{

	public function linkList(){
		if(!User::isAuth()){header("Location:/");}

		$page = "template";
		$title = "Шаблоны задач";
                     
		$data = Template::all();

		include_once(P."backend/templates/list.php");
		return true;
	}


	public function linkAdd(){
		if(!User::isAuth()){header("Location:/");}

		$page = "template";
		$title = "Добавить шаблон";

		$periods = Period::all();
		$company_types = CompanyType::all();

		$message = false;
		$name = false;
		$content = false;
		$period = false;
		$company_type = false;


		if(isset($_POST["add"])){
			$name = $_POST["title"];
			$content = $_POST["content"];
			$period = $_POST["period"];
			$company_type = $_POST["company_type"];

			Template::add($company_type,$name,$content,$period);
			$message = true;
			header("refresh: 1; url=/manager/templates");
		}

		include_once(P."backend/templates/add.php");
		return true;
	}

	public function linkUpdate($id){
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);

		$page = "template";
		$item = Template::get($id);
		$title = $item["title"];

		$periods = Period::all();
		$company_types = CompanyType::all();

		$message = false;
		$name = false;
		$content = false;
		$period = false;
		$company_type = false;

		if(isset($_POST["update"])){
			$name = $_POST["title"];
			$content = $_POST["content"];
			$period = $_POST["period"];
			$company_type = $_POST["company_type"];

			Template::update($id,$company_type,$name,$content,$period);
			$message = true;
			header("refresh: 1; url=/manager/templates");
		}

		include_once(P."backend/templates/update.php");
		return true;
	}


	public function linkDelete($id){		
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);
		Template::delete($id);
		header("Location: /manager/templates#deleted");
		return true;
	}
}