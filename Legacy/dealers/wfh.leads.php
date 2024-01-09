<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection = mysql_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `deals_bydealer` WHERE `deal_dealerID` = '$did' ORDER BY `deal_number` DESC, `deal_created_at` DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_markets = "SELECT * FROM `states`, `markets_dm` WHERE `states`.`state_abrv` = '$dealer_state' AND `markets_dm`.`state_id` = `states`.`state_id`";
$markets = mysqli_query($idsconnection_mysqli, $query_markets);
$row_markets = mysqli_fetch_assoc($markets);
$totalRows_markets = mysqli_num_rows($markets);


mysql_select_db($database_wfh_connection, $wfh_connection);
$query_pull_submarkets = "SELECT * FROM markets_dm, markets_sub_dm, states WHERE markets_dm.market_id = markets_sub_dm.market_id  AND states.state_id = markets_dm.state_id and states.state_abrv = '$dealer_state'";
$pull_submarkets = mysqli_query($idsconnection_mysqli, $query_pull_submarkets, $wfh_connection);
$row_pull_submarkets = mysqli_fetch_assoc($pull_submarkets);
$totalRows_pull_submarkets = mysqli_num_rows($pull_submarkets);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhstatemrkt_usr = "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_state` = '$dealer_state'";
$wfhstatemrkt_usr = mysqli_query($idsconnection_mysqli, $query_wfhstatemrkt_usr, $wfh_connection);
$row_wfhstatemrkt_usr = mysqli_fetch_assoc($wfhstatemrkt_usr);
$totalRows_wfhstatemrkt_usr = mysqli_num_rows($wfhstatemrkt_usr);

$query_wfhstate_userprofls = "SELECT * FROM 
 `idsids_idsdms`.`vehicles`, `idsids_wefinancehere`.`wfhuser_approvals_perms`, `idsids_wefinancehere`.`wfhuser_approvals`
WHERE 
 `vehicles`.`vid` = `wfhuser_approvals_perms`.`wfhuserperm_vehicle_id`
 AND
 `wfhuser_approvals_perms`.`wfhuserperm_did` = '$did'
 AND
 `wfhuser_approvals_perms`.`wfhuserperm_approval_id` = `wfhuser_approvals`.`wfhuser_approval_id`
 AND 
