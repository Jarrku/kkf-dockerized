<?php
	include 'includes/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#tafelForm input{
	width: 150px;
	height: 150px;
	font-size: 24pt;
	text-align:center;
}
</style>
</head>
<body>
<?php
if(isset($_POST)) {
		$soep = 0;
		$status = 0;
		$time = date('Y-m-d H:i:s', time());
		if(isset($_POST['tafel'])) {
			$q = "SELECT status, soep FROM bestellingen WHERE id = ". $_POST["id"] ." LIMIT 1";
			$r = mysql_query($q);

			if ( $r !== false && mysql_num_rows($r) > 0 ) {
				while ( $a = mysql_fetch_assoc($r) ) {
					$soep += $a['soep'];
					$status += $a['status'];
				}
			}
			if($status == 1) {
				if($soep > 0)
					mysql_query("UPDATE bestellingen SET keukenTijd = '". $time ."', status = '2', tafel = '". $_POST['tafel'] ."' WHERE id = ". $_POST['id'] ."");
				else mysql_query("UPDATE bestellingen SET keukenTijd = '". $time ."', status = '3', tafel = '". $_POST['tafel'] ."' WHERE id = ". $_POST['id'] ."");
				echo "Bestelling succesvol doorgegeven";
			}
			else
				echo "Deze bestelling is reeds doorgegeven aan de keuken of is niet besteld";
		}
}
?>
<div id="tafelForm">
<form action="opnemen.php" method="POST">
<label for="tafel">Tafelnummer</label><br />
<input type="text" name="tafel" id="tafel">
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
<input type="submit" value="Go">
</form>
</div>
</body>
</html>