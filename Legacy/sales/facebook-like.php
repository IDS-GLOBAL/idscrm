<?php require_once('../Connections/idsconnection.php'); ?>
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
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
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
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_userSets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userSets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userSets =  sprintf("SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);
$sid = $row_userSets['salesperson_id'];
$sidmainid = $row_userSets['main_dealerid'];

$maxRows_spleads = 10;
$pageNum_spleads = 0;
if (isset($_GET['pageNum_spleads'])) {
  $pageNum_spleads = $_GET['pageNum_spleads'];
}
$startRow_spleads = $pageNum_spleads * $maxRows_spleads;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_spleads = "SELECT * FROM cust_leads WHERE cust_salesperson_id = $sid ORDER BY cust_lead_created_at DESC";
$query_limit_spleads =  sprintf("%s LIMIT %d, %d", $query_spleads, $startRow_spleads, $maxRows_spleads);
$spleads = mysqli_query($idsconnection_mysqli, $query_limit_spleads);
$row_spleads = mysqli_fetch_assoc($spleads);

if (isset($_GET['totalRows_spleads'])) {
  $totalRows_spleads = $_GET['totalRows_spleads'];
} else {
  $all_spleads = mysqli_query($idsconnection_mysqli, $query_spleads);
  $totalRows_spleads = mysqli_num_rows($all_spleads);
}
$totalPages_spleads = ceil($totalRows_spleads/$maxRows_spleads)-1;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_didleads_notassigned = "SELECT * FROM cust_leads, vehicles WHERE cust_leads.cust_dealer_id = $sidmainid AND cust_leads.cust_vehicle_id = vehicles.vid ORDER BY cust_leads.cust_lead_created_at DESC";
$didleads_notassigned = mysqli_query($idsconnection_mysqli, $query_didleads_notassigned);
$row_didleads_notassigned = mysqli_fetch_assoc($didleads_notassigned);
$totalRows_didleads_notassigned = mysqli_num_rows($didleads_notassigned);

$colname_spQueryLead = "-1";
if (isset($_GET['leadid'])) {
  $colname_spQueryLead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_spQueryLead =  sprintf("SELECT * FROM cust_leads WHERE cust_leadid = %s", GetSQLValueString($colname_spQueryLead, "int"));
$spQueryLead = mysqli_query($idsconnection_mysqli, $query_spQueryLead);
$row_spQueryLead = mysqli_fetch_assoc($spQueryLead);
$totalRows_spQueryLead = mysqli_num_rows($spQueryLead);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_states = "SELECT * FROM states";
$query_states = mysqli_query($idsconnection_mysqli, $query_query_states);
$row_query_states = mysqli_fetch_assoc($query_states);
$totalRows_query_states = mysqli_num_rows($query_states);



foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records

?>
<!DOCTYPE HTML>
<html>
    <head>
      <title>My Great Web page</title>
    </head>
    <body>
       <iframe src="https://www.facebook.com/plugins/like.php?href=YOUR_URL"
        scrolling="no" frameborder="0"
        style="border:none; width:450px; height:80px"></iframe>
    </body>
 </html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($spleads);

mysqli_free_result($didleads_notassigned);

mysqli_free_result($spQueryLead);

mysqli_free_result($query_states);

?>
