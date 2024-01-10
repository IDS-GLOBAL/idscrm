<?php require_once('../db_admin.php'); ?>
<?php

print_r($_POST);

if(isset(
          $_POST['recur_charges_dealerid'],
          $_POST['recurring_invoice_id'],
          $_POST['recur_charges_toinvoicenumber'],
          $_POST['recur_charges_invoiceToken'], 
          $_POST['goview_recur_dealer_token'], 
          $_POST['recur_charges_lineitem'],
          $_POST['recur_charges_fee_id'], 
          $_POST['recur_charges_fee_type'],
          $_POST['recur_charges_fee_description'],
          $_POST['recur_charges_fee_qty'],
          $_POST['recur_charges_fee_taxed'],
          $_POST['recur_charges_fee_price'],
          $_POST['recur_charges_amount'],
          $_POST['recur_charges_source_id'],
          $_POST['recur_charges_source_name']
          
  )){
    

    $recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_dealerid']));
    $recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_invoiceToken']));
    $recur_charges_lineitem  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_lineitem']));
    

    $recurring_invoice_id  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_id']));
    $recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_toinvoicenumber']));
    
    $recur_charges_fee_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_fee_id']));
    //$recur_charges_fee_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_fee_type']));
    $recur_charges_fee_description = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_fee_description']));
    $recur_charges_fee_qty = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_fee_qty']));
    $recur_charges_fee_taxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_fee_taxed']));
    $recur_charges_fee_price = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_fee_price']));
    if($recur_charges_fee_price){
      $recur_charges_fee_price = number_format($recur_charges_fee_price, 2);
    }
    $recur_charges_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_amount']));
    if($recur_charges_amount){
      $recur_charges_amount = number_format($recur_charges_amount, 2);
    }
    $recur_charges_source_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_source_id']));
    $recur_charges_source_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recur_charges_source_name']));


    if(!$recur_charges_dealerid){

    }else{
    mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    $query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = '$recur_charges_dealerid' ORDER BY `invoice_number` DESC LIMIT 1";
    $lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
    $row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
    $totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);
    $recur_charges_toinvoicenumber = $row_lastrecurringInvcNum['invoice_number'];
    
    // To get the next recourring number for increment record keeping..
    $recur_charges_toinvoicenumber++;
    

    mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    echo $query_recurringInvcquick = "
    SELECT * FROM 
    `idsids_idsdms`.`ids_chargestorecurring`
       WHERE 
        `ids_chargestorecurring`.`recur_charges_dealerid` = '$recur_charges_dealerid' 
        
        AND
        `ids_chargestorecurring`.`recur_charges_lineitem` = '$recur_charges_lineitem'
        AND
        `ids_chargestorecurring`. `recur_charges_invoice_id` = '$recurring_invoice_id'
       LIMIT 1";
    $recurringInvcquick = mysqli_query($idsconnection_mysqli, $query_recurringInvcquick);
    $row_recurringInvcquick = mysqli_fetch_array($recurringInvcquick);
    $totalRows_recurringInvcquick = mysqli_num_rows($recurringInvcquick);
    
    $quick_srch_ln_no_charge_id = $row_recurringInvcquick['recur_charges_id'];
    $quick_srch_ln_no = $row_recurringInvcquick['recur_charges_lineitem'];
    

    
    // To get the next recourring invoice to update table rows for increment record keeping and pdf to work and emails to keep working until finish..
    
          if($totalRows_recurringInvcquick != 0){
              $insert_update_recur_charge_beginsql =  "
              UPDATE `idsids_idsdms`.`ids_chargestorecurring` SET
              ";

              $insert_update_recur_charge_endsql =  "
              WHERE
              `ids_chargestorecurring`.`recur_charges_id` = '$quick_srch_ln_no_charge_id'
              ";

          }else{

              $insert_update_recur_charge_beginsql =  "
              INSERT INTO `idsids_idsdms`.`ids_chargestorecurring` SET
              ";

              $insert_update_recur_charge_endsql =  '';
          }

    }
  

    mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    $query_inVoices_fees = "
      SELECT * FROM 
        `idsids_idsdms`.`ids_fees` WHERE `ids_fees`.`fee_id` = '$recur_charges_fee_id' LIMIT 1
      ";
    $inVoices_fees = mysqli_query($idsconnection_mysqli, $query_inVoices_fees);
    $row_inVoices_fees = mysqli_fetch_array($inVoices_fees);
    $totalRows_inVoices_fees = mysqli_num_rows($inVoices_fees);

    $charges_fee_type = $row_inVoices_fees['fee_type'];


    
    $charges_invoiceToken = $tkey;
    
  
