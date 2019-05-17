<div class="admin-header">

	<div class="content-title">
		<?php echo $title; ?>
	</div>


	<div class="admin-manager">
		<?php $user = User::get($_SESSION["user"]); ?>
		<a><i class="icon-user"></i> <?php echo $user["name"]; ?></a>
		<a href="<?php Setting::uri(); ?>logout" class="logout"><i class="icon-power"></i> Выход</a>		
	</div>

	<div class="clear"></div>
</div>