<?php require_once('../db_admin.php'); ?>
<?php

print_r($_POST);

if(isset(
          $_POST['goLiveview_thisdid'],
          $_POST['goLiveview_invcid'],
          $_POST['editLive_charges_toinvoicenumber'],
          $_POST['editLive_charges_invoiceToken'], 
          $_POST['goview_thisLivedidtoken'], 
          $_POST['editLive_charges_lineitem'],
          $_POST['editLive_charges_fee_id'], 
          $_POST['editLive_charges_fee_type'],
          $_POST['editLive_charges_fee_description'],
          $_POST['editLive_charges_fee_qty'],
          $_POST['editLive_charges_fee_taxed'],
          $_POST['editLive_charges_fee_price'],
          $_POST['editLive_charges_amount'],
          $_POST['editLive_charges_source_id'],
          $_POST['editLive_charges_source_name']
          
  )){
    

    $goLiveview_thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_thisdid']));
    $editLive_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_invoiceToken']));
    $editLive_charges_lineitem  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_lineitem']));
    

    $goLiveview_invcid  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_invcid']));
    $editLive_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_toinvoicenumber']));
    
    $editLive_charges_fee_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_fee_id']));
    //$editLive_charges_fee_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_fee_type']));
    $editLive_charges_fee_description = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_fee_description']));
    $editLive_charges_fee_qty = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_fee_qty']));
    $editLive_charges_fee_taxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_fee_taxed']));
    $editLive_charges_fee_price = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_fee_price']));
    echo $editLive_charges_fee_price.'<br />';
    if(is_float($editLive_charges_fee_price)){
      $editLive_charges_fee_price = number_format($editLive_charges_fee_price, 2);
    }
    echo $editLive_charges_fee_price.'<br />';
    $editLive_charges_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_amount']));
    echo $editLive_charges_amount.'<br />';
    if(is_float($editLive_charges_amount)){
      $editLive_charges_amount = number_format($editLive_charges_amount, 2);
    }
    echo $editLive_charges_amount.'<br />';

    $editLive_charges_source_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_source_id']));
    $editLive_charges_source_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_source_name']));


    if(!$goLiveview_thisdid){
        // Do Some More Stuff Right Here
    }else{
    
   
    

    mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    echo $query_liveInvcquick = "
    SELECT * 
    FROM `idsids_idsdms`.`ids_chargestoinvoice` 
    LEFT JOIN `idsids_idsdms`.`ids_toinvoices` 
      ON `ids_chargestoinvoice`.`charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid` 
    LEFT JOIN `idsids_idsdms`.`ids_fees` 
      ON `ids_chargestoinvoice`.`charges_fee_id` = `ids_fees`.`fee_id` 
    WHERE `ids_toinvoices`.`payment_status` = 'UnPaid' 
      AND `ids_toinvoices`.`invoice_status` = 'Active' 
      AND `ids_toinvoices`.`payment_status` NOT IN ('Paid') 
      AND `ids_toinvoices`.`invoice_dealerid` = '$goLiveview_thisdid' 
        AND
        `ids_chargestoinvoice`.`charges_lineitem` = '$editLive_charges_lineitem'
        AND `ids_toinvoices`.`invoice_id` = '$goLiveview_invcid'
       LIMIT 1";
    $liveInvcquick = mysqli_query($idsconnection_mysqli, $query_liveInvcquick);
    $row_liveInvcquick = mysqli_fetch_array($liveInvcquick);
    $totalRows_liveInvcquick = mysqli_num_rows($liveInvcquick);
    
    $quick_srch_ln_no_charge_id = $row_liveInvcquick['charges_id'];
    $quick_srch_ln_no = $row_liveInvcquick['charges_lineitem'];
    

    
    // To get the next recourring invoice to update table rows for increment record keeping and pdf to work and emails to keep working until finish..
    
          if($totalRows_liveInvcquick != 0){
              $insert_update_recur_charge_beginsql =  "
              UPDATE `idsids_idsdms`.`ids_chargestoinvoice` SET
              ";

              $insert_update_recur_charge_endsql =  "
              WHERE
              `ids_chargestoinvoice`.`charges_id` = '$quick_srch_ln_no_charge_id'
              ";

          }else{

              $insert_update_recur_charge_beginsql =  "
              INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
              ";

              $insert_update_recur_charge_endsql =  '';
          }

    }
  

    mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    $query_inVoices_fees = "
      SELECT * FROM 
        `idsids_idsdms`.`ids_fees` WHERE `ids_fees`.`fee_id` = '$editLive_charges_fee_id' LIMIT 1
      ";
    $inVoices_fees = mysqli_query($idsconnection_mysqli, $query_inVoices_fees);
    $row_inVoices_fees = mysqli_fetch_array($inVoices_fees);
    $totalRows_inVoices_fees = mysqli_num_rows($inVoices_fees);

    $charges_fee_type = $row_inVoices_fees['fee_type'];


    
    $charges_invoiceToken = $tkey;
    
  
//echo 'I Passed POST and made it';




echo $query_create_toinvoices_liveinvoice = "
$insert_update_recur_charge_beginsql
    `charges_dealerid` = '$goLiveview_thisdid',
    `charges_toinvoice_id` = '$goLiveview_invcid',
    `charges_toinvoicenumber` = '$editLive_charges_toinvoicenumber', 
    `charges_invoiceToken` =  '$editLive_charges_invoiceToken', 
    `charges_lineitem` = '$editLive_charges_lineitem', 
    `charges_fee_id` = '$editLive_charges_fee_id', 
    `charges_fee_type` = '$charges_fee_type', 
    `charges_fee_description` = '$editLive_charges_fee_description', 
    `charges_fee_qty` = '$editLive_charges_fee_qty',
    `charges_fee_taxed` = '$editLive_charges_fee_taxed', 
    `charges_fee_price` = '$editLive_charges_fee_price', 
    `charges_amount` = '$editLive_charges_amount', 
    `charges_source_id` = 'Admin', 
    `charges_source_name` = '$myname',
    `charges_hardtime` = '$server_time'
    $insert_update_recur_charge_endsql
    
    ";

    $run_create_toinvoices_liveinvoice = mysqli_query($idsconnection_mysqli, $query_create_toinvoices_liveinvoice);

   

    $dudes_dlr_body = "
    $myname $dudesid Created A New Live Invoice Fee - #$goLiveview_invcid 
    ";
    
    $dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
    $dudessql_temp_do = "
    INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
    `dudes_dlr_did` = '$goLiveview_thisdid',
    `dudes_dlr_dude_id` = '$dudesid',
    `dudes_dlr_dude_name` = '$myname',
    `dudes_goLiveview_invcid` = '$goLiveview_invcid',
    `dudes_dlr_body` = '$dudes_dlr_body'
    
    ";
    if($totalRows_liveInvcquick != 0){
    $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);
    }




    if($editLive_charges_lineitem < 15){

      $fee_id = 'fee_id'.$editLive_charges_lineitem;
      $lineitem = 'lineitem'.$editLive_charges_lineitem;
      $fee_description = 'fee_description'.$editLive_charges_lineitem;
      $quantity = 'quantity'.$editLive_charges_lineitem;
      $fee_price = 'fee_price'.$editLive_charges_lineitem;
      $fee_amount = 'fee_amount'.$editLive_charges_lineitem;
      $tax = 'tax'.$editLive_charges_lineitem;
      

      $sql_temp_do = "
      UPDATE  `idsids_idsdms`.`ids_toinvoices_recurring` SET

      `$fee_id` = '$editLive_charges_fee_id',
      `$lineitem` = '$editLive_charges_lineitem',
      `$fee_description` = '$editLive_charges_fee_description',
      `$quantity` = '$editLive_charges_fee_qty',
      `$fee_price` = '$editLive_charges_fee_price',
      `$fee_amount` = '$editLive_charges_amount',
      `$tax` = '$editLive_charges_fee_taxed'
      WHERE
        `ids_toinvoices_recurring`.`invoice_id` = '$goLiveview_invcid'
      ";
      $run_sql_temp_do = mysqli_query($idsconnection_mysqli, $sql_temp_do);
    }

}

include('end.phpmysql.php');

?>
