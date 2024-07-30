<?php

	$lead = $row_spleads['cust_leadid'];

	if(!$lead){
		include('_offleadisplay.php');
	}else{
		include('_onleadisplay.php'); 
	}

?>