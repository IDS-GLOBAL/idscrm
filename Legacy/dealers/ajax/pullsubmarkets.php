<?php require_once('../../Connections/wfh_connection.php'); ?>
<?php
if(!$_POST) exit;



$primary_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['primary_state']));

$markets = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['markets']));
$markets_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['markets_id']));


mysql_select_db($database_wfh_connection, $wfh_connection);
$find_markets_sql = "SELECT * FROM `idsids_idsdms`.`markets_dm`, `idsids_idsdms`.`markets_sub_dm`, `idsids_idsdms`.`states` WHERE `markets_dm`.`market_id` = `markets_sub_dm`.`market_id` AND `states`.`state_id` = `markets_dm`.`state_id` AND `markets_dm`.`market_id` = '$markets_id'";
$query_markets = mysqli_query($idsconnection_mysqli, $find_markets_sql, $wfh_connection);
$row_markets = mysqli_fetch_assoc($query_markets);
$totalRows_markets = mysqli_num_rows($query_markets);
if($totalRows_markets == 0) exit();	
echo mysql_error();

 echo '<option value="">'.'Select One'.'</option>';
while($row_markets = mysql_fetch_array($query_markets)){
if($totalRows_markets == 0) exit();	
  echo "<option value='".$row_markets['market_sub_id']."'>".$row_markets['market_sub_name']."</option>";
}






?>