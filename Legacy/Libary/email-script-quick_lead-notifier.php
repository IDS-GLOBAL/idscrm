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
$query_email_dealer_post = "SELECT * FROM dealers WHERE id = $did";
$email_dealer_post = mysqli_query($idsconnection_mysqli, $query_email_dealer_post);
$row_email_dealer_post = mysqli_fetch_assoc($email_dealer_post);
$totalRows_email_dealer_post = mysqli_num_rows($email_dealer_post);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullLatestAPPdlr = "SELECT * FROM credit_app_fullblown WHERE applicant_did = $did ORDER BY credit_app_fullblown_id DESC";
$pullLatestAPPdlr = mysqli_query($idsconnection_mysqli, $query_pullLatestAPPdlr);
$row_pullLatestAPPdlr = mysqli_fetch_assoc($pullLatestAPPdlr);
$totalRows_pullLatestAPPdlr = mysqli_num_rows($pullLatestAPPdlr);
?>
<?php
$didapp = $row_pullLatestAPPdlr['applicant_did'];
   $uid = $row_pullLatestAPPdlr['cust_leadid'];

	$demail = $row_email_dealer_post['email'];


	$emailSubject = 'Submitted Credit APP!';
	$to = "$demail";
	
/* Gathering Data Variables */
	
	$company   = $row_email_dealer_post['company'];
	$uid       = $row_pullLatestAPPdlr['cust_leadid'];
	$ufullname = $row_pullLatestAPPdlr['applicant_name'];
	$uphone    = $row_pullLatestAPPdlr['applicant_main_phone'];
	$uemail    = $row_pullLatestAPPdlr['applicant_email_address'];
	$token     = $row_pullLatestAPPdlr['applicant_app_token'];
	$jointrindv = $row_pullLatestAPPdlr['joint_or_invidividual'];
	$createdat = $row_pullLatestAPPdlr['cust_lead_created_at'];
	$from = "IDSCRM Notification <idsrobot@idscrm.com>";
	
	$body = <<<EOD
<br>
CONGRATULATIONS $company!<br>
<hr><br>
<img src="http://idscrm.com/dealer/css/themes/blueberry/images/logo.png" /><br>
<br>
This email is being sent to notify you that a user <br>
has just entered their information online! <br>
<br>
<br>
This Message Has Been Brought To You By IDSCRM.COM<br>
<br>
<br>
<strong>$ufullname</strong><br>
<strong>$uphone</strong><br>
<strong>$uemail</strong><br>
<br>
<br>
<strong>GOODLUCK WITH YOUR NEXT CAR SALE!</strong><br>
<a href="http://idscrm.com/dealer/index.php">CLICK HERE Visit Your Account</a><br>
EOD;

	$headers = "From: $from\r\n";
	$headers .= "Content-type: text/html\r\n";
	//$headers .= "CC: idscrm.com@gmail.com\r\n";
    $headers .= "BCC: idscrm.com@gmail.com\r\n";
	$success = mail($to, $emailSubject, $body, $headers);


/* Results rendered as HTML */

	$theResults = <<<EOD

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Email Script - Dealer Notifier</title>
</head>

<body>
Email Should Be Sent Go To Thank You Page:
</body>
</html>
<?php
EOD;
mysqli_free_result($email_dealer_post);

mysqli_free_result($pullLatestAPPdlr);
?>
