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
		$db->query("INSERT INTO bestellingen (naam, kaarten, status, vNat, vCur, vPro, vApp, vVeggie, kNat, kCur, kPro, kApp, kVeggie, soep) VALUES ('".$naam."', ".$_POST['kaarten'].", 1,".$_POST['vNat'].",".$_POST['vCur'].",".$_POST['vPro'].",".$_POST['vApp'].",".$_POST['vVeggie'].",".$_POST['kNat'].",".$_POST['kCur'].",".$_POST['kPro'].",".$_POST['kApp'].",".$_POST['kVeggie'].",".$_POST['soep'].")", true);
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
	<label for="vNat">Kip Natuur</label>
	<input type="text" name="vNat" id="vNat" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vNat']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vNat" />
    <input type="button" value="-" class="qtyminus" field="vNat" />
</p>
<p>
	<label for="vCur">Kip Curry</label>
	<input type="text" name="vCur" id="vCur" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vCur']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vCur" />
    <input type="button" value="-" class="qtyminus" field="vCur" />
</p>
<p>
	<label for="vPro">Kip Provencaal</label>
	<input type="text" name="vPro" id="vPro" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vPro']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vPro" />
    <input type="button" value="-" class="qtyminus" field="vPro" />
</p>
<p>
	<label for="vApp">Kip Appelmoes</label>
	<input type="text" name="vApp" id="vApp" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vApp']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vApp" />
    <input type="button" value="-" class="qtyminus" field="vApp" />
</p>
<p>
	<label for="vVeggie">Vegetarische Balletjes</label>
	<input type="text" name="vVeggie" id="vVeggie" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['vVeggie']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="vVeggie" />
    <input type="button" value="-" class="qtyminus" field="vVeggie" />
</p>
</div>
<div id="formRight">
<p>
	<label for="title" class="title">Kinderen</label>
</p>
<p>
	<label for="kNat">Kip Natuur</label>
	<input type="text" name="kNat" id="kNat" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kNat']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kNat" />
    <input type="button" value="-" class="qtyminus" field="kNat" />
</p>
<p>
	<label for="kCur">Kip Curry</label>
	<input type="text" name="kCur" id="kCur" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kCur']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kCur" />
    <input type="button" value="-" class="qtyminus" field="kCur" />
</p>
<p>
	<label for="kPro">Kip Provencaal</label>
	<input type="text" name="kPro" id="kPro" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kPro']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kPro" />
    <input type="button" value="-" class="qtyminus" field="kPro" />
</p>
<p>
	<label for="kApp">Kip Appelmoes</label>
	<input type="text" name="kApp" id="kApp" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kApp']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kApp" />
    <input type="button" value="-" class="qtyminus" field="kApp" />
</p>
<p>
	<label for="kVeggie">Vegetarische Balletjes</label>
	<input type="text" name="kVeggie" id="kVeggie" value="<?php if($err_naam == 1 || $err_tot == 1) echo htmlentities($_POST['kVeggie']); else echo "0" ?>" maxlength="2" onChange="checkNumber(this)">
	<input type="button" value="+" class="qtyplus" field="kVeggie" />
    <input type="button" value="-" class="qtyminus" field="kVeggie" />
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
