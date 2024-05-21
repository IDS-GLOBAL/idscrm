<?php require_once("db_loggedin.php"); ?>
<?php

$colname_view_thiscustomer = "-1";
if (isset($_GET['customer_id'])) {
  $colname_view_thiscustomer = $_GET['customer_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thiscustomer =  "SELECT * FROM customers WHERE customer_id = %s", GetSQLValueString($colname_view_thiscustomer, "int"));
$view_thiscustomer = mysqli_query($idsconnection_mysqli, $query_view_thiscustomer);
$row_view_thiscustomer = mysqli_fetch_assoc($view_thiscustomer);
$totalRows_view_thiscustomer = mysqli_num_rows($view_thiscustomer);

$customer_id = $row_view_thiscustomer['customer_id'];
$customer_dealer_id =  $row_view_thiscustomer['customer_dealer_id'];


if($customer_dealer_id != $did){
  //header('Location: customers.php');
}


$customer_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_id']));
$customer_frmsource = mysql_real_escape_string(trim($row_view_thiscustomer['customer_frmsource']));
$customer_leads_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_leads_id']));
$customer_no = mysql_real_escape_string(trim($row_view_thiscustomer['customer_no']));
$customer_dayhunt = mysql_real_escape_string(trim($row_view_thiscustomer['customer_dayhunt']));
$customer_dealer_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_dealer_id']));
$customer_sales_person_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_sales_person_id']));
$customer_sales_person2_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_sales_person2_id']));
$customer_bdc_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_bdc_id']));
$customer_fnimgr_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_fnimgr_id']));
$customer_slsmgr_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_slsmgr_id']));
$customer_status_sold = mysql_real_escape_string(trim($row_view_thiscustomer['customer_status_sold']));
$customer_finance_type = mysql_real_escape_string(trim($row_view_thiscustomer['customer_finance_type']));
$customer_lostcode = mysql_real_escape_string(trim($row_view_thiscustomer['customer_lostcode']));
$customer_vehicles_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_vehicles_id']));

$row_view_thiscustomer['customer_testimony_id']));
$customer_token_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_token_id']));
$customer_facebook_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer_facebook_id']));
$customer_status = mysql_real_escape_string(trim($row_view_thiscustomer['customer_status']));
$customer_type = mysql_real_escape_string(trim($row_view_thiscustomer['customer_type']));
$customer_created_at = mysql_real_escape_string(trim($row_view_thiscustomer['customer_created_at']));
$customer_date_modified = mysql_real_escape_string(trim($row_view_thiscustomer['customer_date_modified']));
$customer_title = mysql_real_escape_string(trim($row_view_thiscustomer['customer_title']));
$customer_nickname = mysql_real_escape_string(trim($row_view_thiscustomer['customer_nickname']));
$customer_fname = mysql_real_escape_string(trim($row_view_thiscustomer['customer_fname']));
$customer_mname = mysql_real_escape_string(trim($row_view_thiscustomer['customer_mname']));
$customer_lname = mysql_real_escape_string(trim($row_view_thiscustomer['customer_lname']));
$customer_suffix = mysql_real_escape_string(trim($row_view_thiscustomer['customer_suffix']));
$customer_sex = mysql_real_escape_string(trim($row_view_thiscustomer['customer_sex']));
$customer_email = mysql_real_escape_string(trim($row_view_thiscustomer['customer_email']));
$customer_dlstate = mysql_real_escape_string(trim($row_view_thiscustomer['customer_dlstate']));
$customer_dlno = mysql_real_escape_string(trim($row_view_thiscustomer['customer_dlno']));
$customer_dlexpdate = mysql_real_escape_string(trim($row_view_thiscustomer['customer_dlexpdate']));
$customer_dob = mysql_real_escape_string(trim($row_view_thiscustomer['customer_dob']));
$customer_ssn = mysql_real_escape_string(trim($row_view_thiscustomer['customer_ssn']));
$customer_perf_commun = mysql_real_escape_string(trim($row_view_thiscustomer['customer_perf_commun']));
$customer_lead_temperature = mysql_real_escape_string(trim($row_view_thiscustomer['customer_lead_temperature']));
$customer_phoneno = mysql_real_escape_string(trim($row_view_thiscustomer['customer_phoneno']));
$customer_phonetype = mysql_real_escape_string(trim($row_view_thiscustomer['customer_phonetype']));
$customer_cellphone = mysql_real_escape_string(trim($row_view_thiscustomer['customer_cellphone']));
$customer_work_phone = mysql_real_escape_string(trim($row_view_thiscustomer['customer_work_phone']));
$customer_home_addr1 = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_addr1']));
$customer_home_addr2 = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_addr2']));
$customer_home_city = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_city']));
$customer_home_county = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_county']));
$customer_home_live_movindate = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_live_movindate']));
$customer_home_live_years = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_live_years']));
$customer_home_live_months = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_live_months']));
$customer_home_okgoogle = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_okgoogle']));
$customer_home_geo_latitude = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_geo_latitude']));
$customer_home_geo_longitude = mysql_real_escape_string(trim($row_view_thiscustomer['customer_home_geo_longitude']));
$customer_employer_name = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_name']));
$customer_employer_addr1 = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_addr1']));
$customer_employer_addr2 = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_addr2']));
$customer_employer_city = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_city']));
$customer_employer_state = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_state']));
$customer_employer_zip = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_zip']));
$customer_employer_phone = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_phone']));
$customer_supervisors_name = mysql_real_escape_string(trim($row_view_thiscustomer['customer_supervisors_name']));
$customer_supervisors_phone = mysql_real_escape_string(trim($row_view_thiscustomer['customer_supervisors_phone']));
$customer_supervisors_phone_ext = mysql_real_escape_string(trim($row_view_thiscustomer['customer_supervisors_phone_ext']));
$customer_employer_hiredate = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_hiredate']));
$customer_employer_years = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_years']));
$customer_employer_months = mysql_real_escape_string(trim($row_view_thiscustomer['customer_employer_months']));
$customer_gross_income = mysql_real_escape_string(trim($row_view_thiscustomer['customer_gross_income']));
$customer_net_income = mysql_real_escape_string(trim($row_view_thiscustomer['customer_net_income']));
$customer_income_frequency $row_view_thiscustomer['customer_income_frequency']));
$customer_income_other = mysql_real_escape_string(trim($row_view_thiscustomer['customer_income_other']));
$customer_income_other_amount = mysql_real_escape_string(trim($row_view_thiscustomer['customer_income_other_amount']));
$customer_income_other_frequency = mysql_real_escape_string(trim($row_view_thiscustomer['customer_income_other_frequency']));
$titleconjucation = mysql_real_escape_string(trim($row_view_thiscustomer['titleconjucation']));
$customer2_id = mysql_real_escape_string(trim($row_view_thiscustomer['customer2_id']));
$customer2_relationship = mysql_real_escape_string(trim($row_view_thiscustomer['customer2_relationship'])); 




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


