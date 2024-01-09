<?php require_once('db.php');  ?>
<?php

$colname_find_singlesalesperson = "-1";
if (isset($_GET['testimony_id'])) {
  $colname_find_singlesalesperson = $_GET['testimony_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singlesalesperson =  "SELECT * FROM `idsids_idsdms`.`testimonials` WHERE `testimonials`.`id` = '$colname_find_singlesalesperson'";
$find_singlesalesperson = mysqli_query($idsconnection_mysqli, $query_find_singlesalesperson);
$row_find_singlesalesperson = mysqli_fetch_assoc($find_singlesalesperson);
$totalRows_find_singlesalesperson = mysqli_num_rows($find_singlesalesperson);
$testimony_id = $row_find_singlesalesperson['id'];
$uploaded_image_url = $row_find_singlesalesperson['uploaded_image'];

if($uploaded_image_url){
echo $uploaded_image_url;
}else{
//echo $uploaded_image_url;	
echo 'img/no-pic-avatar.png';
}

?>