//echo 'I Passed POST and made it';




echo $query_create_toinvoices_recurring = "
$insert_update_recur_charge_beginsql
    `recur_charges_dealerid` = '$recur_charges_dealerid',
    `recur_charges_invoice_id` = '$recurring_invoice_id',
    `recur_charges_toinvoicenumber` = '$recur_charges_toinvoicenumber', 
    `recur_charges_invoiceToken` =  '$recur_charges_invoiceToken', 
    `recur_charges_lineitem` = '$recur_charges_lineitem', 
    `recur_charges_fee_id` = '$recur_charges_fee_id', 
    `recur_charges_fee_type` = '$charges_fee_type', 
    `recur_charges_fee_description` = '$recur_charges_fee_description', 
    `recur_charges_fee_qty` = '$recur_charges_fee_qty',
    `recur_charges_fee_taxed` = '$recur_charges_fee_taxed', 
    `recur_charges_fee_price` = '$recur_charges_fee_price', 
    `recur_charges_amount` = '$recur_charges_amount', 
    `recur_charges_source_id` = 'Admin', 
    `recur_charges_source_name` = '$myname',
    `recur_charges_hardtime` = '$server_time'
    $insert_update_recur_charge_endsql
    
    ";

    $run_create_toinvoices_recurring = mysqli_query($idsconnection_mysqli, $query_create_toinvoices_recurring);

   

    $dudes_dlr_body = "
    $myname $dudesid Created A New Reccuring Invoice Fee - #$recurring_invoice_id 
    ";
    
    $dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
    $dudessql_temp_do = "
    INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
    `dudes_dlr_did` = '$recur_charges_dealerid',
    `dudes_dlr_dude_id` = '$dudesid',
    `dudes_dlr_dude_name` = '$myname',
    `dudes_recurring_invoice_id` = '$recurring_invoice_id',
    `dudes_dlr_body` = '$dudes_dlr_body'
    
    ";
    if($totalRows_recurringInvcquick != 0){
    $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);
    }




    if($recur_charges_lineitem < 15){

      $fee_id = 'fee_id'.$recur_charges_lineitem;
      $lineitem = 'lineitem'.$recur_charges_lineitem;
      $fee_description = 'fee_description'.$recur_charges_lineitem;
      $quantity = 'quantity'.$recur_charges_lineitem;
      $fee_price = 'fee_price'.$recur_charges_lineitem;
      $fee_amount = 'fee_amount'.$recur_charges_lineitem;
      $tax = 'tax'.$recur_charges_lineitem;
      

      $sql_temp_do = "
      UPDATE  `idsids_idsdms`.`ids_toinvoices_recurring` SET

      `$fee_id` = '$recur_charges_fee_id',
      `$lineitem` = '$recur_charges_lineitem',
      `$fee_description` = '$recur_charges_fee_description',
      `$quantity` = '$recur_charges_fee_qty',
      `$fee_price` = '$recur_charges_fee_price',
      `$fee_amount` = '$recur_charges_amount',
      `$tax` = '$recur_charges_fee_taxed'
      WHERE
        `ids_toinvoices_recurring`.`invoice_id` = '$recurring_invoice_id'
      ";
      $run_sql_temp_do = mysqli_query($idsconnection_mysqli, $sql_temp_do);
    }

}

include('end.phpmysql.php');

?>
