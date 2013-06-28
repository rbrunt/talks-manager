	<div class="row">
		<div class="span12">
			<?php echo form_open("admin/editspeaker"); ?>
			<?php echo form_input(array("name"=>"name", "value"=>$speaker[0]->name, "class"=>"h1 span12", "maxlength"=>"100", "placeholder"=>"Speaker Name")); ?></h1>
			<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
			<?php echo form_hidden(array("id"=>$speaker[0]->id)); ?>
			<?php echo form_close(); ?>
		</div>
	</div>
