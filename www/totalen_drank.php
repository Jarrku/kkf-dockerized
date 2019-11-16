<table id="table-2" cellspacing="0">
	<thead>
		<th width="90">Dag</th>
		<th width="90">1 Bonnetje</th>
		<th width="90">1 Zuipkaart</th>
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
	
	$cat1 = 0; $cat2 = 0; 
	$cat1z = 0; $cat2z = 0;
	
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
				
			}
			else {
				$cat1z += $a['cat1'];
				$cat2z += $a['cat2'];
			}
		
		}
		
		$totZ = ($cat1 * $prijs1)+ ($cat2 * $prijs2);
		$totZo = ($cat1z * $prijs1)+ ($cat2z * $prijs2);

		$totWE = $totZ + $totZo;
	
	echo "
			<tr>
				<td>Zaterdag</td>
				<td>". htmlentities($cat1) ."</td>
				<td>". htmlentities($cat2) ."</td>
				<td>". htmlentities($totZ) ." euro</td>
			</tr>";
	
	echo "
			<tr>
				<td>Zondag</td>
				<td>". htmlentities($cat1z) ."</td>
				<td>". htmlentities($cat2z) ."</td>
				<td>". htmlentities($totZo) ." euro</td>
			</tr>";
	
	echo "
			<tr>
				<td>Totaal</td>
				<td>". htmlentities($cat1z + $cat1) ."</td>
				<td>". htmlentities($cat2z + $cat2) ."</td>
				<td>". htmlentities($totZo + $totZ) ." euro</td>
			</tr>";
	
?>
</tbody>
</table>
