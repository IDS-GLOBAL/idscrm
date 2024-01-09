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


function convertapptm($milliseconds){

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
		echo $query_appts = "SELECT * FROM `dealers_appointments` WHERE `dealers_appointments`.`dlr_appt_did` = '$did' AND `dealers_appointments`.`ids_sys_owned` IS NULL";
		$find_appts = mysqli_query($idsconnection_mysqli, $query_appts);
		$row_find_appts = mysqli_fetch_assoc($find_appts);
		$totalRows_find_appts = mysqli_num_rows($find_appts);
		
		

echo "
{ events :[
";


$count_totalRows_find_appts=1;

		do{
			
			//print_r($row);

$count_totalRows_find_appts++;
			
			
			
			echo '$dlr_appt_id: '.$dlr_appt_id = $row['dlr_appt_id'];
			$dlr_appt_title = $row['dlr_appt_title'];
			echo '$dlr_appt_startunixtime: '.$dlr_appt_startunixtime = $row['dlr_appt_startunixtime'];
			$dlr_appt_endunixtime = $row['dlr_appt_endunixtime'];
			$appt_url_goto = $row['appt_url_goto'];
			$dlr_appt_token = $row['dlr_appt_token'];
			$className = 'allEvents';
			
			if(!$appt_url_goto){$appt_url_goto = 'appointment.php?appt_token='.$dlr_appt_token;}

						echo "{
							";
						
				  //echo "id: $dlr_appt_id,"."\n";
				  echo "id: '$dlr_appt_token',"."\n";
				  echo "title: '$dlr_appt_title',"."\n";
				  echo 'start: new Date('.convertapptm($dlr_appt_startunixtime). '),'."\n";
				  echo 'end: new Date('.convertapptm($dlr_appt_endunixtime).'),'."\n";
				  echo "allDay: false,"."\n";
				  echo "color: '#F21D1D',"."\n";
				  echo "className: '$className',"."\n";
				  echo "overlap: true,"."\n";
				  echo "backgroundColor: '#23A5DE',"."\n";
				  echo "url: '$appt_url_goto'"."\n";

					echo "}";

					if($count_totalRows_find_appts != $totalRows_find_appts){
					

							echo ",";
					
						}else{
					

						echo "";
						
						}



 } while ($row_find_appts = mysqli_fetch_assoc($find_appts)); 

echo"
                ]
	},

";


?>