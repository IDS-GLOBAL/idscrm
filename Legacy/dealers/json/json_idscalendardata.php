<?php

include("json/db.php");

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


function convertm($milliseconds){


$formattted="";
$formattted .= date('Y', strtotime($milliseconds));
$formattted .= ', '.date('n', strtotime($milliseconds));
$formattted .= ', '.date('d', strtotime($milliseconds));
$formattted .= ', '.date('h', strtotime($milliseconds));
$formattted .= ', '.date('i', strtotime($milliseconds));
//$formattted .= ', '.date('s', strtotime($milliseconds));

$format  = $formattted;

return $format;
return $milliseconds;

}

		
		
		//$did = '19';
		mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
		$query_appts = "SELECT * FROM `dealers_appointments` WHERE `dealers_appointments`.`dlr_appt_did` = '$did' ";
		$find_appts = mysqli_query($idsconnection_mysqli, $query_appts);
		$row_find_appts = mysqli_fetch_assoc($find_appts);
		$totalRows_find_appts = mysqli_num_rows($find_appts);

		$result_find_appts = array();

		while( $row = mysql_fetch_array($find_appts) )
				

				
				
				
				 
				array_push($result_find_appts, array(
							  'id' => $row['dlr_appt_id'], 
							  'title' => $row['dlr_appt_title'], 
							  'start' => 'new Date('.convertm($row['dlr_appt_startunixtime_milli']).')',
							  'end' => 'new Date('.convertm($row['dlr_appt_endunixtime_milli']).')',
							  'url' => $row['appt_url_goto'],
							  'allDay' => false,
							  'color' => '#F21D1D'
							  )
				);
				

				
				
				 $array_final =  json_encode(array('events' => $result_find_appts));
				 $array_final = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$array_final);
 				 //$result_find_appts = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$result_find_appts);

				 echo $array_final;


?>