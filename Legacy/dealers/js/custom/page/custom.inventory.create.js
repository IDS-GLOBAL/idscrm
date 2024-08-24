// JavaScript Document
var empty = "";
var pass = '1';
var nopass = '0';
$(document).ready(function () {



$('button#checkout_vstockno').on('click', function(){


						var did = $('input#thisdid').val();

						var vstockno = $('input#vstockno').val();
						
						$.post('ajax/checkvstockno.php', {vstockno: vstockno, did: did}, function(data){
						
						
							$('div#checkvstock_results').html(data);
						
						});




						var pass_stock_good = $('input#pass_stock_good').val();
						
						
						if(pass_stock_good == 'N'){
							alert('Not A Good Stock Number');
							
						}




						// Had 2014 had to add upto 2017 this is a check again.
						var vin_year = $('input#vin_year').val();
						//Get select object
						var objSelect = document.getElementById("vyear");
						
						//Set selected
						setSelectedValue(objSelect, vin_year);
						
						function setSelectedValue(selectObj, valueToSet) {
							for (var i = 0; i < selectObj.options.length; i++) {
								if (selectObj.options[i].text== valueToSet) {
									selectObj.options[i].selected = true;
									return;
								}
							}
						}








				
				
});



	$('button#create_anyway').on('click', function(){
			
			
			console.log('clicked create_anyway');
			
			addcartoinventory();
			
	});


	$('button#decode_vin').on('click', function(){
			
			console.log('clicked decode_vin');

// http://stackoverflow.com/questions/1836105/how-to-wait-5-seconds-with-jquery
setTimeout(
  function() 
  {
    //do something special
		var pass_vin_good = $('input#pass_vin_good').val();

		if(pass_vin_good == 'N'){ 
			$('div#vehicle_first_part').hide();
			$('div#vehicle_second_part').hide();
			
			alert('Sorry Not A Valid VIN Please Retry'); 
			return false;
		}else if(pass_vin_good == 'Y'){
			$('div#vehicle_first_part').show();
			$('div#vehicle_second_part').show();

		}

		run_run();
			
			
 }, 3000);
/// End Timeout
			
			
	});


	$('span#uselast6ofvin').click( function(){
		
		var vin_vvin = $('input#vvin').val().replace(/,/g, '');
		
		var vvin_length = $('input#vvin').val().length;

		if(vvin_length >= 17){
			
			//console.log('Using Last Six of VIN'+vin_vvin.slice(11, 17));
			
		}else{ alert('Sorry This Vin Is Not 17 Characters.'); return false;}
		
		var dovin = vin_vvin.slice(11, 17);
		
		$('input#vstockno').val(dovin);
		
		
	});






	$('input#vvin').bind('keypress change', function() {
		
		// I, O, Q, U or Z never appear in a VIN
		var vin_itself = $('input#vvin').val();
		var new_vin_itself = vin_itself.replace('i', '');
		var new_vin_itself = new_vin_itself.replace('I', '');
		var new_vin_itself = new_vin_itself.replace('o', '');
		var new_vin_itself = new_vin_itself.replace('O', '');
		var new_vin_itself = new_vin_itself.replace('q', '');
		var new_vin_itself = new_vin_itself.replace('Q', '');

			
		var vin_charcount =  new_vin_itself.length;
		
		var char_count_from17 = (17) - (vin_charcount -0);
		
		if(vin_charcount > 17){ 
			
			var char_result = 'To Many'; console.log('Too Many'); 
			
				}else{ 
			
			var char_result = char_count_from17;
			
			//$('input#vvin').val(new_vin_itself);

		}
		
		$('input#vin_char_count').val(vin_charcount);
		
		$('span#vin_charcount').html('+'+char_result);
	
	
	});



	$('input#vvin').bind('keyup change', function() {

		console.log('VIN: BEING ENTERED');
		
		var vvin = $("input#vvin").val().replace(/,/g, '');
		var thisdid = $("input#thisdid").val().replace(/,/g, '');
		
		var length = $(this).val().length;

		if(length >= 17){
		
					$.post('ajax/check_vin.php', {vvin: vvin }, 
						   
						   function(result) {
							$('div#vvinfeedback').html(result).show();
							
							//$('div#ajax_vehicle_console_results').html(result);
							
						   });

		
					$.post('ajax/check.vin.transfer.php', {vvin: vvin }, 
						   
						   function(result) {
							//$('div#vvinfeedback').html(result).show();
							
							$('div#ajax_vehicle_console_results').html(result);
							
						   });
					  
					
		}
	
	
	});





	//$("select#vmake").bind('keypress change', function(){
	$("select#vmake").on('change', function (){
	var slct_make = document.getElementById("vmake");
	var themake_id = slct_make.options[slct_make.selectedIndex].value;
	var themake = slct_make.options[slct_make.selectedIndex].text;
	//console.log(themake);
	
	var thisdid = document.getElementById('thisdid').value;
	
						$.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, 									   
									   function(result) {
										 
										$('select#vmodel').html(result);
										
									   });
	});	




$('select#vmodel').on('change', function(){
	var slct_vmodels = document.getElementById("vmodel");
	var vmodels = slct_vmodels.options[slct_vmodels.selectedIndex].value;

		console.log('vmodels: '+vmodels);

//Yougottafix this 12-5-2016
//return false;



		if(vmodels == 'notlisted'){
			
			$('div#addModelbyDealer').modal('show');
		}

});


$('button#add_model_toselections').on('click', function(){
		
		
		var vmodel_entered = $('input#vmodel_entered').val();

		var thisdid = document.getElementById('thisdid').value;
		
		var slct_vyear = document.getElementById("vyear");
		var vyear = slct_vyear.options[slct_vyear.selectedIndex].value;
		
		console.log('Models From make Running');
		var slct_vmake = document.getElementById("vmake");
		var vmake_id = slct_vmake.options[slct_vmake.selectedIndex].value;
		var vmake = slct_vmake.options[slct_vmake.selectedIndex].text;


		
		if(!vmodel_entered){
			alert('Sorry You Have not Entered A Model');
			return false;
		}
		
		$.post('script_create_dealer.carmodel.add.php', {
			   vmodel_entered: vmodel_entered,
			   thisdid: thisdid,
			   vmake_id: vmake_id,
			   vmake: vmake,
			   vyear: vyear
			   }, function(data){
				   console.log(data);
				   
				   $('select#vmodel').html(data);

			   });
		 $('input#vmodel_entered').val('');
});



}); //End of the document ready


