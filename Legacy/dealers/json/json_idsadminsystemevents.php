<?php require_once("db.php"); ?>
<?php
		// HOT LINKS
		// http://php.net/manual/en/timezones.america.php
		
		
		// Hostgator Time Zone is   "America/Chicago"
		// My Time Zone Is "America/New_York"
		
		// Eastern ........... America/New_York
		// Central ........... America/Chicago
		// Mountain .......... America/Denver
		// Mountain no DST ... America/Phoenix
		// Pacific ........... America/Los_Angeles
		// Alaska ............ America/Anchorage
		// Hawaii ............ America/Adak
		// Hawaii no DST ..... Pacific/Honolulu


		// SELECT CONVERT_TZ('2012-01-01 12:00:00','GMT','America/Chicago');

		// SELECT CONVERT_TZ('2004-01-01 12:00:00','GMT','America/New_York');


function convertsysm($milliseconds){

$month="";
$formattted="";
$formattted .= date('Y', strtotime($milliseconds));
$month .= ', '.date('n', strtotime($milliseconds));
		 $month_sub = 1-$month;
		$formattted .= ', '.$month_sub;
$formattted .= ', '.date('d', strtotime($milliseconds));
$formattted .= ', '.date('h', strtotime($milliseconds));
$formattted .= ', '.date('i', strtotime($milliseconds));
//$formattted .= ', '.date('s', strtotime($milliseconds));

$format  = $formattted;

return $format;
return $milliseconds;

}

		//	str_replace(' am', '', $dlr_appt_endunixtime);

		mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
		$query_sys_appts = "SELECT * FROM `dealers_appointments` WHERE `dealers_appointments`.`dlr_appt_did` = '$did' AND `dealers_appointments`.`ids_sys_owned` IS NOT NULL";
		$find_sys_appts = mysqli_query($idsconnection_mysqli, $query_sys_appts);
		$row_find_sys_appts = mysqli_fetch_assoc($find_sys_appts);
		$totalRows_find_sys_appts = mysqli_num_rows($find_sys_appts);
		


$count_totalRows_find_sys_appts=1;
echo "
{ events :[
";


do {

			//print_r($row);

$count_totalRows_find_sys_appts++;
			
			
			
			$dlr_appt_id = $row_find_sys_appts['dlr_appt_id'];
			$dlr_appt_title = $row_find_sys_appts['dlr_appt_title'];
			$dlr_appt_startunixtime = $row_find_sys_appts['dlr_appt_startunixtime'];
			$dlr_appt_endunixtime = $row_find_sys_appts['dlr_appt_endunixtime'];
			$appt_url_goto = $row_find_sys_appts['appt_url_goto'];
			$dlr_appt_token = $row_find_sys_appts['dlr_appt_token'];
			$className = 'idsRobot';
			
			if(!$appt_url_goto){$appt_url_goto = 'appointment.php?appt_token='.$dlr_appt_token;}

						echo "{
							";
						
				  //echo "id: $dlr_appt_id,"."\n";
				  echo "id: '$dlr_appt_token',"."\n";
				  echo "title: '$dlr_appt_title',"."\n";
				  echo 'start: new Date('.convertsysm($dlr_appt_startunixtime). '),'."\n";
				  echo 'end: new Date('.convertsysm($dlr_appt_endunixtime).'),'."\n";
				  echo "allDay: false,"."\n";
				  echo "color: '#F21D1D',"."\n";
				  echo "className: '$className',"."\n";
				  echo "overlap: true,"."\n";
				  echo "backgroundColor: '#17F06C',"."\n";
				  echo "url: '$appt_url_goto'"."\n";

					echo "}";

					if($count_totalRows_find_sys_appts != $totalRows_find_sys_appts){
					

							echo ",";
					
						}else{
					

						echo "";
						
						}


 } while ($row_sys_appts = mysqli_fetch_assoc($find_sys_appts)); 



$count_totalRows_find_sys_appts=1;

echo"
                ]
	},


			




";


?>