<?php
	$this->load->view("_header");
?>

	<div class="row">
		<div class="span12">
		<ul class="breadcrumb">
			<li><a href="/">Home</a> <span class="divider">/</span></li>
			<li class="active"><?php echo $series[0]->title ?></li>
		</ul>
		</div>
	</div>
	<div class="row">
		<div class="span3">
			<img src="http://placehold.it/500">
		</div>
		<div class="span9">
			<div class="page-header">
				<h1><?php echo $series[0]->title ?></h1>
			</div>
			<p><?php echo $series[0]->summary ?></p>
			<p>A table of talks goes here...</p>
		</div>
	</div>

<?php
	$this->load->view("_footer");
?>