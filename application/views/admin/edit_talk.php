
		<div class="row">
			
			<div class="span3">
				<img src="<?php echo $artwork; ?>">
			</div>
			<div class="span9">
				<?php echo form_open("admin/edittalk"); ?>
				<div class="page-header">
					<?php 	echo form_input(array("name"=>"title", "value"=>$talk[0]->title, "class"=>"h1 span9", "maxlength"=>"128", "placeholder"=>"Talk Title"));
							echo form_dropdown("seriesid", $seriesarray, $talk[0]->seriesid, 'class="span3"'); ?>
					<div class="input-prepend activate-tooltip" title="Date of the Talk. Click to open a calendar picker, or just type a date in." data-placement="bottom">
						<span class="add-on"><i class="icon-calendar"></i></span>
						<?php echo form_input( array("name"=>"date", "value"=>$talk[0]->date, "class"=>"span2", "id"=>"datepicker", "placeholder"=>"yyyy-mm-dd")); ?>
					</div>
					<div class="input-prepend  activate-tooltip" title="Who spoke? (You can leave it blank if you don't know)" data-placement="bottom" data-container="body">
						<span class="add-on"><i class="icon-user"></i></span>
						<?php echo form_input(array("name"=>"speakername", "value"=>$talk[0]->speakername, "class"=>"span3", "placeholder"=>"Speaker Name")); ?>
					</div>
				</div>
				<?php if($talk[0]->exists):?>
					<p class="text-success"><i class="icon-ok"></i> An mp3 has been uploaded for this talk. If you want to replace the current file, just <a href="<?php echo base_url('/admin/uploadtalk/'.$talk[0]->id); ?>">upload a new one</a>.</p><a title="Delete the mp3 from the server. Does not delete the talk entry on the website, just the file. CANNOT BE UNDONE!" data-placement="bottom" class="btn btn-small btn-danger pull-right activate-tooltip" id="deletebutton" href="<?php echo base_url('/admin/deletetalkfile/'.$talk[0]->id); ?>">Delete mp3</a>
				<?php else: ?>
					<p class="text-error"><i class="icon-warning-sign"></i> No audio has been uploaded yet for this talk. To do it now, <a href="<?php echo base_url('/admin/uploadtalk/'.$talk[0]->id); ?>">click here</a>.</p>
				<?php endif; ?>
				<div class="input-prepend">
						<span class="add-on"><i class="icon-book"></i></span>
						<?php echo form_input(array("name"=>"passage", "value"=>$talk[0]->passage, "class"=>"span3", "maxlength"=>"50", "placeholder"=>"Passage")); ?>
					</div>
				<?php echo form_textarea(array("name"=>"summary", "value"=>$talk[0]->summary, "class"=>"span9", "maxlength"=>"1000", "placeholder"=>"Talk Summary")); ?>
				<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
				<a class="btn" href="<?php echo base_url('/talks/talk/'.$talk[0]->id); ?>">Cancel</a>
				<a id="deletebutton" class="btn btn-danger pull-right activate-tooltip" title="Delete the mp3 on the server and all the talk details from the database. CANNOT BE UNDONE!" href="<?php echo base_url('/admin/deletetalk/'.$talk[0]->id); ?>">Delete Talk</a>
				<?php echo form_hidden(array("id"=>$talk[0]->id)); ?>
			<?php echo form_close(); ?>
			</div>
		</div>