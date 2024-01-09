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
$param = '4420';
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_grab_vfirstphoto = "SELECT vid, did, vlivestatus, vthubmnail_file, vthubmnail_file_path FROM vehicles WHERE vid = '$param' ";
$grab_vfirstphoto = mysqli_query($idsconnection_mysqli, $query_grab_vfirstphoto);
$row_grab_vfirstphoto = mysqli_fetch_assoc($grab_vfirstphoto);
$totalRows_grab_vfirstphoto = mysqli_num_rows($grab_vfirstphoto);

echo $vthubmnail_file = $row_grab_vfirstphoto['vthubmnail_file'];
echo '<br />';
echo $vthubmnail_file_path = $row_grab_vfirstphoto['vthubmnail_file_path'];
echo '<br />';
$string = "";
echo '<br />';
$vthubmnail_file_path = str_replace("thumbs/", "", "$vthubmnail_file_path");
echo $vthubmnail_file_path = str_replace("../vehicles/photos/", "", "$vthubmnail_file_path");
 
 			$date_format = 00011111;
 
 			$link = "http://images.autocitymag.com/$vthubmnail_file_path";
			
			if($row_grab_vfirstphoto['vthubmnail_file_path']){ 			
			
				$cfsurl = $link."?dt=$date_format";
			
			}else{
				
				$cfsurl = 'g';
			}
			
			echo $output .= $cfsurl;




exit;

$ftp_server = "";

$conn_id = "";
$ftp_user_name = "";
$ftp_user_pass = "";

$file = 'inventory.test.txt';
$remote_file = 'readme.txt';



// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// upload a file
if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
 echo "successfully uploaded $file\n";
} else {
 echo "There was a problem while uploading $file\n";
}

// close the connection
ftp_close($conn_id);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
mysqli_free_result($grab_vfirstphoto);
?>
