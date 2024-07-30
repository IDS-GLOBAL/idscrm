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
$query_userSets =  "SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);
$sid = $row_userSets['salesperson_id'];
$sidmaindid = $row_userSets['main_dealerid'];
$did = $row_userSets['main_dealerid'];

foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1' ORDER BY vehicles.created_at, vehicles.vstockno DESC ";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_person = "SELECT * FROM sales_person WHERE main_dealerid = '$did' ORDER BY created_at DESC";
$sales_person = mysqli_query($idsconnection_mysqli, $query_sales_person);
$row_sales_person = mysqli_fetch_assoc($sales_person);
$totalRows_sales_person = mysqli_num_rows($sales_person);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_five_minuteoptions = "SELECT * FROM time_minutes_5";
$five_minuteoptions = mysqli_query($idsconnection_mysqli, $query_five_minuteoptions);
$row_five_minuteoptions = mysqli_fetch_assoc($five_minuteoptions);
$totalRows_five_minuteoptions = mysqli_num_rows($five_minuteoptions);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_year_options = "SELECT * FROM year_options";
$year_options = mysqli_query($idsconnection_mysqli, $query_year_options);
$row_year_options = mysqli_fetch_assoc($year_options);
$totalRows_year_options = mysqli_num_rows($year_options);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_month_options = "SELECT * FROM months_options";
$month_options = mysqli_query($idsconnection_mysqli, $query_month_options);
$row_month_options = mysqli_fetch_assoc($month_options);
$totalRows_month_options = mysqli_num_rows($month_options);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_email_template = "SELECT * FROM email_dealer_templates_types, email_dealer_templates WHERE email_dealer_templates.email_dealer_templates_type = email_dealer_templates_types.id  AND email_dealer_templates.email_dealer_templates_did = $did";
$dealer_email_template = mysqli_query($idsconnection_mysqli, $query_dealer_email_template);
$row_dealer_email_template = mysqli_fetch_assoc($dealer_email_template);
$totalRows_dealer_email_template = mysqli_num_rows($dealer_email_template);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_one_houroptions = "SELECT * FROM time_hours_1";
$one_houroptions = mysqli_query($idsconnection_mysqli, $query_one_houroptions);
$row_one_houroptions = mysqli_fetch_assoc($one_houroptions);
$totalRows_one_houroptions = mysqli_num_rows($one_houroptions);

$colname_findCustomer = "-1";
if (isset($_GET['customerid'])) {
  $colname_findCustomer = $_GET['customerid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_findCustomer =  "SELECT * FROM customers WHERE customer_id = %s", GetSQLValueString($colname_findCustomer, "int"));
$findCustomer = mysqli_query($idsconnection_mysqli, $query_findCustomer);
$row_findCustomer = mysqli_fetch_assoc($findCustomer);
$totalRows_findCustomer = mysqli_num_rows($findCustomer);
$phoneno = $row_findCustomer['customer_phoneno'];
$leademail = $row_findCustomer['customer_email'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons = "SELECT * FROM sales_person WHERE main_dealerid = '$did'";
$salespersons = mysqli_query($idsconnection_mysqli, $query_salespersons);
$row_salespersons = mysqli_fetch_assoc($salespersons);
$totalRows_salespersons = mysqli_num_rows($salespersons);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_Managers = "SELECT * FROM manager_person WHERE dealer_id =  '$did' ORDER BY manager_lastname ASC";
$Managers = mysqli_query($idsconnection_mysqli, $query_Managers);
$row_Managers = mysqli_fetch_assoc($Managers);
$totalRows_Managers = mysqli_num_rows($Managers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_customerOtherLeads = "SELECT * FROM `cust_leads`  WHERE `cust_phoneno`='$phoneno' OR `cust_mobilephone`='$phoneno' OR `cust_email` ='$leademail'";
$customerOtherLeads = mysqli_query($idsconnection_mysqli, $query_customerOtherLeads);
$row_customerOtherLeads = mysqli_fetch_assoc($customerOtherLeads);
$totalRows_customerOtherLeads = mysqli_num_rows($customerOtherLeads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_income_intervals = "SELECT * FROM credit_app_income_intervals";
$income_intervals = mysqli_query($idsconnection_mysqli, $query_income_intervals);
$row_income_intervals = mysqli_fetch_assoc($income_intervals);
$totalRows_income_intervals = mysqli_num_rows($income_intervals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_customerNotes = "SELECT * FROM customer_notes ORDER BY note_created DESC";
$customerNotes = mysqli_query($idsconnection_mysqli, $query_customerNotes);
$row_customerNotes = mysqli_fetch_assoc($customerNotes);
$totalRows_customerNotes = mysqli_num_rows($customerNotes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastCustomerNo = "SELECT customer_id, customer_leads_id, customer_no, customer_dealer_id FROM customers WHERE customer_dealer_id = $did ORDER BY customer_no DESC";
$lastCustomerNo = mysqli_query($idsconnection_mysqli, $query_lastCustomerNo);
$row_lastCustomerNo = mysqli_fetch_assoc($lastCustomerNo);
$totalRows_lastCustomerNo = mysqli_num_rows($lastCustomerNo);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastcustomerOnly = "SELECT * FROM customers WHERE customer_dealer_id = '$did' ORDER BY customer_created_at DESC LIMIT 1";
$lastcustomerOnly = mysqli_query($idsconnection_mysqli, $query_lastcustomerOnly);
$row_lastcustomerOnly = mysqli_fetch_assoc($lastcustomerOnly);
$totalRows_lastcustomerOnly = mysqli_num_rows($lastcustomerOnly);

$lastCustomerid = $row_lastcustomerOnly['customer_id'];

$lastno = $row_lastCustomerNo['customer_no'];

if(!$lastno){
	$lastno = 1000;
}else{
	$lastno = ($lastno + 1);
}



$updateCustomerNo =  "UPDATE `idsids_idsdms`.`customers`
							SET
							`customers`.`customer_no` = '$lastno'
						   WHERE
							`customers`.`customer_dealer_id` = '$did' AND 						   
							`customers`.`customer_id` = '$lastCustomerid' 
						   LIMIT 1
							
					";
//$resultCustomerNo = mysqli_query($idsconnection_mysqli, "$updateCustomerNo");

//echo $updateCustomerNo;

//echo '<br>';
//echo $lastno;

//$id = $_GET['customer_id'];

	header("Location: customer-update.php?customerid=$lastCustomerid");

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($lastcustomerOnly);
?>
