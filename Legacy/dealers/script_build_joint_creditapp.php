<?php

include("db_loggedin.php");

//print_r($_POST);




if(isset($_POST['cust_vehicle_id'], $_POST['applicant_app_token'], $_POST['aapplicant_app_token'], $_POST['token'], $_POST['applicant_titlename'], $_POST['applicant_fname'], $_POST['applicant_mname'], $_POST['applicant_lname'], $_POST['applicant_name'], $_POST['joint_applicant_fname'], $_POST['joint_applicant_mname'], $_POST['joint_applicant_lname'], $_POST['joint_applicant_name'], $_POST['applicant_cell_phone'], $_POST['applicant_email_address'], $_POST['credit_app_source'], $_POST['applicant_driver_state_issued'], $_POST['applicant_driver_licenses_number'], $_POST['applicant_ssn'], $_POST['applicant_dob'], $_POST['applicant_driver_licenses_expdate'], $_POST['applicant_present_address1'], $_POST['applicant_present_address2'], $_POST['applicant_present_addr_city'], $_POST['applicant_present_addr_state'], $_POST['applicant_present_addr_county'], $_POST['applicant_present_addr_zip'], $_POST['applicant_addr_landlord_mortg'], $_POST['applicant_addr_landlord_address'], $_POST['applicant_addr_landlord_city'], $_POST['applicant_addr_landlord_state'], $_POST['applicant_addr_landlord_zip'], $_POST['applicant_addr_landlord_phone'], $_POST['applicant_name_oncurrent_lease'], $_POST['applicant_apart_or_house'], $_POST['applicant_buy_own_rent_other'], $_POST['applicant_house_payment'], $_POST['applicant_addr_years'], $_POST['applicant_addr_months'], $_POST['applicant_residence_changes'], $_POST['applicant_previous1_addr1'], $_POST['applicant_previous1_addr2'], $_POST['applicant_previous1_addr_city'], $_POST['applicant_previous1_addr_state'], $_POST['applicant_previous1_addr_zip'], $_POST['applicant_previous1_live_years'], $_POST['applicant_previous1_live_months'], $_POST['applicant_employment_status'], $_POST['applicant_employer1_position'], $_POST['applicant_employer1_name'], $_POST['applicant_employer1_phone'], $_POST['applicant_employer1_addr'], $_POST['applicant_employer1_city'], $_POST['applicant_employer1_state'], $_POST['applicant_employer1_zip'], $_POST['applicant_employer1_salary_bringhome'], $_POST['applicant_employer1_payday_freq'], $_POST['applicant_employer1_work_years'], $_POST['applicant_employer1_work_months'], $_POST['applicant_job_changes2yr'], $_POST['user_applicant_employer_notes'], $_POST['other_income_source'], $_POST['applicant_other_income_amount'], $_POST['applicant_other_income_when_rcvd'], $_POST['applicant_employer2_position'], $_POST['applicant_employer2_name'], $_POST['applicant_employer2_phone'], $_POST['applicant_employer2_addr'], $_POST['applicant_employer2_city'], $_POST['applicant_employer2_state'], $_POST['applicant_employer2_zip'], $_POST['applicant_employer2_work_years'], $_POST['applicant_employer2_work_months'], $_POST['applicants_realative1_fname'], $_POST['applicants_realative1_lname'], $_POST['applicants_realative1_relationship'], $_POST['applicants_realative1_mainphone'], $_POST['applicants_realative1_address'], $_POST['applicants_realative1_address_city'], $_POST['applicants_realative1_address_state'], $_POST['applicants_realative1_address_zip'], $_POST['applilcant_v_stockno'], $_POST['applilcant_v_vin'], $_POST['applilcant_v_ymkmd_txt'], $_POST['applilcant_v_style'], $_POST['applilcant_v_inception_miles'], $_POST['applilcant_v_cash_down'], $_POST['applicant_desired_mo_payment'], $_POST['applilcant_v_trade_make'], $_POST['applilcant_v_trade_model'], $_POST['applicant_open_autoloan'], $_POST['applilcant_v_trade_lien_holder_name'], $_POST['applicant_open_autoloan_pymt'], $_POST['applicant_open_to_refinanceautoloan'], $_POST['applicant_open_autoloan_pymthistry'],$_POST['applicant_open_to_trading'], $_POST['applilcant_v_trade_owed'], $_POST['user_comments_trade_notes'])){
	
	
	
	
	
	





$token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['token']));
$applicant_app_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_app_token']));
$aapplicant_app_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['aapplicant_app_token']));
$joint_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['joint_token']));
$cust_vehicle_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vehicle_id']));
$applicant_titlename = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_titlename']));
$applicant_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_fname']));
$applicant_mname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_mname']));
$applicant_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_lname']));
$applicant_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_name']));

