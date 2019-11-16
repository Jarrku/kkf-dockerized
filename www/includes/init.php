<?php
ob_start();
session_start();

date_default_timezone_set('Europe/Brussels');

include 'db.class.php';
$db = new database('kkf', 'db', 'root', 'root');

include 'error.class.php';
$error = new error("errors.txt");

$mysqli = new mysqli('db', 'root', 'root', 'kkf');

function getId() {
	$query = $mysqli->query("SHOW TABLE STATUS WHERE name='bestellingen'");
	while($row = $query->fetch_array()) {
		return $row['Auto_increment'];
	}
}

function getInWacht() {
	$query = $mysqli->query("SELECT sum(vRib), sum(vVol), sum(kRib), sum(kVol) FROM bestellingen WHERE status < 4 LIMIT 1");
	while($a = $query->fetch_array()) {
		$volw = $a['sum(vRib)'] + $a['sum(kVol)'];
		$kind = $a['sum(kRib)'] + $a['sum(kVol)'];
	}
	$iw = array("v" => $volw, "k" => $kind);
	return $iw;
}

function getSettings() {
	$query = $mysqli->query("SELECT * FROM settings LIMIT 1");
	while($a = $query->fetch_array()) {
		$set = array("fdatZ" => date("d-m-Y H:i:s", strtotime($a['datZ'])), "datZ" => date("d-m-Y", strtotime($a['datZ'])), "ip" =>$a['ip'], "pV" => $a['pV'],"pRib" => $a['pRib'], "pK" => $a['pK'], "pS" => $a['pS'], "pKa" => $a['pKa']);
	}
	return $set;
}

?>