<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/idschatconnection.php'); ?>
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
?>
<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "dude_comment")) {
  $insertSQL =  sprintf("INSERT INTO dudes_dlr_notes (dudes_dlr_notes_did, dudes_dlr_notes_dude_id, dudes_dlr_notes_dude_name, dudes_dlr_notes_body) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['dudes_dlr_notes_did'], "int"),
                       GetSQLValueString($_POST['dudes_dlr_notes_dude_id'], "int"),
                       GetSQLValueString($_POST['dudes_dlr_notes_dude_name'], "text"),
                       GetSQLValueString($_POST['dudes_dlr_notes_body'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_dlr_update")) {
  $updateSQL =  sprintf("UPDATE dealers SET dudes_id=%s, dudes2_id=%s, support_rep_id=%s, leadsidsemail=%s, dealer_type_id=%s,  contact=%s, contact_title=%s, contact_phone=%s, contact_phone_type=%s, dmcontact2=%s, dmcontact2_title=%s, dmcontact2_phone=%s, company=%s, website=%s, finance=%s, finance_contact=%s, sales=%s, sales_contact=%s, phone=%s, fax=%s, address=%s, city=%s, `state`=%s, zip=%s, mapframe=%s, disclaimer=%s, status=%s, accts_rcvbles_name=%s, accts_rcvbles_email=%s, accts_rcvbles_password=%s, accts_rcvbles_phone=%s, accts_payables_name=%s, accts_payables_email=%s, accts_payables_password=%s, accts_payables_phone=%s WHERE id=%s",
                       GetSQLValueString($_POST['dudes_id'], "int"),
                       GetSQLValueString($_POST['dudes2_id'], "int"),
                       GetSQLValueString($_POST['support_rep_id'], "int"),
                       GetSQLValueString($_POST['leadsidsemail'], "text"),
					   GetSQLValueString($_POST['dealerType'], "text"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['contact_title'], "text"),
                       GetSQLValueString($_POST['contact_phone'], "text"),
                       GetSQLValueString($_POST['contact_phone_type'], "text"),
                       GetSQLValueString($_POST['dmcontact2'], "text"),
                       GetSQLValueString($_POST['dmcontact2_title'], "text"),
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
                       GetSQLValueString($_POST['accts_rcvbles_name'], "text"),
                       GetSQLValueString($_POST['accts_rcvbles_email'], "text"),
                       GetSQLValueString($_POST['accts_rcvbles_password'], "text"),
                       GetSQLValueString($_POST['accts_rcvbles_phone'], "text"),
                       GetSQLValueString($_POST['accts_payables_name'], "text"),
                       GetSQLValueString($_POST['accts_payables_email'], "text"),
                       GetSQLValueString($_POST['accts_payables_password'], "text"),
                       GetSQLValueString($_POST['accts_payables_phone'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "script-dealer-view-update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $updateGoTo));
}

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



$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_dealer_query'";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$did = $row_dealer_query['id'];
$dealer_email = $row_dealer_query['email'];

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

$maxRows_note = 10;
$pageNum_note = 0;
if (isset($_GET['pageNum_note'])) {
  $pageNum_note = $_GET['pageNum_note'];
}
$startRow_note = $pageNum_note * $maxRows_note;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_note = "SELECT * FROM dudes_dlr_notes WHERE dudes_dlr_notes.dudes_dlr_notes_did = '$did' ORDER BY dudes_dlr_notes_id DESC";
$query_limit_note =  sprintf("%s LIMIT %d, %d", $query_note, $startRow_note, $maxRows_note);
$note = mysqli_query($idsconnection_mysqli, $query_limit_note);
$row_note = mysqli_fetch_array($note);

if (isset($_GET['totalRows_note'])) {
  $totalRows_note = $_GET['totalRows_note'];
} else {
  $all_note = mysqli_query($idsconnection_mysqli, $query_note);
  $totalRows_note = mysqli_num_rows($all_note);
}
$totalPages_note = ceil($totalRows_note/$maxRows_note)-1;

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
$query_queryInvoices = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.invoice_dealerid = dealers.id AND ids_toinvoices.payment_status IN('UnPaid','Partial') AND dealers.id  = '$did' ORDER BY invoice_id DESC";
$queryInvoices = mysqli_query($idsconnection_mysqli, $query_queryInvoices);
$row_queryInvoices = mysqli_fetch_array($queryInvoices);
$totalRows_queryInvoices = mysqli_num_rows($queryInvoices);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_payments = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.payment_status IN('Paid','Partial') AND ids_toinvoices.invoice_dealerid AND dealers.id = '$did' ORDER BY dudes_id_rcvdpymtwhn DESC";
$query_payments = mysqli_query($idsconnection_mysqli, $query_query_payments);
$row_query_payments = mysqli_fetch_array($query_payments);
$totalRows_query_payments = mysqli_num_rows($query_payments);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_recurringInvoies = "SELECT * FROM ids_toinvoices_recurring, dealers WHERE ids_toinvoices_recurring.invoice_dealerid = dealers.id AND dealers.id = '$did' ORDER BY ids_toinvoices_recurring.invoice_dealerid DESC";
$recurringInvoies = mysqli_query($idsconnection_mysqli, $query_recurringInvoies);
$row_recurringInvoies = mysqli_fetch_array($recurringInvoies);
$totalRows_recurringInvoies = mysqli_num_rows($recurringInvoies);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_dudes = "SELECT * FROM dudes WHERE dudes_status = '1' ORDER BY dudes_lname ASC";
$query_dudes = mysqli_query($idsconnection_mysqli, $query_query_dudes);
$row_query_dudes = mysqli_fetch_array($query_dudes);
$totalRows_query_dudes = mysqli_num_rows($query_dudes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_persons = "SELECT * FROM  `idsids_idsdms`.`sales_person` WHERE `sales_person`.`main_dealerid` = '$did' ORDER BY `sales_person`.`salesperson_id` DESC";
$sales_persons = mysqli_query($idsconnection_mysqli, $query_sales_persons);
$row_sales_persons = mysqli_fetch_array($sales_persons);
$totalRows_sales_persons = mysqli_num_rows($sales_persons);

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_dealer_activity = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_activity` WHERE `dudes_dlr_did` = '$did' ORDER BY `dudes_dlr_created_at` ASC";
$dealer_activity = mysqli_query($tracking_mysqli, $query_dealer_activity);
$row_dealer_activity = mysqli_fetch_array($dealer_activity);
$totalRows_dealer_activity = mysqli_num_rows($dealer_activity);

mysqli_select_db($idschatconnection_mysqli, $database_idschatconnection);
$query_livehelp_credentials = "SELECT * FROM `idsids_idschat`.`livehelp_users` WHERE `livehelp_users`.`email` = '$dealer_email'";
$livehelp_credentials = mysqli_query($idschatconnection_mysqli, $query_livehelp_credentials);
$row_livehelp_credentials = mysqli_fetch_array($livehelp_credentials);
$totalRows_livehelp_credentials = mysqli_num_rows($livehelp_credentials);

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
<title>Update Dealer</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>

<script>
function chngActstat(obj) {

var acctstatus = obj.options[obj.selectedIndex].value;

				if(acctstatus = 0){
					
					alert('Caution! You Are Turning Off This Account  <br> Your Activity Will Be Tracked For Doing This!');
					
				}
				
				
				if(acctstatus = 1){
					
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
      <div class="rightblock vertsortable">

        <!-- Point Of Contact Information Section -->
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
              
              <strong>Primary Sales Rep: </strong><?php $dudesid = $row_dealer_query['dudes_id']; whosdudeid($dudesid);  ?> &nbsp;&nbsp;&nbsp;
              <a href="#">Request Access From Pimary</a>.
              </p>
              
              <table width="100%" border="0" cellpadding="3" cellspacing="3">
                <tr>
                  <td id="column-bold" colspan="2">Dealer ID:</td>
                  <td><strong><?php echo $row_dealer_query['id']; ?></strong></td>
                  <td rowspan="6" width="30">&nbsp;</td>
                  <td id="column-bold4">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td id="column-bold" colspan="2">Decision Maker1:</td>
                  <td><?php echo $row_dealer_query['contact']; ?></td>
                  <td id="column-bold">Company Name: </td>
                  <td colspan="2"><?php echo $row_dealer_query['company']; ?></td>
                </tr>
                <tr>
                  <td id="column-bold" colspan="2">Direct Phone No:</td>
                  <td><?php echo $row_dealer_query['contact_phone']; ?> <?php echo $row_dealer_query['contact_phone_type']; ?></td>
                  <td id="column-bold">Fax:</td>
                  <td colspan="2"><?php echo $row_dealer_query['fax']; ?></td>
                </tr>
                <tr>
                  <td id="column-bold" colspan="2">Number Of Leads:</td>
                  <td><?php echo $totalRows_dealer_leads ?></td>
                  <td id="column-bold">Number Of Vehicles:</td>
                  <td><?php echo $totalRows_dvehicle_query ?></td>
                </tr>
                <tr>
                	<td id="column-bold">Main Email:</td>
                    <td colspan="4"><?php echo $row_dealer_query['email']; ?></td>
                </tr>
                <tr>
                  <td id="column-bold">Website:</td>
                  <td colspan="3"><blockquote>
                    <p><?php echo $row_dealer_query['website']; ?> | <a href="http://<?php echo $row_dealer_query['website']; ?>" target="_blank"><?php echo $row_dealer_query['website']; ?></a></p>
                  </blockquote></td>
                </tr>
                
                
                
                <tr>
                  <td colspan="7"><hr /></td>
                </tr>

                <tr>
                  <td colspan="7">
                  
                  <h2>Live Chat Credentials</h2>
                  
                        <p>
                          <strong>Total Users:</strong> <?php echo $totalRows_livehelp_credentials; ?>
                        <p>
                  
                  	<table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Status</th>
            			<th scope="col">Display Name</th>
                        <th scope="col">Online</th>
                        <th scope="col">Operator</th>
                        <th scope="col">Channel</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">Created When</th>
                      </tr>
                      <?php do { ?>
                      <tr>
                        <td><?php echo $row_livehelp_credentials['email']; ?></td>
                        <td><?php echo $row_livehelp_credentials['username']; ?></td>
                        <td><?php echo $row_livehelp_credentials['status']; ?></td>
                        <td><?php echo $row_livehelp_credentials['displayname']; ?></td>
                        <td><?php echo $row_livehelp_credentials['isonline']; ?></td>
                        <td><?php echo $row_livehelp_credentials['isoperator']; ?></td>
                        <td><?php echo $row_livehelp_credentials['onchannel']; ?></td>
                        <td><?php echo $row_livehelp_credentials['ipaddress']; ?></td>
                        <td><?php echo $row_livehelp_credentials['created_at']; ?></td>
                      </tr>
                      <?php } while ($row_livehelp_credentials = mysqli_fetch_array($livehelp_credentials)); ?>
                    </table>

                  
                  
                  </td>
                </tr>

                <tr>
                  <td colspan="7"><hr /></td>
                </tr>
                
                
                <tr>
                  <td id="column-bold" colspan="2">Decision Maker2:</td>
                  <td>
				  <?php 
				  
				  	$b = $row_dealer_query['dmcontact2'];
					if($b == NULL){echo 'N/A';}
					else{echo $row_dealer_query['dmcontact2'];}
				  
				  ?>
                  
                  </td>
                  <td>&nbsp;</td>
                  <td id="column-bold" valign="top">Phone No:</td>
                  <td>
                  	
					<?php 
					$a = $row_dealer_query['dmcontact2_phone'];
					if($a == NULL){echo 'N/A';}
					else{echo $row_dealer_query['dmcontact2_phone'];}
					
					?>
                    
                  </td>
                </tr>
                <tr>
                	<td id="column-bold2">&nbsp;</td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                </tr>
                <tr>
                  <th id="column-bold2">
                  		Picture
                  </th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Direct Phone</th>
                  <th>Can Add Inventory?</th>
                </tr>
				<?php do { ?>
				  <tr>
				    <td bgcolor="#CCCCCC" style="border-radius:3px;" align="center"><?php if($row_sales_persons['ids_profile_image']){ echo '<img src="'.$row_sales_persons['ids_profile_image'].'"'." width='90px' />"; }else{ echo 'No Photo!'; } ?></td>
				    <td><strong><?php echo $row_sales_persons['salesperson_firstname']; ?> <?php echo $row_sales_persons['salesperson_lastname']; ?></strong></td>
				    <td><?php echo $row_sales_persons['salesperson_email']; ?></td>
				    <td><?php echo $row_sales_persons['salesperson_password']; ?></td>
				    <td align="center"><?php if($row_sales_persons['acct_status'] == 1){ echo 'Active'; }else{ echo 'Inactive'; } ?></td>
				    <td><?php echo $row_sales_persons['salesperson_mobilephone_number']; ?></td>
				    <td align="center"><?php if($row_sales_persons['sid_addinv_2main_dealerid'] == 1){ echo 'Yes'; }else{ echo 'No'; } ?></td>
			      </tr>
				  <?php } while ($row_sales_persons = mysqli_fetch_array($sales_persons)); ?>

                <tr>
                  <td id="column-bold2">
                  		<p>&nbsp;</p>

                  </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td id="column-bold6"><strong>Vehicles Live:</strong></td>
                  <td>&nbsp;<?php echo $totalRows_dlr_vehicles_live ?></td>
                  <td>&nbsp;</td>
                  <td><strong>Vehicles Sold:</strong></td>
                  <td>&nbsp;<?php echo $totalRows_dlr_vehicles_sold ?></td>
                </tr>

                <tr>
                  <td id="column-bold3"><strong>Vehicles Hold:</strong> </td>
                  <td>
					<a href="#"><?php echo $totalRows_dlr_vehicles_hold ?></a>
                  </td>
                  <td>&nbsp;</td>
                  <td><strong>Add Inventory:</strong></td>
                  <td><strong><a href="add-inventory-dude.php?&id=<?php echo $did; ?>&name=<?php echo $company ?>" title="Add Inventory">Add Inventory</a></strong></td>
                </tr>
              </table>
              <p></p>
              
              
              
              
              
            </div>
          </div>
        </div>
        
        
        <!-- start dealer view tabs -->


        <div class="gadget">
          <div class="gadget_content tabs">
            <ul>
              <li><a href="#tab-1" class="gradient37">Recent Comments</a></li>
              <li><a href="#tab-2" class="gradient37">Make Comment</a></li>
              <li><a href="#tab-3" class="gradient37">Dealer Invoices</a></li>
              <li><a href="#tab-4" class="gradient37">Payments</a></li>
              <li><a href="#tab-5" class="gradient37">Agreement</a></li>
              <li><a href="#tab-6" class="gradient37">Actvity</a></li>
              <li><a href="#tab-7" class="gradient37">Send Email</a></li>
            </ul>
            <div class="clr"></div>
            
            
            <div id="tab-1">
            
              <div class="gadget_content">
	            <div class="subblock">

              <h2>Internal Comments Related To This Dealer!</h2>
              <p class="white">
              	<strong>Total Comments: </strong> <?php echo $totalRows_note ?> 
                
              </p>
              
              <hr />
              
              <p>&nbsp; </p>
                <table width="100%%" border="0" cellspacing="5" cellpadding="5">
<?php if($totalRows_note > 0): ?>                
                  <tr>
                    <th scope="row">Created On:</th>
                    <th>Comment:</th>
                    <th>By:</th>
                  </tr>
                
<?php  do { ?>
                  <tr>
                    <th scope="row"><?php echo $row_note['dudes_dlr_notes_created_at']; ?></th>
                    <td>
						<?php echo $row_note['dudes_dlr_notes_body']; ?>
                    			
                    </td>
                    <td>
                    <?php echo $row_note['dudes_dlr_notes_dude_name']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="3" scope="row"><hr /></th>
                  </tr>
<?php } while ($row_note = mysqli_fetch_array($note)); endif;?>
                </table>

				</div>
			  </div>
			
            </div>
            
            
            
            <div  id="tab-2">
    	        <div class="subblock">
	            
              <h2>Make Your Comment Here:</h2>
              <p class="white">
              <form action="<?php echo $editFormAction; ?>" method="POST" name="dude_comment">
              
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
                  <input type="submit" name="submit" id="submit" value="Submit" />
                </p>
                <input type="hidden" name="MM_insert" value="dude_comment" />
              </form>
              
              </p>
             </div>
            
            
        	</div>    
            
            
            <div  id="tab-3">
            
            
            
            <div class="subblock">
            
            
                          <h1>Current Recurring Invoices/Agreements <a href="create-recurring-invoice.php?id=<?php echo $did; ?>">Create Recurring Invoice &raquo;</a></h1>
                          
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
                <th>Agreements</th>
              </tr>
              <?php if ($totalRows_recurringInvoies > 0) { // Show if recordset not empty ?>
			  <?php do { ?>
  <tr>
    <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
    <td>
        <a href="update-recurring-invoice.php?invoice_id=<?php echo $row_recurringInvoies['invoice_id']; ?>"/><?php echo $row_queryInvoices['invoice_number']; ?></a>
    <td><?php echo $row_recurringInvoies['invoice_dealerid']; ?> - <?php echo $row_recurringInvoies['company']; ?></td>
    <td>$ <?php echo formatMoney($row_recurringInvoies['invoice_amount_due'], true); ?></td>
    <td><?php echo $row_recurringInvoies['invoice_created_at']; ?></td>
    <td><?php echo $row_recurringInvoies['invoice_duedate']; ?></td>
    <td><?php echo daysLate($row_recurringInvoies['invoice_duedate']); ?></td>    
    <td><?php if(!$row_recurringInvoies['payment_status']){echo 'UnPaid'; }else{ echo $row_recurringInvoies['payment_status']; } ?></td>
    <td><a href="document-idsagreement.php?dealer=<?php echo $did; ?>&recordid=<?php echo $row_recurringInvoies['invoice_id']; ?>" target="_blank">Agreement</a></td>
  </tr>
        <?php } while ($row_recurringInvoies = mysqli_fetch_array($recurringInvoies)); ?></td>
  
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
                </tr>
                <?php } // Show if recordset empty ?>
              </table>
              </form>
            
            
            			  
                          
                          
                          <h1>Current Invoices <a href="create-invoice.php?id=<?php echo $did; ?>">Create Dealer Invoice &raquo;</a></h1>
                          
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
        <a href="update-invoice.php?invoice_id=<?php echo $row_queryInvoices['invoice_id']; ?>"/><?php echo $row_queryInvoices['invoice_number']; ?></a>
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
    <td><?php echo $row_query_payments['invoice_id']; ?></td>
    <td><?php echo $row_query_payments['invoice_number']; ?></td>
    <td><?php echo $row_query_payments['company']; ?></td>
    <td><?php if(!$row_query_payments['credit_amount']){ echo '$ 0.00';}else echo '$ '.formatMoney($row_query_payments['credit_amount'], true); ?></td>
    <td><?php echo $row_query_payments['payment_type']; ?>: $ <?php echo formatMoney($row_query_payments['paid_amount'], true); ?></td>
    <td>
      $ <?php echo $paymentBalance; ?>
    </td>
    <td><a href="view-payment.php?payment_id=<?php echo $row_query_payments['invoice_id']; ?>"><?php echo $row_query_payments['payment_status']; ?></a></td>
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
            
           	<div  id="tab-5">
                        <div class="subblock">
                        
                        
                        <a href="document-idsagreement.php?dealer=<?php echo $did; ?>&recordid=<?php echo $row_recurringInvoies['invoice_id']; ?>" target="_blank">Agreement</a>
                        
                        </div>
           	</div>

			<div id="tab-6">
				<div class="gadget_content">
                  <div class="subblock">
                    <h2>Activity Log</h2>
                    
                    <table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <th scope="col">Did When?</th>
                        <th scope="col">Who Did?</th>
                        <th scope="col">Did What?</th>
                      </tr>
                      <tr>
                        <td><?php echo $row_dealer_activity['dudes_dlr_created_at']; ?></td>
                        <td><?php echo $row_dealer_activity['dudes_dlr_dude_name']; ?></td>
                        <td><?php echo $row_dealer_activity['dudes_dlr_body']; ?></td>
                      </tr>
                    </table>
                    <p>&nbsp;</p>
                    </div>
				</div>
			</div>

		  <div id="tab-7">
				<div class="gadget_content">
                    <div class="subblock">
                    
                    <h2>Send Emails To Dealer With One Button Push </h2>
                    <span>- Letters Send Ajax And Logged In Activity -</span>

                    <ul>
                        <li>
                        <div id="send_welcomeletter_result"></div>
                    	<button id="send_welcomeletter">Send Dealer Welcome Letter</button>
                        </li>
                        <li>
                        <div id="send_dealerpasswordreminder_result"></div>
                    	<button id="send_dealerpasswordreminder">Send Dealer Password Reminder</button>
                        </li>
                        <li>
                        <div id="send_salespersonletter_result"></div>
                    	<button id="send_salespersonletter">Send Sales Person Welcome Letter</button>                        
                    	</li>
                        <li>
                        <div id="send_salespersonpasswordreminder_result"></div>
                    	<button id="send_salespersonpasswordreminder">Send Sales Person Welcome Letter</button>                        
                    	</li>

					</ul>                    
                    	
                        <div class="clr"></div>
                  </div>
				</div>
			</div>
            
            
          </div><!-- End Tab Blocks -->
        </div>

		<!-- end dealer view tabs -->
        
        
        <p></p>
        <p></p>
        
        <!-- Dealer Update Form -->        
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
                  <p>
                  <strong>Please Select This Type Of Dealership</strong>
                  <br />
                  <table>
                  	<tr>
                    	<td>
                    <label>
                      <input <?php if (!(strcmp($row_dealer_query['dealer_type_id'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="dealerType" value="1" id="dealerType_0" />
                      Franchise</label>
                      </td>
                      <td>
                    <label>
                      <input <?php if (!(strcmp($row_dealer_query['dealer_type_id'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="dealerType" value="2" id="dealerType_1" />
                      BuyHerePayHere</label>
                      </td>
                      <td>
                    <label>
                      <input <?php if (!(strcmp($row_dealer_query['dealer_type_id'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="dealerType" value="3" id="dealerType_2" />
                      Special Finance</label>
                      </td>
                      	
                        <td>
                    <label>
                      <input <?php if (!(strcmp($row_dealer_query['dealer_type_id'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="dealerType" value="4" id="RentToOwn_3" />
                      Rent To Own</label>
                      </td>
						
                        <td>
                    <label>
                      <input <?php if (!(strcmp($row_dealer_query['dealer_type_id'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="dealerType" value="5" id="dealerType_4" />
                      Wholesale</label>
                      </td>
                      
                      </tr>
                      </table>
                  </p>
                </li>

                <li>
                  <label for="contact"><strong>DM Contact Name</strong> (#1 Owner/Decision Maker Name) </label>
                  <input name="id" type="hidden" value="<?php echo $did; ?>" />
                  <input name="contact" class="text medium" id="contact" value="<?php echo $row_dealer_query['contact']; ?>" />
                  <input name="contact_title" class="text medium" id="contact_title" value="<?php echo $row_dealer_query['contact_title']; ?>" />
                  <div class="clr"></div>
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
                  <input name="dmcontact2_title" class="text medium" id="dmcontact2_title" value="<?php echo $row_dealer_query['dmcontact2_title']; ?>" />
                  <div class="clr"></div>
                </li>


                <li>
                  <label for="Decion_Maker-Info"><strong>DM Contact Information</strong> (#2 Owner/Decision Maker)</label>
                  <input name="dmcontact2_phone" class="text small" id="contact_phone" value="<?php echo $row_dealer_query['dmcontact2_phone']; ?>" />
                  <input name="dmcontact2_phone" class="text small" id="dmcontact2_phone" value="<?php echo $row_dealer_query['dmcontact2_phone']; ?>" />
                  <div class="clr"></div>
                  <label class="small">Direct Phone Number</label>                
                  <label class="small">Phone Type:</label>                
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
                  <label for="city" class="small">City</label>                
                  <label for="state" class="small">State</label>                
                  <label for="zip" class="small">Zip</label>                
                  <div class="clr"></div>
                </li>
                
                
                <!-- Webiste -->
                
                <li>
                	<label for="website" ><strong>Website Url:</strong> http://www.</label>
                    <input name="website" class="text large" id="website" value="<?php echo $row_dealer_query['website']; ?>" />
                    <label>Only The URL and extentsion .com,biz,org,.net,.co or etc.</label>
                    <div class="clr"></div>
                </li>

                <li> 

                    Email For Accounts Receiveable To Be BCC on Send Invoices.
                    <br /><br />
                 	<label for="accts_payables_email" class="small"  ><strong>Accounts Payables Email:</strong></label>
                    <label for="accts_payables_name" class="small" ><strong>Accounts Payables Name:</strong></label>
                    <label class="small" ><strong>Verified: = </strong> <?php echo $row_dealer_query['accts_payables_verified']; ?></label>
                  	<div class="clr"></div>

                    <input name="accts_payables_email" class="text medium" id="accts_payables_email" value="<?php echo $row_dealer_query['accts_payables_email']; ?>" placeholder="Email Accts. Rcv" />
                    <input name="accts_payables_name" class="text medium" id="accts_payables_name" value="<?php echo $row_dealer_query['accts_payables_name']; ?>" placeholder="Name Accts. Rcv" />
					<div class="clr"></div>
                    <input name="accts_payables_password" class="text medium" id="accts_payables_password" value="<?php echo $row_dealer_query['accts_payables_password']; ?>" placeholder="accts_payables_password" />
                    <input name="accts_payables_phone" class="text medium" id="accts_payables_phone" value="<?php echo $row_dealer_query['accts_payables_phone']; ?>" placeholder="accts_payables_phone" />
                    
                    <label>Only Support Will Provide This Accurate Email Address Entering Here Will Not Activate
                    </label>
                    <div class="clr"></div>
               
                </li>


                <li>
 
                 	<label for="accts_rcvbles_email" class="small"  ><strong>Accounts Receivable Email:</strong></label>
                    <label for="accts_rcvbles_name" class="small" ><strong>Accounts Receivable Name:</strong></label>
                    <label class="small" ><strong>Verified: = </strong> <?php echo $row_dealer_query['accts_rcvbles_verified']; ?></label>
                  	<div class="clr"></div>

                    <input name="accts_rcvbles_email" class="text medium" id="accts_rcvbles_email" value="<?php echo $row_dealer_query['accts_rcvbles_email']; ?>" placeholder="Email Accts. Rcv" />
                    <input name="accts_rcvbles_name" class="text medium" id="accts_rcvbles_name" value="<?php echo $row_dealer_query['accts_rcvbles_name']; ?>" placeholder="Name Accts. Rcv" />
					<div class="clr"></div>
                    
                    <input name="accts_rcvbles_password" class="text medium" id="accts_rcvbles_password" value="<?php echo $row_dealer_query['accts_rcvbles_password']; ?>" placeholder="accts_rcvbles_password" />
                    <input name="accts_rcvbles_phone" class="text medium" id="accts_rcvbles_phone" value="<?php echo $row_dealer_query['accts_rcvbles_phone']; ?>" placeholder="accts_rcvbles_phone" />
                    
                    <label>Only Support Will Provide This Accurate Email Address Entering Here Will Not Activate
                    <br /><br />
                    Email For Accounts Receiveable On  To Be Determined
                    </label>
                    <div class="clr"></div>
               
                </li>
                
                <li>
 
                 	<label for="leadsidsemail" ><strong>IDS Email For Leads:</strong></label>
                    <input name="leadsidsemail" class="text large" id="leadsidsemail" value="<?php echo $row_dealer_query['leadsidsemail']; ?>" />
                    <label>Only Support Will Provide This Accurate Email Address Entering Here Will Not Activate
                    <br /><br />
                    leads@url.idscrm.com
                    
                    </label>
                    <div class="clr"></div>
               
                </li>
                
                <!-- Website -->
                
                
                
                
                <!-- Finance -->
                
                <li>
                  <label for="phone" class="small"><strong>Main Phone Number:</strong></label>                
                  <label for="fax" class="small"><strong>Fax Number:</strong></label>                
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
                  <label for="finance_contact" class="small">Finance Contact Name:</label>
                  <label for="finance" class="small">Finance Phone:</label>       
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
                  <label><strong>Map I-Frame:</strong> (Copy & Paste The Goolgle Map Here)</label>
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
					
					<?php }elseif(!$dudes_id){ ?>
                    
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
                  <td>
				  	<?php echo $row_dealer_leads['cust_nickname']; ?><br />
                    <?php echo $row_dealer_leads['cust_fname']; ?> <?php echo $row_dealer_leads['cust_lname']; ?>
                  </td>
                  <td><?php echo $row_dealer_leads['cust_phoneno']; ?> <?php echo $row_dealer_leads['cust_phonetype']; ?></td>
                  <td><?php echo $row_dealer_leads['cust_lead_created_at']; ?></td>
                  <td><?php echo $row_dealer_leads['cust_home_city']; ?>, <?php echo $row_dealer_leads['cust_home_state']; ?> 
				  	<?php echo $row_dealer_leads['cust_home_zip']; ?>
                  </td>
                  <td><a href="mailto:<?php echo $row_dealer_leads['cust_email']; ?>"><?php echo $row_dealer_leads['cust_email']; ?></a></td>
                  <td width="28">
                  <a href="<?php echo $row_dealer_leads['cust_leadid']; ?>">
                  <img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a>
                  </td>
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

mysqli_free_result($note);

mysqli_free_result($dlr_vehicles_live);

mysqli_free_result($dlr_vehicles_sold);

mysqli_free_result($dlr_vehicles_hold);

mysqli_free_result($queryInvoices);

mysqli_free_result($query_payments);

mysqli_free_result($query_dudes);

mysqli_free_result($sales_persons);

mysqli_free_result($dealer_activity);

mysqli_free_result($livehelp_credentials);

mysqli_free_result($recurringInvoies);
?>