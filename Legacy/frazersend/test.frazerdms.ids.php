<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/frazerdms.php'); ?>
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

$colname_find_frzrno_n_dealersystem = "-1";
if (isset($_GET['frazerid'])) {
  $colname_find_frzrno_n_dealersystem = $_GET['frazerid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_frzrno_n_dealersystem =  "SELECT * FROM dealers WHERE feedidfrazer = %s", GetSQLValueString($colname_find_frzrno_n_dealersystem, "text"));
$find_frzrno_n_dealersystem = mysqli_query($idsconnection_mysqli, $query_find_frzrno_n_dealersystem);
$row_find_frzrno_n_dealersystem = mysqli_fetch_assoc($find_frzrno_n_dealersystem);
$totalRows_find_frzrno_n_dealersystem = mysqli_num_rows($find_frzrno_n_dealersystem);

mysql_select_db($database_frazerdms, $frazerdms);
$query_frazerdms_frazeruser = "SELECT * FROM frazer_dealer WHERE frazer_dealer_frzno = '2'";
$frazerdms_frazeruser = mysqli_query($idsconnection_mysqli, $query_frazerdms_frazeruser, $frazerdms);
$row_frazerdms_frazeruser = mysqli_fetch_assoc($frazerdms_frazeruser);
$totalRows_frazerdms_frazeruser = mysqli_num_rows($frazerdms_frazeruser);
 'Found Frazer No In System: '.$foundfrazernowithdid = $row_find_frzrno_n_dealersystem['id'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php  $row_find_frzrno_n_dealersystem['id']; ?>
</body>
</html>
<?php
mysqli_free_result($find_frzrno_n_dealersystem);

mysqli_free_result($frazerdms_frazeruser);
?>
