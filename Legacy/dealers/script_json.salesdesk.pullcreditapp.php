<?php
header("Content-Type: application/json; charset=UTF-8");

//print_r($_GET);

$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";

$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 

$colname_find_appno = "-1";
if (isset($_GET['enter_appno'])) {
  $colname_find_appno = $_GET['enter_appno'];
}
$colname_find_did = "-1";
if (isset($_GET['thisdid'])) {
  $colname_find_did = $_GET['thisdid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`app_deal_number` = '$colname_find_appno' AND `credit_app_fullblown`.`applicant_did` = '$colname_find_did'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);




 $json = array();
        while($row=mysqli_fetch_assoc($find_vehicle)){
              $json[]=$row;
        }
echo '{"return_status": ['.json_encode( $row_find_vehicle)."]}";


?>

