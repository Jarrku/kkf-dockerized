<?php
	$result = $mysqli->query("SELECT * from drankprijs LIMIT 1");
	while($row = $result->fetch_array()) {
		for($i = 1; $i <= 10; $i++) {
			${"prijs".$i} = $row['prijs'.$i];
		}
	}
	
	if(isset($_POST)) {
		$stmt = $mysqli->prepare("INSERT INTO drank (cat1, cat2, cat3, cat4, cat5, cat6, cat7, cat8, cat9) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ddddddddd", $_POST['cat1'], $_POST['cat2'], $_POST['cat3'], $_POST['cat4'], $_POST['cat5'], $_POST['cat6'], $_POST['cat7'], $_POST['cat8'], $_POST['cat9']);
		$stmt->execute();
		$stmt->close();
	}
?>
<script type="text/javascript">
			var prijs1 = <?php echo json_encode($prijs1); ?>;
			var prijs2 = <?php echo json_encode($prijs2); ?>;
			var prijs3 = <?php echo json_encode($prijs3); ?>;
			var prijs4 = <?php echo json_encode($prijs4); ?>;
			var prijs5 = <?php echo json_encode($prijs5); ?>;
			var prijs6 = <?php echo json_encode($prijs6); ?>;
			var prijs7 = <?php echo json_encode($prijs7); ?>;
			var prijs8 = <?php echo json_encode($prijs8); ?>;
			var prijs9 = <?php echo json_encode($prijs9); ?>;			
</script>
<div id="drankForm">
<form name="plaatsDrank" action="index.php?p=6" method="POST">
<table id="drankTable">

<tr>
	<td align="right">Oudercomit&eacute;</td>
	<td align="center"><input type="text" name="cat1" id="cat1" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat1" />
		<input type="button" value="-" class="qtyminus" field="cat1" /></div></td>
	<td align="right">Gini<br>Schweppes<br>Ice Tea<br>Palm<br>Hoegaarden<br>Koffie<br>gebak</td>
	<td align="center"><input type="text" name="cat4" id="cat4"  value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat4" />
		<input type="button" value="-" class="qtyminus" field="cat4" /></div></td>
	<td align="right">Fles wijn</td>
	<td align="center"><input type="text" name="cat7" id="cat7" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat7" />
		<input type="button" value="-" class="qtyminus" field="cat7" /></div></td>
	
</tr>
<tr>
	<td align="right">Porto<br />Sherry</td>
	<td align="center"><input type="text" name="cat2" id="cat2" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat2" />
		<input type="button" value="-" class="qtyminus" field="cat2" /></div></td>
	<td align="right">Malheur<br>Rodenback<br>Kriek</td>
	<td align="center"><input type="text" name="cat5" id="cat5" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat5" />
		<input type="button" value="-" class="qtyminus" field="cat5" /></div></td>
	<td align="right">Verwenkoffie<br>Coupe Dame Blanche<br>Coupe Caramel</td>
	<td align="center"><input type="text" name="cat8" id="cat8" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat8" />
		<input type="button" value="-" class="qtyminus" field="cat8" /></div></td>
	
</tr>
<tr>
	<td align="right">Cola<br />Cola Light<br />Fanta<br />Sprite<br />Water<br />Fruitsap<br />Chips<br />Pils</td>
	<td align="center"><input type="text" name="cat3" id="cat3" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat3" />
		<input type="button" value="-" class="qtyminus" field="cat3" /></div></td>
	<td align="right">Duvel<br>Orval<br>Westmalle<br>Karmeliet<br>Leffe<br>Kasteelbier<br>Glas wijn</td>
	<td align="center"><input type="text" name="cat6" id="cat6" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat6" />
		<input type="button" value="-" class="qtyminus" field="cat6" /></div></td>
	<td align="right">Kinderijsje</td>
	<td align="center"><input type="text" name="cat9" id="cat9" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat9" />
		<input type="button" value="-" class="qtyminus" field="cat9" /></div></td>
	
</tr>
	
<tr>
	<td colspan="9" align="center">
		<input type="text" name="totaaldrank" id="totaal" class="knop" value="0" readonly>
		<input type="submit" class="knop" value="Bestel">
		<input type="button" class="knop" onClick="resetDrank()" value="Reset">
		<input type="button" class="knop modal_pagina" title="Statistieken Drank" href="#dranktotalen" value="Statistieken">
	</td>
</tr>
</table>
</form>
</div>
<div id="dranktotalen" class="novisible">
	<p><?php include 'totalen_drank.php'; ?>
	</p>
</div>
