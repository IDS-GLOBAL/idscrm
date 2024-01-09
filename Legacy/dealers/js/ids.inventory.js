// JavaScript Document
$("document").ready(function(){


	var empty ='';			
	var vstat = $('input#vstat').val();
	
	
	$('button#catchlivevids').click(function(){
		var vstat = $('input#vstat').val();
		if(vstat == "'1'"){alert('Sorry! You Are Viewing Live Inventory Already'); return false; }
		var vids = $('input#markTheseVehicles').val();
		//var vids = document.getElementById('markTheseVehicles').value;
		var markDid = $('input#thisdid').val();

		if ($.trim(vids) != ''){

		$.post('ajax/inventory_markLive.php', {markTheseVehicles: vids, markDid: markDid },
			   
			   function(result) {
				//$('#view_live_inventory').html(result).show();
				//$('#live_inventory').html(result).show();
				console.log('result: '+result);
			   });

   			var theStatusCount = 0;

			if(vstat == "'9'" || vstat == "'0'"){
		
				$("input#vehicle_do:checked" ).each(function() {
				theStatusCount++;
					var seehidden = $(this).parent().parent().hide();
					$(this).removeAttr('checked');
										
					
				//alert(seehidden);
				});
				
				$('input#markTheseVehicles').val(empty);
				docheckboxes();
				
		  	}
			
		$('#vehicleliveResults').html(' VIEW '+ theStatusCount + ' LIVE');
		
		}


		
			
	});
	

	$('button#catchholdvids').click(function(){
		var vstat = $('input#vstat').val();
		if(vstat == "'0'"){alert('Sorry! You Are Viewing Hold Inventory Already'); return false; }
		var vids = $('input#markTheseVehicles').val();
		//var vids = document.getElementById('markTheseVehicles').value;
		var markDid = $('input#thisdid').val();

		if ($.trim(vids) != ''){

		$.post('ajax/inventory_markHold.php', {markTheseVehicles: vids, markDid: markDid },
			   
			   function(result) {
				//$('#view_live_inventory').html(result).show();
				//$('#live_inventory').html(result).show();
			   });
			
			var theStatusCount = 0;
		
			if(vstat == "'1'" || vstat == "'9'"){
		
		
				$("input#vehicle_do:checked" ).each(function() {
				
				theStatusCount++;
				
				
					var seehidden = $(this).parent().parent().hide();
					$(this).removeAttr('checked');

				//alert(seehidden);
				});
				
				$('input#markTheseVehicles').val(empty);
				docheckboxes();
				
		  	}
		
		$('#vehicleholdResults').html(' VIEW '+ theStatusCount + ' HOLD');

		//alert('Finished Putting Vehicles On Hold');
		}
			
			
	});

	$('button#catchsoldvids').click(function(){
											 
		var vstat = $('input#vstat').val();
		if(vstat == "'9'"){alert('Sorry You Are Viewing Sold Inventory Already'); return false; }
		var vids = $('input#markTheseVehicles').val();
		//var vids = document.getElementById('markTheseVehicles').value;
		var markDid = $('input#thisdid').val();

		if ($.trim(vids) != ''){

		$.post('ajax/inventory_markSold.php', {markTheseVehicles: vids, markDid: markDid },
			   
			   function(result) {
				//$('#view_live_inventory').html(result).show();
				//$('#live_inventory').html(result).show();
				console.log(result);
			   });
			var theStatusCount = 0;
			if(vstat == "'1'" || vstat == "'0'"){
			 theStatusCount++;
				$("input#vehicle_do:checked" ).each(function() {
		
					var seehidden = $(this).parent().parent().hide();
					$(this).removeAttr('checked');
				});
		  	}
		$('input#markTheseVehicles').val(empty);
		docheckboxes();
		//alert('Finished Marking Vehicles Sold');
		}
		
		$('#vehiclesoldResults').html(' VIEW '+ theStatusCount + ' SOLD');
			
	});


																						  
	$('input#vehicle_do').click(function(){

		docheckboxes();

	});









	
});




function docheckboxes(){


			newno=0;

		$( "input#vehicle_do:checked" ).each(function() {

			newno++;
			if(newno == 1){
				var dovalue = $(this).val();
				var vids = $('input#markTheseVehicles').val();
					
					//alert(dovalue);
	
	
				var dovids = dovalue;
				$('input#markTheseVehicles').val(dovids);

			}else{
				var dovalue = $(this).val();
				var vids = $('input#markTheseVehicles').val();
					
					//alert(dovalue);
	
	
				var dovids = vids+', '+dovalue;
				$('input#markTheseVehicles').val(dovids);

			}
			
			

		});
	

}





