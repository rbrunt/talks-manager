		<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<!-- <li><a href="/">Home</a> <span class="divider">/</span></li> -->
					<li><a href="<?php echo base_url('/admin/')?>">Admin</a> <span class="divider">/</span></li>
					<li class="active">Series</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span12">
		<table class="table table-hover table-condensed">
				<thead>
					<th>Title</th>
					<th>Summary</th>
					<th>#&nbspTalks</th>
				</thead>
				<tbody>
<?php foreach($series as $single_series): ?>
					<tr>
						<td><strong><a href="<?php echo base_url('/series/seriesdetail/'.$single_series->id)?>"><?php echo $single_series->title;?></a></strong></td>
						<td><?php echo character_limiter($single_series->summary, 100) ;?></td>
						<td><?php echo $single_series->numtalks; ?></td>
						<td><a href="<?php echo base_url('/admin/editseries/'.$single_series->id)?>" class="btn btn-mini btn-primary">Edit</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
	</div>
<?php echo $this->pagination->create_links(); ?>
</div>
