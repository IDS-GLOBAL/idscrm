<?php
header("Content-Type: application/json; charset=UTF-8");

//print_r($_GET);

$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";

$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 

$colname_find_vehicle = "-1";
if (isset($_GET['enter_vstockno'])) {
  $colname_find_vehicle = $_GET['enter_vstockno'];
}
$colname_find_dealer = "-1";
if (isset($_GET['thisdid'])) {
  $colname_find_dealer = $_GET['thisdid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vstockno` = '$colname_find_vehicle' AND `vehicles`.`did` = '$colname_find_dealer'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);




 $json = array();
        while($row=mysqli_fetch_array($find_vehicle)){
              $json[]=$row;
        }
echo '{"return_status": ['.json_encode( $row_find_vehicle)."]}";

//echo json_encode( $row_find_vehicle);

/*

$colname_find_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vid` = '$colname_find_vehicle'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
echo $totalRows_find_vehicle = mysqli_num_rows($find_vehicle);

<?php */

?>

