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

$colname_userSets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userSets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userSets =  "SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
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
$query_vPhoto =  "SELECT * FROM vehicle_photos WHERE vehicle_id = %s", GetSQLValueString($colname_vPhoto, "int"));
$vPhoto = mysqli_query($idsconnection_mysqli, $query_vPhoto);
$row_vPhoto = mysqli_fetch_assoc($vPhoto);
$totalRows_vPhoto = mysqli_num_rows($vPhoto);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vVideo = "SELECT vvideo_vid, vvideo_did FROM vehicle_videos";
$vVideo = mysqli_query($idsconnection_mysqli, $query_vVideo);
$row_vVideo = mysqli_fetch_assoc($vVideo);
$totalRows_vVideo = mysqli_num_rows($vVideo);

//mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_photos (vehicle_id, dealer_id) values ($vid, $did)");
//mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_videos (v_video_vid, v_video_did) values ($vid, $did)");
?>
<?php



//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************

	
		//Variables From Multiple upload form.
	$did = $_POST['did'];
	$vid = $_POST['vid'];
	$img = 'idscrm';
	$thumbfolder = 'thumbs';



	//mkdir("vehicles/$did/$vid", 0777);
	@mkdir("../vehicles/photos/$did");
	@mkdir("../vehicles/photos/$did/$vid");
	@mkdir("../vehicles/photos/$did/$vid/$thumbfolder");
	
	//$structure = "vehicles/".$did.'/'.$vid;
	
	//mkdir(dirname($structure), 0777, true);
	
	
	

?>
<?php
		// *** Include the class
	include("../dealer/resize-class.php");
	
while(list($key,$value) = each($_FILES['images']['name']))
		{
			if(!empty($value))
			{
			
			$filename = $value;

			$filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line
			$filename=str_replace("'","_",$filename);// Add _ inplace of ' space in file name, you can remove this line
			$filename=str_replace("/","_",$filename);// Add _ inplace of / space in file name, you can remove this line
			$filename=str_replace(">","_",$filename);// Add _ inplace of > space in file name, you can remove this line
			$filename=str_replace("<","_",$filename);// Add _ inplace of < space in file name, you can remove this line
			$filename=str_replace("=","_",$filename);// Add _ inplace of = space in file name, you can remove this line
			
			





			//$add = $structure;
			$filepath = "../vehicles/photos/$did/$vid/$filename";  //$add = "upimg/$did/$vid/$filename";
			$tbfilename = "$filename";  //$img-sample-$thumb.jpg
			$tbfilepath = "../vehicles/photos/$did/$vid/$thumbfolder/$filename";			
			

			
			//Preparing For File Insert Into MySQL

			$filepath = mysql_escape_string($filepath);
			$filename = mysql_escape_string($filename);
			$tbfilepath = mysql_escape_string($tbfilepath);
			$tbfilename = mysql_escape_string($tbfilename);
			
			$thumbfolder = mysql_escape_string($thumbfolder);






		mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_photos 
					(vehicle_id, dealer_id, photo_file_path, photo_file_name, photo_thumb_fname, photo_thumb_fpath) values 
					('$vid', '$did', '$filepath', '$filename', '$tbfilename', '$tbfilepath')");


			 copy($_FILES['images']['tmp_name'][$key], $filepath);
			 //copy($_FILES['images']['tmp_name'][$key], $tbfilepath);

			 
			 
			 chmod("$filepath",0777);
			
			 //echo $filename.'<br />';
			 
			 	//You Need To Include A Progress Bar While the User is uploading.
			 
			}
		}

	header("Location: script-multi-upload-thumbnail-generator2.php?vehicle_id=$vid");

?>
<?php
	


	echo $did;
	echo '<br />';
	echo $vid;
	echo '<br />';
	echo $filepath;
	echo '<br />';
	echo $filename;
	echo "<br>";
	echo $thumbfolder;
	echo 'Print $file;';
	echo "<br>"."<br>"."<br>";
	
	echo $key;
	echo "<br>"."<br>"."<br>";
	
	$file = $_FILES['images'];
	print_r($file);
 	echo "<br>";
	


?>
<?php
mysqli_free_result($userDets);

mysqli_free_result($queryVehbydid);

mysqli_free_result($vPhoto);

mysqli_free_result($vVideo);

?>