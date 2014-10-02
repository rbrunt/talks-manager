	<div class="well">
		<h1>Welcome to the DICCU Talks system!</h1>
		<p>Here are some of the most recent talks, as well as a few that are coming soon:	</p>
	</div>
<div class="clearfix">
<?php if(is_array($todaystalks)) :?>
<section id="talksontoday">
	<h2>Talks on Today:</h2>
	<?php foreach($todaystalks as $talk): ?>
			<div class="category">
				<div class="row">
					<div class="col-sm-3">
						<a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><img src="<?php echo $artwork[$talk->id]; ?>" class="img-responsive"></a>
					</div>
					<div class="col-sm-9">
						<h1 class="media-heading"><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title; ?></a> <small>Today</small></h1>
						<?php if($talk->speakername != "") : ?>
							<p class="muted"><i class="fa fa-user"></i> <?php echo $talk->speakername; ?></p>
						<?php endif;?>
						<div id="categorydescription">
							<p><?php echo $talk->summary; ?></p>
						</div>
						<?php if($talk->questionsenabled):?>
							<div class="panel panel-success clearfix"><div class="panel-heading">
								<a href="<?php echo base_url('/talks/talk/'.$talk->id.'/#question_input')?>" class="btn btn-success pull-right">Ask a question <i class="fa fa-angle-right"></i></a><p class="h5 text-success">You can ask questions via the website for this talk!</p>
							</div></div>
						<?php endif;?>
					</div>
				</div>
			</div>
	<?php endforeach; ?>
</section>
<hr>
<section>
<h2>Recent Talks:</h2>	
<?php else: ?>
<section>
<?php endif;?>
<?php foreach($talks as $talk): ?>
	<div class="category">
		<div class="row">
			<div class="col-sm-3">
				<a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><img src="<?php echo $artwork[$talk->id]; ?>" class="img-responsive"></a>
			</div>
			<div class="col-sm-9">
				<h1 class="media-heading"><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title; ?></a> <small class="activate-tooltip" title="<?php echo $talk->date; ?>"><?php echo relative_time($talk->date); ?></small></h1>
				<?php if($talk->speakername != "") : ?>
					<p class="muted"><i class="fa fa-user"></i> <?php echo $talk->speakername; ?></p>
				<?php endif;?>
				<div id="categorydescription">
					<p><?php echo $talk->summary; ?></p>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<a class="pull-right" href="<?php echo base_url("talks"); ?>">See more Recent Talks <i class="fa fa-angle-right"></i></a>
</section>
</div>
<?php if(is_array($futuretalks)) :?>
	
	<hr>
<section>
	<h2>Coming soon:</h2>
	<?php foreach($futuretalks as $talk): ?>
			<div class="category">
				<div class="row">
					<div class="col-sm-3">
						<a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><img src="<?php echo $artwork[$talk->id]; ?>" class="img-responsive"></a>
					</div>
					<div class="col-sm-9">
						<h1 class="media-heading"><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title; ?></a> <small class="activate-tooltip" title="<?php echo $talk->date; ?>"><?php echo relative_time($talk->date); ?></small></h1>
						<?php if($talk->speakername != "") : ?>
							<p class="muted"><i class="fa fa-user"></i> <?php echo $talk->speakername; ?></p>
						<?php endif;?>
						<div id="categorydescription">
							<p><?php echo $talk->summary; ?></p>
						</div>
					</div>
				</div>
			</div>
			
	<?php endforeach; ?>
	<a class="pull-right" href="<?php echo base_url("talks/future"); ?>">See more Coming Soon <i class="fa fa-angle-right"></i></a>
	</section>
<?php endif; ?>
