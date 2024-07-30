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


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userSets = "SELECT * FROM sales_person";
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);
$sid = $row_userSets['salesperson_id']; //Hackishere

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>add make model hack</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
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
</head>
<body>
<div class="container">
  <!-- HEADER -->
  
  <?php include('parts/top-header.php') ?>

  <!-- CONTENT -->
  
  <div class="content">

    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

				
	  <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>You can add inventory into your account and into your  dealers account.<span></span></h3>
          <div class="gadget_content">
              <p>
              	 
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                 standard dummy text ever since the 1500s
                 
              </p>
              
              <p>
              
                <div title="Year Make And Model Selections" >              
                  <form id="addVehicleymkmd" name="addVehicleymkmd" method="POST">
                    
          <table>
          	<tr>            	
              <td>
            	  
                  <table border="1" cellpadding="5" cellspacing="5">
                      <tr>
                        <td align="center" width="150px"><h3>&nbsp;Year</h3></td>
                        <td align="center" width="150px"><h3>&nbsp;Make</h3></td>
                        <td align="center" width="150px"><h3>&nbsp;Model</h3></td>
                        
                      </tr>
                      
                      <tr>
                        <td align="center">
                          <label>
                            <select name="vyearid" id="vyearid">
                              <option value="">Select Year</option>
                              <?php
								do {  
							  ?>
                              <option value="<?php echo $row_carYears['year']?>"><?php echo $row_carYears['year']?></option>
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
                        </td>
                        
                        
                        <td align="center">
                        
                          <label>
                            <select name="vmakeid" id="vmakeid" onchange="WA_FilterAndPopulateSubList(vmodels_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
                              <option value="">Makes</option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
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
                        
                       
                        <td>
                        
                        
                          <label>
                            <select name="vmodelid" id="vmodelid" onchange="WA_FilterAndPopulateSubList(vmakes_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
                              <option value="">Models Appear</option>
                            </select>
                          </label>
                        
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          
                          <input name="did" type="hidden" id="did" value="<?php echo $row_userSets['id']; ?>" />
                          <input name="vmake_text" type="hidden" id="vmake_text" value="<?php echo $row_vmodels['make']; ?>" />
                          <input name="vlivestatus" type="hidden" id="vlivestatus" value="0" />
                          <input name="putonhold" type="hidden" id="putonhold" value="1" />
                        </td>
                        <td>
                        
                        <label>
                          <button type="submit">Add A Vehicle</button>
                          <!-- <input type="submit" name="submit" id="submit" value="Enter Vehicle" /> -->
                        </label>
                        &nbsp;
                        </td>
                        <td>
                        
                        </td>
                        
                      </tr>
                    </table>
              
              </td>
                         	
              <td>
	            <table>
               	  <tr>
					<td valign="top">
                    			<span id="spryselect4">
                              	  <label>Exterior Color:<br  />
                              	    <select name="vexterior_color" id="vexterior_color">
                              	      <option value="">Select Color</option>
                              	      <?php
										do {  
									  ?>
                              	      <option value="<?php echo $row_colors_hex['color_id']?>"> 
									  <?php echo $row_colors_hex['color_name']; ?> </option>
                              	      <?php
										} while ($row_colors_hex = mysqli_fetch_assoc($colors_hex));
										 $rows = mysqli_num_rows($colors_hex);
										 if($rows > 0) {
										 mysqli_data_seek($colors_hex, 0);
										 $row_colors_hex = mysqli_fetch_assoc($colors_hex);
										}
									   ?>
                           	        </select>
                           	    </label>
                              	  <span class="selectRequiredMsg">Please select an item.</span></span>
                    </td>
                   </tr>

                   <tr>
                   <td>
                        		<br /><br />
                        		<span id="spryselect5">
                        		<label>Interior Color:<br />
                        		  <select name="vinterior_color" id="vinterior_color">
                        		    <option value="">Select Color</option>
                        		    <?php
										do {  
									?>
                        		    <option value="<?php echo $row_colors_hex['color_id']?>"><?php echo $row_colors_hex['color_name']?></option>
                        		    <?php
										} while ($row_colors_hex = mysqli_fetch_assoc($colors_hex));
										 $rows = mysqli_num_rows($colors_hex);
										 if($rows > 0) {
										 mysqli_data_seek($colors_hex, 0);
										 $row_colors_hex = mysqli_fetch_assoc($colors_hex);
										}
									?>
                      		    </select>
                      		  </label>
                        		<span class="selectRequiredMsg">Please select an item.</span></span></td>
                                    </tr>

			                            </table>
                        		</td>
                    	
                   				</tr>
                  				</table>
                    			<input type="hidden" name="MM_insert" value="addLiveVehicle" />
						</form>
                </div>
              
              </p>
            
            
            <p>
            
            
            </p>
            <p><a href="#">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>


				
    
    
    
    
    
    
    
    
    </div>

    <!-- SMALLER BLOCK -->
    <?php include('parts/left-tower.php') ?>

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
?>