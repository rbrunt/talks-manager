<?php $alert = (isset($alert)) ? $alert : $this->session->flashdata("alert"); ?>
<?php if(isset($alert["error"])) : ?>
	<div class="alert alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error:</strong> <?php echo $alert["error"] ?>
	</div>
<?php endif; ?>
<?php if(isset($alert["warning"])) : ?>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Warning:</strong> <?php echo $alert["warning"] ?>
	</div>
<?php endif; ?>
<?php if(isset($alert["success"])) : ?>
	<div class="alert alert-success fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> <?php echo $alert["success"] ?>
	</div>
<?php endif; ?>
<?php if(isset($alert["info"])) : ?>
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $alert["info"] ?>
	</div>
<?php endif; ?>