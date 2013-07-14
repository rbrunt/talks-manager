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
					<th>Title</th>
					<th>Series</th>
					<th>Date</th>
					<th>Speaker</th>
					<th>Passage</th>
					<th><a href="<?php echo base_url("admin/addtalk"); ?>" class="btn btn-mini" title="Add a Talk"><i class="icon-plus"></i></a></th>
				</thead>
				<tbody>
<?php foreach($talks as $talk): ?>
					<tr>
						<td><strong><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title;?></a></strong></td>
						<td><a href="<?php echo base_url('/series/seriesdetail/'.$talk->seriesid) ;?>"><?php echo $talk->seriestitle;?></a></td>
						<td><?php echo $talk->date;?></td>
						<td><?php echo $talk->speakername; ?></td>
						<td><a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk->passage;?>" target="_blank"><?php echo $talk->passage;?></a></td>
						<td><a href="<?php echo base_url('/admin/edittalk/'.$talk->id)?>" title="Edit" class="btn btn-mini btn-primary">Edit</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>