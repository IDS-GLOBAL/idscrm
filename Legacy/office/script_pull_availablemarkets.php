<?php require_once('db_admin.php'); ?>
<?php


if(!$_POST) exit();

if(isset($_POST['dma_state'])):



$state_abrv = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dma_state']));

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
//$find_markets_sql = "SELECT * FROM `states`, `markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND `markets_dm`.`market_status` = '1' AND `states`.`state_abrv` =  '$state_abrv' ";
$find_markets_sql = "SELECT * FROM `idsids_idsdms`.`states`, `idsids_idsdms`.`markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND `states`.`state_abrv` =  '$state_abrv' ";
$query = mysqli_query($idsconnection_mysqli, $find_markets_sql);

echo mysqli_error();

$myarray=array();




while($row=mysqli_fetch_array($query)){

  echo "<option value='".$row['market']."'>".$row['market']."</option>";
}
 echo '<option value="Other">'.'Other'.'</option>';
endif;
?>