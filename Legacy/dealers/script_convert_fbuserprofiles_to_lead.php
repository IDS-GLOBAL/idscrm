<?php require_once("db_loggedin.php"); ?>
<?php

$colname_find_fbuser = "-1";
if (isset($_GET['fbuser_id'])) {
  $colname_find_fbuser = $_GET['fbuser_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_fbuser =  "SELECT * FROM `idsids_idsdms`.`fbuserprofiles` WHERE `fbuser_id` = '$colname_find_fbuser'";
$find_fbuser = mysqli_query($idsconnection_mysqli, $query_find_fbuser);
$row_find_fbuser = mysqli_fetch_assoc($find_fbuser);
$totalRows_find_fbuser = mysqli_num_rows($find_fbuser);




$fbuser_id = $row_find_fbuser['fbuser_id'];

$fbuser_primary_did = $row_find_fbuser['fbuser_primary_did'];
$fbuser_primary_sid = $row_find_fbuser['fbuser_primary_sid'];
$sales_person_nametxt = $row_find_fbuser['sales_person_nametxt'];
$fbuser_primary_vid = $row_find_fbuser['fbuser_primary_vid'];
$fbuser_primary_cid = $row_find_fbuser['fbuser_primary_cid'];
$fbuser_fbid = $row_find_fbuser['fbuser_fbid'];
$fbuser_fbpicture = $row_find_fbuser['fbuser_fbpicture'];
$fbuser_tokenid = $row_find_fbuser['fbuser_tokenid'];
$fbfullname = $row_find_fbuser['fbfullname'];
$fbsex = $row_find_fbuser['fbsex'];
$fb_income_years = $row_find_fbuser['fb_income_years'];
$fb_income_months = $row_find_fbuser['fb_income_months'];
$fb_monthly_income = $row_find_fbuser['fb_monthly_income'];
$fbuser_email_address = $row_find_fbuser['fbuser_email_address'];
$fbuser_fbemail = $row_find_fbuser['fbuser_fbemail'];
$fbuser_username = $row_find_fbuser['fbuser_username'];
$fbuser_password = $row_find_fbuser['fbuser_password'];
$fbuser_verified = $row_find_fbuser['fbuser_verified'];
$fbuser_status = $row_find_fbuser['fbuser_status'];
$fb_onlinetime = $row_find_fbuser['fb_onlinetime'];
$joint_or_invidividual = $row_find_fbuser['joint_or_invidividual'];
$credit_app_type = $row_find_fbuser['credit_app_type'];

$app_approval_status = $row_find_fbuser['app_approval_status'];
$credit_app_source = $row_find_fbuser['credit_app_source'];
$applicant_bestapptdatetime = $row_find_fbuser['applicant_bestapptdatetime'];
$applicant_driver_licenses_number = $row_find_fbuser['applicant_driver_licenses_number'];
$applicant_driver_licenses_status = $row_find_fbuser['applicant_driver_licenses_status'];
$applicant_driver_state_issued = $row_find_fbuser['applicant_driver_state_issued'];
$applicant_ssn = $row_find_fbuser['applicant_ssn'];
$applicant_ssn4 = $row_find_fbuser['applicant_ssn4'];
$applicant_dob = $row_find_fbuser['applicant_dob'];
$applicant_age = $row_find_fbuser['applicant_age'];
$applicant_titlename = $row_find_fbuser['applicant_titlename'];
$applicant_name = $row_find_fbuser['applicant_name'];
$applicant_fname = $row_find_fbuser['applicant_fname'];
$applicant_mname = $row_find_fbuser['applicant_mname'];
$applicant_lname = $row_find_fbuser['applicant_lname'];
$applicant_other_name = $row_find_fbuser['applicant_other_name'];
$applicant_maiden_name = $row_find_fbuser['applicant_maiden_name'];
$applicant_main_phone = $row_find_fbuser['applicant_main_phone'];
$applicant_cell_phone = $row_find_fbuser['applicant_cell_phone'];
$applicant_present_address1 = $row_find_fbuser['applicant_present_address1'];
$applicant_present_address2 = $row_find_fbuser['applicant_present_address2'];
$applicant_present_addr_city = $row_find_fbuser['applicant_present_addr_city'];
$applicant_previous2_addr_state = $row_find_fbuser['applicant_previous2_addr_state'];
$applicant_previous2_addr_zip = $row_find_fbuser['applicant_previous2_addr_zip'];
$applicant_previous2_live_years = $row_find_fbuser['applicant_previous2_live_years'];
$applicant_previous2_live_months = $row_find_fbuser['applicant_previous2_live_months'];
$applicant_previous2_landlord_name = $row_find_fbuser['applicant_previous2_landlord_name'];
$applicant_previous2_landlord_phone = $row_find_fbuser['fbuser_primary_did'];
$applicant_employer1_name = $row_find_fbuser['applicant_employer1_name'];
$applicant_employer1_addr = $row_find_fbuser['applicant_employer1_addr'];
$applicant_employer1_city = $row_find_fbuser['applicant_employer1_city'];
$applicant_employer1_state = $row_find_fbuser['applicant_employer1_state'];
$applicant_employer1_zip = $row_find_fbuser['applicant_employer1_zip'];
$applicant_employer1_phone = $row_find_fbuser['applicant_employer1_phone'];
$applicant_employer1_phone_ext = $row_find_fbuser['applicant_employer1_phone_ext'];
$applicant_employer1_work_years = $row_find_fbuser['applicant_employer1_work_years'];
$applicant_employer1_work_months = $row_find_fbuser['applicant_employer1_work_months'];
$applicant_employer1_position = $row_find_fbuser['applicant_employer1_position'];
$applicant_employer1_department = $row_find_fbuser['applicant_employer1_department'];
$applicant_employer1_supervisors_name = $row_find_fbuser['applicant_employer1_supervisors_name'];
$applicant_employer1_supervisors_phone = $row_find_fbuser['applicant_employer1_supervisors_phone'];
$applicant_employer1_hours_shift = $row_find_fbuser['applicant_employer1_hours_shift'];
$applicant_employer1_salary_bringhome = $row_find_fbuser['applicant_employer1_salary_bringhome'];
$applicant_employer1_payday_freq = $row_find_fbuser['applicant_employer1_payday_freq'];
$applicant_employer_form_of_pymt = $row_find_fbuser['applicant_employer_form_of_pymt'];
$applicant_other_income_amount = $row_find_fbuser['applicant_other_income_amount'];
$applicant_other_income_source = $row_find_fbuser['applicant_other_income_source'];
$applicant_other_income_when_rcvd = $row_find_fbuser['applicant_other_income_when_rcvd'];
$user_applicant_employer_notes = $row_find_fbuser['user_applicant_employer_notes'];
$applicant_employer2_name = $row_find_fbuser['applicant_employer2_name'];
$applicant_employer2_addr = $row_find_fbuser['applicant_employer2_addr'];
$applicant_employer2_city = $row_find_fbuser['applicant_employer2_city'];
$applicant_employer2_state = $row_find_fbuser['applicant_employer2_state'];
$applicant_employer2_zip = $row_find_fbuser['applicant_employer2_zip'];
$applicant_employer2_phone = $row_find_fbuser['applicant_employer2_phone'];
$applicant_employer2_phone_ext = $row_find_fbuser['applicant_employer2_phone_ext'];
$applicant_employer2_work_years = $row_find_fbuser['applicant_employer2_work_years'];
$applicant_employer2_work_months = $row_find_fbuser['applicant_employer2_work_months'];
$applicant_employer2_position = $row_find_fbuser['applicant_employer2_position'];
$applicant_employer2_department = $row_find_fbuser['applicant_employer2_department'];
$applicant_employer2_supervisors_name = $row_find_fbuser['applicant_employer2_supervisors_name'];
$applicant_employer2_supervisors_phone = $row_find_fbuser['applicant_employer2_supervisors_phone'];
$applicant_employer2_hours_shift = $row_find_fbuser['applicant_employer2_hours_shift'];
$applicant_employer2_salary_bringhome = $row_find_fbuser['applicant_employer2_salary_bringhome'];
$applicant_employer1_payday_freq = $row_find_fbuser['applicant_employer2_payday_freq'];
$applicant_employer2_form_of_pymt = $row_find_fbuser['applicant_employer_form_of_pymt'];

$credit_app_last_modified = $row_find_fbuser['credit_app_last_modified'];
$application_created_date = $row_find_fbuser['application_created_date'];
$co_applicants_email_address = $row_find_fbuser['co_applicants_email_address'];
$applicant_digital_signature = $row_find_fbuser['applicant_digital_signature'];
$applicant_digital_signature = $row_find_fbuser['applicant_digital_signature_date'];
$coapplicant_digital_signature = $row_find_fbuser['coapplicant_digital_signature'];
$coapplicant_digital_signature = $row_find_fbuser['coapplicant_digital_signature_date'];




echo $log .= 'Converting FBuser To Cust Lead'.'<br />';

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('America/Central');
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}


$timevar = get_Datetime_Now();


$create_conversion_cust_lead_sql = "
INSERT INTO `idsids_idsdms`.`cust_leads` SET
				`cust_lead_sex` = '$fbsex',
				`cust_vehicle_id` = '$fbuser_primary_vid',
				`cust_salesperson_id` = '$fbuser_primary_sid',
				`cust_lead_token` = '$fbuser_tokenid',
				`cust_lead_modified_at` = '$timevar',
				`cust_titlename` = '$applicant_titlename',
				`cust_fname` = '$applicant_fname',
				`cust_mname` = '$applicant_mname',
				`cust_lname` = '$applicant_lname',
				`cust_nickname` = '$fbfullname',
				`cust_lead_source` = '$credit_app_source',
				`cust_lead_sex` = '$cust_lead_sex',
				`cust_lead_temperature` = 'HOT',
				`cust_homephone` = '$applicant_main_phone',
				`cust_mobilephone` = '$applicant_cell_phone',
				`cust_workphone` = '$applicant_employer1_phone',
				`cust_email` = '$fbuser_fbemail',
				`cust_home_address` = '$applicant_present_address1',
				`cust_home_address2` = '$applicant_present_address2',
				`cust_home_city` = '$applicant_present_addr_city',
				`cust_home_state` = '$applicant_present_addr_state',
				`cust_home_zip` = '$applicant_present_addr_zip',
				`cust_home_county` = '$applicant_present_addr_county',
				`cust_home_live_years` = '$applicant_addr_years',
				`cust_home_live_months` = '$applicant_addr_months',
				`cust_employer_name` = '$applicant_employer1_name',
				`cust_supervisors_name` = '$applicant_employer1_supervisors_name',
				`cust_supervisors_phone` = '$applicant_employer1_supervisors_phone $applicant_employer1_phone_ext',
				`cust_employer_addr1` = '$applicant_employer1_addr',
				`cust_employer_city` = '$applicant_employer1_city',
				`cust_employer_state` = '$applicant_employer1_state',
				`cust_employer_zip` = '$applicant_employer1_zip',
				`cust_employer_phone` = '$applicant_employer1_phone',
				`cust_employer_years` = '$applicant_employer1_work_years',
				`cust_employer_months` = '$applicant_employer1_work_months',
				`cust_gross_income` = '$applicant_other_income_amount',
				`cust_gross_income_frequency` = '$applicant_employer1_payday_freq',
				`cust_other_income` = '$applicant_other_income_source',
				`cust_other_income_amount` = '$applicant_other_income_amount',
				`cust_gross_other_income_frequency` = '$applicant_employer1_payday_freq',
				`cust_desiredpymt` = '$fb_desired_carpayment'
";


$run_update_cust_lead_sql = mysqli_query($idsconnection_mysqli, $update_cust_lead_sql);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_lead = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_lead_token` = '$fbuser_tokenid'";
$find_existing_lead = mysqli_query($idsconnection_mysqli, $query_find_existing_lead);
$row_find_existing_lead = mysqli_fetch_assoc($find_existing_lead);
$totalRows_find_existing_lead = mysqli_num_rows($find_existing_lead);

$cust_leadid = $row_find_existing_lead['cust_leadid'];





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_customer = "SELECT * FROM `idsids_idsdms`.`customers` WHERE `customers`.`customer_facebook_id` = '$fbuser_fbid' OR WHERE `customers`.`customer_email` = '$fbuser_fbemail' AND `customers`.`customer_dealer_id` = '$did' ";
$find_existing_customer = mysqli_query($idsconnection_mysqli, $query_find_existing_customer);
$row_find_existing_customer = mysqli_fetch_assoc($find_existing_customer);
$totalRows_find_existing_customer = mysqli_num_rows($find_existing_customer);


if($totalRows_find_existing_customer==0){




$create_conversion_customers_sql = "
INSERT INTO `idsids_idsdms`.`customers` SET
		`customer_frmsource` = 'facebook conversion',
		`customer_facebook_id` = '$fbuser_id',
		`customer_leads_id` = '$cust_leadid',
		`customer_dealer_id` = '$did',
		`customer_sex` = '$fbsex',
		`customer_vehicles_id` = '$fbuser_primary_vid',
		`customer_sales_person_id` = '$fbuser_primary_sid',
		`customer_token_id` = '$fbuser_tokenid',
		`cust_lead_modified_at` = '$timevar',
		`customer_title` = '$applicant_titlename',
		`customer_fname` = '$applicant_fname',
		`customer_mname` = '$applicant_mname',
		`customer_lname` = '$applicant_lname',
		`cust_nickname` = '$fbfullname',
		`cust_lead_source` = '$credit_app_source',
		`customer_sex` = '$cust_lead_sex',
		`cust_lead_temperature` = 'HOT',
		`cust_homephone` = '$applicant_main_phone',
		`cust_mobilephone` = '$applicant_cell_phone',
		`cust_workphone` = '$applicant_employer1_phone',
		`customer_email` = '$fbuser_fbemail',
		`customer_home_addr1` = '$applicant_present_address1',
		`customer_home_addr2` = '$applicant_present_address2',
		`customer_home_city` = '$applicant_present_addr_city',
		`customer_home_state` = '$applicant_present_addr_state',
		`customer_home_zip` = '$applicant_present_addr_zip',
		`customer_home_county` = '$applicant_present_addr_county',
		`customer_home_live_years` = '$applicant_addr_years',
		`customer_home_live_months` = '$applicant_addr_months',
		`customer_employer_name` = '$applicant_employer1_name',
		`cust_supervisors_name` = '$applicant_employer1_supervisors_name',
		`cust_supervisors_phone` = '$applicant_employer1_supervisors_phone $applicant_employer1_phone_ext',
		`customer_employer_addr1` = '$applicant_employer1_addr',
		`customer_employer_city` = '$applicant_employer1_city',
		`customer_employer_state` = '$applicant_employer1_state',
		`customer_employer_zip` = '$applicant_employer1_zip',
		`customer_employer_phone` = '$applicant_employer1_phone',
		`customer_employer_years` = '$applicant_employer1_work_years',
		`customer_employer_months` = '$applicant_employer1_work_months',
		`customer_gross_income` = '$applicant_other_income_amount',
		`customer_income_frequency` = '$applicant_employer1_payday_freq',
		`customer_income_other` = '$applicant_other_income_source',
		`customer_income_other_amount` = '$applicant_other_income_amount'
";


$run_create_conversion_customers_sql = mysqli_query($idsconnection_mysqli, $create_conversion_customers_sql);


}






include("inc.end.phpmsyql.php");



?>