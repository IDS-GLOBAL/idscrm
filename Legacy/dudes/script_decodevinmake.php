<?php require_once("db_admin.php"); ?>
<?php

if(!$_POST) exit;


//print_r($_POST);



if(isset($_POST['vvin'])):



	if(strlen($_POST['vvin']) == 17)
	{


//Note: The Letters I, O and Q never appear in a VIN.
if(isset($_POST['vin'])){
	
	$vvin_num = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vin']));
	@$vvin_num = strtoupper($vvin_num);
	$valid = 1;
	
}elseif(isset($_POST['vvin'])){
	
	$vvin_num = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));
	@$vvin_num = strtoupper($vvin_num);
	$valid = 1;		
}else{
	
	//exit;
	$vvin_num = "3GNFK22049G175526";
	$valid = 0;
}

$a = $vvin_num{0};		//First Digit Country
$b = $vvin_num{1};		//Second Digit Manufacturer
$c = $vvin_num{2};		//Third Digit Manufacturer Type
$d = $vvin_num{3};		//Forth Digit Details
$e = $vvin_num{4};
$f = $vvin_num{5};
$g = $vvin_num{6};		//Seventh Digit
$h = $vvin_num{7};
$i = $vvin_num{8};
$j = $vvin_num{9};		//Tenth Digit
$k = $vvin_num{10};
$l = $vvin_num{11};
$m = $vvin_num{12};
$n = $vvin_num{13};
$o = $vvin_num{14};
$p = $vvin_num{15};
$q = $vvin_num{16};



$vinmake = $a.$b.$c;
 
@$vinmake = strtoupper($vinmake);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vinmake = "SELECT * FROM `idsids_idsdms`.`vvin_wmionetwothree` WHERE `vvin_wmi_code` = '$vinmake'";
$find_vinmake = mysqli_query($idsconnection_mysqli, $query_find_vinmake);
$row_find_vinmake = mysqli_fetch_array($find_vinmake);
$totalRows_find_vinmake = mysqli_num_rows($find_vinmake);

		if($totalRows_find_vinmake == 0){
		//echo $vmake = $row_find_vinmake['vvin_wmi_manuf'];
		echo $vmake = 'Error';

		}else{
			echo $vmake = $row_find_vinmake['vvin_wmi_manuf'];
		}

	}else{


			echo $vmake = 'Error';


	}


endif;

?>