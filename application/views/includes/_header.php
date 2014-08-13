<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php if(isset($title)) : ?>
	<title><?php echo $title; ?> | DICCU Talks</title>
<?php else: ?>
	<title>DICCU Talks</title>
<?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url('/favicon.ico')?>">
	<meta name="description" content="<?php echo isset($description) ? $description : ""?>">
	<meta name="author" content="Durham Inter-Collegiate Christian Union">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/datepicker.css')?>">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<?php if(isset($add_meta)){ $this->load->view("includes/_meta_tags.php"); };?>

	<script>
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-teal navbar-static-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
      				</button>
      				<a class="navbar-brand" href="<?php echo base_url()?>">DICCU Talks System</a>	
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="<?php echo (current_url() == base_url()) ? "active" : "";?>"><a href="<?php echo base_url()?>">Home</a></li>
						<li <?php echo (current_url() == base_url('/series/')) ? "class=\"active\"" : "";?>><a class="activate-tooltip" title="Browse by Series" data-placement="bottom" data-toggle="tooltip" data-container="body" href="<?php echo base_url('/series')?>">Browse Series</a></li>
						<li <?php echo (current_url() == base_url('/talks/')) ? "class=\"active\"" : "";?>><a class="activate-tooltip" title="Browse Recent Talks" data-placement="bottom" data-toggle="tooltip" data-container="body" href="<?php echo base_url('/talks')?>">Recent Talks</a></li>
						<li <?php echo (current_url() == base_url('/talks/future/')) ? "class=\"active\"" : "";?>><a class="activate-tooltip" title="Browse Talks Coming Soon" data-placement="bottom" data-toggle="tooltip" data-container="body" href="<?php echo base_url('/talks/future')?>">Coming Soon</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a class="activate-tooltip" data-container="body" data-placement="bottom" data-toggle="tooltip" title="Edit and upload talks and series. (You'll need to have a login)" href="<?php echo base_url("admin") ;?>"><i class="fa fa-cog"></i></a></li>
					</ul>
					<form class="navbar-form navbar-right" role="search">
						<input type="text" class="form-control search-query" placeholder="Search..." id="searchbox">
					</form>
				</div>
			</div>
	</nav>

	<div class="container">
		<div id="alertscontainer">	
			<?php $this->load->view("includes/_info_messages.php"); ?>
		</div>