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
$query_vst_exportquery = "SELECT * FROM vehicles WHERE did = '60' AND vehicles.vlivestatus = '1'";
$vst_exportquery = mysqli_query($idsconnection_mysqli, $query_vst_exportquery);
$row_vst_exportquery = mysqli_fetch_assoc($vst_exportquery);
$totalRows_vst_exportquery = mysqli_num_rows($vst_exportquery);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vastdlrs_vehcls = "SELECT * FROM dealers WHERE `dealers`.`export_tovast` = '1'";
$find_vastdlrs_vehcls = mysqli_query($idsconnection_mysqli, $query_find_vastdlrs_vehcls);
$row_find_vastdlrs_vehcls = mysqli_fetch_assoc($find_vastdlrs_vehcls);
$totalRows_find_vastdlrs_vehcls = mysqli_num_rows($find_vastdlrs_vehcls);

do { 

$ddid = $row_find_vastdlrs_vehcls['id'];
//$vvid =  $row_find_vastdlrs_vehcls['vid'];
$company = $row_find_vastdlrs_vehcls['company'];

// Step 1 Is To Define Arrays Into Variables
// Step 2 Is To Print photo urls into long test columnn from mysql into txt file
// Step 3? As per dealer FTP each file into Vast Dealer FTP Credentials Is To Check If Folder Exist For Possible File For Dealer txt file.
// Step 3/4 Send one text file and have them aggregavate all of our vehicles at one time.

chdir(dirname(__FILE__));

$truefilename = 'inventory.txt';

$dealerfolder = $ddid."/";

$dealerfolder_file = "$dealerfolder$truefilename";

if (!file_exists($dealerfolder)) {
    mkdir($dealerfolder, 0777, true);
}

$root = $_SERVER['DOCUMENT_ROOT'];
//echo '<br />';
$pathHere = "/exports/vast/".$dealerfolder;
//echo '<br />';
//echo '<br />';
//include($root.$pathHere.$tempfile);





include("inc.exportcsv.php");


$table="`vehicles`, `dealers` WHERE `dealers`.`id` = `vehicles`.`did` AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vthubmnail_file` IS NOT NULL AND `dealers`.`export_tovast` = '1' AND `dealers`.`export_tovast` = '1' AND `dealers`.`id` = '$ddid' ORDER BY `dealers`.`id` ASC"; // this is the tablename that you want to export to csv from mysql.


exportMysqlToCsv($table);



?>
<?php
	//$name = $truefilename;
	$filename = $root.$pathHere.$truefilename;
	
	//-- Code to Transfer File on Server Dt: 06-03-2008 by Aditya Bhatt --//
	//-- Connection Settings
	$ftp_server = "ftp.vast.com"; // Address of FTP server.
	$ftp_user_name = "idscrm.com"; // Username
	$ftp_user_pass = "b2R2x84xDV"; // Password
	//$destination_file = " SERVER FILE PATH TO UPLOAD VIA FTP_PUT"; //where you want to throw the file on the webserver (relative to your login dir)
	//$destination_file = $root.$pathHere;
	$destination_file = "";
	
	$conn_id = ftp_connect($ftp_server) or die("<span style='color:#FF0000'><h2>Couldn't connect to $ftp_server</h2></span>");        // set up basic connection
	
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<span style='color:#FF0000'><h2>You do not have access to this ftp server!</h2></span>");   // login with username and password, or give invalid user message

 echo 'Total Dealers: '.$totalRows_find_vastdlrs_vehcls.'<br />';
 
	if ((!$conn_id) || (!$login_result)) {  // check connection
		// wont ever hit this, b/c of the die call on ftp_login
		echo "<span style='color:#FF0000'><h2>FTP connection has failed! <br />";
		echo "Attempted to connect to $ftp_server for user $ftp_user_name</h2></span>";
		exit;
	} else {
		echo "Connected to $ftp_server, for user $ftp_user_name <br />";
	}

	//echo $destination_file.$truefilename;
	//echo '<br>';
	//echo $filename;
	//echo '<br>';

 echo 'Dealership: '.$row_find_vastdlrs_vehcls['company'].' | $ftp_user_name';
 
 echo '<br>';
 
	 //turn passive mode on
	ftp_pasv($conn_id, true);

	//The transfer mode. Must be either FTP_ASCII or FTP_BINARY.
	$upload = ftp_put($conn_id, $truefilename, $dealerfolder_file, FTP_BINARY);  // upload the file
	if (!$upload) {  // check upload status
		echo "<span style='color:#FF0000'><h2>FTP upload of $filename has failed!</h2></span> <br />";
	} else {
		echo "<span style='color:#339900'><h2>Uploading $filename Completed Successfully!</h2></span><br /><br />";
	}
	ftp_close($conn_id); // close the FTP stream


} while ($row_find_vastdlrs_vehcls = mysqli_fetch_assoc($find_vastdlrs_vehcls));
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Process Vast Feed...</title>
</head>

<body>
<p></p>
<p><hr /></p>
<p><hr /></p>
</body>
</html>
<?php
mysqli_free_result($find_vastdlrs_vehcls);
?>
