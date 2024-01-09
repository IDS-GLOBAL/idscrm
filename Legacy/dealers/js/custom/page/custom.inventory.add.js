// JavaScript Document
var empty = "";
var pass = '1';
var nopass = '0';
$(document).ready(function () {





	$('button#decode_vin').click(function(){

		if(pass_vin_good == 0){ 
			
			alert('Sorry Not A Valid VIN Please Retry'); 
			return false;
		}

			
			 $('div#vehicle_first_part').show();

	});




	$("button#continue_add_vehicle").click(function(){
	
				
				
		var pass_vin_good = $('input#pass_vin_good').val();
		
		if(pass_vin_good == 0){ 
			
			alert('Sorry Not A Valid VIN Please Retry'); 
			return false;
		}
		
		$('div#vehicle_input_section').show();
		
		$('div#save_vehicle_lowerbar').show();

				
	
	});



	$('button#save_vehicle').click(function(){
											
			
			 addcartoinventory();

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
							
						   });

		
		
		
		
		
		
					$.post('ajax/vinten.php', {vvin: vvin, thisdid: thisdid  }, 
					   
					   function(result) {
						//$('div#vinYearResult').html(result).show();
						 //$('input#vin_year').val(result);
						console.log('VIN YEAR: '+result);
						 $("select#vyear").val(result);
						
					   });
					  
					  //dosomething();
					  
					  
					  
			   $.post('script_decodevinmake.php', {vvin: vvin},

			   function(result) {
				   $('select#vmake').val(result);
				   
					pullModelsFromMake();
				  //console.log(result);
				  
				});



				var vinModelResult = $('div#vinModelResult').html();	
				
				console.log('Model Is: '+vinModelResult);
				
			   $('select#vmodel').val(vinModelResult);


					  
					  
					  
					  
					  
					  
					
		}
	
	
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








}); //End of the document ready





