	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('/admin/')?>">Admin</a></li>
				<li class="active">Talks</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Name</th>
					<th>Email</th>
					<th><a href="<?php echo base_url("admin/adduser"); ?>" class="btn btn-sm btn-default pull-right" title="Add a User"><i class="fa fa-plus"></i> Add User</a></th>
				</thead>
				<tbody>
<?php foreach($users as $user): ?>
					<tr class="activate-tooltip <?php echo ($user->active ? "" : "text-warning"); ?>" title="<?php echo ($user->active ? "" : "This user hasn't been activated - they'll need to set a password using the link they got before they can log in."); ?>" data-placement="bottom">
						<td><?php echo (($user->name == "") ? "-" : $user->name ); ?></td>
						<td><?php echo $user->email; ?></td>
						<td><a href="<?php echo base_url('/admin/deleteuser/'.$user->id) ;?>" class="text-danger pull-right"><i class="fa fa-trash-o"></i> Delete User</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
			</div>
<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>