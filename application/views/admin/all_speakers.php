		<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url('/admin/')?>">Admin</a> <span class="divider">/</span></li>
					<li class="active">Speakers</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span12">
		<table class="table table-hover">
				<thead>
					<th>Name</th>
				</thead>
				<tbody>
<?php foreach($speakers as $speaker): ?>
					<tr>
						<td><?php echo $speaker->name;?></td>
						<td><a href="<?php echo base_url('/admin/editspeaker/'.$speaker->id)?>" class="btn btn-mini btn-primary">Edit</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
	</div>
<?php echo $this->pagination->create_links(); ?>
</div>
