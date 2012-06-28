<div id="start-task">
<h2>New Task</h2>

<form action="" method="post" id="start-task-form">
<textarea name="task" id="task" rows="5" cols="30"></textarea><br />
Time <input type="text" name="time" id="time" value="30" size="4" /> minutes<br />
<input type="submit" value="Start Task" name="action" id="action" />
</form>
</div>

<div id="task-mode">
<h3 id="task-name"></h3>

<h1 id="task-time"></h1>

<div id="progress-bar"><div id="over-bar"></div></div>

<!--
<a onclick="postpone(5)">Give me 5 more mins!</a> <a onclick="showPostponeOption()">+</a>
<div id="postpone-options"><form action="" method="post" id="postpone-form">
<input type="submit" name="action" value="Give me" /> <input type="text" name="postpone-for" value="10" size="3" /> mins.
<input type="hidden" name="task_id" class="task_id" id="task_id-postpone" value="" />
</form></div>
-->

<form action="" method="post" id="done-form">
<input type="submit" id="done" name="action" value="Done!" />
<input type="hidden" name="task_id" class="task_id" id="task_id-done" value="" />
</form>
</div>

<script type="text/javascript" src="<?php echo $abs ?>js/library/validation.js"></script>
<script type="text/javascript">
var validation_rules = <?php $task = new Task; print json_encode($task->getValidationRules()); ?>;
</script>