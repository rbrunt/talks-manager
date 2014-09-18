
		<div class="row">
			
			<div class="col-md-3">
				<img id="artwork" class="img-responsive" src="<?php echo $artwork; ?>">
			</div>
			<div class="col-md-9">
				<?php echo form_open("admin/edittalk"); ?>
				<div class="row">
					<div class="col-md-12">
						<?= form_input(array("name"=>"title", "value"=>$talk[0]->title, "class"=>"h1 form-control", "maxlength"=>"128", "placeholder"=>"Talk Title"));?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<?= form_label("Series", "seriesselector");?>
							<?= form_dropdown("seriesid", $seriesarray, $talk[0]->seriesid, 'class="form-control" id="seriesselector"'); ?>
						</div>
					</div>

					<div class="col-md-5">
						<div class="form-group">
							<?= form_label("Speaker", "speakername");?>
							<div class="input-group  activate-tooltip" title="Who spoke? (You can leave it blank if you don't know)" data-placement="bottom" data-container="body">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<?php echo form_input(array("id"=>"speakername","name"=>"speakername", "value"=>$talk[0]->speakername, "class"=>"form-control", "placeholder"=>"Speaker Name")); ?>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<?= form_label("Date","datepicker");?>
							<div class="input-group activate-tooltip" title="Date of the Talk. Click to open a calendar picker, or just type a date in." data-placement="bottom">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							<?php echo form_input( array("name"=>"date", "value"=>$talk[0]->date, "class"=>"form-control", "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>		
							</div>
						</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<?php if($talk[0]->exists):?>
							<p class="text-success"><i class="icon-ok"></i> An mp3 has been uploaded for this talk. If you want to replace the current file, just <a href="<?php echo base_url('/admin/uploadtalk/'.$talk[0]->id); ?>">upload a new one</a>.</p><a title="Delete the mp3 from the server. Does not delete the talk entry on the website, just the file. CANNOT BE UNDONE!" data-placement="bottom" class="text-error pull-right activate-tooltip click-to-confirm" href="#" data-href="<?php echo base_url('/admin/deletetalkfile/'.$talk[0]->id); ?>">Delete mp3</a>
						<?php else: ?>
							<p class="text-error"><i class="icon-warning-sign"></i> No audio has been uploaded yet for this talk. To do it now, <a href="<?php echo base_url('/admin/uploadtalk/'.$talk[0]->id); ?>">click here</a>.</p>
						<?php endif; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-book"></i></div>
								<?php echo form_input(array("name"=>"passage", "value"=>$talk[0]->passage, "maxlength"=>"50", "placeholder"=>"Passage", "class"=>"form-control")); ?>
							</div>
						</div>
					</div>
				</div>		

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group activate-tooltip span6" title="YouTube or Vimeo video of this event. Will be embedded in the talk's page." data-placement="bottom" data-container="body">
								<div class="input-group-addon"><i class="fa fa-youtube"></i></div>
								<?php echo form_input(array("type"=>"url", "class"=>"form-control", "name"=>"video", "value"=>$talk[0]->video, "maxlength"=>"128", "placeholder"=>"YouTube or Vimeo Video URL")); ?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?= form_label("Summary", "summary");?>
							<?php echo form_textarea(array("name"=>"summary", "value"=>$talk[0]->summary, "class"=>"form-control", "maxlength"=>"1000", "placeholder"=>"Talk Summary", "id"=>"summary")); ?>
							<?php echo form_hidden(array("id"=>$talk[0]->id)); ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
							<a class="btn" href="<?php echo base_url('/talks/talk/'.$talk[0]->id); ?>">Cancel</a>
							<a class="text-danger pull-right activate-tooltip click-to-confirm" title="Delete the mp3 on the server and all the talk details from the database. CANNOT BE UNDONE!" href="#" data-href="<?php echo base_url('/admin/deletetalk/'.$talk[0]->id); ?>">Delete Talk</a>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			</div>
		</div>