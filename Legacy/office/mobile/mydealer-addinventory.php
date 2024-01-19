<?php require_once('../../Connections/idsconnection.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addVehicleymkmd")) {
  $insertSQL =  "INSERT INTO vehicles (did, dudes_id, vmakeid, vmodelid, vsource_idscrm_import_txt, vyear, vvin, vcondition, vcertified, vstockno, vmileage, vrprice, vdprice, vspecialprice, vecolor_txt, vicolor_txt, vbody, vtransm) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['did'], "int"),
                       GetSQLValueString($_POST['dudes_id'], "int"),
                       GetSQLValueString($_POST['vmakeid'], "int"),
                       GetSQLValueString($_POST['vmodelid'], "int"),
                       GetSQLValueString($_POST['vsource_idscrm_import_txt'], "text"),
                       GetSQLValueString($_POST['vyear'], "text"),
                       GetSQLValueString($_POST['vvin'], "text"),
                       GetSQLValueString($_POST['newusedRadioGroup'], "text"),
                       GetSQLValueString($_POST['vcertified'], "int"),
                       GetSQLValueString($_POST['vstockno'], "text"),
                       GetSQLValueString($_POST['vmileage'], "text"),
                       GetSQLValueString($_POST['vrprice'], "text"),
                       GetSQLValueString($_POST['vdprice'], "text"),
                       GetSQLValueString($_POST['vspecialprice'], "text"),
                       GetSQLValueString($_POST['vexterior_color'], "text"),
                       GetSQLValueString($_POST['vinterior_color'], "text"),
                       GetSQLValueString($_POST['vbody'], "text"),
                       GetSQLValueString($_POST['vtransm'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-mydealer-addinventory-after.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo));
}





$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM dealers_pending ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM ticket_submit_dlr";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

$user = $row_userDudes['dudes_id'];
$super = '1';

if($user == $super){
	
	$insertif = "";	
	}else{
	$id = $user;		
	$insertif = "WHERE dudes2_id = '$id'";
}





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealers = "SELECT * FROM dealers $insertif ORDER BY company ASC";
$mydealers = mysqli_query($idsconnection_mysqli, $query_mydealers);
$row_mydealers = mysqli_fetch_array($mydealers);
$totalRows_mydealers = mysqli_num_rows($mydealers);

