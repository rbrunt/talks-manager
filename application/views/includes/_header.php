<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DICCU Talks system</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="DICCU">

	<link href="<?php echo base_url('/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/bootstrap/css/style.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/bootstrap/css/datepicker.css')?>" rel="stylesheet">
	<!-- <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
</head>
<body>
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url()?>">DICCU Talks System</a>
				<ul class="nav">
					<li class="active"><a href="<?php echo base_url()?>">Home</a></li>
					<li><a href="<?php echo base_url('/series')?>">Series'</a></li>
					<li><a href="<?php echo base_url('/series/seriesdetail/1')?>">Series</a></li>
					<li><a href="<?php echo base_url('/talks/talk/1')?>">Talk</a></li>
				</ul>
				<form class="form-search navbar-search pull-right">
					<input type="text" class="search-query input-small" placeholder="Search...">
				</form>
			</div>
		</div>
	</div>

	<div class="container">