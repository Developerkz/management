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
					<?php if(isset($errors) AND is_array($errors)): ?>
						<div class="col-12 pd20">
							<?php foreach ($errors as $error): ?>
								<p class="error"><?php echo $error; ?></p>
							<?php endforeach; ?>
							<br>
						</div>
					<?php endif; ?>
				<div class="col-6 pd20">
					<label>Название</label>
					<input type="text" name="title" value="<?php echo $cname; ?>" required>
					<label>Website</label>
					<input type="text" name="website" value="<?php echo $website; ?>">
					<label>Телефон</label>
					<input type="text" name="phone" value="<?php echo $phone; ?>">
					<label>Адрес</label>
					<input type="text" name="address" value="<?php echo $address; ?>">
				</div>
				<div class="col-6 pd20">
					<label>Фамилия</label>
					<input type="text" name="surname" value="<?php echo $surname; ?>" required>
					<label>Имя</label>
					<input type="text" name="name" value="<?php echo $name; ?>" required>
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $email; ?>" required>
					<label>Пароль</label>
					<input type="text" name="password" value="<?php echo $password; ?>" required>
				</div>

				<div class="col-12 pd20">
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