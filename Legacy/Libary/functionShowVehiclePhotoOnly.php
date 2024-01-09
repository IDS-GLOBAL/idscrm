<?php

function showphoto ($vphoto){
			//$cvid = $row_customer_leads['customer_vehicles_id'];

			$findexisting = "SELECT *  FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vid` = '".$vphoto."'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysql_fetch_array($findmyresult);

			if(!$vrow['vid']){
				
				echo '';
				
			}else{
					$vstatus = $vrow['vlivestatus'];
					echo '<br>';
					$vphoto=$vrow['vthubmnail_file_path'];
					if(!$vphoto){
					echo "<img src='images/icon06.gif' width='16px' >";
					}else{
					echo '<br>';
					echo "<img src='$vphoto' width='70px' >";
					echo '<br>';
					
						if ($vstatus == 0) {
							echo "ON HOLD!";
						}
						if ($vstatus == 1) {
							echo "LIVE!";
						}
		
						if ($vstatus == 9) {
							echo "SOLD!";
						}
		
						else { 
							echo " ";
						}
				
			}

					
			}
			
			
									

}



?>




