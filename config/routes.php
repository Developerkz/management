<?php
return array(

	//Tasks
	'manager/task/update/([0-9]+)' => 'managerTask/update/$1',
	'manager/tasks' => 'managerTask/list',


	//templates
	'manager/template/delete/([0-9]+)' => 'managerTemplate/delete/$1',
	'manager/template/update/([0-9]+)' => 'managerTemplate/update/$1',
	'manager/template/add' => 'managerTemplate/add',
	'manager/templates' => 'managerTemplate/list',

	
	'manager/company/task/add/([0-9]+)' => 'managerCompany/task/$1',

	//Companies
	'manager/company/delete/([0-9]+)' => 'managerCompany/delete/$1',
	'manager/company/update/([0-9]+)' => 'managerCompany/update/$1',
	'manager/company/add' => 'managerCompany/add',
	'manager/companies' => 'managerCompany/list',

	//Employees
	'manager/employee/delete/([0-9]+)' => 'managerEmployee/delete/$1',
	'manager/employee/update/([0-9]+)' => 'managerEmployee/update/$1',
	'manager/employee/add' => 'managerEmployee/add',
	'manager/employees' => 'managerEmployee/list',


	'manager/roles' => 'manager/role',
	'manager/positions' => 'manager/position',
	'manager/ctypes' => 'manager/ctype',

	//Manager Panel Page
	'manager' => 'manager/panel',


	//Main User links 
	'logout' => 'front/logout',
	'page' => 'front/page',


);
?>