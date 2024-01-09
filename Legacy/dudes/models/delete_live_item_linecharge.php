<?php require_once('../db_admin.php'); ?>
<?php
//delete_reoccuring_item_linecharge.php
if(!$_POST) exit();

print_r($_POST);
if(isset(
  $_POST['thisdudesid'], 
  $_POST['dudes_secret_token'], 
  $_POST['goLiveview_invcid'], 
  $_POST['goLiveview_thisdid'], 
  $_POST['goview_thisLivedidtoken'], 
  $_POST['goview_thisLiveinvcdidtoken'], 
  $_POST['charges_id'], 
  $_POST['line_no']))
  {


  echo 'I made it damnit ';

$thisdudesid  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdudesid']));
$dudes_secret_token  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_secret_token']));
$goLiveview_invcid  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_invcid']));
$goLiveview_thisdid  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_thisdid']));
$goview_thisLivedidtoken  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisLivedidtoken']));
$goview_thisLiveinvcdidtoken  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisLiveinvcdidtoken']));
$charges_id  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['charges_id'])); 
$line_no  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['line_no']));
$editLive_charges_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['editLive_charges_amount']));


  $charges_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['charges_id']));
      


  $delete_live_linecharge_sql = "DELETE FROM `idsids_idsdms`.`ids_chargestoinvoice` WHERE `ids_chargestoinvoice`.`charges_id` = '$charges_id'";
  $query_delete_live_linecharge_sql = mysqli_query($idsconnection_mysqli, $delete_live_linecharge_sql);




  $dudes_dlr_body = "
  $myname $thisdudesid - $dudesid deleted #$goLiveview_invcid a live invoice  #$line_no line charge for $editLive_charges_amount 
  ";

  $dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
  $dudessql_temp_do = "
  INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
  `dudes_dlr_did` = '$goLiveview_thisdid',
  `dudes_dlr_dude_id` = '$dudesid',
  `dudes_dlr_dude_name` = '$myname',
  `dudes_live_invoice_id` = '$goLiveview_invcid',
  `dudes_dlr_body` = '$dudes_dlr_body'
 
  ";
  $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);

}









?>
