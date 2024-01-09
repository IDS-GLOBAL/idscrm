// JavaScript Document
var nopass = 0;
var pass = 1;
var empty = '';

$(document).ready(function () {

	//$('div#features_wave_one').hide();
	//$('a#addinventory').hide();	

	$('span.cnt-step').hide();

	$('span#uselast6ofvin').click( function(){
		
		var vin_vvin = $('input#vvin').val().replace(/,/g, '');
		
		var vvin_length = $('input#vvin').val().length;

		if(vvin_length >= 17){
			
			console.log('Using Last Six of VIN'+vin_vvin.slice(11, 17));
		}else{ alert('Sorry This Vin Is Not 17 Characters.'); return false;}
		
		var dovin = vin_vvin.slice(11, 17);
		
		$('input#vstockno').val(dovin);
		
		
	});
	
	$('#run_matrix').click( function(){				
		run_matrix();
		showpay();
		$(this).hide(300);
		
		$('a#addinventory').show(400);
		
	});		
	
	
	$('button#do_dealmatrix').click( function(){
			
		$('#dealMatrix_Modal').modal('show');
	});

	$('button#goFurther').click( function(){
												  
			//$('div#features_wave_one').toggle( 1000 );
	});

	$('button#addContinue').click( function(){
			
			//addcartoinventory();
			//$('div#features_wave_one').show( 1000 );
			
	});




	$('a#addinventory').click( function(){
			 //DECODEFULLVIN();
			 addcartoinventory();
	});




	$('a#decodeVIN').click( function(){
		decodefullvin();

	});		

	$('button#more_inventoryactions').click( function(){
												  
			$('div#iknowmorebox').toggle();
	});




	$('input#vvin').bind('keyup change', function() {
		
		var vvin = $("input#vvin").val().replace(/,/g, '');
		var thisdid = $("input#thisdid").val().replace(/,/g, '');
		
		var length = $(this).val().length;

		if(length >= 17){
		
					$.post('ajax/vinten.php', {vvin: vvin, thisdid: thisdid  }, 
					   
					   function(result) {
						$('div#vinYearResult').html(result).show();
						 $('input#vin_year').val(result);
						
					   });
					  
					  //dosomething();
					
					}



		$.post('ajax/checkvin.php', {vvin: vvin }, 
			   
			   function(result) {
				$('div#vvinfeedback').html(result).show();
				passYesYearvin();
			   });


		$.post('script_decodevinmake.php', {vvin: vvin},

			   function(result) {
				   $('input#vin_make').val(result);
				   $('div#vinMakeResult').html(result);
				   console.log(result);

				   pullModelsFromMake();
				   passYesMakevin();
				   //$('#addInventory_Modal').modal('show');
				   //thankyou();
				});
		

	});


	$("select#vmodel").on('change', function (){

	var slct_vmodel = document.getElementById("vmodel");
	var thevmodel = slct_vmodel.options[slct_vmodel.selectedIndex].value

		if(thevmodel){
				$("input#vinModelpassornot").val(pass);
		}
	
	$('div#vinModelResult').html(thevmodel);
		
		
	$('a#decodeVIN').html(thevmodel);

	});

	$("input#vtrim").on('change', function (){

		var vtrim = $("input#vtrim").val().replace(/,/g, '');
		$('div#vinTrimResult').html(vtrim);


	});


	$("select#vmake").on('change', function (){
	var slct_make = document.getElementById("vmake");
	var themake = slct_make.options[slct_make.selectedIndex].value	
	//console.log(themake);
	
	var thisdid = document.getElementById('thisdid').value;
	
						$.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, 									   
									   function(result) {
										 
										$('select#vmodel').html(result);
										
									   });
	});	


//Deal Matrix Functions
//	$('input#vrprice').bind('keyup change', function run_matrix(){

	$('input#vrprice').change( function(){
		run_matrix();	
		showpay();
	});

	


	$('span#dp_roundup').click( function(){
		//alert('Rounding UP');
		var vrprice = $('input#vrprice').val().replace(/,/g, '');
		
		var dp = (vrprice * 0.10).toFixed(2);

		var tinstotal = Math.ceil(dp);
		
		$('input#vdprice').val(tinstotal.toFixed(2));
		

	});

	$('span#dp_rounddown').click( function(){
		
		//alert('Rounding DOWN');
		
		var vrprice = $('input#vrprice').val().replace(/,/g, '');
		
		var dp = (vrprice * 0.10).toFixed(2);

		var tinstotal = Math.floor(dp);
		
		$('input#vdprice').val(tinstotal.toFixed(2));
											
	});


		

		

//End Document Ready
});



