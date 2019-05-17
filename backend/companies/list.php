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
		<div class="aright">
			<a href="<?php Setting::uri(); ?>manager/company/add" class="add-button">Добавить</a>
		</div>
		<div class="clear"></div>

		<?php foreach ($data as $item): ?>
			<div class="admin-item">
				<div class="col-6">
					<div class="admin-title">
						<a href="<?php Setting::uri(); ?>manager/company/update/<?php echo $item["id"]; ?>">
							<?php echo $item["title"]; ?>
						</a>
					</div>
					<div class="control-links">
						<a href="<?php Setting::uri(); ?>manager/company/update/<?php echo $item["id"]; ?>"><i class="icon-pencil"></i> Редактировать</a>
						<a href="#delete<?php echo $item["id"]; ?>" class="delete"><i class="icon-close"></i> Удалить</a>
					</div>
				</div>
				<div class="pub-2 col-2">
					Пользователь:<br>
					<a><?php echo $item["surname"]." ".$item["name"]; ?></a>
				</div>
				<div class="pub-2 col-2">
					Дата:<br>
					<a><?php echo Setting::getTime($item["created"]); ?></a>
				</div>
				<div class="pub-2 col-2">
					Создан:<br>
					<a><?php echo $item["author_name"]." ".$item["author_surname"]; ?></a>
				</div>
				<div class="clear"></div>
			</div>




			<div id="delete<?php echo $item["id"]; ?>" class="modal">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h3 class="modal-title">Вы действительно хотите удалить?</h3>
			        <a href="#close" title="Close" class="close">×</a>
			      </div>
			      <div class="modal-body">
			      	<a href="<?php Setting::uri(); ?>manager/company/delete/<?php echo $item["id"]; ?>" class="btn red">Да</a>
			      	<a href="#close" class="btn">Нет</a>
			      </div>
			    </div>
			  </div>
			</div>



		<?php endforeach; ?>


	</div>


<div id="deleted" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Сообщение</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">
      	<p>Компания успешно удалена</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>