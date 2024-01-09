<?php require_once('db_admin.php'); ?>
<?php

if(!$_POST) exit();



if(isset($_POST['prospect_cities'], $_POST['prospect_states'])):


$prospect_cities = $_POST['prospect_cities'];
$prospect_states = mysqli_real_escape_string($tracking_mysqli, trim($_POST['prospect_states']));




$left_join_dlprspct_sql = " LEFT JOIN  `idsids_tracking_idsvehicles`.`dealer_prospects`
										ON `dealer_prospects`.`dealer_type_id` =  `dudes_dealer_types`.`dtype_id`
				";

$left_join_dlprspct_sql .= " LEFT JOIN  `idsids_tracking_idsvehicles`.`dudes_states`
										ON `dudes_states`.`state_abrv` =  `dealer_prospects`.`state`
				";									



mysqli_select_db($tracking_mysqli, $database_tracking);
echo $query_distnct_dlrprspct_dtypes = "
SELECT  count( DISTINCT `dtype_id` ) AS `total_city_records`, `dealer_prospects`.`city`, `dudes_dealer_types`.`dtype_id`, `dudes_dealer_types`.`dtype_label` FROM  `idsids_tracking_idsvehicles`.`dudes_dealer_types`
 
	
	 LEFT JOIN  `idsids_tracking_idsvehicles`.`dealer_prospects`
										ON `dealer_prospects`.`dealer_type_id` =  `dudes_dealer_types`.`dtype_id`
				 LEFT JOIN  `idsids_tracking_idsvehicles`.`dudes_states`
										ON `dudes_states`.`state_abrv` =  `dealer_prospects`.`state`
				
				
	
WHERE 
`dealer_prospects`.`state` = '$prospect_states'
AND
`dealer_prospects`.`city` = '$prospect_cities'

 GROUP BY `dtype_id` ORDER BY `dtype_id` ASC

 
";
$distnct_dlrprspct_dtypes = mysqli_query($tracking_mysqli, $query_distnct_dlrprspct_dtypes);


$row_distnct_dlrprspct_dtypes = mysqli_fetch_array($distnct_dlrprspct_dtypes);
$totalRows_distnct_dlrprspct_dtypes = mysqli_num_rows($distnct_dlrprspct_dtypes);




?>
		<option value="">ALL</option>
    <?php 
	if($totalRows_distnct_dlrprspct_dtypes != 0 ){
	do {  ?>
    <option value="<?php echo $row_distnct_dlrprspct_dtypes['dtype_id']?>"><?php echo $row_distnct_dlrprspct_dtypes['dtype_label']?> (<?php echo $row_distnct_dlrprspct_dtypes['total_city_records']; ?>)</option>
    <?php
	} while ($row_distnct_dlrprspct_dtypes = mysqli_fetch_array($distnct_dlrprspct_dtypes));
	  $rows = mysqli_num_rows($distnct_dlrprspct_dtypes);
	  if($rows > 0) {
		  mysqli_data_seek($distnct_dlrprspct_dtypes, 0);
		  $row_distnct_dlrprspct_dtypes = mysqli_fetch_array($distnct_dlrprspct_dtypes);
	  }
	  
	  
	}else{
?>


 
 <?php } ?>
  <option value="">None Selected</option>
<?php endif; ?>
<?php include("inc.end.phpmsyql.php"); ?>