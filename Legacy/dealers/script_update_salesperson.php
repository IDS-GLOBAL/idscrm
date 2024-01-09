<?php

include("db_loggedin.php");




//print_r($_POST);


if(isset($_POST['salesperson_id'], $_POST['position_title'], $_POST['salesperson_department_id'], $_POST['thisteam_id_val'], $_POST['team_name'], $_POST['acct_status'], $_POST['salesperson_catchleads'], $_POST['position_title'], $_POST['salesperson_firstname'], $_POST['salesperson_lastname'], $_POST['salesperson_nickname'], $_POST['salesperson_email'], $_POST['salesperson_username'], $_POST['salesperson_password'], $_POST['salesperson_mobilephone_number'], $_POST['website_url'], $_POST['sales_pitch'], $_POST['prof_motto'], $_POST['prof_hometown'], $_POST['prof_sportsteam'], $_POST['prof_dreamvact'], $_POST['prof_favfood'], $_POST['prof_favtvshow'], $_POST['goal_cars_monthly'], $_POST['goal_appts_monthly'])){
	
//echo 'I made it'.'<br />';

$salesperson_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_id']));
$position_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['position_title']));
$salesperson_department_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_department_id']));
$team_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisteam_id_val']));
$team_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['team_name']));
$acct_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['acct_status']));
$salesperson_catchleads = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_catchleads']));
$salesperson_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_firstname']));
$salesperson_lastname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_lastname']));
$salesperson_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_nickname']));
$salesperson_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_email']));
$salesperson_username = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_username']));
$salesperson_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_password']));
$salesperson_mobilephone_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_mobilephone_number']));
$website_url = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website_url']));
$sales_pitch = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_pitch']));
$prof_motto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_motto']));
$prof_hometown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_hometown']));
$prof_sportsteam = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_sportsteam']));
$prof_dreamvact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_dreamvact']));
$prof_favfood = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favfood']));
$prof_favtvshow = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favtvshow']));
$goal_cars_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_cars_monthly']));
$goal_appts_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_appts_monthly']));

$update_salesperson_sql = "
UPDATE `idsids_idsdms`.`sales_person` SET
	`position_title` = '$position_title',
	`salesperson_department_id` = '$salesperson_department_id', 
    `team_id` = '$team_id',
	`team_name` = '$team_name',
	`acct_status` = '$acct_status',
    `salesperson_catchleads` = '$salesperson_catchleads',
    `salesperson_firstname` = '$salesperson_firstname', 
    `salesperson_lastname` = '$salesperson_lastname', 
    `salesperson_nickname` = '$salesperson_nickname', 
    `salesperson_mobilephone_number` = '$salesperson_mobilephone_number', 
    `website_url` = '$website_url', 
    `sales_pitch` = '$sales_pitch',
    `prof_motto` = '$prof_motto',
	`main_dealerid` = '$did',
    `prof_hometown` = '$prof_hometown', 
    `prof_sportsteam` = '$prof_sportsteam', 
    `prof_dreamvact` = '$prof_dreamvact', 
    `prof_favfood` = '$prof_favfood', 
    `prof_favtvshow` = '$prof_favtvshow', 
    `goal_cars_monthly` = '$goal_cars_monthly', 
    `goal_appts_monthly` = '$goal_appts_monthly'
	WHERE
	`salesperson_id` = '$salesperson_id'
";

$run_update_salesperson_sql = mysqli_query($idsconnection_mysqli, $update_salesperson_sql);







}



include("inc.end.phpmsyql.php");

?>