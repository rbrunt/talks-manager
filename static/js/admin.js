/*
	Confirm deletion of talks / series
*/

$(".click-to-confirm").click(function(e) {
	if (!$(this).pressedOnce) {
		e.preventDefault();
		var originaltext = $(this).html();
		$(this).html("Click again to confirm");
		var href = $(this).attr("data-href");
		$(this).attr("href", href);
		$(this).pressedOnce = true;
		var object = $(this);
		setTimeout(function() {
			object.pressedOnce = false;
			object.attr("href", "#");
			object.html(originaltext);
		}, 2000);
	}
});