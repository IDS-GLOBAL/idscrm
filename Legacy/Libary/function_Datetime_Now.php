<?php

$timezone_set = date_default_timezone_set('America/New_York');

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('America/New_York');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('Y\-m\-d\ ');

}

function get_Datetime_Now2() {
	$tz_object2 = new DateTimeZone('America/New_York');
	//date_default_timezone_set('Brazil/East');
	$datetime2 = new DateTime();
	$datetime2->setTimezone($tz_object2);
	return $datetime2->format('Y\-m\-d\ h:i:s');
	//return $datetime2->format('m\-d\-Y\ ');

}


$timevar = get_Datetime_Now();

$timevar2 = get_Datetime_Now2();


// Date Time Will Be: 02/25/2013 09:20:00
$nowtime = date('Y-m-d H:i:s');
// Date Only Will Be: 07/26/2013
$nowdate = date('Y-m-d');

$currentDate = strtotime($nowdate);
$tomorrowdate = $currentDate+(120*1000);

// Next Date Time Will Be: 02/25/2013 09:20:00
$tomorrowtime = date("Y-m-d H:i:s", $tomorrowdate);
// Next Date Only Will Be: 02/25/2013 09:20:00
$tomorrow = date("Y-m-d", $tomorrowdate);







?>