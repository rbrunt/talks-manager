<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url("admin")?>">Admin</a> <span class="divider">/</span></li>
					<li>Add Talk <span class="divider">/</span></li>
					<li class="active">Upload mp3</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<a class="btn btn-block" data-toggle="collapse" data-target="#mp3help"><i class="icon-caret-down"></i> Click to show mp3 File Requirements <i class="icon-caret-down"></i></a>
				<div id="mp3help" class="collapse">
					<p>The talk has been added to the database, now you just need to upload the recording!</p>
					<p>Only mp3s will be accepted, we recommend that you export the mp3 from audacity with the following settings:</p>
					<table class="table">
						<tbody>
							<tr>
								<th>Audio Chanels</th>
								<td>Use mono audio</td>
							</tr>
							<tr>
								<th>Codec Settings</th>
								<td>Use the LAME codec in Audacity, using 32kbps variable bitrate</td>
							</tr>
							<tr>
								<th>File Size</th>
								<td>You can upload files up to 100MB onto this website, but try to keep the file to about 15-20MB for an hour long talk.</td>
							</tr>
						</tbody>
					</table>
					<p>Once you've done that, just choose the file in the form below, then hit upload!</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span12" style="position:relative;">
			<div id="dropzone" style="display:none;"><h3>Drop file here to begin upload</h3></div>
			<hr>
				<p>Click "Select MP3 File..." below to pick an MP3 file from your computer, check that the correct filename is displyed, then hit the "Upload" button. Alternatively, drag and drop the mp3 file from your desktop into the box that appears.</p>
				<p><span class="btn btn-file"><i class="icon-file"></i> <span id="filename">Select MP3 File to upload...</span><?php echo form_upload(array("name"=>"userfile", "id"=>"mp3selector", "accept"=>".mp3")); ?></span>
				<a href="#" id="uploadlink" class="btn btn-small btn-success disabled"><i class="icon-upload-alt icon-white"></i> Upload</a> <a href="#" class="text-error" id="cancelbutton">Cancel</a>
				<!-- <span class="label pull-right" id="progresstext"></span> -->
				</p>
				<strong id="progressdescription">Upload Progress:</strong><span class="pull-right" id="progresstext"></span>
				<div class="progress hide" style="position: relative;">
					<div class="bar" style=""></div>
				</div>
			<hr>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<img src="<?php echo $artwork; ?>">
				<h4><?php echo $talk[0]->seriestitle; ?></h4>
			</div>
			<div class="span9">
				<div class="page-header">
					<h1><?php echo $talk[0]->title ?> <br><small><?php echo $talk[0]->speakername ?></small></h1>
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
				<p>Passage: <a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk[0]->passage;?>" target="_blank"><?php echo $talk[0]->passage; ?></a></p>
				<p id="summary"><?php echo $talk[0]->summary ?></p>
			</div>
		</div>