function thankyou(){
		var token = $('input#token').val().replace(/,/g, '');
		
		window.location.replace("thank-you.php?token="+token);

}





function pullModelsFromMake(){

var themake = $('div#vinMakeResult').html();

var thisdid = document.getElementById('thisdid').value;

 $.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, function(result) {
 
	$('select#vmodel').html(result);

 });

}

function passYesFullvin(){
		var token = $('input#token').val().replace(/,/g, '');
		$("input#vinFullpassornot").val(pass);
		//window.location.replace("thank-you.php?token="+token);

}

function passNoFullvin(){
		var token = $('input#token').val().replace(/,/g, '');
		$("input#vinFullpassornot").val(nopass);
		//window.location.replace("thank-you.php?token="+token);

}

function passYesYearvin(){
		var token = $('input#token').val().replace(/,/g, '');
		$("input#vinYearpassornot").val(pass);
		//window.location.replace("thank-you.php?token="+token);

}

function passNoYearvin(){
		var token = $('input#token').val().replace(/,/g, '');
		$("input#vinYearpassornot").val(nopass);
		//window.location.replace("thank-you.php?token="+token);

}

function passYesMakevin(){
	
		var vin_make = $('input#vin_make').val().replace(/,/g, '');
		
		if(vin_make != 'Error'){
				$("input#vinMakepassornot").val(pass);
		}
		
		//window.location.replace("thank-you.php?token="+token);

}


function passNoMakevin(){
		var vin_make = $('input#vin_make').val().replace(/,/g, '');

		if(vin_make == 'Error'){

			$("input#vinMakepassornot").val(nopass);
		}
		//window.location.replace("thank-you.php?token="+token);

}

// Still In Production Select Must Be Triggerd
function passYesModelvin(){
		//var token = $('input#token').val().replace(/,/g, '');

		$("input#vinModelpassornot").val(pass);

		//window.location.replace("thank-you.php?token="+token);

}

function passNoModelvin(){
		//var token = $('input#token').val().replace(/,/g, '');

		$("input#vinModelpassornot").val(nopass);

		//window.location.replace("thank-you.php?token="+token);

}





function decodefullvin(){
		
		
		
		var token = $('input#token').val().replace(/,/g, '');
		
		var vvin = $("input#vvin").val().replace(/,/g, '');
	
		var thisdid = $("input#thisdid").val();
		
		var length = $(this).val().length;

		if(length >= 17){
					$.post('ajax/vinten.php', {vvin: vvin, thisdid: thisdid  }, 
					   function(result) {
						$('div#vinYearResult').html(result).show();
						 $('input#vin_year').val(result);						
					   });

					  //dosomething();

					 

					  
					
		}else{
								  
								  alert('Sorry Vin Is Not 17 Digits');
								  
			return false;
		}



		$.post('ajax/checkvin.php', {vvin: vvin }, 
			   
			   function(result) {
				$('div#vvinfeedback').html(result).show();
				passYesYearvin();
			   });


		$.post('script_decodevinmake.php', {vvin: vvin},

			   function(result) {
				   $('input#vin_make').val(result);
				   $('div#vinMakeResult').html(result);
				   console.log(result);

				   pullModelsFromMake();
				   passYesMakevin();
				   //thankyou();
				});
		
	//$('#addInventory_Modal').modal('show');
	//show_yearmakeresults();
}

