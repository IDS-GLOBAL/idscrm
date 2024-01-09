<?php

//echo 'insert_update_vehicles.php';


//echo '<br />';

$vvin = str_replace('"', '', $vvin);
$vvin = mysql_real_escape_string($vvin);
//echo $vvin;

//echo '<br />';

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `vehicles` WHERE `vvin` = '$vvin'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);

//Defining Found Variable After Query Check From Above
$found_vin = $row_find_vehicle['vvin'];
$found_vid = $row_find_vehicle['vid'];
$homenetLastSent = $row_find_vehicle['homenetLastSent'];


if(isset($found_vin, $found_vid)):

echo 'Found Vin: '.$found_vin.' ';
echo ' Found Vid: '.$found_vid.'<br />';

else:

echo "Didn't Find Vin: ".$found_vin.' ';
echo "Didn't Find Vid: ".$found_vid.'<br />';


endif;

?>