<?php include("db_manager_loggedin.php"); ?>
<?php

			$updatechatJoinSqll =  "UPDATE `idsids_idsdms`.`dealers`
								SET
									dealer_chat = 'Off'
								WHERE
									`dealers`.`id` = '$did'
								";
			
			//$query_updatechatJoinSqll = mysqli_query($idsconnection_mysqli, "$updatechatJoinSqll");

?>
<?php
// *** Logout the current user.
$logoutGoTo = "../index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Managerperson'] = NULL;
$_SESSION['MM_Managerperson'] = NULL;
unset($_SESSION['MM_Managerperson']);
unset($_SESSION['MM_Managerperson']);
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
