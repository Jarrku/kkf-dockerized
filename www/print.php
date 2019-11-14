<?php
	include 'includes/init.php';

	$set = $db->getSettings();
	$ip = $set['ip'];
	$pV = $set['pV'];
	$pK = $set['pK'];
	$pS = $set['pS'];
	$pKa = $set['pKa'];

	$id = $_GET['id'];

	date_default_timezone_set('Europe/Brussels');
?>

<script>

window.addEventListener('DOMContentLoaded', function () {
	window.print();
	window.onfocus = function () { window.close(); };
});

</script>

<html>
<link rel="stylesheet" href="print.css">
<title>vzw KSA Buggenhout - Kiekenfeesten</title>
</html>
<body>
<div id="center">
	<div id="top">
		<div id="top-l"><?php echo $id; ?>
		</div>
		<div id="top-m">Tafel
		</div>
		<div id="top-t"><?php echo date("d-m-Y H:i"); ?>
		</div>
		<div id="top-r"><?php echo htmlentities($_GET['naam']); ?>
		</div>
	</div>
	<div id="soep"><h1><?php if($_GET['soep'] != 0) echo "Soep"; ?></h1>
	</div>

	<div id="qr"><?php
			include "phpqrcode/qrlib.php";
			QRcode::png('http://'.$ip.'/opnemen.php?id=' . $id, 'test.png', 'L', 4, 2);
			echo "<img src=\"test.png\">";
			?></div>
	<div id="soep-getal"><h1><?php if($_GET['soep'] != 0) echo htmlentities($_GET['soep']); ?></h1>
	</div>
	<div id="eten">
		<div id="eten-l">
		<h1>Volwassenen</h1>
		<h2>Natuur</h2>
		<h2>Curry</h2>
		<h2>Provencaal</h2>
		<h2>Appelmoes</h2>
		</div>
		<div id="eten-ll">
		<h1>&nbsp;</h1>
		<h2><?php echo htmlentities($_GET['kNat']); ?></h2>
		<h2><?php echo htmlentities($_GET['kCur']); ?></h2>
		<h2><?php echo htmlentities($_GET['kPro']); ?></h2>
		<h2><?php echo htmlentities($_GET['kApp']); ?></h2>
		</div>
		<div id="eten-r">
		<h1>Kinderen</h1>
		<h2>Natuur</h2>
		<h2>Curry</h2>
		<h2>Provencaal</h2>
		<h2>Appelmoes</h2>
		</div>
		<div id="eten-rr">
		<h1>&nbsp;</h1>
		<h2><?php echo htmlentities($_GET['vNat']); ?></h2>
		<h2><?php echo htmlentities($_GET['vCur']); ?></h2>
		<h2><?php echo htmlentities($_GET['vPro']); ?></h2>
		<h2><?php echo htmlentities($_GET['vApp']); ?></h2>
		</div>
	</div>
	<div id="opm-l">
		<h2><?php if($_GET['opm'] != 0) echo "Opmerking:"; ?></h2>

	</div>
	<div id="opm-r">
		<h2>&nbsp;<?php echo htmlentities($_GET['opm']); ?></h2>

	</div>
	<div id="bottom-l">
		<h2>Kaarten:</h2>
		<h2>Totaal:</h2>
	</div>

	<div id="bottom-ll">
		<h2>&nbsp;<?php echo htmlentities($_GET['kaarten']); ?></h2>
		<h2>&euro; &nbsp;<?php echo (((($_GET['vNat']+$_GET['vCur']+$_GET['vPro']+$_GET['vApp'])*$pV)+($_GET['soep']*$pS)+(($_GET['kNat']+$_GET['kCur']+$_GET['kPro']+$_GET['kApp'])*$pK))-($_GET['kaarten']*$pKa)); ?></h2>
	</div>
	<div id="bottom-r">
		<h2>Aantal menu's</h2>
		<h1><?php echo (($_GET['vNat']+$_GET['vCur']+$_GET['vPro']+$_GET['vApp']))+(($_GET['kNat']+$_GET['kCur']+$_GET['kPro']+$_GET['kApp'])); ?></h1>
	</div>

</div>
</body>
</html>