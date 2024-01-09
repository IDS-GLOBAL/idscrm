// JavaScript Document
$(document).ready(function(){

	// Showing Trade Information If Checked Or Not
	if ( $('input#tradeYes').is(':checked') ) {

		$('div#showhide_tradeinfo').show();

	}else{

		$('div#showhide_tradeinfo').hide();
	
	}

	$('button#pull_inventory_view').click(function(){
	
	
		alert('Pulling Inventory View');
	
	
	});
	

	$('a#logup_leadappt').click(function(){
		
		var nickname_lead = $('span#nickname_lead').text();
		var cust_vehicle_id = $('input#cust_vehicle_id').val();
		var dlr_appt_lead_id = $('input#cust_leadid').val();
		
		$('input#dlr_appt_title').val(nickname_lead);
		
		$('input#dlr_appt_lead_id').val(dlr_appt_lead_id);
		$('input#dlr_appt_vid').val(cust_vehicle_id);
	});

	$('input#tradeYes').click(function(){

	
			if ( $('input#tradeYes').is(':checked') ) {
		
				$('div#showhide_tradeinfo').show();
		
			}else{
		
				$('div#showhide_tradeinfo').hide();
			
			}
	
	
	
	
	});
	// End Showing Trade Information If Checked Or Not


	if ($('input#cust_home_okgoogle').parent('.icheckbox_square-green').hasClass('checked')) {
        /* NOT SURE WHAT TO DO HERE */
		var cust_home_okgoogle = 'OK';
    
		$('div#map_seeornot').show();
	
	}else{
	
		var cust_home_okgoogle = 'NO';
		
		$('div#map_seeornot').hide();
		
	}









// Saving Lead
function save_thislead(){

		var cust_leadid = $('input#cust_leadid').val();
		var thisdid = $('input#thisdid').val();


		var slct_cust_salesperson_id = document.getElementById('cust_salesperson_id');
		var cust_salesperson_id = slct_cust_salesperson_id.options[slct_cust_salesperson_id.selectedIndex].value;
		var cust_salesperson_id_name = slct_cust_salesperson_id.options[slct_cust_salesperson_id.selectedIndex].text;

		var slct_cust_salesperson2_id = document.getElementById('cust_salesperson2_id');
		var cust_salesperson2_id = slct_cust_salesperson2_id.options[slct_cust_salesperson2_id.selectedIndex].value;
		var cust_salesperson2_id_name = slct_cust_salesperson2_id.options[slct_cust_salesperson2_id.selectedIndex].text;

		var slct_cust_bdc_id = document.getElementById('cust_bdc_id');
		var cust_bdc_id = slct_cust_bdc_id.options[slct_cust_bdc_id.selectedIndex].value;
		var cust_bdc_id_name = slct_cust_bdc_id.options[slct_cust_bdc_id.selectedIndex].text;


		var slct_cust_mgr_id = document.getElementById('cust_mgr_id');
		var cust_mgr_id = slct_cust_mgr_id.options[slct_cust_mgr_id.selectedIndex].value;
		var cust_mgr_id_name = slct_cust_mgr_id.options[slct_cust_mgr_id.selectedIndex].text;


		if( $('input#cust_close_status_0').parent('.icheckbox_square-green').hasClass( "checked" )){
			var cust_close_status_0 = 'contacted';
		}else{ var cust_close_status_0 = ''; }


		if( $('input#cust_close_status_1').parent('.icheckbox_square-green').hasClass( "checked" )){
			var cust_close_status_1 = 'storevisit';
		}else{ var cust_close_status_1 = ''; }

		if( $('input#cust_close_status_2').parent('.icheckbox_square-green').hasClass( "checked" )){
			var cust_close_status_2 = 'demo';
		}else{ var cust_close_status_2 = ''; }

		if( $('input#cust_close_status_3').parent('.icheckbox_square-green').hasClass( "checked" )){
			var cust_close_status_3 = 'writeup';
		}else{ var cust_close_status_3 = ''; }

		if( $('input#cust_close_status_4').parent('.icheckbox_square-green').hasClass( "checked" )){
			var cust_close_status_4 = 'fi';
		}else{ var cust_close_status_4 = ''; }



		var slct_cust_finance_type = document.getElementById('cust_finance_type');
		var cust_finance_type = slct_cust_finance_type.options[slct_cust_finance_type.selectedIndex].value;
		var cust_finance_type_name = slct_cust_finance_type.options[slct_cust_finance_type.selectedIndex].text;


		var slct_cust_lostcode = document.getElementById('cust_lostcode');
		var cust_lostcode = slct_cust_lostcode.options[slct_cust_lostcode.selectedIndex].value;
		var cust_lostcode_name = slct_cust_lostcode.options[slct_cust_lostcode.selectedIndex].text;

















		var slct_cust_titlename = document.getElementById('cust_titlename');
		var cust_titlename = slct_cust_titlename.options[slct_cust_titlename.selectedIndex].value;
		var cust_titlename_name = slct_cust_titlename.options[slct_cust_titlename.selectedIndex].text;

	
	var cust_fname = $('input#cust_fname').val();
	var cust_mname = $('input#cust_mname').val();
	var cust_lname = $('input#cust_lname').val();
	var cust_name_suffix = $('input#cust_name_suffix').val();
	
	var cust_nickname = $('input#cust_nickname').val();
	var cust_lead_source = $('input#cust_lead_source').val();

	
	if(document.getElementById('lead_sex_0').checked){
	 	 var cust_lead_sex = 'M';
	}else{
		
		if(document.getElementById('lead_sex_1').checked){ var cust_lead_sex = 'F';}else{ 	 var cust_lead_sex = ''; }
	
	}



		var slct_cust_close_range = document.getElementById('cust_close_range');
		var cust_close_range = slct_cust_close_range.options[slct_cust_close_range.selectedIndex].value;
		var cust_close_range_name = slct_cust_close_range.options[slct_cust_close_range.selectedIndex].text;


		var slct_cust_lead_temperature = document.getElementById('cust_lead_temperature');
		var cust_lead_temperature = slct_cust_lead_temperature.options[slct_cust_lead_temperature.selectedIndex].value;
		var cust_lead_temperature_name = slct_cust_lead_temperature.options[slct_cust_lead_temperature.selectedIndex].text;




	var cust_homephone = $('input#cust_homephone').val();
	var cust_mobilephone = $('input#cust_mobilephone').val();
	var cust_workphone = $('input#cust_workphone').val();
	var cust_email = $('input#cust_email').val();	
	
	var cust_home_address = $('input#cust_home_address').val();
	var cust_home_city = $('input#cust_home_city').val();


	var slct_cust_home_state = document.getElementById('cust_home_state');
	var cust_home_state = slct_cust_home_state.options[slct_cust_home_state.selectedIndex].value;
	var cust_home_state_name = slct_cust_home_state.options[slct_cust_home_state.selectedIndex].text;




	var cust_home_zip = $('input#cust_home_zip').val();
	var cust_home_county = $('input#cust_home_county').val();



	var cust_home_live_movindate = $('input#cust_home_live_movindate').val();

	var slct_cust_home_live_years = document.getElementById('cust_home_live_years');
	var cust_home_live_years = slct_cust_home_live_years.options[slct_cust_home_live_years.selectedIndex].value;
	var cust_home_live_years_name = slct_cust_home_live_years.options[slct_cust_home_live_years.selectedIndex].text;



	var slct_cust_home_live_months = document.getElementById('cust_home_live_months');
	var cust_home_live_months = slct_cust_home_live_months.options[slct_cust_home_live_months.selectedIndex].value;
	var cust_home_live_months_name = slct_cust_home_live_months.options[slct_cust_home_live_months.selectedIndex].text;

	


	if ($('input#cust_home_okgoogle').parent('.icheckbox_square-green').hasClass('checked')) {
        /* NOT SURE WHAT TO DO HERE */
		var cust_home_okgoogle = 'OK';
	
	}else{
	
		var cust_home_okgoogle = 'NO';		
		
	}


	var cust_home_latitude = $('input#geo_latitude').val();
	var cust_home_longitude = $('input#geo_longitude').val();


	var cust_employer_name = $('input#cust_employer_name').val();
	var cust_supervisors_name = $('input#cust_supervisors_name').val();
	var cust_supervisors_phone = $('input#cust_supervisors_phone').val();
	var cust_employer_addr = $('input#cust_employer_addr').val();
	var cust_employer_addr2 = $('input#cust_employer_addr2').val();
	var cust_employer_city = $('input#cust_employer_city').val();

	var slct_cust_employer_state = document.getElementById('cust_employer_state');
	var cust_employer_state = slct_cust_employer_state.options[slct_cust_employer_state.selectedIndex].value;
	var cust_employer_state_name = slct_cust_employer_state.options[slct_cust_employer_state.selectedIndex].text;


	var cust_employer_zip = $('input#cust_employer_zip').val();

	var cust_employer_phone = $('input#cust_employer_phone').val();
	var cust_employer_dateohire = $('input#cust_employer_dateohire').val();
	
	var slct_cust_employer_years = document.getElementById('cust_employer_years');
	var cust_employer_years = slct_cust_employer_years.options[slct_cust_employer_years.selectedIndex].value;
	var cust_employer_years_name = slct_cust_employer_years.options[slct_cust_employer_years.selectedIndex].text;


	var slct_cust_employer_months = document.getElementById('cust_employer_months');
	var cust_employer_months = slct_cust_employer_months.options[slct_cust_employer_months.selectedIndex].value;
	var cust_employer_months_name = slct_cust_employer_months.options[slct_cust_employer_months.selectedIndex].text;


	var cust_gross_income = $('input#cust_gross_income').val();


	var slct_cust_gross_income_frequency = document.getElementById('cust_gross_income_frequency');
	var cust_gross_income_frequency = slct_cust_gross_income_frequency.options[slct_cust_gross_income_frequency.selectedIndex].value;
	var cust_gross_income_frequency_name = slct_cust_gross_income_frequency.options[slct_cust_gross_income_frequency.selectedIndex].text;



	var cust_other_income = $('input#cust_other_income').val();
	var cust_other_income_amount = $('input#cust_other_income_amount').val();

	var slct_cust_gross_other_income_frequency = document.getElementById('cust_gross_other_income_frequency');
	var cust_gross_other_income_frequency = slct_cust_gross_other_income_frequency.options[slct_cust_gross_other_income_frequency.selectedIndex].value;
	var cust_gross_other_income_frequency_name = slct_cust_gross_other_income_frequency.options[slct_cust_gross_other_income_frequency.selectedIndex].text;


	var cust_downpayment = $('input#cust_downpayment').val();
	var cust_desiredpymt = $('input#cust_desiredpymt').val();
	var cust_vehicle_id = $('input#cust_vehicle_id').val();
	var cust_vstockno = $('input#cust_vstockno').val();
	var cust_vyear = $('input#cust_vyear').val();
	var cust_vmake = $('input#cust_vmake').val();
	var cust_vmodel = $('input#cust_vmodel').val();
	var cust_vtrim = $('input#cust_vtrim').val();
	var cust_vmiles = $('input#cust_vmiles').val();

	var slct_cust_vbody = document.getElementById('cust_vbody');
	var cust_vbody = slct_cust_vbody.options[slct_cust_vbody.selectedIndex].value;
	var cust_vbody_name = slct_cust_vbody.options[slct_cust_vbody.selectedIndex].text;


	
	var cust_vsellingprice = $('input#cust_vsellingprice').val();
	var counter_offer = $('input#counter_offer').val();
	var counter_offer2 = $('input#counter_offer2').val();

	// CheckBox If Trade is included or needs to be mentioned.

	if ( $('input#tradeYes').is(':checked') ) {

		var tradeYes = 'Y';
		console.log('Y');
	}else{

		var tradeYes = 'N';
		console.log('N');
	}





	var tradePayment = $('input#tradePayment').val();
	var tradePayoff = $('input#tradePayoff').val();
	var tradeVin = $('input#tradeVin').val();
	var tradeYear = $('input#tradeYear').val();
	var tradeMake = $('input#tradeMake').val();
	var tradeModel = $('input#tradeModel').val();
	var tradeTrim = $('input#tradeTrim').val();
	var tradeMiles = $('input#tradeMiles').val();
	
	//var lead_sex_female = $( "input#lead_sex_1:checked" ).val();
	
	console.log('cust_lead_sex:'+cust_lead_sex);

	console.log('saving lead: '+cust_leadid);
	
	
	
	
	
		$.post('script_mysales.update_lead.php', {
				cust_leadid: cust_leadid,
				thisdid: thisdid,
				cust_salesperson_id: cust_salesperson_id,
				cust_salesperson2_id: cust_salesperson2_id,
				cust_bdc_id: cust_bdc_id,
				cust_mgr_id: cust_mgr_id,
				cust_close_status_0: cust_close_status_0,
				cust_close_status_1: cust_close_status_1,
				cust_close_status_2: cust_close_status_2,
				cust_close_status_3: cust_close_status_3,
				cust_close_status_4: cust_close_status_4,
				cust_finance_type: cust_finance_type,
				cust_lostcode: cust_lostcode,
				cust_titlename: cust_titlename,
				cust_fname: cust_fname,
				cust_mname: cust_mname,
				cust_lname: cust_lname,
				cust_name_suffix: cust_name_suffix,
				cust_nickname: cust_nickname,
				cust_lead_source: cust_lead_source,
				cust_lead_sex: cust_lead_sex,
				cust_close_range: cust_close_range,
				cust_lead_temperature: cust_lead_temperature,
				cust_homephone: cust_homephone,
				cust_mobilephone: cust_mobilephone,
				cust_workphone: cust_workphone,
				cust_email: cust_email,
				cust_home_address: cust_home_address,
				cust_home_city: cust_home_city,
				cust_home_state: cust_home_state,
				cust_home_zip: cust_home_zip,
				cust_home_county: cust_home_county,
				cust_home_live_movindate: cust_home_live_movindate,
				cust_home_live_years: cust_home_live_years,
				cust_home_live_months: cust_home_live_months,
				cust_home_okgoogle: cust_home_okgoogle,
				cust_home_latitude: cust_home_latitude,
				cust_home_longitude: cust_home_longitude,
				cust_employer_name: cust_employer_name,
				cust_supervisors_name: cust_supervisors_name,
				cust_supervisors_phone: cust_supervisors_phone,
				cust_employer_addr: cust_employer_addr,
				cust_employer_addr2: cust_employer_addr2,
				cust_employer_city: cust_employer_city,
				cust_employer_state: cust_employer_state,
				cust_employer_zip: cust_employer_zip,
				cust_employer_phone: cust_employer_phone,
				cust_employer_dateohire: cust_employer_dateohire,
				cust_employer_years: cust_employer_years,
				cust_employer_months: cust_employer_months,
				cust_gross_income: cust_gross_income,
				cust_gross_income_frequency: cust_gross_income_frequency,
				cust_other_income: cust_other_income,
				cust_other_income_amount: cust_other_income_amount,
				cust_gross_other_income_frequency: cust_gross_other_income_frequency,
				cust_downpayment: cust_downpayment,
				cust_desiredpymt: cust_desiredpymt,
				cust_vehicle_id: cust_vehicle_id,
				cust_vstockno: cust_vstockno,
				cust_vyear: cust_vyear,
				cust_vmake: cust_vmake,
				cust_vmodel: cust_vmodel,
				cust_vtrim: cust_vtrim,
				cust_vmiles: cust_vmiles,
				cust_vbody: cust_vbody,
				cust_vsellingprice: cust_vsellingprice,
				counter_offer: counter_offer,
				counter_offer2: counter_offer2,
				tradeYes: tradeYes,
				tradePayment: tradePayment,
				tradePayoff: tradePayoff,
				tradeVin: tradeVin,
				tradeYear: tradeYear,
				tradeMake: tradeMake,
				tradeModel: tradeModel,
				tradeTrim: tradeTrim,
				tradeMiles: tradeMiles

				   }, function(data){
	 			console.log('Returning');
				
				console.log(data); 

			});
	
	
		 			console.log('Finish Processing Lead');
	
	
	
	
	
	
}

// Convert Lead To Customer
function convert_lead_to_customer(){

		var cust_leadid = $('input#cust_leadid').val();
		var cust_dealer_id = $('input#thisdid').val();
		var cust_vehicle_id = $('input#cust_vehicle_id').val();

		$.post('script_mysales.convert_lead_to_customer.php', {
			   cust_leadid: cust_leadid,
			   cust_dealer_id: cust_dealer_id,
			   cust_vehicle_id: cust_vehicle_id

				   }, function(data){
				   
				   
					   console.log(data)
				   
				   });

}

// Convert Lead To Customer
function convert_lead_to_credit_app(){

		var cust_leadid = $('input#cust_leadid').val();
		var cust_dealer_id = $('input#thisdid').val();
		var cust_vehicle_id = $('input#cust_vehicle_id').val();

		$.post('script_convert_lead_to_creditapp.php', {
			   cust_leadid: cust_leadid,
			   cust_dealer_id: cust_dealer_id,
			   cust_vehicle_id: cust_vehicle_id

				   }, function(data){
				   
				   
					   console.log(data)
				   
				   });

}


// Save Note
function save_leadnote(){

		var empty = '';

		var cust_leadid = $('input#cust_leadid').val();
 		var cust_bodynote = $('textarea#cust_bodynote').val();
 
		$.post('script_create_leadnote.php', {
			   cust_leadid: cust_leadid,
			   cust_bodynote: cust_bodynote

				   }, function(data){
	 			
				
				console.log(data);
			$('div#master_notes_layout').html(data);



			});


			$('textarea#cust_bodynote').val(empty);



}







		$('button#convert_to_customer').click(function(){
					
					console.log('Clicked Convert Lead To Credit App!');
		
					save_thislead();
					
					convert_lead_to_customer();					
					
		
		});


		$('button#convert_to_credit_app').click(function(){
					
					console.log('Clicked Convert To Customer!');
		
					save_thislead();
					
					convert_lead_to_credit_app();

					
		
		});




		$('button#save_lead').click(function(){
		console.log('Clicked Save This Lead!');
					save_thislead();
		
		});


		$('#save_notes').click(function(){
		
					save_leadnote();
		
		});



});