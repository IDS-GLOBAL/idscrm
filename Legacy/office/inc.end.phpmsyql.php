<?php
chdir(dirname(__FILE__));
mysqli_close($idsconnection_mysqli);

mysqli_close($tracking_mysqli);

mysqli_close($idschatconnection_mysqli);

mysqli_close($wfh_connection_mysqli);

$pdo = null;
?>