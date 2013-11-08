	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
				<!-- <li><a href="/">Home</a> <span class="divider">/</span></li> -->
				<li><a href="<?php echo base_url('/admin/')?>">Admin</a> <span class="divider">/</span></li>
				<li class="active">Talks</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<table class="table table-hover">
				<thead>
					<th>Name</th>
					<th>Email</th>
					<th><a href="<?php echo base_url("admin/adduser"); ?>" class="btn btn-mini pull-right" title="Add a User"><i class="icon-plus"></i></a></th>
				</thead>
				<tbody>
<?php foreach($users as $user): ?>
					<tr>
						<td><?php echo $user->name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><a href="<?php echo base_url('/admin/deleteuser/'.$user->id) ;?>" class="btn btn-danger btn-small pull-right"><i class="icon-remove"></i> Delete User</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>