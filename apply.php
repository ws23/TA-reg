<?php session_start(); 
require_once(dirname(__FILE__) . "/lib/std.php"); 
require_once(dirname(__FILE__) . "/config.php"); 
if(!isset($_SESSION['stuID'])){
	setLog($DBmain, "warning", "Illegal Entry. "); 
	locate($URLPv . "index.php"); 
}
else{
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf8">
	<title>通識教育中心擔任教學助理（TA）申請</title>
	<link rel="stylesheet" href="<?php echo $URLPv; ?>lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $URLPv; ?>inex.css">
	<script src="<?php echo $URLPv; ?>lib/jquery/jquery-1.11.2.js"></script>
	<script src="<?php echo $URLPv; ?>lib/bootstrap/js/bootstrap.js"</script>
</head>
<body>
<?php require_once(dirname(__FILE__) . "/lib/header.php"); ?>
<div class="container body">




</div>
<?}
