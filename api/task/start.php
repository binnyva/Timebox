<?php
require('../../common.php');

$task = new Task();
$messages = $task->create($QUERY['task'], $QUERY['time']);

print json_encode($messages);