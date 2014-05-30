<?php
require('../../common.php');

if(empty($QUERY['task_id'])) {
	print '{"error":"Task ID not given", "success":false}';
	exit;
}

$task = new Task();
$messages = $task->end($QUERY['task_id']);
$i_plugin->callHook("task_end", array(
		'task_id' => $QUERY['task_id'],
		'mode' => $QUERY['mode']
	));

print json_encode($messages); 
