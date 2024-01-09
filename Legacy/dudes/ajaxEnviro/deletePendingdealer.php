<?php

//  $.post( url, [data], [callback], [type] )

$deletelink = $_GET['delelink'];



if($delelink){


$delete_id=str_replace("?delete_id=","",$delelink);



			require_once('config.php');



$deleteDelaerPendingSQLstring = "DELETE FROM `idsids_idsdms`.`dealers_pending` WHERE id = '$delete_id'";



$deleteDelaerPendingSQLquery = mysqli_query($idsconnection_mysqli, $deleteDelaerPendingSQLstring);



echo 'You Have Deleted $delete_id';
}
?>