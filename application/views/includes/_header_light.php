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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css')?>">
    <link href="<?php echo base_url('/bootstrap/css/bootstrap-responsive.css')?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/datepicker.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/font-awesome/css/font-awesome.min.css'); ?>">
	<!-- <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->

	<?php if(isset($add_meta)){ $this->load->view("includes/_meta_tags.php"); };?>

	<script>
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<div class="container">