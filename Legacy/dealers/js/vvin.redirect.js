// JavaScript Document
// Take Dealer To Edit This Vin
function thatVinwasAlreadyInDealerIDSCloud(){
		var token = $('input#token').val();
		var vvin = $("input#vvin").val();
		
		//
		alert('Vin Already In System Redirecting you to this vehicle in the system.');
		
		window.location.replace("script_findvehiclebyvin.php?vvin=" + vvin + "&token="+token);

}

// Take Dealer To Transfer Car From One Dealer To His By Vin
// Log Data Activity And Email Alert Admin And Both Dealer parties.
function transferVehicleBetweenDealers(){
		var vtoken = $('input#token').val();
		
		window.location.replace("transfer_vehicle.php?vtoken="+vtoken);

}
