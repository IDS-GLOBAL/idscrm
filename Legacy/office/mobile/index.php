<?php require_once('../../Connections/idsconnection.php'); ?>
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
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  	
  $LoginRS__query= "SELECT dudes_username, dudes_password, dudes_access_level FROM dudes WHERE dudes_username=%s AND dudes_password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($idsconnection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'dudes_access_level');
    
    //declare two session variables and assign them
    $_SESSION['MM_Usernamemobi'] = $loginUsername;
    $_SESSION['MM_UserGroupmobi'] = $loginStrGroup;	      

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
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>jQuery Mobile Form Gallery Local : Sales Person Theme</title>
<link type='text/css' href='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.css' rel='stylesheet'/>
<link type='text/css' href='../css/jqm-docs2.css' rel='stylesheet'/>

<script type='text/javascript' src='../js/jquery-1.6.1.min2.js'></script>
<script type='text/javascript' src='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.js'></script>
</head>

<body>



<div data-role="page">

				<div id="jqm-homeheader" class="ui-mobile">
					<h1 id="jqm-logo">
                    	<img src="images/IDSCRM-LOGO.png" alt="jQuery Mobile Framework" width="300"  />
                    </h1>
                    
					<p>This Mobile Office Is Touch-Optimized For Smartphones &amp; Tablets</p>
                    
				</div>
		
				<div data-role="content" data-theme="a">
					


  			<form action='<?php echo $loginFormAction; ?>' method='post' target="_parent" class='form_login' id='login'>
			<h2>Back Office Portal Login</h2>

			<!-- <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

			<p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>
			-->
            
            
			<div data-role="fieldcontain">
	         <label for="login">Login:</label>
            <input id='login' name='login' class='text' />
			</div>


			<div data-role="fieldcontain">
	         <label for="pwd">Password:</label>
              <input id='pwd' name='pwd' class='text' type='password' />
			</div>

			<div data-role="fieldcontain">
	         <label for="submit">Login IN:</label>
	         <input type="submit" name="submit" id="submit" value="LOG IN!" />

			</div>



	</form>
								
				</div>
			</div>
</body>
</html>