`wfhuser_approvals_perms`.`wfhuserperm_id` NOT IN ( SELECT `wfhuserperm_id` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserperm_id` =  `wfhuser_approvals_perms`.`wfhuserperm_id`)  
ORDER BY `wfhuserperm_created_at` ASC";
$wfhstate_userprofls = mysqli_query($idsconnection_mysqli, $query_wfhstate_userprofls);
$row_wfhstate_userprofls = mysqli_fetch_assoc($wfhstate_userprofls);
$totalRows_wfhstate_userprofls = mysqli_num_rows($wfhstate_userprofls);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_pluscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_pluscredits` FROM `wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '+' AND `wfhuserledger_log_did` = '$did'";
$pluscreditsAvilable = mysqli_query($idsconnection_mysqli, $query_pluscreditsAvilable, $wfh_connection);
$row_pluscreditsAvilable = mysqli_fetch_assoc($pluscreditsAvilable);
$totalRows_pluscreditsAvilable = mysqli_num_rows($pluscreditsAvilable);

$total_pluscredits = $row_pluscreditsAvilable['total_pluscredits'];
if(!$row_pluscreditsAvilable['total_pluscredits']){ $total_pluscredits = 0; }


mysql_select_db($database_wfh_connection, $wfh_connection);
$query_minuscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_minuscredits` FROM `wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '-' AND `wfhuserledger_log_did` = '$did'";
$minuscreditsAvilable = mysqli_query($idsconnection_mysqli, $query_minuscreditsAvilable, $wfh_connection);
$row_minusminuscreditsAvilable = mysqli_fetch_assoc($minuscreditsAvilable);
$totalRows_minuscreditsAvilable = mysqli_num_rows($minuscreditsAvilable);
$total_minuscredits = $row_minusminuscreditsAvilable['total_minuscredits'];


$true_total_credits = ($total_pluscredits - $total_minuscredits);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WefinanceHere.com | Leads: <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

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
                            <a href="wfh.cancel.php?key=<?php echo $row_userDets['token']; ?>">Cancel Account</a>
                        </li>

                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">



<div class="row">
	<div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                <h2>Current Balance: <?php echo $true_total_credits;  //if($balance_credits > 0.01){echo '$balance_credits'; }else{ echo '0';  }; ?> <small>credits...</small></h2>
                
                
							<div class="hr-line-dashed"></div>
						</div>
					</div>
	</div>
</div>




        
        <div class="row">
            <div class="col-lg-12">
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Welcome To WeFinanceHere.com Account Available Leads</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                    
                    
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
$dlr_geo_latitude_alert = '';
$dlr_geo_longitude_alert = '';



if(!$row_userDets['dealer_type_id']){
	$dealer_type_id_alert = 'alert-danger';
	$dealer_type_id_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['dealer_market_id']){
	$dealer_market_id_alert = 'alert-danger';
	$dealer_market_id_display = "style='display:block;'";
	$settings_complete = 1;
}



if(!$row_userDets['dealer_market_sub_id']){
	$dealer_market_sub_id_alert = 'alert-danger';
	$dealer_market_sub_id_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['settingDefaultAPR']){
	$settingDefaultAPR_alert = 'alert-danger';
	$settingDefaultAPR_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['settingDefaultTerm']){
	$settingDefaultTerm_alert = 'alert-danger';
	$settingDefaultTerm_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['settingSateSlsTax']){
	$settingSateSlsTax_alert = 'alert-danger';
	$settingSateSlsTax_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['settingDocDlvryFee']){
	$settingDocDlvryFee_alert = 'alert-danger';
	$settingDocDlvryFee_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['settingTitleFee']){
	$settingTitleFee_alert = 'alert-danger';
	$settingTitleFee_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['settingStateInspectnFee']){
	$settingStateInspectnFee_alert = 'alert-danger';
	$settingStateInspectnFee_display = "style='display:block;'";
}

if((!$row_userDets['dlr_geo_latitude']) && (!$row_userDets['dlr_geo_longitude'])){
	$dlr_ok_googlemp_alert = 'alert-danger';
	$dlr_ok_googlemp_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['dlr_geo_latitude']){
	$dlr_geo_latitude_alert = 'alert-danger';
	$dlr_geo_latitude_display = "style='display:block;'";
	$settings_complete = 1;
}

if(!$row_userDets['dlr_geo_longitude']){
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
                       <span class="pull-left">Your Title Fee Missing</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Settings.</a>.
                    </div>



                    <div class="alert <?php echo $settingStateInspectnFee_alert; ?>" <?php echo $settingStateInspectnFee_display; ?>>
                       <span class="pull-left">Your State Inspection Fee Is Missing</span> <a class="alert-link pull-right" href="dealmatrix.php">Click Here For Default Title Fee Settings.</a>.
                    </div>

                    <div class="alert <?php echo $dlr_ok_googlemp_alert; ?>" <?php echo $dlr_ok_googlemp_display; ?>>
                       <span class="pull-left">Your Map May Not Work</span> <a class="alert-link pull-right" href="account.php">Click Here For Settings.</a>.
                    </div>

                    <div class="alert <?php echo $dlr_geo_latitude_alert; ?>" <?php echo $dlr_geo_latitude_display; ?>>
                       <span class="pull-left">Latitude Is Missing</span> <a class="alert-link pull-right" href="account.php">Click Here For Settings.</a>.
                    </div>


                    <div class="alert <?php echo $dlr_geo_longitude_alert; ?>" <?php echo $dlr_geo_longitude_display; ?>>
                       <span class="pull-left">Longitude Is Missing</span> <a class="alert-link pull-right" href="account.php">Click Here For Settings.</a>.
                    </div>


                    
                    <div class="form-group">
                    	<label>Your Current State is: <h1><?php echo $dealer_state; ?></h1></label>
                        <input id="dealer_primary_state" type="hidden" value="<?php echo $dealer_state; ?>">
                    </div>

					<div class="form-group">
                    	<?php //print_r($row_wfhstate_userprofls); ?>
                    </div>


                    </div>
                </div>
            
            </div>
        </div>





<?php $counter_gridrow = 0; ?>

            <div class="row">
<?php if($totalRows_wfhstate_userprofls != 0): do { ?>

<?php $counter_gridrow++; ?>                        


<?php if($counter_gridrow % 4 == 0){  ?>
			<?php echo 
			"
            </div>
            <div class='row'>"
			;
			?>


<?php  } ?>


                <div id="<?php echo $row_wfhstate_userprofls['wfhuser_id']; ?>" class="col-md-3 buylead">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation wfh-rectbg">
                            
                            <div class="row">
                                <div class="col-md-6 pull-left">
                                <?php if($row_wfhstate_userprofls['wfhuserperm_fbid']){ ?>
                                 <?php $nofbuser = 'N'; ?>
                                 
                                    <img src="https://graph.facebook.com/<?php echo $row_wfhstate_userprofls['wfhuserperm_fbid']; ?>/picture?type=normal" alt="fb image">
                                    
                                <?php }else{ ?>
                                
                                <?php $nofbuser = 'Y'; ?>
                                    <img src="img/no-pic-avatar.png" alt="no_pic"  width="100px">
                                
                                
                                <?php } ?>
                                </div>
                                <div class="col-md-6 pull-left">
                                <?php if($row_wfhstate_userprofls['vthubmnail_file_path']){ ?>
                                
                                    <img src="<?php echo $row_wfhstate_userprofls['vthubmnail_file_path']; ?>" alt="vehicle image"  width="97px">
                                <?php }else{ ?>
                                   
                                
                                
                                <?php } ?>
                                </div>
                            </div>
                            
                            </div>
                            <div class="product-desc">
                            
                            
                            	
                            
                                <span class="product-price">
                                    <?php echo $row_wfhstate_userprofls['wfhdelrperm_cost']; ?>
                                </span>
                                <small class="text-muted">$<?php echo formatMoney($row_wfhstate_userprofls['cust_creditapr_txt']); ?></small>
                                <a href="#" class="product-name"> $<?php echo formatMoney($row_wfhstate_userprofls['wfhuser_approval_dwpymt']); ?> Down</a>



                                <div class="small m-t-xs">
                                    <?php echo $row_wfhstate_userprofls['wfhuser_approval_apr']; ?> 
                                    High car payment <?php echo $row_wfhstate_userprofls['wfhuser_approval_mxpymt']; ?>
                       | <?php echo $row_wfhstate_userprofls['wfhuser_approval_ap']; ?> | <?php echo $row_wfhstate_userprofls['cust_creditapr_txt']; ?> 
                                    has $<?php echo formatMoney($row_wfhstate_userprofls['wfhuser_approval_dwpymt']); ?> to put down, woked car payment at
                                    $<?php echo formatMoney($row_wfhstate_userprofls['wfhuser_approval_mxpymt']); ?> 
                                    Total Payments: <?php echo $row_wfhstate_userprofls['wfhuser_approval_totalpayments']; ?> 
                                    
                                    
                                    
                                    
                                </div>
                                <div class="m-t text-righ">

                                    <a name="<?php echo $row_wfhstate_userprofls['wfhdelrperm_cost']; ?>" rel="<?php echo $row_wfhstate_userprofls['wfhuserperm_fbid']; ?>" id="<?php echo $row_wfhstate_userprofls['wfhuserperm_id']; ?>" title="<?php echo $row_wfhstate_userprofls['vid']; ?>" href="#" class="btn btn-block btn-outline btn-primary purchaselead" role="button">purchase <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





<?php } while ($row_wfhstate_userprofls = mysqli_fetch_assoc($wfhstate_userprofls)); endif; ?>
            </div>

  

            <div class="row" style="display:none;">
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    $10
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="#" class="product-name"> Product</a>



                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box active">

                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    $10
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="#" class="product-name"> Product</a>



                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    $10
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="#" class="product-name"> Product</a>



                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
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


<script type="text/javascript" language="javascript" src="js/custom/page/wfh.lead.js"></script>
	

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