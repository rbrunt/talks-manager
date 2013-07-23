<div class="row">
	<div class="span12">
	<div class="page-header">
		<h1><i class="icon-cog"></i> Admin Page <small>This is where the fun happens!</small></h1>
		<a class="btn btn-danger pull-right" href="<?php echo base_url("/admin/logout/"); ?>"><i class="icon-signout icon-white"></i> Logout</a>
		<p>Select an option below:</p>
	</div>
</div>
</div>
<div class="row">
	<div class="span3">
		<h4>Talks<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There are <?php echo $num_talks; ?> talks on the system"><?php echo $num_talks; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="<?php echo base_url('/admin/talks/'); ?>"><i class="icon-edit"></i> Manage Talks</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/addtalk/'); ?>"><i class="icon-plus"></i> Add Talk</a></li>
		</ul>
	</div>
	<div class="span3">
		<h4>Series<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There are <?php echo $num_series; ?> series on the system"><?php echo $num_series; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="<?php echo base_url('/admin/series/'); ?>"><i class="icon-edit"></i> Manage Series</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/addseries/'); ?>"><i class="icon-plus"></i> Add Series</a></li>
		</ul>
	</div>
	<div class="span3">
		<h4>Speakers<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There are <?php echo $num_speakers; ?> speakers on the system"><?php echo $num_speakers; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="#"><i class="icon-edit"></i> Manage Speakers</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/addspeaker/'); ?>"><i class="icon-plus"></i> Add Speaker</a></li>
		</ul>
	</div>
	<div class="span3">
		<h4>Users<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There <?php echo ($num_users == 1 ? "is " . $num_users . " user" : "are " . $num_users . " users"); ?> on the system"><?php echo $num_users; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="#"><i class="icon-edit"></i> Manage Users</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/adduser/'); ?>"><i class="icon-plus"></i> Add User</a></li>
		</ul>
	</div>
</div>
