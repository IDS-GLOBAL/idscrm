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
$query_cfs_vehiclequery = "SELECT * FROM `vehicles`, `dealers` WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '1' AND `dealers`.`export_tocarsforsale` = '1' AND `vehicles`.`vthubmnail_file` IS NOT NULL";
$cfs_vehiclequery = mysqli_query($idsconnection_mysqli, $query_cfs_vehiclequery);
$row_cfs_vehiclequery = mysqli_fetch_assoc($cfs_vehiclequery);
$totalRows_cfs_vehiclequery = mysqli_num_rows($cfs_vehiclequery);

?>
<?php


function preparephoto_cfsurls ($param){

global $idsconnection;
global $database_idsconnection;

$param = mysql_real_escape_string($param);

$cfsurl='';
$output = "";
$counter_gridrow = 0;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_grab_vfirstphoto = "SELECT * FROM vehicles WHERE vid = '$param' ";
$grab_vfirstphoto = mysqli_query($idsconnection_mysqli, $query_grab_vfirstphoto);
$row_grab_vfirstphoto = mysqli_fetch_assoc($grab_vfirstphoto);
$totalRows_grab_vfirstphoto = mysqli_num_rows($grab_vfirstphoto);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vpics_cfs_customurls = "SELECT * FROM `idsids_idsdms`.`vehicle_photos` WHERE `vehicle_photos`.`vehicle_id` = '$param' ORDER BY photo_file_name ASC";
$vpics_cfs_customurls = mysqli_query($idsconnection_mysqli, $query_vpics_cfs_customurls);
$row_vpics_cfs_customurls = mysqli_fetch_assoc($vpics_cfs_customurls);
$totalRows_vpics_cfs_customurls = mysqli_num_rows($vpics_cfs_customurls);





$string = "";
$vthubmnail_file = $row_grab_vfirstphoto['vthubmnail_file'];
$vthubmnail_file_path = $row_grab_vfirstphoto['vthubmnail_file_path'];
$vthubmnail_file_path = str_replace("thumbs/", "", "$vthubmnail_file_path");
$vthubmnail_file_path = str_replace("../vehicles/photos/", "", "$vthubmnail_file_path");

$vlink = "http://images.autocitymag.com/$vthubmnail_file_path";





// If no photos exist then update vehicles table with a null value
// Else loop all vehicles and run function with return through full loop.
if($totalRows_vpics_cfs_customurls == 0):
$null=NULL;

$vehicleCarsforSaleUpdateSQLNOPHOTO = "UPDATE `idsids_idsdms`.`vehicles` SET `vehicles`.`export_cfs_photourls` = '$null' WHERE `vehicles`.`vid` = '$param'";
$vehicleCarsforSaleUpdateNOPHOTO =	mysqli_query($idsconnection_mysqli, $vehicleCarsforSaleUpdateSQLNOPHOTO);			


	return;

else:


if(isset($row_grab_vfirstphoto['vthubmnail_file_path'])){ 			

			$created_att = $row_grab_vfirstphoto['created_at'];
			
			$time_stampp = strtotime($created_att);
			$date_formatt = date("YmdHi",$time_stampp);

		
		$cfsurl .= $vlink."?dt=$date_formatt,";
	
}

		
		
		
		
			// Run Loop of Vehicle And set export_vast_photourls long text column.

		do {

			$created_at = $row_vpics_cfs_customurls['created_at'];
			//echo $created_at = "2012-12-09 15:45:06"; // $row_vpics_cfs_customurls['created_at'];

		
			$counter_gridrow++;

			$time_stamp = strtotime($created_at);
			$date_format=date("YmdHi",$time_stamp);


			
			echo $dealerid=$row_vpics_cfs_customurls['dealer_id'];
			echo $vehicleid=$row_vpics_cfs_customurls['vehicle_id'];
			echo $file_name=$row_vpics_cfs_customurls['photo_file_name'];
			
			$link = "http://images.autocitymag.com/$dealerid/$vehicleid/$file_name";

			
				if($counter_gridrow == $totalRows_vpics_cfs_customurls){ 			
				
					$cfsurl .= $link."?dt=$date_format";
				
				}else{
					
					$cfsurl .= $link."?dt=$date_format,";
				}
			
			$output = $cfsurl;
				
				
		} while ($row_vpics_cfs_customurls = mysqli_fetch_assoc($vpics_cfs_customurls));

			echo $output = mysql_real_escape_string($output);

	echo '<br />';		
$vehicleCarsforSaleUpdateSQL = "UPDATE `idsids_idsdms`.`vehicles` SET `vehicles`.`export_cfs_photourls` = '$output' WHERE `vehicles`.`vid` = '$param'";
$vehicleCarsforSaleUpdate =	mysqli_query($idsconnection_mysqli, $vehicleCarsforSaleUpdateSQL);
			
			
			//mysqli_free_result($vpics_cfs_customurls);
			//return mysqli_query($idsconnection_mysqli, $vpics_cfs_customurls);\
return;
endif;

}

echo 'Total Records: '.$totalRows_cfs_vehiclequery.'<br />';

do {

echo $row_cfs_vehiclequery['vid'].' ';
echo $row_cfs_vehiclequery['vyear'].' '; 
echo $row_cfs_vehiclequery['vmake'].' '; 
echo $row_cfs_vehiclequery['vmodel'].' '; 
echo $row_cfs_vehiclequery['vtrim'].' '; 
echo $row_cfs_vehiclequery['created_at'].' ';

$cfs_vid = $row_cfs_vehiclequery['vid'];
preparephoto_cfsurls($cfs_vid);

} while ($row_cfs_vehiclequery = mysqli_fetch_assoc($cfs_vehiclequery));

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cars For Sale</title>
</head>

<body>

  
  
</body>
</html>
<?php
mysqli_free_result($cfs_vehiclequery);

//mysqli_free_result($vpics_cfs_customurls);
?>