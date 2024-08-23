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
  $insertSQL =  sprintf("INSERT INTO cust_leads (cust_nickname, cust_phoneno, cust_dealer_id, cust_salesperson_id, cust_date_td) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_phoneno'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_salesperson_id'], "int"),
                       GetSQLValueString($_POST['cust_date_td'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "inventory.php";
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
foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}



?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About You</title>
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

  <!-- CONTENT -->
  <div class="content">

    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

      <!-- gadget left 1 -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Form Example 1 <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <p><a href="#">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>
      
      <!-- gadget left 2 -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Form Example 2 <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_tabexample" class="form_example">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines arborder">
                <tr>
                  <th width="28"><input name="utc1" id="utc1" type="checkbox" /></th>
                  <th width="100">Name</th>
                  <th width="200" class="lrborder">Email</th>
                  <th width="56" class="calign">Ballance</th>
                  <th class="lrborder">Site</th>
                  <th colspan="3" class="calign">Actions</th>
                </tr>
                <tr>
                  <td><input name="utc2" id="utc2" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td width="24"><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td width="24"><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td width="24"><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
                <tr>
                  <td><input name="utc3" id="utc3" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
                <tr>
                  <td><input name="utc4" id="utc4" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
                <tr>
                  <td><input name="utc5" id="utc5" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
                <tr>
                  <td><input name="utc6" id="utc6" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
                <tr>
                  <td><input name="utc7" id="utc7" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
                <tr class="last">
                  <td><input name="utc8" id="utc8" type="checkbox" /></td>
                  <td>Mike Smith</td>
                  <td class="lrborder"><a href="mailto:company@name.com">company@name.com</a></td>
                  <td class="ralign">$25.00</td>
                  <td class="lrborder"><a href="http://www.DreamTemplate.com">www.DreamTemplate.com</a></td>
                  <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                  <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa2" /></a></td>
                </tr>
              </table>
              <p><select id="dropdown" name="dropdown" class="cntresults">
                <option selected="selected" value="10">10 results</option>
                <option value="20">20 results</option>
                <option value="30">30 results</option>
                <option value="50">50 results</option>
                <option value="100">100 results</option>
              </select>
              <a href="#" class="pnbtn">&laquo;</a> <input id="page" name="page" class="text mini ie_text" value="1 / 5" /> <a href="#" class="pnbtn">&raquo;</a></p>
              <div class="clr"></div>
            </form>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150</p>
          </div>
        </div>
      </div>

      <!-- gadget usertable -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Table Example <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Username</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th width="50">Actions</th>
              </tr>
              <tr>
                <td><input name="utc2" id="utc2" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mwwweefail@yahoo.com">mwwweefail@yahoo.com</a></td>
                <td width="28"><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc3" id="utc3" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mail@yahoo.com">mail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc4" id="utc4" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:m13dail@yahoo.com">m13dail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
            </table>
            </form>
          </div>
        </div>
      </div>

    </div>

    <!-- SMALLER BLOCK -->

    <?php include('parts/left-tower.php') ?>
    

    <div class="clr"></div>
  </div>
  
  <!-- FOOTER -->

	
	<?php include('parts/sales_footer.php') ?>

  
  <!-- DIALOGS -->
  <div id="dialogboxes">
    <!-- dialog 1 -->
    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Thank you for <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.<br /><br /></p>
            <p><a href="#" class="bg_grey">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- dialog 2 -->
    <div id="dialog2" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Welcome to Admin Area <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.</p>
            <div class="gadget jsi_msg jsi_msg_yellow"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
            <div class="gadget jsi_msg jsi_msg_red"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
            <form action="" method="post" id="loginform" class="form_login">
            <ol><li>
              <label for="login">Your Login:</label>
              <input id="login" name="login" class="text" />
              <div class="clr"></div>
            </li><li>
              <label for="pwd">Your Password:</label>
              <input id="pwd" name="pwd" class="text" type="password" />
              <div class="clr"></div>
            </li></ol>
            </form>
            <p class="bot24px"><a href="#" class="blackbutton">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>
  
</div>

</body>
</html>
