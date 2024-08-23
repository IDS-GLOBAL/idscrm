<?php
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *       
// --------------------------------------------------------------------------
// LICENSE:
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

 
if(!(empty($UNTRUSTED['alterations']))){
	if(empty($UNTRUSTED['typing_alert_new'])){ $UNTRUSTED['typing_alert_new'] = "N"; }
$query = "UPDATE livehelp_users set typing_alert='" . filter_sql($UNTRUSTED['typing_alert_new']) . "' WHERE sessionid='".$identity['SESSIONID']."'";
$mydatabase->query($query);
}


$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";
$data = $mydatabase->query($query);
$row = $data->fetchRow(DB_FETCHMODE_ASSOC);
 
$typing_alert = " ";
 
if($row['typing_alert'] == "Y")
	$typing_alert = " CHECKED ";
	
	
 ?>
 <body bgolor=#FFFFFF>
 	<form action="external_top.php" name="mine">
 		<input type=hidden name=alterations value="Y">
 		<table><tr>
 			<td NOWRAP height=31><input type=checkbox value=Y name=typing_alert_new  <?php echo $typing_alert; ?> onclick=document.mine.submit() ><b>Typing Alert</b></td>
 		</tr>
  </table>
 	</form>
<?php if(!(empty($UNTRUSTED['playsound']))){  
          $soundwav = " <EMBED SRC=sounds/" . $alerttyping . " AUTOSTART=TRUE width=1 height=1 LOOP=FALSE>\n";
           print $soundwav;
  } ?>
</body>