<?php require_once("db_sales_loggedin.php"); ?>
<?php

$against_time_now = date("Y-m-d H:i:s");
$against_time_now = zone_conversion_date($against_time_now, $zone_from, $zone_to);


$colname_view_thislead = "-1";
if (isset($_GET['leadid'])) {
  $colname_view_thislead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thislead =  "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_salesperson_id` = '$sid' AND `cust_dealer_id` = '$did' OR `cust_salesperson2_id` = '$sid' AND `cust_dealer_id` = '$did' AND cust_leadid = '$colname_view_thislead'";
$view_thislead = mysqli_query($idsconnection_mysqli, $query_view_thislead);
$row_view_thislead = mysqli_fetch_assoc($view_thislead);
$totalRows_view_thislead = mysqli_num_rows($view_thislead);

$lead_cust_leadid = $row_view_thislead['cust_leadid'];
$cust_dealer_id =  $row_view_thislead['cust_dealer_id'];


if($cust_dealer_id != $did){
  header('Location: mysales.leads.php');
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_cust_leadnotes = "SELECT * FROM `idsids_idsdms`.`cust_lead_notes` WHERE `lead_cust_leadid` = '$lead_cust_leadid' ORDER BY lead_note_created DESC";
$query_cust_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_cust_leadnotes);
$row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes);
$totalRows_query_cust_leadnotes = mysqli_num_rows($query_cust_leadnotes);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_appointments_frm_now = "
SELECT * 
FROM `idsids_idsdms`.`dealers_appointments`, `idsids_idsdms`.`cust_leads`
WHERE 
`dealers_appointments`.`dlr_appt_did` = '$cust_dealer_id'
AND
`cust_leads`.`cust_leadid` = '$lead_cust_leadid'
AND
`dealers_appointments`.`dlr_appt_startunixtime` > '$against_time_now' 
ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$appointments_frm_now = mysqli_query($idsconnection_mysqli, $query_appointments_frm_now);
$row_appointments_frm_now = mysqli_fetch_assoc($appointments_frm_now);
$totalRows_appointments_frm_now = mysqli_num_rows($appointments_frm_now);


		mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
		$query_salesappts = "SELECT * 
		FROM `idsids_idsdms`.`dealers_appointments`
		WHERE 
		`dealers_appointments`.`dlr_appt_did` = '$did'
		AND
		`dealers_appointments`.`dlr_appt_lead_id` = '$lead_cust_leadid'
		AND
		`dealers_appointments`.`dlr_appt_did` = '$did' AND `dealers_appointments`.`dlr_appt_sid` = '$sid'
		ORDER BY `dealers_appointments`.`dlr_appt_id` DESC
		";
		$find_salesappts = mysqli_query($idsconnection_mysqli, $query_salesappts);
		$row_find_salesappts = mysqli_fetch_assoc($find_salesappts);
		$totalRows_find_salesappts = mysqli_num_rows($find_salesappts);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Lead View <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>
<style type="text/css">


.btn-large-dim{
  width: auto !important;
  height: auto !important;
  font-size: 42px;
}


</style>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.sales.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.sales.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing Leads</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="mysales.dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="mysales.customers.php">Customers</a>
                        </li>
                        <li>
                            <a href="mysales.leads.php">Leads</a>
                        </li>
                        <li>
                            <a><strong>Lead View</strong></a>
                            <input id="cust_leadid" type="hidden" value="<?php echo $row_view_thislead['cust_leadid']; ?>">
                            <input id="cust_vehicle_id" type="hidden" value="<?php echo $row_view_thislead['cust_vehicle_id']; ?>">

                            
                        </li>

                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        




        
	<div class="row">
			<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lead</h5>
                    </div>
                    <div class="ibox-content">
                        <p>
                            Choose And Click Your Options Below.
                        </p>
                        <h3 class="font-bold">Lead Options</h3>

                <a class="btn btn-default dim btn-large-dim" type="button"><i class="fa fa-envelope-o fa-3x"></i><br></a>                        
                        

                <a class="btn btn-info  dim btn-large-dim btn-outline" target="_parent" href="mysales.lead.edit.php?leadid=<?php echo $row_view_thislead['cust_leadid']; ?>"><i class="fa fa-pencil-square-o fa-3x"></i></a>

                <a id="logup_leadappt" data-backdrop="static" data-toggle="modal" data-target="#newappointmentModal" class="btn btn-warning dim btn-large-dim" type="button"><i class="fa fa-calendar fa-3x"></i></a>


                
                <a class="btn btn-warning dim btn-large-dim" type="button"><i class="fa fa-print fa-3x"></i></a>
                
                
                <a class="btn btn-primary  dim btn-large-dim pull-right" type="button" style="padding:2px; margin-right:5px;"><i class="fa fa-smile-o fa-3x"></i></a>
                <a class="btn btn-danger  dim btn-large-dim pull-right" type="button" style="padding:2px; margin-right:5px;"><i class="fa fa fa-frown-o fa-3x"></i></a>



                    </div>
                </div>
            </div>
	</div>



