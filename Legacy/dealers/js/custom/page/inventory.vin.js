// JavaScript Document
$(document).ready(function(){
						   
						   
//		alert('Im Ready Yo');


	$('button#decode_vin').click(function(){
	
		var pass_vin_good = $('input#pass_vin_good').val();
		
		if(pass_vin_good == 0){ 
			
			alert('Sorry Not A Valid VIN'); 
			return false;
		}

		run_vin_year();
		run_vin_make();
		run_vin_model();
		run_vin_trim();
		console.log(pass_vin_good);
		//alert('Checking Vin');
		isthis_a_valid_vin();
		//run_fullvin_check();
		 get_vin_make();
		 get_vin_model();
		 do_quickmodel();
		 

	});

	$('input#vvin').on('change', function() {

			isthis_a_valid_vin();
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

		$('input#vvin').val(new_vin_itself);
			
		var vin_charcount =  new_vin_itself.length;
		
		var char_count_from17 = (17) - (vin_charcount -0);
		
		if(vin_charcount > 17){ var char_result = 'To Many'; console.log('Too Many'); }else{ var char_result = char_count_from17; }
		
		$('input#vin_char_count').val(vin_charcount);
		
		$('span#vin_charcount').html('+'+char_result);
	
	
	});
	
	
	
	$('a#process_vehicle_vin').on('click', function() {
		

		console.log('Processing And Building Vin Database');
		build_vin_make();
		build_vin_model();
		
		//create_new_vehicle();
		//transfer_vehicle();
		

		

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


	$("select#vmake").on('change', function (){
	//var slct_make = document.getElementById("vmake");
	//var themake = slct_make.options[slct_make.selectedIndex].value	
	//console.log(themake);
	
	var themake = $('div#vinMakeResult').html();
	
	var thisdid = document.getElementById('thisdid').value;
	
						$.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, 									   
									   function(result) {
										 
										$('select#vmodel').html(result);
										
									   });
	});	



	$("select#vmodel").on('change', function (){

	var slct_vmodel = document.getElementById("vmodel");
	var thevmodel = slct_vmodel.options[slct_vmodel.selectedIndex].value;

/*
	if(thevmodel == 'Other'){
		$('div#vinModelResult').hide();
		$('div#vinModelChoose').hide();
		//$('div#vinModelEnter').show();
	
	}else{

		$('div#vinModelChoose').hide();
		$('div#vinModelResult').show();
		$('div#vinModelResult').html(thevmodel);
		
		pull_trim();
		$('div#vinTrimEnter').hide();
		$('div#vinTrimChoose').show();

	}
*/	
	});


	$("select#vtrim").on('change', function (){

		var slct_vtrim = document.getElementById("vtrim");
		var thevtrim = slct_vtrim.options[slct_vtrim.selectedIndex].value;

		var slct_vmodel = document.getElementById("vmodel");
		var thevmodel = slct_vmodel.options[slct_vmodel.selectedIndex].value;

		var thisdid = document.getElementById('thisdid').value;
		
		var themake = $('div#vinMakeResult').html();
	
		$.post('ajax/pullmodels.php', {themake: themake, thisdid: thisdid }, 									   
					   function(result) {
						 
						$('select#vmodel').html(result);
						
					   });


		if(thevtrim == 'Other'){
			$('div#vinTrimEnter').show();
			$('div#vinTrimChoose').hide();
		
		}

	
	});


		$('input#vtrim_entered').bind('change keyup', function(){
			var vtrim_entered = $('input#vtrim_entered').val();
			$('div#vinTrimResult').html(vtrim_entered);
		});




});


function isthis_a_valid_vin(){


		var vin_itself = $('input#vvin').val();
		
		
		var new_vin_itself = vin_itself.replace('i', '');
		var new_vin_itself = new_vin_itself.replace('I', '');
		var new_vin_itself = new_vin_itself.replace('o', '');
		var new_vin_itself = new_vin_itself.replace('O', '');
		var new_vin_itself = new_vin_itself.replace('q', '');
		var new_vin_itself = new_vin_itself.replace('Q', '');

		$('input#vvin').val(new_vin_itself);
		
		var vvin = $('input#vvin').val();
		
		var vvin_length = vvin.length;
				
		var char_result = $('input#vin_char_count').val(vvin_length);


		//console.log('vvin: '+vvin);



		if(vvin_length == 17){
			
			//console.log('Using Last Six of VIN'+vin_vvin.slice(11, 17));
			$.post('ajax/check_vin.php', {vvin: vvin}, function(data){
			
			
				//console.log(data);
				$('span#vin_go_to').html(data);
			
			});
			
		}else{ 
			
			alert('Sorry This Vin Is Not 17 Characters.'); 
			
			return false;
		
		
		}




}

function pull_models_fordropdown(){
	console.log('Pulling Models For Drop Down');
	
				var themake = $('div#vinMakeResult').html();
				console.log('The Make For Drop Downs'+themake);
				
				if(themake == 'Make' || themake == 'Error'){
					
				}else{
				$.post('ajax/pullmodels.php', {themake: themake },
					   function(result) {
								
								console.log('Model Result: '+result);
								$('select#vmodel').html(result);
					});

				}

}

function run_vin_year(){

				var vvin = $("input#vvin").val();
				$.post('ajax/pull_vin_year.php', {vvin: vvin },
				   function(result) {
						
						//console.log(result);
						
						$('div#vinYearResult').html(result);
						
				   });
}

function run_vin_make(){
				
				var themake = $('div#vinMakeResult').html();
				var thisdid = $('input#thisdid').val();
				var vvin = $("input#vvin").val();
				
				$.post('ajax/pull_vin_make.php', {vvin: vvin },
				   function(result) {
						
						console.log(result);
						$('div#vinMakeResult').html(result)
						
						if(result=='Error'){
						$('div#vinMakeChoose').show();
						$('div#vinMakeResult').hide();
						}
				   });
									

}

function run_vin_model(){

				var vvin = $("input#vvin").val();
				
				var vinModelResult = $('div#vinModelResult').html();
				
				if(vinModelResult == 'Model'){

					$.post('ajax/pull_vin_model.php', {vvin: vvin },
					   function(result) {
						   
						   console.log(result);
						   
						$('div#vinModelResult').html(result);
						
							if(result == 'Error'){
							pull_models_fordropdown();
							
							$('div#vinModelResult').hide();
							$('div#vinModelChoose').show();
							
							}else{
							
			   					$('select#vmodel').val(result);

							
							}
						
					});
				}

}

function run_vin_trim(){

				var vvin = $("input#vvin").val();
				
				var vinTrimResult = $('div#vinTrimResult').html();
				
				if(vinTrimResult  == 'Trim'){
				
				 $.post('ajax/pull_vin_trim.php', {vvin: vvin },
				   function(result) {
						
						console.log(result);

						$('div#vinTrimResult').html(result);
						if(result == 'Error'){
							pull_trim();
							$('div#vinTrimChoose').show();
							$('div#vinTrimResult').hide();
						}

						
				   });

				}

}









function pull_trim(){


var vyear = $('div#vinYearResult').html();
var vmake = $('div#vinMakeResult').html();
var vmodel = $('div#vinModelResult').html();


			$.post('ajax/pulltrims.php', {vyear: vyear, vmake: vmake, vmodel: vmodel },
				   function(result) {
					 
					
					
					$('select#vtrim').html(result);
					
				   
				   
				   
				   
				   });



}

function run_fullvin_check(){


		var vvin = $("input#vvin").val().replace(/,/g, '');
		var thisdid = $("input#thisdid").val().replace(/,/g, '');
		
		var length =  vvin.length;
		
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
			});


			$.post('script_decodevinmake.php', {vvin: vvin},
	
				   function(result) {
					   $('input#vin_make').val(result);
					   $('div#vinMakeResult').html(result);
					   console.log(result);
	
			});


			$.post('script_decodevinmodel.php', {vvin: vvin},
	
				   function(result) {
					   console.log(result);



				var myString = result;
				var arr = myString.split(':');
				var themodel = arr[0];
				var thetrim = arr[1];



					   $('input#vin_model').val(themodel);
					   $('div#vinModelResult').html(themodel);
					   
					   if(!thetrim){
						console.log('The Trim Didnt Come Get To Choose'+result);

						$('div#vinTrimResult').hide();
						$('div#vinTrimChoose').show();
						
					   pull_trim();
					   }
			});

			
			
				}else{
					alert('Vin Is Not 17 Digits');
					return false;

				}


}

