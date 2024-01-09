<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_testimonies = "SELECT * FROM `idsids_idsdms`.`testimonials` WHERE `testimonials`.`testimony_did` = '$did' ORDER BY `testimonials`.`id` DESC LIMIT 1 ";
$find_dlr_testimonies = mysqli_query($idsconnection_mysqli, $query_find_dlr_testimonies);
$row_find_dlr_testimonies = mysqli_fetch_assoc($find_dlr_testimonies);
$totalRows_find_dlr_testimonies = mysqli_num_rows($find_dlr_testimonies);


$testid = $row_find_dlr_testimonies['id'];

header("Location: testimonie.edit.php?testimonie=$testid");




?>