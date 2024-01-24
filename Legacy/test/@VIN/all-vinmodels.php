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
$query_find_vinmodel = "SELECT * FROM `vvin_wmifivesixseven_model` WHERE `vin_model_code` IS NOT NULL ORDER BY `vin_model_make` ASC,  `vin_model_code` ASC";
$find_vinmodel = mysqli_query($idsconnection_mysqli, $query_find_vinmodel);
$row_find_vinmodel = mysqli_fetch_assoc($find_vinmodel);
$totalRows_find_vinmodel = mysqli_num_rows($find_vinmodel);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_duplicate_codes = "SELECT vin_model_id, vin_model_name, vin_did, vin_model_year, vin_model_make, vvin_wmifivesixseven_model.vin_model_code, vin_model_trim, vin_vin_caught FROM `vvin_wmifivesixseven_model` INNER JOIN (SELECT vin_model_code FROM vvin_wmifivesixseven_model GROUP BY vin_model_code HAVING count(vin_model_id) > 1) dup ON vvin_wmifivesixseven_model.vin_model_code = dup.vin_model_code ORDER BY `vin_model_code` ASC";
$find_duplicate_codes = mysqli_query($idsconnection_mysqli, $query_find_duplicate_codes);
$row_find_duplicate_codes = mysqli_fetch_assoc($find_duplicate_codes);
$totalRows_find_duplicate_codes = mysqli_num_rows($find_duplicate_codes);







?>
<?php
/*
$VinNum = $vvin_num;

if(strlen($VinNum) != "17")
{
        echo "The number of characters you have entered (".strlen($VinNum).") does not match a valid VIN number.";
        exit;
}
 
$VinNum = strtoupper($VinNum);
$Model = array("A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "R", "S", "T", "V", "W", "X", "Y");
$Weight = array("8", "7", "6", "5", "4", "3", "2", "10", "9", "8", "7", "6", "5", "4", "3", "2");
$Char = array("A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$CharVals = array("1", "2", "3", "4", "5", "6", "7", "8", "1", "2", "3", "4", "5", "7", "9", "2", "3", "4", "5", "6", "7", "8", "9", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$VinChars = array();
 
$Counter = 0;
foreach ($Char as $CurrChar)
{
        $VinChars[$CurrChar] = $CharVals[$Counter];
        $Counter++;
}
 
$CheckDigits = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "X");
$Counter = 0;
$VinArray = array();
for ($i = 0; $i < 17; $i++)
{
        if ($i!=8)
        {
                $VinArray[$Counter] = substr($VinNum, $i, 1);
                $Counter++;
        }
}
 
$Total = 0;
for ($i = 0; $i < 16; $i++)
{
        $ThisDigit = $VinArray[$i];
        $ThisTotal = $Weight[$i] * $VinChars[$ThisDigit];
        $Total = $Total + $ThisTotal;
}
 
$Remainder = fmod($Total, 11);
if (substr($VinNum, 8, 1)!= $CheckDigits[$Remainder])
{
        echo "<div class='danger'>VIN: $vvin_num is not a valid vin.</div>";
}
else
{
        echo "<div class='safe'>VIN: $vvin_num is a valid vin.</div>";
}


*/
//echo $vmodel.' ';
?>
<h2>These Are The 3 Digit Codes For Every Make</h2>
<br />
<table width="100%" border="1">
	<tr>
	<td>All Model Codes Sorted By Make:<?php echo $totalRows_find_vinmodel; ?></td>
	<td>Duplicate Model Codes Sorted By Model Code:<?php echo $totalRows_find_duplicate_codes; ?></td>
    </tr>
	<tr>
    	<td width="50%">
<?php do { ?>
ID: <?php echo $row_find_vinmodel['vin_model_id']; ?>|
<?php echo $row_find_vinmodel['vin_model_code']; ?> | 
<?php echo $row_find_vinmodel['vin_model_make']; ?> | 
<?php echo $vin_model_name = $row_find_vinmodel['vin_model_name']; ?> |
<?php echo $vin_model_trim = $row_find_vinmodel['vin_model_trim']; ?> 
<br />

  <?php } while ($row_find_vinmodel = mysqli_fetch_assoc($find_vinmodel)); ?>

        </td>
        <td valign="top" width="50%">
<?php do { ?>

<?php echo $row_find_duplicate_codes['vin_model_code']; ?> | 
<?php echo $row_find_duplicate_codes['vin_model_year']; ?> | 
<?php echo $row_find_duplicate_codes['vin_model_make']; ?> | 
<?php echo $vin_model_name = $row_find_duplicate_codes['vin_model_name']; ?> | 
<?php echo $vin_model_trim = $row_find_duplicate_codes['vin_model_trim']; ?> | 
<?php echo $vin_model_trim = $row_find_duplicate_codes['vin_vin_caught']; ?>
<br />

  <?php } while ($row_find_duplicate_codes = mysqli_fetch_assoc($find_duplicate_codes)); ?>

        </td>
    </tr>
</table>


<?php
mysqli_free_result($find_vinmodel);

mysqli_free_result($find_duplicate_codes);
?>
