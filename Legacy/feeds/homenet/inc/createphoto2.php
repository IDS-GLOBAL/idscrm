<?php

echo "Creating Large PHOTO $vid";

echo '<br>';



				@$a = mkdir("../../vehicles/photos/$did");
				@$b = mkdir("../../vehicles/photos/$did/$vid");
				//@$c = mkdir("../../vehicles/photos/$did/$vid/$thumbfolder");
				
				//Only Used For Echoing With The Link IS Thats Real
				$oldfile2 = $photo2;


				$fileUrl2 = $filenameRemote;
				$newfile2 = $copyPathLG;


echo 'Creating Photo Because It Still Exist'.'<br>';

					 if (!copy($fileUrl2, $newfile2)) 
						{
						
							echo "failed to copy $oldfile2...\n";
						
						}


						if ($photo1 == $oldfile2)
						{
					
							echo 'Skipping because This would insert the same photo record again.';
				
						
						}else{

										// file doesn't exists
										copy($copyPathLG, $copyPathSM);

										$insertinto = "INSERT INTO vehicle_photos 
															(vehicle_id, dealer_id, vehicleVin, photo_file_name, 
															 photo_file_path, impPhotoFilePath, 
															 photo_thumb_fname, photo_thumb_fpath) 
															values 
															('$vid', '$did', '$vvin', '$filenameRename',
															 '$vphotoPath', '$oldfile2',
															 '$filenameRename', '$vthumbphotoPath')";


										$insert = mysqli_query($idsconnection_mysqli, $insertinto);


									echo "Yes We Are Ceating On Creating Photo";

							  }


/*

	$AgetHeaders2 = @get_headers("$fileUrl2");
	
	if (preg_match("|200|", $AgetHeaders2[0])) 
	
		{
			

		}





								// *** 1) Initialise / load image
								$resizeObj = new resize("$copyPathSM");
							
								 //*** 2) Resize image (options: exact, portrait, landscape, auto, crop)
								$resizeObj -> resizeImage(120, 90, 'exact');
							
								// *** 3) Save image
								$resizeObj -> saveImage("$copyPathSM", 100);

				$AgetHeaders2 = @get_headers("$fileUrl2");

				if (preg_match("|200|", $AgetHeaders2[0])) 

					{
					// Yes The File exists
					echo "Yes - The Large Photo File Exist For Vehicle ID: $vid ";
					
					echo '<br>';
					
						
				
						
					} else {

					// file doesn't exists
					// So We Are Not Copying It Over
					echo "DOGG ON IT - Sorry NO LUCK ";				

					}


*/		
?>