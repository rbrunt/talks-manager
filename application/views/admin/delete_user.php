<div class="row">
	<div class="col-md-12">
		<div class="jumbotron">
			<h1>User deletion confirmation</h1>
			<p>Are you sure you want to delete the user "<?php echo $user->name; ?>"?</p>
			<?php echo form_open(""); ?>
			<p><?php echo form_submit(array("value"=>"Yes, I definately want to delete the user \"".$user->name."\"", "class"=>"btn btn-large btn-danger activate-tooltip", "title"=>"You CANNOT undo this!", "data-placement"=>"bottom")); ?></p>
			<?php echo form_hidden(array("token"=>$token)); ?>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
