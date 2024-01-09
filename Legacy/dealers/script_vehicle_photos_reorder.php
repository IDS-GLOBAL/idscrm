<?php include("db_loggedin.php"); ?>
<?php



if (isset($_POST['v_photoid'], $_POST['vid'], $_POST['newno'], $_POST['order_number'] )) {


$vid = $_POST['vid'];
$newno = $_POST['newno'];
$order_number =  $_POST['order_number'];
$v_photoid =  $_POST['v_photoid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_photo = "SELECT * FROM  `idsids_idsdms`.`vehicle_photos` WHERE vehicle_id = '$vid' AND v_photoid = '$v_photoid' LIMIT 1";
$find_vehicle_photo = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photo);
$row_find_vehicle_photo = mysqli_fetch_assoc($find_vehicle_photo);
$totalRows_find_vehicle_photo = mysqli_num_rows($find_vehicle_photo);
$photo_file_name = $row_find_vehicle_photo['photo_file_name'];
$photo_file_path = $row_find_vehicle_photo['photo_file_path'];

//$v_photoid = $row_find_vehicle_photo['v_photoid'];
echo '<br />';


	$vvin = $row_find_vehicle['vvin'];

if($newno == 1){

	$save_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
								`vphotos_resorted` = '1',
								`vthubmnail_file` = '$photo_file_name',
								`vthubmnail_file_path` = '$photo_file_path',
								`vPhotoURLs` = '$totalRows_find_vehicle_photos'
							WHERE
								`vid` = '$vid'
								";
	$result_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql);

}


	$save_vehicle_photos_sql = "UPDATE `idsids_idsdms`.`vehicle_photos` SET
								`sort_orderno` = '$order_number',
								`v_caption` = 'Photo $order_number'
							WHERE
								`vehicle_photos`.`v_photoid` = '$v_photoid'
								";
	$result_save_vehicle_photos_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_photos_sql);


}





?>