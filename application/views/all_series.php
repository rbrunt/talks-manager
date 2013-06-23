		<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<li><a href="/">Home</a> <span class="divider">/</span></li>
					<li class="active">Browse Series</li>
				</ul>
			</div>
		</div>

<?php foreach($series as $single): ?>
		<div class="category">
			<div class="row">
				<div class="span3">
					<img src="http://placehold.it/500">
				</div>
				<div class="span9">
					<h1><a href=<?php echo "/series/seriesdetail/".$single->id; ?>><?php echo $single->title; ?></a></h1>
					<div id="categorydescription">
						<p><?php echo $single->summary; ?></p>
					</div>
				</div>
			</div>
		</div>
		
<?php endforeach; ?>