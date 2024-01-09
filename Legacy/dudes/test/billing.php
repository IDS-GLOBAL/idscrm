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

$MM_restrictGoTo = "../index.php";
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
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('m\-d\-Y\ ');

}

function get_Datetime_Now2() {
	$tz_object2 = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime2 = new DateTime();
	$datetime2->setTimezone($tz_object2);
	return $datetime2->format('m\-d\-Y\ h:i:s');
	//return $datetime2->format('m\-d\-Y\ ');

}

$timevar = get_Datetime_Now();
$timevar2 = get_Datetime_Now2();

$nowdate = date('m/d/Y');

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM dealers_pending ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM ticket_submit_dlr";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectDealer = "SELECT id, company, website, status FROM dealers ORDER BY company ASC";
$selectDealer = mysqli_query($idsconnection_mysqli, $query_selectDealer);
$row_selectDealer = mysqli_fetch_array($selectDealer);
$totalRows_selectDealer = mysqli_num_rows($selectDealer);

$colname_queryDealer = "-1";
if (isset($_GET['did'])) {
  $colname_queryDealer = $_GET['did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT * FROM dealers WHERE id = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_lateInvoices = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.invoice_dealerid = dealers.id AND ids_toinvoices.invoice_duedate < '$nowdate' AND ids_toinvoices.payment_status not IN ('Paid')";
$query_lateInvoices = mysqli_query($idsconnection_mysqli, $query_query_lateInvoices);
$row_query_lateInvoices = mysqli_fetch_array($query_lateInvoices);
$totalRows_query_lateInvoices = mysqli_num_rows($query_lateInvoices);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoices = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.invoice_dealerid = dealers.id AND ids_toinvoices.payment_status IN('UnPaid','Partial') ORDER BY invoice_id DESC";
$queryInvoices = mysqli_query($idsconnection_mysqli, $query_queryInvoices);
$row_queryInvoices = mysqli_fetch_array($queryInvoices);
$totalRows_queryInvoices = mysqli_num_rows($queryInvoices);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_payments = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.payment_status IN('Paid','Partial') AND ids_toinvoices.invoice_dealerid = dealers.id ORDER BY dudes_id_rcvdpymtwhn ASC";
$query_payments = mysqli_query($idsconnection_mysqli, $query_query_payments);
$row_query_payments = mysqli_fetch_array($query_payments);
$totalRows_query_payments = mysqli_num_rows($query_payments);

?>
<?php

function daysLate ($latedate){

//$nowdate = '07/15/2013';
$nowdate = date('m/d/Y');

$startme = strtotime("$nowdate");
$endme = strtotime("$latedate");

$days_between = ceil(abs($endme - $startme) / 86400);
	
	if("$startme" >= "$endme"){
	echo $days_between;
	}else{
		echo '0';
	}

}


//	US national format, using () for negative numbers
setlocale(LC_MONETARY, 'en_US.UTF-8');


// Function To Calculate Money without commas.
function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number);
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing | Invoices</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="../style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="../js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../js/js.js"></script>
</head>
<body>


<div class="container">

  <!-- HEADER -->
  
  <?php include('../parts/header.php'); ?>

  <!-- CONTENT -->
  
  
  
  
  
  <div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
      <?php include('../parts/modules/billing-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">
		
        
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="../images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3><?php echo $totalRows_query_lateInvoices ?> - Latest Overdue Invoices as of: <?php echo $timevar2; ?> </h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>No.</th>
                <th>Dealer Name</th>
                <th>Pymt Status</th>
                <th>Amount Due</th>
                <th>Due Date</th>
                <th>Days Late</th>
                <th>Last Edited</th>
                <th colspan="2">Actions</th>
              </tr>
              <?php do { ?>
              <?php 
			  //$invoice_amount_due=$row_query_lateInvoices['invoice_amount_due'];
			  //formatMoney($invoice_amount_due , true);    //Actual Cash Value of Trade
			  
			  ?>
                <tr>
                  <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                  <td><a href="../update-invoice.php?invoice_id=<?php echo $row_query_lateInvoices['invoice_id']; ?>"><?php echo $row_query_lateInvoices['invoice_number']; ?></a></td>
                  <td><?php echo $row_query_lateInvoices['invoice_dealerid']; ?> - <?php echo $row_query_lateInvoices['company']; ?> </td>
                  <td><?php echo $row_query_lateInvoices['payment_status']; ?></td>
                  <td>$ <?php echo formatMoney($row_query_lateInvoices['invoice_amount_due'] , true);  ?></td>
                  <td><?php echo $row_query_lateInvoices['invoice_duedate']; ?></td>
                  <td><?php echo daysLate ($row_query_lateInvoices['invoice_duedate']); ?></td>
                  <td><a href="#" target="_parent"><?php if ($row_query_lateInvoices['dudes_id_lastmodified'] == 0){ echo 'Not Edited';}else{ echo $row_query_lateInvoices['dudes_id_lastmodified'];} ?> <?php echo $row_query_lateInvoices['invoice_lastmodified']; ?></a></td>
                  <td width="28"><a href="../update-invoice.php?invoice_id=<?php echo $row_query_lateInvoices['invoice_id']; ?>"><img src="../images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td width="28"><a href="../update-invoice.php?invoice_id=<?php echo $row_query_lateInvoices['invoice_id']; ?>"><img src="../images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                </tr>
                <?php } while ($row_query_lateInvoices = mysqli_fetch_array($query_lateInvoices)); ?>
              </table>
              </form>
            </div>
          </div>
        </div>

        
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="../images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3><?php echo $totalRows_queryInvoices; ?>  - UnPaid &amp; Partial <span class="subblock"><strong>Invoices</strong></span> </h3>
          </div>
          <div class="gadget_content">
            
            
            <div class="subblock"><br />

              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="gwlines">
              <tr>
                <th><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>No.</th>
                <th>Dealership</th>
                <th>Amount Due</th>
                <th>Created</th>
                <th>Due Date</th>
                <th>Late</th>                
                <th>Pymt. Status</th>
                <th>Balance</th>
              </tr>
              <?php if ($totalRows_queryInvoices > 0) { // Show if recordset not empty ?>
			  <?php do { ?>
  <tr>
    <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
    <td>
        <a href="../update-invoice.php?invoice_id=<?php echo $row_queryInvoices['invoice_id']; ?>"/><?php echo $row_queryInvoices['invoice_number']; ?></a>
    <td><?php echo $row_queryInvoices['invoice_dealerid']; ?> - <?php echo $row_queryInvoices['company']; ?></td>
    <td>$ <?php echo formatMoney($row_queryInvoices['invoice_amount_due'], true); ?></td>
    <td><?php echo $row_queryInvoices['invoice_created_at']; ?></td>
    <td><?php echo $row_queryInvoices['invoice_duedate']; ?></td>
    <td><?php echo daysLate($row_queryInvoices['invoice_duedate']); ?></td>    
    <td><?php if(!$row_queryInvoices['payment_status']){echo 'UnPaid'; }else{ echo $row_queryInvoices['payment_status']; } ?></td>
    <td>$ <?php echo formatMoney($row_queryInvoices['paymentBalance'], true); ?></td>
  </tr>
        <?php } while ($row_queryInvoices = mysqli_fetch_array($queryInvoices)); ?></td>
  
  <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_queryInvoices == 0) { // Show if recordset empty ?>
                <tr>
                  <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>&nbsp;</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td> N/A</td>
                </tr>
                <?php } // Show if recordset empty ?>
              </table>
              </form>
            </div>
            
            
            <div class="subblock">
            <strong><?php echo $totalRows_query_payments ?> - Payments</strong><br />

              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th ><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>ID.</th>
                <th>No.</th>
                <th>Dealership </th>
                <th>Credit</th>
                <th>Amount Paid</th>
                <th>Balance</th>
                <th>Pymt. Status</th>
                <th>Recvd. When</th>
              </tr>
          
                <?php do { ?>
                    <?php if ($totalRows_query_payments > 0) { // Show if recordset not empty ?>
                    
                    <?php $paymentBalance=formatMoney($row_query_payments['paymentBalance'], true); ?>
                    
                    
  <tr>
    <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
    <td><?php echo $row_query_payments['invoice_id']; ?></td>
    <td><?php echo $row_query_payments['invoice_number']; ?></td>
    <td><?php echo $row_query_payments['company']; ?></td>
    <td><?php if(!$row_query_payments['credit_amount']){ echo '$ 0.00';}else echo '$ '.formatMoney($row_query_payments['credit_amount'], true); ?></td>
    <td><?php echo $row_query_payments['payment_type']; ?>: $ <?php echo formatMoney($row_query_payments['paid_amount'], true); ?></td>
    <td>
      $ <?php echo $paymentBalance; ?>
    </td>
    <td><a href="../view-payment.php?payment_id=<?php echo $row_query_payments['invoice_id']; ?>"><?php echo $row_query_payments['payment_status']; ?></a></td>
    <td><?php echo $row_query_payments['dudes_id_rcvdpymtwhn']; ?></td>
  </tr>
  <?php } // Show if recordset not empty ?>
<?php } while ($row_query_payments = mysqli_fetch_array($query_payments)); ?>
                  <?php if ($totalRows_query_payments == 0) { // Show if recordset empty ?>
                    <tr>
                      <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                      <td>&nbsp;</td>
                      <td>No Payments</td>
                      <td>Dealership</td>
                      <td>No Payments</td>
                      <td>No Payments</td>
                      <td>No Payments</td>
                      <td>No Payments</td>
                      <td>No Payments</td>
                    </tr>
                    <?php } // Show if recordset empty ?>
              </table>
              </form>
            </div>
            
            
          </div>
        </div>
        
        
        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="../images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Create Your Invoices Here</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>This Here Is Your Latest Invoices Including Previous Balances, Credits For This Dealer | Start A New Invoice For A Dealer (account).</p>
              <p><a href="../create-invoice.php">Create Invoice &raquo;</a></p>
            </div>
          </div>
        </div>
        

        
      </div>

      <div class="clr"></div>
    </div>
  </div>
  <?php //include('../parts/content-form-billing.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('../parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('../parts/dialogs.php'); ?>
  
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealers_pend);

mysqli_free_result($DlrTickets);

mysqli_free_result($selectDealer);

mysqli_free_result($queryDealer);

mysqli_free_result($queryInvoices);

mysqli_free_result($query_lateInvoices);

mysqli_free_result($query_payments);
?>