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
  $insertSQL =  "INSERT INTO credit_app_fullblown (applicant_did, applicant_sid, applicant_app_token, joint_or_invidividual, credit_app_type, credit_app_source, applicant_driver_licenses_number, applicant_driver_state_issued, applicant_ssn, applicant_dob, applicant_titlename, applicant_fname, applicant_mname, applicant_lname, applicant_main_phone, applicant_cell_phone, applicant_present_address1, applicant_present_address2, applicant_present_addr_city, applicant_present_addr_state, applicant_present_addr_zip, applicant_present_addr_county, applicant_addr_years, applicant_addr_months, applicant_addr_landlord_mortg, applicant_buy_own_rent_other, applicant_house_payment, applicant_previous1_addr1, applicant_previous1_addr2, applicant_previous1_addr_city, applicant_previous1_addr_state, applicant_previous1_addr_zip, applicant_previous1_live_years, applicant_previous1_live_months, applicant_employment_type, applicant_employment_status, applicant_employer1_name, applicant_employer1_phone, applicant_employer1_work_years, applicant_employer1_work_months, applicant_employer1_position, applicant_employer1_salary_bringhome, applicant_employer1_payday_freq, applicant_other_income_amount, applicant_other_income_source, applicant_other_income_when_rcvd, applicant_employer2_name, applicant_employer2_addr, applicant_employer2_addr2, applicant_employer2_city, applicant_employer2_state, applicant_employer2_zip, applicant_employer2_phone, applicant_employer2_work_years, applicant_employer2_work_months, applicant_employer2_position, co_applicant_titlename, co_applicant_fname, co_applicant_mname, co_applicant_lname, co_applicant_dob, co_applicant_ssn, co_applicant_driver_licenses_no, co_applicant_driver_licenses_state, co_applicant_home_phone, co_applicant_cell_phone, co_applicant_email, co_applicant_present_addr1, co_applicant_present_addr2, co_applicant_present_addr_city, co_applicant_present_addr_state, co_applicant_present_addr_zip, co_applicant_home_pymt, co_applicant_present_addr_county, co_applicant_present_addr_live_years, co_applicant_present_addr_live_months, co_applicant_previous1_addr1, co_applicant_previous1_addr2, co_applicant_previous1_addr_city, co_applicant_previous1_addr_state, co_applicant_previous1_addr_zip, co_applicant_previous1_live_years, co_applicant_previous1_live_months, co_applicant_buy_own_rent_other, co_applicant_employment_type, co_applicant_employment_status, co_applicant_employer_position, co_applicant_employer_name, co_applicant_employer_phone, co_applicant_employer_work_months, co_applicant_employer_work_years, co_applicant_income_source, co_applicant_other_income_amount, co_applicant_other_income_when_rcvd, co_applicant_income_bringhome, co_applicant_payday_frequency, co_applicant_employer2_name, co_applicant_employer2_work_years, co_applicant_employer2_work_months, co_applicant_addr_landlord_mortg, co_applicant_employer2_addr, co_applicant_employer2_addr2, co_applicant_employer2_city, co_applicant_employer2_state, co_applicant_employer2_zip, co_applicant_employer2_position, co_applicant_employer2_phone, applilcant_v_asset_type, applilcant_v_intendeduse, applilcant_v_neworused, applilcant_v_stockno, applilcant_v_vin, applilcant_v_year, applilcant_v_make, applilcant_v_model, applilcant_v_style, applilcant_v_inception_miles, applilcant_v_trade_year, applilcant_v_trade_make, applilcant_v_trade_model, applilcant_v_trade_vin, applilcant_v_trade_lien_holder_name, applilcant_v_cashprice, applilcant_v_taxes, applilcant_v_doc_fees, title_lic_reg_other_fees, applilcant_v_cash_down, applilcant_v_rebate, applilcant_v_trade_allowance, applilcant_v_trade_owed, applilcant_v_gap, applilcant_v_srvc_contract, applilcant_v_credit_life, applilcant_v_disability, applilcant_v_financed_amount, applilcant_v_term_months, applilcant_v_cust_rate, applilcant_v_total_monthpmts_est, applilcant_v_wholesale_invoice, applilcant_v_msrp, applilcant_v_creditbureau_preferred, applicant_email_address) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['applicant_did'], "int"),
                       GetSQLValueString($_POST['applicant_sid'], "int"),
                       GetSQLValueString($_POST['applicant_app_token'], "text"),
                       GetSQLValueString($_POST['joint_or_invidividual'], "int"),
                       GetSQLValueString($_POST['credit_app_type'], "int"),
                       GetSQLValueString($_POST['credit_app_source'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_number'], "text"),
                       GetSQLValueString($_POST['applicant_driver_state_issued'], "text"),
                       GetSQLValueString($_POST['applicant_ssn'], "text"),
                       GetSQLValueString($_POST['applicant_dob'], "text"),
                       GetSQLValueString($_POST['applicant_titlename'], "text"),
                       GetSQLValueString($_POST['applicant_fname'], "text"),
                       GetSQLValueString($_POST['applicant_mname'], "text"),
                       GetSQLValueString($_POST['applicant_lname'], "text"),
                       GetSQLValueString($_POST['applicant_main_phone'], "text"),
                       GetSQLValueString($_POST['applicant_cell_phone'], "text"),
                       GetSQLValueString($_POST['applicant_present_address1'], "text"),
                       GetSQLValueString($_POST['applicant_present_address2'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['applicant_addr_years'], "text"),
                       GetSQLValueString($_POST['applicant_addr_months'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_mortg'], "text"),
                       GetSQLValueString($_POST['applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['applicant_house_payment'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_employment_type'], "text"),
                       GetSQLValueString($_POST['applicant_employment_status'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_name'], "text"),
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
                       GetSQLValueString($_POST['applicant_employer2_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_position'], "text"),
                       GetSQLValueString($_POST['co_applicant_titlename'], "text"),
                       GetSQLValueString($_POST['co_applicant_fname'], "text"),
                       GetSQLValueString($_POST['co_applicant_mname'], "text"),
                       GetSQLValueString($_POST['co_applicant_lname'], "text"),
                       GetSQLValueString($_POST['co_applicant_dob'], "text"),
                       GetSQLValueString($_POST['co_applicant_ssn'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_no'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_cell_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_email'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr1'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_pymt'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_years'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_months'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_addr_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_addr_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_addr_zip'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['co_applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['co_applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['co_applicant_employment_type'], "text"),
                       GetSQLValueString($_POST['co_applicant_employment_status'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_position'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_work_months'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_work_years'], "int"),
                       GetSQLValueString($_POST['co_applicant_income_source'], "text"),
                       GetSQLValueString($_POST['co_applicant_other_income_amount'], "text"),
                       GetSQLValueString($_POST['co_applicant_other_income_when_rcvd'], "text"),
                       GetSQLValueString($_POST['co_applicant_income_bringhome'], "text"),
                       GetSQLValueString($_POST['co_applicant_payday_frequency'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_work_years'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_work_months'], "text"),
                       GetSQLValueString($_POST['co_applicant_addr_landlord_mortg'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_addr'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_zip'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_position'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer2_phone'], "text"),
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
                       GetSQLValueString($_POST['applilcant_v_trade_vin'], "text"),
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
  header( "Location: %s", $insertGoTo));
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
$sidmainid = $row_userSets['main_dealerid'];
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
$query_months = "SELECT * FROM months_options ORDER BY month_id ASC";
$months = mysqli_query($idsconnection_mysqli, $query_months);
$row_months = mysqli_fetch_assoc($months);
$totalRows_months = mysqli_num_rows($months);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_didleads_notassigned = "SELECT * FROM cust_leads, vehicles WHERE cust_leads.cust_dealer_id = $sidmainid AND cust_leads.cust_vehicle_id = vehicles.vid ORDER BY cust_leads.cust_lead_created_at DESC";
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
$query_creditapp_id_did =  "SELECT * FROM credit_app_fullblown WHERE credit_app_fullblown.credit_app_fullblown_id = %s AND credit_app_fullblown.applicant_did = $sidmainid", GetSQLValueString($colname_creditapp_id_did, "int"));
$creditapp_id_did = mysqli_query($idsconnection_mysqli, $query_creditapp_id_did);
$row_creditapp_id_did = mysqli_fetch_assoc($creditapp_id_did);
$totalRows_creditapp_id_did = mysqli_num_rows($creditapp_id_did);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_car_years = "SELECT * FROM car_years ORDER BY car_year DESC";
$car_years = mysqli_query($idsconnection_mysqli, $query_car_years);
$row_car_years = mysqli_fetch_assoc($car_years);
$totalRows_car_years = mysqli_num_rows($car_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_income_intervals = "SELECT * FROM credit_app_income_intervals ORDER BY income_interval_id ASC";
$income_intervals = mysqli_query($idsconnection_mysqli, $query_income_intervals);
$row_income_intervals = mysqli_fetch_assoc($income_intervals);
$totalRows_income_intervals = mysqli_num_rows($income_intervals);

?>
<?php
include('../Libary/functionShowVehiclePhoto.php');


include('../Libary/functionSalesPersonNotification.php');

include('../Libary/token-generator.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Application Manager</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script language="JavaScript" SRC="calendar/calendar.js"></script>
<script language="JavaScript" SRC="js/idsSalesperson.js"></script>
<script language="JavaScript">

	var cal = new CalendarPopup();

</script>

<script language="JavaScript">
<!--
function showpay() {
 if ((document.form_one_creditapp.applilcant_v_financed_amount.value == null || document.form_one_creditapp.applilcant_v_financed_amount.value.length == 0) ||
     (document.form_one_creditapp.applilcant_v_term_months.value == null || document.form_one_creditapp.applilcant_v_term_months.value.length == 0)
||
     (document.form_one_creditapp.applilcant_v_cust_rate.value == null || document.form_one_creditapp.applilcant_v_cust_rate.value.length == 0))
 { document.form_one_creditapp.applilcant_v_total_monthpmts_est.value = "Incomplete data";
 }
 else
 {
 var princ = document.form_one_creditapp.applilcant_v_financed_amount.value;
 var term  = document.form_one_creditapp.applilcant_v_term_months.value;
 var intr   = document.form_one_creditapp.applilcant_v_cust_rate.value / 1200;
 //document.form_one_creditapp.applilcant_v_total_monthpmts_est.value = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));
 document.form_one_creditapp.applilcant_v_total_monthpmts_est.value = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
 }

 //payment = principle * monthly interest/(1 - (1/(1+MonthlyInterest)*Months))

}

// -->
</script>



<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

<!-- HEADER -->

	<?php include('parts/top-header.php'); ?>
    
    
    
    
    
<!-- START MAIN CONTENT ------------------------------------------------------>
  
	
	

	
				<div class="content">

      <!-- End App Manager Top Module -->
		<?php include('parts/app-manager-top-module.php'); ?>
	  <!--  End App Manager Top Module -->   

<div class="block_gr vertsortable">

<div class="gadget jsi_gv">

        <div class="gadget_border">
        
          <h3>Auto Credit Application<span>Complete This Credit Application Completely.</span></h3>
          
          <div class="gadget_content">
          
      <form action="<?php echo $editFormAction; ?>" name="form_one_creditapp" method="POST" id="form_one_creditapp">          
       <table width="100%">
        <tr>
         <td align="right">
          
          

  <table>
      <tr valign="baseline">
      <td align="right">Security Key:</td>
      <td><strong><?php echo $tkey; ?></strong>
        <input name="applicant_app_token" type="hidden" id="applicant_app_token" value="<?php echo $tkey; ?>">
        <input name="credit_app_source" type="hidden" id="credit_app_source" value="Sales Portal Id: <?php echo $sid; ?>">
        <input name="credit_app_type" type="hidden" id="credit_app_type" value="3">
        <input name="applicant_did" type="hidden" id="applicant_did" value="<?php echo $row_userSets['main_dealerid']; ?>">
        <input name="applicant_sid" type="hidden" id="applicant_sid" value="<?php echo $sid; ?>"></td>
    </tr>
      <tr valign="baseline">
        <td align="right">Individual Or Joint:</td>
        <td><table width="200">
          <tr>
            <td><label>
              <input name="joint_or_invidividual" type="radio" id="joint_or_invidividual_0" value="0" checked>
              Individual</label></td>
            <td><label>
              <input type="radio" name="joint_or_invidividual" value="1" id="joint_or_invidividual_1">
              Joint</label></td>
          </tr>
        </table></td>
      </tr>
              <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Primary Personal Info</strong></td>
      </tr>

      <tr valign="baseline">
      <td align="right">Title:</td>
      <td><select name="applicant_titlename" id="applicant_titlename">
        <option>Select One</option>
        <option>Mr.</option>
        <option value="Mrs.">Mrs.</option>
        <option value="Miss.">Miss.</option>
        <option value="Ms.">Ms.</option>
        <option value="Dr.">Dr.</option>
      </select></td>
    </tr>
    <tr>
          <td align="right">Last</td>
          <td><input type="text" name="applicant_lname" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">First</td>
          <td><input type="text" name="applicant_fname" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Mi:</td>
          <td><input type="text" name="applicant_mname" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">DOB(MM/DD/YYYY):</td>
          <td><input type="text" name="applicant_dob" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">SSN:</td>
          <td><input type="text" name="applicant_ssn" value="" size="20" /></td>
        </tr>
        <tr>
          <td align="right">Driver License#:</td>
          <td><input type="text" name="applicant_driver_licenses_number" id="applicant_driver_licenses_number"></td>
        </tr>
        <tr>
          <td align="right">License State:</td>
          <td><input type="text" name="applicant_driver_state_issued" id="applicant_driver_state_issued"></td>
        </tr>
        <tr>
          <td align="right">Home Ph. #:</td>
          <td><input type="text" name="applicant_main_phone" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Cellular Ph.#</td>
          <td><input type="text" name="applicant_cell_phone" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Preferred E-Mail:</td>
          <td><input type="text" name="applicant_email_address" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Address:</td>
          <td><input type="text" name="applicant_present_address1" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Address2:</td>
          <td><input type="text" name="applicant_present_address2" id="applicant_present_address2"></td>
        </tr>
        <tr>
          <td align="right">City/State:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><input type="text" name="applicant_present_addr_city" value="" size="16" /></td>
              <td><select name="applicant_present_addr_state" id="applicant_present_addr_state">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_name']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="right">County:</td>
          <td><input type="text" name="applicant_present_addr_county" id="applicant_present_addr_county"></td>
        </tr>
        <tr>
          <td align="right">Zip:</td>
          <td><input type="text" name="applicant_present_addr_zip" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Time At Address:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="applicant_addr_years" id="applicant_addr_years">
                <option value="">Select Yrs</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="applicant_addr_months" id="applicant_addr_months">
                <option value="">Select Mos</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td align="right">Prev. Address:</td>
          <td><input type="text" name="applicant_previous1_addr1" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Prev. Address2:</td>
          <td><input type="text" name="applicant_previous1_addr2" id="applicant_previous1_addr2"></td>
        </tr>
        <tr>
          <td align="right">Prev. Zip:</td>
          <td><input type="text" name="applicant_previous1_addr_zip" value="" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Prev. City/State:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><input type="text" name="applicant_previous1_addr_city" value="" size="16" />
                </td>
              <td><select name="applicant_previous1_addr_state" id="applicant_previous1_addr_state">
                  <option value="">Select State</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_states['state_name']?>"><?php echo $row_states['state_abrv']?></option>
                  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="right">Prev. Time at Address:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="applicant_previous1_live_years" id="applicant_previous1_live_years">
                <option value="">Select Yrs</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="applicant_previous1_live_months">
                <option value="">Select Mos</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Landlord/Mortgage Co.:</td>
          <td><input name="applicant_addr_landlord_mortg" type="text" id="applicant_addr_landlord_mortg" value="" size="32" /></td>
        </tr>

        <tr valign="baseline">
          <td align="right">Residence Type:</td>
          <td><select name="applicant_buy_own_rent_other">
            <option value="Owns Home Outright">Owns Home Outright</option>
            <option value="Buying Home">Buying Home</option>
            <option value="Renting/Leasing">Renting/Leasing</option>
            <option value="Living w/ Relatives">Living w/ Relatives</option>
            <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
            <option value="Unknown">Unknown</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Rent/Mortgage:</td>
          <td><input name="applicant_house_payment" type="text" id="applicant_house_payment" value="" size="10" /> 
            :Payment</td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Current Job Info</strong></td>
      </tr>

        <tr valign="baseline">
          <td align="right">Employment Type:</td>
          <td><select name="applicant_employment_type">
            <option value="Auto Worker">Auto Worker</option>
            <option value="Clerical">Clerical</option>
            <option value="Craftsman">Craftsman</option>
            <option value="Executive/Managerial">Executive/Managerial</option>
            <option value="Farmer">Farmer</option>
            <option value="Fisherman">Fisherman</option>
            <option value="Government">Government</option>
            <option value="Homemaker">Homemaker</option>
            <option value="Other">Other</option>
            <option value="Professional">Professional</option>
            <option value="Sales/Advertising">Sales/Advertising</option>
            <option value="Semi-Skilled Labor">Semi-Skilled Labor</option>
            <option value="Skilled Labor">Skilled Labor</option>
            &nbsp;</select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Work Status:</td>
          <td><select name="applicant_employment_status" id="applicant_employment_status">
            <option>Select One</option>
            <option value="Active Military">Active Military</option>
            <option value="Contract">Contract</option>
            <option value="Full Time">Full Time</option>
            <option value="Not Applicable">Not Applicable</option>
            <option value="Part Time">Part Time</option>
            <option value="Retired">Retired</option>
            <option value="Seasonal">Seasonal</option>
            <option value="Self Employed">Self Employed</option>
            <option value="Temporary">Temporary</option>
            &nbsp;</select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employment Title:</td>
          <td><input type="text" name="applicant_employer1_position" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employer Name:</td>
          <td><input type="text" name="applicant_employer1_name" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employer Ph. #:</td>
          <td><input type="text" name="applicant_employer1_phone" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Time at Job/Time Retired:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="applicant_employer1_work_years">
                <option value="">Select Yrs</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="applicant_employer1_work_months">
                <option value="">Select Mos</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Gross Income:</td>
          <td><input name="applicant_employer1_salary_bringhome" type="text" id="applicant_employer1_salary_bringhome" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Income Interval:</td>
          <td><select name="applicant_employer1_payday_freq" id="applicant_employer1_payday_freq">
            <option value="">Select One</option>
            <?php
do {  
?>
            <option value="<?php echo $row_income_intervals['income_interval_name']?>"><?php echo $row_income_intervals['income_interval_name']?></option>
            <?php
} while ($row_income_intervals = mysqli_fetch_assoc($income_intervals));
  $rows = mysqli_num_rows($income_intervals);
  if($rows > 0) {
      mysqli_data_seek($income_intervals, 0);
	  $row_income_intervals = mysqli_fetch_assoc($income_intervals);
  }
?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Other Income Source:</td>
          <td><input name="applicant_other_income_source" type="text" id="applicant_other_income_source" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Other Income Amount:</td>
          <td><input name="applicant_other_income_amount" type="text" id="applicant_other_income_amount" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Other Income Interval:</td>
          <td><select name="applicant_other_income_when_rcvd" id="applicant_other_income_when_rcvd">
            <option value="">Select One</option>
            <?php
do {  
?>
            <option value="<?php echo $row_income_intervals['income_interval_name']?>"><?php echo $row_income_intervals['income_interval_name']?></option>
            <?php
} while ($row_income_intervals = mysqli_fetch_assoc($income_intervals));
  $rows = mysqli_num_rows($income_intervals);
  if($rows > 0) {
      mysqli_data_seek($income_intervals, 0);
	  $row_income_intervals = mysqli_fetch_assoc($income_intervals);
  }
?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
                <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Previous Job Info</strong></td>
      </tr>

        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Previous Employer:</td>
          <td><input name="applicant_employer2_name" type="text" id="applicant_employer2_name" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Prev. Employer Address:</td>
          <td><input name="applicant_employer2_addr" type="text" id="applicant_employer2_addr" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Prev. Employer Address2:</td>
          <td><input name="applicant_employer2_addr2" type="text" id="applicant_employer2_addr2" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Prev. Employer Zip:</td>
          <td><input name="applicant_employer2_zip" type="text" id="applicant_employer2_zip" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employer City/State:</td>
          <td><input name="applicant_employer2_city" type="text" id="applicant_employer2_city" value="" size="16" /> 
            
              <select name="applicant_employer2_state" id="applicant_employer2_state">
                <option value="">Select One</option>
                <?php
do {  
?>
                <option value="<?php echo $row_states['state_id']?>"><?php echo $row_states['state_name']?></option>
                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
            </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Previous Job Title:</td>
          <td><input name="applicant_employer2_position" type="text" id="applicant_employer2_position" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Previous Employer Ph. #:</td>
          <td><input name="applicant_employer2_phone" type="text" id="applicant_employer2_phone" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Time at Prev. Job:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="applicant_employer2_work_years">
                <option value="">Select One</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="applicant_employer2_work_months">
                <option value="">Select One</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Vehicle  Sale Info</strong></td>
      </tr>

        <tr valign="baseline">
          <td align="right">Select Asset Type:</td>
          <td><select name="applilcant_v_asset_type" id="applilcant_v_asset_type">
            <option value="Auto">Auto</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Intended Use</td>
          <td><select name="applilcant_v_intendeduse" id="applilcant_v_intendeduse">
            <option>Select One</option>
            <option value="Personal">Personal</option>
            <option value="Business">Business</option>
            <option value="Agricultural">Agricultural</option>
            <option value="Hazardous">Hazardous</option>
            <option value="Local">Local</option>
            <option value="Interstate">Interstate</option>
            <option value="Intermediate">Intermediate</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">New/Used:</td>
          <td><select name="applilcant_v_neworused" id="applilcant_v_neworused">
            <option>Select One</option>
            <option value="New">New</option>
            <option value="Used">Used</option>
            <option value="Used Certified">Used Certified</option>
            <option value="Auction">Auction</option>
            <option value="Demo">Demo</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Stock Number:</td>
          <td><input name="applilcant_v_stockno" type="text" id="applilcant_v_stockno" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Vin:</td>
          <td><input type="text" name="applilcant_v_vin" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Year:</td>
          <td><select name="applilcant_v_year" id="applilcant_v_year">
            <option value="">Select One</option>
            <?php
do {  
?>
            <option value="<?php echo $row_car_years['car_year']?>"><?php echo $row_car_years['car_year']?></option>
            <?php
} while ($row_car_years = mysqli_fetch_assoc($car_years));
  $rows = mysqli_num_rows($car_years);
  if($rows > 0) {
      mysqli_data_seek($car_years, 0);
	  $row_car_years = mysqli_fetch_assoc($car_years);
  }
?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Make:</td>
          <td><select name="applilcant_v_make" id="applilcant_v_make">
            <option value="">Select One</option>
            <?php
do {  
?>
            <option value="<?php echo $row_makes['car_make']?>"><?php echo $row_makes['car_make']?></option>
            <?php
} while ($row_makes = mysqli_fetch_assoc($makes));
  $rows = mysqli_num_rows($makes);
  if($rows > 0) {
      mysqli_data_seek($makes, 0);
	  $row_makes = mysqli_fetch_assoc($makes);
  }
?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Model:</td>
          <td><input type="text" name="applilcant_v_model" id="applilcant_v_model"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Trim/Style:</td>
          <td><input type="text" name="applilcant_v_style" id="applilcant_v_style"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Inception Miles:</td>
          <td><input type="text" name="applilcant_v_inception_miles" id="applilcant_v_inception_miles"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Trade Vehicle  Info</strong></td>
      </tr>

        <tr valign="baseline">
          <td align="right">Trade Year:</td>
          <td><select name="applilcant_v_trade_year" id="applilcant_v_trade_year">
            <option value="">Select One</option>
            <?php
do {  
?>
            <option value="<?php echo $row_car_years['car_year']?>"><?php echo $row_car_years['car_year']?></option>
            <?php
} while ($row_car_years = mysqli_fetch_assoc($car_years));
  $rows = mysqli_num_rows($car_years);
  if($rows > 0) {
      mysqli_data_seek($car_years, 0);
	  $row_car_years = mysqli_fetch_assoc($car_years);
  }
?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Trade Make:</td>
          <td><select name="applilcant_v_trade_make" id="applilcant_v_trade_make">
            <option value="">Select One</option>
            <?php
do {  
?>
            <option value="<?php echo $row_makes['car_make']?>"><?php echo $row_makes['car_make']?></option>
            <?php
} while ($row_makes = mysqli_fetch_assoc($makes));
  $rows = mysqli_num_rows($makes);
  if($rows > 0) {
      mysqli_data_seek($makes, 0);
	  $row_makes = mysqli_fetch_assoc($makes);
  }
?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Trade Model:</td>
          <td><input type="text" name="applilcant_v_trade_model" id="applilcant_v_trade_model"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Trade Vin:</td>
          <td><input name="applilcant_v_trade_vin" type="text" id="applilcant_v_trade_vin" maxlength="17"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Lien Holder Name:</td>
          <td><input type="text" name="applilcant_v_trade_lien_holder_name" id="applilcant_v_trade_lien_holder_name"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr valign="baseline">
      <td align="right"></td>
      <td></td>
    </tr>
    
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td></td>
        </tr>
        <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Contract Info</strong></td>
      </tr>
    <tr valign="baseline">
      <td align="right">Cash Price:</td>
      <td><input type="text" name="applilcant_v_cashprice" id="applilcant_v_cashprice"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Taxes:</td>
      <td><input type="text" name="applilcant_v_taxes" id="applilcant_v_taxes"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Doc Fees:</td>
      <td><input type="text" name="applilcant_v_doc_fees" id="applilcant_v_doc_fees"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Title/Lic/Reg/Other Fees:</td>
      <td><input type="text" name="title_lic_reg_other_fees" id="title_lic_reg_other_fees"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Cash Down:</td>
      <td><input type="text" name="applilcant_v_cash_down" id="applilcant_v_cash_down"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rebate:</td>
      <td><input type="text" name="applilcant_v_rebate" id="applilcant_v_rebate"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Trade Allowance:</td>
      <td><input type="text" name="applilcant_v_trade_allowance" id="applilcant_v_trade_allowance"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Trade Owed:</td>
      <td><input type="text" name="applilcant_v_trade_owed" id="applilcant_v_trade_owed"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Gap:</td>
      <td><input type="text" name="applilcant_v_gap" id="applilcant_v_gap"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Service Contract:</td>
      <td><input type="text" name="applilcant_v_srvc_contract" id="applilcant_v_srvc_contract"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Credit Life:</td>
      <td><input type="text" name="applilcant_v_credit_life" id="applilcant_v_credit_life"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Disability:</td>
      <td><input type="text" name="applilcant_v_disability" id="applilcant_v_disability"></td>
    </tr>

<script type="text/javascript">
function hideshow(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
</script>

    <tr valign="baseline">
      <td align="right">Financed Amount:</td>
      <td bgcolor="#999999"><input type="text" name="applilcant_v_financed_amount" id="applilcant_v_financed_amount"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Term:</td>
      <td bgcolor="#999999"><input type="text" name="applilcant_v_term_months" id="applilcant_v_term_months"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Cust. Rate:</td>
      <td bgcolor="#999999"><input type="text" name="applilcant_v_cust_rate" id="applilcant_v_cust_rate">
        (xx.xx)</td>
    </tr>
    <tr valign="baseline">
      <td align="right">Total Mos. Pymt. (Est):</td>
      <td bgcolor="#00FF00"><input name="applilcant_v_total_monthpmts_est" type="text" id="applilcant_v_total_monthpmts_est" maxlength="5" readonly="readonly">
        <input type=button onClick='showpay()'
value=Calculate>|<input type=reset
value=Reset></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Wholesale/Invoice:</td>
      <td><input type="text" name="applilcant_v_wholesale_invoice" id="applilcant_v_wholesale_invoice"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">MSRP:</td>
      <td><input type="text" name="applilcant_v_msrp" id="applilcant_v_msrp"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td></td>
    </tr>
            <tr valign="baseline">
          <td align="right">Credit Bureau:</td>
          <td><select name="applilcant_v_creditbureau_preferred" id="applilcant_v_creditbureau_preferred">
            <option>Select One</option>
            <option value="Equfax">Equifax</option>
            <option value="Transunion">Transuion</option>
            <option value="Experian">Experian</option>
          </select></td>
        </tr>

    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td align="right"><!--Send App to:--></td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td align="right" colspan="2">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td align="right"><input type="reset" name="Reset" id="button" value="Reset">
        </td>
      <td> <input type="submit" name="submit2" id="submit2" value="Submit">
         | <a href="app_manager.php">Cancel</a></td>
    </tr>
  </table>

            
            
            <p><a href="#">Learn more &raquo;</a></p>





        </td>
              <td valign="top">
    
              <?php 
			  	// Tutorial on http://www.javascriptkit.com/javatutors/dom3.shtml  
			  	// <div id="adiv" style="font:24px bold; display: none">   <<<Display to none or block for easy viewing
			  ?>

           		<!--a href="javascript:hideshow(document.getElementById('myinfo'))">Add Co-Applicant >>Show/Hide</a -->
<br />


					

<div id="myinfo" style="display: none">  

                    <br /><br />

<table bgcolor="#CCCCCC">
                   
                            <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong>Co-Applicant Info</strong></td>
      </tr>

                    <tr valign="baseline">
      <td align="right">Title:</td>
      <td><select name="co_applicant_titlename" id="co_applicant_titlename">
        <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Select One</option>
        <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
        <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_creditapp_id_did['co_applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
        <option value="Miss." <?php if (!(strcmp("Miss.", $row_creditapp_id_did['co_applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
        <option value="Ms." <?php if (!(strcmp("Ms.", $row_creditapp_id_did['co_applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Ms.</option>
        <option value="Dr." <?php if (!(strcmp("Dr.", $row_creditapp_id_did['co_applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
      </select></td>
    </tr>
    <tr>
          <td align="right">Last:</td>
          <td><input type="text" name="co_applicant_lname" value="<?php echo $row_creditapp_id_did['co_applicant_lname']; ?>" size="32" /></td>
    </tr>
        <tr>
          <td align="right">First:</td>
          <td><input type="text" name="co_applicant_fname" value="<?php echo $row_creditapp_id_did['co_applicant_fname']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Mi:</td>
          <td><input type="text" name="co_applicant_mname" value="<?php echo $row_creditapp_id_did['co_applicant_mname']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">DOB(MM/DD/YYYY):</td>
          <td><input type="text" name="co_applicant_dob" value="<?php echo $row_creditapp_id_did['co_applicant_dob']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">SSN:</td>
          <td><input type="text" name="co_applicant_ssn" value="<?php echo $row_creditapp_id_did['co_applicant_ssn']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Driver License#:</td>
          <td><input type="text" name="co_applicant_driver_licenses_no" id="co_applicant_driver_licenses_no"></td>
        </tr>
        <tr>
          <td align="right">License State:</td>
          <td><input type="text" name="co_applicant_driver_licenses_state" id="co_applicant_driver_licenses_state"></td>
        </tr>
        <tr>
          <td align="right">Home Ph. #:</td>
          <td><input name="co_applicant_home_phone" type="text" id="co_applicant_home_phone" value="<?php echo $row_creditapp_id_did['co_applicant_home_phone']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Cellular Ph.#:</td>
          <td><input type="text" name="co_applicant_cell_phone" value="<?php echo $row_creditapp_id_did['co_applicant_cell_phone']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Preferred E-Mail:</td>
          <td><input name="co_applicant_email" type="text" id="co_applicant_email" value="<?php echo $row_creditapp_id_did['co_applicant_email']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Address1:</td>
          <td><input type="text" name="co_applicant_present_addr1" value="<?php echo $row_creditapp_id_did['co_applicant_present_addr1']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Address2:</td>
          <td><input type="text" name="co_applicant_present_addr2" value="<?php echo $row_creditapp_id_did['co_applicant_present_addr2']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">City/State:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><input type="text" name="co_applicant_present_addr_city" value="<?php echo $row_creditapp_id_did['co_applicant_present_addr_city']; ?>" size="16" /></td>
              <td><select name="co_applicant_present_addr_state" id="co_applicant_present_addr_state">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                <?php
do {  
?>
                <option value="<?php echo $row_states['state_name']?>"<?php if (!(strcmp($row_states['state_name'], $row_creditapp_id_did['co_applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="right">County:</td>
          <td><input type="text" name="co_applicant_present_addr_county" id="co_applicant_present_addr_county"></td>
        </tr>
        <tr>
          <td align="right">Zip:</td>
          <td><input type="text" name="co_applicant_present_addr_zip" value="<?php echo $row_creditapp_id_did['co_applicant_present_addr_zip']; ?>" size="32" /></td>
        </tr>

        <tr>
          <td align="right">Time At Address:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="co_applicant_present_addr_live_years" id="co_applicant_present_addr_live_years">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_present_addr_live_years']))) {echo "selected=\"selected\"";} ?>>Select Yrs</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"<?php if (!(strcmp($row_years['year_value'], $row_creditapp_id_did['co_applicant_present_addr_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs:</td>
              <td><select name="co_applicant_present_addr_live_months" id="co_applicant_present_addr_live_months">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_present_addr_live_months']))) {echo "selected=\"selected\"";} ?>>Select Mos</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"<?php if (!(strcmp($row_months['month_value'], $row_creditapp_id_did['co_applicant_present_addr_live_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td align="right">Prev. Address:</td>
          <td><input type="text" name="co_applicant_previous1_addr1" value="<?php echo $row_creditapp_id_did['co_applicant_previous1_addr1']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Prev. Address2</td>
          <td><input name="co_applicant_previous1_addr2" type="text" id="co_applicant_previous1_addr2" value="<?php echo $row_creditapp_id_did['co_applicant_previous1_addr2']; ?>"></td>
        </tr>
        <tr>
          <td align="right">Prev. Zip:</td>
          <td><input type="text" name="co_applicant_previous1_addr_zip" value="<?php echo $row_creditapp_id_did['co_applicant_previous1_addr_zip']; ?>" size="32" /></td>
        </tr>
        <tr>
          <td align="right">Prev. City/State:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><input type="text" name="co_applicant_previous1_addr_city" value="<?php echo $row_creditapp_id_did['co_applicant_previous1_addr_city']; ?>" size="16" />
              </td>
              <td><select name="co_applicant_previous1_addr_state" id="co_applicant_previous1_addr_state">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_previous1_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                <?php
do {  
?>
                <option value="<?php echo $row_states['state_name']?>"<?php if (!(strcmp($row_states['state_name'], $row_creditapp_id_did['co_applicant_previous1_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="right">Prev. Time at Address:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="co_applicant_previous1_live_years" id="co_applicant_previous1_live_years">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>Select Yrs</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"<?php if (!(strcmp($row_years['year_value'], $row_creditapp_id_did['co_applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="co_applicant_previous1_live_months" id="co_applicant_previous1_live_months">
                <option value="" <?php if (!(strcmp("", "co_applicant_previous1_live_months"))) {echo "selected=\"selected\"";} ?>>Select Mos</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"<?php if (!(strcmp($row_months['month_value'], "co_applicant_previous1_live_months"))) {echo "selected=\"selected\"";} ?>><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Landlord/Mortgage Co.:</td>
          <td><input name="co_applicant_addr_landlord_mortg" type="text" id="co_applicant_addr_landlord_mortg" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Residence Type:</td>
          <td><select name="co_applicant_buy_own_rent_other">
            <option value="Owns Home Outright" <?php if (!(strcmp("Owns Home Outright", $row_creditapp_id_did['co_applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Owns Home Outright</option>
            <option value="Buying Home" <?php if (!(strcmp("Buying Home", $row_creditapp_id_did['co_applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Buying Home</option>
            <option value="Renting/Leasing" <?php if (!(strcmp("Renting/Leasing", $row_creditapp_id_did['co_applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Renting/Leasing</option>
            <option value="Living w/ Relatives" <?php if (!(strcmp("Living w/ Relatives", $row_creditapp_id_did['co_applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Living w/ Relatives</option>
            <option value="Owns/Buying Mobile Home" <?php if (!(strcmp("Owns/Buying Mobile Home", $row_creditapp_id_did['co_applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Owns/Buying Mobile Home</option>
            <option value="Unknown" <?php if (!(strcmp("Unknown", $row_creditapp_id_did['co_applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Unknown</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Rent/Mortgage:</td>
          <td><input name="co_applicant_home_pymt" type="text" id="co_applicant_home_pymt" size="10" />  :Pymt.</td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Co-Applicant Current Job Info</strong></td>
      </tr>

        <tr valign="baseline">
          <td align="right">Employment Type:</td>
          <td><select name="co_applicant_employment_type">
            <option value="Auto Worker" <?php if (!(strcmp("Auto Worker", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Auto Worker</option>
            <option value="Clerical" <?php if (!(strcmp("Clerical", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Clerical</option>
            <option value="Craftsman" <?php if (!(strcmp("Craftsman", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Craftsman</option>
            <option value="Executive/Managerial" <?php if (!(strcmp("Executive/Managerial", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Executive/Managerial</option>
            <option value="Farmer" <?php if (!(strcmp("Farmer", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Farmer</option>
            <option value="Fisherman" <?php if (!(strcmp("Fisherman", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Fisherman</option>
            <option value="Government" <?php if (!(strcmp("Government", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Government</option>
<option value="Homemaker" <?php if (!(strcmp("Homemaker", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Homemaker</option>
            <option value="Other" <?php if (!(strcmp("Other", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
            <option value="Professional" <?php if (!(strcmp("Professional", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Professional</option>
            <option value="Sales/Advertising" <?php if (!(strcmp("Sales/Advertising", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Sales/Advertising</option>
            <option value="Semi-Skilled Labor" <?php if (!(strcmp("Semi-Skilled Labor", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Semi-Skilled Labor</option>
            <option value="Skilled Labor" <?php if (!(strcmp("Skilled Labor", $row_creditapp_id_did['co_applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Skilled Labor</option>
            &nbsp;</select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Work Status:</td>
          <td><select name="co_applicant_employment_status" id="co_applicant_employment_status">
            <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Select One</option>
            <option value="Active Military" <?php if (!(strcmp("Active Military", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Active Military</option>
            <option value="Contract" <?php if (!(strcmp("Contract", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Contract</option>
            <option value="Full Time" <?php if (!(strcmp("Full Time", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Full Time</option>
            <option value="Not Applicable" <?php if (!(strcmp("Not Applicable", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Not Applicable</option>
            <option value="Part Time" <?php if (!(strcmp("Part Time", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Part Time</option>
            <option value="Retired" <?php if (!(strcmp("Retired", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Retired</option>
            <option value="Seasonal" <?php if (!(strcmp("Seasonal", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Seasonal</option>
            <option value="Self Employed" <?php if (!(strcmp("Self Employed", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Self Employed</option>
            <option value="Temporary" <?php if (!(strcmp("Temporary", $row_creditapp_id_did['co_applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Temporary</option>
            &nbsp;</select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employment Title:</td>
          <td><input type="text" name="co_applicant_employer_position" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employer Name:</td>
          <td><input name="co_applicant_employer_name" type="text" id="co_applicant_employer_name" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Employer Ph. #:</td>
          <td><input type="text" name="co_applicant_employer_phone" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Time at Job/Time Retired:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="co_applicant_employer_work_years" id="co_applicant_employer_work_years">
                <option value="">Select Yrs</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="co_applicant_employer_work_months" id="co_applicant_employer_work_months">
                <option value="">Select Mos</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mos</td>
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Gross Income:</td>
          <td><input type="text" name="co_applicant_income_bringhome" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Income Interval:</td>
          <td><select name="co_applicant_payday_frequency" id="co_applicant_payday_frequency">
            <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_payday_frequency']))) {echo "selected=\"selected\"";} ?>>Select One</option>
            <option value="Weekly" <?php if (!(strcmp("Weekly", $row_creditapp_id_did['co_applicant_payday_frequency']))) {echo "selected=\"selected\"";} ?>>Weekly</option>
            <option value="Biweekly" <?php if (!(strcmp("Biweekly", $row_creditapp_id_did['co_applicant_payday_frequency']))) {echo "selected=\"selected\"";} ?>>Biweekly</option>
            <option value="Semimonthly" <?php if (!(strcmp("Semimonthly", $row_creditapp_id_did['co_applicant_payday_frequency']))) {echo "selected=\"selected\"";} ?>>Semimonthly</option>
            <option value="Monthly" <?php if (!(strcmp("Monthly", $row_creditapp_id_did['co_applicant_payday_frequency']))) {echo "selected=\"selected\"";} ?>>Monthly</option>
            <option value="Yearly" <?php if (!(strcmp("Yearly", $row_creditapp_id_did['co_applicant_payday_frequency']))) {echo "selected=\"selected\"";} ?>>Yearly</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td align="right">Other Income Source:</td>
          <td><input name="co_applicant_income_source" type="text" id="co_applicant_income_source" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Other Income Amount:</td>
          <td><input type="text" name="co_applicant_other_income_amount" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Other Income Interval:</td>
          <td><select name="co_applicant_other_income_when_rcvd" id="co_applicant_other_income_when_rcvd">
            <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Select One</option>
            <option value="Weekly" <?php if (!(strcmp("Weekly", $row_creditapp_id_did['co_applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Weekly</option>
            <option value="Biweekly" <?php if (!(strcmp("Biweekly", $row_creditapp_id_did['co_applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Biweekly</option>
            <option value="Semimonthly" <?php if (!(strcmp("Semimonthly", $row_creditapp_id_did['co_applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Semimonthly</option>
            <option value="Monthly" <?php if (!(strcmp("Monthly", $row_creditapp_id_did['co_applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Monthly</option>
            <option value="Yearly" <?php if (!(strcmp("Yearly", $row_creditapp_id_did['co_applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Yearly</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr valign="baseline">
      <td class="appsection" colspan="2" align="center">
        <strong> Co-Applicant Previous Job Info</strong></td>
      </tr>

        <tr valign="baseline">
          <td align="right">Previous Employer:</td>
          <td><input type="text" name="co_applicant_employer2_name" size="32" /></td>
        </tr>
        
        <tr valign="baseline">
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr valign="baseline">
          <td align="right">Prev. Employer Address:</td>
          <td><input name="co_applicant_employer2_addr" type="text" id="co_applicant_employer2_addr" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Prev. Employer Address2:</td>
          <td><input name="co_applicant_employer2_addr2" type="text" id="co_applicant_employer2_addr2" size="32" /></td>
        </tr>

        <tr valign="baseline">
          <td align="right">Prev. Employer Zip:</td>
          <td><input name="co_applicant_employer2_zip" type="text" id="co_applicant_employer2_zip" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Prev. Employer City/State:</td>
          <td><input name="co_applicant_employer2_city" type="text" id="co_applicant_employer2_city" size="16" /> 
            
              <select name="co_applicant_employer2_state" id="co_applicant_employer2_state">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_employer2_state']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                <?php
do {  
?>
                <option value="<?php echo $row_states['state_id']?>"<?php if (!(strcmp($row_states['state_id'], $row_creditapp_id_did['co_applicant_employer2_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
            </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Previous Job Title:</td>
          <td><input name="co_applicant_employer2_position" type="text" id="co_applicant_employer2_position" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Previous Employer Ph. #:</td>
          <td><input name="co_applicant_employer2_phone" type="text" id="co_applicant_employer2_phone" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Time at Job:</td>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><select name="co_applicant_employer2_work_years" id="co_applicant_employer2_work_years">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                <?php
do {  
?>
                <option value="<?php echo $row_years['year_value']?>"<?php if (!(strcmp($row_years['year_value'], $row_creditapp_id_did['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_years['year_name']?></option>
                <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
              </select></td>
              <td>Yrs</td>
              <td><select name="co_applicant_employer2_work_months" id="co_applicant_employer2_work_months">
                <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['co_applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                <?php
do {  
?>
                <option value="<?php echo $row_months['month_value']?>"<?php if (!(strcmp($row_months['month_value'], $row_creditapp_id_did['co_applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_months['month_name']?></option>
                <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
              </select></td>
              <td>Mon</td>
            </tr>
          </table></td>
        </tr>
                    
                </table>
</div>    
              
              </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
        </tr>
      </table>
          
    
          </div>
        </div>
      </div>

<!-- End Customer Assigned Leads -->
<input type="hidden" name="MM_insert" value="form_one_creditapp">
      </form>

 </div>
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
        <?php include('parts/left-tower.php') ?>
    
    <!-- END LEFT TOWER BLOCK -->
    
    
    <div class="clr"></div>
  </div>
















	<?php //include('custom_pages/dashboard_page.php'); ?>
<!-- END MAIN CONTENT -->













<!-- FOOTER -->
  
	
	
	<?php include('parts/sales_footer.php'); ?>
    
<!-- END FOOTER -->    
    
    
    


























<!-- DIALOGS -->
  
  	<?php //include('dialogs/crm-power.php'); ?>
  

  
  
  
<!-- START Include Brought Out And Pasted For Spry -->


				
                
                
                
                
                
                
                
                
                
                
                
<div id="dialogboxes">
    
    
    <!-- Dialog Box Form  -->

  

    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
         <div id="closewindow"><a href="dashboard.php" target="_parent">Close</a></div><!-- End Close window --> 
          <h3>Over The Phone Prompt<span>Belows Is Your - Script</span></h3>
          <div class="gadget_content">

            <p>
            	<strong>
                Note: Remember The longer you have the customer on the phone the better your chances are in converting them.
                </strong> 
                <br /><br />
                Collect Customers Name, Phone Number, and Email Address.  Offer to send them something.
                <br /><br />
                
            </p>
            
            
            <div class="cust-input">

              
              <form method="POST" name="ovrphngoal" id="ovrphngoal">
              
              <table cellpadding="5" cellspacing="5">
              	<tr>
                  <td>
                <strong>Cust. Name:</strong></td>
                   
                   <td>
                	<p><span id="sprytextfield1">
                	  <input type="text" name="cust_nickname" id="cust_nickname" /><br />
               	     <span class="textfieldRequiredMsg">Customers Name Missing.</span>
                     </span>
                    </p>
                </td></tr>
                <tr>
                <td><strong>Phone No:</strong></td>
                  <td>
                    <p>
            <span id="sprytextfield2">
                    	<input type="text" name="cust_phoneno" id="cust_phoneno" /> 
                    	                    	<br />
                    	 <span class="textfieldRequiredMsg">Phone Number Missing</span>
                    	 <span class="textfieldInvalidFormatMsg">Example (404) 555-1234.</span>
            </span>
            
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><strong>Phone Type:</strong></td>
                  <td>
                      <label>
                      <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
               	        </select>
                  	  </label>
                  </td>
                </tr>
                <tr>
                  <td><strong>Email: </strong></td>
                  <td>
                    <p>
                    <span id="sprytextfield3">
                    <input type="text" name="cust_email" id="cust_email"><br />
                    <span class="textfieldRequiredMsg">A valid email address is required.</span>
                    <span class="textfieldInvalidFormatMsg">Keep Typing...</span></span>
                    </p>
                  </td>
               </tr>
               
               <tr>
                  <td valign="top">
                  	<strong>Your Comments:</strong>
                  </td>
               
                  <td>
                  <p>
                  	<textarea name="cust_lead_sp_comment" cols="25" rows="1"></textarea>
                  </p>
                  </td>
               </tr>
               
               <tr>
                  <td>
                    <label for="cust_lead_temperature">Customer Status:</label>
                   </td>
                   <td>
		            	<select name="cust_lead_temperature" id="cust_lead_temperature">
        		    		<option value="Hot">Hot</option>
              				<option value="Warm">Warm</option>
              				<option value="Cold">Cold</option>
            			</select>

                  </td>
               
                  <td>
                  <input name="cust_lead_token" type="hidden" value="<?php echo $tkey; ?>">
                  </td>
                </tr>
                <tr>
                  <td><strong>&nbsp;</strong></td>
                  <td>
                  <p>
                  
					                
                    

                    
                                      
                  </p>
                  </td>
                </tr>
                <tr>
                <td colspan="2" align="center">
                
                	<input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $row_userSets['salesperson_id']; ?>" />
                  	<input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $row_userSets['main_dealerid']; ?>" />
                  
                   <p><br />
                   <input class="bg_grey" type="submit" name="submit" id="submit" value="Start The CRM Power Process Now">
                   <!-- <a href="#" class="bg_grey" type="submit" name="submit">Start The Process Now - CRM Power</a> -->
                </p>
                </td></tr></table>
              <input type="hidden" name="MM_insert" value="ovrphngoal">
              </form>
              
              
            </div>
            
            
          <p>
            	 
                <br />
            </p>
          
          </div><!-- End gadget_content -->
         
        </div>
      </div>
  </div>


    <!-- Empty -->
    
    		
    
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>

<!-- END Include Brought Out And Pasted For Spry -->  
  
  

  
	
  
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "phone_number", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
//-->
</script>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($months);
mysqli_free_result($states);
mysqli_free_result($years);


mysqli_free_result($didleads_notassigned);

mysqli_free_result($makes);

mysqli_free_result($creditapp_id_did);

mysqli_free_result($car_years);

mysqli_free_result($income_intervals);
?>
