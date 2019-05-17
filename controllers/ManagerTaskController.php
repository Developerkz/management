<?php
class ManagerTaskController{


	public function linkList(){
		if(!User::isAuth()){header("Location:/");}

		$page = "task";
		$title = "Задачи";
                     
		$data = Task::getByUser(intval($_SESSION["user"]));

		include_once(P."backend/tasks/list.php");
		return true;
	}
	public function linkUpdate($id){
		if(!User::isAuth()){header("Location:/");}
		$id = intval($id);

		$item = Task::get($id);
		$title = $item["name"];
		
		$months = array(
			'1' => 'Январь','2' => 'Февраль','3' => 'Март',
			'4' => 'Апрель','5' => 'Май','6' => 'Июнь',
			'7' => 'Июль','8' => 'Август','9' => 'Сентябрь',
			'10' => 'Октябрь','11' => 'Ноябрь','12' => 'Декабрь','0' => '',
		);

		$message = false;


		include_once(P."backend/tasks/update.php");
		return true;
	}

}