<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection);



$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_dudes";
$password_tracking = "VL&4v!PnvWug";
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking, $database_tracking); 



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





?>
<?php
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


$currentPage = $_SERVER["PHP_SELF"];

$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);

foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

?>
<?php

$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";
?>
<?php

	// Get the ID From The Previous Page
	// Track What Was Changed And By Who
	// Insert Record Into Activity
	// Create If Don't Exisit A Folder
	//      Folder For Photos
	//		Folder For CGI BIN LEADS XML
	//      Folder For Creating 
	
	
	
	$inertDudeActivityStr = "INSERT INTO `idsids_tracking_idsvehicles`.`dudes_activity` (`dudes_dlr_actid`, `dudes_dlr_did`, `dudes_dlr_did_prospctid`, `dudes_dlr_dude_id`, `dudes_dlr_dude_name`, `dudes_dlr_body`, `dudes_dlr_created_at`) VALUES (NULL, '', '', '$dudesid', '$myname', '$myname Logged out', CURRENT_TIMESTAMP)";
//$inertDudeActivityStr = mysql_real_escape_string($inertDudeActivityStr);
	
$result = mysqli_query($idsconnection_mysqli, $inertDudeActivityStr);
	
	
	
	
	
	//header("Location: dealer-prospect-update.php?dealer=$id");


?>
<?php
// *** Logout the current user.
$logoutGoTo = "index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Usernamemobi'] = NULL;
$_SESSION['MM_UserGroupmobi'] = NULL;
unset($_SESSION['MM_Usernamemobi']);
unset($_SESSION['MM_UserGroupmobi']);
unset($_SESSION['PrevUrl']);
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() -42000,
  $params["path"], $params["domain"],
  $params["secure"], $params["httponly"]);
session_destroy();
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>