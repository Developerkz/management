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
					<?php if(isset($errors) AND is_array($errors)): ?>
						<?php foreach ($errors as $error): ?>
							<p class="error"><?php echo $error; ?></p>
						<?php endforeach; ?>
						<br>
					<?php endif; ?>
					<label>Фамилия</label>
					<input type="text" name="surname" value="<?php echo $item["surname"]; ?>" required>
					<label>Имя</label>
					<input type="text" name="name" value="<?php echo $item["name"]; ?>" required>
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $item["email"]; ?>" required>
					<label>Пароль</label>
					<input type="text" name="password">
					<label>Должность</label>
					<select name="position">
						<?php foreach($positions as $position): ?>
							<option <?php if($item["position_id"] == $position["id"]): ?> selected <?php endif; ?>
							value="<?php echo $position["id"]; ?>">
								<?php echo $position["title"]; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="clear"></div>

				<div class="pd20 cntr">
					<button type="submit" name="update">Сохранить</button>
				</div>
			<?php endif; ?>
		</form>


	</div>

</body>
</html>