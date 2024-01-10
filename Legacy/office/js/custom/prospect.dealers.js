// JavaScript Document
$(document).ready(function(){




function run_prospect_states(){


		var slct_prospect_states = document.getElementById("prospect_states");
		var prospect_states_label = slct_prospect_states.options[slct_prospect_states.selectedIndex].text;
		var prospect_states = slct_prospect_states.options[slct_prospect_states.selectedIndex].value;

		$.post('models/script_ajax_prospctdealer_city_ddresults.php', {
			   prospect_states: prospect_states
			   }, function(data){
				 console.log('script_ajax_prospctdealer_city_ddresults.php data: '+data);
				 $('select#prospect_cities').html(data);
				 
		});



}

function run_prospect_cities(){


		var slct_prospect_states = document.getElementById("prospect_states");
		var prospect_states_label = slct_prospect_states.options[slct_prospect_states.selectedIndex].text;
		var prospect_states = slct_prospect_states.options[slct_prospect_states.selectedIndex].value;
		
		var slct_prospect_cities = document.getElementById("prospect_cities");
		var prospect_cities_label = slct_prospect_states.options[slct_prospect_cities.selectedIndex].text;
		var prospect_cities = slct_prospect_cities.options[slct_prospect_cities.selectedIndex].value;
		


		$.post('models/script_ajax_prospctdealer_type_ddresults.php', {
			   prospect_states: prospect_states,
			   prospect_cities: prospect_cities
			   }, function(data){
				 console.log('script_ajax_prospctdealer_type_ddresults.php data: '+data);
				 $('select#prospect_dlrtypes').html(data);
				 
		});



}



$('select#prospect_states').on('change', function(){


		run_prospect_states();


});

$('select#prospect_cities').on('change', function(){


			run_prospect_cities()

/*
		var prospect_states = $("slect#prospect_states").val();
		var prospect_cities = $("slect#prospect_cities").val();


		$.post('script_ajax_prospctdealer_city_ddresults.php', {
			   prospect_states: prospect_states
			   }, function(data){
				 console.log('script_ajax_prospctdealer_city_ddresults.php data: '+data);
				 $('select#prospect_cities').html(data);
				 
		});
*/

});



$('button#pull_dealer_ajax_results').on('click', function(){



		var slct_prospect_states = document.getElementById("prospect_states");
		var prospect_states_label = slct_prospect_states.options[slct_prospect_states.selectedIndex].text;
		var prospect_states = slct_prospect_states.options[slct_prospect_states.selectedIndex].value;

		var slct_prospect_cities = document.getElementById("prospect_cities");
		var prospect_cities_label = slct_prospect_cities.options[slct_prospect_cities.selectedIndex].text;
		var prospect_cities = slct_prospect_cities.options[slct_prospect_cities.selectedIndex].value;

		var slct_prospect_dlrtypes = document.getElementById("prospect_dlrtypes");
		var prospect_dlrtypes_label = slct_prospect_dlrtypes.options[slct_prospect_dlrtypes.selectedIndex].text;
		var prospect_dlrtypes = slct_prospect_dlrtypes.options[slct_prospect_dlrtypes.selectedIndex].value;


		var slct_prospect_dlr_assigndtome = document.getElementById("prospect_dlr_assigndtome");
		var prospect_dlr_assigndtome_label = slct_prospect_dlr_assigndtome.options[slct_prospect_dlr_assigndtome.selectedIndex].text;
		var prospect_dlr_assigndtome = slct_prospect_dlr_assigndtome.options[slct_prospect_dlr_assigndtome.selectedIndex].value;





		$.post('models/script_ajax_dealer_prospect_results.php', {
			   prospect_states: prospect_states,
			   prospect_cities: prospect_cities,
			   prospect_dlrtypes: prospect_dlrtypes,
			   prospect_dlr_assigndtome: prospect_dlr_assigndtome
			   }, function(data){
				   
				   
				   $('div#prospect_dealer_table_results').html(data);
				   
				   $('div#pick_aprospectdlr_towork').show();
				   
				   
				   
				   $('button#toggle_dlrprospects').show();
				   
		});
});


		$('button#toggle_dlrprospects').on('click', function(){

			$('div#work_aprospect_instate').toggle();

			$('div#pick_aprospect_instate').toggle();
			$('div#pick_aprospectdlr_towork').toggle();
			
			
			$('div#sendtoregistered_que').toggle();

		
		});


		


	




});


