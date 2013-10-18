<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DICCU Talks system</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="DICCU">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/datepicker.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/font-awesome/css/font-awesome.min.css'); ?>">
	<!-- <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
	<script>
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url()?>">DICCU Talks System</a>
				<ul class="nav">
					<li class="<?php echo (current_url() == base_url()) ? "active" : "";?>"><a href="<?php echo base_url()?>">Home</a></li>
					<li <?php echo (current_url() == base_url('/series/')) ? "class=\"active\"" : "";?>><a class="activate-tooltip" title="Browse by Series" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url('/series')?>">Browse Series</a></li>
				</ul>
				<ul class="nav pull-right">
					<li><a class="activate-tooltip" data-container="body" data-placement="bottom" data-toggle="tooltip" title="Edit and upload talks and series. (You'll need to have a login)" href="<?php echo base_url("admin") ;?>"><i class="icon-cog icon-white"></i></a></li>
				</ul>
				<form class="form-search navbar-search pull-right">
					<input type="text" class="search-query input-small" placeholder="Search..." id="searchbox">
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="alertscontainer">	
			<?php $this->load->view("includes/_info_messages.php"); ?>
		</div>