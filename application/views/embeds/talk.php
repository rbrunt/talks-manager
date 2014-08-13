<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DICCU Talks Widget</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<style>
		* {
			margin:0;
			padding: 0;
			box-sizing: border-box;
		}
		body {
			font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		}
		.truncate {
			max-width: 100%;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		h1, h2, h3 {
			background: rgba(0,0,0,0.3);
			padding: 5px;
			display: inline-block;
			transition: all 0.3s, text-indent 4s linear;
			margin-bottom: 3px;
			border-radius: 3px;
			line-height: 1.25;
		}
		a {
			color: inherit;
			text-decoration: none;
		}
		body:hover h1, body:hover h2, body:hover h3 {
			background: rgba(0,0,0,0.8);
		}
		body:hover h2 {
			color:#aaa;
		}
		body:hover #player {
			opacity:1;
		}
		h1 {
			color: #fff;
			font-size:16px;
			font-weight: bold;
		}
		h2 {
			color: #ddd;
			font-size: 14px;
			padding:3px 5px;
			font-weight: bold;
		}
		h3 {
			color:#ddd;
			font-size: 12px;
			padding:4px 5px;
			margin-top:-4px;
			font-weight: normal;
		}
		#cover {
			height:100vh;
			width: 100vw;
			background-image: url(<?php echo $artwork;?>);
			background-repeat: no-repeat;
			background-size: cover;
		}
		#player {
			position: absolute;
			bottom:0;
			width: 100vw;
			padding: 5px 10px;
			opacity: 0.5;
			transition: opacity 0.3s;
		}
		.logo {
			float: left;
			margin-right: 5px;
		}
		.metadata{
			overflow: hidden;
		}
		.logo svg{
			width:75px;
			height:75px;
		}
		.header{
			padding: 5px 10px;
			overflow: hidden;
		}
		audio {
			width: 100%;
		}
		#links {
			display: none;
		}
		@media all and (max-width: 275px){
			h1 {
				max-width: 100%;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
		}
	</style>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- Jqeury cdn -->
	<script>
			
	</script>
</head>
<body>
<div id="cover">
	<div class="header">
		<div class="metadata">
			<h1 class="title"><a href="<?php echo base_url("/talks/talk/".$talk->id."?utm_source=embedded_iframe_widget&utm_medium=referral&utm_campaign=embed_talk&utm_content=title");?>" title="<?php echo $talk->title;?>" target="_blank"><?php echo $talk->title;?></a></h1><br>
			<h2 class="series truncate"><a href="<?php echo base_url("/series/seriesdetail/".$talk->seriesid."?utm_source=embedded_iframe_widget&utm_medium=referral&utm_campaign=embed_talk&utm_content=title");?>" title="<?php echo $talk->seriestitle;?>" target="_blank"><?php echo $talk->seriestitle;?></a></h2><br>
			<?php if($talk->speakername != ""):?><h3 class="speaker truncate"><?php echo $talk->speakername;?></h3><?php endif;?>
		</div>
	</div>
	<svg width="75" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 75 75"><path style="fill:#3a9293;" d="M37.5,0,11,11,0,37.5,11,64,37.5,75,64,64,75,37.5,64,11,37.5,0z"/><path style="fill:#ffffff;" d="m55,37.5-27.5,16,0-32"/></svg>

	<div id="links">
		<div class="logo">
			<a href="http://diccu.co.uk/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 75"><path d="M37.5,4.5312,14.188,14.188,4.5312,37.5,14.188,60.812,37.5,70.469,60.812,60.812,70.469,37.5,60.812,14.188,37.5,4.5312zm-3.0625,27.875c0.89316,0.01176,1.6544,0.22531,2.2812,0.625,0.62688,0.39972,1.0985,0.91592,1.4062,1.5625l-0.594,0.344c-0.36-0.683-0.838-1.154-1.406-1.438-0.56841-0.2839-1.1499-0.41525-1.75-0.40625-0.84836,0.01481-1.5671,0.22869-2.1562,0.65625-0.5892,0.42759-1.0367,0.96232-1.3438,1.625-0.30706,0.6627-0.46675,1.3736-0.46875,2.0938,0.02586,1.2165,0.41092,2.2353,1.1562,3.0938,0.74533,0.85849,1.6893,1.3052,2.8438,1.3438,0.61895,0.0038,1.2354-0.15339,1.8438-0.46875,0.60837-0.31536,1.1037-0.78836,1.4688-1.4688l0.593,0.281c-0.35916,0.75738-0.88144,1.3229-1.625,1.7188-0.74358,0.39588-1.516,0.622-2.3125,0.625-0.918-0.017-1.738-0.282-2.436-0.782-0.699-0.499-1.262-1.155-1.657-1.937-0.394-0.782-0.587-1.606-0.593-2.469,0.0029-0.82109,0.19127-1.5869,0.5625-2.3438,0.37123-0.75682,0.9199-1.3862,1.625-1.875,0.7051-0.48878,1.558-0.76425,2.5625-0.78125zm9.7812,0c0.89316,0.01176,1.6544,0.22531,2.2812,0.625,0.62689,0.39972,1.0985,0.91592,1.4062,1.5625l-0.594,0.344c-0.36-0.683-0.837-1.154-1.406-1.438-0.568-0.284-1.15-0.415-1.75-0.406-0.848,0.015-1.567,0.228-2.156,0.656-0.5892,0.42759-1.0367,0.96232-1.3438,1.625-0.30705,0.6627-0.46675,1.3736-0.46875,2.0938,0.02586,1.2165,0.41091,2.2353,1.1562,3.0938,0.74533,0.85849,1.6893,1.3052,2.8438,1.3438,0.61895,0.0038,1.2354-0.15339,1.8438-0.46875,0.60836-0.31536,1.1037-0.78836,1.4688-1.4688l0.594,0.281c-0.35915,0.75738-0.88143,1.3229-1.625,1.7188-0.74357,0.39588-1.516,0.622-2.3125,0.625-0.919-0.017-1.738-0.282-2.437-0.782-0.699-0.499-1.262-1.155-1.657-1.937-0.39465-0.78165-0.58675-1.6056-0.59375-2.4688,0.0029-0.82109,0.19127-1.5869,0.5625-2.3438,0.37123-0.75682,0.91989-1.3862,1.625-1.875,0.70509-0.48878,1.558-0.76425,2.5625-0.78125zm-27.375,0.0625,3.3438,0c1.5868,0.03528,2.771,0.53063,3.5625,1.4688,0.79146,0.93814,1.1878,2.1135,1.1875,3.5312-0.01647,1.5362-0.43952,2.7601-1.2812,3.6562-0.84174,0.8961-1.9992,1.3553-3.4688,1.375h-3.3438v-10.031zm32.906,0,0.75,0,0,5.0312c-0.02322,1.1518,0.21471,2.1669,0.71875,3.0312,0.50404,0.86437,1.4088,1.3306,2.7188,1.375,0.89999-0.0142,1.5872-0.2319,2.0938-0.65625,0.50654-0.42435,0.85846-0.96082,1.0625-1.625,0.20398-0.66417,0.3205-1.3913,0.3125-2.125v-5.0312h0.71875v5.0312c0.01822,1.3831-0.29622,2.5608-0.9375,3.5312-0.6413,0.97046-1.7305,1.4884-3.25,1.5312-1.0508-0.01533-1.8886-0.26861-2.5-0.75-0.6114-0.48138-1.0225-1.1115-1.2812-1.875-0.259-0.762-0.414-1.574-0.407-2.436v-5.0312zm-22.75,0.032h0.71875v10h-0.71875v-10zm-9.4375,0.625,0,8.7188,2.625,0c1.3223-0.02704,2.3178-0.44001,3-1.25,0.68214-0.80999,1.0282-1.8565,1.0312-3.125-0.0068-1.2858-0.36978-2.3312-1.0625-3.125-0.692-0.794-1.671-1.196-2.968-1.219h-2.625zm19.939-32.713-0.386,0.16887-25.451,10.542-0.38599,0.15681-0.15681,0.386-10.542,25.451-0.15681,0.38599,0.15681,0.38599,10.542,25.451,0.15681,0.38599,0.38599,0.15681,25.451,10.542,0.386,0.15681,0.38599-0.15681,25.451-10.542,0.38599-0.15681,0.15681-0.38599l10.543-25.451,0.157-0.386-0.157-0.386-10.542-25.451-0.157-0.386-0.386-0.157-25.451-10.542-0.386-0.16887zm0,2.1833l24.68,10.229,10.229,24.679-10.229,24.68-24.679,10.229-24.68-10.229-10.229-24.68,10.229-24.679,24.68-10.229z" style="fill:#3a9293;"/></svg></a>
		</div>
		<a href="<?php echo base_url("/talks/talk/".$talk->id."?utm_source=embedded_iframe_widget&utm_medium=referral&utm_campaign=embed_talk&utm_content=listen_on_talks");?>" target="_blank">Listen to this talk on DICCU Talks</a>
	</div>
<?php if($talk_exists) : ?>
<div id="player">
	<audio controls preload="none" src="<?php echo base_url("files/talks/".$talk->id); ?>.mp3" type="audio/mpeg">
					<!-- Add flash fallback here... -->
	</audio>
<?php endif; ?>
</div>
</body>
</html>