<?php require_once('../Connections/frazerdms.php'); ?>
<?php

$query_frazerdms_dealers = "SELECT * FROM `idsids_fazerdms`.`frazer_dealer`";
$frazerdms_dealers = mysqli_query($frazerdms_mysqli, $query_frazerdms_dealers);
$row_frazerdms_dealers = mysqli_fetch_assoc($frazerdms_dealers);
$totalRows_frazerdms_dealers = mysqli_num_rows($frazerdms_dealers);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>FRAZER MYSQLI RUN</title>
</head>

<body>
<?php do { ?>
 <?php echo $row_frazerdms_dealers['frazer_dealer_frzno']; ?> <?php echo $row_frazerdms_dealers['frazer_dealer_company']; ?>
  <?php } while ($row_frazerdms_dealers = mysqli_fetch_assoc($frazerdms_dealers)); ?>
</body>
</html>
<?php
mysqli_free_result($frazerdms_dealers);
?>
