<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 


$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_dudes";
$password_tracking = "VL&4v!PnvWug";
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking, $database_tracking); 



# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idschatconnection = "localhost";
$database_idschatconnection = "idsids_idschat";
$username_idschatconnection = "idsids_crft1";
$password_idschatconnection = "dmsKBO6xqWMzt2";
$idschatconnection_mysqli = mysqli_connect($hostname_idschatconnection, $username_idschatconnection, $password_idschatconnection, $database_idschatconnection); 

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
  	
  $LoginRS__query= "SELECT `dudes_username`, `dudes_password`, `dudes_access_level` FROM `idsids_idsdms`.`dudes` WHERE `dudes_username`= '$loginUsername' AND `dudes_password` ='$password'"; 
   
  $LoginRS = mysqli_query($idsconnection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    //$loginStrGroup  = mysql_result($LoginRS,0,'dudes_access_level');

    $loginStrGroup  = 'dudes_access_level';
    
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
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | DUDES Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Our Work Portals</h2>

                <p>
                   I have been working hard on this project hope you can enjoy. We're gonna speed through this.
              </p>

                <p>
          If you accidentially found yourself here it's fine you can visit our home page by <a href="https://idscrm.com" title="IDSCRM" target="_parent">clicking here.</a></p>

                <p>
                    When you have a reason to do so, the buck stops with you so carry it across the finish line.
                </p>

                <p>
                    <small>This online software was developed and conceptually build with the goal in mind to earn credit for car sales.</small>
                </p>

            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                    <form method='POST' id='loginform' class="m-t" role="form" action='<?php echo $loginFormAction; ?>'>
                        <div class="form-group">
                            <input id="login" name="login" type="text" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input id='pwd' name='pwd' type="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="https://idscrm.com" title="IDSCRM" target="_parent">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="https://idscrm.com" target="_parent">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Idscrm  app framework base on Bootstrap 3 &copy; <?php echo date('Y'); ?></small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright IDSCRM.com - Intergrated Dealer Systems, LLC
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-<?php echo date('Y'); ?></small>
            </div>
        </div>
    </div>

</body>

</html>