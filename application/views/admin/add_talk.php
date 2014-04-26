
		<div class="row">
			
			<div class="span3">
				<img id="artwork" src="<?php echo base_url("/files/covers/default.jpg"); ?>">
			</div>
			<div class="span9">
				<?php echo form_open("admin/addtalk"); ?>
				<div class="page-header">
					<?php 	echo form_input(array("name"=>"title", "class"=>"h1 span9", "maxlength"=>"128", "placeholder"=>"Talk Title"));
							echo form_label("Series", "seriesid");
							echo form_dropdown("seriesid", $seriesarray, 0, 'class="span3" id="seriesselector"');
							echo form_label("Speaker", "seriesid"); ?>
					<div class="input-prepend  activate-tooltip" title="Who spoke? (You can leave it blank if you don't know)" data-placement="bottom" data-container="body">
						<span class="add-on"><i class="icon-user"></i></span>
						<?php echo form_input(array("name"=>"speakername","maxlength"=>"64", "class"=>"span3", "placeholder"=>"Speaker Name")); ?>
					</div>
					<div class="input-prepend">
						<span class="add-on"><i class="icon-calendar"></i></span>
						<?php echo form_input( array("name"=>"date", "class"=>"span2", "value"=>date("Y-m-d"), "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>
					</div>
				</div>
				<div class="row">
					<div class="input-prepend activate-tooltip span6" title="YouTube or Vimeo video of this event. Will be embedded in the talk's page." data-placement="bottom" data-container="body">
							<span class="add-on"><i class="icon-youtube"></i></span>
							<?php echo form_input(array("type"=>"url", "class"=>"span6", "name"=>"video", "maxlength"=>"128", "placeholder"=>"YouTube or Vimeo Video URL")); ?>
					</div>
				</div>
				<div class="row">
					<div class="input-prepend span3">
							<span class="add-on"><i class="icon-book"></i></span>
							<?php echo form_input(array("name"=>"passage", "class"=>"span3", "maxlength"=>"50", "placeholder"=>"Passage")); ?>
					</div>
				</div>
				<?php echo form_textarea(array("name"=>"summary", "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Talk Summary")); ?>
				<?php echo form_hidden(array("uploadedby"=>1)); ?>
				<?php echo form_submit(array("value"=>"Submit", "class"=>"btn btn-primary")); ?>
			<?php echo form_close(); ?>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<!-- // <script src="/bootstrap/js/bootstrap.min.js"></script> -->
		<script src="<?php echo base_url('/bootstrap/js/bootstrap-datepicker.js')?>"></script>
		<script>
			$('#datepicker').datepicker({format:"yyyy-mm-dd"})
		</script>