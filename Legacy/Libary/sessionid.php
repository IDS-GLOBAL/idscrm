<?php
$rsession = session_id();

if(empty($rsession)) session_start();
@$sessioncookie = "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];


@$PHPSESSID = session_id();


@$cookiePHPSESSID = $_COOKIE["PHPSESSID"];

?>