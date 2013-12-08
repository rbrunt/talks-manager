	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
				<li class="active"><?php echo $breadcrumb; ?></li>
			</ul>
		</div>
	</div>

<?php foreach($talks as $talk): ?>
	<div class="category">
		<div class="row">
			<div class="span3">
				<a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><img src="<?php echo $artwork[$talk->id]; ?>"></a>
			</div>
			<div class="span9">
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