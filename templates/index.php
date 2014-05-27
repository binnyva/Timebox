<div id="progress"></div>
<div id="start-task">
<h2>TimeBox</h2>

<div id="normal-mode">
<form action="" method="post" id="start-task-form">
<textarea name="task" id="task" rows="5" cols="30" autofocus></textarea><br />
Time <input type="text" name="time" id="time" value="15" size="4" /> minutes<br />
<input type="submit" value="Start" name="action" class="action" id="action" />
</form>
</div>


<div id="pomodoro-mode">
<input type="button" value="Start" name="action" class="action" id="pomodoro-start" />
</div>

</div>

<div id="task-mode">
<h3 id="task-name"></h3>

<h1 id="task-time"></h1>

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


<a href="#" id="pomodoro-mode-switch">Pomodoro Mode</a>
<a href="index.php" id="open-popup">Open Popup</a>