<?php require_once('../Connections/idsconnection.php'); ?>
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

 

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryvmodels = "SELECT * FROM vehicles, car_model WHERE vehicles.vmodelid = car_model.id";
$queryvmodels = mysqli_query($idsconnection_mysqli, $query_queryvmodels);
$row_queryvmodels = mysqli_fetch_assoc($queryvmodels);
$totalRows_queryvmodels = mysqli_num_rows($queryvmodels);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>

  Loop ME!
  <?php 
  
  $vid = $row_queryvmodels['vid']; 
  $make = $row_queryvmodels['make'];
  $model = $row_queryvmodels['model'];
  $year = $row_queryvmodels['vyear'];
  $vtrim = $row_queryvmodels['vtrim'];
  
  
							$update =  "UPDATE `idsids_idsdms`.`vehicles`
										SET
										`vmake` = '$make',
										`vmodel` = '$model'
										WHERE
										`vehicles`.`vid` = $vid
										LIMIT 1
										";
							
							$updateSQL = mysqli_query($idsconnection_mysqli, "$update");
  
  ?>

<br />
<?php echo "$vid | $year $make $model $vtrim "; ?>

<?php } while ($row_queryvmodels = mysqli_fetch_assoc($queryvmodels)); ?>
</body>
</html>
<?php
mysqli_free_result($queryvmodels);
?>
