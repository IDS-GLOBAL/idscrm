<?php require_once('../../Connections/idsconnection.php'); ?>
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



/*

SELECT 
vehicles.vvin, LOWER(vehicles.vmodel) AS vmodel, vehicles.vmake, vehicles.vyear, CONCAT(UCASE(LEFT(vmodel, 1)), 
                             LCASE(SUBSTRING(vmodel, 2))) AS final
FROM 
vehicles
WHERE 
 LOWER(vmodel)  NOT IN ( SELECT LOWER(car_model.model) FROM car_model)


*/

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_car_models = "SELECT * FROM car_model ORDER BY model ASC";
$find_car_models = mysqli_query($idsconnection_mysqli, $query_find_car_models);
$row_find_car_models = mysqli_fetch_assoc($find_car_models);
$totalRows_find_car_models = mysqli_num_rows($find_car_models);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_car_models = "SELECT * FROM vvin_wmifivesixseven_model ORDER BY vvin_wmifivesixseven_model.vin_model_code ASC";
$find_vehicle_car_models = mysqli_query($idsconnection_mysqli, $query_find_vehicle_car_models);
$row_find_vehicle_car_models = mysqli_fetch_assoc($find_vehicle_car_models);
$totalRows_find_vehicle_car_models = mysqli_num_rows($find_vehicle_car_models);


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<pre>
<?php print_r($row_find_vehicle_car_models); ?>
</pre>

<table width="100%" border="1" cellpadding="3" cellspacing="3">
	<tr>
		<td valign="top">    
<?php do { ?>
<?php //echo $row_find_vehicle_car_models['vin_model_id']; ?>

<?php echo $row_find_vehicle_car_models['vin_model_code']; ?> - 
<?php echo $row_find_vehicle_car_models['vin_model_year']; ?> 
<?php echo $row_find_vehicle_car_models['vin_model_make']; ?> 
<?php echo $row_find_vehicle_car_models['vin_model_name']; ?> 
<?php echo $row_find_vehicle_car_models['vin_model_trim']; ?> 
<?php echo $row_find_vehicle_car_models['vin_vin_caught']; ?>
<br />
  
  <?php } while ($row_find_vehicle_car_models = mysqli_fetch_assoc($find_vehicle_car_models)); ?>


    	</td>
    	<td valign="top">
        <?php do { ?>
          <?php echo $row_find_car_models['model']; ?><br>
          <?php } while ($row_find_car_models = mysqli_fetch_assoc($find_car_models)); ?>

      </td>
    </tr>
</table>
<br>
</body>
</html>
<?php
mysqli_free_result($find_car_models);

mysqli_free_result($find_vehicle_car_models);

?>
