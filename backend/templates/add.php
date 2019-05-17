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
			<?php if($message): ?>
				<div class="col-12 pd20">
					<b style="color: green;text-align: center;display: block;">Данные успешно сохранено!</b><br>
				</div>
				<?php else: ?>
				<div class="col-12 pd20">
					<label>Название</label>
					<input type="text" name="title" value="<?php echo $name; ?>" required>
					<label>Контент</label>
					<textarea name="content"><?php echo $content; ?></textarea>
					
					<label>Период</label>
					<select name="period">
						<?php foreach($periods as $vperiod): ?>
							<option value="<?php echo $vperiod["id"]; ?>">
								<?php echo $vperiod["title"]; ?>
							</option>
						<?php endforeach; ?>
					</select>
					<label>Тип компании</label>
					<select name="company_type">
						<?php foreach($company_types as $type): ?>
							<option value="<?php echo $type["id"]; ?>">
								<?php echo $type["title"]; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="clear"></div>

				<div class="pd20 cntr">
					<button type="submit" name="add">Добавить</button>
				</div>
			<?php endif; ?>
		</form>


	</div>

</body>
</html>