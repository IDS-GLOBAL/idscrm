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
$query_update_inventory =  "SELECT * FROM vehicles WHERE vid = %s AND vehicles.did = $did", GetSQLValueString($colname_update_inventory, "int"));
$update_inventory = mysqli_query($idsconnection_mysqli, $query_update_inventory);
$row_update_inventory = mysqli_fetch_assoc($update_inventory);
$totalRows_update_inventory = mysqli_num_rows($update_inventory);
$vid = $row_update_inventory['vid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vphotos = "SELECT * FROM vehicle_photos WHERE vehicle_id = '$vid' ORDER BY photo_file_name ASC";
$vphotos = mysqli_query($idsconnection_mysqli, $query_vphotos);
$row_vphotos = mysqli_fetch_assoc($vphotos);
$totalRows_vphotos = mysqli_num_rows($vphotos);


$addaccess = $addinventory;

  if($addaccess == 0){
	  
	  header("Location: inventory.php");
  }
  if($addaccess == 1){
	  
	  echo ' ';
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
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Photos Of Inventory</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/idsinventory.css"/>

<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<?php
if ($row_vmodels)     {
  echo "<SC" . "RIPT>\n";
  echo "var WAJA = new Array();\n";

  $oldmainid = 0;
  $newmainid = $row_vmodels["make_id"];
  if ($oldmainid == $newmainid)    {
    $oldmainid = "";
  }
  $n = 0;
  while ($row_vmodels)     {
    if ($oldmainid != $newmainid)     {
      echo "WAJA[".$n."] = new Array();\n";
      echo "WAJA[".$n."][0] = '".WA_DD_Replace($newmainid)."';\n";
      $m = 1;
    }

    echo "WAJA[".$n."][".$m."] = new Array();\n";
    echo "WAJA[".$n."][".$m."][0] = "."'".WA_DD_Replace($row_vmodels["id"])."'".";\n";
    echo "WAJA[".$n."][".$m."][1] = "."'".WA_DD_Replace($row_vmodels["model"])."'".";\n";

    $m++;
    if ($oldmainid == 0)      {
      $oldmainid = $newmainid;
    }
    $oldmainid = $newmainid;
    $row_vmodels = mysqli_fetch_assoc($vmodels);
    if ($row_vmodels)     {
      $newmainid = $row_vmodels["make_id"];
    }
    if ($oldmainid != $newmainid)     {
      $n++;
    }
  }

  echo "var vmodels_WAJA = WAJA;\n";
  echo "WAJA = null;\n";
  echo "</SC" . "RIPT>\n";
}
function WA_DD_Replace($startStr)  {
  $startStr = str_replace("'", "|WA|", $startStr);
  $startStr = str_replace("\\", "\\\\", $startStr);
  $startStr = preg_replace("/[\r\n]{1,}/", " ", $startStr);
  return $startStr;
}
?>
<style type="text/css">
<!--
.hexcolor {
	height: 25px;
	width: 25px;
	background-color: #FFA500;
}
-->
</style>
<script language="javascript" src="js/inventory-photos.js"></script>
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
  
<div id="vphotos_preview">
                    
          <table width="100%">
          	<tr>
          	  <td colspan="2">
              
              <h3>Vehicle Photos</h3>
              
              <?php if($row_vphotos['photo_file_path']){ ?>
              
              <div id="photogallery">
              <ul>
              
				  <?php do { ?>
                    <li>
                    <span class="vtphoto">
                    	<img id="<?php echo $row_vphotos['v_photoid']; ?>" class="photo_file" src="<?php echo $row_vphotos['photo_file_path']; ?>" width="90px" />
					</span>
                    </li>
                  <?php } while ($row_vphotos = mysqli_fetch_assoc($vphotos)); ?>
              
              </ul>

              <?php }else{ ?>
                
                No Photos Available!
                
                <?php } ?>
                </div>
              </td>
                

          	  <td colspan="2">
              
              <form method="POST" enctype="multipart/form-data" name="upload_vehiclephotos" id="upload_vehiclephotos">

              <input name="vid" type="hidden" id="vid" value="<?php echo $vid; ?>" />
              <input name="did" type="hidden" id="did" value="<?php echo $did; ?>" />
              <input name="did" type="hidden" id="salesperson_id" value="<?php echo $sid; ?>" />
              </form>
              
              </td>
        	  </tr>
              </table>

          <form name="vphoto_delete" action="script_inventory-photos.php" method="post" enctype="application/x-www-form-urlencoded" id="vphoto_delete">
          	<table>
          	<tr>
          	  <td colspan="3">
              <label>
              	<strong>Vehicle Comments:</strong><br />
                <input id="delete_v_photoid"  type="hidden" name="delete_v_photoid"  value="<?php echo $row_vphotos['v_photoid']; ?>" />
          	  </label>
              </td>
          	  
          	  <td>&nbsp;</td>
        	  </tr>
          	<tr>
          	  <td><label>
          	    
                
<!--                <input name="submit" type="button" value="Delete Photo" />-->
          	    
          	    <!-- <input type="submit" name="submit" id="submit" value="Enter Vehicle" /> -->
        	    </label></td>
          	  <td>Cancel</td>
          	  <td>&nbsp;</td>
        	</tr>
           </table>
          </form>
</div>
              
              </p>
            
            
            <p>
            
            
            </p>
            <p><a href="#">Tips &amp; Tutorials &raquo;</a></p>
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
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($carYears);

mysqli_free_result($vmakes);

mysqli_free_result($vmodels);

mysqli_free_result($colors_hex);

mysqli_free_result($update_inventory);

mysqli_free_result($vphotos);
?>
