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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_quickcontact")) {
  $insertSQL =  sprintf("INSERT INTO cust_leads (cust_nickname, cust_fname, cust_lname, cust_email, cust_lead_temperature, cust_phoneno, cust_phonetype, cust_lead_sp_comment, cust_dealer_id, cust_salesperson_id, cust_lead_token) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_lead_temperature'], "text"),
                       GetSQLValueString($_POST['cust_phoneno2'], "text"),
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
$did = $row_userSets['main_dealerid']; //Hackishere




$colname_dlrSlctBySsnDid = "-1";
if (isset($_SESSION['$did'])) {
  $colname_dlrSlctBySsnDid = $_SESSION['$did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid =  "SELECT * FROM dealers WHERE id = '$did'";;
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);

$colname_creditapp_id_did = "-1";
if (isset($_GET['credit_app_id'])) {
  $colname_creditapp_id_did = $_GET['credit_app_id'];
}else{$colname_creditapp_id_did='NULL';}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_creditapp_id_did =  sprintf("SELECT * FROM credit_app_fullblown WHERE credit_app_fullblown.credit_app_fullblown_id = %s AND credit_app_fullblown.applicant_did = '$did'", GetSQLValueString($colname_creditapp_id_did, "int"));
$creditapp_id_did = mysqli_query($idsconnection_mysqli, $query_creditapp_id_did);
$row_creditapp_id_did = mysqli_fetch_assoc($creditapp_id_did);
$totalRows_creditapp_id_did = mysqli_num_rows($creditapp_id_did);
$sid = $row_creditapp_id_did['applicant_sid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons = "SELECT * FROM sales_person WHERE salesperson_id = $sid";
$salespersons = mysqli_query($idsconnection_mysqli, $query_salespersons);
$row_salespersons = mysqli_fetch_assoc($salespersons);
$totalRows_salespersons = mysqli_num_rows($salespersons);

?>
<?php 
/////Definitions

$mydid = $row_dlrSlctBySsnDid['id'];
$dcompany = $row_dlrSlctBySsnDid['company'];
$websturl = $row_dlrSlctBySsnDid['website'];
$dname = $row_dlrSlctBySsnDid['contact'];
$demail = $row_dlrSlctBySsnDid['email'];
$dphone = $row_dlrSlctBySsnDid['contact_phone'];
$daddr = $row_dlrSlctBySsnDid['address'];
$dstate = $row_dlrSlctBySsnDid['state'];
$dcity = $row_dlrSlctBySsnDid['city'];
$dzip = $row_dlrSlctBySsnDid['zip'];
$dstorephone = $row_dlrSlctBySsnDid['phone'];
$dstorefax = $row_dlrSlctBySsnDid['fax'];
$dslogan = $row_dlrSlctBySsnDid['slogan'];
$ddisclaim = $row_dlrSlctBySsnDid['disclaimer'];
$mapurl = $row_dlrSlctBySsnDid['mapurl'];
$financenm = $row_dlrSlctBySsnDid['finance'];
$financephn = $row_dlrSlctBySsnDid['finance_contact'];
$intrsalesnm = $row_dlrSlctBySsnDid['sales'];
$intrsalesphn = $row_dlrSlctBySsnDid['sales_contact'];

$salesperonName = $row_salespersons['salesperson_firstname'].' '.$row_salespersons['salesperson_lastname'];
?>
<?php

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records
 
                //$row_creditapp_id_did[''];

$tkey2 = $tkey;
$appid = $colname_creditapp_id_did;
$appjointorindividual = $row_creditapp_id_did['joint_or_invidividual'];
$appemail = $row_creditapp_id_did['applicant_email_address'];
$appbusinessemail = $row_creditapp_id_did['applicant_email_address2'];



$appdate = $row_creditapp_id_did['application_created_date'];

$appsocial = $row_creditapp_id_did['applicant_ssn'];
$appsocial2 = $row_creditapp_id_did['applicant_ssn4'];


$appfulltitlename =  $row_creditapp_id_did['applicant_titlename'].' ';
//Name Full
$appfullnamefml =  $row_creditapp_id_did['applicant_name'];

//Names Seperated
$applname = $row_creditapp_id_did['applicant_lname'];
$appfname = $row_creditapp_id_did['applicant_fname'];
$appmname = $row_creditapp_id_did['applicant_mname'];

$appFULLNAME = "$appfname $appmname $applname";

//Standard Definitions
$appsuffix = $row_creditapp_id_did['applicant_suffixname'];
$appdob = $row_creditapp_id_did['applicant_dob'];
$appage = $row_creditapp_id_did['applicant_age'];
$appaddrs = $row_creditapp_id_did['applicant_present_address1'];
$appaddrslyrs = $row_creditapp_id_did['applicant_addr_years'];
$appaddrslmos = $row_creditapp_id_did['applicant_addr_months'];
$appdriverlcno = $row_creditapp_id_did['applicant_driver_licenses_number'];
$appdriverlcst = $row_creditapp_id_did['applicant_driver_state_issued'];
$appdriverlcstatus = $row_creditapp_id_did['applicant_driver_licenses_status'];
$appaddr2 = $row_creditapp_id_did['applicant_present_address2'];
$appcity = $row_creditapp_id_did['applicant_present_addr_city'];
$appcounty = $row_creditapp_id_did['applicant_present_addr_county'];
$appstate = $row_creditapp_id_did['applicant_present_addr_state'];
$appzip = $row_creditapp_id_did['applicant_present_addr_zip'];
$appprevaddr = $row_creditapp_id_did['applicant_previous1_addr1'];
$appprevaddr2 = $row_creditapp_id_did['applicant_previous1_addr2'];
$appprevaddrcity = $row_creditapp_id_did['applicant_previous1_addr_city'];
$appprevaddrcounty = $row_creditapp_id_did['applicant_present_addr_county'];
$appprevaddrstate = $row_creditapp_id_did['applicant_previous1_addr_state'];
$appprevaddrzip = $row_creditapp_id_did['applicant_previous1_addr_zip'];
$appprevaddrlyrs = $row_creditapp_id_did['applicant_previous1_live_years'];
$appprevaddrlmos = $row_creditapp_id_did['applicant_previous1_live_months'];
$apphomephno = $row_creditapp_id_did['applicant_main_phone'];
$appcellphno = $row_creditapp_id_did['applicant_cell_phone'];
$appeducation = $row_creditapp_id_did['applicant_employment_type'];
$appnodepndts = $row_creditapp_id_did['applicants_dependents_many'];
$appworktitle = $row_creditapp_id_did['applicant_employer1_position'];
$appworkstatus = $row_creditapp_id_did['applicant_employment_status'];
$appworktype = $row_creditapp_id_did['applicant_employment_type'];
$appemployernm = $row_creditapp_id_did['applicant_employer1_name'];
$appemployeraddr = $row_creditapp_id_did['applicant_employer1_addr'];
$appemployeraddr2 = $row_creditapp_id_did['applicant_employer1_addr2'];
$appemployercity = $row_creditapp_id_did['applicant_employer1_city'];
$appemployerst = $row_creditapp_id_did['applicant_employer1_state'];
$appemployerzip = $row_creditapp_id_did['applicant_employer1_zip'];
$appemployerphno = $row_creditapp_id_did['applicant_employer1_phone'];
$appemployerext = $row_creditapp_id_did['applicant_employer1_phone_ext'];
$appemployerdept = $row_creditapp_id_did['applicant_employer1_department'];
$appemployersupervisr = $row_creditapp_id_did['applicant_employer1_supervisors_name'];
$appemployersupervisrphn = $row_creditapp_id_did['applicant_employer1_supervisors_phone'];
$appemployerhrshft = $row_creditapp_id_did['applicant_employer1_hours_shift'];
$appemployerwkyrs = $row_creditapp_id_did['applicant_employer1_work_years'];
$appemployerwkmos = $row_creditapp_id_did['applicant_employer1_work_months'];
$appemployer2nm = $row_creditapp_id_did['applicant_employer2_name'];
$appemployer2title = $row_creditapp_id_did['applicant_employer2_position'];
$appemployer2phno = $row_creditapp_id_did['applicant_employer2_phone'];
$appemployer2wkyrs = $row_creditapp_id_did['applicant_employer2_work_years'];
$appemployer2wkmos = $row_creditapp_id_did['applicant_employer2_work_months'];
$appemployer2addr = $row_creditapp_id_did['applicant_employer2_addr'];
$appemployer2addr2 = $row_creditapp_id_did['applicant_employer2_addr2'];
$appemployer2city = $row_creditapp_id_did['applicant_employer2_city'];
$appemployer2state = $row_creditapp_id_did['applicant_employer2_state'];
$appemployer2zip = $row_creditapp_id_did['applicant_employer2_zip'];
$appgrossincome = $row_creditapp_id_did['applicant_employer1_salary_bringhome'];
$appgrossincomefreq = $row_creditapp_id_did['applicant_employer1_payday_freq'];
$appotherincome = $row_creditapp_id_did['applicant_other_income_amount'];
$appotherincomesrc = $row_creditapp_id_did['applicant_other_income_source'];
$appotherincomefreq = $row_creditapp_id_did['applicant_other_income_when_rcvd'];
$appalimonyamount = $row_creditapp_id_did['applicant_alimonyamt'];
$appresidencetype = $row_creditapp_id_did['applicant_buy_own_rent_other'];
$applandlordname = $row_creditapp_id_did['applicant_previous1_landlord_name'];
$applandlordphonno = $row_creditapp_id_did['applicant_previous1_landlord_name'];

//Creditors
$apprentmortpymt = $row_creditapp_id_did['applicant_house_payment'];
$appbankname = $row_creditapp_id_did['applicants_bank_name'];
$appbankacctype = $row_creditapp_id_did['applicants_checking_savings_type'];
$appcreditref1 = $row_creditapp_id_did['applicant_creditreference1'];
$appcreditref1bal = $row_creditapp_id_did['applicant_creditreference1bal'];
$appcreditref1mopy = $row_creditapp_id_did['applicant_creditreference1monpay'];
$appcreditref2 = $row_creditapp_id_did['applicant_creditreference2'];
$appcreditref2bal = $row_creditapp_id_did['applicant_creditreference2bal'];
$appcreditref2mopy = $row_creditapp_id_did['applicant_creditreference2monpay'];
$appautoloan = $row_creditapp_id_did['applicant_open_autoloan_cname'];
$appautoloanacct = $row_creditapp_id_did['applicant_open_autoloan_acctno'];
$appautoloanprebal = $row_creditapp_id_did['applicant_open_autoloan_presntbal'];
$appautoloanpaymt = $row_creditapp_id_did['applicant_open_autoloan_pymt'];



//Signature Initals

$appauthorizeinitial = $row_creditapp_id_did['applicant_hereby_authorize'];
$appequalcreditact = $row_creditapp_id_did['equal_credit_opportunity_act'];

$appinitialsdisc1 = $row_creditapp_id_did['applicant_initials_disclosure1'];
$appinitialsdisc2 = $row_creditapp_id_did['applicant_initials_disclosure2'];

//References Parents

$appfathername = $row_creditapp_id_did['applicants_father_name'];
$appfatherdeceased = $row_creditapp_id_did['applicants_father_deceased'];
$appfatheraddr = $row_creditapp_id_did['applicants_father_address'];
$appfatherphone =  $row_creditapp_id_did['applicants_father_mainphone_number'];

$appmothername = $row_creditapp_id_did['applicants_mother_name'];
$appmotherdeceased = $row_creditapp_id_did['applicants_mother_deceased'];
$appmotheraddr = $row_creditapp_id_did['applicants_mother_address'];
$appmotherphone = $row_creditapp_id_did['applicants_mother_mainphone_number'];

//References 1-10 $row_creditapp_id_did[''];
$appnearelativelname = $row_creditapp_id_did['applicants_realative1_lname'];
$appnearelativefname = $row_creditapp_id_did['applicants_realative1_fname'];
$appnearelativeaddr1 = $row_creditapp_id_did['applicants_realative1_address'];
$appnearelativeaddr2 = $row_creditapp_id_did['applicants_realative1_address2'];
$appnearelativecity = $row_creditapp_id_did['applicants_realative1_address_city'];
$appnearelativestate = $row_creditapp_id_did['applicants_realative1_address_state'];
$appnearelativezip = $row_creditapp_id_did['applicants_realative1_address_zip'];
$appnearelativerelation = $row_creditapp_id_did['applicants_realative1_relationship'];
$appnearelativephoneno = $row_creditapp_id_did['applicants_realative1_mainphone'];


$appreference2lname = $row_creditapp_id_did['applicants_realative2_lname'];
$appreference2fname = $row_creditapp_id_did['applicants_realative2_fname'];
$appreference2addr1 = $row_creditapp_id_did['applicants_realative2_address'];
$appreference2city = $row_creditapp_id_did['applicants_realative2_city'];
$appreference2state = $row_creditapp_id_did['applicants_realative2_state'];
$appreference2zip = $row_creditapp_id_did['applicants_realative2_zip'];
$appreference2phoneno = $row_creditapp_id_did['applicants_realative2_mainphone'];
$appreference2relation = $row_creditapp_id_did['applicants_realative2_relationship'];

$appreference3lname = $row_creditapp_id_did['applicants_realative3_lname'];
$appreference3fname = $row_creditapp_id_did['applicants_realative3_fname'];
$appreference3addr1 = $row_creditapp_id_did['applicants_realative3_address'];
$appreference3city = $row_creditapp_id_did['applicants_realative3_city'];
$appreference3state = $row_creditapp_id_did['applicants_realative3_state'];
$appreference3zip = $row_creditapp_id_did['applicants_realative3_zip'];
$appreference3phoneno = $row_creditapp_id_did['applicants_realative3_mainphone'];
$appreference3relation = $row_creditapp_id_did['applicants_realative3_relationship'];


$appreference4lname = $row_creditapp_id_did['applicants_realative4_lname'];
$appreference4fname = $row_creditapp_id_did['applicants_realative4_fname'];
$appreference4addr1 = $row_creditapp_id_did['applicants_realative4_address'];
$appreference4city = $row_creditapp_id_did['applicants_realative4_city'];
$appreference4state = $row_creditapp_id_did['applicants_realative4_state'];
$appreference4zip = $row_creditapp_id_did['applicants_realative4_zip'];
$appreference4phoneno = $row_creditapp_id_did['applicants_realative4_mainphone_number'];
$appreference4relation = $row_creditapp_id_did['applicants_realative4_relationship'];


$appreference5lname = $row_creditapp_id_did['applicants_realative5_lname'];
$appreference5fname = $row_creditapp_id_did['applicants_realative5_fname'];
$appreference5addr1 = $row_creditapp_id_did['applicants_realative5_address'];
$appreference5city = $row_creditapp_id_did['applicants_realative5_city'];
$appreference5state = $row_creditapp_id_did['applicants_realative5_state'];
$appreference5zip = $row_creditapp_id_did['applicants_realative5_zip'];
$appreference5phoneno = $row_creditapp_id_did['applicants_realative5_mainphone_number'];
$appreference5relation = $row_creditapp_id_did['applicants_realative5_relationship'];

$appreference6lname = $row_creditapp_id_did['applicants_realative6_lname'];
$appreference6fname = $row_creditapp_id_did['applicants_realative6_fname'];
$appreference6addr1 = $row_creditapp_id_did['applicants_realative6_address'];
$appreference6city = $row_creditapp_id_did['applicants_realative6_city'];
$appreference6state = $row_creditapp_id_did['applicants_realative6_state'];
$appreference6zip = $row_creditapp_id_did['applicants_realative6_zip'];
$appreference6phoneno = $row_creditapp_id_did['applicants_realative6_mainphone'];
$appreference6relation = $row_creditapp_id_did['applicants_realative6_relationship'];

$appreference7lname = $row_creditapp_id_did['applicants_realative7_lname'];
$appreference7fname = $row_creditapp_id_did['applicants_realative7_fname'];
$appreference7addr1 = $row_creditapp_id_did['applicants_realative7_address'];
$appreference7city = $row_creditapp_id_did['applicants_realative7_city'];
$appreference7state = $row_creditapp_id_did['applicants_realative7_state'];
$appreference7zip = $row_creditapp_id_did['applicants_realative6_zip'];
$appreference7phoneno = $row_creditapp_id_did['applicants_realative7_mainphone'];
$appreference7relation = $row_creditapp_id_did['applicants_realative7_relationship'];

$appreference8lname = $row_creditapp_id_did['applicants_realative8_lname'];
$appreference8fname = $row_creditapp_id_did['applicants_realative8_fname'];
$appreference8addr1 = $row_creditapp_id_did['applicants_realative8_address'];
$appreference8city = $row_creditapp_id_did['applicants_realative8_city'];
$appreference8state = $row_creditapp_id_did['applicants_realative8_state'];
$appreference8zip = $row_creditapp_id_did['applicants_realative8_zip'];
$appreference8phoneno = $row_creditapp_id_did['applicants_realative8_mainphone'];
$appreference8relation = $row_creditapp_id_did['applicants_realative8_relationship'];

$appreference9lname = $row_creditapp_id_did['applicants_realative9_lname'];
$appreference9fname = $row_creditapp_id_did['applicants_realative9_fname'];
$appreference9addr1 = $row_creditapp_id_did['applicants_realative9_address'];
$appreference9city = $row_creditapp_id_did['applicants_realative9_city'];
$appreference9state = $row_creditapp_id_did['applicants_realative9_state'];
$appreference9zip = $row_creditapp_id_did['applicants_realative9_zip'];
$appreference9phoneno = $row_creditapp_id_did['applicants_realative9_mainphone'];
$appreference9relation = $row_creditapp_id_did['applicants_realative9_relationship'];

$appreference10lname = $row_creditapp_id_did['applicants_realative10_lname'];
$appreference10fname = $row_creditapp_id_did['applicants_realative10_fname'];
$appreference10addr1 = $row_creditapp_id_did['applicants_realative10_address'];
$appreference10city = $row_creditapp_id_did['applicants_realative10_city'];
$appreference10state = $row_creditapp_id_did['applicants_realative10_state'];
$appreference10zip = $row_creditapp_id_did['applicants_realative10_zip'];
$appreference10phoneno = $row_creditapp_id_did['applicants_realative10_mainphone'];
$appreference10relation = $row_creditapp_id_did['applicants_realative10_relationship'];




$bankrptcyindicator = 'Bankruptcy Yes';
$bankruptcydate = '10-2005';
$reposessiondate = '11-1-2009';

$appincomedisclaimer = 'Alimony, child support, or seperate maintenance income need not be revealed if you do not wish to have it';
$appincomedisclaimer2 = 'considered as a basis for repaying this obligation.';

$appdigitalsignature = $row_creditapp_id_did['applicant_digital_signature'];
$appdigitalsignaturedate = $row_creditapp_id_did['applicant_digital_signature_date'];

	include("../dealer/_defintions-coapplicant.php");

//mysqli_free_result($userDets);

//mysqli_free_result($salespersons);
?>