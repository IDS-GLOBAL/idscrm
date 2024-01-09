<?php require_once("db_sales_loggedin.php"); ?>
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

$cust_dealer_id = mysql_real_escape_string(trim($row_find_cust_lead['cust_dealer_id']));
$cust_salesperson_id = mysql_real_escape_string(trim($row_find_cust_lead['cust_salesperson_id']));
$sales_person_nametxt = mysql_real_escape_string(trim($row_find_cust_lead['sales_person_nametxt']));
$cust_vehicle_id = mysql_real_escape_string(trim($row_find_cust_lead['cust_vehicle_id']));
$cust_lead_type = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_type']));
$cust_finance_type = mysql_real_escape_string(trim($row_find_cust_lead['cust_finance_type']));
$cust_lead_token = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_token']));

$cust_lead_sex = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_sex']));

$cust_date_td= mysql_real_escape_string(trim($row_find_cust_lead['cust_date_td']));
//$applicant_driver_licenses_number = mysql_real_escape_string(trim($row_find_cust_lead['applicant_driver_licenses_number']));
//$applicant_driver_licenses_status = mysql_real_escape_string(trim($row_find_cust_lead['applicant_driver_licenses_status']));
//$applicant_driver_state_issued = mysql_real_escape_string(trim($row_find_cust_lead['applicant_driver_state_issued']));
//$cust_ssn = mysql_real_escape_string(trim($row_find_cust_lead['cust_ssn']));
//$cust_ssn_4 = mysql_real_escape_string(trim($row_find_cust_lead['cust_ssn_4']));
//$applicant_dob = mysql_real_escape_string(trim($row_find_cust_lead['applicant_dob']));
//$applicant_age = mysql_real_escape_string(trim($row_find_cust_lead['applicant_age']));


$fbid = mysql_real_escape_string(trim($row_find_cust_lead['fbid']));
$cust_lead_sex = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_sex']));
$cust_titlename = mysql_real_escape_string(trim($row_find_cust_lead['cust_titlename']));
$cust_nickname = mysql_real_escape_string(trim($row_find_cust_lead['cust_nickname']));
$cust_fname = mysql_real_escape_string(trim($row_find_cust_lead['cust_fname']));
$cust_mname = mysql_real_escape_string(trim($row_find_cust_lead['cust_mname']));
$cust_lname = mysql_real_escape_string(trim($row_find_cust_lead['cust_lname']));
$cust_name_suffix = mysql_real_escape_string(trim($row_find_cust_lead['cust_name_suffix']));


if(!$cust_fname && !$cust_lname){
	
	if($cust_nickname){

	//$cust_names = explode(" ", $cust_nickname);
	//$cust_fname = cust_names[0];
	//$cust_lname = cust_names[1];
	//echo 'Assigned Names ';
	}
}



$cust_email = mysql_real_escape_string(trim($row_find_cust_lead['cust_email']));
$applicant_main_phone = mysql_real_escape_string(trim($row_find_cust_lead['cust_homephone']));
$cust_mobilephone = mysql_real_escape_string(trim($row_find_cust_lead['cust_mobilephone']));
$cust_homephone = mysql_real_escape_string(trim($row_find_cust_lead['cust_homephone']));
$cust_workphone = mysql_real_escape_string(trim($row_find_cust_lead['cust_workphone']));

$cust_lead_source = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_source']));

$cust_home_address = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_address']));
$cust_home_address2 = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_address2']));
$cust_home_address3 = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_address3']));
$cust_home_city = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_city']));
$cust_home_state = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_state']));
$cust_home_zip = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_zip']));
$cust_home_county = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_county']));
$cust_home_live_movindate = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_live_movindate']));
$cust_home_live_years = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_live_years']));
$cust_home_live_months = mysql_real_escape_string(trim($row_find_cust_lead['cust_home_live_months']));

