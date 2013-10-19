/*
	Confirm deletion of talks / series
*/

var secondDeletePress = false;

$("#deletebutton").click(function(e) {
	if (!secondDeletePress) {
		e.preventDefault();
		$(this).html("Click again to confirm");
		secondDeletePress = true;
	}
});