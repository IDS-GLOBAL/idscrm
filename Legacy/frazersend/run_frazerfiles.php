<?php




$query_frazerdms_vehicles = "SELECT * FROM `idsids_fazerdms`.`frazer_vehicles` WHERE `frazer_vehicles`.`vehicle_frazer_id` = '$newidsfrazerno'";
$frazerdms_vehicles = mysqli_query($frazerdms_mysqli, $query_frazerdms_vehicles);
$row_frazerdms_vehicles = mysqli_fetch_assoc($frazerdms_vehicles);
$totalRows_frazerdms_vehicles = mysqli_num_rows($frazerdms_vehicles);




function installphotos($vphotos, $frazervid, $vin){

global $thedid;
global $frazerid;
global $log;
global $idsconnection_mysqli;
global $frazerdms_mysqli;

$vin = mysqli_real_escape_string($idsconnection_mysqli, $vin);

/*
$findVehicleSql = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE vehicles.vvin = '$vin'";
						$findSQL = mysqli_query($idsconnection_mysqli, $findVehicleSql) 
											or die(mysql_error());

						$row_findVehicleSql = mysqli_fetch_assoc($findVehicleSql);

						
						//$vid = ''
*/

						$findvphotosql = "SELECT * 
									FROM 
										`idsids_idsdms`.`vehicles` 
									WHERE
										`vehicles`.`vvin` = '$vin'
									LIMIT 1";
					
					
						$findvphotos = mysqli_query($idsconnection_mysqli, $findvphotosql);


						$row_findvphotos = mysqli_fetch_assoc($findvphotos);
						
						
						$vid = $row_findvphotos['vid'];
						$vthubmnail_file = $row_findvphotos['vthubmnail_file'];
						$vthubmnail_file_path = $row_findvphotos['vthubmnail_file_path'];
						
						if(!$vid) exit;
						if(!$thedid) exit;


	//echo $vphotos;
	//echo 'Vid: '.$vid;

			$vphotoArrays = preg_split("/\|/", "$vphotos");
			//print_r($vphotoArrays);
			
					$vphotoCount = count($vphotoArrays);
					
					$photo1 = $vphotoArrays['0'];

					for($i=0;$i<count($vphotoArrays); $i++) 
					{
							// For Loop Begins

							$photo = $vphotoArrays["$i"];

					
						$findvphotosql = "SELECT * 
									FROM 
										`idsids_idsdms`.`vehicle_photos` 
									WHERE
										`vehicle_id` = '$vid'
									AND
										`photo_file_name` = '$photo'
									LIMIT 1";
					
					
						$findSQL = mysqli_query($idsconnection_mysqli, $findvphotosql);
					
						$row_find = mysqli_fetch_assoc($findSQL);
						
						//Defining Vehicle Photo ID
						//NEW VEHICLE VID
						$thumbfolder = 'thumbs';

						$photoexist = $row_find['photo_file_name'];
						$vpid = $row_find['v_photoid'];

						$vphotoPath = '../vehicles/photos/'.$thedid.'/'.$vid.'/'.$photo;
						
						$vthumbphotoPath = '../vehicles/photos/'.$thedid.'/'.$vid.'/'.$thumbfolder.'/'.$photo;							

						$dealer_folder = "../vehicles/photos/$thedid";
						$dealer_folder_vfolder = "../vehicles/photos/$thedid/$vid";
						$dealer_folder_vfolder_thumbs = "../vehicles/photos/$thedid/$vid/thumbs";

						if (!file_exists($dealer_folder)) {
						chdir(dirname(__FILE__));
						mkdir("$dealer_folder", 0777, true);
						}
						if (!file_exists($dealer_folder_vfolder)) {
						chdir(dirname(__FILE__));
						mkdir("$dealer_folder_vfolder", 0777, true);
						}

						if (!file_exists($dealer_folder_vfolder_thumbs)) {
						chdir(dirname(__FILE__));
						mkdir("$dealer_folder_vfolder_thumbs", 0777, true);
						}

						$frazer_photo = "../frazerpush/$frazerid/photos/$photo";
						
						
						$log .= 'Frazer Photo: '.$frazer_photo.'<br />';
						
						if (file_exists($frazer_photo)) {
							
							chdir(dirname(__FILE__));	
							@copy($frazer_photo, $vphotoPath);

							chdir(dirname(__FILE__));
							@copy($vphotoPath, $vthumbphotoPath);
							
							$log .= 'Frazer Photo File Exist'.'<br />';
					
							$log .= 'Absouletely Yes'.'<br />';
							
						}else{
							
							$log .= 'Sorry Frazer Photo Files Does Not Exist';

							
						}



						if($i == 0){


						$updatevehiclephoto = "UPDATE `idsids_idsdms`.`vehicles`  SET
												`vphoto_count` = '$vphotoCount',
												`vthubmnail_file` = '$photo',
												`vthubmnail_file_path` = '$vthumbphotoPath'
												WHERE `vid` = '$vid'
												";

								$result_updatevehiclephoto = mysqli_query($idsconnection_mysqli, $updatevehiclephoto);

						}




						if(!$vpid){
						$installphoto = "INSERT INTO `idsids_idsdms`.`vehicle_photos`  SET
												`vehicle_id` = '$vid',
												`sort_orderno` = '$i',
												`dealer_id` = '$thedid',
												`vehicleVin` = '$vin',
												`photo_file_name` = '$photo',
												`photo_file_path` = '$vphotoPath',
												`impPhotoFilePath` = '$frazer_photo',
												`photo_thumb_fname` = '$photo',
												`photo_thumb_fpath` = '$vthumbphotoPath',
												`v_caption` = 'Photo: $i'
											";
								$installphotoSQL = mysqli_query($idsconnection_mysqli, $installphoto);
											
											
						
						}else{

						$updatephoto = "UPDATE `idsids_idsdms`.`vehicle_photos`  SET
												`vehicle_id` = '$vid',
												`sort_orderno` = '$i',
												`dealer_id` = '$thedid',
												`vehicleVin` = '$vin',
												`photo_file_name` = '$photo',
												`photo_file_path` = '$vphotoPath',
												`impPhotoFilePath` = '$frazer_photo',
												`photo_thumb_fname` = '$photo',
												`photo_thumb_fpath` = '$vthumbphotoPath',
												`v_caption` = 'Photo: $i'
												WHERE `v_photoid` = '$vpid'
												";

								$updatephoto = mysqli_query($idsconnection_mysqli, $updatephoto);
											

							}





					}
	
	
	

	return;

}






