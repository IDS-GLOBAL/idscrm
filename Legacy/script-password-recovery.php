<?php require_once('Connections/idsconnection.php'); ?>
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

$colname_grab_email_nsend = "-1";
if (isset($_GET['email'])) {
  $colname_grab_email_nsend = $_GET['email'];
}


@$email = $_POST['email'];

if(!$email){
	header('Location: recover-email.php');
}else{
	echo '';
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_grab_email_nsend = "SELECT * FROM dealers WHERE email = '$email'";
$grab_email_nsend = mysqli_query($idsconnection_mysqli, $query_grab_email_nsend);
$row_grab_email_nsend = mysqli_fetch_assoc($grab_email_nsend);
$totalRows_grab_email_nsend = mysqli_num_rows($grab_email_nsend);
	
	
	


	$emailSubject = 'IDSCRM.com|Password Email Recovery!';
	$emailReceiver = $row_grab_email_nsend['email'];
	
/* Gathering Data Variables */

	$did       = $row_grab_email_nsend['id'];
	$ufullname = $row_grab_email_nsend['contact'];
	$uphone    = $row_grab_email_nsend['contact_phone'];
	$phone     = $row_grab_email_nsend['phone'];
	$uemail    = $row_grab_email_nsend['email'];
	$status    = $row_grab_email_nsend['status'];
	$createdat = $row_grab_email_nsend['created_at'];
	$fromemail  = 'idsrobot@idscrm.com';
	$upassword = $row_grab_email_nsend['password'];
	$ubname = $row_grab_email_nsend['company'];
	$body = <<<EOD
<br>
<strong>Password Email Recovery!</strong><br>
<hr><br>
This email is being sent to notify you that we just received a request for password recovery online!<br>
<br>
Here is what we have on file for you.<br>
<br>
<strong>Dealer Name:</strong> $ubname <br>
<strong>Name:</strong> $ufullname <br>
<strong>Main Phone:</strong> $phone <br>
<strong>Email:</strong> $uemail <br><br>
<strong>Password:</strong> $upassword <br>
<hr><br>
<br>
Login into your account by visiting this link below:<br>
<br>
<a href='http://www.idscrm.com/dealer/login.php?email=$uemail'>www.idscrm.com</a><br>
<br>
<strong>GOODLUCK WITH YOUR NEXT CAR SALE! <br>
EOD;

	$headers = "From: $fromemail\r\n";
	$headers .= "Content-type: text/html\r\n";
	//$headers .= "CC: moneyisnotevil@gmail.com\r\n";
    $headers .= "BCC: idscrm.com@gmail.com\r\n";
	$success = mail($emailReceiver, $emailSubject, $body, $headers);


header("Location: recover-email-result.php");
/* Results rendered as HTML */


	$theResults = <<<EOD
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Recover Email Script And Email It</title>
</head>

<body>
<p>We have a request  for a password
recovery at idscrm.com</p>
<p><u>www.idscrm.com/dealer</u></p>
<p>Login Credentials Are Below:</p>
<p><b>Email:</b> $uemail</p>
<p><b>Password:</b></p>
<p>If you have not requested this message please email us adddressing this concern.</p>
</body>
</html>
EOD;
echo "$theResults";
?>
<?php
mysqli_free_result($grab_email_nsend);
?>
