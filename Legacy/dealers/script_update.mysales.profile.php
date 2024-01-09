<?php require_once("db_sales_loggedin.php"); ?>
<?php

//print_r($_POST);

if(isset($_POST['salesperson_timezone_id'], $_POST['salesperson_timezone'], $_POST['salesperson_mobile_number'], $_POST['salesperson_mobile_carrier_id'], $_POST['salesperson_mobile_carrier'], $_POST['salesperson_firstname'], $_POST['salesperson_lastname'], $_POST['salesperson_nickname'], $_POST['website_url'], $_POST['salesperson_job_title'], $_POST['position_title'], $_POST['prof_motto'], $_POST['prof_hometown'], $_POST['prof_sportsteam'], $_POST['prof_dreamvact'], $_POST['prof_favfood'], $_POST['prof_favtvshow'], $_POST['goal_cars_monthly'], $_POST['goal_appts_monthly'])){
	
	
	$salesperson_timezone_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_timezone_id']));
	$salesperson_timezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_timezone']));
	$salesperson_postedmobile_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_mobile_number']));
	$salesperson_mobile_carrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_mobile_carrier_id']));
	$salesperson_mobile_carrier = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_mobile_carrier']));
	$salesperson_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_firstname'])); 
	$salesperson_lastname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_lastname'])); 
	$salesperson_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_nickname'])); 
	$website_url = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website_url'])); 
	$salesperson_job_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_job_title'])); 
	$position_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['position_title'])); 
	$prof_motto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_motto'])); 
	$prof_hometown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_hometown']));  
	$prof_sportsteam = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_sportsteam'])); 
	$prof_dreamvact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_dreamvact']));  
	$prof_favfood = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favfood'])); 
	$prof_favtvshow = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favtvshow'])); 
	$goal_cars_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_cars_monthly']));  
	$goal_appts_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_appts_monthly'])); 
	
	
	$query_update_salesperson_table = "
		UPDATE `idsids_idsdms`.`sales_person` SET
`salesperson_timezone_id` = '$salesperson_timezone_id',
`salesperson_timezone` = '$salesperson_timezone',
`salesperson_mobilephone_number` = '$salesperson_postedmobile_number',
`salesperson_mobile_carrier_id` = '$salesperson_mobile_carrier_id',
`salesperson_mobile_carrier` = '$salesperson_mobile_carrier',
`salesperson_firstname` = '$salesperson_firstname', 
`salesperson_lastname` = '$salesperson_lastname', 
`salesperson_nickname` = '$salesperson_nickname', 
`website_url` = '$website_url', 
`salesperson_job_title` = '$salesperson_job_title', 
`position_title` = '$position_title', 
`prof_motto` = '$prof_motto', 
`prof_hometown` = '$prof_hometown',  
`prof_sportsteam` = '$prof_sportsteam', 
`prof_dreamvact` = '$prof_dreamvact',  
`prof_favfood` = '$prof_favfood', 
`prof_favtvshow` = '$prof_favtvshow', 
`goal_cars_monthly` = '$goal_cars_monthly',  
`goal_appts_monthly` = '$goal_appts_monthly'
WHERE
`salesperson_id` = '$sid'
	";
	
	
	

	$ran_update_salesperson_table_sql = mysqli_query($idsconnection_mysqli, $query_update_salesperson_table) or die(mysqli_connect_error());
	



}