function installvehicles($vehicle_vin, $vehicle_condition, $vehicle_year, $vehicle_make, $vehicle_model, $vehicle_trim, $vehicle_vin, $vehicle_stock , $vehicle_mileage, $vehicle_exterior_color, $vehicle_interior_color, $vehicle_engine, $vehicle_body, $vehicle_type, $vehicle_transm, $vehicle_drivetrain, $vehicle_cylinders, $vehicle_comments, $vehicle_bulkoptions, $vehicle_certified, $vehicle_mpg_city, $vehicle_mpg_hwy, $vehicle_mpg_combined, $vehicle_rprice, $vehicle_iprice, $vehicle_dprice, $vehicle_dpack, $vehicle_dvcost, $vehicle_daysonlot, $vehicle_purchase_date, $vehicle_photos, $vehicle_update_on, $vehicle_created_at ){
	

global $thedid;
global $frazerid;
global $log;
global $idsconnection_mysqli;


	//echo 'VIN: '.$vin;

	    $tokey = substr(md5(rand(0,9999999)),0,20);
		
		$tokenkey = mysqli_real_escape_string($idsconnection_mysqli, trim($tokey));


$database_idsconnection = "idsids_idsdms";
$thevinsql = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vvin` = '$vehicle_vin' ORDER BY `vehicles`.`vid` DESC";
$query_query_vin= "$thevinsql";
$query_vin = mysqli_query($idsconnection_mysqli, $query_query_vin);
$row_query_vin = mysqli_fetch_assoc($query_vin);
$totalRows_query_vin= mysqli_num_rows($query_vin);


$vehicle_bulkoptions = str_replace('|', ',', $vehicle_bulkoptions);

$vehicle_bulkoptions = mysqli_real_escape_string($idsconnection_mysqli, $vehicle_bulkoptions);

$theidsvid = $row_query_vin['vid'];

$newfrazerLastSent = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));


	if($totalRows_query_vin== 0){
		// Insert Vehicle

			$log .= "Creating Vehicle vid: $theidsvid".'<br />';;
		
						$installvehicle = "INSERT INTO `idsids_idsdms`.`vehicles`  SET
												`did` = '$thedid',
												`vtoken` = '$tokenkey',
												`vlivestatus` = '1',
												`vDateInStock` = '$vehicle_purchase_date',
												`vyear` = '$vehicle_year',
												`vmake` = '$vehicle_make',
												`vmodel` = '$vehicle_model',
												`vtrim` = '$vehicle_trim',
												`vvin` = '$vehicle_vin',
												`vcondition` = '$vehicle_condition',
												`vcertified` = '$vehicle_certified',
												`vstockno` = '$vehicle_stock',
												`vmileage` = '$vehicle_mileage',
												`vpurchasecost` = '$vehicle_dvcost',
												`vdlrpack` = '$vehicle_dpack',
												`vrprice` = '$vehicle_rprice',
												`vdprice` = '$vehicle_dprice',
												`vspecialprice` = '$vehicle_iprice',
												`vecolor_txt` = '$vehicle_exterior_color',
												`vicolor_txt` = '$vehicle_interior_color',
												`vbody` = '$vehicle_type',
												`vdoors` = '$vehicle_body',
												`vehicleOptionsBulk` = '$vehicle_bulkoptions',
												`vcomments` = '$vehicle_comments',
												`frazerid` = '$frazerid',
												`frazerLastSent` = '$newfrazerLastSent',
												`vcylinders` = '$vehicle_cylinders',
												`vtransm` = '$vehicle_transm',
												`vehicle_mpg_city` = '$vehicle_mpg_city',
												`vehicle_mpg_hwy` = '$vehicle_mpg_hwy',
												`vehicle_mpg_combined` = '$vehicle_mpg_combined'
											";
								
								$insertVehicleSQL = mysqli_query($idsconnection_mysqli, $installvehicle);


		}else{
			

						// Update Vehicle
						$log .= "Updating Vehicle vid: $theidsvid".'<br />';
				
						if($suboneday <= $vehicle_update_on){
							
								
									$log .= "Marking LIVE".'<br />';
				
									$vlivestatus = '1';
				
							}else{
							
									$log .= "Marking Sold".'<br />';
				
									$vlivestatus = '9';
				
						}



//     	Removing update live status
//    	`vlivestatus` = '1',
//		`vlivestatus` = '$vlivestatus',  Removed after did on 11-26-2017

						$updatingIDSvehicle = "UPDATE `idsids_idsdms`.`vehicles`  SET
												`did` = '$thedid',
												`vDateInStock` = '$vehicle_purchase_date',
												`vyear` = '$vehicle_year',
												`vmake` = '$vehicle_make',
												`vmodel` = '$vehicle_model',
												`vtrim` = '$vehicle_trim',
												`vvin` = '$vehicle_vin',
												`vcondition` = '$vehicle_condition',
												`vcertified` = '$vehicle_certified',
												`vstockno` = '$vehicle_stock',
												`vmileage` = '$vehicle_mileage',
												`vpurchasecost` = '$vehicle_dvcost',
												`vdlrpack` = '$vehicle_dpack',
												`vrprice` = '$vehicle_rprice',
												`vdprice` = '$vehicle_dprice',
												`vspecialprice` = '$vehicle_iprice',
												`vecolor_txt` = '$vehicle_exterior_color',
												`vicolor_txt` = '$vehicle_interior_color',
												`vbody` = '$vehicle_type',
												`vdoors` = '$vehicle_body',
												`vehicleOptionsBulk` = '$vehicle_bulkoptions',
												`vcomments` = '$vehicle_comments',
												`frazerid` = '$frazerid',
												`frazerLastSent` = '$newfrazerLastSent',
												`vcylinders` = '$vehicle_cylinders',
												`vtransm` = '$vehicle_transm',
												`vehicle_mpg_city` = '$vehicle_mpg_city',
												`vehicle_mpg_hwy` = '$vehicle_mpg_hwy',
												`vehicle_mpg_combined` = '$vehicle_mpg_combined'
												WHERE 
												`vehicles`.`vid` = '$theidsvid'
											";


								$updatingIDSvehicleSQL = mysqli_query($idsconnection_mysqli, $updatingIDSvehicle);

	}
	
	return $log;
	return;


}




 do {

//echo 'Dealer Id: '.$thedid;

	$vehicle_id =  $row_frazerdms_vehicles['vehicle_id']; 
	$vehicle_condition = $row_frazerdms_vehicles['vehicle_condition']; 
	$vehicle_year =   $row_frazerdms_vehicles['vehicle_year'];
		$vehicle_make =   $row_frazerdms_vehicles['vehicle_make'];
			$vehicle_model =   $row_frazerdms_vehicles['vehicle_model'];
				$vehicle_trim =   $row_frazerdms_vehicles['vehicle_trim'];
					$vehicle_vin =   $row_frazerdms_vehicles['vehicle_vin'];
					
					//Function To Split Vin

					
					
					
					
$vehicle_stock =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_stock']));
$vehicle_mileage =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_mileage']));
$vehicle_exterior_color =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_exterior_color']));
$vehicle_interior_color =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_interior_color']));
$vehicle_engine =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_engine']));
$vehicle_body =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_body']));

$vehicle_type =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_type']));
$vehicle_transm =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_transm']));
$vehicle_drivetrain =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_drivetrain']));
$vehicle_cylinders = mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_cylinders']));
$vehicle_comments =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_comments']));
$vehicle_bulkoptions =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_bulkoptions']));
$vehicle_certified = mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_certified']));
$vehicle_mpg_city =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_mpg_city']));
$vehicle_mpg_hwy =  mysqli_real_escape_string($idsconnection_mysqli, trim( $row_frazerdms_vehicles['vehicle_mpg_hwy']));
$vehicle_mpg_combined =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_mpg_combined']));
$vehicle_rprice =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_rprice']));
$vehicle_iprice =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_iprice']));
$vehicle_dprice =   mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_dprice']));
$vehicle_dpack =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_dpack']));
$vehicle_dvcost = mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_dvcost']));
$vehicle_daysonlot = mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_daysonlot']));
$vehicle_purchase_date =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_purchase_date']));
$vehicle_photos =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_photos']));


$vehicle_update_on =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_update_on']));
$vehicle_created_at =  mysqli_real_escape_string($idsconnection_mysqli, trim($row_frazerdms_vehicles['vehicle_created_at']));
											
											

											// $vFeedStatusLckd = $row_frazerdms_vehicles['vFeedStatusLckd'];
											// || $vFeedStatusLckd == 1


//installvehicles($vehicle_vin, $vehicle_condition);
if(!$vehicle_vin || !$vehicle_model  ){}else{
installvehicles($vehicle_vin, $vehicle_condition, $vehicle_year, $vehicle_make, $vehicle_model, $vehicle_trim, $vehicle_vin, $vehicle_stock , $vehicle_mileage, $vehicle_exterior_color, $vehicle_interior_color, $vehicle_engine, $vehicle_body, $vehicle_type, $vehicle_transm, $vehicle_drivetrain, $vehicle_cylinders, $vehicle_comments, $vehicle_bulkoptions, $vehicle_certified, $vehicle_mpg_city, $vehicle_mpg_hwy, $vehicle_mpg_combined, $vehicle_rprice, $vehicle_iprice, $vehicle_dprice, $vehicle_dpack, $vehicle_dvcost, $vehicle_daysonlot, $vehicle_purchase_date, $vehicle_photos, $vehicle_update_on, $vehicle_created_at);
}

if(!$vehicle_photos){
	
	}else{

	installphotos($vehicle_photos, $vehicle_id, $vehicle_vin);
}
											
											
											

} while ($row_frazerdms_vehicles = mysqli_fetch_assoc($frazerdms_vehicles)); 







function markidsvehicles_sold_orlive($suboneday, $vehicle_update_on, $soldvehicles_vehicle_id, $sold_vehicle_vin){

global $thedid;
global $frazerid;
global $database_idsconnection;
global $database_frazerdms;
global $log;
global $suboneday;
global $frazerdms_mysqli;
global $idsconnection_mysqli;




						$findsold_vehiclesql = "SELECT * 
									FROM 
										`idsids_idsdms`.`vehicles` 
									WHERE
										`vvin` = '$sold_vehicle_vin'
										AND
										`did` = '$thedid'
									LIMIT 1";
					
					
						$query_findsold_vehiclesql = mysqli_query($idsconnection_mysqli, $findsold_vehiclesql);
											


						$row_findsold_vehiclesql = mysqli_fetch_assoc($query_findsold_vehiclesql);
						
						
						$sold_vehicle_id = $row_findsold_vehiclesql['vid'];



				if($suboneday <= $vehicle_update_on){
				$log .= "Marking $sold_vehicle_id LIVE because of  $vehicle_update_on ".'<br />';				
				$soldvehicles_vlivestatus = '1';
					}else{
				$log .= "Marking $sold_vehicle_id Sold because of $vehicle_update_on ".'<br />';				
				$soldvehicles_vlivestatus = '9';
				}

			$run_frazer_sold_sql = "UPDATE `idsids_idsdms`.`vehicles`  SET
												`vlivestatus` = '$soldvehicles_vlivestatus'
												WHERE `vehicles`.`vid` = '$sold_vehicle_id'
												";
			$query_run_frazer_sol_sql = mysqli_query($idsconnection_mysqli, $run_frazer_sold_sql);

	return $log;
	
	
return;
}


//////////////////////////////This is the Sold Section LOOPING //////////////////

$query_frazerdms_soldvehicles = "SELECT * FROM `idsids_fazerdms`.`frazer_vehicles` WHERE `frazer_vehicles`.`vehicle_frazer_id` = '$newidsfrazerno'";
$frazerdms_soldvehicles = mysqli_query($frazerdms_mysqli, $query_frazerdms_soldvehicles);
$row_frazerdms_soldvehicles = mysqli_fetch_assoc($frazerdms_soldvehicles);
$totalRows_frazerdms_soldvehicles = mysqli_num_rows($frazerdms_soldvehicles);


do {


	$vehicle_update_on = $row_frazerdms_soldvehicles['vehicle_update_on'];
	$soldvehicles_vehicle_created_at = $row_frazerdms_soldvehicles['vehicle_created_at'];
	$soldvehicles_vehicle_id = $row_frazerdms_soldvehicles['vehicle_id'];
	$sold_vehicle_vin = $row_frazerdms_soldvehicles['vehicle_vin'];

	markidsvehicles_sold_orlive($suboneday, $vehicle_update_on, $soldvehicles_vehicle_id, $sold_vehicle_vin);


} while ($row_frazerdms_soldvehicles = mysqli_fetch_assoc($frazerdms_soldvehicles)); 





?>