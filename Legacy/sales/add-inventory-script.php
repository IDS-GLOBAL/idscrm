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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "test_makes")) {
  $updateSQL =  "UPDATE vehicles SET vmake=%s, vmodel=%s WHERE vid=%s",
                       GetSQLValueString($_POST['vmake '], "text"),
                       GetSQLValueString($_POST['vmodel'], "text"),
                       GetSQLValueString($_POST['vid '], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);
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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_assoc($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_assoc($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);


//Definitions
$sid = $row_userSets['salesperson_id']; //$sid
$did = $row_userSets['main_dealerid']; //$did
$addinventory = $row_userSets['sid_addinv_2main_dealerid']; //$addinventory

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inventory_lastsalesperson = "SELECT vehicles.vmakeid, vehicles.vmodelid, vehicles.sid, vehicles.created_at, car_model.make, car_model.model, vehicles.vid FROM vehicles, car_model WHERE vehicles.sid = $sid AND vehicles.vmodelid = car_model.id ORDER BY created_at DESC";
$inventory_lastsalesperson = mysqli_query($idsconnection_mysqli, $query_inventory_lastsalesperson);
$row_inventory_lastsalesperson = mysqli_fetch_assoc($inventory_lastsalesperson);
$totalRows_inventory_lastsalesperson = mysqli_num_rows($inventory_lastsalesperson);


$make = $row_inventory_lastsalesperson['make'];

$model = $row_inventory_lastsalesperson['model'];

$vid = $row_inventory_lastsalesperson['vid'];

$con = mysql_connect("localhost","idsids_faith","benjamin2831");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);


$a = mysqli_query($idsconnection_mysqli, "UPDATE vehicles SET vmake='$make'
WHERE vid='$vid' ");

$b = mysqli_query($idsconnection_mysqli, "UPDATE vehicles SET vmodel='$model'
WHERE vid='$vid' ");


mysql_close($con);


	header("Location: inventory-photo-upload.php?vid=$vid");

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Add Inventory Script</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<style type="text/css">
<!--
.hexcolor {
	height: 25px;
	width: 25px;
	background-color: #FFA500;
}
-->
</style>
</head>
<body>
<p>Vid: = <?php echo $row_inventory_lastsalesperson['vid']; ?></p>
<form id="test_makes" name="test_makes" method="POST" action="<?php echo $editFormAction; ?>">
  <label>Make:
<input name="vmake " type="text" id="vmake " value="<?php echo $row_inventory_lastsalesperson['make']; ?>" />
    <br />
<input name="vid " type="text" id="vid" value="<?php echo $row_inventory_lastsalesperson['vid']; ?>" />
    <br />
    Model:
    <input name="vmodel" type="text" id="vmodel" value="<?php echo $row_inventory_lastsalesperson['model']; ?>" />
  </label>
  <input type="hidden" name="MM_update" value="test_makes" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($vmakes);

mysqli_free_result($vmodels);

mysqli_free_result($colors_hex);

mysqli_free_result($inventory_lastsalesperson);
?>
