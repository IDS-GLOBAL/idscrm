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
$thesql = "SELECT vehicles.vid, vehicles.did, vehicles.vvin, vehicles.importHomnetPhotos, vehicles.vlivestatus, vehicles.vthubmnail_file, vehicles.vthubmnail_file_path, vehicles.modified_at, vehicles.homenetLastSent FROM `idsids_idsdms`.`vehicles` WHERE vehicles.vlivestatus = 1 AND vehicles.importHomnetPhotos IS NOT NULL ORDER BY vehicles.vid DESC";

$mysql = "SELECT vehicles.vid, vehicles.did, vehicles.vvin, vehicles.importHomnetPhotos, vehicles.vlivestatus, vehicles.vthubmnail_file, vehicles.vthubmnail_file_path, vehicles.modified_at, vehicles.homenetLastSent FROM `idsids_idsdms`.`vehicles` WHERE vehicles.vlivestatus = 1 AND vehicles.importHomnetPhotos IS NOT NULL ORDER BY vehicles.vid ASC LIMIT 5";

$mytestsql = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE vehicles.importHomnetPhotos IS NOT NULL AND vehicles.vid = '2838'";

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_vin4photos = "$thesql";
$query_vin4photos = mysqli_query($idsconnection_mysqli, $query_query_vin4photos);
$row_query_vin4photos = mysqli_fetch_assoc($query_vin4photos);
$totalRows_query_vin4photos = mysqli_num_rows($query_vin4photos);

?>
<?php


function get_Datetime_Now() {
	$tz_object = new DateTimeZone('America/New_York');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	//return $datetime->format('Y\-m\-d\ h:i:s');
	return $datetime->format('Y\/m\/d\ ');

}

$timevar = get_Datetime_Now();


//This is used For Dating the files from last sent.
$now = get_Datetime_Now();

/*	This Script Is To Create Vehicle Photos From The Vehicles Table.
*	1. Query Vehicles With Homenet Values
*	2. Loop Through All Existing Vehicle With Homenet Photos
*	3. Parse Columns into An Array define as ncessary.
*	4. Find Vehicle Photos That Match First Parse [0]
*	5. Update Vehicle Photo if exist by Vid , Vin, and Imported Photo Name
*	6. Insert Vehicle Photo Url, Insert VID, Insert Vin If Don't Exist
*	7. Keep Looping Through Script Until All Vehicle Photos Have Been Processed .
*	






do {

	//LOOP ME!!

} while ($row_query_vin4photos = mysqli_fetch_assoc($query_vin4photos));

*/


			//include('resize-class.php');











do {




	 set_time_limit(0);
	 
					echo $vid = $row_query_vin4photos['vid'];
					$did = $row_query_vin4photos['did'];
					$vvin = $row_query_vin4photos['vvin'];
					$vpicture = $row_query_vin4photos['vthubmnail_file'];
					$vpicturePath = $row_query_vin4photos['vthubmnail_file_path'];

					$vphotos = $row_query_vin4photos['importHomnetPhotos'];
					$vphotoArrays = preg_split("/,/", "$vphotos");
					$vphotoCount = count($vphotoArrays);
					
					$photo1 = $vphotoArrays['0'];
					
					
					//Very Import Time Stamp
					$was = $row_query_vin4photos['homenetLastSent'];

					include('inc/makethumbnail2.php');
					//include('inc/makethumbnail.php');					
					
					//This Loops Through All The Photos
					//Retruns An Array Of All Photos From Homenet Photo Column
					for($i=0;$i<count($vphotoArrays); $i++) 
					{
							// For Loop Begins
							echo $i.'<br>';
							$photo2 = $vphotoArrays["$i"];
							
							
							$filenameRemote = $photo2;
							$filenameRemote = str_replace("https://","http://",$filenameRemote);
							$thumbfolder = 'thumbs';
							$n=0;
							
								if($i>9){
									
									$e = $i.$n;
									
								}else{
									$e = $n.$i;	
								}
							
							$filenameRename = $e."_$vvin.jpg";
							$vphotoPath = '../vehicles/photos/'.$did.'/'.$vid.'/'."$filenameRename";
							$vthumbphotoPath = '../vehicles/photos/'.$did.'/'.$vid.'/'.$thumbfolder.'/'."$filenameRename";							
							
							//Copying Images To Server Path From This File Location
							$copyPathLG = "../../vehicles/photos/$did/$vid/$filenameRename";
							$copyPathSM = "../../vehicles/photos/$did/$vid/$thumbfolder/$filenameRename";
									
									
					
					//Query Database For Vehicles
					
					
						$findvphotosql = "SELECT * 
									FROM 
										`idsids_idsdms`.`vehicle_photos` 
									WHERE
										`vehicle_id` = '$vid'
									AND
										`impPhotoFilePath` = '$photo2'
									LIMIT 1";
					
					
						$findSQL = mysqli_query($idsconnection_mysqli, "$findvphotosql") 
											or die(mysql_error());
					
						$row_find = mysqli_fetch_assoc($findSQL);
						
						//Defining Vehicle Photo ID
						//NEW VEHICLE VID
						$photoexist = $row_find['impPhotoFilePath'];
						$vpid = $row_find['v_photoid'];

						//echo $find;

									if(!$vpid)
									{	
										//include('inc/createphoto.php');
										include('inc/createphoto2.php');
											
										echo 'createphoto.php Vehicle Photo'.$photo2;
										
										echo '<br>';
																
									}else{
																		
										include('inc/updatephoto2.php');
										//include('inc/updatephoto.php');										

										echo "updatephoto.php Found $vid For $did And Now Updating Vehicle Photos With- ".$photo2;
										
										echo '<br>';																
									
									}
			

/*
					$AgetHeaders9 = @get_headers("$photoexist");

					if (preg_match("|200|", $AgetHeaders9[0])) 
					
						{
			
			
			
						}

*/


					}

} while ($row_query_vin4photos = mysqli_fetch_assoc($query_vin4photos));












?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Process Homenet Photos</title>
</head>

<body>
<!-- img src="https://content.homenetiol.com/2000142/2065138/640x480/a07c162e850f4f6ea67c3c69740a1c6f.jpg" -->

<?php echo 'Finished At: '.$now; ?>

</body>
</html>
<?php
mysqli_free_result($query_vin4photos);
?>
