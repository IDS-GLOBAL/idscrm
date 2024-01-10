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
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM `idsids_idsdms`.ticket_submit_dlr";
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
$query_queryDealer =  "SELECT `dealers`.`id`, `dealers`.`company` FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees`";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing | Create Invoice</title>
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
      
      
      
        <!-- gadget left 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Quick contact form</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_quickcontact" class="form_quickcontact">
              <ol>
              invoice_tokenid
              <li>
              
                <label for="invoice_tokenid">Token ID:</label>
                <input id="invoice_tokenid" name="invoice_tokenid" class="text" />
                <div class="clr"></div>
              </li>
              
              <li>
              
                <label for="invoice_dealerid">invoice_dealerid</label>
                <input id="invoice_dealerid" name="invoice_dealerid" class="text" />
                <div class="clr"></div>
              </li>
              
              
              
              <li>
              
                <label for="name">Your name:</label>
                <input id="name" name="name" class="text" />
                <div class="clr"></div>
              </li><li>
                <label for="email">Your contact email:</label>
                <input id="email" name="email" class="text" />
                <div class="clr"></div>
              </li><li>
                <label for="message">Your questons &amp; comments:</label>
                <textarea id="message" name="message" rows="6" cols="50"></textarea>
                <div class="clr"></div>
              </li><li>
                <a href="#" class="gradient37">Contact us now</a>
                <!-- <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> -->
                <div class="clr"></div>
              </li></ol>
              </form>
            </div>
          </div>
        </div>


        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Date &amp; Mail</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <!-- Datepicker -->
              <div id="datepicker"></div>
              <div class="clr"></div>
              <p>&nbsp;&nbsp;<a href="#" class="gradient37">+  Add Event</a>&nbsp;&nbsp;<a href="#" class="gradient37">List Events</a></p>
            </div>
          </div>
        </div>

        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_content">
            <div class="subblock">
              <a href="#"><img src="images/icon_l1.gif" alt="picture" width="32" height="26" class="leftimg" /></a>
              <p class="msg_cnt">12</p><p class="msg_lnk"><a href="#"><strong>Messages &raquo;</strong></a></p>
            </div>
          </div>
        </div>

        <!-- gadget left 3 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dashboard</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <ul class="grayarrow withlines">
                <li class="first"><a href="#">Admin area example</a></li>
                <li><a href="#">Forms and fields area example</a></li>
                <li class="last"><a href="#">Tables area example</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- gadget left 4 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>News of the day</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <a href="#"><img src="images/icon_l2.gif" alt="picture" width="32" height="26" class="leftimg" /></a>
              <h4 class="big">Notice</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting<br /><a href="#"><strong>Learn More &raquo;</strong></a></p>
            </div>
          </div>
        </div>



      
      
      
      
      <?php //include('parts/modules/invoice-left-module.php'); ?>
      
