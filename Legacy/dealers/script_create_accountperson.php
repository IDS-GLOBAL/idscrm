<?php

include("db_loggedin.php");


//echo 'Hello?????';


//print_r($_POST);



if(isset($_POST['account_title'], $_POST['account_department_id'], $_POST['team_id'], $_POST['team_name'], $_POST['account_outgoing_emails'], $_POST['account_accept_payments'], $_POST['acid_addinv_2main_dealerid'], $_POST['account_firstname'], $_POST['account_lastname'], $_POST['account_nickname'], $_POST['account_email'], $_POST['account_username'], $_POST['account_password'], $_POST['collector_acct_status'], $_POST['account_main_number'], $_POST['account_phone_ext'], $_POST['account_mobilephone_number'], $_POST['website_url'], $_POST['sales_pitch'], $_POST['prof_motto'], $_POST['prof_hometown'], $_POST['prof_sportsteam'], $_POST['prof_dreamvact'], $_POST['prof_favfood'], $_POST['prof_favtvshow'], $_POST['goal_monthly_monies_collect'])){



//echo 'I made it';

$acct_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['collector_acct_status']));
$account_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_title']));
$account_department_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_department_id']));
$team_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['team_id']));
$team_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['team_name']));
$account_outgoing_emails = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_outgoing_emails']));
$account_accept_payments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_accept_payments']));
$acid_addinv_2main_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['acid_addinv_2main_dealerid']));

$account_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_firstname']));
$account_lastname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_lastname']));
$account_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_nickname']));

$account_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_email']));

$account_username = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_username']));
$account_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_password']));



$account_main_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_main_number']));
$account_phone_ext = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_phone_ext']));
$account_mobilephone_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['account_mobilephone_number']));
$website_url = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website_url']));
$sales_pitch = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_pitch']));
$prof_motto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_motto']));
$prof_hometown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_hometown']));
$prof_sportsteam = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_sportsteam']));
$prof_dreamvact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_dreamvact']));
$prof_favfood = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favfood']));
$prof_favtvshow = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prof_favtvshow']));

//Name Change From Consistence Got Lazy
$goal_monthly_monies_collect= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goal_monthly_monies_collect']));

$create_account_sql = "
INSERT INTO `idsids_idsdms`.`account_person` SET
	`acct_status` = '$acct_status',
	`account_title` = '$account_title',
	`account_department_id` = '$account_department_id', 
    `team_id` = '$team_id',
	`team_name` = '$team_name',
    `account_outgoing_emails` = '$account_outgoing_emails',
    `account_accept_payments` = '$account_accept_payments',
	`acid_addinv_2main_dealerid` = '$acid_addinv_2main_dealerid',
    `account_firstname` = '$account_firstname', 
    `account_lastname` = '$account_lastname', 
    `account_nickname` = '$account_nickname', 
	`account_email` = '$account_email',
	`account_email_verified` = 'N',
	`account_username` = '$account_username',
	`account_password` = '$account_password',
	`account_main_number` = '$account_main_number',
	`account_phone_ext` = '$account_phone_ext',
	`account_mobilephone_number` = '$account_mobilephone_number',
    `dealer_id` = '$did',
    `website_url` = '$website_url',
    `sales_pitch` = '$sales_pitch',
    `prof_motto` = '$prof_motto',
    `prof_hometown` = '$prof_hometown', 
    `prof_sportsteam` = '$prof_sportsteam', 
    `prof_dreamvact` = '$prof_dreamvact', 
    `prof_favfood` = '$prof_favfood', 
    `prof_favtvshow` = '$prof_favtvshow', 
    `goal_monthly_monies_collect` = '$goal_monthly_monies_collect'
";

$run_create_account_sql = mysqli_query($idsconnection_mysqli, $create_account_sql);







}



include("inc.end.phpmsyql.php");

?>