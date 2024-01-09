<?php

echo "Updating Large PHOTO $vid";

echo '<br>';



				@$a = mkdir("../../vehicles/photos/$did");
				@$b = mkdir("../../vehicles/photos/$did/$vid");
				//@$c = mkdir("../../vehicles/photos/$did/$vid/$thumbfolder");
				
				//Only Used For Echoing With The Link IS Thats Real
				$oldfile2 = $photo2;


				$fileUrl2 = $filenameRemote;
				$newfile2 = $copyPathLG;




						if (!copy($fileUrl2, $newfile2)) 
						{
							echo "failed to copy $oldfile2...\n";
							return false;
						}

						if ($vphotoCount == 1 )
						{
					
							echo 'Skipping because this vehicle only has $vphotoCount This would insert the same photo record again.';
				
						
						}else{
					
										copy($copyPathLG, $copyPathSM);


										$update =  "UPDATE `idsids_idsdms`.`vehicle_photos`
														SET
															`photo_file_name` = '$filenameRename',
															`photo_file_path` = '$vphotoPath',
															`photo_thumb_fname` = '$filenameRename',
															`photo_thumb_fpath` = '$vthumbphotoPath'
														WHERE
															`vehicle_photos`.`vehicle_id` = $vid
														AND
															`vehicle_photos`.`dealer_id` = $did
														AND
															`vehicle_photos`.`v_photoid` = $vpid
													";

										$updateSQL2 = mysqli_query($idsconnection_mysqli, "$update");
										
										echo 'Updated Photo';
				
				
					
								}



/*


		$AgetHeaders3 = @get_headers("$fileUrl2");

		if (preg_match("|200|", $AgetHeaders3[0])) 

			{

			}
								//echo $update;
								

								
								// *** 1) Initialise / load image
								$resizeObj = new resize("$filename");
							
								// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
								$resizeObj -> resizeImage(640, 480, 'exact');
							
								// *** 3) Save image
								$resizeObj -> saveImage("$filename", 100);
							
								// *** 1) Initialise / load image
								$resizeObj = new resize("$copyPathSM");
							
								 //*** 2) Resize image (options: exact, portrait, landscape, auto, crop)
								$resizeObj -> resizeImage(120, 90, 'exact');
							
								// *** 3) Save image
								$resizeObj -> saveImage("$copyPathSM", 100);
								
							*/


											
											
											
/*
				$AgetHeaders2 = @get_headers("$fileUrl2");

				if (preg_match("|200|", $AgetHeaders2[0])) 

					{
					// Yes The File exists
					echo "Yes - The Large Photo File Exist For Vehicle ID: $vid ";
					
					echo '<br>';
					
						
					} else {

					// file doesn't exists
					// So We Are Not Copying It Over
					echo "DOGG ON IT - Sorry NO LUCK UPDATING ";				

					}

*/


?>