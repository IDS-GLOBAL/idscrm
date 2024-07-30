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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "addVehicleymkmd")) {
  $updateSQL =  "UPDATE vehicles SET did=%s, sid=%s, vmakeid=%s, vmodelid=%s, vlivestatus=%s, vyear=%s, vtrim=%s, vcondition=%s WHERE vid=%s",
                       GetSQLValueString($_POST['did'], "int"),
                       GetSQLValueString($_POST['sid'], "int"),
                       GetSQLValueString($_POST['vmakeid'], "int"),
                       GetSQLValueString($_POST['vmodelid'], "int"),
                       GetSQLValueString($_POST['vlivestatus'], "int"),
                       GetSQLValueString($_POST['vyear'], "text"),
                       GetSQLValueString($_POST['vtrim'], "text"),
                       GetSQLValueString($_POST['vcondition'], "text"),
                       GetSQLValueString($_POST['vid'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "inventory-change-make-model-script.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $updateGoTo));
}


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
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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

<script type="text/javascript">
<!--
function WA_ClientSideReplace(theval,findvar,repvar)     {
  var retval = "";
  while (theval.indexOf(findvar) >= 0)    {
    retval += theval.substring(0,theval.indexOf(findvar));
    retval += repvar;
    theval = theval.substring(theval.indexOf(findvar) + String(findvar).length);
  }
  retval += theval;
  if (retval == "" && theval.indexOf(findvar) < 0)    {
    retval = theval;
  }
  return retval;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function WA_UnloadList(thelist,leavevals,bottomnum)    {
  while (thelist.options.length > leavevals+bottomnum)     {
    if (thelist.options[leavevals])     {
      thelist.options[leavevals] = null;
    }
  }
  return leavevals;
}

function WA_FilterAndPopulateSubList(thearray,sourceselect,targetselect,leaveval,bottomleave,usesource,delimiter)     {
  if (bottomleave > 0)     {
    leaveArray = new Array(bottomleave);
    if (targetselect.options.length >= bottomleave)     {
      for (var m=0; m<bottomleave; m++)     {
        leavetext = targetselect.options[(targetselect.options.length - bottomleave + m)].text;
        leavevalue  = targetselect.options[(targetselect.options.length - bottomleave + m)].value;
        leaveArray[m] = new Array(leavevalue,leavetext);
      }
    }
    else     {
      for (var m=0; m<bottomleave; m++)     {
        leavetext = "";
        leavevalue  = "";
        leaveArray[m] = new Array(leavevalue,leavetext);
      }
    }
  }  
  startid = WA_UnloadList(targetselect,leaveval,0);
  mainids = new Array();
  if (usesource)    maintext = new Array();
  for (var j=0; j<sourceselect.options.length; j++)     {
    if (sourceselect.options[j].selected)     {
      mainids[mainids.length] = sourceselect.options[j].value;
      if (usesource)     maintext[maintext.length] = sourceselect.options[j].text + delimiter;
    }
  }
  for (var i=0; i<thearray.length; i++)     {
    goodid = false;
    for (var h=0; h<mainids.length; h++)     {
      if (thearray[i][0] == mainids[h])     {
        goodid = true;
        break;
      }
    }
    if (goodid)     {
      theBox = targetselect;
      theLength = parseInt(theBox.options.length);
      theServices = thearray[i].length + startid;
      var l=1;
      for (var k=startid; k<theServices; k++)     {
        if (l == thearray[i].length)     break;
        theBox.options[k] = new Option();
        theBox.options[k].value = thearray[i][l][0];
        if (usesource)     theBox.options[k].text = maintext[h] + WA_ClientSideReplace(thearray[i][l][1],"|WA|","'");
        else               theBox.options[k].text = WA_ClientSideReplace(thearray[i][l][1],"|WA|","'");
        l++;
      }
      startid = k;
    }
  }
  if (bottomleave > 0)     {
    for (var n=0; n<leaveArray.length; n++)     {
      targetselect.options[startid+n] = new Option();
      targetselect.options[startid+n].value = leaveArray[n][0];
      targetselect.options[startid+n].text  = leaveArray[n][1];
    }
  }
  for (var l=0; l < targetselect.options.length; l++)    {
    targetselect.options[l].selected = false;
  }
  if (targetselect.options.length > 0)     {
    targetselect.options[0].selected = true;
  }
}
//-->
    </script>
<style type="text/css">
<!--
.hexcolor {
	height: 25px;
	width: 25px;
	background-color: #FFA500;
}
-->
</style>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
              <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="addVehicleymkmd" id="addVehicleymkmd">
                    
          <table width="600">
          	<tr>
          	  <td colspan="2"><h3>Vehicle Photos</h3></td>
          	  <td colspan="2"><input name="vid" type="hidden" value="<?php echo $vid; ?>" /><input name="did" type="hidden" id="did" value="<?php echo $did; ?>" /></td>
          	  
          	  
        	  </tr>
          	<tr>
          	  <td colspan="2"><select name="vcondition" id="vcondition" tabindex="1">
          	    <option value="" <?php if (!(strcmp("", $row_update_inventory['vcondition']))) {echo "selected=\"selected\"";} ?>>Select Condition</option>
          	    <option value="Used" <?php if (!(strcmp("Used", $row_update_inventory['vcondition']))) {echo "selected=\"selected\"";} ?>>Used</option>
          	    <option value="New" <?php if (!(strcmp("New", $row_update_inventory['vcondition']))) {echo "selected=\"selected\"";} ?>>New</option>
          	    <option value="Trade-In" <?php if (!(strcmp("Trade-In", $row_update_inventory['vcondition']))) {echo "selected=\"selected\"";} ?>>Trade-In</option>
          	    <option value="Salvage" <?php if (!(strcmp("Salvage", $row_update_inventory['vcondition']))) {echo "selected=\"selected\"";} ?>>Salvage</option>
        	    </select></td>
          	  <td colspan="2"><h3>&nbsp;</h3></td>
          	
          	  
        	  </tr>
          	<tr>
          	  <td><h3>&nbsp;Year:</h3></td>
          	  <td><h3>&nbsp;ReSelect Make:</h3></td>
          	  <td><h3>&nbsp;Model:</h3></td>
          	  <td><h3>Trim:</h3></td>
          	  
          	  
        	  </tr>
          	<tr>
          	  <td><span id="spryselect1">
          	    <label>
          	      <select name="vyear" id="vyear">
          	        <option value="" <?php if (!(strcmp("", $row_update_inventory['vyear']))) {echo "selected=\"selected\"";} ?>>Select Year</option>
          	        <?php
do {  
?>
<option value="<?php echo $row_carYears['year']?>"<?php if (!(strcmp($row_carYears['year'], $row_update_inventory['vyear']))) {echo "selected=\"selected\"";} ?>><?php echo $row_carYears['year']?></option>
<?php
} while ($row_carYears = mysqli_fetch_assoc($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_assoc($carYears);
  }
?>
                  </select>
        	      </label>
          	    <span class="selectRequiredMsg">Please select a year.</span></span></td>
          	  <td><span id="spryselect2">
          	    <label>
          	      <select name="vmakeid" id="vmakeid" onchange="WA_FilterAndPopulateSubList(vmodels_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
          	        <option value="" <?php if (!(strcmp("", $row_update_inventory['vmakeid']))) {echo "selected=\"selected\"";} ?>>Select Make</option>
          	        <?php
do {  
?>
<option value="<?php echo $row_vmakes['make_id']?>"<?php if (!(strcmp($row_vmakes['make_id'], $row_update_inventory['vmakeid']))) {echo "selected=\"selected\"";} ?>><?php echo $row_vmakes['car_make']?></option>
          	        <?php
} while ($row_vmakes = mysqli_fetch_assoc($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_assoc($vmakes);
  }
?>
        	        </select>
        	      </label>
          	    <span class="selectRequiredMsg">Please select a make.</span></span></td>
          	  <td><span id="spryselect3">
          	    <label>
          	      <select name="vmodelid"  id="vmodelid" onchange="WA_FilterAndPopulateSubList(vmakes_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
       	          <option value="" <?php if (!(strcmp("", $row_update_inventory['vmodelid']))) {echo "selected=\"selected\"";} ?>>Models Appear</option>
                            </select>
        	      </label>
          	    <span class="selectRequiredMsg">Please select a model.</span></span></td>
          	  <td><input name="vtrim" type="text" id="vtrim" value="" /></td>
          	  
          	  
        	  </tr>
          	<tr>
          	  <td colspan="4"><input name="sid" type="hidden" id="sid" value="<?php echo $sid; ?>" /></td>
          	  </tr>
              
              <tr>
                <td colspan="3" valign="top">
                  
                  <table width="300">
                    
                    
                    <?php 
                    
		  if($addinventory == 1){	
			   echo "<input type='hidden' name='did' value='$did' />";}
					  else { echo '';}
         ?>   
                    
                    <tr>
                      <td>&nbsp;</td>
                      
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      </tr>
                    
                    </table>
                  <p><br />
                    <label for="vlivestatus">Vehicle Status:</label>
                    <select name="vlivestatus" id="vlivestatus">
                      <option value="" <?php if (!(strcmp("", $row_update_inventory['vlivestatus']))) {echo "selected=\"selected\"";} ?>>Select Status</option>
                      <option value="1" <?php if (!(strcmp(1, $row_update_inventory['vlivestatus']))) {echo "selected=\"selected\"";} ?>>Live Status!</option>
<option value="0" <?php if (!(strcmp(0, $row_update_inventory['vlivestatus']))) {echo "selected=\"selected\"";} ?>>On Hold Status!</option>
                      </select>
                    </p></td>
                <td>
                  
                  </td>
                
                
                
              </tr>
          	<tr>
          	  <td><label>
          	    
          	    
          	    <button  type='submit'>Update Vehicle</button>
          	    
          	    <!-- <input type="submit" name="submit" id="submit" value="Enter Vehicle" /> -->
          	    </label></td>
          	  <td>Cancel</td>
          	  <td>&nbsp;</td>
        	  </tr>
                  				</table>
<input type="hidden" name="MM_insert" value="addLiveVehicle" />
<input type="hidden" name="MM_update" value="addVehicleymkmd" />
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
<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
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
