<?php require_once("db_loggedin.php"); ?>
<?php

	if(!$_POST) exit();

	//echo 'script_decodevin.php Loaded!';
	//print_r($_POST);



if(isset($_POST['vvin'])):



	@$vvin = mysqli_real_escape_string($idsconnection_mysqli, $_POST['vvin']);
	@$vvin = strtoupper($vvin);
	
	$checkvin = mysqli_query($idsconnection_mysqli, "SELECT vid, did, vvin FROM `vehicles` WHERE vvin='$vvin'");
	$checkvin_num_rows = mysqli_num_rows($checkvin);
	//echo $check_num_rows;

if(strlen($vvin) < 17){

	echo 'VIN Too Short';

}else{
	
	include('../Libary/vin-number-check.php');
	
	if($checkvin_num_rows==0)
	echo "<div class='safe'>Yes! This VIN Number Is Available For Use.</div>";
	else if ($checkvin_num_rows==1)
		while($vrow = mysqli_fetch_array($checkvin))
			  {
		$vid=$vrow['vid'];
		$vdid=$vrow['did'];
		
		if($did == $vdid){

				echo "<div class='danger'>Sorry! VIN Number IS Already In USE IT Belongs To YOU $did Please Change Before Submitting <a href='inventory-edit.php?vid=$vid' target='_blank'>Click Here...</a></div>";
						 
						 }else{
							 
				echo "<div class='danger'>Sorry! We Have Record That This Vehicle By VIN Belongs To Another Dealer ID: $vdid <p>Please Change Before Submitting or Click Here To Transfer This Vehicle Into Your Inventory <a href='inventory-transfer.php?vid=$vid' target='_blank'>Click Here...</a></p></div><div></div>";

							 }
			   }
}

endif;

?>