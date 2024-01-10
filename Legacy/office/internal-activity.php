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


$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";
$super = $row_userDudes['dudes_super'];

foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM dealers_pending ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_array($states);
$totalRows_states = mysqli_num_rows($states);

if($super == 'Y'){$insertActStr = '';}else{$insertActStr = "dudes_dlr_dude_id = '$dudesid' AND";}

mysql_select_db($database_tracking, $tracking);
$query_dude_activity = "SELECT * FROM dudes_activity WHERE $insertActStr dudes_dlr_dude_id AND dudes_dlr_did_prospctid not IN('Null') ORDER BY dudes_dlr_created_at DESC";
$dude_activity = mysqli_query($idsconnection_mysqli, $query_dude_activity, $tracking);
$row_dude_activity = mysqli_fetch_array($dude_activity);
$totalRows_dude_activity = mysqli_num_rows($dude_activity);

mysql_select_db($database_tracking, $tracking);
$query_dude_activity2 = "SELECT * FROM dudes_activity WHERE $insertActStr dudes_dlr_dude_id AND  dudes_dlr_did not IN('Null') ORDER BY dudes_dlr_created_at DESC";
$dude_activity2 = mysqli_query($idsconnection_mysqli, $query_dude_activity2, $tracking);
$row_dude_activity2 = mysqli_fetch_array($dude_activity2);
$totalRows_dude_activity2 = mysqli_num_rows($dude_activity2);
?>
<?php 
        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Internal Activity</title>
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
      <?php include('parts/navigation/left-navigation.php'); ?>

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
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
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Prospect Activity</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_tabexample" class="form_example">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines arborder">
                  <tr>
                    <th width="28"><input name="utc1" id="utc1" type="checkbox" /></th>
                    <th width="100">Prospect Dealer</th>
                    <th width="140" class="lrborder">Admin Name</th>
                    <th class="lrborder">Action Description</th>
                    <th colspan="3" class="calign">Icons</th>
                  </tr>
                  <?php do { ?>
                    <tr>
                      <td><input name="utc2" id="utc2" type="checkbox" /></td>
                      <td>PID: <?php echo $row_dude_activity['dudes_dlr_did_prospctid']; ?></td>
                      <td class="lrborder"><a href="internal-users.php"><?php echo $row_dude_activity['dudes_dlr_dude_name']; ?></a></td>
                      <td class="lrborder"><a href="dealer-prospect-update.php?dealer=<?php echo $row_dude_activity['dudes_dlr_did_prospctid']; ?>"><?php echo $row_dude_activity['dudes_dlr_body']; ?></a></td>
                      <td width="24" title="<?php echo $row_dude_activity['dudes_dlr_created_at']; ?>"><a href="dealer-prospect-update.php?dealer=<?php echo $row_dude_activity['dudes_dlr_did_prospctid']; ?>"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa" /></a></td>
                      <td width="24"><a href="dealer-prospect-update.php?dealer=<?php echo $row_dude_activity['dudes_dlr_did_prospctid']; ?>"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa" /></a></td>
                      <td width="24"><a href="dealer-prospect-update.php?dealer=<?php echo $row_dude_activity['dudes_dlr_did_prospctid']; ?>"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa" /></a></td>
                    </tr>
                    <?php } while ($row_dude_activity = mysqli_fetch_array($dude_activity)); ?>
                  <?php if ($totalRows_dude_activity == 0) { // Show if recordset empty ?>
  <tr class="last">
    <td><input name="utc8" id="utc8" type="checkbox" /></td>
    <td>Vehicle or Lead</td>
    <td class="lrborder"><a href="#">company@name.com</a></td>
    <td class="lrborder"><a href="#">View This Record</a></td>
    <td><a href="#"><img src="images/tab_icon1.gif" alt="picture" width="24" height="20" class="tabpimpa" /></a></td>
    <td><a href="#"><img src="images/tab_icon2.gif" alt="picture" width="24" height="20" class="tabpimpa" /></a></td>
    <td><a href="#"><img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa" /></a></td>
  </tr>
  <?php } // Show if recordset empty ?>
                </table>
                <p><select id="dropdown" name="dropdown" class="cntresults">
                  <option selected="selected" value="10">10 results</option>
                  <option value="20">20 results</option>
                  <option value="30">30 results</option>
                  <option value="50">50 results</option>
                  <option value="100">100 results</option>
                </select>
                <a href="#" class="pnbtn">&laquo;</a> <input id="page" name="page" class="text mini ie_mini" value="1 / 5" /> <a href="#" class="pnbtn">&raquo;</a></p>
                <div class="clr"></div>
              </form>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150</p>
            </div>
          </div>
        </div>

        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dealer Activity</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th width="40"><a href="#">
                  <input name="utc1" id="utc1" type="checkbox" />
                </a></th>
                <th width="100"><a href="#">System Dealer ID</a></th>
                <th width="100"><a href="#">Dudes Name</a></th>
                <th width="90"><a href="#">When</a></th>
                <th colspan="2"><a href="#">Actions</a></th>
              </tr>
			  <?php do { ?>              
              <tr>
                  <td><a href="#">
                    <input name="utc1" id="utc2" type="checkbox" class="utc" />
                  </a></td>
                  <td><a href="dealer-view-update.php?dealer=<?php echo $row_dude_activity2['dudes_dlr_did']; ?>">DID <?php echo $row_dude_activity2['dudes_dlr_did']; ?></a></td>
                  <td><a href="dealer-view-update.php?dealer=<?php echo $row_dude_activity2['dudes_dlr_did']; ?>"><?php echo $row_dude_activity2['dudes_dlr_dude_name']; ?></a></td>
                  <td><a href="dealer-view-update.php?dealer=<?php echo $row_dude_activity2['dudes_dlr_did']; ?>"><?php echo $row_dude_activity2['dudes_dlr_created_at']; ?></a></td>
                  <td width="28" title="title="<?php echo $row_dude_activity2['dudes_dlr_created_at']; ?>""><a href="dealer-view-update.php?dealer=<?php echo $row_dude_activity2['dudes_dlr_did']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td width="28"><a href="dealer-view-update.php?dealer=<?php echo $row_dude_activity2['dudes_dlr_did']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                 
              </tr>
             <?php } while ($row_dude_activity2 = mysqli_fetch_array($dude_activity2)); ?>
             
              <?php if ($totalRows_dude_activity2 == 0) { // Show if recordset empty ?>
                <tr>
                  <td><a href="#">
                    <input name="utc1" id="utc3" type="checkbox" class="utc" />
                  </a></td>
                  <td><a href="#">No Prospect Dealer</a></td>
                  <td><a href="#">You Haven't Edited Anything Yet</a></td>
                  <td><a href="#">You Haven't Edited Anything Yet</a></td>
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
  	<?php //include('parts/content-tables.php'); ?>
  
  
  <!-- FOOTER -->
  
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>

</div>

</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dude_activity);

mysqli_free_result($dude_activity2);
?>
