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
					<h1><?php echo $talk[0]->title ?> <small><?php echo $talk[0]->speakername ?></small></h1>
<?php if($isLoggedIn) : ?>					
					<a class="btn btn-primary pull-right" href="<?php echo base_url('/admin/edittalk/'.$talk[0]->id);?>">Edit</a>
<?php endif; ?>					
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
				<p>Passage: <a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk[0]->passage;?>" target="_blank"><?php echo $talk[0]->passage; ?></a></p>
				<p id="summary"><?php echo $talk[0]->summary ?></p>
				<audio controls preload="none" src="<?php echo base_url("files/talks/".$talk[0]->id); ?>.mp3" type="audio/mpeg">
					<!-- Add flash fallback here... -->
				</audio>
				<p><a href="#">download</a></p>
			</div>
		</div>