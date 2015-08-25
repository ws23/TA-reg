<?php session_start();  ?>
<?php require_once(dirname(__FILE__) . "/lib/std.php");  ?>
<!Doctype html>
<?php require_once(dirname(__FILE__) . "/config.php");  ?>
<html>
<head>
	<meta charset="utf8">
	
	<title>通識教育中心擔任教學助理（TA）申請</title>
	<link rel="stylesheet" href="<?php echo $URLPv; ?>lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $URLPv; ?>index.css">
	<script src="<?php echo $URLPv; ?>lib/jquery/jquery-1.11.2.js"></script>
	<script src="<?php echo $URLPv; ?>lib/bootstrap/js/bootstrap.js"></script>

</head>
<body>
<?php require_once(dirname(__FILE__) . "/lib/header.php"); ?>
<div class="container body">
<?php	if(isset($_SESSION['stuID'])) {	
			$result = $DBmain->query("SELECT * FROM `apply` WHERE `stuID` = '{$_SESSION['stuID']}'");
			if($result){
				$row = $result->fetch_array(MYSQLI_BOTH); 
				if($row['page']==99)
					locate($URLPv . "print.php"); 
				else
					locate($URLPv . "apply.php"); 
			}
			else
				locate($URLPv . "apply.php"); 
	}
		else if(isset($_POST['stuID']) && isset($_POST['stuPW'])) {
			if(CheckPOP3("ems.ndhu.edu.tw", $_POST['stuID'], $_POST['stuPW'])){
				$_SESSION['stuID'] = $_POST['stuID']; 
				setLog($DBmain, "info", "Login Success", $_SESSION['stuID']); 
				setLogin($DBmain, $_SESSION['stuID']); 
				locate($URLPv . "index.php"); 
			}
			else{ 
				setLog($DBmain, "warning", "Login Failed.", $_POST['stuID']); 
				alert("Login Failed! Please try again. "); 
				locate($URLPv . "index.php"); 
			}
		}
		else {  ?>
	<div class="login">
		<form action="index.php" method="post">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2">Email: </label>
					<div class="col-sm-6">
						<input type="text" name="stuID" placeholder="NDHU mail" class="form-control" /> 
					</div>
					<label class="control-label col-sm-4">@ems.ndhu.edu.tw</label>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Password: </label>
					<div class="col-sm-10">
						<input type="password" name="stuPW" placeholer="Password" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Login" class="form-control btn btn-success"/>
				</div>
			</div>
		</form>
	</div>

<?php	}	?>
</div>
<?php require_once(dirname(__FILE__) . "/lib/footer.php"); ?>
