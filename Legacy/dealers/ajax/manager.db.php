<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 



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
if (!((isset($_SESSION['MM_Managerperson'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Managerperson'], $_SESSION['MM_ManagerpersonAccess'])))) {   
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

$colname_userDets = "-1";
if (isset($_SESSION['MM_Managerperson'])) {
  $colname_userDets = $_SESSION['MM_Managerperson'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `idsids_idsdms`.`dealers`, `idsids_idsdms`.`manager_person` WHERE `dealers`.`id` = `manager_person`.`dealer_id` AND `manager_person`.`manager_email` = '$colname_userDets'";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);

$mgrid = $row_userDets['manager_id']; //Hackishere
$did = $row_userDets['dealer_id']; //Hackishere

$loggedin_managerpersons_name = $row_userDets['manager_firstname'].' '.$row_userDets['manager_lastname'];

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



include("../../Libary/token-generator.php");

?>