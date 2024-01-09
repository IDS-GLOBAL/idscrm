<?php require_once('../db_admin.php'); ?>
<?php 
if(!$_POST) exit();
//print_r($_POST);

if(isset($_POST['charges_id'], $_POST['line_no'],$_POST['thisdudesid'], $_POST['dudes_secret_token'], $_POST['goview_recurinvcid'], $_POST['goview_thisdid'], $_POST['goview_recur_dealer_token'], $_POST['goview_recur_invoice_token'], $_POST['line_no'])){
  //echo 'I will delete reoccuring charge '.$_POST['charges_id'].'<br />';
  //echo 'I will delete reoccuring charge on line'.$_POST['line_no'].'<br />';

  $recur_charges_fee_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['charges_id']));

  $thisdudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdudesid']));
  $dudes_secret_token  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_secret_token']));
  $recurring_invoice_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_recurinvcid']));
  $recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisdid']));
  $goview_recur_dealer_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_recur_dealer_token']));
  $recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_recur_invoice_token']));
  $recur_charges_lineitem = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['line_no']));



// To get the next recourring number for increment record keeping..

    

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_recurringInvcquick = "
SELECT * FROM 
`idsids_idsdms`.`ids_chargestorecurring`
   WHERE 
    `ids_chargestorecurring`.`recur_charges_dealerid` = '$recur_charges_dealerid' 
    AND
    `ids_chargestorecurring`. `recur_charges_invoiceToken` = '$recur_charges_invoiceToken'
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









  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
    $query_delete_recurcharge = "
     DELETE  FROM `idsids_idsdms`.`ids_chargestorecurring` WHERE `ids_chargestorecurring`.`recur_charges_id` = '$recur_charges_fee_id'
      ";
    $run_delete_recurcharge = mysqli_query($idsconnection_mysqli, $query_delete_recurcharge);



    $dudes_dlr_body = "
    $myname $thisdudesid - $dudesid deleted #$recur_charges_fee_id a reccuring invoice  #$recur_charges_lineitem line charge 
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
    $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);









    
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

      `$fee_id` = '',
      `$lineitem` = '',
      `$fee_description` = '',
      `$quantity` = '',
      `$fee_price` = '',
      `$fee_amount` = '',
      `$tax` = ''
      WHERE
        `ids_toinvoices_recurring`.`invoice_id` = '$recurring_invoice_id'
      ";
      $run_sql_temp_do = mysqli_query($idsconnection_mysqli, $sql_temp_do);
    }

   
    



}

include('end.phpmysql.php');

?>
