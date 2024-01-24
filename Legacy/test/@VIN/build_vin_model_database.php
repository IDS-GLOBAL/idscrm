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
$query_find_vehicles = "SELECT vid, did, vyear, vmake, vehicles.vmodel, vtrim, vvin FROM vehicles
INNER JOIN (SELECT vmodel FROM vehicles
GROUP BY vmodel HAVING count(vid) > 1) dup ON vehicles.vmodel = dup.vmodel";
//$find_vehicles = mysqli_query($idsconnection_mysqli, $query_find_vehicles);
$find_vehicles = mysqli_query($idsconnection_mysqli, $character_length_sql);
$row_find_vehicles = mysqli_fetch_assoc($find_vehicles);
$totalRows_find_vehicles = mysqli_num_rows($find_vehicles);


function write_model_code($model_code, $make, $model, $trim, $year, $vin_did, $vin_vin_valid, $vvin_num){

global $idsconnection;

echo 'Write Function';
$vin_vin_caught = $vvin_num;

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
	





$model_code = mysql_real_escape_string(trim($model_code));
$make= mysql_real_escape_string(trim($make));
$model = mysql_real_escape_string(trim($model));
$trim= mysql_real_escape_string(trim($trim));
$year = mysql_real_escape_string(trim($year));
$vin_did = mysql_real_escape_string(trim($vin_did));
$vin_vin_valid = mysql_real_escape_string(trim($vin_vin_valid ));
$vvin_num = mysql_real_escape_string(trim($vvin_num));


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
$query_find_vinmake = "SELECT * FROM `vvin_wmionetwothree` WHERE `vvin_wmi_code` = '$vinmake_code'";
$find_vinmake = mysqli_query($idsconnection_mysqli, $query_find_vinmake);
$row_find_vinmake = mysqli_fetch_assoc($find_vinmake);
$totalRows_find_vinmake = mysqli_num_rows($find_vinmake);

$vvin_wmi_id = $row_find_vinmake['vvin_wmi_id'];
$vin_make_name = $row_find_vinmake['vvin_wmi_manuf'];

	if($totalRows_find_vinmake == 0){
		echo 'No Make Code: ';
	echo $insert_make_code_sql =
	"INSERT INTO `idsids_idsdms`.`vvin_wmionetwothree` SET
		`vvin_wmi_code` = '$vinmake_code',
		`vvin_wmi_manuf` = '$make'
	";
	//$run_make_code_sql = mysqli_query($idsconnection_mysqli, $insert_make_code_sql);
	
	}
	

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_model_code = "SELECT * FROM `vvin_wmifivesixseven_model` WHERE `vin_model_code` = '$model_code' AND `vin_model_make` = '$vin_make_name' AND `vin_model_year` = '$vin_year' ";
$find_model_code = mysqli_query($idsconnection_mysqli, $query_find_model_code);
$row_find_model_code = mysqli_fetch_assoc($find_model_code);
$totalRows_find_model_code = mysqli_num_rows($find_model_code);
$vin_model_id = $row_find_model_code['vin_model_id'];




// Danger This Writes Into The Model Database
if($totalRows_find_model_code == 0 ):
echo 'Inserted New Make Model And Code <br />';
$insert_model_code_sql =
"
INSERT INTO `idsids_idsdms`.`vvin_wmifivesixseven_model` SET
	`vin_model_code` = '$model_code',
	`vin_model_year` = '$vin_year',
	`vin_model_name` = '$model',
	`vin_vin_valid` = '$vin_vin_valid',
	`vin_vin_caught` = '$vvin_num',
	`vin_did` = '$vin_did',
	`vin_model_make` = '$vin_make_name',
	`vin_model_trim` = '$trim',
	`vin_last_six_code` = '$vin_last_six_code'
";

//$run_model_code_sql = mysqli_query($idsconnection_mysqli, $insert_model_code_sql);
else:

	echo $update_make_code_sql =
	"UPDATE `idsids_idsdms`.`vvin_wmifivesixseven_model` SET
		`vin_model_make` = '$vin_make_name'
	WHERE
	`vin_model_id` = '$vin_model_id'
	";
	//$run_update_make_code_sql = mysqli_query($idsconnection_mysqli, $update_make_code_sql);



echo 'Updated Make Name <br />';

endif;




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



<?php	$vvin_num = mysql_real_escape_string($row_find_vehicles['vvin']); ?>
<?php
$a = $vvin_num{0};		// First Digit Country   1,2,3 Indicates Maker Identifiation code 
							// US =  1,4 or 5 | Canada = 2, Mexico 3, Japan = J, Korea = K, England = s, Germany, Sweeden = W,
							// Finland = Y

$b = $vvin_num{1};		// Second Digit Manufacturer (like GM)
$c = $vvin_num{2};		// Third Digit Manufacturer Division like Chevrolet
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

$vinmake_code = $a.$b.$c;

$vinmodel_code = $d.$e.$f.$g.$h;

$vin_last_six_code = $l.$m.$n.$o.$p.$q;

$vinmake_code  = strtoupper($vinmake_code);
$vin_last_six_code  = strtoupper($vin_last_six_code);

$model_code = strtoupper($vin_model_code);
		
			$make =  strtolower($row_find_vehicles['vmake']);
			$make = ucwords($make);

			$model = strtolower($row_find_vehicles['vmodel']);
			$model = ucfirst($model);
			
$trim = $row_find_vehicles['vtrim'];
$year = $row_find_vehicles['vyear'];
$did = $row_find_vehicles['did'];

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
		// When to Write Into the Database
		write_model_code($model_code, $make, $model, $trim, $year, $did, $vin_vin_valid, $vin_vin_caught);
		
		
		
		
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