//The Pow
function addcartoinventory(){

		//debugger;
	
		var token = $('input#token').val();
		console.log(token);
		
		var thisdid = $("input#thisdid").val();
		console.log(thisdid);
		
		var vvin = $("input#vvin").val();
		console.log(vvin);
		
		var vmileage = $("input#vmileage").val();
		console.log(vmileage);
		
		var vstockno = $("input#vstockno").val();
		console.log(vstockno);		

		var vmileage = $("input#vmileage").val();
		console.log(vmileage);
		
		var slct_vyear = document.getElementById("vyear");
		var vin_year = slct_vyear.options[slct_vyear.selectedIndex].value;
		console.log(vin_year);

		var slct_vmake = document.getElementById("vmake");
		var vin_make = slct_vmake.options[slct_vmake.selectedIndex].value;
		
		console.log(vin_make);

		var slct_vmodel = document.getElementById("vmodel");
		var vmodel = slct_vmodel.options[slct_vmodel.selectedIndex].value;
		if(!vmodel){ alert('Model Not Selected'); return false;  }
		console.log(vmodel);
		
		var vtrim = $('input#vtrim').val();
		console.log(vtrim);

		var slct_vexterior_color = document.getElementById("vexterior_color");
		var vexterior_color = slct_vexterior_color.options[slct_vexterior_color.selectedIndex].text;
		var vexterior_color_hex = slct_vexterior_color.options[slct_vexterior_color.selectedIndex].value;
		
		console.log(vexterior_color);
		
		var slct_vinterior_color = document.getElementById("vinterior_color");
		var vinterior_color = slct_vinterior_color.options[slct_vinterior_color.selectedIndex].text;
		var vinterior_color_hex = slct_vinterior_color.options[slct_vinterior_color.selectedIndex].value;
		console.log(vinterior_color);
		
		var slct_vcylinders = document.getElementById("vcylinders");
		var vcylinders_txt = slct_vcylinders.options[slct_vcylinders.selectedIndex].text;
		var vcylinders = slct_vcylinders.options[slct_vcylinders.selectedIndex].value;
		console.log(vcylinders);

		var slct_vfueltype = document.getElementById("vfueltype");
		var vfueltype = slct_vfueltype.options[slct_vfueltype.selectedIndex].value;
		console.log(vfueltype);


		var slct_vbody = document.getElementById("vbody");
		var vbody = slct_vbody.options[slct_vbody.selectedIndex].text;
		console.log(vbody);

		var slct_vtransm = document.getElementById("vtransm");
		var vtransm = slct_vtransm.options[slct_vtransm.selectedIndex].value;
		console.log(vtransm);		

		var slct_vlivestatus = document.getElementById("vlivestatus");
		var vlivestatus = slct_vlivestatus.options[slct_vlivestatus.selectedIndex].value;
		console.log(vlivestatus);
		
		var slct_vcondition = document.getElementById("vcondition");
		var vcondition = slct_vcondition.options[slct_vcondition.selectedIndex].value;
		console.log(vcondition);
		
		var vrprice = $('input#vrprice').val();
		console.log(vrprice);
		
		var vspecialprice = $('input#vspecialprice').val();
		console.log(vspecialprice);
		var vdprice = $('input#vdprice').val();
		console.log(vdprice);
		
		var vpurchasecost = $('input#vpurchasecost').val();
		console.log(vpurchasecost);
		var vdlrpack = $('input#vdlrpack').val()
		console.log(vdlrpack);
		var vaddedcost = $('input#vaddedcost').val()
		console.log(vaddedcost);
		

		
		var vinlength = $("input#vvin").val().length;

		if(vinlength != 17){
			alert("Vin Is NOt 17 Digits");
			//return false;
		}

		console.log('Length: '+vinlength);
		
		if(vin_make == 'Error' ||  vin_make == ''){
				alert('No Make Is Present: '+vin_make);
				return false;
			
				$("input#vinMakepassornot").val(pass);
				return false;
		}

		if(vmodel == empty){
			alert('Please Select Model The Modal');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}
		
		if(vcondition == empty){
			alert('Vehicle Condition Not Present');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		if(vexterior_color == empty){
			alert('Please Select Vehicle Color');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		if(vinterior_color == empty){
			alert('Please Select Model The Modal');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		if(vrprice == empty || vrprice == '' || vrprice == 0.00 || vrprice == 0){
			alert('Please Enter A Price');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		//alert('About To Post');
		//return false;

		$.post('script_insertupdate.inventory.php', {token: token, thisdid: thisdid, vvin: vvin, vmileage: vmileage, vstockno: vstockno, vmileage: vmileage, vin_year: vin_year, vin_make: vin_make, vmodel: vmodel, vtrim: vtrim, vexterior_color: vexterior_color, vexterior_color_hex: vexterior_color_hex, vinterior_color: vinterior_color, vinterior_color_hex: vinterior_color_hex, vcylinders: vcylinders, vfueltype: vfueltype, vbody: vbody, vtransm: vtransm, vlivestatus: vlivestatus, vcondition: vcondition, vrprice: vrprice, vspecialprice: vspecialprice, vdprice: vdprice, vpurchasecost: vpurchasecost, vdlrpack: vdlrpack, vaddedcost: vaddedcost, vinlength: vinlength }, 
	   
	   function(result) {
		//$('div#createVehicleResult').html(result).show();
		//passYesYearvin();
	   });

		window.location.replace("script_last_vehicle_added.php");

		alert('Finished Processing');

}



function run_matrix(){
return false; 
		var vrprice = $('input#vrprice').val().replace(/,/g, '');
		
		
		var dp = $('input#vdprice').val().replace(/,/g, '');
		//var vspecialprice = .replace(/,/g, '');
		
		//Interger Of Dollars Off.
		var dlr_disc_int  = $('span#dlr_disc_int').html().replace(/,/g, '');

		if(vrprice < dlr_disc_int){	
			console.log(vrprice+ 'price <  not enough'+dlr_disc_int); 
			//return false; 
		}

		var vspecialprice = vrprice - dlr_disc_int;
		$('input#vspecialprice').val(vspecialprice);
		
 		console.log(vspecialprice);
		//Discount Percentage Dealer Needs As Downpayment
		
		//Multiple Price by Percentage of whole number as downapyment
		//Round Up And Round Down Will Manage Other Effects.
		var vdprice = (vrprice * 0.10).toFixed(2);
		$('input#vdprice').val(vdprice);





}

function showpay() {

		var vrprice = $('input#vrprice').val().replace(/,/g, '');
		

		var vrpriceupdate = (vrprice -0).toFixed(2);
		

		var dlr_disc_int  = $('span#dlr_disc_int').html().replace(/,/g, '');

		if(vrprice > dlr_disc_int){	
			
			return false; 
		}
		
	    $('input#vrprice').val(vrpriceupdate);

		var vspecialprice = vrprice - dlr_disc_int;
		
		var dlr_dperc_int = $('span#dlr_dperc_int').html();
		
		var vdprice = (vrprice * 0.10).toFixed(2);


		$('li#rtl_price_matrix').html(vrprice);
		
		$('li#spc_price_matrix').html(vspecialprice);
		
		$('li#dp_price_matrix').html(vdprice);


	
 if (($('input#vrprice').val() == null || $('input#vrprice').val().length == 0) ||
     ($('span#dlr_months').html() == null || $('span#dlr_months').html().length == 0)
||
     ($('span#dlr_apr').html() == null || $('span#dlr_apr').html().length == 0))
 { $('span#veh_payments').html("Call"); } else {
	 
 var princ = $('input#vrprice').val();
 console.log(princ);
 var term  = $('span#dlr_months').html();
 console.log(term);
 //var intr   = document.creditAppNewapp.applilcant_v_cust_rate.value / 1200;
 var dlr_apr = $('span#dlr_apr').html();
 console.log(dlr_apr);
 var intr   = dlr_apr / 1200;
 console.log(intr);
 //document.creditAppNewapp.applilcant_v_total_monthpmts_est.value = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));
 var totalpymts = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
 var totalpymts_half = totalpymts / 2;
 
 $('span#veh_payments').html(totalpymts);
 
 $('span#biweekly_payments').html(totalpymts_half);
 
 }

 //payment = principle * monthly interest/(1 - (1/(1+MonthlyInterest)*Months))

}




// Only Allows Numbers only
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
	theEvent.returnValue = false;
	if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
