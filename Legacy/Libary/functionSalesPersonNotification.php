<?php
//$sid = '6';
//$did = '85';

function salespersontop($sid, $did){



			// Grouing Sales person With Dealer
			//
			$findDealer = "SELECT * FROM dealers, sales_person 
							WHERE 
							salesperson_id = '$sid' 
							AND 
							dealers.id = '".$did."'";
			$mydealerResult = mysqli_query($idsconnection_mysqli, $findDealer);			
			$grouprow = mysql_fetch_array($mydealerResult);
			
			$website = $grouprow['website'];
			$url = "http://www.$website";
			$link = "<a href='$url' target='_blank'> $website </a>";
			
			// Variable Definitions
			echo $grouprow['company'];
			
			echo ' - ';
			
			echo $link;
			
			echo ' ';
			
			
			
			
			
			
									

}



?>




