$(document).on("submit", "#FormLogin", function (e) {
	$(".icon-button").removeClass("hide");
	$('input').each(function() {
		$(this).prop("readonly", true);	
	})

	$('button').each(function() {
		$(this).prop("disabled", true);	
	})
});
