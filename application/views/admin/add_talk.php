
		<div class="row">
			
			<div class="col-md-3">
				<img id="artwork" src="<?php echo base_url("/files/covers/default.jpg"); ?>" class="img-responsive">
			</div>
			<div class="col-md-9">
				<?php echo form_open("admin/addtalk"); ?>
				<div class="row">
					<div class="col-md-12">
						<?=	form_input(array("name"=>"title", "class"=>"h1 form-control", "maxlength"=>"128", "placeholder"=>"Talk Title"));?>
					</div>
				</div>

				<div class="row">	
					<div class="col-md-4">
						<div class="form-group">
							<?=	form_label("Series", "seriesid");?>
							<?= form_dropdown("seriesid", $seriesarray, 0, 'id="seriesselector" class="form-control"');?>
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="form-group">
							<?= form_label("Speaker", "seriesid"); ?>
							<div class="input-group activate-tooltip" title="Who spoke? (You can leave it blank if you don't know)" data-placement="bottom" data-container="body">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<?php echo form_input(array("name"=>"speakername","maxlength"=>"64", "class"=>"form-control", "placeholder"=>"Speaker Name")); ?>
							</div>
						</div>
					</div>
				
					<div class="col-md-3">
						<div class="form-group">
							<?= form_label("Date", "datepicker"); ?>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<?php echo form_input( array("name"=>"date", "class"=>"form-control", "value"=>date("Y-m-d"), "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>
							</div>
						</div>
					</div>
				</div>
				
				<hr>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-book"></i></div>
								<?php echo form_input(array("name"=>"passage", "class"=>"form-control", "maxlength"=>"50", "placeholder"=>"Passage")); ?>
							</div>
						</div>
					</div>
				</div>
				
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
							<?php echo form_textarea(array("name"=>"summary", "class"=>"form-control", "maxlength"=>"1000", "placeholder"=>"Talk Summary")); ?>
							<?php echo form_hidden(array("uploadedby"=>1)); ?>
						</div>
					</div>
				
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_submit(array("value"=>"Submit", "class"=>"btn btn-primary pull-right")); ?>
						</div>
					</div>

				</div>
				
			
			<?php echo form_close(); ?>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<!-- // <script src="/bootstrap/js/bootstrap.min.js"></script> -->
		<script src="<?php echo base_url('/bootstrap/js/bootstrap-datepicker.js')?>"></script>
		<script>
			$('#datepicker').datepicker({format:"yyyy-mm-dd"})
		</script>