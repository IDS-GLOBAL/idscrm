<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
//$wfh_connection = mysql_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php require_once("db_loggedin.php"); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `id` = '$did' LIMIT 1";
$find_dlr = mysqli_query($idsconnection_mysqli, $query_find_dlr);
$row_find_dlr = mysqli_fetch_assoc($find_dlr);
$totalRows_find_dlr = mysqli_num_rows($find_dlr);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `idsids_idsdms`.`deals_bydealer` WHERE `deal_dealerID` = '$did' ORDER BY `deal_number` DESC, `deal_created_at` DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_markets = "SELECT * FROM `idsids_idsdms`.`states`, `idsids_idsdms`.`markets_dm` WHERE `states`.`state_abrv` = '$dealer_state' AND `markets_dm`.`state_id` = `states`.`state_id`";
$markets = mysqli_query($wfh_connection_mysqli, $query_markets);
$row_markets = mysqli_fetch_assoc($markets);
$totalRows_markets = mysqli_num_rows($markets);


mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_pull_submarkets = "SELECT * FROM markets_sub_dm WHERE market_id = '$dealer_market_id' ORDER BY market_sub_id ASC";
$pull_submarkets = mysqli_query($wfh_connection_mysqli, $query_pull_submarkets);
$row_pull_submarkets = mysqli_fetch_assoc($pull_submarkets);
$totalRows_pull_submarkets = mysqli_num_rows($pull_submarkets);

mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfhstatemrkt_usr = "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_state` = '$dealer_state'";
$wfhstatemrkt_usr = mysqli_query($wfh_connection_mysqli, $query_wfhstatemrkt_usr);
$row_wfhstatemrkt_usr = mysqli_fetch_assoc($wfhstatemrkt_usr);
$totalRows_wfhstatemrkt_usr = mysqli_num_rows($wfhstatemrkt_usr);

mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfhstate_userprofls = "SELECT * FROM `wfhuserprofile` WHERE `applicant_present_addr_state` = '$dealer_state' ORDER BY `wfhuser_id` ASC";
$wfhstate_userprofls = mysqli_query($wfh_connection_mysqli, $query_wfhstate_userprofls);
$row_wfhstate_userprofls = mysqli_fetch_assoc($wfhstate_userprofls);
$totalRows_wfhstate_userprofls = mysqli_num_rows($wfhstate_userprofls);
// 							AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL
$query_LiveWfhVehicles = "SELECT * 
							FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` 
							WHERE `vehicles`.`did` = `dealers`.`id`
							AND `vehicles`.`did` = '$did'
							AND `vehicles`.`vlivestatus` = '1'
							AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL
							";
$LiveWfhVehicles = mysqli_query($wfh_connection_mysqli, $query_LiveWfhVehicles);
$row_LiveWfhVehicles = mysqli_fetch_assoc($LiveWfhVehicles);
$totalRows_LiveWfhVehicles = mysqli_num_rows($LiveWfhVehicles);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WefinanceHere.com | Start: <?php echo $row_find_dlr['company']; ?></title>

 <?php include("inc.head.php"); ?>
<style type="text/css">
	.bold{font-weight:bold;}
</style>


</head>
<body>
    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>WeFinanceHere.com</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="wfh.pricing.php?state=<?php echo $dealer_state; ?>">Pricing</a>
                        </li>
                        <li>
                            <a href="wfh.start.php?state=<?php echo $dealer_state; ?>">Start Settings</a>
                        </li>
                        <li>
                            <a href="wfh.leads.php?state=<?php echo $dealer_state; ?>">Purchase Leads</a>
                        </li>
                        <li>
                            <a href="wfh.purchase.history.php?state=<?php echo $dealer_state; ?>">Purchase History</a>
                        </li>
                        <li>
                            <a href="wfh.cancel.php?key=<?php echo $row_find_dlr['token']; ?>">Cancel Account</a>
                        </li>

                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
        <div class="row">
            <div class="col-lg-12">
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Welcome To WeFinanceHere.com Account Settings</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                    <h2>Choose Your Submarket <small> This is the sub-market under your primary state.</small></h2>
                    
                 

<?php
$settings_complete = 0;
$dealer_type_id_display = "style='display:none;'";
$dealer_market_id_display = "style='display:none;'";
$dealer_market_sub_id_display = "style='display:none;'";
$settingDefaultAPR_display = "style='display:none;'";
$settingDefaultTerm_display = "style='display:none;'";
$settingSateSlsTax_display = "style='display:none;'";
$settingDocDlvryFee_display = "style='display:none;'";
$settingTitleFee_display = "style='display:none;'";
$settingStateInspectnFee_display = "style='display:none;'";
$dlr_ok_googlemp_display = "style='display:none;'";
$usedmatrixcredit_fminimumprofit_display = "style='display:none;'";
$usedmatrixcredit_bminimumprofit_display = "style='display:none;'";

$dlr_geo_latitude_display = "style='display:none;'";
$dlr_geo_longitude_display = "style='display:none;'";


$dealer_type_id_alert = '';
$dealer_market_id_alert = '';
$dealer_market_sub_id_alert = '';
$settingDefaultAPR_alert = '';
$settingDefaultTerm_alert = '';
$settingSateSlsTax_alert = '';
$settingDocDlvryFee_alert = '';
$settingTitleFee_alert = '';
$settingStateInspectnFee_alert = '';
$dlr_ok_googlemp_alert = '';
$usedmatrixcredit_fminimumprofit_alert = "";
$usedmatrixcredit_bminimumprofit_alert = "";

$dlr_geo_latitude_alert = '';
$dlr_geo_longitude_alert = '';



if(!$row_find_dlr['dealer_type_id']){
	$dealer_type_id_alert = 'alert-danger';
	$dealer_type_id_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['dealer_market_id']){
	$dealer_market_id_alert = 'alert-danger';
	$dealer_market_id_display = "style='display:block;'";
	$settings_complete = 1;
}



if(!$row_find_dlr['dealer_market_sub_id']){
	$dealer_market_sub_id_alert = 'alert-danger';
	$dealer_market_sub_id_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['settingDefaultAPR']){
	$settingDefaultAPR_alert = 'alert-danger';
	$settingDefaultAPR_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['settingDefaultTerm']){
	$settingDefaultTerm_alert = 'alert-danger';
	$settingDefaultTerm_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['settingSateSlsTax']){
	$settingSateSlsTax_alert = 'alert-danger';
	$settingSateSlsTax_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['settingDocDlvryFee']){
	$settingDocDlvryFee_alert = 'alert-danger';
	$settingDocDlvryFee_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['settingTitleFee']){
	$settingTitleFee_alert = 'alert-danger';
	$settingTitleFee_display = "style='display:block;'";
	$settings_complete = 0;
}

if(!$row_find_dlr['settingStateInspectnFee']){
	$settingStateInspectnFee_alert = 'alert-danger';
	$settingStateInspectnFee_display = "style='display:block;'";
}

if(!$row_find_dlr['dlr_ok_googlemp']){
	$dlr_ok_googlemp_alert = 'alert-danger';
	$dlr_ok_googlemp_display = "style='display:block;'";
}


if(!$row_find_dlr['usedmatrixcredit_fminimumprofit']){
	$usedmatrixcredit_fminimumprofit_alert = 'alert-danger';
	$usedmatrixcredit_fminimumprofit_display = "style='display:block;'";
	$settings_complete = 1;
}


if(!$row_find_dlr['usedmatrixcredit_bminimumprofit']){
	$usedmatrixcredit_bminimumprofit_alert = 'alert-danger';
	$usedmatrixcredit_bminimumprofit_display = "style='display:block;'";
	$settings_complete = 1;
}




if(!$row_find_dlr['dlr_geo_latitude']){
	$dlr_geo_latitude_alert = 'alert-danger';
	$dlr_geo_latitude_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_find_dlr['dlr_geo_longitude']){
	$dlr_geo_longitude_alert = 'alert-danger';
	$dlr_geo_longitude_display = "style='display:block;'";
	$settings_complete = 1;
}













?>

                    <div class="alert <?php echo $dealer_type_id_alert; ?>" <?php echo $dealer_type_id_display; ?>>
                        <span class="pull-left">Dealer Type Finance Missing</span> <a class="alert-link pull-right" href="account.php">Finance Model.</a>.
                    </div>


                    <div class="alert <?php echo $dealer_market_id_alert; ?>" <?php echo $dealer_market_id_display; ?>>
                      <span class="pull-left">Your Primary Market Is Missing</span> <a id="dealer_market" class="alert-link pull-right" href="#markets">Change Market Below.</a>.
                    </div>

                    <div class="alert <?php echo $dealer_market_sub_id_alert; ?>" <?php echo $dealer_market_sub_id_display; ?>>
                      <span class="pull-left">Your Submarket Is Missing</span> <a id="dealer_market" class="alert-link pull-right" href="#markets">Change Submarket Below.</a>.
                    </div>


                    <div class="alert <?php echo $settingDefaultAPR_alert; ?>" <?php echo $settingDefaultAPR_display; ?>>
                       <span class="pull-left">Your APR Rate Is Missing</span> <a class="alert-link pull-right" href="dealmatrix.php">Primary APR Rate.</a>.
                    </div>



                    <div class="alert <?php echo $settingDefaultTerm_alert; ?>" <?php echo $settingDefaultTerm_display; ?>>
                       <span class="pull-left">Your Default Term (months of financing) Is Settings Missing</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.
                    </div>

                    <div class="alert <?php echo $settingSateSlsTax_alert; ?>" <?php echo $settingSateSlsTax_display; ?>>
                       <span class="pull-left">Your Tax Rate Settings Missing</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.
                    </div>
                    


                    <div class="alert <?php echo $settingDocDlvryFee_alert; ?>" <?php echo $settingDocDlvryFee_display; ?>>
                        <span class="pull-left">Your Doc &amp; Delivery Fee Missing</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.
                    </div>


                    <div class="alert <?php echo $settingTitleFee_alert; ?>" <?php echo $settingTitleFee_display; ?>>
                       <span class="pull-left">Your Title Fee <?php echo $row_find_dlr['settingTitleFee'];   ?></span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.

                      
                    </div>



                    <div class="alert <?php echo $settingStateInspectnFee_alert; ?>" <?php echo $settingStateInspectnFee_display; ?>>
                       <span class="pull-left">Your State Inspection Fee Is Needs Attention</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Default State Fee Settings.</a>.
                    </div>

                    <div class="alert <?php echo $dlr_ok_googlemp_alert; ?>" <?php echo $dlr_ok_googlemp_display; ?>>
                       <span class="pull-left">Your Google Map Settings Needs Attention</span> <a class="alert-link pull-right" href="account.php">Click Here For Settings.</a>.
                    </div>

                    <div class="alert <?php echo $dlr_geo_latitude_alert; ?>" <?php echo $dlr_geo_latitude_display; ?>>
                       <span class="pull-left">Latitude Is Needs Attention </span> <a class="alert-link pull-right" href="account.php">Click Here For Settings.</a>.
                    </div>


                    <div class="alert <?php echo $dlr_geo_longitude_alert; ?>" <?php echo $dlr_geo_longitude_display; ?>>
                       <span class="pull-left">Longitude Is Needs Attention </span> <a class="alert-link pull-right" href="account.php">Click Here For Settings.</a>.
                    </div>




                    <div class="alert <?php echo $usedmatrixcredit_fminimumprofit_alert; ?>" <?php echo $usedmatrixcredit_fminimumprofit_display; ?>>
                       <span class="pull-left">Front End Min. Profit Needs Attention</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.
                    </div>




                    <div class="alert <?php echo $usedmatrixcredit_bminimumprofit_alert; ?>" <?php echo $usedmatrixcredit_bminimumprofit_display; ?>>
                       <span class="pull-left">Back End Min. Profit Needs Attention</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.
                    </div>

                    
                    <div class="form-group">
                    	<label>Your Current State is:  <h1><?php echo $dealer_state; ?></h1></label>
                        <input id="dealer_primary_state" type="hidden" value="<?php echo $dealer_state; ?>">
                    </div>


                    <div class="form-group">
                    	<label>Your State Market:</label>
<select name="markets" id="markets"  class="form-control">
      <option value="" <?php if (!(strcmp("", $row_find_dlr['dealer_market_id']))) { echo "selected=\"selected\"";} ?>>Select Market</option><?php
do {  
?><option value="<?php echo $row_markets['market_id']; ?>"<?php if (!(strcmp($row_markets['market_id'], $row_find_dlr['dealer_market_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_markets['market']?></option>
      <?php
} while ($row_markets = mysqli_fetch_assoc($markets));
  $rows = mysqli_num_rows($markets);
  if($rows > 0) {
      mysqli_data_seek($markets, 0);
	  $row_markets = mysqli_fetch_assoc($markets);
  }
?>
    </select>
                        </div>



                    <div id="markets_dm_display" class="form-group">
                    	<label>Select Sub-Market:</label>
<select name="markets_dm" id="markets_dm"  class="form-control" disabled="disabled">
      <option value="" <?php if (!(strcmp("", $row_find_dlr['dealer_market_sub_id']))) {echo "selected=\"selected\"";} ?>>Select</option>
      <?php
do {  
?>
      <option value="<?php echo $row_pull_submarkets['market_sub_id']?>"<?php if (!(strcmp($row_pull_submarkets['market_sub_id'], $row_find_dlr['dealer_market_sub_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_pull_submarkets['market_sub_name']?></option>
      <?php
} while ($row_pull_submarkets = mysqli_fetch_assoc($pull_submarkets));
  $rows = mysqli_num_rows($pull_submarkets);
  if($rows > 0) {
      mysqli_data_seek($pull_submarkets, 0);
	  $row_pull_submarkets = mysqli_fetch_assoc($pull_submarkets);
  }
?>
</select>
                    </div>
                    <div class="form-group">
                    <br />
                    <br />
                    <br />
                    
                    	<button id="savemarkets" class="btn btn-block btn-primary btn-rounded" type="button">Put Us In This Market</button>
                    </div>
                    

                    </div>
                </div>
            
            </div>
        </div>

<div class="row">
	<div class="col-lg-12">
    	<div class="ibox">
        	<div class="ibox-title">
            	<h5>Currently online @WeFinanceHere.com <small class="">This is how your vehicles appear...</small></h5>
            </div>
            <div class="ibox-content">
            	<div class="row">
                
                
				<table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Photo / Status</th>
                        <th>P &amp; L</th>
                        <th>Year Make Model Trim</th>
                        <th>Settings</th>
                        <th>Monthly Payment</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<?php $counter_gridrow = 0; ?>

<?php do { 
$dealmatrix_settings = 0;
if(isset($row_LiveWfhVehicles['settingDefaultTerm'], $row_LiveWfhVehicles['settingDefaultAPR'], $row_LiveWfhVehicles['settingDocDlvryFee'], $row_LiveWfhVehicles['settingTitleFee'])){

	$dealmatrix_settings = 1;

}

	

	if(isset($row_LiveWfhVehicles['settingDefaultTerm'])){
		$settingDefaultTerm  = ((int)$row_LiveWfhVehicles['settingDefaultTerm']);
	}else{
	   $settingDefaultTerm = ((int)4 * 12);
	}
	
	if(isset($row_LiveWfhVehicles['settingDefaultAPR'])){
		$settingDefaultAPR = (int)$row_LiveWfhVehicles['settingDefaultAPR'];
	}else{	
		$settingDefaultAPR = (int)21.0;
	}


	if(isset($row_LiveWfhVehicles['settingDocDlvryFee'])){
		$settingDocDlvryFee = $row_LiveWfhVehicles['settingDocDlvryFee'];
	}else{	
		$settingDocDlvryFee = 300.00;
	}
	if(isset($row_LiveWfhVehicles['settingTitleFee'])){
		$settingTitleFee = $row_LiveWfhVehicles['settingTitleFee'];
	}else{	
		$settingTitleFee = 55.00;
	}
	if(isset($row_LiveWfhVehicles['settingStateInspectnFee'])){
		$settingStateInspectnFee = $row_LiveWfhVehicles['settingStateInspectnFee'];
	}else{	
		$settingStateInspectnFee = 30.00;
	}	
	
	$cust_wpymt_lowr = 'N';
	$cust_wpymt_higr = 'N';

	$cust_dpymt_lowr = 'N';
	$cust_dpymt_higr = 'N';

	$dealer_fees = ($settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee);
	$dealer_fees = number_format($dealer_fees, 2);
	
	
	
	$sysadd_dwnpymt = '200.00';

    $vrprice = $row_LiveWfhVehicles['vrprice'];
	if (is_numeric($vrprice)) {
        //  http://php.net/manual/en/function.is-int.php
	    $VPrice_missing = 0;
	    $VPrice = intval(preg_replace('/[^0-9]+/', '', $vrprice), 10);
    } else {
	    $VPrice_missing = 1;
	    $VPrice = $row_LiveWfhVehicles['vrprice'];
    }

    $VSPrice = $row_LiveWfhVehicles['vspecialprice'];
	if(isset($row_LiveWfhVehicles['vspecialprice'])){

		if (is_float($vspecialprice)) {
			//echo "'{$element}' is numeric", PHP_EOL;
			$VSPrice = intval(preg_replace('/[^0-9]+/', '', $vspecialprice), 10);
			$VSPrice_missing = 0;
		} else {
			$VSPrice = $row_LiveWfhVehicles['vspecialprice'];
			$VSPrice_missing = 1;
		}
		if($VSPrice_missing != 1){
			if($VPrice < $VSPrice){
			   $VPrice = $VSPrice;
			}
		}

	}

    $vpurchasecost = $row_LiveWfhVehicles['vpurchasecost'];
	if(isset($row_LiveWfhVehicles['vpurchasecost'])){ 
			$vpurchasecost_aval = 1;
			$vpurchasecost = $row_LiveWfhVehicles['vpurchasecost'];
	}else{
			$vpurchasecost_aval = 0;
			$vpurchasecost = $row_LiveWfhVehicles['vpurchasecost'];
	}

	$sales_tax = '';
	if(isset($row_LiveWfhVehicles['settingSateSlsTax'])){
		$sales_tax = $row_LiveWfhVehicles['settingSateSlsTax'];
	}else{	
		$sales_tax = 6.0;
	}

	$taxFormatCombined = $VPrice + $dealer_fees;
	
	$fullsalesTax = ($taxFormatCombined / 100) * $sales_tax;
	$newfullsalesTax = number_format($fullsalesTax, 2);
	
	$amountTofinance = $VPrice + $dealer_fees + $fullsalesTax;
	
	$calcPmt = calcPmt($amountTofinance, $settingDefaultAPR, $settingDefaultTerm);
	
	//To Use For display so We Format but not before cal payment.
	$newamountTofinance = number_format($amountTofinance, 2);
	
	$totalPayments = $calcPmt * $settingDefaultTerm;
	//$totalPayments = number_format($totalPayments, 2);

	$financeCharges = ($totalPayments - $amountTofinance);

	if($row_LiveWfhVehicles['usedmatrixcredit_fminimumprofit']){
		$minimum_fprofit = number_format($row_LiveWfhVehicles['usedmatrixcredit_fminimumprofit'], 2);
	}else{
		$minimum_fprofit = $row_LiveWfhVehicles['usedmatrixcredit_fminimumprofit'];
	}
	
	
	if($row_LiveWfhVehicles['usedmatrixcredit_bminimumprofit']){
		$minimum_bprofit = number_format($row_LiveWfhVehicles['usedmatrixcredit_bminimumprofit'], 2);
	}else{
		$minimum_bprofit = $row_LiveWfhVehicles['usedmatrixcredit_bminimumprofit'];
	}
	$frontend_profit = $VSPrice - $vpurchasecost;
	$frontend_profit = number_format($frontend_profit, 2);

	$backend_profit = number_format($financeCharges, 2);


$counter_gridrow++; 
$vdisclaimer = "Payments based on sales price plus tax, tag, title with approved credit at $settingDefaultAPR% APR for $settingDefaultTerm months.  Vehicles subject to prior sale. See dealer for details.";


?>                        

                    <tr class="<?php if($counter_gridrow % 2 == 0){ echo 'gradeC';}elseif($counter_gridrow % 1 == 0){ echo 'gradeX';} ?>">
                        <td class="center">
                        <input id="vehicle_do" type="checkbox" value="<?php echo $row_LiveWfhVehicles['vid']; ?>" name="list" class="checkbox"/>



							<span class="vdatesince">Since: <?php echo $row_LiveWfhVehicles['vDateInStock']; ?></span>
                            
                            <br />

                        	<img src="<?php echo $row_LiveWfhVehicles['vthubmnail_file_path']; ?>" width="120px" />
                            <br />
                       	<?php if($row_LiveWfhVehicles['vlivestatus'] == 0){ echo 'HOLD';}elseif($row_LiveWfhVehicles['vlivestatus'] == 1){ echo 'LIVE';}elseif($row_LiveWfhVehicles['vlivestatus'] == 9){ echo 'SOLD';}; ?>
                        <br /><br />
						#<?php echo $row_LiveWfhVehicles['vstockno']; ?><br />

                        <button class="btn btn-primary" onClick="window.location.href='inventory.edit.php?vid=<?php echo $row_LiveWfhVehicles['vid']; ?>'">Edit</button>

                        </td>
                        <td class="center">
						
                        
                        <span class="bold">Finance Amount: </span><br />
                        <span class=""><?php echo '$'.$newamountTofinance; ?></span><br />
                        <span class="bold">Front End: </span><br />
                        <span class=""><?php echo '$'.$frontend_profit; ?></span><br />
                        <span class="bold">Back End: </span><br />
                        <span class=""><?php echo '$'.$backend_profit; ?></span><br />
                        
                        <span class="bold">Min. Front End Profit:</span><br />
                        <span class=""><?php echo '$'.$minimum_fprofit; ?></span><br />
                        <span class="bold">Min. Back End Profit:</span><br />
                        <span class=""><?php echo '$'.$minimum_bprofit; ?></span><br />
                        <span class="bold">Total Taxes:</span><br />
                        <span class=""><?php echo '$'.$newfullsalesTax; ?></span><br />
                        <span class="bold">Dealer Fees:</span><br />
                        <span class=""><?php echo '$'.$dealer_fees; ?></span><br />
                        
                        
                        </td>
                        <td class="center">
<strong>Description: </strong><br />
<?php echo $row_LiveWfhVehicles['vyear']; ?> <?php echo $row_LiveWfhVehicles['vmake']; ?> <?php echo $row_LiveWfhVehicles['vmodel']; ?> <?php echo $row_LiveWfhVehicles['vtrim']; ?><br /> <br />
<strong>VIN: </strong><?php echo $row_LiveWfhVehicles['vvin']; ?><br /> <br />
<strong>Exterior Color: </strong><?php echo $row_LiveWfhVehicles['vecolor_txt']; ?><br />
<strong>Interior Color: </strong><?php echo $row_LiveWfhVehicles['vicolor_txt']; ?><br />
<br />
<?php if($row_LiveWfhVehicles['vpurchasecost']){ ?>
<strong>Cost: </strong><?php echo '$'.$row_LiveWfhVehicles['vpurchasecost']; ?><br />
<?php } ?>
                        </td>
                        <td class="center">
                        <?php if($row_LiveWfhVehicles['vrprice']){ ?><strong>Retail Price: </strong><br /><?php echo '$'.$row_LiveWfhVehicles['vrprice']; ?><br /><?php } ?>
                        <?php if($row_LiveWfhVehicles['vspecialprice']){ ?><strong>Special Price: </strong><br /><?php echo '$'.$row_LiveWfhVehicles['vspecialprice']; ?><?php } ?>

<br />
Term: <?php echo $settingDefaultTerm; ?> Months<br /> 
APR: <?php echo $settingDefaultAPR; ?>%<br />
Doc: <?php echo '$'.$settingDocDlvryFee; ?><br />
Title: <?php echo '$'.$settingTitleFee; ?><br />
State Fee: <?php echo '$'.$settingStateInspectnFee; ?><br />
Tax Rate: <?php echo $settingSateSlsTax; ?><br />

                        </td>
                        <td class="center">

		<?php if($dealmatrix_settings == 1): ?>

        <?php $calcPmt = calcPmt($amountTofinance, $settingDefaultAPR, $settingDefaultTerm ); ?>

        	<?php if($row_LiveWfhVehicles['dealer_type_id'] == '2'){ $split = round($calcPmt, 2);  $split = $split/2; ?>
            <h5 title="BuyHerePayHere">$<?php echo round($split, 2); ?> <small class="small">Bi-wkly</small></h5>
            
            <?php } ?>
            <h5>$<?php echo round($calcPmt, 2); ?> <small class="small">A Month</small></h5>


            <h6>For <?php echo $settingDefaultTerm; ?> Months</h6>

			<button title="<?php echo $vdisclaimer; ?>" class="btn btn-default btn-outline" type="button">Disclaimer</button>
            <br />
        <?php else: ?>
        	<br />
            <h2>Payment Not Available</h2>
        <?php endif; ?>


						
						<?php 
						if($row_LiveWfhVehicles['vdprice'] > 1){
							echo '<br />';
						echo 'Down: $'.number_format($row_LiveWfhVehicles['vdprice']); 
						}else{
						$VPricenew = ($VPrice * .10);
						$VPricenew = number_format($VPricenew, 2);
						echo 'Sys. Down: $'.$VPricenew;
						}
						?>
                        
                        </td>
                        <td class="center">
                        <div class="btn btn-white">
                        	<a href="inventory.edit.php?vid=<?php echo $row_LiveWfhVehicles['vid']; ?>">View/Edit</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a href="vphotos.php?vid=<?php echo $row_LiveWfhVehicles['vid']; ?>">View Photos</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a href="upload-vphotos.php?vid=<?php echo $row_LiveWfhVehicles['vid']; ?>">Upload Photos</a>
                        </div>

                        </td>
                    </tr>
<?php } while ($row_LiveWfhVehicles = mysqli_fetch_assoc($LiveWfhVehicles)); ?>
                    </tbody>
                    </tfoot>
                    <tr>
                        <th>Photo / Status</th>
                        <th>P &amp; L</th>
                        <th>Year Make Model Trim</th>
                        <th>Retail Pricing</th>
                        <th>Down Payment</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>                

                
                
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                    <h5>Pick Your Account Package <small>Options are below.</small></h5>
                    </div>
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Pay As You Go!
                                        </div>
                                        <div class="panel-body">
                                            <p>This package is restricted you have to authorize every incoming lead. This package lets you pay for every lead that you get notified on.  When a lead is coming to you and you only.</p>
                                        </div>
                                        <div class="panel-footer" align="center">
                                            <button class="btn btn-primary btn-sm purchasepackage">Add This Package</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            Bill Me For What I Buy
                                        </div>
                                        <div class="panel-body">
                                            <p>This package will let you add leads to your account and create a runing total check with your represenative for your credit limit. This package also lets you pay for every lead that you get notified on.  When a lead is coming to you only.</p>
                                        </div>
                                        <div class="panel-footer" align="center">
                                            <button class="btn btn-success btn-sm purchasepackage">Add Package</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                             Unlimited
                                        </div>
                                        <div class="panel-body">
                                            <p>For one flat price purchase as many leads that are available, no filters all leads come directly to you.</p>
                                        </div>
                                        <div class="panel-footer" align="center">
                                            <button class="btn btn-warning btn-sm purchasepackage">Add Package</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>






        <?php include("footer.php"); ?>

        </div>



    
    </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


<script type="text/javascript" language="javascript" src="js/custom/page/wfh.start.js"></script>
	

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($pull_submarkets);

mysqli_free_result($wfhstatemrkt_usr);

mysqli_free_result($wfhstate_userprofls);
?>
