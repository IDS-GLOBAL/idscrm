<?php include("db_sales_loggedin.php"); ?>
<?php

			$updatechatJoinSqll =  "UPDATE `idsids_idsdms`.`sales_person`
								SET
									`sales_person_chat` = 'Off'
								WHERE
									`salesperson_id` = '$did'
								";
			
			//$query_updatechatJoinSqll = mysqli_query($idsconnection_mysqli, "$updatechatJoinSqll");

?>
<?php
// *** Logout the current user.
$logoutGoTo = "../index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Salesperson'] = NULL;
$_SESSION['MM_SalespersonAccess'] = NULL;
unset($_SESSION['MM_Salesperson']);
unset($_SESSION['MM_SalespersonAccess']);
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
