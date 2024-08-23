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

$MM_restrictGoTo = "../dealer/logout.php";
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
$sidmaindid = $row_userSets['main_dealerid'];
$did = $row_userSets['main_dealerid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryVehbydid = "SELECT * FROM vehicles WHERE did = '$did' ORDER BY created_at DESC";
$queryVehbydid = mysqli_query($idsconnection_mysqli, $query_queryVehbydid);
$row_queryVehbydid = mysqli_fetch_assoc($queryVehbydid);
$totalRows_queryVehbydid = mysqli_num_rows($queryVehbydid);


$colname_vPhoto = "-1";
if (isset($_GET['vehicle_id'])) {
  $colname_vPhoto = $_GET['vehicle_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vPhoto =  sprintf("SELECT * FROM vehicle_photos WHERE vehicle_id = %s ORDER BY created_at DESC", GetSQLValueString($colname_vPhoto, "int"));
$vPhoto = mysqli_query($idsconnection_mysqli, $query_vPhoto);
$row_vPhoto = mysqli_fetch_assoc($vPhoto);
$totalRows_vPhoto = mysqli_num_rows($vPhoto);

//mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_photos (vehicle_id, dealer_id) values ($vid, $did)");
//mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_videos (v_video_vid, v_video_did) values ($vid, $did)");




	// *** Include the class
	@include("../dealer/resize-class.php");

 do { 


  $row_vPhoto['photo_file_name']; 
          
          
  $row_vPhoto['photo_file_path'];
          
          
  $row_vPhoto['photo_thumb_fname'];
          
          
          
  $row_vPhoto['photo_thumb_fpath'];



	//You Need To Include A Progress Bar While the User is uploading.

	// *** Define Main & Resize Here Photo Variable Her For Renaming Saved Image
	$img = 'idscrm';
	$filename = $row_vPhoto['photo_file_path'];
	$tbfilename = $row_vPhoto['photo_thumb_fpath'];
	$thumbfolder = 'thumbs';



	// *** 1) Initialise / load image
	$resizeObj = new resize("$filename");

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(640, 480, 'exact');

	// *** 3) Save image
	$resizeObj -> saveImage("$filename", 100);

	// *** 1) Initialise / load image
	//$resizeObj = new resize("$tbfilename");

	 //*** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(120, 90, 'exact');

	// *** 3) Save image
	$resizeObj -> saveImage("$tbfilename", 100);


    } while ($row_vPhoto = mysqli_fetch_assoc($vPhoto)); 


     header("Location: inventory-photos.php?vid=$colname_vPhoto");
?>
<?php
mysqli_free_result($userSets);

mysqli_free_result($queryVehbydid);

mysqli_free_result($vPhoto);
?>
