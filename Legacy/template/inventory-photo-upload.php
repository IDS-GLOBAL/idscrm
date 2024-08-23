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

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  sprintf("SELECT * FROM dealers WHERE email = %s");
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
$colname_dlrSlctBySsnDid = "-1";
if (isset($_SESSION['$did'])) {
  $colname_dlrSlctBySsnDid = $_SESSION['$did;'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid =  "SELECT * FROM dealers WHERE id = $did";;
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);

$colname_LiveVehicles = "-1";
if (isset($_SERVER['$did'])) {
  $colname_LiveVehicles = $_SERVER['$did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_makeids = "SELECT * FROM car_make";
$makeids = mysqli_query($idsconnection_mysqli, $query_makeids);
$row_makeids = mysqli_fetch_assoc($makeids);
$totalRows_makeids = mysqli_num_rows($makeids);
$vmakeid = $row_makeids['make_id'];
?>
<?php require_once('../ScriptLibrary/incPureUpload.php'); ?>
<?php
// Pure PHP Upload 2.1.12
$ppu = new pureFileUpload();
$ppu->path = "vehicles/photos/".$did.'/'.$_GET['vid'];
$ppu->extensions = "GIF,JPG,JPEG,BMP,PNG";
$ppu->formName = "UpLoadPhotos";
$ppu->storeType = "path";
$ppu->sizeLimit = "";
$ppu->nameConflict = "over";
$ppu->nameToLower = false;
$ppu->requireUpload = false;
$ppu->minWidth = "";
$ppu->minHeight = "";
$ppu->maxWidth = "";
$ppu->maxHeight = "";
$ppu->saveWidth = "";
$ppu->saveHeight = "";
$ppu->timeout = "1000";
$ppu->progressBar = "";
$ppu->progressWidth = "300";
$ppu->progressHeight = "100";
$ppu->redirectURL = "";
$ppu->checkVersion("2.1.12");
$ppu->doUpload();

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

if (isset($editFormAction)) {
  if (isset($_SERVER['QUERY_STRING'])) {
	  if (!eregi("GP_upload=true", $_SERVER['QUERY_STRING'])) {
  	  $editFormAction .= "&GP_upload=true";
		}
  } else {
    $editFormAction .= "?GP_upload=true";
  }
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpLoadPhotos")) {
  $updateSQL =  sprintf("UPDATE vehicle_photos SET dealer_id=%s, vphoto1_path=IFNULL(%s,vphoto1_path), vphoto2_path=IFNULL(%s,vphoto2_path), vphoto3_path=IFNULL(%s,vphoto3_path), vphoto4_path=IFNULL(%s,vphoto4_path), vphoto5_path=IFNULL(%s,vphoto5_path), vphoto6_path=IFNULL(%s,vphoto6_path), vphoto7_path=IFNULL(%s,vphoto7_path), vphoto8_path=IFNULL(%s,vphoto8_path), vphoto9_path=IFNULL(%s,vphoto9_path), vphoto10_path=IFNULL(%s,vphoto10_path), vphoto11_path=IFNULL(%s,vphoto11_path), vphoto12_path=IFNULL(%s,vphoto12_path), vphoto13_path=IFNULL(%s,vphoto13_path), vphoto14_path=IFNULL(%s,vphoto14_path), vphoto15_path=IFNULL(%s,vphoto15_path), vphoto16_path=IFNULL(%s,vphoto16_path), vphoto17_path=IFNULL(%s,vphoto17_path), vphoto18_path=IFNULL(%s,vphoto18_path), vphoto19_path=IFNULL(%s,vphoto19_path), vphoto20_path=IFNULL(%s,vphoto20_path), vphoto21_path=IFNULL(%s,vphoto21_path), vphoto22_path=IFNULL(%s,vphoto22_path), vphoto23_path=IFNULL(%s,vphoto23_path), vphoto24_path=IFNULL(%s,vphoto24_path), vphoto25_path=IFNULL(%s,vphoto25_path), vphoto26_path=IFNULL(%s,vphoto26_path), vphoto27_path=IFNULL(%s,vphoto27_path), vphoto28_path=IFNULL(%s,vphoto28_path), vphoto29_path=IFNULL(%s,vphoto29_path), vphoto30_path=IFNULL(%s,vphoto30_path), vphoto31_path=IFNULL(%s,vphoto31_path), vphoto32_path=IFNULL(%s,vphoto32_path), vphoto33_path=IFNULL(%s,vphoto33_path), vphoto34_path=IFNULL(%s,vphoto34_path), vphoto35_path=IFNULL(%s,vphoto35_path), vphoto36_path=IFNULL(%s,vphoto36_path), vphoto37_path=IFNULL(%s,vphoto37_path), vphoto38_path=IFNULL(%s,vphoto38_path), vphoto39_path=IFNULL(%s,vphoto39_path), vphoto40_path=IFNULL(%s,vphoto40_path), vphoto41_path=IFNULL(%s,vphoto41_path), vphoto42_path=IFNULL(%s,vphoto42_path), vphoto43_path=IFNULL(%s,vphoto43_path), vphoto44_path=IFNULL(%s,vphoto44_path), vphoto45_path=IFNULL(%s,vphoto45_path), vphoto46_path=IFNULL(%s,vphoto46_path), vphoto47_path=IFNULL(%s,vphoto47_path), vphoto48_path=IFNULL(%s,vphoto48_path), vphoto49_path=IFNULL(%s,vphoto49_path), vphoto50_path=IFNULL(%s,vphoto50_path) WHERE vehicle_id=%s",
                       GetSQLValueString($_POST['dealer_id'], "int"),
                       GetSQLValueString($_POST['vphoto1_path'], "text"),
                       GetSQLValueString($_POST['vphoto2_path'], "text"),
                       GetSQLValueString($_POST['vphoto3_path'], "text"),
                       GetSQLValueString($_POST['vphoto4_path'], "text"),
                       GetSQLValueString($_POST['vphoto5_path'], "text"),
                       GetSQLValueString($_POST['vphoto6_path'], "text"),
                       GetSQLValueString($_POST['vphoto7_path'], "text"),
                       GetSQLValueString($_POST['vphoto8_path'], "text"),
                       GetSQLValueString($_POST['vphoto9_path'], "text"),
                       GetSQLValueString($_POST['vphoto10_path'], "text"),
                       GetSQLValueString($_POST['vphoto11_path'], "text"),
                       GetSQLValueString($_POST['vphoto12_path'], "text"),
                       GetSQLValueString($_POST['vphoto13_path'], "text"),
                       GetSQLValueString($_POST['vphoto14_path'], "text"),
                       GetSQLValueString($_POST['vphoto15_path'], "text"),
                       GetSQLValueString($_POST['vphoto16_path'], "text"),
                       GetSQLValueString($_POST['vphoto17_path'], "text"),
                       GetSQLValueString($_POST['vphoto18_path'], "text"),
                       GetSQLValueString($_POST['vphoto19_path'], "text"),
                       GetSQLValueString($_POST['vphoto20_path'], "text"),
                       GetSQLValueString($_POST['vphoto21_path'], "text"),
                       GetSQLValueString($_POST['vphoto22_path'], "text"),
                       GetSQLValueString($_POST['vphoto23_path'], "text"),
                       GetSQLValueString($_POST['vphoto24_path'], "text"),
                       GetSQLValueString($_POST['vphoto25_path'], "text"),
                       GetSQLValueString($_POST['vphoto26_path'], "text"),
                       GetSQLValueString($_POST['vphoto27_path'], "text"),
                       GetSQLValueString($_POST['vphoto28_path'], "text"),
                       GetSQLValueString($_POST['vphoto29_path'], "text"),
                       GetSQLValueString($_POST['vphoto30_path'], "text"),
                       GetSQLValueString($_POST['vphoto31_path'], "text"),
                       GetSQLValueString($_POST['vphoto32_path'], "text"),
                       GetSQLValueString($_POST['vphoto33_path'], "text"),
                       GetSQLValueString($_POST['vphoto34_path'], "text"),
                       GetSQLValueString($_POST['vphoto35_path'], "text"),
                       GetSQLValueString($_POST['vphoto36_path'], "text"),
                       GetSQLValueString($_POST['vphoto37_path'], "text"),
                       GetSQLValueString($_POST['vphoto38_path'], "text"),
                       GetSQLValueString($_POST['vphoto39_path'], "text"),
                       GetSQLValueString($_POST['vphoto40_path'], "text"),
                       GetSQLValueString($_POST['vphoto41_path'], "text"),
                       GetSQLValueString($_POST['vphoto42_path'], "text"),
                       GetSQLValueString($_POST['vphoto43_path'], "text"),
                       GetSQLValueString($_POST['vphoto44_path'], "text"),
                       GetSQLValueString($_POST['vphoto45_path'], "text"),
                       GetSQLValueString($_POST['vphoto46_path'], "text"),
                       GetSQLValueString($_POST['vphoto47_path'], "text"),
                       GetSQLValueString($_POST['vphoto48_path'], "text"),
                       GetSQLValueString($_POST['vphoto49_path'], "text"),
                       GetSQLValueString($_POST['vphoto50_path'], "text"),
                       GetSQLValueString($_POST['vehicle_id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "photo_manager.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $updateGoTo));
}

if (isset($editFormAction)) {
  if (isset($_SERVER['QUERY_STRING'])) {
	  if (@!eregi("GP_upload=true", $_SERVER['QUERY_STRING'])) {
  	  $editFormAction .= "&GP_upload=true";
		}
  } else {
    $editFormAction .= "?GP_upload=true";
  }
}

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM dealers WHERE email = %s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid = "SELECT * FROM dealers WHERE id = $did";
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);

$colname_theRightVehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_theRightVehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_theRightVehicle =  sprintf("SELECT * FROM vehicles, car_model WHERE vehicles.vmodelid = car_model.id AND vehicles.did = $did AND vehicles.vid = %s", GetSQLValueString($colname_theRightVehicle, "int"));
$theRightVehicle = mysqli_query($idsconnection_mysqli, $query_theRightVehicle);
$row_theRightVehicle = mysqli_fetch_assoc($theRightVehicle);
$totalRows_theRightVehicle = mysqli_num_rows($theRightVehicle);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vphotos_query = "SELECT * FROM vehicle_photos WHERE vehicle_photos.vehicle_id = $colname_theRightVehicle";
$vphotos_query = mysqli_query($idsconnection_mysqli, $query_vphotos_query);
$row_vphotos_query = mysqli_fetch_assoc($vphotos_query);
$totalRows_vphotos_query = mysqli_num_rows($vphotos_query);
?>
<?php include('includes/defintions/v_photo-definitions.php') /////Definitions ?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>IDS CRM | Dealer Portal</title>
    
    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/live_search.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/ui/ui.sortable.js"></script>
	<script type="text/javascript" src="js/ui/ui.draggable.js"></script>
	<script type="text/javascript" src="js/ui/ui.resizable.js"></script>
	<script type="text/javascript" src="js/ui/ui.dialog.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/ui/ui.tabs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	// Tabs
	$('#tabs, #tabs2, #tabs5').tabs();
});
</script>
    
    
	<link href="css/ui/ui.base.css" rel="stylesheet" media="all" />

	<link href="css/themes/black_rose/ui.css" rel="stylesheet" title="style" media="all" />

	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, ul#dashboard-buttons li a, .response-msg, #search-bar input');

	</script>
	<![endif]-->
<script language='JavaScript' src='../ScriptLibrary/incPureUpload.js' type="text/javascript"></script>
	<script language='JavaScript' src='../ScriptLibrary/incPureUpload.js' type="text/javascript"></script>
	<script language='JavaScript' src='../ScriptLibrary/incPureUpload.js' type="text/javascript"></script>
	<script language='javascript' src='../ScriptLibrary/incPureUpload.js'></script>
</head>
<body id="sidebar-left">
	<div id="page_wrapper">
	<div id="page-header">

<div id="page-header-wrapper">

                <?php include('parts/user-session-bar.php') ?>

		        <?php include('parts/dealer-navigation.php') ?>

			</div>

<script type="text/javascript" src="js/file_tree.js"></script>
<link href="css/file_tree.css" rel="stylesheet" media="all" />
		<script type="text/javascript">
			
			$(document).ready( function() {
			    $('#fileTreeDemo_1').fileTree({ root: '/file_tree_example/' }, function(file) {
			        alert(file);
			    });			
			});
		</script>

		<div id="sub-nav"><div class="page-title">
			<h1>Photo Upload</h1>
		  <span>Upload > <a href="#" title="Gallery">Photos</a> > Videos</span>
         </div>
		
		<?php include('parts/dialog-status-bar-buttons.php'); ?>
		
        </div>
		
        <div id="page-layout"><div id="page-content">
			<div id="page-content-wrapper">
				<div class="inner-page-title">
					<h3>Uploading Photos</h3>
				</div>
				<div class="content-box">
					<div class="example">
						<h2>Upload Photos For: &nbsp;&nbsp;
							<?php echo $row_theRightVehicle['vyear']; ?>&nbsp;
                        	<?php echo $row_theRightVehicle['make']; ?>&nbsp;
							<?php echo $row_theRightVehicle['model']; ?>&nbsp;
                         </h2>
						<p>
							Vehicle System Record No#: &nbsp;<?php echo $row_theRightVehicle['vid']; ?> &nbsp;
							
                      </p>
						<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="UpLoadPhotos" id="UpLoadPhotos" onSubmit="checkFileUpload(this,'GIF,JPG,JPEG,BMP,PNG',false,'','','','','','','');return document.MM_returnValue">
	
    
						<p>
						    <input name="vehicle_id" type="hidden" id="vehicle_id" value="<?php echo $row_theRightVehicle['vid']; ?>" />
						    <input name="dealer_id" type="hidden" id="dealer_id" value="<?php echo $row_userDets['id']; ?>" />
						    <input name="v_photoid" type="text" id="v_photoid" value="<?php echo $row_vphotos_query['v_photoid']; ?>" />
						</p>
    
    
    
    
<!--    					  <p>
                          <?php echo $row_vphotos_query['vphoto1_path']; ?>
                          </p>
-->                    
					<table>
                    	<tr>
                        	<td>
                         		<?php include('parts/forms/50-upload-photos-form.php') ?>
						    </td>
 
                            <td>
 								&nbsp; &nbsp; 
                            </td>
                        </tr>
                   </table>                       
					<p>&nbsp;</p>
					<input type="hidden" name="MM_update" value="UpLoadPhotos">
                      </form>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
			
						<div id="fileTreeDemo_1" class="demo"></div>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php include('parts/sidebars/vehicle-side-bar.php'); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php include('footer.php'); ?></div>
</body>
</html>
<?php
mysqli_free_result($userDets);

mysqli_free_result($dlrSlctBySsnDid);

mysqli_free_result($theRightVehicle);

mysqli_free_result($vphotos_query);
?>
