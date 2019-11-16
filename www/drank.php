<?php
	$result = $mysqli->query("SELECT * from drankprijs LIMIT 1");
	while($row = $result->fetch_array()) {
		for($i = 1; $i <= 2; $i++) {
			${"prijs".$i} = $row['prijs'.$i];
		}
	}

	if(isset($_POST)) {
		$stmt = $mysqli->prepare("INSERT INTO drank (cat1, cat2) VALUES (?,?)");
		$stmt->bind_param("ddddddddd", $_POST['cat1'], $_POST['cat2']);
		$stmt->execute();
		$stmt->close();
	}
?>
<script type="text/javascript">
			var prijs1 = <?php echo json_encode($prijs1); ?>;
			var prijs2 = <?php echo json_encode($prijs2); ?>;
</script>
<div id="drankForm">
<form name="plaatsDrank" action="index.php?p=6" method="POST">
<table id="drankTable">

<tr>
	<td align="right">1 Bonnetje</td>
	<td align="center"><input type="text" name="cat1" id="cat1" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat1" />
		<input type="button" value="-" class="qtyminus" field="cat1" /></div></td>

</tr>
<tr>
	<td align="right">1 Drankkaart</td>
	<td align="center"><input type="text" name="cat2" id="cat2" value="0" onChange="checkNumber(this)" maxlength="2"></td>
	<td><div class="drankPlus"><input type="button" value="+" class="qtyplus" field="cat2" />
		<input type="button" value="-" class="qtyminus" field="cat2" /></div></td>

</tr>
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
