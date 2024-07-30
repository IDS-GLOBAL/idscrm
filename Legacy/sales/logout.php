<?php
// *** Logout the current user.
$logoutGoTo = "index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
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
$did = $row_userSets['main_dealerid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querylastcustlead = "SELECT * FROM cust_leads WHERE cust_salesperson_id = $sid ORDER BY cust_lead_created_at DESC";
$querylastcustlead = mysqli_query($idsconnection_mysqli, $query_querylastcustlead);
$row_querylastcustlead = mysqli_fetch_assoc($querylastcustlead);
$totalRows_querylastcustlead = mysqli_num_rows($querylastcustlead);
foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}


$spemail = $row_userSets['salesperson_email'];
$spmphone = $row_userSets['salesperson_mobilephone_number'];
$spactstatus = $row_userSets['acct_status'];
$spfirstname = $row_userSets['salesperson_firstname'];
$splastname = $row_userSets['salesperson_lastname'];
$spweburl = $row_userSets['website_url'];
$spwebhomepage = $row_userSets['salesperson_homepage'];

$clid = $row_querylastcustlead['cust_leadid'];
$clnickname = $row_querylastcustlead['cust_nickname'];
$clphoneno = $row_querylastcustlead['cust_phoneno'];
$clphonetype = $row_querylastcustlead['cust_phonetype'];
$clemail = $row_querylastcustlead['cust_email'];
?>


<?php

		//Here sends the browser header to customer to inventory 
		//with selected customer update query.


		//customer-inventory.php?lead=7
		//customer-inventory.php?lead=$clid
		//header("Location: inventory-edit.php?vid=$vid");
		//header("Location: customer-inventory.php?lead=$clid");

//$vid = $_POST[''];
//$cid = $_POST[''];
//$spcomments = $HTTPPOSTVARS['cust_fname'];
$spcomments = $_POST['cust_fname'];

echo $spcomments;
?>
<?php 

//This is a code to generate tokens and insert into the database record.


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

      //$tsinsert = "INSERT INTO tokens (server_id, token_key, token_type, token_id1, token_id2) VALUES ('1', '$tkey', '0', '7', '0')"; 
        
	//$tsdbinsert = mysqli_query($idsconnection_mysqli, $tsinsert);  

?>
<?php 

//Dealer ID That This Lead Belongs Too Integer:
echo $did.'<br>';

//Sales Person ID That This Lead Belongs Too Integer:
echo $sid.'<br>';

//Sales Persons Customer ID That This Lead Belongs Too Integer:
echo $clid.'<br>';

//Sales Persons Temporary Name Whole String
echo $clnickname.'<br>';

//Customers Phone Number varchar;
echo $clphoneno.'<br>';

//Customers Phone Type From The Sales Person
echo $clphonetype = $row_querylastcustlead['cust_phonetype'].'<br>';

//Customers Email Collected By Sales Person;
echo $clemail.'<br>';

//This is the Unique Token For Customers, Customer Leads, Websites, Vehicles, Sales Person, Dealers, Token For Email Purposes
echo $tkey.'<br>';

?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<p>
This is a Test Page</p>
<p></p>
<p><a href="loguot.php">Log Out User</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
</p>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($querylastcustlead);
?>