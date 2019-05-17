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
				<div class="col-12">
					<div class="admin-title">
						<a>
							<?php echo $item["title"]; ?>
						</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>




		<?php endforeach; ?>


	</div>

</body>
</html>