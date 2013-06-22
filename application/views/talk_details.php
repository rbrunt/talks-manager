<?php
	$this->load->view("_header");
?>
<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<li><a href="/">Home</a> <span class="divider">/</span></li>
					<li><a href="category.html">Some Category</a> <span class="divider">/</span></li>
					<li class="active"><?php echo $talk[0]->title ?></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<img src="http://placehold.it/500">
			</div>
			<div class="span9">
				<div class="page-header">
					<h1><?php echo $talk[0]->title ?> <small>SpeakerID: <?php echo $talk[0]->speakerid ?></small></h1>
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
				<p>Passage: <a href=<?php echo "\"http://www.biblegateway.com/passage/?search=".$talk[0]->passage."\">";?><?php echo $talk[0]->passage; ?></a></p>
				<p><?php echo $talk[0]->summary ?></p>
				<p><a href="#">download</a></p>
			</div>
		</div>

<?php
	$this->load->view("_footer");
?>