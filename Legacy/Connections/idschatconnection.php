<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
chdir(dirname(__FILE__));
$hostname_idschatconnection = "localhost";
$database_idschatconnection = "idsids_idschat";
$username_idschatconnection = "idsids_crft1";
$password_idschatconnection = "dmsKBO6xqWMzt2";
$idschatconnection_mysqli = mysqli_connect($hostname_idschatconnection, $username_idschatconnection, $password_idschatconnection, $database_idschatconnection); 
?>