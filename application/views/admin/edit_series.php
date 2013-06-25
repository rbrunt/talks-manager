	<div class="row">

		<div class="span3">
			<img src="http://placehold.it/500">
		</div>
		<div class="span9">
			<?php echo form_open("admin/editseries"); ?>
			<div class="page-header">
				<?php echo form_input(array("name"=>"title", "value"=>$series[0]->title, "class"=>"h1 span9", "maxlength"=>"100", "placeholder"=>"Series Title")); ?></h1>
			</div>
			<?php echo form_textarea(array("name"=>"summary", "value"=>$series[0]->summary,  "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Series Summary")); ?></p>
			<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
			<?php echo form_hidden(array("id"=>$series[0]->id)); ?>
			<?php echo form_close(); ?>
		</div>
	</div>
