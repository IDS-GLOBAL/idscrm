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
require_once("data_functions.php");
require_once("ctabbox.php");
require_once("gc.php");

validate_session($identity);

if(empty($UNTRUSTED['tab'])) $UNTRUSTED['tab'] = 0;
 
?>
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<?php

print '<table><tr><td>&nbsp;</td><td>';  
$tabBox = new CTabBox( "?a=b", "", $UNTRUSTED['tab'] );
$tabBox->add('data_transcripts', $lang['transcripts']);
$tabBox->add('data_messages', $lang['messages']);
$tabBox->add('data_referers', $lang['referers']);
$tabBox->add('data_visits', $lang['txt35']);
$tabBox->add('data_paths', "Paths");
$tabBox->add('data_keywords', 'Keywords');
$tabBox->add('data_users', $lang['users']);
if ($isadminsetting=="Y" ) { 
 $tabBox->add('data_clean', $lang['clean']);
}
$tabBox->show();

print '</td></tr></table><br><br>';  

if(!($serversession))
  $mydatabase->close_connect();

?>