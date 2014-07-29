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
	<div class="span4">
		<h4>Talks<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There are <?php echo $num_talks; ?> talks on the system"><?php echo $num_talks; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="<?php echo base_url('/admin/talks/'); ?>"><i class="icon-edit"></i> Manage Talks</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/addtalk/'); ?>"><i class="icon-plus"></i> Add Talk</a></li>
		</ul>
	</div>
	<div class="span4">
		<h4>Series<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There are <?php echo $num_series; ?> series on the system"><?php echo $num_series; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="<?php echo base_url('/admin/series/'); ?>"><i class="icon-edit"></i> Manage Series</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/addseries/'); ?>"><i class="icon-plus"></i> Add Series</a></li>
		</ul>
	</div>
	<div class="span4">
		<h4>Users<span class="badge pull-right activate-tooltip" data-placement="bottom" title="There <?php echo ($num_users == 1 ? "is " . $num_users . " user" : "are " . $num_users . " users"); ?> on the system"><?php echo $num_users; ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="<?php echo base_url('/admin/users/'); ?>"><i class="icon-edit"></i> Manage Users</a></li>
			<li><a class="text-success" href="<?php echo base_url('/admin/adduser/'); ?>"><i class="icon-plus"></i> Add User</a></li>
		</ul>
	</div>
	<div class="span6">
		<h4>My Account<span class="label pull-right"><?php echo $this->session->userdata("useremail"); ?></span></h4><hr>
		<ul class="unstyled">
			<li><a href="<?php echo base_url("/admin/changepassword/	");?>"><i class="icon-key"></i> Change Password</a></li>
			<li><a class="text-error" href="<?php echo base_url("/admin/deleteuser/" . $this->session->userdata("userid"));?>"><i class="icon-remove"></i> Delete Account</a></li>
		</ul>
	</div>
	<div class="span6">
			<div class="well">
			<h4>Found a bug?<i class="icon-bug pull-right"></i> </h4>
			<p>If you find that something on this site isn't working, or you have a suggestion for a new feature or how to make using it easier, send me an email at <a href="mailto:r.brunt@gmail.com">r.brunt@gmail.com</a>, and I'll see what I can do!</p>
			</div>
	</div>
</div>
<div class="row">
	<div class="span12">
		<h2><i class="icon-refresh"></i> Updates <small>What's new?</small></h2>
		<hr>
		<h3>July 2014</h3>
		<p>You can now embed talks and series <a href="http://talks.diccu.co.uk/series/embed/9?hide_title=true&hide_artwork=true&hide_description=true">into other pages</a>. Check it out in use on the <a href="http://diccu.co.uk/whats-on/big-question/" target="_blank">Big Question</a> Page of the CU website.</p>
		<hr>
		<h3>April 2014 <i class="icon-youtube pull-right"></i></h3>
		<p>You can now paste in the url to a YouTube or Vimeo video instead of uploading audio for a talk, and it will be automatically embeded into the talk's details page.<p>
	</div>
</div>
