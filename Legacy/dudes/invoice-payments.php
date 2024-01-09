<?php require_once('../Connections/idsconnection.php'); ?>
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
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";


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
if (isset($_GET['id'])) {
  $colname_queryDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT `id`, `company` FROM `idsids_idsdms`.`dealers` WHERE dealers`.`id` = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoices = "SELECT * FROM ids_toinvoices_recurring";
$queryInvoices = mysqli_query($idsconnection_mysqli, $query_queryInvoices);
$row_queryInvoices = mysqli_fetch_array($queryInvoices);
$totalRows_queryInvoices = mysqli_num_rows($queryInvoices);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_payments = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.payment_status IN('Paid','Partial') AND ids_toinvoices.invoice_dealerid = dealers.id ORDER BY dudes_id_rcvdpymtwhn DESC";
$query_payments = mysqli_query($idsconnection_mysqli, $query_query_payments);
$row_query_payments = mysqli_fetch_array($query_payments);
$totalRows_query_payments = mysqli_num_rows($query_payments);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing | Invoices</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>


<div class="container">

  <!-- HEADER -->
  
  <?php include('parts/header.php'); ?>

  <!-- CONTENT -->
  
  
  
  
  
  <div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
			<?php include('parts/modules/billing-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">
		
        <!-- Invoice Navigation -->
        <div class="gadget">
        
        	<?php include("parts/navigation/billing-invoice-navigation.php"); ?>
        
        </div>

      <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Payments</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>This Here Is Your Latest Invoices Including Previous Balances, Credits For This Dealer | Start A New Invoice For A Dealer (account).</p>
              <table width="100%" border="1" cellspacing="3" cellpadding="3">
                <tr class="em_orange">
                  <th scope="col">Invoice ID</th>
                  <th scope="col">Inv. No</th>                  
                  <th scope="col">Dealer</th>
                  <th scope="col">Credit</th>
                  <th scope="col">Amount Paid</th>
                  <th scope="col">Pymt. Status</th>
                  <th scope="col">When Rcvd.</th>
                  <th scope="col">Action</th>
                  <th scope="col">Edit</th>
                </tr>
                <?php do { ?>
                    <?php if ($totalRows_query_payments > 0) { // Show if recordset not empty ?>
                    <tr>
                      <td>
                      <a href="view-payment.php?payment_id=<?php echo $row_query_payments['invoice_id']; ?>"><?php echo $row_query_payments['invoice_id']; ?></a>
                      <!--input name="utc1" id="utc2" type="checkbox" class="utc" / -->
                      </td>
                      <td><?php echo $row_query_payments['invoice_number']; ?></td>                      
                      <td><?php echo $row_query_payments['invoice_dealerid']; ?></td>
                      <td><?php if(!$row_query_payments['credit_amount']){ echo '$ 0.00';}else echo $row_query_payments['credit_amount']; ?></td>
                      <td><?php echo $row_query_payments['payment_type']; ?>: <?php echo $row_query_payments['paid_amount']; ?></td>
                      <td><?php echo $row_query_payments['payment_status']; ?></td>
                      <td><?php echo $row_query_payments['dudes_id_rcvdpymtwhn']; ?></td>
                  <td width="28"><a href="view-payment.php?payment_id=<?php echo $row_query_payments['invoice_id']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td width="28"><a href="view-payment.php?payment_id=<?php echo $row_query_payments['invoice_id']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                      
                    </tr>
                    <?php } // Show if recordset not empty ?>
<?php } while ($row_query_payments = mysqli_fetch_array($query_payments)); ?>
                <?php if ($totalRows_queryInvoices == 0) { // Show if recordset empty ?>
                  <tr>
                    <td>No Fees Available</td>
                    <td>&nbsp;</td>
                    <td>No Fees Available</td>
                    <td>No Fees Available</td>
                    <td>?</td>
                    <td>No Fees Available</td>
                    <td>No Fees Available</td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php } // Show if recordset empty ?>
              </table>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>  
        

        
      </div>


	
      <div class="clr"></div>
    </div>
  </div>
  <?php //include('parts/content-form-billing.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
  
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

mysqli_free_result($query_payments);

?>
