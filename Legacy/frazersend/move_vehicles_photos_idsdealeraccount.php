<?php

$query_find_idsfrazerdlr2 = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`feedidfrazer` = '$newidsfrazerno' AND `dealers`.`email` = '$newidsemail' ORDER BY `dealers`.`created_at` DESC LIMIT 1";
$find_idsfrazerdlr2 = mysqli_query($idsconnection_mysqli, $query_find_idsfrazerdlr2);
$row_find_idsfrazerdlr2 = mysqli_fetch_assoc($find_idsfrazerdlr2);
$totalRows_find_idsfrazerdlr2 = mysqli_num_rows($find_idsfrazerdlr2);


$thedid = $row_find_idsfrazerdlr2['id'];
$thefrazerno = $row_find_idsfrazerdlr2['feedidfrazer'];

$idsfrazeruserpassword  = $row_find_idsfrazerdlr2['password'];
$company_name = $row_find_idsfrazerdlr2['company'];
$useremail = $row_find_idsfrazerdlr2['email'];


if(!$thedid || !$thefrazerno ){

	$log .="Sorry No vehicles were processed everything Was done everything is in que".'<br />';
	

}else{

$log .=  "Finally We Have Found The Did: $thedid In IDS System And Fazer Number: $thefrazerno".'<br />';
$log .= "Now Proceeding To Process".'<br />';


	chdir(dirname(__FILE__));

		include("run_frazerfiles.php");
				
}



?>