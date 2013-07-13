	</div><!-- close container-->
	
	<footer id="footer">
		<div class="container">
			<p>Designed an built by <a href="http://richardbrunt.co.uk">Richard Brunt</a> for <a href="http://diccu.co.uk">DICCU</a></p>
			<p>This is an open source project - get the source code at <a href="https://github.com/rbrunt/talks-manager">Github</a></p>
			<p><small>Page took {elapsed_time} seconds to build | <a href="<?php if ($isLoggedIn) {echo base_url('/admin/');} else{echo base_url("admin/login");}; ?>">Admin</a></small></p>
		</div>
	</footer>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js')?>"></script>
	<script>
		$("#searchbox").keydown(function (e) {
			if(checkEnter(e)){
				e.preventDefault();
		 		console.log("searching for: "+$("#searchbox").val());
		 		console.log("<?php echo base_url();?>search/"+$("#searchbox").val());
		 		window.location.href = "<?php echo base_url();?>search/"+$("#searchbox").val();
		 	}
		 	});

		$(".activate-tooltip").tooltip();

		function checkEnter(e) {
		    var charCode;
 
		    if(e && e.which){
		        charCode = e.which;
		    }else if(window.event){
		        e = window.event;
		        charCode = e.keyCode;
		    }

		    if(charCode === 13) {
			        return true;
		    	}else{
				return false;	
			}
		}
	</script>
</body>
</html>
