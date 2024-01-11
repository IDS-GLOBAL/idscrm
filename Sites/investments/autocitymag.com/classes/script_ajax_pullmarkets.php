<?php require_once("../db_public.php"); ?>
<?php if(isset($_POST['state'])): 

$colname_find_markets = "-1";
if(isset($_POST['state'])){
  $colname_find_markets = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['state']));
  // `markets_dm`.`market_status` = '1' AND
}
mysqli_select_db($autocity_connection_mysqli,  $database_autocity_connection);
$query_find_markets = "SELECT * FROM `idsids_wefinancehere`.`states`, `idsids_wefinancehere`.`markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND  `states`.`state_abrv` = '$colname_find_markets'";
$find_markets = mysqli_query($autocity_connection_mysqli, $query_find_markets);
$row_find_markets = mysqli_fetch_assoc($find_markets);
$totalRows_find_markets = mysqli_num_rows($find_markets);
?>

 <option value="">--- All Markets ---</option>
<?php do { ?>
<option value="<?php echo $row_find_markets['market_id']?>"><?php echo $row_find_markets['market']; ?> - <?php echo $row_find_markets['state_abrv']; ?></option>
<?php
} while ($row_find_markets = mysqli_fetch_assoc($find_markets));
  $rows = mysqli_num_rows($find_markets);
  if($rows > 0) {
	  mysqli_data_seek($find_markets, 0);
	  $row_find_markets = mysqli_fetch_assoc($find_markets);
  }

mysqli_free_result($find_markets);
  
mysqli_close($autocity_connection_mysqli);
?>


<?php endif; ?>