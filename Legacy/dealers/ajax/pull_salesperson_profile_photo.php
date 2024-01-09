<?php require_once('db.php');  ?>
<?php

$colname_find_singlesalesperson = "-1";
if (isset($_GET['salesperson_id'])) {
  $colname_find_singlesalesperson = $_GET['salesperson_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singlesalesperson =  "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`salesperson_id` = '$colname_find_singlesalesperson'";
$find_singlesalesperson = mysqli_query($idsconnection_mysqli, $query_find_singlesalesperson);
$row_find_singlesalesperson = mysqli_fetch_assoc($find_singlesalesperson);
$totalRows_find_singlesalesperson = mysqli_num_rows($find_singlesalesperson);
$team_id = $row_find_singlesalesperson['team_id'];
$dlr_team_photo_url = $row_find_singlesalesperson['profile_image'];

if($dlr_team_photo_url){
echo $dlr_team_photo_url;
}else{
echo $dlr_team_photo_url;	
//echo 'img/logo.png';
}

?>