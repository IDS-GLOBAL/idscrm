<?php require_once('db_admin.php'); ?>
<?php

//print_r($_POST);
// Exit If No Post
if(!$_POST) exit();

print_r($_POST);

if(isset($_POST['dudes_salespitch_id'], $_POST['dudes_secret_token'], $_POST['dudes_cat_id'], $_POST['dudes_cat_label'], $_POST['pitch_systm_templates_subject'], $_POST['days_response'], $_POST['dudes_salespitch_body'], $_POST['pitch_systm_templates_status'])){



$dudes_salespitch_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_salespitch_id']));

$posted_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['token']));

$email_dealer_templates_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_type_id']));


$email_dealer_templates_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_type']));


$pitch_systm_templates_subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pitch_systm_templates_subject']));


$dudes_salespitch_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_salespitch_body']));

$pitch_systm_templates_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pitch_systm_templates_status']));

$dudes_salespitch_days_response = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['days_response']));




   $udpate_salesPitch_SQL = "UPDATE `idsids_tracking_idsvehicles`.`dudes_salespitch` SET
					   		`dudes_salespitch_createdby_dudeid` = '$dudesid',
							`dudes_cat_id` = '$email_dealer_templates_type_id',
							`dudes_cat_label` = '$email_dealer_templates_type',
							`dudes_salespitch_name` = '$pitch_systm_templates_subject',
							`dudes_salespitch_status` = '$pitch_systm_templates_status',
							`dudes_salespitch_days_response` = '$dudes_salespitch_days_response',
							`dudes_salespitch_body` = '$dudes_salespitch_body'
							WHERE
							`dudes_salespitch_id` = '$dudes_salespitch_id'
							";
  $ran_udpate_salesPitch_SQL = mysqli_query($idsconnection_mysqli, $udpate_salesPitch_SQL, $tracking);









}





?>