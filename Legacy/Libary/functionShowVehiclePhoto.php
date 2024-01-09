<?php

function showphoto ($cvid){


			//$cvid = $row_customer_leads['customer_vehicles_id'];

			$findexisting = "SELECT * FROM vehicles WHERE `vid` = '".$cvid."'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysql_fetch_array($findmyresult);

			if(!$vrow['vid']){
				
				echo 'No Vehicle';
				
			}else{
					$vstatus = $vrow['vlivestatus'];
					echo $vrow['vyear'].' ';																								
					echo $vrow['vmake'].' ';												
					echo $vrow['vmake'].' ';
					echo $vrow['vmodel'].' ';
					echo $vrow['vtrim'].' ';					
					echo '<br>';
					$vphoto=$vrow['vthubmnail_file_path'];
					if(!$vphoto){
					echo '';
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




