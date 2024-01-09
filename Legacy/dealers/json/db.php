<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR);



$colname_userDetss = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDetss = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDetss ="SELECT * FROM dealers WHERE email = '$colname_userDetss'";
$userDetss = mysqli_query($idsconnection_mysqli, $query_userDetss);
$row_userDetss = mysqli_fetch_assoc($userDetss);
$totalRows_userDetss = mysqli_num_rows($userDetss);
$did = $row_userDetss['id']; //Hackishere
$dealer_email = $row_userDetss['email'];

?>