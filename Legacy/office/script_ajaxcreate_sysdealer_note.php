<?php require_once('db_admin.php'); ?>
<?php


if(!$_POST) exit();

//print_r($_POST);

if(isset($_POST['dudesid'], $_POST['thisdid'], $_POST['sysdlr_lognote_body'])){




$posted_dudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudesid']));
$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
$prspct_dlr_lognote_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sysdlr_lognote_body']));

if(isset($_POST['sysdlr_lognote_body'])){
	
	$sysdlr_lognote_body = $_POST['sysdlr_lognote_body'];

}else{

	$sysdlr_lognote_body = $_POST['sysdlr_lognote_body'];
}

$insert_prospect_dudenote_sql = "
INSERT INTO `idsids_idsdms`.`dudes_dlr_notes` SET
	`dudes_dlr_notes_did` = '$thisdid',
	`dudes_dlr_notes_dude_id` = '$dudesid',
	`dudes_dlr_notes_dude_name` = '$myname',
	`dudes_dlr_notes_body` = '$sysdlr_lognote_body'
";


//$run_dudenote_sql = mysqli_query($idsconnection_mysqli, $insert_prospect_dudenote_sql, $tracking);

$run_dudenote_sql = mysqli_query($idsconnection_mysqli, $insert_prospect_dudenote_sql);
$dudes_dlr_notes_id = mysqli_insert_id($idsconnection_mysqli);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qrydlr_prospc_notes = "SELECT * FROM `dudes_dlr_notes` WHERE `dudes_dlr_notes_did` = '$thisdid' ORDER BY `dudes_dlr_notes_created_at` DESC";
$qrydlr_prospc_notes = mysqli_query($idsconnection_mysqli, $query_qrydlr_prospc_notes);
$row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes);
$totalRows_qrydlr_prospc_notes = mysqli_num_rows($qrydlr_prospc_notes);


if($totalRows_qrydlr_prospc_notes == 0){ exit(); }


}





?>
                            <ul class="sortable-list connectList agile-list" id="completed">
        
        <?php do { ?>                            
                                <li class="info-element" id="task<?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_id']; ?>">
                                    <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_body']; ?>
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white"><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_dude_name']; ?></a>
                                        <i class="fa fa-clock-o"></i> <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_created_at']; ?>
                                    </div>
                                </li>
        <?php } while ($row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes)); ?>
        					</ul>
