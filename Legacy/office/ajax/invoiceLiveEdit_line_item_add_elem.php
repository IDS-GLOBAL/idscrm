<?php require_once("../db_admin.php"); ?>
<?php
if(!$_POST) exit();

$goLiveview_invcid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_invcid']));
$goview_thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisdid']));

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees` ORDER BY `ids_fees`.`fee_type` ASC ";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);



$public_sum_charges_sql = "SELECT 
		sum(`charges_fee_price`) AS total_fee_price, 
		sum(`charges_amount`) AS total_amount,
        count(`charges_fee_taxed`) AS charges_fee_taxed
        FROM
        `idsids_idsdms`.`ids_chargestoinvoice`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestoinvoice`.`charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`
LEFT JOIN  `idsids_idsdms`.`ids_fees`
    ON `ids_chargestoinvoice`.`charges_fee_id` = `ids_fees`.`fee_id`
     WHERE
     `ids_toinvoices`.`payment_status` = 'UnPaid'
     AND
     `ids_toinvoices`.`invoice_status` = 'Active'
     AND
     `ids_toinvoices`.`payment_status` NOT IN ('Paid')
     AND
     `ids_toinvoices`.`invoice_dealerid` = '$goview_thisdid'
     AND
     `ids_toinvoices`.`invoice_id` = '$goLiveview_invcid'

     GROUP BY
    `ids_chargestoinvoice`.`charges_id`
    ORDER BY
		`ids_chargestoinvoice`.`charges_lineitem` DESC, `ids_chargestoinvoice`.`charges_lineitem` ASC, `ids_chargestoinvoice`.`charges_id` DESC";
$query_sum_charges = mysqli_query($idsconnection_mysqli, $public_sum_charges_sql);
$row_sum_charges = mysqli_fetch_array($query_sum_charges);
$totalRows_sum_charges = mysqli_num_rows($query_sum_charges);
$totalRows_sum_charges++;

?>

                                                            <div class="form-group has-warning">
                                                                        <label class="col-sm-1 control-label"><a class="remove_liveEdit_fee_el ajaxloaded"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></label>

                                                                    <div class="col-sm-10">
                                                                        <div id="editLive_charges_lineitem_" class="row">
                                                                            <div class="col-sm-2">
                                                                                <select name="editLive_charges_fee_type" class="form-control" id="editLive_charges_fee_type">
                                                                                    <option value="">Select Fee</option>
                                                                                    <?php do {  ?>
                                                                                        <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
                                                                                        <?php } while ($row_fees = mysqli_fetch_array($fees));
                                                                                        $rows = mysqli_num_rows($fees);
                                                                                        if($rows > 0) {
                                                                                            mysqli_data_seek($fees, 0);
                                                                                            $row_fees = mysqli_fetch_array($fees);
                                                                                        }
                                                                                        ?>
                                                                                </select>
                                                                        </div>
                                                                            <div class="col-sm-3">
                                                                                <input id="editLive_charges_fee_description" name="editLive_charges_fee_description" type="text"  class="form-control" placeholder="Description" value="">
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <input id="editLive_charges_fee_qty" name="editLive_charges_fee_qty" type="number" class="form-control" placeholder="Qty." value="">
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <input id="editLive_charges_fee_price" name="editLive_charges_fee_price" type="number" class="form-control" placeholder="Price" value="">
                                                                            </div>
                                                            
                                                                                <div class="col-md-2">
                                                                                            <div class="input-group">
                                                                                                <input id="editLive_charges_amount" name="editLive_charges_amount" type="number" class="form-control"  placeholder="Amount" value="">
                                                                                                <div class="input-group-addon">
                                                                                                    <input id="editLive_charges_fee_taxed" name="editLive_charges_fee_taxed" type="checkbox"  value="">
                                                                                                </div>
                                                                                            </div>
                                                                                </div>
                                                </div>


<?php
$dudes_dlr_body = "
$myname $dudesid Viewed Live Invoice  #$goLiveview_invcid 
";
$dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
$dudessql_temp_do = "
INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
`dudes_dlr_did` = '$goview_thisdid',
`dudes_dlr_dude_id` = '$dudesid',
`dudes_dlr_dude_name` = '$myname',
`dudes_recurring_invoice_id` = '$goLiveview_invcid',
`dudes_dlr_body` = '$dudes_dlr_body'

";
$run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);

mysqli_close($idsconnection_mysqli);

mysqli_close($tracking_mysqli);

mysqli_close($idschatconnection_mysqli);

mysqli_close($wfh_connection_mysqli);

?>
