<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

include('../Libary/mobilecheck.php');

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
<title>Sales Dashboard</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script language="JavaScript" SRC="calendar/calendar.js"></script>
<script language="JavaScript">

	var cal = new CalendarPopup();

</script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

<!-- HEADER -->


<div class="header">
    <p class="logged">
    	
        Viewing As Guest 
    	</a>
    	
        <span>
        	<!-- a href="#" class="mail_msg">15</a -->Tell Your Store To Sign UP With IDSCRM<a href="http://www.idscrm.com" class="logout">I Want Access</a>
        </span>
        
        <br />
        
    </p>
    <p class="minimenu"><a href="http://www.idscrm.com">Get Started!</a> <a href="http://www.idscrm.com/register-dealer.php" class="obord">Request A Demo</a> <a href="#">Contact us</a></p>
    <div class="clr"></div>
    
    
    <a href="http://www.idscrm.com" target="_parent">
    		<img src="images/idslogo.png" alt="IDSCRM Logo" class="logo" /></a>
    
    <div class="clr"></div>
    




			






    
  </div>

<!-- START MAIN CONTENT ------------------------------------------------------>
  
	
	

	
				<div class="content">
    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

      <!-- gadget Welcome -->
      
      <!-- gadget usertable -->
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

      
      <!-- gadget usertable -->
      

    </div>
    

    <div class="clr"></div>
    <!-- Mobile GREAT BLOCK -->
    <div class="block_gr vertsortable">

      <!-- gadget Welcome -->
    <div class="clr"></div>
      <!-- gadget usertable -->
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
            

            
            
             
              
            	<a href="#">
                		Start Your Mobile Experience Here
                </a>
              
                &nbsp;&nbsp;|&nbsp;
                
                <a href="index.php" > 
                		Cancel
                </a>
                  	
              
              
            </div>
            
        </div>
      </div>
    <div class="clr"></div>
      
      <!-- gadget usertable -->
      

    </div>
    
    
    <!-- START LEFT TOWER BLOCK -->
    
    
    
    <div class="block_sm vertsortable">


     <!-- gadget dashboard -->
      <?php //include('parts/public-left-tower.php'); ?>

      <!-- gadget leadcapture -->
      

    </div>
    
    
    
    
    
    
    
    
    
    
    <!-- END LEFT TOWER BLOCK -->
    
        <div class="clr"></div>

  </div>
















	<?php //include('custom_pages/dashboard_page.php'); ?>
<!-- END MAIN CONTENT -->













<!-- FOOTER -->
  
	
	
<div class="footer">
	<div class="footer_sub1">
    	<div class="footer_sub2">
		    <a href="index.php"><img src="images/idslogo.png" class="logo" alt="Logo" /></a>
	
    	    <p class="rfooter">IDSCRM Sales Administration Accessed & Powered by <a href="#"><strong>IDSCRM.com</strong></a></p>
    	
        									<div class="clr"></div>
  		
        </div>
  </div>
</div>
<!-- END FOOTER -->    
    
    
    


























<!-- DIALOGS -->
  
  	<?php //include('dialogs/crm-power.php'); ?>
  

  
  
  
<!-- START Include Brought Out And Pasted For Spry -->


				
                
                
                
                
                
                
                
                
                
                
                
<div id="dialogboxes">
    
    
    <!-- Dialog Box Form  -->

  

    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
         <div id="closewindow"><a href="dashboard.php" target="_parent">Close</a></div><!-- End Close window --> 
          <h3>Over The Phone Prompt<span>Below Is Your - Script</span></h3>
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
            <strong>Read This Phone Script:</strong>
            	<hr />
                <?php include('salesmod/phonescriptdisplay.php'); ?>
<hr />
            </p>
            
            
            <div class="cust-input">

              
              <form method="POST" action="<?php echo $editFormAction; ?>" name="ovrphngoal" id="ovrphngoal">
              
              <table cellpadding="5" cellspacing="5">
              	<tr>
                  <td>
                <strong>Cust. Name:</strong></td>
                   
                   <td>
                	<p><span id="sprytextfield1">
                	  <input type="text" name="cust_nickname" id="cust_nickname" /><br />
               	     <span class="textfieldRequiredMsg">Customers Name Missing.</span>
                     </span>
                    </p>
                </td></tr>
                <tr>
                <td><strong>Phone No:</strong></td>
                  <td>
                    <p>
            <span id="sprytextfield2">
                    	<input type="tel" name="cust_phoneno" id="cust_phoneno" /> 
                    	                    	<br />
                    	 <span class="textfieldRequiredMsg">Phone Number Missing</span>
                    	 <span class="textfieldInvalidFormatMsg">Example (404) 555-1234.</span>
            </span>
            
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><strong>Phone Type:</strong></td>
                  <td>
                      <label>
                      <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
                  	      </select>
                  	  </label>
                  </td>
                </tr>
                <tr>
                  <td><strong>Email: </strong></td>
                  <td>
                    <p>
                    <span id="sprytextfield3">
                    <input type="text" name="cust_email" id="cust_email"><br />
                    <span class="textfieldRequiredMsg">A valid email address is required.</span>
                    <span class="textfieldInvalidFormatMsg">Keep Typing...</span></span>
                    </p>
                  </td>
               </tr>
               
               <tr>
                  <td valign="top">
                  	<strong>Your Comments:</strong>
                  </td>
               
                  <td>
                  <p>
                  	<textarea name="cust_lead_sp_comment" cols="25" rows="1"></textarea>
                  </p>
                  </td>
               </tr>
               
               <tr>
                  <td>
                    <label for="cust_lead_temperature">Customer Status:</label>
                   </td>
                   <td>
		            	<select name="cust_lead_temperature" id="cust_lead_temperature">
        		    		<option value="Hot">Hot</option>
              				<option value="Warm">Warm</option>
              				<option value="Cold">Cold</option>
            			</select>

                  </td>
               
                  <td>
                  <input name="cust_lead_token" type="hidden" value="<?php echo $tkey; ?>">
                  </td>
                </tr>
                <tr>
                  <td><strong>&nbsp;</strong></td>
                  <td>
                  <p>
                  
					                
                    

                    
                                      
                  </p>
                  </td>
                </tr>
                <tr>
                <td colspan="2" align="center">
                
                	<input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $row_userSets['salesperson_id']; ?>" />
                  	<input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $row_userSets['main_dealerid']; ?>" />
                  
                   <p><br />
                   <input class="bg_grey" type="submit" name="submit" id="submit" value="Start The CRM Power Process Now">
                   <!-- <a href="#" class="bg_grey" type="submit" name="submit">Start The Process Now - CRM Power</a> -->
                </p>
                </td></tr></table>
              <input type="hidden" name="MM_insert" value="ovrphngoal" />
              <input type="hidden" name="MM_insert" value="ovrphngoal">
              </form>
              
              
            </div>
            
            
          <p>
            	 
                <br />
            </p>
          
          </div><!-- End gadget_content -->
         
        </div>
      </div>
  </div>


    <!-- Empty -->
    
    		
    
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>

<!-- END Include Brought Out And Pasted For Spry -->  
  
  

  
	
  
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "phone_number", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
//-->
</script>
</body>
</html>