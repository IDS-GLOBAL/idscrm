<?php
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *
//===========================================================================
     
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
//     along with this program in a file named LICENSE.txt .===========
require_once("admin_common.php");
validate_session($identity);

if(!(empty($UNTRUSTED['speak']))){ 
	$_COOKIE['speaklanguage'] = $UNTRUSTED['speak']; 
	print "Language changed to " . $UNTRUSTED['speak'];
 print "<SCRIPT type=\"text/javascript\"> window.location.replace(\"live.php\");</script>";
  print "<a href=live.php>click here</a>";
  exit;
} 

// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isadminsetting = $people['isadmin'];

$lastaction = date("Ymdhis");
$startdate =  date("Ymd");
 
if(isset($UNTRUSTED['reset'])){
 $query = "SELECT user_id,sessionid,camefrom,firstdepartment FROM livehelp_users WHERE isoperator='N' AND status!='chat'";
 $sth = $mydatabase->query($query);
 while($row = $sth->fetchRow(DB_FETCHMODE_ORDERED)){ 	
   	 $user_id = $row[0]; 
   	 $sessionid = $row[1];   	 
     $camefrom = $row[2]; 
     $firstdepartment= $old_user[3];  
                              
     // if not txt-db-api and $CSLH_Config['tracking'] == "Y" insert visitor and referer information:
     if($dbtype != "txt-db-api"){     
       if(!(empty($camefrom)) && ($CSLH_Config['reftracking']=="Y")){
     	   archivepage('livehelp_referers_daily',$camefrom,date("Ymd"),$firstdepartment);
     	   archivepage('livehelp_referers_monthly',$camefrom,date("Ym"),$firstdepartment);    	   
     	 }
     	 if ($CSLH_Config['tracking']=="Y")
     	   archivefootsteps($sessionid);       
     }	
    archiveuser($sessionid);   
 }
print "Database reset...";
print "<SCRIPT type=\"text/javascript\"> window.location.replace(\"live.php\");</script>";
print "<a href=live.php>click here</a>";
exit;
}
if(!($serversession))
$mydatabase->close_connect();
?>
<!DOCTYPE html>
<html>

<head>
<title>Live help admin</title>

<?php include("_inc.head.php"); ?>

<body>
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
            
            </li>
        </ul>

    </div>
</nav>



	<div id="page-wrapper" class="gray-bg">
	
	
	
	

<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a7.jpg">
                            </a>
                            <div class="media-body">
                                <small class="pull-right">46h ago</small>
                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a4.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right text-navy">5h ago</small>
                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/profile.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">23h ago</small>
                                <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="mailbox.html">
                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="mailbox.html">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="grid_options.html">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="notifications.html">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>


            <li>
                <a href="login.html">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>




<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chat view</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Miscellaneous</a>
            </li>
            <li class="active">
                <strong>Chat view</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>




	<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <strong>Chat room v.1</strong> can be used to create chat room in your app. In first version there is a html template.
                    In next versions of Inspinia we will add more design options. Feel free to write to us on <span class="text-navy">support@webapplayer.com</span>  if you need any help with implemnetation.

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <small class="pull-right text-muted">Last message:  Mon Jan 26 2015 - 18:39:23</small>
                         Chat room panel
                    </div>


                    <div class="ibox-content">

		<frameset rows="52,*,155" border="0" frameborder="0" framespacing="0" spacing="0" NORESIZE=NORESIZE>
         <frame src="admin_options.php?tab=live" name="topofit" scrolling="no" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
         <frameset cols="*,317" border="0" frameborder="0" framespacing="0" spacing="0" NORESIZE=NORESIZE>
          <frameset rows="32,*" border="0" frameborder="0" framespacing="0" spacing="0" NORESIZE=NORESIZE>
           <frame src="admin_rooms.php" name="rooms" scrolling="NO" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
           <frame src="admin_connect.php?rand=<?php echo date("YmdHis"); ?>" name="connection" scrolling="AUTO" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
          </frameset>
          <frame src="admin_users.php" name="users" scrolling="AUTO" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
         </frameset>
         <frame src="admin_chat_bot.php" name="bottomof" scrolling="AUTO" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE>
        </frameset>
        <noframes></noframes>



		
		
		


                    </div>

                </div>
        </div>

    </div>		
		
		
		
		
		
		
		<div class="footer" >
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>

		
		
		
	</div><!--End page-wrapper gray-bg-->
</div><!--End Wrapper-->





<?php require_once("_inc.footer.php"); ?>
</body>

</html>