</div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">


        <!-- gadget left 1 -->
        <div class="gadget">
        
        	<?php include("parts/navigation/billing-invoice-navigation.php"); ?>
        
        </div>


        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Invoice Details</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>This Here Is Your Latest Invoices Including Previous Balances, Credits For This Dealer | <a href="invoice-print.php" target="_blank">PDF Invoice.</a></p>
              <table width="100%" border="0" cellspacing="3" cellpadding="3" class="gwlines">
                  <tr>
                    <th>Recurring Invoice Number:</th>
                    <th><input name="invoice_number" type="text" value="" /></th>
                  </tr>
                  <tr>
                    <th>Recurring Invoice Creation Date:</th>
                    <th><input name="invoice_date" type="text" /></th>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <th><select name="invoice_status" id="invoice_status">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="OnHold">OnHold</option>
                    </select></th>
                  </tr>
                  <tr>
                    <th>Create The Next Invoice On:</th>
                    <th><input name="invoice_duedate" type="text" /> 
                      <a href="#">Calendar</a></th>
                  </tr>
                  <tr>
                    <th>After That Create A New Invoice Every:</th>
                    <th><input name="invoice_every" type="text" id="invoice_every" size="4" /> <select name="recurringtype_id" id="recurringtype_id">
                      <option value="month(s)">month(s)</option>
                      <option value="day(s)">day(s)</option>
                      <option value="year(s)">year(s)</option>
                    </select></th>
                  </tr>
                  <tr>
                    <th>Don't Create Any Invoices After:</th>
                    <th><input type="text" name="invoice_recurring_stopdate" id="invoice_recurring_stopdate" />
                      <a href="#">Calendar</a></th>
                  </tr>
                  <tr>
                    <th>Days To Pay Each Invoice</th>
                    <th><input name="daysto_payinvoice" type="text" id="daysto_payinvoice" value="30" size="5" /></th>
                  </tr>
                  <tr>
                    <th>Automatically Charge?</th>
                    <th><input name="invoice_autocharge" type="checkbox" id="invoice_autocharge" value="1" checked="checked" /></th>
                  </tr>

              </table>
              
              
              
            </div>
          </div>
        </div>
        
        
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Add Items Add Discounts</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th>Actions</th>
                <th>Fee Select </th>
                <th>&amp; Description </th>
                <th>Qty.</th>
                <th>Price</th>
                <th>Total</th>
                <th>Taxable</th>
              </tr>
              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option>Select Fee</option>
                  </select></td>
                <td><input type="text" name="fee_description" id="fee_description" /></td>
                <td align="center"><input name="quantity" type="text" id="quantity" size="5" /></td>
                <td><input name="fee_price" type="text" id="fee_price" size="10" /></td>
                <td><input name="fee_amount" type="text" id="fee_amount" size="10" /></td>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
              </tr>

              </table>
              </form>
            </div>
          </div>
        </div>

        
        
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Create Invoice Below</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
            
            <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <th scope="row">Comments: Visible To Client</th>
    <th scope="row">Sub-Total</th>
    <td><input type="text" name="invoice_subtotal" id="invoice_subtotal" /></td>
  </tr>
  <tr>
    <th rowspan="5" scope="row">
    
    	<textarea id="message" name="message" rows="6" cols="50"></textarea>
    
    </th>
    <th scope="row">Sales Tax
      <input name="sales_taxrate" type="text" id="sales_taxrate" size="5" />
      %</th>
    <td><input type="text" name="invoice_taxtotal" id="invoice_taxtotal" /></td>
  </tr>
  <tr>
    <th scope="row">Total</th>
    <td><input type="text" name="invoice_total" id="invoice_total" /></td>
  </tr>
  <tr>
    <th scope="row">Apply Payment</th>
    <td><input type="text" name="applied_payment" id="applied_payment" /></td>
  </tr>
  <tr>
    <th scope="row">Amount Due</th>
    <td><input type="text" name="invoice_amount_due" id="invoice_amount_due" /></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
</table>

            
              
            
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>

        
        
        
<div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Create Invoice Below</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
            
 			<table width="100%" cellpadding="3" cellspacing="3">
            	<tr>
                	<td>
                    
                    
                    <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <th class="gwlines">ID</th>
    <th class="gwlines">Total </th>
    <th class="gwlines">Paid </th>
    <th class="gwlines">Created</th>
    <th class="gwlines">Due</th>
    <th class="gwlines">Status</th>
    </tr>
  <tr>
    <td class="gwlines"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
    <td class="gwlines">&nbsp;</td>
    <td class="gwlines">&nbsp;</td>
    <td align="center" class="gwlines">&nbsp;</td>
    <td class="gwlines">&nbsp;</td>
    <td class="gwlines">&nbsp;</td>
    </tr>
  </table>
                    
                    
                    </td>
                    
                    <td>
                    
                    
                    <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <th class="gwlines">ID</th>
    <th class="gwlines">Invoice ID </th>
    <th class="gwlines">Invoice Amount </th>
    <th class="gwlines">Invoice Type</th>
    <th class="gwlines">Invoice Date</th>
    </tr>
  <tr>
    <td class="gwlines"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
    <td class="gwlines">&nbsp;</td>
    <td class="gwlines">&nbsp;</td>
    <td align="center" class="gwlines">&nbsp;</td>
    <td class="gwlines">&nbsp;</td>
    </tr>
  </table>
                    
                    
                    
                    </td>
                </tr>
            </table>

            
              
            
              <p><a href="#">Learn more &raquo;</a></p>
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

mysqli_free_result($DlrTickets);

mysqli_free_result($selectDealer);

mysqli_free_result($queryDealer);

mysqli_free_result($fees);
?>