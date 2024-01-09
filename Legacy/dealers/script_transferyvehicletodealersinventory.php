<?php require_once("db_loggedin.php"); ?>
<?php




$colname_find_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle =  "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vid` = '$colname_find_vehicle'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);


$thisvid =  $row_find_vehicle['vid'];
$vtransfer_oldid = $row_find_vehicle['did'];
$vtransfer_oldid = $row_find_vehicle['created_at'];

$vtransfer_oldid_createdate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['created_at']));



$insert_vehicle_transfer_sql = "
INSERT INTO `idsids_idsdms`.`vehicles_transfer` SET
	`vtransfer_oldid` = '$vtransfer_oldid',
	`vtransfer_vid` = '$colname_find_vehicle',
	`vtransfer_newdid` = '$did',
	`vtransfer_newid_reqdate` = '$server_time',
	`vtransfer_oldid_createdate` = '$server_time',
	`vtransfer_admin_approved` = '1',
	`vtransfer_complete` = '1'

";


$ran_vehicle_transfer_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_transfer_sql);



$update_vehicle_withnodealerid_sql ="
UPDATE `idsids_idsdms`.`vehicles` SET
	`did` = '$did',
	`vlivestatus` = '2'
WHERE
`vid` = '$thisvid'
";

$ran_vehicle_withnodealerid_sql = mysqli_query($idsconnection_mysqli, $update_vehicle_withnodealerid_sql);




echo $redirect_transferinventory = "

<script>
	window.location.replace('inventory.transfers.php?vid=$vid');
</script>
";




?>