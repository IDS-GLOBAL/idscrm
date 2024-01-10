<?php //include("db_loggedin.php"); ?>
<?php

		// Full Calendar Website For Making these damn date formats
		//http://fullcalendar.io/docs/views/View-Specific-Options/


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

/*


$task_id=NULL;
$task_completed=NULL;
$task_snooze=NULL;
$task_token=NULL;
$robot_sendemail=NULL;
$task_vid =NULL;
$task_action_id=NULL;
$task_title=NULL;
$task_timezone=NULL;
$taskstart=NULL;
$taskend=NULL;
$task_starttime_milli=NULL;
$task_endtime_milli=NULL;
$task_message=NULL;





 
 
$dlr_appt_token=NULL;
$task_token=NULL;
$appt_url_goto = NULL;


*/


function convertdlrtask($milliseconds){

$month="";
$formattted="";
$formattted .= date('Y', strtotime($milliseconds));
$month .= ', '.date('n', strtotime($milliseconds));

if(date('n', strtotime($milliseconds)) > 2)
{
		$month_sub = 2+$month;
}else{
		$month_sub = 1+$month;
}


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
		$query_dlr_tasks = "SELECT * FROM `dealers_tasks` WHERE `dealers_tasks`.`task_did` = '$did'";
		$find_dlr_tasks = mysqli_query($idsconnection_mysqli, $query_dlr_tasks);
		$row_find_dlr_tasks = mysqli_fetch_array($find_dlr_tasks);
		$totalRows_find_dlr_tasks = mysqli_num_rows($find_dlr_tasks);
		


$count_totalRows_find_dlr_tasks=0;
echo "
{ events :[
";

if($totalRows_find_dlr_tasks == 0):


do {

			//print_r($row);

$count_totalRows_find_dlr_tasks++;
			
			
			
			$task_id = $row_find_dlr_tasks['task_id'];
			$task_completed = $row_find_dlr_tasks['task_completed'];
			$task_snooze = $row_find_dlr_tasks['task_snooze'];
			$task_token = $row_find_dlr_tasks['task_token'];
			$robot_sendemail = $row_find_dlr_tasks['robot_sendemail'];
			$task_vid = $row_find_dlr_tasks['task_vid'];
			$task_action_id = $row_find_dlr_tasks['task_action_id'];
			$task_title = $row_find_dlr_tasks['task_title'];
			$task_timezone = $row_find_dlr_tasks['task_timezone'];
			$taskstart_unixtime = $row_find_dlr_tasks['taskstart_unixtime'];
			$taskend_unixtime = $row_find_dlr_tasks['taskend_unixtime'];
			$task_starttime_milli = $row_find_dlr_tasks['task_starttime_milli'];
			$task_endtime_milli = $row_find_dlr_tasks['task_endtime_milli'];
			$task_message = $row_find_dlr_tasks['task_message'];
			$task_url_goto = "taskview.php?token=$task_token";
			
			
			$className = 'dealerTask';
			

						echo "{
							";
						
				  //echo "id: $dlr_appt_id,"."\n";
				  echo "id: '$task_token',"."\n";
				  echo "title: '$task_title  TotalTask: $totalRows_find_dlr_tasks    $count_totalRows_find_dlr_tasks   ',"."\n";
				  echo 'start: new Date('.convertdlrtask($taskstart_unixtime). '),'."\n";
				  echo 'end: new Date('.convertdlrtask($taskend_unixtime).'),'."\n";
				  echo "allDay: false,"."\n";
				  echo "color: '#F21D1D',"."\n";
				  echo "className: '$className',"."\n";
				  echo "overlap: true,"."\n";
				  echo "backgroundColor: '#17F06C',"."\n";
				  echo "url: '$task_url_goto'"."\n";

					

					if($count_totalRows_find_dlr_tasks == $totalRows_find_dlr_tasks){
					

							echo "}";
					
						}elseif($count_totalRows_find_dlr_tasks > $totalRows_find_dlr_tasks){

							echo "}";

						
						}else{
					

						echo "},";
						
						}


 } while ($row_find_dlr_tasks = mysqli_fetch_array($find_dlr_tasks)); 

endif;


echo "
                ]
	},


			




";


?>
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

if(date('n', strtotime($milliseconds)) > 2)
{
		$month_sub = 3+$month;
}else{
		$month_sub = 1+$month;
}
		 
		 
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
		$query_dealerappts = "SELECT * FROM `dealers_appointments` WHERE `dealers_appointments`.`dlr_appt_did` = '$did' AND `dealers_appointments`.`dlr_appt_sid` = '$sid' OR `dealers_appointments`.`ids_sys_owned` IS NULL";
		$find_dealerappts = mysqli_query($idsconnection_mysqli, $query_dealerappts);
		$row_find_dealerappts = mysqli_fetch_array($find_dealerappts);
		$totalRows_find_dealerappts = mysqli_num_rows($find_dealerappts);
		
		

echo "
{ events :[
";


$count_totalRows_find_dealerappts=0;


if($totalRows_find_dealerappts != 0):

		do{
			
			//print_r($row);

$count_totalRows_find_dealerappts++;
			
			
			
			$dlr_appt_id = $row_find_dealerappts['dlr_appt_id'];
			$dlr_appt_title = $row_find_dealerappts['dlr_appt_title'];
			$dlr_appt_startunixtime = $row_find_dealerappts['dlr_appt_startunixtime'];
			$dlr_appt_endunixtime = $row_find_dealerappts['dlr_appt_endunixtime'];
			//$appt_url_goto = $row_find_dealerappts['appt_url_goto'];
			if($row_find_dealerappts['dlr_appt_customer_id']){
				
				$appt_url_goto = 'script_ajax_dealerappointmentview.php?customer_id='.$row_find_dealerappts['dlr_appt_customer_id'];
			
				}elseif($row_find_dealerappts['dlr_appt_lead_id']){

				$appt_url_goto = 'script_ajax_dealerappointmentview.php?leadid='.$row_find_dealerappts['dlr_appt_lead_id'];
			
				}else{
				
				$appt_url_goto = '#';
			
			}
			
			$dlr_appt_token = $row_find_dealerappts['dlr_appt_token'];
			$className = 'dealerAppt';
			
			//if(!$appt_url_goto){$appt_url_goto = 'appointment.php?appt_token='.$dlr_appt_token;}

						echo "{
							";
						
				  //echo "id: $dlr_appt_id,"."\n";
				  echo "id: '$dlr_appt_token',"."\n";
				  echo "title: '$dlr_appt_title',"."\n";
				  echo "start: '$dlr_appt_startunixtime',"."\n";
				  echo "end: '$dlr_appt_endunixtime',"."\n";
				  echo "allDay: false,"."\n";
				  echo "color: '#F21D1D',"."\n";
				  echo "className: '$className',"."\n";
				  echo "overlap: true,"."\n";
				  echo "backgroundColor: '#23A5DE',"."\n";
				  echo "url: '$appt_url_goto'"."\n";

					if($count_totalRows_find_dealerappts == $totalRows_find_dealerappts){
					

							echo "}";

						
						}else{
					

						echo "},";
						
						}



 } while ($row_find_dealerappts = mysqli_fetch_array($find_dealerappts)); 

endif;

echo"
                ]
	},

";



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
		 //$month_sub = 1-$month;
if(date('n', strtotime($milliseconds)) > 2)
{
		$month_sub = 2+$month;
}else{
		$month_sub = 1+$month;
}

		 
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
		$row_find_sys_appts = mysqli_fetch_array($find_sys_appts);
		$totalRows_find_sys_appts = mysqli_num_rows($find_sys_appts);
		


$count_totalRows_find_sys_appts=0;
echo "
{ events :[
";



if($totalRows_find_sys_appts != 0):

do {

			//print_r($row);

$count_totalRows_find_sys_appts++;
			
			
			
			$dlr_appt_id = $row_find_sys_appts['dlr_appt_id'];
			$dlr_appt_title = $row_find_sys_appts['dlr_appt_title'];
			$dlr_appt_startunixtimee = $row_find_sys_appts['dlr_appt_startunixtime'];
			$dlr_appt_endunixtimee = $row_find_sys_appts['dlr_appt_endunixtime'];
			$appt_url_goto = $row_find_sys_appts['appt_url_goto'];
			$dlr_appt_token = $row_find_sys_appts['dlr_appt_token'];
			$className = 'idsRobot';
			
			if(!$appt_url_goto){$appt_url_goto = "appointment.php?appt_token=$dlr_appt_token";}

						echo "{
							";
						
				  //echo "id: $dlr_appt_id,"."\n";
				  echo "id: '$dlr_appt_token',"."\n";
				  echo "title: '$dlr_appt_title',"."\n";
				  echo "start: '$dlr_appt_startunixtime',"."\n";
				  echo "end: '$dlr_appt_endunixtime',"."\n";
				  echo "allDay: false,"."\n";
				  echo "color: '#F21D1D',"."\n";
				  echo "className: '$className',"."\n";
				  echo "overlap: true,"."\n";
				  echo "backgroundColor: '#17F06C',"."\n";
				  echo "url: '$appt_url_goto'"."\n";


					if($count_totalRows_find_sys_appts == $totalRows_find_sys_appts){
					

							echo "}";
					
						}else{
					

						echo "},";
						
						}


 } while ($row_find_sys_appts = mysqli_fetch_array($find_sys_appts)); 

endif;



echo"
                ]
	},


			




";
/**/


?>