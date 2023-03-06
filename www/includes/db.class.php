<?php

class database {

	var $SQL;
	var $lastquery;
	var $count=0;

	function database($database, $server, $username, $password) {
		$this->SQL = mysql_connect($server, $username, $password) or die('Error: '.mysql_error());
		mysql_select_db($database, $this->SQL);
	}

	function query($query, $return){
		$this->lastquery = $query;
		$this->count;
		$result = mysql_query($query, $this->SQL) or die('Error with Query('.$query.'): '.mysql_error());
		if ($return)
			return $result;
	}

	function num_rows($result){
		return @mysql_num_rows($result);
	}

	function fetch_array($result){
		return @mysql_fetch_array($result);
	}

	function fetch_assoc($result){
		return @mysql_fetch_assoc($result);
	}

	function getId() {
		$row = $this->fetch_array($this->query("SHOW TABLE STATUS WHERE name='bestellingen'", true));
		return $row['Auto_increment'];
	}

	function getInWacht() {
		$a = $this->fetch_array($this->query("SELECT sum(vNat), sum(vCur), sum(vPro), sum(vApp), sum(vVeggie), sum(kNat), sum(kPro), sum(kCur), sum(kApp),sum(kVeggie) FROM bestellingen WHERE status < 4 LIMIT 1", true));

		$volw = $a['sum(vNat)'] + $a['sum(vCur)'] + $a['sum(vPro)'] + $a['sum(vApp)'] + $a['sum(vVeggie)'];
		$kind = $a['sum(kNat)'] + $a['sum(kCur)'] + $a['sum(kPro)'] + $a['sum(kApp)']+ $a['sum(kVeggie)'];

		$iw = array("v" => $volw, "k" => $kind);
		return $iw;
	}

	function getSettings() {
		$a = $this->fetch_array($this->query("SELECT * FROM settings LIMIT 1", true));

		$set = array("fdatZ" => date("d-m-Y H:i:s", strtotime($a['datZ'])), "datZ" => date("d-m-Y", strtotime($a['datZ'])), "ip" =>$a['ip'], "pV" => $a['pV'], "pK" => $a['pK'], "pS" => $a['pS'], "pKa" => $a['pKa']);
		return $set;
		}

	function disconnect(){
		mysql_close($this->SQL);
	}

	function escape($string){
		return mysql_real_escape_string($string);
	}

	function result($query, $column, $id=0){
		return mysql_result($query, $id, $column);
	}
}
?>
