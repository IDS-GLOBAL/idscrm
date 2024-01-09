<?php

$email = $user_profile['email'];

$fbuserid = $user_profile['id'];
$user = $fbuserid;

$fbfname = $user_profile['first_name'];
$fblname = $user_profile['last_name'];
$fbfullname = $user_profile['name'];

$fbsex = $user_profile['gender'];
$fblink = $user_profile['link'];


$fbemail = $user_profile['email'];
$fbusername = $user_profile['username'];
$fbdob = $user_profile['birthday'];
$fbpicture = $$user_profile['picture'];

//echo 'Hi '.$fbstatename;
//echo '<br>';
//echo 'City'.$fbcityn;





$fbtimezone = $user_profile['timezone'];
$fblocale = $user_profile['locale'];
$fbverified = $user_profile['verified'];
	
	$fbupdated_time = $user_profile['updated_time'];
	$fbupdated_time->format("Y-m-d");


$fbpiclink = "https://graph.facebook.com/".$fbuserid."/picture";

$fbpicture = "<img id='proimg' src='$fbpiclink' class='profil_pic'>";

?>