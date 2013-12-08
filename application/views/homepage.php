		<div class="well">
			<h1>Welcome to the DICCU Talks system!</h1>
			<p>Here are some of the most recent talks:</p>
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