$joint_applicant_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['joint_applicant_fname']));
$joint_applicant_mname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['joint_applicant_mname']));
$joint_applicant_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['joint_applicant_lname']));
$joint_applicant_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['joint_applicant_name']));

if($joint_applicant_name){
	
	$usejoint_applicant_name = $joint_applicant_name;

	
	
}else{
	
	$usejoint_applicant_name = $joint_applicant_fname.' '.$joint_applicant_mname.' '.$joint_applicant_lname;


}

$applicant_cell_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_cell_phone']));
$applicant_email_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_email_address']));
$credit_app_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['credit_app_source']));
$applicant_driver_state_issued = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_driver_state_issued']));
$applicant_driver_licenses_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_driver_licenses_number']));
$applicant_ssn = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_ssn']));
$applicant_dob = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_dob']));
$applicant_driver_licenses_expdate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_driver_licenses_expdate']));
$applicant_present_address1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_address1']));
$applicant_present_address2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_address2']));
$applicant_present_addr_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_city']));
$applicant_present_addr_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_state']));
$applicant_present_addr_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_county']));
$applicant_present_addr_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_zip']));
$applicant_addr_landlord_mortg = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_mortg']));
$applicant_addr_landlord_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_address']));
$applicant_addr_landlord_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_city']));
$applicant_addr_landlord_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_state']));
$applicant_addr_landlord_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_zip']));
$applicant_addr_landlord_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_phone']));
$applicant_name_oncurrent_lease = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_name_oncurrent_lease']));
$applicant_apart_or_house = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_apart_or_house']));
$applicant_buy_own_rent_other = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_buy_own_rent_other']));
$applicant_house_payment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_house_payment']));
$applicant_addr_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_years']));
$applicant_addr_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_months']));
$applicant_residence_changes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_residence_changes']));
$applicant_previous1_addr1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_addr1']));
$applicant_previous1_addr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_addr2']));
$applicant_previous1_addr_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_addr_city']));
$applicant_previous1_addr_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_addr_state']));
$applicant_previous1_addr_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_addr_zip']));
$applicant_previous1_live_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_live_years']));
$applicant_previous1_live_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_previous1_live_months']));
$applicant_employment_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employment_status']));
$applicant_employer1_position = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_position']));
$applicant_employer1_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_name']));
$applicant_employer1_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_phone']));
$applicant_employer1_addr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_addr']));
$applicant_employer1_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_city']));
$applicant_employer1_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_state']));
$applicant_employer1_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_zip']));
$applicant_employer1_salary_bringhome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_salary_bringhome']));
$applicant_employer1_payday_freq = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_payday_freq']));
$applicant_employer1_work_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_work_years']));
$applicant_employer1_work_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_work_months']));
$applicant_job_changes2yr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_job_changes2yr']));
$user_applicant_employer_notes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['user_applicant_employer_notes']));
//$applicant_appt_startunixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_appt_startunixtime']));
$other_income_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['other_income_source']));
$applicant_other_income_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_income_amount']));
$applicant_other_income_when_rcvd = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_income_when_rcvd']));
$applicant_employer2_position = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_position']));
$applicant_employer2_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_name']));
$applicant_employer2_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_phone']));
$applicant_employer2_addr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_addr']));
$applicant_employer2_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_city']));
$applicant_employer2_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_state']));
$applicant_employer2_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_zip']));
$applicant_employer2_work_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_work_years']));
$applicant_employer2_work_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer2_work_months']));
$applicants_realative1_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_fname']));
$applicants_realative1_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_lname']));
$applicants_realative1_relationship = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_relationship']));
$applicants_realative1_mainphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_mainphone']));
$applicants_realative1_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_address']));
$applicants_realative1_address_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_address_city']));
$applicants_realative1_address_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_address_state']));
$applicants_realative1_address_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicants_realative1_address_zip']));
$applilcant_v_stockno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_stockno']));
$applilcant_v_vin =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_vin']));
$applilcant_v_ymkmd_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_ymkmd_txt']));
$applilcant_v_style = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_style']));
$applilcant_v_inception_miles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_inception_miles']));
$applilcant_v_cash_down = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_cash_down']));
$applicant_desired_mo_payment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_desired_mo_payment']));
$applilcant_v_trade_year = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_trade_year']));

