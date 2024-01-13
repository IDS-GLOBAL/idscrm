<?php require_once('../Connections/idsconnection.php'); ?>
<?php

?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['pwd'];
  $MM_fldUserAuthorization = "dudes_access_level";
  $MM_redirectLoginSuccess = "dashboard.php";
  $MM_redirectLoginFailed = "home.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  	
  $LoginRS__query= sprintf("SELECT dudes_username, dudes_password, dudes_access_level FROM dudes WHERE dudes_username=%s AND dudes_password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($idsconnection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'dudes_access_level');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Associate Login</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>


<div class="container">


	
    
  <!-- HEADER -->
  
  
  <div class="header">
    <div class="header_res">
      <a href="index.php"><img src="images/logo.png" alt="Logo" class="logo" /></a>
      
      <ul class="menu gradient47">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="forms.php">Dealers</a>
          <ul>
            <li><a href="#">Service 1</a></li>
            <li><a href="#">Service 2</a></li>
            <li><a href="#">Service 3</a></li>
            <li><a href="#">Service 4</a></li>
            <li><a href="#">Service 5</a></li>
          </ul>
        </li>
        <li><a href="#">Leads</a>
          <ul>
            <li><a href="#">Portfolio 1</a></li>
            <li><a href="#">Portfolio 2</a></li>
            <li><a href="#">Portfolio 3</a></li>
          </ul>
        </li>
        <li><a href="#">Vehicles</a></li>
        <li><a href="#">Sales Funnel</a></li>
        <li><a href="#">Commission</a></li>
        <li><a href="#">Knowledge Base</a></li>
      </ul>
      
      <div class="clr"></div>
      
      
      
      <ul class="menuicon">
        <li><a href="dashboard.php"><img src="images/icon_h1.gif" alt="picture" width="32" height="29" /></a><br /><a href="#" class="mini">dashboard</a></li>
        <li><a href="#"><img src="images/icon_h2.gif" alt="picture" width="32" height="29" /></a><br /><a href="#" class="mini">settings</a></li>
        <li><a href="#"><img src="images/icon_h3.gif" alt="picture" width="32" height="29" /></a><br /><a href="#" class="mini">online</a></li>
      </ul>
      <p class="aright rightelems">Logged in as <a href="#" class="black">User Name</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="gradient37">
          <a href="#"><img src="images/email.gif" alt="picture" width="16" height="12" class="email" /></a><a href="#"><strong>37</strong></a> incoming messages &nbsp;&nbsp;
          <a href="#"><img src="images/button_logout.gif" alt="picture" width="16" height="16" class="logout" /></a><a href="#" class="black">logout</a>
        </span>
        &nbsp;&nbsp;
        <a href="#dialog1" class="gradient37" name="modal">IDS Wizard</a>
        &nbsp;&nbsp;
        <!-- a href="#dialog2" class="gradient37" name="modal">Login Box</a -->
      </p>
      <div class="clr"></div>
    </div>
  </div>
  
  
  
  
  
  
  
  
  <p>
    <?php //include('parts/header.php'); ?>
  </p>
  
  
    <!-- END HEADER -->
    
    
    <p>
    </p>
    <!-- CONTENT -->
    
  <p>&nbsp;</p>
  <div align="center" id="login-form">
 		
        Thank You For Logging Out. To Log Back In Enter Your Credentials Below.
        
 	      <p></p><p></p>
	
    <div>
  			<form action='<?php echo $loginFormAction; ?>' method='POST' id='loginform' class='form_login'>
            <ol><li>
              <label for='login'>Your Login:
              <input id='login' name='login' class='text' />
              </label>
              <div class='clr'></div>
            </li><li>
              <label for='pwd'>Your Password:
              <input id='pwd' name='pwd' class='text' type='password' />
              </label>
              <div class='clr'></div>
              
              <label>
                <input type="submit" name="submit" id="submit" value="Submit" />
              </label>
            </li>
            </ol>
            </form>
  	</div>
    
</div>

  <?php //include('parts/content.php'); ?>
  
  <!-- END CONTENT -->
  
  
  
  
  <!-- FOOTER -->
  
  <?php //include('parts/footer.php'); ?>

  <!-- END FOOTER -->

  
  
  
  <!-- DIALOGS -->
  
  
  <div id='dialogboxes'>
    <!-- dialog 1 -->
    <div id='dialog1' class='window'>
      <div class='gadget gadget_noclearance'>
        <div class='gadget_title gradient37'>
          <a href='#' class='close closegadget'><img src='images/spacer.gif' alt='picture' width='19' height='33' /></a>
          <h3>Ready To Get Started?</h3>
        </div>
        <div class='gadget_content'>
          <div class='subblock'>
            <p>Getting started is the easiest to thing to do in your account. <strong>Please click on the link below to start the process.</strong> A New system message will appear here once development has been completed.</p>
          
          
            <div class='linehr'></div>
          
          
            <p>
            <a href='#' class='gradient37'>Start Demo - Login Now</a>
            </p>
          
          
          </div>
        </div>
      </div>
    </div>



    <!-- dialog 2 Login In Dialog Box -->
    <div id='dialog2' class='window'>
      <div class='gadget gadget_noclearance'>
        <div class='gadget_title gradient37'>
          <a href='#' class='close closegadget'><img src='images/spacer.gif' alt='picture' width='19' height='33' /></a>
          <h3>Welcome to Admin Area</h3>
        </div>
        <div class='gadget_content'>
          <div class='subblock'>
            <p>Please use this section to log into your account to use your special privilages. <strong>This the admin area and you should never share your account with anyone at all.</strong>Please see the system administrator if your login access doesn't work.</p>
            <div class='gadget'>
              <div class='gadget_title gradient37'><h3>Critical Error message</h3></div>
              <div class='gadget_content error_msg em_orange'><p><strong>This is an error message</strong> which is critical.</p></div>
            </div>
           <div class='gadget'>
            <div class='gadget_title gradient37'><h3>Error message</h3></div>
            <div class='gadget_content error_msg em_blue'><p><strong>Sorry There Was An Error</strong> while attempting to log in </p></div>
           </div>
           
            
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Mask to cover the whole screen -->
    <div id='mask'></div>
 
 
  </div>
  
  
  
  
  
  <?php //include('parts/dialogs.php'); ?>

  <!-- END DIALOGS -->



</div><!-- END -->

</body>
</html>
