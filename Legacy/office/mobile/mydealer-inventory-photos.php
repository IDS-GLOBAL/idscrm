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


$colname_queryVehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_queryVehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryVehicle =  "SELECT * FROM vehicles WHERE vid = %s", GetSQLValueString($colname_queryVehicle, "int"));
$queryVehicle = mysqli_query($idsconnection_mysqli, $query_queryVehicle);
$row_queryVehicle = mysqli_fetch_array($queryVehicle);
$totalRows_queryVehicle = mysqli_num_rows($queryVehicle);

$vid = $row_queryVehicle['vid'];
$did = $row_queryVehicle['did'];
$vyear = $row_queryVehicle['vyear'];
$vmake = $row_queryVehicle['vmake'];
$vmodel = $row_queryVehicle['vmodel'];
$vtrim = $row_queryVehicle['vtrim'];

$vtitle = "$vyear $vmake $vmodel $vtrim";
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer = "SELECT * FROM dealers WHERE id = $did";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);
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
<title>Add Photos To Vehicle</title>
<link type='text/css' href='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.css' rel='stylesheet'/>
<link type='text/css' href='../css/jqm-docs2.css' rel='stylesheet'/>
<script type='text/javascript' src='../js/jquery-1.6.1.min2.js'></script>
<script type='text/javascript' src='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.js'></script>
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
  alert("Vehicle Must Be Entered");
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
					





						<form action="script-multi-upload-thumbnail-generator.php" method="post" enctype="multipart/form-data" target="_parent" id="vphotoUpload" >


<br>
<br>
<br>
<br>
<br>

Currently There Are "<?php echo $row_queryVehicle['vphoto_count']; ?>: Photos" that belong to this car. Click Here To <a href="#">View Them</a><br />
			<h2>You Are Now Adding Photos To A "<?php echo $vtitle; ?>"  which belongs to "<?php echo $row_queryDealer['company']; ?>"</h2>

			<!-- <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

			<p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>
			-->
            <input type="hidden" name="dudes_id" value="<?php echo $dudesid; ?>">
            <input type="hidden" name="did" value="<?php echo $did; ?>">
            <input type="hidden" name="vid" value="85">

			<!-- Ajax Search Stock Also Show The Last Stock Number DESC For Quick Add -->
			<div data-role="fieldcontain">
	         <label for="photo1">Photo 1:</label>
	         <input type="file" name="photo1" id="photo1" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo2">Photo 2:</label>
	         <input type="file" name="photo2" id="photo2" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo3">Photo 3:</label>
	         <input type="file" name="photo3" id="photo3" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo4">Photo 4:</label>
	         <input type="file" name="photo4" id="photo4" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo5">Photo 5:</label>
	         <input type="file" name="photo5" id="photo5" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo6">Photo 6:</label>
	         <input type="file" name="photo6" id="photo6" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo7">Photo 7:</label>
	         <input type="file" name="photo7" id="photo7" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo8">Photo 8:</label>
	         <input type="file" name="photo8" id="photo8" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo9">Photo 9:</label>
	         <input type="file" name="photo9" id="photo9" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo10">Photo 10:</label>
	         <input type="file" name="photo10" id="photo10" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo11">Photo 11:</label>
	         <input type="file" name="photo11" id="photo11" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo12">Photo 12:</label>
	         <input type="file" name="photo12" id="photo12" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo13">Photo 13:</label>
	         <input type="file" name="photo13" id="photo13" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo14">Photo 14:</label>
	         <input type="file" name="photo14" id="photo14" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo15">Photo 15:</label>
	         <input type="file" name="photo15" id="photo15" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo16">Photo 16:</label>
	         <input type="file" name="photo16" id="photo16" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo17">Photo 17:</label>
	         <input type="file" name="photo17" id="photo17" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo18">Photo 18:</label>
	         <input type="file" name="photo18" id="photo18" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo19">Photo 19:</label>
	         <input type="file" name="photo19" id="photo19" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo20">Photo 20:</label>
	         <input type="file" name="photo20" id="photo20" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo21">Photo 21:</label>
	         <input type="file" name="photo21" id="photo21" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo22">Photo 22:</label>
	         <input type="file" name="photo22" id="photo22" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo23">Photo 23:</label>
	         <input type="file" name="photo23" id="photo23" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo24">Photo 24:</label>
	         <input type="file" name="photo24" id="photo24" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo25">Photo 25:</label>
	         <input type="file" name="photo25" id="photo25" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo26">Photo 26:</label>
	         <input type="file" name="photo26" id="photo26" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo27">Photo 27:</label>
	         <input type="file" name="photo27" id="photo27" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo28">Photo 28:</label>
	         <input type="file" name="photo28" id="photo28" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo29">Photo 29:</label>
	         <input type="file" name="photo29" id="photo29" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo30">Photo 30:</label>
	         <input type="file" name="photo30" id="photo30" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo31">Photo 31:</label>
	         <input type="file" name="photo31" id="photo31" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo32">Photo 32:</label>
	         <input type="file" name="photo32" id="photo32" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo33">Photo 33:</label>
	         <input type="file" name="photo33" id="photo33" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo34">Photo 34:</label>
	         <input type="file" name="photo34" id="photo34" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo35">Photo 35:</label>
	         <input type="file" name="photo35" id="photo35" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo36">Photo 36:</label>
	         <input type="file" name="photo36" id="photo36" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo37">Photo 37:</label>
	         <input type="file" name="photo37" id="photo37" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo38">Photo 38:</label>
	         <input type="file" name="photo38" id="photo38" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo39">Photo 39:</label>
	         <input type="file" name="photo39" id="photo39" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="photo40">Photo 40:</label>
	         <input type="file" name="photo40" id="photo40" value=""  />
			</div>


            
                    <div class="ui-body ui-body-b">
                        
                        <?php include("inc/dudes-mobile-footer.php"); ?>
                        
                    </div>
            

   	</form>

















					<?php //include("inc/form-add-inventory.php"); ?>
		
								
				</div>
                
</div>
</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($mydealers);

mysqli_free_result($dealer);

mysqli_free_result($queryVehicle);

mysqli_free_result($queryDealer);

mysqli_free_result($carYears);

mysqli_free_result($vmakes);

mysqli_free_result($vmodels);

mysqli_free_result($colors_hex);
?>