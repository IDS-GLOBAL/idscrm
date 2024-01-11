<?php require_once("../db_public.php"); ?>
<?php if(isset($_POST['state'])): 

$colname_find_models = "-1";
if(isset($_POST['make'])){
  $colname_find_models = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['make']));
  $sql_where .= "`vehicles`.`vmake` LIKE  '%$colname_find_models%' AND ";
}
mysqli_select_db($autocity_connection_mysqli,  $database_autocity_connection);
 $colname_filter_vehicles = "-1";
if(isset($_POST['state'])){
  $colname_filter_state =  mysqli_escape_string($autocity_connection_mysqli, trim($_POST['state']));
  $sql_where .= "`dealers`.`state` = '$colname_filter_state' AND " ;
}
if(isset($_POST['market'])){
  $colname_filter_market_id =  mysqli_escape_string($autocity_connection_mysqli, trim($_POST['market']));
  //$sql_where_or .= "AND `dealers`.`dealer_market_id` = '$colname_filter_market_id'" ;
}
// DISTINCT `vehicles`.`vmodels`
mysqli_select_db($autocity_connection_mysqli,  $database_autocity_connection);
$query_find_models = "SELECT DISTINCT `vehicles`.`vmodel` FROM `idsids_idsdms`.`vehicles`
									LEFT JOIN `idsids_idsdms`.`dealers`
									ON `vehicles`.`did` = `dealers`.`id`
									
									
								    WHERE 
										`vehicles`.`vlivestatus` = '1' 
									AND 
										`dealers`.`status` = '1'																		
									AND
									 	`dealers`.`id` = `vehicles`.`did`
									AND
									$sql_where
									
										`vehicles`.`vthubmnail_file` 
									IS NOT NULL 
									GROUP BY 
										`vehicles`.`vid`
									ORDER BY RAND()
									LIMIT 50";

$find_models = mysqli_query($autocity_connection_mysqli, $query_find_models);
$row_find_models = mysqli_fetch_assoc($find_models);
$totalRows_find_models = mysqli_num_rows($find_models);
?>

 <option value="">--- See All Models ---</option>
<?php do {
$thisvmodels = strtolower($row_find_models['vmodel']);
?>
<option value="<?php echo $thisvmodels; ?>"><?php echo ucwords($thisvmodels); ?></option>
<?php
} while ($row_find_models = mysqli_fetch_assoc($find_models));
  $rows = mysqli_num_rows($find_models);
  if($rows > 0) {
	  mysqli_data_seek($find_models, 0);
	  $row_find_models = mysqli_fetch_assoc($find_models);
  }

mysqli_free_result($find_models);
 
mysqli_close($autocity_connection_mysqli);
?>


<?php endif; ?>