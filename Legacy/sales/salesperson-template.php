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
      	
        <div class="gadget jsi_gv"></div>
      
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
              <tr>
                <td align="center"><input name="utc2" id="utc2" type="checkbox" /></td>
                <td align="center">Trade-In</td>
                <td align="center">12345678BB</td>
                <td align="center">2010</td>
                <td align="center">Cheverolet</td>
                <td align="center">Suburban</td>
                <td align="center">Blue</td>
                <td align="center">$1,000</td>
                <td align="center">$9,995</td>
                <td align="center">$8,999</td>
                <td width="28"><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc3" id="utc3" type="checkbox" /></td>
                <td align="center">Used</td>
                <td align="center">12345678BB</td>
                <td align="center">2005</td>
                <td align="center">Volkswagen</td>
                <td>Suburban</td>
                <td align="center">Red</td>
                <td align="center">$1,499</td>
                <td align="center">$8,995</td>
                <td align="center">$8,999<br />
                </td>
                <td>
                	<a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
                </td>
              </tr>
              <tr class="last">
                <td><input name="utc4" id="utc4" type="checkbox" /></td>
                <td align="center">Salvage</td>
                <td align="center">12345678BB</td>
                <td align="center">1999</td>
                <td align="center">Aston Martin</td>
                <td align="center">Suburban</td>
                <td align="center">Yellow</td>
                <td align="center">$1,569</td>
                <td align="center">$8,599</td>
                <td align="center">$8,999</td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
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
?>
