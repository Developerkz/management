<!DOCTYPE html>
<html>
<head>
	<!-- EXTERNAL -->
	<?php include_once(P."backend/template/external.php"); ?>
	<!-- end block -->
	<title>Nurmanagement</title>
</head>
<body>

<div class="admin-bg">
	<div class="admin-login">

		<div class="admin-login-title">
			Nurmanagement | Панель управление
		</div>
		<?php if(isset($errors) AND is_array($errors)): ?>
			<?php foreach ($errors as $error): ?>
				<p class="error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
		<form method="POST">
			<label><i class="icon-envelope"></i></label>
			<input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" required>
			<label><i class="icon-lock"></i></label>
			<input type="password" name="password" required placeholder="Пароль">
			<button type="submit" name="login"><i class="icon-mouse"></i> Вход</button>
		</form>
	</div>
</div>

</body>
</html>