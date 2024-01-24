<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>(Type a title for your page here)</title>
</head>

<body bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">

<?
while (list ($key,$val) = each ($_POST)) {
echo "\$$key = $val";
echo "<br>";
} 

?>

</body>

</html>
