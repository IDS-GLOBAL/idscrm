<?php require_once("db_connect.php"); ?>
<?php

require_once("Mail.php");


if(!$_POST) exit;

echo 'Begin';



print_r($_POST);

if(isset($_POST['leavefname'], $_POST['leavelname'], $_POST['leavecellphone'], $_POST['leaveemailaddr'], $_POST['leavecookie'])){
			
echo 'I made it';

			//Prepare Post Variables
			$fname = mysql_real_escape_string($_POST['leavefname']);
			$lname = mysql_real_escape_string($_POST['leavelname']);
			$phone = mysql_real_escape_string($_POST['leavecellphone']);			
			$themail = mysql_real_escape_string($_POST['leaveemailaddr']);
			$cookie = mysql_real_escape_string($_POST['leavecookie']);
	
			$token = mysql_real_escape_string($_POST['leavecookie']);
	
			$cust_nickname = $fname.' '.$lname;
			$comments = 'This customer wants the $500 discount from centralauto.com';
			
			if(!$cookie) exit;
			
			$cust_nickname = "$fname $lname";

			$CreateLeadSQL = "INSERT INTO `idsids_idsdms`.`cust_leads` SET
							`cust_lead_type` = '2',
							`cust_lead_token` = '$token',
							`cust_lead_ip` = '$ip',
							`cust_lead_broswer` = '$browser',
							`cust_lead_mobile` = '$mobiledevicemobiledevice',
							`cust_perf_commun` = 'any',
							`cust_dealer_id` = '60',
							`cust_nickname` = '$cust_nickname',
							`cust_fname` = '$fname',
							`cust_lname` = '$lname',
							`cust_email` = '$themail',
							`cust_comment` = '$cust_comment',
							`cust_lead_temperature` = 'Hot',
							`cust_status` = 'Pending',
							`cust_lead_source` = 'Leave Widget',
							`cust_salesperson_id` = '$sidr',
							`cust_phoneno` = '$phone',
							`cust_phonetype` = 'mobile',
							`cust_mobilephone` = '$phone'
							";

			$result_CreateLead = mysqli_query($idsconnection_mysqli, $CreateLeadSQL);


			$name = "Central Auto Sales";



			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 $SendToEmail = "webgoonie@gmail.com";
			 //$SendToEmail = "centralautosalesleads@dealerleadtrack.com";
			 
			 //$SendToEmail = "centralauto1975@gmail.com";
			 
			 $from = "IDS ROBOT <idsrobot@idscrm.com>";
			 
			 //$to = "Email Recipient <webgoonie@gmail.com>";
			 $To = $SendToEmail;
			 $bcc = "idscrm.com@gmail.com";
			 $recipients = $To.",".$bcc;
			
			 $subject = "You Have A $500 Discount Request";

			
$body = "
<div>
<p><img src='http://idscrm.com/dealer/css/themes/blueberry/images/logo.png' /></p>
<p>$name ,</p>
<p>Before a visitor left your website we have captureded their information from your website!  Please review the information within this email.  We have also logged this information as a lead in your back office.</p>
<p><b>Name:</b $cust_nickname><br><b>Phone:</b> <a href='tel: $phone'>$phone</a><br>
<p>Email: $themail</p><br></p>
<p>Comments: $comments</p>
<p>To View Simply <a href='http://idscrm.com/dealer/lead-select.php' target='_blank'>Click Here</a> To Log In</p>
</div>
";
 

	$host = "mail.idscrm.com";
	$username = "idsrobot@idscrm.com";
	$password = "idscrmsystem99!";
 
	$headers = array ('From' => $from,
	'To' => $To,
	'Subject' => $subject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
 
	$mail = $smtp->send($recipients, $headers, $body);
	





			
			
}


?>