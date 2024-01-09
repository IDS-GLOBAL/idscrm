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

		$nowtime = date('Y-m-d H:i:s');
		echo $suboneday = date('Y-m-d H:i:s', strtotime("-1 days"));
		echo '<br />';
		echo $against_time_now = date("Y-m-d H:i:s");
		echo '<br />';
		echo $plusoneday = date('Y-m-d H:i:s', strtotime("1 days"));
		echo '<br />';


$processSQL = "SELECT vehicles.vid, vehicles.did, vehicles.vvin, vehicles.vcondition, vehicles.vstockno, vehicles.importHomnetPhotos, vehicles.vlivestatus, vehicles.vDateInStock, vehicles.vthubmnail_file, vehicles.vthubmnail_file_path, vehicles.modified_at, vehicles.homenetLastSent, vehicles.homenetDo FROM `idsids_idsdms`.`vehicles` WHERE vehicles.importHomnetPhotos IS NOT NULL ORDER BY vehicles.vid DESC";

$processSQL2 = "SELECT vehicles.vid, vehicles.did, vehicles.vvin, vehicles.vcondition, vehicles.vstockno, vehicles.importHomnetPhotos, vehicles.vlivestatus, vehicles.vDateInStock, vehicles.vthubmnail_file, vehicles.vthubmnail_file_path, vehicles.modified_at, vehicles.homenetLastSent, vehicles.homenetDo FROM `idsids_idsdms`.`vehicles` WHERE  vehicles.importHomnetPhotos IS NOT NULL ORDER BY vehicles.vid DESC";


$regularQuerySQL = "SELECT vehicles.vid, vehicles.vcondition, vehicles.vstockno, vehicles.did, vehicles.vlivestatus, vehicles.vDateInStock, vehicles.homenetLastSent, vehicles.homenetDo, vehicles.marked_sold FROM `idsids_idsdms`.`vehicles` WHERE vehicles.homenetLastSent IS NOT NULL AND vehicles.vlivestatus = '1' ORDER BY vehicles.homenetLastSent DESC";



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehicles_sold = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`homenetLastSent` < '$suboneday' AND `vehicles`.`vlivestatus` = '1' ORDER BY `vehicles`.`homenetLastSent` DESC";
$vehicles_sold = mysqli_query($idsconnection_mysqli, $query_vehicles_sold);
$row_vehicles_sold = mysqli_fetch_assoc($vehicles_sold);
$totalRows_vehicles_sold = mysqli_num_rows($vehicles_sold);


/*
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehicless_sold = "$processSQL2";
$vehicless_sold = mysqli_query($idsconnection_mysqli, $query_vehicless_sold);
$row_vehicless_sold = mysqli_fetch_assoc($vehicless_sold);
$totalRows_vehicless_sold = mysqli_num_rows($vehicless_sold);
*/


?>
<?php
function get_Datetime_Now() {
	$tz_object = new DateTimeZone('America/New_York');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	return $datetime->format('Y\-m\-d\ h:i:s');

}

$now = get_Datetime_Now();

										
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Process Homenet Cars</title>
</head>

<body>
<?php echo 'Count '.$totalRows_vehicles_sold.'<br>'; ?>

<?php if($totalRows_vehicles_sold == 0){ echo '<b> Nothing To Do None to be marked sold </b>'.'<br />';  exit(); } ?>

<?php do { 

//$now = date('m/d/Y');
//$now = $date;



$vid = $row_vehicles_sold['vid'];
$did = $row_vehicles_sold['did'];

$justmarkSold =	"UPDATE `idsids_idsdms`.`vehicles`
					SET
					`vlivestatus` = '9',
					`homenetDo` = '0',
					`marked_sold` = '$now'
					WHERE
					`vehicles`.`vid` = '$vid'
					LIMIT 1";

$updateToSold =	"UPDATE `idsids_idsdms`.`vehicles`
					SET
					`vlivestatus` = '9',
					`homenetDo` = '0',
					`marked_sold` = '$now'
					WHERE
					`vehicles`.`vid` = '$vid'
					LIMIT 1";

$updateToSoldProcessedSQL = "UPDATE `idsids_idsdms`.`vehicles`
					SET
					`vlivestatus` = '9',										
					`homenetDo` = '0'
					WHERE
					`vehicles`.`vid` = '$vid'
					LIMIT 1";


$updateToSaleProcessedSQL = "UPDATE `idsids_idsdms`.`vehicles`
					SET
					`vlivestatus` = '1',										
					`homenetDo` = '1'
					WHERE
					`vehicles`.`vid` = '$vid'
					LIMIT 1";

if($row_vehicles_sold['vlivestatus'] == 1){ $vlivestatus = 'LIVE';}elseif($row_vehicles_sold['vlivestatus'] == 9){ $vlivestatus =  'Sold'; }else{ $vlivestatus = $row_vehicles_sold['vlivestatus']; }


$STRING = $row_vehicles_sold['vid'].' | '.$vlivestatus.''.$row_vehicles_sold['vcondition'].' '.$row_vehicles_sold['vstockno'].' ,<b>Homenet Last:</b> '.$row_vehicles_sold['homenetLastSent'].' '.$row_vehicles_sold['homenetDo'];


$homenetDo = $row_vehicles_sold['homenetDo'];

$homenetLastSent = $row_vehicles_sold['homenetLastSent'];

//$reverseDate = date("Y-m-d h:i:s", strtotime($homenetLastSent));
$reverseDate = strtotime($homenetLastSent);

$date_timestamp = strtotime($homenetLastSent);



$today_start = strtotime('today');
$today_end = strtotime('tomorrow');

			//$date_timestamp = strtotime($now);
			
			
			echo '$reverseDate = '."$reverseDate"." Which is converted from $homenetLastSent =".'$homenetLastSent';
			
			echo '<br>';
			
			if ($reverseDate >= $today_end) {
			
			
			
			   echo " $STRING $reverseDate occurs after today Totally Skipping $vid of dealer $did <b>Ignore!</b>";
			   echo '<br>';
			
			
			} elseif ($reverseDate < $today_start) {
			
			
				echo  "$STRING  $reverseDate occurs before today on $vid of dealer $did";
				echo '<br>';
				  
				$updateToSoldSQL = mysqli_query($idsconnection_mysqli, $updateToSold);
				
				echo " $STRING Marking $vid Vehicle Sold! of dealer $did becasuse date $date_timestamp <b>Marked Sold!</b>";
				echo '<br>';
			
			
			} else {
			
			
			
				   echo  "$STRING  $reverseDate occurs Today So $vid of dealer $did Is <b>Safe!</b>";
				   //$updateSQL = mysqli_query($idsconnection_mysqli, $updateThumb2,);
			
			
			
			}





?>
        
 <br />
 <hr />
  
  
  <?php } while ($row_vehicles_sold = mysqli_fetch_assoc($vehicles_sold)); ?>
</body>
</html>
<?php
mysqli_free_result($vehicles_sold);
?>