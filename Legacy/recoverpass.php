<?php require_once('db_connect.php'); ?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM DEALER | Recover Password</title>

    <link href="dealers/css/bootstrap.min.css" rel="stylesheet">
    <link href="dealers/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="dealers/css/animate.css" rel="stylesheet">
    <link href="dealers/css/style.css" rel="stylesheet">
    <!-- Mainly scripts -->
    <script src="dealers/js/jquery-1.10.2.js"></script>
    <script src="dealers/js/bootstrap.min.js"></script>
    <script src="js/recover.js"></script>
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
            <p>Enter Your Email To Recover Your Password</p>
            <div class="m-t" id="pass_recovery">
                <div class="form-group">
                    <input type="email" name="e_login" class="form-control" id="e_login" placeholder="Email" required="">
                    <input type="hidden" id="cookie" value="<?php echo $cookie; ?>">
                </div>
                <button id="recover_pass" type="button" class="btn btn-primary block full-width m-b">Recover Password!</button>
                <div id="recover_rslt">
                
                </div>

                <p class="text-muted text-center"><small><br />Don't have an account?</small><br /></p>
                <a class="btn btn-sm btn-white btn-block" href="index.php">REGISTER HERE</a>
            </div>
            <p class="m-t"> <small>IDSCRM web app dealer framework based on opensource technology providing a power cloud based dealer system &copy; <?php echo date('Y'); ?></small> </p>
        </div>
   
   
   		<div id="after_request" class="white-bg" style="display:none;">
         <div class="ibox-content">
          <div class="panel panel-warning">
                
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> Email Sent!
                </div>
                <div class="panel-body">
                
                    <h2>If we have a account on file for this email address you just provided.  We will send you an email to recover your password login.</h2>
                    
                    <h3>  Please check your email account.</h3>
                    
                    
                    <h6> <a href="index.php" target="_parent">Retry Login Click Here</a></h6>
                
                </div>                             
          
          </div>
          
        </div>
        	
        
        
        
        </div>
    </div>
			
            
            
            	</div>
            </div>

</body>

</html>
