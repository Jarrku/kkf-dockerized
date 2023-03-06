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
		var vNatV = parseInt($('input[name=vNat]').val()) * $('input[name=pV]').val();
		var vCurV = parseInt($('input[name=vCur]').val()) * $('input[name=pV]').val();
		var vProV = parseInt($('input[name=vPro]').val()) * $('input[name=pV]').val();
		var vAppV = parseInt($('input[name=vApp]').val()) * $('input[name=pV]').val();
		var vVeggieV = parseInt($('input[name=vVeggie]').val()) * $('input[name=pV]').val();
		var kNatV = parseInt($('input[name=kNat]').val()) * $('input[name=pK]').val();
		var kProV = parseInt($('input[name=kPro]').val()) * $('input[name=pK]').val();
		var kCurV = parseInt($('input[name=kCur]').val()) * $('input[name=pK]').val();
		var kAppV = parseInt($('input[name=kApp]').val()) * $('input[name=pK]').val();
		var kVeggieV = parseInt($('input[name=kVeggie]').val()) * $('input[name=pK]').val();
		var soepV = parseInt($('input[name=soep]').val()) * $('input[name=pS]').val();
		var kaarten = parseInt($('input[name=kaarten]').val()) * $('input[name=pKa]').val();

		var totaal = (vNatV + vCurV + vProV + vAppV + vVeggieV + kNatV + kCurV + kProV + kAppV + kVeggieV + soepV) - kaarten;
		return totaal;
}

function totaaldrank () {
	var totaal = 0;

	for(i = 1; i < 10; i++) {
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
		var vNat = document.getElementById('vNat').value;
		var vCur = document.getElementById('vCur').value;
		var vPro = document.getElementById('vPro').value;
		var vApp = document.getElementById('vApp').value;
		var vVeggie = document.getElementById('vVeggie').value;
		var kNat = document.getElementById('kNat').value;
		var kCur = document.getElementById('kCur').value;
		var kPro = document.getElementById('kPro').value;
		var kApp = document.getElementById('kApp').value;
		var kVeggie = document.getElementById('kVeggie').value;
		var kaarten = document.getElementById('kaarten').value;
		var opmerking = document.getElementById('opm').value;

		var link = 'print.php?id=' + id + '&naam=' + naam + '&soep=' + soep + '&vNat=' + vNat + '&vCur=' + vCur + '&vPro=' + vPro + '&vApp=' + vApp + '&vVeggie=' + vVeggie + '&kNat=' + kNat + '&kCur=' + kCur + '&kPro=' + kPro + '&kApp=' + kApp + '&kVeggie=' + kVeggie + '&kaarten=' + kaarten + '&opm=' + opmerking;
		window.open(link);
	}
}

function resetDrank() {
	for(i = 1; i < 10; i++) {
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