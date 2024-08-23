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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_one_creditapp_update")) {
  $updateSQL =  sprintf("UPDATE credit_app_fullblown SET applicants_bank_name=%s, applicants_checking_savings_type=%s, applicant_creditreference1=%s, applicant_creditreference1bal=%s, applicant_creditreference1monpay=%s, applicant_creditreference2=%s, applicant_creditreference2bal=%s, applicant_creditreference2monpay=%s, applicant_open_autoloan_cname=%s, applicant_open_autoloan_acctno=%s, applicant_open_autoloan_presntbal=%s, applicant_open_autoloan_pymt=%s, applicants_father_name=%s, applicants_father_deceased=%s, applicants_father_mainphone_number=%s, applicants_father_address=%s, applicants_mother_name=%s, applicants_mother_deceased=%s, applicants_realative1_fname=%s, applicants_realative1_lname=%s, applicants_realative1_relationship=%s, applicants_realative1_mainphone=%s, applicants_realative1_address=%s, applicants_realative1_address2=%s, applicants_realative1_address_city=%s, applicants_realative1_address_state=%s, applicants_realative1_address_zip=%s, applicants_realative2_lname=%s, applicants_realative2_fname=%s, applicants_realative2_relationship=%s, applicants_realative2_mainphone=%s, applicants_realative2_address=%s, applicants_realative2_city=%s, applicants_realative2_state=%s, applicants_realative2_zip=%s, applicants_realative3_lname=%s, applicants_realative3_fname=%s, applicants_realative3_relationship=%s, applicants_realative3_mainphone=%s, applicants_realative3_address=%s, applicants_realative3_city=%s, applicants_realative3_state=%s, applicants_realative3_zip=%s, applicants_realative4_lname=%s, applicants_realative4_fname=%s, applicants_realative4_relationship=%s, applicants_realative4_mainphone_number=%s, applicants_realative4_address=%s, applicants_realative4_city=%s, applicants_realative4_state=%s, applicants_realative4_zip=%s, applicants_realative5_lname=%s, applicants_realative5_fname=%s, applicants_realative5_relationship=%s, applicants_realative5_mainphone_number=%s, applicants_realative5_address=%s, applicants_realative5_city=%s, applicants_realative5_state=%s, applicants_realative5_zip=%s, applicants_realative6_lname=%s, applicants_realative6_fname=%s, applicants_realative6_mainphone=%s, applicants_realative6_address=%s, applicants_realative6_city=%s, applicants_realative6_state=%s, applicants_realative6_zip=%s, applicants_realative6_relationship=%s, applicants_realative7_lname=%s, applicants_realative7_fname=%s, applicants_realative7_relationship=%s, applicants_realative7_mainphone=%s, applicants_realative7_address=%s, applicants_realative7_city=%s, applicants_realative7_state=%s, applicants_realative7_zip=%s, applicants_realative8_lname=%s, applicants_realative8_fname=%s, applicants_realative8_mainphone=%s, applicants_realative8_address=%s, applicants_realative8_city=%s, applicants_realative8_state=%s, applicants_realative8_zip=%s, applicants_realative8_relationship=%s, applicants_realative9_lname=%s, applicants_realative9_fname=%s, applicants_realative9_mainphone=%s, applicants_realative9_address=%s, applicants_realative9_city=%s, applicants_realative9_state=%s, applicants_realative9_zip=%s, applicants_realative9_relationship=%s, applicants_realative10_lname=%s, applicants_realative10_fname=%s, applicants_realative10_address=%s, applicants_realative10_city=%s, applicants_realative10_state=%s, applicants_realative10_zip=%s, applicants_realative10_mainphone=%s, applicants_realative10_relationship=%s, applicants_reposession=%s, applicants_reposession_when=%s, applicants_reposession_where=%s, applicants_dependents_many=%s, applicants_dependents1_name=%s, applicants_dependents1_age=%s, applicants_dependents1_grade=%s, applicants_dependents1_school_name_location=%s, applicants_dependents2_name=%s, applicants_dependents2_age=%s, applicants_dependents2_grade=%s, applicants_dependents2_school_name_location=%s, applicants_nondependents_many=%s, applicants_nondependents1_name=%s, applicants_nondependents1_age=%s, applicants_nondependents1_cell_number=%s, applicants_nondependents2_name=%s, applicants_nondependents2_age=%s, applicants_nondependents2_cell_number=%s WHERE credit_app_fullblown_id=%s",
                       GetSQLValueString($_POST['applicants_bank_name'], "text"),
                       GetSQLValueString($_POST['applicants_checking_savings_type'], "text"),
                       GetSQLValueString($_POST['applicant_creditreference1'], "text"),
                       GetSQLValueString($_POST['applicant_creditreference1bal'], "text"),
                       GetSQLValueString($_POST['applicant_creditreference1monpay'], "text"),
                       GetSQLValueString($_POST['applicant_creditreference2'], "text"),
                       GetSQLValueString($_POST['applicant_creditreference2bal'], "text"),
                       GetSQLValueString($_POST['applicant_creditreference2monpay'], "text"),
                       GetSQLValueString($_POST['applicant_open_autoloan_cname'], "text"),
                       GetSQLValueString($_POST['applicant_open_autoloan_acctno'], "text"),
                       GetSQLValueString($_POST['applicant_open_autoloan_presntbal'], "text"),
                       GetSQLValueString($_POST['applicant_open_autoloan_pymt'], "text"),
                       GetSQLValueString($_POST['applicants_father_name'], "text"),
                       GetSQLValueString(isset($_POST['applicants_father_deceased']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['applicants_father_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_father_address'], "text"),
                       GetSQLValueString($_POST['applicants_mother_name'], "text"),
                       GetSQLValueString(isset($_POST['applicants_mother_deceased']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['applicants_realative1_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address2'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_lname'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_fname'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative10_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_reposession'], "text"),
                       GetSQLValueString($_POST['applicants_reposession_when'], "text"),
                       GetSQLValueString($_POST['applicants_reposession_where'], "text"),
                       GetSQLValueString($_POST['applicants_dependents_many'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_name'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_age'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_grade'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_school_name_location'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_name'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_age'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_grade'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_school_name_location'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents_many'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_name'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_age'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_cell_number'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_name'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_age'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_cell_number'], "text"),
                       GetSQLValueString($_POST['credit_app_fullblown_id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "app_manager.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $updateGoTo));
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
$appid = $row_creditapp_id_did['credit_app_fullblown_id'];

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

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records

		//$appjoint = $row_creditapp_id_did['joint_or_invidividual'];
		$appjoint = $row_creditapp_id_did['applicant_lname'];
		$apptoken = $row_creditapp_id_did['applicant_app_token'];
		
		if(!$apptoken){$apptoken = $tkey;}else{echo '';}
		
		$name = $row_creditapp_id_did['applicant_name'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Application Manager-Update</title>
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
          
          <h3>
          	<a href="fpdf-application.php?credit_app_id=<?php echo $appid; ?>" target="_blank">Print This Application</a> &gt;&gt;
            <a href="sales-creditapplication-update.php?credit_app_id=<?php echo $appid; ?>">Application </a> &gt;&gt;
            <a href="sales-creditapplication-references-update.php?credit_app_id=<?php echo $appid; ?>">View/Edit References</a>
          </h3>
          
          
      <div class="gadget_content">
          
      <form action="<?php echo $editFormAction; ?>" name="form_one_creditapp_update" method="POST" id="form_one_creditapp_update">          
       <table width="100%">
        <tr>
         <td align="right">
           
           
           
           <table width="100%">
             <tr valign="baseline">
               <td align="right">Security Key:</td>
               <td><strong><?php echo $apptoken; ?></strong>
                 <input name="credit_app_fullblown_id" type="hidden" id="credit_app_fullblown_id" value="<?php echo $appid; ?>">
                 
                </tr>
             <tr valign="baseline">
               <td class="appsection" colspan="2" align="center">
                 <strong> References For Applicant(s)</strong></td>
               </tr>
             <tr valign="baseline">
               <td align="right">References For Applicant(s):</td>
               <td><table width="200">
                 <tr>
                   <td><label>
                     
                     <?php if(!$name){ ?>
                     <?php echo $row_creditapp_id_did['applicant_fname'].' '.$row_creditapp_id_did['applicant_lname']; ?></label></td>
                   <?php }else{ ?>
                   <?php echo $name; ?>
                   <?php } ?>
                   <td><label>
                     <?php echo $row_creditapp_id_did['co_applicant_fname'].' '.$row_creditapp_id_did['co_applicant_lname']; ?></label></td>
                   </tr>
                 </table></td>
               </tr>
             
             
             <tr valign="baseline">
               <td nowrap align="right">&nbsp;</td>
               <td>&nbsp;</td>
               </tr>
             <tr valign="baseline">
               <td nowrap align="right">&nbsp;</td>
               <td>&nbsp;</td>
               </tr>
             <tr valign="baseline">
               <td colspan="2" align="left" nowrap>
                 
                 <a href="javascript:hideshow(document.getElementById('adivParents'))">Click Here For Applcant Parents</a>
                 
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
                 
                 
                 
                 </td>
               </tr>
             <tr valign="baseline">
               <td class="appsection" colspan="2" align="center"><strong>Applicant Parents Information</strong></td>
               </tr>

             <tr valign="baseline">
               <td colspan="2">
                 
                 <div id="adivParents" style="display: none">
                   <table width="100%">
                     <tr>
                       <td nowrap align="right">Applicant(s) Father Name:</td>
                       <td><input type="text" name="applicants_father_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_father_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Is Father Deceased:</td>
                       <td><input <?php if (!(strcmp($row_creditapp_id_did['applicants_father_deceased'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="applicants_father_deceased" value="1" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Applicant(s) Father Phone Number:</td>
                       <td><input type="text" name="applicants_father_mainphone_number" value="<?php echo htmlentities($row_creditapp_id_did['applicants_father_mainphone_number'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Applicant(s) Father Address:</td>
                       <td><input type="text" name="applicants_father_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_father_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Applicant(s) Mother Name:</td>
                       <td><input type="text" name="applicants_mother_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_mother_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Is Mother Deceased:</td>
                       <td><input <?php if (!(strcmp($row_creditapp_id_did['applicants_mother_deceased'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="applicants_mother_deceased" value="1" size="32"></td>
                       </tr>
                       <tr>
                       		<td>&nbsp;</td>
                            <td><input type="submit" name="submit" id="submit" value="Save"></td>
                       </tr>
                       
                     </table>
                   </div>
                </td></tr>
             
             
             <tr valign="baseline">
               <td nowrap align="right">&nbsp;</td>
               <td>&nbsp;</td>
             </tr>
             <tr valign="baseline">
               <td colspan="2" align="left" nowrap>
               <a href="javascript:hideshow(document.getElementById('adivCreditors'))">Click here For Creditors</a>
</td>
               </tr>
                            <tr valign="baseline">
               <td class="appsection" colspan="2" align="center">
                 <strong> References For Creditors</strong></td>
               </tr>

             <tr valign="baseline">
               <td colspan="2" align="right" nowrap>


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

<div id="adivCreditors" style="display: none">
               
               <table width="100%">
                <tr valign="baseline">
                               <td nowrap align="right">Open Auto Loan Company Name:</td>
                               <td><input name="applicant_open_autoloan_cname" type="text" id="applicant_open_autoloan_cname" value="<?php echo $row_creditapp_id_did['applicant_open_autoloan_cname']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">Open Auto Loan Acct No.</td>
                               <td><input name="applicant_open_autoloan_acctno" type="text" id="applicant_open_autoloan_acctno" value="<?php echo $row_creditapp_id_did['applicant_open_autoloan_acctno']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">Open Auto Loan Balance:</td>
                               <td><input name="applicant_open_autoloan_presntbal" type="text" id="applicant_open_autoloan_presntbal" value="<?php echo $row_creditapp_id_did['applicant_open_autoloan_presntbal']; ?>" size="32"></td>
                               </tr>
                
                             <tr valign="baseline">
                               <td nowrap align="right">Open Auto Loan Payment:</td>
                               <td><input name="applicant_open_autoloan_pymt" type="text" id="applicant_open_autoloan_pymt" value="<?php echo $row_creditapp_id_did['applicant_open_autoloan_pymt']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">&nbsp;</td>
                               <td>&nbsp;</td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">Credit Reference 1:</td>
                               <td><input name="applicant_creditreference1" type="text" id="applicant_creditreference1" value="<?php echo $row_creditapp_id_did['applicant_creditreference1']; ?>" size="32"></td>
                               </tr>
                
                             <tr valign="baseline">
                               <td nowrap align="right">Credit Reference 1 Balance:</td>
                               <td><input name="applicant_creditreference1bal" type="text" id="applicant_creditreference1bal" value="<?php echo $row_creditapp_id_did['applicant_creditreference1bal']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">Credit Reference 1 Monthly Payment:</td>
                               <td><input name="applicant_creditreference1monpay" type="text" id="applicant_creditreference1monpay" value="<?php echo $row_creditapp_id_did['applicant_creditreference1monpay']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">&nbsp;</td>
                               <td>&nbsp;</td>
                               </tr>
                
                             <tr valign="baseline">
                               <td nowrap align="right">Credit Reference 2:</td>
                               <td><input name="applicant_creditreference2" type="text" id="applicant_creditreference2" value="<?php echo $row_creditapp_id_did['applicant_creditreference2']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">Credit Reference 2 Balance:</td>
                               <td><input name="applicant_creditreference2bal" type="text" id="applicant_creditreference2bal" value="<?php echo $row_creditapp_id_did['applicant_creditreference2bal']; ?>" size="32"></td>
                             </tr>
                             <tr valign="baseline">
                               <td nowrap align="right">Credit Reference 2 Monthly Payment:</td>
                               <td><input name="applicant_creditreference2monpay" type="text" id="applicant_creditreference2monpay" value="<?php echo $row_creditapp_id_did['applicant_creditreference2monpay']; ?>" size="32"></td>
                               </tr>

		                <tr valign="baseline">
				               <td nowrap align="right">&nbsp;</td>
				               <td>&nbsp;</td>
		                </tr>
		                <tr valign="baseline">
               <td nowrap align="right">Applicants Ever Had Reposession?:</td>
               <td><input type="text" name="applicants_reposession" value="<?php echo htmlentities($row_creditapp_id_did['applicants_reposession'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
               </tr>
             <tr valign="baseline">
               <td nowrap align="right">If Applicants Reposession Yes When?</td>
               <td><input type="text" name="applicants_reposession_when" value="<?php echo htmlentities($row_creditapp_id_did['applicants_reposession_when'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
               </tr>
             <tr valign="baseline">
               <td nowrap align="right">Applicants Reposession Where?</td>
               <td><input type="text" name="applicants_reposession_where" value="<?php echo htmlentities($row_creditapp_id_did['applicants_reposession_where'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
               </tr>
                             <tr valign="baseline">
                               <td nowrap align="right"> </td>
                               <td> </td>
                               </tr>
                       <tr>
                       		<td>&nbsp;</td>
                            <td><input type="submit" name="submit" id="submit" value="Save"></td>
                       </tr>

                             <tr valign="baseline">
                               <td nowrap align="right"> </td>
                               <td> </td>
                               </tr>

               </table>
</div>
               
               </td>
               </tr>
               
             
              
              
              <tr valign="baseline">
               <td nowrap align="right">&nbsp;</td>
               <td>&nbsp;</td>
               </tr>
            
             <tr valign="baseline">
               <td colspan="2" align="left" nowrap>
                 <a href="javascript:hideshow(document.getElementById('adivReferences'))">Click here For References</a>
                 
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
                 
  <div id="adivReferences" style="display: none">
    <table width="100%">
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 fname:</td>
        <td><input type="text" name="applicants_realative1_fname" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 lname:</td>
        <td><input type="text" name="applicants_realative1_lname" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 relationship:</td>
        <td><input type="text" name="applicants_realative1_relationship" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_relationship'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 mainphone:</td>
        <td><input type="text" name="applicants_realative1_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 address:</td>
        <td><input type="text" name="applicants_realative1_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 address2:</td>
        <td><input type="text" name="applicants_realative1_address2" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_address2'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 address city:</td>
        <td><input type="text" name="applicants_realative1_address_city" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_address_city'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative1 address state:</td>
        <td><select name="applicants_realative1_address_state" id="applicants_realative1_address_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative1_address_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative1_address_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative1 address zip:</td>
        <td><input type="text" name="applicants_realative1_address_zip" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative1_address_zip'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 lname:</td>
        <td><input type="text" name="applicants_realative2_lname" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative2_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 fname:</td>
        <td><input type="text" name="applicants_realative2_fname" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative2_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 relationship:</td>
        <td><input type="text" name="applicants_realative2_relationship" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative2_relationship'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 mainphone:</td>
        <td><input type="text" name="applicants_realative2_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative2_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 address:</td>
        <td><input type="text" name="applicants_realative2_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative2_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 city:</td>
        <td><input type="text" name="applicants_realative2_city" value="<?php echo $row_creditapp_id_did['applicants_realative2_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative2 state:</td>
        <td><select name="applicants_realative2_state" id="applicants_realative2_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative2_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative2_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative2 zip:</td>
        <td><input type="text" name="applicants_realative2_zip" value="<?php echo $row_creditapp_id_did['applicants_realative2_zip']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 lname:</td>
        <td><input type="text" name="applicants_realative3_lname" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative3_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 fname:</td>
        <td><input type="text" name="applicants_realative3_fname" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative3_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 relationship:</td>
        <td><input type="text" name="applicants_realative3_relationship" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative3_relationship'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 mainphone:</td>
        <td><input type="text" name="applicants_realative3_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative3_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 address:</td>
        <td><input type="text" name="applicants_realative3_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative3_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 city:</td>
        <td><input type="text" name="applicants_realative3_city" value="<?php echo $row_creditapp_id_did['applicants_realative3_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative3 state:</td>
        <td><select name="applicants_realative3_state" id="applicants_realative3_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative3_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative3_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative3 zip:</td>
        <td><input type="text" name="applicants_realative3_zip" value="<?php echo $row_creditapp_id_did['applicants_realative3_zip']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 lname:</td>
        <td><input type="text" name="applicants_realative4_lname" value="<?php echo $row_creditapp_id_did['applicants_realative4_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 fname:</td>
        <td><input type="text" name="applicants_realative4_fname" value="<?php echo $row_creditapp_id_did['applicants_realative4_fname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 relationship:</td>
        <td><input type="text" name="applicants_realative4_relationship" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative4_relationship'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 mainphone number:</td>
        <td><input type="text" name="applicants_realative4_mainphone_number" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative4_mainphone_number'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 address:</td>
        <td><input type="text" name="applicants_realative4_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative4_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 city:</td>
        <td><input type="text" name="applicants_realative4_city" value="<?php echo $row_creditapp_id_did['applicants_realative4_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative4 state:</td>
        <td><select name="applicants_realative4_state" id="applicants_realative4_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative4_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative4_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative4 zip:</td>
        <td><input type="text" name="applicants_realative4_zip" value="<?php echo $row_creditapp_id_did['applicants_realative4_zip']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 lname:</td>
        <td><input name="applicants_realative5_lname" type="text" value="<?php echo $row_creditapp_id_did['applicants_realative5_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 fname:</td>
        <td><input type="text" name="applicants_realative5_fname" value="<?php echo $row_creditapp_id_did['applicants_realative5_fname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 relationship:</td>
        <td><input type="text" name="applicants_realative5_relationship" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative5_relationship'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 mainphone number:</td>
        <td><input type="text" name="applicants_realative5_mainphone_number" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative5_mainphone_number'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 address:</td>
        <td><input type="text" name="applicants_realative5_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative5_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 city:</td>
        <td><input type="text" name="applicants_realative5_city" value="<?php echo $row_creditapp_id_did['applicants_realative5_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative5 state:</td>
        <td><select name="applicants_realative5_state" id="applicants_realative5_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative5_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative5_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative5 zip:</td>
        <td><input type="text" name="applicants_realative5_zip" value="<?php echo $row_creditapp_id_did['applicants_realative5_zip']; ?>" size="32"></td>
        </tr>

      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>

      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
                            <td><input type="submit" name="submit" id="submit" value="Save"></td>
        </tr>


      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 lname:</td>
        <td><input type="text" name="applicants_realative6_lname" value="<?php echo $row_creditapp_id_did['applicants_realative6_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 fname:</td>
        <td><input type="text" name="applicants_realative6_fname" value="<?php echo $row_creditapp_id_did['applicants_realative6_fname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 relationship:</td>
        <td><input type="text" name="applicants_realative6_relationship" value="<?php echo $row_creditapp_id_did['applicants_realative6_relationship']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 mainphone:</td>
        <td><input type="text" name="applicants_realative6_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative6_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 address:</td>
        <td><input type="text" name="applicants_realative6_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative6_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 city:</td>
        <td><input type="text" name="applicants_realative6_city" value="<?php echo $row_creditapp_id_did['applicants_realative6_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative6 state:</td>
        <td><select name="applicants_realative6_state" id="applicants_realative6_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative6_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative6_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative6 zip:</td>
        <td><input type="text" name="applicants_realative6_zip" value="<?php echo $row_creditapp_id_did['applicants_realative6_zip']; ?>" size="32"></td>
        </tr>
      
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 lname:</td>
        <td><input type="text" name="applicants_realative7_lname" value="<?php echo $row_creditapp_id_did['applicants_realative7_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 fname:</td>
        <td><input type="text" name="applicants_realative7_fname" value="<?php echo $row_creditapp_id_did['applicants_realative7_fname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 relationship:</td>
        <td><input type="text" name="applicants_realative7_relationship" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative7_relationship'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 mainphone:</td>
        <td><input type="text" name="applicants_realative7_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative7_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 address:</td>
        <td><input type="text" name="applicants_realative7_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative7_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 city:</td>
        <td><input type="text" name="applicants_realative7_city" value="<?php echo $row_creditapp_id_did['applicants_realative7_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative7 state:</td>
        <td><select name="applicants_realative7_state" id="applicants_realative7_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative7_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative7_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative7 zip:</td>
        <td><input type="text" name="applicants_realative7_zip" value="<?php echo $row_creditapp_id_did['applicants_realative7_zip']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 lname:</td>
        <td><input type="text" name="applicants_realative8_lname" value="<?php echo $row_creditapp_id_did['applicants_realative8_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 fname:</td>
        <td><input type="text" name="applicants_realative8_fname" value="<?php echo $row_creditapp_id_did['applicants_realative8_fname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 relationship:</td>
        <td><input type="text" name="applicants_realative8_relationship" value="<?php echo $row_creditapp_id_did['applicants_realative8_relationship']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 mainphone:</td>
        <td><input type="text" name="applicants_realative8_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative8_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 address:</td>
        <td><input type="text" name="applicants_realative8_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative8_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 city:</td>
        <td><input type="text" name="applicants_realative8_city" value="<?php echo $row_creditapp_id_did['applicants_realative8_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative8 state:</td>
        <td><select name="applicants_realative8_state" id="applicants_realative8_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative8_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative8_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative8 zip:</td>
        <td><input type="text" name="applicants_realative8_zip" value="<?php echo $row_creditapp_id_did['applicants_realative8_zip']; ?>" size="32"></td>
        </tr>
      
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative9 lname:</td>
        <td><input type="text" name="applicants_realative9_lname" value="<?php echo $row_creditapp_id_did['applicants_realative9_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative9 fname:</td>
        <td><input type="text" name="applicants_realative9_fname" value="<?php echo $row_creditapp_id_did['applicants_realative9_fname']; ?>" size="32"></td>
        </tr>
  <tr valign="baseline">
    <td nowrap align="right">Applicants realative9 relationship:</td>
    <td><input type="text" name="applicants_realative9_relationship" value="<?php echo $row_creditapp_id_did['applicants_realative9_relationship']; ?>" size="32"></td>
    </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative9 mainphone:</td>
        <td><input type="text" name="applicants_realative9_mainphone" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative9_mainphone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative9 address:</td>
        <td><input type="text" name="applicants_realative9_address" value="<?php echo htmlentities($row_creditapp_id_did['applicants_realative9_address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative9 city:</td>
        <td><input type="text" name="applicants_realative9_city" value="<?php echo $row_creditapp_id_did['applicants_realative9_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative9 state:</td>
        <td><select name="applicants_realative9_state" id="applicants_realative9_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative9_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative9_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative9 zip:</td>
        <td><input type="text" name="applicants_realative9_zip" value="<?php echo $row_creditapp_id_did['applicants_realative9_zip']; ?>" size="32"></td>
        </tr>
      
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 lname:</td>
        <td><input type="text" name="applicants_realative10_lname" value="<?php echo $row_creditapp_id_did['applicants_realative10_lname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 fname:</td>
        <td><input type="text" name="applicants_realative10_fname" value="<?php echo $row_creditapp_id_did['applicants_realative10_fname']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 relationship:</td>
        <td><input type="text" name="applicants_realative10_relationship" value="<?php echo $row_creditapp_id_did['applicants_realative10_relationship']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 address:</td>
        <td><input type="text" name="applicants_realative10_address" value="<?php echo $row_creditapp_id_did['applicants_realative10_address']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 city:</td>
        <td><input type="text" name="applicants_realative10_city" value="<?php echo $row_creditapp_id_did['applicants_realative10_city']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 state:</td>
        <td><select name="applicants_realative10_state" id="applicants_realative10_state">
          <option value="" <?php if (!(strcmp("", $row_creditapp_id_did['applicants_realative10_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
          <?php
do {  
?>
          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_creditapp_id_did['applicants_realative10_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td nowrap align="right">Applicants realative10 zip:</td>
        <td><input type="text" name="applicants_realative10_zip" value="<?php echo $row_creditapp_id_did['applicants_realative10_zip']; ?>" size="32"></td>
        </tr>
      <tr valign="baseline">
        <td nowrap align="right">Applicants realative10 mainphone:</td>
        <td><input type="text" name="applicants_realative10_mainphone" value="<?php echo $row_creditapp_id_did['applicants_realative10_mainphone']; ?>" size="32"></td>
        </tr>
                       <tr>
                       		<td>&nbsp;</td>
                            <td><input type="submit" name="submit" id="submit" value="Save"></td>
                       </tr>

      </table>
  </div>          
                 </td>
               </tr>
             
                      <tr valign="baseline">
               <td class="appsection" colspan="2" align="center">
                 <strong> References For Applicant(s)</strong></td>
               </tr>

             
             
             
             
                <tr valign="baseline">
                        <td colspan="2" align="left">&nbsp;</td>
                </tr>
                <tr valign="baseline">
               <td colspan="2" align="left">
               <a href="javascript:hideshow(document.getElementById('adivDependents'))">Click here For Dependents</a></td>
               </tr>
              
              <tr valign="baseline">
               <td class="appsection" colspan="2" align="center">
                 <strong> References For Dependents</strong></td>
               </tr>

             <tr valign="baseline">
               <td colspan="2" align="left" nowrap>
                 
                 
                 
                 
                 
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
                 
  <div id="adivDependents" style="display: none">
    
  <table width="100%">

  <tr valign="baseline">
    <td nowrap align="right">Applicants dependents many:</td>
    <td><input type="text" name="applicants_dependents_many" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents_many'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents1 name:</td>
      <td><input type="text" name="applicants_dependents1_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents1_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents1 age:</td>
      <td><input type="text" name="applicants_dependents1_age" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents1_age'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents1 grade:</td>
      <td><input type="text" name="applicants_dependents1_grade" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents1_grade'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents1 school name location:</td>
      <td><input type="text" name="applicants_dependents1_school_name_location" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents1_school_name_location'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents2 name:</td>
      <td><input type="text" name="applicants_dependents2_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents2_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents2 age:</td>
      <td><input type="text" name="applicants_dependents2_age" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents2_age'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents2 grade:</td>
      <td><input type="text" name="applicants_dependents2_grade" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents2_grade'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants dependents2 school name location:</td>
      <td><input type="text" name="applicants_dependents2_school_name_location" value="<?php echo htmlentities($row_creditapp_id_did['applicants_dependents2_school_name_location'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents many:</td>
      <td><input type="text" name="applicants_nondependents_many" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents_many'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents1 name:</td>
      <td><input type="text" name="applicants_nondependents1_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents1_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents1 age:</td>
      <td><input type="text" name="applicants_nondependents1_age" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents1_age'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents1 cell number:</td>
      <td><input type="text" name="applicants_nondependents1_cell_number" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents1_cell_number'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents2 name:</td>
      <td><input type="text" name="applicants_nondependents2_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents2_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents2 age:</td>
      <td><input type="text" name="applicants_nondependents2_age" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents2_age'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants nondependents2 cell number:</td>
      <td><input type="text" name="applicants_nondependents2_cell_number" value="<?php echo htmlentities($row_creditapp_id_did['applicants_nondependents2_cell_number'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
                             <tr>
                       		<td></td>
                            <td><input type="submit" name="submit" id="submit" value="Save"></td>
                       </tr>

  </table>
    
    
  </div>
                 
                 
                 
                 
                 
                 </td>
               </tr>
             <tr valign="baseline">
               <td nowrap align="right">&nbsp;</td>
               <td>&nbsp;</td>
               </tr>
                                <tr valign="baseline">
               <td colspan="2" align="left">
                 <a href="javascript:hideshow(document.getElementById('adivBank'))">Click here For Applicants Bank Information:</a></td>
               </tr>
                                <tr valign="baseline">
               <td class="appsection" colspan="2" align="center">
                 <strong>Applicant Bank Information</strong></td>
               </tr>
               
             <tr valign="baseline">
               <td colspan="2" align="left" nowrap>
                 
                 
                 
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
                 
                 <div id="adivBank" style=" display: none">
                   <table width="100%">

                     <tr valign="baseline">
                       <td nowrap align="right">Applicant(s) Bank Name:</td>
                       <td><input type="text" name="applicants_bank_name" value="<?php echo htmlentities($row_creditapp_id_did['applicants_bank_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Applicant(s) Checking Savings Type:</td>
                       <td><input type="text" name="applicants_checking_savings_type" value="<?php echo htmlentities($row_creditapp_id_did['applicants_checking_savings_type'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                     <tr valign="baseline">
                       <td nowrap align="right">Applicant(s) Checking Savings Acct#:</td>
                       <td><input type="text" name="applicants_checking_savings_acct" value="<?php echo htmlentities($row_creditapp_id_did['applicants_checking_savings_acct#'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                       </tr>
                       <tr>
                       		<td></td>
                            <td><input type="submit" name="submit" id="submit" value="Save"></td>
                       </tr>
                     </table>
                   </div>
                 
                 </td>
             </tr>
             <tr valign="baseline">
               <td nowrap align="right">&nbsp;</td>
               <td>&nbsp;</td>
               </tr>
             
             
             
             
             <tr valign="baseline">
               <td align="right">&nbsp;</td>
               <td></td>
               </tr>
             <tr valign="baseline">
               <td colspan="2" align="right">&nbsp;</td>
               </tr>
             <tr valign="baseline">
               <td align="right">&nbsp;</td>
               <td></td>
               </tr>
             <tr valign="baseline">
               <td align="right"><input type="reset" name="Reset" id="button" value="Reset">
                 </td>
               <td> <input type="submit" name="submit" id="submit" value="Save">
                 | <a href="fpdf-application.php?credit_id=<?php echo $appid; ?>"> Print</a> | <a href="app_manager.php">Cancel</a></td>
               </tr>
             </table>
           
           
           
           <!-- p><a href="#">Learn more &raquo;</a></p -->
           
           
           
           
           
         </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          </tr>
      </table>
          
    
          </div>
        </div>
      </div>

<!-- End Customer Assigned Leads -->
<input type="hidden" name="MM_update" value="form_one_creditapp_update">
      </form>
      <p>&nbsp;</p>
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

mysqli_free_result($makes);

mysqli_free_result($creditapp_id_did);

mysqli_free_result($car_years);

mysqli_free_result($income_intervals);
?>
