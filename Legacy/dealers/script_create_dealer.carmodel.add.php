<?php require_once("db_loggedin.php"); ?>
<?php

if(!$_POST) exit();


if(isset($_POST['vmodel_entered'], $_POST['thisdid'], $_POST['vmake'], $_POST['vmake_id'], $_POST['vyear'])){







$vmodel_entered = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmodel_entered']));
$thisdid= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
$themake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmake']));
$vmake_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmake_id']));
$vmake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmake']));
$vyear= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vyear']));


$dealer_create_model_sql = "
INSERT INTO `idsids_idsdms`.`car_model` SET
	`make_id` = '$vmake_id',
	`make` = '$vmake',
	`model` = '$vmodel_entered',
	`vyear` = '$vyear',
	`thisdid` = '$thisdid'
	
";
$query_create_model_ran = mysqli_query($idsconnection_mysqli, $dealer_create_model_sql);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$find_makes_sql = "SELECT * FROM `idsids_idsdms`.`car_model` WHERE `car_model`.`make` = '$vmake'";
$query_vmakes = mysqli_query($idsconnection_mysqli, $find_makes_sql);
$row_query_vmakes = mysqli_fetch_assoc($query_vmakes);
$totalRows_query_vmakes = mysqli_num_rows($query_vmakes);


$myarray=array();


 echo '<option value="">'.'Select One'.'</option>';
 echo '<option value="Other">'.'Other'.'</option>';


do {
  echo "<option value='".$row_query_vmakes['model']."'>".$row_query_vmakes['model']."</option>";

	} while ($row_query_vmakes = mysqli_fetch_array($query_vmakes));

  echo "<option value='notlisted'>Not Listed</option>";

}
?>