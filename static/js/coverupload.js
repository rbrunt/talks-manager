document.addEventListener("drop", function(e) {
	e.stopPropagation();
	e.preventDefault();
}, false);

document.getElementById("uploadlink").addEventListener("click", function(e) {
	e.preventDefault();
	fineUploaderBasicInstance.addFiles(document.getElementById("fileselector").files);
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
			$("#dropzone>h3").html('<i class="icon-refresh icon-spin"></i> Processing...');
		},
		processingDroppedFilesComplete: function (files) {
			console.log("All files processed");

			$("span#filename").html("<strong>" + files[0].name + " (" + bytesToSizeDecimal(files[0].size) + ")</strong>");
			$("#uploadlink").removeClass("disabled");
			$(".progress").removeClass("hide");

			$("#dropzone").removeClass("processing dropactive");
			$("#dropzone>h3").html('Drop file here to begin upload');




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
		// endpoint: '<?php echo base_url("ajax/coverupload/".$this->uri->segment(3)); ?>'
		endpoint: base_url + "/ajax/coverupload/" + document.URL.substr(document.URL.lastIndexOf('/') + 1) // This is set by PHP in the footer
	},
	multiple: false,
	callbacks: {
		onProgress: function(id, name, uploadedBytes, totalBytes) {
			var percentage = uploadedBytes / totalBytes * 100;
			console.log("progress: "+ percentage + "%");
			$("#progress").width(percentage + "%");
		},
		onComplete: function(id, name, responseJSON, xhr) {
			console.log(xhr);
			if (responseJSON.success) {
				file = fineUploaderBasicInstance.getFile(id);

				var reader = new FileReader();
				reader.onload = function(e){
					var data = e.target.result;

					$("#cover").attr("src", data);
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
			$("#progress").width(0);
			$("#progress").css("background-image", "");
		}
	}
});

$("#fileselector").on("change", function (e) {
	file = e.target.files[0];
	$("#uploadlink").removeClass("disabled");
	$("span#filename").html("<strong>" + file.name + " (" + bytesToSizeDecimal(file.size) + ")</strong>");
	//$(".progress").removeClass("hide");
});
