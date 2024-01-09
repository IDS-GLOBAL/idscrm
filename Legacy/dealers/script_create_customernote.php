<?php
include("db_loggedin.php");

//if(!$_POST) exit();

//print_r($_POST);

if(isset($_POST['customer_id'], $_POST['customer_bodynote'], $_POST['customer_sales_person_id'], $_POST['customer_sales_person2_id'])){

//echo 'Made it';
	//print_r($_POST);

$customer_sales_person_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_sales_person_id']));
$customer_sales_person2_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_sales_person2_id']));

$customer_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_id']));
$note_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['customer_bodynote']));



if($customer_sales_person_id != NULL || $customer_sales_person_id != 0){

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_sales_person_name = "SELECT `salesperson_id`, `salesperson_firstname`, `salesperson_lastname`, `salesperson_nickname`, `salesperson_email` FROM `idsids_idsdms`.`sales_person` WHERE `salesperson_id` = '$customer_sales_person_id'";
$find_sales_person_name = mysqli_query($idsconnection_mysqli, $query_find_sales_person_name);
$row_find_sales_person_name = mysqli_fetch_assoc($find_sales_person_name);
$totalRows_find_sales_person_name = mysqli_num_rows($find_sales_person_name);



$sales_person_nametxt = $row_find_sales_person_name['salesperson_firstname'].' '.$row_find_sales_person_name['salesperson_lastname'];



	$note_nametext = 'In Regards to '.$sales_person_nametxt;
}else{
	$note_nametext = 'By Admin';
}

$create_customer_note_sql = "
INSERT INTO `idsids_idsdms`.`customer_notes` SET
	`note_customerid` = '$customer_id',
	`note_did` = '$did',
	`note_nametext` = '$note_nametext',
	`note_body` = '$note_body'
";


$run_create_customer_note_sql = mysqli_query($idsconnection_mysqli, $create_customer_note_sql);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_customer_leadnotes = "SELECT * FROM `idsids_idsdms`.`customer_notes` WHERE `note_customerid` = '$customer_id' ORDER BY `note_created` DESC";
$query_customer_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_customer_leadnotes);
$row_query_customer_leadnotes = mysqli_fetch_assoc($query_customer_leadnotes);
$totalRows_query_customer_leadnotes = mysqli_num_rows($query_customer_leadnotes);




}else{ exit(); }






?>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Project </th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

<?php if($row_query_customer_leadnotes['note_id'] > 0):  do { ?>

                    <tr id="notes_view_<?php echo $row_query_customer_leadnotes['note_id']; ?>">
                        <td>
                        	
                        </td>
                        <td>
                        	By: <small><?php echo $row_query_customer_leadnotes['note_nametext']; ?></small>
                        </td>
                        <td>
							
                            <p><?php echo $row_query_customer_leadnotes['note_body']; ?></p>

                        </td>
                        <td>
                        	 <?php echo $row_query_customer_leadnotes['note_created']; ?>
                        </td>
                    </tr>







<?php } while ($row_query_customer_leadnotes = mysqli_fetch_assoc($query_customer_leadnotes)); endif; ?>


                                    </tbody>
                                </table>






