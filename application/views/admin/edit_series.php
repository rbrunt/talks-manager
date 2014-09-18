	<div class="row">

<?php echo form_open_multipart(); ?>
		<div class="col-md-3" style="position:relative;">
			<div id="progress"></div>
			<div id="dropzone" class="img-drop"><h3>Drop file here to begin upload</h3></div>
			<img id="cover" class="img-responsive" src="<?php echo $artwork; ?>">
			<p><small>You can optionally upload a new cover artwork. Files must be of jpg or png format, and smaller than 500x500px.</small></p>
			<span class="btn btn-small btn-file btn-primary"><i class="fa fa-picture-o"></i> Select Cover...<?php echo form_upload(array("name"=>"userfile", "id"=>"fileselector")); ?></span>
			<a href="#" id="uploadlink" class="btn btn-small btn-success disabled"><i class="fa fa-upload"></i> Upload</a>
			<p><span id="filename"></span></p>
		</div>
		
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
						<?php echo form_input(array("name"=>"title", "value"=>$series[0]->title, "class"=>"h1 form-control", "maxlength"=>"100", "placeholder"=>"Series Title")); ?></h1>
				</div>
			</div>
			
			<hr>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group activate-tooltip" title="YouTube or Vimeo video of this event. Will be embedded in the talk's page." data-placement="bottom" data-container="body">
							<div class="input-group-addon"><i class="fa fa-youtube"></i></div>
							<?php echo form_input(array("type"=>"url", "class"=>"form-control", "name"=>"video", "value"=>$series[0]->video, "maxlength"=>"128", "placeholder"=>"YouTube or Vimeo Video URL")); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?php echo form_textarea(array("name"=>"summary", "value"=>$series[0]->summary,  "class"=>"form-control", "maxlength"=>"1000", "placeholder"=>"Series Summary")); ?></p>
						<?php echo form_hidden(array("id"=>$series[0]->id)); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
					<a class="btn" href="<?php echo base_url('/series/seriesdetail/'.$series[0]->id); ?>">Cancel</a>
					<a class="text-danger pull-right activate-tooltip click-to-confirm" title="Delete the series. Deletes all the talks that the series contains, including all uploaded files and artwork. CANNOT BE UNDONE!" href="#" data-href="<?php echo base_url('/admin/deleteseries/'.$series[0]->id); ?>">Delete Series</a>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
