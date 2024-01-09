<?php require_once("../db_admin.php"); ?>
<?php


/*

This should return gps data when handing files, mighte be good for vehicle photos.
/**
 * Returns an array of latitude and longitude from the Image file
 * @param image $file
 * @return multitype:number |boolean

function read_gps_location($file){
    if (is_file($file)) {
        $info = exif_read_data($file);
        if (isset($info['GPSLatitude']) && isset($info['GPSLongitude']) &&
            isset($info['GPSLatitudeRef']) && isset($info['GPSLongitudeRef']) &&
            in_array($info['GPSLatitudeRef'], array('E','W','N','S')) && in_array($info['GPSLongitudeRef'], array('E','W','N','S'))) {

            $GPSLatitudeRef  = strtolower(trim($info['GPSLatitudeRef']));
            $GPSLongitudeRef = strtolower(trim($info['GPSLongitudeRef']));

            $lat_degrees_a = explode('/',$info['GPSLatitude'][0]);
            $lat_minutes_a = explode('/',$info['GPSLatitude'][1]);
            $lat_seconds_a = explode('/',$info['GPSLatitude'][2]);
            $lng_degrees_a = explode('/',$info['GPSLongitude'][0]);
            $lng_minutes_a = explode('/',$info['GPSLongitude'][1]);
            $lng_seconds_a = explode('/',$info['GPSLongitude'][2]);

            $lat_degrees = $lat_degrees_a[0] / $lat_degrees_a[1];
            $lat_minutes = $lat_minutes_a[0] / $lat_minutes_a[1];
            $lat_seconds = $lat_seconds_a[0] / $lat_seconds_a[1];
            $lng_degrees = $lng_degrees_a[0] / $lng_degrees_a[1];
            $lng_minutes = $lng_minutes_a[0] / $lng_minutes_a[1];
            $lng_seconds = $lng_seconds_a[0] / $lng_seconds_a[1];

            $lat = (float) $lat_degrees+((($lat_minutes*60)+($lat_seconds))/3600);
            $lng = (float) $lng_degrees+((($lng_minutes*60)+($lng_seconds))/3600);

            //If the latitude is South, make it negative. 
            //If the longitude is west, make it negative
            $GPSLatitudeRef  == 's' ? $lat *= -1 : '';
            $GPSLongitudeRef == 'w' ? $lng *= -1 : '';

            return array(
                'lat' => $lat,
                'lng' => $lng
            );
        }           
    }
    return false;
}






*/




echo 'POST';
if($_POST){
print_r($_POST);
}

echo 'Files';
print_r($_FILES);



if($_POST){
print($_POST);
}



//exit();