function create_select_field(){


}



function build_vin_make(){
		var vvin = $("input#vvin").val();
		var did = $('input#thisdid').val();
		var vin_code_make = $('input#vin_code_make').val();
		
	   	var vmake = $('div#vinMakeResult').html();
	   	var vmodel = $('div#vinModelResult').html();

		$.post('ajax/build_vin_make_code.php', {vvin: vvin, vmake: vmake, vmodel: vmodel, vin_code_make: vin_code_make}, function(data){
				console.log(data);
		});
}

function build_vin_model(){
	
				var vvin = $("input#vvin").val();
				var did = $('input#thisdid').val();
				var model_code = $('input#vin_code_model').val();
				
		
				var vmake = $('div#vinMakeResult').html();
				var vyear = $('div#vinYearResult').html();
				var vmodel = $('div#vinModelResult').html();
				var vin_vin_valid = $('input#pass_vin_good').val();
				var vtrim = $('div#vinTrimResult').html();

				
				$.post('ajax/build_vin_model_code.php', {vvin: vvin, vyear: vyear, vmake: vmake, vmodel: vmodel, vtrim: vtrim, model_code: model_code, did: did, vin_vin_valid: vin_vin_valid}, function(data){
			
			console.log(data);																													
																																														
		});
}


function get_vin_make(){
		
		var vvin = $("input#vvin").val();
		
		$.post('ajax/get_vin_make_code.php', {vvin: vvin}, function(data){
			$('input#vin_code_make').val(data);
		});
}

function get_vin_model(){
		
		var vvin = $("input#vvin").val();
				
		$.post('ajax/get_vin_model_code.php', {vvin: vvin}, function(data){
			$('input#vin_code_model').val(data);
		});
}

function get_vin_last_six(){
				var vvin = $("input#vvin").val();
		$.post('ajax/get_vin_last_six.php', {vvin: vvin}, function(data){
			var vin_last_six = $("input#vin_last_six").val(data);
		});


}

function do_quickmodel(){
	var vmodel = $('div#vinModelResult').html();
	//console.log('this vmodel: '+vmodel);
	$('select#vmodel').val(vmodel);
}