<?php require_once("db_loggedin.php"); ?>
<?php


$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `idsids_idsdms`.`deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$did' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_credit_packages = "SELECT * FROM `idsids_idsdms`.`ids_credits` ORDER BY `credit_pckg_id` ASC";
$pull_credit_packages = mysqli_query($idsconnection_mysqli, $query_pull_credit_packages);
$row_pull_credit_packages = mysqli_fetch_assoc($pull_credit_packages);
$totalRows_pull_credit_packages = mysqli_num_rows($pull_credit_packages);


mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfhdlr_purchase_logbatch = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_ledger_batch` WHERE `wfhuser_ledger_batch`.`wfhuserledger_batch_did` = '$did' ORDER BY `wfhuserledger_batch_created_at` ASC";
$wfhdlr_purchase_logbatch = mysqli_query($wfh_connection_mysqli, $query_wfhdlr_purchase_logbatch);
$row_wfhdlr_purchase_logbatch = mysqli_fetch_assoc($wfhdlr_purchase_logbatch);
$totalRows_wfhdlr_purchase_logbatch = mysqli_num_rows($wfhdlr_purchase_logbatch);


mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_dealer_wfhpurchases = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuserledger_log_did` = '$did' ORDER BY `wfhuserledger_log_created_at` ASC";
$dealer_wfhpurchases = mysqli_query($wfh_connection_mysqli, $query_dealer_wfhpurchases);
$row_dealer_wfhpurchases = mysqli_fetch_assoc($dealer_wfhpurchases);
$totalRows_dealer_wfhpurchases = mysqli_num_rows($dealer_wfhpurchases);


mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_pluscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_pluscredits` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '+' AND `wfhuserledger_log_did` = '$did'";
$pluscreditsAvilable = mysqli_query($wfh_connection_mysqli, $query_pluscreditsAvilable);
$row_pluscreditsAvilable = mysqli_fetch_assoc($pluscreditsAvilable);
$totalRows_pluscreditsAvilable = mysqli_num_rows($pluscreditsAvilable);

$total_pluscredits = $row_pluscreditsAvilable['total_pluscredits'];
if(!$row_pluscreditsAvilable['total_pluscredits']){ $total_pluscredits = 0; }


mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_minuscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_minuscredits` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '-' AND `wfhuserledger_log_did` = '$did'";
$minuscreditsAvilable = mysqli_query($wfh_connection_mysqli, $query_minuscreditsAvilable);
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

 <script src="https://use.fontawesome.com/94d5a20675.js"></script>
 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Transactions</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                        	<a href="invoices.php">Invoices</a>
                        </li>
                        <li>
                        	<a href="invoice.history.php">Payment History</a>
                        </li>
                        <li class="active">
                        	<a href="invoice.transactions.php">Transaction Ledger</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Credits</h5>
                    </div>
                    <div class="ibox-content">

                            <h2>Current Balance: <?php echo $true_total_credits;  //if($balance_credits > 0.01){echo '$balance_credits'; }else{ echo '0';  }; ?> <small>credits...</small></h2>

                    </div>
                </div>
              </div>
            </div>
        
        
        
        
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Transaction History <small>Sort, search</small></h5>
                    </div>
                            <div id="history_ledger" class="ibox-content">


                            <table class="footable table table-stripped" data-page-size="25" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Token</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>When</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

<?php if($totalRows_dealer_wfhpurchases != 0): do{ ?>
                                <tr id="<?php echo $row_dealer_wfhpurchases['wfhuserledger_log_id']; ?>" class="gradeX">
                                    <td>
                                    <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_id']; ?>
                                    </td>
                                    <td>
                                    
                                    <small>record: <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_token']; ?></small><br />

                                    
                                    <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_descrp']; ?>
                                    
                                    
                                    
                                    </td>
                               		<td>
                                    	 <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_typtransc']; ?>
                                    </td>
                                    <td class="center"><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_amount']; ?></td>
                                    <td><?php echo  date('m/d/y h:i a T',strtotime($row_dealer_wfhpurchases['wfhuserledger_log_created_at'])); ?></td>
                                    <td class="center">
									<?php if($row_dealer_wfhpurchases['wfhuserledger_log_batched_time']){ ?>
									<?php echo 'Processed On: '.date('m/d/y h:i a T',strtotime($row_dealer_wfhpurchases['wfhuserledger_log_batched_time'])); ?>
									<?php }else{ ?>
                                    Pending
                                    <?php } ?>
                                    </td>
                                </tr>
<?php } while ($row_dealer_wfhpurchases = mysqli_fetch_assoc($dealer_wfhpurchases)); endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
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