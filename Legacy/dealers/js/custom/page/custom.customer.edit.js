// JavaScript Document
$(document).ready(function(){



// Saving Lead
function save_thiscustomer(){

		var customer_id = $('input#customer_id').val();
		var thisdid = $('input#thisdid').val();


		var slct_customer_sales_person_id = document.getElementById('customer_sales_person_id');
		var customer_sales_person_id = slct_customer_sales_person_id.options[slct_customer_sales_person_id.selectedIndex].value;
		var customer_sales_person_id_name = slct_customer_sales_person_id.options[slct_customer_sales_person_id.selectedIndex].text;

		var slct_customer_sales_person2_id = document.getElementById('customer_sales_person2_id');
		var customer_sales_person2_id = slct_customer_sales_person2_id.options[slct_customer_sales_person2_id.selectedIndex].value;
		var customer_sales_person2_id_name = slct_customer_sales_person2_id.options[slct_customer_sales_person2_id.selectedIndex].text;

		var slct_customer_bdc_id = document.getElementById('customer_bdc_id');
		var customer_bdc_id = slct_customer_bdc_id.options[slct_customer_bdc_id.selectedIndex].value;
		var customer_bdc_id_name = slct_customer_bdc_id.options[slct_customer_bdc_id.selectedIndex].text;


		var slct_customer_fnimgr_id = document.getElementById('customer_fnimgr_id');
		var customer_fnimgr_id = slct_customer_fnimgr_id.options[slct_customer_fnimgr_id.selectedIndex].value;
		var customer_fnimgr_id_name = slct_customer_fnimgr_id.options[slct_customer_fnimgr_id.selectedIndex].text;

		var slct_customer_mgr_id = document.getElementById('customer_mgr_id');
		var customer_mgr_id = slct_customer_fnimgr_id.options[slct_customer_mgr_id.selectedIndex].value;
		var customer_mgr_id_name = slct_customer_mgr_id.options[slct_customer_fnimgr_id.selectedIndex].text;


		if( $('input#customer_status_sold').parent('.icheckbox_square-green').hasClass( "checked" )){
			var customer_status_sold = 'sold';
		}else{ var customer_status_sold = ''; }


		if( $('input#customer_status').parent('.icheckbox_square-green').hasClass( "checked" )){
			var customer_status = 'wishlist';
		}else{ var customer_status = ''; }

		if( $('input#customer_status_2').parent('.icheckbox_square-green').hasClass( "checked" )){
			var customer_status_2 = 'huntdown';
		}else{ var customer_status_2 = ''; }

		if( $('input#customer_status_3').parent('.icheckbox_square-green').hasClass( "checked" )){
			var customer_status_3 = 'lost';
		}else{ var customer_status_3 = ''; }

		if( $('input#customer_status_4').parent('.icheckbox_square-green').hasClass( "checked" )){
			var customer_status_4 = 'unwanted';
		}else{ var customer_status_4 = ''; }



		var slct_customer_finance_type = document.getElementById('customer_finance_type');
		var customer_finance_type = slct_customer_finance_type.options[slct_customer_finance_type.selectedIndex].value;
		var customer_finance_type_name = slct_customer_finance_type.options[slct_customer_finance_type.selectedIndex].text;


















		var slct_customer_title = document.getElementById('customer_title');
		var customer_title = slct_customer_title.options[slct_customer_title.selectedIndex].value;
		var customer_title_name = slct_customer_title.options[slct_customer_title.selectedIndex].text;

	
	var customer_fname = $('input#customer_fname').val();
	var customer_mname = $('input#customer_mname').val();
	var customer_lname = $('input#customer_lname').val();
	var customer_suffix = $('input#customer_suffix').val();
	
	var customer_nickname = $('input#customer_nickname').val();
	var customer_frmsource = $('input#customer_frmsource').val();

	
	if(document.getElementById('lead_sex_0').checked){
	 	 var customer_sex = 'M';
	}else{
		
		if(document.getElementById('lead_sex_1').checked){ var customer_sex = 'F';}else{ 	 var customer_sex = ''; }
	
	}



		var slct_customer_dayhunt = document.getElementById('customer_dayhunt');
		var cust_customer_dayhunt = slct_customer_dayhunt.options[slct_customer_dayhunt.selectedIndex].value;
		var cust_customer_dayhunt_name = slct_customer_dayhunt.options[slct_customer_dayhunt.selectedIndex].text;


		var slct_customer_lead_temperature = document.getElementById('customer_lead_temperature');
		var customer_lead_temperature = slct_customer_lead_temperature.options[slct_customer_lead_temperature.selectedIndex].value;
		var customer_lead_temperature_name = slct_customer_lead_temperature.options[slct_customer_lead_temperature.selectedIndex].text;




	var customer_phoneno = $('input#customer_phoneno').val();
	var customer_cellphone = $('input#customer_cellphone').val();
	var customer_work_phone = $('input#customer_work_phone').val();
	var customer_email = $('input#customer_email').val();	
	
	var customer_home_addr1 = $('input#customer_home_addr1').val();
	var customer_home_addr2 = $('input#customer_home_addr2').val();
	var customer_home_city = $('input#customer_home_city').val();


	var slct_customer_home_state = document.getElementById('customer_home_state');
	var customer_home_state = slct_customer_home_state.options[slct_customer_home_state.selectedIndex].value;
	var customer_home_state_name = slct_customer_home_state.options[slct_customer_home_state.selectedIndex].text;




	var customer_home_zip = $('input#customer_home_zip').val();
	var customer_home_county = $('input#customer_home_county').val();



	var customer_home_live_movindate = $('input#customer_home_live_movindate').val();

	var slct_customer_home_live_years = document.getElementById('customer_home_live_years');
	var customer_home_live_years = slct_customer_home_live_years.options[slct_customer_home_live_years.selectedIndex].value;
	var customer_home_live_years_name = slct_customer_home_live_years.options[slct_customer_home_live_years.selectedIndex].text;



	var slct_customer_home_live_months = document.getElementById('customer_home_live_months');
	var customer_home_live_months = slct_customer_home_live_months.options[slct_customer_home_live_months.selectedIndex].value;
	var customer_home_live_months_name = slct_customer_home_live_months.options[slct_customer_home_live_months.selectedIndex].text;

	


	if ($('input#customer_home_okgoogle').parent('.icheckbox_square-green').hasClass('checked')) {
        /* NOT SURE WHAT TO DO HERE */
		var customer_home_okgoogle = 'OK';
	
	}else{
	
		var customer_home_okgoogle = 'NO';		
		
	}


	var customer_home_geo_latitude = $('input#geo_latitude').val();
	var customer_home_geo_longitude = $('input#geo_longitude').val();


	var customer_employer_name = $('input#customer_employer_name').val();
	var customer_supervisors_name = $('input#customer_supervisors_name').val();
	var customer_supervisors_phone = $('input#customer_supervisors_phone').val();
	var customer_employer_addr = $('input#customer_employer_addr').val();
	var customer_employer_addr2 = $('input#customer_employer_addr2').val();
	var customer_employer_city = $('input#customer_employer_city').val();

	var slct_customer_employer_state = document.getElementById('customer_employer_state');
	var customer_employer_state = slct_customer_employer_state.options[slct_customer_employer_state.selectedIndex].value;
	var cust_customer_employer_state_name = slct_customer_employer_state.options[slct_customer_employer_state.selectedIndex].text;


	var customer_employer_zip = $('input#customer_employer_zip').val();

	var customer_employer_phone = $('input#customer_employer_phone').val();
	var customer_employer_hiredate = $('input#customer_employer_hiredate').val();
	
	var slct_customer_employer_years = document.getElementById('customer_employer_years');
	var customer_employer_years = slct_customer_employer_years.options[slct_customer_employer_years.selectedIndex].value;
	var customer_employer_years_name = slct_customer_employer_years.options[slct_customer_employer_years.selectedIndex].text;


	var slct_customer_employer_months = document.getElementById('customer_employer_months');
	var customer_employer_months = slct_customer_employer_months.options[slct_customer_employer_months.selectedIndex].value;
	var customer_employer_months_name = slct_customer_employer_months.options[slct_customer_employer_months.selectedIndex].text;


	var customer_gross_income = $('input#customer_gross_income').val();


	var slct_customer_dayhunt = document.getElementById('customer_dayhunt');
	var customer_dayhunt = slct_customer_dayhunt.options[slct_customer_dayhunt.selectedIndex].value;
	var customer_dayhunt_name = slct_customer_dayhunt.options[slct_customer_dayhunt.selectedIndex].text;



	var customer_income_other = $('input#customer_income_other').val();
	var customer_income_other_amount = $('input#customer_income_other_amount').val();

	var slct_customer_income_frequency = document.getElementById('customer_income_frequency');
	var customer_income_frequency = slct_customer_income_frequency.options[slct_customer_income_frequency.selectedIndex].value;
	var customer_income_frequency_name = slct_customer_income_frequency.options[slct_customer_income_frequency.selectedIndex].text;


	var customer_income_other = $('input#customer_income_other').val();
	var customer_income_other_amount = $('input#customer_income_other_amount').val();
	
	
	var slct_customer_income_other_frequency = document.getElementById('customer_income_other_frequency');
	var customer_income_other_frequency = slct_customer_income_other_frequency.options[slct_customer_income_other_frequency.selectedIndex].value;
	var customer_income_other_frequency_name = slct_customer_income_other_frequency.options[slct_customer_income_other_frequency.selectedIndex].text;
	
	
	var customer_vehicles_id = $('input#customer_vehicles_id').val();
	
	console.log('customer_sex:'+customer_sex);

	console.log('saving customer: '+customer_id);
	
	
	
		
/**/	
		$.post('script_update_customer.php', {
				customer_id: customer_id,
				thisdid: thisdid,
				customer_sales_person_id: customer_sales_person_id,
				customer_sales_person2_id: customer_sales_person2_id,
				customer_bdc_id: customer_bdc_id,
				customer_fnimgr_id: customer_fnimgr_id,
				customer_status: customer_status,
				customer_status_2: customer_status_2,
				customer_status_3: customer_status_3,
				customer_status_4: customer_status_4,
				customer_title: customer_title,
				customer_fname: customer_fname,
				customer_mname: customer_mname,
				customer_lname: customer_lname,
				customer_suffix: customer_suffix,
				customer_nickname: customer_nickname,
				customer_frmsource: customer_frmsource,
				customer_sex: customer_sex,
				customer_dayhunt: customer_dayhunt,
				customer_lead_temperature: customer_lead_temperature,
				customer_phoneno: customer_phoneno,
				customer_cellphone: customer_cellphone,
				customer_work_phone: customer_work_phone,
				customer_email: customer_email,
				customer_home_addr1: customer_home_addr1,
				customer_home_addr2: customer_home_addr2,
				customer_home_city: customer_home_city,
				customer_home_state: customer_home_state,
				customer_home_zip: customer_home_zip,
				customer_home_county: customer_home_county,
				customer_home_live_movindate: customer_home_live_movindate,
				customer_home_live_years: customer_home_live_years,
				customer_home_live_months: customer_home_live_months,
				customer_home_okgoogle: customer_home_okgoogle,
				customer_home_geo_latitude: customer_home_geo_latitude,
				customer_home_geo_longitude: customer_home_geo_longitude,
				customer_employer_name: customer_employer_name,
				customer_supervisors_name: customer_supervisors_name,
				customer_supervisors_phone: customer_supervisors_phone,
				customer_employer_addr: customer_employer_addr,
				customer_employer_addr2: customer_employer_addr2,
				customer_employer_city: customer_employer_city,
				customer_employer_state: customer_employer_state,
				customer_employer_zip: customer_employer_zip,
				customer_employer_phone: customer_employer_phone,
				customer_employer_hiredate: customer_employer_hiredate,
				customer_employer_years: customer_employer_years,
				customer_employer_months: customer_employer_months,
				customer_gross_income: customer_gross_income,
				customer_income_frequency: customer_income_frequency,
				customer_income_other: customer_income_other,
				customer_income_other_amount: customer_income_other_amount,
				customer_income_other_frequency: customer_income_other_frequency,
				customer_vehicles_id: customer_vehicles_id
				   }, function(data){
	 			
				
				console.log('Returning');
				
				console.log(data); 

			});
	
	
		 	console.log('Finish Processing Lead');
					
			window.location.replace('customer.view.php?customer_id='+customer_id);
	
	
	
	
	
}







	$('button#save_customer_info').click(function(){
	console.log('Clicked Save This Customer!');
				save_thiscustomer();
	
	});

	
	$('button#save_customer_notes').click(function(){
		console.log('Clicked Write This Customer Note!');												   
			save_customernote();
			
	});











});



