<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/tracking.php'); ?>
<?php


if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Salesperson'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Salesperson'], $_SESSION['MM_SalespersonAccess'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit();
}
?>
<?php

$colname_userDets = "-1";
if (isset($_SESSION['MM_Salesperson'])) {
  $colname_userDets = $_SESSION['MM_Salesperson'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `idsids_idsdms`.`dealers`, `idsids_idsdms`.`sales_person` WHERE `sales_person`.`main_dealerid` = `dealers`.`id` AND `sales_person`.`salesperson_email` = '$colname_userDets'";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);

$sid = $row_userDets['salesperson_id']; //Hackishere
$did = $row_userDets['id']; //Hackishere

$loggedin_salespersons_name = $row_userDets['salesperson_firstname'].' '.$row_userDets['salesperson_lastname'];

$company = $row_userDets['company'];
$dealer_email = $row_userDets['email'];
$dealer_state = $row_userDets['state'];

// Start All For Time Zone

$dealerTimezone = $row_userDets['dealerTimezone'];

if($dealerTimezone){
$zone_from ='America/Chicago';
$zone_to= $dealerTimezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}
date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($cur_zone);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($req_zone);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}

// End All For Time Zone
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_state_taft = "SELECT * FROM `idsids_idsdms`.`states` WHERE `states`.`state_abrv` = '$dealer_state'";
$dealer_state_taft = mysqli_query($idsconnection_mysqli, $query_dealer_state_taft);
$row_dealer_state_taft = mysqli_fetch_assoc($dealer_state_taft);
$totalRows_dealer_state_taft = mysqli_num_rows($dealer_state_taft);
$dealer_tavt_state_link = $row_dealer_state_taft['dealer_tavt_state_link'];



include("../../Libary/token-generator.php");

?>