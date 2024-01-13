<?php require_once('../Connections/idsconnection.php'); ?>
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
$query_email_dealer_post = "SELECT * FROM dealers WHERE id = 23";
$email_dealer_post = mysqli_query($idsconnection_mysqli, $query_email_dealer_post);
$row_email_dealer_post = mysqli_fetch_assoc($email_dealer_post);
$totalRows_email_dealer_post = mysqli_num_rows($email_dealer_post);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullLatestUser = "SELECT * FROM credit_app_fullblown WHERE applicant_did = 23";
$pullLatestUser = mysqli_query($idsconnection_mysqli, $query_pullLatestUser);
$row_pullLatestUser = mysqli_fetch_assoc($pullLatestUser);
$totalRows_pullLatestUser = mysqli_num_rows($pullLatestUser);
?>
<?php
$did = $row_pullLatestUser['cust_dealer_id'];
$uid = $row_pullLatestUser['cust_leadid'];




	$emailSubject = 'NEW LEAD!';
	$webMaster = 'idscrm.com@gmail.com';
	
/* Gathering Data Variables */
	
	$company   = $row_email_dealer_post['company'];
	$uid       = $row_pullLatestUser['cust_leadid'];
	$ufullname = $row_pullLatestUser['cust_nickname'];
	$uphone    = $row_pullLatestUser['cust_phoneno'];
	$uemail    = $row_pullLatestUser['cust_email'];
	$status    = $row_pullLatestUser['cust_status'];
	$createdat = $row_pullLatestUser['cust_lead_created_at'];
	$from = 'IDSCRM Notification';
	
	$body = <<<EOD
<br>
CONGRATULATIONS $company!<br>
<hr><br>
This email is being sent to notify you that a user has just entered their information into your website!<br>
<br>
Here is what we captured for you.<br>
<br>
<strong>Name: $ufullname</strong> <br>
<strong>Phone:</strong> $uphone <br>
<strong>Email:</strong> $uemail <br>
<br>
<br>
<strong>GOODLUCK WITH YOUR NEXT CAR SALE! <br>
EOD;

	$headers = "From: $from\r\n";
	$headers .= "Content-type: text/html\r\n";
	//$headers .= "CC: moneyisnotevil@gmail.com\r\n";
    $headers .= "BCC: idsrobot@idscrm.com\r\n";
	$success = mail($webMaster, $emailSubject, $body, $headers);


/* Results rendered as HTML */

	$theResults = "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>Email Script - Dealer Notifier</title>
</head>

<body>
Email Should Be Sent Go To Thank You Page:
</body>
</html>
";
?>
<?php
mysqli_free_result($email_dealer_post);

mysqli_free_result($pullLatestUser);
?>