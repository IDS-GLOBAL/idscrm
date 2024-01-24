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

// CHAR_LENGTH()



$sql ="
SELECT vid, vmake, vehicles.vmodel, vtrim, vvin FROM vehicles
INNER JOIN (SELECT vmodel FROM vehicles
GROUP BY vmodel HAVING count(vid) > 1) dup ON vehicles.vmodel = dup.vmodel";


$disctinct_character_length_sql =
"
SELECT DISTINCT `vid`, `did`, `vyear`, `vmake`, `vvin`, `vtrim`, `vmodel` FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vvin` AND CHAR_LENGTH(`vehicles`.`vvin`) = 17 AND `vvin` IS NOT NULL ORDER BY vmake ASC, vmodel ASC, vtrim ASC, did ASC
";


$character_length_sql =
"
SELECT `vid`, `did`, `vyear`, `vmake`, `vvin`, `vtrim`, `vmodel` FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vvin` AND CHAR_LENGTH(`vehicles`.`vvin`) = 17 AND `vvin` IS NOT NULL ORDER BY vmake ASC, vmodel ASC, vtrim ASC, did ASC
";


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicles = "SELECT * FROM `vvin_wmifivesixseven_model` WHERE `vin_model_code` IS NOT NULL ORDER BY `vin_model_make` ASC,  `vin_model_code` ASC";
$find_vehicles = mysqli_query($idsconnection_mysqli, $query_find_vehicles);
$row_find_vehicles = mysqli_fetch_assoc($find_vehicles);
$totalRows_find_vehicles = mysqli_num_rows($find_vehicles);






