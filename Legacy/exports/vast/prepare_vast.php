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
$query_find_vastdealers = "SELECT * FROM dealers WHERE export_tovast = '1' ORDER BY id ASC";
$find_vastdealers = mysqli_query($idsconnection_mysqli, $query_find_vastdealers);
$row_find_vastdealers = mysqli_fetch_assoc($find_vastdealers);
$totalRows_find_vastdealers = mysqli_num_rows($find_vastdealers);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>
 Dealer ID: <?php echo $row_find_vastdealers['id']; ?>
  <?php } while ($row_find_vastdealers = mysqli_fetch_assoc($find_vastdealers)); ?>
</body>
</html>
<?php
mysqli_free_result($find_vastdealers);
?>
