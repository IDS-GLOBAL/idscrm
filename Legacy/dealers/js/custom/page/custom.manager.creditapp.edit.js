$(document).ready(function(){
// Besure to count age and update it from birthdate/ 
// make a unix time stamp for birthday in customers. update real pearson id with a script_switch_realperson.php?creditapp=$appid

			 var app_id = $('input#credit_app_fullblown_id').val();

			 var applicant_app_token = $('input#applicant_app_token').val();

		     $('div#primary_app_section').load('content/body.manager.single.full_app.edit.php?type=Primary&app_id='+app_id+'&key='+applicant_app_token);

			  $('div#contract_section').show();
			  $('div#vehicle_sell_section').show();
			  $('div#save_credit_app_bar').show();









$('button#editApp').on('click', function(){

			 var app_id = $('input#credit_app_fullblown_id').val();

			 var applicant_app_token = $('input#applicant_app_token').val();

			 window.location.replace('manager.creditapp.edit.php?app_id='+app_id+'&keytoken='+applicant_app_token);
});

$('button#load_primary_creditapp').click( function(){

		
		
		     $('div#primary_app_section').load('content/body.manager.single.full_app.edit.php?type=Primary');

			  $('div#contract_section').show();
			  $('div#vehicle_sell_section').show();
			  $('div#save_credit_app_bar').show();
});


$('button#load_joint_creditapp').click( function(){


				var credit_app_fullblown_id = $('input#credit_app_fullblown_id').val();
				
				var applicant_app_token = $('input#applicant_app_token').val();

				$('div#primary_app_section').removeClass('col-sm-12').addClass('col-sm-6');
				

		     	$('div#joint_app_section').load('content/body.manager.single.full_app.edit.php?type=Joint&joincoappid='+credit_app_fullblown_id+'&appkey='+applicant_app_token);
				
				
				$('div#joint_app_section').show();

});




$('button#update_creditapp').click( function (){

	var credit_app_fullblown_id = $('input#credit_app_fullblown_id').val();

	update_creditapp();

});






});



function makeanickname(){

		var fname = $('input#first_name').val();
		var mname = $('input#middle_name').val();
		var lname = $('input#last_name').val();
		
		var nickname = fname + ' ' + lname;


};

