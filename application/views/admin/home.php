<div class="row">
	<div class="span12">
	<div class="page-header">
		<h1>Admin Page <small>That's Administration to you!</small></h1>
		<a class="btn btn-danger pull-right" href="<?php echo base_url("/admin/logout/"); ?>">Logout</a>
		<p>Select an option below:</p>
	</div>
</div>
</div>
<div class="row">
	<div class="span9 offset2">
		<p><a href="<?php echo base_url('/admin/talks/'); ?>">Edit Talks</a><p>
		<p><a href="<?php echo base_url('/admin/series/'); ?>">Edit Series</a><p>
		<p><a href="<?php echo base_url('/admin/speakers/'); ?>">Edit Speakers</a><p>
		<p><a class="muted" href="<?php echo base_url('/admin/addtalk/'); ?>">Add Talk</a><p>
		<p><a class="muted" href="<?php echo base_url('/admin/addseries/'); ?>">Add Series</a><p>
		<p><a class="muted" href="<?php echo base_url('/admin/addspeaker/'); ?>">Add Speaker</a><p>
		<p><a class="text-success" href="<?php echo base_url('/admin/adduser/'); ?>">Add User</a><p>
	</div>
</div>
