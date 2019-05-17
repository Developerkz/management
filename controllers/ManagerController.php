<?php
class ManagerController{


	public function linkPanel(){
		if(!User::isAuth()){header("Location:/");}

		$title = "Главная";
		$page = "main";

		include_once(P."backend/Panel.php");
		return true;
	}

	public function linkRole(){
		if(!User::isAuth()){header("Location:/");}

		$title = "Роли";
		$page = "role";


		$data = UserType::all();

		include_once(P."backend/list.php");
		return true;
	}
	public function linkPosition(){
		if(!User::isAuth()){header("Location:/");}

		$title = "Должности";
		$page = "position";

		$data = Position::all();

		include_once(P."backend/list.php");
		return true;
	}
	public function linkCtype(){
		if(!User::isAuth()){header("Location:/");}

		$title = "Типы компаний";
		$page = "ctype";

		$data = CompanyType::all();

		include_once(P."backend/list.php");
		return true;
	}

}