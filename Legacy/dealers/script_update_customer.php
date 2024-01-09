<?php require_once("db_loggedin.php"); ?>
<?php



//print_r($_POST);




 




if(isset($_POST['customer_id'], $_POST['thisdid'], $_POST['customer_sales_person_id'], $_POST['customer_sales_person2_id'], $_POST['customer_bdc_id'], $_POST['customer_fnimgr_id'], $_POST['customer_status'], $_POST['customer_status_2'], $_POST['customer_status_3'], $_POST['customer_status_4'], $_POST['customer_title'], $_POST['customer_fname'], $_POST['customer_mname'], $_POST['customer_lname'], $_POST['customer_suffix'], $_POST['customer_nickname'], $_POST['customer_sex'], $_POST['customer_dayhunt'], $_POST['customer_lead_temperature'], $_POST['customer_phoneno'], $_POST['customer_cellphone'], $_POST['customer_work_phone'], $_POST['customer_email'], $_POST['customer_home_addr1'], $_POST['customer_home_addr2'], $_POST['customer_home_city'], $_POST['customer_home_state'], $_POST['customer_home_zip'], $_POST['customer_home_county'], $_POST['customer_home_live_movindate'], $_POST['customer_home_live_years'], $_POST['customer_home_live_months'], $_POST['customer_home_okgoogle'], $_POST['customer_home_geo_latitude'], $_POST['customer_home_geo_longitude'], $_POST['customer_employer_name'], $_POST['customer_supervisors_name'], $_POST['customer_supervisors_phone'], $_POST['customer_employer_addr'], $_POST['customer_employer_addr2'], $_POST['customer_employer_city'], $_POST['customer_employer_state'], $_POST['customer_employer_zip'], $_POST['customer_employer_phone'], $_POST['customer_employer_hiredate'], $_POST['customer_employer_years'], $_POST['customer_employer_months'],$_POST['customer_gross_income'],$_POST['customer_income_frequency'], $_POST['customer_income_other'], $_POST['customer_income_other_amount'], $_POST['customer_income_other_frequency'], $_POST['customer_vehicles_id'])){

//echo 'I Made it';






$customer_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_id']));  
$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));  
$customer_sales_person_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_sales_person_id']));  
$customer_sales_person2_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_sales_person2_id']));  
$customer_bdc_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_bdc_id']));  
$customer_fnimgr_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_fnimgr_id']));  
$customer_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_status']));  
$customer_status_2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_status_2']));  
$customer_status_3 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_status_3']));  
$customer_status_4 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_status_4']));  
$customer_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_title']));  
$customer_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_fname']));  
$customer_mname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_mname']));  
$customer_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_lname']));  
$customer_suffix = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_suffix']));  
$customer_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_nickname']));  
$customer_sex = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_sex']));  
$customer_dayhunt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_dayhunt']));  
$customer_lead_temperature = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_lead_temperature']));  
$customer_phoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_phoneno']));  
$customer_cellphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_cellphone']));  
$customer_work_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_work_phone']));  
$customer_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_email']));  
$customer_home_addr1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_addr1']));  
$customer_home_addr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_addr2']));  
$customer_home_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_city']));  
$customer_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_state']));  
$customer_home_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_zip']));  
$customer_home_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_county']));  
$customer_home_live_movindate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_live_movindate']));  
$customer_home_live_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_live_years']));  
$customer_home_live_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_live_months']));  
$customer_home_okgoogle = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_okgoogle']));  
$customer_home_geo_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_geo_latitude']));  
$customer_home_geo_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_home_geo_longitude']));  
$customer_employer_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_name']));  
$customer_supervisors_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_supervisors_name']));  
$customer_supervisors_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_supervisors_phone']));  
$customer_employer_addr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_addr']));  
$customer_employer_addr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_addr2']));  
$customer_employer_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_city']));  
$customer_employer_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_state']));  
$customer_employer_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_zip']));  
$customer_employer_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_phone']));  
$customer_employer_hiredate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_hiredate']));  
$customer_employer_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_years']));  
$customer_employer_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_employer_months']));
$customer_gross_income = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_gross_income']));
$customer_income_frequency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_income_frequency']));  
$customer_income_other = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_income_other']));  
$customer_income_other_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_income_other_amount']));  
$customer_income_other_frequency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_income_other_frequency']));  
$customer_vehicles_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_vehicles_id']));


$update_customer_record_sql = "
		UPDATE `idsids_idsdms`.`customers` SET
			`customer_sales_person_id` = '$customer_sales_person_id',  
			`customer_sales_person2_id` = '$customer_sales_person2_id',  
			`customer_bdc_id` = '$customer_bdc_id',  
			`customer_fnimgr_id` = '$customer_fnimgr_id',  
			`customer_status` = '$customer_status',  
			`customer_status_2` = '$customer_status_2',  
			`customer_status_3` = '$customer_status_3',  
			`customer_status_4` = '$customer_status_4',  
			`customer_title` = '$customer_title',  
			`customer_fname` = '$customer_fname',  
			`customer_mname` = '$customer_mname',  
			`customer_lname` = '$customer_lname',  
			`customer_suffix` = '$customer_suffix',  
			`customer_nickname` = '$customer_nickname',  
			`customer_sex` = '$customer_sex',  
			`customer_dayhunt` = '$customer_dayhunt',  
			`customer_lead_temperature` = '$customer_lead_temperature',  
			`customer_phoneno` = '$customer_phoneno',  
			`customer_cellphone` = '$customer_cellphone',  
			`customer_work_phone` = '$customer_work_phone',  
			`customer_email` = '$customer_email',  
			`customer_home_addr1` = '$customer_home_addr1',  
			`customer_home_addr2` = '$customer_home_addr2',  
			`customer_home_city` = '$customer_home_city',  
			`customer_home_state` = '$customer_home_state',  
			`customer_home_zip` = '$customer_home_zip',  
			`customer_home_county` = '$customer_home_county',  
			`customer_home_live_movindate` = '$customer_home_live_movindate',  
			`customer_home_live_years` = '$customer_home_live_years',  
			`customer_home_live_months` = '$customer_home_live_months',  
			`customer_home_okgoogle` = '$customer_home_okgoogle',  
			`customer_home_geo_latitude` = '$customer_home_geo_latitude',  
			`customer_home_geo_longitude` = '$customer_home_geo_longitude',  
			`customer_employer_name` = '$customer_employer_name',  
			`customer_supervisors_name` = '$customer_supervisors_name',  
			`customer_supervisors_phone` = '$customer_supervisors_phone',  
			`customer_employer_addr1` = '$customer_employer_addr',  
			`customer_employer_addr2` = '$customer_employer_addr2',  
			`customer_employer_city` = '$customer_employer_city',  
			`customer_employer_state` = '$customer_employer_state',  
			`customer_employer_zip` = '$customer_employer_zip',  
			`customer_employer_phone` = '$customer_employer_phone',  
			`customer_employer_hiredate` = '$customer_employer_hiredate',  
			`customer_employer_years` = '$customer_employer_years',  
			`customer_employer_months` = '$customer_employer_months',
			`customer_gross_income` = '$customer_gross_income',
			`customer_income_frequency` = '$customer_income_frequency',  
			`customer_income_other` = '$customer_income_other',  
			`customer_income_other_amount` = '$customer_income_other_amount',  
			`customer_income_other_frequency` = '$customer_income_other_frequency',  
			`customer_vehicles_id` = '$customer_vehicles_id'
		WHERE
			`customer_id` = '$customer_id'
			";


$run_customer_record_sql = mysqli_query($idsconnection_mysqli, $update_customer_record_sql);









}




?>