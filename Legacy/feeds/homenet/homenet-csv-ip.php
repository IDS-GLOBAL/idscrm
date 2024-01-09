<?php require_once('../../Connections/idsconnection.php'); ?>
<?php 
//*************
//  CSV Import
//*************
require_once("../../dwzExport/CsvImport.php");
require_once('../../Connections/idsconnection.php');
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

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	//return $datetime->format('m\-d\-Y\ ');
	return $datetime->format('Y\-m\-d\ h:i:s');

}

$timevar = get_Datetime_Now();

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_dlr = "SELECT * FROM `dealers` WHERE feedhomenetfilename IS NOT NULL AND status = 1";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);
$homenetfile = $row_slct_dlr['feedhomenetfilename'];
$did = $row_slct_dlr['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_vehicles = "SELECT * FROM vehicles";
$slct_vehicles = mysqli_query($idsconnection_mysqli, $query_slct_vehicles);
$row_slct_vehicles = mysqli_fetch_assoc($slct_vehicles);
$totalRows_slct_vehicles = mysqli_num_rows($slct_vehicles);
?>
<?php
	

//echo get_Datetime_Now();

/*
* PHP and MYSQL
*/

	do {

?>
<?php
//************************************
//  http://www.DwZone-it.com
//  Import Export Tools - CSV Import
//  Version 1.1.7
//************************************
set_time_limit(5600);
$dwzCsvImport_1 = new dwzCsvImport();
$dwzCsvImport_1->Init();
$dwzCsvImport_1->SetExtraData("../../");
$dwzCsvImport_1->SetStartOn("ONLOAD", "");
$dwzCsvImport_1->SetProgressBar("@_@200");
$dwzCsvImport_1->SetRedirectPage("");
$dwzCsvImport_1->SetDisplayErrors("true");
$dwzCsvImport_1->SetFilePath("../../homenetauto/$homenetfile");
$dwzCsvImport_1->SetConnection($hostname_idsconnection, $database_idsconnection, $username_idsconnection, $password_idsconnection);
$dwzCsvImport_1->SetTable("vehicles");
$dwzCsvImport_1->SetTableUniqueKey("vvin");
$dwzCsvImport_1->SetColIsNum("false");
$dwzCsvImport_1->SetOnDuplicateEntry("Update");
$dwzCsvImport_1->SetCsvUniqueKey("4");
$dwzCsvImport_1->SetFieldSeparator(",");
$dwzCsvImport_1->SetSkipFirstLine("true");
$dwzCsvImport_1->SetEncloseField("DA");
$dwzCsvImport_1->AddItem("did", "Entered", "Ni", "$did", "None");
$dwzCsvImport_1->AddItem("vsource_idscrm_import_txt", "Entered", "S", "HomeNet", "None");
$dwzCsvImport_1->AddItem("vFeedStatusLckd", "Entered", "Ni", "1", "None");
$dwzCsvImport_1->AddItem("vlivestatus", "Entered", "Ni", "1", "None");
$dwzCsvImport_1->AddItem("homenetLastSent", "Entered", "S", "$timevar", "None");
$dwzCsvImport_1->AddItem("homenetDo", "Entered", "Ni", "0", "None");
$dwzCsvImport_1->AddItem("importHomnetPhotos", "Csv", "S", "", "64");
$dwzCsvImport_1->AddItem("vDateInStock", "Csv", "S", "", "23");
$dwzCsvImport_1->AddItem("vcomments", "Csv", "S", "", "24");
$dwzCsvImport_1->AddItem("vehicleOptionsBulk", "Csv", "S", "", "25");
$dwzCsvImport_1->AddItem("vcondition", "Csv", "S", "", "2");
$dwzCsvImport_1->AddItem("vvin", "Csv", "S", "", "4");
$dwzCsvImport_1->AddItem("vstockno", "Csv", "S", "", "3");
$dwzCsvImport_1->AddItem("vyear", "Csv", "S", "", "5");
$dwzCsvImport_1->AddItem("vmake", "Csv", "S", "", "6");
$dwzCsvImport_1->AddItem("vmodel", "Csv", "S", "", "7");
$dwzCsvImport_1->AddItem("vbody", "Csv", "S", "", "8");
$dwzCsvImport_1->AddItem("vtrim", "Csv", "S", "", "9");
$dwzCsvImport_1->AddItem("vdoors", "Csv", "S", "", "11");
$dwzCsvImport_1->AddItem("vecolor_txt", "Csv", "S", "", "12");
$dwzCsvImport_1->AddItem("vicolor_txt", "Csv", "S", "", "13");
$dwzCsvImport_1->AddItem("vengine", "Csv", "S", "", "14");
$dwzCsvImport_1->AddItem("vtransm", "Csv", "S", "", "16");
$dwzCsvImport_1->AddItem("vmileage", "Csv", "S", "", "17");
$dwzCsvImport_1->AddItem("vspecialprice", "Csv", "S", "", "18");
$dwzCsvImport_1->AddItem("vrprice", "Csv", "S", "", "19");
$dwzCsvImport_1->AddItem("vpurchasecost", "Csv", "S", "", "21");
$dwzCsvImport_1->AddItem("vcertified", "Csv", "B,true,false", "", "22");
$dwzCsvImport_1->Execute();
//***********************
// Csv Import
//***********************
?>
<?php
} while ($row_slct_dlr = mysqli_fetch_assoc($slct_dlr));

//print_r(Execute);


//print_r($dwzCsvImport_1);

print "All accounts have been updated.";

//db_connect();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSV Update Homenet</title>
</head>

<body>

<?php //do {  //Loop Me: ?>

  <p> <?php echo $row_slct_dlr['id']; ?> Importing Vehicle Data &amp; Photos...<?php echo $row_slct_dlr['company']; ?></p>

<?php 

	
	 
	//echo $did; 

?>

<?php //} while ($row_slct_dlr = mysqli_fetch_assoc($slct_dlr)); ?><br />


<!--
<form method="post" id="form1">
  <input name="csv_import_progress_key" type="hidden" id="csv_import_progress_key" value="<?php echo $dwzCsvImport_1->GetProgressKey(); ?>" />
  <table>
    <tr valign="baseline">
      <td align="right">Vid:</td>
      <td><?php echo $row_slct_vehicles['vid']; ?></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Did:</td>
      <td><input type="text" name="did" value="<?php echo htmlentities($row_slct_vehicles['did'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Cid:</td>
      <td><input type="text" name="cid" value="<?php echo htmlentities($row_slct_vehicles['cid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Sid:</td>
      <td><input type="text" name="sid" value="<?php echo htmlentities($row_slct_vehicles['sid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Frazerid:</td>
      <td><input type="text" name="frazerid" value="<?php echo htmlentities($row_slct_vehicles['frazerid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vyearid:</td>
      <td><input type="text" name="vyearid" value="<?php echo htmlentities($row_slct_vehicles['vyearid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vmakeid:</td>
      <td><input type="text" name="vmakeid" value="<?php echo htmlentities($row_slct_vehicles['vmakeid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vmodelid:</td>
      <td><input type="text" name="vmodelid" value="<?php echo htmlentities($row_slct_vehicles['vmodelid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vphotoid:</td>
      <td><input type="text" name="vphotoid" value="<?php echo htmlentities($row_slct_vehicles['vphotoid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vvideoid:</td>
      <td><input type="text" name="vvideoid" value="<?php echo htmlentities($row_slct_vehicles['vvideoid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vauctionid:</td>
      <td><input type="text" name="vauctionid" value="<?php echo htmlentities($row_slct_vehicles['vauctionid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vlivestatus:</td>
      <td><input type="text" name="vlivestatus" value="<?php echo htmlentities($row_slct_vehicles['vlivestatus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vonholdstatus:</td>
      <td><input type="text" name="vonholdstatus" value="<?php echo htmlentities($row_slct_vehicles['vonholdstatus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Salesperson_private:</td>
      <td><input type="text" name="salesperson_private" value="<?php echo htmlentities($row_slct_vehicles['salesperson_private'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vphoto_count:</td>
      <td><input type="text" name="vphoto_count" value="<?php echo htmlentities($row_slct_vehicles['vphoto_count'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vthubmnail_file:</td>
      <td><input type="text" name="vthubmnail_file" value="<?php echo htmlentities($row_slct_vehicles['vthubmnail_file'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vthubmnail_file_path:</td>
      <td><input type="text" name="vthubmnail_file_path" value="<?php echo htmlentities($row_slct_vehicles['vthubmnail_file_path'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Video_on_off_status:</td>
      <td><input type="text" name="video_on_off_status" value="<?php echo htmlentities($row_slct_vehicles['video_on_off_status'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">V_youtube_title:</td>
      <td><input type="text" name="v_youtube_title" value="<?php echo htmlentities($row_slct_vehicles['v_youtube_title'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">V_youtube_dlr_comment:</td>
      <td><input type="text" name="v_youtube_dlr_comment" value="<?php echo htmlentities($row_slct_vehicles['v_youtube_dlr_comment'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">V_video_youtube_link:</td>
      <td><input type="text" name="v_video_youtube_link" value="<?php echo htmlentities($row_slct_vehicles['v_video_youtube_link'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">V_video_file_name:</td>
      <td><input type="text" name="v_video_file_name" value="<?php echo htmlentities($row_slct_vehicles['v_video_file_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">VDateInStock</td>
      <td><input name="vDateInStock" type="text" id="vDateInStock" value="<?php echo $row_slct_vehicles['vDateInStock']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vyear:</td>
      <td><input type="text" name="vyear" value="<?php echo htmlentities($row_slct_vehicles['vyear'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vmake:</td>
      <td><input type="text" name="vmake" value="<?php echo htmlentities($row_slct_vehicles['vmake'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vmodel:</td>
      <td><input type="text" name="vmodel" value="<?php echo htmlentities($row_slct_vehicles['vmodel'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vtrim:</td>
      <td><input type="text" name="vtrim" value="<?php echo htmlentities($row_slct_vehicles['vtrim'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vvin:</td>
      <td><input type="text" name="vvin" value="<?php echo htmlentities($row_slct_vehicles['vvin'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vcondition:</td>
      <td><input type="text" name="vcondition" value="<?php echo htmlentities($row_slct_vehicles['vcondition'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vcertified:</td>
      <td><input type="text" name="vcertified" value="<?php echo htmlentities($row_slct_vehicles['vcertified'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vstockno:</td>
      <td><input type="text" name="vstockno" value="<?php echo htmlentities($row_slct_vehicles['vstockno'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vmileage:</td>
      <td><input type="text" name="vmileage" value="<?php echo htmlentities($row_slct_vehicles['vmileage'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vpurchasecost:</td>
      <td><input type="text" name="vpurchasecost" value="<?php echo htmlentities($row_slct_vehicles['vpurchasecost'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vdlrpack:</td>
      <td><input type="text" name="vdlrpack" value="<?php echo htmlentities($row_slct_vehicles['vdlrpack'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vaddedcost:</td>
      <td><input type="text" name="vaddedcost" value="<?php echo htmlentities($row_slct_vehicles['vaddedcost'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vrprice:</td>
      <td><input type="text" name="vrprice" value="<?php echo htmlentities($row_slct_vehicles['vrprice'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vdprice:</td>
      <td><input type="text" name="vdprice" value="<?php echo htmlentities($row_slct_vehicles['vdprice'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vspecialprice:</td>
      <td><input type="text" name="vspecialprice" value="<?php echo htmlentities($row_slct_vehicles['vspecialprice'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vecolor:</td>
      <td><input type="text" name="vecolor" value="<?php echo htmlentities($row_slct_vehicles['vecolor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vicolor:</td>
      <td><input type="text" name="vicolor" value="<?php echo htmlentities($row_slct_vehicles['vicolor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vecolor_txt:</td>
      <td><input type="text" name="vecolor_txt" value="<?php echo htmlentities($row_slct_vehicles['vecolor_txt'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vicolor_txt:</td>
      <td><input type="text" name="vicolor_txt" value="<?php echo htmlentities($row_slct_vehicles['vicolor_txt'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vcustomcolor:</td>
      <td><input type="text" name="vcustomcolor" value="<?php echo htmlentities($row_slct_vehicles['vcustomcolor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vbody:</td>
      <td><input type="text" name="vbody" value="<?php echo htmlentities($row_slct_vehicles['vbody'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vtransm:</td>
      <td><input type="text" name="vtransm" value="<?php echo htmlentities($row_slct_vehicles['vtransm'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vengine:</td>
      <td><input type="text" name="vengine" value="<?php echo htmlentities($row_slct_vehicles['vengine'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vdoors:</td>
      <td><input type="text" name="vdoors" value="<?php echo htmlentities($row_slct_vehicles['vdoors'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vehicle Options:</td>
      <td><textarea name="vehicleOptionsBulk" id="vehicleOptionsBulk" cols="45" rows="5"><?php echo $row_slct_vehicles['vehicleOptionsBulk']; ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Air_Conditioning:</td>
      <td><input type="text" name="Air_Conditioning" value="<?php echo htmlentities($row_slct_vehicles['Air_Conditioning'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Alloy_Wheels:</td>
      <td><input type="text" name="Alloy_Wheels" value="<?php echo htmlentities($row_slct_vehicles['Alloy_Wheels'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">AntiLock_Brakes:</td>
      <td><input type="text" name="AntiLock_Brakes" value="<?php echo htmlentities($row_slct_vehicles['AntiLock_Brakes'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Child_Seat:</td>
      <td><input type="text" name="Child_Seat" value="<?php echo htmlentities($row_slct_vehicles['Child_Seat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Cruise_Control:</td>
      <td><input type="text" name="Cruise_Control" value="<?php echo htmlentities($row_slct_vehicles['Cruise_Control'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Driver_Air_Bag:</td>
      <td><input type="text" name="Driver_Air_Bag" value="<?php echo htmlentities($row_slct_vehicles['Driver_Air_Bag'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Keyless_Entry:</td>
      <td><input type="text" name="Keyless_Entry" value="<?php echo htmlentities($row_slct_vehicles['Keyless_Entry'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Leather_Seats:</td>
      <td><input type="text" name="Leather_Seats" value="<?php echo htmlentities($row_slct_vehicles['Leather_Seats'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">On_Star_Equipped:</td>
      <td><input type="text" name="On_Star_Equipped" value="<?php echo htmlentities($row_slct_vehicles['On_Star_Equipped'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear_Ent_Center:</td>
      <td><input type="text" name="Rear_Ent_Center" value="<?php echo htmlentities($row_slct_vehicles['Rear_Ent_Center'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Navigation_System:</td>
      <td><input type="text" name="Navigation_System" value="<?php echo htmlentities($row_slct_vehicles['Navigation_System'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Passenger_Air_Bag:</td>
      <td><input type="text" name="Passenger_Air_Bag" value="<?php echo htmlentities($row_slct_vehicles['Passenger_Air_Bag'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power_Door_Locks:</td>
      <td><input type="text" name="Power_Door_Locks" value="<?php echo htmlentities($row_slct_vehicles['Power_Door_Locks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power_Mirrors:</td>
      <td><input type="text" name="Power_Mirrors" value="<?php echo htmlentities($row_slct_vehicles['Power_Mirrors'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power_Seats:</td>
      <td><input type="text" name="Power_Seats" value="<?php echo htmlentities($row_slct_vehicles['Power_Seats'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power_Steering:</td>
      <td><input type="text" name="Power_Steering" value="<?php echo htmlentities($row_slct_vehicles['Power_Steering'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power_Windows:</td>
      <td><input type="text" name="Power_Windows" value="<?php echo htmlentities($row_slct_vehicles['Power_Windows'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Memory_Seats:</td>
      <td><input type="text" name="Memory_Seats" value="<?php echo htmlentities($row_slct_vehicles['Memory_Seats'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear_Air_Conditioning:</td>
      <td><input type="text" name="Rear_Air_Conditioning" value="<?php echo htmlentities($row_slct_vehicles['Rear_Air_Conditioning'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear_Window_Defroster:</td>
      <td><input type="text" name="Rear_Window_Defroster" value="<?php echo htmlentities($row_slct_vehicles['Rear_Window_Defroster'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear_Wiper:</td>
      <td><input type="text" name="Rear_Wiper" value="<?php echo htmlentities($row_slct_vehicles['Rear_Wiper'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Side_Air_Bag:</td>
      <td><input type="text" name="Side_Air_Bag" value="<?php echo htmlentities($row_slct_vehicles['Side_Air_Bag'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">SunroofMoonroof:</td>
      <td><input type="text" name="SunroofMoonroof" value="<?php echo htmlentities($row_slct_vehicles['SunroofMoonroof'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Television:</td>
      <td><input type="text" name="Television" value="<?php echo htmlentities($row_slct_vehicles['Television'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Tilt_Wheel:</td>
      <td><input type="text" name="Tilt_Wheel" value="<?php echo htmlentities($row_slct_vehicles['Tilt_Wheel'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Tinted_Glass:</td>
      <td><input type="text" name="Tinted_Glass" value="<?php echo htmlentities($row_slct_vehicles['Tinted_Glass'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Sliding_Doors:</td>
      <td><input type="text" name="Sliding_Doors" value="<?php echo htmlentities($row_slct_vehicles['Sliding_Doors'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">CD_Player:</td>
      <td><input type="text" name="CD_Player" value="<?php echo htmlentities($row_slct_vehicles['CD_Player'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">CD_Changer:</td>
      <td><input type="text" name="CD_Changer" value="<?php echo htmlentities($row_slct_vehicles['CD_Changer'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Bluetooth:</td>
      <td><input type="text" name="Bluetooth" value="<?php echo htmlentities($row_slct_vehicles['Bluetooth'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Satellite_Radio:</td>
      <td><input type="text" name="Satellite_Radio" value="<?php echo htmlentities($row_slct_vehicles['Satellite_Radio'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Carfax:</td>
      <td><input type="text" name="carfax" value="<?php echo htmlentities($row_slct_vehicles['carfax'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Autocheck:</td>
      <td><input type="text" name="autocheck" value="<?php echo htmlentities($row_slct_vehicles['autocheck'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vcomments:</td>
      <td><input type="text" name="vcomments" value="<?php echo htmlentities($row_slct_vehicles['vcomments'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Feedcarscom:</td>
      <td><input type="text" name="feedcarscom" value="<?php echo htmlentities($row_slct_vehicles['feedcarscom'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Feedautotradercom:</td>
      <td><input type="text" name="feedautotradercom" value="<?php echo htmlentities($row_slct_vehicles['feedautotradercom'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Feedovecom:</td>
      <td><input type="text" name="feedovecom" value="<?php echo htmlentities($row_slct_vehicles['feedovecom'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Craigslistorg:</td>
      <td><input type="text" name="craigslistorg" value="<?php echo htmlentities($row_slct_vehicles['craigslistorg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Feedebaycom:</td>
      <td><input type="text" name="feedebaycom" value="<?php echo htmlentities($row_slct_vehicles['feedebaycom'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Feedcomcastvod:</td>
      <td><input type="text" name="feedcomcastvod" value="<?php echo htmlentities($row_slct_vehicles['feedcomcastvod'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Ove_physicallocationind:</td>
      <td><input type="text" name="ove_physicallocationind" value="<?php echo htmlentities($row_slct_vehicles['ove_physicallocationind'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Ove_priorpaint:</td>
      <td><input type="text" name="ove_priorpaint" value="<?php echo htmlentities($row_slct_vehicles['ove_priorpaint'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Ove_titlestatus:</td>
      <td><input type="text" name="ove_titlestatus" value="<?php echo htmlentities($row_slct_vehicles['ove_titlestatus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Ove_titlestate:</td>
      <td><input type="text" name="ove_titlestate" value="<?php echo htmlentities($row_slct_vehicles['ove_titlestate'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Statistic:</td>
      <td><input type="text" name="statistic" value="<?php echo htmlentities($row_slct_vehicles['statistic'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Vdeleted:</td>
      <td><input type="text" name="vdeleted" value="<?php echo htmlentities($row_slct_vehicles['vdeleted'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Modified_at:</td>
      <td><input type="text" name="modified_at" value="<?php echo htmlentities($row_slct_vehicles['modified_at'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Created_at:</td>
      <td><input type="text" name="created_at" value="<?php echo htmlentities($row_slct_vehicles['created_at'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Import Homnet Photos</td>
      <td><textarea name="importHomnetPhotos" id="importHomnetPhotos" cols="45" rows="5"><?php echo $row_slct_vehicles['importHomnetPhotos']; ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Homenet Last Sent</td>
      <td><input name="homenetLastSent" type="text" id="homenetLastSent" value="<?php echo $row_slct_vehicles['homenetLastSent']; ?>" /></td>
    </tr>
<tr valign="baseline">
      <td align="right">Homenet Do</td>
      <td><input name="homenetDo" type="text" id="homenetDo" value="<?php echo $row_slct_vehicles['homenetDo']; ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="vid" value="<?php echo $row_slct_vehicles['vid']; ?>" />
</form>
-->

<p>&nbsp;</p>
</body>
</html>
<?php
//***********************
// Csv Import
//***********************
$dwzCsvImport_1->InsertProgressJs();
//***********************
// Csv Import
//***********************
?>
<?php
require_once("../../Connections/idsconnection.php");

$processSQL = "SELECT vehicles.vid, vehicles.did, vehicles.vvin, vehicles.vcondition, vehicles.vstockno, vehicles.importHomnetPhotos, vehicles.vlivestatus, vehicles.vDateInStock, vehicles.vthubmnail_file, vehicles.vthubmnail_file_path, vehicles.modified_at, vehicles.homenetLastSent, vehicles.homenetDo FROM `idsids_idsdms`.`vehicles` WHERE vehicles.homenetDo = '1' AND vehicles.importHomnetPhotos IS NOT NULL ORDER BY vehicles.vid DESC";

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehicless_sold = "$processSQL";
$vehicless_sold = mysqli_query($idsconnection_mysqli, $query_vehicless_sold);
$row_vehicless_sold = mysqli_fetch_assoc($vehicless_sold);
$totalRows_vehicless_sold = mysqli_num_rows($vehicless_sold);

$justmarkSold =	"UPDATE `idsids_idsdms`.`vehicles`
					SET
					`vlivestatus` = '9',
					`homenetDo` = '1'
					WHERE
					`vehicles`.`vid` = '$vid'
					LIMIT 1";

$now = date('m/d/Y');

do { 


$homenetDo = $row_vehicless_sold['homenetDo'];

$vid = $row_vehicless_sold['vid'];
$did = $row_vehicless_sold['did'];



	$updateToSold =	"UPDATE `idsids_idsdms`.`vehicles`
					SET
					`vlivestatus` = '9',										
					`marked_sold` = '$now'
					`homenetDo` = '1'
					WHERE
					`vehicles`.`vid` = '$vid'
					LIMIT 1";

		if ($homenetDo == '1')
		{
			$updateSoldSQL = mysqli_query($idsconnection_mysqli, $updateToSold);
		}


} while ($row_vehicless_sold = mysqli_fetch_assoc($vehicless_sold));


?>
<?php
mysqli_free_result($slct_dlr);

mysqli_free_result($slct_vehicles);
?>