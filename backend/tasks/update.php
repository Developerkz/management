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

		<form method="POST" enctype="multipart/form-data">
			

			<div class="pd20">
				<h2><?php echo $item["name"]; ?></h2>
				<div>
					<span style="font-size: 14px;margin-right: 30px;color:#555">
						Завершить до: <?php echo $item["day"]." ".$months[$item["month"]]; ?>
					</span>
					<form method="POST">
						<button>× Закрыть задачу</button>
					</form>
				</div>
				<br>
				<hr>
				<br>
				<p style="font-size: 15px;color:#333"><?php echo $item["content"]; ?></p>
				<br>
				<hr>

			</div>

		</form>


	</div>

</body>
</html>