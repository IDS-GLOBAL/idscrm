<?php require_once('../Connections/wfh_connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_dealer_wfhpurchases = "SELECT * FROM wfhuser_ledger_log WHERE wfhuserledger_log_did = 60 ORDER BY wfhuserledger_log_created_at ASC";
$dealer_wfhpurchases = mysqli_query($idsconnection_mysqli, $query_dealer_wfhpurchases, $wfh_connection);
$row_dealer_wfhpurchases = mysqli_fetch_assoc($dealer_wfhpurchases);
$totalRows_dealer_wfhpurchases = mysqli_num_rows($dealer_wfhpurchases);

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_dealer_wfhpurch_logbatches = "SELECT * FROM wfhuser_ledger_batch WHERE wfhuserledger_batch_did = 60 ORDER BY wfhuserledger_batch_created_at ASC";
$dealer_wfhpurch_logbatches = mysqli_query($idsconnection_mysqli, $query_dealer_wfhpurch_logbatches, $wfh_connection);
$row_dealer_wfhpurch_logbatches = mysqli_fetch_assoc($dealer_wfhpurch_logbatches);
$totalRows_dealer_wfhpurch_logbatches = mysqli_num_rows($dealer_wfhpurch_logbatches);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Transaction Log</title>
</head>

<body>
<p>&nbsp;</p>
<p>Dealer Ledger Log:</p>
<?php do { ?>
  <p><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_id']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_id']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_token']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_vid']; ?></p>
  <p><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_did']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_typtransc']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_amount']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_created_at']; ?><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_batched_time']; ?></p>
  <?php } while ($row_dealer_wfhpurchases = mysqli_fetch_assoc($dealer_wfhpurchases)); ?>
<p>Dealer Batches Log:</p>
<?php do { ?>
  <p><?php echo $row_dealer_wfhpurch_logbatches['wfhuserledger_batch_id']; ?><?php echo $row_dealer_wfhpurch_logbatches['wfhuserledger_batch_token']; ?><?php echo $row_dealer_wfhpurch_logbatches['wfhuserledger_batch_did']; ?><?php echo $row_dealer_wfhpurch_logbatches['wfhuserledger_batch_day_amount']; ?></p>
  <p><?php echo $row_dealer_wfhpurch_logbatches['wfhuserledger_batch_created_at']; ?></p>
  <?php } while ($row_dealer_wfhpurch_logbatches = mysqli_fetch_assoc($dealer_wfhpurch_logbatches)); ?>
</body>
</html>
<?php
mysqli_free_result($dealer_wfhpurchases);

mysqli_free_result($dealer_wfhpurch_logbatches);
?>
