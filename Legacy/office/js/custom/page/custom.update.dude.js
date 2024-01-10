$(document).ready(function(){



		$('button#create_newdude').on('click', function(){
					create_newdude();
		});


		$('.qkdudesave').on('click', function(){
					create_newdude();
		});



	
	$('select#ddudes_dma_id').on('change', function(){


			var slct_dma_state = document.getElementById("ddudes_dma_id");
			var dma_state = slct_dma_state.options[slct_dma_state.selectedIndex].value;

			//$('select#ddudes_market_id').removeAttr('disabled');


			$.post('script_pull_availablemarkets.php', {dma_state: dma_state}, function(data){
						
						$('select#ddudes_market_id').html(data);
			
			});
			
			
			
	});
	





function create_newdude(){
	
	
	
				var posteddudes_id = $('input#posteddudes_id').val();

		    var ddudes_secret_token =  $('input#ddudes_secret_token').val();
			console.log('ddudes_secret_token'+ddudes_secret_token);
			var ddudes_username = $('input#ddudes_username').val();


	var ddudes_email_personal = $('input#ddudes_email_personal').val();
	
	var ddudes_email_internal = $('input#ddudes_email_internal').val();
	
	var ddudes_cellphone = $('input#dddudes_cellphone').val();
	
	var ddudes_password = $('input#ddudes_password').val();


		// Check Box Options
		
		if ($('input#okay_tosenddudereg').is(':checked')) {
			// if so, give value a 1 value for okay
			var okay_tosenddudereg = 'Y';
		}else{
			var okay_tosenddudereg = 'N';
		}
		console.log('okay_tosenddudereg: '+okay_tosenddudereg);

		if ($('input#ddudes_email_internal_verified').is(':checked')) {
			// if so, give value a 1 value for okay
			var ddudes_email_internal_verified = 'Y';
		}else{
			var ddudes_email_internal_verified = 'N';
		}
		console.log('dudes_email_internal_verified: '+ddudes_email_internal_verified);
		if ($('input#ddudes_email_internal_active').is(':checked')) {
			// if so, give value a 1 value for okay
			var ddudes_email_internal_active = 'Y';
		}else{
			var ddudes_email_internal_active = 'N';
		}
		console.log('dudes_email_internal_active: '+ddudes_email_internal_active);

	



  var slct_ddudes_team_id = document.getElementById("ddudes_team_id");
  var ddudes_team_name = slct_ddudes_team_id.options[slct_ddudes_team_id.selectedIndex].text;
  var ddudes_team_id = slct_ddudes_team_id.options[slct_ddudes_team_id.selectedIndex].value;

var ddudes_taxexempt = 'N';

	var ddudes_team_id_text = document.getElementById("ddudes_team_id").text;
	var ddudes_team_id = document.getElementById("ddudes_team_id").value;


var ddudes_hourlyrate  = $('input#ddudes_hourlyrate').val();
var ddudes_fed_deductions = $('input#ddudes_fed_deductions').val();
var ddudes_state_deductions = $('input#ddudes_state_deductions').val();


	console.log('ddudes_taxexempt:'+ ddudes_taxexempt);



  var slct_ddudes_status = document.getElementById("ddudes_status");
  var ddudes_status_text = slct_ddudes_status.options[slct_ddudes_status.selectedIndex].text;
  var ddudes_status = slct_ddudes_status.options[slct_ddudes_status.selectedIndex].value;

	console.log('ddudes_status_text: '+ddudes_status_text);
	

  var slct_ddudes_jobposition_title = document.getElementById("ddudes_jobposition_title");
  var ddudes_jobposition_title_text = slct_ddudes_jobposition_title.options[slct_ddudes_jobposition_title.selectedIndex].text;
  var ddudes_jobposition_title_id = slct_ddudes_jobposition_title.options[slct_ddudes_jobposition_title.selectedIndex].value;



	console.log('ddudes_jobposition_title_text: '+ddudes_jobposition_title_text);


	var ddudes_firstname = $('input#ddudes_firstname').val();

	var ddudes_midname = $('input#ddudes_midname').val();

	var ddudes_lname = $('input#ddudes_lname').val();
	
	var ddudes_suffix = $('input#ddudes_suffix').val();
	
	var ddudes_ssn = $('input#ddudes_ssn').val();
	
	var ddudes_dob = $('input#ddudes_dob').val();

	var ddudes_access_level_text = document.getElementById("ddudes_access_level").text;
	var ddudes_access_level = document.getElementById("ddudes_access_level").value;


	// Try this http://stackoverflow.com/questions/2175737/how-to-get-label-of-select-option-with-jquery
	// $('select option:selected').text();

	var slct_ddudes_jobposition_shift = document.getElementById("ddudes_jobposition_shift");
	var ddudes_jobposition_shift = slct_ddudes_jobposition_shift.options[slct_ddudes_jobposition_shift.selectedIndex].text;
	var ddudes_jobposition_shift_id = slct_ddudes_jobposition_shift.options[slct_ddudes_jobposition_shift.selectedIndex].value;


	console.log('ddudes_jobposition_shift: '+ddudes_jobposition_shift_id);

	var ddudes_department_id_text = document.getElementById("ddudes_department_id").text;
	var ddudes_department_id = document.getElementById("ddudes_department_id").value;

	console.log('ddudes_department_id: '+ddudes_department_id);


	var slct_ddudes_region_id = document.getElementById("ddudes_region_id");
	var ddudes_region_name = slct_ddudes_region_id.options[slct_ddudes_region_id.selectedIndex].text;
	var ddudes_region_id = slct_ddudes_region_id.options[slct_ddudes_region_id.selectedIndex].value;



	console.log('ddudes_region_id: '+ddudes_region_id);

	var ddudes_dma_id_text = document.getElementById("ddudes_dma_id").text;
	var ddudes_dma_id = document.getElementById("ddudes_dma_id").value;
	console.log('ddudes_dma_id: '+ddudes_dma_id);



  var slct_ddudes_market_id = document.getElementById("ddudes_market_id");
  var ddudes_market_id_text = slct_ddudes_market_id.options[slct_ddudes_market_id.selectedIndex].text;
  var ddudes_market_id = slct_ddudes_market_id.options[slct_ddudes_market_id.selectedIndex].value;



	console.log('ddudes_market_id: '+ddudes_market_id);
	


  var slct_ddudes_submarket_id = document.getElementById("ddudes_submarket_id");
  var ddudes_submarket_id_text = slct_ddudes_submarket_id.options[slct_ddudes_submarket_id.selectedIndex].text;
  var ddudes_submarket_id = slct_ddudes_submarket_id.options[slct_ddudes_submarket_id.selectedIndex].value;



	console.log('ddudes_submarket_id: '+ddudes_submarket_id);

	var ddudes_salespitch_template_id_text = document.getElementById("ddudes_salespitch_template_id").text;
	var ddudes_salespitch_template_id = document.getElementById("ddudes_salespitch_template_id").value;


	console.log('ddudes_salespitch_template_id: '+ddudes_salespitch_template_id);


	var ddudes_workphone_active_text = document.getElementById("ddudes_workphone_active").text;
	var ddudes_workphone_active = document.getElementById("ddudes_workphone_active").value;

	console.log('ddudes_workphone_active: '+ddudes_workphone_active);

	var ddudes_workphone_prfx = $('input#ddudes_workphone_prfx').val();
	var ddudes_workphone_no = $('input#ddudes_workphone_no').val();

	console.log('ddudes_workphone_no: '+ddudes_workphone_no);

	var ddudes_workphone_type_text = document.getElementById("ddudes_workphone_type").text;
	var ddudes_workphone_type = document.getElementById("ddudes_workphone_type").value;


	console.log('ddudes_workphone_type: '+ddudes_workphone_type);

	var ddudes_workphone_ext = $('input#ddudes_workphone_ext').val();
	var ddudes_workphone_companyown = $('input#ddudes_workphone_companyown').val();
	var ddudes_workphone_contractorown = $('input#ddudes_workphone_contractorown').val();
	var ddudes_workphone_brand = $('input#ddudes_workphone_brand').val();
	
	var ddudes_workphone_mac_address = $('input#ddudes_workphone_mac_address').val();
	var ddudes_workphone_mac_address_ip = $('input#ddudes_workphone_mac_address_ip').val();




	var slct_ddudes_workphone_router_brand_id = document.getElementById("ddudes_workphone_router_brand_id");
	var ddudes_workphone_router_brand = slct_ddudes_workphone_router_brand_id.options[slct_ddudes_workphone_router_brand_id.selectedIndex].text;
	var ddudes_workphone_router_brand_id = slct_ddudes_workphone_router_brand_id.options[slct_ddudes_workphone_router_brand_id.selectedIndex].value;

	
	console.log('ddudes_workphone_router_brand: '+ ddudes_workphone_router_brand);

	console.log('ddudes_workphone_router_brand_id: '+ ddudes_workphone_router_brand_id);
	
	var ddudes_workphone_router_serialno = $('input#ddudes_workphone_router_serialno').val();
	var ddudes_workphone_router_modelno = $('input#ddudes_workphone_router_modelno').val();
	var ddudes_workphone_date_shipped = $('input#ddudes_workphone_date_shipped').val();
	var ddudes_workphone_date_received = $('input#ddudes_workphone_date_received').val();
	var ddudes_workphone_purchase_cost = $('input#ddudes_workphone_purchase_cost').val();
	var ddudes_workphone_purchase_date = $('input#ddudes_workphone_purchase_date').val();
	var ddudes_workphone2_prfx = $('input#ddudes_workphone2_prfx').val();


	var ddudes_workphone2_type_label = document.getElementById("ddudes_workphone2_type").text;
	var ddudes_workphone2_type = document.getElementById("ddudes_workphone2_type").value;
	

	console.log('ddudes_workphone2_type: '+ddudes_workphone2_type);
	
	//if(dudes_workphone2_type_label == 'Select Type'){ var dudes_workphone2_type_label = ''; }

	var ddudes_workphone2_ext = $('input#ddudes_workphone2_ext').val();
	var ddudes_workaddr1 = $('input#ddudes_workaddr1').val();
	var ddudes_workaddr2 = $('input#ddudes_workaddr2').val();
	var ddudes_workaddr_city = $('input#ddudes_workaddr_city').val();
	var ddudes_workaddr_state = $('input#ddudes_workaddr_state').val();
	var ddudes_workaddr_zip = $('input#ddudes_workaddr_zip').val();
	var ddudes_workaddr_zip4 = $('input#ddudes_workaddr_zip4').val();
	var ddudes_workaddr_county = $('input#ddudes_workaddr_county').val();
	var ddudes_workaddr_country = $('input#ddudes_workaddr_country').val();
	
	var ddudes_homephone_no = $('input#ddudes_homephone_no').val();
	var ddudes_home_addr = $('input#ddudes_home_addr').val();
	var ddudes_home_addr2 = $('input#ddudes_home_addr2').val();
	

	var slct_ddudes_home_state = document.getElementById("ddudes_home_state");
	var ddudes_home_state_label = document.getElementById("ddudes_home_state").text;
	var ddudes_home_state = document.getElementById("ddudes_home_state").value;

	console.log('ddudes_home_state: '+ddudes_home_state);

	var ddudes_home_city = $('input#ddudes_home_city').val();
	var ddudes_home_zipcode = $('input#ddudes_home_zipcode').val();
	

	var ddudes_Timezone_label = document.getElementById("ddudes_Timezone").text;
	var ddudes_Timezone = document.getElementById("ddudes_Timezone").value;

	console.log('ddudes_Timezone: '+ddudes_Timezone);

	
	var ddudes_workstation_group_id = $('input#ddudes_workstation_group_id').val();
	var ddudes_workstation_id = $('input#ddudes_workstation_id').val();
	console.log('ddudes_workstation_id: '+ddudes_workstation_id);

	var ddudes_goal_weeklypresentations = $('input#ddudes_goal_weeklypresentations').val();
	var ddudes_goal_monthlypresentations = $('input#ddudes_goal_monthlypresentations').val();
	console.log('ddudes_goal_monthlypresentations: '+ddudes_goal_monthlypresentations);

	var ddudes_goal_deals_monthly = $('input#ddudes_goal_deals_monthly').val();
	var ddudes_goal_retaindlrs_monthly = $('input#ddudes_goal_retaindlrs_monthly').val();
	var ddudes_goal_newdlrs_monthly = $('input#ddudes_goal_newdlrs_monthly').val();
	console.log('ddudes_goal_newdlrs_monthly: '+ddudes_goal_newdlrs_monthly);

	var ddudes_goal_mnthly_commission = $('input#ddudes_goal_mnthly_commission').val();
	var ddudes_goal_daily_commission = $('input#ddudes_goal_daily_commission').val();
	console.log('ddudes_goal_residual_commission: '+ddudes_goal_daily_commission);

	var ddudes_goal_yearly_commission = $('input#ddudes_goal_yearly_commission').val();
	var ddudes_goal_residual_commission = $('input#ddudes_goal_residual_commission').val();
	
	console.log('ddudes_goal_residual_commission: '+ddudes_goal_residual_commission);
	
	
	var ddudes_goal_addnewcars_tosystm = $('input#ddudes_goal_addnewcars_tosystm').val();
	var ddudes_goal_vehicle_photos = $('input#ddudes_goal_vehicle_photos').val();
	console.log('ddudes_goal_vehicle_photos: '+ddudes_goal_vehicle_photos);
	
	
	
	var ddudes_goal_vehicle_windowstickers = $('input#ddudes_goal_vehicle_windowstickers').val();
	var ddudes_goal_new_websites = $('input#ddudes_goal_new_websites').val();
	var ddudes_goal_retain_outsideadagencys = $('input#ddudes_goal_retain_outsideadagencys').val();
	var ddudes_goal_new_outsideadagencys = $('input#ddudes_goal_new_outsideadagencys').val();
	
	var ddudes_professional_motto = $('input#ddudes_professional_motto').val();
	var ddudes_dudes_aboutme_toteam = $('input#ddudes_dudes_aboutme_toteam').val();
	console.log('ddudes_dudes_aboutme_toteam: '+ddudes_dudes_aboutme_toteam);
	
	
	var ddudes_dudes_aboutme_todealers = $('input#ddudes_dudes_aboutme_todealers').val();
	var ddudes_dudes_aboutme_tocompany = $('input#ddudes_dudes_aboutme_tocompany').val();
	console.log('ddudes_dudes_aboutme_tocompany: '+ddudes_dudes_aboutme_tocompany);
	var internal_comments_super_admin = $('input#internal_comments_super_admin').val();
	console.log('internal_comments_super_admin: '+internal_comments_super_admin);
	
	console.log('Posting');
	
	
	$.post('script_update_newdude.php', {
		    posteddudes_id: posteddudes_id,
		    ddudes_secret_token: ddudes_secret_token,
			ddudes_taxexempt: ddudes_taxexempt,
			ddudes_status: ddudes_status,
			ddudes_email_personal: ddudes_email_personal,
			ddudes_email_internal: ddudes_email_internal,
			dokay_tosenddudereg: okay_tosenddudereg,
			ddudes_email_internal_verified: ddudes_email_internal_verified,
			ddudes_email_internal_active: ddudes_email_internal_active,
			ddudes_cellphone: ddudes_cellphone,
			ddudes_password: ddudes_password,
			ddudes_username: ddudes_username,
			ddudes_hourlyrate: ddudes_hourlyrate,
			ddudes_fed_deductions: ddudes_fed_deductions,
			ddudes_state_deductions: ddudes_state_deductions,
			ddudes_jobposition_title_id: ddudes_jobposition_title_id,
			ddudes_jobposition_title_text: ddudes_jobposition_title_text,
			ddudes_firstname: ddudes_firstname,
			ddudes_midname: ddudes_midname,
			ddudes_lname: ddudes_lname,
			ddudes_suffix: ddudes_suffix,
			ddudes_ssn: ddudes_ssn,
			ddudes_dob: ddudes_dob,
			ddudes_access_level: ddudes_access_level,
 		    ddudes_jobposition_shift_id:  ddudes_jobposition_shift_id,
			ddudes_jobposition_shift: ddudes_jobposition_shift,
			ddudes_team_name: ddudes_team_name,
  			ddudes_team_id: ddudes_team_id,
			ddudes_region_id: ddudes_region_id,
			ddudes_region_name: ddudes_region_name,
			ddudes_dma_id: ddudes_dma_id,
			ddudes_market_id: ddudes_market_id,
			ddudes_submarket_id: ddudes_submarket_id,
			ddudes_salespitch_template_id: ddudes_salespitch_template_id,
			ddudes_workphone_active: ddudes_workphone_active,
			ddudes_workphone_prfx: ddudes_workphone_prfx,
			ddudes_workphone_no: ddudes_workphone_no,
			ddudes_workphone_type: ddudes_workphone_type,
			ddudes_workphone_ext: ddudes_workphone_ext,
			ddudes_workphone_companyown: ddudes_workphone_companyown,
			ddudes_workphone_contractorown: ddudes_workphone_contractorown,
			ddudes_workphone_brand: ddudes_workphone_brand,
			ddudes_workphone_mac_address: ddudes_workphone_mac_address,
			ddudes_workphone_mac_address_ip: ddudes_workphone_mac_address_ip,
			ddudes_workphone_router_brand_id: ddudes_workphone_router_brand_id,
			ddudes_workphone_router_brand: ddudes_workphone_router_brand,
			ddudes_workphone_router_serialno: ddudes_workphone_router_serialno,
			ddudes_workphone_router_modelno: ddudes_workphone_router_modelno,
			ddudes_workphone_date_shipped: ddudes_workphone_date_shipped,
			ddudes_workphone_date_received: ddudes_workphone_date_received,
			ddudes_workphone_purchase_cost: ddudes_workphone_purchase_cost,
			ddudes_workphone_purchase_date: ddudes_workphone_purchase_date,
			ddudes_workphone2_prfx: ddudes_workphone2_prfx,
			ddudes_workphone2_type: ddudes_workphone2_type,
			ddudes_workphone2_ext: ddudes_workphone2_ext,
			ddudes_workaddr1: ddudes_workaddr1,
			ddudes_workaddr2: ddudes_workaddr2,
			ddudes_workaddr_city: ddudes_workaddr_city,
			ddudes_workaddr_state: ddudes_workaddr_state,
			ddudes_workaddr_zip: ddudes_workaddr_zip,
			ddudes_workaddr_zip4: ddudes_workaddr_zip4,
			ddudes_workaddr_county: ddudes_workaddr_county,
			ddudes_workaddr_country: ddudes_workaddr_country,
			ddudes_homephone_no: ddudes_homephone_no,
			ddudes_home_addr: ddudes_home_addr,
			ddudes_home_addr2: ddudes_home_addr2,
			ddudes_home_city: ddudes_home_city,
			ddudes_home_state: ddudes_home_state,
			ddudes_home_zipcode: ddudes_home_zipcode,
			ddudes_Timezone: ddudes_Timezone,
			ddudes_workstation_id: ddudes_workstation_id,
			ddudes_goal_weeklypresentations: ddudes_goal_weeklypresentations,
			ddudes_goal_monthlypresentations: ddudes_goal_monthlypresentations,
			ddudes_goal_deals_monthly: ddudes_goal_deals_monthly,
			ddudes_goal_retaindlrs_monthly: ddudes_goal_retaindlrs_monthly,
			ddudes_goal_newdlrs_monthly: ddudes_goal_newdlrs_monthly,
			ddudes_goal_mnthly_commission: ddudes_goal_mnthly_commission,
			ddudes_goal_daily_commission: ddudes_goal_daily_commission,
			ddudes_goal_yearly_commission: ddudes_goal_yearly_commission,
			ddudes_goal_residual_commission: ddudes_goal_residual_commission,
			ddudes_goal_addnewcars_tosystm: ddudes_goal_addnewcars_tosystm,
			ddudes_goal_vehicle_photos: ddudes_goal_vehicle_photos,
			ddudes_goal_vehicle_windowstickers: ddudes_goal_vehicle_windowstickers,
			ddudes_goal_new_websites: ddudes_goal_new_websites,
			ddudes_goal_retain_outsideadagencys: ddudes_goal_retain_outsideadagencys,
			ddudes_goal_new_outsideadagencys: ddudes_goal_new_outsideadagencys,
			ddudes_professional_motto: ddudes_professional_motto,
			ddudes_dudes_aboutme_toteam: ddudes_dudes_aboutme_toteam,
			ddudes_dudes_aboutme_todealers: ddudes_dudes_aboutme_todealers,
			ddudes_dudes_aboutme_tocompany: ddudes_dudes_aboutme_tocompany,
		internal_comments_super_admin: internal_comments_super_admin
		   }, function(data){
			   console.log('Data: '+data);
			   $('div#debug_console').html(data);

	});
	
/*	setTimeout(function(){

			window.location.href = 'company.directory.php'; 

    },3000);
	
*/	
	
}

});