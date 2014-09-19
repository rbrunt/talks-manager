		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="active">Browse Series</li>
				</ul>
			</div>
		</div>

<?php foreach($series as $single): ?>
		<div class="category">
			<div class="row">
				<div class="col-md-3">
					<a href="<?php echo base_url('/series/seriesdetail/'.$single->id); ?>"><img src="<?php echo $artwork[$single->id]; ?>" class="img-responsive"></a>
				</div>
				<div class="col-md-9">
					<h1 class="media-heading"><a href="<?php echo base_url('/series/seriesdetail/'.$single->id); ?>"><?php echo $single->title; ?></a></h1>
					<div id="categorydescription">
						<p id="summary"><?php echo $single->summary; ?></p>
					</div>
				</div>
			</div>
		</div>
		
<?php endforeach; ?>
<?php echo $this->pagination->create_links(); ?>