<?php

$string_to_encrypt="Test";
$password="password";
$encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password);
$decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$password);



echo $encrypted_string;
echo '<br />'.'<br />'.'<br />';
echo $decrypted_string;
?>