$colname_dealer = "-1";
if (isset($_GET['token'])) {
  $colname_dealer = $_GET['token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer =  "SELECT * FROM dealers WHERE id = %s", GetSQLValueString($colname_dealer, "int"));
$dealer = mysqli_query($idsconnection_mysqli, $query_dealer);
$row_dealer = mysqli_fetch_array($dealer);
$totalRows_dealer = mysqli_num_rows($dealer);
$did = $row_dealer['id'];

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
?>
<?php

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('m\-d\-Y\ ');

}

		$timevar = get_Datetime_Now();

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<link type='text/css' href='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.css' rel='stylesheet'/>
<link type='text/css' href='../css/jqm-docs2.css' rel='stylesheet'/>
<script type='text/javascript' src='../js/jquery-1.6.1.min2.js'></script>
<script type='text/javascript' src='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.js'></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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

.danger{ color:#F00; font-weight:bold;}

.safe{color:#3F3; font-weight:bold;}

</style>
<!-- Start Ajax Vin -->

<script>

$(function(){
 var keyStop = {
   8: ":not(input:text, textarea, input:file, input:password)", // stop backspace = back
   13: "input:text, input:password", // stop enter = submit 

   end: null
 };
 $(document).bind("keydown", function(event){
  var selector = keyStop[event.which];

  if(selector !== undefined && $(event.target).is(selector)) {
      //event.preventDefault(); //stop event
	  
	  //Added From   reference 
	  /// http://stackoverflow.com/questions/20045162/event-returnvalue-is-deprecated-please-use-the-standard-event-preventdefault
	  
	  if (!event.preventDefault) {
			event.preventDefault = function() {
			event.returnValue = false; //Internet Explorer
			};
		}
	  
	  
	  
	  
  }
  return true;
 });
});



function safeVin(str)

{

if (str=='')

  {

  document.getElementById('ajaxVinNo').innerHTML='';

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById('ajaxVinNo').innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open('GET','ajaxEnviro/ajax_getvehiclevin.php?vvin='+str,true);

xmlhttp.send();

}


function safeStockNo(str)

{

if (str=='')

  {

  document.getElementById('ajaxStockno').innerHTML='';

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById('ajaxStockno').innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open('GET','ajaxEnviro/ajax_getdealerstockno.php?did=<?php echo $did; ?>&vstockno='+str,true);

xmlhttp.send();

}
</script>

<!-- End Ajax Vin -->
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>

<body>

<SCRIPT language="JavaScript">
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='inventory-add.php?cat=' + val ;
}


function validate2Form()
{
var x=document.forms["myForm"]["vStockNo"].value;

if (x==null || x=="")
  {
  alert("Vehicle Stock No Must Be Entered");
  
  return false;
  
  }
}

function validateForm()
{
var x=document.forms["addVehicleymkmd"]["vyear"].value;
var y=document.forms["addVehicleymkmd"]["vmakeid"].value;
var z=document.forms["addVehicleymkmd"]["vmodelid"].value;

if (x==null || x=="")
  {
  alert("Vehicle Info Must Be Entered");
  return false;
  }
		
		if (y==null || y=="")
		  {
		  alert("A Vehicle Must Be Entered");
		  return false;
		  }
		  
				if (z==null || z=="")
				  {
				  alert("A Vehicle Model Must Be Entered");
				  return false;
				  }

}

</script>


<script type="text/javascript">

function showinfo() {


var addit = document.getElementById('showaddinfo').value;
//alert(addit);
	
	var addit = document.getElementById('showaddinfo').value;

	if(addit == 1){
			document.getElementById('showadditionalinfo').style.display = 'block';
	
	}else{
			document.getElementById('showadditionalinfo').style.display = 'none';
	}

}
</script>

<div data-role="page">




				<div id="jqm-homeheader" class="ui-mobile">
						
                        <?php include("inc/dues-mobile-navigation.php"); ?>

				</div>



				<div data-role="content" data-theme="a">
					





						<form name="addVehicleymkmd" action="<?php echo $editFormAction; ?>" method="POST" target="_parent" id="addVehicleymkmd" onSubmit="return validate2Form()" >

			<h2>You Are Adding Inventory Into <?php echo $row_dealer['company']; ?>'s Account Please Exercise Data Accuracy Which Is Very Important.</h2>

			<!-- <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

			<p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>
			-->
            <input name="dudes_id" type="hidden" value="<?php echo $dudesid; ?>">
            <input name="did" type="hidden" value="<?php echo $did; ?>">

			<input name="vsource_idscrm_import_txt" type="hidden" id="vsource_idscrm_import_txt" value="IDS-Lot">
			<!-- Ajax Search Stock Also Show The Last Stock Number DESC For Quick Add -->
			<div data-role="fieldcontain">
	         <label for="vstockno">Stock Number:</label>
	         <input type="text" name="vstockno" id="vstockno" value=""  onKeyUp="safeStockNo(this.value)" onChange="safeStockNo(this.value)" placeholder='Enter Stock Number' />
			<div id="ajaxStockno">Ajax Stock Results</div></div>

			<!-- Ajax Search Vin Also Show The Last Stock Number DESC For Quick Add -->
			<div data-role="fieldcontain">
	         <label for="vvin">VIN:</label>
	         <span id="spryVin">
	         <input name="vvin" type="text" id="vvin" onChange="safeVin(this.value)" value="" maxlength="17" placeholder='Enter VIN Number' />
	         <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg"><br />
	         Exceeded maximum number of characters.</span></span>
	         <div id="ajaxVinNo">Ajax VIN Results</div></div>

		
			<div data-role="fieldcontain">
			  <label for="vyear" class="select">Year:</label>
				<select name="vyear" id="vyear" data-native-menu="false">
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
			</div>

            




       




			<div data-role="fieldcontain">
			  <label for="vinterior_color" class="select">Make:</label>
				<select name="vmakeid" size="1" id="vmakeid" data-native-menu="false" onChange="WA_FilterAndPopulateSubList(vmodels_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
				  <option value="">Select Make</option>
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
			</div>            







            
            
            
			<div data-role="fieldcontain">
				<label for="vmodelid" class="select">Model:</label>
  <select name="vmodelid" id="vmodelid"  onchange="WA_FilterAndPopulateSubList(vmakes_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
					<option value="">Models Appear</option>
				</select>

			</div>

						<div data-role="fieldcontain">
			  <label for="vbody" class="select">Make:</label>
				<select name="vbody" size="1" id="vbody" data-native-menu="false">
										    <option value="" selected="selected">Select Body Style</option>
										    <option value="Coupe">Coupe</option>
										    <option value="Sedan">Sedan</option>
										    <option value="SUV">SUV</option>
										    <option value="Pick-Up">Pick-Up</option>
										    <option value="Convertible">Convertible</option>
											<option value="Hatchback">Hatchback</option>
										    <option value="Truck">Truck</option>
										    <option value="Van">Van</option>
										    <option value="Mini-Van">Mini-Van</option>
										    <option value="Wagon">Wagon</option>
                
                </select>
                </div>


						<div data-role="fieldcontain">
			  			  <label for="vtransm" class="select">Transmission:</label>
                        
                          <select name="vtransm" id="vtransm" data-native-menu="false">
                                <option value="">Select Transmission</option>
                                <option value="Automatic Trans.">Automatic Trans.</option>
                                <option value="Manual Trans.">Manual Trans.</option>
                                <option value="5 Speed">5 Speed</option>
                                <option value="Electric Trans.">Electric Trans.</option>
                          </select>
                            
                        </div> 
        	
            <!-- Condition Type -->
            <div data-role="fieldcontain">
			    <fieldset data-role="controlgroup">
			    	<legend>Choose Vehicle Condition:</legend>
			         	<input type="radio" name="newusedRadioGroup" id="newusedRadioGroup_0" value="New" />
			         	<label for="newusedRadioGroup_0">New</label>

                        <input type="radio" name="newusedRadioGroup" value="Used" id="newusedRadioGroup_1" />                        
			         	<label for="newusedRadioGroup_1">Used</label>

                        <input type="radio" name="newusedRadioGroup" value="Trade-In" id="newusedRadioGroup_2" />
			         	<label for="newusedRadioGroup_2">Trade-In</label>

                        <input type="radio" name="newusedRadioGroup" value="Salvage" id="newusedRadioGroup_3" />                        
	         	  <label for="newusedRadioGroup_3">Salvage</label>
			    </fieldset>
			</div>



			<div data-role="fieldcontain">
				<label for="vcertified">Vehicle Certified?:</label>
				<select name="vcertified" id="vcertified" data-role="slider">
				  <option value="0">NO</option>
					<option value="1">YES</option>
				</select>
			</div>


			<!-- Status Type -->
			<div data-role="fieldcontain">
			  <label for="vexterior_color" class="select">Exterior Color:</label>
				<select name="vexterior_color" size="1" id="vexterior_color" data-native-menu="false">
				  <option value="">Select Exterior Color</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_colors_hex['color_name']?>"><?php echo $row_colors_hex['color_name']?></option>
				  <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
              </select>            
			</div>            



			<div data-role="fieldcontain">
			  <label for="vinterior_color" class="select">Interior Color:</label>
				<select name="vinterior_color" id="vinterior_color" data-native-menu="false">
				  <option value="">Select Interior Color</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_colors_hex['color_name']?>"><?php echo $row_colors_hex['color_name']?></option>
				  <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
              </select>            
			</div>  
            
            
			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			     	<legend>ACCT & ONLINE / VEHICLE STATUS:</legend>
			         	<input type="radio" name="radio-choice-b" id="radio-choice-c" value="1" checked="checked" />
			         	<label for="radio-choice-c">LIVE</label>
			         	<input type="radio" name="radio-choice-b" id="radio-choice-d" value="0" />
			         	<label for="radio-choice-d">HOLD</label>

			         	<input type="radio" name="radio-choice-b" id="radio-choice-e" value="9" />
			         	<label for="radio-choice-e">SOLD</label>
			    </fieldset>
			</div>
            

			<div data-role="fieldcontain">
				<label for="showaddinfo">Show Additional Information? (Example Price,Mileage, etc.):</label>
				<select name="showaddinfo" id="showaddinfo"  onChange="showinfo(this)">
				  <option value="0">NO</option>
					<option value="1">YES</option>
				</select>
			</div>


                     
<div id="showadditionalinfo" style="display: none;">

			<div data-role="fieldcontain">
	         	<label for="vmileage">Mileage:</label>
	         	<input type="text" name="vmileage" id="vmileage" value=""  />
			</div>


			<div data-role="fieldcontain">
	         	<label for="vrprice">Retail Price:</label>
	         	<input type="text" name="vrprice" id="vrprice" value=""  />
			</div>


			<div data-role="fieldcontain">
	         	<label for="vspecialprice">Special Internet Price:</label>
	         	<input type="text" name="vspecialprice" id="vspecialprice" value=""  />
			</div>


			<div data-role="fieldcontain">
	         	<label for="vdprice">Down Payment Price:</label>
	         	<input type="text" name="vdprice" id="vdprice" value=""  />
			</div>


</div>


<!--

<div data-role="fieldcontain">
			<label for="textarea">Textarea:</label>
			<textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>

			</div>

			<div data-role="fieldcontain">
	         <label for="search">Search Input:</label>
	         <input type="search" name="password" id="search" value=""  />
			</div>

			<div data-role="fieldcontain">
				<label for="slider2">Flip switch:</label>

				<select name="slider2" id="slider2" data-role="slider">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="slider">Slider:</label>

			 	<input type="range" name="slider" id="slider" value="0" min="0" max="100"  />
			</div>

			<div data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<legend>Choose as many snacks as you'd like:</legend>
				<input type="checkbox" name="checkbox-1a" id="checkbox-1a" class="custom" />
				<label for="checkbox-1a">Cheetos</label>

				<input type="checkbox" name="checkbox-2a" id="checkbox-2a" class="custom" />
				<label for="checkbox-2a">Doritos</label>

				<input type="checkbox" name="checkbox-3a" id="checkbox-3a" class="custom" />
				<label for="checkbox-3a">Fritos</label>

				<input type="checkbox" name="checkbox-4a" id="checkbox-4a" class="custom" />
				<label for="checkbox-4a">Sun Chips</label>

		    </fieldset>
			</div>

			<div data-role="fieldcontain">
			<fieldset data-role="controlgroup" data-type="horizontal">
		    	<legend>Font styling:</legend>
		    	<input type="checkbox" name="checkbox-6" id="checkbox-6" class="custom" />
				<label for="checkbox-6">b</label>

				<input type="checkbox" name="checkbox-7" id="checkbox-7" class="custom" />
				<label for="checkbox-7"><em>i</em></label>

				<input type="checkbox" name="checkbox-8" id="checkbox-8" class="custom" />
				<label for="checkbox-8">u</label>
		    </fieldset>
			</div>

			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup">
			    	<legend>Choose a pet:</legend>
			         	<input type="radio" name="radio-choice-1" id="radio-choice-1" value="choice-1" checked="checked" />
			         	<label for="radio-choice-1">Cat</label>

			         	<input type="radio" name="radio-choice-1" id="radio-choice-2" value="choice-2"  />
			         	<label for="radio-choice-2">Dog</label>

			         	<input type="radio" name="radio-choice-1" id="radio-choice-3" value="choice-3"  />
			         	<label for="radio-choice-3">Hamster</label>

			         	<input type="radio" name="radio-choice-1" id="radio-choice-4" value="choice-4"  />
			         	<label for="radio-choice-4">Lizard</label>
			    </fieldset>
			</div>

			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			     	<legend>Layout view:</legend>
			         	<input type="radio" name="radio-choice-b" id="radio-choice-c" value="on" checked="checked" />
			         	<label for="radio-choice-c">List</label>
			         	<input type="radio" name="radio-choice-b" id="radio-choice-d" value="off" />
			         	<label for="radio-choice-d">Grid</label>

			         	<input type="radio" name="radio-choice-b" id="radio-choice-e" value="other" />
			         	<label for="radio-choice-e">Gallery</label>
			    </fieldset>
			</div>

			<div data-role="fieldcontain">
				<label for="select-choice-1" class="select">Choose shipping method:</label>
				<select name="select-choice-1" id="select-choice-1">

					<option value="standard">Standard: 7 day</option>
					<option value="rush">Rush: 3 days</option>
					<option value="express">Express: next day</option>
					<option value="overnight">Overnight</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="select-choice-3" class="select">Your state:</label>
				<select name="select-choice-3" id="select-choice-3">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>

					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>

					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>

					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>

					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>

					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>

					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>

					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>

					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="vmodelid" class="select">Choose shipping method:</label>
				<select name="select-choice-a" id="select-choice-a" data-native-menu="false">
					<option>Custom menu example</option>
					<option value="standard">Standard: 7 day</option>
					<option value="rush">Rush: 3 days</option>
					<option value="express">Express: next day</option>

					<option value="overnight">Overnight</option>
				</select>
			</div>

-->
            
                    <div class="ui-body ui-body-b">
                        
                        <?php include("inc/dudes-mobile-footer.php"); ?>
                        
                    </div>
                    <input type="hidden" name="MM_insert" value="addVehicleymkmd">
                  </form>

















					<?php //include("inc/form-add-inventory.php"); ?>
		
								
				</div>
                
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryVin", "none", {minChars:17, maxChars:17, hint:"Please Enter FULL VIN"});
//-->
</script>
</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($mydealers);

mysqli_free_result($dealer);

mysqli_free_result($carYears);

mysqli_free_result($vmakes);

mysqli_free_result($vmodels);

mysqli_free_result($colors_hex);
?>