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
?>
<?php do { ?>
Loop Me
<?php } while ($row_sys_appts = mysqli_fetch_assoc($sys_appts)); 

		mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sys_appts = "SELECT * FROM `dealers_appointments` WHERE `dealers_appointments`.`dlr_appt_did` = '$did' AND `dealers_appointments`.`ids_sys_owned` IS NOT NULL";
$sys_appts = mysqli_query($idsconnection_mysqli, $query_sys_appts);
$row_sys_appts = mysqli_fetch_assoc($sys_appts);
$totalRows_sys_appts = mysqli_num_rows($sys_appts);




function convertm($milliseconds){

$formattted="";
$formattted .= date('Y', strtotime($milliseconds));
$formattted .= ', '.date('m', strtotime($milliseconds));
$formattted .= ', '.date('d', strtotime($milliseconds));
$formattted .= ', '.date('h', strtotime($milliseconds));
$formattted .= ', '.date('i', strtotime($milliseconds));
$formattted .= ', '.date('s', strtotime($milliseconds));

echo 'Formatted: '.$formattted;
echo '<br />';

return $milliseconds;

}

echo '<br />';

echo $unix_time = '2015-02-27 16:11:05';

echo '<br />';

echo 'Time Converting';

echo '<br />';


echo convertm($unix_time);


?>
<?php
mysqli_free_result($sys_appts);
?>
