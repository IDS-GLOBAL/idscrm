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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "customerUpdate")) {
  $updateSQL =  sprintf("UPDATE customers SET customer_frmsource=%s, customer_dayhunt=%s, customer_dealer_id=%s, customer_sales_person_id=%s, customer_sales_person2_id=%s, customer_fnimgr_id=%s, customer_slsmgr_id=%s, customer_vehicles_id=%s, customer_token_id=%s, customer_status=%s, customer_title=%s, customer_fname=%s, customer_mname=%s, customer_lname=%s, customer_suffix=%s, customer_sex=%s, customer_email=%s, customer_dlstate=%s, customer_dlno=%s, customer_dlexpdate=%s, customer_dob=%s, customer_ssn=%s, customer_perf_commun=%s, customer_lead_temperature=%s, customer_phoneno=%s, customer_cellphone=%s, customer_date_td=%s, customer_hour_td=%s, customer_min_td=%s, customer_ampm_td=%s, customer_home_addr1=%s, customer_home_addr2=%s, customer_home_city=%s, customer_home_state=%s, customer_home_zip=%s, customer_home_county=%s, customer_home_live_years=%s, customer_home_live_months=%s, customer_employer_name=%s, customer_employer_addr1=%s, customer_employer_addr2=%s, customer_employer_city=%s, customer_employer_state=%s, customer_employer_zip=%s, customer_employer_phone=%s, customer_supervisors_name=%s, customer_supervisors_phone=%s, customer_supervisors_phone_ext=%s, customer_employer_hiredate=%s, customer_employer_years=%s, customer_employer_months=%s, customer_gross_income=%s, customer_income_frequency=%s, titleconjucation=%s, customer2_relationship=%s, customer2_title=%s, customer2_fname=%s, customer2_mname=%s, customer2_lname=%s, customer2_suffix=%s, customer2_sex=%s, customer2_email=%s, customer2_dlstate=%s, customer2_dlno=%s, customer2_dlexpdate=%s, customer2_dob=%s, customer2_ssn=%s, customer2_phoneno=%s, customer2_cellphone=%s, customer2_home_addr1=%s, customer2_home_addr2=%s, customer2_home_city=%s, customer2_home_state=%s, customer2_home_zip=%s, customer2_home_county=%s, customer2_home_live_years=%s, customer2_home_live_months=%s, customer2_employer_name=%s, customer2_employer_addr1=%s, customer2_employer_addr2=%s, customer2_employer_city=%s, customer2_employer_state=%s, customer2_employer_zip=%s, customer2_employer_phone=%s, customer2_supervisors_name=%s, customer2_supervisors_phone=%s, customer2_supervisors_phone_ext=%s, customer2_employer_hiredate=%s, customer2_employer_years=%s, customer2_employer_months=%s, customer2_gross_income=%s, customer2_income_frequency=%s WHERE customer_id=%s",
                       GetSQLValueString($_POST['customer_frmsource'], "text"),
                       GetSQLValueString($_POST['customer_dayhunt'], "int"),
                       GetSQLValueString($_POST['customer_dealer_id'], "int"),
                       GetSQLValueString($_POST['customer_sales_person_id'], "int"),
                       GetSQLValueString($_POST['customer_sales_person2_id'], "int"),
                       GetSQLValueString($_POST['customer_fnimgr_id'], "int"),
                       GetSQLValueString($_POST['customer_slsmgr_id'], "int"),
                       GetSQLValueString($_POST['customer_vehicles_id'], "int"),
                       GetSQLValueString($_POST['customer_token_id'], "text"),
                       GetSQLValueString($_POST['customer_status'], "text"),
                       GetSQLValueString($_POST['customer_title'], "text"),
                       GetSQLValueString($_POST['customer_fname'], "text"),
                       GetSQLValueString($_POST['customer_mname'], "text"),
                       GetSQLValueString($_POST['customer_lname'], "text"),
                       GetSQLValueString($_POST['customer_suffix'], "text"),
                       GetSQLValueString($_POST['customer_sex'], "text"),
                       GetSQLValueString($_POST['customer_email'], "text"),
                       GetSQLValueString($_POST['customer_dlstate'], "text"),
                       GetSQLValueString($_POST['customer_dlno'], "text"),
                       GetSQLValueString($_POST['customer_dlexpdate'], "text"),
                       GetSQLValueString($_POST['customer_dob'], "text"),
                       GetSQLValueString($_POST['customer_ssn'], "int"),
                       GetSQLValueString($_POST['customer_perf_commun'], "text"),
                       GetSQLValueString($_POST['customer_lead_temperature'], "text"),
                       GetSQLValueString($_POST['customer_phoneno'], "text"),
                       GetSQLValueString($_POST['customer_cellphone'], "text"),
                       GetSQLValueString($_POST['customer_date_td'], "text"),
                       GetSQLValueString($_POST['customer_hour_td'], "text"),
                       GetSQLValueString($_POST['customer_min_td'], "text"),
                       GetSQLValueString($_POST['customer_ampm_td'], "text"),
                       GetSQLValueString($_POST['customer_home_addr1'], "text"),
                       GetSQLValueString($_POST['customer_home_addr2'], "text"),
                       GetSQLValueString($_POST['customer_home_city'], "text"),
                       GetSQLValueString($_POST['customer_home_state'], "text"),
                       GetSQLValueString($_POST['customer_home_zip'], "text"),
                       GetSQLValueString($_POST['customer_home_county'], "text"),
                       GetSQLValueString($_POST['customer_home_live_years'], "text"),
                       GetSQLValueString($_POST['customer_home_live_months'], "text"),
                       GetSQLValueString($_POST['customer_employer_name'], "text"),
                       GetSQLValueString($_POST['customer_employer_addr1'], "int"),
                       GetSQLValueString($_POST['customer_employer_addr2'], "int"),
                       GetSQLValueString($_POST['customer_employer_city'], "text"),
                       GetSQLValueString($_POST['customer_employer_state'], "text"),
                       GetSQLValueString($_POST['customer_employer_zip'], "text"),
                       GetSQLValueString($_POST['customer_employer_phone'], "text"),
                       GetSQLValueString($_POST['customer_supervisors_name'], "text"),
                       GetSQLValueString($_POST['customer_supervisors_phone'], "text"),
                       GetSQLValueString($_POST['customer_supervisors_phone_ext'], "text"),
                       GetSQLValueString($_POST['customer_employer_hiredate'], "text"),
                       GetSQLValueString($_POST['customer_employer_years'], "text"),
                       GetSQLValueString($_POST['customer_employer_months'], "text"),
                       GetSQLValueString($_POST['customer_gross_income'], "text"),
                       GetSQLValueString($_POST['customer_income_frequency'], "text"),
                       GetSQLValueString($_POST['titleconjucation'], "text"),
                       GetSQLValueString($_POST['customer2_relationship'], "text"),
                       GetSQLValueString($_POST['customer2_title'], "text"),
                       GetSQLValueString($_POST['customer2_fname'], "text"),
                       GetSQLValueString($_POST['customer2_mname'], "text"),
                       GetSQLValueString($_POST['customer2_lname'], "text"),
                       GetSQLValueString($_POST['customer2_suffix'], "text"),
                       GetSQLValueString($_POST['customer2_sex'], "text"),
                       GetSQLValueString($_POST['customer2_email'], "text"),
                       GetSQLValueString($_POST['customer2_dlstate'], "text"),
                       GetSQLValueString($_POST['customer2_dlno'], "text"),
                       GetSQLValueString($_POST['customer2_dlexpdate'], "text"),
                       GetSQLValueString($_POST['customer2_dob'], "text"),
                       GetSQLValueString($_POST['customer2_ssn'], "int"),
                       GetSQLValueString($_POST['customer2_phoneno'], "text"),
                       GetSQLValueString($_POST['customer2_cellphone'], "text"),
                       GetSQLValueString($_POST['customer2_home_addr1'], "text"),
                       GetSQLValueString($_POST['customer2_home_addr2'], "text"),
                       GetSQLValueString($_POST['customer2_home_city'], "text"),
                       GetSQLValueString($_POST['customer2_home_state'], "text"),
                       GetSQLValueString($_POST['customer2_home_zip'], "text"),
                       GetSQLValueString($_POST['customer2_home_county'], "text"),
                       GetSQLValueString($_POST['customer2_home_live_years'], "text"),
                       GetSQLValueString($_POST['customer2_home_live_months'], "text"),
                       GetSQLValueString($_POST['customer2_employer_name'], "text"),
                       GetSQLValueString($_POST['customer2_employer_addr1'], "text"),
                       GetSQLValueString($_POST['customer2_employer_addr2'], "text"),
                       GetSQLValueString($_POST['customer2_employer_city'], "text"),
                       GetSQLValueString($_POST['customer2_employer_state'], "text"),
                       GetSQLValueString($_POST['customer2_employer_zip'], "text"),
                       GetSQLValueString($_POST['customer2_employer_phone'], "text"),
                       GetSQLValueString($_POST['customer2_supervisors_name'], "text"),
                       GetSQLValueString($_POST['customer2_supervisors_phone'], "text"),
                       GetSQLValueString($_POST['customer2_supervisors_phone_ext'], "text"),
                       GetSQLValueString($_POST['customer2_employer_hiredate'], "text"),
                       GetSQLValueString($_POST['customer2_employer_years'], "text"),
                       GetSQLValueString($_POST['customer2_employer_months'], "text"),
                       GetSQLValueString($_POST['customer2_gross_income'], "text"),
                       GetSQLValueString($_POST['customer2_income_frequency'], "text"),
                       GetSQLValueString($_POST['customer_id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);
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
$query_findCustomer =  sprintf("SELECT * FROM customers WHERE customer_id = %s", GetSQLValueString($colname_findCustomer, "int"));
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

?>
<?php

$lastno = $row_lastCustomerNo['customer_no'];

if(!$lastno){
	$lastno = 1000;
}else{
	$lastno = ($lastno + 1);
}



include('../Libary/function_Datetime_Now.php');

include('../Libary/token-generator.php');
	 
include('../Libary/functionSalesPersonNotification.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Update</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->

	<script type="text/javascript" src="../dealer/js/jquery-1.9.1.js"></script>        

<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script language="JavaScript" SRC="calendar/calendar.js"></script>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
 <script language="JavaScript">

	var cal = new CalendarPopup();

</script>

	<script type="text/javascript">
	$(function() {
		$('#datepicker').datepicker({
			yearRange: "2013:2020",									
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true
		});
	});

	$(function() {
	   //var minDate = $( "#datepicker2" ).datepicker(  "option", "minDate", new Date(2007, 1 - 1, 1) );
		$('#datepicker2').datepicker({
			yearRange: "1913:1996",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true,
			showButtonPanel: true
			
		});
	});
	
		$(function() {
		$('#datepicker3').datepicker({
			yearRange: "2013:2020",									 
			changeMonth: true,
			numberOfMonths: 1,			
			changeYear: true,
			showButtonPanel: true
		});
	});

	$(function() {
		$('#datepicker4').datepicker({
			yearRange: "1913:1995",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true,
			showButtonPanel: true			
		});
	});

	$(function() {
	   //var minDate = $( "#datepicker2" ).datepicker(  "option", "minDate", new Date(2007, 1 - 1, 1) );
		$('#datepicker4').datepicker({
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true
		});
	});

	$(function() {
	   //var minDate = $( "#datepicker2" ).datepicker(  "option", "minDate", new Date(2007, 1 - 1, 1) );


		$('#datepicker5').datepicker({
			yearRange: "1913:2013",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true
			//$( "#datepicker5" ).datepicker({ appendText: "(yyyy-mm-dd)" });

		});
	});
	
		$(function() {
	   //var minDate = $( "#datepicker2" ).datepicker(  "option", "minDate", new Date(2007, 1 - 1, 1) );
		$('#datepicker6').datepicker({
			yearRange: "1940:2013",									 
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true
		});
	});

	$(function() {
	   //var minDate = $( "#datepicker2" ).datepicker(  "option", "minDate", new Date(2007, 1 - 1, 1) );
		$('#datepicker7').datepicker({
			yearRange: "2013:2014",									 
			changeMonth: true,
			numberOfMonths: 3,
			changeYear: true
		});
	});


</script>


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


<script>
function moveActivity(){
	
 var perferredMethod = document.form_bookappt.perferredMethod.value;

	
 document.customerUpdate.customer_perf_commun.value = perferredMethod;

 var hunt =  document.form_bookappt.customer_dayhunt.value;

 	//alert(hunt);
	if(!hunt){	
		return false;
	}

 document.customerUpdate.customer_dayhunt.value = hunt;
 
 
 //document.customerUpdate.customer_hour_td.value
 alert('If Subscribed! Emails Will Be Sent For ' + hunt + ' Days.');

}

function appointmentT() {

			var aDate = document.form_bookappt.appointmentDate.value;
			//alert('Hello');
			var Hour = document.form_bookappt.thehour.value;
			
			var Minute = document.form_bookappt.theminute.value;

			document.customerUpdate.customer_date_td.value = aDate;

			document.customerUpdate.customer_hour_td.value = Hour;
			
			document.customerUpdate.customer_min_td.value = Minute;

			if(!aDate){
			alert('Please Select Date For This Appointment');
			return false;
			}
			if(!Hour){
			alert('Please Select Hour Time For This Appointment');			
			return false;
			}
			if(!Minute){
			alert('Please Select Minute Time For This Appointment');
			return false;
			}
			else{
			alert('Congratulations! You Just Booked An Appointment');
			}

}

function setThisvehicle() {


			var vID = document.form_bookappt.thisvehicleID.value;
			
			document.customerUpdate.customer_vehicles_id.value = vID;
}

</script>

<script type="text/javascript"><!-- This Form Opens A New Window

  function openWin(page){

    var w = window.open(page, "", "menubar=no,history=no,resizable=yes,scrollbars=yes,toolbar=no,width=750,height=700");

  }

  function openVWin(page){

    var w = window.open(page, "", "menubar=no,history=no,resizable=yes,scrollbars=yes,toolbar=no,width=800,height=600");

  }

  //-->

</script>

<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_addnoteCustomerdetails.php?q="+str,true);
xmlhttp.send();
}


</script>
<script>

function showVehicle(str)

{

if (str=="")

  {

  document.getElementById("txtvPhotoHint").innerHTML="";

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtvPhotoHint").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","ajaxEnviro/ajax_getvehicleleadphoto.php?cust_vehicle_id="+str,true);
setThisvehicle();
xmlhttp.send();
}

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

    
    <div class="block_gr vertsortable">

<div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3> Add A New Customer <span>With Customers You Can Book Appointments, And Work Deals.</span></h3>
          <div class="gadget_content">
            <form action="<?php echo $editFormAction; ?>" name="customerUpdate" method="POST" id="customerUpdate" class="form_example">
            <ol>
            
                          <li>


<input name="customer_id" type="hidden" id="customer_id" value="<?php echo $row_findCustomer['customer_id']; ?>" />
<input name="customer_frmsource" type="hidden" id="customer_frmsource" value="<?php echo $row_findCustomer['customer_frmsource']; ?>" />
<input name="customer_date_td" type="hidden" value="<?php echo $row_findCustomer['customer_date_td']; ?>" />
<input name="customer_dealer_id" type="hidden" value="<?php echo $did; ?>" />
<input name="customer_hour_td" type="hidden" value="<?php echo $row_findCustomer['customer_hour_td']; ?>" />
<input name="customer_min_td" type="hidden" value="" />
<input name="customer_ampm_td" type="hidden" value="" />
<input name="customer_dayhunt" type="hidden" value="" />
<input name="customer_perf_commun" type="hidden" value="" />


<input name="customer_vehicles_id" type="hidden" value="" />
<input name="customer_token_id" type="hidden" value="<?php echo $tkey; ?>" />
<input name="customer_status" type="hidden" id="customer_status" value="Pending" />
                          
                <label for="multiply"><strong>Set Your Managers On This Customer</strong> (Sales People, &amp; Managers To Work A Deal)</label>
                <select id="customer_sales_person_id" name="customer_sales_person_id">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_sales_person_id']))) {echo "selected=\"selected\"";} ?>>Select SalesPerson</option>
                  <?php
do {  
?>
<option value="<?php echo $row_salespersons['salesperson_id']?>"<?php if (!(strcmp($row_salespersons['salesperson_id'], $row_findCustomer['customer_sales_person_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_salespersons['salesperson_firstname']?> <?php echo $row_salespersons['salesperson_lastname']?></option>
                  <?php
} while ($row_salespersons = mysqli_fetch_assoc($salespersons));
  $rows = mysqli_num_rows($salespersons);
  if($rows > 0) {
      mysqli_data_seek($salespersons, 0);
	  $row_salespersons = mysqli_fetch_assoc($salespersons);
  }
?>
                </select>
                <select id="customer_sales_person2_id" name="customer_sales_person2_id">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_sales_person2_id']))) {echo "selected=\"selected\"";} ?>>Select Sales Person</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_sales_person['salesperson_id']?>"<?php if (!(strcmp($row_sales_person['salesperson_id'], $row_findCustomer['customer_sales_person2_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_sales_person['salesperson_firstname']?> <?php echo $row_salespersons['salesperson_lastname']?></option>
<?php
} while ($row_sales_person = mysqli_fetch_assoc($sales_person));
  $rows = mysqli_num_rows($sales_person);
  if($rows > 0) {
      mysqli_data_seek($sales_person, 0);
	  $row_sales_person = mysqli_fetch_assoc($sales_person);
  }
?>
                </select>
<select name="customer_slsmgr_id" class="ui-sortable-placeholder" id="customer_slsmgr_id">
  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_slsmgr_id']))) {echo "selected=\"selected\"";} ?>>Select One</option>
  <?php
do {  
?>
  <option value="<?php echo $row_Managers['manager_id']?>"<?php if (!(strcmp($row_Managers['manager_id'], $row_findCustomer['customer_slsmgr_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Managers['manager_firstname']?> <?php echo $row_Managers['manager_lastname']?></option>
  <?php
} while ($row_Managers = mysqli_fetch_assoc($Managers));
  $rows = mysqli_num_rows($Managers);
  if($rows > 0) {
      mysqli_data_seek($Managers, 0);
	  $row_Managers = mysqli_fetch_assoc($Managers);
  }
?>
                            </select>

                <select name="customer_fnimgr_id" class="ui-sortable-placeholder" id="customer_fnimgr_id">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_fnimgr_id']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Managers['manager_id']?>"<?php if (!(strcmp($row_Managers['manager_id'], $row_findCustomer['customer_fnimgr_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Managers['manager_firstname']?> <?php echo $row_Managers['manager_lastname']?></option>
                  <?php
} while ($row_Managers = mysqli_fetch_assoc($Managers));
  $rows = mysqli_num_rows($Managers);
  if($rows > 0) {
      mysqli_data_seek($Managers, 0);
	  $row_Managers = mysqli_fetch_assoc($Managers);
  }
?>
                            </select>
            <select name="customer_lead_temperature" id="customer_lead_temperature">
              <option value="Hot" <?php if (!(strcmp("Hot", $row_findCustomer['customer_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Hot</option>
              <option value="Warm" <?php if (!(strcmp("Warm", $row_findCustomer['customer_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Warm</option>
              <option value="Cold" <?php if (!(strcmp("Cold", $row_findCustomer['customer_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Cold</option>
            </select>
                                  
                <div class="clr"></div>
                <label for="customer_sales_person_id" class="smallselect">Sales Person 1</label>                
                <label for="customer_sales_person2_id" class="small">Sales Person 2</label>                
                <label for="customer_slsmgr_id" class="smallselect">Sales Manager</label>
                <label for="customer_fnimgr_id" class="smallmedi">Finance Manager</label>
                <label for="customer_lead_temperature" class="smallmini">Customer Status</label>            
                <div class="clr"></div>
              </li>

            
            
            
            
            
            
            
      
      
      
      
      
      
      
      
      
      
            
            
              <li>
                <label for="multiply"><strong>Customer Information</strong> (small input form example)</label>
                <input id="multiply" name="multiply" type="hidden" value="" />

<select name="customer_title" class="ui-state-default" id="customer_title">
								          <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_title']))) {echo "selected=\"selected\"";} ?>>Select One</option>
								          <option value="Mr." <?php if (!(strcmp("Mr.", $row_findCustomer['customer_title']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
								          <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_findCustomer['customer_title']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
								          <option value="Ms." <?php if (!(strcmp("Ms.", $row_findCustomer['customer_title']))) {echo "selected=\"selected\"";} ?>>Ms.</option>
								          <option value="Miss." <?php if (!(strcmp("Miss.", $row_findCustomer['customer_title']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
								          <option value="Dr." <?php if (!(strcmp("Dr.", $row_findCustomer['customer_title']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
	              </select>                
                <input name="customer_fname" class="text small" id="customer_fname" value="<?php echo $row_findCustomer['customer_fname']; ?>" />
                <input name="customer_mname" class="text tiny" id="customer_mname" value="<?php echo $row_findCustomer['customer_mname']; ?>" />
<input name="customer_lname" class="text medium" id="customer_lname" value="<?php echo $row_findCustomer['customer_lname']; ?>" />
                
								        <select name="customer_suffix" id="customer_suffix" class="ui-state-default">
								          <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>Select</option>
								          <option value="JR" <?php if (!(strcmp("JR", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>JR</option>
								          <option value="SR" <?php if (!(strcmp("SR", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>SR</option>
								          <option value="I" <?php if (!(strcmp("I", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>I</option>
								          <option value="II" <?php if (!(strcmp("II", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>II</option>
								          <option value="III" <?php if (!(strcmp("III", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>III</option>
								          <option value="IV" <?php if (!(strcmp("IV", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>IV</option>
								          <option value="V" <?php if (!(strcmp("V", $row_findCustomer['customer_suffix']))) {echo "selected=\"selected\"";} ?>>V</option>
	              </select>
                
                <div class="clr"></div>
                <label for="customer_fname" class="smallmedium">Title Name</label>                                
                <label for="customer_fname" class="small">First Name</label>                
                <label for="customer_mname" class="smallmini">M.</label>                
                <label for="customer_lname" class="smallmedium">Last Name</label>
                <label for="customer_lname" class="smallmedium">Suffix</label>                
                
                <div class="clr"></div>
              </li>





              <li>
                <label for="multiply"><strong>Date Of Birth &amp; SSN</strong></label>
                
                <input name="customer_dob" class="text small" id="datepicker2" value="<?php echo $row_findCustomer['customer_dob']; ?>" />
                <input name="customer_ssn" type="password" class="text small" id="customer_ssn" value="<?php echo $row_findCustomer['customer_ssn']; ?>" />
                
                <select name="customer_sex" id="customer_sex"> 
<option value="" <?php if (!(strcmp("", $row_findCustomer['customer_sex']))) {echo "selected=\"selected\"";} ?>>Select One</option>
								          <option value="M" <?php if (!(strcmp("M", $row_findCustomer['customer_sex']))) {echo "selected=\"selected\"";} ?>>Male</option>
								          <option value="F" <?php if (!(strcmp("F", $row_findCustomer['customer_sex']))) {echo "selected=\"selected\"";} ?>>Female</option>
							       </select>
                <div class="clr"></div>
                <label for="customer_dob" class="small">DOB</label>                
                <label for="customer_ssn" class="small">SSN</label>                
                <label for="customer_sex" class="small">SEX</label>                

                <div class="clr"></div>
              </li>






















			  <li>
                <label><strong>Email:</strong></label> 
              
                <input name="customer_email" class="text large" id="customer_email" value="<?php echo $row_findCustomer['customer_email']; ?>" />
                
                               
                                   <div class="clr"></div>

                

              </li>




<li>
                <label for="multiply"><strong>Address 1</strong></label>
                <input name="customer_home_addr1" class="text medium" id="customer_home_addr1" value="<?php echo $row_findCustomer['customer_home_addr1']; ?>" />
<input name="customer_dlno" class="text small" id="customer_dlno" value="<?php echo $row_findCustomer['customer_dlno']; ?>" />

								        <select name="customer_dlstate" id="customer_dlstate">
								          <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_dlstate']))) {echo "selected=\"selected\"";} ?>>Select State</option>
								          <?php
do {  
?>
								          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findCustomer['customer_dlstate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
								          <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
							            </select>
                
                <input name="customer_dlexpdate" class="text small" id="datepicker" value="<?php echo $row_findCustomer['customer_dlexpdate']; ?>" />
                <div class="clr"></div>
                <label for="customer_fname" class="smallmediumwider">(Ex. 1122 Street Name )</label>                
                <label for="customer_mname" class="small">DL No</label>                
                <label for="customer_lname" class="smallselect">DL State</label>
                <label for="customer_lname" class="small">Exp. Date</label>
                <div class="clr"></div>
              </li>





              <li>
                <label for="customer_home_addr2"><strong>Address 2:</strong> </label>
                <input name="customer_home_addr2" class="text medi" id="customer_home_addr2" value="<?php echo $row_findCustomer['customer_home_addr2']; ?>" />

<label class="floatright">                                   
<select name="customer_home_live_years">
								              <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_home_live_years']))) {echo "selected=\"selected\"";} ?>>Select One</option>
								              <?php
do {  
?>
								              <option value="<?php echo $row_year_options['year_value']?>"<?php if (!(strcmp($row_year_options['year_value'], $row_findCustomer['customer_home_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_year_options['year_name']?></option>
								              <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
                                            </select>

</label>
<label class="floatright">

Live Months: <select name="customer_home_live_months">
								              <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_home_live_months']))) {echo "selected=\"selected\"";} ?>>Select One</option>
							                <?php
do {  
?>
							                <option value="<?php echo $row_month_options['month_value']?>"<?php if (!(strcmp($row_month_options['month_value'], $row_findCustomer['customer_home_live_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_month_options['month_name']?></option>
							                <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
								            </select>
                                     </label>
                                   <div class="clr"></div>                
              </li>



              <li>
                <label for="multiply"><strong>City State &amp; Zip:</strong> (small input form example)</label>
                <input name="customer_home_city" class="text small" id="customer_home_city" value="<?php echo $row_findCustomer['customer_home_city']; ?>" />
                
                <select id="customer_home_state" name="customer_home_state">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_home_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findCustomer['customer_home_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                </select>
                
                <input name="customer_home_zip" class="text small" id="customer_home_zip" value="<?php echo $row_findCustomer['customer_home_zip']; ?>" />
                <input name="customer_home_county" class="text small" id="customer_home_county" value="<?php echo $row_findCustomer['customer_home_county']; ?>" />                
                <div class="clr"></div>
                <label for="customer_home_city" class="small">City</label>                
                <label for="customer_home_state" class="small">State</label>                
                <label for="customer_home_zip" class="small">Zip</label>
                <label for="customer_home_county" class="small">County</label>                
                <div class="clr"></div>
              </li>




              <li>
                <label for="multiply"><strong>Phone &amp; Income Verfication Info</strong> </label>
                <input name="customer_phoneno" class="text small" id="customer_phoneno" value="<?php echo $row_findCustomer['customer_phoneno']; ?>" />
                <input name="customer_cellphone" class="text small" id="customer_cellphone" value="<?php echo $row_findCustomer['customer_cellphone']; ?>" />
                <input name="customer_employer_phone" class="text small" id="customer_employer_phone" value="<?php echo $row_findCustomer['customer_employer_phone']; ?>" />
                <input name="customer_gross_income" class="text small" id="customer_gross_income" value="<?php echo $row_findCustomer['customer_gross_income']; ?>" />                
                <select id="customer_income_frequency" name="customer_income_frequency">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_income_frequency']))) {echo "selected=\"selected\"";} ?>>Select PaySchedule</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_findCustomer['customer_income_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                  <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
                </select>                
                <div class="clr"></div>
                <label for="customer_fname" class="small">Home Phone</label>                
                <label for="customer_mname" class="small">Cell Phone</label>                
                <label for="customer_lname" class="small">Work Phone</label>
                <label for="customer_lname" class="small">Gross Income</label>
                <label for="customer_lname" class="small">Pay Schedule</label>                
                <div class="clr"></div>
              </li>



              <li>
                <label for="multiply"><strong>Employer Name &amp; Verfication Section</strong></label>
                <input name="customer_employer_name" class="text small" id="customer_employer_name" value="<?php echo $row_findCustomer['customer_employer_name']; ?>" />
                <input name="customer_employer_addr1" class="text small" id="customer_employer_addr1" value="<?php echo $row_findCustomer['customer_employer_addr1']; ?>" />
                <input name="customer_employer_addr2" class="text small" id="customer_employer_addr2" value="<?php echo $row_findCustomer['customer_employer_addr2']; ?>" />
                <input name="customer_employer_hiredate" class="text small" id="datepicker5" value="<?php echo $row_findCustomer['customer_employer_hiredate']; ?>" />                
                <div class="clr"></div>
                <label for="customer_employer_name" class="small">Employer Name</label>                
                <label for="customer_employer_addr1" class="small">Employer Address 1</label>                
                <label for="customer_employer_addr2" class="small">Employer Address 2</label>
                <label for="customer_employer_hiredate" class="small">Date Of Hire</label>
                <div class="clr"></div>
              </li>

              <li>
                <label for="multiply"><strong>Employer Supervisors Name &amp; Verfication Section</strong></label>
                <input name="customer_supervisors_name" class="text small" id="customer_supervisors_name" value="<?php echo $row_findCustomer['customer_supervisors_name']; ?>" />
                <input name="customer_supervisors_phone" class="text small" id="customer_supervisors_phone" value="<?php echo $row_findCustomer['customer_supervisors_phone']; ?>" />
                <input name="customer_supervisors_phone_ext" class="text small" id="customer_supervisors_phone_ext" value="<?php echo $row_findCustomer['customer_supervisors_phone_ext']; ?>" />
                <div class="clr"></div>
                <label for="customer_supervisors_phone_ext" class="small">Supervisors Name</label>                

                <label for="customer_supervisors_phone" class="small">Employer Phone</label>
                <label for="customer_supervisors_phone_ext" class="small">Extension</label>
                <div class="clr"></div>
              </li>



              <li>
                <label for="customer_employer_city"><strong>Employer City &amp; Sttate Information:</strong></label>
                <input name="customer_employer_city" class="text small" id="customer_employer_city" value="<?php echo $row_findCustomer['customer_employer_city']; ?>" />
                <select id="customer_employer_state" name="customer_employer_state">
                  <option selected="selected" value="" <?php if (!(strcmp("", $row_findCustomer['customer_employer_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findCustomer['customer_employer_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                </select>
                <input name="customer_employer_zip" class="text small" id="customer_employer_zip" value="<?php echo $row_findCustomer['customer_employer_zip']; ?>" />                
                <select id="customer_employer_years" name="customer_employer_years">
                  <option selected="selected" value="" <?php if (!(strcmp("", $row_findCustomer['customer_employer_years']))) {echo "selected=\"selected\"";} ?>>Work Years</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_year_options['year_value']?>"<?php if (!(strcmp($row_year_options['year_value'], $row_findCustomer['customer_employer_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_year_options['year_name']?></option>
                  <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
                </select>
                <select id="customer_employer_months" name="customer_employer_months">
                  <option selected="selected" value="" <?php if (!(strcmp("", $row_findCustomer['customer_employer_months']))) {echo "selected=\"selected\"";} ?>>Work Months</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_month_options['month_value']?>"<?php if (!(strcmp($row_month_options['month_value'], $row_findCustomer['customer_employer_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_month_options['month_name']?></option>
                  <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
                </select>
                
                <div class="clr"></div>
                <label for="customer_employer_city" class="small">City</label>                
                <label for="customer_employer_state" class="small">State:</label>                
                <label for="customer_employer_zip" class="small">Zip:</label>                
                <label for="customer_employer_years" class="small">Work Years:</label>\
                <label for="customer_employer_months" class="small">Work Months:</label>                                        
                <div class="clr"></div>
              </li>




























              <li>
                <label for="multiply"><strong>Save | Title Info &amp; </strong> (Co Buyer - Relationship)</label>
                <input id="submit" name="submit" type="submit" value="Save & Process" />
                <input id="multiply2" name="multiply2" type="button" value="Add Co-Buyer" onClick="javascript:hideshow(document.getElementById('adiv4'))" />
                <input name="titleconjucation" class="text small" id="titleconjucation" value="<?php echo $row_findCustomer['titleconjucation']; ?>" placeholder="AND/OR" />
                <input name="customer2_relationship" class="text small" id="customer2_relationship" value="<?php echo $row_findCustomer['customer2_relationship']; ?>" placeholder="EX. Spouse" />                
                <div class="clr"></div>
                <label for="customer_fname" class="small">Save</label>                                
                <label for="customer_fname" class="small">Add Co Buyer</label>                
                <label for="titleconjucation" class="small">Conjunction</label>                
                <label for="customer2_relationship" class="small">Relationship</label>                
                <div class="clr"></div>
              </li>
              
              








<a href="javascript:hideshow(document.getElementById('adiv4'))">Co Buyer Information/Co-Applicant</a>


<div id="adiv4" style="display: block;">


            
            
            
            
            
            
            
      
      
      
      
      
      
      
      
      
      
            
            
              <li>
                <label for="multiply"><strong>Customer Information</strong> (small input form example)</label>

<select name="customer2_title" class="ui-state-default" id="customer2_title">
  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_title']))) {echo "selected=\"selected\"";} ?>>Select One</option>
  <option value="Mr." <?php if (!(strcmp("Mr.", $row_findCustomer['customer2_title']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
  <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_findCustomer['customer2_title']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
  <option value="Ms." <?php if (!(strcmp("Ms.", $row_findCustomer['customer2_title']))) {echo "selected=\"selected\"";} ?>>Ms.</option>
  <option value="Miss." <?php if (!(strcmp("Miss.", $row_findCustomer['customer2_title']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
  <option value="Dr." <?php if (!(strcmp("Dr.", $row_findCustomer['customer2_title']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
	              </select>                
                <input name="customer2_fname" class="text small" id="customer2_fname" value="<?php echo $row_findCustomer['customer2_fname']; ?>" />
                <input name="customer2_mname" class="text tiny" id="customer2_mname" value="<?php echo $row_findCustomer['customer2_mname']; ?>" />
                <input name="customer2_lname" class="text medium" id="customer2_lname" value="<?php echo $row_findCustomer['customer2_lname']; ?>" />
                
								        <select name="customer2_suffix" class="ui-state-default">
								          <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>Select</option>
								          <option value="JR" <?php if (!(strcmp("JR", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>JR</option>
								          <option value="SR" <?php if (!(strcmp("SR", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>SR</option>
								          <option value="I" <?php if (!(strcmp("I", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>I</option>
								          <option value="II" <?php if (!(strcmp("II", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>II</option>
								          <option value="III" <?php if (!(strcmp("III", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>III</option>
								          <option value="IV" <?php if (!(strcmp("IV", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>IV</option>
								          <option value="V" <?php if (!(strcmp("V", $row_findCustomer['customer2_suffix']))) {echo "selected=\"selected\"";} ?>>V</option>
	              </select>
                
                <div class="clr"></div>
                <label for="customer2_fname" class="smallmedium">Title Name</label>                                
                <label for="customer2_fname" class="small">First Name</label>                
                <label for="customer2_mname" class="smallmini">M.</label>                
                <label for="customer2_lname" class="smallmedium">Last Name</label>
                <label for="customer2_lname" class="smallmedium">Suffix</label>                
                
                <div class="clr"></div>
              </li>





              <li>
                <label for="customer2_dob"><strong>Date Of Birth &amp; SSN</strong></label>
                
                <input name="customer2_dob" class="text small" id="datepicker4" value="<?php echo $row_findCustomer['customer2_dob']; ?>" />
                <input name="customer2_ssn" class="text small" id="customer2_ssn" value="<?php echo $row_findCustomer['customer2_ssn']; ?>" />
                
                <select name="customer2_sex" id="customer2_sex">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_sex']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                  <option value="M" <?php if (!(strcmp("M", $row_findCustomer['customer2_sex']))) {echo "selected=\"selected\"";} ?>>Male</option>
                  <option value="F" <?php if (!(strcmp("F", $row_findCustomer['customer2_sex']))) {echo "selected=\"selected\"";} ?>>Female</option>
							       </select>
                <div class="clr"></div>
                <label for="customer2_dob" class="small">DOB</label>                
                <label for="customer2_ssn" class="small">SSN</label>                
                <label for="customer2_sex" class="small">SEX</label>                

                <div class="clr"></div>
              </li>






















			  <li>
                <label><strong>Email:</strong></label> 
              
                <input name="customer2_email" class="text large" id="customer2_email" value="<?php echo $row_findCustomer['customer_email']; ?>" />
                
                               
                                   <div class="clr"></div>

                

              </li>




<li>
                <label for="multiply"><strong>Address 1</strong></label>
                <input name="customer2_home_addr1" class="text medium" id="customer2_home_addr1" value="<?php echo $row_findCustomer['customer2_home_addr1']; ?>" />
                <input name="customer2_dlno" class="text small" id="customer2_dlno" value="<?php echo $row_findCustomer['customer2_dlno']; ?>" />

								        <select name="customer2_dlstate" id="customer2_dlstate">
								          <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_dlstate']))) {echo "selected=\"selected\"";} ?>>Select State</option>
								          <?php
do {  
?>
								          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findCustomer['customer2_dlstate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
								          <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
							            </select>
                
                <input name="customer2_dlexpdate" class="text small" id="datepicker3" value="<?php echo $row_findCustomer['customer2_dlexpdate']; ?>" />
                <div class="clr"></div>
                <label for="customer2_home_addr1" class="smallmediumwider">(Ex. 1122 Street Name )</label>                
                <label for="customer2_dlno" class="small">DL No</label>                
                <label for="customer2_dlstate" class="smallselect">DL State</label>
                <label for="customer2_dlexpdate" class="small">Exp. Date</label>
                <div class="clr"></div>
              </li>





              <li>
                <label for="customer2_home_addr2"><strong>Address 2:</strong> </label>
                <input name="customer2_home_addr2" class="text medi" id="customer2_home_addr2" value="<?php echo $row_findCustomer['customer2_home_addr2']; ?>" />

<label class="floatright">                                   
Live Years:                <select name="customer2_home_live_years">
  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_home_live_years']))) {echo "selected=\"selected\"";} ?>>Select One</option>
  <?php
do {  
?>
  <option value="<?php echo $row_year_options['year_value']?>"<?php if (!(strcmp($row_year_options['year_value'], $row_findCustomer['customer2_home_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_year_options['year_name']?></option>
  <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
                                            </select>

</label>
<label class="floatright">

Live Months: <select name="customer2_home_live_months">
  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_home_live_months']))) {echo "selected=\"selected\"";} ?>>Select One</option>
  <?php
do {  
?>
  <option value="<?php echo $row_month_options['month_value']?>"<?php if (!(strcmp($row_month_options['month_value'], $row_findCustomer['customer2_home_live_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_month_options['month_name']?></option>
  <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
								            </select>
                                     </label>
                                   <div class="clr"></div>                
              </li>



              <li>
                <label for="multiply"><strong>City State &amp; Zip:</strong> (small input form example)</label>
                <input name="customer2_home_city" class="text small" id="customer2_home_city" value="<?php echo $row_findCustomer['customer2_home_city']; ?>" />
                
                <select id="customer2_home_state" name="customer2_home_state">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_home_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findCustomer['customer2_home_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                </select>
                
   
                <input name="customer2_home_zip" class="text small" id="customer2_home_zip" value="<?php echo $row_findCustomer['customer2_home_zip']; ?>" />
                <input name="customer2_home_county" class="text small" id="customer2_home_county" value="<?php echo $row_findCustomer['customer2_home_county']; ?>" />                
                <div class="clr"></div>
                <label for="customer2_home_city" class="small">City</label>                
                <label for="customer2_home_state" class="smallmedium">State</label>                
                <label for="customer2_home_zip" class="small">Zip</label>
                <label for="customer2_home_county" class="small">County</label>                
                <div class="clr"></div>
              </li>




              <li>
                <label for="multiply"><strong>Phone &amp; Income Verfication Info</strong> </label>
                <input name="customer2_phoneno" class="text small" id="customer2_phoneno" value="<?php echo $row_findCustomer['customer2_phoneno']; ?>" />
                <input name="customer2_cellphone" class="text small" id="customer2_cellphone" value="<?php echo $row_findCustomer['customer2_cellphone']; ?>" />
                <input name="customer2_employer_phone" class="text small" id="customer2_employer_phone" value="<?php echo $row_findCustomer['customer2_employer_phone']; ?>" />
                <input name="customer2_gross_income" class="text small" id="customer2_gross_income" value="<?php echo $row_findCustomer['customer2_gross_income']; ?>" />                
                <select id="customer2_income_frequency" name="customer2_income_frequency">
                  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer2_income_frequency']))) {echo "selected=\"selected\"";} ?>>Select PaySchedule</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_findCustomer['customer2_income_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                  <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
                </select>                
                <div class="clr"></div>
                <label for="customer_fname" class="small">Home Phone</label>                
                <label for="customer_mname" class="small">Cell Phone</label>                
                <label for="customer_lname" class="small">Work Phone</label>
                <label for="customer_lname" class="small">Gross Income</label>
                <label for="customer_lname" class="small">Pay Schedule</label>                
                <div class="clr"></div>
              </li>



              <li>
                <label for="multiply"><strong>Employer Name &amp; Verfication Section</strong></label>
                <input name="customer2_employer_name" class="text small" id="customer2_employer_name" value="<?php echo $row_findCustomer['customer2_employer_name']; ?>" />
                <input name="customer2_employer_addr1" class="text small" id="customer2_employer_addr1" value="<?php echo $row_findCustomer['customer2_employer_addr1']; ?>" />
                <input name="customer2_employer_addr2" class="text small" id="customer2_employer_addr2" value="<?php echo $row_findCustomer['customer2_employer_addr2']; ?>" />
                <input name="customer2_employer_hiredate" class="text small" id="datepicker6" value="<?php echo $row_findCustomer['customer2_employer_hiredate']; ?>" />                
                <div class="clr"></div>
                <label for="customer2_employer_name" class="small">Employer Name</label>                
                <label for="customer2_employer_addr1" class="small">Employer Address 1</label>                
                <label for="customer2_employer_addr2" class="small">Employer Address 2</label>
                <label for="customer2_employer_hiredate" class="small">Date Of Hire</label>
                <div class="clr"></div>
              </li>



              <li>
                <label for="multiply"><strong>Employer Supervisors Name &amp; Verfication Section</strong></label>
                <input name="customer2_supervisors_name" class="text small" id="customer2_supervisors_name" value="<?php echo $row_findCustomer['customer2_supervisors_name']; ?>" />
                <input name="customer2_supervisors_phone" class="text small" id="customer2_supervisors_phone" value="<?php echo $row_findCustomer['customer2_supervisors_phone']; ?>" />
                <input name="customer2_supervisors_phone_ext" class="text small" id="customer2_supervisors_phone_ext" value="<?php echo $row_findCustomer['customer2_supervisors_phone_ext']; ?>" />
                <div class="clr"></div>
                <label for="customer2_supervisors_phone_ext" class="small">Supervisors Name</label>                

                <label for="customer2_supervisors_phone" class="small">Employer Phone</label>
                <label for="customer2_supervisors_phone_ext" class="small">Extension</label>
                <div class="clr"></div>
              </li>



              <li>
                <label for="customer2_employer_city"><strong>Employer City &amp; Sttate Information:</strong></label>
                <input name="customer2_employer_city" class="text small" id="customer2_employer_city" value="<?php echo $row_findCustomer['customer2_employer_city']; ?>" />
                <select id="customer2_employer_state" name="customer2_employer_state">
                  <option selected="selected" value="" <?php if (!(strcmp("", $row_findCustomer['customer2_employer_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findCustomer['customer2_employer_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                </select>
                <input name="customer2_employer_zip" class="text small" id="customer2_employer_zip" value="<?php echo $row_findCustomer['customer2_employer_zip']; ?>" />                
                <select id="customer2_employer_years" name="customer2_employer_years">
                  <option selected="selected" value="" <?php if (!(strcmp("", $row_findCustomer['customer2_employer_years']))) {echo "selected=\"selected\"";} ?>>Work Years</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_year_options['year_value']?>"<?php if (!(strcmp($row_year_options['year_value'], $row_findCustomer['customer2_employer_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_year_options['year_name']?></option>
                  <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
                </select>
                <select id="customer2_employer_months" name="customer2_employer_months">
                  <option selected="selected" value="" <?php if (!(strcmp("", $row_findCustomer['customer2_employer_months']))) {echo "selected=\"selected\"";} ?>>Work Months</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_month_options['month_value']?>"<?php if (!(strcmp($row_month_options['month_value'], $row_findCustomer['customer2_employer_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_month_options['month_name']?></option>
                  <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
                </select>
                
                <div class="clr"></div>
                <label for="customer2_employer_city" class="small">City</label>                
                <label for="customer2_employer_state" class="small">State:</label>                
                <label for="customer2_employer_zip" class="small">Zip:</label>                
                <label for="customer2_employer_years" class="small">Work Years:</label>\
                <label for="customer2_employer_months" class="small">Work Months:</label>                                        
                <div class="clr"></div>
              </li>



</div>





















              
            <li>
            
            <input id="submit" name="submit" type="submit" value="Save & Process" />
            </li>  
              
            
            
            
            
            
            
            
            </ol>
            <input type="hidden" name="MM_update" value="customerUpdate">
            </form>
            <p>
            	<a href="#">Learn more &raquo;</a>
            </p>
          </div>
        </div>
      </div>

<!-- End Customer Assigned Leads -->
    </div>
    
    
    
    
    
    
    
    <!-- START LEFT TOWER BLOCK -->
    
    
    
    <div class="block_sm vertsortable">

      <!-- gadget calendar -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Calendar <span>...</span></h3>
          <div class="gadget_content">
            <div id="datepicker"></div>
            <div class="clr"></div>
            <p><a href="#" class="bg_grey">+ Add Event</a> &nbsp; <a href="#" class="bg_grey">List Events</a></p>
          </div>
        </div>
      </div>




      <!-- gadget leadcapture -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Book Appointment<span>...</span></h3>
          
          <div class="gadget_content">
            
			<form name="form_bookappt"  method="POST" id="form_bookappt" class="form_quickcontact">
            <ol>
             <li>
              <label for="appointmentDate">Appt. Date:</label>
              <input name="appointmentDate" class="text" id="datepicker7" onChange="appointmentT()" value="<?php echo $row_findCustomer['customer_date_td']; ?>" />
              <div class="clr"></div>
            </li>
            <li>
            <div>
<table>
	<tr>
    	<td>            
            
              <label for="thehour">Appt. Time Hour:</label>
									
                    					<select name="thehour" onChange="appointmentT()">
										  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_hour_td']))) {echo "selected=\"selected\"";} ?>>Select</option>
										  <?php
do {  
?>
										  <option value="<?php echo $row_one_houroptions['hour_value']?>"<?php if (!(strcmp($row_one_houroptions['hour_value'], $row_findCustomer['customer_hour_td']))) {echo "selected=\"selected\"";} ?>><?php echo $row_one_houroptions['hour_name']?></option>
										  <?php
} while ($row_one_houroptions = mysqli_fetch_assoc($one_houroptions));
  $rows = mysqli_num_rows($one_houroptions);
  if($rows > 0) {
      mysqli_data_seek($one_houroptions, 0);
	  $row_one_houroptions = mysqli_fetch_assoc($one_houroptions);
  }
?>
</select>
</td>
<td>
              <label for="theminute">Appt. Time Minute:</label>
				<select name="theminute" onChange="appointmentT()">
                    					  <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_min_td']))) {echo "selected=\"selected\"";} ?>>Select</option>
                    					  <?php
do {  
?>
                    					  <option value="<?php echo $row_five_minuteoptions['fivemin_name']?>"<?php if (!(strcmp($row_five_minuteoptions['fivemin_name'], $row_findCustomer['customer_min_td']))) {echo "selected=\"selected\"";} ?>><?php echo $row_five_minuteoptions['fivemin_name']?></option>
                    					  <?php
} while ($row_five_minuteoptions = mysqli_fetch_assoc($five_minuteoptions));
  $rows = mysqli_num_rows($five_minuteoptions);
  if($rows > 0) {
      mysqli_data_seek($five_minuteoptions, 0);
	  $row_five_minuteoptions = mysqli_fetch_assoc($five_minuteoptions);
  }
?>
                    					</select>
                                        
                                        </td>



</tr>
</table>
</div>
                        </li>

			
            <li>
            <div>
                    <table>
                        <tr>
                            <td>
                              <label for="perferredMethod">Phone Type:</label>
                            </td>
                            <td>
                              <label for="customer_dayhunt">Days Hunt:</label>  
                
                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              <select name="perferredMethod" id="perferredMethod" onChange="moveActivity()">
                                            <option value="Mobile">Mobile</option>
                                            <option value="Home">Home</option>
                                            <option value="Work">Work</option>
                              </select>            
                            </td>
                            <td>
                                          
                              <select name="customer_dayhunt" onChange="moveActivity()">
                                <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>Select One</option>
          <option value="1" <?php if (!(strcmp(1, $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>1 Day</option>
<option value="2" <?php if (!(strcmp(2, $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>2 Days</option>
<option value="3" <?php if (!(strcmp(3, $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>3 Days</option>
<option value="4" <?php if (!(strcmp(4, $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>4 Days</option>
<option value="5" <?php if (!(strcmp(5, $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>5 Days</option>
<option value="6" <?php if (!(strcmp(6, $row_findCustomer['customer_dayhunt']))) {echo "selected=\"selected\"";} ?>>6 Days</option>
                                </select>
                             </td>
                         </tr>
                     </table> 
              </div>
              <div class="clr"></div>
              
            </li>
            
            
            <li>
              <label for="cust_lead_sp_comment">Select Vehicle:</label>
              <select name="thisvehicleID" id="thisvehicleID" size="10"  onChange="showVehicle(this.value)">
                                              <option value="" <?php if (!(strcmp("", $row_findCustomer['customer_vehicles_id']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                              <?php
        do {  
        ?>
                                              <option value="<?php echo $row_LiveVehicles['vid']?>"<?php if (!(strcmp($row_LiveVehicles['vid'], $row_findCustomer['customer_vehicles_id']))) {echo "selected=\"selected\"";} ?>><?php echo '#'.$row_LiveVehicles['vstockno']?> <?php echo $row_LiveVehicles['vyear']?> <?php echo $row_LiveVehicles['vmake']?> <?php echo $row_LiveVehicles['vmodel']?> <?php echo $row_LiveVehicles['vtrim']?></option>
                                              <?php
        } while ($row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles));
          $rows = mysqli_num_rows($LiveVehicles);
          if($rows > 0) {
              mysqli_data_seek($LiveVehicles, 0);
              $row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
          }
        ?>
        </select>
              
              
              
              
              
              
              
              
              <div class="clr"></div>
            </li>
            
            <li>
            <div class="clr"></div>
            </li>
            
            
            <li>
              <input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $sid; ?>">
              <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>">
              <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>">
              <div class="clr"></div>
            </li>
            <li>
              <div id="txtvPhotoHint"></div>
              
               
               
               <!--<a href="script-sales-template.php" class="bg_grey">Save Customer</a>
               <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> Post Action -->
              
              
              
              
              <div class="clr"></div>
            </li></ol>
			</form>
            
          </div>
          
        </div>
      </div>






     <!-- gadget dashboard -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Dashboard <span>...</span></h3>
          <div class="gadget_content">
            <ul class="dashboard">
            
              <li class="li1"><a href="coming-soon.php">Dashboard</a></li>
              
              <li class="li3"><a href="add-inventory.php">Add Inventory</a></li>

              <li class="li3"><a href="add-customer.php">Add Customer</a></li>
              
              
              <li class="li4"><a href="customers.php">Search Customer</a></li>


              <li class="li4"><a href="appointments.php">Appointments</a></li>


              
              <li class="li7"><a href="myacct.php">My Settings</a></li>
            
            </ul>
          </div>
        </div>
      </div>

      <!-- gadget leadcapture
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Quick Capture Lead<span>...</span></h3>
          
          <div class="gadget_content">
            
			<form name="form_quickcontact"  method="POST" id="form_quickcontact" class="form_quickcontact">
            <ol>
             <li>
              <label for="cust_nickname">Customer Nick Name:</label>
              <input id="cust_nickname" name="cust_nickname" class="text" />
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="cust_fname">Customer First Name:</label>
              <input type="text" id="cust_fname" name="cust_fname" class="text" />
              <div class="clr"></div>
            </li>

             <li>
              <label for="cust_lname">Customer Last Name:</label>
              <input id="cust_lname" name="cust_lname" class="text" />
              <div class="clr"></div>
            </li>

            
            <li>
              <label for="email">Customer Phone Number:</label>
              <span id="sprytextfield4">
              <input id="cust_phoneno2" name="cust_phoneno2" class="text" />
              <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
              <div class="clr"></div>
            </li>
			
            <li>
              <label for="cust_phonetype">Phone Type:</label>
              <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
              </select>
              
              
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="email">Customer Email:</label>
              <span id="sprytextfield5">
              <input id="cust_email" name="cust_email" class="text" /><br />
              	<span class="textfieldRequiredMsg">A valid email is required.</span>
              	<span class="textfieldInvalidFormatMsg">Unproper Format.</span>
              </span>
              <div class="clr"></div>
            </li>
            
                        
            <li>
              <label for="cust_lead_sp_comment">Notes & Comments:</label>
              <textarea id="cust_lead_sp_comment" name="cust_lead_sp_comment" rows="3" cols="1"></textarea>
              <div class="clr"></div>
            </li>
            
            <li>
            <label for="cust_lead_temperature">Customer Status:</label>
            <select name="cust_lead_temperature" id="cust_lead_temperature">
              			<option value="Hot">Hot</option>
              			<option value="Warm">Warm</option>
              			<option value="Cold">Cold</option>
            </select>
            <div class="clr"></div>
            </li>
            
            
            <li>
              <input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $sid; ?>">
              <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>">
              <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>">
              <div class="clr"></div>
            </li>
            <li>
              <input type="submit" value="Save Customer" >
              
               
               
               <!--<a href="script-sales-template.php" class="bg_grey">Save Customer</a>
               <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> Post Action 
              
              
              
              
              <div class="clr"></div>
            </li></ol>
			</form>
            
          </div>
          
        </div>
      </div>
 -->
    </div>
    
    
    
    
    
    
    
    
    
        <?php //include('parts/left-tower.php') ?>
    
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

mysqli_free_result($LiveVehicles);

mysqli_free_result($sales_person);

mysqli_free_result($states);

mysqli_free_result($five_minuteoptions);

mysqli_free_result($year_options);

mysqli_free_result($month_options);

mysqli_free_result($dealer_email_template);

mysqli_free_result($one_houroptions);

mysqli_free_result($findCustomer);

mysqli_free_result($paydayType);

mysqli_free_result($salespersons);

mysqli_free_result($Managers);

mysqli_free_result($customerOtherLeads);

mysqli_free_result($income_intervals);

mysqli_free_result($customerNotes);

mysqli_free_result($lastCustomerNo);
?>