<div id="lead_contact_section" class="row">

            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Contact Information</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                           <strong> Name: </strong><span id="fullname_lead"><?php echo $row_view_thislead['cust_titlename']; ?> <?php echo $row_view_thislead['cust_fname']; ?> <?php echo $row_view_thislead['cust_mname']; ?> <?php echo $row_view_thislead['cust_lname']; ?> <?php echo $row_view_thislead['cust_name_suffix']; ?></span> <br />
                            <strong>Nick Name: </strong><span id="nickname_lead"><?php echo $row_view_thislead['cust_nickname']; ?></span> <br />
                            <strong>Sex:  </strong><?php echo $row_view_thislead['cust_lead_sex']; ?> <br />

                        </address>


                        <address>
                            <strong><u><em>Phone Numbers</em></u></strong><br><br>
                           <strong>Home Phone: </strong> <?php echo $row_view_thislead['cust_phoneno']; ?><br /><br />
                            <strong>Mobile Phone:</strong> <a href="tel: <?php echo $row_view_thislead['cust_mobilephone']; ?>"> <?php echo $row_view_thislead['cust_phoneno']; ?></a><br><br>
                            <strong>Work Phone:</strong> <a href="tel: <?php echo $row_view_thislead['cust_workphone']; ?>"> <?php echo $row_view_thislead['cust_workphone']; ?></a>
                        </address>


						<address>
                        	<strong>Email:</strong> <?php echo $row_view_thislead['cust_email']; ?>
                        </address>





                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Name & Address:</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Address 1: </strong> <?php echo $row_view_thislead['cust_home_address']; ?><br /><br />
                            <strong>Address 2: <?php echo $row_view_thislead['cust_home_address2']; ?></strong> <br /><br />
                            <strong>City, State Zip: </strong> <?php echo $row_view_thislead['cust_home_city']; ?>, <?php echo $row_view_thislead['cust_home_state']; ?> <?php echo $row_view_thislead['cust_home_zip']; ?> <?php echo $row_view_thislead['cust_home_county']; ?><br>
                        </address>


                        <address>
                            <strong>Move In Date: </strong> <?php echo $row_view_thislead['cust_home_live_movindate']; ?><br><br>


                            <strong>Live Years: </strong>
                            <a><?php echo $row_view_thislead['cust_home_live_years']; ?></a><br><br>

                            <strong>Live Months: </strong>
                            <a><?php echo $row_view_thislead['cust_home_live_months']; ?></a><br>
<br>

                        </address>


 
                    </div>

                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lead Measurements</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <ul class="list-group">
                            <li class="list-group-item">
                               <strong>Sales Person 1:</strong> <?php echo $row_view_thislead['sales_person_nametxt']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Sales Person 2:</strong> <?php echo $row_view_thislead['sales_person2_nametxt']; ?>
                            </li>

                            <li class="list-group-item">
                               <strong>Finance Type:</strong> <?php echo $row_view_thislead['cust_finance_type']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Lost Code:</strong> <?php echo $row_view_thislead['cust_lostcode']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Map Pulled:</strong> <?php echo $row_view_thislead['cust_home_okgoogle']; ?>
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info"><?php echo $row_view_thislead['cust_status']; ?></span>
                               <strong>Status:</strong> <?php echo $row_view_thislead['cust_status']; ?> 
                            </li>
                            <li class="list-group-item">
                                