if (!$_FILES) exit();





 	$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
 	$this_vehicleid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vehicleid']));



	// Make wefinancehere folder #2
	if (!file_exists("../vehicles/photos/$thisdid")) {
		mkdir("../vehicles/photos/$thisdid", 0777, true);
	}


	// Make wefinancehere folder #2
	if (!file_exists("../vehicles/photos/$thisdid/$this_vehicleid")) {
		mkdir("../vehicles/photos/$thisdid/$this_vehicleid", 0777, true);
	}
	
	// Make Dudes Media Folder
	if (!file_exists("../vehicles/photos/$thisdid/$this_vehicleid/thumbs")) {
		mkdir("../vehicles/photos/$thisdid/$this_vehicleid/thumbs", 0777, true);
	}



	$fileupload = $_FILES['file']['name'][0];


	$count_files = count($_FILES['file']['name']);
	
	

	for($i=0; $i <= $count_files; $i++) 
	{
							


	if($i == $count_files) exit();


	$fileupload = $_FILES['file']['name'][$i];

	$fileupload=str_replace(" ","_",$fileupload);// Add _ inplace of blank space in file name, you can remove this line
	$fileupload=str_replace("'","_",$fileupload);// Add _ inplace of ' space in file name, you can remove this line
	$fileupload=str_replace("/","_",$fileupload);// Add _ inplace of / space in file name, you can remove this line
	$fileupload=str_replace(">","_",$fileupload);// Add _ inplace of > space in file name, you can remove this line
	$fileupload=str_replace("<","_",$fileupload);// Add _ inplace of < space in file name, you can remove this line
	$fileupload=str_replace("=","_",$fileupload);// Add _ inplace of = space in file name, you can remove this line

	
	
	
	
	$fileType = $_FILES['file']['type'][$i];
    $fileSize = $_FILES['file']['size'][$i];

    //echo 'Well: '.$_FILES['file']['tmp_name'][$i];        //3

    $tempFile_path = $_FILES['file']['tmp_name'][$i];        //3
	
	$fileupload = "$fileupload";
	$tempFile = "$tempFile_path";
	
	list($vphotowidth, $vphotoheight) = getimagesize($_FILES['file']['tmp_name']["$i"]);
    //echo $vphotowidth; 
    //echo $vphotoheight;
	
      
	$photo_file_path = "../vehicles/photos/$thisdid/$this_vehicleid/$fileupload";
	
	$photo_thumb_fpath = "../vehicles/photos/$thisdid/$this_vehicleid/thumbs/$fileupload";



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `vehicles` WHERE `vehicles`.`vid` = '$this_vehicleid' LIMIT 1";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_array($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);
//Grabbing the vin processing on server for mysql
$vehicleVin = $row_find_vehicle['vvin'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_photos = "SELECT * FROM `vehicle_photos` WHERE `vehicle_photos`.`vehicle_id` = '$this_vehicleid' ORDER BY `sort_orderno` ASC,`v_photoid` DESC";
$find_vehicle_photos = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photos);
$row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos);
$totalRows_find_vehicle_photos = mysqli_num_rows($find_vehicle_photos);

$v_photoid = $row_find_vehicle_photos['v_photoid'];
$found_vehicle_id = $row_find_vehicle_photos['vehicle_id'];

if($totalRows_find_vehicle_photos == 0){
$totalRows_find_vehicle_photos = $totalRows_find_vehicle_photos++;
}
	//chdir(dirname(__FILE__));

    move_uploaded_file($tempFile_path, $photo_file_path); //6
	//move_uploaded_file($tempFile,$photo_file_path);
	




	if($totalRows_find_vehicle_photos  == 0){
	
		$save_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
								    `vphoto_count` = '$totalRows_find_vehicle_photos',
									`vthubmnail_file` = '$fileupload',
									`vthubmnail_file_path` = '$photo_file_path'
								WHERE
									`vid` = '$this_vehicleid'
									";
		$result_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql);
	
	}





	$upload_dudes_photos_sql = "INSERT INTO `idsids_idsdms`.`vehicle_photos` SET
								`sort_orderno` = '$totalRows_find_vehicle_photos',
								`vehicle_id` = '$this_vehicleid',
								`dealer_id` = '$thisdid',
								`photo_dudes_id` = '$dudesid',
								`vehicleVin` = '$vehicleVin',
								`photo_file_name` = '$fileupload',
								`photo_file_path` = '$photo_file_path',
								`photo_file_width` = '$tkey',
								`photo_file_height` = '$vphotowidth',
								`photo_thumb_fname` = '$vphotoheight',
								`photo_thumb_fpath` = '$myname',
								`v_caption` = 'Photo #$totalRows_find_vehicle_photos'
								";
								
								
	
    
	$ran_upload_dudes_photos_sql = mysqli_query($idsconnection_mysqli, $upload_dudes_photos_sql);

	if($i == $count_files){ 
	
	$new_photocount = ($totalRows_find_vehicle_photos + $count_files);

		$vphoto_count_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
								    `vphoto_count` = '$new_photocount',
								WHERE
									`vid` = '$this_vehicleid'
									";
		$vphoto_count_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $vphoto_count_vehicle_thumbnail_sql);

	exit();
	}


}



?>