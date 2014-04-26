	<div class="row">

		<div class="span3">
			<img src="http://placehold.it/500">
		</div>
		<div class="span9">
			<?php echo form_open("admin/addseries"); ?>
			<div class="page-header">
				<?php echo form_input(array("name"=>"title", "class"=>"h1 span9", "maxlength"=>"100", "placeholder"=>"Series Title")); ?></h1>
			</div>
			<div class="row">
				<div class="input-prepend activate-tooltip span6" title="YouTube or Vimeo video of this event. Will be embedded in the talk's page." data-placement="bottom" data-container="body">
					<span class="add-on"><i class="icon-youtube"></i></span>
					<?php echo form_input(array("type"=>"url", "class"=>"span6", "name"=>"video", "maxlength"=>"128", "placeholder"=>"YouTube or Vimeo Video URL")); ?>
				</div>
			</div>
			<?php echo form_textarea(array("name"=>"summary",  "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Series Summary")); ?></p>
			<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
			<?php echo form_close(); ?>
		</div>
	</div>