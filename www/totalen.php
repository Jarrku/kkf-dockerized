<div align="center"><br /><a class="modal_pagina" title="Alle bestellingen" href="#lijstbestellingen" >Bekijk lijst van alle bestellingen</a></div>

<table id="table-2" cellspacing="0">
	<thead>
		<th width="90">Dag</th>
		<th width="90">Ribberen Volw</th>
		<th width="90">Vol-au-Vent Volw</th>
		<th width="90">Ribberen Kind</th>
		<th width="90">Vol-au-Vent Kind</th>
		<th width="90">Soep</th>
		<th width="90">Kaarten</th>
		<th width="90">Totaal</th>
	</thead>
	<tbody>
<?php
	
	$vRibZ = 0;	$vVolZ = 0;	$kRibZ = 0;	$kVolZ = 0;	
	$soepZ = 0;	$kaartenZ = 0;
	$vRibZo = 0;	$vVolZo = 0;	$kRibZo = 0;	$kVolZo = 0;
	$soepZo = 0; 	$kaartenZo = 0;

	$r = $mysqli->query("SELECT * FROM bestellingen");
    $zaterdag = strtotime($fdatZ);

    if ( $r !== false ) {
		while ( $a = $r->fetch_array() ) {
			$dt = new DateTime($a['geplaatstTijd']); 
			$gescand = $dt->format('Y-m-d H:i:s');
			$datum = strtotime($gescand);
			if($datum < $zaterdag) {
				$vRibZ += $a['vRib'];
				$vVolZ += $a['vVol'];
				$kRibZ += $a['kRib'];
				$kVolZ += $a['kVol'];
				$kaartenZ += $a['kaarten'];
				$soepZ += $a['soep'];
			}
			else {
				$vRibZo += $a['vRib'];
				$vVolZo += $a['vVol'];
				$kRibZo += $a['kRib'];
				$kVolZo += $a['kVol'];
				$kaartenZo += $a['kaarten'];
				$soepZo += $a['soep'];
			}
		
		}
		
		$totZ = $vRibZ + $vVolZ + $kRibZ + $kVolZ + $soepZ + $kaartenZ;
		$totZo = $vRibZo + $vVolZo + $kRibZo + $kVolZo + $soepZo + $kaartenZo;
		
		$totZE = ($vRibZ * $pRib) + ($vVolZ * $pV) + (($kRibZ + $kVolZ) * $pK) + ($soepZ * $pS) - ($kaartenZ * $pKa);
		$totZoE = ($vRibZo * $pRib) + ($vVolZo * $pV) + (($kRibZo + $kVolZo) * $pK) + ($soepZo * $pS) - ($kaartenZo * $pKa);
		$totWE = $totZE + $totZoE;
	}
	
	echo "
			<tr>
				<td>Zaterdag</td>
				<td>". htmlentities($vRibZ) ."</td>
				<td>". htmlentities($vVolZ) ."</td>
				<td>". htmlentities($kRibZ) ."</td>
				<td>". htmlentities($kVolZ) ."</td>
				<td>". htmlentities($soepZ) ."</td>
				<td>". htmlentities($kaartenZ) ."</td>
				<td>". htmlentities($totZ) ."</td>
			</tr>";
	
	echo "
			<tr>
				<td>Zondag</td>
				<td>". htmlentities($vRibZo) ."</td>
				<td>". htmlentities($vVolZo) ."</td>
				<td>". htmlentities($kRibZo) ."</td>
				<td>". htmlentities($kVolZo) ."</td>
				<td>". htmlentities($soepZo) ."</td>
				<td>". htmlentities($kaartenZo) ."</td>
				<td>". htmlentities($totZo) ."</td>
			</tr>";
	
	echo "
			<tr>
				<td>Totaal</td>
				<td>". htmlentities($vRibZ + $vRibZo) ."</td>
				<td>". htmlentities($vVolZ + $vVolZo) ."</td>
				<td>". htmlentities($kRibZ + $kRibZo) ."</td>
				<td>". htmlentities($kVolZ + $kVolZo) ."</td>
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
		<th width="90">Ribberen Volw</th>
		<th width="90">Vol-au-Vent Volw</th>
		<th width="90">Ribberen Kind</th>
		<th width="90">Vol-au-Vent Kind</th>
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
			$totaal = $a['soep'] + $a['vRib'] + $a['vVol'] + $a['kRib'] + $a['kVol'];
		
			echo "
				<tr>
					<td>". htmlentities($id) . "</td>
					<td>". htmlentities($naam) ."</td>
					<td>". htmlentities($a['soep']) ."</td>
					<td>". htmlentities($a['vRib']) ."</td>
					<td>". htmlentities($a['vVol']) ."</td>
					<td>". htmlentities($a['kRib']) ."</td>
					<td>". htmlentities($a['kVol']) ."</td>
					<td>". htmlentities($totaal) ."</td>
				</tr>";
		}
	}
?>
</tbody>
</table>
</div>