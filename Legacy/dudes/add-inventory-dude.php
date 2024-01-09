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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}




$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = ' $colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

$colname_query_dealer = "-1";
if (isset($_GET['id'])) {
  $colname_query_dealer = $_GET['id'];
}

$did = $colname_query_dealer;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_dealer = "SELECT * FROM dealers WHERE id = $did";
$query_dealer = mysqli_query($idsconnection_mysqli, $query_query_dealer);
$row_query_dealer = mysqli_fetch_array($query_dealer);
$totalRows_query_dealer = mysqli_num_rows($query_dealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_array($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_array($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_array($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_array($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehicles_bystock = "SELECT * FROM vehicles WHERE did = $did ORDER BY vstockno DESC";
$vehicles_bystock = mysqli_query($idsconnection_mysqli, $query_vehicles_bystock);
$row_vehicles_bystock = mysqli_fetch_array($vehicles_bystock);
$totalRows_vehicles_bystock = mysqli_num_rows($vehicles_bystock);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Inventory To Dealer</title>
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
    $row_vmodels = mysqli_fetch_array($vmodels);
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

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
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

</head>
<body>


<div class="container">

  <!-- HEADER -->
  
  <?php include('parts/header.php'); ?>

  <!-- CONTENT -->


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

<script type="text/javascript">
$(document).ready(function() {

var did = '<?php echo $_GET['id']; ?>';

$('#vstocknofeedback').load('ajaxEnviro/checkvstockno.php?did=<?php echo $_GET['id']; ?>').show();

	$('#vstockno').keyup(function() {
		
		$.post('ajaxEnviro/checkvstockno.php?did=<?php echo $_GET['id']; ?>', {vstockno: addVehicleymkmd.vstockno.value}, 
			   
			   function(result) {
				$('#vstocknofeedback').html(result).show();   
			   });								
	});


	$('#vstockno').change(function() {
		
		$.post('ajaxEnviro/checkvstockno.php?did=<?php echo $_GET['id']; ?>', {vstockno: addVehicleymkmd.vstockno.value}, 
			   
			   function(result) {
				$('#vstocknofeedback').html(result).show();   
			   });								
	});




$('#vvinfeedback').load('ajaxEnviro/checkvvin.php?did=<?php echo $_GET['id']; ?>').show();


	$('#vvin').keyup(function() {
		
		
		$.get('ajaxEnviro/checkvvin.php?did=<?php echo $_GET['id']; ?>', {vvin: addVehicleymkmd.vvin.value }, 
			   
			   function(result) {
				$('#vvinfeedback').html(result).show();   
			   });
	
	});

	$('#vvin').change(function() {
		
		$.get('ajaxEnviro/checkvvin.php?did=<?php echo $_GET['id']; ?>', {vvin: addVehicleymkmd.vvin.value }, 
			   
			   function(result) {
				$('#vvinfeedback').html(result).show();   
			   });
	
	});




});
</script>

<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
       <?php include('parts/modules/top-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

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
<p>You Are About To Add Inventory Into <strong>"<?php echo $row_query_dealer['company']; ?>"</strong> Account...</p>
			<p>
            <strong>Company Name:</strong> <?php echo $row_query_dealer['company']; ?>  | <strong>Dealer ID: </strong> <?php echo  $colname_query_dealer; ?> 

            </p>

<hr />

<form id="addVehicleymkmd" name="addVehicleymkmd" method="POST" action="<?php echo $editFormAction; ?>">
                    
<table width="100%">
                   	                    
                    <tr>
                        	
                        <td>
            	        				<table width="100%" border="0" cellpadding="5" cellspacing="5">
                      <tr>
                        <td colspan="2" align="left">
                        
						<h2>Stock Number:
                            <span id="sprytextfield1">
                            <label>
                              <input style="text-transform: uppercase" type="text" name="vstockno" id="vstockno" />
                            </label>
                            <span class="textfieldRequiredMsg"> required.</span></span>?
                   	  </h2>
                      <br />
                      <div id="vstocknofeedback"></div>
                      <br />
                                         	  
                        </td>
                        
                        <td colspan="2" align="left">
                        
                        
                        <h2>VIN Number:
                            <span id="sprytextfield1">
                            <label>
                              <input style="text-transform: uppercase" type="text" name="vvin" id="vvin" />
                            </label>
                            <span class="textfieldRequiredMsg"> required.</span></span>? 
                   	  </h2>
                      <br />
                          <div id="vvinfeedback"></div>
                      <br />
                        
                        
                        </td>
                        </tr>
                      <tr onchange="WA_FilterAndPopulateSubList(**** no fields found *****************\n        _WAJA,MM_findObj('undefined'),MM_findObj('undefined'),0,0,false,': ')">
                        <td align="left" width="150"><h3>&nbsp;Select Year</h3></td>
                        <td align="left" width="150"><h3>&nbsp;Select Make</h3></td>
                        <td align="left"><h3>Select Model</h3></td>
                        <td align="center">&nbsp;</td>
                        
                      </tr>
                      <tr>
                        <td>
                          <label>
                            <select name="vyearid" size="10" id="vyearid">
                              <option value="">Select Year</option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_carYears['year']?>"><?php echo $row_carYears['year']?></option>
                              <?php
} while ($row_carYears = mysqli_fetch_array($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_array($carYears);
  }
?>
                            </select>
                          </label>
                        </td>
                        
                        
                        <td>
                          <label>
                            <select name="vmakeid" size="10" id="vmakeid" onchange="WA_FilterAndPopulateSubList(vmodels_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
                              <option value="">Makes</option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
                              <?php
} while ($row_vmakes = mysqli_fetch_array($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_array($vmakes);
  }
?>
                            </select>
                          </label>
                        </td>
                        
                        
                        
                        
                        <td>
                          <label>
                            <select name="vmodelid" size="10" id="vmodelid" onchange="WA_FilterAndPopulateSubList(**** no fields found *****************\n        _WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
                              <option value="">Models Appear</option>
                            </select>
                          </label>
                        </td>
                        <td>
                        
                        	<table>
                                 	<tr>
                              	<td valign="top">
                              	  <label><h4><b>Exterior Color:</b></h4><br  />
                              	    <select name="vexterior_color" id="vexterior_color">
                              	      <option value="">Select Color</option>
                              	      <?php
do {  
?>
                              	      <option value="<?php echo $row_colors_hex['color_id']?>"> <?php echo $row_colors_hex['color_name']; ?> </option>
                              	      <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
                           	        </select>
                       	      </label>
                              	  </td>
                                    </tr>

                                 	<tr>
                              	<td>
                        		<br /><br />
                        		
                        		<label><h4><b>Interior Color:</b></h4><br />
                        		  <select name="vinterior_color" id="vinterior_color">
                        		    <option value="">Select Color</option>
                        		    <?php
do {  
?>
                        		    <option value="<?php echo $row_colors_hex['color_id']?>"><?php echo $row_colors_hex['color_name']?></option>
                        		    <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
                      		    </select>
                      		  </label>
                        		</td>
                                    </tr>

			                            </table>
                        
                        </td>
                        
                      </tr>
                      <tr>
                        <td colspan="2">
                        
   	                        <label><strong>Enter Vehicle Mileage:</strong>
                              <input type="text" name="vmileage" id="vmileage" />
                            </label>

                        
                        </td>
                        <td colspan="2">&nbsp;</td>
                        </tr>
                      <tr>
                        <td><label for="vdprice"><strong>Down Payment:</strong></label>
                        <input type="text" name="vdprice" id="vdprice" /></td>
                        <td><label for="vspecialprice"><strong>Internet Price:</strong></label>
                        <input type="text" name="vspecialprice" id="vspecialprice" /></td>
                        <td><label for="vrprice"><strong>Retail Price:</strong></label>
                        <input type="text" name="vrprice" id="vrprice" /></td>
                        <td><label for="vlivestatus"><strong>Vehicle Status:</strong></label>
                          <select name="vlivestatus2" id="vlivestatus">
                            <option value="2">Hold</option>
                            <option value="1">Live</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td><input name="did" type="hidden" id="did" value="<?php echo $row_query_dealer['id']; ?>" />
                          <input name="dudes_id" type="hidden" id="dudes_id" value="<?php echo $dudesid; ?>" /></td>
                        <td><br />
                        <label>
                          <button class="ui-state-default ui-corner-all ui-button" type="submit">Start Vehicle Process</button>
                          <!-- <input type="submit" name="submit" id="submit" value="Enter Vehicle" /> -->
                        </label>
                        &nbsp;
                        </td>
                        <td><input type="hidden" name="vmake" id="vmake" />
                          <input type="hidden" name="vmodel" id="vmodel" /></td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  		</td>
                         	
                    	
                   </tr>
                  </table>
                   <input type="hidden" name="MM_insert" value="addVehicleymkmd" />
</form>



              <p>&nbsp;</p>
            </div>
          </div>
        </div>
        
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Live Inventory By Last Created:</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">


              <tr>
                <th width="40"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Stock No.</th>
                <th width="100">Year</th>
                <th width="90">Make</th>
                <th width="120">Model</th>
                <th width="120">VIN</th>
                <th colspan="2">Actions</th>
              </tr>

<?php do { ?>    
     

              <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td><?php echo $row_vehicles_bystock['vstockno']; ?></td>
                <td><?php echo $row_vehicles_bystock['vyear']; ?></td>
                <td><?php echo $row_vehicles_bystock['vmake']; ?></td>
                <td><?php echo $row_vehicles_bystock['vmodel']; ?></td>
                <td><?php echo $row_vehicles_bystock['vvin']; ?></td>
                <td width="28">
                	<a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a>
                </td>
                <td width="28">
                	<a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a>
                </td>
              </tr>
<?php } while ($row_vehicles_bystock = mysqli_fetch_array($vehicles_bystock)); ?>

              <tr>
                <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                <td>Not  Available</td>
                <td>Not  Available</td>
                <td>No Inventory AVailable</td>
                <td>No Inventory Available</td>
                <td>No Inventory Available</td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>
  <?php //include('parts/content-add-inventory-dude.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
  
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($query_dealer);

mysqli_free_result($carYears);

mysqli_free_result($vmakes);

mysqli_free_result($vmodels);

mysqli_free_result($colors_hex);

mysqli_free_result($vehicles_bystock);

?>