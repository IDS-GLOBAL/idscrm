<?php require_once('../../Connections/idsconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Usernamemobi'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Usernamemobi'], $_SESSION['MM_UserGroupmobi'])))) {   
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


$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM `ticket_submit_dlr`";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectDealer = "SELECT id, company, website, status FROM dealers ORDER BY company ASC";
$selectDealer = mysqli_query($idsconnection_mysqli, $query_selectDealer);
$row_selectDealer = mysqli_fetch_array($selectDealer);
$totalRows_selectDealer = mysqli_num_rows($selectDealer);

$colname_queryDealer = "-1";
if (isset($_GET['id'])) {
  $colname_queryDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT id, company FROM dealers WHERE id = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM ids_fees";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);

$colname_lastInvcNum = "-1";
if (isset($_GET['invoice_dealerid'])) {
  $colname_lastInvcNum = $_GET['invoice_dealerid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastInvcNum =  "SELECT * FROM ids_toinvoices WHERE invoice_dealerid = '$colname_lastInvcNum'";
$lastInvcNum = mysqli_query($idsconnection_mysqli, $query_lastInvcNum);
$row_lastInvcNum = mysqli_fetch_array($lastInvcNum);
$totalRows_lastInvcNum = mysqli_num_rows($lastInvcNum);
?>
<?php
// ajax_getlineitem.php?invoiceToken=51c902f554a3229bb76f&lineitem=1&fee_id=1

$feeid=$_GET["fee_id"];
$line=$_GET["lineitem"];
$invoiceToken=$_GET["invoiceToken"];


$dbcon = mysqli_connect('localhost', 'idsids_faith', 'benjamin2831');
if (!$dbcon)
  {
  die('Could not connect: ' . mysqli_error());
  }


$sql="SELECT * FROM idsids_idsdms.ids_fees WHERE fee_id = '".$feeid."' LIMIT 1";

$feeresult = mysqli_query($idsconnection_mysqli, $sql);


if (mysqli_num_rows($feeresult) == 0) { 
	
			echo "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'><input name='lineitem$line' type='hidden' value='$line' /><input type='text' name='fee_description$line' id='fee_description$line' size='25' value='' /></td>
				<td><input name='quantity$line' type='text' id='quantity$line' value='' size='4' onchange='sumForm()' /></td>
				<td><input name='fee_price$line' type='text' id='fee_price$line' value='' size='4' /></td>
				<td><input name='fee_amount$line' type='text' id='fee_amount$line' value='' readonly='readonly' size='4'  onFocus='sumForm()' onchange='sumForm()' onclick='sumForm()' /></td>
				<td><input ";
				                
           echo "name='tax$line' type='checkbox' class='utc' id='tax$line' onchange='sumForm()' /></td>
			  </tr>
			</table>";

} else { 	
			
	while($frow = mysqli_fetch_array($feeresult))
	  {
		$feetaxed = $frow['fee_taxed'];
		$fee_description = $frow['fee_description'];
		$fee_price = $frow['fee_price'];
		$fee_amount = $frow['fee_amount'];
		//$feetaxed = 'Yes';
		$l ='1';

		echo "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'><input name='lineitem$line' type='hidden' value='$line' /><input type='text' name='fee_description$line' id='fee_description$line' size='25' value='$fee_description' /></td>
				<td><input name='quantity$line' type='text' id='quantity$line' value='1' size='4' onchange='sumForm()' /></td>
				<td><input name='fee_price$line' type='text' id='fee_price$line' value='$fee_price' size='4' /></td>
				<td><input name='fee_amount$line' type='text' id='fee_amount$line' value='$fee_amount' readonly='readonly' size='4'  onFocus='sumForm()' onchange='sumForm()' onclick='sumForm()' /></td>
				<td><input ";
				
				 if (!(strcmp("$feetaxed","1"))) {echo "checked=\"checked\"";}  
                
           echo "name='tax$line' type='checkbox' class='utc' id='tax$line' onchange='sumForm()' /></td>
			  </tr>
			</table>";
			
	  }

	}
	
mysqli_close($dbcon);
?>
