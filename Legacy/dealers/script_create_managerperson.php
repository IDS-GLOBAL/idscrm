<?php

include("db_loggedin.php");



//print_r($_POST);



if(isset($_POST['manager_title'], $_POST['manager_department_id'], $_POST['team_id'], $_POST['team_name'], $_POST['manager_reassign_leads'], $_POST['manager_approvedeals'], $_POST['mgrid_addinv_2main_dealerid'], $_POST['manager_firstname'], $_POST['manager_lastname'], $_POST['manager_nickname'], $_POST['manager_email'], $_POST['manager_username'], $_POST['manager_password'], $_POST['manager_main_number'], $_POST['manager_phone_ext'], $_POST['manager_mobilephone_number'], $_POST['website_url'], $_POST['sales_pitch'], $_POST['prof_motto'], $_POST['prof_hometown'], $_POST['prof_sportsteam'], $_POST['prof_dreamvact'], $_POST['prof_favfood'], $_POST['prof_favtvshow'], $_POST['goal_cars_monthly'], $_POST['goal_appts_monthly'], $_POST['acct_status'])){



//echo 'I made it';

$acct_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['acct_status']));
$manager_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_title']));
$manager_department_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_department_id']));
$team_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['team_id']));
$team_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['team_name']));
$manager_reassign_leads = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_reassign_leads']));
$manager_approvedeals = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_approvedeals']));
$mgrid_addinv_2main_dealerid = mysql_real_escape_string($_POST['mgrid_addinv_2main_dealerid']);

$manager_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_firstname']));
$manager_lastname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_lastname']));
$manager_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_nickname']));

$manager_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_email']));

$manager_username = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_username']));
$manager_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_password']));



$manager_main_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_main_number']));
$manager_phone_ext = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_phone_ext']));
$manager_mobilephone_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['manager_mobilephone_number']));
$website_url = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website_url']));
$sales_pitch = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_pitch']));
$prof_motto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_motto']));
$prof_hometown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_hometown']));
$prof_sportsteam = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_sportsteam']));
$prof_dreamvact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_dreamvact']));
$prof_favfood = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favfood']));
$prof_favtvshow = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favtvshow']));

//Name Change From Consistence Got Lazy
$team_goal_cars_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_cars_monthly']));
$team_goal_appts_monthly= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_appts_monthly']));

 $create_manager_sql = "
INSERT INTO `idsids_idsdms`.`manager_person` SET
	`acct_status` = '$acct_status',
	`manager_title` = '$manager_title',
	`manager_department_id` = '$manager_department_id', 
    `team_id` = '$team_id',
	`team_name` = '$team_name',
    `manager_reassign_leads` = '$manager_reassign_leads',
    `manager_approvedeals` = '$manager_approvedeals',
	`mgrid_addinv_2main_dealerid` = '$mgrid_addinv_2main_dealerid',
    `manager_firstname` = '$manager_firstname', 
    `manager_lastname` = '$manager_lastname', 
    `manager_nickname` = '$manager_nickname', 
	`manager_email` = '$manager_email',
	`manager_email_verified` = 'N',
	`manager_username` = '$manager_username',
	`manager_password` = '$manager_password',
	`manager_main_number` = '$manager_main_number',
	`manager_phone_ext` = '$manager_phone_ext',
	`manager_mobilephone_number` = '$manager_mobilephone_number',
    `dealer_id` = '$did',
    `website_url` = '$website_url',
    `sales_pitch` = '$sales_pitch',
    `prof_motto` = '$prof_motto',
    `prof_hometown` = '$prof_hometown', 
    `prof_sportsteam` = '$prof_sportsteam', 
    `prof_dreamvact` = '$prof_dreamvact', 
    `prof_favfood` = '$prof_favfood', 
    `prof_favtvshow` = '$prof_favtvshow', 
    `team_goal_cars_monthly` = '$team_goal_cars_monthly', 
    `team_goal_appts_monthly` = '$team_goal_appts_monthly'
";

$run_create_manager_sql = mysqli_query($idsconnection_mysqli, $create_manager_sql);







}



include("inc.end.phpmsyql.php");

?>