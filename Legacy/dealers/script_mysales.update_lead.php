<?php require_once("db_sales_loggedin.php"); ?>
<?php






if(isset($_POST['cust_leadid'], $_POST['thisdid'], $_POST['cust_salesperson_id'], $_POST['cust_salesperson2_id'], $_POST['cust_bdc_id'], $_POST['cust_mgr_id'], $_POST['cust_close_status_0'], $_POST['cust_close_status_1'], $_POST['cust_close_status_2'], $_POST['cust_close_status_3'], $_POST['cust_close_status_4'],  $_POST['cust_finance_type'], $_POST['cust_lostcode'], $_POST['cust_titlename'], $_POST['cust_fname'], $_POST['cust_mname'], $_POST['cust_lname'], $_POST['cust_name_suffix'], $_POST['cust_nickname'], $_POST['cust_lead_source'], $_POST['cust_lead_sex'], $_POST['cust_close_range'], $_POST['cust_lead_temperature'], $_POST['cust_homephone'], $_POST['cust_mobilephone'], $_POST['cust_workphone'], $_POST['cust_email'], $_POST['cust_home_address'], $_POST['cust_home_city'], $_POST['cust_home_state'], $_POST['cust_home_zip'], $_POST['cust_home_county'], $_POST['cust_home_live_movindate'], $_POST['cust_home_live_years'], $_POST['cust_home_live_months'], $_POST['cust_home_okgoogle'], $_POST['cust_home_latitude'], $_POST['cust_home_longitude'], $_POST['cust_employer_name'], $_POST['cust_supervisors_name'], $_POST['cust_supervisors_phone'], $_POST['cust_employer_addr'], $_POST['cust_employer_addr2'], $_POST['cust_employer_city'], $_POST['cust_employer_state'], $_POST['cust_employer_zip'], $_POST['cust_employer_phone'], $_POST['cust_employer_dateohire'], $_POST['cust_employer_years'], $_POST['cust_employer_months'], $_POST['cust_gross_income'], $_POST['cust_gross_income_frequency'], $_POST['cust_other_income_amount'], $_POST['cust_gross_other_income_frequency'], $_POST['cust_downpayment'], $_POST['cust_desiredpymt'], $_POST['cust_vehicle_id'], $_POST['cust_vstockno'], $_POST['cust_vyear'], $_POST['cust_vmake'], $_POST['cust_vmodel'], $_POST['cust_vtrim'], $_POST['cust_vmiles'], $_POST['cust_vbody'], $_POST['cust_vsellingprice'], $_POST['counter_offer'], $_POST['counter_offer2'], $_POST['tradeYes'], $_POST['tradePayment'], $_POST['tradePayoff'], $_POST['tradeVin'], $_POST['tradeYear'], $_POST['tradeMake'], $_POST['tradeModel'], $_POST['tradeTrim'], $_POST['tradeMiles'])){

$log = 'I Made it ';

if(is_numeric($_POST['cust_leadid'])){
	$log .= 'Numberic pass';
	
}else{
	exit;
}


if($_POST['thisdid'] == $did){
	$log .= ' Belongs to Dealer';
	
}else{
	$log .= ' Does not belong to dealer';
	exit;

}



$cust_salesperson_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_salesperson_id']));
$cust_leadid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_leadid']));

$cust_salesperson_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_salesperson_id']));



				$cust_salesperson_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_salesperson_id']));
				$cust_salesperson2_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_salesperson2_id']));
				$cust_bdc_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_bdc_id']));
				$cust_mgr_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_mgr_id']));
				$cust_close_status_0 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_close_status_0']));
				$cust_close_status_1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_close_status_1']));
				$cust_close_status_2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_close_status_2']));
				$cust_close_status_3 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_close_status_3']));
				$cust_close_status_4 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_close_status_4']));
				$cust_finance_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_finance_type']));
				$cust_lostcode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lostcode']));
				$cust_titlename = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_titlename']));
				$cust_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_fname']));
				$cust_mname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_mname']));
				$cust_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lname']));
				$cust_name_suffix = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_name_suffix']));
				$cust_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_nickname']));
				$cust_lead_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_source']));
				$cust_lead_sex = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_sex']));
				$cust_close_range = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_close_range']));
				$cust_lead_temperature = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_temperature']));
				$cust_homephone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_homephone']));
				$cust_mobilephone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_mobilephone']));
				$cust_workphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_workphone']));
				$cust_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_email']));
				$cust_home_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_address']));
				$cust_home_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_city']));
				$cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state']));
				$cust_home_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_zip']));
				$cust_home_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_county']));
				$cust_home_live_movindate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_movindate']));
				$cust_home_live_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_years']));
				$cust_home_live_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_months']));
				$cust_home_okgoogle = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_okgoogle']));
				$cust_home_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_latitude']));
				$cust_home_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_longitude']));
				$cust_employer_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_name']));
				$cust_supervisors_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_supervisors_name']));
				$cust_supervisors_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_supervisors_phone']));
				$cust_employer_addr1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_addr']));
				$cust_employer_addr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_addr2']));
				$cust_employer_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_city']));
				$cust_employer_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_state']));
				$cust_employer_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_zip']));
				$cust_employer_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_phone']));
				$cust_employer_dateohire = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_dateohire']));
				$cust_employer_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_years']));
				$cust_employer_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_months']));
				$cust_gross_income = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income']));
				$cust_gross_income_frequency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income_frequency']));
				$cust_other_income = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_other_income']));
				$cust_other_income_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_other_income_amount']));
				$cust_gross_other_income_frequency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_other_income_frequency']));
				$cust_downpayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_downpayment']));
				$cust_desiredpymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredpymt']));
				$cust_vehicle_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vehicle_id']));
				$cust_vstockno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vstockno']));
				$cust_vyear = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vyear']));
				$cust_vmake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vmake']));
				$cust_vmodel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vmodel']));
				$cust_vtrim = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vtrim']));
				$cust_vmiles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vmiles']));
				$cust_vbody = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vbody']));
				$cust_vsellingprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vsellingprice']));
				$counter_offer = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['counter_offer']));
				$counter_offer2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['counter_offer2']));
				$tradeYes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeYes']));
				$tradePayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradePayment']));
				$tradePayoff = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradePayoff']));
				$tradeVin = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeVin']));
				$tradeYear = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeYear']));
				$tradeMake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeMake']));
				$tradeModel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeModel']));
				$tradeTrim = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeTrim']));
				$tradeMiles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeMiles']));




