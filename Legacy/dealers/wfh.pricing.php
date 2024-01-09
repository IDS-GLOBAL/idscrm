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
$query_find_dlrdeals = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_markets = "SELECT * FROM `states`, `markets_dm` WHERE `states`.`state_abrv` = '$dealer_state' AND `markets_dm`.`state_id` = `states`.`state_id`";
$markets = mysqli_query($idsconnection_mysqli, $query_markets);
$row_markets = mysqli_fetch_assoc($markets);
$totalRows_markets = mysqli_num_rows($markets);


mysql_select_db($database_wfh_connection, $wfh_connection);
$query_pull_submarkets = "SELECT * FROM markets_sub_dm WHERE market_id = '$dealer_market_id' ORDER BY market_sub_id ASC";
$pull_submarkets = mysqli_query($idsconnection_mysqli, $query_pull_submarkets, $wfh_connection);
$row_pull_submarkets = mysqli_fetch_assoc($pull_submarkets);
$totalRows_pull_submarkets = mysqli_num_rows($pull_submarkets);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhstatemrkt_usr = "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_state` = '$dealer_state'";
$wfhstatemrkt_usr = mysqli_query($idsconnection_mysqli, $query_wfhstatemrkt_usr, $wfh_connection);
$row_wfhstatemrkt_usr = mysqli_fetch_assoc($wfhstatemrkt_usr);
$totalRows_wfhstatemrkt_usr = mysqli_num_rows($wfhstatemrkt_usr);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhdlr_purchase_logbatch = "SELECT * FROM wfhuser_ledger_batch WHERE wfhuserledger_batch_did = '$did' ORDER BY wfhuserledger_batch_created_at ASC";
$wfhdlr_purchase_logbatch = mysqli_query($idsconnection_mysqli, $query_wfhdlr_purchase_logbatch, $wfh_connection);
$row_wfhdlr_purchase_logbatch = mysqli_fetch_assoc($wfhdlr_purchase_logbatch);
$totalRows_wfhdlr_purchase_logbatch = mysqli_num_rows($wfhdlr_purchase_logbatch);


mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhdlr_purchase_userprofls = "SELECT * FROM `wfhuser_ledger_log`, `wfhuser_approvals_perms`, `wfhuser_approvals` WHERE `wfhuser_ledger_log`.`wfhuserperm_id` = `wfhuser_approvals_perms`.`wfhuserperm_id` AND `wfhuser_approvals`.`wfhuser_approval_id` = `wfhuser_approvals_perms`.`wfhuserperm_approval_id`  AND `wfhuserledger_log_did` = '$did' ORDER BY wfhuserledger_log_created_at ASC";
$wfhdlr_purchase_userprofls = mysqli_query($idsconnection_mysqli, $query_wfhdlr_purchase_userprofls, $wfh_connection);
$row_wfhdlr_purchase_userprofls = mysqli_fetch_assoc($wfhdlr_purchase_userprofls);
$totalRows_wfhdlr_purchase_userprofls = mysqli_num_rows($wfhdlr_purchase_userprofls);



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

    <title>IDSCRM | Blank: <?php echo $row_userDets['company']; ?></title>

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
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Credits <small>Your balance is a reflection of your purchase power.</small></h5>
                    
                    
                </div>
                <div class="ibox-content">

                <h2>Current Balance: <?php  echo $true_total_credits; ?> <small>credits...</small></h2>
                
                
					<div class="hr-line-dashed"></div>

                    <div class="row" align="center">
                    	<div class="col-md-6">
                        
                        	<h4>Purchase More Credits</h4>
                            <button type="button" class="btn btn-info btn-rounded">100 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">250 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">550 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">750 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">1,000 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">2,500 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">5,000 Credits</button>
                            <button type="button" class="btn btn-info btn-rounded">10,000 Creits</button>

                            
                        </div>
                    	<div class="col-md-6">
                        
                        	<h4>Fees & Cost Using Balance</h4>
                            <button type="button" class="btn btn-primary btn-rounded">A Leads = 15 Credits</button>
                            <button type="button" class="btn btn-primary btn-rounded">B Leads = 25 Credits</button>
                            <button type="button" class="btn btn-primary btn-rounded">Pull Appilcations = 50 Credits</button>
                            <button type="button" class="btn btn-primary btn-rounded">Sign And Drive 200 Credits</button>
                        </div>
                    </div>

					<div class="hr-line-dashed"></div>

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