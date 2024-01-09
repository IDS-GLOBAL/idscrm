#! /usr/bin/php -q
<?php
//http://www.phpclasses.org/blog/package/2/post/1-Process-incoming-email-messages-using-PHP.html

	//$message = file_get_contents( 'php://stdin' );
	$fd = fopen("php://stdin", "r");
	$email_content = "";
	
	while (!feof($fd)) {
		$email_content .= fread($fd, 1024);
		}	
	fclose($fd);
	
        $email_content = strstr($email_content, '<adf>');
        $email_content = substr($email_content, 0, strpos( $email_content, '</adf>'));
		$email_content = preg_replace('/<\?xml.*?\/>/im', '', $email_content).'</adf>';


       
	mail("quantumcas@gmail.com","Bacatcha",$email_content); 
        mail("webgoonie@gmail.com","Bacatcha",$email_content);
?>