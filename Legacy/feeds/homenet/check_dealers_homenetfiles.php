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
$query_find_homenet_dlrs = "SELECT dealers.id, dealers.leadsidsemail, dealers.company, dealers.website, dealers.phone, dealers.email, dealers.status, dealers.feedhomenetfilename FROM dealers WHERE dealers.feedhomenetfilename IS NOT NULL AND dealers.status = '1'";
$find_homenet_dlrs = mysqli_query($idsconnection_mysqli, $query_find_homenet_dlrs);
$row_find_homenet_dlrs = mysqli_fetch_assoc($find_homenet_dlrs);
$totalRows_find_homenet_dlrs = mysqli_num_rows($find_homenet_dlrs);

?>
<?php

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>
<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];
$PATH = "/homenetauto/";
$FILE = $row_find_homenet_dlrs['feedhomenetfilename'];

echo $FILE_PATH = $ROOT.$PATH.$FILE;
echo '<br />';
$homenetfile = $FILE_PATH;
?>
<br>
  <strong>Dealer Id:</strong> <?php echo $row_find_homenet_dlrs['id']; ?><br>
  <strong>Company:</strong> <?php echo $row_find_homenet_dlrs['company']; ?><br>
  <strong>File:</strong> <?php echo $row_find_homenet_dlrs['feedhomenetfilename']; ?><br>
  <strong>Status:</strong> <?php echo $row_find_homenet_dlrs['status']; ?><br>
  <br>
  
  LOGIC BELOW:
  <hr />
<?php
$dealerfolder = $row_find_homenet_dlrs['id'].'/';


if (!file_exists($homenetfile)) {
    
	//mkdir($dealerfolder, 0777, true);
	echo '<b>Does NOT Exist!!!</b>';
	
}else{
	
	echo 'Does Exist!'.'';
	
	include("_read_csv.php");

}






?>
  <?php } while ($row_find_homenet_dlrs = mysqli_fetch_assoc($find_homenet_dlrs)); ?>
</body>
</html>
<?php
mysqli_free_result($find_homenet_dlrs);

?>
