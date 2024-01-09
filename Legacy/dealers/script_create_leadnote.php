<?php include("db_loggedin.php"); ?>
<?php
// print($_POST);

if(isset($_POST['cust_leadid'], $_POST['cust_bodynote'])){



$cust_leadid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_leadid']));
$lead_note_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_bodynote']));


$create_note_sql = "
INSERT INTO `idsids_idsdms`.`cust_lead_notes` SET
	`lead_cust_leadid` = '$cust_leadid',
	`lead_note_did` = '$did',
	`lead_note_nametext` = 'Dealer Admin Entered',
	`lead_note_body` = '$lead_note_body'
";


$run_create_note_sql= mysqli_query($idsconnection_mysqli, $create_note_sql);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_cust_leadnotes = "SELECT * FROM `idsids_idsdms`.`cust_lead_notes` WHERE `lead_cust_leadid` = '$cust_leadid' ORDER BY `lead_note_created` DESC";
$query_cust_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_cust_leadnotes);
$row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes);
$totalRows_query_cust_leadnotes = mysqli_num_rows($query_cust_leadnotes);


}






?>

                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Project </th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

<?php if($row_query_cust_leadnotes['leadnote_id'] > 0):  do { ?>

                    <tr id="notes_view_<?php echo $row_query_cust_leadnotes['leadnote_id']; ?>">
                        <td>
                        	
                        </td>
                        <td>
                        	By: <small><?php echo $row_query_cust_leadnotes['lead_note_nametext']; ?></small>
                        </td>
                        <td>
							
                            <p><?php echo $row_query_cust_leadnotes['lead_note_body']; ?></p>

                        </td>
                        <td>
                        	 <?php echo $row_query_cust_leadnotes['lead_note_created']; ?>
                        </td>
                        <td>
                        	<span role="button"><i class="fa fa-check text-navy"></i></span>
                        </td>
                    </tr>







<?php } while ($row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes)); endif; ?>
                                    </tbody>
                                </table>






