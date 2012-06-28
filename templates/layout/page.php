<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<title><?php echo $title?></title>
<link href="<?php echo $abs?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $abs?>images/silk_theme.css" rel="stylesheet" type="text/css" />
<?php echo $css_includes ?>
</head>
<body>
<div id="loading">loading...</div>
<div id="header">
</div>

<div id="content">
<div id="error-message" <?php echo ($QUERY['error']) ? '':'style="display:none;"';?>><?php
	if(isset($PARAM['error'])) print strip_tags($PARAM['error']); //It comes from the URL
	else print $QUERY['error']; //Its set in the code(validation error or something.
?></div>
<div id="success-message" <?php echo ($QUERY['success']) ? '':'style="display:none;"';?>><?php echo strip_tags(stripslashes($QUERY['success']))?></div>

<!-- Begin Content -->
<?php 
/////////////////////////////////// The Template file will appear here ////////////////////////////

include($GLOBALS['template']->template); 

/////////////////////////////////// The Template file will appear here ////////////////////////////
?>
<!-- End Content -->
</div>

<script type="text/javascript">
//Global Variables...
var base_url = "<?php echo $abs ?>";
</script>
<script src="<?=$abs?>js/library/jquery.js" type="text/javascript"></script>
<script src="<?=$abs?>js/application.js" type="text/javascript"></script>
<?=$js_includes?>
</body>
</html>