<?php require_once('../../Connections/idsconnection.php'); ?>
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
$query_vst_vehiclequery = "SELECT * FROM `vehicles` WHERE `vehicles`.`did` = '60' AND `vehicles`.`vlivestatus` = '1' ORDER BY `vehicles`.`vid` ASC";
$vst_vehiclequery = mysqli_query($idsconnection_mysqli, $query_vst_vehiclequery);
$row_vst_vehiclequery = mysqli_fetch_assoc($vst_vehiclequery);
echo 'Total Count: '.$totalRows_vst_vehiclequery = mysqli_num_rows($vst_vehiclequery);
echo '<br />';
?>
<?php


function preparephoto_vsturls ($param){

global $idsconnection;
global $database_idsconnection;

$param = mysql_real_escape_string($param);

$vsturl='';
$output = "";
$counter_gridrow = 0;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_grab_vfirstphoto = "SELECT vid, did, vlivestatus, vthubmnail_file, vthubmnail_file_path, created_at FROM vehicles WHERE vid = '$param' ";
$grab_vfirstphoto = mysqli_query($idsconnection_mysqli, $query_grab_vfirstphoto);
$row_grab_vfirstphoto = mysqli_fetch_assoc($grab_vfirstphoto);
$totalRows_grab_vfirstphoto = mysqli_num_rows($grab_vfirstphoto);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vpics_vst_customurls = "SELECT * FROM `idsids_idsdms`.`vehicle_photos` WHERE `vehicle_photos`.`vehicle_id` = '$param' ORDER BY photo_file_name ASC";
$vpics_vst_customurls = mysqli_query($idsconnection_mysqli, $query_vpics_vst_customurls);
$row_vpics_vst_customurls = mysqli_fetch_assoc($vpics_vst_customurls);
$totalRows_vpics_vst_customurls = mysqli_num_rows($vpics_vst_customurls);

$string = "";
$vthubmnail_file = $row_grab_vfirstphoto['vthubmnail_file'];
$vthubmnail_file_path = $row_grab_vfirstphoto['vthubmnail_file_path'];
$vthubmnail_file_path = str_replace("thumbs/", "", "$vthubmnail_file_path");
$vthubmnail_file_path = str_replace("../vehicles/photos/", "", "$vthubmnail_file_path");


//$export_vast_listing_time = $row_grab_vfirstphoto['created_at'];
//$export_vast_listing_time = str_replace(" ", "-", "$export_vast_listing_time");

$export_vast_listing_time = date('Y-m-d-h:i:s');

$export_vast_expire_time = date('Y-m-d-h:i:s', strtotime("+30 days"));





$vlink = "http://images.autocitymag.com/$vthubmnail_file_path";

$vthubmnail_file = $row_grab_vfirstphoto['vthubmnail_file'];
$vthubmnail_file_path = $row_grab_vfirstphoto['vthubmnail_file_path'];


// See if count is over 1
if($totalRows_vpics_vst_customurls == 0): 
$null=NULL;

$vehicleid=$row_vpics_vst_customurls['vehicle_id'];
$vehicleCarsforSaleUpdateSQLNOPHOTO = "UPDATE `idsids_idsdms`.`vehicles` SET 
										`vehicles`.`export_vast_listing_time` = '$export_vast_listing_time', 
										`vehicles`.`export_vast_expire_time` = '$export_vast_expire_time',
										`vehicles`.`export_vast_photourls` = '$null' 
										WHERE
										`vehicles`.`vid` = '$param'
										";
$vehicleCarsforSaleUpdateNOPHOTO =	mysqli_query($idsconnection_mysqli, $vehicleCarsforSaleUpdateSQLNOPHOTO);			

	return;

else:
		
		if( isset($row_grab_vfirstphoto['vthubmnail_file_path'])){ 			
		
			
		 echo $vsturl .=  $vlink."|";
		
		}

		// This Loop Creates A Loop Of URLS To Insert INTO Mysql
		do {

			$created_at = $row_vpics_vst_customurls['created_at'];
			//echo $created_at = "2012-12-09 15:45:06"; // $row_vpics_vst_customurls['created_at'];

		
			$counter_gridrow++;

			$time_stamp = strtotime($created_at);
			$date_format=date("YmdHi",$time_stamp);



			
			$dealerid=$row_vpics_vst_customurls['dealer_id'];
			echo $vehicleid=$row_vpics_vst_customurls['vehicle_id'];
			$file_name=$row_vpics_vst_customurls['photo_file_name'];
			echo ' ';
			echo $link = "http://images.autocitymag.com/$dealerid/$vehicleid/$file_name";
			
			
			if($counter_gridrow == $totalRows_vpics_vst_customurls){ 			
			
				$vsturl .= $link."";
			
			}else{
				
				$vsturl .= $link."|";
			}
			
			$output = $vsturl;
				
				
	} while ($row_vpics_vst_customurls = mysqli_fetch_assoc($vpics_vst_customurls));

			$output = mysql_real_escape_string($output);

//echo '<br />';
$vehicleCarsforSaleUpdateSQL = "UPDATE `idsids_idsdms`.`vehicles` SET 
									`vehicles`.`export_vast_listing_time` = '$export_vast_listing_time', 
									`vehicles`.`export_vast_expire_time` = '$export_vast_expire_time',
									`vehicles`.`export_vast_photourls` = '$output' 
								WHERE 
									`vehicles`.`vid` = '$param'";

$vehicleCarsforSaleUpdate =	mysqli_query($idsconnection_mysqli, $vehicleCarsforSaleUpdateSQL);			
//mysqli_free_result($vpics_vst_customurls);
//return mysqli_query($idsconnection_mysqli, $vpics_vst_customurls);
return;
endif;
}






	// Run Loop of Vehicle And set export_vast_photourls long text column.
	do {

			echo $row_vst_vehiclequery['vid']; 
			echo $row_vst_vehiclequery['vyear']; 
			echo $row_vst_vehiclequery['vmake']; 
			echo $row_vst_vehiclequery['vmodel']; 
			echo $row_vst_vehiclequery['vtrim']; 
			echo $row_vst_vehiclequery['created_at'];
			
			//Define Function Variable
			$vst_vid = $row_vst_vehiclequery['vid'];
			
			// Run Function Through Loop
			preparephoto_vsturls($vst_vid);

	} while ($row_vst_vehiclequery = mysqli_fetch_assoc($vst_vehiclequery));






?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Prepare Vast Vehicles</title>
</head>

<body>

  
  
</body>
</html>
<?php
mysqli_free_result($vst_vehiclequery);

//mysqli_free_result($vpics_vst_customurls);
?>