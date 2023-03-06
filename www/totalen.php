<div align="center"><br /><a class="modal_pagina" title="Alle bestellingen" href="#lijstbestellingen" >Bekijk lijst van alle bestellingen</a></div>

<table id="table-2" cellspacing="0">
	<thead>
		<th width="90">Dag</th>
		<th width="90">Natuur Volw</th>
		<th width="90">Curry Volw</th>
		<th width="90">Provencaal Volw</th>
		<th width="90">Appelmoes Volw</th>
		<th width="90">Veggie Volw</th>
		<th width="90">Natuur Kind</th>
		<th width="90">Curry Kind</th>
		<th width="90">Provencaal Kind</th>
		<th width="90">Appelmoes Kind</th>
		<th width="90">Veggie Kind</th>
		<th width="90">Soep</th>
		<th width="90">Kaarten</th>
		<th width="90">Totaal</th>
	</thead>
	<tbody>
<?php

	$vNatZ = 0;	$vCurZ = 0;	$vProZ = 0;	$vAppZ = 0; $vVeggieZ = 0;
	$kNatZ = 0;	$kCurZ = 0;	$kProZ = 0;	$kAppZ = 0; $kVeggieZ = 0;
	$soepZ = 0;	$kaartenZ = 0;
	$vNatZo = 0; $vCurZo = 0; $vProZo = 0; $vAppZo = 0; $vVeggieZo = 0;
	$kNatZo = 0; $kCurZo = 0; $kProZo = 0; $kAppZo = 0; $kVeggieZo = 0;
	$soepZo = 0; $kaartenZo = 0;

	$r = $mysqli->query("SELECT * FROM bestellingen");
    $zaterdag = strtotime($fdatZ);

    if ( $r !== false ) {
		while ( $a = $r->fetch_array() ) {
			$dt = new DateTime($a['geplaatstTijd']);
			$gescand = $dt->format('Y-m-d H:i:s');
			$datum = strtotime($gescand);
			if($datum < $zaterdag) {
				$vNatZ += $a['vNat'];
				$vCurZ += $a['vCur'];
				$vProZ += $a['vPro'];
				$vAppZ += $a['vApp'];
				$vVeggieZ += $a['vVeggie'];
				$kNatZ += $a['kNat'];
				$kCurZ += $a['kCur'];
				$kProZ += $a['kPro'];
				$kAppZ += $a['kApp'];
				$kVeggieZ += $a['kVeggie'];
				$kaartenZ += $a['kaarten'];
				$soepZ += $a['soep'];
			}
			else {
				$vNatZo += $a['vNat'];
				$vCurZo += $a['vCur'];
				$vProZo += $a['vPro'];
				$vAppZo += $a['vApp'];
				$vVeggieZo += $a['vVeggie'];
				$kNatZo += $a['kNat'];
				$kCurZo += $a['kCur'];
				$kProZo += $a['kPro'];
				$kAppZo += $a['kApp'];
				$kVeggieZo += $a['kVeggie'];
				$kaartenZo += $a['kaarten'];
				$soepZo += $a['soep'];
			}

		}

		$totZ = $vNatZ + $vCurZ + $vProZ + $vAppZ + $vVeggieZ + $kNatZ + $kCurZ + $kProZ + $kAppZ + $kVeggieZ;
		$totZo = $vNatZo + $vCurZo + $vProZo + $vAppZo + $vVeggieZo + $kNatZo + $kCurZo + $kProZo + $kAppZo + $kVeggieZo;

		$totZE = (($vNatZ + $vCurZ + $vProZ + $vAppZ + $vVeggieZ) * $pV) + (($kNatZ + $kCurZ + $kProZ + $kAppZ + $kVeggieZ) * $pK) + ($soepZ * $pS) - ($kaartenZ * $pKa);
		$totZoE = (($vNatZo + $vCurZo + $vProZo + $vAppZo + $vVeggieZo) * $pV) + (($kNatZo + $kCurZo + $kProZo + $kAppZo + $kVeggieZo) * $pK) + ($soepZo * $pS) - ($kaartenZo * $pKa);
		$totWE = $totZE + $totZoE;
	}

	echo "
			<tr>
				<td>Zaterdag</td>
				<td>". htmlentities($vNatZ) ."</td>
				<td>". htmlentities($vCurZ) ."</td>
				<td>". htmlentities($vProZ) ."</td>
				<td>". htmlentities($vAppZ) ."</td>
				<td>". htmlentities($vVeggieZ) ."</td>
				<td>". htmlentities($kNatZ) ."</td>
				<td>". htmlentities($kCurZ) ."</td>
				<td>". htmlentities($kProZ) ."</td>
				<td>". htmlentities($kAppZ) ."</td>
				<td>". htmlentities($kVeggieZ) ."</td>
				<td>". htmlentities($soepZ) ."</td>
				<td>". htmlentities($kaartenZ) ."</td>
				<td>". htmlentities($totZ) ."</td>
			</tr>";

	echo "
			<tr>
				<td>Zondag</td>
				<td>". htmlentities($vNatZo) ."</td>
				<td>". htmlentities($vCurZo) ."</td>
				<td>". htmlentities($vProZo) ."</td>
				<td>". htmlentities($vAppZo) ."</td>
				<td>". htmlentities($vVeggieZo) ."</td>
				<td>". htmlentities($kNatZo) ."</td>
				<td>". htmlentities($kCurZo) ."</td>
				<td>". htmlentities($kProZo) ."</td>
				<td>". htmlentities($kAppZo) ."</td>
				<td>". htmlentities($kVeggieZo) ."</td>
				<td>". htmlentities($soepZo) ."</td>
				<td>". htmlentities($kaartenZo) ."</td>
				<td>". htmlentities($totZo) ."</td>
			</tr>";

	echo "
			<tr>
				<td>Totaal</td>
				<td>". htmlentities($vNatZo + $vNatZ) ."</td>
				<td>". htmlentities($vCurZo + $vCurZ) ."</td>
				<td>". htmlentities($vProZo + $vProZ) ."</td>
				<td>". htmlentities($vAppZo + $vAppZ) ."</td>
				<td>". htmlentities($vVeggieZo + $vVeggieZ) ."</td>
				<td>". htmlentities($kNatZo + $kNatZ) ."</td>
				<td>". htmlentities($kCurZo + $kCurZ) ."</td>
				<td>". htmlentities($kProZo + $kProZ) ."</td>
				<td>". htmlentities($kAppZo + $kAppZ) ."</td>
				<td>". htmlentities($kVeggieZo + $kVeggieZ) ."</td>
				<td>". htmlentities($soepZo + $soepZ) ."</td>
				<td>". htmlentities($kaartenZo + $kaartenZ) ."</td>
				<td>". htmlentities($totZ + $totZo) ."</td>
			</tr>";

