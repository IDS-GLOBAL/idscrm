<?php require_once('db_admin.php'); ?>
<?php

if(!$_POST) exit();

if(isset($_POST['thisdid'], $_POST['choose_creditpackage'], $_POST['choose_creditpackage_name'])){


$thisdid  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));


$choose_creditpackage = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['choose_creditpackage']));

$choose_creditpackage_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['choose_creditpackage_name']));


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_credit_packages = "SELECT * FROM `ids_credits` WHERE `credit_pckg_id` = '$choose_creditpackage' ORDER BY `credit_pckg_id` ASC";
$pull_credit_packages = mysqli_query($idsconnection_mysqli, $query_pull_credit_packages);
$row_pull_credit_packages = mysqli_fetch_array($pull_credit_packages);
$totalRows_pull_credit_packages = mysqli_num_rows($pull_credit_packages);

$credit_pckg_price = $row_pull_credit_packages['credit_pckg_price'];
$credit_pckg_amount = $row_pull_credit_packages['credit_pckg_amount'];

$wfhuserledger_log_typtransc = $row_pull_credit_packages['credit_pckg_type'];
$credit_pckg_chargtoinvoice = $row_pull_credit_packages['credit_pckg_chargtoinvoice'];
$credit_pckg_description = $row_pull_credit_packages['credit_pckg_description'];

$create_charge_sql = "
INSERT INTO `idsids_wefinancehere`.`wfhuser_ledger_log` SET
`wfhuserledger_log_token` = '$tkey',
`wfhuserledger_log_descrp` = '$credit_pckg_description',
`wfhuserledger_log_did` = '$thisdid',
`wfhuserledger_log_typtransc` = '$wfhuserledger_log_typtransc',
`wfhuserledger_log_amount` = '$credit_pckg_amount'
";


$run_create_charge_sql = mysqli_query($wfh_connection_mysqli, $create_charge_sql);
$create_charge_sql = mysqli_insert_id($wfh_connection_mysqli);




mysql_select_db($database_wfh_connection, $wfh_connection);
$query_dealer_wfhpurchases = "SELECT * FROM wfhuser_ledger_log WHERE wfhuserledger_log_did = '$thisdid' ORDER BY wfhuserledger_log_created_at ASC";
$dealer_wfhpurchases = mysqli_query($idsconnection_mysqli, $query_dealer_wfhpurchases, $wfh_connection);
$row_dealer_wfhpurchases = mysqli_fetch_array($dealer_wfhpurchases);
$totalRows_dealer_wfhpurchases = mysqli_num_rows($dealer_wfhpurchases);

}else{ exit(); }




?>


                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

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

<?php do{ ?>
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
                                    <td class="center"><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_amount']; ?> Credits</td>
                                    <td><?php echo  date('m/d/y h:i a /T',strtotime($row_dealer_wfhpurchases['wfhuserledger_log_created_at'])); ?></td>
                                    <td class="center">
									<?php if($row_dealer_wfhpurchases['wfhuserledger_log_batched_time']){ ?>
									<?php echo 'Processed On: '.date('m/d/y h:i a T',strtotime($row_dealer_wfhpurchases['wfhuserledger_log_batched_time'])); ?>
									<?php }else{ ?>
                                    Pending
                                    <?php } ?>
                                    </td>
                                </tr>
<?php } while ($row_dealer_wfhpurchases = mysqli_fetch_array($dealer_wfhpurchases)); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
