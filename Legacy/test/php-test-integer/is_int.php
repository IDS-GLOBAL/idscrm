<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$var_name1=678;
$var_name2="a678";
$var_name3="678";
$var_name4=999;
$var_name5=698.99;
$var_name6=array("a1","a2");
$var_name7=+125689.66;
if (is_int($var_name1))
{
echo "$var_name1 is Integer<br>" ;
}
else
{
echo "$var_name1 is not an Integer<br>" ;
}
if (is_int($var_name2))
{
echo "$var_name2 is Integer<br>" ;
}
else
{
echo "$var_name2 is not Integer<br>" ;
}
$result=is_int($var_name3);
echo "[ $var_name3 is Integer? ]" .var_dump($result)."<br>";
$result=is_int($var_name4);
echo "[ $var_name4 is Integer? ]" .var_dump($result)."<br>";
$result=is_int($var_name5);
echo "[ $var_name5 is Integer? ]" .var_dump($result)."<br>";
$result=is_int($var_name6);
//echo "[ $var_name6 is Integer? ]" .var_dump($result)."<br>";
 $result= is_int($var_name7);
echo "[ $var_name7 is Integer? ]" .var_dump($result);
?>
</body>
</html>