<?php
require('../../common.php');

$task = new Task();
$messages = $task->create($QUERY['task'], $QUERY['time']);
$i_plugin->callHook("task_start", array(
		'task_id' => $messages['success'],
		'mode' => $QUERY['mode']
	));


print json_encode($messages);