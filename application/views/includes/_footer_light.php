	</div><!-- close container-->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- Jqeury cdn -->

	<script src="<?php echo base_url("/bootstrap/js/bootstrap.min.js"); ?>"></script> <!-- boostrap plugins -->
	<script src="<?php echo base_url("/static/js/functions.js"); ?>"></script> <!-- general functions -->
<?php if ($disable_analytics) :?>
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
