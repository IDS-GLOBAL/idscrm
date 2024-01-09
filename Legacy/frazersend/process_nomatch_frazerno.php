<?php

  $log .= ':::Processing A No System Match:::';


// Search For System Dealer With Frazer No 
// Could Be Already In System Dealers OR Maybe Added by admin/someone or previously processed by script

$query_find_frzrno_n_dealersystem = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`feedidfrazer` = '$newidsfrazerno'";
$find_frzrno_n_dealersystem = mysqli_query($idsconnection_mysqli, $query_find_frzrno_n_dealersystem);
$row_find_frzrno_n_dealersystem = mysqli_fetch_assoc($find_frzrno_n_dealersystem);
$totalRows_find_frzrno_n_dealersystem = mysqli_num_rows($find_frzrno_n_dealersystem);

$foundfrazerno_withdid = $row_find_frzrno_n_dealersystem['id'];
$foundfrazerno_withemail = $row_find_frzrno_n_dealersystem['email'];
$found_frazerno_alone = $row_find_frzrno_n_dealersystem['feedidfrazer'];

if($foundfrazerno_withdid){
			 $log .= ':::::::::::::::::::::::::::::::::::::::::::::::::::::::'.'<br />';
			 $log .= "Hey I Found Frazer Number: $found_frazerno_alone belong to DID:$foundfrazerno_withdid In IDS System:".'<br />';

			
			include("check_existing_andupdate.php");
			

		
}else{
			 $log .= ':::::::::::::::::::::::::::::::::::::::::::::::::::::::'.'<br />';

			  $log .= 'Sorry I Could Not Find Frazer Number In IDS System:'.'<br />';

			include("check_exisiting_idsemail.user.php");

}



?>