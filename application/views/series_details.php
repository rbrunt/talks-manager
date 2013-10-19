	<div class="row">
		<div class="span12">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url()?>">Home</a> <span class="divider">/</span></li>
			<li><a href="<?php echo base_url('/series/')?>">Browse Series</a> <span class="divider">/</span></li>
			<li class="active"><?php echo $series[0]->title ?></li>
		</ul>
		</div>
	</div>
	<div class="row">
		<div class="span3">
			<img src="<?php echo $artwork; ?>">
		</div>
		<div class="span9">
			<div class="page-header">
				<h1><?php echo $series[0]->title ?></h1>
<?php if($isLoggedIn) : ?>
							<a class="btn btn-primary pull-right" title="Edit this series" href="<?php echo base_url('/admin/editseries/'.$series[0]->id);?>">Edit</a>
<?php endif; ?>
			</div>
			<p id="summary"><?php echo $series[0]->summary ?></p>
			<div id="talkstable">
				<?php if($talks) : ?>
				<table class="table table-hover">
					<thead>
						<th>Title</th>
						<th>Date</th>
						<th>Speaker</th>
						<th>Passage</th>
					</thead>
					<tbody>
						<?php foreach($talks as $talk): ?>
						<tr>
							<td><a href="<?php echo base_url('/talks/talk/'.$talk->id);?>"><?php echo $talk->title;?></a></td>
							<td><?php echo $talk->date;?></td>
							<td><?php echo $talk->speakername; ?></td>
							<td><a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk->passage;?>" target="_blank"><?php echo $talk->passage;?></a></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
				<?php else : ?>
					<?php if($isLoggedIn): ?>
						<p><strong>No talks yet!</strong> Click <a href="<?php echo base_url('admin/addtalk'); ?>">here</a> to add a talk</p>
					<?php else: ?>
						<p><strong>No talks yet!</strong> Someone will add some soon!</p>
					<?php endif;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