?>
</tbody>
</table>
<br />
<?php
	$qra = $mysqli->query("SELECT TIME_TO_SEC(TIMEDIFF(tafelTijd, keukenTijd)) AS tijdsverschil, naam FROM bestellingen WHERE status = 4 ORDER BY tijdsverschil ASC");
	$qr = $mysqli->query("SELECT TIME_TO_SEC(TIMEDIFF(tafelTijd, keukenTijd)) AS tijdsverschil FROM bestellingen WHERE status = 4 ORDER BY id DESC LIMIT 1");
	$r = $mysqli->query("SELECT TIME_TO_SEC(TIMEDIFF(tafelTijd, keukenTijd)) AS tijdsverschil FROM bestellingen WHERE status = 4");
	$t = 0;
	$tijd = 0;
	$tijdl = 0;
	$tijdlangst = 0;
	$naaml = "";

	if ( $qra !== false ) {
		while ( $qal = $qra->fetch_array() ) {
			$tijdlangst = strtotime(date("H:i:s", $qal['tijdsverschil']))-3600;
			$naaml = $qal['naam'];
		}
	}

	if ( $qr !== false ) {
		while ( $qa = $qr->fetch_array() ) {
			$tijdl += strtotime(date("H:i:s", $qa['tijdsverschil']))-3600;
		}
	}

    if ( $r !== false ) {
		while ( $a = $r->fetch_array() ) {
			$tijd += strtotime(date("H:i:s", $a['tijdsverschil']))-3600;
			$t++;
		}
	}





	$gemTijd = ($tijd / $t);
	echo "<div id=\"stats-l\">";
	echo "<p><h2>Gemiddelde wachttijd: ". date("H:i:s",$gemTijd) ."</h2></p>";
	echo "<p><h2>Wachttijd laatste bestelling: ". date ("H:i:s", $tijdl) ."</h2></p>";
	echo "<p><h2>Langste wachttijd: ". date("H:i:s", $tijdlangst) ." (". $naaml . ")</h2></p>";
	echo "</div>";
	echo "<div id=\"stats-r\">";
	echo "<p><h2>Totaal zaterdag: ". $totZE . "&euro;</h2></p>";
	echo "<p><h2>Totaal zondag: ". $totZoE . "&euro;</h2></p>";
	echo "<p><h2>Totaal weekend: ". $totWE . "&euro;</h2></p>";
	echo "</div>";
?>



<div id="lijstbestellingen">
<table id="table-2" cellspacing="0">
	<thead>
		<th>Id</th>
		<th width="250">Naam</th>
		<th width="90">Soep</th>
		<th width="90">Natuur Volw</th>
		<th width="90">Curry Volw</th>
		<th width="90">Provencaal Volw</th>
		<th width="90">Appelmoes Volw</th>
		<th width="90">Veggie Volw</th>
		<th width="90">Natuur Kind</th>
		<th width="90">Curry Kind</th>
		<th width="90">Provencaal Kind</th>
		<th width="90">Appelmoes Kind</th>
		<th width="90">Veggie Kind</th>
		<th width="90">Totaal</th>
	</thead>
	<tbody>


<?php
	$r = $mysqli->query("SELECT * FROM bestellingen WHERE status = 4 ORDER BY id ASC", true);

    if ( $r !== false ) {
		while ( $a = $r->fetch_array() ) {
			$id = stripslashes($a['id']);
			$naam = stripslashes($a['naam']);
			$status = stripslashes($a['status']);
			$totaal = $a['soep'] + $a['vNat'] + $a['vCur'] + $a['vPro'] + $a['vApp'] + $a['vVeggie'] + $a['kNat'] + $a['kCur'] + $a['kPro'] + $a['kApp'] + $a['kVeggie'];

			echo "
				<tr>
					<td>". htmlentities($id) . "</td>
					<td>". htmlentities($naam) ."</td>
					<td>". htmlentities($a['soep']) ."</td>
					<td>". htmlentities($a['vNat']) ."</td>
					<td>". htmlentities($a['vCur']) ."</td>
					<td>". htmlentities($a['vPro']) ."</td>
					<td>". htmlentities($a['vApp']) ."</td>
					<td>". htmlentities($a['vVeggie']) ."</td>
					<td>". htmlentities($a['kNat']) ."</td>
					<td>". htmlentities($a['kCur']) ."</td>
					<td>". htmlentities($a['kPro']) ."</td>
					<td>". htmlentities($a['kApp']) ."</td>
					<td>". htmlentities($a['kVeggie']) ."</td>
					<td>". htmlentities($totaal) ."</td>
				</tr>";
		}
	}
?>
</tbody>
</table>
</div>