function run_run(){

	console.log('performing run_run()');

		var vvin = $("input#vvin").val().replace(/,/g, '');
		var thisdid = $("input#thisdid").val().replace(/,/g, '');
		
		var length = $("input#vvin").val().length;

		if(length >= 17){

					$.post('ajax/vinten.php', {vvin: vvin, thisdid: thisdid  }, 
					   
					   function(resultvyear) {
						
						console.log('VIN YEAR: '+resultvyear);

						$('div#vinYearResult').html(resultvyear).show();
						
						$('input#vin_year').val(resultvyear);
						
						


						$("select#vyear").val(resultvyear);

						var slct_vyear = document.getElementById("vyear");
						var selcted_year = slct_vyear.options[slct_vyear.selectedIndex].value;


						if(resultvyear == selcted_year){
							$('select#vyear').prop('disabled', true);
						}


											 
						
						
					   });
					  
					  //dosomething();


				   $.post('script_decodevinmake.php', {vvin: vvin},
	
				   function(result2) {
					   
					console.log('script_decodevinmake.php result2: ', result2)
						
						$('div#vinMakeResult').html(result2);
					   	$('select#vmake').val(result2);
					   	$('div#vinModelResult').html('Choose Model');


						//Get select object
						var objSelect2 = document.getElementById("vmake");

						//Set selected
						setSelectedValue2(objSelect2, result2);
						
						function setSelectedValue2(selectObj, valueToSet) {
							for (var i = 0; i < selectObj.options.length; i++) {
								if (selectObj.options[i].text== valueToSet) {
									selectObj.options[i].selected = true;
									return;
								}
							}
						}


							var pass_vin_good = $('input#pass_vin_good').val();
					
							if(pass_vin_good == 'N'){ 
								$('div#vehicle_first_part').hide();
								$('div#vehicle_second_part').hide();
								
								alert('Sorry Not A Valid VIN Please Retry'); 
								return false;
							}else if(pass_vin_good == 'Y'){
								$('div#vehicle_first_part').show();
								$('div#vehicle_second_part').show();
								$('div#add_vehicle_view_box').show();
								
								console.log('Pulling Models');
								pullModelsFromMake();
								$('div#add_vehicle_view_box').show();
							}


						//var selcted_vmake = document.getElementById("vmake").text;

						var slct_vmake = document.getElementById("vmake");
						var selcted_vmake_id = slct_vmake.options[slct_vmake.selectedIndex].value;
						var selcted_vmake = slct_vmake.options[slct_vmake.selectedIndex].text;


					   	if(result2 == selcted_vmake){
							//$('select#vmake').prop('disabled', true);
							// Disabled because i saw an infiniti get labled as a nissan on pass vin.
							console.log('Make: '+selcted_vmake);
							
							var pass_vin_good = $('input#pass_vin_good').val();
					
							if(pass_vin_good == 'N'){ 
								$('div#vehicle_first_part').hide();
								$('div#vehicle_second_part').hide();
								
								alert('Sorry Not A Valid VIN Please Retry'); 
								return false;
							}else if(pass_vin_good == 'Y'){
								$('div#vehicle_first_part').show();
								$('div#vehicle_second_part').show();
								$('div#add_vehicle_view_box').show();
								
								console.log('Pulling Models');
								pullModelsFromMake();
								$('div#add_vehicle_view_box').show();
							}
							
							
							
							
						}else{ console.log('no make match'); }

						//pullModelsFromMake();
					  //console.log(result);
					  
					});

	}
}


