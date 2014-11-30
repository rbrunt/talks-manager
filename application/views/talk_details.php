		<div class="row">
			<div class="col-md-12">
				<?php //$this->load->view("includes/_info_messages"); ?>
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li><a href="<?php echo base_url($talk[0]->seriesslug)?>"><?php echo $talk[0]->seriestitle; ?></a></li>
					<li class="active"><?php echo $talk[0]->title ?></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 hidden-xs">
				<img src="<?php echo $artwork; ?>" class="img-responsive">
			</div>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-xs-4 visible-xs-block">
							<img src="<?php echo $artwork; ?>" class="img-responsive">
					</div>
					<div class="col-xs-8 col-sm-12">
						<h1 class="talk-title"><?php echo $talk[0]->title ?> <small class="nowrap"><?php echo $talk[0]->speakername ?></small></h1>
	<?php if($isLoggedIn) : ?>					
						<a class="btn btn-primary pull-right" title="Edit this talk" href="<?php echo base_url('/admin/edittalk/'.$talk[0]->id);?>">Edit</a>
	<?php endif; ?>					
						<p class="muted"><span class="activate-tooltip" title="<?php echo $talk[0]->date;?>" data-placement="bottom"><?php echo relative_time($talk[0]->date); ?></span></p>
					</div>
				</div><hr>
<?php if($talk[0]->passage != ""): ?>
				<p class="clearfix">Passage: <a id="passagelink" href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk[0]->passage;?>" target="_blank"><?php echo $talk[0]->passage; ?></a></p>
<?php endif; ?>
				<div id="summary"><?php echo $this->typography->auto_typography($talk[0]->summary) ?></div>
<?php if($talk[0]->questionsenabled && $talk[0]->date ==  date('Y-m-d')): ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-success clearfix">
			<div class="bg-success panel-body">
					<?= form_open('talks/talk/'.$talk[0]->id.'/submitquestion'); ?>
						<div class="form-group">
							<?= form_label("Questions", "question_input"); ?>
							<p class="help-block">You can anonymously ask a question about the talk, or Christianity in general using the form below:</p>
							<?= form_textarea(array("name"=>"question", "id"=>"question_input", "class"=>"form-control", "placeholder"=>"Write your question here, then hit &quot;Submit Question&quot;."));?>
						</div>
						<div class="form-group">
							<?= form_submit(array("value"=>"Submit Question", "class"=>"btn btn-primary pull-right"));?>
						</div>
				</div>
				</div>
					<?= form_close(); ?>
		</div>
	</div>
<?php endif; ?>
<?php if($talk[0]->video) :?>
	<div class="embed-responsive embed-responsive-16by9">
	<?php if (preg_match("/(?:https?:\/\/(?:www.)?youtube.com\/watch\?(?:[a-zA-Z0-9_=&]*&)?v=)([a-zA-Z0-9_-]*)/", $talk[0]->video, $matches)) :?>
		<iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $matches[1]; ?>" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
	<?php elseif (preg_match("/(?:https?:\/\/(?:www.)?vimeo.com\/)([0-9]+)/", $talk[0]->video, $matches)) :?>
		<iframe class="embed-responsive-item" src="//player.vimeo.com/video/<?php echo $matches[1];?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<?php endif ;?>
	</div>
<?php endif; ?>
<?php if($talk_exists) : ?>
				<audio controls preload="none" src="<?php echo base_url("files/talks/".$talk[0]->id); ?>.mp3" type="audio/mpeg" class="col-xs-12 col-sm-6">
					<!-- Add flash fallback here... -->
				</audio>
				<p><a href="<?php echo base_url("download/talk/".$talk[0]->id); ?>" class="btn btn-default pull-right"><i class="fa fa-download"></i> Download Talk</a></p>
<?php else : ?>
	<?php if($isLoggedIn) :?>
				<p class="text-warning"><i class="fa fa-warning"></i> There's no audio uploaded yet, <a href="<?php echo base_url("admin/uploadtalk/".$talk[0]->id); ?>">click here</a> to add some</p>
	<?php elseif(strtotime($talk[0]->date) > time() ) :?>
				<p class="text-warning"><i class="fa fa-warning"></i> There's no audio uploaded yet, but it should be added soon!</p>
	<?php endif; ?>
<?php endif; ?>				
			</div>
		</div>
<?php if($talk[0]->passage != ""): ?>		
		<div class="row">
			<div class="col-md-12">
				<p class="muted" id="copyright-notice"><small>Scripture quotations marked &quot;ESV&quot; are taken from The Holy Bible, English Standard Version. Copyright &copy;2001 by <a href="http://www.crosswaybibles.org">Crossway Bibles</a>, a publishing ministry of Good News Publishers. Used by permission. All rights reserved. Text provided by the <a href="http://www.gnpcb.org/esv/share/services/">Crossway Bibles Web Service</a></small></p>
			</div>
<?php endif; ?>
		</div>