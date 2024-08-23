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

if( (mobi_detect()) && empty($UNTRUSTED['fullsite']) ){
	  Header("Location: mobile/");
	  exit;
	}

// error number:
if(!(isset($UNTRUSTED['err']))){ $err = 0; } else { $err = intval($UNTRUSTED['err']); }

// proccess login:
if(!(isset($UNTRUSTED['proccess']))){ $UNTRUSTED['proccess'] = "no"; }
if($UNTRUSTED['proccess'] == "yes"){
      if(validate_user($UNTRUSTED['myusername'],$UNTRUSTED['mypassword'],$identity)){
      	// TEMP :----
      	// In version 3.1.0 of CSLH I am going to separate out the sessions database
      	// table from the users. This session swapping is just a temporary thing till
      	// i finish the user database mapping feature in version 3.1.0 
      	$query = "DELETE FROM livehelp_users WHERE password='' AND sessionid='".$identity['SESSIONID']."'";	
      	$mydatabase->query($query);
      	$twentyminutes  = date("YmdHis", mktime(date("H"), date("i")+20,date("s"), date("m")  , date("d"), date("Y")));
        $query = "UPDATE livehelp_users 
                  SET identity='".filter_sql($identity['IDENTITY'])."',
                      ipaddress='".$identity['IP_ADDR']."',
                      hostname='".$identity['HOSTNAME']."',                      
                      expires='$twentyminutes',
                      lastaction='$twentyminutes',
                      ismobile='N',
                      authenticated='Y',
                      sessionid='".$identity['SESSIONID']."' 
                  WHERE username='".filter_sql($UNTRUSTED['myusername'])."' 
                    AND password='".filter_sql(md5($UNTRUSTED['mypassword']))."'";	
          
        $mydatabase->query($query);       	
      
      	// ----  // TEMP // ---      	
        $query = "SELECT * 
                  FROM livehelp_users 
                  WHERE sessionid='".$identity['SESSIONID']."'";	
        $person_a = $mydatabase->query($query);
        $person = $person_a->fetchRow(DB_FETCHMODE_ASSOC);
        $visits = $person['visits'];
        $isadminsetting = $person['isadmin'];
        $visits++;
        $query = "UPDATE livehelp_users 
                  SET visits=".intval($visits)." 
                  WHERE sessionid='".$identity['SESSIONID']."'";	
        $mydatabase->query($query);      
        if(empty($UNTRUSTED['adminsession']))
          $UNTRUSTED['adminsession'] = "N";
        if(empty($UNTRUSTED['matchip']))
          $UNTRUSTED['matchip'] = "N";
          
        $query = "UPDATE livehelp_config
                  SET matchip='".filter_sql($UNTRUSTED['matchip'])."',adminsession='".filter_sql($UNTRUSTED['adminsession'])."'";
        $mydatabase->query($query);          
                      
        // update history for operator to show login:
        $query = "INSERT INTO livehelp_operator_history (opid,action,dateof,sessionid,totaltime) VALUES (".$person['user_id'].",'login','".date("YmdHis")."','".$identity['SESSIONID']."',0)";
        $mydatabase->query($query);
        
         ?>
      	<SCRIPT type="text/javascript">
        function gothere(){
        	<?php if ($isadminsetting == "L" ) { ?>
            window.location.replace("live.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>");
          <?php } else { ?>
            window.location.replace("admin.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>");          	
          <?php } ?>	
        }
        </SCRIPT>
      	<?php
        
        // show updates, news and security warnings once every 15 logins.
        // Do not remove this! There are Security holes discovered
        // every day in Open source programs and not knowing about them
        // could be fatal to your website.    
        if(false){        	
         $lines = "";	 
         $url = "http://www.craftysyntax.com/remote_login.php?v=" . $CSLH_Config['version'] . "&d=" . $CSLH_Config['directoryid'] . "&m=" . $CSLH_Config['membernum'] . "&h=" . $_SERVER['HTTP_HOST'];          
          print "<iframe src=$url width=100% height=100% scroll=AUTO border=0></iframe>";
          exit;
         } else {
         ?>
       <h2><?php echo $lang['txt92']; ?></h2>
         If this page appears for more than 5 seconds, 
            <?php if ($isadminsetting == "L" ) { ?>
            <a href=live.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>>click here to reload.</a>
          <?php } else { ?>
            <a href=admin.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>>click here to reload.</a>    	
          <?php } ?>	
       <SCRIPT type="text/javascript">
        setTimeout("gothere();",4000);
       </SCRIPT>        
       <?php   
        exit;
        }
      }  else {
    	 // username/password fail:
       $err = 2; 
    } 
  }
  
if(!($serversession)) 
  $mydatabase->close_connect();
 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Chat Portal</title>
<?php require_once("_inc.head.php"); ?>
<SCRIPT type="text/javascript">
if (window.self != window.top){ window.top.location = window.self.location; }
</SCRIPT>
</head>
<body class="gray-bg" onLoad="document.login.myusername.focus()">
<!--link title="new" rel="stylesheet" href="style.css" type="text/css" -->

<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IDS CRM LIVE CHAT</h1>

            </div>
            <h3>Welcome to IDS CRM Chat Portal</h3>
            <p>You Must Have an Active Dealer Account to use this part of the system.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>For More Information Contact Your Represenative.</p>
            <p>Login in. To see it in action.</p>
  
<form class="m-t" role="form" id="login" action='login.php' method='post' name='login'>

<input type='hidden' name='proccess' value='yes'> 
 <?php 
 if (!(empty($UNTRUSTED['fullsite']))){
 	?>
 	<input type='hidden' name='fullsite' value='1'> 
    
<?php } ?>

<font size=2 color=770077><b>Version <?php echo $CSLH_Config['version']; ?></b></font>
<br/> 

<?php
// username/password incorrect
if($err == 2){ 
print $lang['txt94'] . "<br/>";
}
// logged out.
if($err == 3){ 
print $lang['txt95']. "<br/>";
}
?>
<br/>
<div class="form-group">
Username:
<input type="text" class="form-control" name="myusername" size="15">
</div>

<div class="form-group">
<input type="password" class="form-control" name="mypassword" size="15">
</div>

<div class="form-group">
<a href='lostsheep.php'><?php echo $lang['txt96']; ?></a>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary block full-width m-b">Login To Chat</button>

<!-- 
  If you are on a static ip address and would like only your authenticated ip to be about
  to hold a operator session you can set matchip to Y here:
  -->     
<input type="hidden" name="matchip" value=N>
<!-- 
  If you re for some reason having trouble with sessions you can set this to N
  --> 
<input type="hidden" name="adminsession" value=Y>
</div>

</form> 
<br><br>

		</div>
	</div>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>