$applilcant_v_trade_make = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_trade_make']));
$applilcant_v_trade_model = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_trade_model']));
$applicant_open_autoloan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_open_autoloan']));
$applilcant_v_trade_lien_holder_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_trade_lien_holder_name']));
$applicant_open_autoloan_pymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_open_autoloan_pymt']));
$applicant_open_autoloan_pymthistry = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_open_autoloan_pymthistry']));
$applicant_open_to_trading = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_open_to_trading']));
$applilcant_v_trade_owed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applilcant_v_trade_owed']));
$user_comments_trade_notes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['user_comments_trade_notes']));

// Find Last Deal Number Increment Up and Save to New variable
$app_deal_number = '';


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_howmany_creditapps = "SELECT `credit_app_fullblown_id`, `credit_app_locked`, `app_number`, `app_deal_number`, `app_deal_id`, `applicant_did` FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `applicant_did` = '$did' ORDER BY `app_number` DESC";
$howmany_creditapps = mysqli_query($idsconnection_mysqli, $query_howmany_creditapps);
$row_howmany_creditapps = mysqli_fetch_assoc($howmany_creditapps);
$totalRows_howmany_creditapps = mysqli_num_rows($howmany_creditapps);


$app_number = $row_howmany_creditapps['app_number'];

if($totalRows_howmany_creditapps == 0 || !$app_number){$app_number = '1000'; }else{ $app_number = 1+$app_number; }



