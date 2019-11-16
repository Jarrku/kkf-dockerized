<?php
$err_tot = 0;
$err_naam = 0;
$error_show = "";

if(isset($_POST['naam']) && isset($_POST['totaal']) && isset($_POST['kaarten'])) {
	$naam = stripslashes($_POST['naam']);

	if($_POST['totaal'] > 0 || ($_POST['totaal'] == 0 && $_POST['kaarten'] > 0))
		$err_tot = 0;
	else $err_tot = 1;

	if($_POST['naam'] != null && preg_match('/[A-Za-z0-9]/', $_POST['naam']))
		$err_naam = 0;
	else $err_naam = 1;

	if($err_tot == 0 && $err_naam == 0)
		// $stmt = $mysqli->prepare("INSERT INTO bestellingen (naam, kaarten, status, vRib, vVol, kRib, kVol, soep) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
		// $stmt->bind_param('siiiiiiiiiii', $naam, $_POST['kaarten'], 1, $_POST['vRib'], $_POST['vVol'], $_POST['kRib'], $_POST['kVol'], $_POST['soep']);
		// $stmt->execute();
		// $stmt->close();
		$db->query("INSERT INTO bestellingen (naam, kaarten, status, vRib, vVol, kRib, kVol, soep) VALUES ('".$naam."', ".$_POST['kaarten'].", 1,".$_POST['vRib'].",".$_POST['vVol'].",".$_POST['kRib'].",".$_POST['kVol'].",".$_POST['soep'].")", true);
	else if($err_tot == 1 && $err_naam == 1) {
		$error->write(1);
		$error->write(2);
		$error_show = "Naam invullen en menu's bestellen aub.";
	}
	else if($err_tot == 1 && $err_naam == 0) {
		$error->write(1);
		$error_show = "K";
	}
	else {
		$error->write(2);
		$error_show = "Vul een naam in aub.";
	}
}

$id = $db->getId();

?>
<div id="bestelForm">
<form name="plaatsBestelling" action="index.php?p=1" method="POST">
<div id="formTop">
<p>
	<label for="naam">Naam</label>
	<input type="text" name="naam" id="naam" class="naam" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['naam']); else echo "" ?>">
	<span id="error_naam"><?php echo htmlentities($error_show); ?></span>
</p>
</div>
<div id="formTop">
<p>
	<label for="soep">Soep</label>
	<input type="text" name="soep" id="soep" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['soep']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="soep" />
    <input type="button" value="-" class="qtyminus" field="soep" />
</p>
</div>
<div id="formLeft">
<p>
	<label for="title" class="title">Volwassenen</label>
</p>
<p>
	<label for="vNat"> Ribberen </label>
	<input type="text" name="vRib" id="vRib" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vRib']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vRib" />
    <input type="button" value="-" class="qtyminus" field="vRib" />
</p>
<p>
	<label for="vVol">Vol-au-Vent</label>
	<input type="text" name="vVol" id="vVol" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vVol']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vVol" />
    <input type="button" value="-" class="qtyminus" field="vVol" />
</p>
</div>
<div id="formRight">
<p>
	<label for="title" class="title">Kinderen</label>
</p>
<p>
	<label for="kNat">Ribberen</label>
	<input type="text" name="kRib" id="kRib" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kRib']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kRib" />
    <input type="button" value="-" class="qtyminus" field="kRib" />
</p>
<p>
	<label for="kCur">Vol-au-Vent</label>
	<input type="text" name="kVol" id="kVol" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kVol']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kVol" />
    <input type="button" value="-" class="qtyminus" field="kVol" />
</p>
</div>
<div id="formBottom">
<div id="formLeft">
<p>
	<label for="kaarten">Kaarten</label>
	<input type="text" name="kaarten" id="kaarten" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kaarten']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kaarten" />
    <input type="button" value="-" class="qtyminus" field="kaarten" />
</p>
<p>
	<label for="opm">Opmerking</label>
	<input type="text" name="opm" id="opm" class="naam" maxlength="45" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['opm']); else echo "" ?>">
</p>
</div>
<div id="formRight">
<p>
	<label for="tot">Totaal</label>
	<input type="text" name="totaal" id="totaal" class="totaal" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['totaal']); else echo "0" ?>" readonly>
</p>
<p>
	<input type="hidden" name="pRib" id="pRib" value="<?php echo htmlentities($pRib); ?>">
	<input type="hidden" name="pV" id="pV" value="<?php echo htmlentities($pV); ?>">
	<input type="hidden" name="pK" id="pK" value="<?php echo htmlentities($pK); ?>">
	<input type="hidden" name="pS" id="pS" value="<?php echo htmlentities($pS); ?>">
	<input type="hidden" name="pKa" id="pKa" value="<?php echo htmlentities($pKa); ?>">
	<input type="hidden" id="id" value="<?php echo htmlentities($id); ?>">
	<input type="button" class="knop" onClick="printForm()" value="Print!">
	<input type="submit" class="knop" value="Bestel!">
</p>
</div>
</div>
</form>
</div>
