
		<div class="row">
			
			<div class="span3">
				<img src="http://placehold.it/500">
			</div>
			<div class="span9">
				<?php echo form_open("admin/addtalk"); ?>
				<div class="page-header">
					<?php 	echo form_input(array("name"=>"title", "class"=>"h1 span9", "maxlength"=>"128", "placeholder"=>"Talk Title"));
							echo form_label("Series", "seriesid");
							echo form_dropdown("seriesid", $seriesarray, 'class="span3"');
							echo form_label("Speaker", "seriesid");
							echo form_dropdown("speakerid", $speakersarray, 'class="span3"'); ?>
					<div class="input-prepend">
						<span class="add-on"><i class="icon-calendar"></i></span>
						<?php echo form_input( array("name"=>"date", "class"=>"span2", "value"=>date("Y-m-d"), "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>
					</div>
				</div>
				<div class="input-prepend">
						<span class="add-on"><i class="icon-book"></i></span>
						<?php echo form_input(array("name"=>"passage", "class"=>"span3", "maxlength"=>"50", "placeholder"=>"Passage")); ?>
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