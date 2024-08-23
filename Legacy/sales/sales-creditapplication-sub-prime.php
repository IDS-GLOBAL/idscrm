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
$query_creditapp_id_did =  sprintf("SELECT * FROM credit_app_fullblown WHERE credit_app_fullblown.credit_app_fullblown_id = %s AND credit_app_fullblown.applicant_did = $sidmainid", GetSQLValueString($colname_creditapp_id_did, "int"));
$creditapp_id_did = mysqli_query($idsconnection_mysqli, $query_creditapp_id_did);
$row_creditapp_id_did = mysqli_fetch_assoc($creditapp_id_did);
$totalRows_creditapp_id_did = mysqli_num_rows($creditapp_id_did);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_car_years = "SELECT * FROM car_years ORDER BY car_year DESC";
$car_years = mysqli_query($idsconnection_mysqli, $query_car_years);
$row_car_years = mysqli_fetch_assoc($car_years);
$totalRows_car_years = mysqli_num_rows($car_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_income_intervals = "SELECT * FROM credit_app_income_intervals";
$income_intervals = mysqli_query($idsconnection_mysqli, $query_income_intervals);
$row_income_intervals = mysqli_fetch_assoc($income_intervals);
$totalRows_income_intervals = mysqli_num_rows($income_intervals);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ovrphngoal")) {
  $insertSQL =  sprintf("INSERT INTO cust_leads (cust_nickname, cust_email, cust_lead_temperature, cust_phoneno, cust_phonetype, cust_lead_sp_comment, cust_dealer_id, cust_salesperson_id, cust_lead_token) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_lead_temperature'], "text"),
                       GetSQLValueString($_POST['cust_phoneno'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_lead_sp_comment'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_salesperson_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-salesp-lead-process.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $insertGoTo));
}

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
<script language="JavaScript">

	var cal = new CalendarPopup();

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
          <h3>SubPrime Credit Application <span>Complete This Credit Application Completely.</span></h3>
          <div class="gadget_content">
          
       <table width="100%">
        <tr>
         <td>
          
            <form method="post" id="subprime_creditapp">
  
  <table>
    <tr valign="baseline">
      <td align="right">Applicant Security Key:</td>
      <td><strong><?php echo $tkey; ?></strong></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Driver Licenses Number:</td>
      <td><input type="text" name="applicant_driver_licenses_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Driver Licenses Status:</td>
      <td><input type="text" name="applicant_driver_licenses_status" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Driver State Issued:</td>
      <td><select name="applicant_driver_state_issued" id="applicant_driver_state_issued">
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
    <tr valign="baseline">
      <td align="right">Applicant Socialsn:</td>
      <td><input type="text" name="applicant_ssn" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Ssn4:</td>
      <td><input type="text" name="applicant_ssn4" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Dob:</td>
      <td><input type="text" name="applicant_dob" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Age:</td>
      <td><input type="text" name="applicant_age" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Sales Souce Lot:</td>
      <td><input type="text" name="applicant_sales_souce_lot" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant_name:</td>
      <td><input type="text" name="applicant_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Other Name:</td>
      <td><input type="text" name="applicant_other_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Maiden Name:</td>
      <td><input type="text" name="applicant_maiden_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Main Phone:</td>
      <td><input type="text" name="applicant_main_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Cell Phone:</td>
      <td><input type="text" name="applicant_cell_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Present Address1:</td>
      <td><input type="text" name="applicant_present_address1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Present Address2:</td>
      <td><input type="text" name="applicant_present_address2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Present Addr City:</td>
      <td><input type="text" name="applicant_present_addr_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Present Addr State:</td>
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
    <tr valign="baseline">
      <td align="right">Applicant Present Addr Zip:</td>
      <td><input type="text" name="applicant_present_addr_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Present Addr County:</td>
      <td><input type="text" name="applicant_present_addr_county" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Addr Years:</td>
      <td><select name="applicant_addr_years">
        <option value="" >Select Year(s)</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top">Applicant Addr Months:</td>
      <td><textarea name="applicant_addr_months" cols="50" rows="2"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Addr Landlord Mortg:</td>
      <td><input type="text" name="applicant_addr_landlord_mortg" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Addr Landlord Address:</td>
      <td><input type="text" name="applicant_addr_landlord_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Addr Landlord City:</td>
      <td><input type="text" name="applicant_addr_landlord_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Addr Landlord State:</td>
      <td><select name="applicant_addr_landlord_state" id="applicant_addr_landlord_state">
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
    <tr valign="baseline">
      <td align="right">Applicant Addr Landlord Zip:</td>
      <td><input type="text" name="applicant_addr_landlord_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Addr Landlord Phone:</td>
      <td><input type="text" name="applicant_addr_landlord_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant Name Oncurrent Lease:</td>
      <td><input type="text" name="applicant_name_oncurrent_lease" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant apart or house:</td>
      <td><input type="text" name="applicant_apart_or_house" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant buyown rent other:</td>
      <td><select name="applicant_buy_own_rent_other" id="applicant_buy_own_rent_other">
        <option>Select Home Status</option>
        <option value="Buy">Buy</option>
        <option value="Own">Own</option>
        <option value="Rent">Rent</option>
        <option value="Other">Other</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant house payment:</td>
      <td><input type="text" name="applicant_house_payment" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top">User comments app notes:</td>
      <td><textarea name="user_comments_app_notes" cols="50" rows="2"></textarea></td>
    </tr>

    <tr valign="baseline">
      <td align="right">Applicant previous1 addr1:</td>
      <td><input type="text" name="applicant_previous1_addr1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 addr2:</td>
      <td><input type="text" name="applicant_previous1_addr2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 addr city:</td>
      <td><input type="text" name="applicant_previous1_addr_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 addr state:</td>
      <td><select name="applicant_previous1_addr_state" id="applicant_previous1_addr_state">
        <option value=" ">Select State</option>
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
    <tr valign="baseline">
      <td align="right">Applicant previous1 addr zip:</td>
      <td><input type="text" name="applicant_previous1_addr_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 live years:</td>
      <td><select name="applicant_previous1_live_years" id="applicant_previous1_live_years">
        <option value="">Select Year(s)</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 live months:</td>
      <td><input type="text" name="applicant_previous1_live_months" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 landlord name:</td>
      <td><input type="text" name="applicant_previous1_landlord_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous1 landlord phone:</td>
      <td><input type="text" name="applicant_previous1_landlord_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 addr1:</td>
      <td><input type="text" name="applicant_previous2_addr1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 addr2:</td>
      <td><input type="text" name="applicant_previous2_addr2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 addr city:</td>
      <td><input type="text" name="applicant_previous2_addr_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 addr state:</td>
      <td><select name="applicant_previous2_addr_state">
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
    <tr valign="baseline">
      <td align="right">Applicant previous2 addr zip:</td>
      <td><input type="text" name="applicant_previous2_addr_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 live years:</td>
      <td><select name="applicant_previous2_live_years">
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
    <tr valign="baseline">
      <td align="right">Applicant previous2 live months:</td>
      <td><select name="applicant_previous2_live_months">
        <option value="" >Select Months</option>
        <option value="" ></option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_id']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 landlord name:</td>
      <td><input type="text" name="applicant_previous2_landlord_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous2 landlord phone:</td>
      <td><input type="text" name="applicant_previous2_landlord_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 addr1:</td>
      <td><input type="text" name="applicant_previous3_addr1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 addr2:</td>
      <td><input type="text" name="applicant_previous3_addr2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 addr city:</td>
      <td><input type="text" name="applicant_previous3_addr_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 addr state:</td>
      <td><select name="applicant_previous3_addr_state">
        <option value="">Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_name']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 addr zip:</td>
      <td><input type="text" name="applicant_previous3_addr_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 live years:</td>
      <td><select name="applicant_previous3_live_years">
        <option value="">Select Years</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 live months:</td>
      <td><select name="applicant_previous3_live_months">
        <option value="" >Select Month</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_name']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 landlord name:</td>
      <td><input type="text" name="applicant_previous3_landlord_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant previous3 landlord phone:</td>
      <td><input type="text" name="applicant_previous3_landlord_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top">User comments previousaddr notes:</td>
      <td><textarea name="user_comments_previousaddr_notes" cols="50" rows="2"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 name:</td>
      <td><input type="text" name="applicant_employer1_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 addr:</td>
      <td><input type="text" name="applicant_employer1_addr" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 city:</td>
      <td><input type="text" name="applicant_employer1_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 state:</td>
      <td><select name="applicant_employer1_state">
        <option value="">Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_name']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 zip:</td>
      <td><input type="text" name="applicant_employer1_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 phone:</td>
      <td><input type="text" name="applicant_employer1_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 phone ext:</td>
      <td><input type="text" name="applicant_employer1_phone_ext" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 work years:</td>
      <td><select name="applicant_employer1_work_years">
        <option value="">Select Years</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 work months:</td>
      <td><select name="applicant_employer1_work_months">
        <option value="" >Select Month</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_abrv']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 position:</td>
      <td><input type="text" name="applicant_employer1_position" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 department:</td>
      <td><input type="text" name="applicant_employer1_department" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 supervisors name:</td>
      <td><input type="text" name="applicant_employer1_supervisors_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 supervisors phone:</td>
      <td><input type="text" name="applicant_employer1_supervisors_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 hours shift:</td>
      <td><input type="text" name="applicant_employer1_hours_shift" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer1 salary bringhome:</td>
      <td><input type="text" name="applicant_employer1_salary_bringhome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer payday freq:</td>
      <td><select name="applicant_employer_payday_freq">
	<option>Select Pay Day</option>
        <option value="Monthly">Monthly</option>
        <option value="Bi-Weekly">Bi-Weekly</option>
        <option value="Weekly">Weekly</option>
        <option value="Daily">Daily</option>
      </select>
    </td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer form of pymt:</td>
      <td><input type="text" name="applicant_employer_form_of_pymt" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant other income amount:</td>
      <td><input type="text" name="applicant_other_income_amount" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant other income source:</td>
      <td><input type="text" name="applicant_other_income_source" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant other income when rcvd:</td>
      <td><input type="text" name="applicant_other_income_when_rcvd" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant if education school sys:</td>
      <td><input type="text" name="applicant_if_education_school_sys" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top">User applicant employer notes:</td>
      <td><textarea name="user_applicant_employer_notes" cols="50" rows="2"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 name:</td>
      <td><input type="text" name="applicant_employer2_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 addr:</td>
      <td><input type="text" name="applicant_employer2_addr" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 city:</td>
      <td><input type="text" name="applicant_employer2_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 state:</td>
      <td><select name="applicant_employer2_state">
        <option value=" " >Select State</option>
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
    <tr valign="baseline">
      <td align="right">Applicant employer2 zip:</td>
      <td><input type="text" name="applicant_employer2_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 phone:</td>
      <td><input type="text" name="applicant_employer2_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 phone ext:</td>
      <td><input type="text" name="applicant_employer2_phone_ext" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 work years:</td>
      <td><select name="applicant_employer2_work_years">
        <option value="">Select Year</option>
        <?php
do {  
?>
        <option value="<?php echo $row_years['year_name']?>"><?php echo $row_years['year_name']?></option>
        <?php
} while ($row_years = mysqli_fetch_assoc($years));
  $rows = mysqli_num_rows($years);
  if($rows > 0) {
      mysqli_data_seek($years, 0);
	  $row_years = mysqli_fetch_assoc($years);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer2 work months:</td>
      <td><select name="applicant_employer2_work_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_abrv']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 name:</td>
      <td><input type="text" name="applicant_employer3_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 addr:</td>
      <td><input type="text" name="applicant_employer3_addr" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 city:</td>
      <td><input type="text" name="applicant_employer3_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 state:</td>
      <td><select name="applicant_employer3_state">
        <option value="" >Select State</option>
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
    <tr valign="baseline">
      <td align="right">Applicant employer3 zip:</td>
      <td><input type="text" name="applicant_employer3_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 phone:</td>
      <td><input type="text" name="applicant_employer3_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 years:</td>
      <td><select name="applicant_employer3_years">
        <option value="" >Select Year</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant employer3 months:</td>
      <td><select name="applicant_employer3_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_name']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top">User comments employer notes:</td>
      <td><textarea name="user_comments_employer_notes" cols="50" rows="2"></textarea></td>
    </tr>
<!-- Co Applicant -->

    

<!-- End Co Applicant -->
    <tr valign="baseline">
      <td align="right">Applicant last vehicle purchased:</td>
      <td><input type="text" name="applicant_last_vehicle_purchased" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants bank name:</td>
      <td><input type="text" name="applicants_bank_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants checking savings acct#:</td>
      <td><input type="text" name="applicants_checking_savings_acct" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant initials disclosure1:</td>
      <td><input type="text" name="applicant_initials_disclosure1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Undersigned authorization:</td>
      <td><input type="text" name="undersigned_authorization" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Federal equal act:</td>
      <td><input type="text" name="federal_equal_act" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant initials disclosure2:</td>
      <td><input type="text" name="applicant_initials_disclosure2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Information true statement:</td>
      <td><input type="text" name="information_true_statement" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant signature:</td>
      <td><input type="text" name="applicant_signature" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant signature:</td>
      <td><input type="text" name="co_applicant_signature" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Salesperson witness signature:</td>
      <td><input type="text" name="salesperson_witness_signature" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant signed input date:</td>
      <td><input type="text" name="applicant_signed_input_date" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Loan guarantor signature:</td>
      <td><input type="text" name="loan_guarantor_signature" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Credit app last modified:</td>
      <td><input type="text" name="credit_app_last_modified" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Application created date:</td>
      <td><input type="text" name="application_created_date" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants father name:</td>
      <td><input type="text" name="applicants_father_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants father deceased:</td>
      <td><input type="text" name="applicants_father_deceased" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants father mainphone number:</td>
      <td><input type="text" name="applicants_father_mainphone_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants father address:</td>
      <td><input type="text" name="applicants_father_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants mother name:</td>
      <td><input type="text" name="applicants_mother_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants mother deceased:</td>
      <td><input type="text" name="applicants_mother_deceased" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants mother mainphone number:</td>
      <td><input type="text" name="applicants_mother_mainphone_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants mother address:</td>
      <td><input type="text" name="applicants_mother_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative1 name:</td>
      <td><input type="text" name="applicants_realative1_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative1 relationship:</td>
      <td><input type="text" name="applicants_realative1_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative1 mainphone:</td>
      <td><input type="text" name="applicants_realative1_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative1 address:</td>
      <td><input type="text" name="applicants_realative1_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative2 name:</td>
      <td><input type="text" name="applicants_realative2_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative2 relationship:</td>
      <td><input type="text" name="applicants_realative2_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative2 mainphone:</td>
      <td><input type="text" name="applicants_realative2_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative2 address:</td>
      <td><input type="text" name="applicants_realative2_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative3 name:</td>
      <td><input type="text" name="applicants_realative3_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative3 relationship:</td>
      <td><input type="text" name="applicants_realative3_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative3 mainphone:</td>
      <td><input type="text" name="applicants_realative3_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative3 address:</td>
      <td><input type="text" name="applicants_realative3_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative4 name:</td>
      <td><input type="text" name="applicants_realative4_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative4 relationship:</td>
      <td><input type="text" name="applicants_realative4_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative4 mainphone number:</td>
      <td><input type="text" name="applicants_realative4_mainphone_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative4 address:</td>
      <td><input type="text" name="applicants_realative4_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative5 name:</td>
      <td><input type="text" name="applicants_realative5_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative5 relationship:</td>
      <td><input type="text" name="applicants_realative5_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative5 mainphone number:</td>
      <td><input type="text" name="applicants_realative5_mainphone_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative5 address:</td>
      <td><input type="text" name="applicants_realative5_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative6 name:</td>
      <td><input type="text" name="applicants_realative6_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative6 mainphone:</td>
      <td><input type="text" name="applicants_realative6_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative6 address:</td>
      <td><input type="text" name="applicants_realative6_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative7 name:</td>
      <td><input type="text" name="applicants_realative7_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative7 relationship:</td>
      <td><input type="text" name="applicants_realative7_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative7 mainphone:</td>
      <td><input type="text" name="applicants_realative7_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative7 address:</td>
      <td><input type="text" name="applicants_realative7_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative8 name:</td>
      <td><input type="text" name="applicants_realative8_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative8 mainphone:</td>
      <td><input type="text" name="applicants_realative8_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative8 address:</td>
      <td><input type="text" name="applicants_realative8_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative9 name:</td>
      <td><input type="text" name="applicants_realative9_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative9 mainphone:</td>
      <td><input type="text" name="applicants_realative9_mainphone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative9 address:</td>
      <td><input type="text" name="applicants_realative9_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants realative comments:</td>
      <td><input type="text" name="applicants_realative_comments" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants reposession:</td>
      <td><select name="applicants_reposession">
        <option>Yes Or No</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants reposession when:</td>
      <td><input type="text" name="applicants_reposession_when" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants reposession where:</td>
      <td><input type="text" name="applicants_reposession_where" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents many:</td>
      <td><input type="text" name="applicants_dependents_many" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents1 name:</td>
      <td><input type="text" name="applicants_dependents1_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents1 age:</td>
      <td><input type="text" name="applicants_dependents1_age" id="applicants_dependents1_age" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents1 grade:</td>
      <td><select name="applicants_dependents1_grade">
        <option>Select Grade</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents1 school name location:</td>
      <td><input type="text" name="applicants_dependents1_school_name_location" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents2 name:</td>
      <td><input type="text" name="applicants_dependents2_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents2 age:</td>
      <td><input type="text" name="applicants_dependents2_age" id="applicants_dependents2_age" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents2 grade:</td>
      <td><select name="applicants_dependents2_grade">
        <option>Select Grade</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants dependents2 school name location:</td>
      <td><input type="text" name="applicants_dependents2_school_name_location" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents many:</td>
      <td><input type="text" name="applicants_nondependents_many" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents1 name:</td>
      <td><input type="text" name="applicants_nondependents1_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents1 age:</td>
      <td><input type="text" name="applicants_nondependents1_age" id="applicants_nondependents1_age" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents1 cell number:</td>
      <td><input type="text" name="applicants_nondependents1_cell_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents2 name:</td>
      <td><input type="text" name="applicants_nondependents2_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents2 age:</td>
      <td><input type="text" name="applicants_nondependents2_age" id="applicants_nondependents2_age" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicants nondependents2 cell number:</td>
      <td><input type="text" name="applicants_nondependents2_cell_number" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant email address:</td>
      <td><input type="text" name="applicant_email_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicants email address:</td>
      <td><input type="text" name="co_applicants_email_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant have a computer:</td>
      <td><input type="checkbox" name="applicant_have_a_computer" value="yes" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant level of cpu experience:</td>
      <td><select name="applicant_level_of_cpu_experience">
        <option>Select Level 10 Highest</option>
        <option value="10">10 Expert</option>
        <option value="9">9</option>
        <option value="8">8</option>
        <option value="7">7 Above Average</option>
        <option value="6">6</option>
        <option value="5">5 Average</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1 Lowest</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant acknowledge equal opportunity:</td>
      <td><input name="applicant_acknowledge_equal_opportunity" type="text" value="" size="5" maxlength="5" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Equal credit opportunity act:</td>
      <td><input type="text" name="equal_credit_opportunity_act" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant authorization:</td>
      <td><input type="text" name="applicant_authorization" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Applicant authorization text:</td>
      <td><input type="text" name="applicant_authorization_text" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  
  <input type="hidden" name="applicant_did" value="<?php echo $did; ?>" />
  <input type="hidden" name="applicant_sid" value="<?php echo $sid; ?>" />
  <input type="hidden" name="applicant_vid" value="<?php //echo $vid; ?>" />
  <input type="hidden" name="applicant_cid" value="<?php //echo $cid; ?>" />
  <input type="hidden" name="applicant_clid" value="<?php //echo $clid; ?>" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
            <p><a href="#">Learn more &raquo;</a></p>





          </td>
              <td valign="top">
    <table>
    <tr valign="baseline">
      <td align="right">Co applicant name:</td>
      <td><input type="text" name="co_applicant_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant name relationship:</td>
      <td><input type="text" name="co_applicant_name_relationship" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant dob:</td>
      <td><input type="text" name="co_applicant_dob" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant ssn:</td>
      <td><input type="text" name="co_applicant_ssn" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant ssn4:</td>
      <td><input type="text" name="co_applicant_ssn4" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant home phone:</td>
      <td><input type="text" name="co_applicant_home_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant home cell:</td>
      <td><input type="text" name="co_applicant_home_cell" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr1:</td>
      <td><input type="text" name="co_applicant_present_addr1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr2:</td>
      <td><input type="text" name="co_applicant_present_addr2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr city:</td>
      <td><input type="text" name="co_applicant_present_addr_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr state:</td>
      <td><select name="co_applicant_present_addr_state">
        <option value="" >Select State</option>
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
    <tr valign="baseline">
      <td align="right">Co applicant present addr zip:</td>
      <td><input type="text" name="co_applicant_present_addr_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr county:</td>
      <td><input type="text" name="co_applicant_present_addr_county" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr live years:</td>
      <td><select name="co_applicant_present_addr_live_years">
        <option value="" >Select Years</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant present addr live months:</td>
      <td><select name="co_applicant_present_addr_live_months">
        <option value="">Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_name']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer name:</td>
      <td><input type="text" name="co_applicant_employer_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer phone:</td>
      <td><input type="text" name="co_applicant_employer_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer phone ext:</td>
      <td><input type="text" name="co_applicant_employer_phone_ext" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer addr:</td>
      <td><input type="text" name="co_applicant_employer_addr" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer addr2:</td>
      <td><input type="text" name="co_applicant_employer_addr2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer city:</td>
      <td><input type="text" name="co_applicant_employer_city" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer state:</td>
      <td><select name="co_applicant_employer_state">
        <option value=" ">Select State</option>
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
    <tr valign="baseline">
      <td align="right">Co applicant employer zip:</td>
      <td><input type="text" name="co_applicant_employer_zip" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer department:</td>
      <td><input type="text" name="co_applicant_employer_department" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer supervisor name:</td>
      <td><input type="text" name="co_applicant_employer_supervisor_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer supervisor phone:</td>
      <td><input type="text" name="co_applicant_employer_supervisor_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer work months:</td>
      <td><select name="co_applicant_employer_work_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_months['month_name']?>"><?php echo $row_months['month_name']?></option>
        <?php
} while ($row_months = mysqli_fetch_assoc($months));
  $rows = mysqli_num_rows($months);
  if($rows > 0) {
      mysqli_data_seek($months, 0);
	  $row_months = mysqli_fetch_assoc($months);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer work years:</td>
      <td><select name="co_applicant_employer_work_years">
        <option value="" >Select Years</option>
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
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer hours:</td>
      <td><input type="text" name="co_applicant_employer_hours" id="co_applicant_employer_hours" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant employer shift:</td>
      <td><select name="co_applicant_employer_shift">
        <option>Select Shift</option>
        <option value="1st Shift">1st Shift</option>
        <option value="2nd Shift">2nd Shift</option>
        <option value="3rd Shift">3rd Shift</option>
        <option value="4th Shift">4th Shift</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant income bringhome:</td>
      <td><input type="text" name="co_applicant_income_bringhome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Co applicant payday frequency:</td>
      <td><select name="co_applicant_payday_frequency">
        <option>Select Pay Day</option>
        <option value="Monthly">Monthly</option>
        <option value="Bi-Weekly">Bi-Weekly</option>
        <option value="Weekly">Weekly</option>
        <option value="Daily">Daily</option>
      </select></td>
    </tr>
    </table>   
              </td>
	          </tr>
        			  </table>
          
    
          </div>
        </div>
      </div>

<!-- End Customer Assigned Leads -->

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
