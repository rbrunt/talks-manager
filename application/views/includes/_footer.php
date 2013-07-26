	</div><!-- close container-->
	
	<footer id="footer">
		<div class="container">
			<p>Designed an built by <a href="http://richardbrunt.co.uk">Richard Brunt</a> for <a href="http://diccu.co.uk">DICCU</a></p>
			<p>This is an open source project - get the source code at <a href="https://github.com/rbrunt/talks-manager">Github</a></p>
			<p><small><?php if ($isLoggedIn) : ?>Page took {elapsed_time} seconds to build | <?php endif; ?><a href="<?php if ($isLoggedIn) {echo base_url('/admin/');} else{echo base_url("admin/login");}; ?>"><?php echo ($isLoggedIn ? "Admin" : "Login" ); ?></a></small></p>
		</div>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo base_url("/bootstrap/js/bootstrap.min.js"); ?>"></script>
	<script src="<?php echo base_url("/bootstrap/js/fineuploader-3.7.0.min.js"); ?>"></script>
	<script>
	var base_url = "<?php echo base_url(); ?>";

		$("#searchbox").keydown(function (e) {
			if(checkEnter(e)){
				e.preventDefault();
		 		console.log("searching for: "+$("#searchbox").val());
		 		console.log("<?php echo base_url();?>search/"+$("#searchbox").val());
		 		window.location.href = "<?php echo base_url();?>search/"+$("#searchbox").val();
		 	}
		 	});

		$(document).ready(function(){
  			$(".activate-tooltip").tooltip();
		});

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

		var passagecontent = "";

		$("#passagelink").popover({
			html: true,
			trigger: "hover focus",
			title: function (){
				return "<strong>"+$("#passagelink").html()+" <a href=\"http://www.esv.org\" class=\"muted pull-right\">ESV</a></strong>";
			},
			delay: {
				hide: 500
			},
			content: function() {
				if (passagecontent == "") {
					getPassage($("#passagelink").html());
					return "<div id=\"popoverinner\"><img class=\"img-center\" alt=\"Loading...\"src=\"<?php echo base_url("bootstrap/img/ajax-loader.gif"); ?>\"></img></div>";
				} else {
					return passagecontent;
				}
			}
		});

		function getPassage(passage) {
			$.post("<?php echo base_url("/ajax/esvlookup"); ?>", {passage: passage}, function (data) {
				passagecontent = data;
				$("#popoverinner").html(data);
			});
		}
	</script>
<?php if (isset($page) && $page == "uploadtalk") : ?>
	<script src="<?php echo base_url("/static/js/mp3upload.js"); ?>"></script>
<?php endif; ?>
<?php if (isset($page) && $page == "editseries") : ?>
	<script src="<?php echo base_url("/static/js/coverupload.js"); ?>"></script>
<?php endif; ?>
</body>
</html>
