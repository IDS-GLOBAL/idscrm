// JavaScript Document
$(document).ready(function(){
						   
	
	
	
	

$('button#reprocess_vin').click( function(){
	processvin_field();

});



	$('input#vvin').on('change', function() {
		
		var vvin = $("input#vvin").val().replace(/,/g, '');
		var thisdid = $("input#thisdid").val().replace(/,/g, '');
		
		var length = $(this).val().length;
		
		//alert(length);
		
				if(length == 17){
				
							$.post('ajax/vinten.php', {vvin: vvin, thisdid: thisdid  }, 
							   
							   function(result) {
								$('div#vinYearResult').html(result).show();
								 $('input#vin_year').val(result);
						   			
									console.log(result);
									
							   });
							  
							  //dosomething();



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
			
			
			
				}else{
					alert('Vin Is Not 17 Digits');
					return false;

				}



		
		

	});






});

function processvin_field(){


		var vvin = $("input#vvin").val().replace(/,/g, '');
		var thisdid = $("input#thisdid").val().replace(/,/g, '');
		
		var length = $(this).val().length;
		
		//alert(length);
		
				if(length == 17){
				
							$.post('ajax/vinten.php', {vvin: vvin, thisdid: thisdid  }, 
							   
							   function(result) {
								$('div#vinYearResult').html(result).show();
								 $('input#vin_year').val(result);
						   			
									console.log(result);
									
							   });
							  
							  //dosomething();



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
			
			
			
				}else{
					
					alert('Vin Is Not 17 Digits');
					return false;
				}

		





}