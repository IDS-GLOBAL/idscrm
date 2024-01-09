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




if (!$_FILES) exit();








	// Make Dudes Media Folder
	if (!file_exists("../vehicles/photos/media/")) {
		mkdir("../vehicles/photos/media/", 0777, true);
	}

	// Make Dudes Media Folder
	if (!file_exists("../vehicles/photos/media/$dudesid/")) {
		mkdir("../vehicles/photos/media/$dudesid/", 0777, true);
	}

	// Make Dudes Sub Media Folder Folder
	if (!file_exists("../vehicles/photos/media/$dudesid/media/")) {
		mkdir("../vehicles/photos/media/$dudesid/media/", 0777, true);
	}

	// Make Dudes Sub Media Folder And Dues Associated Media Folder
	if (!file_exists("../vehicles/photos/media/$dudesid/media/$dudesid")) {
		mkdir("../vehicles/photos/media/$dudesid/media/$dudesid", 0777, true);
	}

	// Make Dudes Sub Media Folder And Dues Associated Media Folder
	if (!file_exists("../vehicles/photos/media/$dudesid/media/$dudesid/thumbs")) {
		mkdir("../vehicles/photos/media/$dudesid/media/$dudesid/thumbs", 0777, true);
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
	
      
	$photo_file_path = "../vehicles/photos/media/$dudesid/media/$dudesid/$fileupload";
	
	$photo_thumb_fpath = "../vehicles/photos/media/$dudesid/media/$dudesid/thumbs/$fileupload";


mysql_select_db($database_tracking, $tracking);
$query_find_dudes_photos = "SELECT * FROM `dudes_mediaphotos` WHERE `dudes_mediaphotos`.`dudesid_dudesid` = '$dudesid' ORDER BY `dudesid_photo_sort_orderno` ASC,`dudesid_photo_dudes_id` DESC";
$find_dudes_photos = mysqli_query($idsconnection_mysqli, $query_find_dudes_photos, $tracking);
$row_find_dudes_photos = mysqli_fetch_array($find_dudes_photos);
$totalRows_find_dudes_photos = mysqli_num_rows($find_dudes_photos);

$dudesid_photo_dudes_id = $row_find_dudes_photos['dudesid_photo_dudes_id'];


	//chdir(dirname(__FILE__));

    move_uploaded_file($tempFile_path, $photo_file_path); //6
	//move_uploaded_file($tempFile,$photo_file_path);
	

$dudesid_photo_open_url = "https://images.autocitymag.com/media/$dudesid/media/$dudesid/$fileupload";


	if($totalRows_find_dudes_photos  == 0){
	
		$save_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`dudes` SET
								    `dudes_public_img_openurl` = '$dudesid_photo_open_url',
									`dudes_public_image_filename` = '$fileupload',
									`dudes_public_image_filepath` = '$photo_file_path'
								WHERE
									`dudes_id` = '$dudesid'
									";
		$result_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql, $tracking);
	
	}





	$upload_dudes_photos_sql = "INSERT INTO `idsids_tracking_idsvehicles`.`dudes_mediaphotos` SET
								`dudesid_photo_teamid` = '$dudes_team_id',
								`dudesid_dudesid` = '$dudesid',
								`dudesid_photo_byip` = '$ip',
								`dudesid_photo_bymobile` = '$mobiledevice',
								`dudesid_photo_bybrowser` = '$browser',
								`dudesid_photo_token` = '$tkey',
								`dudesid_photo_album_token` = '$tkey',
								`dudesid_photo_file_width` = '$vphotowidth',
								`dudesid_photo_file_height` = '$vphotoheight',
								`dudesid_photo_sort_orderno` = '$totalRows_find_dudes_photos',
								`dudesid_photo_added_bywho` = '$myname',
								`dudesid_photo_datetaken` = '$server_time',
								`dudesid_photo_open_url` = '$dudesid_photo_open_url',
								`dudesid_photo_status` = '1',
								`dudesid_photo_file_name` = '$fileupload',
								`dudesid_photo_file_path` = '$photo_file_path',
								`dudesid_photo_thumb_fname` = '$photo_thumb_fpath',
								`dudesid_photo_caption` = 'Photo $totalRows_find_dudes_photos'
								";
								
								

    
	$ran_upload_dudes_photos_sql = mysqli_query($idsconnection_mysqli, $upload_dudes_photos_sql, $tracking);

	if($i == $count_files) exit();


}



?>