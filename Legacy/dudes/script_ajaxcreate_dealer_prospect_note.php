<?php require_once('db_admin.php'); ?>
<?php


if(!$_POST) exit();

//print_r($_POST);

if(isset($_POST['dudesid'], $_POST['prospctdlrid'], $_POST['prspct_dlr_lognote_body'])){




$posted_dudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudesid']));
$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
$prspct_dlr_lognote_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prspct_dlr_lognote_body']));

if(isset($_POST['dudes_dlr_notes_dude_name'])){
	
	$dudes_dlr_notes_dude_name = $_POST['dudes_dlr_notes_dude_name'];

}else{

	$dudes_dlr_notes_dude_name = $myname;
}

$insert_prospect_dudenote_sql = "
INSERT INTO `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` SET
	`dudes_dlr_notes_did` = '$prospctdlrid',
	`dudes_dlr_notes_dude_id` = '$dudesid',
	`dudes_dlr_notes_dude_name` = '$dudes_dlr_notes_dude_name',
	`dudes_dlr_notes_body` = '$prspct_dlr_lognote_body'
";


//$run_dudenote_sql = mysqli_query($idsconnection_mysqli, $insert_prospect_dudenote_sql, $tracking);


$run_dudenote_sql = mysqli_query($tracking_mysqli, $insert_prospect_dudenote_sql);
$dudes_dlr_notes_id = mysqli_insert_id($tracking_mysqli);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_qrydlr_prospc_notes = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` WHERE `dudes_dlr_notes_did` = '$prospctdlrid' ORDER BY `dudes_dlr_notes_created_at` DESC";
$qrydlr_prospc_notes = mysqli_query($tracking_mysqli, $query_qrydlr_prospc_notes);
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
