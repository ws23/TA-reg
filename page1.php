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
	<script>
	print(); 
	function wait(){
		setTimeout('window.location.href = "<?php echo $URLPv ?>index.php"', 10); 
	}	
	</script>
</head>
<body onload="wait(); ">
<div class="container body print-p1">
<?php
	$result = $DBmain->query("SELECT * FROM `apply` WHERE `stuID` = '{$_SESSION['stuID']}'; ");
	$row = $result->fetch_array(MYSQLI_BOTH); 
?>
	<div class="apply">
		<div class="reg-title">
			<h3>通識教育中心擔任教學助理（TA）申請書</h3>
			<h4><?php echo $row['semester']; ?>學期</h4>
		</div>
		<div class="reg-info">
			<table class="table table-conedensed table-bordered text-center">
				<tr class="reg-info-id">
					<td class="col-sm-1">學號</td>
					<td class="col-sm-3"><?php echo $row['stuID']; ?></td>
					<td class="col-sm-2">系所/年級</td>
					<td class="col-sm-6" colspan="3"><?php echo $row['dept'] . "/" . $row['grade']; ?></td>
				</tr>
				<tr class="reg-info-name">
					<td class="col-sm-1">姓名</td>
					<td class="col-sm-3"><?php echo $row['name']; ?></td>
					<td class="col-sm-2">行動電話</td>
					<td class="col-sm-2"><?php echo $row['mobile']; ?></td>
					<td class="col-sm-2">學校分機</td>
					<td class="col-sm-2"><?php echo $row['ext']; ?></td>
				</tr>
				<tr class="reg-info-identity">
					<td class="col-sm-1" rowspan="3">身份別</td>
					<td class="col-sm-3" rowspan="3"><?php echo $row['identity']; ?></td>
					<td class="col-sm-2">Email</td>
					<td class="col-sm-6" colspan="3"><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<td class="col-sm-4" colspan="2">TA培訓課程參與場次</td>
					<td class="col-sm-4" colspan="2"><?php echo $row['training']>=5? "5場以上":$row['training'] . "場"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-6" colspan="3">外國留學生、僑生居留台灣天數</td>
					<td class="col-sm-2"><?php echo $row['over183Days']==1? '超過183天':($row['over183Days']==null? '':'未超過183天'); ?></td> 
				</tr>
				<tr class="reg-info-otherjob">
					<td class="col-sm-4" colspan="2">其他單位工作與薪資</td>
					<td class="col-sm-8 text-left" colspan="4"><?php echo $row['otherTA']; ?></td>
				</tr>
				<tr class="reg-info-recommend">
					<td class="col-sm-4" colspan="2">備註/授課老師推薦</td>
					<td class="col-sm-8 text-left" colspan="4"><?php echo $row['recommend']; ?></td>
				</tr>
			</table>
		</div>
		<?php
			function zero($var){
				if($var<10)
					return '0' . $var; 
				return $var; 
			}

			$week = array(
				"Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"
			); 
		?>
		<div class="reg-time">
			<h4>可擔任TA的時段</h4>
			<table class="table table-condensed table-bordered text-center">
				<tr>
					<th class="text-center">#</th>
					<?php for ($i=8; $i<=19; $i++){ ?>
					<th class="text-center"><?php echo zero($i) . "-" . zero($i+1); ?></th>
					<?php } ?>
				</tr>
				<?php for ($i=0; $i<7; $i++) { ?>
				<tr>
					<td><?php echo $week[$i]; ?></td>
					<?php for ($j=0; $j<12; $j++) { ?>
					<td><?php echo $row[$week[$i]][$j]=='Y'? 'O':''; ?></td>
					<?php } ?>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="print-footer">
			<p>列印時間：<?php echo date("Y-m-d H:i:s", time()); ?></p> 
		</div>
	</div>
</div>
<?php }
