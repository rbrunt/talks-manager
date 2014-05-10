<!-- Begin opengraph meta tags -->
	<!-- Facebook -->
<?php if(isset($is_talk_page)):?>
			<meta property="og:title" content="<?php echo $talk[0]->title ;?>">
			<meta property="og:type" content="music.song">
			<meta property="og:image" content="<?php echo $artwork ;?>">
			<meta property="og:url" content="<?php echo base_url("/talks/talk/".$talk[0]->id);?>">
			<meta property="og:site_name" content="DICCU Talks">
			<meta property="og:description" content="<?php echo $description;?>">
			<meta property="music:album" content="<?php echo base_url("/series/seriesdetail/".$talk[0]->seriesid);?>">
			<meta property="music:release_date" content="<?php echo $talk[0]->date;?>">
			<?php if ($talk_exists):?><meta property="og:audio:url" content="<?php echo base_url("/files/talks/".$talk[0]->id.".mp3");?>"><?php endif;?>
			<?php elseif(isset($is_series_page)):?>
			<meta property="og:title" content="<?php echo $series[0]->title ;?>">
			<meta property="og:type" content="music.album">
			<meta property="og:image" content="<?php echo $artwork ;?>">
			<meta property="og:url" content="<?php echo base_url("/series/seriesdetail/".$series[0]->id);?>">
			<meta property="og:site_name" content="DICCU Talks">
			<meta property="og:description" content="<?php echo $description;?>">
<?php if($talks) : ?>
<?php $i=1;?><?php foreach($talks as $talk):?>
				<meta property="music:song" content="<?php echo base_url("/talks/talk/".$talk->id);?>">
				<meta property="music:song:track" content="<?php echo $i;?>">
<?php $i++;?><?php endforeach;?>
<?php endif;?>
<?php endif;?>
<!-- End Opengraph meta tags -->
