<?php require_once('db.php');  ?>
<?php





if (isset($_POST['markTheseVehicles']) ){


$markTheseVehicles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['markTheseVehicles']));

	if(!$markTheseVehicles){exit;}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_compareVehicles = "SELECT `vehicles`.`vthubmnail_file`, `vehicles`.`did`, `vehicles`.`vid`  FROM  `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vid` IN ($markTheseVehicles)";
//echo $query_compareVehicles;
$compareVehicles = mysqli_query($idsconnection_mysqli, $query_compareVehicles);
$row_compareVehicles = mysqli_fetch_assoc($compareVehicles);
$totalRows_compareVehicles = mysqli_num_rows($compareVehicles);



	do {
	
	$thisvid = $row_compareVehicles['vid'];
	
	$UPDATE_VEHICLE_SQL = "UPDATE `idsids_idsdms`.`vehicles` SET `vlivestatus` = '9' WHERE `vehicles`.`vid` = '$thisvid'";
	$UPDATE_VEHICLE_LiveVehicles = mysqli_query($idsconnection_mysqli, $UPDATE_VEHICLE_SQL);
	//$row_UPDATE_VEHICLE_LiveVehicles = mysqli_fetch_assoc($UPDATE_VEHICLE_LiveVehicles);
	//$totalRows_UPDATE_VEHICLE_LiveVehicles = mysqli_num_rows($UPDATE_VEHICLE_LiveVehicles);
	
		
		
	} while ($row_compareVehicles = mysqli_fetch_assoc($compareVehicles));



}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * FROM vehicles WHERE vehicles.did = $did AND vehicles.vlivestatus = '9' ORDER BY vehicles.created_at DESC ";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);

?>



<?php
mysqli_free_result($LiveVehicles);
?>