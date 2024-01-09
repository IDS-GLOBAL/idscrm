<?php require_once("sales_db_loggedin.php"); ?>
<?php

$colname_find_cust_lead = "-1";
if (isset($_POST['cust_leadid'])) {
  $colname_find_cust_lead = $_POST['cust_leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_cust_lead =  "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leadid` = '$colname_find_cust_lead'";
$find_cust_lead = mysqli_query($idsconnection_mysqli, $query_find_cust_lead);
$row_find_cust_lead = mysqli_fetch_assoc($find_cust_lead);
$totalRows_find_cust_lead = mysqli_num_rows($find_cust_lead);

$log = "";


$cust_leadid = $row_find_cust_lead['cust_leadid'];
if(!$cust_leadid){echo 'Exiting'; exit; }

$fbid = $row_find_cust_lead['fbid'];
$cust_dealer_id = $row_find_cust_lead['cust_dealer_id'];
$cust_salesperson_id = $row_find_cust_lead['cust_salesperson_id'];
$sales_person_nametxt = $row_find_cust_lead['sales_person_nametxt'];
$cust_vehicle_id = $row_find_cust_lead['cust_vehicle_id'];
$cust_lead_type = $row_find_cust_lead['cust_lead_type'];
$cust_finance_type = $row_find_cust_lead['cust_finance_type'];
$cust_lead_token = $row_find_cust_lead['cust_lead_token'];
$cust_lead_sex = $row_find_cust_lead['cust_lead_sex'];

$cust_date_td= $row_find_cust_lead['cust_date_td'];
//$applicant_driver_licenses_number = $row_find_cust_lead['applicant_driver_licenses_number'];
//$applicant_driver_licenses_status = $row_find_cust_lead['applicant_driver_licenses_status'];
//$applicant_driver_state_issued = $row_find_cust_lead['applicant_driver_state_issued'];
//$cust_ssn = $row_find_cust_lead['cust_ssn'];
//$cust_ssn_4 = $row_find_cust_lead['cust_ssn_4'];
//$applicant_dob = $row_find_cust_lead['applicant_dob'];
//$applicant_age = $row_find_cust_lead['applicant_age'];

$cust_titlename = $row_find_cust_lead['cust_titlename'];
$cust_nickname = $row_find_cust_lead['cust_nickname'];
$cust_fname = $row_find_cust_lead['cust_fname'];
$cust_mname = $row_find_cust_lead['cust_mname'];
$cust_lname = $row_find_cust_lead['cust_lname'];
$cust_name_suffix = $row_find_cust_lead['cust_name_suffix'];
$cust_email= $row_find_cust_lead['cust_email'];
$cust_phoneno = $row_find_cust_lead['cust_phoneno'];
$cust_mobilephone = $row_find_cust_lead['cust_mobilephone'];
$cust_homephone = $row_find_cust_lead['cust_homephone'];
$cust_workphone = $row_find_cust_lead['cust_workphone'];

$cust_lead_source = $row_find_cust_lead['cust_lead_source'];

$cust_home_address = $row_find_cust_lead['cust_home_address'];
$cust_home_address2 = $row_find_cust_lead['cust_home_address2'];
$cust_home_address3 = $row_find_cust_lead['cust_home_address3'];
$cust_home_city = $row_find_cust_lead['cust_home_city'];
$cust_home_state = $row_find_cust_lead['cust_home_state'];
$cust_home_zip = $row_find_cust_lead['cust_home_zip'];
$cust_home_county = $row_find_cust_lead['cust_home_county'];
$cust_home_live_movindate = $row_find_cust_lead['cust_home_live_movindate'];
$cust_home_live_years = $row_find_cust_lead['cust_home_live_years'];
$cust_home_live_months = $row_find_cust_lead['cust_home_live_months'];

$cust_employer_name = $row_find_cust_lead['cust_employer_name'];
$cust_employer_addr1 = $row_find_cust_lead['cust_employer_addr1'];
$cust_employer_addr2 = $row_find_cust_lead['cust_employer_addr2'];
$cust_employer_city = $row_find_cust_lead['cust_employer_city'];
$cust_employer_state = $row_find_cust_lead['cust_employer_state'];
$cust_employer_zip = $row_find_cust_lead['cust_employer_zip'];
$cust_employer_phone = $row_find_cust_lead['cust_employer_phone'];
$cust_employer_dateohire = $row_find_cust_lead['cust_employer_dateohire'];
$cust_supervisors_name = $row_find_cust_lead['cust_supervisors_name'];
$cust_supervisors_phone = $row_find_cust_lead['cust_supervisors_phone'];
$cust_supervisors_ext = $row_find_cust_lead['cust_supervisors_ext'];

$cust_employer_dateohire = $row_find_cust_lead['cust_employer_dateohire'];
$cust_employer_years = $row_find_cust_lead['cust_employer_years'];
$cust_employer_months = $row_find_cust_lead['cust_employer_months'];

//$applicant_employer1_position = $row_find_cust_lead['applicant_employer1_position'];
//$applicant_employer1_department = $row_find_cust_lead['applicant_employer1_department'];
$cust_supervisors_name = $row_find_cust_lead['cust_supervisors_name'];
$cust_supervisors_phone = $row_find_cust_lead['cust_supervisors_phone'];
//$applicant_employer1_hours_shift = $row_find_cust_lead['applicant_employer1_hours_shift'];

$cust_gross_income = $row_find_cust_lead['cust_gross_income'];
$cust_gross_income_frequency = $row_find_cust_lead['cust_gross_income_frequency'];
$cust_other_income = $row_find_cust_lead['cust_other_income'];
$cust_other_income_amount = $row_find_cust_lead['cust_other_income_amount'];
$cust_gross_other_income_frequency = $row_find_cust_lead['cust_gross_other_income_frequency'];

$cust_desiredpymt = $row_find_cust_lead['cust_desiredpymt'];
$cust_car_loan = $row_find_cust_lead['cust_car_loan'];
$cust_dealtoday = $row_find_cust_lead['cust_dealtoday'];
$cust_vstockno = $row_find_cust_lead['cust_vstockno'];
$cust_vyear = $row_find_cust_lead['cust_vyear'];
$cust_vmake = $row_find_cust_lead['cust_vmake'];
$cust_vmodel = $row_find_cust_lead['cust_vmodel'];
$cust_vtrim = $row_find_cust_lead['cust_vtrim'];
$cust_vbody = $row_find_cust_lead['cust_vbody'];
$cust_vmiles = $row_find_cust_lead['cust_vmiles'];
$cust_vsellingprice = $row_find_cust_lead['cust_vsellingprice'];
$tradeYes = $row_find_cust_lead['tradeYes'];
$tradeVin = $row_find_cust_lead['tradeVin'];
$tradeYear = $row_find_cust_lead['tradeYear'];
$tradeMake = $row_find_cust_lead['tradeMake'];
$tradeModel = $row_find_cust_lead['tradeModel'];
$tradeTrim = $row_find_cust_lead['tradeTrim'];
$tradeMiles = $row_find_cust_lead['tradeMiles'];
$tradePayoff = $row_find_cust_lead['tradePayoff'];
$tradePayment = $row_find_cust_lead['tradePayment'];

$cust_lead_modified_at = $row_find_cust_lead['cust_lead_modified_at'];
$cust_lead_created_at = $row_find_cust_lead['cust_lead_created_at'];




echo $log .= 'Converting Lead to Credit Application'.'<br />';

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('America/Chicago');
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}


$timevar = get_Datetime_Now();

// Hackbefore if statement
$sales_person_nametxt = '';

if($cust_salesperson_id){

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_sales_person_name = "SELECT `salesperson_id`, `salesperson_firstname`, `salesperson_lastname`, `salesperson_nickname`, `salesperson_email` FROM `idsids_idsdms`.`sales_person` WHERE `salesperson_id` = '$cust_salesperson_id'";
$find_sales_person_name = mysqli_query($idsconnection_mysqli, $query_find_sales_person_name);
$row_find_sales_person_name = mysqli_fetch_assoc($find_sales_person_name);
$totalRows_find_sales_person_name = mysqli_num_rows($find_sales_person_name);



$sales_person_nametxt = $row_find_sales_person_name['salesperson_firstname'].' '.$row_find_sales_person_name['salesperson_lastname'];

}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_howmany_creditapps = "SELECT `credit_app_fullblown_id`, `credit_app_locked`, `app_number`, `app_deal_number`, `app_deal_id`, `applicant_did` FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `applicant_did` = '$did' ORDER BY `app_number` DESC";
$howmany_creditapps = mysqli_query($idsconnection_mysqli, $query_howmany_creditapps);
$row_howmany_creditapps = mysqli_fetch_assoc($howmany_creditapps);
$totalRows_howmany_creditapps = mysqli_num_rows($howmany_creditapps);


$app_number = $row_howmany_creditapps['app_number'];

if($totalRows_howmany_creditapps == 0 || !$app_number){$app_number = '1000'; }else{ $app_number = 1+$app_number; }



$create_conversion_credit_app_sql = "
INSERT INTO `idsids_idsdms`.`credit_app_fullblown` SET
				`credit_app_locked` = '0',
				`app_number` = '$app_number',
				`applicant_did` = '$did',
				`applicant_vid` = '$cust_vehicle_id',
				`applicant_sid` = '$cust_salesperson_id',
				`applicant_sid_name` = '$sales_person_nametxt',
				`credit_app_last_modified` = '$timevar',
				`applicant_clid` = '$cust_leadid',
				`applicant_app_token` = '$cust_lead_token',
				`applicant_titlename` = '$cust_titlename',
				`applicant_fname` = '$cust_fname',
				`applicant_mname` = '$cust_mname',
				`applicant_lname` = '$cust_lname',
				`applicant_name` = '$cust_nickname',
				`credit_app_source` = '$cust_lead_source',
				`applicant_main_phone` = '$cust_homephone',
				`applicant_cell_phone` = '$cust_mobilephone',
				`applicant_email_address` = '$cust_email',
				`applicant_present_address1` = '$cust_home_address',
				`applicant_present_address2` = '$cust_home_address2',
				`applicant_present_addr_city` = '$cust_home_city',
				`applicant_present_addr_state` = '$cust_home_state',
				`applicant_present_addr_zip` = '$cust_home_zip',
				`applicant_present_addr_county` = '$cust_home_county',
				`applicant_addr_years` = '$cust_home_live_years',
				`applicant_addr_months` = '$cust_home_live_months',
				`applicant_employer1_name` = '$cust_employer_name',
				`applicant_employer1_supervisors_name` = '$cust_supervisors_name',
				`applicant_employer1_supervisors_phone` = '$cust_supervisors_phone',
				`applicant_employer1_supervisors_phone_ext` = '$cust_supervisors_ext',
				`applicant_employer1_addr` = '$cust_employer_addr1',
				`applicant_employer1_city` = '$cust_employer_city',
				`applicant_employer1_state` = '$cust_employer_state',
				`applicant_employer1_zip` = '$cust_employer_zip',
				`applicant_employer1_phone` = '$cust_workphone',
				`applicant_employer1_work_years` = '$cust_employer_years',
				`applicant_employer1_work_months` = '$cust_employer_months',
				`applicant_other_income_source` = '$cust_other_income',
				`applicant_other_income_amount` = '$cust_other_income_amount',
				`applicant_employer1_payday_freq` = '$cust_gross_other_income_frequency',
				`applicant_desired_mo_payment` = '$cust_desiredpymt'
";


$run_create_credit_app_sql = mysqli_query($idsconnection_mysqli, $create_conversion_credit_app_sql);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_lead = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_lead_token` = '$cust_lead_token'";
$find_existing_lead = mysqli_query($idsconnection_mysqli, $query_find_existing_lead);
$row_find_existing_lead = mysqli_fetch_assoc($find_existing_lead);
$totalRows_find_existing_lead = mysqli_num_rows($find_existing_lead);

$cust_leadid = $row_find_existing_lead['cust_leadid'];





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_customer = "SELECT * FROM `idsids_idsdms`.`customers` WHERE `customers`.`customer_facebook_id` = '$fbid' OR `customers`.`customer_email` = '$cust_email' AND `customers`.`customer_dealer_id` = '$did' ";
$find_existing_customer = mysqli_query($idsconnection_mysqli, $query_find_existing_customer);
$row_find_existing_customer = mysqli_fetch_assoc($find_existing_customer);
$totalRows_find_existing_customer = mysqli_num_rows($find_existing_customer);


if($totalRows_find_existing_customer==0){




$create_conversion_customers_sql = "
INSERT INTO `idsids_idsdms`.`customers` SET
		`customer_frmsource` = 'lead to credit app conversion',
		`customer_facebook_id` = '$fbid',
		`customer_leads_id` = '$cust_leadid',
		`customer_dealer_id` = '$did',
		`customer_sex` = '$cust_lead_sex',
		`customer_vehicles_id` = '$cust_vehicle_id',
		`customer_sales_person_id` = '$cust_salesperson_id',
		`customer_token_id` = '$cust_lead_token',
		`customer_date_modified` = '$timevar',
		`customer_title` = '$cust_titlename',
		`customer_fname` = '$cust_fname',
		`customer_mname` = '$cust_mname',
		`customer_lname` = '$cust_lname',
		`customer_nickname` = '$cust_nickname',
		`customer_frmsource` = '$cust_lead_source',
		`customer_lead_temperature` = 'HOT',
		`customer_phoneno` = '$cust_phoneno',
		`customer_cellphone` = '$cust_mobilephone',
		`customer_work_phone` = '$cust_workphone',
		`customer_email` = '$cust_email',
		`customer_home_addr1` = '$cust_home_address',
		`customer_home_addr2` = '$cust_home_address2 cust_home_address3',
		`customer_home_city` = '$cust_home_city',
		`customer_home_state` = '$cust_home_state',
		`customer_home_zip` = '$cust_home_zip',
		`customer_home_county` = '$cust_home_county',
		`customer_home_live_movindate` = '$cust_home_live_movindate',
		`customer_home_live_years` = '$cust_home_live_years',
		`customer_home_live_months` = '$cust_home_live_months',
		`customer_employer_name` = '$cust_employer_name',
		`customer_supervisors_name` = '$cust_supervisors_name',
		`customer_supervisors_phone` = '$cust_supervisors_phone'
		`customer_supervisors_phone_ext` = '$cust_supervisors_ext',
		`customer_employer_addr1` = '$cust_employer_addr1',
		`customer_employer_addr2` = 'cust_employer_addr2',
		`customer_employer_city` = '$cust_employer_city',
		`customer_employer_state` = '$cust_employer_state',
		`customer_employer_zip` = '$cust_employer_zip',
		`customer_employer_phone` = '$cust_employer_phone',
		`customer_employer_hiredate` = '$cust_employer_dateohire',
		`customer_employer_years` = '$cust_employer_years',
		`customer_employer_months` = '$cust_employer_months',
		`customer_gross_income` = '$cust_gross_income',
		`customer_income_frequency` = '$cust_gross_income_frequency',
		`customer_income_other` = '$cust_other_income',
		`customer_income_other_amount` = '$cust_other_income_amount',
		`customer_income_other_frequency` = '$cust_gross_other_income_frequency'
";


$run_create_conversion_customers_sql = mysqli_query($idsconnection_mysqli, $create_conversion_customers_sql);


}










?>