echo $create_conversion_customer_to_credit_app_sql = "
INSERT INTO `idsids_idsdms`.`credit_app_fullblown` SET
				`credit_app_locked` = '0',
				`applicant_did` = '$did',
				`applicant_vid` = '$customer_vehicles_id',
				`applicant_sid` = '$customer_sales_person_id',
				`applicant_sid_name` = '',
				`credit_app_last_modified` = '$timevar',
				`applicant_clid` = '$customer_leads_id',
				`applicant_app_token` = '$customer_token_id',
				`applicant_titlename` = '$customer_title',
				`applicant_fname` = '$customer_fname',
				`applicant_mname` = '$customer_mname',
				`applicant_lname` = '$customer_lname',
				`applicant_name` = '$customer_nickname',
				`credit_app_type` = '$customer_finance_type',
				`credit_app_source` = '$customer_frmsource',
				`applicant_main_phone` = '$customer_phoneno',
				`applicant_cell_phone` = '$customer_cellphone',
				`applicant_email_address` = '$	customer_email',
				`applicant_present_address1` = '$customer_home_addr1',
				`applicant_present_address2` = '$customer_home_addr2',
				`applicant_present_addr_city` = '$customer_home_city',
				`applicant_present_addr_state` = '$customer_home_state',
				`applicant_present_addr_zip` = '$customer_home_zip',
				`applicant_present_addr_county` = '$customer_home_county',
				`applicant_present_movindate` = '$customer_home_live_movindate',
				`applicant_addr_years` = '$customer_home_live_years',
				`applicant_addr_months` = '$customer_home_live_months',
				`applicant_employer1_name` = '$customer_employer_name',
				`applicant_employer1_supervisors_name` = '$customer_supervisors_name',
				`applicant_employer1_supervisors_phone` = '$customer_supervisors_phone',
				`applicant_employer1_supervisors_phone_ext` = '$customer_supervisors_phone_ext',
				`applicant_employer1_addr` = '$customer_employer_addr1',
				`applicant_employer1_addr2` = '$customer_employer_addr2',
				`applicant_employer1_city` = '$customer_employer_city',
				`applicant_employer1_state` = '$customer_employer_state',
				`applicant_employer1_zip` = '$customer_employer_zip',
				`applicant_employer1_phone` = '$customer_employer_phone',
				`applicant_employer1_dateofhire` = '$customer_employer_hiredate',
				`applicant_employer1_work_years` = '$customer_employer_years',
				`applicant_employer1_work_months` = '$customer_employer_months',
				`applicant_employer1_salary_bringhome` = '$customer_gross_income',
				`applicant_employer1_payday_freq` = '$customer_income_frequency',
				`applicant_other_income_source` = '$customer_income_other',
				`applicant_other_income_amount` = '$customer_income_other_amount',
				`applicant_other_income_when_rcvd` = '$customer_income_other_frequency',
				`applicant_desired_mo_payment` = '$cust_desiredpymt'
";


$run_conversion_customer_to_credit_app_sql = mysqli_query($idsconnection_mysqli, $create_conversion_customer_to_credit_app_sql);










