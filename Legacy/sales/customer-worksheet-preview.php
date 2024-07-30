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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "updateCustleadsbyid")) {
  $updateSQL =  "UPDATE cust_leads SET cust_nickname=%s, cust_fname=%s, cust_mname=%s, cust_lname=%s, cust_email=%s, cust_dealer_id=%s, cust_vehicle_id=%s, cust_salesperson_id=%s, cust_date_td=%s, cust_hour_td=%s, cust_min_td=%s, cust_ampm_td=%s, cust_lead_token=%s WHERE cust_leadid=%s",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_mname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_vehicle_id'], "int"),
                       GetSQLValueString($_POST['cust_salesperson_id'], "int"),
                       GetSQLValueString($_POST['cust_date_td'], "text"),
                       GetSQLValueString($_POST['cust_hour_td'], "int"),
                       GetSQLValueString($_POST['cust_min_td'], "int"),
                       GetSQLValueString($_POST['cust_ampm_td'], "text"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"),
                       GetSQLValueString($_POST['cust_leadid'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);
}

$colname_userSets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userSets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userSets =  "SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);
$sid = $row_userSets['salesperson_id']; //$sid;
$did = $row_userSets['main_dealerid']; //$did;
foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}

$colname_querycust_leads = "-1";
if (isset($_GET['lead'])) {
  $colname_querycust_leads = $_GET['lead'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querycust_leads =  "SELECT * FROM cust_leads WHERE cust_leadid = %s AND cust_leads.cust_salesperson_id = $sid", GetSQLValueString($colname_querycust_leads, "int"));
$querycust_leads = mysqli_query($idsconnection_mysqli, $query_querycust_leads);
$row_querycust_leads = mysqli_fetch_assoc($querycust_leads);
$totalRows_querycust_leads = mysqli_num_rows($querycust_leads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fiveminutes = "SELECT * FROM time_minutes_5 ORDER BY fivemin_name ASC";
$fiveminutes = mysqli_query($idsconnection_mysqli, $query_fiveminutes);
$row_fiveminutes = mysqli_fetch_assoc($fiveminutes);
$totalRows_fiveminutes = mysqli_num_rows($fiveminutes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersoninventory = "SELECT * FROM vehicles, sales_person, car_model, colors_hex WHERE sales_person.main_dealerid   AND  vehicles.did = $did  AND vehicles.vmodelid = car_model.id  AND vehicles.vecolor = colors_hex.color_id";
$salespersoninventory = mysqli_query($idsconnection_mysqli, $query_salespersoninventory);
$row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory);
$totalRows_salespersoninventory = mysqli_num_rows($salespersoninventory);



?>
<?php 
$clid = $row_querycust_leads['cust_leadid'];

$spemail = $row_userSets['salesperson_email'];
$spmphone = $row_userSets['salesperson_mobilephone_number'];
$spactstatus = $row_userSets['acct_status'];
$spfirstname = $row_userSets['salesperson_firstname'];
$splastname = $row_userSets['salesperson_lastname'];
$spweburl = $row_userSets['website_url'];
$spwebhomepage = $row_userSets['salesperson_homepage'];

$clid = $row_querycust_leads['cust_leadid'];
$clnickname = $row_querycust_leads['cust_nickname'];
$clfname =  $row_querycust_leads['cust_fname'];
$clmname =  $row_querycust_leads['cust_mname'];
$cllname =  $row_querycust_leads['cust_lname'];
$clphoneno = $row_querycust_leads['cust_phoneno'];
$clphonetype = $row_querycust_leads['cust_phonetype'];
$clemail = $row_querycust_leads['cust_email'];
$cltoken = $row_querycust_leads['cust_lead_token'];
$clvid = $row_querycust_leads['cust_vehicle_id'];
$clapptdate = $row_querycust_leads['cust_date_td'];
$clapphour = $row_querycust_leads['cust_hour_td'];
$clappminute = $row_querycust_leads['cust_min_td'];
$clappampm = $row_querycust_leads['cust_ampm_td'];

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer To Inventory</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<div class="container">

<!-- HEADER -->

				<?php include('parts/top-header.php') ?>


<!-- MAIN CONTENT -->
  
		<div class="content">

<!-- GREAT BLOCK -->
		
        <div class="block_gr vertsortable">

     <!-- gadget paragraph -->
      	
        <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Your Customer Lead Info
          	<span>
				<?php echo $clfname.','; ?>
                <?php echo $cllname.','; ?> 
				<?php echo $clemail.','; ?> 
                <strong>Appt. Date:</strong>
                <?php echo $clapptdate; ?>
                <strong>At:</strong>
                <?php echo $clapphour; ?>&nbsp;
                <?php echo $clappminute; ?>&nbsp;
                <?php echo $clappampm; ?>
            </span>
            <br />
            Your Token For This Customer: 
			<?php if(!$cltoken){ echo 'Not Captured Yet';}else{ echo $cltoken;} ?>
          </h3>
          <div class="gadget_content">
              <p>
           	  Complete Your Customer Profile And Assign Them To A Vehicle Below.</p>
              <p>Be sure you save this page from beliving.</p>
              Note: You can send this customer a email with link, directions, mobile friendly view, and also allow them to select inventory you should be able to send.
              <form name="updateCustleadsbyid" method="POST" action="<?php echo $editFormAction; ?>">
                <p>
                  <label>Customers Nick Name:
                    <input name="cust_nickname" type="text" id="cust_nickname" value="<?php echo $clnickname; ?>" />
                  </label>
                </p>
                <p>
                  <label>Customers First Name:
                    <input type="text" name="cust_fname" id="cust_fname" value="<?php echo $clfname; ?>" />
                  </label>
                </p>
                <p>
                  <label>Customers Mid. Name
                    <input type="text" name="cust_mname" id="cust_mname" value="<?php echo $clmname; ?>" />
                  </label>
                </p>
                <p>
                  <label>Customers Last Name:
                    <input type="text" name="cust_lname" id="cust_lname" value="<?php echo $cllname; ?>" />
                  </label>
                </p>
                <p>
                 <label>Customers Email:
                    <input type="text" name="cust_email" id="cust_email" value="<?php echo $clemail; ?>" />
                  </label>
                </p>

                <p>
                  <label>Customer Lead Token Id:
                    <input name="cust_lead_token" type="text" id="cust_lead_token" value="<?php echo $cltoken; ?>" />
                  </label>
                </p>
                <p>Send A Work Up To This Customer By Email, <br />
					Follow Up Within So Many Hours, <br />
					Track This Customer For 72 Hours... <br />
                </p>
                <table width="500">
                  <tr>
                    <td><label>
                      <input type="checkbox" name="HuntThisCustomerInside" value="1" id="HuntThisCustomerInside_0" />
                      Send A Work Up To This Customer</label></td>
                 
                    <td><label>
                      <input type="checkbox" name="Hunt This Customer Inside" value="2" id="HuntThisCustomerInside_1" />
                      Track This Customer For 72 Hours</label></td>
                  </tr>
                </table>
                <br />
                <p>
					<label>Schedule A Test Drive! With This Customer:</label>
                    <input type="text" name="cust_date_td" id="cust_date_td" value="" />
                    
                </p>
                <p>
                  <label>Test Drive Hour:
                    <select name="cust_hour_td" id="cust_hour_td">
                      <option value="9:00">9:00</option>
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="12:00">12:00</option>
                      <option value="1:00">1:00</option>
                      <option value="2:00">2:00</option>
                      <option value="3:00">3:00</option>
                      <option value="4:00">4:00</option>
                      <option value="5:00">5:00</option>
                      <option value="6:00">6:00</option>
                      <option value="7:00">7:00</option>
                      <option value="8:00">8:00</option>
                    </select>
                  Minute:
                  <select name="cust_min_td" id="cust_min_td">
                    <option value="" <?php if (!(strcmp("", $row_querycust_leads['cust_min_td']))) {echo "selected=\"selected\"";} ?>>Select</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fiveminutes['fivemin_name']?>"<?php if (!(strcmp($row_fiveminutes['fivemin_name'], $row_querycust_leads['cust_min_td']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fiveminutes['fivemin_name']?></option>
                    <?php
} while ($row_fiveminutes = mysqli_fetch_assoc($fiveminutes));
  $rows = mysqli_num_rows($fiveminutes);
  if($rows > 0) {
      mysqli_data_seek($fiveminutes, 0);
	  $row_fiveminutes = mysqli_fetch_assoc($fiveminutes);
  }
?>
                  </select>
                  AM/PM
                  <select name="cust_ampm_td" id="cust_ampm_td">
                    <option value="AM" <?php if (!(strcmp("AM", $row_querycust_leads['cust_ampm_td']))) {echo "selected=\"selected\"";} ?>>AM</option>
                    <option value="PM" <?php if (!(strcmp("PM", $row_querycust_leads['cust_ampm_td']))) {echo "selected=\"selected\"";} ?>>PM</option>
                  </select>
                  </label>
                </p>
                <p>
                  <label>CID:
                    <input name="cust_leadid" type="text" id="cust_leadid" value="<?php echo $clid; ?>" />
                  </label>
                  <label>DID:
                    <input name="cust_dealer_id" type="text" id="cust_dealer_id" value="<?php echo $did; ?>" />
                  </label>
                  <label>SID:
                    <input name="cust_salesperson_id" type="text" id="cust_salesperson_id" value="<?php echo $sid; ?>" />
                  </label>
                  <label>VID:
                    <input name="cust_vehicle_id" type="text" id="cust_vehicle_id" value="<?php echo $clvid; ?>" />
                  </label>
                </p>
                <p>
                  <input type="hidden" name="MM_update" value="updateCustleadsbyid">
                </p>
                <br />
                                <hr />
                <br />

                <p>
                  <label>
                    <input type="submit" name="submit" id="submit" value="Save">
                  </label>
                </p>
              </form>
              <p>&nbsp;
           	  </p>
              <p>&nbsp;</p>
            <p><a href="#">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>
      
     <!-- gadget usertable -->
      	
        <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Available Inventory<span>Choose A Vehicle Below To Send To A Customer</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>Type</th>
                <th>Stock No.</th>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Color</th>
                <th align="center">Required Down &raquo;</th>
                <th>Asking Price &raquo;</th>
                <th>Special Price &raquo;</th>
                <th>Status</th>
              </tr>
             
              
                <?php do { ?>
                                <tr>
                                  <td><input name="utc3" id="utc3" type="checkbox" /></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vcondition']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vstockno']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vyear']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['make']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['model']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['color_name']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vdprice']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vrprice']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vspecialprice']; ?><br /></td>
                                  <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
                                </tr>
               <?php } while ($row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory)); ?>
              
              
            </table>
            </form>
          </div>
        </div>
      </div>

      
      
      <!-- gadget right 2 -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Add Inventory<span>What you add will be avialable for your store.</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_example" class="form_example">
            <ol>
              <li>
                <label for="name"><strong>Name</strong> (Small input form example)</label>
                <input id="name" name="name" class="text medium" />
              </li>
              <li>
                <label for="address"><strong>Address</strong> (Large input form example)</label>
                <input id="address" name="address" class="text large" />
              </li>
              <li>
                <label for="descr"><strong>Description</strong> (Large input form example)</label>
                <textarea id="descr" name="descr" rows="6" cols="50"></textarea>
              </li>
              <li>
                <label for="multiply"><strong>Multiply</strong> (small input form example)</label>
                <input id="multiply" name="multiply" type="hidden" value="" />
                <input id="multiply1" name="multiply1" class="text small" />
                <input id="multiply2" name="multiply2" class="text small" />
                <input id="multiply3" name="multiply3" class="text small" />
                <div class="clr"></div>
                <label for="multiply1" class="small">example</label>                
                <label for="multiply2" class="small">example</label>                
                <label for="multiply3" class="small">example</label>                
                <div class="clr"></div>
              </li>
              <li>
                <label for="dropdown"><strong>Drop down box</strong></label>
                <select id="dropdown" name="dropdown">
                  <option selected="selected" value="Standart Results">Example 1</option>
                  <option value="Example 2">Example 2</option>
                  <option value="Example 3">Example 3</option>
                  <option value="Example 4">Example 4</option>
                  <option value="Example 5">Example 5</option>
                  <option value="Example 6">Example 6</option>
                </select>
              </li>
              <li>
                <label for="date"><strong>Date</strong></label>
                <input id="date" name="date" type="hidden" value="" />
                <input id="dateyear" name="dateyear" maxlength="4" class="text year" /> /
                <input id="datemonth" name="datemonth" maxlength="2" class="text date" /> /
                <input id="dateday" name="dateday" maxlength="2" class="text date" />
                <div class="clr"></div>
                <label for="dateyear" class="year">YYYY</label>                
                <label for="datemonth" class="date">MM</label>                
                <label for="dateday" class="date">DD</label>                
                <div class="clr"></div>
              </li>
              <li>
                <label for="check"><strong>Checkbox</strong></label>
                <input name="check" type="checkbox" class="checkbox" />Lorem Ipsum is simply dummy text of the printing and typesetting industry.</input>
              </li>
            </ol>
            </form>
            <p><a href="#">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>


    </div><!-- End Main Boady View -->

<!-- SMALLER BLOCK -->

				<?php include('parts/left-tower.php') ?>

				<div class="clr"></div>

  </div>




				<?php
						//This Unlocks The Customer to Inventory Form
						//include('custom_pages/customer_to_inventory.php') 
				?>
  
  
<!-- FOOTER -->
  
				
				<?php include('parts/sales_footer.php') ?>
                
                
<!-- DIALOGS -->
  
  
  
  
  
  <?php //include('dialogs/crm-power.php') ?>
  
</div>

</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($querycust_leads);

mysqli_free_result($fiveminutes);

mysqli_free_result($salespersoninventory);
?>
