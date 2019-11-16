<?php
$err_dat = 0;
$err_ip = 0;
$error_show1 = "";
$error_show2 = "";


	$set = $db->getSettings();
	$ip = $set['ip'];
	$datZ = $set['datZ'];
	$pV = $set['pV'];
	$pK = $set['pK'];
	$pS = $set['pS'];
	$pKa = $set['pKa'];
	
	$result = $mysqli->query("SELECT * from drankprijs LIMIT 1");
	while($row = $result->fetch_array()) {
		for($i = 1; $i <= 10; $i++) {
			${"prijs".$i} = $row['prijs'.$i];
		}
	}
?>
<div id="settingsForm">
<form action="index.php?p=8" method="post">
<div class="formLeft">
<p>
	<label for="datZ">Datum zaterdag</label>
	<input name="datZ" id="datZ" class="dat" value="<?php echo htmlentities($datZ); ?>">
	<span><?php echo htmlentities($error_show1); ?></span>
</p>
<p>
	<label for="ip">IP adres server</label>
	<input type="text" name="ip" id="ip" class="dat" value="<?php echo htmlentities($ip); ?>" onchange="checkIP(this)">
	<span id="spanip"><?php echo htmlentities($error_show2); ?></span>
</p>
<p>
	<label for="pV">Prijs Ribberen</label>
	<input type="text" name="pRib" id="pRib" class="prijs" value="<?php echo htmlentities($pRib); ?>" onchange="checkPrice(this)">
	<span id="spanpRib"></span>
</p>
<p>
	<label for="pRib">Prijs Vol-au-Vent</label>
	<input type="text" name="pV" id="pV" class="prijs" value="<?php echo htmlentities($pV); ?>" onchange="checkPrice(this)">
	<span id="spanpV"></span>
</p>
<p>
	<label for="pK">Prijs kinderen</label>
	<input type="text" name="pK" id="pK" class="prijs" value="<?php echo htmlentities($pK); ?>" onchange="checkPrice(this)">
	<span id="spanpK"></span>
</p>
<p>
	<label for="pS">Prijs soep</label>
	<input type="text" name="pS" id="pS" class="prijs" value="<?php echo htmlentities($pS); ?>" onchange="checkPrice(this)">
	<span id="spanpS"></span>
</p>
<p>
	<label for="pKa">Prijs kaarten</label>
	<input type="text" name="pKa" id="pKa" class="prijs" value="<?php echo htmlentities($pKa); ?>" onchange="checkPrice(this)">
	<span id="spanpKa"></span>
</p>
<p>
<input type="submit" class="knopS" value="Bewaren">
</p>
</div>
<div class="formLeft">
<p>
	<label for="prijs1" title="1 Bonnetje">Prijs Cat1</label>
	<input type="text" name="prijs1" id="prijs1" class="prijs" value="<?php echo htmlentities($prijs1); ?>" onchange="checkPrice(this)">
	<span id="spanprijs1"></span>
</p>
<p>
	<label for="prijs2" title="Zuipkaart">Prijs Cat2</label>
	<input type="text" name="prijs2" id="prijs2" class="prijs" value="<?php echo htmlentities($prijs2); ?>" onchange="checkPrice(this)">
	<span id="spanprijs2"></span>
</p>

</div>
</form>
</div>