/*
if($cust_salesperson2_id != NULL || $cust_salesperson2_id != 0 || $sales_person2_name != 'Select Salesperson'){
	$sales_person2_nametxt = $sales_person2_name;
}else{
	$sales_person2_nametxt = '';
}

*/


$update_cust_lead_sql = "
UPDATE `idsids_idsdms`.`cust_leads` SET
				`cust_lead_sex` = '$cust_lead_sex',
				`cust_vehicle_id` = '$cust_vehicle_id',
				`cust_salesperson_id` = '$cust_salesperson_id',
				`cust_salesperson2_id` = '$cust_salesperson2_id',
				`cust_bdc_id` = '$cust_bdc_id',
				`cust_mgr_id` = '$cust_mgr_id',
				`cust_close_status_0` = '$cust_close_status_0',
				`cust_close_status_1` = '$cust_close_status_1',
				`cust_close_status_2` = '$cust_close_status_2',
				`cust_close_status_3` = '$cust_close_status_3',
				`cust_close_status_4` = '$cust_close_status_4',
				`cust_finance_type` = '$cust_finance_type',
				`cust_lostcode` = '$cust_lostcode',
				`cust_titlename` = '$cust_titlename',
				`cust_fname` = '$cust_fname',
				`cust_mname` = '$cust_mname',
				`cust_lname` = '$cust_lname',
				`cust_name_suffix` = '$cust_name_suffix',
				`cust_nickname` = '$cust_nickname',
				`cust_lead_source` = '$cust_lead_source',
				`cust_lead_sex` = '$cust_lead_sex',
				`cust_close_range` = '$cust_close_range',
				`cust_lead_temperature` = '$cust_lead_temperature',
				`cust_homephone` = '$cust_homephone',
				`cust_mobilephone` = '$cust_mobilephone',
				`cust_workphone` = '$cust_workphone',
				`cust_email` = '$cust_email',
				`cust_home_address` = '$cust_home_address',
				`cust_home_city` = '$cust_home_city',
				`cust_home_state` = '$cust_home_state',
				`cust_home_zip` = '$cust_home_zip',
				`cust_home_county` = '$cust_home_county',
				`cust_home_live_movindate` = '$cust_home_live_movindate',
				`cust_home_live_years` = '$cust_home_live_years',
				`cust_home_live_months` = '$cust_home_live_months',
				`cust_home_okgoogle` = '$cust_home_okgoogle',
				`cust_home_latitude` = '$cust_home_latitude',
				`cust_home_longitude` = '$cust_home_longitude',
				`cust_employer_name` = '$cust_employer_name',
				`cust_supervisors_name` = '$cust_supervisors_name',
				`cust_supervisors_phone` = '$cust_supervisors_phone',
				`cust_employer_addr1` = '$cust_employer_addr1',
				`cust_employer_addr2` = '$cust_employer_addr2',
				`cust_employer_city` = '$cust_employer_city',
				`cust_employer_state` = '$cust_employer_state',
				`cust_employer_zip` = '$cust_employer_zip',
				`cust_employer_phone` = '$cust_employer_phone',
				`cust_employer_dateohire` = '$cust_employer_dateohire',
				`cust_employer_years` = '$cust_employer_years',
				`cust_employer_months` = '$cust_employer_months',
				`cust_gross_income` = '$cust_gross_income',
				`cust_gross_income_frequency` = '$cust_gross_income_frequency',
				`cust_other_income` = '$cust_other_income',
				`cust_other_income_amount` = '$cust_other_income_amount',
				`cust_gross_other_income_frequency` = '$cust_gross_other_income_frequency',
				`cust_downpayment` = '$cust_downpayment',
				`cust_desiredpymt` = '$cust_desiredpymt',
				`cust_vehicle_id` = '$cust_vehicle_id',
				`cust_vstockno` = '$cust_vstockno',
				`cust_vyear` = '$cust_vyear',
				`cust_vmake` = '$cust_vmake',
				`cust_vmodel` = '$cust_vmodel',
				`cust_vtrim` = '$cust_vtrim',
				`cust_vmiles` = '$cust_vmiles',
				`cust_vbody` = '$cust_vbody',
				`cust_vsellingprice` = '$cust_vsellingprice',
				`counter_offer` = '$counter_offer',
				`counter_offer2` = '$counter_offer2',
				`tradeYes` = '$tradeYes',
				`tradePayment` = '$tradePayment',
				`tradePayoff` = '$tradePayoff',
				`tradeVin` = '$tradeVin',
				`tradeYear` = '$tradeYear',
				`tradeMake` = '$tradeMake',
				`tradeModel` = '$tradeModel',
				`tradeTrim` = '$tradeTrim',
				`tradeMiles` = '$tradeMiles'
WHERE
	`cust_leadid` = '$cust_leadid'
";


$run_update_cust_lead_sql = mysqli_query($idsconnection_mysqli, $update_cust_lead_sql);

//echo $log;


}






?>