<?php
// https://www.youtube.com/watch?v=e9nH-nsj7mk&list=PLvbQYvxdDoWvSYtI7jvyrJR6GkQXoN6bH&index=8&t=0s
// https://thisinterestsme.com/use-of-undefined-constant
//define('st', 82879);


echo $mainpass = 'test123';
echo '<br />'.'<br /> <hr>';
$md5pass = md5($mainpass);
$sha1pass = sha1($mainpass);
$cryptpass = crypt($mainpass,st);


echo '$cryptpass: '.$cryptpass.'<br />'.'<br /> <hr>';


$md5pass = md5($mainpass);
$sha1pass = sha1($md5pass);
$cryptpass = crypt($sha1pass,st);

echo $mainpass.'mainpass: '.md5($md5pass).'<br />';
echo $sha1pass. '<br />';
echo $cryptpass. '<br />'.'<br />';

echo '$md5pass: '.$md5pass.'<br />'.'<br /> <hr>';
echo '$sha1pass: '.$sha1pass.'<br />'.'<br /> <hr>';
echo '$cryptpass: '.$cryptpass.'<br />'.'<br /> <hr>';

$reversecryptpass = crypt($cryptpass,st);
$reverseshalpass = sha1($reversecryptpass);
$reversecrypt = md5($reverseshalpass);

echo $reversecryptpass. '<br />';
echo $reverseshalpass. '<br />';
echo $reversecrypt. '<br />'.'<hr>';



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
echo $md5pass. '<br />';
echo $sha1pass. '<br />';
echo $cryptpass. '<br />';
echo '<br />'.'<br />';
echo $reversecrypt. '<br />';

echo '<br />'.'<br /> Testing'.'<br />'.'<br />';;
echo $mainpass = md5($md5pass);





?>




</body>
</html>