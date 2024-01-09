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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_cfs_exportquery = "SELECT vehicles.vid, vehicles.vcondition, vehicles.vvin, vehicles.vstockno, vehicles.vmake, vehicles.vmodel, vehicles.vyear, vehicles.vtrim, vehicles.vbody, vehicles.vmileage, vehicles.vengine, vehicles.vcylinders, vehicles.vfueltype, vehicles.vtransm, vehicles.vrprice, vehicles.vecolor_txt, vehicles.vicolor_txt, vehicles.vehicleOptionsBulk, vehicles.vcomments, vehicles.vPhotoURLs FROM vehicles WHERE did = '60' AND vehicles.vlivestatus = '1'";
$cfs_exportquery = mysqli_query($idsconnection_mysqli, $query_cfs_exportquery);
$row_cfs_exportquery = mysqli_fetch_assoc($cfs_exportquery);
$totalRows_cfs_exportquery = mysqli_num_rows($cfs_exportquery);

// Fetch Record from Database
$output = "";


// Get The Field Name

for ($i = 0; $i < $totalRows_cfs_exportquery; $i++) {
$heading = mysql_field_name($cfs_exportquery, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysqli_fetch_assoc($cfs_exportquery)) {
for ($i = 0; $i < $totalRows_cfs_exportquery; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "inventory.csv";
//header('Content-type: application/csv');
//header('Content-Disposition: attachment; filename='.$filename);

echo $output;
//exit;

?>




<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>This page is to Export cars to CarsForSale.com</p>
<?php do { ?>
  <p>Inventory <?php echo $row_cfs_exportquery['vid']; ?> To Loop</p>
  <?php } while ($row_cfs_exportquery = mysqli_fetch_assoc($cfs_exportquery)); ?>
</body>
</html>
<?php
mysqli_free_result($cfs_exportquery);
?>
