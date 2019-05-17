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
		<?php if($message): ?>
			<div class="col-12 pd20">
				<b style="color: green;text-align: center;display: block;">Данные успешно сохранено!</b><br>
			</div>
		<?php endif; ?>
		<div class="col-12 pd20">
			<p><b>Компания: </b> <?php echo $item["title"]; ?></p>
			<p><b>Владелец: </b> <?php echo $item["surname"]." ".$item["name"]; ?></p>
			<p><b>Сайт: </b> <?php echo $item["website"]; ?></p>
			<p><b>Телефон: </b> <?php echo $item["phone"]; ?></p>
			<p><b>Адрес: </b> <?php echo $item["address"]; ?></p>
			<p><b>Тип компании: </b> <?php echo $item["type_title"]; ?></p>
			<p><b>Email: </b> <?php echo $item["email"]; ?></p>
		</div>
		<div class="clear"></div>

		<div class="col-12 pd20">
			<form method="POST">
				<label>Ответственный:</label>
				<select name="executor">
					<?php foreach($employees as $employee): ?>
						<option value="<?php echo $employee["id"]; ?>"><?php echo $employee["surname"]." ".$employee["name"]; ?></option>
					<?php endforeach; ?>
				</select>
				<br>
				<label>Задачи</label><br><br>
				<?php foreach($templates as $template): ?>
				<div style="border-bottom: 1px solid #eaeaea;padding: 50px 20px;">
					<div class="col-8 pd20">
						<label style="padding: 0;margin: 0;font-weight: normal;display: block;">
							<input type="checkbox" name="task<?php echo $template["id"]; ?>" value="1" checked>
							<?php echo $template["title"]; ?>
						</label>
					</div>
					<div class="col-2 ">
						<select name="month<?php echo $template["id"]; ?>">
							<option value="1">Январь</option>
							<option value="2">Февраль</option>
							<option value="3">Март</option>
							<option value="4">Апрель</option>
							<option value="5">Май</option>
							<option value="6">Июнь</option>
							<option value="7">Июль</option>
							<option value="8">Август</option>
							<option value="9">Сентябрь</option>
							<option value="10">Октябрь</option>
							<option value="11">Ноябрь</option>
							<option value="12">Декабрь</option>
						</select>
					</div>
					<div class="col-2 ">
						<select name="day<?php echo $template["id"]; ?>">
							<?php for($i=1;$i<=31;$i++): ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<br>
				</div>
				<?php endforeach; ?>


				<div class="pd20 cntr">
					<button type="submit" name="save">Сохранить</button>
				</div>
			</form>
		</div>

	</div>

</body>
</html>