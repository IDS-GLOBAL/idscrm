<?php include("db_loggedin.php"); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryVehbydid = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$did' ORDER BY `created_at` DESC";
$queryVehbydid = mysqli_query($idsconnection_mysqli, $query_queryVehbydid);
$row_queryVehbydid = mysqli_fetch_assoc($queryVehbydid);
$totalRows_queryVehbydid = mysqli_num_rows($queryVehbydid);
$vid = $row_queryVehbydid['vid'];




//echo "inventoryedit.php?vid=$vid";

header("Location: inventory.edit.php?vid=$vid");

?>