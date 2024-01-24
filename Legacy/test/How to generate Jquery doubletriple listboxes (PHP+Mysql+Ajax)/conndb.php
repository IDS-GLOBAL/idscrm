<?php
    /* For the following details, ask your server vendor  */
    $dbhost = "localhost";
    $dbuser = "______";
    $dbpass = "______";
    $dbname = "______";
    mysql_connect( $dbhost, $dbuser, $dbpass ) or die ( "Unable to connect to MySQL server" );
    mysql_select_db( "$dbname" );
    mysqli_query($idsconnection_mysqli,  "SET NAMES utf8" ); // Set this to latin2 if you're using latin2 collacation in your database


?>