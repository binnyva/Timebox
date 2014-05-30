<?php
function showAtStart() {
	print "Hello World";
}
//$this->addHook("init", "showAtStart");

function showAtEnd() {
	print "Goodbye World";
}
//$this->addHook("end", "showAtEnd");

function pomodoroDone($args) {
	require("/var/www/Others/Library/HabitRPHPG/HabitRPHPG.php");
	require('/var/www/Others/Library/HabitRPHPG/tools/config.php');
	$api = new HabitRPHPG($user_id, $api_key);
	// $tasks = $api->findTask("25 Mins Work"); $task_id = $tasks[0]['id'];
	$task_id = "bc5d32e5-5348-41b5-8bbd-a7aa1add3f70";
	$api->doTask($task_id, 'up');

}
$this->addHook("task_end", "pomodoroDone");