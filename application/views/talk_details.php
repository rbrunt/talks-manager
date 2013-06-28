<div class="row">
			<div class="span12">
				<?php //$this->load->view("includes/_info_messages"); ?>
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo base_url('/series/seriesdetail/'.$series[0]->id)?>"><?php echo $series[0]->title; ?></a> <span class="divider">/</span></li>
					<li class="active"><?php echo $talk[0]->title ?></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<img src="http://placehold.it/500">
				<h4><?php echo $series[0]->title; ?></h4>
			</div>
			<div class="span9">
				<div class="page-header">
					<h1><?php echo $talk[0]->title ?> <small>SpeakerID: <?php echo $talk[0]->speakerid ?></small></h1>
					<a class="btn btn-primary pull-right" href="<?php echo base_url('/admin/edittalk/'.$talk[0]->id);?>">Edit</a>
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
				<p>Passage: <a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk[0]->passage;?>" target="_blank"><?php echo $talk[0]->passage; ?></a></p>
				<p id="summary"><?php echo $talk[0]->summary ?></p>
				<p><a href="#">download</a></p>
			</div>
		</div>