// Pulling For models based on make
function pullModelsFromMake(){

		var slct_vmake = document.getElementById("vmake");
		var themake = slct_vmake.options[slct_vmake.selectedIndex].value;
		
		if(!themake){ return false; }
		
		var thisdid = document.getElementById('thisdid').value;

 $.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, function(result) {
 
	$('select#vmodel').html(result);

 });


	

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

		if(!vvin){ alert('SORRY! VIN IS MISSING'); return false;  }
		
		$('div#vehicle_input_section').show();

		var pass_vin_good = $('input#pass_vin_good').val();
		
		if(pass_vin_good == 0){ 
			
			alert('Sorry Not A Valid VIN Please Retry'); 
			return false;
		}


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

		var slct_vexterior_color = document.getElementById("vecolor_txt");
		var vexterior_color = slct_vexterior_color.options[slct_vexterior_color.selectedIndex].text;
		var vexterior_color_hex = slct_vexterior_color.options[slct_vexterior_color.selectedIndex].value;
		
		
		
		console.log(vexterior_color);
		
		var slct_vinterior_color = document.getElementById("vicolor_txt");
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

		var slct_vdoors = document.getElementById("vdoors");
		var vdoors = slct_vdoors.options[slct_vdoors.selectedIndex].value;
		
		
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
		
		//var vcomments = $("vcomments").val();
		var vcomments = $('textarea#vcomments').val();

		
		
		var vrprice = $('input#vrprice').val();
		console.log(vrprice);
		
		var vspecialprice = $('input#vspecialprice').val();
		console.log(vspecialprice);
		var vdprice = $('input#vdprice').val();
		console.log(vdprice);
		
		var vpurchasecost = $('input#vpurchasecost').val();
		console.log(vpurchasecost);
		
		var vdlrpack = $('input#vdlrpack').val();
		console.log(vdlrpack);
		var vaddedcost = $('input#vaddedcost').val();
		console.log(vaddedcost);


		var vehicle_mpg_city = $('input#vehicle_mpg_city').val();
		
		var vehicle_mpg_hwy = $('vehicle_mpg_hwy').val();





		// Exterior Options
		if ($('input#Alloy_Wheels').is(':checked')) {
			// if so, give value a 1 value for okay
			var Alloy_Wheels = 1;
		}else{
			var Alloy_Wheels = 0;
		}
		
		if ($('input#Bed_Liner').is(':checked')) {
			// if so, give value a 1 value for okay
			var Bed_Liner = 1;
		}else{
			var Bed_Liner = 0;
		}
		
		if ($('input#Illuminated_Lightning').is(':checked')) {
			// if so, give value a 1 value for okay
			var Illuminated_Lightning = 1;
		}else{
			var Illuminated_Lightning = 0;
		}
		
		if ($('input#Rear_Window_Defroster').is(':checked')) {
			// if so, give value a 1 value for okay
			var Rear_Window_Defroster = 1;
		}else{
			var Rear_Window_Defroster = 0;
		}
		
		if ($('input#Running_Boards').is(':checked')) {
			// if so, give value a 1 value for okay
			var Running_Boards = 1;
		}else{
			var Running_Boards = 0;
		}
		
		if ($('input#Sliding_Doors').is(':checked')) {
			// if so, give value a 1 value for okay
			var Sliding_Doors = 1;
		}else{
			var Sliding_Doors = 0;
		}
		
		if ($('input#Tinted_Glass').is(':checked')) {
			// if so, give value a 1 value for okay
			var Tinted_Glass = 1;
		}else{
			var Tinted_Glass = 0;
		}
		



		// Interior Check Options
		if ($('input#Air_Conditioning').is(':checked')) {
			// if so, give value a 1 value for okay
			var Air_Conditioning = 1;
		}else{
			var Air_Conditioning = 0;
		}
		
		if ($('input#Memory_Seats').is(':checked')) {
			// if so, give value a 1 value for okay
			var Memory_Seats = 1;
		}else{
			var Memory_Seats = 0;
		}
		
		if ($('input#Power_Mirrors').is(':checked')) {
			// if so, give value a 1 value for okay
			var Power_Mirrors = 1;
		}else{
			var Power_Mirrors = 0;
		}
		
		if ($('input#Power_Seats').is(':checked')) {
			// if so, give value a 1 value for okay
			var Power_Seats = 1;
		}else{
			var Power_Seats = 0;
		}
		
		if ($('input#Power_Door_Locks').is(':checked')) {
			// if so, give value a 1 value for okay
			var Power_Door_Locks = 1;
		}else{
			var Power_Door_Locks = 0;
		}
		
		if ($('input#Power_Steering').is(':checked')) {
			// if so, give value a 1 value for okay
			var Power_Steering = 1;
		}else{
			var Power_Steering = 0;
		}
		
		if ($('input#Power_Windows').is(':checked')) {
			// if so, give value a 1 value for okay
			var Power_Windows = 1;
		}else{
			var Power_Windows = 0;
		}
		







		// Safety & Security Check Options
		if ($('input#Passenger_Air_Bag').is(':checked')) {
			// if so, give value a 1 value for okay
			var Passenger_Air_Bag = 1;
		}else{
			var Passenger_Air_Bag = 0;
		}
		
		if ($('input#Side_Air_Bag').is(':checked')) {
			// if so, give value a 1 value for okay
			var Side_Air_Bag = 1;
		}else{
			var Side_Air_Bag = 0;
		}
		
		if ($('input#Keyless_Entry').is(':checked')) {
			// if so, give value a 1 value for okay
			var Keyless_Entry = 1;
		}else{
			var Keyless_Entry = 0;
		}
		
		if ($('input#Push_Button_Start').is(':checked')) {
			// if so, give value a 1 value for okay
			var Push_Button_Start = 1;
		}else{
			var Push_Button_Start = 0;
		}
		
		if ($('input#Theft_System').is(':checked')) {
			// if so, give value a 1 value for okay
			var Theft_System = 1;
		}else{
			var Theft_System = 0;
		}
		
		if ($('input#AntiLock_Brakes').is(':checked')) {
			// if so, give value a 1 value for okay
			var AntiLock_Brakes = 1;
		}else{
			var AntiLock_Brakes = 0;
		}
		
		













		// Comfort & Convenience Check Options
		if ($('input#Leather_Seats').is(':checked')) {
			// if so, give value a 1 value for okay
			var Leather_Seats = 1;
		}else{
			var Leather_Seats = 0;
		}

		if ($('input#Auto_Updown_Windows').is(':checked')) {
			// if so, give value a 1 value for okay
			var Auto_Updown_Windows = 1;
		}else{
			var Auto_Updown_Windows = 0;
		}
		
		if ($('input#Bluetooth_Handsfree').is(':checked')) {
			// if so, give value a 1 value for okay
			var Bluetooth_Handsfree = 1;
		}else{
			var Bluetooth_Handsfree = 0;
		}
		
		if ($('input#Climate_Control').is(':checked')) {
			// if so, give value a 1 value for okay
			var Climate_Control = 1;
		}else{
			var Climate_Control = 0;
		}
		
		if ($('input#Cruise_Control').is(':checked')) {
			// if so, give value a 1 value for okay
			var Cruise_Control = 1;
		}else{
			var Cruise_Control = 0;
		}
		
		if ($('input#Navigation_System').is(':checked')) {
			// if so, give value a 1 value for okay
			var Navigation_System = 1;
		}else{
			var Navigation_System = 0;
		}
		
		if ($('input#Rear_view_monitor').is(':checked')) {
			// if so, give value a 1 value for okay
			var Rear_view_monitor = 1;
		}else{
			var Rear_view_monitor = 0;
		}
		
		if ($('input#Rear_Ent_Center').is(':checked')) {
			// if so, give value a 1 value for okay
			var Rear_Ent_Center = 1;
		}else{
			var Rear_Ent_Center = 0;
		}
		
		if ($('input#Satellite_Radio').is(':checked')) {
			// if so, give value a 1 value for okay
			var Satellite_Radio = 1;
		}else{
			var Satellite_Radio = 0;
		}
		
		if ($('input#SunroofMoonroof').is(':checked')) {
			// if so, give value a 1 value for okay
			var SunroofMoonroof = 1;
		}else{
			var SunroofMoonroof = 0;
		}
		
		if ($('input#Television').is(':checked')) {
			// if so, give value a 1 value for okay
			var Television = 1;
		}else{
			var Television = 0;
		}
		
















		var v_warranty_one = $('input#v_warranty_one').val();
		var v_warranty_two = $('input#v_warranty_two').val();

		if ($('input#dlroption1chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroption1chck = 1;
		}else{
			var dlroption1chck = 0;
		}		
		var dlroption1 = $('input#dlroption1').val();


		if ($('input#dlroption2chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroption2chck = 1;
		}else{
			var dlroption2chck = 0;
		}		
		var dlroption2 = $('input#dlroption2').val();


		if ($('input#dlroption3chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroption3chck = 1;
		}else{
			var dlroption3chck = 0;
		}		
		var dlroption3 = $('input#dlroption3').val();



		if ($('input#dlroptequip1chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroptequip1chck = 1;
		}else{
			var dlroptequip1chck = 0;
		}		
		var dlroptequip1 = $('input#dlroptequip1').val();


		if ($('input#dlroptequip2chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroptequip2chck = 1;
		}else{
			var dlroptequip2chck = 0;
		}		
		var dlroptequip2 = $('input#dlroptequip2').val();

		if ($('input#dlroptequip3chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroptequip3chck = 1;
		}else{
			var dlroptequip3chck = 0;
		}		
		var dlroptequip3 = $('input#dlroptequip3').val();

		if ($('input#dlroptequip4chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroptequip4chck = 1;
		}else{
			var dlroptequip4chck = 0;
		}		
		var dlroptequip4 = $('input#dlroptequip4').val();

		if ($('input#dlroptequip5chck').is(':checked')) {
			// if so, give value a 1 value for okay
			var dlroptequip5chck = 1;
		}else{
			var dlroptequip5chck = 0;
		}		
		var dlroptequip5 = $('input#dlroptequip5').val();



















		
		var vinlength = $("input#vvin").val().length;

		if(vinlength != 17){
			alert("Vin Is Not 17 Digits INVALID!");
			//return false;
		}

		console.log('Length: '+vinlength);
		
		if(vin_make == 'Error' ||  vin_make == ''){
				alert('Vehchile Make Missing: '+vin_make);
				return false;
			
				$("input#vinMakepassornot").val(pass);
				return false;
		}

		if(vmodel == empty){
			alert('Vehicle Model Missing');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}
		
		if(vcondition == empty){
			alert('Vehicle Condition Missing');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		if(vexterior_color == empty){
			alert('Missing Exterior Color');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		if(vinterior_color == empty){
			alert('Missing Interior Color');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		if(vrprice == empty || vrprice == ' ' || vrprice == 0.00 || vrprice == 0){
			alert('Please Enter A Price');
			$("input#vinModelpassornot").val(nopass);
			//$('#addInventory_Modal').modal('show');
			return false;
		}

		//alert('About To Post');
		//return false;

		$.post('script_insertupdate.inventory.php', {
				token: token, 
				thisdid: thisdid, 
				vvin: vvin, 
				vmileage: vmileage, 
				vstockno: vstockno, 
				vmileage: vmileage, 
				vin_year: vin_year, 
				vin_make: vin_make, 
				vmodel: vmodel, 
				vtrim: vtrim, 
				vexterior_color: vexterior_color, 
				vexterior_color_hex: vexterior_color_hex, 
				vinterior_color: vinterior_color, 
				vinterior_color_hex: vinterior_color_hex, 
				vcylinders: vcylinders, 
				vfueltype: vfueltype, 
				vbody: vbody, 
				vtransm: vtransm, 
				vlivestatus: vlivestatus, 
				vcondition: vcondition, 
				vrprice: vrprice, 
				vspecialprice: vspecialprice, 
				vdprice: vdprice, 
				vpurchasecost: vpurchasecost, 
				vdlrpack: vdlrpack, 
				vaddedcost: vaddedcost, 
				vinlength: vinlength,
				Alloy_Wheels: Alloy_Wheels, 
				Bed_Liner: Bed_Liner, 
				Illuminated_Lightning: Illuminated_Lightning, 
				Rear_Window_Defroster: Rear_Window_Defroster, 
				Running_Boards: Running_Boards, 
				Sliding_Doors: Sliding_Doors, 
				Tinted_Glass: Tinted_Glass, 
				Air_Conditioning: Air_Conditioning, 
				Memory_Seats: Memory_Seats, 
				Power_Mirrors: Power_Mirrors, 
				Power_Seats: Power_Seats, 
				Power_Door_Locks: Power_Door_Locks, 
				Power_Steering: Power_Steering, 
				Power_Windows: Power_Windows, 
				Passenger_Air_Bag: Passenger_Air_Bag, 
				Side_Air_Bag: Side_Air_Bag, 
				Keyless_Entry: Keyless_Entry, 
				Push_Button_Start: Push_Button_Start, 
				Theft_System: Theft_System, 
				AntiLock_Brakes: AntiLock_Brakes, 
				Leather_Seats: Leather_Seats, 
				Auto_Updown_Windows: Auto_Updown_Windows, 
				Bluetooth_Handsfree: Bluetooth_Handsfree, 
				Climate_Control: Climate_Control, 
				Cruise_Control: Cruise_Control, 
				Navigation_System: Navigation_System,
				Rear_view_monitor: Rear_view_monitor, 
				Rear_Ent_Center: Rear_Ent_Center, 
				Satellite_Radio: Satellite_Radio, 
				SunroofMoonroof: SunroofMoonroof, 
				Television: Television,
				v_warranty_one: v_warranty_one,
				v_warranty_two: v_warranty_two,
				dlroption1chck: dlroption1chck,
				dlroption1: dlroption1,
				dlroption2chck: dlroption2chck,
				dlroption2: dlroption2,
				dlroption3chck: dlroption3chck,
				dlroption3: dlroption3,
				dlroptequip1chck: dlroptequip1chck,
				dlroptequip1: dlroptequip1,
				dlroptequip2chck: dlroptequip2chck,
				dlroptequip2: dlroptequip2,
				dlroptequip3chck: dlroptequip3chck,
				dlroptequip3: dlroptequip3,
				dlroptequip4chck: dlroptequip4chck,
				dlroptequip4: dlroptequip4,
				dlroptequip5chck: dlroptequip5chck,
				dlroptequip5: dlroptequip5

			   }, 
	   
	   function(result) {
		$('div#createVehicleResult').html(result).show();
		console.log(result);
		//passYesYearvin();
	   });
/*   
		window.location.replace("script_last_vehicle_added.php");
*/
		//alert('Finished Processing');



}






