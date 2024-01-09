<?php include("db_loggedin.php"); ?>
<?php

			$updatechatJoinSqll =  "UPDATE `idsids_idsdms`.`dealers`
								SET
									dealer_chat = 'Off'
								WHERE
									`dealers`.`id` = '$did'
								";
			
			$query_updatechatJoinSqll = mysqli_query($idsconnection_mysqli, "$updatechatJoinSqll");

?>
<?php
// *** Logout the current user.
$logoutGoTo = "../index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if (isset($_SESSION))
{
    unset($_SESSION);
    session_unset();
    session_destroy();
}

if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
