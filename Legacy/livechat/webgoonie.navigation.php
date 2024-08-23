<?php
       
// --------------------------------------------------------------------------
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
$username = $people['username'];
$isadminsetting = $people['isadmin'];

$lastaction = date("Ymdhis");
$startdate =  date("Ymd");
 
//$colorfile = "images/".$CSLH_Config['colorscheme']."/adminstyle.css";
?>
<SCRIPT type="text/javascript" >
r_arrow = new Image;
h_arrow = new Image;
r_arrow.src = 'images/arrow_off.gif';
h_arrow.src = 'images/arrow_on.gif';

function openwindow(url){ 
 window.open(url, 'chat54057', 'width=572,height=320,menubar=no,scrollbars=1,resizable=1');
}
</SCRIPT>

<table id="table_big_chat" cellpadding="0" cellspacing="0" border="0" width="100%">
 <br><center>
 		<b>Currently Logged in<br> as: <?php print $username; ?></b> &nbsp; [<a href='logout.php' target='_top'><b><font color='#990000'>LOG OUT</font></b></a>]
</center>		
		</td></tr>
</table>
 
<br/>

<DIV id="left_chatnav" style="border: 1px #08245B dotted; width:192px;">
	 <table id="table_chatnav_one" class="chatnav" cellpadding="0" cellspacing="0" border="0" width="190">
 <tr><td class="sectionheader" align="left"><b><?php echo $lang['livehelp']; ?>:</b></td></tr> 
 <tr><td class="leftnavlink"><a href="live.php" onMouseOut="document.arrows6.src=r_arrow.src"  onmouseover="document.arrows6.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows6"><?php echo $lang['txt91']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="edit_quick.php" onMouseOut="document.arrows7.src=r_arrow.src"  onmouseover="document.arrows7.src=h_arrow.src" target="contents"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows7"><?php echo $lang['txt32']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="edit_quick.php?typeof=IMAGE" onMouseOut="document.arrows8.src=r_arrow.src"  onmouseover="document.arrows8.src=h_arrow.src" target="contents"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows8"><?php echo $lang['txt30']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="edit_quick.php?typeof=URL" onMouseOut="document.arrows9.src=r_arrow.src"  onmouseover="document.arrows9.src=h_arrow.src" target="contents"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows9"><?php echo $lang['txt28']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="autoinvite.php" onMouseOut="document.arrows12a.src=r_arrow.src"  onmouseover="document.arrows12a.src=h_arrow.src" target="contents"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows12a"><?php echo $lang['txt132']; ?></a></td></tr> 
 <tr><td class="leftnavlink"><a href="admin.php?page=edit_smile.php&tab=settings" onMouseOut="document.arrows10.src=r_arrow.src"  onmouseover="document.arrows10.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows10">Emotion Icons</a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=edit_layer.php&tab=settings" onMouseOut="document.arrows11.src=r_arrow.src"  onmouseover="document.arrows11.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows11">Edit Layer Images</a></td></tr>
 

</table>
</DIV>
<br/>

<DIV STYLE="border: 1px #08245B dotted;width:192px;">
	 <table id="table_chatnav_two" class="chatnav" cellpadding="0" cellspacing="0" border="0" width="190">
 <tr><td class="sectionheader" align="left"><b><?php echo $lang['operators']; ?>:</b></td></tr> 
 <tr><td class="leftnavlink"><a href="operators.php?editit=<?php echo $myid ?>" onMouseOut="document.arrows13.src=r_arrow.src"  onmouseover="document.arrows13.src=h_arrow.src" target="contents"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows13"><?php echo $lang['EDIT']; ?> Your account</a></td></tr>
<?php if ($isadminsetting=="Y" ) { ?>
  <tr><td class="leftnavlink"><a href="admin.php?page=operators.php&tab=oper" onMouseOut="document.arrows14.src=r_arrow.src"  onmouseover="document.arrows14.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows14"><?php echo $lang['CREATE']; ?>/<?php echo $lang['EDIT']; ?>/<?php echo $lang['DELETE']; ?></a></td></tr>
<?php } ?>
</table>
</DIV>
<br/>

<?php if( ($isadminsetting == "Y") || ($isadminsetting == "N") || ($isadminsetting == "R") ){ ?>

<?php if ($isadminsetting != "R") {  ?>
<DIV STYLE="border: 1px #08245B dotted;width:192px;">
	 <table id="table_chatnav_three" class="chatnav" cellpadding="0" cellspacing="0" border="0" width="190">
 <tr><td class="sectionheader" align="left"><b><?php echo $lang['dept']; ?>:</b></td></tr> 
 <tr><td class="leftnavlink"><a href="admin.php?page=departments.php&tab=dept&help=1" onMouseOut="document.arrows15.src=r_arrow.src"  onmouseover="document.arrows15.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows15">HTML CODE for <?php echo $lang['dept']; ?></a></td></tr>
 <?php if ($isadminsetting=="Y" ) { ?>
  <tr><td class="leftnavlink"><a href="admin.php?page=departments.php&tab=dept" onMouseOut="document.arrows16.src=r_arrow.src"  onmouseover="document.arrows16.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows16"><?php echo $lang['CREATE']; ?>/<?php echo $lang['EDIT']; ?>/<?php echo $lang['DELETE']; ?></a></td></tr> 
 <?php } ?>
 
</table>
</DIV>
<br/>
<?php } ?>

<DIV STYLE="border: 1px #08245B dotted;width:192px;">
	 <table id="table_chatnav_four" class="chatnav" cellpadding="0" cellspacing="0" border="0" width="190">
 <tr><td class="sectionheader" align="left"><b><?php echo $lang['data']; ?>:</b></td></tr> 
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=0" onMouseOut="document.arrows17.src=r_arrow.src"  onmouseover="document.arrows17.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows17"><?php echo $lang['txt100']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=1" onMouseOut="document.arrows18.src=r_arrow.src"  onmouseover="document.arrows18.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows18">Messages</a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=2" onMouseOut="document.arrows19.src=r_arrow.src"  onmouseover="document.arrows19.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows19"><?php echo $lang['txt98']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=3" onMouseOut="document.arrows20.src=r_arrow.src"  onmouseover="document.arrows20.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows20"><?php echo $lang['txt99']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=4" onMouseOut="document.arrows21.src=r_arrow.src"  onmouseover="document.arrows21.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows21">Paths</a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=5" onMouseOut="document.arrows22.src=r_arrow.src"  onmouseover="document.arrows22.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows22"><?php echo $lang['keywords']; ?></a></td></tr>
 <tr><td class="leftnavlink"><a href="admin.php?page=data.php&tab=data&alttab=6" onMouseOut="document.arrows23.src=r_arrow.src"  onmouseover="document.arrows23.src=h_arrow.src" target="_top"><img src=images/arrow_off.gif width="20" height="12" border="0" name="arrows23"><?php echo $lang['users']; ?></a></td></tr>    
</table>
</DIV>
<br/>
<?php } ?>

 
<br/> 
 
 
<br/> 

 
<br/> 
</center> 
</body>
</html>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>