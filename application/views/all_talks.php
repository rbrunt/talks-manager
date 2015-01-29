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
					<th>Title</th>
					<th>Series</th>
					<th>Date</th>
					<th>Speaker</th>
					<th>Passage</th>
					<th><i class="fa fa-headphones"></i></th>
					<th><i class="fa fa-youtube"></i></th>
					<th></th>
					<th><a href="<?php echo base_url("admin/addtalk"); ?>" class="btn btn-sm btn-default btn-block" title="Add a Talk"><i class="fa fa-plus"></i></a></th>
				</thead>
				<tbody>
<?php foreach($talks as $talk): ?>
					<tr>
						<td><strong><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title;?></a></strong></td>
						<td><a href="<?php echo base_url('/series/seriesdetail/'.$talk->seriesid) ;?>"><?php echo $talk->seriestitle;?></a></td>
						<td><?php echo $talk->date;?></td>
						<td><?php echo $talk->speakername; ?></td>
<?php if($talk->passage != "") : ?>
						<td><a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk->passage;?>" target="_blank"><?php echo $talk->passage;?></a></td>
<?php else: ?>
						<td>-</td>
<?php endif; ?>
						<td><i class="activate-tooltip <?php echo ($talk->exists ? "fa fa-check text-success" : "fa fa-exclamation-triangle text-danger"); ?>" title="<?php echo ($talk->exists ? "There is a file uploaded for this talk" : "No file uploaded - you'll need to upload one!"); ?>" data-placement="bottom"></i></td>
						<td><i class="activate-tooltip <?php echo ($talk->video ? "fa fa-check text-success" : "fa fa-exclamation-triangle text-warning"); ?>" title="<?php echo ($talk->video ? "There is a video available for this talk" : "No video has been added for this talk. If there is one, why not add one?"); ?>" data-placement="bottom"></i></td>
						<td><a href="<?= base_url('/admin/displayquestions/'.$talk->id);?>" title="View the questions for this talk." class="btn btn-sm btn-default activate-tooltip" data-placement="bottom">Q's</a></td>
						<td><a href="<?php echo base_url('/admin/edittalk/'.$talk->id)?>" title="Edit" class="btn btn-sm btn-primary">Edit</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
			</div>
<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>