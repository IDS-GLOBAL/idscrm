<?php

	include("db_loggedin.php");
	
	
	//print_r($_POST);
	
	
	
	if(isset($_POST['testimony_token'], $_POST['name'], $_POST['testimony_statusval'], $_POST['email'], $_POST['phone'], $_POST['subject'], $_POST['textareabody'])){
																																				   
																																				   
	
	
	$testimony_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['testimony_token']));
	$name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['name']));
	$testimony_statusval = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['testimony_statusval']));
	$email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email']));
	$phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['phone']));
	$subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['subject']));
	$textareabody = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['textareabody']));
												 



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_testimonies = "SELECT * FROM `idsids_idsdms`.`testimonials` WHERE `testimonials`.`testimony_did` = '$did' AND `testimonials`.`testimony_token` = '$testimony_token' ORDER BY date_created_at ASC LIMIT 1";
$find_dlr_testimonies = mysqli_query($idsconnection_mysqli, $query_find_dlr_testimonies);
$row_find_dlr_testimonies = mysqli_fetch_assoc($find_dlr_testimonies);
$totalRows_find_dlr_testimonies = mysqli_num_rows($find_dlr_testimonies);


if($totalRows_find_dlr_testimonies !=0):




	$testimonies_id = $row_find_dlr_testimonies['id'];

	$update_testimony_sql = "
	UPDATE `idsids_idsdms`.`testimonials` SET
		`testimony_token` = '$testimony_token',
		`name` = '$name',
		`testimony_status` = '$testimony_statusval',
		`email` = '$email',
		`phone` = '$phone',
		`subject` = '$subject',
		`body` = '$textareabody'
	WHERE
		`id` = '$testimonies_id'
	";

	$run_update_testimony_sql = mysqli_query($idsconnection_mysqli, $update_testimony_sql);
	
else:

	$insert_testimony_sql = "
	INSERT INTO `idsids_idsdms`.`testimonials` SET
		`testimony_did` = '$did',
		`testimony_token` = '$testimony_token',
		`name` = '$name',
		`testimony_status` = '$testimony_statusval',
		`email` = '$email',
		`phone` = '$phone',
		`subject` = '$subject',
		`body` = '$textareabody'
		";

	$run_insert_testimony_sql = mysqli_query($idsconnection_mysqli, $insert_testimony_sql);




endif;
	
	
	
	
																																				}
	
	
	


?>