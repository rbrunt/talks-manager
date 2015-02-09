	</div><!-- close container-->
	
	<footer id="footer">
		<div class="container">
			<div class="col-xs-12">
				<p>Designed an built by <a href="http://richardbrunt.co.uk">Richard Brunt</a> for <a href="http://diccu.co.uk">DICCU</a></p>
				<p><small><a href="<?php echo base_url('/about/cookies/'); ?>">Cookies</a> | <a href="<?php echo base_url('/about/copyright/'); ?>">Copyright</a> | <a href="<?php if ($isLoggedIn) {echo base_url('/admin/');} else{echo base_url("admin/login");}; ?>"><?php echo ($isLoggedIn ? "Admin" : "Login" ); ?></a></small></p>
<?php if ($isLoggedIn) : ?>			
				<p><small>Logged in as <?php echo $this->session->userdata("userrealname")?> (<?php echo $this->session->userdata("useremail");?>). Page took {elapsed_time} seconds to build</small></p>
<?php endif; ?>
			</div>		
		</div>
	</footer>
	<!-- begin Script includes -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- Jqeury cdn -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.3.1/jquery.cookie.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> <!-- boostrap plugins -->
	<script src="<?php echo base_url("/static/js/functions.js"); ?>"></script> <!-- general functions -->
<?php if (isset($page) && $page == "uploadtalk") : ?>
	<script src="<?php echo base_url("/bootstrap/js/fineuploader-3.7.0.min.js"); ?>"></script> <!-- fine uploader -->
	<script src="<?php echo base_url("/static/js/mp3upload.js"); ?>"></script>
<?php endif; ?>
<?php if(isset($is_talk_page)):?>
	<?php if($talk_exists) : ?>
	<script src="<?= base_url("/static/soundmanager/script/soundmanager2-nodebug-jsmin.js");?>"></script>
	<script src="<?= base_url("/static/soundmanager/bar-ui/script/bar-ui.js"); ?>"></script>
	<link rel="stylesheet" href="<?= base_url("/static/soundmanager/bar-ui/css/bar-ui.css");?>" />
	<?php endif;?>
	<script>
	$('#avTabs a').click(function (e) {
  		e.preventDefault()
  		$(this).tab('show')
	})
	</script>
<?php endif; ?>
<?php if (isset($page) && $page == "editseries") : ?>
	<script src="<?php echo base_url("/bootstrap/js/fineuploader-3.7.0.min.js"); ?>"></script> <!-- fine uploader -->
	<script src="<?php echo base_url("/static/js/coverupload.js"); ?>"></script>
<?php endif; ?>
<?php if (isset($page) && ($page == "edittalk" || $page == "addtalk")) : ?>
	<script>
		$("#seriesselector").change(function() {
    		var seriesId = $(this).val();
    		
    		$.ajax( base_url + "ajax/getartworkurl/" + seriesId)
        		.done(function(data) {    
            		$("#artwork").attr("src", data);
        		});
		});
	</script>
<?php endif; ?>
<?php if (isset($page) && $page == "edittalk") : ?>
	<script src="<?php echo base_url('/bootstrap/js/bootstrap-datepicker.js')?>"></script>
	<script>
		$('#datepicker').datepicker({format:"yyyy-mm-dd"})
	</script>
<?php endif; ?>
<?php if ($isLoggedIn) : ?>
	<script src="<?php echo base_url("/static/js/admin.js");?>"></script>
<?php endif; ?>
<?php if (isset($page) && $page == "admin/questions") : ?>
	<script src="//js.pusher.com/2.2/pusher.min.js"></script>
	<script>
		navigator.vibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate; // Cross-browser vibration api

		var pusher = new Pusher('<?= $this->config->item("pusher_api_key");?>');
		var channel = pusher.subscribe('talk-<?=$talk->id;?>');
		function escapeHtml(text) {
		  var map = {
		    '&': '&amp;',
		    '<': '&lt;',
		    '>': '&gt;',
		    '"': '&quot;',
		    "'": '&#039;'
		  };

		  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
		}

		function getDate(elem) {
			date = new Date($(elem).attr("data-timestamp")*1000);
			return date;
		}

		channel.bind('questionAdded', function(data) {
			if($("#question-list").length==0) {
				window.location.reload(); // Reload the page if we've just received the first question.
			} else {
				$("#question-list").append('<tr id="question-'+data.id+'" data-timestamp="'+data.timestamp+'"><td>' + escapeHtml(data.question) + '</td><td><a href="'+base_url+'admin/deletequestion/'+data.id+'" class="btn btn-danger btn-sm">Delete</a></td></tr>');
				$("#no-questions-text").remove();
				if(navigator.vibrate) { // Vibrate phone to indicate that a new question has been received.
					navigator.vibrate([200,200,200]); // on-off-on
				}
			}
		});

		channel.bind('questionAnswered', function(data) {
			$("#question-"+data.id).detach().appendTo("#answered-question-list");
			$("#question-"+data.id).addClass("text-muted");
			$("#question-"+data.id+" .btn-default").text("Unarchive");
		});

		channel.bind('questionUnAnswered', function(data) {
			$("#question-"+data.id).detach().appendTo("#question-list");
			$("#question-"+data.id).removeClass("text-muted");
			$("#question-"+data.id+" .btn-default").text("Archive");
		});

		channel.bind('questionDeleted', function(data) {
			$("#question-"+data.id).remove();
		});
	</script>
<?php endif; ?>
<?php if (!get_cookie('disable_analytics')) :?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41427098-4', 'auto');
	  ga('send', 'pageview');

<?php if(isset($is_talk_page)):?>
	$(".play-pause").click(function(e){
		ga('send', 'event', 'audio', 'play', window.location.toString());
		console.log("playing...");
		$(".play-pause").off();
	});

	$(".download").click(function(e){
		ga('send', 'event', 'audio', 'download', window.location.toString());
		console.log("downloaded");
		$(".download").off();
	});
	<?php if($talk[0]->video && preg_match("/(?:https?:\/\/(?:www.)?youtube.com\/watch\?(?:[a-zA-Z0-9_=&]*&)?v=)([a-zA-Z0-9_-]*)/", $talk[0]->video, $matches)):?>
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		var playerID = "ytPlayer";
		var firstPlay = true; // Tracks whether this is the first video play...
		var ytPlayer;

		function onYtStateChange(event) {
			if (event.data == YT.PlayerState.PLAYING && firstPlay) {
				firstPlay = false; // Only interested in first time video is played...
				ga('send', 'event', 'video', 'play', window.location.toString());
			}
			if (event.data == YT.PlayerState.ENDED) {
				ga('send', 'event', 'video', 'ended', window.location.toString());
			}
		}

		function onYouTubeIframeAPIReady() {
  			ytPlayer = new YT.Player(playerID, {
    		events: {
      			'onStateChange': onYtStateChange
    		}
  			});
		}
	<?php endif;?>

<?php endif;?>
	</script>
<?php else: ?>
	<!-- Analytics Disabled because you've been logged in recently -->
<?php endif; ?>
</body>
</html>
