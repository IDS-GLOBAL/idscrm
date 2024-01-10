<?php require_once('db_admin.php'); ?>
<?php


$dudes_dlr_notes_did = mysqli_real_escape_string($tracking_mysqli, $_GET['dudes_dlr_notes_did']);
$dudes_dlr_notes_dude_id = mysqli_real_escape_string($tracking_mysqli, $_GET['dudes_dlr_notes_dude_id']);
$dudes_dlr_notes_dude_name = mysqli_real_escape_string($tracking_mysqli, $_GET['dudes_dlr_notes_dude_name']);
$dudes_dlr_notes_body = mysqli_real_escape_string($tracking_mysqli, $_GET['dudes_dlr_notes_body']);


$insertNoteSql = "INSERT INTO `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` (`dudes_dlr_notes_did`, `dudes_dlr_notes_dude_id`, `dudes_dlr_notes_dude_name`, `dudes_dlr_notes_body`) VALUES ('$dudes_dlr_notes_did', '$dudes_dlr_notes_dude_id', '$dudes_dlr_notes_dude_name', '$dudes_dlr_notes_body')";
//echo $insertNoteSql;
$insertNote = mysqli_query($tracking_mysqli, $insertNoteSql);


$query_query_note = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` WHERE dudes_dlr_notes_did = '$dudes_dlr_notes_did' ORDER BY dudes_dlr_notes_created_at DESC";
$query_note = mysqli_query($tracking_mysqli, $query_query_note);
$row_query_note = mysqli_fetch_array($query_note);
$totalRows_query_note = mysqli_num_rows($query_note);


//print_r($_GET);
?>

<h2>Internal Comments Related To This Dealer!</h2>
              <p class="white">
              	<strong>Total Comments: </strong> <?php echo $totalRows_query_note ?> 
                
              </p>
              
              <hr />
              
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
                
<?php if($totalRows_query_note > 0): ?>                
                  <tr>
                    <th><input name="utc1" id="utc1" type="checkbox" /></th>
                    <th width="137px">Created On:</th>
                    <th>Comment:</th>
                    <th width="120">By:</th>
                  </tr>
                
				<?php  do { ?>
                  <tr>
                  <td><input name="utc1" id="utc2" type="checkbox" class="utc"></td>
                  
                    <td><?php echo $row_query_note['dudes_dlr_notes_created_at']; ?></th>
                    <td>
						<?php echo $row_query_note['dudes_dlr_notes_body']; ?>
                    			
                    </td>
                    <td>
                    <?php echo $row_query_note['dudes_dlr_notes_dude_name']; ?>
                    </td>
                  </tr>
<?php } while ($row_query_note = mysqli_fetch_array($query_note)); endif; ?>
                </table>


<?php
mysqli_free_result($query_note);
?>
<?php include("inc.end.phpmsyql.php"); ?>
