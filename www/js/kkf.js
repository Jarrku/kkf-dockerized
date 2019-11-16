jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal) && currentVal < 99) {
            // Increment
				$('input[name='+fieldName+']').val(currentVal + 1);
				$('input[name=totaal]').val(totaal());
				$('input[name=totaaldrank]').val(totaaldrank());
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
			$('input[name=totaal]').val(totaal());
			$('input[name=totaaldrank]').val(totaaldrank());
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
			$('input[name=totaal]').val(totaal());
			$('input[name=totaaldrank]').val(totaaldrank());
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
			$('input[name=totaal]').val(totaal());
			$('input[name=totaaldrank]').val(totaaldrank());
        }
    });

	//This is the Modal window calling
	$('.modal_pagina').modal({width:1100,showSpeed:500,closeSpeed:500,title:true,skin:"default"});
	//This is the Modal window calling

});

function totaal() {
		var vRibV = parseInt($('input[name=vRib]').val()) * $('input[name=pRib]').val();
		var vVolV = parseInt($('input[name=vVol]').val()) * $('input[name=pV]').val();
		var kRibV = parseInt($('input[name=kRib]').val()) * $('input[name=pK]').val();
		var kVolV = parseInt($('input[name=kVol]').val()) * $('input[name=pK]').val();
		var soepV = parseInt($('input[name=soep]').val()) * $('input[name=pS]').val();
		var kaarten = parseInt($('input[name=kaarten]').val()) * $('input[name=pKa]').val();

		var totaal = (vRibV + vVolV + kRibV + kVolV + soepV) - kaarten;
		return totaal;
}

function totaaldrank () {
	var totaal = 0;

	for(i = 1; i <= 2; i++) {
		totaal += (parseInt($('input[name=cat'+i+']').val()) * eval('prijs' + i));
	}
	return totaal.toFixed(2); // return totaal met twee cijfers na de komma
}

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}
document.onkeypress = stopRKey;

function printForm() {

	if($('input[name=naam]').val() === "") {
		$('#error_naam').html("Vul een naam in aub");
	}
	else if($('input[name=totaal]').val() === "0") {
		$('#error_naam').html("Gelieve minstens &eacute;&eacute;n menu te bestellen");
	}
	else {
		$('#error_naam').html("");
		var id = document.getElementById('id').value;
		var naam = document.getElementById('naam').value;
		var soep = document.getElementById('soep').value;
		var vRib = document.getElementById('vRib').value;
		var vVol = document.getElementById('vVol').value;
		var kRib = document.getElementById('kRib').value;
		var kVol = document.getElementById('kVol').value;
		var kaarten = document.getElementById('kaarten').value;
		var opmerking = document.getElementById('opm').value;

		var link = 'print.php?id=' + id + '&naam=' + naam + '&soep=' + soep + '&vRib=' + vRib + '&vVol=' + vVol + '&kRib=' + kRib + '&kVol=' + kVol + '&kaarten=' + kaarten + '&opm=' + opmerking;
		window.open(link);
	}
}

function resetDrank() {
	for(i = 1; i < 3; i++) {
		$('input[name=cat'+i+']').val(0);
	}
	$('input[name=totaaldrank]').val(0);
}

function checkNumber(object) {
	var name = object.name;
	var value = $('input[name='+name+']').val();
	var intRegex = /^[0-9]+$/;

	if (value.match(intRegex) == null) {
		$('input[name='+name+']').val(0);
	}
	$('input[name=totaal]').val(totaal());
	$('input[name=totaaldrank]').val(totaaldrank());
}

function checkPrice(object) {
	var name = object.name;
	var value = $('input[name='+name+']').val();
	var doubleRegex = /[0-9 -()+]+$/;
	var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
	if (!numericReg.test(value)) {
		$('#span'+name).html("Prijs niet correct ingevuld");
	}
	else {
		$('#span'+name).html("");
	}
}

function checkIP(object) {
	var name = object.name;
	var value = $('input[name='+name+']').val();
	var intIP = /^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/;
	if (value.match(intIP) == null) {
		$('#span'+name).html("IP adres niet correct");
	}
	else {
		$('#span'+name).html("");
	}
}