$cust_employer_name = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_name']));
$cust_employer_addr1 = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_addr1']));
$cust_employer_addr2 = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_addr2']));
$cust_employer_city = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_city']));
$cust_employer_state = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_state']));
$cust_employer_zip = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_zip']));
$cust_employer_phone = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_phone']));
$cust_employer_dateohire = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_dateohire']));
$cust_supervisors_name = mysql_real_escape_string(trim($row_find_cust_lead['cust_supervisors_name']));
$cust_supervisors_phone = mysql_real_escape_string(trim($row_find_cust_lead['cust_supervisors_phone']));
$cust_supervisors_ext = mysql_real_escape_string(trim($row_find_cust_lead['cust_supervisors_ext']));

$cust_employer_dateohire = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_dateohire']));
$cust_employer_years = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_years']));
$cust_employer_months = mysql_real_escape_string(trim($row_find_cust_lead['cust_employer_months']));

//$applicant_employer1_position = mysql_real_escape_string(trim($row_find_cust_lead['applicant_employer1_position']));
//$applicant_employer1_department = mysql_real_escape_string(trim($row_find_cust_lead['applicant_employer1_department']));
$cust_supervisors_name = mysql_real_escape_string(trim($row_find_cust_lead['cust_supervisors_name']));
$cust_supervisors_phone = mysql_real_escape_string(trim($row_find_cust_lead['cust_supervisors_phone']));
//$applicant_employer1_hours_shift = mysql_real_escape_string(trim($row_find_cust_lead['applicant_employer1_hours_shift']));

$cust_gross_income = mysql_real_escape_string(trim($row_find_cust_lead['cust_gross_income']));
$cust_gross_income_frequency = mysql_real_escape_string(trim($row_find_cust_lead['cust_gross_income_frequency']));
$cust_other_income = mysql_real_escape_string(trim($row_find_cust_lead['cust_other_income']));
$cust_other_income_amount = mysql_real_escape_string(trim($row_find_cust_lead['cust_other_income_amount']));
$cust_gross_other_income_frequency = mysql_real_escape_string(trim($row_find_cust_lead['cust_gross_other_income_frequency']));

$cust_desiredpymt = mysql_real_escape_string(trim($row_find_cust_lead['cust_desiredpymt']));
$cust_car_loan = mysql_real_escape_string(trim($row_find_cust_lead['cust_car_loan']));
$cust_dealtoday = mysql_real_escape_string(trim($row_find_cust_lead['cust_dealtoday']));
$cust_vstockno = mysql_real_escape_string(trim($row_find_cust_lead['cust_vstockno']));
$cust_vyear = mysql_real_escape_string(trim($row_find_cust_lead['cust_vyear']));
$cust_vmake = mysql_real_escape_string(trim($row_find_cust_lead['cust_vmake']));
$cust_vmodel = mysql_real_escape_string(trim($row_find_cust_lead['cust_vmodel']));
$cust_vtrim = mysql_real_escape_string(trim($row_find_cust_lead['cust_vtrim']));
$cust_vbody = mysql_real_escape_string(trim($row_find_cust_lead['cust_vbody']));
$cust_vmiles = mysql_real_escape_string(trim($row_find_cust_lead['cust_vmiles']));
$cust_vsellingprice = mysql_real_escape_string(trim($row_find_cust_lead['cust_vsellingprice']));
$tradeYes = mysql_real_escape_string(trim($row_find_cust_lead['tradeYes']));
$tradeVin = mysql_real_escape_string(trim($row_find_cust_lead['tradeVin']));
$tradeYear = mysql_real_escape_string(trim($row_find_cust_lead['tradeYear']));
$tradeMake = mysql_real_escape_string(trim($row_find_cust_lead['tradeMake']));
$tradeModel = mysql_real_escape_string(trim($row_find_cust_lead['tradeModel']));
$tradeTrim = mysql_real_escape_string(trim($row_find_cust_lead['tradeTrim']));
$tradeMiles = mysql_real_escape_string(trim($row_find_cust_lead['tradeMiles']));
$tradePayoff = mysql_real_escape_string(trim($row_find_cust_lead['tradePayoff']));
$tradePayment = mysql_real_escape_string(trim($row_find_cust_lead['tradePayment']));

