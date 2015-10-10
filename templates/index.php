<div id="progress"></div>
<div id="start-task">
<h2 id="mode">Pomodoro</h2>


<form action="" method="post" id="start-task-form">
<textarea name="task" id="task" rows="5" cols="30" autofocus>Tomato</textarea><br />
<div id="normal-mode">
Time <input type="text" name="time" id="time" value="15" size="4" /> minutes<br />
<input type="button" value="Start" name="action" class="action" id="action" />
</div>


<div id="pomodoro-mode">
<input type="button" value="Start" name="action" class="action" id="pomodoro-start" />
</div>

</div>

<div id="task-mode">
<h3 id="task-name"></h3>

<h1 id="task-time"></h1>

<!--
<a onclick="postpone(5)">Give me 5 mins!</a> <a onclick="showPostponeOption()">+</a>
<div id="postpone-options"><form action="" method="post" id="postpone-form">
<input type="submit" name="action" value="Give me" /> <input type="text" name="postpone-for" value="10" size="3" /> mins.
<input type="hidden" name="task_id" class="task_id" id="task_id-postpone" value="" />
</form></div>
-->

<input type="button" id="done" name="action" value="Done" />
<input type="button" id="cancel" name="action" value="Cancel" />
<input type="hidden" name="task_id" class="task_id" id="task_id-done" value="" />
</form>
</div>

<script type="text/javascript" src="<?php echo $abs ?>js/library/validation.js"></script>
<script type="text/javascript">
var validation_rules = <?php $task = new Task; print json_encode($task->getValidationRules()); ?>;
</script>


<a href="#" id="mode-switch">Switch to TimeBox Mode</a>
<a href="index.php" id="open-popup">Open Popup</a>
<a href="settings.php" id="settings-link">Settings</a>