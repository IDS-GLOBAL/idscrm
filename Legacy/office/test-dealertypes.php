<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/wfh_connection.php'); ?>
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



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_invoice_dealer = "SELECT * FROM `ids_toinvoices_recurring`, `dealers` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` AND `dealers`.`id` = '$ldid' AND `ids_toinvoices_recurring`.`invoice_date` = '$now_dateonly' AND `ids_toinvoices_recurring`.`invoice_id` = '$reocurring_template_id' ORDER BY `ids_toinvoices_recurring`.`invoice_id` ASC";
$invoice_dealer = mysqli_query($idsconnection_mysqli, $query_invoice_dealer);
$row_invoice_dealer = mysqli_fetch_array($invoice_dealer);
$totalRows_invoice_dealer = mysqli_num_rows($invoice_dealer);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfh_approvaldeals = "SELECT * FROM wfhuser_approvals_perms, wfhuser_approvals WHERE wfhuser_approvals_perms.wfhuserperm_approval_id AND wfhuser_approvals.wfhuser_approval_id ORDER BY wfhuser_approvals_perms.wfhuserperm_created_at DESC";
$wfh_approvaldeals = mysqli_query($idsconnection_mysqli, $query_wfh_approvaldeals, $wfh_connection);
$row_wfh_approvaldeals = mysqli_fetch_array($wfh_approvaldeals);
$totalRows_wfh_approvaldeals = mysqli_num_rows($wfh_approvaldeals);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhlatest_fbusrs = "SELECT * FROM wfhuserprofile ORDER BY wfhuserprofile.applicant_digital_signature_date DESC";
$wfhlatest_fbusrs = mysqli_query($idsconnection_mysqli, $query_wfhlatest_fbusrs, $wfh_connection);
$row_wfhlatest_fbusrs = mysqli_fetch_array($wfhlatest_fbusrs);
$totalRows_wfhlatest_fbusrs = mysqli_num_rows($wfhlatest_fbusrs);



//////////////////////// This is the start of the Inside LOOP incase ////////////////////////////////////
//echo '<br />'."===========================================".'<br />';


//do{
	$invoice_amount_due = '';
	$invoice_number = '';
	


	$reocurring_template_2id = $row_invoice_dealer['invoice_id'];
	$invoice_latefee = $row_invoice_dealer['invoice_latefee'];

	$invoice_typeid = $row_invoice_dealer['invoice_typeid'];
	$invoice_dealerid = $row_invoice_dealer['invoice_dealerid'];
	$invoice_status = $row_invoice_dealer['invoice_status'];
	

	
		$invoice_date = $row_invoice_dealer['invoice_date'];

		$invoice_date_humanread = date("m/d/Y", strtotime($invoice_date));
		
		

		$invc_cret_evry = $row_invoice_dealer['invc_cret_evry'];
		
	   	$invc_cret_evrywhn = $row_invoice_dealer['invc_cret_evrywhn'];
		//$invc_cret_evrywhn = str_replace('s', '', $invc_cret_evrywhn);


		echo 'Next Invoice StartDate: ';
		echo $next_invoice_startdate = date('Y-m-d', strtotime("+$invc_cret_evry $invc_cret_evrywhn"));

		echo '<br />';


		echo 'Next Invoice Future DueDate: ';
		echo $next_future_invoiceduedate = date('Y-m-d', strtotime("$next_invoice_startdate +$invc_cret_evry $invc_cret_evrywhn"));




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<?php do { ?>
  <p><?php echo $row_wfhlatest_fbusrs['wfhuser_id']; ?></p>
  <?php } while ($row_wfhlatest_fbusrs = mysqli_fetch_array($wfhlatest_fbusrs)); ?>
</body>
</html>
<?php
mysqli_free_result($invoice_dealer);

mysqli_free_result($wfh_approvaldeals);

mysqli_free_result($wfhlatest_fbusrs);
?>
