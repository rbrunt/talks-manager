	<div class="row">
		<div class="span12">
		<ul class="breadcrumb">
			<li><a href="/">Home</a> <span class="divider">/</span></li>
			<li class="active"><?php echo $series[0]->title ?></li>
		</ul>
		</div>
	</div>
	<div class="row">
		<div class="span3">
			<img src="http://placehold.it/500">
		</div>
		<div class="span9">
			<div class="page-header">
				<h1><?php echo $series[0]->title ?></h1>
			</div>
			<p><?php echo $series[0]->summary ?></p>
			
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
						<td><a href=<?php echo "\"/talks/talk/".$talk->id."\"";?>><?php echo $talk->title;?></a></td>
						<td><?php echo $talk->date;?></td>
						<td>TODO</td>
						<td><a href=<?php echo "\"http://www.biblegateway.com/passage/?search=".$talk->passage."\">";?><?php echo $talk->passage;?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