// This Will Find The Primary Credit application To update it if necessary
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_coapplicantbytoken = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_app_token` = '$aapplicant_app_token' AND `credit_app_fullblown`.`applicant_did` = '$did' ORDER BY `credit_app_fullblown`.`credit_app_fullblown_id` ASC";
$find_coapplicantbytoken = mysqli_query($idsconnection_mysqli, $query_find_coapplicantbytoken);
$row_find_coapplicantbytoken = mysqli_fetch_assoc($find_coapplicantbytoken);
$totalRows_find_coapplicantbytoken = mysqli_num_rows($find_coapplicantbytoken);

$credit_app_fullblown_id = $row_find_coapplicantbytoken['credit_app_fullblown_id'];
$primary_app_number = $row_find_coapplicantbytoken['app_number'];
$theapplicant_app_joint_token = $row_find_coapplicantbytoken['applicant_app_joint_token'];



//echo '<br />'.' Building Joint Credit app'.'<br />';


$create_credit_app_fullblown_id_sql = "
INSERT INTO `idsids_idsdms`.`credit_app_fullblown` SET
	`app_number` = '$app_number',
	`applicant_did` = '$did',
	`applicant_vid` = '$cust_vehicle_id',
	`applicant_app_token` = '$applicant_app_token',
	`applicant_app_joint_token` = '$token',
	`applicant_app_joint_fullname` = '$usejoint_applicant_name',
	`applicant_titlename` = '$applicant_titlename',
	`applicant_fname` = '$applicant_fname',
	`applicant_mname` = '$applicant_mname',
	`applicant_lname` = '$applicant_lname',
	`applicant_name` = '$applicant_name',
	`applicant_cell_phone` = '$applicant_cell_phone',
	`applicant_email_address` = '$applicant_email_address',
	`credit_app_source` = '$credit_app_source',
	`applicant_driver_state_issued` = '$applicant_driver_state_issued',
	`applicant_driver_licenses_number` = '$applicant_driver_licenses_number',
	`applicant_ssn` = '$applicant_ssn',
	`applicant_dob` = '$applicant_dob',
	`applicant_driver_licenses_expdate` = '$applicant_driver_licenses_expdate',
	`applicant_present_address1` = '$applicant_present_address1',
	`applicant_present_address2` = '$applicant_present_address2',
	`applicant_present_addr_city` = '$applicant_present_addr_city',
	`applicant_present_addr_state` = '$applicant_present_addr_state',
	`applicant_present_addr_county` = '$applicant_present_addr_county',
	`applicant_present_addr_zip` = '$applicant_present_addr_zip',
	`applicant_addr_landlord_mortg` = '$applicant_addr_landlord_mortg',
	`applicant_addr_landlord_address` = '$applicant_addr_landlord_address',
	`applicant_addr_landlord_city` = '$applicant_addr_landlord_city',
	`applicant_addr_landlord_state` = '$applicant_addr_landlord_state',
	`applicant_addr_landlord_zip` = '$applicant_addr_landlord_zip',
	`applicant_addr_landlord_phone` = '$applicant_addr_landlord_phone',
	`applicant_name_oncurrent_lease` = '$applicant_name_oncurrent_lease',
	`applicant_apart_or_house` = '$applicant_apart_or_house',
	`applicant_buy_own_rent_other` = '$applicant_buy_own_rent_other',
	`applicant_house_payment` = '$applicant_house_payment',
	`applicant_addr_years` = '$applicant_addr_years',
	`applicant_addr_months` = '$applicant_addr_months',
	`applicant_residence_changes` = '$applicant_residence_changes',
	`applicant_previous1_addr1` = '$applicant_previous1_addr1',
	`applicant_previous1_addr2` = '$applicant_previous1_addr2',
	`applicant_previous1_addr_city` = '$applicant_previous1_addr_city',
	`applicant_previous1_addr_state` = '$applicant_previous1_addr_state',
	`applicant_previous1_addr_zip` = '$applicant_previous1_addr_zip',
	`applicant_previous1_live_years` = '$applicant_previous1_live_years',
	`applicant_previous1_live_months` = '$applicant_previous1_live_months',
	`applicant_employment_status` = '$applicant_employment_status',
	`applicant_employer1_position` = '$applicant_employer1_position',
	`applicant_employer1_name` = '$applicant_employer1_name',
	`applicant_employer1_phone` = '$applicant_employer1_phone',
	`applicant_employer1_addr` = '$applicant_employer1_addr',
	`applicant_employer1_city` = '$applicant_employer1_city',
	`applicant_employer1_state` = '$applicant_employer1_state',
	`applicant_employer1_zip` = '$applicant_employer1_zip',
	`applicant_employer1_salary_bringhome` = '$applicant_employer1_salary_bringhome',
	`applicant_employer1_payday_freq` = '$applicant_employer1_payday_freq',
	`applicant_employer1_work_years` = '$applicant_employer1_work_years',
	`applicant_employer1_work_months` = '$applicant_employer1_work_months',
	`applicant_job_changes2yr` = '$applicant_job_changes2yr',
	`user_applicant_employer_notes` = '$user_applicant_employer_notes',
	`applicant_other_income_source` = '$other_income_source',
	`applicant_other_income_amount` = '$applicant_other_income_amount',
	`applicant_other_income_when_rcvd` = '$applicant_other_income_when_rcvd',
	`applicant_employer2_position` = '$applicant_employer2_position',
	`applicant_employer2_name` = '$applicant_employer2_name',
	`applicant_employer2_phone` = '$applicant_employer2_phone',
	`applicant_employer2_addr` = '$applicant_employer2_addr',
	`applicant_employer2_city` = '$applicant_employer2_city',
	`applicant_employer2_state` = '$applicant_employer2_state',
	`applicant_employer2_zip` = '$applicant_employer2_zip',
	`applicant_employer2_work_years` = '$applicant_employer2_work_years',
	`applicant_employer2_work_months` = '$applicant_employer2_work_months',
	`applicants_realative1_fname` = '$applicants_realative1_fname',
	`applicants_realative1_lname` = '$applicants_realative1_lname',
	`applicants_realative1_relationship` = '$applicants_realative1_relationship',
	`applicants_realative1_mainphone` = '$applicants_realative1_mainphone',
	`applicants_realative1_address` = '$applicants_realative1_address',
	`applicants_realative1_address_city` = '$applicants_realative1_address_city',
	`applicants_realative1_address_state` = '$applicants_realative1_address_state',
	`applicants_realative1_address_zip` = '$applicants_realative1_address_zip',
	`applilcant_v_stockno` = '$applilcant_v_stockno',
	`applilcant_v_ymkmd_txt` = '$applilcant_v_ymkmd_txt',
	`applilcant_v_style`  = '$applilcant_v_style',
	`applilcant_v_inception_miles`= '$applilcant_v_inception_miles',
	`applicant_open_autoloan` = '$applicant_open_autoloan',
	`applicant_desired_mo_payment` = '$applicant_desired_mo_payment',
	`applilcant_v_cash_down` = '$applilcant_v_cash_down',
	`applilcant_v_trade_year` = '$applilcant_v_trade_year',
	`applilcant_v_trade_make` = '$applilcant_v_trade_make',
	`applilcant_v_trade_model` = '$applilcant_v_trade_model',
	`applilcant_v_trade_lien_holder_name` = '$applilcant_v_trade_lien_holder_name',
	`applicant_open_autoloan_pymt` = '$applicant_open_autoloan_pymt',
	`applicant_open_autoloan_pymthistry` = '$applicant_open_autoloan_pymthistry',
	`applicant_open_to_trading` = '$applicant_open_to_trading',
	`applilcant_v_trade_owed` = '$applilcant_v_trade_owed',
	`user_comments_trade_notes` = '$user_comments_trade_notes'
";

$run_credit_app_fullblown_id_sql= mysqli_query($idsconnection_mysqli, $create_credit_app_fullblown_id_sql);



 // Update Primary Creditapplication with joint
 if($totalRows_find_coapplicantbytoken > 0){	
	$update_pimarycredit_app_fullblown_id_sql = "
	UPDATE `idsids_idsdms`.`credit_app_fullblown` SET
		`joint_or_invidividual` = '1'
	WHERE
		`credit_app_fullblown_id` = '$credit_app_fullblown_id'
	";
	//$run_update_pimarycredit_app_fullblown_id_sql= mysqli_query($idsconnection_mysqli, $update_pimarycredit_app_fullblown_id_sql);




/*



// This Will Find The Primary Credit application To update it if necessary
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_coapplicantbytokenn = "SELECT * FROM credit_app_fullblown WHERE credit_app_fullblown.applicant_app_token = '$applicant_app_token' AND credit_app_fullblown.applicant_did = '$did' ORDER BY credit_app_fullblown.credit_app_fullblown_id ASC";
$find_coapplicantbytokenn = mysqli_query($idsconnection_mysqli, $query_find_coapplicantbytokenn);
$row_find_coapplicantbytokenn = mysqli_fetch_assoc($find_coapplicantbytokenn);
$totalRows_find_coapplicantbytokenn = mysqli_num_rows($find_coapplicantbytokenn);

$credit_app_fullblown_id2 = $row_find_coapplicantbytokenn['credit_app_fullblown_id'];
$primary_app_number = $row_find_coapplicantbytokenn['app_number'];
$theapplicant_app_joint_token = $row_find_coapplicantbytokenn['applicant_app_joint_token'];

$update_pimarycredit_app_fullblown_id_sql2 = "
	UPDATE `idsids_idsdms`.`credit_app_fullblown` SET
		`joint_or_invidividual` = '1'
	WHERE
		`credit_app_fullblown_id` = '$credit_app_fullblown_id2'
	";
	$run_update_pimarycredit_app_fullblown_id_sql2= mysqli_query($idsconnection_mysqli, $update_pimarycredit_app_fullblown_id_sql2);


*/




 }






}

include("inc.end.phpmsyql.php");
?>