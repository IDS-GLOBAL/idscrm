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
$query_userDudes =  sprintf("SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];

foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

$colname_dlr_id_pass = "-1";
if (isset($_GET['id'])) {
  $colname_dlr_id_pass = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_id_pass =  sprintf("SELECT * FROM dealers_pending WHERE id = %s", GetSQLValueString($colname_dlr_id_pass, "int"));
$dlr_id_pass = mysqli_query($idsconnection_mysqli, $query_dlr_id_pass);
$row_dlr_id_pass = mysqli_fetch_array($dlr_id_pass);
$totalRows_dlr_id_pass = mysqli_num_rows($dlr_id_pass);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL =  sprintf("INSERT INTO dealers (dealer_pending_id, dudes_id, assigned_salesrep, contact, contact_phone, contact_phone_type, dmcontact2, dmcontact2_phone, dmcontact2_phone_type, company, website, finance, finance_contact, sales, sales_contact, phone, fax, address, city, `state`, zip, email, username, password, verified, token, home, about, directions, mapurl, mapframe, slogan, disclaimer, status, dealer_chat, fuel_pump_display, dcommercial_youtube_onoff, dcommercial_youtube_title, dcommercial_youtube_embed, dcommercial_youtube_description, craigslist_nickname, craigslist_vtb_bordercolor, craigslist_bg_ad_color, craigslist_pricing_showhide, craigslist_mileage_showhide, customtitle1, customcontent1, feedIDCars, feedIDComcast, feedidautotrader, feedidfrazer, feedidautomart, feedidvehix, feedidove, metaDescription, metaKeywords, showPricing, showMileage, sla) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['dealer_pending_id'], "int"),
                       GetSQLValueString($_POST['assigned_salesrep'], "int"),
                       GetSQLValueString($_POST['assigned_salesrep'], "text"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['contact_phone'], "text"),
                       GetSQLValueString($_POST['contact_phone_type'], "text"),
                       GetSQLValueString($_POST['dmcontact2'], "text"),
                       GetSQLValueString($_POST['dmcontact2_phone'], "text"),
                       GetSQLValueString($_POST['dmcontact2_phone_type'], "text"),
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
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['verified'], "text"),
                       GetSQLValueString($_POST['token'], "text"),
                       GetSQLValueString($_POST['home'], "text"),
                       GetSQLValueString($_POST['about'], "text"),
                       GetSQLValueString($_POST['directions'], "text"),
                       GetSQLValueString($_POST['mapurl'], "text"),
                       GetSQLValueString($_POST['mapframe'], "text"),
                       GetSQLValueString($_POST['slogan'], "text"),
                       GetSQLValueString($_POST['disclaimer'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['dealer_chat'], "int"),
                       GetSQLValueString($_POST['fuel_pump_display'], "int"),
                       GetSQLValueString($_POST['dcommercial_youtube_onoff'], "int"),
                       GetSQLValueString($_POST['dcommercial_youtube_title'], "text"),
                       GetSQLValueString($_POST['dcommercial_youtube_embed'], "text"),
                       GetSQLValueString($_POST['dcommercial_youtube_description'], "text"),
                       GetSQLValueString($_POST['craigslist_nickname'], "text"),
                       GetSQLValueString($_POST['craigslist_vtb_bordercolor'], "text"),
                       GetSQLValueString($_POST['craigslist_bg_ad_color'], "text"),
                       GetSQLValueString($_POST['craigslist_pricing_showhide'], "int"),
                       GetSQLValueString($_POST['craigslist_mileage_showhide'], "int"),
                       GetSQLValueString($_POST['customtitle1'], "text"),
                       GetSQLValueString($_POST['customcontent1'], "text"),
                       GetSQLValueString($_POST['feedIDCars'], "text"),
                       GetSQLValueString($_POST['feedIDComcast'], "text"),
                       GetSQLValueString($_POST['feedidautotrader'], "text"),
                       GetSQLValueString($_POST['feedidfrazer'], "text"),
                       GetSQLValueString($_POST['feedidautomart'], "text"),
                       GetSQLValueString($_POST['feedidvehix'], "text"),
                       GetSQLValueString($_POST['feedidove'], "text"),
                       GetSQLValueString($_POST['metaDescription'], "text"),
                       GetSQLValueString($_POST['metaKeywords'], "text"),
                       GetSQLValueString($_POST['showPricing'], "int"),
                       GetSQLValueString($_POST['showMileage'], "int"),
                       GetSQLValueString($_POST['sla'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-add-dealer.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $insertGoTo));
}
?>
<?php
include('../Libary/token-generator.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add This Pending Dealer</title>
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
<p>&nbsp;</p>
<div class="container">

  <!-- HEADER -->
  
  <?php include('parts/header.php'); ?>

<!-- CONTENT (START) -->
  



<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
      <?php include('parts/modules/top-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 1</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
         -->
         
         
         
         
        <!-- gadget left 2 
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 2</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">

              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
-->
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Administration Options Create Dealer Account</h3>
          </div>
        
        
          
          <div class="gadget_content">
            <div class="subblock">
            
              <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Assigned_salesrep:</td>
      <td> 
        <input name="assigned_salesrep" type="text" value="<?php echo $row_userDudes['dudes_id']; ?>" readonly="readonly" />
        <input type="hidden" name="dealer_pending_id" id="dealer_pending_id" value="<?php echo $_GET['id']; ?>" />
        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact:</td>
      <td><input type="text" name="contact" value="<?php echo $row_dlr_id_pass['contact']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact_phone:</td>
      <td><input type="text" name="contact_phone" value="<?php echo $row_dlr_id_pass['contact_phone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact_phone_type:</td>
      <td><input type="text" name="contact_phone_type" value="<?php echo $row_dlr_id_pass['contact_phone_type']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dmcontact2:</td>
      <td><input type="text" name="dmcontact2" value="<?php echo $row_dlr_id_pass['dmcontact2']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dmcontact2_phone:</td>
      <td><input type="text" name="dmcontact2_phone" value="<?php echo $row_dlr_id_pass['dmcontact2_phone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dmcontact2_phone_type:</td>
      <td><input type="text" name="dmcontact2_phone_type" value="<?php echo $row_dlr_id_pass['dmcontact2_phone_type']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Company:</td>
      <td><input type="text" name="company" value="<?php echo $row_dlr_id_pass['company']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Website:</td>
      <td><input type="text" name="website" value="<?php echo $row_dlr_id_pass['website']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Finance:</td>
      <td><input type="text" name="finance" value="<?php echo $row_dlr_id_pass['finance']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Finance_contact:</td>
      <td><input type="text" name="finance_contact" value="<?php echo $row_dlr_id_pass['finance_contact']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sales:</td>
      <td><input type="text" name="sales" value="<?php echo $row_dlr_id_pass['sales']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sales_contact:</td>
      <td><input type="text" name="sales_contact" value="<?php echo $row_dlr_id_pass['sales_contact']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Phone:</td>
      <td><input type="text" name="phone" value="<?php echo $row_dlr_id_pass['phone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fax:</td>
      <td><input type="text" name="fax" value="<?php echo $row_dlr_id_pass['fax']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Address:</td>
      <td><input type="text" name="address" value="<?php echo $row_dlr_id_pass['address']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">City:</td>
      <td><input type="text" name="city" value="<?php echo $row_dlr_id_pass['city']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">State:</td>
      <td><input type="text" name="state" value="<?php echo $row_dlr_id_pass['state']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Zip:</td>
      <td><input type="text" name="zip" value="<?php echo $row_dlr_id_pass['zip']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="<?php echo $row_dlr_id_pass['email']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><input type="text" name="username" value="<?php echo $row_dlr_id_pass['username']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="text" name="password" value="<?php echo $row_dlr_id_pass['password']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Verified:</td>
      <td><p>
        <label>
          <input type="radio" name="verified" value="y" id="verified_0" />
          Yes </label>
         |
        
        <label>
          <input name="verified" type="radio" id="verified_1" value="n" checked="checked" />
          No</label>
        <br />
      </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Token:</td>
      <td><input type="text" name="token" value="<?php if(!$row_dlr_id_pass['token']){echo $tkey;}else{echo $row_dlr_id_pass['token'];} ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Home:</td>
      <td><input type="text" name="home" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">About:</td>
      <td><input type="text" name="about" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Directions:</td>
      <td><input type="text" name="directions" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mapurl:</td>
      <td><input type="text" name="mapurl" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mapframe:</td>
      <td><input type="text" name="mapframe" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Slogan:</td>
      <td><input type="text" name="slogan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Disclaimer:</td>
      <td><input type="text" name="disclaimer" value="" size="32" /></td>
    </tr>
    
    
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Paging:</td>
      <td><input type="text" name="paging" value="" size="32" /></td>
    </tr>
    
    
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><select name="status" id="status">
        <option value="0">Off (Inactive)</option>
        <option value="1">On (Active)</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dealer_chat:</td>
      <td><input type="text" name="dealer_chat" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fuel_pump_display:</td>
      <td><input type="text" name="fuel_pump_display" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_onoff:</td>
      <td><table width="200">
        <tr>
          <td><label>
            <input <?php if (!(strcmp(((isset($_POST["dcommercial_youtube_onoff"]))?$_POST["dcommercial_youtube_onoff"]:""),"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="dcommercial_youtube_onoff" value="1" id="dcommercial_youtube_onoff_0" />
            On</label></td>
        </tr>
        <tr>
          <td><label>
            <input <?php if (!(strcmp(((isset($_POST["dcommercial_youtube_onoff"]))?$_POST["dcommercial_youtube_onoff"]:""),"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="dcommercial_youtube_onoff" value="0" id="dcommercial_youtube_onoff_1" />
            Off</label></td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_title:</td>
      <td><input type="text" name="dcommercial_youtube_title" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_embed:</td>
      <td><input type="text" name="dcommercial_youtube_embed" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_description:</td>
      <td><input type="text" name="dcommercial_youtube_description" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_nickname:</td>
      <td><input type="text" name="craigslist_nickname" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_vtb_bordercolor:</td>
      <td><input type="text" name="craigslist_vtb_bordercolor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_bg_ad_color:</td>
      <td><input type="text" name="craigslist_bg_ad_color" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_pricing_showhide:</td>
      <td><input type="text" name="craigslist_pricing_showhide" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_mileage_showhide:</td>
      <td><input type="text" name="craigslist_mileage_showhide" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Customtitle1:</td>
      <td><input type="text" name="customtitle1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Customcontent1:</td>
      <td><input type="text" name="customcontent1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">FeedIDCars:</td>
      <td><input type="text" name="feedIDCars" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">FeedIDComcast:</td>
      <td><input type="text" name="feedIDComcast" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidautotrader:</td>
      <td><input type="text" name="feedidautotrader" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidfrazer:</td>
      <td><input type="text" name="feedidfrazer" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidautomart:</td>
      <td><input type="text" name="feedidautomart" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidvehix:</td>
      <td><input type="text" name="feedidvehix" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidove:</td>
      <td><input type="text" name="feedidove" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">MetaDescription:</td>
      <td><input type="text" name="metaDescription" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">MetaKeywords:</td>
      <td><input type="text" name="metaKeywords" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ShowPricing:</td>
      <td><input type="text" name="showPricing" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ShowMileage:</td>
      <td><input type="text" name="showMileage" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sla:</td>
      <td><input type="text" name="sla" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>
        <?php 
	  $show = $row_userDudes['dudes_access_level'];
	  if($show == 1){echo "<input type='submit' value='Insert record' />";}
	  else{echo 'Sorry Your Not Allowed To Add This Dealer';}
	  ?>
        </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
            
            </div>
          </div>
        
        
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>  
  
  
<!-- CONTENT (END) -->


<!-- FOOTER -->

  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
  
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dlr_id_pass);
?>