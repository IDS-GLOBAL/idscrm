<?php include("db_loggedin.php"); ?>
<?php



if (isset($_POST['v_photoid'], $_POST['vid'], $_POST['newno'], $_POST['order_number'] )) {


$vid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vid']));
$newno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newno']));
$order_number =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['order_number']));
$v_photoid =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['v_photoid']));

$query_find_vehicle_photo = "SELECT * FROM  `idsids_idsdms`.`vehicle_photos` WHERE vehicle_id = '$vid' AND sort_orderno = '$order_number' ORDER BY sort_orderno ASC LIMIT 1";
$find_vehicle_photo = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photo);
$row_find_vehicle_photo = mysqli_fetch_assoc($find_vehicle_photo);
$totalRows_find_vehicle_photo = mysqli_num_rows($find_vehicle_photo);
$photo_file_name = $row_find_vehicle_photo['photo_file_name'];
$photo_file_path = $row_find_vehicle_photo['photo_file_path'];

$vphoto_did = $row_find_vehicle_photo['dealer_id'];
//$v_photoid = $row_find_vehicle_photo['v_photoid'];



//echo 'hello';

	$vvin =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_find_vehicle['vvin']));;

if($did == $vphoto_did){

	$save_vehicle_photos_sql = "DELETE  FROM `idsids_idsdms`.`vehicle_photos` 
							WHERE
								`vehicle_photos`.`v_photoid` = '$v_photoid'
								";
	$result_save_vehicle_photos_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_photos_sql);


/*
	$save_vehicle_thumbnail_sql = "DELETE `idsids_idsdms`.`vehicles` SET
								`vthubmnail_file` = '$photo_file_name',
								`vthubmnail_file_path` = '$photo_file_path',
								`vPhotoURLs` = '$totalRows_find_vehicle_photos'
							WHERE
								`vid` = '$vid'
								";
	//$result_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql);
*/

}

//  If Deleting photo is the same as current vehicle erase it with null
$vthubmnail_file = $row_find_vehicle['vthubmnail_file'];

if($vthubmnail_file == $photo_file_name){

	// Subtractphoto count
	$totalRows_find_vehicle_photoss = $totalRows_find_vehicle_photos - 1;

	$save_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
								`vthubmnail_file` = '',
								`vthubmnail_file_path` = '',
								`vPhotoURLs` = '$totalRows_find_vehicle_photoss'
							WHERE
								`vid` = '$vid'
								";
	$result_save_vehicle_thumbnail_sql =  mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql);

}


}





?>
<?php include("inc.end.phpmsyql.php"); ?>