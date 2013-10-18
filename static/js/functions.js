/*
  Event Listeners:
*/

$(document).ready(function(){
		$(".activate-tooltip").tooltip(); // Add a bootstrap tooltip to all elements with the .activate-tooltip class
});

/*
	General Utility Functions:
*/

function bytesToSizeDecimal(bytes) {
	var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	if (bytes == 0) return 'n/a';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

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

/*
	Searchbar Handlers:
*/

$("#searchbox").keydown(function (e) {
	if(checkEnter(e)){
		e.preventDefault();
 		window.location.href = base_url + "search/"+$("#searchbox").val();
 	}
 	});

/*
	Popover Activation & Utilities:
*/

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
			return "<div id=\"popoverinner\"><img class=\"img-center\" alt=\"Loading...\"src=\"" + base_url + "bootstrap/img/ajax-loader.gif\"></img></div>";
		} else {
			return passagecontent;
		}
	}
});

function getPassage(passage) {
	$.post(base_url + "ajax/esvlookup", {passage: passage}, function (data) {
		passagecontent = data;
		$("#popoverinner").html(data);
		$("#passagelink").popover("show");
	});
}
