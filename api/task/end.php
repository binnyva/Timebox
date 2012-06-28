<?php
require('../../common.php');

if(empty($QUERY['task_id'])) print '{"error":"Task ID not given", "success":false}';

$task = new Task();
$messages = $task->end($QUERY['task_id']);

print json_encode($messages); 