function update_creditapp(){

var credit_app_fullblown_id = $('input#credit_app_fullblown_id').val();

console.log(' Running: update_creditapp();  '+credit_app_fullblown_id);

		var applicant_app_token = $('input#applicant_app_token').val();


		
		//var joint_creditapp_nodb = $('input#joint_creditapp_nodb').val();


		var cust_vehicle_id = $('input#cust_vehicle_id').val();
		
		var token = $('input#token').val();

		
		// Stop Process From Creating
		
		
		
		
		var slct_applicant_sid = document.getElementById('applicant_sid');
		var applicant_sid = slct_applicant_sid.options[slct_applicant_sid.selectedIndex].value;
		var applicant_sid_name = slct_applicant_sid.options[slct_applicant_sid.selectedIndex].text;


		var slct_applicant_sid2 = document.getElementById('applicant_sid2');
		var applicant_sid2 = slct_applicant_sid2.options[slct_applicant_sid2.selectedIndex].value;
		var applicant_sid2_name = slct_applicant_sid2.options[slct_applicant_sid2.selectedIndex].text;
		
		console.log('applicant_sid: '+applicant_sid);
		console.log('applicant_sid_name: '+applicant_sid_name);
		console.log('applicant_sid2: '+applicant_sid2);
		console.log('applicant_sid2_name: '+applicant_sid2_name);
		
		
		//if();


		var slct_title_name = document.getElementById("applicant_titlename");
		var applicant_title_name = slct_title_name.options[slct_title_name.selectedIndex].value;
		
		var slct_credit_app_source = document.getElementById('credit_app_source');
		var credit_app_source = slct_credit_app_source.options[slct_credit_app_source.selectedIndex].value;
		
		
var applicant_fname = $('input#applicant_fname').val();
var applicant_mname = $('input#applicant_mname').val();
var applicant_lname = $('input#applicant_lname').val();

var applicant_name = $('input#applicant_name').val();

var applicant_cell_phone = $('input#applicant_cell_phone').val();
var applicant_email_address = $('input#applicant_email_address').val();
var slct_applicant_driver_state_issued = document.getElementById('applicant_driver_state_issued');
var applicant_driver_state_issued = slct_applicant_driver_state_issued.options[slct_applicant_driver_state_issued.selectedIndex].value;

var applicant_driver_licenses_number = $('input#applicant_driver_licenses_number').val();

var applicant_ssn = $('input#applicant_ssn').val();
var applicant_dob = $('input#applicant_dob').val();

var applicant_driver_licenses_expdate = $('input#applicant_driver_licenses_expdate').val();





		//var leadcomments = $('input#lead_comment').val();

		//End Quick Apply
		
		
	
		
				//Start Full Apply
	
	
				//Start Step 2
				var applicant_present_address1 = $('input#applicant_present_address1').val();
				var applicant_present_address2 = $('input#applicant_present_address2').val();
				var applicant_present_addr_city = $('input#applicant_present_addr_city').val();
			
				
				var slct_applicant_present_addr_state = document.getElementById('applicant_present_addr_state');
				var applicant_present_addr_state = slct_applicant_present_addr_state.options[slct_applicant_present_addr_state.selectedIndex].value;
				var applicant_present_addr_county = $('input#applicant_present_addr_county').val();
				var applicant_present_addr_zip = $('input#applicant_present_addr_zip').val();



var applicant_addr_landlord_mortg = $('input#applicant_addr_landlord_mortg').val();
var applicant_addr_landlord_address = $('input#applicant_addr_landlord_address').val();
var applicant_addr_landlord_city = $('input#applicant_addr_landlord_city').val();

var slct_applicant_addr_landlord_state = document.getElementById('applicant_addr_landlord_state');
var applicant_addr_landlord_state = slct_applicant_addr_landlord_state.options[slct_applicant_addr_landlord_state.selectedIndex].value;

var applicant_addr_landlord_zip = $('input#applicant_addr_landlord_zip').val();
var applicant_addr_landlord_phone = $('input#applicant_addr_landlord_phone').val();
var applicant_name_oncurrent_lease = $('input#applicant_name_oncurrent_lease').val();

var slct_applicant_apart_or_house = document.getElementById('applicant_apart_or_house');
var applicant_apart_or_house = slct_applicant_apart_or_house.options[slct_applicant_apart_or_house.selectedIndex].value;

var slct_applicant_buy_own_rent_other = document.getElementById('applicant_buy_own_rent_other');
var applicant_buy_own_rent_other = slct_applicant_buy_own_rent_other.options[slct_applicant_buy_own_rent_other.selectedIndex].value;

var applicant_house_payment = $('input#applicant_house_payment').val();
				
var slct_applicant_addr_years = document.getElementById("applicant_addr_years");
var applicant_addr_years = slct_applicant_addr_years.options[slct_applicant_addr_years.selectedIndex].value;

var slct_applicant_addr_months = document.getElementById("applicant_addr_months");
var applicant_addr_months = slct_applicant_addr_months.options[slct_applicant_addr_months.selectedIndex].value;

var slct_applicant_residence_changes = document.getElementById("applicant_residence_changes");
var applicant_residence_changes = slct_applicant_residence_changes.options[slct_applicant_residence_changes.selectedIndex].value;










var slct_applicant_previous1_live_years = document.getElementById('applicant_previous1_live_years');
var applicant_previous1_live_years = slct_applicant_previous1_live_years.options[slct_applicant_previous1_live_years.selectedIndex].value;
				





				var applicant_previous1_addr1 = $('input#applicant_previous1_addr1').val();
				var applicant_previous1_addr2 = $('input#applicant_previous1_addr2').val();
				var applicant_previous1_addr_city = $('input#applicant_previous1_addr_city').val();
				
var slct_applicant_previous1_addr_state = document.getElementById("applicant_previous1_addr_state");
var applicant_previous1_addr_state = slct_applicant_previous1_addr_state.options[slct_applicant_previous1_addr_state.selectedIndex].value;


				var applicant_previous1_addr_zip = $('input#applicant_previous1_addr_zip').val();

var slct_applicant_previous1_live_years = document.getElementById("applicant_previous1_live_years");
var applicant_previous1_live_years = slct_applicant_previous1_live_years.options[slct_applicant_previous1_live_years.selectedIndex].value;


var slct_applicant_previous1_live_months = document.getElementById("applicant_previous1_live_months");
var applicant_previous1_live_months = slct_applicant_previous1_live_months.options[slct_applicant_previous1_live_months.selectedIndex].value;


// End Step 2

// Start Step 3

var slct_applicant_employment_status = document.getElementById("applicant_employment_status");
var applicant_employment_status = slct_applicant_employment_status.options[slct_applicant_employment_status.selectedIndex].value;

		var applicant_employer1_position = $('input#applicant_employer1_position').val();
		
		var applicant_employer1_name = $('input#applicant_employer1_name').val();
		
		var applicant_employer1_phone = $('input#applicant_employer1_phone').val();
		
		var applicant_employer1_addr = $('input#applicant_employer1_addr').val();
		
		var applicant_employer1_city = $('input#applicant_employer1_city').val();
		
var slct_applicant_employer1_state = document.getElementById("applicant_employer1_state");
var applicant_employer1_state = slct_applicant_employer1_state.options[slct_applicant_employer1_state.selectedIndex].value;

var applicant_employer1_zip = $('input#applicant_employer1_zip').val();

var applicant_employer1_salary_bringhome = $('input#applicant_employer1_salary_bringhome').val();

var slct_applicant_employer1_payday_freq = document.getElementById('applicant_employer1_payday_freq');
var applicant_employer1_payday_freq = slct_applicant_employer1_payday_freq.options[slct_applicant_employer1_payday_freq.selectedIndex].value;

var slct_applicant_employer1_work_years = document.getElementById("applicant_employer1_work_years");
var applicant_employer1_work_years = slct_applicant_employer1_work_years.options[slct_applicant_employer1_work_years.selectedIndex].value;

var slct_applicant_employer1_work_months = document.getElementById("applicant_employer1_work_months");
var applicant_employer1_work_months = slct_applicant_employer1_work_months.options[slct_applicant_employer1_work_months.selectedIndex].value;


//Second Part Step 3

var applicant_employer2_position = $('input#applicant_employer2_position').val();

var applicant_employer2_name = $('input#applicant_employer2_name').val();
var applicant_employer2_phone = $('input#applicant_employer2_phone').val();
var applicant_employer2_addr = $('input#applicant_employer2_addr').val();
var applicant_employer2_city = $('input#applicant_employer2_city').val();



var slct_applicant_employer2_state = document.getElementById("applicant_employer2_state");
var applicant_employer2_state = slct_applicant_employer2_state.options[slct_applicant_employer2_state.selectedIndex].value;

var applicant_employer2_zip = $('input#applicant_employer2_zip').val();

var slct_applicant_employer2_work_years = document.getElementById("applicant_employer2_work_years");
var applicant_employer2_work_years = slct_applicant_employer2_work_years.options[slct_applicant_employer2_work_years.selectedIndex].value;

var slct_applicant_employer2_work_months = document.getElementById("applicant_employer2_work_months");
var applicant_employer2_work_months = slct_applicant_employer2_work_months.options[slct_applicant_employer2_work_months.selectedIndex].value;

var slct_applicant_job_changes2yr = document.getElementById("applicant_job_changes2yr");
var applicant_job_changes2yr = slct_applicant_job_changes2yr.options[slct_applicant_job_changes2yr.selectedIndex].value;

var user_applicant_employer_notes = $('textarea#user_applicant_employer_notes').val();
var applicant_appt_startunixtime = $('input#applicant_appt_startunixtime').val();

var slct_other_income_source = document.getElementById("other_income_source");
var other_income_source = slct_other_income_source.options[slct_other_income_source.selectedIndex].value;

var applicant_other_income_amount = $("input#applicant_other_income_amount").val();

var slct_applicant_other_income_when_rcvd = document.getElementById('applicant_other_income_when_rcvd');
var applicant_other_income_when_rcvd = slct_applicant_other_income_when_rcvd.options[slct_applicant_other_income_when_rcvd.selectedIndex].value;

// End Step 3


// Start Step 4
var applilcant_v_stockno = $('input#applilcant_v_stockno').val();
var applilcant_v_ymkmd_txt = $('input#applilcant_v_ymkmd_txt').val();

var applilcant_v_vin = $('input#applilcant_v_vin').val();

var applilcant_v_year = $('input#applilcant_v_year').val();

var applilcant_v_make = ('input#applilcant_v_make').val();

var applilcant_v_model = ('input#applilcant_v_model').val();

var applilcant_v_style = $('input#applilcant_v_style').val();


var applilcant_v_inception_miles = $('input#applilcant_v_inception_miles').val();

var applilcant_v_cash_down = $('input#applilcant_v_cash_down').val();

var applicant_desired_mo_payment = $('input#applicant_desired_mo_payment').val();

var slct_applicant_open_to_refinanceautoloan = document.getElementById('applicant_open_to_refinanceautoloan');
var applicant_open_to_refinanceautoloan = slct_applicant_open_to_refinanceautoloan.options[slct_applicant_open_to_refinanceautoloan.selectedIndex].value;

var slct_applilcant_v_trade_year = document.getElementById("applilcant_v_trade_year");
var applilcant_v_trade_year = slct_applilcant_v_trade_year.options[slct_applilcant_v_trade_year.selectedIndex].value;


var slct_applilcant_v_trade_make = document.getElementById("applilcant_v_trade_make");
var applilcant_v_trade_make = slct_applilcant_v_trade_make.options[slct_applilcant_v_trade_make.selectedIndex].value;

var slct_applilcant_v_trade_model = document.getElementById("applilcant_v_trade_model");
var applilcant_v_trade_model = slct_applilcant_v_trade_model.options[slct_applilcant_v_trade_model.selectedIndex].value;

var slct_applicant_open_autoloan = document.getElementById("applicant_open_autoloan");
var applicant_open_autoloan = slct_applicant_open_autoloan.options[slct_applicant_open_autoloan.selectedIndex].value;

var applilcant_v_trade_lien_holder_name = $('input#applilcant_v_trade_lien_holder_name').val();

var applicant_open_autoloan_pymt = $('input#applicant_open_autoloan_pymt').val();

var slct_applicant_open_autoloan_pymthistry = document.getElementById("applicant_open_autoloan_pymthistry");
var applicant_open_autoloan_pymthistry = slct_applicant_open_autoloan_pymthistry.options[slct_applicant_open_autoloan_pymthistry.selectedIndex].value;

var slct_applicant_open_to_trading = document.getElementById("applicant_open_to_trading");
var applicant_open_to_trading = slct_applicant_open_to_trading.options[slct_applicant_open_to_trading.selectedIndex].value;

var applilcant_v_trade_owed = $('input#applilcant_v_trade_owed').val();

var currently_reasontradevehicle = $('textarea#currently_reasontradevehicle').val();
// End Step 4


// Start Step 5



// End Step 5



// Start Nearest Relative
var applicants_realative1_fname = $('input#applicants_realative1_fname').val();
var applicants_realative1_lname = $('input#applicants_realative1_lname').val();
var applicants_realative1_relationship = $('input#applicants_realative1_relationship').val();
var applicants_realative1_mainphone = $('input#applicants_realative1_mainphone').val();
var applicants_realative1_address = $('input#applicants_realative1_address').val();
var applicants_realative1_address_city = $('input#applicants_realative1_address_city').val();

var slct_applicants_realative1_address_state = document.getElementById('applicants_realative1_address_state');
var applicants_realative1_address_state = slct_applicants_realative1_address_state.options[slct_applicants_realative1_address_state.selectedIndex].value;

var applicants_realative1_address_zip = $('input#applicants_realative1_address_zip').val();

var user_comments_trade_notes = $('textarea#user_comments_trade_notes').val();

// End Nearest Relative
		//alert('Made It This Far');

$.post('script_update_manager.creditapp.php', {
	   	credit_app_fullblown_id: credit_app_fullblown_id,
		cust_vehicle_id: cust_vehicle_id,
		applicant_app_token:  applicant_app_token,
		applicant_sid: applicant_sid,
		applicant_sid_name: applicant_sid_name,
		applicant_sid2: applicant_sid2,
		applicant_sid2_name: applicant_sid2_name,
		applicant_title_name: applicant_title_name,
		applicant_fname: applicant_fname,
		applicant_mname: applicant_mname,
		applicant_lname: applicant_lname,
		applicant_name: applicant_name,
		applicant_cell_phone: applicant_cell_phone,
		applicant_email_address: applicant_email_address,
		credit_app_source: credit_app_source,
		applicant_driver_state_issued: applicant_driver_state_issued,
		applicant_driver_licenses_number: applicant_driver_licenses_number,
		applicant_ssn: applicant_ssn,
		applicant_dob: applicant_dob,
		applicant_driver_licenses_expdate: applicant_driver_licenses_expdate,
		applicant_present_address1: applicant_present_address1,
		applicant_present_address2: applicant_present_address2,
		applicant_present_addr_city: applicant_present_addr_city,
		applicant_present_addr_state: applicant_present_addr_state,
		applicant_present_addr_county: applicant_present_addr_county,
		applicant_present_addr_zip: applicant_present_addr_zip,
		applicant_addr_landlord_mortg: applicant_addr_landlord_mortg,
		applicant_addr_landlord_address: applicant_addr_landlord_address,
		applicant_addr_landlord_city: applicant_addr_landlord_city,
		applicant_addr_landlord_state: applicant_addr_landlord_state,
		applicant_addr_landlord_zip: applicant_addr_landlord_zip,
		applicant_addr_landlord_phone: applicant_addr_landlord_phone,
		applicant_name_oncurrent_lease: applicant_name_oncurrent_lease,
		applicant_apart_or_house: applicant_apart_or_house,
		applicant_buy_own_rent_other: applicant_buy_own_rent_other,
		applicant_house_payment: applicant_house_payment,
		applicant_addr_years: applicant_addr_years,
		applicant_addr_months: applicant_addr_months,
		applicant_residence_changes: applicant_residence_changes,
		applicant_previous1_addr1: applicant_previous1_addr1,
		applicant_previous1_addr2: applicant_previous1_addr2,
		applicant_previous1_addr_city: applicant_previous1_addr_city,
		applicant_previous1_addr_state: applicant_previous1_addr_state,
		applicant_previous1_addr_zip: applicant_previous1_addr_zip,
		applicant_previous1_live_years: applicant_previous1_live_years,
		applicant_previous1_live_months: applicant_previous1_live_months,
		applicant_employment_status: applicant_employment_status,
		applicant_employer1_position: applicant_employer1_position,
		applicant_employer1_name: applicant_employer1_name,
		applicant_employer1_phone: applicant_employer1_phone,
		applicant_employer1_addr: applicant_employer1_addr,
		applicant_employer1_city: applicant_employer1_city,
		applicant_employer1_state: applicant_employer1_state,
		applicant_employer1_zip: applicant_employer1_zip,
		applicant_employer1_salary_bringhome: applicant_employer1_salary_bringhome,
		applicant_employer1_payday_freq: applicant_employer1_payday_freq,
		applicant_employer1_work_years: applicant_employer1_work_years,
		applicant_employer1_work_months: applicant_employer1_work_months,
		applicant_job_changes2yr: applicant_job_changes2yr,
		user_applicant_employer_notes: user_applicant_employer_notes,
		applicant_appt_startunixtime: applicant_appt_startunixtime,
		other_income_source: other_income_source,
		applicant_other_income_amount: applicant_other_income_amount,
		applicant_other_income_when_rcvd: applicant_other_income_when_rcvd,		
		applicant_employer2_position: applicant_employer2_position,
		applicant_employer2_name: applicant_employer2_name,
		applicant_employer2_phone: applicant_employer2_phone,
		applicant_employer2_addr: applicant_employer2_addr,
		applicant_employer2_city: applicant_employer2_city,
		applicant_employer2_state: applicant_employer2_state,
		applicant_employer2_zip: applicant_employer2_zip,
		applicant_employer2_work_years: applicant_employer2_work_years,
		applicant_employer2_work_months: applicant_employer2_work_months,
		applicants_realative1_fname: applicants_realative1_fname,
		applicants_realative1_lname: applicants_realative1_lname,
		applicants_realative1_relationship: applicants_realative1_relationship,
		applicants_realative1_mainphone: applicants_realative1_mainphone,
		applicants_realative1_address: applicants_realative1_address,
		applicants_realative1_address_city: applicants_realative1_address_city,
		applicants_realative1_address_state: applicants_realative1_address_state,
		applicants_realative1_address_zip: applicants_realative1_address_zip,
		applicant_open_to_refinanceautoloan: applicant_open_to_refinanceautoloan,
		applilcant_v_ymkmd_txt: applilcant_v_ymkmd_txt,
		applilcant_v_stockno: applilcant_v_stockno,
		applilcant_v_vin: applilcant_v_vin,
		applilcant_v_year: applilcant_v_year,
		applilcant_v_make: applilcant_v_make,
		applilcant_v_model: applilcant_v_model,
		applilcant_v_style: applilcant_v_style,
		applilcant_v_inception_miles: applilcant_v_inception_miles,
		applicant_open_autoloan: applicant_open_autoloan,
		applicant_desired_mo_payment: applicant_desired_mo_payment,
		applilcant_v_cash_down: applilcant_v_cash_down,
		applilcant_v_trade_year: applilcant_v_trade_year,
		applilcant_v_trade_make: applilcant_v_trade_make,
		applilcant_v_trade_model: applilcant_v_trade_model,
		applilcant_v_trade_lien_holder_name: applilcant_v_trade_lien_holder_name,
		applicant_open_autoloan_pymt: applicant_open_autoloan_pymt,
		applicant_open_autoloan_pymthistry: applicant_open_autoloan_pymthistry,
		applicant_open_to_trading: applicant_open_to_trading,
		applilcant_v_trade_owed: applilcant_v_trade_owed,
		user_comments_trade_notes: user_comments_trade_notes
	   },
		   function(result) {
			   //$('#centerResult').html(result).show();
			   console.log(result);
			});



}