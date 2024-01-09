$(document).ready(function(){


$('button#load_primary_creditapp').click( function(){

		
		
		     $('div#primary_app_section').load('content/body.single.full_app.php?type=Primary');

});


$('button#load_joint_creditapp').click( function(){



				$('div#primary_app_section').removeClass('col-sm-12').addClass('col-sm-6');
				

		     	$('div#joint_app_section').load('content/body.single.full_app.php?type=Joint');
				
				
				$('div#joint_app_section').show();

});




$('button#create_creditapp').click( function (){

	create_creditapp();

});






});



function makeanickname(){

		var fname = $('input#first_name').val();
		var mname = $('input#middle_name').val();
		var lname = $('input#last_name').val();
		
		var nickname = fname + ' ' + lname;


};

function create_creditapp(){

console.log(' Running: create_creditapp();  ');

		var joint_creditapp_Applicant_key = $('input#joint_creditapp_Applicant_key').val();
		
		
		var joint_creditapp_CoApplicant_key = $('input#joint_creditapp_CoApplicant_key').val();




		
		//var joint_creditapp_nodb = $('input#joint_creditapp_nodb').val();


		var cust_vehicle_id = $('input#cust_vehicle_id').val();
		
		var token = $('input#token').val();

		
		// Stop Process From Creating
		
		
		
		
		
		
		
		
		//if();


		var slct_title_name = document.getElementById("applicant_titlename");
		var title_name = slct_title_name.options[slct_title_name.selectedIndex].value;
		
		var traffic_source = $('input#traffic_source').val();
		
var applicant_fname = $('input#').val();
var applicant_mname = $('input#').val();
var applicant_lname = $('input#applicant_lname').val();

var applicant_name = $('input#applicant_name').val();

var applicant_cell_phone = $('input#applicant_cell_phone').val();
var applicant_email_address = $('input#applicant_email_address').val();
var slct_applicant_driver_state_issued = document.getElementById('applicant_driver_state_issued');
var applicant_driver_state_issued = slct_applicant_driver_state_issued.options[slct_applicant_driver_state_issued.selectedIndex].value;


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
				var applicant_present_addr_state = $('input#applicant_present_addr_state').val();
				var applicant_present_addr_zip = $('input#applicant_present_addr_zip').val();
				
var slct_applicant_previous1_live_years = document.getElementById('applicant_previous1_live_years');
var applicant_previous1_live_years = slct_applicant_previous1_live_years.options[slct_applicant_previous1_live_years.selectedIndex].value;
				
				
				var applicant_house_payment = $('input#applicant_house_payment').val();
				
var slct_applicant_addr_years = document.getElementById("applicant_addr_years");
var applicant_addr_years = slct_applicant_addr_years.options[slct_applicant_addr_years.selectedIndex].value;

var slct_applicant_addr_months = document.getElementById("applicant_addr_months");
var applicant_addr_months = slct_applicant_addr_months.options[slct_applicant_addr_months.selectedIndex].value;



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

var slct_residence_changes = document.getElementById("residence_changes");
var residence_changes = slct_residence_changes.options[slct_residence_changes.selectedIndex].value;

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

var slct_applicant_employer1_work_years = document.getElementById("applicant_employer1_work_years");
var applicant_employer1_work_years = slct_applicant_employer1_work_years.options[slct_applicant_employer1_work_years.selectedIndex].value;

var slct_applicant_employer1_work_months = document.getElementById("applicant_employer1_work_months");
var applicant_employer1_work_months = slct_applicant_employer1_work_months.options[slct_applicant_employer1_work_months.selectedIndex].value;


//Second Part Step 3
var slct_applicant_employment_status2 = document.getElementById("applicant_employment_status2");
var applicant_employment_status2 = slct_applicant_employment_status2.options[slct_applicant_employment_status2.selectedIndex].value;

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

var slct_job_changes = document.getElementById("job_changes");
var job_changes = slct_job_changes.options[slct_job_changes.selectedIndex].value;

// End Step 3


// Start Step 4
var user_applicant_employer_notes = $('textarea#user_applicant_employer_notes').val();
var applilcant_v_stockno = $('input#applilcant_v_stockno').val();
var purchase_ymk = $('input#purchase_ymk').val();


var slct_applilcant_v_year = document.getElementById("applilcant_v_year");
var applilcant_v_year = slct_applilcant_v_year.options[slct_applilcant_v_year.selectedIndex].value;

var slct_applilcant_v_make = document.getElementById("applilcant_v_make");
var applilcant_v_make = slct_applilcant_v_make.options[slct_applilcant_v_make.selectedIndex].value;

var slct_applilcant_v_model = document.getElementById("applilcant_v_model");
var applilcant_v_model = slct_applilcant_v_model.options[slct_applilcant_v_model.selectedIndex].value;

var slct_currently_ownvehicle = document.getElementById("currently_ownvehicle");
var currently_ownvehicle = slct_currently_ownvehicle.options[slct_currently_ownvehicle.selectedIndex].value;


var applilcant_v_cash_down = $('input#applilcant_v_cash_down').val();

var desired_mo_payment = $('input#desired_mo_payment').val();

var slct_appt_month = document.getElementById("appt_month");
var appt_month = slct_appt_month.options[slct_appt_month.selectedIndex].value;

var slct_appt_days = document.getElementById("appt_days");
var appt_days = slct_appt_days.options[slct_appt_days.selectedIndex].value;

var slct_appt_year = document.getElementById("appt_year");
var appt_year = slct_appt_year.options[slct_appt_year.selectedIndex].value;


var slct_applilcant_v_trade_year = document.getElementById("applilcant_v_trade_year");
var applilcant_v_trade_year = slct_applilcant_v_trade_year.options[slct_applilcant_v_trade_year.selectedIndex].value;


var slct_applilcant_v_trade_make = document.getElementById("applilcant_v_trade_make");
var applilcant_v_trade_make = slct_applilcant_v_trade_make.options[slct_applilcant_v_trade_make.selectedIndex].value;

var slct_applilcant_v_trade_model = document.getElementById("applilcant_v_trade_model");
var applilcant_v_trade_model = slct_applilcant_v_trade_model.options[slct_applilcant_v_trade_model.selectedIndex].value;

var slct_currently_ownvehicle = document.getElementById("currently_ownvehicle");
var currently_ownvehicle = slct_currently_ownvehicle.options[slct_currently_ownvehicle.selectedIndex].value;

var applilcant_v_trade_lien_holder_name = $('input#applilcant_v_trade_lien_holder_name').val();

var current_carpayment = $('input#current_carpayment').val();

var slct_pymnthistry_tradevehicle = document.getElementById("pymnthistry_tradevehicle");
var pymnthistry_tradevehicle = slct_pymnthistry_tradevehicle.options[slct_pymnthistry_tradevehicle.selectedIndex].value;

var slct_currently_tradevehicle = document.getElementById("currently_tradevehicle");
var currently_tradevehicle = slct_currently_tradevehicle.options[slct_currently_tradevehicle.selectedIndex].value;

var applilcant_v_trade_owed = $('input#applilcant_v_trade_owed').val();

var currently_reasontradevehicle = $('textarea#currently_reasontradevehicle').val();
// End Step 4


// Start Step 5

var slct_appt_month = document.getElementById("appt_month");
var appt_month = slct_appt_month.options[slct_appt_month.selectedIndex].value;


var slct_appt_days = document.getElementById("appt_days");
var appt_days = slct_appt_days.options[slct_appt_days.selectedIndex].value;


var slct_appt_year = document.getElementById("appt_year");
var appt_year = slct_appt_year.options[slct_appt_year.selectedIndex].value;


var slct_other_income_source = document.getElementById("other_income_source");
var other_income_source = slct_other_income_source.options[slct_other_income_source.selectedIndex].value;

var other_income = $("input#other_income").val();

// End Step 5


// Start Step 6

var applicant_ssn = $("input#applicant_ssn").val();

var applicant_dob = $("input#applicant_dob").val();

var applicant_driver_licenses_number = $("input#applicant_driver_licenses_number").val();

var slct_applicant_driver_state_issued = document.getElementById('applicant_driver_state_issued');
var applicant_driver_state_issued = slct_applicant_driver_state_issued.options[slct_applicant_driver_state_issued.selectedIndex].value;

var applicant_driver_licenses_expdate = $("input#applicant_driver_licenses_expdate").val();

// End Step 6

// Start Nearest Relative
var applicants_realative1_name = $('input#applicants_realative1_name').val();
var applicants_realative1_relationship = $('input#applicants_realative1_relationship').val();
var applicants_realative1_mainphone = $('input#applicants_realative1_mainphone').val();
var applicants_realative1_address = $('input#applicants_realative1_address').val();
var applicants_realative1_address_city = $('iput#applicants_realative1_address_city').val();

var slct_applicants_realative1_address_state = document.getElementById('applicants_realative1_address_state');
var applicants_realative1_address_state = slct_applicants_realative1_address_state.options[slct_applicants_realative1_address_state.selectedIndex].value;

var applicants_realative1_address_zip = $('input#applicants_realative1_address_zip').val();


// End Nearest Relative
		//alert('Made It This Far');

$.post('xml_longformapplication.php', {
	   joint_creditapp_CoApplicant_key: joint_creditapp_CoApplicant_key,
		cust_vehicle_id: cust_vehicle_id,
		token: token,
		title_name: title_name,
		fname: fname,
		mname: mname,
		lname: lname,
		nickname: nickname,
		mobile_phone: mobile_phone,
		per_email: per_email,
		traffic_source: traffic_source,
		quick_homeaddr: quick_homeaddr,
		quick_homecity: quick_homecity,
		quick_homestate: quick_homestate,
		quick_homezip: quick_homezip,
		employer_years: employer_years,
		employer_months: employer_months,
		quick_empname: quick_empname,
		quick_moincome: quick_moincome,
		applicant_present_address1: applicant_present_address1,
		applicant_present_address2: applicant_present_address2,
		applicant_present_addr_city: applicant_present_addr_city,
		applicant_present_addr_state: applicant_present_addr_state,
		applicant_present_addr_zip: applicant_present_addr_zip,
		applicant_house_payment: applicant_house_payment,
		applicant_addr_years: applicant_addr_years,
		applicant_addr_months: applicant_addr_months,
		applicant_previous1_addr1: applicant_previous1_addr1,
		applicant_previous1_addr2: applicant_previous1_addr2,
		applicant_previous1_addr_city: applicant_previous1_addr_city,
		applicant_previous1_addr_state: applicant_previous1_addr_state,
		applicant_previous1_addr_zip: applicant_previous1_addr_zip,
		applicant_previous1_live_years: applicant_previous1_live_years,
		applicant_previous1_live_months: applicant_previous1_live_months,
		residence_changes: residence_changes,
		applicant_employment_status: applicant_employment_status,
		applicant_employer1_position: applicant_employer1_position,
		applicant_employer1_name: applicant_employer1_name,
		applicant_employer1_phone: applicant_employer1_phone,
		applicant_employer1_addr: applicant_employer1_addr,
		applicant_employer1_city: applicant_employer1_city,
		applicant_employer1_state: applicant_employer1_state,
		applicant_employer1_zip: applicant_employer1_zip,
		applicant_employer1_salary_bringhome: applicant_employer1_salary_bringhome,
		applicant_employer1_work_years: applicant_employer1_work_years,
		applicant_employer1_work_months: applicant_employer1_work_months,
		applicant_employment_status2: applicant_employment_status2, 
		applicant_employer2_position: applicant_employer2_position,
		applicant_employer2_name: applicant_employer2_name,
		applicant_employer2_phone: applicant_employer2_phone,
		applicant_employer2_addr: applicant_employer2_addr,
		applicant_employer2_city: applicant_employer2_city,
		applicant_employer2_state: applicant_employer2_state,
		applicant_employer2_zip: applicant_employer2_zip,
		applicant_employer2_work_years: applicant_employer2_work_years,
		applicant_employer2_work_months: applicant_employer2_work_months,
		job_changes: job_changes,
		applicants_realative1_name: applicants_realative1_name,
		applicants_realative1_relationship: applicants_realative1_relationship,
		applicants_realative1_mainphone: applicants_realative1_mainphone,
		applicants_realative1_address: applicants_realative1_address,
		applicants_realative1_address_city: applicants_realative1_address_city,
		applicants_realative1_address_state: applicants_realative1_address_state,
		applicants_realative1_address_zip:applicants_realative1_address_zip,
		user_applicant_employer_notes: user_applicant_employer_notes,
		applilcant_v_stockno: applilcant_v_stockno,
		purchase_ymk: purchase_ymk,
		applilcant_v_year: applilcant_v_year,
		applilcant_v_make: applilcant_v_make,
		applilcant_v_model: applilcant_v_model,
		currently_ownvehicle: currently_ownvehicle,
		applilcant_v_cash_down: applilcant_v_cash_down,
		desired_mo_payment: desired_mo_payment,
		appt_month: appt_month,
		appt_days: appt_days,
		appt_year: appt_year,
		applilcant_v_trade_year: applilcant_v_trade_year,
		applilcant_v_trade_make: applilcant_v_trade_make,
		applilcant_v_trade_model: applilcant_v_trade_model,
		currently_ownvehicle: currently_ownvehicle,
		applilcant_v_trade_lien_holder_name: applilcant_v_trade_lien_holder_name,
		current_carpayment: current_carpayment,
		pymnthistry_tradevehicle: pymnthistry_tradevehicle,
		currently_tradevehicle: currently_tradevehicle,
		applilcant_v_trade_owed: applilcant_v_trade_owed,
		currently_reasontradevehicle: currently_reasontradevehicle,
		appt_month: appt_month, appt_days: appt_days,
		appt_year: appt_year, other_income_source: other_income_source,
		other_income: other_income,
		applicant_ssn: applicant_ssn,
		applicant_dob: applicant_dob,
		applicant_driver_licenses_number: applicant_driver_licenses_number,
		applicant_driver_state_issued: applicant_driver_state_issued,
		applicant_driver_licenses_expdate: applicant_driver_licenses_expdate
	   },
		   function(result) {
			   //$('#centerResult').html(result).show();
			   //console.log(result);
			});



}