<?php include("db_loggedin.php"); ?>
<?php


// *** Include the class
@include("resize-class.php");


 
$ds          = DIRECTORY_SEPARATOR;  //1

//Save To New Variable Before Auto Increment
//$totalvehicle_photos = $totalRows_find_vehicle_photos;

// Autoincrment Vehicle Photo Count Before Insert.
//$totalRows_find_vehicle_photos++;

echo 'hello';

echo '<br />';

echo 'Im Ready';



if (!empty($_FILES)) {

echo 'Im About To Print';

echo '<br />';


print_r($_FILES);

	if(!$_GET['did']) exit;
	if(!$_GET['sid']) exit;
	if(!$_GET['vid']) exit;


 	$thisdid = mysql_real_escape_string(trim($_GET['did']));
 	$thissid = mysql_real_escape_string(trim($_GET['sid']));
 	$thisvid = mysql_real_escape_string(trim($_GET['vid']));


exit;
	// If File Has Not Extension is a valid mime type
	
	
	
	
	// Create A Media Folder Variable
	$medial_folder ="media";

	// Make Dealer Folder
	if (!file_exists("../vehicles/photos/$thisdid/")) {
		mkdir("../vehicles/photos/$thisdid", 0777, true);
	}

	// Make Media Folder
	if (!file_exists("../vehicles/photos/$thisdid/$medial_folder/")) {
		mkdir("../vehicles/photos/$thisdid/$medial_folder/", 0777, true);
	}


	// Make Media Sales Person Folder
	if (!file_exists("../vehicles/photos/$thisdid/$medial_folder/$thissid/")) {
		mkdir("../vehicles/photos/$thisdid/$medial_folder/$thissid/", 0777, true);
	}

	// Make Vehicle Thumbnail Folder
	if (!file_exists("../vehicles/photos/$thisdid/$medial_folder/$thissid/thumbs/")) {
		mkdir("../vehicles/photos/$thisdid/$medial_folder/$thissid/thumbs/", 0777, true);
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
	list($vphotowidth, $vphotoheight) = getimagesize($filename);
    //echo $vphotowidth; 
    //echo $vphotoheight;
	
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
	
	$photo_file_path = ".../vehicles/photos/$thisdid/$medial_folder/$thissid/$fileupload";
	
	$photo_thumb_fpath = "../vehicles/photos/$thisdid/$medial_folder/$thissid/thumbs/$fileupload";

    //move_uploaded_file($tempFile,$targetFile); //6
	
    move_uploaded_file($tempFile,$photo_file_path); //6
	//move_uploaded_file($tempFile,$photo_file_path);
	
	chdir(dirname(__FILE__));

	
	
    //$uploadsql = "INSERT INTO uploads (Filename, description, Type, Size)
    //              VALUES ('$fileupload', 'test uploads', '$fileType', '$fileSize')";
	$sid_photo_thumb_fname = $photo_file_path;
	$sid_photo_thumb_fpath = $photo_thumb_fpath;


	$uploadsql = "INSERT INTO `idsids_idsdms`.`sales_person_photos` SET
								`sid_photo_sid` = '$sid_photo_sid',
								`sid_photo_did` = '$thisdid',
								`sid_photo_likes` = '0',
								`sid_photo_abuses` = '0',
								`sid_photo_albumname` = '$albumname',
								`sid_photo_albumcomments` = '$albumcomments',
								`sid_photo_datetaken` = '$photodatetaken',
								`sid_photo_sort_orderno` = '$sid_photo_sort_orderno',
								`sid_photo_added_bywho` = 'by Dealer $dealer_email Account',
								`sid_photo_token` = '$sid_photo_token',
								`sid_photo_file_name` = '$sid_photo_file_name',
								`sid_photo_file_path` = '$sid_photo_file_path',
								`sid_photo_file_width` = '$sid_photo_file_width',
								`sid_photo_file_height` = '$sid_photo_file_height',
								`sid_photo_thumb_fname` = '$sid_photo_thumb_fname',
								`sid_photo_thumb_fpath` = '$sid_photo_thumb_fpath',
								`sid_photo_caption` = 'Photo $totalRows_find_sales_person_photos',
								`sid_photo_created_at` = CURRENT_TIMESTAMP
								";
								
								

    
	$result_uploadsql = mysqli_query($idsconnection_mysqli, $uploadsql);


	//Update Vehicle With First Photo As A Thumbnail, After Insert Which The First Photo Should Be Thumbnail
	if($totalvehicle_photos == 0){
	
		$save_vehicle_thumbnail_sql = "UPDATE `idsids_idsdms`.`sales_person` SET
									`profile_image` = '$photo_file_path'
								WHERE
									`salesperson_id` = '$thissid'
									";
		$result_save_vehicle_thumbnail_sql = mysqli_query($idsconnection_mysqli, $save_vehicle_thumbnail_sql);
	
	}

		//You Need To Include A Progress Bar While the User is uploading.

	// *** Define Main & Resize Here Photo Variable Her For Renaming Saved Image
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

?>