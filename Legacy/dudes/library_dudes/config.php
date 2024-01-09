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
global $dbusername;
$link= mysqli_connect($servername,$dbusername,$dbpassword, $dbname);
if(!$link){die("Could not connect to MySQLI");}
mysqli_select_db($link, $dbname) or die ("could not open db".mysqli_error());
}



?>