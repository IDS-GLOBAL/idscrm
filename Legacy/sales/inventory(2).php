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
$sid = $row_userSets['salesperson_id']; //$sid
$sidmaindid = $row_userSets['main_dealerid']; //$did
$did = $row_userSets['main_dealerid'];
foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersoninventory = "SELECT * FROM vehicles WHERE did = $sidmaindid";
$salespersoninventory = mysqli_query($idsconnection_mysqli, $query_salespersoninventory);
$row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory);
$totalRows_salespersoninventory = mysqli_num_rows($salespersoninventory);


?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory Live</title>
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
    <div class="block_gr2 vertsortable">

      <!-- gadget left 1 
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Inventory Account Preview <span>View & Add Inventory...</span></h3>
          <div class="gadget_content">
            <h3>Choose One Of The Options  Below</h3>
            <p>+
           	  <a href="add-inventory.php">Add Inventory &raquo;</a> |
                <a href="inventory-pdf.php">Print PDF &raquo;</a>
            </p>
          </div>
        </div>
      </div>
      -->



<div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3> Your Inventory<span> To Send To This Customer</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>Type</th>
                <th>Stock No.</th>
                <th>Year</th>
                <th width="40">Make</th>
                <th width="100">Model</th>
                <th width="100">Color</th>
                <th width="50">Min. Down &raquo;</th>
                <th width="50">Retail Price &raquo;</th>
                <th>Special Price &raquo;</th>
                <th>Actions</th>
              </tr>
             
              
                <?php do { ?>
                                <tr>
                                  <td><input name="utc3" id="utc3" type="checkbox" /></td>
                                  <td align="center">
								 
								  	<?php echo $row_salespersoninventory['vcondition']; ?><br />
                                 
                                  <?php include'salesmod/photodisplay.php'; ?>
                                 
                                  </td>
                                  <td align="center"><?php echo $row_salespersoninventory['vstockno']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vyear']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vmake']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vmodel']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vecolor_txt']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vdprice']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vrprice']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vspecialprice']; ?><br /></td>
                                  <td><a href="update-inventory.php?vid=<?php echo $row_salespersoninventory['vid']; ?>"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
                                  	</td>
                                </tr>
               <?php } while ($row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory)); ?>
              
              
            </table>
            </form>
          </div>
        </div>
      </div>




      <!-- gadget usertable -->
<!--
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Customers <span>Lorem ipsum dolor sit amet</span></h3>
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
-->
    </div>

    <!-- SMALLER BLOCK -->

    <?php //include('parts/inventory-tower.php') ?>
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
<?php
mysqli_free_result($userSets);

mysqli_free_result($salespersoninventory);
?>
