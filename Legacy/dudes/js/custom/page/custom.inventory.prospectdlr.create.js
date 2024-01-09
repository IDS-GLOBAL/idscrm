// JavaScript Document
// Creating Inventory on the behalf of dealer on system dealers page.
// 12/10/2016 have to take justice and lyric to birthday parties have to leave.
//  
var empty = "";
var pass = '1';
var nopass = '0';
$(document).ready(function () {



$('button#checkout_vstockno').on('click', function(){


						var prospctdlrid = $('input#prospctdlrid').val();

						var vstockno = $('input#vstockno').val();
						
						$.post('ajax/checkvstockno.php', {vstockno: vstockno, prospctdlrid: prospctdlrid}, function(data){
						
						
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
		
		var prospctdlrid = $('input#prospctdlrid').val();

		var vvin = $("input#vvin").val().replace(/,/g, '');
		var prospctdlrid = $('input#prospctdlrid').val().replace(/,/g, '');
		
		var length = $(this).val().length;

		if(length >= 17){
		
					$.post('ajax/check_vin.php', {vvin: vvin, prospctdlrid: prospctdlrid }, 
						   
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
	
	var prospctdlrid = $('input#prospctdlrid').val();
	
						$.post('ajax/pullmodels.php', {themake: themake, prospctdlrid: prospctdlrid }, 									   
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

		var prospctdlrid = document.getElementById('prospctdlrid').value;
		
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
			   prospctdlrid: prospctdlrid,
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
		var prospctdlrid = $("input#prospctdlrid").val().replace(/,/g, '');
		
		var length = $("input#vvin").val().length;

		if(length >= 17){

					$.post('ajax/vinten.php', {vvin: vvin, prospctdlrid: prospctdlrid  }, 
					   
					   function(resultvyear) {
						$('div#vinYearResult').html(resultvyear).show();
						 $('input#vin_year').val(resultvyear);
						console.log('VIN YEAR: '+resultvyear);


						var objSelect = document.getElementById("vyear");
						
						//Set selected
						setSelectedValue(objSelect, resultvyear);
						
						function setSelectedValue(selectObj, valueToSet) {
							for (var i = 0; i < selectObj.options.length; i++) {
								if (selectObj.options[i].text== valueToSet) {
									selectObj.options[i].selected = true;
									return;
								}
							}
						}


						var slct_vyear = document.getElementById("vyear");
						var selcted_year = slct_vyear.options[slct_vyear.selectedIndex].value;


						if(resultvyear == selcted_year){
							$('select#vyear').prop('disabled', true);
						}


											 
						
						
					   });
					  
					  //dosomething();


				   $.post('script_decodevinmake.php', {vvin: vvin},
	
				   function(result2) {
					   
					   $('select#vmake').val(result2);
					   $('div#vinMakeResult').html(result2);
					   $('div#vinModelResult').html('Choose Model');


						//Get select object
						var objSelect2 = document.getElementById("vmake");

						//Set selected
						setSelectedValue2(objSelect2, result2);
						
						function setSelectedValue2(objSelect2, valueToSet) {
							for (var i = 0; i < objSelect2.options.length; i++) {
								if (objSelect2.options[i].text== valueToSet) {
									objSelect2.options[i].selected = true;
									return;
								}
							}
						}




						//var selcted_vmake = document.getElementById("vmake").text;

						var slct_vmake = document.getElementById("vmake");
						var selcted_vmake_id = slct_vmake.options[slct_vmake.selectedIndex].value;
						var selcted_vmake = slct_vmake.options[slct_vmake.selectedIndex].text;


					   	if(result2 == selcted_vmake){
							$('select#vmake').prop('disabled', true);
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
					
							}
							
							
							
							
						}else{ console.log('no make match'); }

						//pullModelsFromMake();
					  //console.log(result);
					  
					});

	}
}


// Pulling For models based on make
function pullModelsFromMake(){
		console.log('Models From make Running');
		var slct_vmake = document.getElementById("vmake");
		var themake_id = slct_vmake.options[slct_vmake.selectedIndex].value;
		var themake = slct_vmake.options[slct_vmake.selectedIndex].text;
		
		
		if(!themake){ return false; }
		
		var prospctdlrid = $('input#prospctdlrid').val();

 $.post('ajax/pullmodels.php', {themake: themake, prospctdlrid: prospctdlrid }, function(result) {
 
	$('select#vmodel').html(result);

 });


	

}




//The Pow
function addcartoinventory(){

		//debugger;
		
		console.log('adding inventory');



		var token = $('input#dudes_secret_token').val();
		console.log(token);
		
		var prospctdlrid = $("input#prospctdlrid").val();
		console.log(prospctdlrid);
		
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

		
		
		var vstockno = $("input#vstockno").val();
		console.log(vstockno);		

		var vmileage = $('input#vmileage').val();


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


		var slct_vbody = document.getElementById("vbody");
		var vbody = slct_vbody.options[slct_vbody.selectedIndex].value;
		//alert(vbody);

		var slct_vexterior_color = document.getElementById("vexterior_color");
		var vexterior_color = slct_vexterior_color.options[slct_vexterior_color.selectedIndex].text;
		var vexterior_color_hex = slct_vexterior_color.options[slct_vexterior_color.selectedIndex].value;
		
		console.log(vexterior_color);
		
		var slct_vinterior_color = document.getElementById("vinterior_color");
		var vinterior_color = slct_vinterior_color.options[slct_vinterior_color.selectedIndex].text;
		var vinterior_color_hex = slct_vinterior_color.options[slct_vinterior_color.selectedIndex].value;
		console.log(vinterior_color);
		
		var vcustomcolor = $('input#vcustomcolor').val();

		var slct_vtransm = document.getElementById("vtransm");
		var vtransm = slct_vtransm.options[slct_vtransm.selectedIndex].value;
		console.log(vtransm);		


		var vengine = $('input#vengine').val();

		var slct_vcylinders = document.getElementById("vcylinders");
		var vcylinders_txt = slct_vcylinders.options[slct_vcylinders.selectedIndex].text;
		var vcylinders = slct_vcylinders.options[slct_vcylinders.selectedIndex].value;
		console.log(vcylinders);

		var slct_vfueltype = document.getElementById("vfueltype");
		var vfueltype = slct_vfueltype.options[slct_vfueltype.selectedIndex].value;
		console.log(vfueltype);


		var slct_vlivestatus = document.getElementById("vlivestatus");
		var vlivestatus = slct_vlivestatus.options[slct_vlivestatus.selectedIndex].value;
		console.log('Vlive status: '+vlivestatus);
		
		var slct_vcondition = document.getElementById("vcondition");
		var vcondition = slct_vcondition.options[slct_vcondition.selectedIndex].value;
		console.log(vcondition);


		var slct_vdoors = document.getElementById("vdoors");
		var vdoors = slct_vdoors.options[slct_vdoors.selectedIndex].value;


		var vrprice = $('input#vrprice').val();
		console.log(vrprice);
		
		var vspecialprice = $('input#vspecialprice').val();
		console.log(vspecialprice);
		var vdprice = $('input#vdprice').val();
		console.log(vdprice);




		//alert('About To Post');
		//return false;

		$.post('script_insert.inventory.php', {
				token: token, 
				prospctdlrid: prospctdlrid, 
				vvin: vvin, 
				vmileage: vmileage, 
				vstockno: vstockno, 
				vin_year: vin_year, 
				vin_make: vin_make, 
				vmodel: vmodel,
				vstockno: vstockno,
				vtrim: vtrim,
				vcondition: vcondition,
				vbody: vbody,
				vexterior_color: vexterior_color,
				vexterior_color_hex: vexterior_color_hex,
				vinterior_color: vinterior_color,
				vinterior_color_hex: vinterior_color_hex,
				vcustomcolor: vcustomcolor,
				vtransm: vtransm,
				vengine: vengine,
				vcylinders: vcylinders,
				vfueltype: vfueltype,
				vlivestatus: vlivestatus,
				vdoors: vdoors,
				vrprice: vrprice,
				vdprice: vdprice,
				vspecialprice: vspecialprice,
				vinlength: vinlength
			   }, 
	   
	   function(result) {
		$('div#createVehicleResult').html(result).show();
		console.log(result);
		//$('div#ajax_vehicle_console_results').html(result);
		//passYesYearvin();
	   });
/*   
		window.location.replace("script_last_vehicle_added.php");
*/
		//alert('Finished Processing');



}






