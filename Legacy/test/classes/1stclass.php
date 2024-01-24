<?php

$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

echo $comma_separated; // lastname,email,phone

// Empty string when using an empty array:
//var_dump(implode('hello', array())); // string(0) ""

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PHP Class Test</title>
</head>

<body>
</body>
</html>