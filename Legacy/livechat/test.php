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

////////////////////////


/*
*  Everything Crafy Syntax Has Ended For The main Log View Everything After This point is WebGoonie
*  The Fall of genius and the rise of the chosen one. Benjamin Carter IDSCRM.com Software Engineer.
*  12-3-2016 8:13 a.m. haven't been to sleep on the bring of automation coming to life.
*
*/






?>
<!DOCTYPE html>
<html>

<head>
<title>Live Chat Admin</title>

<?php require_once("_inc.head.php"); ?>

</head>

<body>





<div id="wrapper">





        <?php include("_sidebar.livechat.php"); ?>





<div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>








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

   
   
   
 








            <div class='row'>
              <div class='col-lg-12'>
                <div class='ibox float-e-margins'>
<?php include("navigation.php"); ?>
				</div>
              </div>
			</div>







            <div class='row'>
              <div class='col-lg-12'>
                <div class='ibox float-e-margins'>
                    <div class='ibox-title'>
                        <h5>Name This Chat Box <small> check below 2</small></h5>
                    </div>
                    <div class='ibox-content'>






                    

                    </div>
                </div>
              </div>
            </div>




            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <?

//    admin_options.php?sound=off&tab=$UNTRUSTED['tab'];



$tab = $UNTRUSTED['tab'];

$tab_src = 'admin_options.php?sound=off&tab='.$tab

?>

<?php include("$tab_src"); ?>


                    </div>
                </div>
              </div>
            </div>







   <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                    <div class='ibox-title'>
                        <h5>admin_rooms.php <small>messages below</small></h5>
                    </div>
                <div class="ibox-content">

                   
                    
                    <?php include("admin_rooms.php"); ?>
                    
                    

                </div>
            </div>
        </div>
    </div>




            <div class='row'>
              <div class='col-lg-12'>
                <div class='ibox float-e-margins'>
                    <div class='ibox-title'>
                        <h5>admin_connect.php <small>messages below</small></h5>
                    </div>
                    <div class='ibox-content'>

<?php 

$YmdHis = date("YmdHis"); 

 include("admin_connect.php?rand=$YmdHis"); 
 
?>



                    

                    </div>
                </div>
              </div>
            </div>





            


            



   
   








































            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

  <?php  //include("admin_chat_bot.php"); ?>
                    

                    </div>
                </div>
              </div>
            </div>
            


            









            <div class='row'>
              <div class='col-lg-12'>
                <div class='ibox float-e-margins'>
                    <div class='ibox-title'>
                        <h5>admin_users.php <small>messages below</small></h5>
                    </div>
                    <div class='ibox-content'>

						<?php  //include("admin_users.php"); ?>



                    </div>
                </div>
              </div>
            </div>












            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>
            


            

   
   
   
    


</div>





<div class="footer" >
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> IDSCRM LIVE CHAT &copy; 2014-<?php echo date("Y"); ?>
    </div>
</div>
</div><!-- End page-wrapper -->


        <?php include("_nav_pulldown.chats.php"); ?>







</div><!-- End Wrapper -->
<?php require_once("_inc.footer.php"); ?>



</body>

</html>