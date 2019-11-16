<?php
	$iw = $db->getInWacht();
	$volw = $iw['v'];
	$kind = $iw['k'];
	
	if(isset($_POST)) {
		$time = date('Y-m-d H:i:s', time());
		if(isset($_POST['in'])) {
			if($_POST['soep'] > 0)
				$db->query("UPDATE bestellingen SET keukenTijd = '". $time ."', status = '2' WHERE id = ". $_POST['in'] ."", true);
			else $db->query("UPDATE bestellingen SET keukenTijd = '". $time ."', status = '3' WHERE id = ". $_POST['in'] ."", true);
			
		}
		else if(isset($_POST['outS'])) {
			$db->query("UPDATE bestellingen SET soepTijd = '". $time ."', status = '3' WHERE id = ". $_POST['outS'] ."", true);
			
		}
		else if(isset($_POST['out'])) {
			$db->query("UPDATE bestellingen SET tafelTijd = '". $time ."', status = '4' WHERE id = ". $_POST['out'] ."", true);
	
			$iw = $db->getInWacht();
			$volw = $iw['v'];
			$kind = $iw['k'];
		}
	}
?>
<h2 align="center">Aantal menu's in wacht: <?php echo $volw . " volwassenen en " . $kind . " kinderen"?></h2>
<table id="table-2" cellspacing="0">
	<thead>
		<th width="40">Id</th>
		<th width="200">Naam</th>
		<th width="90">Gescand?</th>
		<th width="90">Soep</th>
		<th width="90">Rib Volw</th>
		<th width="90">Vol-au-vent Volw</th>
		<th width="90">Rib Kind</th>
		<th width="90">Vol-au-vent Kind</th>
		<th width="90">Totaal</th>
		<th width="90">Tafelnr</th>
		<th>Actie uitvoeren</th>
	</thead>
	<tbody>
<?php

	$r = $mysqli->query("SELECT * FROM bestellingen WHERE status < 4 ORDER BY ISNULL(keukenTijd), keukenTijd ASC, id ASC");

    if ( $r !== false ) {
		while ( $a = $r->fetch_array() ) {
		$id = stripslashes($a['id']);
        $naam = stripslashes($a['naam']);
		if($a['keukenTijd'] != null) {
			$dt = new DateTime($a['keukenTijd']); 
			$gescand = $dt->format('H:i:s');
		}
		else $gescand = "";
		$status = stripslashes($a['status']);
		$totaal = $a['soep'] + $a['vRib'] + $a['vVol'] + $a['kRib'] + $a['kVol'];
		echo "
			<tr class=\"s". htmlentities($a['status']) ."\">
				<td>". htmlentities($id) . "</td>
				<td>". htmlentities($naam) ."</td>
				<td>". htmlentities($gescand) ."</td>
				<td>". htmlentities($a['soep']) ."</td>
				<td>". htmlentities($a['vRib']) ."</td>
				<td>". htmlentities($a['vVol']) ."</td>
				<td>". htmlentities($a['kRib']) ."</td>
				<td>". htmlentities($a['kVol']) ."</td>
				<td>". htmlentities($totaal) ."</td>
				<td>". htmlentities($a['tafel']) ."</td>
				<td>";
					if($status == 1) {
						echo "
							<form action=\"index.php?p=0\" name=\"incoming". htmlentities($id) ."\" method=\"POST\">
							<input type=\"hidden\" name=\"soep\" value=\"". htmlentities($a['soep']) ."\">
							<input type=\"hidden\" name=\"in\" value=\"". htmlentities($id) . "\">
							<input type=\"submit\" value=\"Bestelling komt binnen!\">
							</form>";
					}
					else if($status == 2 && $a['soep'] > 0) {
						echo "
							<form action=\"index.php?p=0\" name=\"outgoingSoep". htmlentities($id) ."\" method=\"POST\">
							<input type=\"hidden\" name=\"outS\" value=\"". htmlentities($id) . "\">
							<input type=\"submit\" value=\"Soep gaat buiten!\">
							</form>";
					}
					else if($status == 3) {
						echo "
							<form action=\"index.php?p=0\" name=\"outgoing". htmlentities($id) ."\" method=\"POST\">
							<input type=\"hidden\" name=\"out\" value=\"". htmlentities($id) . "\">
							<input type=\"submit\" value=\"Bestelling gaat buiten!\">
							</form>";
					}
					else echo "Bestelling is afgewerkt";
					
		echo "
				</td>
			</tr>";
		
		}
	}
?>
</tbody>
</table>