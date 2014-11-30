<!-- Begin opengraph meta tags -->
	<!-- Facebook -->
<?php if(isset($is_talk_page)):?>
		<meta property="og:title" content="<?php echo $talk[0]->title ;?>">
		<meta property="og:type" content="music.song">
		<meta property="og:image" content="<?php echo $artwork ;?>">
		<meta property="og:url" content="<?php echo base_url($talk[0]->seriesslug.'/'.$talk[0]->slug);?>">
		<meta property="og:site_name" content="DICCU Talks">
		<meta property="og:description" content="<?php echo $description;?>">
		<meta property="music:album" content="<?php echo base_url("/series/seriesdetail/".$talk[0]->seriesid);?>">
		<meta property="music:release_date" content="<?php echo $talk[0]->date;?>">
		<?php if ($talk_exists):?><meta property="og:audio:url" content="<?php echo base_url("/files/talks/".$talk[0]->id.".mp3");?>"><?php endif;?>
<?php elseif(isset($is_series_page)):?>
		<meta property="og:title" content="<?php echo $series[0]->title ;?>">
		<meta property="og:type" content="music.album">
		<meta property="og:image" content="<?php echo $artwork ;?>">
		<meta property="og:url" content="<?php echo base_url($series[0]->slug);?>">
		<meta property="og:site_name" content="DICCU Talks">
		<meta property="og:description" content="<?php echo $description;?>">
<?php if($talks) : ?>
<?php $i=1;?><?php foreach($talks as $talk):?>
			<meta property="music:song" content="<?php echo base_url($series[0]->slug.'/'.$talk->slug);?>">
			<meta property="music:song:track" content="<?php echo $i;?>">
<?php $i++;?><?php endforeach;?>
<?php endif;?>
<?php endif;?>

<?php if(isset($is_talk_page)):?>
	<!-- Twitter -->
		<meta name="twitter:card" content="player">
		<meta name="twitter:site" content="Durham_CU">
		<meta name="twitter:title" content="<?php echo $talk[0]->title;?>">
		<meta name="twitter:description" content="<?php echo $description;?>">
		<meta name="twitter:image:src" content="<?php echo $artwork;?>">
		<meta name="twitter:player" content="<?php echo base_url("/talks/talk/".$talk[0]->id."/embed");?>">
		<meta name="twitter:player:stream" content="<?php echo base_url("/files/talks/".$talk[0]->id.".mp3");?>">
		<meta name="twitter:player:stream:content_type" content="audio/mpeg">
		<meta name="twitter:player:height" content="500">
		<meta name="twitter:player:width" content="500">
		<meta name="twitter:domain" content="talks.diccu.co.uk">
<?php endif;?>
<!-- End Opengraph meta tags -->