<?php if(isset($row_view_thislead['cust_close_status_0'])){ echo "<span class='badge badge-danger'>".$row_view_thislead['cust_close_status_0']."</span>"; } ?>
<?php if(isset($row_view_thislead['cust_close_status_1'])){ echo "<span class='badge badge-danger'>".$row_view_thislead['cust_close_status_1']."</span>"; } ?>
<?php if(isset($row_view_thislead['cust_close_status_2'])){ echo "<span class='badge badge-danger'>".$row_view_thislead['cust_close_status_2']."</span>"; } ?>
<?php if(isset($row_view_thislead['cust_close_status_3'])){ echo "<span class='badge badge-danger'>".$row_view_thislead['cust_close_status_3']."</span>"; } ?>
<?php if(isset($row_view_thislead['cust_close_status_4'])){ echo "<span class='badge badge-danger'>".$row_view_thislead['cust_close_status_4']."</span>"; } ?>
<?php if(isset($row_view_thislead['cust_close_status_5'])){ echo "<span class='badge badge-danger'>".$row_view_thislead['cust_close_status_5']."</span>"; } ?>
								 
                                </span>
                              <strong>Closing Status:</strong>  
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-danger"><?php if(isset($row_view_thislead['cust_close_range'])){ echo $row_view_thislead['cust_close_range']; }else{ echo '1'; } ?></span>
                              <strong>Closing Range:</strong>  
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-success"> <?php if(isset($row_view_thislead['cust_lead_temperature'])){ echo $row_view_thislead['cust_lead_temperature']; }else{ echo 'Hot'; } ?></span>
                               <strong>Temperature:</strong>
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-warning"><?php if(isset($row_view_thislead['cust_perf_commun'])){ echo $row_view_thislead['cust_perf_commun']; }else{ echo 'N/A'; } ?></span>
                               <strong>Perferred:</strong> 
                            </li>
                        </ul>
                    </div>
                </div>
            
            
            </div>

			<div class="col-md-12 col-sm-12">
            
            <?php if($row_view_thislead['cust_vehicle_id'] != 0 || $row_view_thislead['cust_vehicle_id'] > 0){ ?>
            
            	<span><?php echo $row_view_thislead['cust_vehicle_id']; ?></span>
            
            <?php  } ?>
            
            </div>
</div>





<div id="current_work_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employer</h5>
                    </div>
<div class="ibox-content">
                        <address>
                            <strong>Employer Name: </strong> <?php echo $row_view_thislead['cust_employer_name']; ?><br>
                            <strong>Address 1: <?php echo $row_view_thislead['cust_employer_addr1']; ?></strong> <br>
                            <strong>Address 2: <?php echo $row_view_thislead['cust_employer_addr2']; ?></strong> <br>
                            <strong>City, State Zip: </strong><?php echo $row_view_thislead['cust_employer_city']; ?>, <?php echo $row_view_thislead['cust_employer_state']; ?> <?php echo $row_view_thislead['cust_employer_zip']; ?><br />
                        </address>


                        <address>
                            <strong>Employer Phone: </strong> 
                            <a href="tel: <?php echo $row_view_thislead['cust_employer_phone']; ?>"> <?php echo $row_view_thislead['cust_employer_phone']; ?></a><br>

                            <strong>Supervisor Phone: </strong> 
                            <a href="tel: <?php echo $row_view_thislead['cust_supervisors_phone']; ?>"> <?php echo $row_view_thislead['cust_supervisors_phone']; ?> Ext: <?php if($row_view_thislead['cust_supervisors_ext']){ echo 'Ext: '.$row_view_thislead['cust_supervisors_ext']; } ?></a><br>
                            
                        </address>




                        <address>
						<strong>Hire Date: </strong> <?php echo $row_view_thislead['cust_employer_dateohire']; ?><br />

                            <strong>Work Years: </strong> <?php echo $row_view_thislead['cust_employer_years']; ?><br />
                           
                            <strong>Work Months: </strong> <?php echo $row_view_thislead['cust_employer_months']; ?><br />
                            
                        </address>

                    <address>
                            <strong>Gross Income: </strong>  <?php echo $row_view_thislead['cust_gross_income']; ?> <br />
							<strong>Frequency: </strong><?php echo $row_view_thislead['cust_gross_income_frequency']; ?><br>
                      </address>


                    <address>
                            <strong>Other Income: </strong>  <?php echo $row_view_thislead['cust_gross_income']; ?> <br />
                            <strong>Other I. Amount: </strong>  <?php echo $row_view_thislead['cust_other_income_amount']; ?> <br />

							<strong>Frequency: </strong><?php echo $row_view_thislead['cust_gross_other_income_frequency']; ?><br>
                      </address>


 
                    </div>
                   
                   </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Vehicle Trade:</h5>
                    </div>
                  <div class="ibox-content">
                        <address>
                            <strong>Has Trade? </strong> <?php echo $row_view_thislead['tradeYes']; ?><br /><br />
                            <strong>Trade VIN: <?php echo $row_view_thislead['tradeVin']; ?></strong> <br /><br />
                            <strong>Year, Make, &amp; Model: </strong><?php echo $row_view_thislead['tradeYear']; ?>, <?php echo $row_view_thislead['tradeMake']; ?> <?php echo $row_view_thislead['tradeModel']; ?><br /><br />
                            <strong>Miles: <?php echo $row_view_thislead['tradeMiles']; ?></strong> <br /><br />

                            <strong>Trade Payment: <?php echo $row_view_thislead['tradePayment']; ?></strong> <br /><br />

                            <strong>Pay Off Amount: <?php echo $row_view_thislead['tradePayoff']; ?></strong> <br /><br />


                        </address>









 
                    </div>

                </div>
            
            
            </div>

