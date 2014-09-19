<div class="row">
	<div class="col-md-12">
	<div class="page-header">
		<h1><i class="fa fa-cog"></i> Admin Page <small>This is where the fun happens!</small></h1>
		<a class="btn btn-danger pull-right" href="<?php echo base_url("/admin/logout/"); ?>"><i class="fa fa-sign-out fa-white"></i> Logout</a>
		<p>Select an option below:</p>
	</div>
</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2 class="panel-title">Talks<span class="badge pull-right activate-tooltip" data-placement="bottom" data-container="body" title="There are <?php echo $num_talks; ?> talks on the system"><?php echo $num_talks; ?></span></h2>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					<li><a href="<?php echo base_url('/admin/talks/'); ?>"><i class="fa fa-edit"></i> Manage Talks</a></li>
					<li><a class="text-success" href="<?php echo base_url('/admin/addtalk/'); ?>"><i class="fa fa-plus"></i> Add Talk</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="col-sm-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2 class="panel-title">Series<span class="badge pull-right activate-tooltip" data-placement="bottom" data-container="body" title="There are <?php echo $num_series; ?> series on the system"><?php echo $num_series; ?></span></h2>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					<li><a href="<?php echo base_url('/admin/series/'); ?>"><i class="fa fa-edit"></i> Manage Series</a></li>
					<li><a class="text-success" href="<?php echo base_url('/admin/addseries/'); ?>"><i class="fa fa-plus"></i> Add Series</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="col-sm-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h2 class="panel-title">Users<span class="badge pull-right activate-tooltip" data-placement="bottom" data-container="body" title="There <?php echo ($num_users == 1 ? "is " . $num_users . " user" : "are " . $num_users . " users"); ?> on the system"><?php echo $num_users; ?></span></h2>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					<li><a href="<?php echo base_url('/admin/users/'); ?>"><i class="fa fa-edit"></i> Manage Users</a></li>
					<li><a class="text-success" href="<?php echo base_url('/admin/adduser/'); ?>"><i class="fa fa-plus"></i> Add User</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">My Account<span class="label label-default pull-right"><?php echo $this->session->userdata("useremail"); ?></span></h2>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					<li><a href="<?php echo base_url("/admin/changepassword/	");?>"><i class="fa fa-key"></i> Change Password</a></li>
					<li><a class="text-danger" href="<?php echo base_url("/admin/deleteuser/" . $this->session->userdata("userid"));?>"><i class="fa fa-trash-o"></i> Delete Account</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
			<div class="well">
			<h4>Found a bug?<i class="fa fa-bug pull-right"></i> </h4>
			<p>If you find that something on this site isn't working, or you have a suggestion for a new feature or how to make using it easier, send me an email at <a href="mailto:r.brunt@gmail.com">r.brunt@gmail.com</a>, and I'll see what I can do!</p>
			</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2><i class="fa fa-refresh"></i> Updates <small>What's new?</small></h2>
		<hr>
		<h3>September 2014</h3>
		<p>Updated the look and feel, and made the site a lot more mobile friendly.</p>
		<h3>July 2014</h3>
		<p>You can now embed talks and series <a href="http://talks.diccu.co.uk/series/embed/9?hide_title=true&hide_artwork=true&hide_description=true">into other pages</a>. Check it out in use on the <a href="http://diccu.co.uk/whats-on/big-question/" target="_blank">Big Question</a> Page of the CU website.</p>
		<h3>April 2014 <i class="fa fa-youtube pull-right"></i></h3>
		<p>You can now paste in the url to a YouTube or Vimeo video instead of uploading audio for a talk, and it will be automatically embeded into the talk's details page.<p>
	</div>
</div>
