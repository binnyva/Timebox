<h1>Settings</h1>

<form action="" method="post" class="form-area">
<?php
$html = new HTML;
$html->buildInput("enable_habitrpg", "Enable HabitRPG", 'checkbox');

print '<div id="habitrpg-area">';
$html->buildInput("habitrpg_user_id", "HabitRPG User ID");
$html->buildInput("habitrpg_api_key", "HabitRPG API Key");
$html->buildInput("habitrpg_task_id", "Task ID");
print '</div>';

$html->buildInput("action", "&nbsp;", 'submit', "Save Settings");

?>

</form>