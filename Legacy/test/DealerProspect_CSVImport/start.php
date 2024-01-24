<?php 
//*************
//  CSV Import
//*************
require_once("../../dwzExport/CsvImport.php");
require_once('../../Connections/tracking.php');
?>
<?php require_once('../../Connections/tracking.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ImportProspects")) {
  $insertSQL =  "INSERT INTO dealer_prospects (id, dealer_pending_id, dudes_id, dudes2_id, assigned_salesrep, assigned_salesrep_phone, contact, contact_phone, contact_phone_type, company, website, finance, finance_contact, sales, sales_contact, phone, fax, address, city, `state`, zip, email, status, wfh_dealer_status, wfh_dealer_type_id, wfh_dealer_agreed, created_at, last_login_time, last_modified) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['dealer_pending_id'], "int"),
                       GetSQLValueString($_POST['dudes_id'], "int"),
                       GetSQLValueString($_POST['dudes2_id'], "int"),
                       GetSQLValueString($_POST['assigned_salesrep'], "text"),
                       GetSQLValueString($_POST['assigned_salesrep_phone'], "text"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['contact_phone'], "text"),
                       GetSQLValueString($_POST['contact_phone_type'], "text"),
                       GetSQLValueString($_POST['company'], "text"),
                       GetSQLValueString($_POST['website'], "text"),
                       GetSQLValueString($_POST['finance'], "text"),
                       GetSQLValueString($_POST['finance_contact'], "text"),
                       GetSQLValueString($_POST['sales'], "text"),
                       GetSQLValueString($_POST['sales_contact'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['fax'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['zip'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['wfh_dealer_status'], "int"),
                       GetSQLValueString($_POST['wfh_dealer_type_id'], "int"),
                       GetSQLValueString($_POST['wfh_dealer_agreed'], "text"),
                       GetSQLValueString($_POST['created_at'], "date"),
                       GetSQLValueString($_POST['last_login_time'], "date"),
                       GetSQLValueString($_POST['last_modified'], "date"));

  mysql_select_db($database_tracking, $tracking);
  $Result1 = mysql_unbuffered_query($insertSQL, $tracking);

  $insertGoTo = "finish.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo));
}
?>
<?php
//************************************
//  http://www.DwZone-it.com
//  Import Export Tools - CSV Import
//  Version 1.1.7
//************************************
set_time_limit(0);
$dwzCsvImport_1 = new dwzCsvImport();
$dwzCsvImport_1->Init();
$dwzCsvImport_1->SetExtraData("../../");
$dwzCsvImport_1->SetStartOn("ONLOAD", "");
$dwzCsvImport_1->SetProgressBar("@_@21000");
$dwzCsvImport_1->SetRedirectPage("finish.php");
$dwzCsvImport_1->SetDisplayErrors("true");
$dwzCsvImport_1->SetFilePath("test_2.csv");
$dwzCsvImport_1->SetConnection($hostname_tracking, $database_tracking, $username_tracking, $password_tracking);
$dwzCsvImport_1->SetTable("dealer_prospects");
$dwzCsvImport_1->SetTableUniqueKey("id");
$dwzCsvImport_1->SetColIsNum("true");
$dwzCsvImport_1->SetOnDuplicateEntry("Update");
$dwzCsvImport_1->SetCsvUniqueKey("3");
$dwzCsvImport_1->SetFieldSeparator(",");
$dwzCsvImport_1->SetSkipFirstLine("true");
$dwzCsvImport_1->SetEncloseField("DA");
$dwzCsvImport_1->AddItem("dudes_id", "Entered", "Ni", "1", "None");
$dwzCsvImport_1->AddItem("assigned_salesrep", "Entered", "S", "Open", "None");
$dwzCsvImport_1->AddItem("dealer_pending_id", "Csv", "S", "", "2");
$dwzCsvImport_1->AddItem("company", "Csv", "S", "", "3");
$dwzCsvImport_1->AddItem("address", "Csv", "S", "", "4");
$dwzCsvImport_1->AddItem("city", "Csv", "S", "", "5");
$dwzCsvImport_1->AddItem("state", "Csv", "S", "", "6");
$dwzCsvImport_1->AddItem("zip", "Csv", "Ni", "", "7");
$dwzCsvImport_1->AddItem("directions", "Csv", "Ni", "", "8");
$dwzCsvImport_1->AddItem("wfh_dealer_type_id", "Csv", "Ni", "", "9");
$dwzCsvImport_1->AddItem("financeData", "Csv", "S", "", "10");
$dwzCsvImport_1->AddItem("finance_contact", "Csv", "S", "", "11");
$dwzCsvImport_1->AddItem("status", "Entered", "Ni", "0", "None");
$dwzCsvImport_1->AddItem("wfh_dealer_status", "Entered", "Ni", "0", "None");
$dwzCsvImport_1->Execute();
//***********************
// Csv Import
//***********************
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Import Glow List Lending</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="ImportProspects" id="ImportProspects">
  <input name="csv_import_progress_key" type="hidden" id="csv_import_progress_key" value="<?php echo $dwzCsvImport_1->GetProgressKey(); ?>" />
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id:</td>
      <td><input type="text" name="id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Dealer_pending_id:</td>
      <td><input type="text" name="dealer_pending_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Dudes_id:</td>
      <td><input type="text" name="dudes_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Dudes2_id:</td>
      <td><input type="text" name="dudes2_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Assigned_salesrep:</td>
      <td><input type="text" name="assigned_salesrep" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Assigned_salesrep_phone:</td>
      <td><input type="text" name="assigned_salesrep_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contact:</td>
      <td><input type="text" name="contact" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contact_phone:</td>
      <td><input type="text" name="contact_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contact_phone_type:</td>
      <td><input type="text" name="contact_phone_type" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Company:</td>
      <td><input type="text" name="company" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Website:</td>
      <td><input type="text" name="website" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Finance:</td>
      <td><input type="text" name="finance" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Finance_contact:</td>
      <td><input type="text" name="finance_contact" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sales:</td>
      <td><input type="text" name="sales" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sales_contact:</td>
      <td><input type="text" name="sales_contact" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Phone:</td>
      <td><input type="text" name="phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Fax:</td>
      <td><input type="text" name="fax" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Address:</td>
      <td><input type="text" name="address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">City:</td>
      <td><input type="text" name="city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">State:</td>
      <td><input type="text" name="state" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Zip:</td>
      <td><input type="text" name="zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Email:</td>
      <td><input type="text" name="email" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status:</td>
      <td><input type="text" name="status" value="0" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Wfh_dealer_status:</td>
      <td><input type="text" name="wfh_dealer_status" value="0" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Wfh_dealer_type_id:</td>
      <td><input type="text" name="wfh_dealer_type_id" value="0" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Wfh_dealer_agreed:</td>
      <td><input type="text" name="wfh_dealer_agreed" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Created_at:</td>
      <td><input type="text" name="created_at" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Last_login_time:</td>
      <td><input type="text" name="last_login_time" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Last_modified:</td>
      <td><input type="text" name="last_modified" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="ImportProspects">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
//***********************
// Csv Import
//***********************
$dwzCsvImport_1->InsertProgressJs();
//***********************
// Csv Import
//***********************
?>
