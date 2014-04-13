	<div class="row">

<?php echo form_open_multipart(); ?>
		<div class="span3" style="position:relative;">
			<div id="progress"></div>
			<!-- <div id="dragtarget" class="img-drop"><div id="progress"></div><h3>Drop file here to begin upload</h3></div> -->
			<div id="dropzone" class="img-drop"><h3>Drop file here to begin upload</h3></div>
			<img id="cover" src="<?php echo $artwork; ?>">
			<p><small>You can optionally upload a new cover artwork. Files must be of jpg or png format, and smaller than 500x500px.</small></p>
			<span class="btn btn-small btn-file"><i class="icon-picture"></i> Select Cover...<?php echo form_upload(array("name"=>"userfile", "id"=>"fileselector")); ?></span>
			<a href="#" id="uploadlink" class="btn btn-small btn-success disabled"><i class="icon-upload-alt icon-white"></i> Upload</a>
			<p><span id="filename"></span></p>
		</div>
		<div class="span9">
			<div class="page-header">
				<!-- <?php echo form_open_multipart(); ?>-->
				<?php echo form_input(array("name"=>"title", "value"=>$series[0]->title, "class"=>"h1 span9", "maxlength"=>"100", "placeholder"=>"Series Title")); ?></h1>
			</div>
			<?php echo form_open(); ?>
			<div class="row">
				<div class="input-prepend activate-tooltip span6" title="YouTube or Vimeo video of this event. Will be embedded in the talk's page." data-placement="bottom" data-container="body">
						<span class="add-on"><i class="icon-facetime-video"></i></span>
						<?php echo form_input(array("type"=>"url", "class"=>"span6", "name"=>"video", "value"=>$series[0]->video, "maxlength"=>"128", "placeholder"=>"Video URL")); ?>
				</div>
			</div>
			<?php echo form_textarea(array("name"=>"summary", "value"=>$series[0]->summary,  "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Series Summary")); ?></p>
			<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
			<a class="btn" href="<?php echo base_url('/series/seriesdetail/'.$series[0]->id); ?>">Cancel</a>
			<a class="text-error pull-right activate-tooltip click-to-confirm" title="Delete the series. Deletes all the talks that the series contains, including all uploaded files and artwork. CANNOT BE UNDONE!" href="#" data-href="<?php echo base_url('/admin/deleteseries/'.$series[0]->id); ?>">Delete Series</a>
			<?php echo form_hidden(array("id"=>$series[0]->id)); ?>
			<?php echo form_close(); ?>
		</div>
	</div>
