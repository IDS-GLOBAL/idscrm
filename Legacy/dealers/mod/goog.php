<?php
// Google Developers Console Credentials
// https://console.developers.google.com/project/186775043152/apiui/credential?authuser=0
// Compute Engine and App Engine 
// OAuth
// Client ID  186775043152-cjvjicvs8aliqlou8u974meaohipnna0.apps.googleusercontent.com
// EMAIL ADDRESS  186775043152-cjvjicvs8aliqlou8u974meaohipnna0@developer.gserviceaccount.com


// Public API access for  Client ID for web application
// CLIENT ID 186775043152.apps.googleusercontent.com
// EMAIL ADDRESS  186775043152@developer.gserviceaccount.com
// CLIENT SECRET  Y1H-2gilFKIYJlqMtk4acjEk
// REDIRECT URIS  https://idscrm.com/oauth2callback/
// JAVASCRIPT ORIGINS https://idscrm.com/


// REFERERS  Any referer allowed


// Public API access for  Client ID for web application
// API KEY AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec
// REFERERS  Any referer allowed
// ACTIVATION DATE Jun 2, 2013, 6:35:00 AM
// ACTIVATED BY idscrm.com@gmail.com (you)

// Last Updated And Created On 3/1/2015 8:39 pm, Faith and the kids are on the hype about the walking deal.
?>
<?php






$url_shouldbe = 'http://idscrm.com/oauth2callback';

$idscrm_api = 'AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec';


$idscrm_client_id = '186775043152.apps.googleusercontent.com';
$idscrm_client_secret = 'Y1H-2gilFKIYJlqMtk4acjEk';
$idscrm_email_address = '';
$idscrm_redirect_uris = '';
$idscrm_javascript_origins = '';




?>
<?php

$post_code = stripcslashes($_GET['pc']);



if (!empty($post_code)) {

	$post_code = urlencode($post_code);
	
	$location = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$post_code.'&sensor=false';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $location);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	
	echo $result;

}
?>