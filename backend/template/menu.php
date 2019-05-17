<div class="admin-menu">


	<div class="admin-logo">
		<a href="<?php Setting::uri(); ?>manager">
			<b>Nur</b> Management
		</a>
	</div>


	<div class="pd10"></div>
	<?php $menu_user = User::get($_SESSION["user"]); ?>


	<a <?php if(isset($page) AND $page == "main"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager">
		<i class="icon-home"></i>
		Главная
	</a>

	<?php if($menu_user["user_type_id"] == "1"): ?>
	<a <?php if(isset($page) AND $page == "company"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/companies">
		<i class="icon-organization"></i>
		Компании
	</a>

	<a <?php if(isset($page) AND $page == "template"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/templates">
		<i class="icon-layers"></i>
		Шаблоны задач
	</a>

	<a <?php if(isset($page) AND $page == "employee"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/employees">
		<i class="icon-people"></i>
		Сотрудники
	</a>

	<a <?php if(isset($page) AND $page == "position"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/positions">
		<i class="icon-briefcase"></i>
		Должности
	</a>

	<a <?php if(isset($page) AND $page == "ctype"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/ctypes">
		<i class="icon-target"></i>
		Типы компании
	</a>


	<a <?php if(isset($page) AND $page == "role"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/roles">
		<i class="icon-star"></i>
		Роли
	</a>

	<?php elseif($menu_user["user_type_id"] == "2"): ?>


	<a <?php if(isset($page) AND $page == "task"): ?> class="active" <?php endif; ?> href="<?php Setting::uri(); ?>manager/tasks">
		<i class="icon-doc"></i>
		Задачи
	</a>


	<?php endif; ?>



</div>