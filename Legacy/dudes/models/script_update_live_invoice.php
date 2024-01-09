<?php require_once("../db_admin.php"); ?>
<?php
if(!$_POST) exit();
print_r($_POST);

if(isset(
  $_POST['goLiveview_thisdid'],
  $_POST['goLiveview_invcid'],
  $_POST['goview_thisLiveinvcdidtoken'],
  $_POST['goview_thisLivedidtoken'],
  $_POST['edit_invoice_number'],
  $_POST['edit_live_invoice_terms'],
  $_POST['edit_invoice_date'],
  $_POST['edit_invoice_duedate'],
  $_POST['edit_live_invoice_terms'],
  $_POST['dealer_email_recipients'],
  $_POST['edit_invoice_sendtoclient'],
  $_POST['edit_invoice_currency'],
  $_POST['editLive_sales_taxrate'],
  $_POST['editLive_tax_total'],
  $_POST['editLive_discount_value'],
  $_POST['editLive_discount_dollarorpercn'],
  $_POST['editLive_invoice_shippinghanding'],
  $_POST['editLive_invoice_subtotal'],
  $_POST['editLive_invoice_arrival_fee'],
  $_POST['editLive_invoice_comments'],
  $_POST['editLive_terms_conditions'],
  $_POST['editLive_invoice_taxtotal'],
  $_POST['editLive_invoice_total'],
  $_POST['editLive_applied_payment'],
  $_POST['editLive_edit_invoice_amount_due'],
  $_POST['edit_recurring_invoice_status']
)){

}
echo 'I made it';


$edit_this_recurring_invoice_dealerid =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_thisdid']));

$goLiveview_invcid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_invcid']));
$edit_invoice_number = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_number']));
$edit_invoice_date  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_date']));

$edit_invoice_duedate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_duedate']));

$edit_live_invoice_terms  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_live_invoice_terms']));

$dealer_email_recipients = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_email_recipients']));
$edit_invoice_sendtoclient = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_sendtoclient']));
$edit_invoice_currency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_invoice_currency']));
$editLive_sales_taxrate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_sales_taxrate']));
$editLive_tax_total = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_tax_total']));
$editLive_discount_value = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_discount_value']));
$editLive_discount_dollarorpercn = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_discount_dollarorpercn']));
$editLive_invoice_shippinghanding=  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_invoice_shippinghanding']));
$editLive_invoice_subtotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_invoice_subtotal']));
$editLive_invoice_arrival_fee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_invoice_arrival_fee']));
$editLive_invoice_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_invoice_comments']));
$editLive_terms_conditions = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_terms_conditions']));
$editLive_invoice_taxtotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_invoice_taxtotal']));
$editLive_invoice_total =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_invoice_total']));
$editLive_applied_payment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_applied_payment']));
$editLive_edit_invoice_amount_due = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_edit_invoice_amount_due']));
$edit_live_invoice_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['edit_live_invoice_status']));



$invoice_lastmodified = mysqli_real_escape_string($idsconnection_mysqli, trim($timevar));







echo $update_live_invoice_sql = "
UPDATE `idsids_idsdms`.`ids_toinvoices` SET
         `invoice_number` = '$edit_invoice_number',
         `invoice_date` = '$edit_invoice_date',
         `invoice_duedate` = '$edit_invoice_duedate',
         `invoice_duedate` = '$edit_invoice_date',
         `invoice_arrival_fee` = '$editLive_invoice_arrival_fee',
         `invoice_status` = '$edit_live_invoice_status',
         `invoice_terms` = '$edit_live_invoice_terms',
         `invoice_sendtoclient` = '$edit_invoice_sendtoclient',
         `dealer_email_recipients` = '$dealer_email_recipients',
         `invoice_currency` = '$edit_invoice_currency',
         `sales_taxrate` = '$editLive_sales_taxrate',
         `tax_total` = '$editLive_tax_total',
         `discount_value` = '$editLive_discount_value',
         `discount_dollarorpercn` = '$editLive_discount_dollarorpercn',
         `invoice_shippinghanding` = '$editLive_invoice_shippinghanding',
         `invoice_arrival_fee` = '$editLive_invoice_arrival_fee',
         `invoice_subtotal` = '$editLive_invoice_subtotal',
         `invoice_comments` = '$editLive_invoice_comments',
         `terms_conditions` = '$editLive_terms_conditions',
         `invoice_taxtotal` = '$editLive_invoice_taxtotal',
         `invoice_total` = '$editLive_invoice_total',
         `applied_payment` = '$editLive_applied_payment',
         `invoice_amount_due` = '$editLive_edit_invoice_amount_due',
         `dudes_id_lastmodified` = '$dudesid',
         `invoice_lastmodified` = '$invoice_lastmodified'
         WHERE
         `invoice_id` = '$goLiveview_invcid'

";
$run_update_live_invoice_sql = mysqli_query($idsconnection_mysqli, $update_live_invoice_sql);






?>
