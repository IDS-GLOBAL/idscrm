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
The vehicle identification number is divided into four parts:

1. World Manufacturer's Identification (WMI - three characters).
2. The Vehicle Description Section (VDS - five characters).
3. The check digit.
4. The Vehicle Identification Section (VIS - eight characters).



				With the letters “I”, “O” and “Q” not normally used.

				// 1N4AL3AP0EC201644  = 2014 Nissan Altima
				// 1LNHM82W25Y663274 = 2005 Lincoln Town Car
				// KNDJP3A58F7190769 = 2015 Kia Soul
				
				// 3N1CB51D56L640483  2006 Nissan Sentra
*/



//Note: The letters I, O, Q, U or Z never appear in a VIN.
if(isset($_GET['vin'])){
	
	$vvin_num = mysql_real_escape_string($_GET['vin']);

}else{
	
	exit;
	$vvin_num = "3GNFK22049G175526";
}

echo $a = $vvin_num{0};		//First Digit Country   1,2,3 Indicates Maker Identifiation code US =  1,4 or 5 | Canada = 2, Mexico 3, Japan = J, Korea = K, England = s, Germany, Sweeden = W, Finland = Y

echo $b = $vvin_num{1};		//Second Digit Manufacturer
echo $c = $vvin_num{2};		//Third Digit Manufacturer Type
echo $d = $vvin_num{3};		//Forth Digit Brake System
echo $e = $vvin_num{4};		// Fifth Digit:    Model | Type like Suburban, Ranger, Lincoln, 
echo $f = $vvin_num{5};		// Six Digit:      Model | Length Of Vehicle And Continuation like M89
echo $g = $vvin_num{6};		// Seventh Digit:  Model | Width Of Vehicle   || if Alphabet '1980 AND 2010'; if Number '2010 AND 2029';
echo $h = $vvin_num{7};		// Eight Digit:    Engine Code
echo $i = $vvin_num{8};     // Nine Digit:     Check Digit: A=1 - H=8, J=1 - Z =9
echo $j = $vvin_num{9};		// Tenth Digit:    Model Year, suppose should refelect actual car year with Seventh Digit
echo $k = $vvin_num{10};    // Elleven Digit:  Make 
echo $l = $vvin_num{11};	// 12 - 17 Serial Numbers   The Manufacturing Plan IN Which vehicle was assembled
echo $m = $vvin_num{12};	// 12 - 17 Serial Numbers   These are the numbers each car receives on the assembly line 12-17
echo $n = $vvin_num{13};	// 12 - 17 Serial Numbers
echo $o = $vvin_num{14};	// 12 - 17 Serial Numbers
echo $p = $vvin_num{15};	// 12 - 17 Serial Numbers
echo $q = $vvin_num{16};	// 12 - 17 Serial Numbers

echo '<br />';


if (is_numeric($g))
	{
	//earlier than 2010
	echo 'IS Number ';
	
	
	  $vinyear_range = '1980 AND 2010';
	 
	}else{
	
		echo 'NOT A Number ';
		$vinyear_range = '2010 AND 2029';
	
	}

 
 
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vinyear = "SELECT * FROM `vvin_ten` WHERE `vinten_year` BETWEEN $vinyear_range AND `vinten_code` = '$j' ORDER BY `vinten_id` DESC";
$find_vinyear = mysqli_query($idsconnection_mysqli, $query_find_vinyear);
$row_find_vinyear = mysqli_fetch_assoc($find_vinyear);
$totalRows_find_vinyear = mysqli_num_rows($find_vinyear);
$vyear = $row_find_vinyear['vinten_year'];


$vinmake = $a.$b.$c;
@$vinmake = strtoupper($vinmake);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vinmake = "SELECT * FROM `vvin_wmionetwothree` WHERE `vvin_wmi_code` = '$vinmake'";
$find_vinmake = mysqli_query($idsconnection_mysqli, $query_find_vinmake);
$row_find_vinmake = mysqli_fetch_assoc($find_vinmake);
$totalRows_find_vinmake = mysqli_num_rows($find_vinmake);
$vmake = $row_find_vinmake['vvin_wmi_manuf'];

$vinmodel = $e.$f.$g;
@$vinmodel = strtoupper($vinmodel);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vinmodel = "SELECT * FROM `vvin_wmifivesixseven_model` WHERE `vin_model_code` = '$vinmodel'";
$find_vinmodel = mysqli_query($idsconnection_mysqli, $query_find_vinmodel);
$row_find_vinmodel = mysqli_fetch_assoc($find_vinmodel);
$totalRows_find_vinmodel = mysqli_num_rows($find_vinmodel);
$vin_model_name = $row_find_vinmodel['vin_model_name'];
$vin_model_trim = $row_find_vinmodel['vin_model_trim'];







echo $vyear.' ';


echo $vmake.' ';



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



//echo $vmodel.' ';
?>
<br />
<?php //do { ?>


<?php echo $vyear.' '.$vmake.' '.$vin_model_name.' '.$vin_model_trim; ?>

  <?php // } while ($row_find_vinyear = mysqli_fetch_assoc($find_vinyear)); ?>

<?php
mysqli_free_result($find_vinyear);
?>
