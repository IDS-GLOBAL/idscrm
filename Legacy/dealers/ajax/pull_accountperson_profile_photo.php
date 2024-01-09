<?php include("db.php"); ?>
<?php

$colname_find_singleaccountperson = "-1";
if (isset($_GET['account_person_id'])) {
  $colname_find_singleaccountperson = $_GET['account_person_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singleaccountperson =  "SELECT * FROM `idsids_idsdms`.`account_person` WHERE `account_person`.`account_person_id` = '$colname_find_singleaccountperson'";
$find_singleaccountperson = mysqli_query($idsconnection_mysqli, $query_find_singleaccountperson);
$row_find_singleaccountperson = mysqli_fetch_assoc($find_singleaccountperson);
$totalRows_find_singleaccountperson = mysqli_num_rows($find_singleaccountperson);
$team_id = $row_find_singleaccountperson['team_id'];
$photo_url = $row_find_singleaccountperson['profile_image'];

if($photo_url){
echo $photo_url;
}else{
echo $photo_url;	
//echo 'img/logo.png';
}

?>