function write_model_code($vin_model_id, $model_code, $make, $model, $trim, $year, $vin_did, $vin_vin_valid, $vvin_num){

global $idsconnection;

//echo 'Functions';
echo '<br /> Inserted: <br /><hr />';

$vin_model_id = mysql_real_escape_string(trim($vin_model_id));

$model_code = mysql_real_escape_string(trim($model_code));
$make= mysql_real_escape_string(trim($make));
$model = mysql_real_escape_string(trim($model));
$trim= mysql_real_escape_string(trim($trim));
$year = mysql_real_escape_string(trim($year));
$vin_did = mysql_real_escape_string(trim($vin_did));
$vin_vin_valid = mysql_real_escape_string(trim($vin_vin_valid ));
$vvin_num = mysql_real_escape_string(trim($vvin_num));

$vvin_num = strtoupper($vvin_num);

$a = $vvin_num{0};		//First Digit Country   1,2,3 Indicates Maker Identifiation code US =  1,4 or 5 | Canada = 2, Mexico 3, Japan = J, Korea = K, England = s, Germany, Sweeden = W, Finland = Y

$b = $vvin_num{1};		//Second Digit Manufacturer
$c = $vvin_num{2};		//Third Digit Manufacturer Type
$d = $vvin_num{3};		//Forth Digit Brake System
$e = $vvin_num{4};		// Fifth Digit:    Model | Type like Suburban, Ranger, Lincoln, 
$f = $vvin_num{5};		// Six Digit:      Model | Length Of Vehicle And Continuation like M89
$g = $vvin_num{6};		// Seventh Digit:  Model | Width Of Vehicle   || if Alphabet '1980 AND 2010'; if Number '2010 AND 2029';
$h = $vvin_num{7};		// Eight Digit:    Engine Code
$i = $vvin_num{8};     // Nine Digit:     Check Digit: A=1 - H=8, J=1 - Z =9
$j = $vvin_num{9};		// Tenth Digit:    Model Year, suppose should refelect actual car year with Seventh Digit
$k = $vvin_num{10};    // Elleven Digit:  Make 
$l = $vvin_num{11};	// 12 - 17 Serial Numbers   The Manufacturing Plan IN Which vehicle was assembled
$m = $vvin_num{12};	// 12 - 17 Serial Numbers   These are the numbers each car receives on the assembly line 12-17
$n = $vvin_num{13};	// 12 - 17 Serial Numbers
$o = $vvin_num{14};	// 12 - 17 Serial Numbers
$p = $vvin_num{15};	// 12 - 17 Serial Numbers
$q = $vvin_num{16};	// 12 - 17 Serial Numbers


if (is_numeric($g))
	{ 	//earlier than 2010 //echo 'IS Number ';
		$vinyear_range = '1980 AND 2010';
	}else{	//echo 'NOT A Number ';
		$vinyear_range = '2010 AND 2029';
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vinyear = "SELECT * FROM `vvin_ten` WHERE `vinten_year` BETWEEN $vinyear_range AND `vinten_code` = '$j' ORDER BY `vinten_id` DESC";
$find_vinyear = mysqli_query($idsconnection_mysqli, $query_find_vinyear);
$row_find_vinyear = mysqli_fetch_assoc($find_vinyear);
$totalRows_find_vinyear = mysqli_num_rows($find_vinyear);
$vin_year = $row_find_vinyear['vinten_year'];

$vinmake_code = $a.$b.$c;

$vinmodel_code = $e.$f.$g;

$vin_last_six_code = $l.$m.$n.$o.$p.$q;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
echo $query_find_model_code = "SELECT * FROM `vvin_wmifivesixseven_model` WHERE `vin_model_code` = '$model_code' AND `vin_model_make` IS NOT NULL";
$find_model_code = mysqli_query($idsconnection_mysqli, $query_find_model_code);
$row_find_model_code = mysqli_fetch_assoc($find_model_code);
$totalRows_find_model_code = mysqli_num_rows($find_model_code);
$vin_make_name = $row_find_model_code['vin_model_make'];


	echo $update_make_code_sql =
	"UPDATE `idsids_idsdms`.`vvin_wmifivesixseven_model` SET
		`vin_model_make` = '$vin_make_name'
	WHERE
		`vin_model_id` = '$vin_model_id'
	";
	//$run_update_make_code_sql = mysqli_query($idsconnection_mysqli, $update_make_code_sql);







// Danger This Writes Into The Model Database
//if($totalRows_find_model_code == 0 ):
// $run_model_code_sql = mysqli_query($idsconnection_mysqli, $insert_model_code_sql);
//else:

//echo 'Nothing Happened huh <br />';

//endif;




return;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Build Car Model Database</title>
</head>

<body>

<?php echo $totalRows_find_vehicles; ?> Vehicles<br>
<pre>
<?php 

print_r($row_find_vehicles); 
?>
</pre>

<?php $counter_1=0; ?>
<?php do { ?>


<?php echo $counter_1++; ?>. 



<?php	$vvin_num = mysql_real_escape_string($row_find_vehicles['vin_vin_caught']); ?>
<?php
$a = $vvin_num{0};		// First Digit Country   1,2,3 Indicates Maker Identifiation code 
							// US =  1,4 or 5 | Canada = 2, Mexico 3, Japan = J, Korea = K, England = s, Germany, Sweeden = W,
							// Finland = Y

$b = $vvin_num{1};		// Second Digit Manufacturer
$c = $vvin_num{2};		// Third Digit Manufacturer Type
$d = $vvin_num{3};		// Forth Digit Brake System
$e = $vvin_num{4};		// Fifth Digit:    Model | Type like Suburban, Ranger, Lincoln, 
$f = $vvin_num{5};		// Six Digit:      Model | Length Of Vehicle And Continuation like M89
$g = $vvin_num{6};		// Seventh Digit:  Model | Width Of Vehicle   || if Alphabet '1980 AND 2010'; if Number '2010 AND 2029';
$h = $vvin_num{7};		// Eight Digit:    Engine Code
$i = $vvin_num{8};      // Nine Digit:     Check Digit: A=1 - H=8, J=1 - Z =9
$j = $vvin_num{9};		// Tenth Digit:    Model Year, suppose should refelect actual car year with Seventh Digit
$k = $vvin_num{10};     // Elleven Digit:  Make 
$l = $vvin_num{11};	    // 12 - 17 Serial Numbers   The Manufacturing Plan IN Which vehicle was assembled
$m = $vvin_num{12};	    // 12 - 17 Serial Numbers   These are the numbers each car receives on the assembly line 12-17
$n = $vvin_num{13};	// 12 - 17 Serial Numbers
$o = $vvin_num{14};	// 12 - 17 Serial Numbers
$p = $vvin_num{15};	// 12 - 17 Serial Numbers
$q = $vvin_num{16};	// 12 - 17 Serial Numbers

$vin_model_code = $e.$f.$g;

$model_code = strtoupper($vin_model_code);
		
			$make =  strtolower($row_find_vehicles['vin_model_make']);
			$make = ucwords($make);

			$model = strtolower($row_find_vehicles['vin_model_name']);
			$model = ucfirst($model);
			
$trim = $row_find_vehicles['vin_model_trim'];
$year = $row_find_vehicles['vin_model_year'];
$did = $row_find_vehicles['vin_did'];

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
        echo "<div class='danger'>VIN: $vvin number is not a valid vin.</div>";

		$vin_vin_valid ="0";
}
else
{
        echo "<div class='safe'>VIN: $vvin number is a valid vin.</div>";
		$vin_vin_valid ="1";

		$vin_vin_caught = mysql_real_escape_string(trim($row_find_vehicles['vvin']));
		$vin_model_id = mysql_real_escape_string(trim($row_find_vehicles['vin_model_id']));
		// When to Write Into the Database
		write_model_code($vin_model_id, $model_code, $make, $model, $trim, $year, $did, $vin_vin_valid, $vin_vin_caught);
		
		
		
		
}

		
		
		
		
		


?>  
  
  
  Vid: <?php echo $vid; ?>
  Did: <?php echo $did; ?>
  "<?php echo $year; ?> <?php echo $make; ?> <?php echo $model; ?>
  <?php echo $trim; ?>"
  <?php //echo $row_find_vehicles['vvin']; ?>
<?php echo $model_code;  ?>  

  <br />
  <?php } while ($row_find_vehicles = mysqli_fetch_assoc($find_vehicles)); ?>
</body>
</html>
<?php
mysqli_free_result($find_vehicles);
?>
