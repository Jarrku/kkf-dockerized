<?php

class error {
	
	var $fh;
	var $c0 = "SQL Error";
	var $c1 = "Totaalbedrag moet groter zijn dan 0";
	var $c2 = "Naam is niet ingevuld";
	var $c3 = "Datum is niet correct";
	var $c4 = "IP adres is niet correct ingevoerd.";


	function error($datafile) {
		$this->fh = fopen($datafile, 'a') or die("Can't open file");
	}

	function write($code) {
		switch($code) {
			case 0: $data = $this->c0; break;
			case 1: $data = $this->c1; break;
			case 2: $data = $this->c2; break;
			case 3: $data = $this->c3; break;
			case 4: $data = $this->c4; break;
			default: $data = "Onbekende error";		
		}
		
		$data = $data . "\r\n";
		$dataToWrite = date("d-m-Y H:i:s", time()) . " | " . $code . " | " . $data;
		fwrite($this->fh, $dataToWrite);
	}
	
	function close() {
		fclose($this->fh);
	}
}