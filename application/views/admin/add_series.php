	<div class="row">

		<div class="col-md-3">
			<img class="img-responsive" src="http://placehold.it/500">
		</div>
		<div class="col-md-9">
			<?php echo form_open("admin/addseries"); ?>
			<div class="row">
				<div class="col-md-12">
					<?php echo form_input(array("name"=>"title", "class"=>"h1 form-control", "maxlength"=>"100", "placeholder"=>"Series Title")); ?></h1>
				</div>
			</div>

			<hr>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group activate-tooltip" title="YouTube or Vimeo video of this event. Will be embedded in the talk's page." data-placement="bottom" data-container="body">
							<div class="input-group-addon"><i class="fa fa-youtube"></i></div>
							<?php echo form_input(array("type"=>"url", "class"=>"form-control", "name"=>"video", "maxlength"=>"128", "placeholder"=>"YouTube or Vimeo Video URL")); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?php echo form_textarea(array("name"=>"summary",  "class"=>"form-control", "maxlength"=>"1000", "placeholder"=>"Series Summary")); ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<?php echo form_submit(array("value"=>"Add Series", "class"=>"btn btn-primary pull-right")); ?>
					</div>
				</div>
			</div>			
			<?php echo form_close(); ?>
		</div>
	</div>