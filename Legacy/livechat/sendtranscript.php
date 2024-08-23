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
require_once("visitor_common.php");

$query = "SELECT * FROM livehelp_transcripts WHERE sessionid='".filter_sql($UNTRUSTED['transsessionid'])."' ORDER by recno DESC";
$transarray = $mydatabase->query($query);
if($transarray->numrows()==0){
   print $lang['txt129'];
} else {	  
  $transarray = $transarray->fetchRow(DB_FETCHMODE_ASSOC);
  $comments = $transarray['transcript'];
  $department = $transarray['department'];
  $query = "SELECT * FROM livehelp_departments WHERE recno=".intval($department);
  $data_d = $mydatabase->query($query);  
  $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
  $messageemail = $department_a['messageemail'];
  if(empty($messageemail)){
    // to avoid relay errors make this do_not_reply@currentdomain.com
    if(!(empty($_SERVER['HTTP_HOST']))){
        $host = str_replace("www.","",$_SERVER['HTTP_HOST']);
        $messageemail  = "do_not_reply@" . $host;
      } else {
      	$messageemail  = "trash@maui.net";
      }  
  }
  $departmentname = whatdep($department);
 
  if (!(send_message($departmentname, $messageemail, "Customer", $UNTRUSTED['sendto'], "Live Help Transcript", $comments, "text/html", $lang['charset'], false))) {
        send_message($departmentname, $messageemail, "Customer", $UNTRUSTED['sendto'], "Live Help Transcript", $comments, "text/html", $lang['charset'], true);
     }   
  print "<center><h2>".$lang['txt130']."</h2></center>";  
}
  
  print "<br><br><br><br><a href=javascript:window.close()>" . $lang['txt40'] . "</a></center>"; 

 
if(!($serversession))
  $mydatabase->close_connect();
?>