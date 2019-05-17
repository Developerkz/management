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
			
			<?php if(count($templates) == 0): ?>
				<p style="text-align: center;font-weight: bold;">Данные не найдены</p>
			<?php else: ?>
				<h2>Выберите:</h2>
				<?php foreach($templates as $template): ?>
					<div style="border-bottom: 1px solid #eaeaea;padding: 20px 10px;">
						<div class="col-8 pd10">
							<label style="padding: 0;margin: 0;font-weight: normal;display: block;">
								<input type="checkbox" name="task<?php echo $template["id"]; ?>" value="1" checked>
								<?php echo $template["title"]; ?>
							</label>
						</div>
						<div class="col-2">
							<select name="month<?php echo $template["id"]; ?>" style="margin:0">
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
						<div class="col-2">
							<select name="day<?php echo $template["id"]; ?>" style="margin:0">
								<?php for($i=1;$i<=31;$i++): ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php endfor; ?>
							</select>
						</div>
						<br>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>

	</div>

</body>
</html>