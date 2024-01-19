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

$maxRows_find_dupphotos = 1000;
$pageNum_find_dupphotos = 0;
if (isset($_GET['pageNum_find_dupphotos'])) {
  $pageNum_find_dupphotos = $_GET['pageNum_find_dupphotos'];
}
$startRow_find_dupphotos = $pageNum_find_dupphotos * $maxRows_find_dupphotos;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dupphotos = "SELECT vehicle_id, dealer_id, photo_file_name, COUNT(*) FROM vehicle_photos WHERE dealer_id = 85 GROUP BY photo_file_name HAVING COUNT(*) > 1";
$query_limit_find_dupphotos =  "%s LIMIT %d, %d", $query_find_dupphotos, $startRow_find_dupphotos, $maxRows_find_dupphotos);
$find_dupphotos = mysqli_query($idsconnection_mysqli, $query_limit_find_dupphotos);
$row_find_dupphotos = mysqli_fetch_assoc($find_dupphotos);

if (isset($_GET['totalRows_find_dupphotos'])) {
  $totalRows_find_dupphotos = $_GET['totalRows_find_dupphotos'];
} else {
  $all_find_dupphotos = mysqli_query($idsconnection_mysqli, $query_find_dupphotos);
  $totalRows_find_dupphotos = mysqli_num_rows($all_find_dupphotos);
}
$totalPages_find_dupphotos = ceil($totalRows_find_dupphotos/$maxRows_find_dupphotos)-1;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>

			<?php
            $vid = $row_find_dupphotos['vehicle_id'];
            $did = $row_find_dupphotos['dealer_id'];
            $filename = $row_find_dupphotos['photo_file_name'];
            $many = $row_find_dupphotos['COUNT(*)'];
            $domany = ($many -1); 
            ?>
            
            <?php echo $vid; ?>
            <?php echo $did; ?>
            <?php echo $filename; ?>
            <?php echo $many; ?>
            <?php echo $domany; ?>
            <br />
		
        <br>

<?php
	for($i=0;$i<count($domany); $i++) 
	{
		echo $findSQL = "SELECT * 
					FROM 
						`idsids_idsdms`.`vehicle_photos` 
					WHERE
						`vehicle_id` = '$vid'
					AND
						`photo_file_name` = '$filename'
					LIMIT $domany";
					
		$find = mysqli_query($idsconnection_mysqli, "$findSQL") 
							or die(mysql_error());
	
		$row_find = mysqli_fetch_assoc($find);
		$v_photoid = $row_find['v_photoid'];

		echo '<br>';

		echo $deletephotoSQL = "DELETE FROM `idsids_idsdms`.`vehicle_photos` WHERE `vehicle_photos`.`v_photoid` = '$v_photoid'";

		//$deleteSQL = mysqli_query($idsconnection_mysqli, "$deletephotoSQL");
	}  

echo '<br>';
?>

  
  




  
  <?php } while ($row_find_dupphotos = mysqli_fetch_assoc($find_dupphotos)); ?>
</body>
</html>
<?php
mysqli_free_result($find_dupphotos);
?>
