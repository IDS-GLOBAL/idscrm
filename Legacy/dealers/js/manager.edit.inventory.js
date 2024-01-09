// JavaScript Document


$(document).ready(function () {

	
	$('button#updatecar').click(function(){
			updatecarininventory();
	});


	$('a#updatecar').click(function(){
			updatecarininventory();
			
	});


	$('a#decodeVIN').click( function(){

		var vid = $("input#vid").val();
		var vstockno = $("input#vstockno").val();

		var vmileage = $("input#vmileage").val();
		var vvin = $("input#vvin").val();
		
	   $.post('script_decodevin.php', {vstockno: vstockno, vid: vid, vvin: vvin, vmileage: vmileage},

			   function(result) {
				   $('div#vehicleDecodeResult').html(result).show();
				   //console.log(result);
				   
				   //thankyou();
				});

	});		
		
	$('input#vrprice').change( function(){
		var vrprice = $('input#vrprice').val();
		var dp = (vrprice * 0.10).toFixed(2);


		$('input#vdprice').val(dp);

		var vrpriceupdate = (vrprice -0).toFixed(2);
		
	    $('input#vrprice').val(vrpriceupdate);
		
	});

	$('input#vspecialprice').change( function(){
		var vspecialprice = $('input#vspecialprice').val();
		var dp = (vspecialprice * 0.10).toFixed(2);


		$('input#vdprice').val(dp);

		var vrpriceupdate = (vspecialprice -0).toFixed(2);
		
	    $('input#vspecialprice').val(vrpriceupdate);
		
	});


	$('button#run_matrix').click( function(){
		var vrprice = $('input#vrprice').val();
		var vdprice = $('input#vdprice').val();
		var vspecialprice = $('input#vspecialprice').val();

		$('li#rtl_price_matrix').html(vrprice);
		
		$('li#spc_price_matrix').html(vdprice);
		
		$('li#dp_price_matrix').html(vspecialprice);
			
	});		


		

		


});

function thankyou(){
		var token = $('input#token').val();
		
		window.location.replace("thank-you.php?token="+token);

}

function updatecarininventory(){

		
		var vehicle_id = $('input#vehicle_id').val();
		
		var token = $('input#token').val();
		console.log(token);
		
		var thisdid = $("input#thisdid").val();
		console.log(thisdid);
		
		
		var vmileage = $("input#vmileage").val();
		console.log(vmileage);
		
		var vstockno = $("input#vstockno").val();
		console.log(vstockno);				

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
		
		var slct_vcylinders = document.getElementById("vcylinders");
		var vcylinders_txt = slct_vcylinders.options[slct_vcylinders.selectedIndex].text;
		var vcylinders = slct_vcylinders.options[slct_vcylinders.selectedIndex].value;
		console.log(vcylinders);

		var slct_vfueltype = document.getElementById("vfueltype");
		var vfueltype = slct_vfueltype.options[slct_vfueltype.selectedIndex].value;
		console.log(vfueltype);

		var slct_vtransm = document.getElementById("vtransm");
		var vtransm = slct_vtransm.options[slct_vtransm.selectedIndex].value;
		console.log(vtransm);		

		var slct_vlivestatus = document.getElementById("vlivestatus");
		var vlivestatus = slct_vlivestatus.options[slct_vlivestatus.selectedIndex].value;
		console.log('Vlive status: '+vlivestatus);
		
		var slct_vcondition = document.getElementById("vcondition");
		var vcondition = slct_vcondition.options[slct_vcondition.selectedIndex].value;
		console.log(vcondition);
		
		var vrprice = $('input#vrprice').val();
		console.log(vrprice);
		
		var vspecialprice = $('input#vspecialprice').val();
		console.log(vspecialprice);
		var vdprice = $('input#vdprice').val();
		console.log(vdprice);
		
		var vcomments = $('textarea#vcomments').val();
		
		
		
		var vpurchasecost = $('input#vpurchasecost').val();
		console.log(vpurchasecost);
		var vdlrpack = $('input#vdlrpack').val();
		console.log(vdlrpack);
		var vaddedcost = $('input#vaddedcost').val();
		console.log(vaddedcost);
		

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












		if(!vehicle_id){ return false; }


		//debugger;
		$.post('script_update.manager.inventory.php', {
		vehicle_id: vehicle_id, 
		thisdid: thisdid, 
		vmileage: vmileage, 
		vstockno: vstockno, 
		vbody: vbody, vmileage: vmileage, 
		vexterior_color: vexterior_color, 
		vexterior_color_hex: vexterior_color_hex, 
		vinterior_color: vinterior_color, 
		vinterior_color_hex: vinterior_color_hex, 
		vcylinders: vcylinders, 
		vfueltype: vfueltype, 
		vtransm: vtransm, 
		vlivestatus: vlivestatus, 
		vcondition: vcondition, 
		vrprice: vrprice, 
		vspecialprice: vspecialprice, 
		vdprice: vdprice, 
		vcomments: vcomments,
		vpurchasecost: vpurchasecost, 
		vdlrpack: vdlrpack, 
		vaddedcost: vaddedcost,
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
		//$('div#createVehicleResult').html(result).show();
		//passYesYearvin();
		console.log(result);
	   });

		//window.location.replace("script_last_vehicle_added.php");
		window.location.replace("manager.inventory.php?vstat=1");

		//alert('Finished Processing');

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
