<?php
//===========================================================================
//     This program may be modified or redistributed
//     under the terms of the GNU General Public License
//     as published by the Free Software Foundation; 
//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU General Public License for more details.
//
//     You should have received a copy of the GNU General Public License
//     along with this program in a file named LICENSE.txt .
//===========================================================================
require_once("admin_common.php");
validate_session($identity);

// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isadminsetting = $people['isadmin'];

$lastaction = date("Ymdhis");
$startdate =  date("Ymd");

// set them to offline..
$query = "UPDATE livehelp_users set isonline='N',lastaction='$oldtime',status='offline' WHERE sessionid='".$identity['SESSIONID']."'";
$mydatabase->query($query);

if(!($serversession))
  $mydatabase->close_connect();
?>
<title>Live help admin</title>
<frameset rows="40,*" border="0" frameborder="0" framespacing="0" spacing="0">
<frame src="admin_options.php?tab=admin" name="topofit" scrolling="no" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
<frame src="mastersettings.php" name="users" scrolling="AUTO" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
</frameset>