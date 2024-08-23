<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
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
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ovrphngoal")) {
  $insertSQL =  sprintf("INSERT INTO cust_leads (cust_nickname, cust_email, cust_lead_temperature, cust_phoneno, cust_phonetype, cust_lead_sp_comment, cust_dealer_id, cust_salesperson_id, cust_lead_token) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_lead_temperature'], "text"),
                       GetSQLValueString($_POST['cust_phoneno'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_lead_sp_comment'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_salesperson_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-salesp-lead-process.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_quickcontact")) {
  $insertSQL =  sprintf("INSERT INTO cust_leads (cust_nickname, cust_fname, cust_lname, cust_email, cust_lead_temperature, cust_phoneno, cust_phonetype, cust_lead_sp_comment, cust_dealer_id, cust_salesperson_id, cust_lead_token) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_lead_temperature'], "text"),
                       GetSQLValueString($_POST['cust_phoneno2'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_lead_sp_comment'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_salesperson_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-salesp-lead-process.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $insertGoTo));
}

$colname_userSets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userSets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userSets =  sprintf("SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);
$sid = $row_userSets['salesperson_id'];
$did = $row_userSets['main_dealerid'];
$phonedisplay=$row_userSets['sales_pitch'];


foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}

$maxRows_spleads = 10;
$pageNum_spleads = 0;
if (isset($_GET['pageNum_spleads'])) {
  $pageNum_spleads = $_GET['pageNum_spleads'];
}
$startRow_spleads = $pageNum_spleads * $maxRows_spleads;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_spleads = "SELECT * FROM cust_leads WHERE cust_salesperson_id = $sid ORDER BY cust_lead_created_at DESC";
$query_limit_spleads =  sprintf("%s LIMIT %d, %d", $query_spleads, $startRow_spleads, $maxRows_spleads);
$spleads = mysqli_query($idsconnection_mysqli, $query_limit_spleads);
$row_spleads = mysqli_fetch_assoc($spleads);

if (isset($_GET['totalRows_spleads'])) {
  $totalRows_spleads = $_GET['totalRows_spleads'];
} else {
  $all_spleads = mysqli_query($idsconnection_mysqli, $query_spleads);
  $totalRows_spleads = mysqli_num_rows($all_spleads);
}
$totalPages_spleads = ceil($totalRows_spleads/$maxRows_spleads)-1;
?>
<?php
include('../Libary/functionShowVehiclePhoto.php');

include('../Libary/functionSalesPersonNotification.php');

include('../Libary/token-generator.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Dashboard</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script language="JavaScript" SRC="calendar/calendar.js"></script>
<script language="JavaScript" SRC="js/idsSalesperson.js"></script>
<script language="JavaScript">

	var cal = new CalendarPopup();

</script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

<!-- HEADER -->

	<?php include('parts/top-header.php'); ?>
    
    
    
    
    
<!-- START MAIN CONTENT ------------------------------------------------------>
  
	
	

	
				<div class="content">
    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

      <!-- gadget Welcome -->
      <div class="gadget jsi_gv">
        <div class="gadget_border gb_noborder">
          <h3>
            <a href="add-inventory.php" title="Add Inventory"><img src="images/icon15.gif" alt="picture" width="48" height="48" class="icons1" /></a>
            <a href="#" title="????"><img src="images/icon14.gif" alt="picture" width="48" height="48" class="icons1" /></a>
            <a href="#" title="??"><img src="images/icon13.gif" alt="picture" width="48" height="48" class="icons1" /></a>
            <a href="#" title="???"><img src="images/icon12.gif" alt="picture" width="48" height="48" class="icons1" /></a>
            <a href="customer-add.php" title="Add A New Customer"><img src="images/icon11.gif" alt="picture" width="48" height="48" class="icons1" /></a>
			Hi! <?php echo $row_userSets['salesperson_firstname']; ?> Lets Get Started!
            <span>Please feel free to use the navigations to the left.</span>
          </h3>
          <div class="gadget_content">
            <div class="eben_left">
            		<div class="eben_right">
                    <div class="eben_center">
             
              <div class="eben_bl">
              	<div class="eben_l">
                	<a href="#dialog1" name="modal"><img src="images/button_startupnow.png" width="160" height="46" alt="Start Up Now!" /></a>
                	<a href="#"><img src="images/button_or.gif" width="50" height="46" alt="or" /></a>
                	<a href="#"><img src="images/button_learnmore.png" width="160" height="46" alt="Learn More" /></a>
                					
                                    <div class="clr"></div>
              	</div>
             </div>
             
              <div class="eben_br">
              	<div class="eben_r">
                	<a href="appointments.php" target="_blank"><img title="View My Appointments" src="images/icon16.gif" alt="picture" width="48" height="48" /></a>
                		<p><strong>My</strong><br />Appointments</p>
                					<div class="clr"></div>
              	</div>
               </div>
             </div>
            </div>
           </div>
          </div>
        </div>
      </div>

      <!-- message
      <div class="gadget jsi_msg jsi_msg_yellow"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
      <div class="gadget jsi_msg jsi_msg_red"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
	  -->
      
      <!-- gadget usertable -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Sales Account Tips &amp; Tutorial Guide <span>Select From The Navigations Below.</span></h3>
          <div class="gadget_content">
            <ul class="admin_boxes">
            <li><a href="inventory.php"><img src="images/icon23.gif" alt="picture" width="48" height="48" /></a><br /><a href="inventory.php">Inventory</a></li>
            
              <li><a href="#"><img src="images/icon21.gif" alt="picture" width="48" height="48" /></a><br />
              <a href="#">My Task(s)</a></li>
              <li><a href="myacct.php"><img src="images/icon22.gif" alt="picture" width="48" height="48" /></a><br /><a href="myacct.php">My Acct.</a></li>
              
              <li><a href="app_manager.php"><img src="images/icon24.gif" alt="picture" width="48" height="48" /></a><br /><a href="sales-creditapplication.php">Credit Application</a></li>
              <li><a href="#"><img src="images/icon25.gif" alt="picture" width="48" height="48" /></a><br /><a href="coming-soon.php">Email</a></li>
              <li><a href="#"><img src="images/icon26.gif" alt="picture" width="48" height="48" /></a><br /><a href="coming-soon.php">Market</a></li>
            </ul>
            <div class="clr"></div>
            
            <!--
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into <strong>el software like Aldus PageMaker including versions</strong></p>
            -->
            
            
            
          </div>
        </div>
      </div>


      <!-- gadgets horisontal -->
      <div class="horizsortable">
      
        <div class="gadget jsi_gh">
        
          <div class="gadget_border">
            
            <h3>Customer Power Track<span>Statsistics | Blast | Sales Convert</span></h3>
            
            <div class="gadget_content">
              <a href="coming-soon.php"><img src="images/icon31.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>Post Adds On Craigslit Marketing</h4><p><a href="#">Sales Pipeline, Vehicle Marketing, Video Marketing, Tutorials</a></p>
            </div>
              
              <a href="coming-soon.php"><img src="images/icon32.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>View Leads</h4>
              <p><a href="leads.php">View Previous Appointments Set, Pending, &amp; History..</a></p></div>
              <div class="clr"></div>
              
              <a href="leads.php"><img src="images/icon32.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>Appointment Log</h4>
              <p><a href="coming-soon.php">View Previous Appointments Set, Pending, &amp; History..</a></p></div>
              <div class="clr"></div>
              
              
            </div>
          </div>
          <ul class="whitesquare"><li><a href="customers.php">Customer Power Track</a></li></ul>
        </div>
  
        <div class="gadget jsi_gh">
          <div class="gadget_border">
            <h3>View/Add Customers <span>Add Or Edit Existing Ones</span></h3>
            <br>

                        <a href="customer-add.php"><img src="images/icon32.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>View Customers</h4>
              <p><a href="customers.php">View Previous Appointments Set, Pending, &amp; History..</a></p></div>
              <div class="clr"></div>

            <h3> Credit Application Start <span>Or Edit Existing Ones</span></h3>
            <div class="gadget_content"> <a href="full-credit-app.php"><img src="images/icon33.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>Start A New Credit Application</h4><p><a href="sales-creditapplication.php">Start A Brand New Auto Credit Application.</a></p></div>
              <a href="full-credit-app-update.php"><img src="images/icon34.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>Edit / Preview App.</h4>
              <p><a href="app_manager.php">Update Or Edit A Previous Auto Credit Application From Your Existing Customers List.</a></p>
              
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <ul class="whitesquare"><li><a href="app_manager.php">Convert More Internet Customers</a></li></ul>
        </div>
  
        <div class="gadget jsi_gh">
          <div class="gadget_border">
            <h3>Inventory Options <span>View Search Inventory</span></h3>
            <div class="gadget_content">
              <a href="coming-soon.php"><img src="images/icon35.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
              <h4>View / Edit Inventory</h4>
              <p><a href="inventory.php">View Or Edit Vehicles In Your Inventory.</a></p></div>
              <a href="inventory.php"><img src="images/icon36.gif" alt="picture" width="48" height="48" class="leftimg" /></a>
              <div class="miniblock">
                <h4>View Leads With Inventory</h4>
                <p><a href="leads-all.php">See leads with vehicle communications sent to your dealership which are strong potential customers.</a></p></div>
              <div class="clr"></div>
            </div>
          </div>
          <ul class="whitesquare"><li><a href="appointments.php">Appointments</a></li></ul>
        </div>
        
        <div class="clr"></div>
      </div>
      
      <!-- gadget usertable -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3> Leads <span>This is A Quick Snapshot Of Your Lastest Leads</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Phone Nmber</th>
                <th width="90">Date Captured</th>
                <th width="120">Status</th>
                <th>E-mail</th>
                <th width="50">Actions</th>
              </tr>
              
              
              <?php do { ?>
                <tr>
                  <td><input name="utc2" id="utc2" type="checkbox" /></td>
                  <td title="<?php echo $row_spleads['cust_nickname']; ?>"><?php echo $row_spleads['cust_fname']; ?>&nbsp;<?php echo $row_spleads['cust_lname']; ?></td>
                  <td title="<?php echo $row_spleads['cust_phonetype']; ?>"><?php echo $row_spleads['cust_phoneno']; ?></td>
                  <td><?php echo $row_spleads['cust_lead_created_at']; ?></td>
                  <td><?php echo $row_spleads['cust_lead_temperature']; ?></td>
                  <td><?php echo $row_spleads['cust_email']; ?></a>
                  </td>
                  <td width="28"><a href="customer-lead-edit.php?lead=<?php echo $row_spleads['cust_leadid']; ?>"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
                </tr>
                <?php } while ($row_spleads = mysqli_fetch_assoc($spleads)); ?>
                <?php if ($totalRows_spleads == 0) { // Show if recordset empty ?>
                  <tr class="last">
                    <td><input name="utc4" id="utc4" type="checkbox" /></td>
                    <td>None To Display</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td><a href="coming-soon.php"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
                  </tr>
                  <?php } // Show if recordset empty ?>
            </table>
            </form>
          </div>
        </div>
      </div>

    </div>
    
    
    
    <!-- START LEFT TOWER BLOCK -->
    
    
    
    <div class="block_sm vertsortable">

      <!-- gadget calendar -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Calendar <span>...</span></h3>
          <div class="gadget_content">
            <div id="datepicker"></div>
            <div class="clr"></div>
            <p><a href="customer-add.php" class="bg_grey">+ Add Appt.</a> &nbsp; <a href="appointments.php" class="bg_grey">List Appts.</a></p>
          </div>
        </div>
      </div>

     <!-- gadget dashboard -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Dashboard <span>...</span></h3>
          <div class="gadget_content">
            <ul class="dashboard">
            
              <li class="li1"><a href="coming-soon.php">Dashboard</a></li>
              
              <li class="li3"><a href="add-inventory.php">Add Inventory</a></li>

              <li class="li3"><a href="add-customer.php">Add Customer</a></li>
              
              
              <li class="li4"><a href="customers.php">Search Customer</a></li>


              <li class="li4"><a href="appointments.php">Appointments</a></li>


              
              <li class="li7"><a href="myacct.php">My Settings</a></li>
            
            </ul>
          </div>
        </div>
      </div>

      <!-- gadget leadcapture -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Quick Capture Lead<span>...</span></h3>
          
          <div class="gadget_content">
            
			<form name="form_quickcontact"  action="<?php echo $editFormAction; ?>" method="POST" id="form_quickcontact" class="form_quickcontact">
            <ol>
             <li>
              <label for="cust_nickname">Customer Nick Name:</label>
              <input id="cust_nickname" name="cust_nickname" class="text" />
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="cust_fname">Customer First Name:</label>
              <input type="text" id="cust_fname" name="cust_fname" class="text" />
              <div class="clr"></div>
            </li>

             <li>
              <label for="cust_lname">Customer Last Name:</label>
              <input id="cust_lname" name="cust_lname" class="text" />
              <div class="clr"></div>
            </li>

            
            <li>
              <label for="email">Customer Phone Number:</label>
              <span id="sprytextfield4">
              <input id="cust_phoneno2" name="cust_phoneno2" class="text" />
              <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
              <div class="clr"></div>
            </li>
			
            <li>
              <label for="cust_phonetype">Phone Type:</label>
              <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
              </select>
              
              
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="email">Customer Email:</label>
              <span id="sprytextfield5">
              <input id="cust_email" name="cust_email" class="text" /><br />
              	<span class="textfieldRequiredMsg">A valid email is required.</span>
              	<span class="textfieldInvalidFormatMsg">Unproper Format.</span>
              </span>
              <div class="clr"></div>
            </li>
            
                        
            <li>
              <label for="cust_lead_sp_comment">Notes & Comments:</label>
              <textarea id="cust_lead_sp_comment" name="cust_lead_sp_comment" rows="3" cols="1"></textarea>
              <div class="clr"></div>
            </li>
            
            <li>
            <label for="cust_lead_temperature">Customer Status:</label>
            <select name="cust_lead_temperature" id="cust_lead_temperature">
              			<option value="Hot">Hot</option>
              			<option value="Warm">Warm</option>
              			<option value="Cold">Cold</option>
            </select>
            <div class="clr"></div>
            </li>
            
            
            <li>
              <input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $sid; ?>">
              <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>">
              <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>">
              <div class="clr"></div>
            </li>
            <li>
              <input type="submit" value="Save Customer" >
              
               
               
               <!--<a href="script-sales-template.php" class="bg_grey">Save Customer</a>
               <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> Post Action -->
              
              
              
              
              <div class="clr"></div>
            </li></ol>
            <input type="hidden" name="MM_insert" value="form_quickcontact">
        </form>
            
          </div>
          
        </div>
      </div>

    </div>
    
    
    
    
    
    
    
    
    
        <?php //include('parts/left-tower.php') ?>
    
    <!-- END LEFT TOWER BLOCK -->
    
    
    <div class="clr"></div>
  </div>
















	<?php //include('custom_pages/dashboard_page.php'); ?>
<!-- END MAIN CONTENT -->













<!-- FOOTER -->
  
	
	
	<?php include('parts/sales_footer.php'); ?>
    
<!-- END FOOTER -->    
    
    
    


























<!-- DIALOGS -->
  
  	<?php //include('dialogs/crm-power.php'); ?>
  

  
  
  
<!-- START Include Brought Out And Pasted For Spry -->


				
                
                
                
                
                
                
                
                
                
                
                
<div id="dialogboxes">
    
    
    <!-- Dialog Box Form  -->

  

    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
         <div id="closewindow">
         <br>
<a href="dashboard.php" target="_parent">Close</a></div><!-- End Close window --> 
          <h3>Over The Phone Prompt<span>Below Is Your - Script</span></h3>
          <div class="gadget_content">

            <p>
            	<strong>
                Note: Remember The longer you have the customer on the phone the better your chances are in converting them.
                </strong> 
                <br /><br />
                Collect Customers Name, Phone Number, and Email Address.  Offer to send them something.
                <br /><br />
                
            </p>

            <p>
            <strong>Read This Phone Script:</strong>
            	<hr />
                <?php include('salesmod/phonescriptdisplay.php'); ?>
	            <hr />
            </p>
            
            
            <div class="cust-input">

              
              <form method="POST" action="<?php echo $editFormAction; ?>" name="ovrphngoal" id="ovrphngoal">
              
              <table cellpadding="5" cellspacing="5">
              	<tr>
                  <td>
                <strong>Cust. Name:</strong></td>
                   
                   <td>
                	<p><span id="sprytextfield1">
                	  <input type="text" name="cust_nickname" id="cust_nickname" /><br />
               	     <span class="textfieldRequiredMsg">Customers Name Missing.</span>
                     </span>
                    </p>
                </td></tr>
                <tr>
                <td><strong>Phone No:</strong></td>
                  <td>
                    <p>
            <span id="sprytextfield2">
                    	<input type="tel" name="cust_phoneno" id="cust_phoneno" /> 
                    	                    	<br />
                    	 <span class="textfieldRequiredMsg">Phone Number Missing</span>
                    	 <span class="textfieldInvalidFormatMsg">Example (404) 555-1234.</span>
            </span>
            
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><strong>Phone Type:</strong></td>
                  <td>
                      <label>
                      <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
                  	      </select>
                  	  </label>
                  </td>
                </tr>
                <tr>
                  <td><strong>Email: </strong></td>
                  <td>
                    <p>
                    <span id="sprytextfield3">
                    <input type="text" name="cust_email" id="cust_email"><br />
                    <span class="textfieldRequiredMsg">A valid email address is required.</span>
                    <span class="textfieldInvalidFormatMsg">Keep Typing...</span></span>
                    </p>
                  </td>
               </tr>
               
               <tr>
                  <td valign="top">
                  	<strong>Your Comments:</strong>
                  </td>
               
                  <td>
                  <p>
                  	<textarea name="cust_lead_sp_comment" cols="25" rows="1"></textarea>
                  </p>
                  </td>
               </tr>
               
               <tr>
                  <td>
                    <label for="cust_lead_temperature">Customer Status:</label>
                   </td>
                   <td>
		            	<select name="cust_lead_temperature" id="cust_lead_temperature">
        		    		<option value="Hot">Hot</option>
              				<option value="Warm">Warm</option>
              				<option value="Cold">Cold</option>
            			</select>

                  </td>
               
                  <td>
                  <input name="cust_lead_token" type="hidden" value="<?php echo $tkey; ?>">
                  </td>
                </tr>
                <tr>
                  <td><strong>&nbsp;</strong></td>
                  <td>
                  <p>
                  
					                
                    

                    
                                      
                  </p>
                  </td>
                </tr>
                <tr>
                <td colspan="2" align="center">
                
                	<input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $row_userSets['salesperson_id']; ?>" />
                  	<input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $row_userSets['main_dealerid']; ?>" />
                  
                   <p><br />
                   <input class="bg_grey" type="submit" name="submit" id="submit" value="Start The CRM Power Process Now">
                   <!-- <a href="#" class="bg_grey" type="submit" name="submit">Start The Process Now - CRM Power</a> -->
                </p>
                </td></tr></table>
              <input type="hidden" name="MM_insert" value="ovrphngoal" />
              <input type="hidden" name="MM_insert" value="ovrphngoal">
              </form>
              
              
            </div>
            
            
          <p>
            	 
                <br />
            </p>
          
          </div><!-- End gadget_content -->
         
        </div>
      </div>
  </div>


    <!-- Empty -->
    
    		
    
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>

<!-- END Include Brought Out And Pasted For Spry -->  
  
  

  
	
  
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "phone_number", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
//-->
</script>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($spleads);

?>
