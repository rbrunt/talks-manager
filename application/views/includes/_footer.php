	</div><!-- close container-->
	
	<footer id="footer">
		<div class="container">
			<p>Designed an built by <a href="http://richardbrunt.co.uk">Richard Brunt</a> for <a href="http://diccu.co.uk">DICCU</a></p>
			<p>This is an open source project - get the source code at <a href="https://github.com/rbrunt/talks-manager">Github</a></p>
			<p><small><a href="<?php echo base_url('/about/cookies/'); ?>">Cookies</a> | <a href="<?php echo base_url('/about/copyright/'); ?>">Copyright</a> | <a href="<?php if ($isLoggedIn) {echo base_url('/admin/');} else{echo base_url("admin/login");}; ?>"><?php echo ($isLoggedIn ? "Admin" : "Login" ); ?></a></small></p>
<?php if ($isLoggedIn) : ?>			
			<p><small>Logged in as <?php echo $this->session->userdata("useremail");?>. Page took {elapsed_time} seconds to build</small></p>
<?php endif; ?>			
		</div>
	</footer>
	<!-- begin Script includes -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- Jqeury cdn -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.3.1/jquery.cookie.min.js"></script>
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/Cookies.js/0.3.1/cookies.min.js"></script>-->
	<script src="<?php echo base_url("/bootstrap/js/bootstrap.min.js"); ?>"></script> <!-- boostrap plugins -->
	<script src="<?php echo base_url("/static/js/functions.js"); ?>"></script> <!-- general functions -->
<?php if (isset($page) && $page == "uploadtalk") : ?>
	<script src="<?php echo base_url("/bootstrap/js/fineuploader-3.7.0.min.js"); ?>"></script> <!-- fine uploader -->
	<script src="<?php echo base_url("/static/js/mp3upload.js"); ?>"></script>
<?php endif; ?>
<?php if (isset($page) && $page == "editseries") : ?>
	<script src="<?php echo base_url("/bootstrap/js/fineuploader-3.7.0.min.js"); ?>"></script> <!-- fine uploader -->
	<script src="<?php echo base_url("/static/js/coverupload.js"); ?>"></script>
<?php endif; ?>
</body>
</html>
