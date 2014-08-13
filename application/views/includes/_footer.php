	</div><!-- close container-->
	
	<footer id="footer">
		<div class="container">
			<p>Designed an built by <a href="http://richardbrunt.co.uk">Richard Brunt</a> for <a href="http://diccu.co.uk">DICCU</a></p>
			<p><small><a href="<?php echo base_url('/about/cookies/'); ?>">Cookies</a> | <a href="<?php echo base_url('/about/copyright/'); ?>">Copyright</a> | <a href="<?php if ($isLoggedIn) {echo base_url('/admin/');} else{echo base_url("admin/login");}; ?>"><?php echo ($isLoggedIn ? "Admin" : "Login" ); ?></a></small></p>
<?php if ($isLoggedIn) : ?>			
			<p><small>Logged in as <?php echo $this->session->userdata("userrealname")?> (<?php echo $this->session->userdata("useremail");?>). Page took {elapsed_time} seconds to build</small></p>
<?php endif; ?>			
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
<?php if (!$isLoggedIn) :?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-41427098-4', 'diccu.co.uk');
		ga('send', 'pageview');
	</script>
<?php endif; ?>
</body>
</html>
