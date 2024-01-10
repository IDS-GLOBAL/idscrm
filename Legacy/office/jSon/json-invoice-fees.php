<?php require_once("../db_admin.php"); ?>
<?php



$colname_find_fee_id = "-1";
if (isset($_GET['fee_id'])) {
  $colname_find_fee_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['fee_id']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_fee = "
	SELECT * 
	FROM `idsids_idsdms`.`ids_fees`
	WHERE `ids_fees`.`fee_id` = '$colname_find_fee_id'
	";
$find_fee = mysqli_query($idsconnection_mysqli, $query_find_fee);
$row_find_fee = mysqli_fetch_array($find_fee);
$totalRows_find_vehicle = mysqli_num_rows($find_fee);




 $json = array();
        while($row=mysqli_fetch_array($find_fee)){
              $json[]=$row;
        }
echo '{"return_status": ['.json_encode( $row_find_fee)."]}";

//echo json_encode( $row_find_fee);

?>
