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
$query_idsmakes = "SELECT * FROM car_make";
$idsmakes = mysqli_query($idsconnection_mysqli, $query_idsmakes);
$row_idsmakes = mysqli_fetch_assoc($idsmakes);
$totalRows_idsmakes = mysqli_num_rows($idsmakes);
?>
<html>
<head>
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmodels.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="makes" id="makes" onChange="showUser(this.value)">
  <option value="">Select One</option>
  <?php
do {  
?>
  <option value="<?php echo $row_idsmakes['make_id']?>"><?php echo $row_idsmakes['car_make']?></option>
  <?php
} while ($row_idsmakes = mysqli_fetch_assoc($idsmakes));
  $rows = mysqli_num_rows($idsmakes);
  if($rows > 0) {
      mysqli_data_seek($idsmakes, 0);
	  $row_idsmakes = mysqli_fetch_assoc($idsmakes);
  }
?>
</select>
</form>
<br>
<div id="txtHint"><b>Make &amp; Models will be listed here.</b></div>

</body>
</html>
<?php
mysqli_free_result($idsmakes);
?>
