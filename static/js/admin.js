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

/*
	Auto-populate slug field
*/
$titleField = $("input[name=title]");
$slugField = $("input[name=slug]");

if ($titleField.data("liveslug") != false) {
	$titleField.keyup(function(e) {
		$slugField.val($titleField.val().toLowerCase().trim().replace(/\&/gi, "and").replace(/[^A-Za-z0-9_ \.\~]/gi, "").replace(/ +/g, "-"));
	});	
} else {
	$titleField.keyup(function(e) {
		$slugField.tooltip({
			title: "You've changed the title. Make sure the url slug reads well now!",
			trigger: "manual",

		}).tooltip('show');
		$slugField.parent().addClass("has-warning");
	});
}

