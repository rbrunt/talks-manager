
		<div class="row">
			
			<div class="span3">
				<img src="http://placehold.it/500">
			</div>
			<div class="span9">
				<?php echo form_open("admin/edittalk"); ?>
				<div class="page-header">
					<?php 	echo form_input(array("name"=>"title", "value"=>$talk[0]->title, "class"=>"h1 span9", "maxlength"=>"128", "placeholder"=>"Talk Title"));
							echo form_dropdown("seriesid", $seriesarray, $talk[0]->seriesid); ?>
					<div class="input-prepend">
						<span class="add-on"><i class="icon-calendar"></i></span>
						<?php echo form_input( array("name"=>"date", "value"=>$talk[0]->date, "class"=>"span2", "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>
					</div>
				</div>
				<div class="input-prepend">
						<span class="add-on"><i class="icon-book"></i></span>
						<?php echo form_input(array("name"=>"passage", "value"=>$talk[0]->passage, "class"=>"span2", "maxlength"=>"50", "placeholder"=>"Passage")); ?>
					</div>
				<?php echo form_textarea(array("name"=>"summary", "value"=>$talk[0]->summary, "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Talk Summary")); ?>
				<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
				<?php echo form_hidden(array("id"=>$talk[0]->id, "speakerid"=>$talk[0]->speakerid)); ?>
			<?php echo form_close(); ?>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<!-- // <script src="/bootstrap/js/bootstrap.min.js"></script> -->
		<script src="<?php echo base_url('/bootstrap/js/bootstrap-datepicker.js')?>"></script>
		<script>
			$('#datepicker').datepicker({format:"yyyy-mm-dd"})
		</script>