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
$query_userDudes =  "SELECT * FROM idsids_idsdms.dudes WHERE dudes_username = ' $colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM idsids_idsdms.ticket_submit_dlr";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectDealer = "SELECT id, company, website, status FROM idsids_idsdms.dealers ORDER BY company ASC";
$selectDealer = mysqli_query($idsconnection_mysqli, $query_selectDealer);
$row_selectDealer = mysqli_fetch_array($selectDealer);
$totalRows_selectDealer = mysqli_num_rows($selectDealer);

$colname_queryDealer = "-1";
if (isset($_GET['id'])) {
  $colname_queryDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT id, company FROM idsids_idsdms.dealers WHERE id = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM idsids_idsdms.ids_fees";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);

$colname_lastInvcNum = "-1";
if (isset($_GET['invoice_dealerid'])) {
  $colname_lastInvcNum = $_GET['invoice_dealerid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastInvcNum =  "SELECT * FROM idsids_idsdms.ids_toinvoices WHERE invoice_dealerid = '$colname_lastInvcNum'";
$lastInvcNum = mysqli_query($idsconnection_mysqli, $query_lastInvcNum);
$row_lastInvcNum = mysqli_fetch_array($lastInvcNum);
$totalRows_lastInvcNum = mysqli_num_rows($lastInvcNum);
?>
<?php
$feeid=$_GET["fee_id"];


$dbcon = mysqli_connect('localhost', 'idsids_faith', 'benjamin2831');
if (!$dbcon)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db($dbcon, "idsids_idsdms");

$sql="SELECT * FROM idsids_idsdms.ids_fees WHERE fee_id = '".$feeid."'";

$feeresult = mysqli_query($idsconnection_mysqli, $sql);


	while($frow = mysqli_fetch_array($feeresult))
	  {
		$feetaxed = $frow['fee_taxed'];
		$fee_description = $frow['fee_description'];
		$fee_price = $frow['fee_price'];
		$fee_amount = $frow['fee_amount'];
		//$feetaxed = 'Yes';

		echo "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'><input type='text' name='fee_description' id='fee_description' size='25' value='$fee_description' /></td>
				<td><input name='quantity' type='text' id='quantity' value='1' size='4' /></td>
				<td><input name='fee_price' type='text' id='fee_price' value='$fee_price' size='4' /></td>
				<td><input name='fee_amount' type='text' id='fee_amount' value='$fee_amount' size='4' /></td>
				<td><input ";
				
				 if (!(strcmp("$feetaxed","1"))) {echo "checked=\"checked\"";}  
                
           echo "name='utc1' type='checkbox' class='utc' id='utc2' /></td>
			  </tr>
			</table>";

	  }




/*
			while($frow = mysql_fetch_array($feeresult))
			  {
			  $notax="NTax";
			  $tax="YTax";
			  echo "<tr>";
			  echo "<td align='center'>";
			  echo "<a href='#' target='_blank'>";
			  echo $frow['fee_taxed'].'<br>';
			  if(!$tax){echo $notax;}else{echo $tax;}
			  echo '<br>'."</a>";
			  echo "</td>";		  
			  echo "</tr>";
			  }
			echo "</table>";
*/
	
mysqli_close($dbcon);
?>