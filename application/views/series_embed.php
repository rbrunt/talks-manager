	<div class="row">
		<?php if($options["hide_artwork"]==false):?><div style="float:left;width:250px;max-width:25%;">
			<img src="<?php echo $artwork; ?>">
		</div><?php endif; ?>
			<?php if($options["hide_title"]==false):?><div class="page-header">
				<h3><?php echo $series[0]->title ?></h3>
			</div><?php endif; ?>
			<?php if($options["hide_description"]==false):?><div id="summary"><?php echo $this->typography->auto_typography($series[0]->summary) ?></div><?php endif; ?>
		<div class="span12" style="overflow:hidden;">
			<div>
				<?php if($talks) : ?>
				<table class="table table-hover">
					<thead>
						<th>Title</th>
						<th>Date</th>
						<th>Speaker</th>
					</thead>
					<tbody>
						<?php foreach($talks as $talk): ?>
						<tr>
							<td><a target="_blank" href="<?php echo base_url('/talks/talk/'.$talk->id);?>"><?php echo $talk->title;?></a></td>
							<td><?php echo $talk->date;?></td>
							<?php if($talk->speakername==""): ?>
								<td>-</td>
							<?php else: ?>
								<td><?php echo $talk->speakername; ?></td>
							<?php endif; ?>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
				<p><a class="pull-right" href="<?php echo base_url('/series/seriesdetail/'.$series[0]->id);?>" target="_blank"><b>More talks</b> at talks.diccu.co.uk <i class="icon-angle-right"></i></a></p>
				<?php else : ?>
						<p><strong>No talks yet!</strong> Someone will add some soon!</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
