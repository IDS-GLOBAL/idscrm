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

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['pwd'];
  $MM_fldUserAuthorization = "acct_status";
  $MM_redirectLoginSuccess = "dashboard.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  	
  $LoginRS__query= "SELECT salesperson_email, salesperson_password, acct_status FROM sales_person WHERE salesperson_email=%s AND salesperson_password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($idsconnection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'acct_status');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Login</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>IDS CRM - Dealer</title>
</head>

<body>

<div align="center">
	
    <p align="center"><img src="http://idscrm.com/images/logo.png" /></p>
 	<h1>Sales Person  Access </h1>
 
 <p>Great for Car Salesmen and Salesladies, including Brokers.</p>
<p>Manage your day to day business with your other employees, and </p>
 <p>Use your dealerships inventory in your own account, </p>
 <p>for many puposes in marketing and customer relationship management.</p>
 <p>&nbsp;</p>
 <p> <strong>Access Your Account Today! </strong> <a href="http://www.idscrm.com" target="_parent">Return Home:</a></p>
 <table width="600" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <th>Request Access</th>
     <th>&nbsp;</th>
     <th>Returning Uses Click Here</th>
   </tr>
   <tr align="center">
     <td><br />
     <p><a href="#">Click Here!</a></p></td>
     
     <td>&nbsp;</td>
     
     <td><br />
     <p><a href="#dialog2" name="modal">Click Here!</a></p></td>
   </tr>
   
   <tr align="center">
     <td><br />
     <p>Currently Unavailable</p></td>
     
     <td>&nbsp;</td>
     
     <td><br />
     <p>Active For Only Beta Testers</p></td>
   </tr>

 </table>
 </div>
 <p>&nbsp;</p>
 			
			
			<div id="dialogboxes">
    
    
    <!-- dialog 1 -->

  

    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Over The Phone Prompt<span>Belows Is Your - Script</span></h3>
          <div class="gadget_content">
            
            <p>
            	<strong>
                Note: Remember The longer you have the customer on the phone the better your chances are in converting them.
                </strong> 
                <br /><br />
                Collect Customers Name, Phone Number, and Email Address.  Offer to send them something.
                <br /><br />
            </p>
            
            <p>
            	<a href="#" class="bg_grey">Start The Process Now - CRM Power</a>
            </p>
          
          </div>
        </div>
      </div>
    </div>


    <!-- dialog 2 -->
    
    		<div id="dialog2" class="window">
      
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>
          		Log Into Your Sales Acount Here 
                <span>Login Below...</span>
          </h3>
         
          <div class="gadget_content">
            <p>
            	
                Please enter your log-in creditentials to gain access to your account.

            </p>
         
         <!--   
            <div class="gadget jsi_msg jsi_msg_yellow">
            	<p>
                	<strong>Access Granted By Your Dealer.</strong>
                   <br /> <br />

            		      	<a href="#">Click Here To Request Access.</a>
                </p>
            </div>
            
            <div class="gadget jsi_msg jsi_msg_red">
            	<p>
                	<strong>Proect Your Login Access at all times.</strong><br />
                    Be sure to log out of your computer before leaving.
                    <br /> <br />
                    <span align="center"><a href="#">Click Here To Regsiter</a></span>
                </p>
            </div>
            
          -->
            
			            <form action="<?php echo $loginFormAction; ?>" method="POST" id="loginform" class="form_login">
            	<ol>
                	<li>
		              <label for="login">Email Login:</label>
        		
                      <input name="login" type="text" size="35" />
              				
                            <div class="clr"></div>
            		</li>
                    
                    <li>
		              <label for="pwd">Your Password:</label>
        		      <input id="pwd" name="pwd" class="text" type="password" />
                    </li>
                    <li>
                      <label>
                        <input type="submit" name="submit" id="submit" value="Submit">
                      </label>
                      <div class="clr"></div>
                    </li>
               </ol>
            </form>

            
            
             
              
            	<a href="#">
                		Start Your Login Now
                </a>
              
                &nbsp;&nbsp;|&nbsp;
                
                <a href="index.php" > 
                		Cancel
                </a>
                  	
              
              
            </div>
            
        </div>
      </div>
      </div>
    </div>
    
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>
			
			
			
 <p>&nbsp;</p>
</body>
</html>