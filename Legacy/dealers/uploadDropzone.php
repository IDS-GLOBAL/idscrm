<?php require_once("db_loggedin.php"); ?>
<?php


// *** Include the class
@require_once("resize-class.php");


 
$ds          = DIRECTORY_SEPARATOR;  //1

//Save To New Variable Before Auto Increment
$totalvehicle_photos = $totalRows_find_vehicle_photos;

// Autoincrment Vehicle Photo Count Before Insert.
$totalRows_find_vehicle_photos++;





if (!empty($_FILES)) {

//print_r($_FILES);

	if(!$_GET['did']) exit;
	if(!$_GET['vid']) exit;


 	$thisdid = $_GET['did'];
 	$thisvid = $_GET['vid'];


	// Make Dealer Folder
	if (!file_exists("../vehicles/photos/$thisdid")) {
		mkdir("../vehicles/photos/$thisdid", 0777, true);
	}

	// Make Vehicle Folder
	if (!file_exists("../vehicles/photos/$thisdid/$thisvid")) {
		mkdir("../vehicles/photos/$thisdid/$thisvid", 0777, true);
	}

	// Make Vehicle Thumbnail Folder
	if (!file_exists("../vehicles/photos/$thisdid/$thisvid/thumbs/")) {
		mkdir("../vehicles/photos/$thisdid/$thisvid/thumbs/", 0777, true);
	}



	$storeFolder = 'dropzone';   //2

	$fileupload = basename( $_FILES['file']['name']);

	$fileupload=str_replace(" ","_",$fileupload);// Add _ inplace of blank space in file name, you can remove this line
	$fileupload=str_replace("'","_",$fileupload);// Add _ inplace of ' space in file name, you can remove this line
	$fileupload=str_replace("/","_",$fileupload);// Add _ inplace of / space in file name, you can remove this line
	$fileupload=str_replace(">","_",$fileupload);// Add _ inplace of > space in file name, you can remove this line
	$fileupload=str_replace("<","_",$fileupload);// Add _ inplace of < space in file name, you can remove this line
	$fileupload=str_replace("=","_",$fileupload);// Add _ inplace of = space in file name, you can remove this line

	
	
	
	
	$fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];
	
    $tempFile = $_FILES['file']['tmp_name'];          //3
	//list($vphotowidth, $vphotoheight) = getimagesize($filename);
    //echo $vphotowidth; 
    //echo $vphotoheight;
	
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
	
	$photo_file_path = "../vehicles/photos/$thisdid/$thisvid/$fileupload";
	
	$photo_thumb_fpath = "../vehicles/photos/$thisdid/$thisvid/thumbs/$fileupload";

    //move_uploaded_file($tempFile,$targetFile); //6
	
    move_uploaded_file($tempFile,$photo_file_path); //6
	//move_uploaded_file($tempFile,$photo_file_path);
	
	chdir(dirname(__FILE__));

	
	
    //$uploadsql = "INSERT INTO uploads (Filename, description, Type, Size)
    //              VALUES ('$fileupload', 'test uploads', '$fileType', '$fileSize')";
	$vvin = $row_find_vehicle['vvin'];

 	$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['did']));
 	$thisvid = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['vid']));



	$uploadsql = "INSERT INTO `idsids_idsdms`.`vehicle_photos` SET
								`sort_orderno` = '$totalRows_find_vehicle_photos', 
								`vehicle_id` = '$thisvid', 
								`dealer_id` = '$thisdid',
								`vehicleVin` = '$vvin',
								`photo_file_name` = '$fileupload', 
								`photo_file_path` = '$photo_file_path', 
								`photo_thumb_fname` = '$fileupload', 
								`photo_thumb_fpath` = '$photo_thumb_fpath', 
								`created_at` = CURRENT_TIMESTAMP, 
								`v_caption` = 'Photo $totalRows_find_vehicle_photos'
								";
/*
								`photo_file_width` = '$vphotowidth', 
								`photo_file_height` = '$vphotoheight', 
								
*/								

    
	$result_uploadsql = mysqli_query($idsconnection_mysqli, $uploadsql);


	//Update Vehicle With First Photo As A Thumbnail, After Insert Which The First Photo Should Be Thumbnail
	if($totalvehicle_photos == 0){
	
		$save_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
									`vthubmnail_file` = '$fileupload',
									`vthubmnail_file_path` = '$photo_file_path'
								WHERE
									`vid` = '$thisvid'
									";
		$result_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql);
	
	}

		//You Need To Include A Progress Bar While the User is uploading.

	// *** Define Main & Resize Here Photo Variable Her For Renaming Saved Image
	$img = 'idscrm';
	$origfileandname = $photo_file_path;
	$newtumbnailfileandpath = $photo_thumb_fpath;
	
	//$origfileandname = '../vehicles/photos/94/2611/1g2zf55b464252773-2006-pontiac-g6-4-door-sedan-used-sedan-decatur-ga.jpg';
	//$newtumbnailfileandpath = '../vehicles/photos/94/2611/thumbs/1g2zf55b464252773-2006-pontiac-g6-4-door-sedan-used-sedan-decatur-ga.jpg';
	
	$thumbfolder = 'thumbs';



	// *** 1) Initialise / load image
	$resizeObj = new resize("$origfileandname");

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(640, 480, 'exact');

	// *** 3) Save image
	$resizeObj -> saveImage("$origfileandname", 100);
	

	// *** 1) Initialise / load image
	//$resizeObj = new resize("$newtumbnailfileandpath");

	 //*** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(120, 90, 'exact');

	// *** 3) Save image
	$resizeObj -> saveImage("$newtumbnailfileandpath", 100);




}
//- See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.vblG28Rr.dpuf

include("inc.end.phpmsyql.php");
?>