
		<div class="row">
			
			<div class="span3">
				<img src="http://placehold.it/500">
			</div>
			<div class="span9">
				<?php echo form_open("admin/edittalk", array("id"=>"editform")); ?>
				<div class="page-header">
					<?php echo form_input(array("name"=>"title", "value"=>$talk[0]->title, "class"=>"h1 span9")); ?>
					<?php echo form_input("speakerid", $talk[0]->speakerid) ?>
					<p class="muted"><?php echo $talk[0]->date ?></p>
				</div>
				Passage: <?php echo form_input("passage", $talk[0]->passage); ?>
				<?php echo form_textarea("summary", $talk[0]->summary) ?>
				<?php echo form_submit(array("value"=>"Submit Edits", "class"=>"btn btn-primary")); ?>
				<?php echo form_hidden(array("id"=>$talk[0]->id, "seriesid"=>$talk[0]->seriesid, "date"=>$talk[0]->date)); ?>
				<!-- <p><a href="#">download</a></p> -->
			<?php echo form_close(); ?>
			</div>
		</div>