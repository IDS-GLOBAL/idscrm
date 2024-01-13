<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/tracking.php'); ?>
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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_dlr_update")) {
  $updateSQL =  sprintf("UPDATE dealer_prospects SET dudes_id=%s, dudes2_id=%s, support_rep_id=%s, contact=%s, contact_phone=%s, contact_phone_type=%s, dmcontact2=%s, dmcontact2_phone=%s, company=%s, website=%s, finance=%s, finance_contact=%s, sales=%s, sales_contact=%s, phone=%s, fax=%s, address=%s, city=%s, `state`=%s, zip=%s, mapframe=%s, disclaimer=%s, status=%s WHERE id=%s",
                       GetSQLValueString($_POST['dudes_id'], "int"),
                       GetSQLValueString($_POST['dudes2_id'], "int"),
                       GetSQLValueString($_POST['support_rep_id'], "int"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['contact_phone'], "text"),
                       GetSQLValueString($_POST['contact_phone_type'], "text"),
                       GetSQLValueString($_POST['dmcontact2'], "text"),
                       GetSQLValueString($_POST['dmcontact2_phone'], "text"),
                       GetSQLValueString($_POST['company'], "text"),
                       GetSQLValueString($_POST['website'], "text"),
                       GetSQLValueString($_POST['finance'], "text"),
                       GetSQLValueString($_POST['finance_contact'], "text"),
                       GetSQLValueString($_POST['sales'], "text"),
                       GetSQLValueString($_POST['sales_contact'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['fax'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['zip'], "text"),
                       GetSQLValueString($_POST['mapframe'], "text"),
                       GetSQLValueString($_POST['disclaimer'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tracking);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "script_dealer-prospect-update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $updateGoTo));
}

$currentPage = $_SERVER["PHP_SELF"];

$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  sprintf("SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
  $dudes_dlr_notes_did = $colname_dealer_query;
}
mysql_select_db($database_tracking);
$query_dealer_query =  sprintf("SELECT * FROM dealer_prospects WHERE id = %s", GetSQLValueString($colname_dealer_query, "int"));
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$did = $row_dealer_query['id'];

$maxRows_dealer_leads = 20;
$pageNum_dealer_leads = 0;
if (isset($_GET['pageNum_dealer_leads'])) {
  $pageNum_dealer_leads = $_GET['pageNum_dealer_leads'];
}
$startRow_dealer_leads = $pageNum_dealer_leads * $maxRows_dealer_leads;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_leads = "SELECT * FROM cust_leads WHERE cust_dealer_id = '$did' ORDER BY cust_leads.cust_lead_created_at DESC";
$query_limit_dealer_leads =  sprintf("%s LIMIT %d, %d", $query_dealer_leads, $startRow_dealer_leads, $maxRows_dealer_leads);
$dealer_leads = mysqli_query($idsconnection_mysqli, $query_limit_dealer_leads);
$row_dealer_leads = mysqli_fetch_array($dealer_leads);

if (isset($_GET['totalRows_dealer_leads'])) {
  $totalRows_dealer_leads = $_GET['totalRows_dealer_leads'];
} else {
  $all_dealer_leads = mysqli_query($idsconnection_mysqli, $query_dealer_leads);
  $totalRows_dealer_leads = mysqli_num_rows($all_dealer_leads);
}
$totalPages_dealer_leads = ceil($totalRows_dealer_leads/$maxRows_dealer_leads)-1;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dvehicle_query = "SELECT * FROM vehicles WHERE vehicles.did = '$did'  AND vehicles.vlivestatus = 1 ORDER BY vehicles.created_at DESC";
$dvehicle_query = mysqli_query($idsconnection_mysqli, $query_dvehicle_query);
$row_dvehicle_query = mysqli_fetch_array($dvehicle_query);
$totalRows_dvehicle_query = mysqli_num_rows($dvehicle_query);

mysql_select_db($database_tracking);
$query_query_note = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` WHERE dudes_dlr_notes_did = '$dudes_dlr_notes_did' ORDER BY dudes_dlr_notes_created_at DESC";
$query_note = mysqli_query($idsconnection_mysqli, $query_query_note);
$row_query_note = mysqli_fetch_array($query_note);
$totalRows_query_note = mysqli_num_rows($query_note);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_vehicles_live = "SELECT * FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = 1";
$dlr_vehicles_live = mysqli_query($idsconnection_mysqli, $query_dlr_vehicles_live);
$row_dlr_vehicles_live = mysqli_fetch_array($dlr_vehicles_live);
$totalRows_dlr_vehicles_live = mysqli_num_rows($dlr_vehicles_live);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_vehicles_sold = "SELECT * FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = 9";
$dlr_vehicles_sold = mysqli_query($idsconnection_mysqli, $query_dlr_vehicles_sold);
$row_dlr_vehicles_sold = mysqli_fetch_array($dlr_vehicles_sold);
$totalRows_dlr_vehicles_sold = mysqli_num_rows($dlr_vehicles_sold);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_vehicles_hold = "SELECT * FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = 2";
$dlr_vehicles_hold = mysqli_query($idsconnection_mysqli, $query_dlr_vehicles_hold);
$row_dlr_vehicles_hold = mysqli_fetch_array($dlr_vehicles_hold);
$totalRows_dlr_vehicles_hold = mysqli_num_rows($dlr_vehicles_hold);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoices = "SELECT * FROM ids_toinvoices WHERE ids_toinvoices.payment_status IN('UnPaid','Partial') AND ids_toinvoices.invoice_dealerid = '$did' ORDER BY invoice_id DESC";
$queryInvoices = mysqli_query($idsconnection_mysqli, $query_queryInvoices);
$row_queryInvoices = mysqli_fetch_array($queryInvoices);
$totalRows_queryInvoices = mysqli_num_rows($queryInvoices);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_payments = "SELECT * FROM ids_toinvoices WHERE ids_toinvoices.payment_status IN('Paid','Partial') AND ids_toinvoices.invoice_dealerid = '$did' ORDER BY dudes_id_rcvdpymtwhn DESC";
$query_payments = mysqli_query($idsconnection_mysqli, $query_query_payments);
$row_query_payments = mysqli_fetch_array($query_payments);
$totalRows_query_payments = mysqli_num_rows($query_payments);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_recurringInvoies = "SELECT * FROM ids_toinvoices_recurring WHERE ids_toinvoices_recurring.invoice_dealerid = '$did' ORDER BY invoice_id DESC";
$recurringInvoies = mysqli_query($idsconnection_mysqli, $query_recurringInvoies);
$row_recurringInvoies = mysqli_fetch_array($recurringInvoies);
$totalRows_recurringInvoies = mysqli_num_rows($recurringInvoies);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_dudes = "SELECT * FROM dudes WHERE dudes_status = '1' ORDER BY dudes_lname ASC";
$query_dudes = mysqli_query($idsconnection_mysqli, $query_query_dudes);
$row_query_dudes = mysqli_fetch_array($query_dudes);
$totalRows_query_dudes = mysqli_num_rows($query_dudes);

?>
<?php
$company = $row_dealer_query['company'];

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
        $number =  sprintf('%.2f', $number); 
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
<?php
	include('library_dudes/whosdude.php');
	
	include('library_dudes/dudeaccess.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Prospect Dealer</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>


<script>

function insertNote(str)

{

if (str=="")

  {

  document.getElementById("internal_prospect_comments").innerHTML="";

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

    document.getElementById("internal_prospect_comments").innerHTML=xmlhttp.responseText;

    }

  }

var empty = "";
var dudes_dlr_notes_did = document.getElementById('dudes_dlr_notes_did').value;
var dudes_dlr_notes_dude_id = document.getElementById('dudes_dlr_notes_dude_id').value;
var dudes_dlr_notes_dude_name = document.getElementById('dudes_dlr_notes_dude_name').value;
var dudes_dlr_notes_body = document.getElementById('dudes_dlr_notes_body').value;

xmlhttp.open("GET","ajaxEnviro/prospect_dealer_comment.php?dudes_dlr_notes_did=" + dudes_dlr_notes_did + '&dudes_dlr_notes_dude_id=' + dudes_dlr_notes_dude_id + '&dudes_dlr_notes_dude_name=' + dudes_dlr_notes_dude_name + '&dudes_dlr_notes_body=' + dudes_dlr_notes_body,true);

xmlhttp.send();

document.getElementById('dudes_dlr_notes_body').value = empty;

}

</script>

<script>
function chngActstat(obj) {

var acctstatus = obj.options[obj.selectedIndex].value;

				if(acctstatus = 0){
					
					alert('Caution! You Are Turning Off This Account  <br> Your Activity Will Be Tracked For Doing This!');
					
				}else if(acctstatus = 1){
					
					alert('You Are Turning On This Account');
					
				}


}
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
       
         <?php include('parts/modules/top-left-module.php'); ?>
       </div>

      <!-- RIGHT BLOCK -->
      <div id="dealerUpdate" class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Point Of Contact Information Section</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">

<p><strong>Account Status = </strong>
              <u>
              <?php 
			  		$status = $row_dealer_query['status'];
			  		if($status = 0){echo 'Off (Account Is Currently OFF!)';}
								  		if($status = 1){echo 'ON!!! (Active Account!)';}
					
			  ?>
              </u>
              
              &nbsp; &nbsp;&nbsp;&nbsp;
              
              <strong>Sales Rep: </strong><?php echo $row_dealer_query['assigned_salesrep']; ?> &nbsp;&nbsp;&nbsp;
              <a href="#">Request Access</a>.
              </p>
              
              <table width="100%">
                <tr>
                  <td id="column-bold">Dealer ID:</td>
                  <td><strong><?php echo $row_dealer_query['id']; ?></strong></td>
                  <td rowspan="6" width="30">&nbsp;</td>
                  <td id="column-bold4">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td id="column-bold">Decision Maker1:</td>
                  <td><?php echo $row_dealer_query['contact']; ?></td>
                  <td id="column-bold">Company Name: </td>
                  <td><?php echo $row_dealer_query['company']; ?></td>
                </tr>
                <tr>
                  <td id="column-bold">Direct Phone No:</td>
                  <td><?php echo $row_dealer_query['contact_phone']; ?> <?php echo $row_dealer_query['contact_phone_type']; ?></td>
                  <td id="column-bold">Fax:</td>
                  <td><?php echo $row_dealer_query['fax']; ?></td>
                </tr>
                <tr>
                  <td id="column-bold">Number Of Leads:</td>
                  <td><?php echo $totalRows_dealer_leads ?></td>
                  <td id="column-bold">Number Of Vehicles:</td>
                  <td><?php echo $totalRows_dvehicle_query ?></td>
                </tr>
                <tr>
                	<td id="column-bold">Main Email:</td>
                    <td colspan="4"><?php echo $row_dealer_query['email']; ?></td>
                </tr>
                <tr>
                  <td id="column-bold5">Website</td>
                  <td colspan="4"><blockquote>
                    <p><?php echo $row_dealer_query['website']; ?> | <a href="http://<?php echo $row_dealer_query['website']; ?>" target="_blank"><?php echo $row_dealer_query['website']; ?></a></p>
                  </blockquote></td>
                </tr>
                
                
                
                <tr>
                  <td colspan="5"><hr /></td>
                </tr>
                
                
                <tr>
                  <td id="column-bold">Decision Maker2:</td>
                  <td>
				    <?php 
				  
				  	$b = $row_dealer_query['dmcontact2'];
					if($b == NULL){echo 'N/A';}
					else{echo $row_dealer_query['dmcontact2'];}
				  
				  ?></td>
                  <td>&nbsp;<?php echo $totalRows_dlr_vehicles_live ?></td>
                  <td id="column-bold" valign="top">Phone No:</td>
                  <td>
                  	
					<?php 
					$a = $row_dealer_query['dmcontact2_phone'];
					if($a == NULL){echo 'N/A';}
					else{echo $row_dealer_query['dmcontact2_phone'];}
					
					?></td>
                </tr>
                <tr>
                  <td id="column-bold2">
                  		<p>&nbsp;</p>
                  		<p>&nbsp;</p>
                  </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td id="column-bold6"><strong>Vehicles Live:</strong></td>
                  <td>&nbsp;<?php echo $totalRows_dlr_vehicles_live; ?></td>
                  <td>&nbsp;</td>
                  <td><strong>Vehicles Sold:</strong></td>
                  <td>&nbsp;<?php echo $totalRows_dlr_vehicles_sold; ?></td>
                </tr>
                <tr>
                  <td id="column-bold3"><strong>Vehicles Hold:</strong> </td>
                  <td>
					<a href="#"><?php echo $totalRows_dlr_vehicles_hold; ?></a>
                  </td>
                  <td>&nbsp;</td>
                  <td><strong>Add Inventory:</strong></td>
                  <td><strong><a href="add-inventory-dude.php?&id=<?php echo $did; ?>&name=<?php echo $company; ?>" title="Add Inventory">Add Inventory</a></strong></td>
                </tr>
              </table>
              <p></p>
              
              
              
              
              
            </div>
          </div>
        </div>
        
        
        <!-- start gadget slider -->





        <div class="gadget">
          <div class="gadget_content tabs">
            <ul>
              <li><a href="#tab-1" class="gradient37">Recent Comments</a></li>
              <li><a href="#tab-2" class="gradient37">Make Comment</a></li>
              <li><a href="#tab-3" class="gradient37">Appointments</a></li>
              <li><a href="#tab-4" class="gradient37">Sales Funnel</a></li>
            </ul>
            <div class="clr"></div>
            
            
            <div id="tab-1">
            
              <div class="gadget_content">
	            <div class="subblock">

             <div id="internal_prospect_comments">

              <h2>Internal Comments Related To This Dealer!</h2>
              <p class="white">
              	<strong>Total Comments: </strong> <?php echo $totalRows_query_note; ?> </p>
              
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
                  <tr>
                    <th><input name="utc1" id="utc1" type="checkbox" /></th>
                    <th width="137px">Created On:</th>
                    <th>Comment:</th>
                    <th width="120">By:</th>
                  </tr>

				  <?php  do { ?>
				    <tr>
				      <td><input name="utc1" id="utc2" type="checkbox" class="utc"></td>
				      
				      <td><?php echo $row_query_note['dudes_dlr_notes_created_at']; ?>
				        </th>
				        <td><?php echo $row_query_note['dudes_dlr_notes_body']; ?></td>
				      <td><?php echo $row_query_note['dudes_dlr_notes_dude_name']; ?></td>
				      </tr>
				    <?php } while ($row_query_note = mysqli_fetch_array($query_note)); ?>
                </table>

			</div>


				</div>
			  </div>
			
            </div>
            
            
            
            <div  id="tab-2">
    	        <div class="subblock">
	            
              <h2>Make Your Comment Here:</h2>
              <p class="white">
              <form action="ajaxEnviro/prospect_dealer_comment.php" method="POST" name="dude_comment_prospect" id="dude_comment_prospect" class="ajax">
              
                <p>
                  <label for="dudes_dlr_notes_body">Comment:
                    <input name="dudes_dlr_notes_did" type="hidden" id="dudes_dlr_notes_did" value="<?php echo $did; ?>" />
                    <input name="dudes_dlr_notes_dude_id" type="hidden" id="dudes_dlr_notes_dude_id" value="<?php echo $row_userDudes['dudes_id']; ?>" />
                    <input name="dudes_dlr_notes_dude_name" type="hidden" id="dudes_dlr_notes_dude_name" value="<?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?>" />
                  </label>
                  <textarea name="dudes_dlr_notes_body" id="dudes_dlr_notes_body" cols="45" rows="5"></textarea>
                </p>
                <p>
                  <label for="submit"></label>
                  <input type="button" value="Submit" onclick="insertNote()" />
                </p>
              </form>
              
              </p>
             </div>
            
            
        	</div>    
            
            
            <div  id="tab-3">
            
            
            
            <div class="subblock">
            
            
                          <h1>Current Recurring Invoices <a href="?id=<?php echo $did; ?>">Upcoming &raquo;</a></h1>
                          
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
              <?php if ($totalRows_recurringInvoies > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <tr>
                    <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                    <td><a href="update-invoice.php?invoice_id=<?php echo $row_queryInvoices['invoice_id']; ?>"/></a>
                    <td> - </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php } while ($row_recurringInvoies = mysqli_fetch_array($recurringInvoies)); ?>
                </td>
                
                <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_recurringInvoies == 0) { // Show if recordset empty ?>
                <tr>
                  <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>&nbsp;</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td> N/A</td>
                  <td> N/A</td>
                </tr>
                <?php } // Show if recordset empty ?>
              </table>
    </form>
            
            
            			  
                          
                          
                          <h1>Current Invoices <a href="?id=<?php echo $did; ?>">Past Appointments</a></h1>
                          
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
                      <a href="update-invoice.php?invoice_id=<?php echo $row_queryInvoices['invoice_id']; ?>"/></a>
                    <td> - </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                    <td>$ </td>
                  </tr>
                  <?php } while ($row_queryInvoices = mysqli_fetch_array($queryInvoices)); ?>
                </td>
                
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
            
            
            
            <p>
                
            </p>
            </div>
            
            <div  id="tab-4">
            
            
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
                      <td></td>
                      <td></td>
                      <td>&nbsp;</td>
                      <td></td>
                      <td>:  </td>
                      <td>
                        
                      </td>
                      <td><a></a></td>
                      <td>&nbsp;</td>
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
        </div>

		<!-- end gadget slider -->
        
        
        <p></p>
        <p></p>
        
        <!-- gadget left 2 -->        
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dealer Information Section</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="<?php echo $editFormAction; ?>" name="form_dlr_update" method="POST" id="form_dlr_update" class="form_example">
              <ol>
                <li>
                  <label for="status"><strong>Account Status Change:</strong>
                  <?php 
			  		$status = $row_dealer_query['status'];
			  		if($status = 0){echo 'Off (Account Is Currently OFF!)';}
					if($status = 1){echo 'ON!!! (Active Account!)';}
					
			  ?>
                  </label>
                  
                  
                  <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td>
    <label><strong>Status Change:</strong>
    <select id="status" name="status" onchange="chngActstat(this)">
                    <option value="0" <?php if (!(strcmp(0, $row_dealer_query['status']))) {echo "selected=\"selected\"";} ?>>Off Status - Disable</option>
                    <option value="1" <?php if (!(strcmp(1, $row_dealer_query['status']))) {echo "selected=\"selected\"";} ?>>On Status - Enable</option>
                  </select>
                  </label>
                  </td>
    <td><label><strong>Dudes 1:
          <select name="dudes_id" <?php $dudes_id = $row_dealer_query['dudes_id']; $dudesid = $row_userDudes['dudes_id']; whataccess($dudesid, $dudes_id); ?> id="dudes_id">
            <option value="" <?php if (!(strcmp("", $row_dealer_query['dudes_id']))) {echo "selected=\"selected\"";} ?>>Select</option>
            &nbsp;
            <?php
do {  
?>
            <option value="<?php echo $row_query_dudes['dudes_id']?>"<?php if (!(strcmp($row_query_dudes['dudes_id'], $row_dealer_query['dudes_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_dudes['dudes_lname']?>, <?php echo $row_query_dudes['dudes_firstname']?></option>
            <?php
} while ($row_query_dudes = mysqli_fetch_array($query_dudes));
  $rows = mysqli_num_rows($query_dudes);
  if($rows > 0) {
      mysqli_data_seek($query_dudes, 0);
	  $row_query_dudes = mysqli_fetch_array($query_dudes);
  }
?>
          </select>
    </strong></label></td>
    <td><label><strong>Dudes 2:
      <select id="dudes2_id" <?php $dudes_id = $row_dealer_query['dudes_id']; $dudes2_id = $row_dealer_query['dudes2_id'];  if($dudesid == $dudes_id){}elseif($dudesid == $dudes2_id){}elseif(!$dudes_id){}else{ echo 'disabled';} ?> name="dudes2_id" class="gadgets3par">
        <option value="" <?php if (!(strcmp("", $row_dealer_query['dudes2_id']))) {echo "selected=\"selected\"";} ?>>Select</option>
        &nbsp;
        <?php
do {  
?>
        <option value="<?php echo $row_query_dudes['dudes_id']?>"<?php if (!(strcmp($row_query_dudes['dudes_id'], $row_dealer_query['dudes2_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_dudes['dudes_lname']?>, <?php echo $row_query_dudes['dudes_firstname']?></option>
        <?php
} while ($row_query_dudes = mysqli_fetch_array($query_dudes));
  $rows = mysqli_num_rows($query_dudes);
  if($rows > 0) {
      mysqli_data_seek($query_dudes, 0);
	  $row_query_dudes = mysqli_fetch_array($query_dudes);
  }
?>
      </select>
    </strong></label></td>
    <td>
    <label><strong>Support Rep 1 :</strong>
      <select name="support_rep_id" <?php $support_rep_id = $row_dealer_query['support_rep_id']; if(!$support_rep_id){}elseif($support_rep_id == $dudesid){}else{ echo 'disabled';} ?> id="support_rep_id">
        <option value="" <?php if (!(strcmp("", $row_dealer_query['support_rep_id']))) {echo "selected=\"selected\"";} ?>>Support 1</option>
        <?php
do {  
?>
        <?php
} while ($row_query_dudes = mysqli_fetch_array($query_dudes));
  $rows = mysqli_num_rows($query_dudes);
  if($rows > 0) {
      mysqli_data_seek($query_dudes, 0);
	  $row_query_dudes = mysqli_fetch_array($query_dudes);
  }
?>
        <?php
do {  
?>
        <option value="<?php echo $row_query_dudes['dudes_id']?>"<?php if (!(strcmp($row_query_dudes['dudes_id'], $row_dealer_query['support_rep_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_dudes['dudes_lname']?>, <?php echo $row_query_dudes['dudes_firstname']?></option>
        <?php
} while ($row_query_dudes = mysqli_fetch_array($query_dudes));
  $rows = mysqli_num_rows($query_dudes);
  if($rows > 0) {
      mysqli_data_seek($query_dudes, 0);
	  $row_query_dudes = mysqli_fetch_array($query_dudes);
  }
?>
      </select>
    </label>
    </td>
  </tr>
</table>

                  
                  
                </li>

                <li>
                  <label for="contact"><strong>DM Contact Name</strong> (#1 Owner/Decision Maker Name) </label><input name="id" type="hidden" value="<?php echo $did; ?>" />
                  <input name="contact" class="text medium" id="contact" value="<?php echo $row_dealer_query['contact']; ?>" />
                </li>
                <li>
                  <label for="Decion_Maker-Info"><strong>DM Contact Information</strong> (#1 Owner/Decision Maker)</label>
                  <input name="contact_phone" class="text small" id="contact_phone" value="<?php echo $row_dealer_query['contact_phone']; ?>" />
                  <input name="contact_phone_type" class="text small" id="contact_phone_type" value="<?php echo $row_dealer_query['contact_phone_type']; ?>" />
                  <div class="clr"></div>
                  <label for="contact_phone" class="small">Direct Phone Number</label>                
                  <label for="fax" class="small">Phone Type:</label>                
                  <div class="clr"></div>
                </li>
                
                <li>
                  <label for="contact"><strong>DM Contact Name</strong> (#2 Owner/Decision Maker Name) </label>
                  <input name="dmcontact2" class="text medium" id="dmcontact2" value="<?php echo $row_dealer_query['dmcontact2']; ?>" />
                </li>


                <li>
                  <label for="Decion_Maker-Info"><strong>DM Contact Information</strong> (#2 Owner/Decision Maker)</label>
                  <input name="contact_phone" class="text small" id="contact_phone" value="<?php echo $row_dealer_query['dmcontact2_phone']; ?>" />
                  <input name="dmcontact2_phone" class="text small" id="dmcontact2_phone" value="<?php echo $row_dealer_query['dmcontact2_phone']; ?>" />
                  <div class="clr"></div>
                  <label for="contact_phone" class="small">Direct Phone Number</label>                
                  <label for="fax" class="small">Phone Type:</label>                
                  <div class="clr"></div>
                </li>

                
                <li>
                  <label for="company"><strong>Company Name:</strong> (The Legal Name Of Business)</label>
                  <input name="company" class="text large" id="company" value="<?php echo $row_dealer_query['company']; ?>" />
                </li>
                <li>
                  <label for="address"><strong>Address</strong> (city state &amp; zip):</label>
                  <input name="address" class="text large" id="address" value="<?php echo $row_dealer_query['address']; ?>" />
                </li>

                <li>
                  <label for="multiply"><strong>Location</strong> (city state &amp; zip):</label>
                  <input name="city" class="text small" id="city" value="<?php echo $row_dealer_query['city']; ?>" />
                  <input name="state" class="text small" id="state" value="<?php echo $row_dealer_query['state']; ?>" />
                  <input name="zip" class="text small" id="zip" value="<?php echo $row_dealer_query['zip']; ?>" />
                  <div class="clr"></div>
                  <label for="contact_phone" class="small">City</label>                
                  <label for="state" class="small">State</label>                
                  <label for="zip" class="small">Zip</label>                
                  <div class="clr"></div>
                </li>
                
                
                <!-- Webiste -->
                
                <li>
                	<label for="website" class="small"><strong>Website Url:</strong></label>
                    <input name="website" id="website" value="<?php echo $row_dealer_query['website']; ?>" />
                    <div class="clr"></div>
                </li>
                
                <!-- Website -->
                
                
                
                
                <!-- Finance -->
                
                <li>
                  <label for="finance" class="small"><strong>Main Phone Number:</strong></label>                
                  <label for="finance_c ontact" class="small"><strong>Fax Number:</strong></label>                
                  <div class="clr"></div>
				</li>
                
                <li>

                  <div class="clr"></div>
                  <input id="phone" name="phone" class="text small" value="<?php echo $row_dealer_query['phone']; ?>" />
                  <input id="fax" name="fax" class="text small" value="<?php echo $row_dealer_query['fax']; ?>" />
                  <div class="clr"></div>
                  
                 </li>
                
                 <hr />                
               
				<li>
                  <label for="finance_info"><strong>Finance</strong> (Finance Dept. info)</label>
                  <input id="finance" name="finance" class="text small" value="<?php echo $row_dealer_query['finance']; ?>" />
                  <input id="finance_contact" name="finance_contact" class="text small" value="<?php echo $row_dealer_query['finance_contact']; ?>" />
                  <div class="clr"></div>
                  <label for="sales_contact" class="small">Finance Contact Name:</label>
                  <label for="sales" class="small">Finance Phone:</label>       
                  <div class="clr"></div>
                  
                  <div class="clr"></div>
                
                </li>
                
                
                <!-- Sales -->
                
                <li>
                  <label for="sales_info"><strong>Sales</strong> (Sales Dept info.)</label>
                  <input id="sales" name="sales" class="text small" value="<?php echo $row_dealer_query['sales']; ?>" />
                  <input id="sales_contact" name="sales_contact" class="text small" value="<?php echo $row_dealer_query['sales_contact']; ?>" />
                  <div class="clr"></div>
                  <label for="sales_contact" class="small">Sales Contact Name:</label>
                  <label for="sales" class="small">Sales Phone:</label>       
                  <div class="clr"></div>
                </li>

                <hr />                
                
                   <li>
                  <label for="disclaimer"><strong>Map I-Frame:</strong> (Copy & Paste The Goolgle Map Here)</label>
                  <textarea id="mapframe" name="mapframe" rows="6" cols="50"><?php echo $row_dealer_query['mapframe']; ?></textarea>
                </li>
             
                
                <hr />

                   <li>
                  <label for="disclaimer"><strong>Disclaimer:</strong> (Create Or Edit Disclaimer Here)</label>
                  <textarea id="disclaimer" name="disclaimer" rows="6" cols="50"><?php echo $row_dealer_query['disclaimer']; ?></textarea>
                </li>
                
                
                <!--                  hhhhhhhhhhhhhhhhhhhhhhhhhhhh                  -->

                <hr />                
                
              </ol>
                            <p>
              		
                    <?php if($dudesid == $dudes_id){ ?>
                    
					<label for="submit">Submit</label>
                  	<input type="submit" name="submit" id="submit" value="Submit" />
					
					<?php }if(!$dudes_id){ ?>
                    
					<label for="submit">Submit</label>
                  	<input type="submit" name="submit" id="submit" value="Submit" />

   					<?php } ?>
			  </p>
                            <input type="hidden" name="MM_update" value="form_dlr_update" />
              </form>
              <p><a href="#">Learn more &raquo;</a></p>
              
            </div>
          </div>
        </div>

        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dealer Customer Leads <u><?php echo $totalRows_dealer_leads ?></u></h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th width="40"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Lead Name</th>
                <th width="100">Phone No.</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
              
              
              
              <?php do { ?>
                <tr>
                  <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                  <td><?php echo $row_dealer_leads['cust_nickname']; ?><br />
                    <?php echo $row_dealer_leads['cust_fname']; ?> <?php echo $row_dealer_leads['cust_lname']; ?></td>
                  <td><?php echo $row_dealer_leads['cust_phoneno']; ?> <?php echo $row_dealer_leads['cust_phonetype']; ?></td>
                  <td><?php echo $row_dealer_leads['cust_lead_created_at']; ?></td>
                  <td><?php echo $row_dealer_leads['cust_home_city']; ?>, <?php echo $row_dealer_leads['cust_home_state']; ?> <?php echo $row_dealer_leads['zip']; ?></td>
                  <td><a href="mailto:<?php echo $row_dealer_leads['cust_email']; ?>"><?php echo $row_dealer_leads['cust_email']; ?></a></td>
                  <td width="28"><a href="<?php echo $row_dealer_leads['cust_leadid']; ?>"> <img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td width="28"><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                </tr>
                <?php } while ($row_dealer_leads = mysqli_fetch_array($dealer_leads)); ?>
              <?php if ($totalRows_dealer_leads == 0) { // Show if recordset empty ?>
  <tr class="last">
    <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
    <td>No Customer</td>
    <td>N/A</td>
    <td>N/A</td>
    <td>N/A</td>
    <td><a href="#">N/A</a></td>
    <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
    <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
  </tr>
  <?php } // Show if recordset empty ?>
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>
  
  
  
  <?php //include('parts/forms/dealer-update-form.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/footer.php'); ?>
<!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealer_query);

mysqli_free_result($dealer_leads);

mysqli_free_result($dvehicle_query);

mysqli_free_result($dlr_vehicles_live);

mysqli_free_result($dlr_vehicles_sold);

mysqli_free_result($dlr_vehicles_hold);

mysqli_free_result($recurringInvoies);

mysqli_free_result($query_dudes);

mysqli_free_result($query_note);
?>