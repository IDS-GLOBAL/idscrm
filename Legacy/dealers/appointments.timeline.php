<?php include("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_appointments_frm_now = "SELECT * FROM `idsids_idsdms`.`dealers_appointments` WHERE `dealers_appointments`.`dlr_appt_did` = '$did' ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$appointments_frm_now = mysqli_query($idsconnection_mysqli, $query_appointments_frm_now);
$row_appointments_frm_now = mysqli_fetch_assoc($appointments_frm_now);
$totalRows_appointments_frm_now = mysqli_num_rows($appointments_frm_now);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Appointment Timeline</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        
        <?php include("_nav_top.php"); ?>
        
        
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Appointment Timeline</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="appointments.php">Appointment Calendar</a>
                    </li>
                    <li class="active">
                        <strong>Appointments Timeline</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        
        
        
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    
                   <div class="text-center float-e-margins p-md">
                    
                    <span>Upcoming Appointments Time Line</span>
                    
                    <a href="#" class="btn btn-xs btn-primary" >From Now And Upcoming</a>
                    <a href="#" class="btn btn-xs btn-primary">Passed Appointments</a>
                    
                    
                    </div>
                    
                    
                    
                    <div class="ibox-content" id="ibox-content">

<?php
if($totalRows_appointments_frm_now != 0):
do { 
?>
                        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                        
                        
                        




                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon yellow-bg">
                                    <i class="fa fa-phone"></i>
                                </div>

  
                                <div class="vertical-timeline-content">
                                    <h2><?php echo $row_appointments_frm_now['dlr_appt_title']; ?></h2>
                                    <p><?php echo $row_appointments_frm_now['dlr_appt_notes']; ?>
                                    </p>
                                    <a href="appointment.php?appt_token=<?php echo $row_appointments_frm_now['dlr_appt_token']; ?>" class="btn btn-sm btn-primary"> Appointment View</a>
                                    <span class="vertical-date">
                                        At <br/>
                                        <small><?php echo $row_appointments_frm_now['dlr_appt_startunixtime']; ?></small>
                                    </span>
                                </div>
                            </div>





                        </div>

<?php } while ($row_appointments_frm_now = mysqli_fetch_assoc($appointments_frm_now)); else: ?>


<div align="center">

				<h2>You Don't Currently Have Any Appointments</h2>
</div>                    

<?php endif; ?>




                    </div>
                </div>
            </div>
            </div>
        </div>
		
        
        
		<?php include("footer.php"); ?>

        </div>
        </div>


	<?php include("inc.end.body.php"); ?>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($appointments_frm_now);
?>