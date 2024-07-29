<?php require_once("db_connect.php"); ?>
<?php

if(!$_POST) exit;


require_once("Mail.php");
//require_once("/home/idsids/php/Mail.php");






if(isset($_POST['e_demo'], $_POST['phone_demo'], $_POST['company_name_demo'], $_POST['contact_demo'], $_POST['city_demo'], $_POST['state_demo'], $_POST['zip_demo'], $_POST['postion_demo'], $_POST['bmodel_demo'], $_POST['has_frazer'], $_POST['cookie'])){
	
	$post_cookie = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cookie']));
	$token =   mysqli_real_escape_string($idsconnection_mysqli, trim($cookie));
	
	
	
	$e_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['e_demo'])); 
	$phone_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['phone_demo']));
	$company_name_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_name_demo']));
	$contact_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_demo']));
	$city_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['city_demo']));
	$state_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['state_demo']));
	$zip_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['zip_demo']));
	$postion_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['postion_demo']));
	$bmodel_demo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bmodel_demo']));
	
	$has_frazer = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['has_frazer']));



$query_register_dealer_demo_sql = "
INSERT INTO `idsids_idsdms`.`dealers_pending` SET
	`email` = '$e_demo', 
	`contact_phone` = '$phone_demo',
	`company` = '$company_name_demo',
	`contact` = '$contact_demo',
	`city` = '$city_demo',
	`state` = '$state_demo',
	`zip` = '$zip_demo',
	`sla` = '$postion_demo',
	`package` = '$bmodel_demo',
	`frazer_customer_no` = '$has_frazer',
	`token` = '$token'
";

$run_query_register_dealer_demo_sql = mysqli_query($idsconnection_mysqli, $query_register_dealer_demo_sql);





			$name = "";



			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 //$SendToEmail = "webgoonie@gmail.com";
			 
			 $SendToEmail = "webgoonie@gmail.com";
			 
			 $from = "IDS ROBOT <idsrobot@idscrm.com>";
			 			 
			 //$to = "Email Recipient <webgoonie@gmail.com>";
			 $To = $SendToEmail;
			 //$bcc = "idscrm.com@gmail.com";
			 $bcc = "idscrm.com@gmail.com";
			 $recipients = $To.",".$bcc;
			
			 $subject_demo = "DEMO REQUEST!!! $company_name_demo";

			
$body_demo_html = "
<div>
<p><img src='httpa://idscrm.com/images/logo.png' /></p>
<p>Benjamin,</p>
<p>You have a new demo request in your back office.</p>
<hr />
<p>Company Name: $company_name_demo</p>
<p>Has Frazer: $has_frazer</p>
<p>Email: $e_demo</p>
<p>City: $city_demo</p>
<p>Company Name: $state_demo</p>
<p>Company Name: $zip_demo</p>
<p>Best Time To Call: $postion_demo</p>
<p>Phone Number: <a href='tel:$phone_demo'>$phone_demo</p>
<p>Business Model: $bmodel_demo</p>
<p>Company Name: $company_name_demo.</p>
<hr />
<p>Mobile: $mobiledevice</p>
<p>Broswer: $browser</p>
<p>IP: $ip</p>
<p>Cookie: $cookie</p>

<p>To View Simply <a href='http://dudes.idscrm.com' target='_blank'>Click Here</a> To Log In</p>
</div>
";

// <p>Comments: DL Exp Date: $applicant_driver_licenses_expdate, Job Changes: $job_changes</p>

	
 
	$headders = array ('From' => $from,
	'To' => $SendToEmail,
	'Subject' => $subject_demo,
  'MIME-Version' => '1.0',
  'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp_ids = Mail::factory('smtp',
	   array ('host' => $host_email,
		 'auth' => true,
		 'username' => $username_email,
		 'password' => $password_email));


	$mail_benjamin_demo_receipt = $smtp_ids->send($recipients, $headders, $body_demo_html);



echo"
<script>

	$('div#boxshadow').hide();
	
	$('div#getademo_success').show();
	
	
</script>
";





}

?>