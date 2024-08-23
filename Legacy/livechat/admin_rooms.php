<?php
       
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

// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isadminsetting = $people['isadmin'];
$show_arrival = $people['show_arrival']; 
$user_alert = $people['user_alert'];  
$lastaction = date("Ymdhis");
$startdate =  date("Ymd");
 
$colorfile = "images/".$CSLH_Config['colorscheme']."/adminstyle.css";

 


$timeof = date("YmdHis");
$timeof_old = $timeof - 100000;

if(!(isset($UNTRUSTED['alterations']))){ $UNTRUSTED['alterations'] = ""; }
if(!(isset($UNTRUSTED['auto_focus']))){ $UNTRUSTED['auto_focus'] = ""; }
if(!(isset($UNTRUSTED['status']))){ $UNTRUSTED['status'] = ""; }
if(!(isset($UNTRUSTED['show_arrival_new']))){ $UNTRUSTED['show_arrival_new'] = ""; }
if(!(isset($UNTRUSTED['user_alert_new']))){ $UNTRUSTED['user_alert_new'] = ""; }
if(!(isset($UNTRUSTED['typing_alert_new']))){ $UNTRUSTED['typing_alert_new'] = ""; }
if(!(isset($UNTRUSTED['auto_invite']))){ $UNTRUSTED['auto_invite'] = ""; }

$alterations_sql = "";
 
$prev = mktime ( date("H"), date("i")-35, date("s"), date("m"), date("d"), date("Y") );
$oldtime = date("YmdHis",$prev);
$rightnow = date("YmdHis");
 
 
if(($UNTRUSTED['alterations'] == "Y") && ($UNTRUSTED['show_arrival_new'] == "")){
	 $UNTRUSTED['show_arrival_new'] = "N"; } 
if(($UNTRUSTED['alterations'] == "Y") && ($UNTRUSTED['user_alert_new'] == "")){ 
	$UNTRUSTED['user_alert_new'] = "Y"; } 
if($UNTRUSTED['status'] == ""){ $UNTRUSTED['status'] = "Y"; } 

if($UNTRUSTED['alterations'] == "Y"){
  $alterations_sql = "auto_invite='".filter_sql($UNTRUSTED['auto_invite'])."',show_arrival='".filter_sql($UNTRUSTED['show_arrival_new'])."',user_alert='".filter_sql($UNTRUSTED['user_alert_new'])."',typing_alert='".filter_sql($UNTRUSTED['typing_alert_new'])."',";
}
    
if($UNTRUSTED['status'] == "N"){
$query = "UPDATE livehelp_users set " . $alterations_sql . "isonline='N',lastaction='$rightnow',status='offline',auto_invite='N' WHERE sessionid='".$identity['SESSIONID']."'";
$mydatabase->query($query);
}
if($UNTRUSTED['status'] == "Y"){
$query = "UPDATE livehelp_users set " . $alterations_sql . "isonline='Y',lastaction='$rightnow',status='chat' WHERE sessionid='".$identity['SESSIONID']."'";
$mydatabase->query($query);
}



$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";
$data = $mydatabase->query($query);
$row = $data->fetchRow(DB_FETCHMODE_ASSOC);
 
$offline = "  ";
$online = "  ";
$show_arrival = "  ";
$user_alert = "  ";
$auto_invite = "  ";
$typing_alert = " ";
$auto_focus = " ";

if($row['isonline'] == "N")
	$offline = " SELECTED ";

if($row['isonline'] == "Y")
	$online = " SELECTED ";

if($row['show_arrival'] == "Y")
	$show_arrival = " CHECKED ";

if($row['user_alert'] == "N")
	$user_alert = " CHECKED ";

if($row['typing_alert'] == "Y")
	$typing_alert = " CHECKED ";


if($row['auto_invite'] == "Y")
	$auto_invite = " CHECKED ";

if( ($UNTRUSTED['auto_focus']=="Y") || ($UNTRUSTED['alterations'] ==""))
  $auto_focus = " CHECKED ";

?>
<html>
<head>
<SCRIPT type="text/javascript">

function my_auto_invite(){
  url = 'autoinvite.php';
  if(document.mine.auto_invite.checked){
    window.open(url, 'chat545087', 'width=590,height=400,menubar=no,scrollbars=1,resizable=1');
  }
  for($i=0;$i<100000;$i++){
   // sleep  	
  }
   document.mine.submit();
   
}
 
</SCRIPT>
<?php require_once("_inc.head.php"); ?>

<div id="admin_rooms" marginheight=0 marginwidth=0 leftmargin=0 topmargin=4>
<SCRIPT type="text/javascript">
 
function showhelpwindow(num){	
	  window.open('helpwindow.php?info=' + num, 'helpwindows', 'width=585,height=390,menubar=no,scrollbars=1,resizable=1');
}

</SCRIPT>
<div class="row">
                <div class="col-lg-12">
                            <div class="row">
<form action="admin_rooms.php" method="post" name="mine">
<table id="tbl_admin_rooms" class="table table-bordered"  width="100%">
<thead>
<th><image src="images/blank.gif" width="10" height="10" border="0"></th>
<th>
<select id="crafty_status" name="status" onchange="document.mine.submit()" class="form-control">
<option value="Y" <?php echo $online; ?> ><?php echo $lang['online']; ?></option>
<option value="N" <?php echo $offline; ?>><?php echo $lang['offline']; ?></option>
</select></th>
<th><input type="checkbox" value="Y" name="auto_invite" <?php echo $auto_invite; ?> onClick="javascript:my_auto_invite();"><b><font color=007777><?php echo $lang['txt134']; ?></font></b><a href="javascript:showhelpwindow(4)">(?)</a></th>
<th><input type="checkbox" value="Y" name="show_arrival_new" <?php echo $show_arrival; ?> onclick="document.mine.submit()" ><b><?php echo $lang['txt135']; ?></b><a href="javascript:showhelpwindow(5)">(?)</a></th>
<th><input type="checkbox" value="N" name="user_alert_new"  <?php echo $user_alert; ?> onclick="document.mine.submit()" ><b><?php echo $lang['txt136']; ?></b><a href="javascript:showhelpwindow(6)">(?)</a></th>
<th><input type="checkbox" value="Y" name="typing_alert_new"  <?php echo $typing_alert; ?> onclick="document.mine.submit()" ><b>Typing Alert</b><a href="javascript:showhelpwindow(7)">(?)</a></th>
<th><input type="checkbox" value="Y" name="auto_focus"  <?php echo $auto_focus; ?> ><b><?php echo $lang['txt169']; ?></b><a href="javascript:showhelpwindow(8)">(?)</a></th>
</thead>
</table>
<input type="hidden" name="alterations" value="Y">
</form>
							</div>
					</div>
				</div>
<br><br>
<?php if(!(empty($UNTRUSTED['playsound']))){  
          $soundwav = " <EMBED SRC=". $alerttyping ." AUTOSTART=TRUE VOLUME=100 width=1 height=1 LOOP=FALSE>\n";
          print $soundwav;
 } ?>
</div>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>