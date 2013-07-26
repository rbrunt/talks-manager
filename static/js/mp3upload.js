$("#cancelbutton").on("click", function(e) { e.preventDefault; fineUploaderBasicInstance.cancelAll(); });

fineUploaderBasicInstance = new qq.FineUploaderBasic({
	request: {
		//endpoint: '<?php echo base_url("ajax/mp3upload/".$this->uri->segment(3)); ?>'
		endpoint: base_url + "/ajax/mp3upload/" + document.URL.substr(document.URL.lastIndexOf('/') + 1) // This is set by PHP in the footer
	},
	multiple: false,
	callbacks: {
		onProgress: function(id, name, uploadedBytes, totalBytes) {
			var percentage = uploadedBytes / totalBytes * 100;

			if (uploadedBytes === totalBytes) {
				$("#progresstext").html("");
				$("#progressdescription").html("");
				$(".progress").addClass("progress-striped active");
				$(".bar").html('<i class="icon-refresh icon-spin"></i> Processing...');
			}

			$(".bar").width(percentage + "%");
			$("#progresstext").html(percentage.toFixed(1) + "%")
		},
		onComplete: function(id, name, responseJSON, xhr) {
			console.log("upload complete");
			console.log(xhr);
			if (responseJSON.success) {
				$(".progress").addClass("progress-success");
				$(".progress").removeClass("active");
				$(".progress").removeClass("progress-striped");
				$(".bar").html("<strong>Success!</strong>");
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


$("#mp3selector").on("change", function (e) {
	file = e.target.files[0];
	console.log(file);
	$("span#filename").html("selected file: " + file.name + " (" + bytesToSizeDecimal(file.size) + "). Click to choose a different one.")
	$("#uploadlink").removeClass("disabled");
	$(".progress").removeClass("hide");
	// $(".bar").width("100%");
	// setTimeout(function() {
	// 	$(".bar").width("100%");
	// 	$(".bar").html("Processing...");
	// 	$(".progress").addClass("progress-striped active");
	// }, 2500);
});

function bytesToSizeDecimal(bytes) {
	var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	if (bytes == 0) return 'n/a';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};


document.getElementById("uploadlink").addEventListener("click", function(e) {
 	e.preventDefault();
 	fineUploaderBasicInstance.addFiles(document.getElementById("mp3selector").files);
}, false);
