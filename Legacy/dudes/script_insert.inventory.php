<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 



$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_faith";
$password_tracking = "benjamin2831";
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 




$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";

$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 








?><?php
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
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
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
?>
<?php


$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM idsids_idsdms.dudes WHERE dudes_username = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];


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


if(!$_POST) exit;

print_r($_POST);

if(isset($_POST['token'], $_POST['vvin'], $_POST['vmileage'], $_POST['vstockno'], $_POST['vin_year'], $_POST['vin_make'], $_POST['vmodel'], $_POST['vtrim'], $_POST['vinlength'])):



$token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['token'])); 


if(isset($_POST['thisdid'])){
$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid'])); 
$insert_vehicle_did = "`did` = '$thisdid',";

$redirect_dlr_url = "dealer.php?sysdlrid=$thisdid";
}


if(isset($_POST['prospctdlrid'])){
$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
$insert_vehicle_did = "`prospctdlrid` = '$prospctdlrid',";
$redirect_dlr_url = "prospect.dealer.php?prospctdlrid=$prospctdlrid";

}


$vvin = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));
$vvin = strtoupper($vvin);
$vmileage = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmileage'])); 
$vstockno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vstockno'])); 
$vin_year = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vin_year'])); 
$vin_make = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vin_make'])); 
$vmodel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmodel'])); 
$vtrim = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vtrim'])); 
$vinlength = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vinlength']));









if (mysql_errno() == 1062) {
    //print 'no way!';

}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_found_vehicle = "SELECT * FROM vehicles WHERE `vehicles`.`vvin` = '$vvin'";
$found_vehicle = mysqli_query($idsconnection_mysqli, $query_found_vehicle);
$row_found_vehicle = mysqli_fetch_array($found_vehicle);
$totalRows_found_vehicle = mysqli_num_rows($found_vehicle);

$found_vid = $row_found_vehicle['vid'];

$vtoken = $row_found_vehicle['vtoken'];


$vehicle_did = $row_found_vehicle['did'];

$vehicle_prospctdlrid = $row_found_vehicle['prospctdlrid'];




//echo 'See Me On script_insertupdate.inventory.php';

//echo '<br />';



$update_vehicle_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
	$insert_vehicle_did 
	`vvin` = '$vvin',
	`vstockno` = '$vstockno',
	`vmileage` = '$vmileage',
	`vyear` = '$vin_year',
	`vmake` = '$vin_make',
	`vmodel` = '$vmodel',
	`vtrim` = '$vtrim',
WHERE
	`vehicles`.`vid` = '$found_vid';
";

//echo '<br />';
//echo '<br />';
//echo '<br />';



$insert_vehicle_sql = "
		INSERT `idsids_idsdms`.`vehicles` SET
				`vtoken` = '$token',
				$insert_vehicle_did
				`vvin` = '$vvin',
				`vstockno` = '$vstockno',
				`vmileage` = '$vmileage',
				`vyear` = '$vin_year',
				`vmake` = '$vin_make',
				`vmodel` = '$vmodel',
				`vtrim` = '$vtrim',
				`vcondition` = '$vcondition'
";








if(!$found_vid){
	
		// echo 'No Found ID';
		// echo $insert_vehicle_sql;
		$result_insert_vehicle_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_sql);

		//$result_insert_vehicle_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_sql);
		
		echo "<script> window.location.href = '$redirect_dlr_url'; </script>";

}else{

		if($vehicle_did == $did||$vehicle_prospctdlrid == $prospctdlrid){
	
		//echo 'Found ID Updated';
		//$result_update_vehicle_sql = mysqli_query($idsconnection_mysqli, $update_vehicle_sql);
		
		echo "<script> alert('Alert 1 FOUND ID UPDATED'); </script>";
		
		}else{
		
		echo "<script> alert('Alert 2 NO FIND INSERTED'); </script>";

		}



}

// Take To Transfer Or Internal Edit If vehicles.did belongs to dealer.id



	

endif;

?>