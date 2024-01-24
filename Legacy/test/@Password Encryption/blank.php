<?php

phpinfo();


$key = md5('australia');
$salt = md5('australia');


$password = 'test123';

function encrypt($string, $key){
	$string  = rtrim(base64_encode(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	//$string = rtrim(base64_encode(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	return $string;	
}

function decrypt($string, $key){
	
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
	return $string;	
}

function hashword($string, $salt){
	
	$string = crypt($string, '$1$' . $salt . '$');
	return $string;
}




$password = hashword($password, $key);
echo '<br />'.'<br />';
$decriptpassword = decrypt($password, $key);
echo '<br />'.'<br />';
echo 'Password: '.$password;
echo '<br />'.'<br />';
echo $mainpass = 'test123';
echo '<br />'.'<br />';
echo $md5pass = md5($mainpass);
echo '<br />'.'<br />';
echo $mainpass = md5($md5pass);
echo '<br />'.'<br />';
echo $sha1pass = sha1($mainpass);
echo '<br />'.'<br />';
echo $sha1pass_mainpass = sha1($sha1pass);
echo '<br />'.'<br />';
echo '<br />'.'<br />';
echo '<br />'.'<br />';
echo '<br />'.'<br />';
echo '<br />'.'<br />';
echo '<br />'.'<br />';
echo '$md5pass: '."$md5pass";
?>