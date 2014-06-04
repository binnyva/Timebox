<?php
require_once(joinPath($config['site_folder'] , 'models/User.php'));
$user = new User;
if(strpos($config['PHP_SELF'], '/user/') === false) checkUser();
if(strpos($config['PHP_SELF'], '/user/profile.php') !== false) checkUser();

function checkUser($check_admin = false) {
	global $config;
	
	if((!isset($_SESSION['user_id']) or !$_SESSION['user_id']))
		showMessage("Please login to use this feature", $config['site_home'] . 'user/login.php', "error");
}

/// Get the time difference between the two given time and returns it as an hour, minute array
function getTimeDifference($from, $to, $return_type='hour_min') {
	// The argument can be a timestamp or a mysql date string - both are parsed correctly
	if(!is_numeric($from)) $from = strtotime($from);
	if(!is_numeric($to)) $to = strtotime($to);
	if(!$to) $to = time(); // If $to is 0, that means its an ongoing task - so give it current time.
	
	$diff = $to - $from;
	if($return_type != 'hour_min') return $diff;
	return seconds2hourmin($diff, $return_type);
}

/// Converts the seconds given as the argument to a hour, minute array.
function seconds2hourmin($seconds, $return_type='array') {
	$minute_difference = ($seconds/60) % 60;
	$hour_difference = floor(($seconds/60)/60);
	
	if($return_type != 'array') {
		$diff = '';
		if($hour_difference) $diff = "$hour_difference hours, ";
		$diff .= "$minute_difference mins";
		return $diff;
	}
	return array($hour_difference, $minute_difference);
}
