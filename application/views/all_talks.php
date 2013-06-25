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
				</thead>
				<tbody>
<?php foreach($talks as $talk): ?>
					<tr>
						<td><a href="<?php echo base_url('/talks/talk/'.$talk->id)?>"><?php echo $talk->title;?></a></td>
						<td>Big Question 2012 <?php echo $talk->seriesid;?></td>
						<td><?php echo $talk->date;?></td>
						<td>TODO</td>
						<td><a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk->passage;?>" target="_blank"><?php echo $talk->passage;?></td>
						<td><a href="<?php echo base_url('/admin/edittalk/'.$talk->id)?>">Edit</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
	</div>
</div>
