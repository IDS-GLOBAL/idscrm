<?php require_once('../Connections/idsconnection.php'); ?>
<?php

$vid = $_GET['vid'];

if (isset($_POST['v_photoid'])){

	echo $v_photoid = mysql_real_escape_string($_POST['v_photoid']);
	echo '<br>';	
	echo $deletev_photoSQL = "DELETE FROM vehicle_photos WHERE v_photoid='$v_photoid' ";
	//$deletev_photo = mysqli_query($idsconnection_mysqli, $deletev_photoSQL);
	
}

header("Location: inventory-photos.php?vid=$vid")


?>