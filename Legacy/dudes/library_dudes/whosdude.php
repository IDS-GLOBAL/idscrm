<?php


	function whosdudeid($dudesid){
	
	//require_once("config.php");
	require_once("../Connections/idsconnection.php");
	global $idsconnection_mysqli;
	global $database_idsconnection;
		
		
	 	//$string = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.dudes_id = '$dudesid'";
		
		mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
		$query_query_dudes = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.dudes_id = '$dudesid'";
		
		$query_dudes = mysqli_query($idsconnection_mysqli, $query_query_dudes);
		$row_query_dudes = mysqli_fetch_array($query_dudes);
		$totalRows_query_dudes = mysqli_num_rows($query_dudes);
		
		$fname = $row_query_dudes['dudes_firstname'];
		$lname = $row_query_dudes['dudes_lname'];
		
		echo $dudename = "$fname $lname";
		
		return;
		
	}


?>