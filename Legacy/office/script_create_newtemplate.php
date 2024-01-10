<?php require_once('db_admin.php'); ?>
<?php

//print_r($_POST);
// Exit If No Post
if(!$_POST) exit();

print_r($_POST);

if(isset($_POST['token'], $_POST['email_systm_templates_status'], $_POST['email_systm_templates_subject'], $_POST['email_dealer_templates_type_id'], $_POST['email_dealer_templates_type'],  $_POST['days_response'], $_POST['email_dealer_templates_body'])){


$posted_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['token']));

$email_dealer_templates_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_type_id']));


$email_dealer_templates_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_type']));


$email_systm_templates_subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_systm_templates_subject']));


$email_dealer_templates_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_dealer_templates_body']));

$email_systm_templates_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_systm_templates_status']));

$days_response = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['days_response']));




   $insertSQL = "INSERT INTO `dudes_sys_htmlemail_templates` SET
							`email_systm_templates_token` = '$posted_token',
					   		`email_systm_templates_dudeid` = '$dudesid',
							`email_systm_templates_type_id` = '$email_dealer_templates_type_id',
							`email_systm_templates_type` = '$email_dealer_templates_type',
							`email_systm_templates_subject` = '$email_systm_templates_subject',
							`email_systm_templates_status` = '$email_systm_templates_status',
							`days_systm_response` = '$days_response',
							`email_systm_templates_body` = '$email_dealer_templates_body'
							";
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);




echo "
<script>
	window.location.href = 'emailtemplates.php';
</script>
";





}





?>