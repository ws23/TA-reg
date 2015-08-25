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
	<link rel="stylesheet" href="<?php echo $URLPv; ?>index.css">
	<script src="<?php echo $URLPv; ?>lib/jquery/jquery-1.11.2.js"></script>
	<script src="<?php echo $URLPv; ?>lib/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container body print-p2">
<?php
	$result = $DBmain->query("SELECT * FROM `apply` WHERE `stuID` = '{$_SESSION['stuID']}'; ");
	$row = $result->fetch_array(MYSQLI_BOTH); 
?>
	<div class="apply">
		<div class="reg-notice">
			<h5>注意事項：</h5>
			<ol>
				<li>本學期起TA改採報名申請制，每位TA薪資設定為5000～10000之間。</li>
				<li>如果您是授課老師推薦的TA，中心會依TA提供的時段，再媒合其他課程，每人負擔至少需二堂課以上。</li>
				<li>本學期因勞動部政策每人需納入勞健保，並簽訂僱用契約書，實際領取薪資等於薪資設定額-勞健保。</li>
				<li>敬請配合於每月20日前上傳TA工作月誌。</li>
				<li>請將此申請書列印並簽名後，於期限內送至通識教育中心始得完成申請。</li>
			</ol>

			<p>以上個人資料及影本證件皆為證明教學助理身份使用，本中心將遵守個人資料保護法及資訊安全保密之相關規定，不另做其他私人或商業用途。</p>
		</div>
		<div class="reg-sign">
			<h3>申請人：_____________</h3>
		</div>
		<div class="reg-attach">
			<?php if($row['cardIDFront']!=null){ ?>
			<h5>身份證影本</h5>
			<table class="table table-bordered text-center">
				<tr>
					<td><img src="<?php echo $URLPv . $row['cardIDFront']; ?>"></td>
					<td><img src="<?php echo $URLPv . $row['cardIDBack']; ?>"></td>
				</tr>
			</table>
			<?php } if($row['AICFront']!=null){ ?>
			<h5>居留證影本</h5>
			<table class="table table-bordered text-center">
				<tr>
					<td><img src="<?php echo $URLPv . $row['AICFront']; ?>"></td>
					<td><img src="<?php echo $URLPv . $row['AICBack']; ?>"></td>
				</tr>
			</table>
			<?php } if($row['workPermissionFront']!=null){ ?>
			<table class="table table-bodered text-center">
			<h5>工作許可證影本</h5>
			<tr>
					<td><img src="<?php echo $URLPv . $row['workPermissionFront']; ?>"></td>
					<td><img src="<?php echo $URLPv . $row['workPermissionBack']; ?>"></td>
				</tr>
			</table>
			<?php } ?>
		</div>
			<div class="print-footer">
        		<p>列印時間：<?php echo date("Y-m-d H:i:s", time()); ?></p>
        	</div>

	</div>
</div>
<?php }
