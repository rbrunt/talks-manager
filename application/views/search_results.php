<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url()?>">Home</a></li>
				<li class="active">Search: <strong><?php echo $searchTerm; ?></strong></li>
			</ul>
		</div>
	</div>
<div class="row">
	<div class="col-md-12">
<?php if($talks) :?>
	<h3>Talks</h3>
		<table class="table table-hover">
			<thead>
				<th>Title</th>
				<th>Series</th>
				<th>Date</th>
				<th>Speaker</th>
			</thead>
			<tbody>
<?php foreach($talks as $talk): ?>
				<tr>
					<td><strong><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title;?></a></strong></td>
					<td><a href="<?php echo base_url('/series/seriesdetail/'.$talk->seriesid) ;?>"><?php echo $talk->seriestitle;?></a></td>
					<td><?php echo $talk->date;?></td>
					<td><?php echo ($talk->speakername != "" ) ? $talk->speakername : "-" ; ?></td>
				</tr>
<?php endforeach;?>
			</tbody>
		</table>
<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
<?php if($series) :?>
	<h3>Series</h3	>
<!-- 	<hr> -->
		<ul class="thumbnails list-unstyled">
<?php foreach($series as $single_series): ?>
			<li class="col-sm-4">
				<div class="thumbnail">
					<a class="" href="<?php echo base_url('/series/seriesdetail/'.$single_series->id)?>"><img src="<?php echo $artwork[$single_series->id]; ?>" class="img-responsive"></a>
					<div class="caption">
					<h4><a href="<?php echo base_url('/series/seriesdetail/'.$single_series->id)?>"><?php echo $single_series->title;?></a></h4>
					<p id=""><?php echo character_limiter($single_series->summary, 150) ;?></p>
					</div>
				</div>
			</li>
<?php endforeach;?>
		</ul>
<?php endif; ?>
<?php if(!$talks && !$series): ?>
	<p>No results for <strong><?php echo $searchTerm; ?></strong>, try searching for something else.</p>
<?php endif ?>
	</div>
</div>