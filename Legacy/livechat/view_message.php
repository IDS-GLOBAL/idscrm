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
require_once("data_functions.php");
require_once("ctabbox.php"); 

validate_session($identity);

?>
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<?php

 $query = "SELECT * FROM livehelp_leavemessage WHERE id=".intval($UNTRUSTED['view']);
 $data = $mydatabase->query($query);
 print "<table width=600 bgcolor=FFFFFF border=1><tr><td>";
 $data = $data->fetchRow(DB_FETCHMODE_ASSOC);
  
  // parse data:
  $pairs = explode("&",$data['deliminated']);
  for($i=0;$i<count($pairs);$i++){
   	 $myarray = explode("=",$pairs[$i]);
   	 $key = $myarray[0];
     $myfields[$key] = urldecode($myarray[1]);   
   }

  // get list of fields for this department..	
	$q = "SELECT headertext,id FROM livehelp_questions WHERE module='leavemessage' AND department=". intval($data['department']) . " order by ordering ";
	$qRes = $mydatabase->query($q);
  $fields = array();
  while($qRow = $qRes->fetchRow(DB_FETCHMODE_ORDERED)){
    print "<b>".$qRow[0]."</b>:";	
    $key= "field_" . $qRow[1];
    print $myfields[$key] . "<br>";
  }
 
 print "</td></tr></table></td></tr></table>";
 
print "<a href=javascript:window.close()>" . $lang['txt40'] . "</A>"; 

?>