<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url()?>">Home</a> <span class="divider">/</span></li>
				<li class="active">Search: <strong><?php echo $searchTerm; ?></strong></li>
			</ul>
		</div>
	</div>
<div class="row">
	<div class="span12">
<?php if($talks) :?>
	<h3>Talks</h3>
	<!-- <hr> -->
		<table class="table table-hover">
			<thead>
				<th>Title</th>
				<th>Series</th>
				<th>Date</th>
				<th>Passage</th>
			</thead>
			<tbody>
<?php foreach($talks as $talk): ?>
				<tr>
					<td><strong><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title;?></a></strong></td>
					<td><a href="<?php echo base_url('/series/seriesdetail/'.$talk->seriesid) ;?>"><?php echo $talk->seriestitle;?></a></td>
					<td><?php echo $talk->date;?></td>
					<!-- <td><?php echo $talk->speakername; ?></td> -->
					<td><a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk->passage;?>" target="_blank"><?php echo $talk->passage;?></a></td>
				</tr>
<?php endforeach;?>
			</tbody>
		</table>
<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="span12">
<?php if($series) :?>
	<h3>Series</h3	>
<!-- 	<hr> -->
		<ul class="thumbnails">
<?php foreach($series as $single_series): ?>
			<li class="span4">
				<div class="thumbnail">
					<a class="" href="<?php echo base_url('/series/seriesdetail/'.$single_series->id)?>"><img src="http://placehold.it/500"></a>
					<div class="caption">
					<h4><a href="<?php echo base_url('/series/seriesdetail/'.$single_series->id)?>"><?php echo $single_series->title;?></a></h4>
					<!--<h4><?php echo $single_series->title ;?></h4>-->
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