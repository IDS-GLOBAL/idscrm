<?php
include("db_loggedin.php");

print_r($_GET);

$colname_quick_appointment = "-1";
if (isset($_GET['appt_token'])) {
  $colname_quick_appointment = $_GET['appt_token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
echo $query_quick_appointment =  "SELECT * FROM `idsids_idsdms`.`dealers_appointments` WHERE `dlr_appt_token` = '$colname_quick_appointment'";
$quick_appointment = mysqli_query($idsconnection_mysqli, $query_quick_appointment);
$row_quick_appointment = mysqli_fetch_assoc($quick_appointment);
$totalRows_quick_appointment = mysqli_num_rows($quick_appointment);

?>

<?php if(!$row_quick_appointment['ids_sys_owned']): ?>

        <div class="row">
            <div class='col-md-12'>
                <div class="form-group">
                   
                    <label>Appointment Title: </label>
                   
                    <h2><?php echo $row_quick_appointment['dlr_appt_title']; ?></h2>
                    
                    <?php
					if($row_quick_appointment['dlr_appt_sid'] != 0){
						echo '<strong>SalesPerson: </strong>'.$row_quick_appointment['dlr_appt_salesname_txt'].'<br />';
					}

					if($row_quick_appointment['dlr_appt_mgr_id'] != 0){
						echo '<strong>Manager: </strong>'.$row_quick_appointment['dlr_appt_mgrname_txt'].'<br />';
					}


					if($row_quick_appointment['dlr_appt_acid'] != 0){
						echo '<strong>Collector: </strong>'.$row_quick_appointment['dlr_appt_acidname_txt'].'<br />';
					}


					if($row_quick_appointment['dlr_appt_reprshop_id'] != 0){
						echo '<strong>Shop: </strong>'.$row_quick_appointment['dlr_appt_reprshopname_txt'].'<br />';
					}

					
					?>
                    <hr />
                    <div class="row">
                    	<div class="col-md-6">
		                    <label class="control">Start Time: </label>    
							<?php echo $row_quick_appointment['dlr_appt_starttime_humanread']; ?>
                        </div>
                    	<div class="col-md-6">
		                    <label class="control">End Time: </label>  
                             <?php echo $row_quick_appointment['dlr_appt_endtime_humanread']; ?>
                        </div>

                    </div>
                    <hr />          
                    
                    <div class="row">
                    	<div class="col-md-12">
                                          
                    		<label>Notes: </label>
                    		<p><?php echo $row_quick_appointment['dlr_appt_notes']; ?></p>
                            
                            
                            <div class="row">
   
   							<div class="col-md-6">
                            <a class="btn btn-primary" href="appointment.php?appt_token=<?php echo $row_quick_appointment['dlr_appt_token']; ?>">
                            Go To Appointment Full View
                            </a>

                            </div>
                            <!--div class="col-md-6">
                            <?php //if($row_quick_appointment['appt_url_goto']): ?>
                            <a class="btn btn-primary" href="<?php //echo $row_quick_appointment['appt_url_goto']; ?>">
                            Go To Appointment Action
                            </a>
                            <?php //endif; ?>
                            </div -->
                    	</div>
                    </div>
                                    
                </div>
            </div>
        </div>                                        

<?php else: ?>


		<div class="row">
            <div class='col-md-12'>
                <div class="form-group">
                   
                    <label>IDSCRM Appointment: </label>
                   
                    <h2><?php echo $row_quick_appointment['dlr_appt_title']; ?></h2>
                    <hr />
                    <div class="row">
                    	<div class="col-md-6">
		                    <label>From Time: </label>    
							<?php echo $row_quick_appointment['dlr_appt_startunixtime']; ?>
                        </div>
                    	<div class="col-md-6">
		                    <label>To Time: </label>  
                             <?php echo $row_quick_appointment['dlr_appt_endunixtime']; ?>
                        </div>

                    </div>
                    <hr />          
                    
                    <div class="row">
                    	<div class="col-md-12">
                                          
                    		<label>Notes: </label>
                    		<p><?php echo $row_quick_appointment['dlr_appt_notes']; ?></p>
                            
                            
                            <div class="row">
   
   							<div class="col-md-6">
                            <a class="btn btn-primary" href="appointment.php?appt_token=<?php echo $row_quick_appointment['dlr_appt_token']; ?>">
                            Go To Appointment Full View
                            </a>

                            </div>
                            <div class="col-md-6">
                            <?php if($row_quick_appointment['appt_url_goto']): ?>
                            <a class="btn btn-primary" href="<?php echo $row_quick_appointment['appt_url_goto']; ?>">
                            Go To Appointment Action
                            </a>
                            <?php endif; ?>
                            </div>
                    	</div>
                    </div>
                                    
                </div>
            
            <?php if($row_quick_appointment['appt_realcost'] > 1): ?>
                    <div class="row">
                    	<div class="col-md-12">
                                          
                    		<label>This Appointment Cost: </label>
                    		<p>$<?php echo $row_quick_appointment['appt_realcost']; ?></p>
						</div>
					</div>
            <?php endif; ?>
            
            </div>
        </div>                                        

<?php endif; ?>