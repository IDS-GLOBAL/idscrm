<?php require_once('../db_admin.php'); ?>
<?php
if(!$_POST) exit;
//Note: The Letters I, O and Q never appear in a VIN.

if(isset($_POST['vvin'])){



	$vvin_num = mysqli_real_escape_string($idsconnection_mysqli, $_POST['vvin']);

		
}else{
	
	exit;
	$vvin_num = "3GNFK22049G175526";
}

//First Digit Country
$a = $vvin_num{0};
//Second Digit Manufacturer
$b = $vvin_num{1};
//Third Digit Manufacturer Type
$c = $vvin_num{2};
//Forth Digit Details
$d = $vvin_num{3};		
$e = $vvin_num{4};
$f = $vvin_num{5};
//Seventh Digit {6}
$g = $vvin_num{6};		
$h = $vvin_num{7};
$i = $vvin_num{8};
//Tenth Digit
$j = $vvin_num{9};		
$k = $vvin_num{10};
$l = $vvin_num{11};
$m = $vvin_num{12};
$n = $vvin_num{13};
$o = $vvin_num{14};
$p = $vvin_num{15};
$q = $vvin_num{16};



	if (is_numeric($g))
	{
	//earlier than 2010
	//echo 'IS Number';
	
	
	  $vinyear_range = '1980 AND 2010';
	 
	}else{
	
		//echo 'NOT A Number';
		$vinyear_range = '2010 AND 2029';
	
	}

 
 
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vinyear = "SELECT * FROM `vvin_ten` WHERE `idsids_idsdms`.`vinten_year` BETWEEN $vinyear_range AND `vinten_code` = '$j' ORDER BY `vinten_id` DESC";
$find_vinyear = mysqli_query($idsconnection_mysqli, $query_find_vinyear);
$row_find_vinyear = mysqli_fetch_array($find_vinyear);
$totalRows_find_vinyear = mysqli_num_rows($find_vinyear);
echo $vyear = $row_find_vinyear['vinten_year'];

	







?>
<?php include("../inc.end.phpmsyql.php"); ?>