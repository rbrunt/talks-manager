	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider"></span></li>
				<li class="active"><?php echo $breadcrumb; ?></li>
			</ul>
		</div>
	</div>
<?php if ($talks != false):?>
<?php foreach($talks as $talk): ?>
	<div class="category">
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><img src="<?php echo $artwork[$talk->id]; ?>" class="img-responsive"></a>
			</div>
			<div class="col-md-9">
				<h1><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title; ?></a> <small class="activate-tooltip" title="<?php echo $talk->date; ?>"><?php echo relative_time($talk->date); ?></small></h1>
				<?php if($talk->speakername != "") : ?>
					<p class="muted"><i class="icon-user"></i> <?php echo $talk->speakername; ?></p>
				<?php endif;?>
				<div id="categorydescription">
					<p><?php echo $talk->summary; ?></p>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php echo $this->pagination->create_links(); ?>
<?php else: ?>
	<div class="jumbotron">
		<h1>Nothing here <small>:(</small></h1>
		<p>There aren't any talks to go here right now - try checking back another time! Since you're here anyway, why not check out some <a href="<?php echo base_url("talks/"); ?>">recent talks</a></p>
	</div>
<?php endif; ?>