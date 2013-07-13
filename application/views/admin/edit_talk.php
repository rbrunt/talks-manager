
		<div class="row">
			
			<div class="span3">
				<img src="<?php echo $artwork; ?>">
			</div>
			<div class="span9">
				<?php echo form_open("admin/edittalk"); ?>
				<div class="page-header">
					<?php 	echo form_input(array("name"=>"title", "value"=>$talk[0]->title, "class"=>"h1 span9", "maxlength"=>"128", "placeholder"=>"Talk Title"));
							echo form_dropdown("seriesid", $seriesarray, $talk[0]->seriesid, 'class="span3"'); ?>
					<div class="input-prepend">
						<span class="add-on"><i class="icon-calendar"></i></span>
						<?php echo form_input( array("name"=>"date", "value"=>$talk[0]->date, "class"=>"span2", "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>
					</div>
					<?php echo form_dropdown("speakerid", $speakerarray, $talk[0]->speakerid, 'class="span3"'); ?>
				</div>
				<div class="input-prepend">
						<span class="add-on"><i class="icon-book"></i></span>
						<?php echo form_input(array("name"=>"passage", "value"=>$talk[0]->passage, "class"=>"span3", "maxlength"=>"50", "placeholder"=>"Passage")); ?>
					</div>
				<?php echo form_textarea(array("name"=>"summary", "value"=>$talk[0]->summary, "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Talk Summary")); ?>
				<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
				<?php echo form_hidden(array("id"=>$talk[0]->id)); ?>
			<?php echo form_close(); ?>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<!-- // <script src="/bootstrap/js/bootstrap.min.js"></script> -->
		<script src="<?php echo base_url('/bootstrap/js/bootstrap-datepicker.js')?>"></script>
		<script>
			$('#datepicker').datepicker({format:"yyyy-mm-dd"})
		</script>