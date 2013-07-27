$("#cancelbutton").on("click", function(e) { e.preventDefault; fineUploaderBasicInstance.cancelAll(); });

document.addEventListener("drop", function(e) {
	e.stopPropagation();
	e.preventDefault();
}, false);

var dragAndDropModule = new qq.DragAndDrop({
	dropZoneElements: [document.getElementById("dropzone")],
	classes: {
		dropActive: "dropactive"
	},
	allowMultipleItems: false,
	hideDropZonesBeforeEnter: true,
	callbacks: {
		processingDroppedFiles: function () {
			$("#dropzone").css("display: block;");
			$("#dropzone").addClass("processing");
			console.log($("#dropzone"));
			$("#dropzone>h3").html('<i class="icon-refresh icon-spin"></i> Processing...');
		},
		processingDroppedFilesComplete: function (files) {
			console.log("All files processed");

			file = files[0];
			$("span#filename").html("selected file: " + file.name + " (" + bytesToSizeDecimal(file.size) + "). Click to choose a different one.")
			$("#uploadlink").removeClass("disabled");
			$(".progress").removeClass("hide");

			$("#dropzone").removeClass("processing dropactive");
			$("#dropzone>h3").html('Drop file here to begin upload');


			/* plays dropped file automatically */
			var reader = new FileReader();
			reader.onload = function(e){
				var audioElement = document.createElement('audio');
				audioElement.setAttribute('src', e.target.result);
				audioElement.play();
			}
			reader.readAsDataURL(files[0]);
			fineUploaderBasicInstance.addFiles(files);
		}
	}
});

fineUploaderBasicInstance = new qq.FineUploaderBasic({
	request: {
		//endpoint: '<?php echo base_url("ajax/mp3upload/".$this->uri->segment(3)); ?>'
		endpoint: base_url + "/ajax/mp3upload/" + document.URL.substr(document.URL.lastIndexOf('/') + 1) // This is set by PHP in the footer
	},
	multiple: false,
	validation: {
        allowedExtensions: ['mp3'],
        sizeLimit: 100 * 1024 * 1024 // 100MB
      },
	callbacks: {
		onProgress: function(id, name, uploadedBytes, totalBytes) {
			var percentage = uploadedBytes / totalBytes * 100;
			$("#progresstext").html(percentage.toFixed(1) + "%")

			if (uploadedBytes === totalBytes) {
				$("#progresstext").html("");
				$("#progressdescription").html("");
				$(".progress").addClass("progress-striped active");
				$(".bar").html('<i class="icon-refresh icon-spin"></i> Processing...');
			}

			$(".bar").width(percentage + "%");
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
			$(".bar").width(0);
		}
	}
});


$("#mp3selector").on("change", function (e) {
	file = e.target.files[0];
	$("span#filename").html("selected file: " + file.name + " (" + bytesToSizeDecimal(file.size) + "). Click to choose a different one.")
	$("#uploadlink").removeClass("disabled");
	$(".progress").removeClass("hide");
});

function bytesToSizeDecimal(bytes) {
	var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	if (bytes == 0) return 'n/a';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

$("#uploadlink").on("click", function(e) {
 	e.preventDefault();
 	fineUploaderBasicInstance.addFiles(document.getElementById("mp3selector").files);
});