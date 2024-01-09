<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 

?>
<?php
//Note: The Letters I, O and Q never appear in a VIN.
if(isset($_POST['vin'])){
	
	$vvin_num = mysql_real_escape_string($_POST['vin']);

}elseif(isset($_POST['vvin'])){
	
	$vvin_num = mysql_real_escape_string($_POST['vvin']);
		
}else{
	
	exit;
	$vvin_num = "3GNFK22049G175526";
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
$query_find_vinyear = "SELECT * FROM `vvin_ten` WHERE `vinten_year` BETWEEN $vinyear_range AND `vinten_code` = '$j' ORDER BY `vinten_id` DESC";
$find_vinyear = mysqli_query($idsconnection_mysqli, $query_find_vinyear);
$row_find_vinyear = mysqli_fetch_assoc($find_vinyear);
$totalRows_find_vinyear = mysqli_num_rows($find_vinyear);
echo $vyear = $row_find_vinyear['vinten_year'];
?>