<?php require_once("db_connect.php"); ?>
<?php

if(!$_POST) exit;


//require_once("Mail.php");
//require_once("/home/idsids/php/Mail.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';//confirm your web path

// Initialize debugging variables
$debug = '';
$sent = false;




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



			 //ini_set ("SMTP", "mail.idscrm.com");
			 
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
			<p><img src='https://idscrm.com/images/logo.png' /></p>
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

			<p>To View Simply <a href='https://office.idscrm.com' target='_blank'>Click Here</a> To Log In</p>
			</div>
			";


			

			// Check if the form was submitted
			// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
				
				//$to = $_POST['email'];
				
				$to = "idscrm.com@gmail.com";
				$subject = "DEMO REQUEST!!! $company_name_demo";
				$message = 'This is a test email sent from your PHP script.';

				$mail = new PHPMailer(true);

				try {
					//Server settings
					$mail->isSMTP();
					$mail->Host = 'mail.idscrm.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'idsrobot@idscrm.com';  // Gmail username
					$mail->Password = 'ZF7xWD17VnVtK7fq';  // Application password or Gmail password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					$mail->Port = 587;
					//$mail->Port = 465;

					//Recipients
					$mail->setFrom('idsrobot@idscrm.com', 'IDSCRMRobot');
					$mail->addAddress($to);

					//Content
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body    = $body_demo_html;
					$mail->AltBody = strip_tags($body_demo_html);

					$mail->send();
					$sent = true;
					$debug = 'Email sent successfully.';
					echo 'Message has been sent';
				} catch (Exception $e) {
					$debug = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}


			// }


	
 
			



			echo"
			<script>

				$('div#boxshadow').hide();
				
				$('div#getademo_success').show();
				

				console.log('$debug');
				
			</script>
			";





}

?>