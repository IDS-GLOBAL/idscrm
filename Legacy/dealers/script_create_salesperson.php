<?php

include("db_loggedin.php");

if(isset($_POST['position_title'], $_POST['salesperson_department_id'], $_POST['team_id'], $_POST['salesperson_catchleads'], $_POST['salesperson_firstname'], $_POST['salesperson_lastname'], $_POST['salesperson_nickname'], $_POST['salesperson_email'], $_POST['salesperson_username'], $_POST['salesperson_password'], $_POST['salesperson_mobilephone_number'], $_POST['website_url'], $_POST['sales_pitch'], $_POST['prof_motto'], $_POST['prof_hometown'], $_POST['prof_sportsteam'], $_POST['prof_dreamvact'], $_POST['prof_favfood'], $_POST['prof_favtvshow'], $_POST['goal_cars_monthly'], $_POST['goal_appts_monthly'])){
	
echo 'I made it ';

$colname_check_salesperson_email = "-1";
if (isset($_POST['salesperson_email'])) {
  $colname_check_salesperson_email = $_POST['salesperson_email'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_check_salesperson_email =  "SELECT * FROM `idsids_idsdms`.sales_person WHERE salesperson_email = '$colname_check_salesperson_email'";
$check_salesperson_email = mysqli_query($idsconnection_mysqli, $query_check_salesperson_email);
$row_check_salesperson_email = mysqli_fetch_assoc($check_salesperson_email);
$totalRows_check_salesperson_email = mysqli_num_rows($check_salesperson_email);

if($totalRows_check_salesperson_email > 0){echo 'Match Already Found Preventing Hack!'; exit(); };


$position_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['position_title']));
$salesperson_department_id= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_department_id']));
$team_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['team_id']));
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

echo $create_salesperson_sql ="
INSERT INTO `idsids_idsdms`.`sales_person` SET
	`position_title` = '$position_title',
	`salesperson_department_id` = '$salesperson_department_id', 
    `team_id` = '$team_id',
    `salesperson_catchleads` = '$salesperson_catchleads',
    `salesperson_firstname` = '$salesperson_firstname', 
    `salesperson_lastname` = '$salesperson_lastname', 
    `salesperson_nickname` = '$salesperson_nickname', 
    `salesperson_email` = '$salesperson_email',
	`salesperson_email_verified` = '0',
    `salesperson_username` = '$salesperson_username', 
    `salesperson_password` = '$salesperson_password', 
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
";

$run_create_sales_person_sql = mysqli_query($idsconnection_mysqli, $create_salesperson_sql);







}





?>