<?php
//require_once("Mail.php");
require_once("/home/idsids/php/Mail.php");


			 ini_set ("SMTP", "mail.idscrm.com");



		if($email_alert_created_newsystemdealer == '1'){
			
		}
		if($email_alert_updated_systemdealer == '1'){
			
		}
		if($email_alert_updated_pendingdealer == '1'){
			
			
		}



		if($email_alert_exisiting_email_in_idssystem = '1'){
			
			$log .= "SMTP Email".'<br />';
			
			$log .= 'Sending A System Email Link To Email: '.$found_idsusernemailn_dealersystem;
			
		}

		if($email_alert_existing == '1'){
			
			
		}

	   if($email_alert_claim_exisiting_email_in_idssystem == '1'){
		
			$log .= "Sending A Claim Link To Exisiting Email With and Already Exisiting  Frazer Number:".'<br />';

	   $log .= "Click Link to sent to $found_idsusernemailn_dealersystem to Claim IDS Account And Or Alarm IDS of Accident because it has frazer number: $idsfrazer_number_for_systemdealer";


		}


		$email_password_from_idssystem = '1';


	   if($email_alert_claim_exisiting_email_in_idssystem == '1'){
		
			$log .= "Sending A Claim Link To Exisiting Email With and Already Exisiting  Frazer Number:".'<br />';

	   $log .= "Click Link to sent to $found_idsusernemailn_dealersystem to Claim IDS Account And Or Alarm IDS of Accident because it has frazer number: $idsfrazer_number_for_systemdealer";




			 //$userSendToEmail = "idscrm.com@gmail.com";
		  	 $userSendToEmail = $useremail;
			 
			 $userfrom = "IDS ROBOT <idsrobot@idscrm.com>";
			 
			 $userTo = $userSendToEmail;
			 $userbcc = "idscrm.com@gmail.com";
			 $userrecipients = $userTo.",".$userbcc;
			
			 $usersubject = "IDS/Frazer Upload Successful";


/*
$userbody = "
<div>
<p><img src='http://idscrm.com/dealer/css/themes/blueberry/images/logo.png' /></p>
<p>$company_name,</p>
<p>Congratulations Your Frazer Inventory Upload Was Successful.</p>
<p>You are now ready to log in and manage your inventory online. .</p>
<p><hr /></p>
<p>Email: $useremail</p>
<p>Password: $idsfrazeruserpassword </p>
<p><hr /></p>
<p>To Login Simply <a href='http://idscrm.com/' target='_blank'>Click Here</a> To Log In</p>
<p><hr /></p>
</div>
";
*/


$userbody = "
<div>
<p><img src='http://idscrm.com/dealer/css/themes/blueberry/images/logo.png' /></p>
<p>$company_name,</p>
<p>Congratulations Your Frazer Inventory Upload Was Successful.</p>
<p>Feel Free to log in and manage your inventory online.</p>
<p><hr /></p>
<p>Email: $useremail</p>
<p>Password: click forgot password on login window.</p>
<p><hr /></p>
<p>To Login Simply <a href='http://idscrm.com/dealers/index.php' target='_blank'>Click Here</a> To Log In</p>
<p><hr /></p>
</div>
";


	$userhost = "mail.idscrm.com";
	$userusername = "idsrobot@idscrm.com";
	$userpassword = "idscrmsystem99!";
 
	$userheaders = array ('From' => $userfrom,
	'To' => $userTo,
	'Subject' => $usersubject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $userhost,
		 'auth' => true,
		 'username' => $userusername,
		 'password' => $userpassword));
 
	$mail = $smtp->send($userrecipients, $userheaders, $userbody);

		}

////////////////////////////////////////////////////////////////////////////////////////

			$admin = "Hi Benjamin";



			 
			 //$SendToEmail = "webgoonie@gmail.com";
			 //$SendToEmail = "centralautosalesleads@dealerleadtrack.com";
			 
			 $adminSendToEmail = "idscrm.com@gmail.com";
			 
			 $adminfrom = "IDS ROBOT <idsrobot@idscrm.com>";
			 
			 //$to = "Email Recipient <webgoonie@gmail.com>";
			 $adminTo = $adminSendToEmail;
			 $adminbcc = "idscrm.com@gmail.com";
			 $adminrecipients = $adminTo.",".$adminbcc;
			
			 $adminsubject = "Frazer User PROCESSING RESULTS!";

			
$adminbody = "
<div>
<p><img src='http://idscrm.com/dealer/css/themes/blueberry/images/logo.png' /></p>
<p>$admin ,</p>
<p>I just processed a new frazer user.</p>
<p><hr /></p>
<p><b>Company Name:</b> $company_name</p>
<p>Email: $newidsemail</p>
<p>Password: $idsfrazeruserpassword </p>
<p><hr /></p>
<p>To View Simply <a href='http://idscrm.com/dudes/index.php' target='_blank'>Click Here</a> To Log In</p>
<p> Frazer Sent URL: http://idscrm.com/frazersend/index.php?frazerid=$frazerid&id=$newidsemail</p>
<p><hr /></p>
<p>$log</p>
</div>
";
 

	$adminhost = "mail.idscrm.com";
	$adminusername = "idsrobot@idscrm.com";
	$adminpassword = "idscrmsystem99!";
 
	$adminheaders = array ('From' => $adminfrom,
	'To' => $adminTo,
	'Subject' => $adminsubject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $adminhost,
		 'auth' => true,
		 'username' => $adminusername,
		 'password' => $adminpassword));
 
	$mail = $smtp->send($adminrecipients, $adminheaders, $adminbody);

$log .= $adminbody;

?>