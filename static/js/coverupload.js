document.addEventListener("drop", function(e) {
	e.stopPropagation();
	e.preventDefault();
}, false);

document.getElementById("uploadlink").addEventListener("click", function(e) {
	e.preventDefault();
	fineUploaderBasicInstance.addFiles(document.getElementById("fileselector").files);
}, false);

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
		// endpoint: '<?php echo base_url("ajax/coverupload/".$this->uri->segment(3)); ?>'
		endpoint: base_url + "/ajax/coverupload/" + document.URL.substr(document.URL.lastIndexOf('/') + 1) // This is set by PHP in the footer
	},
	paste: {
		targetElement: function(){return document.querySelctor("textarea");}
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