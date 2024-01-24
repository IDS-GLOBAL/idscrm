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
$query_carmakes = "SELECT * FROM car_make";
$carmakes = mysqli_query($idsconnection_mysqli, $query_carmakes);
$row_carmakes = mysqli_fetch_assoc($carmakes);
$totalRows_carmakes = mysqli_num_rows($carmakes);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>jQuery Mobile Basic List : &lt;default&gt;</title>
<link type='text/css' href='jquery.mobile-1.0/jquery.mobile-1.0.css' rel='stylesheet'/>
<script type='text/javascript' src='jquery.mobile-1.0/jquery-1.6.4.min.js'></script>
<script type='text/javascript' src='jquery.mobile-1.0/jquery.mobile-1.0.min.js'></script>
</head>

<body>
<div data-role="page">
				<div data-role="content">
					<ul data-role="listview"  data-inset="true">
					  <?php do { ?>
				      <li><a href="http://www.acura.com"><?php echo $row_carmakes['car_make']; ?></a></li>
					    <?php } while ($row_carmakes = mysqli_fetch_assoc($carmakes)); ?>
					</ul>
				</div>
			</div>
</body>
</html>
<?php
mysqli_free_result($carmakes);
?>
