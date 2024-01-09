<?php

 $log .= ":::Updating System Dealer By Email With Frazer Number::: $newidsfrazerno ".'<br />';

$ids_connectupdatesystemdealer =  mysqli_connect('localhost', 'idsids_faith', 'benjamin2831', 'idsids_idsdms');

$update_new_system_dealerstring = "UPDATE `idsids_idsdms`.`dealers` SET
										`feedidfrazer` = '$newidsfrazerno'
										WHERE `dealers`.`id` = '$usedid'
									";
$run_update_new_system_dealerstring = mysqli_query($ids_connectupdatesystemdealer, $update_new_system_dealerstring);

$email_alert_updated_systemdealer = '1';

?>
