	<div class="hero-unit">
			<h1>User deletion confirmation</h1>
			<p>Are you sure you want to delete the user "<?php echo $user->name; ?>"?</p>
			<?php echo form_open(""); ?>
			<p><?php echo form_submit(array("value"=>"Delete User \"".$user->name."\"", "class"=>"btn btn-large btn-danger activate-tooltip", "title"=>"You CANNOT undo this!", "data-placement"=>"bottom")); ?></p>
			<?php echo form_hidden(array("token"=>$token)); ?>
			<?php echo form_close(); ?>

	</div>
