<?php

echo "Making Thumbnail And Checking IF Sold $vid";

echo '<br>';





/*

 * 	Note: Name All photos vin_$1,  $i is counting. 

 * 	Does Homenet URL LINKS PROVIDE A REAL IMAGE? If So The Great Let's Go.

 * 

 *	1.  Check For Existing Photo File On Remote Server (Homenet).
 *	2.	Check For File Extension such as jpg. png. gif. etc.
 *	3.	If It Exist Then Copy File To Local Server Path (IDSCRM).
 *	4.	Rename File To Vin Number($vvin) On Local Server And It's Path.
 *	5.  Update vehicle Table With Thumnail Photo By ID And It's Path.
 *	6.  Update Existing vehicle_photos Table By Photo ID And It's File Name And Path.   
 * 	7.  If It don't Exist then Break.

 * 

 */



				//$did = '85';
				//$vid = '1546';
				//$vvin = 'W04GN5EC0B1113227';
				//$filenameRemote = $vphotoArrays['0'];  //Real
				//$filenameRemote ='https://content.homenetiol.com/1535/67052.jpg';  //Testing

				$filenameRemote = $photo1;  //Correct
				
				$filenameRemote = str_replace("https://","http://",$filenameRemote);
				$thumbfolder = 'thumbs';
				
				$filenameRename = '00'."_$vvin".'.jpg';
				$vphotoPath = '../vehicles/photos/'.$did.'/'.$vid.'/'."$filenameRename";
				$vthumbphotoPath = '../vehicles/photos/'.$did.'/'.$vid.'/'.$thumbfolder.'/'."$filenameRename";							
				
				//Copying Images To Server Path From This File Location
				$copyPathLG = "../../vehicles/photos/$did/$vid/$filenameRename";
				$copyPathSM = "../../vehicles/photos/$did/$vid/$thumbfolder/$filenameRename";


					




				//echo $filenameRemote;

				$oldfile = $photo1;
				$newfile = $copyPathSM;




				//$fileUrl = $oldfile;
				$fileUrl = $filenameRemote;



				
	
	$AgetHeaders = @get_headers("$fileUrl");


						
		
						// Make Dealer Folder
						if (!file_exists("../../vehicles/photos/$did")) {
							mkdir('../../vehicles/photos/$did', 0777, true);
							echo 'Made Dealer Folder';
						}
						// Make Dealer Folder
						if (!file_exists('../../vehicles/photos/$did/$vid')) {
							mkdir('.../../vehicles/photos/$did/$vid', 0777, true);
							echo 'Made Dealer Vehicle Folder';
						}
						// Make Dealer Folder
						if (!file_exists('../../vehicles/photos/$did/$vid/$thumbfolder')) {
							mkdir('../../vehicles/photos/$did/$vid/$thumbfolder', 0777, true);
							echo 'Made Dealer Vehicle Thumbnail Folder';
						}



				
				//echo $updateThumb;


				// Yes The File exists
										echo "Yes The File Exist ";
										echo '<br>';
										
										
										if (!copy($fileUrl, $copyPathSM)) {
											
											echo "failed to copy $oldfile...\n";
											echo '<br>';
											return false;

										}
				
															
															//This update script only updates thumbnail.
															$updateThumb =	"UPDATE `idsids_idsdms`.`vehicles`
																	SET
																	`vphoto_count` = '$vphotoCount',
																	`vthubmnail_file` = '$filenameRename',
																	`vthubmnail_file_path` = '$vthumbphotoPath'
																	WHERE
																	`vehicles`.`vid` = '$vid'
																	LIMIT 1";
				
				
															// This update script marks vehicle sold because it's not in HOMENET feed LIVE
															// So we mark it with a livestatus of 9
															// Must Run After Homenet File Import Before Ran.
															$updateThumb2 =	"UPDATE `idsids_idsdms`.`vehicles`
																	SET
																	`vlivestatus` = '9',													
																	`vphoto_count` = '$vphotoCount',
																	`vthubmnail_file` = '$filenameRename',
																	`vthubmnail_file_path` = '$vthumbphotoPath',
																	`marked_sold` = '$now'
																	WHERE
																	`vehicles`.`vid` = '$vid'
																	LIMIT 1";
																																	
														
														
														$today_start = strtotime('today');
														$today_end = strtotime('tomorrow');

														
														$date_timestamp = strtotime($now);
														
														if ($date_timestamp >= $today_end) {


														   echo  "$now occurs after today";
														   echo '<br>';
														   echo 'Totally Skipping $vid';
														   echo '<br>';


														} elseif ($date_timestamp < $today_start) {


															echo  "$now occurs before today";
															echo '<br>';
															  
															$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
															
															echo "Marking Vehicle Sold! becasuse date $was";
															echo '<br>';


														} else {



															   echo  "$now occurs Today So We Are Processing $vid";
															   //$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");



														}
														
														
														
														/*
														if ($now > $was) 
														{
															
															$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
															
															echo "Marking Vehicle Sold! becasuse date $was";
															echo '<br>';
		
														}
														
														
														else if($was > $now)
														{
															$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
															
															echo "Marking Sold!  Because date $was is greater than $now";
															
														}
														*/
														
														if (!$was)
														{
															$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
															echo 'Marking Sold! date NULL';
														}
														
														else
														{
															
															$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb");
															
															echo "Marking Still LIVE date is $was";
														
														}
														



/*


	if (preg_match("|200|", $AgetHeaders[0])) 
	
		{
	

											
		} else {

		// file doesn't exists

		echo "DOGG ON IT - Sorry NO LUCK ";				

		}
												


				$AgetHeaders = @get_headers("$fileUrl");

				if (preg_match("|200|", $AgetHeaders[0])) 

					{
	
						
											


					} else {

					// file doesn't exists

					echo "DOGG ON IT - Sorry NO LUCK ";				

					}

				
*/
					


/*				

// 	Making Directories for This Dealers Vehicle Photos
//	mkdir("vehicles/$did/$vid", 0777);
//	$photo1 = $vphotoArrays['0'];
	@mkdir("../vehicles/photos/$did");
	@mkdir("../vehicles/photos/$did/$vid");
	@mkdir("../vehicles/photos/$did/$vid/$thumbfolder");

	
	$filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line


 */		
?>

