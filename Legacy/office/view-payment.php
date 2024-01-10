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
$query_dealers_pend = "SELECT * FROM `idsids_idsdms`.`dealers_pending` ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr`";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectDealer = "SELECT id, company, website, status FROM `idsids_idsdms`.`dealers` ORDER BY company ASC";
$selectDealer = mysqli_query($idsconnection_mysqli, $query_selectDealer);
$row_selectDealer = mysqli_fetch_array($selectDealer);
$totalRows_selectDealer = mysqli_num_rows($selectDealer);

$colname_queryDealer = "-1";
if (isset($_GET['id'])) {
  $colname_queryDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT id, company FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoices = "
SELECT *
FROM `idsids_idsdms`.`ids_toinvoices`
LEFT JOIN `idsids_idsdms`.`dealers` 
ON `ids_toinvoices`.`invoice_dealerid` = `dealers`.`id`
WHERE
`dealers`.`id` = '$colname_queryDealer'
GROUP BY
  `ids_toinvoices`.`invoice_id`
  ORDER BY `ids_toinvoices`.`invoice_id` ASC";
$queryInvoices = mysqli_query($idsconnection_mysqli, $query_queryInvoices);
$row_queryInvoices = mysqli_fetch_array($queryInvoices);
$totalRows_queryInvoices = mysqli_num_rows($queryInvoices);

$colname_query_invoice = "-1";
if (isset($_GET['payment_id'])) {
  $colname_query_invoice = $_GET['payment_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_invoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `ids_toinvoices`.`invoice_id` = '$colname_query_invoice'";
$query_invoice = mysqli_query($idsconnection_mysqli, $query_query_invoice);
$row_query_invoice = mysqli_fetch_array($query_invoice);
$totalRows_query_invoice = mysqli_num_rows($query_invoice);



$nowdate = date('m/d/Y');

?>
<?php include('../Libary/function_Datetime_Now.php'); ?>
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

<style>

#myjumpMenu { width:400px; }

</style>
<script type="text/javascript">
function sumPayment() {


var paid_amount = document.post_payment.paid_amount.value;
//alert(paid_amount);
var AmountDue = document.post_payment.AmountDue.value;

var result = (paid_amount -0) - (AmountDue -0);

var zero = '0.00';

if (result >= 0) {
	//alert(result);

	document.post_payment.credit_amount.value = result.toFixed(2);
	document.post_payment.paymentBalance.value =  zero;

	document.post_payment.payment_status.value = 'Paid';

}else{
	
	document.post_payment.credit_amount.value = zero;
	
	var result2 = (AmountDue -0) - (paid_amount -0);
	
	document.post_payment.paymentBalance.value = result2.toFixed(2); 

	document.post_payment.payment_status.value = 'Partial'; 
}


// Right Here Goes the dynamic loop for credit to be applied here for that the next loop will not have credit.  If credit does exist it will cancel out any credit due.




}


$(function(){
 var keyStop = {
   8: ":not(input:text, textarea, input:file, input:password)", // stop backspace = back
   13: "input:text, input:password", // stop enter = submit 

   end: null
 };
 $(document).bind("keydown", function(event){
  var selector = keyStop[event.which];

  if(selector !== undefined && $(event.target).is(selector)) {
      event.preventDefault(); //stop event
  }
  return true;
 });
});
</script>

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
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Payment Setup</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
  
              <form action="" id="post_payment" name="post_payment" method="POST">
                <table width="100%" border="0" cellspacing="3" cellpadding="3">
                  <tr>
                    <th scope="row">Invoice
                    <input name="invoice_id" type="hidden" id="invoice_id" value="<?php echo $row_query_invoice['invoice_id']; ?>" /></th>
                    <td><select name="myjumpMenu" id="myjumpMenu">
                      <option value="create-payment.php?invoice_id=0" <?php if (!(strcmp("", $row_query_invoice['invoice_id']))) {echo "selected=\"selected\"";} ?>>Select Invoice</option>
                      <?php do {  ?>
                      <option value="create-payment.php?invoice_id=<?php echo $row_queryInvoices['invoice_id']?>"<?php if (!(strcmp($row_queryInvoices['invoice_id'], $row_query_invoice['invoice_id']))) {echo "selected=\"selected\"";} ?>>ID: <?php echo $row_queryInvoices['invoice_id']?> | <?php echo $row_queryInvoices['invoice_number']?> $<?php echo $row_queryInvoices['invoice_amount_due']; ?> - <?php echo $row_queryInvoices['company']; ?> <?php echo $row_queryInvoices['invoice_status']; ?></option>
                      <?php
} while ($row_queryInvoices = mysqli_fetch_array($queryInvoices));
  $rows = mysqli_num_rows($queryInvoices);
  if($rows > 0) {
      mysqli_data_seek($queryInvoices, 0);
	  $row_queryInvoices = mysqli_fetch_array($queryInvoices);
  }
?>
                    </select>                      
                    <!--input type="button" name="go_button" id= "go_button" value="Go" onclick="MM_jumpMenuGo('myjumpMenu','parent',0)" / --></td>
                  </tr>
                  <?php if ($totalRows_query_invoice > 0) { // Show if recordset not empty ?>
  <tr>
    <th>Invoice Status</th>
    <td>
     <select name="invoice_status" id="invoice_status">
       <option value="Active" <?php if (!(strcmp("Active", $row_query_invoice['invoice_status']))) {echo "selected=\"selected\"";} ?>>Active</option>
       <option value="Inactive" <?php if (!(strcmp("Inactive", $row_query_invoice['invoice_status']))) {echo "selected=\"selected\"";} ?>>Inactive</option>
<option value="OnHold" <?php if (!(strcmp("OnHold", $row_query_invoice['invoice_status']))) {echo "selected=\"selected\"";} ?>>OnHold</option>
              </select>
              
      <input name="invoice_dealerid" type="text" disabled="disabled" id="invoice_dealerid" value="<?php echo $row_query_invoice['invoice_dealerid']; ?>" readonly="readonly" /></td>
  <tr>
    <th scope="row">Payment Type</th>
    <td><select name="payment_type" id="payment_type">
      <option value="Select" <?php if (!(strcmp("Select", $row_query_invoice['payment_type']))) {echo "selected=\"selected\"";} ?>></option>
      <option value="Creditcard" <?php if (!(strcmp("Creditcard", $row_query_invoice['payment_type']))) {echo "selected=\"selected\"";} ?>>Creditcard</option>
      <option value="Cash" <?php if (!(strcmp("Cash", $row_query_invoice['payment_type']))) {echo "selected=\"selected\"";} ?>>Cash</option>
      <option value="Check" <?php if (!(strcmp("Check", $row_query_invoice['payment_type']))) {echo "selected=\"selected\"";} ?>>Check</option>
<option value="PayPal" <?php if (!(strcmp("PayPal", $row_query_invoice['payment_type']))) {echo "selected=\"selected\"";} ?>>PayPal</option>
    </select></td>
  </tr>
                    <tr>
                      <th scope="row">Credit Card</th>
                      <td><select name="creditCardslct" id="creditCardslct">
                        <option value="New">New Card</option>
                      </select></td>
                    </tr>
                    <tr>
                      <th scope="row">Check Number:</th>
                      <td><input name="check_number" type="text" disabled="disabled" id="check_number" value="<?php echo $row_query_invoice['check_number']; ?>" /></td>
                    </tr>                  
                    <tr>
                      <th scope="row">Paying Amount</th>
                      <td><input name="paid_amount" type="text" disabled="disabled" id="paid_amount" onchange="sumPayment()" value="<?php echo $row_query_invoice['paid_amount']; ?>" />  Amount Due: $<input name='AmountDue' disabled="disabled" style="border:0px; background:none;" value="<?php echo $row_query_invoice['invoice_amount_due']; ?>" readonly="readonly" /></td>
                    </tr>
                    <tr>
                      <th scope="row">Payment Status</th>
                      <td><input name="payment_status" type="text" disabled="disabled" id="payment_status" value="<?php echo $row_query_invoice['payment_status']; ?>" readonly="readonly">
                      
                      
                      Credit: $<input name="credit_amount" type="text" disabled="disabled" id="credit_amount" style="border:0px; background:none;" value="<?php echo $row_query_invoice['credit_amount']; ?>" /> 
                      
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Balance:</th>
                      <td><input name="paymentBalance"  type="text" disabled="disabled" id="paymentBalance" value="<?php echo $row_query_invoice['paymentBalance']; ?>" readonly="readonly"></td>
                    </tr>
                    <tr>
                      <th scope="row">Notes</th>
                      <td><textarea name="paymentNotes" cols="45" rows="5" disabled="disabled" id="paymentNotes"><?php echo $row_query_invoice['paymentNotes']; ?></textarea></td>
                    </tr>
                    <tr>
                      <th scope="row"><input name="dudes_id_rcvdpymt" type="hidden" id="dudes_id_rcvdpymt" value="<?php echo $dudesid; ?>" /> <input name="dudes_id_rcvdpymtwhn" type="hidden" id="dudes_id_rcvdpymtwhn" value="<?php echo $nowdate; ?>" /></th>
                      <td>
                      <!-- input type="submit" name="submit" id="submit" value="Submit"/ --></td>
                    </tr>
                    <?php } // Show if recordset not empty ?>
                </table>
                <input type="hidden" name="MM_update" value="post_payment" />
              </form>
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

mysqli_free_result($query_invoice);
?>
