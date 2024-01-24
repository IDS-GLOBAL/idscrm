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
$query_autoYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>


	<?php //do { ?>

  							<?php echo $row_autoYears['year']; ?> <br />


  	<?php // } while ($row_autoYears = mysqli_fetch_assoc($autoYears)); ?>




<form name="charity" action="" >



		<input name="name" value="" />
<br>
<br>
<br>



<label>Years:

            <select name="years">
              <option value="">Select Year</option>
              <option value="2015">2015</option>
              <?php
            do {  
            ?>
              <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
              <?php
            } while ($row_autoYears = mysqli_fetch_assoc($autoYears));
              $rows = mysqli_num_rows($autoYears);
              if($rows > 0) {
                  mysqli_data_seek($autoYears, 0);
                  $row_autoYears = mysqli_fetch_assoc($autoYears);
              }
            ?>
            </select>

</label>

</form>





</body>
</html>
<?php
mysqli_free_result($autoYears);
?>
