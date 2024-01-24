<?php
//*****************
//  Advanced Search
//*****************
require_once("../../dwzSearch/dwzSearch.php");
?>
<?php require_once('../../Connections/idsconnection.php'); ?>
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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers = "SELECT * FROM dealers WHERE company = 'company'";
$dealers = mysqli_query($idsconnection_mysqli, $query_dealers);
$row_dealers = mysqli_fetch_assoc($dealers);
$totalRows_dealers = mysqli_num_rows($dealers);
?>
<?php
//**************************
//  Advanced Search
//  http://www.DwZone-it.com
//  Version: 1.0.2
//**************************
$dwzSearch_1 = new dwzSearch();
$dwzSearch_1->Init();
$dwzSearch_1->SetFormName("form1");
$dwzSearch_1->SetSubmitName("submit");
$dwzSearch_1->AddFilter("", "Like", "dealer_search", "dealer_search", "", "S", "0");
$dwzSearch_1->SetRecordset($dealers, "dealers");
$dwzSearch_1->SetSql($query_dealers);
$dwzSearch_1->SetConnection($hostname_idsconnection, $database_idsconnection, $username_idsconnection, $password_idsconnection);
$dwzSearch_1->Create();
if($dwzSearch_1->HasFilter()){
	$dwzSearch_1->FilterRecordset();
}
//**************************
//  Advanced Search
//  End code
//**************************
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Try A Search Here</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <p>
    <label for="dealer_search"><strong>Search For Dealer:</strong></label>
    <input name="dealer_search" type="text" id="dealer_search" tabindex="1" size="50">
  </p>
  <p>
    <label for="submit"></label>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($dealers);
?>
