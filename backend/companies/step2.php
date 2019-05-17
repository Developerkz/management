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
			<?php if($id != 3): ?>
				<a href="<?php Setting::uri(); ?>manager/company/step3/<?php echo $id; ?>/1">Упращенный</a>
			<?php endif; ?>
			<a href="<?php Setting::uri(); ?>manager/company/step3/<?php echo $id; ?>/2">Общеустановленный</a>
		</div>

	</div>

</body>
</html>