<?php

/*
***  The Central Time Zone Is:
***  Hostgator: 
***  GMT - 6h during Standard Time
***  GMT - 5h during Daylight Saving Time



What's Dealer Timezone run created at server time plus dealer time zone.


Military Time Gague
12 = 12
13 = 1
14 = 2
15 = 3
16 = 4
17 = 5
18 = 6
19 = 7
20 = 8
21 = 9
22 = 10
23 = 11
24 = 12






//echo date('l dS \of F Y h:i:s A').'<br />';



$datetime = new DateTime; // current time = server time
print_r($datetime).'<br />';
$otherTZ  = new DateTimeZone('America/Chicago');
$datetime->setTimezone($otherTZ); // calculates with new TZ now

print_r($datetime).'<br />';

/// Proves Default Time Zone Is America/Chicago when checking remotely.
/// Example 19:24 pm on my local machine is: 17:24:32 online which i'm eastern this time zone is.
/// 
if (date_default_timezone_get()) {
    echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}







*/



$zone_from ='America/Chicago';
$zone_to='America/New_York';

date_default_timezone_set($zone_from);

$convert_date="2016-04-09 19:51:03";

echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($cur_zone);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($req_zone);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}


echo '<br />';

echo $test_date = date("Y-m-d H:i:s");

echo '<br />';

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Testing Time Zone</title>
</head>

<body>
</body>
</html>