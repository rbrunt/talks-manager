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
		<div class="row">
			<div class="span12">
			<hr>
				<?php echo form_open_multipart(); ?>
				<?php echo form_upload(array("name"=>"userfile")); ?>
				<?php echo form_submit(array("value"=>"Upload", "class"=>"btn btn-primary")); ?>
				<?php echo form_close(); ?>
			<hr>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<img src="http://placehold.it/500">
				<h4><?php echo $talk[0]->seriestitle; ?></h4>
			</div>
			<div class="span9">
				<div class="page-header">
					<h1><?php echo $talk[0]->title ?> <br><small><?php echo $talk[0]->speakername ?></small></h1>
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
				<p>Passage: <a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk[0]->passage;?>" target="_blank"><?php echo $talk[0]->passage; ?></a></p>
				<p id="summary"><?php echo $talk[0]->summary ?></p>
				<p><a href="#">download</a></p>
			</div>
		</div>