$cust_lead_modified_at = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_modified_at']));
$cust_lead_created_at = mysql_real_escape_string(trim($row_find_cust_lead['cust_lead_created_at']));




echo $log .= 'Converting Lead to Customer'.'<br />';

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






mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_customer = "SELECT * FROM `idsids_idsdms`.`customers` WHERE `customers`.`customer_email` = '$cust_email' AND `customers`.`customer_dealer_id` = '$did' ";
$find_existing_customer = mysqli_query($idsconnection_mysqli, $query_find_existing_customer);
$row_find_existing_customer = mysqli_fetch_assoc($find_existing_customer);
$totalRows_find_existing_customer = mysqli_num_rows($find_existing_customer);




if($totalRows_find_existing_customer==0){


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_howmany_customers = "SELECT `customer_id`, `customer_no`, `customer_dealer_id` FROM `idsids_idsdms`.`customers` WHERE `customer_dealer_id` = '$did' ORDER BY `customer_no` DESC";
$howmany_customers = mysqli_query($idsconnection_mysqli, $query_howmany_customers);
$row_howmany_customers = mysqli_fetch_assoc($howmany_customers);
$totalRows_howmany_customers = mysqli_num_rows($howmany_customers);

$customer_no = $row_howmany_customers['customer_no'];

if(!$customer_no){

	$customer_no = 1000;
	
}else{
	
	$customer_no = $customer_no++;
}



if(!$cust_lead_token){
	
	$cust_lead_token = $tkey;
	
	$update_lead_with_token_sql ="
		UPDATE `idsids_idsdms`.`cust_leads` SET
			`cust_lead_token` = '$cust_lead_token'
		WHERE
			`cust_leadid` = '$cust_leadid'
	";
$run_lead_with_token_sql = mysqli_query($idsconnection_mysqli, $update_lead_with_token_sql);

}



echo $create_conversion_lead_to_customers_sql = "
INSERT INTO `idsids_idsdms`.`customers` SET
		`customer_frmsource` = 'Lead Conversion',
		`customer_no` = '$customer_no',
		`customer_facebook_id` = '$fbid',
		`customer_leads_id` = '$cust_leadid',
		`customer_dealer_id` = '$did',
		`customer_sex` = '$cust_lead_sex',
		`customer_vehicles_id` = '$cust_vehicle_id',
		`customer_sales_person_id` = '$cust_salesperson_id',
		`customer_token_id` = '$cust_lead_token',
		`customer_status` = '1',
		`customer_date_modified` = '$timevar',
		`customer_title` = '$cust_titlename',
		`customer_nickname` = '$cust_nickname',
		`customer_fname` = '$cust_fname',
		`customer_mname` = '$cust_mname',
		`customer_lname` = '$cust_lname',
		`customer_lead_temperature` = 'HOT',
		`customer_phoneno` = '$cust_homephone',
		`customer_cellphone` = '$cust_mobilephone',
		`customer_work_phone` = '$cust_workphone',
		`customer_email` = '$cust_email',
		`customer_home_addr1` = '$cust_home_address',
		`customer_home_addr2` = '$cust_home_address2 $cust_home_address3',
		`customer_home_city` = '$cust_home_city',
		`customer_home_state` = '$cust_home_state',
		`customer_home_zip` = '$cust_home_zip',
		`customer_home_county` = '$cust_home_county',
		`customer_home_live_years` = '$cust_home_live_years',
		`customer_home_live_months` = '$cust_home_live_months',
		`customer_employer_name` = '$cust_employer_name',
		`customer_supervisors_name` = '$cust_supervisors_name',
		`customer_supervisors_phone` = '$cust_supervisors_phone',
		`customer_supervisors_phone_ext` = '$cust_supervisors_ext',
		`customer_employer_addr1` = '$cust_employer_addr1',
		`customer_employer_addr2` = '$cust_employer_addr2',
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


$run_create_conversion_lead_to_customers_sql = mysqli_query($idsconnection_mysqli, $create_conversion_lead_to_customers_sql);


}







/*


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


//$run_update_cust_lead_sql = mysqli_query($idsconnection_mysqli, $update_cust_lead_sql);

*/















?>