// Save Note
function save_customernote(){

		var customer_id = $('input#customer_id').val();

		var slct_customer_sales_person_id = document.getElementById('customer_sales_person_id');
		var customer_sales_person_id = slct_customer_sales_person_id.options[slct_customer_sales_person_id.selectedIndex].value;
		var customer_sales_person_id_name = slct_customer_sales_person_id.options[slct_customer_sales_person_id.selectedIndex].text;

		var slct_customer_sales_person2_id = document.getElementById('customer_sales_person2_id');
		var customer_sales_person2_id = slct_customer_sales_person2_id.options[slct_customer_sales_person2_id.selectedIndex].value;
		var customer_sales_person2_id_name = slct_customer_sales_person2_id.options[slct_customer_sales_person2_id.selectedIndex].text;

 		var customer_bodynote = $('textarea#customer_bodynote').val();
 
		$.post('script_create_customernote.php', {
			   customer_id: customer_id,
			   customer_sales_person_id: customer_sales_person_id,
			   customer_sales_person2_id: customer_sales_person2_id,
			   customer_bodynote: customer_bodynote

				   }, function(data){
	 			
				
				console.log(data);
			var empty = '';
			$('textarea#customer_bodynote').val(empty);

			$('div#master_customer_notes_layout').html(data);



			});




}
