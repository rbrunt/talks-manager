<div class="row">
			<div class="span12">
				<?php //$this->load->view("includes/_info_messages"); ?>
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo base_url('/series/seriesdetail/'.$talk[0]->seriesid)?>"><?php echo $talk[0]->seriestitle; ?></a> <span class="divider">/</span></li>
					<li class="active"><?php echo $talk[0]->title ?></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<img src="<?php echo $artwork; ?>">
				<h4><?php echo $talk[0]->seriestitle; ?></h4>
			</div>
			<div class="span9">
				<div class="page-header">
					<h1><?php echo $talk[0]->title ?> <small class="nowrap"><?php echo $talk[0]->speakername ?></small></h1>
<?php if($isLoggedIn) : ?>					
					<a class="btn btn-primary pull-right" title="Edit this talk" href="<?php echo base_url('/admin/edittalk/'.$talk[0]->id);?>">Edit</a>
<?php endif; ?>					
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
<?php if($talk[0]->passage != ""): ?>
				<p>Passage: <a id="passagelink" href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk[0]->passage;?>" target="_blank"><?php echo $talk[0]->passage; ?></a></p>
<?php endif; ?>
				<p id="summary"><?php echo $talk[0]->summary ?></p>
<?php if($talk_exists) : ?>
				<audio controls preload="none" src="<?php echo base_url("files/talks/".$talk[0]->id); ?>.mp3" type="audio/mpeg">
					<!-- Add flash fallback here... -->
				</audio>
				<p><a href="<?php echo base_url("download/talk/".$talk[0]->id); ?>">download</a></p>
<?php else : ?>
				<p class="text-warning"><i class="icon-warning-sign"></i> There's no audio uploaded yet, but it should be added soon!</p>
<?php endif; ?>				
			</div>
		</div>
<?php if($talk[0]->passage != ""): ?>		
		<div class="row">
			<div class="span12">
				<p class="muted" id="copyright-notice"><small>Scripture quotations marked &quot;ESV&quot; are taken from The Holy Bible, English Standard Version. Copyright &copy;2001 by <a href="http://www.crosswaybibles.org">Crossway Bibles</a>, a publishing ministry of Good News Publishers. Used by permission. All rights reserved. Text provided by the <a href="http://www.gnpcb.org/esv/share/services/">Crossway Bibles Web Service</a></small></p>
			</div>
<?php endif; ?>
		</div>