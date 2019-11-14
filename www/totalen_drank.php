<table id="table-2" cellspacing="0">
	<thead>
		<th width="90">Dag</th>
		<th width="90">Oudercomit&eacute;</th>
		<th width="90">Porto<br>Sherry</th>
		<th width="90">Frisdrank, Pils</th>
		<th width="90">Gini, Palm, Gebak</th>
		<th width="90">Middelzwaar bier</th>
		<th width="90">Zwaar bier</th>
		<th width="90">Fles wijn</th>
		<th width="90">Dessert</th>
		<th width="90">Kinderijs</th>
		<th width="180">Totaal</th>
	</thead>
	<tbody>
<?php

	$result = $mysqli->query("SELECT * from drankprijs LIMIT 1");
	while($row = $result->fetch_array()) {
		for($i = 1; $i <= 10; $i++) {
			${"prijs".$i} = $row['prijs'.$i];
		}
	}
	
	$cat1 = 0; $cat2 = 0; $cat3 = 0; $cat4 = 0; $cat5 = 0;
	$cat6 = 0; $cat7 = 0; $cat8 = 0; $cat9 = 0;
	$cat1z = 0; $cat2z = 0; $cat3z = 0; $cat4z = 0; $cat5z = 0;
	$cat6z = 0; $cat7z = 0; $cat8z = 0; $cat9z = 0;
	
	$zaterdag = strtotime($fdatZ);
	
	$results = $mysqli->query("SELECT * FROM drank");

	while ($a = $results->fetch_array()) {
			$datum = $a['datum'];
			
			$dt = new DateTime($a['datum']); 
			$gescand = $dt->format('Y-m-d H:i:s');
			$datum = strtotime($gescand);
			if($datum < $zaterdag) {
				$cat1 += $a['cat1'];
				$cat2 += $a['cat2'];
				$cat3 += $a['cat3'];
				$cat4 += $a['cat4'];
				$cat5 += $a['cat5'];
				$cat6 += $a['cat6'];
				$cat7 += $a['cat7'];
				$cat8 += $a['cat8'];
				$cat9 += $a['cat9'];
				
			}
			else {
				$cat1z += $a['cat1'];
				$cat2z += $a['cat2'];
				$cat3z += $a['cat3'];
				$cat4z += $a['cat4'];
				$cat5z += $a['cat5'];
				$cat6z += $a['cat6'];
				$cat7z += $a['cat7'];
				$cat8z += $a['cat8'];
				$cat9z += $a['cat9'];
			}
		
		}
		
		$totZ = ($cat1 * $prijs1)+ ($cat2 * $prijs2) + ($cat3 * $prijs3) + ($cat4 * $prijs4) + ($cat5 * $prijs5) + ($cat6 * $prijs6) + ($cat7 * $prijs7) + ($cat8 * $prijs8) + ($cat9 * $prijs9);
		$totZo = ($cat1z * $prijs1)+ ($cat2z * $prijs2) + ($cat3z * $prijs3) + ($cat4z * $prijs4) + ($cat5z * $prijs5) + ($cat6z * $prijs6) + ($cat7z * $prijs7) + ($cat8z * $prijs8) + ($cat9z * $prijs9);

		$totWE = $totZ + $totZo;
	
	echo "
			<tr>
				<td>Zaterdag</td>
				<td>". htmlentities($cat1) ."</td>
				<td>". htmlentities($cat2) ."</td>
				<td>". htmlentities($cat3) ."</td>
				<td>". htmlentities($cat4) ."</td>
				<td>". htmlentities($cat5) ."</td>
				<td>". htmlentities($cat6) ."</td>
				<td>". htmlentities($cat7) ."</td>
				<td>". htmlentities($cat8) ."</td>
				<td>". htmlentities($cat9) ."</td>
				<td>". htmlentities($totZ) ." euro</td>
			</tr>";
	
	echo "
			<tr>
				<td>Zondag</td>
				<td>". htmlentities($cat1z) ."</td>
				<td>". htmlentities($cat2z) ."</td>
				<td>". htmlentities($cat3z) ."</td>
				<td>". htmlentities($cat4z) ."</td>
				<td>". htmlentities($cat5z) ."</td>
				<td>". htmlentities($cat6z) ."</td>
				<td>". htmlentities($cat7z) ."</td>
				<td>". htmlentities($cat8z) ."</td>
				<td>". htmlentities($cat9z) ."</td>
				<td>". htmlentities($totZo) ." euro</td>
			</tr>";
	
	echo "
			<tr>
				<td>Totaal</td>
				<td>". htmlentities($cat1z + $cat1) ."</td>
				<td>". htmlentities($cat2z + $cat2) ."</td>
				<td>". htmlentities($cat3z + $cat3) ."</td>
				<td>". htmlentities($cat4z + $cat4) ."</td>
				<td>". htmlentities($cat5z + $cat5) ."</td>
				<td>". htmlentities($cat6z + $cat6) ."</td>
				<td>". htmlentities($cat7z + $cat7) ."</td>
				<td>". htmlentities($cat8z + $cat8) ."</td>
				<td>". htmlentities($cat9z + $cat9) ."</td>
				<td>". htmlentities($totZo + $totZ) ." euro</td>
			</tr>";
	
?>
</tbody>
</table>
