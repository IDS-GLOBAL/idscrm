<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
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

  $MM_fldUserAuthorization = "status";
  $MM_fldUserAuthorizationn = "acct_status";
  
  $MM_redirectDealerLoginSuccess = "dashboard.php";
  $MM_redirectSalesLoginSuccess = "mysales.dashboard.php";
  $MM_redirectManagerLoginSuccess = "test.managercheck.php";
  $MM_redirectCollectorLoginSuccess = "test.collectorcheck.php";
  $MM_redirectRepairshopLoginSuccess = "test.repairshopcheck.php";




  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;


if (isset($_POST['e_login'], $_POST['p_login'])) {

	$loginUsername=mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['e_login']));
	$password=mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['p_login']));

	mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $LoginRS__query= sprintf("SELECT `dealers`.`email`, `dealers`.`password`, `dealers`.`status`  FROM `dealers` WHERE `email`=%s AND `dealers`.`password`=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($idsconnection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
  // Now We Try Dealer Credentials which takes persidence Admin account actually
	$loginStrGroup  = mysql_result($LoginRS,0,'status');
    
    //declare two session variables and assign them
    //$_SESSION['MM_Dealer'] = $loginUsername;
    //$_SESSION['MM_DealerAccess'] = $loginStrGroup;	      
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      



    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectDealerLoginSuccess );
  
  
  
  
  }
  elseif(!$loginFoundUser) {
	// Now We Stry Sales person Credientials


 
  $LoginRSS__query= sprintf("SELECT `sales_person`.`salesperson_email`, `sales_person`.`salesperson_password`, `sales_person`.`acct_status` FROM `sales_person` WHERE `sales_person`.`salesperson_email`=%s AND `sales_person`.`salesperson_password`=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRSS = mysqli_query($idsconnection_mysqli, $LoginRSS__query);
  $loginFoundSales = mysqli_num_rows($LoginRSS);
  
  if ($loginFoundSales) {
	$loginStrGroup  = mysql_result($LoginRSS,0,'acct_status');

    //declare two session variables and assign them
    $_SESSION['MM_Salesperson'] = $loginUsername;
    $_SESSION['MM_SalespersonAccess'] = $loginStrGroup;
	
		if (isset($_SESSION['PrevUrl']) && false) {
		  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
		}
		header("Location: " . $MM_redirectSalesLoginSuccess );
	}











	// Now We Try Manager Credentials
	$LoginRSSS__query= sprintf("SELECT `manager_person`.`manager_email`, `manager_person`.`manager_password`, `manager_person`.`acct_status` FROM `manager_person` WHERE `manager_email`=%s AND `manager_password`=%s",
	GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
	
	$LoginManager = mysqli_query($idsconnection_mysqli, $LoginRSSS__query);
	$loginFoundManager = mysqli_num_rows($LoginManager);
  
	if ($loginFoundManager) {
	$loginStrGroup  = mysql_result($LoginManager,0,'acct_status');
	
	//declare two session variables and assign them
	$_SESSION['MM_Managerperson'] = $loginUsername;
	$_SESSION['MM_ManagerpersonAccess'] = $loginStrGroup;
	
		if (isset($_SESSION['PrevUrl']) && false) {
		  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
		}
		header("Location: " . $MM_redirectManagerLoginSuccess );
	}



	// Now We Try Collector Credentials
	$LoginCollector_sql_query= sprintf("SELECT `account_person`.`account_email`, `account_person`.`account_password`, `account_person`.`acct_status` FROM `account_person` WHERE `account_email`=%s AND `account_password`=%s",
	GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
	
	$LoginCollector = mysqli_query($idsconnection_mysqli, $LoginCollector_sql_query);
	$loginFoundCollector = mysqli_num_rows($LoginCollector);
  
	if ($loginFoundCollector) {
	$loginStrGroup  = mysql_result($LoginCollector,0,'acct_status');
	
	//declare two session variables and assign them
	$_SESSION['MM_Collectorperson'] = $loginUsername;
	$_SESSION['MM_CollectorAccess'] = $loginStrGroup;
	
		if (isset($_SESSION['PrevUrl']) && false) {
		  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
		}
		header("Location: " . $MM_redirectCollectorLoginSuccess );
	}


	// Now We Try Repair Shop Credentials
	$LoginRepairshop_sql_query= sprintf("SELECT `repair_shops`.`repairshops_email`, `repair_shops`.`repairshops_password`, `repair_shops`.`repairshops_status` FROM `repair_shops` WHERE `repair_shops`.`repairshops_email`=%s AND `repair_shops`.`repairshops_password`=%s",
	GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
	
	$LoginRepairshop = mysqli_query($idsconnection_mysqli, $LoginRepairshop_sql_query);
	$loginFoundRepairshop = mysqli_num_rows($LoginRepairshop);
  
	if ($loginFoundRepairshop) {
	$loginStrGroup  = mysql_result($LoginRepairshop,0,'repairshops_status');
	
	//declare two session variables and assign them
	$_SESSION['MM_RepairshopAdmin'] = $loginUsername;
	$_SESSION['MM_RepairshopAccess'] = $loginStrGroup;
	
		if (isset($_SESSION['PrevUrl']) && false) {
		  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
		}
		header("Location: " . $MM_redirectRepairshopLoginSuccess );
	}








  }else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM DEALER | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
//-->
    </script>

</head>

<body class="gray-bg">


            <div class="row">
            	<div class="col-md-12">
            

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div id="main-view" class="text-center">
            <div>
            

                <h1 class="logo-name">IDS CRM</h1>

            </div>
            <h3>Welcome to IDS CRM Dealer Portal</h3>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" id="dealerlogin" name="dealerlogin" action="<?php echo $loginFormAction; ?>" method="post">
                <div class="form-group">
                    <input type="email" name="e_login" class="form-control" id="e_login" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="p_login" class="form-control" id="p_login" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot Your Password???</small></a>
                <p class="text-muted text-center"><small><br />Don't have an account?</small><br /></p>
                <a class="btn btn-sm btn-white btn-block" href="#">REGISTER HERE</a>
            </form>
            <p class="m-t"> <small>IDSCRM web app dealer framework based on opensource technology providing a power cloud based dealer system &copy; <?php echo date('Y'); ?></small> </p>
        </div>
    </div>
			
            
            
            	</div>
            </div>

</body>

</html>
