	<div class="row">
		<div class="span12">
			<?php echo form_open("admin/addspeaker"); ?>
			<?php echo form_input(array("name"=>"name", "class"=>"h1 span12", "maxlength"=>"100", "placeholder"=>"Speaker Name")); ?></h1>
			<?php echo form_submit(array("value"=>"Add Speaker", "class"=>"btn btn-primary")); ?>
			<?php echo form_close(); ?>
		</div>
	</div>