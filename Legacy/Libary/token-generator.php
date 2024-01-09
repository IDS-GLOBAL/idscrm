<?php 
		

		$tkey = bin2hex(openssl_random_pseudo_bytes(10));

		$tkey = mysqli_real_escape_string($idsconnection_mysqli, trim($tkey));


/*
		// Random Token Generator
		// https://stackoverflow.com/questions/4356289/php-random-string-generator
		
		$tkey = bin2hex(openssl_random_pseudo_bytes(10));
		$tkey = mysqli_real_escape_string($outinthecities_mysqli,trim($tkey));

*/
?>