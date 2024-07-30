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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update_profile")) {
  $updateSQL =  "UPDATE sales_person SET salesperson_firstname=%s, salesperson_lastname=%s, salesperson_nickname=%s, salesperson_mobilephone_number=%s, website_url=%s, prof_motto=%s, prof_hometown=%s, prof_sportsteam=%s, prof_dreamvact=%s, prof_favfood=%s, prof_favtvshow=%s WHERE salesperson_id=%s",
                       GetSQLValueString($_POST['salesperson_firstname'], "text"),
                       GetSQLValueString($_POST['salesperson_lastname'], "text"),
                       GetSQLValueString($_POST['salesperson_nickname'], "text"),
                       GetSQLValueString($_POST['salesperson_mobilephone_number'], "text"),
                       GetSQLValueString($_POST['website_url'], "text"),
                       GetSQLValueString($_POST['prof_motto'], "text"),
                       GetSQLValueString($_POST['prof_hometown'], "text"),
                       GetSQLValueString($_POST['prof_sportsteam'], "text"),
                       GetSQLValueString($_POST['prof_dreamvact'], "text"),
                       GetSQLValueString($_POST['prof_favfood'], "text"),
                       GetSQLValueString($_POST['prof_favtvshow'], "text"),
                       GetSQLValueString($_POST['salesperson_id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "myacct.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $updateGoTo));
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
$did = $row_userSets['main_dealerid']; //$did

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealerinfo = "SELECT * FROM dealers WHERE id = $did";
$mydealerinfo = mysqli_query($idsconnection_mysqli, $query_mydealerinfo);
$row_mydealerinfo = mysqli_fetch_assoc($mydealerinfo);
$totalRows_mydealerinfo = mysqli_num_rows($mydealerinfo);



?>
<?php

include('../Libary/functionSalesPersonNotification.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile Account</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script>
$(document).ready(function() {

	$("a#profile_imgfile_show").click( function(){
								
		$("input#profile_imgfile").toggle(200);										  
	});

});
</script>
</head>
<body>
<div class="container">
  <!-- HEADER -->
  
  <?php include('parts/top-header.php') ?>
  

  <!-- MAIN CONTENT -->

   <div class="content">

    <!-- Start Main Vody View -->
    <div class="block_gr vertsortable">

	  <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>My Profile Information Section</h3>
          <div class="gadget_content">
          
          
          
            
            
            <div style="display:none;">
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><strong>Your Dealership Name Is:</strong></td>
                <td width="10">&nbsp;</td>
                <td><?php echo $row_mydealerinfo['company']; ?></td>
              </tr>
              <tr>
                <td><strong>Your Dealers Website URL:</strong></td>
                <td>&nbsp;</td>
                <td><a href="http://www.<?php echo $row_mydealerinfo['website']; ?>" target="_blank">www.<?php echo $row_mydealerinfo['website']; ?></a></td>
              </tr>
              <tr>
                <td><strong>Your Dealerships Email Is:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['email']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><strong>Your System Contact  Is</strong>:</td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['contact']; ?></td>
              </tr>
              <tr>
                <td><em>(can only make authorized changes)</em></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><strong>Phone Number:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['phone']; ?></td>
              </tr>
              <tr>
                <td><strong>Fax Number:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['fax']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><strong>Dealership Address Is:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['address']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['city']; ?>, <?php echo $row_mydealerinfo['state']; ?> </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php echo $row_mydealerinfo['zip']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Dealership Map Url Link:</td>
                <td>&nbsp;</td>
                <td><a href="<?php echo $row_mydealerinfo['mapurl']; ?>">Map Link! </a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            
            </div>
            
            <div>
              <form action="<?php echo $editFormAction; ?>" method="POST" name="update_profile" id="update_profile">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="25%" valign="top">
                  	
                    <br>
					<br>
                    <br>


                  		<div id="profile_image">
                        
                        
                        	<?php if($row_userSets['profile_image']){ echo "<img src='".$row_userSets['profile_image']."' width='100%' alt='img' />";}elseif($row_userSets['ids_profile_image']){ echo "<img src='".$row_userSets['ids_profile_image']."' width='100%' alt='img' />"; }else{echo 'N/A';} ?>
                        
                        
                        </div>
                        
                        <label><a id="profile_imgfile_show" href="#">Upload Pic:</a>
                          <input type="file" id="profile_imgfile" name="profile_imgfile" style="display:none;" />
                      </label>
                        
                        <br>

                        <hr />
                        
                        <br />
                        
                        <button id="upload_profilepic">Upload</button>
                  </td>
                  <td>
                  		
                        
                        <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <th>First Name:</th>
                <td><input name="salesperson_firstname" type="text small" class="text" id="salesperson_firstname" value="<?php echo $row_userSets['salesperson_firstname']; ?>"></td>
              </tr>
              <tr>
                <th>Last Name:</th>
                <td><input name="salesperson_lastname" type="text small" class="text" id="salesperson_lastname" value="<?php echo $row_userSets['salesperson_lastname']; ?>"></td>
              </tr>
              <tr>
              	<th>Nick Name:</th>
                <td><input type="text" class="text small" name="salesperson_nickname" id="salesperson_nickname" value="<?php echo $row_userSets['salesperson_nickname']; ?>"></td>
              </tr>
              <tr>
              	<th>Website:</th>
                <td><input type="text" class="text small" name="website_url" id="website_url" readonly value="<?php echo $row_userSets['website_url']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Driect Phone Number:</th>
                <td><input type="text" name="salesperson_mobilephone_number" id="salesperson_mobilephone_number" value="<?php echo $row_userSets['salesperson_mobilephone_number']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Email Address:</th>
                <td><input name="salesperson_email" type="text" class="text smallmedi" disabled id="salesperson_email" value="<?php echo $row_userSets['salesperson_email']; ?>" readonly="readonly"></td>
              </tr>
              <tr>
                <th scope="row">Motto:</th>
                <td><textarea id="prof_motto" name="prof_motto" rows="6" cols="50"><?php echo $row_userSets['prof_motto']; ?></textarea></td>
              </tr>
              <tr>
                <th scope="row">Hometown:</th>
                <td><input type="text" name="prof_hometown" class="text small" id="prof_hometown" value="<?php echo $row_userSets['prof_hometown']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Favorite Sports Team:</th>
                <td><input type="text" name="prof_sportsteam" class="text small" id="prof_sportsteam" value="<?php echo $row_userSets['prof_sportsteam']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Dream Vacation:</th>
                <td><input type="text" name="prof_dreamvact" class="text small" id="prof_dreamvact" value="<?php echo $row_userSets['prof_dreamvact']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Favorite Food(s):</th>
                <td><input type="text" name="prof_favfood" class="text small" id="prof_favfood" value="<?php echo $row_userSets['prof_favfood']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Favorite TV Show(s):</th>
                <td><textarea id="prof_favtvshow" name="prof_favtvshow" rows="6" cols="50"><?php echo $row_userSets['prof_favtvshow']; ?></textarea></td>
              </tr>
              <tr>
                <th scope="row"><input name="salesperson_id" type="hidden" id="salesperson_id" value="<?php echo $row_userSets['salesperson_id']; ?>"></th>
                <td><input type="submit" name="submit" id="submit" value="Submit"></td>
              </tr>
            </table>
                        
                        
                        
                        
                  </td>
                </tr>
              </table>
              <input type="hidden" name="MM_update" value="update_profile">
              </form>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
            <p><br />
              <br />
            </p>
            
          </div>
        </div>
      </div>
  
      </div><!-- End Main Body View -->



	



    <!-- SMALLER BLOCK -->
    <?php include('parts/myaccount-tower.php') ?>

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

mysqli_free_result($mydealerinfo);
?>
