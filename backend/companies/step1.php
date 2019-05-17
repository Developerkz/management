<!DOCTYPE html>
<html>
<head>
	<!-- EXTERNAL -->
	<?php include_once(P."backend/template/external.php"); ?>
	<!-- end block -->
	<title><?php echo $title; ?></title>
</head>
<body>

	<!-- MENU -->
	<?php include_once(P."backend/template/menu.php"); ?>
	<!-- end block -->

	<div class="admin-content">
		<!-- HEADER -->
		<?php include_once(P."backend/template/header.php"); ?>
		<!-- end block -->


		<div class="pd20 step1">
			<h2>Выберите:</h2>
			<a href="<?php Setting::uri(); ?>manager/company/step2/1">Индивидуальный предприниматель</a>
			<a href="<?php Setting::uri(); ?>manager/company/step2/2">Товарищество с ограниченной ответственностью</a>
			<a href="<?php Setting::uri(); ?>manager/company/step2/3">Общественная организация</a>
		</div>

	</div>

</body>
</html>