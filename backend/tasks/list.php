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
		<div class="aleft item-count">
			Найдено: <?php echo count($data); ?>
		</div>
		<div class="clear"></div>

		<?php foreach ($data as $item): ?>
			<div class="admin-item">
				<div class="col-6">
					<div class="admin-title">
						<a href="<?php Setting::uri(); ?>manager/task/update/<?php echo $item["id"]; ?>">
							<?php echo $item["name"]; ?>
						</a>
					</div>
					<div class="control-links">
						<a href="<?php Setting::uri(); ?>manager/task/update/<?php echo $item["id"]; ?>"><i class="icon-check"></i> Выполнить</a>
					</div>
				</div>
				<div class="pub-2 col-2">
					Компания:<br>
					<a><?php echo $item["title"]; ?></a>
				</div>
				<div class="pub-2 col-2">
					Создан:<br>
					<a><?php echo $item["user_surname"]." ".$item["user_name"]; ?></a>
				</div>
				<div class="pub-2 col-2">
					Дата:<br>
					<a><?php echo $item["created"]; ?></a>
				</div>
				<div class="clear"></div>
			</div>

		<?php endforeach; ?>


	</div>

</body>
</html>