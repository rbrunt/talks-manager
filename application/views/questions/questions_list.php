	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('/admin/')?>">Admin</a></li>
				<li class="active">Questions for "<a href="<?= base_url('/talks/talk/'.$talk->id);?>"><?= $talk->title; ?></a>"</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">

		<h1>Questions for <small><a href="<?= base_url('/talks/talk/'.$talk->id);?>"><?= $talk->title; ?></a></small></h1>
		<p>The list should auto-update, so there's no need to refresh.</p>
<?php if($talk->questions):?>
		<div>
			<table class="table table-striped">
				<tbody id="question-list">
<?php foreach($talk->questions as $question): ?>
					<tr id="question-<?=$question->id;?>" data-timestamp="<?=mysql_to_unix($question->timestamp);?>">
						<td><?= htmlspecialchars($question->question);?></td>
						<td><a href="<?= base_url("/admin/deletequestion/".$question->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
					</tr>
<?php endforeach;?>
				</tbody>
			</table>
			</div>
<?php else :?>
		<div class="jumbotron">
			<h1>No questions yet...</h1>
			<p>The page should automatically refresh when the first one comes in and the list then keeps up to date. If you want to be absolutely sure you haven't missed one, refresh the page yourself.</p>
		</div>
<?php endif; ?>
		</div>
	</div>