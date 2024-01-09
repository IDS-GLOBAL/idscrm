<?php

$dbservertype='mysql';

// hostname or ip of server
$servername='localhost';

$dbusername='idsids_faith';
$dbpassword='benjamin2831';

$dbname='idsids_tracking_idsvehicles';

////////////////////////////////////////
////// DONOT EDIT BELOW  /////////
///////////////////////////////////////

connecttodb($servername,$dbname,$dbusername,$dbpassword);
function connecttodb($servername,$dbname,$dbuser,$dbpassword)
{
global $link;
$link=mysql_connect ("$servername","$dbuser","$dbpassword");
if(!$link){die("Could not connect to MySQL");}
mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
}

?>