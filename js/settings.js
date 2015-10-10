function init() {
	if($("#enable_habitrpg").prop("checked")) {
		$("#habitrpg-area").toggle();
	}

	$("#enable_habitrpg").click(function() {
		$("#habitrpg-area").toggle();
	});
}