// Pulling For models based on make
function pullModelsFromMake(vmake){

		let thismake = vmake;

		console.log('Models From make Running');
		var slct_vmake = document.getElementById("vmake");

		if(slct_vmake){
			vmake = thismake;
		}

		console.log('slct_vmake ', slct_vmake);


		var themake_id = slct_vmake.options[slct_vmake.selectedIndex].value;
		var themake = slct_vmake.options[slct_vmake.selectedIndex].text;
		
		
		if(!themake){ return false; }
		
		var thisdid = document.getElementById('thisdid').value;

 $.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, function(result) {
 
	$('select#vmodel').html(result);
	console.log('Models From ajax/pullmodels.php: ', result)

 });

								$('div#vehicle_second_part').show();
								$('div#add_vehicle_view_box').show();
	

}




//The Pow
function addcartoinventory(){

		//debugger;
		
		console.log('adding inventory');



		var token = $('input#token').val();
		console.log(token);
		
		var thisdid = $("input#thisdid").val();
		console.log(thisdid);
		
		var vvin = $("input#vvin").val();
		console.log(vvin);
		

		if(!vvin){ alert('SORRY! VIN IS MISSING'); return false;  }
		
		var vinlength = $('input#vvin').val().length;
		
		$('div#vehicle_input_section').show();

		var pass_vin_good = $('input#pass_vin_good').val();
		
		if(pass_vin_good == 'N'){ 
			
			alert('Sorry Not A Valid VIN Please Retry'); 
			return false;
		}

		
		var vmileage = $('input#vmileage').val();
		
		var vstockno = $("input#vstockno").val();
		console.log(vstockno);		
		
		var slct_vyear = document.getElementById("vyear");
		var vin_year = slct_vyear.options[slct_vyear.selectedIndex].value;
		console.log(vin_year);

		var slct_vmake = document.getElementById("vmake");
		var vin_make = slct_vmake.options[slct_vmake.selectedIndex].text;
		
		console.log(vin_make);

		var slct_vmodel = document.getElementById("vmodel");
		var vmodel = slct_vmodel.options[slct_vmodel.selectedIndex].value;
		if(!vmodel){ alert('Model Not Selected'); return false;  }
		console.log(vmodel);







		var vtrim = $('input#vtrim').val();
		console.log(vtrim);

		var slct_vcondition = document.getElementById("vcondition");
		var vcondition = slct_vcondition.options[slct_vcondition.selectedIndex].value;
		console.log(vcondition);

		var vrprice = $('input#vrprice').val();
		console.log(vrprice);
		
		var vspecialprice = $('input#vspecialprice').val();
		console.log(vspecialprice);
		var vdprice = $('input#vdprice').val();
		console.log(vdprice);


		var slct_vlivestatus = document.getElementById("vlivestatus");
		var vlivestatus = slct_vlivestatus.options[slct_vlivestatus.selectedIndex].value;
		console.log('Vlive status: '+vlivestatus);

		//alert('About To Post');
		//return false;

		$.post('script_insert.inventory.php', {
				token: token, 
				thisdid: thisdid, 
				vvin: vvin, 
				vmileage: vmileage, 
				vstockno: vstockno, 
				vin_year: vin_year, 
				vin_make: vin_make, 
				vmodel: vmodel, 
				vtrim: vtrim,
				vcondition: vcondition,
				vrprice: vrprice,
				vspecialprice: vspecialprice,
				vdprice: vdprice,
				vlivestatus: vlivestatus,
				vinlength: vinlength
			   }, 
	   
	   function(result) {
		$('div#createVehicleResult').html(result).show();
		console.log(result);
		//$('div#ajax_vehicle_console_results').html(result);
		$("div#debug_console").html(result)
		//passYesYearvin();
	   });


/*   
		window.location.replace("script_last_vehicle_added.php");
*/
		//alert('Finished Processing');



}






