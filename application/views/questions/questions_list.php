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
		<h3>Unanswered Questions:</h3>
			<table class="table table-striped">
				<tbody id="question-list">
<?php foreach($talk->questions as $question): ?>
	<?php if ($question->answered==false):?>
					<tr id="question-<?=$question->id;?>" data-timestamp="<?=mysql_to_unix($question->timestamp);?>">
						<td><?= htmlspecialchars($question->question);?></td>
						<td><a href="<?= base_url("/admin/answerquestion/".$question->id);?>" class="btn btn-default btn-sm">Archive</a></td>
						<td class="hidden-xs"><a href="<?= base_url("/admin/deletequestion/".$question->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
					</tr>
<?php endif;?>
<?php endforeach;?>
				</tbody>
			</table>
			<h3>Answered Questions:</h3>
			<table class="table table-striped">
				<tbody id="answered-question-list">
<?php foreach($talk->questions as $question): ?>
	<?php if ($question->answered==true):?>
					<tr id="question-<?=$question->id;?>" data-timestamp="<?=mysql_to_unix($question->timestamp);?>" class="text-muted">
						<td><?= htmlspecialchars($question->question);?></td>
						<td><a href="<?= base_url("/admin/unanswerquestion/".$question->id);?>" class="btn btn-default btn-sm">Unarchive</a></td>
						<td class="hidden-xs"><a href="<?= base_url("/admin/deletequestion/".$question->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
					</tr>
<?php endif;?>
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