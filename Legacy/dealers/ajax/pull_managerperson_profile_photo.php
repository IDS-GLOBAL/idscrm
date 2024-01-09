<?php include("db.php"); ?>
<?php

$colname_find_singlemanagerperson = "-1";
if (isset($_GET['manager_id'])) {
  $colname_find_singlemanagerperson = $_GET['manager_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singlemanagerperson =  "SELECT * FROM `idsids_idsdms`.`manager_person` WHERE `manager_person`.`manager_id` = '$colname_find_singlemanagerperson'";
$find_singlemanagerperson = mysqli_query($idsconnection_mysqli, $query_find_singlemanagerperson);
$row_find_singlemanagerperson = mysqli_fetch_assoc($find_singlemanagerperson);
$totalRows_find_singlemanagerperson = mysqli_num_rows($find_singlemanagerperson);
$team_id = $row_find_singlemanagerperson['team_id'];
$photo_url = $row_find_singlemanagerperson['profile_image'];

if($photo_url){
echo $photo_url;
}else{
echo $photo_url;	
//echo 'img/logo.png';
}

?>