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
$query_userSets =  sprintf("SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_assoc($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_assoc($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

//Definitions
$sid = $row_userSets['salesperson_id']; //$sid
$did = $row_userSets['main_dealerid']; //$did
$addinventory = $row_userSets['sid_addinv_2main_dealerid']; //$addinventory
//End Defitions For Mysql update query

$colname_update_inventory = "-1";
if (isset($_GET['vid'])) {
  $colname_update_inventory = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_update_inventory =  sprintf("SELECT * FROM vehicles WHERE vid = %s AND vehicles.did = $did", GetSQLValueString($colname_update_inventory, "int"));
$update_inventory = mysqli_query($idsconnection_mysqli, $query_update_inventory);
$row_update_inventory = mysqli_fetch_assoc($update_inventory);
$totalRows_update_inventory = mysqli_num_rows($update_inventory);

$vid = $row_update_inventory['vid'];

$addaccess = $addinventory;

  if($addaccess == 0){
	  
	  header("Location: inventory.php");
  }
  if($addaccess == 1){
	  
	  echo '';
	  }else{
		echo 'Location: inventory.php';
  }


  if(!$vid){
	  
	  header("Location: inventory.php");
  }else{
		echo '';
  }
  
  include('../Libary/functionSalesPersonNotification.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Update Inventory</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script src="../SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<style type="text/css">
<!--
.hexcolor {
	height: 25px;
	width: 25px;
	background-color: #FFA500;
}
-->
</style>
<link href="../SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
  <!-- HEADER -->
  
  <?php include('parts/top-header.php'); ?>

  <!-- CONTENT -->
  
  <div class="content">

    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

				
	  <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Update this vehicle in your inventory.<span></span></h3>
          <div class="gadget_content">
              <p>
              	
                <?php include('salesmod/salesperson-inventory-navigation.php'); ?> 
</p>
                              <hr />
            <h2><?php echo $row_update_inventory['vyear']; ?> <?php echo $row_update_inventory['vmake']; ?> <?php echo $row_update_inventory['vmodel']; ?> <?php echo $row_update_inventory['vtrim']; ?></h2>
<p>
  
<div title="Year Make And Model Selections" >
<form method="POST" action="script-multi-upload-thumbnail-generator.php" enctype="multipart/form-data" name="upload_vehiclephotos" id="upload_vehiclephotos">
                    
          <table width="600">
          	<tr>
          	  <td colspan="2"><h3>Vehicle Photos</h3></td>
          	  <td colspan="2">
              </td>
          	  
          	  
        	  </tr>
          	<tr>
          	  <td colspan="3">
              <label><strong>Upload Vehicle Photos:</strong><br />
              <input name="did" type="hidden" id="did" value="<?php echo $did; ?>" />
              <input name="vid" type="hidden" id="vid" value="<?php echo $vid; ?>" />              
              <input name="sid" type="hidden" id="salesperson_id" value="<?php echo $sid; ?>" />
              <input type="file" name="images[]" class="bginput" multiple="multiple">
          	  </label>
              </td>
          	  
          	  <td></td>
        	  </tr>
          	<tr>
          	  <td>
              <br />
<br />
<br />
<br />
<br />

              <p>
              <button type='submit'>Upload Vehicle Photos</button>
              <br />

              <span id="sprycheckbox1">
                <label>
                  <input name="upload_check" type="checkbox" value="" />
                </label>                  
                
                

                <span class="checkboxRequiredMsg">Please check box to upload photos for this vehicle.</span></span>
                
                </p>
                
                </td>
          	  <td><a href="inventory.php">Cancel</a></td>
          	  <td>&nbsp;</td>
        	  </tr>
                  				</table>
<input type="hidden" name="MM_insert" value="addLiveVehicle" />
              </form>
            </div>
              
              </p>
            
            
            <p>
            
            
            </p>
            <p><a href="dashboard.php">Tips &amp; Tutorials &raquo;</a></p>
          </div>
        </div>
      </div>


				
    
    
    
    
    
    
    
    
    </div>

    <!-- SMALLER BLOCK -->
    <?php include('parts/inventory-tower.php') ?>

    <div class="clr"></div>

  </div>
  
  
  
  
  
  <?php //include('custom_pages/inventory_page.php') ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/sales_footer.php') ?>
  
  <!-- DIALOGS -->
  
  <?php include('dialogs/full-dialog.php') ?>
  
  
  
 
  
  
  
</div>
<script type="text/javascript">
<!--
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
//-->
</script>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($carYears);

mysqli_free_result($vmakes);

mysqli_free_result($vmodels);

mysqli_free_result($colors_hex);

mysqli_free_result($update_inventory);
?>
