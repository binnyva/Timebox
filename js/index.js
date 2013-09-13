var time_in_mins = 0;
var ticker;
var extended_for = 0;
var multiple_tasks = [];
var multiple_task_index = 0;

function init() {
	$("#start-task-form").submit(startTaskAction);
	$("#done-form").submit(endTaskAction);
	$("#open-popup").click(openPopup);
	
	if($(window).width() < 400) $("#open-popup").hide(); // Hide the open popup link in a popup.
}


function startTaskAction(e) {
	e.preventDefault();
	
	if(!check(validation_rules)) return false;
	
	var task = $("#task").val();
	if(!multiple_task_index) {
		multiple_tasks = task.split("\n");
		if(multiple_tasks.length > 1) {
			task = multiple_tasks[multiple_task_index];
			multiple_task_index++;
		}
	}
	
	var time = $("#time").val();
	
	startTask(task, time);
	return false;
}

function startTask(task, time) {
	$.ajax(	{"url"		: base_url + "api/task/start.php", 
			"dataType"	: "json", 
			"data"		: {"task": task, "time": time}, 
			"type"		: "POST",
			"success"	: taskStarted
	});
}

function nextTask() {
	console.log("Next - " + multiple_tasks.length +"<"+ multiple_task_index);
	if(multiple_tasks.length < multiple_task_index+1) {
		showMessage({"success": "All "+multiple_tasks.length+" tasks done."});
		$("#task").val("");
		multiple_task_index = 0;
		return;
	}
	var task = multiple_tasks[multiple_task_index];
	multiple_task_index++;
	
	$("#task").val(task);
}


function taskStarted(data) {
	$("#start-task").hide();
	$("#task-mode").show();
	$("#success-message").hide();
	$("#error-message").hide();
	
	$(".task_id").val(data.success);
	$("#task-name").html(data.task);
	
	time_in_mins = data.time;
	tick();
	ticker = window.setInterval(tick, 60000);
}

// Runs every one minute.
function tick() {
	if(time_in_mins == 0) {
		$("body").addClass("timeout");
	}

	var time = convertHourMinFormat(time_in_mins);
	$("#task-time").html(time);
	time_in_mins--;
}

// Called when the user clicks the Done button.
function endTaskAction(e) {
	e.preventDefault();
	
	$("body").removeClass("timeout");
	var task_id = $("#task_id-done").val();
	time_in_mins = 0;
	extended_for = 0;
	window.clearInterval(ticker);
	
	
	$.ajax(	{"url"		: base_url + "api/task/end.php", 
			"dataType"	: "json", 
			"data"		: {"task_id": task_id}, 
			"type"		: "POST",
			"success"	: taskEnded
	});
	return false;
}
function taskEnded(data) {
	var task = $("#task-name").html();
	var time_taken = data.time_taken;
	
	if(multiple_task_index > 0) {
		nextTask();
	} else {
		$("#task").val("");
		$("#time").val(30);
	}
	$("#task-mode").hide();
	$("#start-task").show();
	
	showMessage({"success": "Task '"+task+"' done in "+time_taken});
}

function showPostponeOption() {
	$("#postpone-options").show();
}

function openPopup(e) {
	var url = this.href;
	window.open(url, "popup_id", "resizable,width=300,height=300");
	
	e.preventDefault();
}


/// Converts minutes into Hour:Minute format. For eg 100 will come out as 01:40
function convertHourMinFormat(time) {
	var sign = "";
	if(time < 0) { // If the time has run out, it will put a '-' sign in front of the time.
		sign = "-";
		time = Math.abs(time);
	}
	
	var mins = time % 60;
	var hours = Math.floor(time / 60);
	return sign + pad2(hours) + ":" + pad2(mins);
}

function pad2(number) {
	return (number < 10 ? '0' : '') + number;
}
