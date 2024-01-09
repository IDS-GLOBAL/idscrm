<?php require_once('db_admin.php'); ?>
<?php

if(!$_POST) exit();

if(isset($_POST['prospect_states'])):


$prospect_states = mysqli_real_escape_string($tracking_mysqli, trim($_POST['prospect_states']));


$left_join_dlprspct_sql = " LEFT JOIN  `idsids_tracking_idsvehicles`.`dudes_states`
										ON `dudes_states`.`state_abrv` =  `dealer_prospects`.`state`
				";


									
mysqli_select_db($tracking_mysqli, $database_tracking);
echo $query_distnct_dlrprspct_cities = "
	SELECT
DISTINCT count(  `dealer_prospects`.`id` ) AS `total_city_records`, `dealer_prospects`.`city`, `dealer_prospects`.`state`
	FROM `idsids_tracking_idsvehicles`.`dealer_prospects`
	
	$left_join_dlprspct_sql
	
WHERE `dealer_prospects`.`state` = '$prospect_states'
 GROUP BY `city` ORDER BY `city`
";
$distnct_dlrprspct_cities = mysqli_query($tracking_mysqli, $query_distnct_dlrprspct_cities);
$row_distnct_dlrprspct_cities = mysqli_fetch_array($distnct_dlrprspct_cities);
$totalRows_distnct_dlrprspct_cities = mysqli_num_rows($distnct_dlrprspct_cities);




?>

    <?php do {  ?>
    <option value="<?php echo $row_distnct_dlrprspct_cities['city']?>"><?php echo $row_distnct_dlrprspct_cities['city']?> (<?php echo $row_distnct_dlrprspct_cities['total_city_records']; ?>)</option>
    <?php
} while ($row_distnct_dlrprspct_cities = mysqli_fetch_array($distnct_dlrprspct_cities));
  $rows = mysqli_num_rows($distnct_dlrprspct_cities);
  if($rows > 0) {
      mysqli_data_seek($distnct_dlrprspct_cities, 0);
	  $row_distnct_dlrprspct_cities = mysqli_fetch_array($distnct_dlrprspct_cities);
  }
?>
<?php endif; ?>
<?php include("inc.end.phpmsyql.php"); ?>