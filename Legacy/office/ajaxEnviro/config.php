<?php

$dbservertype='mysql';

// hostname or ip of server
$servername='localhost';

$dbusername='idsids_faith';
$dbpassword='benjamin2831';

$dbname='idsids_idsdms';

////////////////////////////////////////
////// DONOT EDIT BELOW  /////////
///////////////////////////////////////

connecttodb($servername,$dbname,$dbusername,$dbpassword);
function connecttodb($servername,$dbname,$dbuser,$dbpassword)
{
global $link;
$link=mysqli_connect("$servername","$dbuser","$dbpassword","$dbname");
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 

if(!$link){die("Could not connect to MySQL");}
mysqli_select_db("$dbname",$link) or die ("could not open db".mysqli_error());
}

?>