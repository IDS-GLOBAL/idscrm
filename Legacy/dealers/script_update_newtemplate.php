<?php require_once("db_loggedin.php"); ?>
<?php

//print_r($_POST);
// Exit If No Post
if(!$_POST) exit();

//print_r($_POST);

if(isset($_POST['email_dealer_templates_type_id'], $_POST['email_dealer_templates_type'], $_POST['email_dealer_templates_subject'], $_POST['days_response'], $_POST['email_dealer_templates_body'], $_POST['email_dealer_templates_status'])){


$template_id  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['template_id']));
$email_dealer_templates_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_type_id']));


$email_dealer_templates_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_type']));


$email_dealer_templates_subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_subject']));


$email_dealer_templates_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_body']));

$email_dealer_templates_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_status']));

$days_response = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['days_response']));




   $insertSQL = "UPDATE email_dealer_templates SET
					   		`email_dealer_templates_did` = '$did',
							`email_dealer_templates_type_id` = '$email_dealer_templates_type_id',
							`email_dealer_templates_type` = '$email_dealer_templates_type',
							`email_dealer_templates_subject` = '$email_dealer_templates_subject',
							`email_dealer_templates_status` = '$email_dealer_templates_status',
							`days_response` = '$days_response',
							`email_dealer_templates_body` = '$email_dealer_templates_body'
							WHERE
							`id` = '$template_id'
							";
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);









}





?>