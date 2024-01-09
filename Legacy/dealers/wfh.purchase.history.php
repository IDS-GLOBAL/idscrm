<?php require_once('../Connections/wfh_connection.php'); ?>
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
$query_pull_submarkets = "SELECT * FROM markets_dm, markets_sub_dm, states WHERE markets_dm.market_id = markets_sub_dm.market_id  AND states.state_id = markets_dm.state_id and states.state_abrv = '$dealer_state'";
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

    <title>WefinanceHere.com | Purchase History: <?php echo $row_userDets['company']; ?></title>

	<?php include("inc.head.php"); ?>

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

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
                <div class="col-lg-2">

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
                            <h5>Daily Close Out Totals</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Lead ID</th>
                                    <th>Record</th>
                                    <th>Vehicle</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Batched</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php do { ?>
                                  <tr id="<?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_id']; ?>">
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserperm_id']; ?></td>
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_token']; ?></td>
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_vid']; ?></td>
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_typtransc']; ?></td>
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_amount']; ?></span></td>
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_created_at']; ?></td>
                                      <td><?php $row_wfhdlr_purchase_logbatch['wfhuserledger_log_batched_time']; ?></td>
                                      <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                  </tr>
                                    <?php } while ($row_wfhdlr_purchase_logbatch = mysqli_fetch_assoc($wfhdlr_purchase_logbatch)); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="9">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Purchases Made Total</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Sales Person 1</a>
                                    </li>
                                    <li><a href="#">Sales Person 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="25" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>IP</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>When</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

<?php do{ ?>
                                <tr id="<?php echo $row_wfhdlr_purchase_userprofls['wfhuserperm_id']; ?>" class="gradeX">
                                    <td>
                                    <?php echo $row_wfhdlr_purchase_userprofls['wfhuserperm_wfhuser_id']; ?>
                                    </td>
                               		<td>
                                    	 <?php echo $row_wfhdlr_purchase_userprofls['wfhuser_approval_email']; ?>
                                    </td>
                               		<td>
                                    	 <?php echo $row_wfhdlr_purchase_userprofls['wfhuser_approval_phoneno']; ?>
                                    </td>
                                
                                	<td><?php echo $row_wfhdlr_purchase_userprofls['wfhuser_approval_ip']; ?></td>
                                	<td><?php echo $row_wfhdlr_purchase_userprofls['wfhuserledger_log_typtransc']; ?>
                                    </td>
                                    <td class="center"><?php echo $row_wfhdlr_purchase_userprofls['wfhuserledger_log_amount']; ?></td>
                                    <td><?php echo $row_wfhdlr_purchase_userprofls['wfhuserledger_log_created_at']; ?></td>
                                    <td class="center"><?php echo $row_wfhdlr_purchase_userprofls['wfhuserledger_log_batched_time']; ?></td>
                                </tr>
<?php } while ($row_wfhdlr_purchase_userprofls = mysqli_fetch_assoc($wfhdlr_purchase_userprofls)); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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


    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($pull_submarkets);

mysqli_free_result($wfhstatemrkt_usr);

mysqli_free_result($wfhdlr_purchase_userprofls);
?>