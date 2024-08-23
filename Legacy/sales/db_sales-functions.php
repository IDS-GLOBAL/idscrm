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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_one_creditapp")) {
  $insertSQL =  sprintf("INSERT INTO credit_app_fullblown (applicant_did, applicant_sid, applicant_vid, applicant_cid, applicant_clid, applicant_app_token, credit_app_type, credit_app_source, applicant_ssn, applicant_dob, applicant_titlename, applicant_fname, applicant_mname, applicant_lname, applicant_main_phone, applicant_cell_phone, applicant_present_address1, applicant_present_addr_city, applicant_present_addr_state, applicant_present_addr_zip, applicant_addr_years, applicant_addr_months, applicant_buy_own_rent_other, applicant_previous1_addr1, applicant_previous1_addr_city, applicant_previous1_addr_zip, applicant_previous1_live_years, applicant_previous1_live_months, applicant_employment_type, applicant_employment_status, applicant_employer1_name, applicant_employer1_addr, applicant_employer1_city, applicant_employer1_state, applicant_employer1_zip, applicant_employer1_phone, applicant_employer1_work_years, applicant_employer1_work_months, applicant_employer1_position, applicant_employer1_salary_bringhome, applicant_employer1_payday_freq, applicant_other_income_amount, applicant_other_income_source, applicant_other_income_when_rcvd, applicant_employer2_name, applicant_employer2_phone, applicant_employer2_work_years, applicant_employer2_work_months, applicant_employer2_position, applilcant_v_asset_type, applilcant_v_intendeduse, applilcant_v_neworused, applilcant_v_stockno, applilcant_v_vin, applilcant_v_year, applilcant_v_make, applilcant_v_model, applilcant_v_style, applilcant_v_inception_miles, applilcant_v_trade_year, applilcant_v_trade_make, applilcant_v_trade_model, applilcant_v_trade_lien_holder_name, applilcant_v_cashprice, applilcant_v_taxes, applilcant_v_doc_fees, title_lic_reg_other_fees, applilcant_v_cash_down, applilcant_v_rebate, applilcant_v_trade_allowance, applilcant_v_trade_owed, applilcant_v_gap, applilcant_v_srvc_contract, applilcant_v_credit_life, applilcant_v_disability, applilcant_v_financed_amount, applilcant_v_term_months, applilcant_v_cust_rate, applilcant_v_total_monthpmts_est, applilcant_v_wholesale_invoice, applilcant_v_msrp, applilcant_v_creditbureau_preferred, applicant_email_address) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['applicant_did'], "int"),
                       GetSQLValueString($_POST['applicant_sid'], "int"),
                       GetSQLValueString($_POST['applicant_vid'], "int"),
                       GetSQLValueString($_POST['applicant_cid'], "int"),
                       GetSQLValueString($_POST['applicant_clid'], "int"),
                       GetSQLValueString($_POST['applicant_app_token'], "text"),
                       GetSQLValueString($_POST['credit_app_type'], "int"),
                       GetSQLValueString($_POST['credit_app_source'], "text"),
                       GetSQLValueString($_POST['applicant_ssn'], "text"),
                       GetSQLValueString($_POST['applicant_dob'], "text"),
                       GetSQLValueString($_POST['applicant_titlename'], "text"),
                       GetSQLValueString($_POST['applicant_fname'], "text"),
                       GetSQLValueString($_POST['applicant_mname'], "text"),
                       GetSQLValueString($_POST['applicant_lname'], "text"),
                       GetSQLValueString($_POST['applicant_main_phone'], "text"),
                       GetSQLValueString($_POST['applicant_cell_phone'], "text"),
                       GetSQLValueString($_POST['applicant_present_address1'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_addr_years'], "text"),
                       GetSQLValueString($_POST['applicant_addr_months'], "text"),
                       GetSQLValueString($_POST['applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_employment_type'], "text"),
                       GetSQLValueString($_POST['applicant_employment_status'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_position'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_salary_bringhome'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_payday_freq'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_amount'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_source'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_when_rcvd'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_position'], "text"),
                       GetSQLValueString($_POST['applilcant_v_asset_type'], "text"),
                       GetSQLValueString($_POST['applilcant_v_intendeduse'], "text"),
                       GetSQLValueString($_POST['applilcant_v_neworused'], "text"),
                       GetSQLValueString($_POST['applilcant_v_stockno'], "text"),
                       GetSQLValueString($_POST['applilcant_v_vin'], "text"),
                       GetSQLValueString($_POST['applilcant_v_year'], "text"),
                       GetSQLValueString($_POST['applilcant_v_make'], "text"),
                       GetSQLValueString($_POST['applilcant_v_model'], "text"),
                       GetSQLValueString($_POST['applilcant_v_style'], "text"),
                       GetSQLValueString($_POST['applilcant_v_inception_miles'], "text"),
                       GetSQLValueString($_POST['applilcant_v_trade_year'], "text"),
                       GetSQLValueString($_POST['applilcant_v_trade_make'], "text"),
                       GetSQLValueString($_POST['applilcant_v_trade_model'], "text"),
                       GetSQLValueString($_POST['applilcant_v_trade_lien_holder_name'], "text"),
                       GetSQLValueString($_POST['applilcant_v_cashprice'], "text"),
                       GetSQLValueString($_POST['applilcant_v_taxes'], "text"),
                       GetSQLValueString($_POST['applilcant_v_doc_fees'], "text"),
                       GetSQLValueString($_POST['title_lic_reg_other_fees'], "text"),
                       GetSQLValueString($_POST['applilcant_v_cash_down'], "text"),
                       GetSQLValueString($_POST['applilcant_v_rebate'], "text"),
                       GetSQLValueString($_POST['applilcant_v_trade_allowance'], "text"),
                       GetSQLValueString($_POST['applilcant_v_trade_owed'], "text"),
                       GetSQLValueString($_POST['applilcant_v_gap'], "text"),
                       GetSQLValueString($_POST['applilcant_v_srvc_contract'], "text"),
                       GetSQLValueString($_POST['applilcant_v_credit_life'], "text"),
                       GetSQLValueString($_POST['applilcant_v_disability'], "text"),
                       GetSQLValueString($_POST['applilcant_v_financed_amount'], "text"),
                       GetSQLValueString($_POST['applilcant_v_term_months'], "text"),
                       GetSQLValueString($_POST['applilcant_v_cust_rate'], "text"),
                       GetSQLValueString($_POST['applilcant_v_total_monthpmts_est'], "text"),
                       GetSQLValueString($_POST['applilcant_v_wholesale_invoice'], "text"),
                       GetSQLValueString($_POST['applilcant_v_msrp'], "text"),
                       GetSQLValueString($_POST['applilcant_v_creditbureau_preferred'], "text"),
                       GetSQLValueString($_POST['applicant_email_address'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "app_manager.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $insertGoTo));
}


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ovrphngoal")) {
  $insertSQL =  sprintf("INSERT INTO cust_leads (cust_nickname, cust_phoneno, cust_dealer_id, cust_salesperson_id, cust_date_td) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_phoneno'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_salesperson_id'], "int"),
                       GetSQLValueString($_POST['cust_date_td'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "inventory.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $insertGoTo));
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
$sidmaindid = $row_userSets['main_dealerid'];
$did = $row_userSets['main_dealerid'];



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_years = "SELECT * FROM year_options ORDER BY year_id ASC";
$years = mysqli_query($idsconnection_mysqli, $query_years);
$row_years = mysqli_fetch_assoc($years);
$totalRows_years = mysqli_num_rows($years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states ORDER BY state_abrv ASC";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_months = "SELECT * FROM months ORDER BY month_id ASC";
$months = mysqli_query($idsconnection_mysqli, $query_months);
$row_months = mysqli_fetch_assoc($months);
$totalRows_months = mysqli_num_rows($months);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_didleads_notassigned = "SELECT * FROM cust_leads, vehicles WHERE cust_leads.cust_dealer_id = $sidmaindid AND cust_leads.cust_vehicle_id = vehicles.vid ORDER BY cust_leads.cust_lead_created_at DESC";
$didleads_notassigned = mysqli_query($idsconnection_mysqli, $query_didleads_notassigned);
$row_didleads_notassigned = mysqli_fetch_assoc($didleads_notassigned);
$totalRows_didleads_notassigned = mysqli_num_rows($didleads_notassigned);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_makes = "SELECT * FROM car_make";
$makes = mysqli_query($idsconnection_mysqli, $query_makes);
$row_makes = mysqli_fetch_assoc($makes);
$totalRows_makes = mysqli_num_rows($makes);

$colname_creditapp_id_did = "-1";
if (isset($_GET['credit_app_id'])) {
  $colname_creditapp_id_did = $_GET['credit_app_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_creditapp_id_did =  sprintf("SELECT * FROM credit_app_fullblown WHERE credit_app_fullblown.credit_app_fullblown_id = %s AND credit_app_fullblown.applicant_did = $sidmaindid", GetSQLValueString($colname_creditapp_id_did, "int"));
$creditapp_id_did = mysqli_query($idsconnection_mysqli, $query_creditapp_id_did);
$row_creditapp_id_did = mysqli_fetch_assoc($creditapp_id_did);
$totalRows_creditapp_id_did = mysqli_num_rows($creditapp_id_did);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_credit_apps = "SELECT * FROM credit_app_fullblown WHERE applicant_did = $sidmaindid ORDER BY application_created_date DESC";
$credit_apps = mysqli_query($idsconnection_mysqli, $query_credit_apps);
$row_credit_apps = mysqli_fetch_assoc($credit_apps);
$totalRows_credit_apps = mysqli_num_rows($credit_apps);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_spleads = "SELECT * FROM cust_leads WHERE cust_salesperson_id = $sid ORDER BY cust_lead_created_at DESC";
$spleads = mysqli_query($idsconnection_mysqli, $query_spleads);
$row_spleads = mysqli_fetch_assoc($spleads);
$totalRows_spleads = mysqli_num_rows($spleads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersoninventory = "SELECT * FROM vehicles WHERE vehicles.did = '$sidmaindid' AND vehicles.vlivestatus = '1'";
$salespersoninventory = mysqli_query($idsconnection_mysqli, $query_salespersoninventory);
$row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory);
$totalRows_salespersoninventory = mysqli_num_rows($salespersoninventory);
?>
<?php
//include('../Libary/functionShowVehiclePhoto.php');

include('../Libary/functionShowVehiclePhotoOnly.php');

include('../Libary/token-generator.php');

include('../Libary/functionSalesPersonNotification.php');


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records


?>
<!--
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

</body>
</html>
-->