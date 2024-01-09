<?php require_once('../../Connections/idsconnection.php'); ?>
<?php
if(!$_POST) exit();

$evalue = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['evalue']));
$thedid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dealer_template = "SELECT * FROM `idsids_idsdms`.`email_dealer_templates` WHERE `email_dealer_templates`.`email_dealer_templates_did` = '$thedid' AND `email_dealer_templates`.`id` = '$evalue'";
$pull_dealer_template = mysqli_query($idsconnection_mysqli, $query_pull_dealer_template);
$row_pull_dealer_template = mysqli_fetch_assoc($pull_dealer_template);
$totalRows_pull_dealer_template = mysqli_num_rows($pull_dealer_template);

echo $row_pull_dealer_template['email_dealer_templates_body'];



?>