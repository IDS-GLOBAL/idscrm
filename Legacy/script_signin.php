<?php require_once('Connections/idsconnection.php'); ?>
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
  
  $MM_redirectDealerLoginSuccess = "dealers/dashboard.php";
  $MM_redirectSalesLoginSuccess = "dealers/mysales.dashboard.php";
  $MM_redirectManagerLoginSuccess = "dealers/manager.php";
  $MM_redirectCollectorLoginSuccess = "dealers/collector.php";
  $MM_redirectRepairshopLoginSuccess = "dealers/repairshop.php";




  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;


if (isset($_POST['e_login'], $_POST['p_login'])) {



	$loginUsername=mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['e_login']));
	$password=mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['p_login']));


	function record_login($loginUsername, $password){

	global $idsconnection_mysqli;
	static $loginUsername;
	static $password;


	return;
	}


	mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $LoginRS__query= "SELECT `dealers`.`email`, `dealers`.`password`, `dealers`.`status`  FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`email` = '$loginUsername' AND  `dealers`.`password`= '$password'"; 
   
  $LoginRS = mysqli_query($idsconnection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
  	
	// 	Now We Create The Dealer Credentials which takes persidence for Admin dealers
	$row_LoginRS = mysqli_fetch_assoc($LoginRS);

    
    $loginStrGroup  = $row_LoginRS['status'];

    
    // 	Declare two session variables and assign them
	
    //$_SESSION['MM_Dealer'] = $loginUsername;
    //$_SESSION['MM_DealerAccess'] = $loginStrGroup;	      
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      



    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
	  
	  header("Location: " . $MM_redirectDealerLoginSuccess );
    }
	

	$create_login_sql = "
	INSERT INTO `idsids_idsdms`.`log_cat` SET
		`log_cat_did` = '1',
		`log_cat_body` = 'Logged In $loginUsername | $password'
	";
	
	$run_create_login_sql = mysqli_query($idsconnection_mysqli, $create_login_sql);


	echo"
	<script>
		window.location.href = '$MM_redirectDealerLoginSuccess';
	</script>
	
	";
		exit();  
  
  
  }elseif(!$loginFoundUser) {
	// Now We Stry Sales person Credientials


 
	$LoginRSS__query = "SELECT `sales_person`.`salesperson_email`, `sales_person`.`salesperson_password`, `sales_person`.`acct_status` FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`salesperson_email` = '$loginUsername' AND `sales_person`.`salesperson_password`='$password'"; 
	
	$LoginRSS = mysqli_query($idsconnection_mysqli, $LoginRSS__query);
	$loginFoundSales = mysqli_num_rows($LoginRSS);
	
	if ($loginFoundSales) {
			// Now We Try Dealer Credentials which takes persidence Admin account actually
			$row_LoginRS = mysqli_fetch_assoc($LoginRSS);

			
			$loginStrGroup  = $row_LoginRS['acct_status'];

			//declare two session variables and assign them
			$_SESSION['MM_Salesperson'] = $loginUsername;
			$_SESSION['MM_SalespersonAccess'] = $loginStrGroup;
			
			$create_login_sql = "
			INSERT INTO `idsids_idsdms`.`log_cat` SET
			`log_cat_did` = '1',
			`log_cat_body` = 'Logged In $loginUsername | $password'
			";
		
			$run_create_login_sql = mysqli_query($idsconnection_mysqli, $create_login_sql);
		
			if (isset($_SESSION['PrevUrl']) && false) {
				$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
				header("Location: " . $MM_redirectSalesLoginSuccess );
			}

			echo"
			<script>
				window.location.href = '$MM_redirectSalesLoginSuccess';
			</script>
			";
			exit();
		}











		// Now We Try Manager Credentials
		$LoginRSSS__query= "SELECT `manager_person`.`manager_email`, `manager_person`.`manager_password`, `manager_person`.`acct_status` FROM `idsids_idsdms`.`manager_person` WHERE `manager_email`= '$loginUsername' AND `manager_password`= '$password'";
		
		
		$LoginManager = mysqli_query($idsconnection_mysqli, $LoginRSSS__query);
		$loginFoundManager = mysqli_num_rows($LoginManager);
	
		if ($loginFoundManager) {
			// Now We Try Dealer Credentials which takes persidence Admin account actually
			$row_LoginRS = mysqli_fetch_assoc($LoginManager);

			
			$loginStrGroup  = $row_LoginRS['acct_status'];
			
			//declare two session variables and assign them
			$_SESSION['MM_Managerperson'] = $loginUsername;
			$_SESSION['MM_ManagerpersonAccess'] = $loginStrGroup;
		
			if (isset($_SESSION['PrevUrl']) && false) {
			$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
			}
			//header("Location: " . $MM_redirectManagerLoginSuccess );
			$create_login_sql = "
			INSERT INTO `idsids_idsdms`.`log_cat` SET
			`log_cat_did` = '1',
			`log_cat_body` = 'Logged In $loginUsername | $password'
			";
			
			$run_create_login_sql = mysqli_query($idsconnection_mysqli, $create_login_sql);

			echo"
			<script>
				window.location.href = '$MM_redirectManagerLoginSuccess';
			</script>
			
			";
			exit();
		}



		// Now We Try Collector Credentials
		$LoginCollector_sql_query= "SELECT `account_person`.`account_email`, `account_person`.`account_password`, `account_person`.`acct_status` FROM `idsids_idsdms`.`account_person` WHERE `account_person`.`account_email` = '$loginUsername' AND `account_person`.`account_password`= '$password'"; 
		
		$LoginCollector = mysqli_query($idsconnection_mysqli, $LoginCollector_sql_query);
		$loginFoundCollector = mysqli_num_rows($LoginCollector);
	
		if ($loginFoundCollector) {
		$row_LoginRS = mysqli_fetch_assoc($LoginCollector);

		
		$loginStrGroup  = $row_LoginRS['acct_status'];

		
		//declare two session variables and assign them
		$_SESSION['MM_Collectorperson'] = $loginUsername;
		$_SESSION['MM_CollectorAccess'] = $loginStrGroup;
		
			if (isset($_SESSION['PrevUrl']) && false) {
			$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
			}
			//header("Location: " . $MM_redirectCollectorLoginSuccess );
			$create_login_sql = "
			INSERT INTO `idsids_idsdms`.`log_cat` SET
					`log_cat_did` = '1',
					`log_cat_body` = 'Logged In $loginUsername | $password'
				";
			
			$run_create_login_sql = mysqli_query($idsconnection_mysqli, $create_login_sql);

			echo"
			<script>
				window.location.href = '$MM_redirectCollectorLoginSuccess';
			</script>
			";
			exit();		
		}


		// Now We Try Repair Shop Credentials
		$LoginRepairshop_sql_query= "SELECT `repair_shops`.`repairshops_email`, `repair_shops`.`repairshops_password`, `repair_shops`.`repairshops_status` FROM `idsids_idsdms`.`repair_shops` WHERE `repair_shops`.`repairshops_email`= '$loginUsername' AND `repair_shops`.`repairshops_password`= '$password'"; 
		
		$LoginRepairshop = mysqli_query($idsconnection_mysqli, $LoginRepairshop_sql_query);
		$loginFoundRepairshop = mysqli_num_rows($LoginRepairshop);
	
		if ($loginFoundRepairshop) {
		$row_LoginRS = mysqli_fetch_assoc($LoginRepairshop);

		
		$loginStrGroup  = $row_LoginRS['repairshops_status'];
		
		//declare two session variables and assign them
		$_SESSION['MM_RepairshopAdmin'] = $loginUsername;
		$_SESSION['MM_RepairshopAccess'] = $loginStrGroup;
		
			if (isset($_SESSION['PrevUrl']) && false) {
			$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
			}
			//header("Location: " . $MM_redirectRepairshopLoginSuccess );
			$create_login_sql = "
			INSERT INTO `idsids_idsdms`.`log_cat` SET
				`log_cat_body` = 'Logged In $loginUsername | $password '
			";
			
			$run_create_login_sql = mysqli_query($idsconnection_mysqli, $create_login_sql);

			echo"
			<script>
				window.location.href = '$MM_redirectRepairshopLoginSuccess';
			</script>
			
			";
			exit();
		
		}


			$create_login_sql = "
			INSERT INTO `idsids_idsdms`.`log_cat` SET
				`log_cat_body` = 'Failed Login $loginUsername | $password Wrong Credientials'
			";
			
			$run_create_login_sql = mysqli_query($idsconnection_mysqli, $create_login_sql);
			


		if (isset($_POST['e_login_attmptd'])) {
		
		$a = $_POST['e_login_attmptd'];
		$a++;
		}else{
		$a = '1';
		}
			
			echo"
			<script>
					
					var attmptd = $('input#attmptd').val();
					
						
					if(!attmptd){
					var attmptd = 1;
					}else{
						
						attmptd = parseInt(attmptd);
					
						attmptd++;
					}
					
					
					var emptythis = '';
					var e_login = $('input#e_login').val();
					var p_login = $('input#p_login').val(emptythis);
					
					$('div#p_login_msg').addClass('has-error');
					
					
					$('span#error_msg').html('Login Attepmpt Was Unsucessful..');
					$('span#error_msg').addClass('has-error');
					$('input#attmptd').val(attmptd);
					
					if(attmptd > 2){
						
					window.location.href = 'index.php?attempt?='+attmptd;
					//console.log('attmptd: attmptd > 3 '+attmptd);
			
					}else{
					//console.log('attmptd: attmptd }else '+attmptd);
					}
					
			</script>
			
			";

	}


  }else {
    //header("Location: ". $MM_redirectLoginFailed );



}
?>