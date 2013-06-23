		<div class="well">
			<h1>Welcome to the DICCU Talks system!</h1>
			<p>Here are some of the most recent talks:</p>
		</div>

<?php foreach($talks as $talk): ?>
		<div class="category">
			<div class="row">
				<div class="span3">
					<img src="http://placehold.it/500">
				</div>
				<div class="span9">
					<h1><a href=<?php echo "/talks/talk/".$talk->id; ?>><?php echo $talk->title; ?></a> <small><?php echo $talk->date; ?></small></h1>
					<div id="categorydescription">
						<p><?php echo $talk->summary; ?></p>
						<p>TODO: Add speaker here too!</p>
					</div>
				</div>
			</div>
		</div>
		
<?php endforeach; ?>
