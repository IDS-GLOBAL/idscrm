<?php require_once('../db_admin.php'); ?>
<?php

print_r($_POST);

if(isset(
          $_POST['edit_this_recurring_invoice_dealerid'],
          $_POST['edit_invoice_typeid'],

          $_POST['edit_this_recurring_invoice_id'],
          $_POST['edit_recurring_invoice_number'],
          $_POST['edit_recurring_invoice_date'],
          $_POST['edit_invc_cret_evry'],
          $_POST['edit_invc_cret_evrywhn'],
          $_POST['edit_recurring_invoice_duedate'],
          $_POST['edit_invoice_recurring_stopdate'],
          $_POST['edit_recurring_daysto_payinvoice'],
          $_POST['edit_recurring_dealer_email_recipients'],
          $_POST['edit_recurring_invoice_sendtoclient'],
          $_POST['edit_recurring_invoice_currency'],
          $_POST['edit_recurring_sales_taxrate'],
          $_POST['edit_recurring_tax_total'],
          $_POST['edit_recurring_discount_value'],
          $_POST['edit_recurring_discount_dollarorpercn'],
          $_POST['edit_recurring_invoice_shippinghanding'],
          $_POST['edit_recurring_invoice_subtotal'],
          $_POST['edit_recurring_invoice_arrival_fee'],
          $_POST['edit_recurring_invoice_comments'],
          $_POST['edit_recurring_terms_conditions'],
          $_POST['edit_recurring_invoice_taxtotal'],
          $_POST['edit_recurring_invoice_total'],
          $_POST['edit_recurring_applied_payment'],
          $_POST['edit_recurring_invoice_amount_due'],
          $_POST['edit_recurring_invoice_status']
  )){



    $invoice_typeid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_typeid']));


    $this_recurring_invoice_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_this_recurring_invoice_dealerid']));;

    $edit_this_recurring_invoice_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_this_recurring_invoice_id']));


  $edit_this_recurring_invoice_dealerid = mysqli_real_escape_string(
                                          $idsconnection_mysqli, trim($_POST['edit_this_recurring_invoice_dealerid']));
  $edit_this_recurring_invoice_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_this_recurring_invoice_id']));
  $edit_recurring_invoice_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_number']));
  $edit_recurring_invoice_date =   mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_date']));
  $edit_invc_cret_evry = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invc_cret_evry']));
  $edit_invc_cret_evrywhn = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invc_cret_evrywhn']));
  $edit_recurring_invoice_duedate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_duedate']));
  $edit_invoice_recurring_stopdate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_recurring_stopdate']));
  $edit_recurring_daysto_payinvoice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_daysto_payinvoice']));
    $edit_recurring_dealer_email_recipients = mysqli_real_escape_string(
        $idsconnection_mysqli, trim($_POST['edit_recurring_dealer_email_recipients']
    ));
    $edit_recurring_invoice_sendtoclient = mysqli_real_escape_string(
        $idsconnection_mysqli, trim($_POST['edit_recurring_invoice_sendtoclient']
    ));
  $edit_recurring_invoice_currency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_currency']));
  $edit_recurring_sales_taxrate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_sales_taxrate']));
  $edit_recurring_tax_total = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_tax_total']));
  $edit_recurring_discount_value = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_discount_value']));
  $edit_recurring_discount_dollarorpercn = mysqli_real_escape_string(
        $idsconnection_mysqli, trim($_POST['edit_recurring_discount_dollarorpercn']
    ));
  $edit_recurring_invoice_shippinghanding = mysqli_real_escape_string(
    $idsconnection_mysqli, trim($_POST['edit_recurring_invoice_shippinghanding']
  ));
  $edit_recurring_invoice_arrival_fee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_arrival_fee']));
  $edit_recurring_invoice_subtotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_subtotal']));
  

  $edit_recurring_invoice_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_comments']));
  $edit_recurring_terms_conditions = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_terms_conditions']));
  $edit_recurring_invoice_taxtotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_taxtotal']));
  $edit_recurring_invoice_total = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_total']));
  $edit_recurring_applied_payment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_applied_payment']));
  $edit_recurring_invoice_amount_due = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_amount_due']));
  $edit_recurring_invoice_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_recurring_invoice_status']));

  //Hack To Insure This Invoice Gets Turned Off
  if($edit_recurring_invoice_status != 'Active'){
    $edit_recurring_invoice_status = 'Inactive';
  }
//echo 'I Passed POST and made it';

// Removed due to why I wanna update the dealer id again? dahhhhhhh
//`invoice_dealerid` = '$edit_this_recurring_invoice_dealerid',

 echo $query_update_toinvoices_recurring = "
  UPDATE `ids_toinvoices_recurring` SET
    `invoice_typeid` = '$invoice_typeid',
    `invoice_number` = '$edit_recurring_invoice_number',
    `invoice_date` =  '$edit_recurring_invoice_date',
    `invc_cret_evry` = '$edit_invc_cret_evry',
    `invc_cret_evrywhn` = '$edit_invc_cret_evrywhn',
    `invoice_duedate` = '$edit_recurring_invoice_duedate',
    `invoice_recurring_stopdate` = '$edit_invoice_recurring_stopdate',
    `invoice_autocharge` = '$edit_recurring_invoice_status',
    `daysto_payinvoice` = '$edit_recurring_daysto_payinvoice',
    `dealer_email_recipients` = '$edit_recurring_dealer_email_recipients',
    `invoice_sendtoclient` = '$edit_recurring_invoice_sendtoclient',
    `invoice_currency` = '$edit_recurring_invoice_currency',
    `sales_taxrate` = '$edit_recurring_sales_taxrate',
    `tax_total` = '$edit_recurring_tax_total',
    `discount_value` = '$edit_recurring_discount_value',
    `discount_dollarorpercn` = '$edit_recurring_discount_dollarorpercn',
    `invoice_shippinghanding` = '$edit_recurring_invoice_shippinghanding',
    `invoice_arrival_fee` = '$edit_recurring_invoice_arrival_fee',
    `invoice_subtotal` = '$edit_recurring_invoice_subtotal',
    `tax_arrival_fee` = '0.00',
    `invoice_comments` = '$edit_recurring_invoice_comments',
    `terms_conditions` = '$edit_recurring_terms_conditions',
    `invoice_taxtotal` = '$edit_recurring_invoice_taxtotal',
    `invoice_total` = '$edit_recurring_invoice_total',
    `applied_payment` = '$edit_recurring_applied_payment',
    `invoice_amount_due` = '$edit_recurring_invoice_amount_due',
    `invoice_status` = '$edit_recurring_invoice_status',
    `invoice_lastmodified` =  '$timevar',
    `dudes_id_lastmodified` = '$dudesid'
    WHERE
    `ids_toinvoices_recurring`.`invoice_id` = '$edit_this_recurring_invoice_id'
    ";

    $run_update_toinvoices_recurring = mysqli_query($idsconnection_mysqli, $query_update_toinvoices_recurring);



   

    $dudes_dlr_body = "
    $myname $dudesid Updated a Reccuring Invoice  #$edit_this_recurring_invoice_id 
    ";
    
    $dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
    $dudessql_temp_do = "
    INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
    `dudes_dlr_did` = '$edit_this_recurring_invoice_dealerid',
    `dudes_dlr_dude_id` = '$dudesid',
    `dudes_dlr_dude_name` = '$myname',
    `dudes_recurring_invoice_id` = '$edit_this_recurring_invoice_id',
    `dudes_dlr_body` = '$dudes_dlr_body'
    
    ";
    $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);

}

require_once('end.phpmysql.php');

?>
