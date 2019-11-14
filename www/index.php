<?php
	include 'includes/init.php';
	error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
<title>vzw KSA Buggenhout - Kiekenfeesten</title>
<link rel="stylesheet" href="css/kkf.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/kkf.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</head>
<body>
<?php
	$set = $db->getSettings();
	$ip = $set['ip'];
	$fdatZ = $set['fdatZ'];
	$datZ = $set['datZ'];
	$pV = $set['pV'];
	$pK = $set['pK'];
	$pS = $set['pS'];
	$pKa = $set['pKa'];
?>
<header>
	<div id="header-content">
		<a id="link1" href="index.php?p=1">Inkom</a>
		<a id="link0" href="index.php?p=0">Keuken</a>
		<a id="link6" href="index.php?p=6">Drank</a>
		<a id="link2" href="index.php?p=2">Statistieken</a>
		<a id="link5" href="#settings" title="Instellingen" class="modal_pagina">Instellingen</a>
	</div>
</header>
<?php
		if(isset($_GET['p'])) {
			switch($_GET['p']) {
				case 0: $p = "keuken.php"; break;
				case 1: $p = "inkom.php"; break;
				case 2: $p = "totalen.php"; break;
				case 3: $p = "print.php"; break;
				case 4: $p = "opnemen.php";break;
				case 5: $p = "settings.php";break;
				case 6: $p = "drank.php";break;
				case 7: $p = "totalen_drank.php";break;
				case 8: $p = "includes/update_settings.php";break;
				default: $p = "keuken.php"; break;
			}
			include $p;
		}
		else include 'keuken.php';
		

		echo "<div id=\"settings\">";
			include 'settings.php';
		echo "</div>";
		//$db->disconnect();
?>
</body>
</html>