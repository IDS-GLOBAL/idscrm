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
if(!($serversession))
  $mydatabase->close_connect();

if(!(isset($UNTRUSTED['help']))){ $UNTRUSTED['help'] = ""; }
if(!(isset($UNTRUSTED['page']))){ $UNTRUSTED['page'] = "scratch.php"; }
if(!(isset($UNTRUSTED['tab']))){ $UNTRUSTED['tab'] = ""; }
if(!(empty($UNTRUSTED['alttab']))){ $alttab = "&tab=".$UNTRUSTED['alttab']; } else {  $alttab ="";  }

$page = "scratch.php";
if($UNTRUSTED['page']=="scratch.php"){ $page = "scratch.php"; }
if($UNTRUSTED['page']=="mastersettings.php"){ $page = "mastersettings.php"; }
if($UNTRUSTED['page']=="help.php"){ $page = "help.php"; }
if($UNTRUSTED['page']=="edit_layer.php"){ $page = "edit_layer.php"; }
if($UNTRUSTED['page']=="edit_smile.php"){ $page = "edit_smile.php"; }
if($UNTRUSTED['page']=="operators.php"){ $page = "operators.php"; }
if($UNTRUSTED['page']=="departments.php"){ $page = "departments.php"; }
if($UNTRUSTED['page']=="data.php"){ $page = "data.php"; }
if($UNTRUSTED['page']=="modules.php"){ $page = "modules.php"; }


?>
<title>CSLH ADMIN</title>
<?php include("_inc.head.php"); ?>
<frameset rows="52,*" border="0" frameborder="0" framespacing="0" spacing="0" NORESIZE=NORESIZE>
 <frame src="admin_options.php?sound=off&tab=<?php echo $UNTRUSTED['tab']; ?>" name="topofit" scrolling="no" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
 <frameset cols="220,*" border="0" frameborder="0" framespacing="0" spacing="0" NORESIZE=NORESIZE>
 <frame src="navigation.php" name="navigation" scrolling="AUTO" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
 <frame src="<?php echo $page; ?>?help=<?php echo $UNTRUSTED['help'] . $alttab; ?>" name="contents" scrolling="AUTO" border="0" marginheight="0" marginwidth="0" NORESIZE>
</frameset><noframes></noframes>
 <?php require_once("_inc.footer.php"); ?>