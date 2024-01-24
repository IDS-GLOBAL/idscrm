<?php

mysql_connect("localhost", "idsids_faith", "benjamin2831");
mysql_select_db("idsids_idsdms");

@$username = mysql_real_escape_string($_POST['username']);

$check = mysqli_query($idsconnection_mysqli, "SELECT email FROM dealers WHERE email='$username'");
$check_num_rows = mysqli_num_rows($check);
//echo $check_num_rows;

if($username == NULL)
echo 'Please Enter Your Email';	
else if(strlen($username) <8)
echo 'Too Short';

else
{
	if($check_num_rows==0)
	echo 'Available!';
	else if ($check_num_rows==1)
	echo 'Not Available';
}

?>