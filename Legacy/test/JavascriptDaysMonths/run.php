<?php


 function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('m\-d\-Y\ ');
	//return $datetime->format('Y\-m\-d\ ');
	

}

$rightnow = get_Datetime_Now();
$pattern = '/-/';
$replacement = ',';
$now = preg_replace($pattern, $replacement, $rightnow);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<script type="text/javascript">
var d = new Date(year, month, day, hours, minutes, seconds, milliseconds)
//var d=new Date();
document.write(d);

function workyearsmonthsdays() {

//var dateFormat = new SimpleDateFormat("yyyy/MM/dd");
var timeStamp = new Date(year, month, day, hours, minutes, seconds, milliseconds);
//new SimpleDateFormat("yyyyMMdd_HHmmss").format(Calendar.getInstance().getTime());

alert(timeStamp);

//var mydate = dateFormat.format(date);
//var timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(Calendar.getInstance().getTime());
//var date = new Date();
//var myyear = date.getFullYear();
//var mymonth = date.getMonth();
//var myday = date.getDate();

var hiredate = new Date(2012,08,10);

var nowdate = new Date(<?php echo $now; ?>);
var diffYears = nowdate.getFullYear()-hiredate.getFullYear();
var diffMonths = nowdate.getMonth()-hiredate.getMonth();
var diffDays = nowdate.getDate()-hiredate.getDate();

var months = (diffYears*12 + diffMonths);
if(diffDays>0) {
    months += '.'+diffDays;
} else if(diffDays<0) {
    months--;
    //months += '.'+(new Date(date2.getFullYear(),date2.getMonth(),0).getDate()+diffDays);
	var days = (new Date(nowdate.getFullYear(),nowdate.getMonth(),0).getDate()+diffDays);
}
//alert(date);
//alert(myyear);
//alert(mymonth);
//alert(myday);


document.myform.years.value = diffYears;

document.myform.months.value = months;

document.myform.days.value = days;

document.myForm.taxablePrice.value = taxablePrice;

}
</script>
</head>

<body>
<?php echo $now; ?>
<br>

<form name="myform" />

<label>Years:</label>
<input name="years" value="" />


<label>Months:</label>
<input name="months" value="" />

<br>
<label>Days</label>
<input name="days" value="" />
<br>
<a href="#" onClick="workyearsmonthsdays()">RUN</a>
</body>
</html>