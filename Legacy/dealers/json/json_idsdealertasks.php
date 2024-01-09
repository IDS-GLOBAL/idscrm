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




		//	str_replace(' am', '', $dlr_appt_endunixtime);

		mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
		echo $query_find_dlr_tasks = "SELECT * FROM `dealers_tasks` WHERE `task_did` = '$did'";
		$find_dlr_tasks = mysqli_query($idsconnection_mysqli, $query_find_dlr_tasks);
		$row_find_dlr_tasks = mysqli_fetch_assoc($find_dlr_tasks);
		$totalRows_find_dlr_tasks = mysqli_num_rows($find_dlr_tasks);
		


$count_totalRows_find_dlr_tasks=0;

echo "{ events :[";



do {

echo '{'."\n";

			//print_r($row);

$count_totalRows_find_dlr_tasks++;
			
			
			
			$task_id = $row_find_dlr_tasks['task_id'];
			$task_completed = $row_find_dlr_tasks['task_completed'];
			$task_snooze = $row_find_dlr_tasks['task_snooze'];
			$task_token_token = $row_find_dlr_tasks['task_token'];
			$robot_sendemail = $row_find_dlr_tasks['robot_sendemail'];
			$task_vid = $row_find_dlr_tasks['task_vid'];
			$task_action_id = $row_find_dlr_tasks['task_action_id'];
			$task_title = $row_find_dlr_tasks['task_title'];
			$task_timezone = $row_find_dlr_tasks['task_timezone'];
			echo '$taskstart_unixtime:  '.$taskstart_unixtime = $row_find_dlr_tasks['taskstart_unixtime'];
			$taskend_unixtime = $row_find_dlr_tasks['taskend_unixtime'];
			$task_starttime_milli = $row_find_dlr_tasks['task_starttime_milli'];
			$task_endtime_milli = $row_find_dlr_tasks['task_endtime_milli'];
			$task_message = $row_find_dlr_tasks['task_message'];
			$task_url_goto = "taskview.php?token=$task_token_token";

			$className = 'idsRobot';
			
			echo '$milliseconds = $taskstart_unixtime: '.$milliseconds = $taskstart_unixtime;

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
			
			echo '$format: '.$format  = $formattted;

			if(!$task_url_goto){$task_url_goto = 'appointment.php?appt_token='.$task_token_token;}


				  echo ""."\n";
				  echo "id: '$task_token_token',"."\n";
				  echo "title: '$task_title',"."\n";
				  echo 'start: new Date('.$format. '),'."\n";
				  echo 'end: new Date(2015, 11, 31, 23, 59),'."\n";
				  echo "allDay: false,"."\n";
				  echo "color: '#F21D1D',"."\n";
				  echo "className: '$className',"."\n";
				  echo "overlap: true,"."\n";
				  echo "backgroundColor: '#f8ac59',"."\n";
				  echo "url: '$task_url_goto'"."\n";

					//echo "}";

					if($count_totalRows_find_dlr_tasks != $totalRows_find_dlr_tasks){
					

							echo "},";
					
						}else{
					

						echo "}";
						
						}


 } while ($row_find_dlr_tasks = mysqli_fetch_assoc($find_dlr_tasks)); 




echo"
                ]
	},


			




";


?>