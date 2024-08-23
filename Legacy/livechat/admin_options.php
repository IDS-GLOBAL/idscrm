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
$query = "SELECT * FROM `livehelp_users` WHERE `sessionid` = '".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
?>
<html>
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<?php include("_inc.head.php"); ?>
<link title="new" rel="stylesheet" href="images/<?php echo $CSLH_Config['colorscheme']; ?>/navigation.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<body id="admin_options" marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=#FFFFFF>

<div class="row">
 <div class="col-md-12">
 
 
 
 
<TABLE id="tbl_admin_options" BORDER=0 CELLSPACING=0 CELLPADDING=0 width=100%>
<tr>
<td align=left width='92%' nowrap='nowrap'>
	
<table id=""><tr><td><!--img src='images/blank.gif' height='23' width='455' border='0' --></td></tr>
	<tr><td>
	<table cellpadding=0 cellspacing=0 border=0 width=100% >
<tr>
 <td width='20'></td>

<?php if( ($UNTRUSTED['tab'] != "tabs") && ($UNTRUSTED['tab'] != "data") && ($UNTRUSTED['tab'] != "live") &&  ($UNTRUSTED['tab'] != "oper") && ($UNTRUSTED['tab'] != "dept") && ($UNTRUSTED['tab'] != "settings") ) {$class = "class=\"ontab\""; } else { $class = ""; } ?>

<?php if($isadminsetting!="L"){ ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a HREF="admin.php" target=_top><?php print navspaces("Overview Index") . str_replace(" ","&nbsp;","Overview Index") . navspaces("Overview Index"); ?></a></span></td>
<?php } ?>

<td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>

 <?php if($UNTRUSTED['tab'] == "live"){$class = "class=\"ontab\""; } else { $class = ""; } ?>
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a HREF="live.php" target=_top><?php print navspaces($lang['livehelp']) . str_replace(" ","&nbsp;",$lang['livehelp']) . navspaces($lang['livehelp']); ?></a></span></td>
 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "oper"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ( ($isadminsetting!="R") && ($isadminsetting!="L") ) { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=operators.php&tab=oper" target=_top ><?php print navspaces($lang['operators']) . $lang['operators'] . navspaces($lang['operators']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "dept"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ( ($isadminsetting!="R") && ($isadminsetting!="L") ) { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=departments.php&tab=dept" target=_top><?php print navspaces($lang['dept']) .  $lang['dept'] . navspaces($lang['dept']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "settings"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ($isadminsetting=="Y") { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=mastersettings.php&tab=settings" target=_top><?php print navspaces($lang['settings']) .  $lang['settings'] . navspaces($lang['settings']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "data"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ($isadminsetting!="L") { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=data.php&tab=data" target=_top><?php print navspaces($lang['data']) .  $lang['data'] . navspaces($lang['data']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "tabs"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ($isadminsetting=="Y") { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=modules.php&tab=tabs" target=_top><?php print navspaces($lang['tabs']) .  $lang['tabs'] . navspaces($lang['tabs']); ?></a></span></td>
<?php }?> 
 <td width=95% align=center valign=top><img src="images/blank.gif" width="20" height="5" border="0"> Version <b><?php echo $CSLH_Config['version'];?></b></td>
 <td><img src="images/blank.gif" width="10" height="5" border="0"></td> 
</tr>
</table>
</td></tr></table>

</td>
<td align='right' valign='top'>
 
 
</td>
</tr>
</table>
 
 
 
 
 
 
 <?php require_once("_inc.footer.php"); ?>
 
 
 
 </div>
</div>
</body>
</html>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>