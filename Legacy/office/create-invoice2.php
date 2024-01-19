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
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

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
$query_queryDealer =  "SELECT id, company FROM dealers WHERE id = %s", GetSQLValueString($colname_queryDealer, "int"));
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
$query_lastInvcNum =  "SELECT * FROM ids_toinvoices WHERE invoice_dealerid = %s", GetSQLValueString($colname_lastInvcNum, "int"));
$lastInvcNum = mysqli_query($idsconnection_mysqli, $query_lastInvcNum);
$row_lastInvcNum = mysqli_fetch_array($lastInvcNum);
$totalRows_lastInvcNum = mysqli_num_rows($lastInvcNum);
?>
<?php


$lastinvoiceno = $row_lastInvcNum['invoice_number'];

//$lastdealno = $row_lastDlrdeal['deal_number'];

if(!$lastinvoiceno){
	$lastinvoiceno = 1;
}else{
	$lastinvoiceno = ($lastinvoiceno + 1);
}



?>
<?php

@$i = '1';

 @$itemline.$i = "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'><input type='text' name='fee_description' id='fee_description' size='25' value='$i' /></td>
				<td><input name='quantity' type='text' id='quantity' size='4' /></td>
				<td><input name='fee_price' type='text' id='fee_price' size='4' /></td>
				<td><input name='fee_amount' type='text' id='fee_amount' size='4' /></td>
				<td><input name='utc1' id='utc2' type='checkbox' class='utc' /></td>
			  </tr>
			</table>";



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



<script>

function showFee1(str)

{

if (str=="")

  {

  document.getElementById("lineitem1").innerHTML="";

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("lineitem1").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","ajaxEnviro/ajax_getlineitem.php?fee_id="+str,true);

xmlhttp.send();

}




function showFee2(str)

{

if (str=="")

  {

  document.getElementById("lineitem2").innerHTML="";

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("lineitem2").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","ajaxEnviro/ajax_getlineitem.php?fee_id="+str,true);

xmlhttp.send();

}




function showFee3(str)

{

if (str=="")

  {

  document.getElementById("lineitem3").innerHTML="";

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("lineitem3").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","ajaxEnviro/ajax_getlineitem.php?fee_id="+str,true);

xmlhttp.send();

}

</script>

<!-- END Vehicle Ajax Script -->


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

?invoice_dealerid=85
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
                    <th>Invoice Number:</th>
                    <th><input name="invoice_number" type="text" value="<?php echo $lastinvoiceno; ?>" /></th>
                  </tr>
                  <tr>
                    <th>Invoice Date:</th>
                    <th><input name="invoice_date" type="text" /> <a href="#">Calendar</a></th>
                  </tr>
                  <tr>
                    <th>Due Date:</th>
                    <th><input name="invoice_duedate" type="text" /> <a href="#">Calendar</a></th>
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
                    <th>Sent To Client</th>
                    <th><input name="invoice_sentclient" type="text" /></th>
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
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines2">
              <tr>
                <th width="60px">Actions</th>
                <th width="220px">Fee Select </th>
                <th width="180px">&amp; Description </th>
                <th width="80px">Qty.</th>
                <th width="90px">Price</th>
                <th width="52px">Total</th>
                <th>Taxable</th>
              </tr>
              
              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id" onchange="showFee1(this.value)">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id" onchange="showFee2(this.value)">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem2">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id" onchange="showFee3(this.value)">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem3">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                <?php echo @$itemline.$i; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id" id="fee_id">
                    <option value="">Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
<input type="text" name="fee_description" id="fee_description" />                  <input name="quantity" type="text" id="quantity" size="5" />                  <input name="fee_price" type="text" id="fee_price" size="10" />                  <input name="fee_amount" type="text" id="fee_amount" size="10" />                  <input <?php if (!(strcmp("$feetaxed","Yes"))) {echo "checked=\"checked\"";} ?> name="utc1" type="checkbox" class="utc" id="utc2" />
				</div>
                  
                

                
                
                </td>
                
                
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

mysqli_free_result($lastInvcNum);
?>