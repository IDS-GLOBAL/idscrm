<?php require_once('../db_admin.php'); ?>
<?php

//print_r($_POST);



if(isset(
          $_POST['invoice_dealerid'], 
          $_POST['invoice_typeid'],
          $_POST['recurring_invoice_id'],
          $_POST['recurring_invoice_number'], 
          $_POST['recurring_invoice_date'], 
          $_POST['invc_cret_evry'], 
          $_POST['invc_cret_evrywhn'], 
          $_POST['recurring_invoice_duedate'], 
          $_POST['invoice_recurring_stopdate'], 
          $_POST['recurring_daysto_payinvoice'], 
          $_POST['recurring_dealer_email_recipients'], 
          $_POST['recurring_invoice_sendtoclient'], 
          $_POST['recurring_invoice_currency'], 
          $_POST['recurring_sales_taxrate'],
          $_POST['recurring_discount_value'], 
          $_POST['recurring_discount_dollarorpercn'], 
          $_POST['recurring_invoice_shippinghanding'], 
          $_POST['recurring_invoice_arrival_fee'], 
          $_POST['recurring_invoice_subtotal'],
          $_POST['recurring_invoice_comments'], 
          $_POST['recurring_terms_conditions'], 
          $_POST['recurring_invoice_taxtotal'],
          $_POST['recurring_invoice_total'],
          $_POST['recurring_applied_payment'], 
          $_POST['recurring_invoice_amount_due'], 
          $_POST['recurring_invoice_status']
  )){



    



    $invoice_typeid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['invoice_typeid']));


    $this_recurring_invoice_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['invoice_dealerid']));;

    $this_recurring_invoice_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_id']));
  
  
  $this_recurring_invoice_dealerid = mysqli_real_escape_string(
                                          $idsconnection_mysqli, trim($_POST['invoice_dealerid'])); 
  $this_recurring_invoice_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_id'])); 
  $recurring_invoice_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_number']));

  

  $recurring_invoice_date =   mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_date'])); 
  $invc_cret_evry = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['invc_cret_evry'])); 
  $invc_cret_evrywhn = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['invc_cret_evrywhn'])); 
  $recurring_invoice_duedate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_duedate'])); 
  $invoice_recurring_stopdate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['invoice_recurring_stopdate']));
  $recurring_daysto_payinvoice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_daysto_payinvoice'])); 
    $recurring_dealer_email_recipients = mysqli_real_escape_string(
        $idsconnection_mysqli, trim($_POST['recurring_dealer_email_recipients']
    )); 
    $recurring_invoice_sendtoclient = mysqli_real_escape_string(
        $idsconnection_mysqli, trim($_POST['recurring_invoice_sendtoclient']
    )); 
  $recurring_invoice_currency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_currency']));
  $recurring_sales_taxrate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_sales_taxrate'])); 
  $recurring_discount_value = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_discount_value'])); 
  $recurring_discount_dollarorpercn = mysqli_real_escape_string(
        $idsconnection_mysqli, trim($_POST['recurring_discount_dollarorpercn']
    )); 
  $recurring_invoice_shippinghanding = mysqli_real_escape_string(
    $idsconnection_mysqli, trim($_POST['recurring_invoice_shippinghanding']
  )); 
  $recurring_invoice_arrival_fee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_arrival_fee']));
  $recurring_invoice_subtotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_subtotal']));
  $recurring_invoice_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_comments']));
  $recurring_terms_conditions = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_terms_conditions'])); 
  $recurring_invoice_taxtotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_taxtotal']));
  $recurring_invoice_total = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_total']));
  $recurring_applied_payment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_applied_payment'])); 
  $recurring_invoice_amount_due = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_amount_due'])); 
  $recurring_invoice_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recurring_invoice_status']));

  


//echo 'I Passed POST and made it';
$charges_invoiceToken = '$tkey';

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    $query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = '$this_recurring_invoice_dealerid' ORDER BY `invoice_number` DESC";
    $lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
    $row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
    $totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);


    $recurring_invoice_number = $row_lastrecurringInvcNum['invoice_number'];
    $recurring_invoice_number++;

$query_update_toinvoices_recurring = "
 INSERT INTO `ids_toinvoices_recurring` SET
    `invoice_typeid` = '$invoice_typeid',
    `invoice_dealerid` = '$this_recurring_invoice_dealerid',
    `invoice_number` = '$recurring_invoice_number',
    `invoice_tokenid` = '$tkey',
    `invoice_date` =  '$recurring_invoice_date',
    `invc_cret_evry` = '$invc_cret_evry',
    `invc_cret_evrywhn` = '$invc_cret_evrywhn',
    `invoice_duedate` = '$recurring_invoice_duedate',
    `invoice_recurring_stopdate` = '$invoice_recurring_stopdate',
    `invoice_autocharge` = '$recurring_invoice_status',
    `daysto_payinvoice` = '$recurring_daysto_payinvoice',
    `dealer_email_recipients` = '$recurring_dealer_email_recipients',
    `invoice_sendtoclient` = '$recurring_invoice_sendtoclient',
    `invoice_currency` = '$recurring_invoice_currency',
    `sales_taxrate` = '$recurring_sales_taxrate',
    `discount_value` = '$recurring_discount_value',
    `discount_dollarorpercn` = '$recurring_discount_dollarorpercn',
    `invoice_shippinghanding` = '$recurring_invoice_shippinghanding',
    `invoice_arrival_fee` = '$recurring_invoice_arrival_fee',
    `invoice_subtotal` = '$recurring_invoice_subtotal',
    `invoice_comments` = '$recurring_invoice_comments',
    `terms_conditions` = '$recurring_terms_conditions',
    `invoice_taxtotal` = '$recurring_invoice_taxtotal',
    `invoice_total` = '$recurring_invoice_total',
    `applied_payment` = '$recurring_applied_payment',
    `invoice_amount_due` = '$recurring_invoice_amount_due',
    `invoice_status` = '$recurring_invoice_status'
    ";

    $run_update_toinvoices_recurring = mysqli_query($idsconnection_mysqli, $query_update_toinvoices_recurring);
    $new_recurring_invoice_id = mysqli_insert_id($idsconnection_mysqli);

    $dudes_dlr_body = "
    $myname $dudesid Created a new reccuring invoice  #$new_recurring_invoice_id 
    ";
    
    $dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
    $dudessql_temp_do = "
    INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
    `dudes_dlr_did` = '$this_recurring_invoice_dealerid',
    `dudes_dlr_dude_id` = '$dudesid',
    `dudes_dlr_dude_name` = '$myname',
    `dudes_recurring_invoice_id` = '$new_recurring_invoice_id',
    `dudes_dlr_body` = '$dudes_dlr_body'
    
    ";
    $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);
    

  

    echo "<script>

        $('input#dudes_public_token').val('$tkey');
        
   
        $('input#new_recurring_invoice_id').val('9bc17f3169cab6a900d5');
      
        setTimeout(function(){
          console.log('3000 secs up. processing'); 
           log_fees_todatabase();
         }, 3000);

       


    </script>
    ";

}

require_once('end.phpmysql.php');

?>
