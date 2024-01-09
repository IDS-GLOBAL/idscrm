<?php require_once("db.php"); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealertask = "SELECT * FROM `idsids_idsdms`.`dealers_tasks` WHERE `dealers_tasks`.`task_did` = '$did' ORDER BY `dealers_tasks`.`task_starttime_milli` DESC";
$find_dealertask = mysqli_query($idsconnection_mysqli, $query_find_dealertask);
$row_find_dealertask = mysqli_fetch_assoc($find_dealertask);
$totalRows_find_dealertask = mysqli_num_rows($find_dealertask);


?>
<script type="text/javascript" src="js/custom/ajax_reloadtask.js"></script>
<div class="mail-box-header">


                <h2>
                    Task (<?php echo $totalRows_find_dealertask; ?>)
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                    </div>
                    <button id="reloadtask" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                </div>
            </div>
                <div class="mail-box">
<?php if($totalRows_find_dealertask != 0): ?>
                <table class="table table-hover table-mail">
                <tbody>

<?php do { ?>
                <tr class="unread">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a><?php echo $row_find_dealertask['task_title']; ?></a></td>
                    <td class="mail-subject"><a><?php echo $row_find_dealertask['task_message']; ?></a></td>
                    <td class="">
                    
                    	<?php if($row_find_dealertask['robot_sendemail'] == 1): ?> 
							
                            <i class="fa fa-bullhorn"></i>
                            
                        <?php endif; ?>
                        
                    </td>
                    <td class="text-right mail-date"><a href="taskview.php?task_token=<?php echo $row_find_dealertask['task_token']; ?>"><?php echo $row_find_dealertask['taskend_unixtime']; ?></a></td>
                </tr>
    <?php } while ($row_find_dealertask = mysqli_fetch_assoc($find_dealertask)); ?>
                </tbody>
                </table>

<?php endif; ?>

                </div>