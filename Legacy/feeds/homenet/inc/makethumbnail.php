<?php

echo 'Making Thumbnail And Checking IF Sold';

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


					

					@$a = mkdir("../../vehicles/photos/$did");
					@$b = mkdir("../../vehicles/photos/$did/$vid");
					@$c = mkdir("../../vehicles/photos/$did/$vid/$thumbfolder");



				//echo $filenameRemote;

				$oldfile = $photo1;
				$newfile = $copyPathSM;




				//$fileUrl = $oldfile;
				$fileUrl = $filenameRemote;



				

				
				//echo $updateThumb;





				$AgetHeaders = @get_headers("$fileUrl");

				if (preg_match("|200|", $AgetHeaders[0])) 

					{
	
						// Yes The File exists
						echo "Yes The File Exist ";
						
						if (!copy($fileUrl, $copyPathSM)) {
							
							echo "failed to copy $oldfile...\n";
						}

											
											//This update script only updates thumbnail.
											$updateThumb =	"UPDATE `idsids_idsdms`.`vehicles`
													SET
													`vphoto_count` = '$vphotoCount',
													`vthubmnail_file` = '$filenameRename',
													`vthubmnail_file_path` = '$vthumbphotoPath'
													WHERE
													`vehicles`.`vid` = $vid
													AND
													`vehicles`.`did` = $did
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
													`vehicles`.`vid` = $vid
													AND
													`vehicles`.`did` = $did
													LIMIT 1";
																													
										
										
										
										if ($now > $was) 
										{
											
											$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
											
											echo "Marking Sold! date $was";
											
										}
										/*
										else if($was > $now)
										{
											$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
											
											echo "Marking Sold!  Because date $was is greater than $now";
											
										}
										*/
										else if (!$was)
										{
											$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb2");
											echo 'Marking Sold! date NULL';
										}										
										else
										{
											
											$updateSQL = mysqli_query($idsconnection_mysqli, "$updateThumb");
											
											echo "Marking LIVE date was $was";
										
										}
										
										

											
											


					} else {

					// file doesn't exists

					echo "DOGG ON IT - Sorry NO LUCK ";				

					}

				

					


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

