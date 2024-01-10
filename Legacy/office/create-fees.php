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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "create_fee")) {
  $insertSQL =  "INSERT INTO ids_fees (fee_type, fee_description, fee_taxed, fee_price, fee_amount, fee_source_name) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['fee_type'], "text"),
                       GetSQLValueString($_POST['fee_description'], "text"),
                       GetSQLValueString(isset($_POST['fee_taxed']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['fee_price'], "text"),
                       GetSQLValueString($_POST['fee_amount'], "text"),
                       GetSQLValueString($_POST['fee_source_name'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-insert-fee.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo));
}

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
$query_fromSources = "SELECT * FROM cust_lead_source";
$fromSources = mysqli_query($idsconnection_mysqli, $query_fromSources);
$row_fromSources = mysqli_fetch_array($fromSources);
$totalRows_fromSources = mysqli_num_rows($fromSources);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_idsFees = "SELECT * FROM ids_fees WHERE fee_id = fee_id";
$idsFees = mysqli_query($idsconnection_mysqli, $query_idsFees);
$row_idsFees = mysqli_fetch_array($idsFees);
$totalRows_idsFees = mysqli_num_rows($idsFees);
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
      
		<?php include('parts/modules/billing-left-module.php'); ?>      
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
        
        	<?php include("parts/navigation/billing-invoice-navigation.php"); ?>
        
        </div>
        
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Stored Fees</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>This Here Is Your Latest Invoices Including Previous Balances, Credits For This Dealer | Start A New Invoice For A Dealer (account).</p>
              <table width="100%" border="1" cellspacing="3" cellpadding="3">
                <tr class="em_orange">
                  <th scope="col">Fee Description</th>
                  <th scope="col">Fee Taxed</th>
                  <th scope="col">Fee Price</th>
                  <th scope="col">Fee Amount</th>
                  <th scope="col">Fee Source</th>
                  <th scope="col">Edit</th>
                </tr>
                <?php do { ?>
                    <?php if ($totalRows_idsFees > 0) { // Show if recordset not empty ?>
                    <?php 
					$taxed = $row_idsFees['fee_taxed'];
					
					if($taxed == 0){
						$taxed = 'No';
					}
					if($taxed == 1){
						$taxed = 'Yes';
					}else{
						
						$taxed = 'No';
						
					}
						
					?>
  <tr>
    <td><a href="update-fees.php?fee_id=<?php echo $row_idsFees['fee_id']; ?>"><?php echo $row_idsFees['fee_description']; ?></a></td>
    <td><a href="update-fees.php?fee_id=<?php echo $row_idsFees['fee_id']; ?>"><?php echo $taxed; ?></a></td>
    <td><a href="update-fees.php?fee_id=<?php echo $row_idsFees['fee_id']; ?>"><?php echo $row_idsFees['fee_price']; ?></a></td>
    <td><a href="update-fees.php?fee_id=<?php echo $row_idsFees['fee_id']; ?>"><?php echo $row_idsFees['fee_amount']; ?></a></td>
    <td><a href="update-fees.php?fee_id=<?php echo $row_idsFees['fee_id']; ?>"><?php echo $row_idsFees['fee_source_name']; ?></a></td>
    <td><a href="?delete_id=<?php echo $row_idsFees['fee_id']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa"></a></td>
  </tr>
  <?php } // Show if recordset not empty ?>
<?php } while ($row_idsFees = mysqli_fetch_array($idsFees)); ?>
                <?php if ($totalRows_idsFees == 0) { // Show if recordset empty ?>
                  <tr>
                    <td>No Fees Available</td>
                    <td>No Fees Available</td>
                    <td>No Fees Available</td>
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
        
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Create Your New Fee Here</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
            <form action="<?php echo $editFormAction; ?>" method="POST" name="create_fee" target="_parent" class="form_example">
              <ol>
                <li>
                  <label for="deaelrID"><strong>What Source?</strong></label>
                  <select id="fee_source_name" name="fee_source_name">
                    <option value="">Select A Fee From The Source It Will Be Associated With</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fromSources['cust_lead_source']?>"><?php echo $row_fromSources['cust_lead_source']?></option>
                    <?php
} while ($row_fromSources = mysqli_fetch_array($fromSources));
  $rows = mysqli_num_rows($fromSources);
  if($rows > 0) {
      mysqli_data_seek($fromSources, 0);
	  $row_fromSources = mysqli_fetch_array($fromSources);
  }
?>
                  </select>
                </li>
                <li>
                 <label for="fee_description"><strong>Fee Description</strong></label>
                  <input id="fee_description" name="fee_description" class="text large" />
                
                </li>
                <li>
                  <label for="fee_price"><strong>Fee Price - List or Discount the quanity will calcuate amount on invoice</strong></label>
                  <input id="fee_price" name="fee_price" class="text medium" />
                  <label>Taxed?
                    <input name="fee_taxed" type="checkbox" value="1" />
                  </label>
                </li>
                <li>
                  <label for="fee_price"><strong>Fee Amount - After Quanity Match Price</strong></label>
                  <input id="fee_amount" name="fee_amount" class="text medium" />
                </li>
                <li>
                  <label for="fee_type"><strong>Fee Type?</strong></label>
                  <select name="fee_type" id="fee_type">
                    <option>Select Fee</option>
                    <option value="Labor">Labor</option>
                    <option value="Service">Service</option>
                    <option value="Item">Item</option>
                    <option value="Subscription">Subscription</option>
                    <option value="Deal">Deal</option>
                  </select>
                </li>
                <li>
                  <input name="submit" type="submit" value="Submit" />
                </li>
              </ol>
              <input type="hidden" name="MM_insert" value="create_fee" />
              <input type="hidden" name="MM_insert" value="create_fee" />
            </form>
            </div>
          </div>
        </div>

        <!-- gadget right 5 
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Latest Overdue Invoices</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th width="40"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Username</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
              <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mwwweefail@yahoo.com">mwwweefail@yahoo.com</a></td>
                <td width="28"><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td width="28"><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mail@yahoo.com">mail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:m13dail@yahoo.com">m13dail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              </table>
              </form>
            </div>
          </div>
        </div>
        -->
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

mysqli_free_result($idsFees);

mysqli_free_result($userDudes);

mysqli_free_result($queryDealer);

mysqli_free_result($fromSources);

mysqli_free_result($idsFees);
?>