</div>













            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Appointment Lead Information<small> from <?php echo $against_time_now; ?></small></h5>
                    </div>
                    <div class="ibox-content">


						
        <?php do{ ?>
        
        <div class="row">
        	<div class="alert <?php if($row_find_salesappts['dlr_appt_startunixtime'] > $against_time_now ){ echo 'alert-warning'; }else{   echo 'alert-danger'; } ?>">
	            <h3><?php if($row_find_salesappts['dlr_appt_startunixtime'] > $against_time_now ){ echo 'Upcoming Appointment'; }else{   echo 'Overdue Appointment'; } ?> <?php echo $row_find_salesappts['dlr_appt_title']; ?></h3>
                <div class="row">
                <div class="col-md-6">
                <p>At: <span><?php echo $row_find_salesappts['dlr_appt_startunixtime']; ?></span></p>
                <p><a class="alert-link" href="#<?php //echo $row_find_salesappts['dlr_appt_id']; ?>">Term This Appointment <?php //echo $row_find_salesappts['dlr_appt_id']; ?></a></p>
            	</div>
                <div class="col-md-6">
                <p> <span><?php echo $row_find_salesappts['dlr_appt_notes']; ?></span> </p>
                </div>
            	</div>
            </div>
        </div>

		<?php } while ($row_find_salesappts = mysqli_fetch_assoc($find_salesappts)); ?>
 
                    </div>
                </div>
            </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Write A Note </h5>
                    </div>
                    <div class="ibox-content">

                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            <div class="form-group">
                            
                        <label class="col-sm-2">
                        Notes:
                        </label>
                        
                        <div class="col-sm-10">
                        	<textarea class="left-float" id="lead_notes" rows="4" cols="50"></textarea>
                        </div>
                        
                        <div class="row">
                        
                        	<div class="col-lg-12" align="center">
                            	<button id="save_notes" class="btn btn-w-m btn-success" type="button">Save Notes</button>
                        		<div class="hr-line-dashed"></div>

                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            
                            

<p>Note History</p>
<p>  </p>
  
<div id="master_notes_layout" class="table-responsive">


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
                        	<a href="#"><i class="fa fa-check text-navy"></i></a>
                        </td>
                    </tr>







<?php } while ($row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes)); endif; ?>
                                    </tbody>
                                </table>
                            
</div>


                            
                        		<div class="hr-line-dashed"></div>
                            </div>
                        </div>


                        
                            </div>
                        
                        
                        	</div>
                        </div>
                        

                    </div>
                </div>
            </div>
            </div>


            <div class="row" style="display:none;">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <h2>Blank Form <small>Use this Form When you want to start fresh.</small></h2>

                    </div>
                </div>
            </div>
            </div>





            
            
            
        
        
        </div>
        <?php include("footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.mysales.body.php"); ?>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
<script src="js/custom/page/mysales.lead.view.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($view_thislead);

?>