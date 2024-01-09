<?php include("db_loggedin.php"); ?>
<?php


	$uploadsql = "INSERT INTO `idsids_idsdms`.`vehicle_photos` SET
								`sort_orderno` = '1', 
								`vehicle_id` = '2611', 
								`dealer_id` = '95',
								`vehicleVin` = '1G2ZF55B464252773',
								`photo_file_name` = 'unknown.jpg', 
								`photo_file_path` = '../vehicles/photos/95/unknown.jpg', 
								`photo_file_width` = '640px', 
								`photo_file_height` = '480px', 
								`photo_thumb_fname` = 'unknown.jpg', 
								`photo_thumb_fpath` = '../photos/94/2611/unknown.jpg', 
								`created_at` = CURRENT_TIMESTAMP, 
								`v_caption` = '1'
								";
								
								

    
	$result_uploadsql = mysqli_query($idsconnection_mysqli, $uploadsql);




?>