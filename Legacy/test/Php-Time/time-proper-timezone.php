<?php
date_default_timezone_set('America/New_York');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
	
	//print_r(ini_get);
	
	print_r($script_tz);
} else {
    echo 'Script timezone and ini-set timezone match.';
	print_r($script_tz);
}
?>
<?php 
$date = new DateTime("2014-01-09 16:43:21", new DateTimeZone('Europe/Paris')); 

date_default_timezone_set('America/New_York'); 

echo date("Y-m-d h:iA", $date->format('U')); 




// 2012-07-05 10:43AM 


$server_time = date("Y-m-d H:i:s");


$converted_time_1 = date("M d Y h:i a D", strtotime($server_time));

$converted_time_1 = date("Y-m-d H:i:s", strtotime($server_time . " -90 days"));

$converted_time_2 = date("Y-m-d H:i:s", strtotime($server_time . " -60 days"));

//$converted_time_3 = date("Y-m-d H:i:s", strtotime($server_time . " -30 days"));

$converted_time_3 = date("Y-m-d H:i:s", strtotime($server_time . " +Wednesday"));


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>



<p>Click the button to display the number that represent this month.</p>

<button onClick="myFunction()">Try it</button>
<p id="demo"></p>
<script>
function myFunction() {
   var d = new Date();
			var mon = d.getMonth() +1;
			var dayno = d.getDay() + 1;
			var day = d.getUTCDate();
			var year = d.getFullYear();
			var hour = d.getHours();
			var nexthour = d.getHours() + 1;
  
  document.getElementById("demo").innerHTML = ''+year+'-'+mon+'-'+day+' '+nexthour;
}
</script>

<script>
var weekday=new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";

var d = new Date();
var n = weekday[d.getDay()];
document.write(n);
</script>

<p><strong>Note:</strong> 0=January, 1=February etc.</p>
</head>

<body>

<?php echo $converted_time_3; ?>
</body>
</html>