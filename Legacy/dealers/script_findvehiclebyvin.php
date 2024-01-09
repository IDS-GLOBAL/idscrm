<?php require_once('../Connections/tracking.php'); ?>
<?php require_once("db_loggedin.php"); ?>
<?php

$colname_find_vehicle = "-1";
if (isset($_GET['vvin'], $_GET['token'])) {
 $colname_find_vehicle = $_GET['vvin'];
  $col_token = $_GET['token'];
}else{	header("Location: inventory.php"); }
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vvin` = '$colname_find_vehicle' AND `vehicles`.`did` = '$did'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);
$vid = $row_find_vehicle['vid'];

$activity_result = "Stopped $colname_find_vehicle from being created twice took dealer-$did to <a href='inventoryedit.php?vid=$vid'>inventory.edit.php?vid=$vid</a>";
$activity = mysql_real_escape_string(trim($activity_result));

$activity_sql = "INSERT `idsids_tracking_idsvehicles`.`dealer_activty` SET
					`dealer_actvty_did` = '$did',
					`dealer_actvty_logbody` = '$activity'
					";
$activity_inserted = mysqli_query($tracking_mysqli, $activity_sql);


if($vid){

	header("Location: inventory.edit.php?vid=$vid");

echo "
<script>
			window.location.href = 'inventory.edit.php?vid=$vid';

</script>
";

}else{
	
	header("Location: inventory.transfers.php?vid=$vid");

echo "
<script>
			window.location.href = 'inventory.transfers.php?vid=$vid';

</script>
";

	
}


?>
