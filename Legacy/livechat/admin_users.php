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

if($CSLH_Config['admin_refresh'] == "AJAX"){
	   $page = "admin_users_xmlhttp.php";
	  } else {
	   $page = "admin_users_refresh.php";	  	
	  }
?>
<SCRIPT type="text/javascript">
function goingthere(){
 window.location.replace("<?php echo $page; ?>");
}
setTimeout("goingthere();",1200);
</SCRIPT>
Loading...<br>
<br>
<a href="<?php echo $page; ?>">click here</a>  