<?php

if(!$_POST) exit();


//print_r($_POST);



if(isset($_POST['vvin'])):



	if(strlen($_POST['vvin']) == 17)
	{

	include('../Libary/vin-number-year-check.php');

	}else{





	}


endif;

?>