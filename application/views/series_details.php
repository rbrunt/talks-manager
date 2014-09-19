	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url()?>">Home</a></li>
			<li><a href="<?php echo base_url('/series/')?>">Browse Series</a></li>
			<li class="active"><?php echo $series[0]->title ?></li>
		</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 hidden-xs">
			<img src="<?php echo $artwork; ?>" class="img-responsive">
		</div>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-xs-4 visible-xs-block">
					<img src="<?php echo $artwork; ?>" class="img-responsive">
				</div>
				<div class="col-xs-8 col-sm-12">
					<h1 class="series-title"><?php echo $series[0]->title ?></h1>
<?php if($isLoggedIn) : ?>
					<a class="btn btn-primary pull-right" title="Edit this series" href="<?php echo base_url('/admin/editseries/'.$series[0]->id);?>">Edit</a>
<?php endif; ?>
				</div>
			</div>
			<hr>
			<?php if ($series[0]->video):?>
				<?php if (preg_match("/(?:https?:\/\/(?:www.)?youtube.com\/watch\?(?:[a-zA-Z0-9_=&]*&)?v=)([a-zA-Z0-9_-]*)/", $series[0]->video, $matches)) :?>
					<iframe width="700" height="394" src="//www.youtube.com/embed/<?php echo $matches[1]; ?>" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
				<?php elseif (preg_match("/(?:https?:\/\/(?:www.)?vimeo.com\/)([0-9]+)/", $series[0]->video, $matches)) :?>
					<iframe src="//player.vimeo.com/video/<?php echo $matches[1];?>?title=0&amp;byline=0&amp;portrait=0" width="700" height="384" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php endif ;?>
			<?php endif; ?>
			<div id="summary"><?php echo $this->typography->auto_typography($series[0]->summary) ?></div>
			<div id="talkstable">
				<?php if($talks) : ?>
				<?php
					$empty = true;
					foreach($talks as $talk) {
						if ($talk->passage != "") {
							$empty = false;
							break;
						}
					}
				?>
				<table class="table table-hover table-responsive">
					<thead>
						<th>Title</th>
						<th>Date</th>
						<th>Speaker</th>
						<?php if(!$empty): ?><th class="hidden-xs">Passage</th><?php endif;?>
					</thead>
					<tbody>
						<?php foreach($talks as $talk): ?>
						<tr>
							<td><a href="<?php echo base_url('/talks/talk/'.$talk->id);?>"><?php echo $talk->title;?></a></td>
							<td><?php echo $talk->date;?></td>
							<?php if($talk->speakername==""): ?>
								<td>-</td>
							<?php else: ?>
								<td><?php echo $talk->speakername; ?></td>
							<?php endif; ?>
							<?php if(!$empty): ?>
								<?php if($talk->passage == "") : ?>
									<td class="hidden-xs">-</td>
								<?php else: ?>
									<td class="hidden-xs"><a href="<?php echo "http://www.biblegateway.com/passage/?search=".$talk->passage;?>" target="_blank"><?php echo $talk->passage;?></a></td>
								<?php endif; ?>
							<?php endif; ?>
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
