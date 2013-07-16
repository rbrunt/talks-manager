	</div><!-- close container-->
	
	<footer id="footer">
		<div class="container">
			<p>Designed an built by <a href="http://richardbrunt.co.uk">Richard Brunt</a> for <a href="http://diccu.co.uk">DICCU</a></p>
			<p>This is an open source project - get the source code at <a href="https://github.com/rbrunt/talks-manager">Github</a></p>
			<p><small>Page took {elapsed_time} seconds to build | <a href="<?php if ($isLoggedIn) {echo base_url('/admin/');} else{echo base_url("admin/login");}; ?>">Admin</a></small></p>
		</div>
	</footer>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url("/bootstrap/js/bootstrap.min.js"); ?>"></script>
	<script src="<?php echo base_url("/bootstrap/js/fineuploader-3.7.0.min.js"); ?>"></script>
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

		var passagecontent = "";

		$("#passagelink").popover({
			html: true,
			trigger: "hover focus",
			title: function (){
				return "<strong>"+$("#passagelink").html()+" <a href=\"http://www.esv.org\" class=\"muted pull-right\">ESV</a></strong>";
			},
			content: function() {
				if (passagecontent == "") {
					getPassage($("#passagelink").html());
					return "<div id=\"popoverinner\"><img class=\"img-center\" alt=\"Loading...\"src=\"<?php echo base_url("bootstrap/img/ajax-loader.gif"); ?>\"></img></div>";
				} else {
					return passagecontent;
				}
			}
			//delay: {hide:500}
		});

		function getPassage(passage) {
			$.post("<?php echo base_url("/ajax/esvlookup"); ?>", {passage: passage}, function (data) {
				passagecontent = data;
				$("#popoverinner").html(data);
			});
		}

		/*
		 * This is a JavaScript Scratchpad.
		 *
		 * Enter some JavaScript, then Right Click or choose from the Execute Menu:
		 * 1. Run to evaluate the selected text (Ctrl+R),
		 * 2. Inspect to bring up an Object Inspector on the result (Ctrl+I), or,
		 * 3. Display to insert the result in a comment after the selection. (Ctrl+L)
		 */

		// function handleDragOver(e) {
		//     e.stopPropagation();
		//     e.preventDefault();
		//     e.dataTransfer.dropEffect = "copy";
		// }

		// function handleFileSelect(e) {
		//     e.stopPropagation();
		//     e.preventDefault();
		    
		//     var files = e.target.files || e.dataTransfer.files;
		//     var file = files[0]
		//     console.log(file);
		    
		//     if (file.type.indexOf("image") == 0) {
		//         var reader = new FileReader();
		//         console.log("file is an image...");
		//         console.log(reader);
		//         reader.onload = function(e){
		//             console.log("replacing image...");
		//             $(".span3 > img:nth-child(1)").attr("src", e.target.result);
		//         }
		//         reader.readAsDataURL(file);
		//         console.log(reader);
		//     }
		// }


		// var dropZone = document.getElementById("dragtarget");

		// var progress = document.getElementById("progress");

		// dropZone.addEventListener("dragover", handleDragOver, false);
		// dropZone.addEventListener("drop", handleFileSelect, false);
		// $(document).ready(function() {
		//     $('#dragtarget').fineUploader({
		//       request: {
		//         endpoint: '<?php echo base_url("ajax/coverupload"); ?>';
		//       },
		//       multiple: false,
		//       validation: {
		//       	allowedExtensions: ["jpeg", "jpg", "png", "gif"],
		//       	itemLimit: 1
		//       }

		//     }).on('complete', function(event, id, fileName, responseJSON) {
  //     			if (responseJSON.error) {
  //       			var errorhtml = '<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error:</strong>' + responseJSON.error + '</div>';
  //       			$("#alertcontainer").append(errorhtml);
  //     			} else {
  //       			var html = '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong>' + responseJSON.success + '</div>';
  //       			$("#alertcontainer").append(errorhtml);
  //     			}
  //   		});;
		// });

		var dragAndDropModule = new qq.DragAndDrop({
			dropZoneElements: [document.getElementById("dragtarget")],
			classes: {
				dropActive: "droptargetactive"
			},
			callbacks: {
				processingDroppedFiles: function () {
					qq(document.getElementById("dragtarget")).addClass("droptargetactive");
				},
				processingDroppedFilesComplete: function (files) {
					var reader = new FileReader();
					reader.onload = function(e){
						$("#progress").css("background-image", "url(" + e.target.result +")");
					}
					reader.readAsDataURL(files[0]);


					fineUploaderBasicInstance.addFiles(files);
				}
			}
		});

		fineUploaderBasicInstance = new qq.FineUploaderBasic({
			request: {
				endpoint: '<?php echo base_url("ajax/coverupload/".$this->uri->segment(3)); ?>'
			},
			multiple: false,
			callbacks: {
				onProgress: function(id, name, uploadedBytes, totalBytes) {
					var percentage = uploadedBytes / totalBytes * 100;
					console.log("progress: "+ percentage + "%");
					$("#progress").width(percentage + "%");
				},
				onComplete: function(id, name, responseJSON, xhr) {
					if (responseJSON.success) {
						file = fineUploaderBasicInstance.getFile(id);

						var reader = new FileReader();
						reader.onload = function(e){
							var data = e.target.result;

							$("#cover").attr("src", data);
							qq(document.getElementById("dragtarget")).removeClass("droptargetactive");
							$("#progress").width(0);
							$("#progress").css("background-image", "");
						}
						reader.readAsDataURL(file);
						var html = '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success! </strong>' + responseJSON.message + '</div>';
						$("#alertscontainer").append(html);
					}
				},
				onError: function (id, name, errorReason, xhr) {
					var html = '<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error: </strong>' + errorReason + '</div>';
					$("#alertscontainer").append(html);
					qq(document.getElementById("dragtarget")).removeClass("droptargetactive");
					$("#progress").width(0);
					$("#progress").css("background-image", "");
				}
			}
		});


		
	</script>
</body>
</html>
