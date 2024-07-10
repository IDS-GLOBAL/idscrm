<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 



$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_dudes";
$password_tracking = "VL&4v!PnvWug";
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking , $password_tracking, $database_tracking); 



$hostname_idschatconnection = "localhost";
$database_idschatconnection = "idsids_idschat";
$username_idschatconnection = "idsids_crft1";
$password_idschatconnection = "dmsKBO6xqWMzt2";
$idschatconnection_mysqli = mysqli_connect($hostname_idschatconnection, $username_idschatconnection, $password_idschatconnection, $database_idschatconnection); 




$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection); 



# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
chdir(dirname(__FILE__));
$hostname_idschatconnection = "localhost";
$database_idschatconnection = "idsids_idschat";
$username_idschatconnection = "idsids_crft1";
$password_idschatconnection = "dmsKBO6xqWMzt2";
$idschatconnection_mysqli = mysqli_connect($hostname_idschatconnection, $username_idschatconnection, $password_idschatconnection, $database_idschatconnection); 






if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Usernamemobi'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Usernamemobi'], $_SESSION['MM_UserGroupmobi'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}


$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];

$dudes_super = $row_userDudes['dudes_super'];

$dudes_public_token  = $row_userDudes['dudes_public_token'];
$dudes_facebook_id = $row_userDudes['dudes_facebook_id'];

$dudes_facebook_deny  = $row_userDudes['dudes_facebook_deny'];
$dudes_facebook_email  = $row_userDudes['dudes_facebook_email'];
$dudes_facebook_name  = $row_userDudes['dudes_facebook_name'];

$dudes_dob = $row_userDudes['dudes_dob'];

$dudes_prefix_name  = $row_userDudes['dudes_prefix_name'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";

$dealerTimezone = $row_userDudes['dudes_Timezone'];


$dudes_dob  = $row_userDudes['dudes_dob'];
$dudes_status  = $row_userDudes['dudes_status'];


$dudes_access_level  = $row_userDudes['dudes_access_level'];
$dudes_skillset_id = $row_userDudes['dudes_skillset_id'];

$dudes_email_internal = $row_userDudes['dudes_email_internal'];

$dudes_email_internal_verified  = $row_userDudes['dudes_email_internal_verified'];
$dudes_email_internal_active  = $row_userDudes['dudes_email_internal_active'];
$dudes_home_state = $row_userDudes['dudes_home_state'];
$dudes_email_personal = $row_userDudes['dudes_email_personal'];
$dudes_email_personal_verified  = $row_userDudes['dudes_email_personal_verified'];
$dudes_jobposition_title  = $row_userDudes['dudes_jobposition_title'];
$dudes_jobposition_shift  = $row_userDudes['dudes_jobposition_shift'];

$dudes_team_id  = $row_userDudes['dudes_team_id'];
$dudes_team_name  = $row_userDudes['dudes_team_name'];
$dudes_dma_id  = $row_userDudes['dudes_dma_id'];
$dudes_dma_name  = $row_userDudes['dudes_dma_name'];
$dudes_market_id = $row_userDudes['dudes_market_id'];
$dudes_market_id  = $row_userDudes['dudes_market_id'];
$dudes_market_name  = $row_userDudes['dudes_market_name'];
$dudes_submarket_id  = $row_userDudes['dudes_submarket_id'];
$dudes_submarket_name  = $row_userDudes['dudes_submarket_name'];
$dudes_department_id  = $row_userDudes['dudes_department_id'];
$dudes_department_name  = $row_userDudes['dudes_department_name'];
$dudes_salespitch_template_id  = $row_userDudes['dudes_salespitch_template_id'];
$dudes_cellphone  = $row_userDudes['dudes_cellphone'];
$dudes_workphone_active  = $row_userDudes['dudes_workphone_active'];

$dudes_Timezone = $row_userDudes['dudes_Timezone'];

if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
}


if($dealerTimezone){
$zone_from ='America/Chicago';
$zone_to= $dealerTimezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}
//date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
	global $zone_from;
	global $zone_to;

    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_from);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_to);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}

function get_Datetime_Now() {
	
	global $zone_to;
	
	$tz_object = new DateTimeZone($zone_to);
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}

$timevar = get_Datetime_Now();




$server_time = zone_conversion_date($timevar, $zone_from, $zone_to);




// To Find A Sing Dealer 
$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_dealer_query'";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);

$thisdid = $colname_dealer_query;
$dealer_email = "";

if($row_dealer_query['id']){
  $thisdid = $row_dealer_query['id'];
  $dealer_email = $row_dealer_query['email'];
}





$colname_prspct_dealers = "-1";
if (isset($_GET['dlr_prspct'])) {
  $colname_prspct_dealers = $_GET['dlr_prspct'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_prspct_dealers =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealer_prospects`.`id` = '$colname_prspct_dealers' ORDER BY `dealer_prospects`.`state` ASC";
$prspct_dealers = mysqli_query($tracking_mysqli, $query_prspct_dealers);
$row_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$totalRows_prspct_dealers = mysqli_fetch_array($prspct_dealers);


$state_prospect = $colname_prspct_dealers;
$dlr_prspct_id = $colname_prspct_dealers;

if($row_prspct_dealers['id']){
  $dlr_prspct_id = $row_prspct_dealers['id'];
}


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullscript_options = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_status` = '1'";
$pullscript_options = mysqli_query($tracking_mysqli, $query_pullscript_options);
$row_pullscript_options = mysqli_fetch_array($pullscript_options);
$totalRows_pullscript_options = mysqli_num_rows($pullscript_options);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM `idsids_idsdms`.`dealers_pending` ORDER BY `dealers_pending`.`id` DESC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_dlrtickets = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` ORDER BY `ticket_submit_dlr`.`ticket_id` DESC";
$dlrtickets = mysqli_query($idsconnection_mysqli, $query_dlrtickets);
$row_dlrtickets = mysqli_fetch_array($dlrtickets);
$totalRows_dlrtickets = mysqli_num_rows($dlrtickets);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_dudes_sys_template_cat = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` ORDER BY `dudes_sys_template_cats`.`sys_template_cat_type_label` ASC";
$dudes_sys_template_cat = mysqli_query($tracking_mysqli, $query_dudes_sys_template_cat);
$row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat);
$totalRows_dudes_sys_template_cat = mysqli_num_rows($dudes_sys_template_cat);


//  Took out this line global templates for now:      WHERE `email_systm_templates_dudeid` = '$dudesid' 
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_template_types = "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `dudes_sys_htmlemail_templates`.`email_systm_templates_status`= '1' ORDER BY `dudes_sys_htmlemail_templates`.`email_systm_templates_subject` ASC";
$dealer_template_types = mysqli_query($idsconnection_mysqli, $query_dealer_template_types);
$row_dealer_template_types = mysqli_fetch_array($dealer_template_types);
$totalRows_dealer_template_types = mysqli_num_rows($dealer_template_types);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_template_types_inactive = "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `email_systm_templates_status` NOT IN (1) ORDER BY `email_systm_templates_subject` ASC";
$dealer_template_types_inactive = mysqli_query($idsconnection_mysqli, $query_dealer_template_types_inactive);
$row_dealer_template_types_inactive = mysqli_fetch_array($dealer_template_types_inactive);
$totalRows_dealer_template_types_inactive = mysqli_num_rows($dealer_template_types_inactive);




include("../Libary/sessioncookies.php");
include("../Libary/token-generator.php");


$onpage_current = $_SERVER['PHP_SELF'];
$onpage_current = str_replace('/idscrm/dudes/', '', $onpage_current);

//$currentPage = $onpage_current;


?>
