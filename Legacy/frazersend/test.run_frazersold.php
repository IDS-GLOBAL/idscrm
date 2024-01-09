<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_frazerdms = "localhost";
$database_frazerdms = "idsids_fazerdms";
$username_frazerdms = "idsids_frazer";
$password_frazerdms = "ultimate2015";
$frazerdms = mysql_connect($hostname_frazerdms, $username_frazerdms, $password_frazerdms) or trigger_error(mysql_error(),E_USER_ERROR); 



$ids_connectfindmatch3 = mysql_connect('localhost','idsids_frazer','ultimate2015', true); // resource id 2 is given
mysql_select_db($database_frazerdms, $ids_connectfindmatch3);
$query_frazerdms_soldvehicles = "SELECT * FROM frazer_vehicles WHERE vehicle_frazer_id = '970'";
$frazerdms_soldvehicles = mysqli_query($idsconnection_mysqli, $query_frazerdms_soldvehicles, $ids_connectfindmatch3);
$row_frazerdms_soldvehicles = mysqli_fetch_assoc($frazerdms_soldvehicles);
$totalRows_frazerdms_soldvehicles = mysqli_num_rows($frazerdms_soldvehicles);


		$nowtime = date('Y-m-d H:i:s');
		$against_time_now = date("Y-m-d H:i:s");
		$suboneday = date('Y-m-d H:i:s', strtotime("-1 days"));



function markidsvehicles_sold_orlive($suboneday, $vehicle_update_on, $soldvehicles_vehicle_id){



//global $thedid;
//global $frazerid;
//global $log;
global $suboneday;

						if($suboneday <= $vehicle_update_on){
							
								
									echo "Marking LIVE $suboneday".'<br />';
				
									$soldvehicles_vlivestatus = '1';
				
							}else{
							
									echo "Marking Sold $suboneday".'<br />';
				
									$soldvehicles_vlivestatus = '9';
				
						}



			$run_frazer_sold_sql = "UPDATE `idsids_idsdms`.`vehicles`  SET
												`vlivestatus` = '$soldvehicles_vlivestatus',
												WHERE `vehicles`.`vid` = '$soldvehicles_vehicle_id'
												";


	//$query_run_frazer_sol_sql = mysqli_query($idsconnection_mysqli, $run_frazer_sold_sql);






echo '<br />'.'<br />';







return;
}


















//////////////////////////////This is the Sold Section LOOPING //////////////////

do {



					$vehicle_update_on = $row_frazerdms_soldvehicles['vehicle_update_on'];






	$soldvehicles_vehicle_created_at = $row_frazerdms_soldvehicles['vehicle_created_at']; 

	$soldvehicles_vehicle_id = $row_frazerdms_soldvehicles['vehicle_id']; 


markidsvehicles_sold_orlive($suboneday, $vehicle_update_on, $soldvehicles_vehicle_id);
/*
echo $row_frazerdms_soldvehicles['vehicle_year']; 
echo $row_frazerdms_soldvehicles['vehicle_make']; 
echo $row_frazerdms_soldvehicles['vehicle_model']; 
echo $row_frazerdms_soldvehicles['vehicle_vin']; 
echo '<br />'.'<br />';

*/





} while ($row_frazerdms_soldvehicles = mysqli_fetch_assoc($frazerdms_soldvehicles)); 

?>