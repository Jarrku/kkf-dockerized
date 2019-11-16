<?php
$err_dat = 0;
$err_ip = 0;
$error_show1 = "";
$error_show2 = "";

if(isset($_POST['datZ'])) {
	$datumZ = $_POST['datZ'];
	
	if(strtotime($datumZ) && 1 === preg_match('~[0-9]~', $datumZ))
		$err_dat = 0;
	else $err_dat = 1;
	if(filter_var($_POST['ip'], FILTER_VALIDATE_IP) !== false)
		$err_ip = 0;
	else $err_ip = 1;
				
	if($err_dat == 0 && $err_ip == 0) {
		$datZ = date("Y-m-d H:i:s", strtotime($datumZ)+86399);
		$ipadres = $db->escape($_POST['ip']);
		$stmt = $mysqli->prepare("UPDATE settings SET datZ = ?, ip = ?, pRib = ?, pV = ?, pK = ?, pS = ?, pKa = ? WHERE id = 1");
		$stmt->bind_param('ssdddd', $datZ, $ipadres, $_POST['pRib'], $_POST['pV'], $_POST['pK'], $_POST['pS'], $_POST['pKa']);
		$stmt->execute();
		$stmt->close();
		$stmt = $mysqli->prepare("UPDATE drankprijs SET prijs1 = ?, prijs2 = ? WHERE id = 1");
		$stmt->bind_param('ddddddddd', $_POST['prijs1'], $_POST['prijs2']);
		$stmt->execute();
		$stmt->close();

	} else if ($err_dat == 1 && $err_ip == 1) {
		$error->write(3);
		$error->write(4);		
		$error_show2 .= "IP adres is niet correct ingevoerd.";
		$error_show1 .= "Datum is niet correct ingevoerd.";
	} else if ($err_dat == 1 && $err_ip == 0) {
		$error->write(3);
		$error_show1 .= "Datum is niet correct ingevoerd.";
	} else {
		$error->write(4);
		$error_show2 .= "IP adres is niet correct ingevoerd.";
	}	
}
?>
<script type="text/javascript">
	window.location.replace("index.php");
</script>