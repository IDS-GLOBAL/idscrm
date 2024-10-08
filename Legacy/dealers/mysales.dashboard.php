<?php require_once("db_sales_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' AND  deal_dealerID = '$sid' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_array($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

$against_time_now = date("Y-m-d H:i:s");
$against_time_now = zone_conversion_date($against_time_now, $zone_from, $zone_to);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_appointments_frm_now = "
SELECT * 
FROM `idsids_idsdms`.`dealers_appointments` 
WHERE 
`dealers_appointments`.`dlr_appt_did` = '$did'
AND
`dealers_appointments`.`dlr_appt_sid` = '$sid'
AND  
`dealers_appointments`.`dlr_appt_startunixtime` > '$against_time_now' 
ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$appointments_frm_now = mysqli_query($idsconnection_mysqli, $query_appointments_frm_now);
$row_appointments_frm_now = mysqli_fetch_array($appointments_frm_now);
$totalRows_appointments_frm_now = mysqli_num_rows($appointments_frm_now);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_leads = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE  `cust_leads`.`cust_salesperson_id` = '$sid' AND `cust_dealer_id` = '$did'  OR `cust_salesperson2_id` = '$sid' AND `cust_dealer_id` = '$did'  ORDER BY `cust_leadid` DESC LIMIT 10";
$find_leads = mysqli_query($idsconnection_mysqli, $query_find_leads);
$row_find_leads = mysqli_fetch_array($find_leads);
$totalRows_find_leads = mysqli_num_rows($find_leads);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_credit_apps = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_sid` = '$sid' AND `credit_app_fullblown`.`applicant_did` = '$did' OR `credit_app_fullblown`.`applicant_sid2` = '$sid' AND `credit_app_fullblown`.`applicant_did` = '$did' ORDER BY `credit_app_fullblown`.`credit_app_fullblown_id` DESC LIMIT 20";
$find_credit_apps = mysqli_query($idsconnection_mysqli, $query_find_credit_apps);
$row_find_credit_apps = mysqli_fetch_array($find_credit_apps);
$totalRows_find_credit_apps = mysqli_num_rows($find_credit_apps);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_team_appointments = "SELECT * FROM `idsids_idsdms`.`dealers_appointments`, `sales_person` WHERE `dealers_appointments`.`dlr_appt_sid` = `sales_person`.`salesperson_id` AND `sales_person`.`main_dealerid` = '$did' AND `sales_person`.`salesperson_id` = '$sid' ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$sales_team_appointments = mysqli_query($idsconnection_mysqli, $query_sales_team_appointments);
$row_sales_team_appointments = mysqli_fetch_array($sales_team_appointments);
$totalRows_sales_team_appointments = mysqli_num_rows($sales_team_appointments);

function display_slspr($sid){

global $did;
global $database_idsconnection;
global $idsconnection_mysqli;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_thissalesperson = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE  `sales_person`.`main_dealerid` = '$did' AND `sales_person`.`salesperson_id` = '$sid' LIMIT 1";
$find_thissalesperson = mysqli_query($idsconnection_mysqli, $query_find_thissalesperson);
$row_find_thissalesperson = mysqli_fetch_array($find_thissalesperson);
$totalRows_find_thissalesperson = mysqli_num_rows($find_thissalesperson);
	
	echo $row_find_thissalesperson['salesperson_firstname'].' '.$row_find_thissalesperson['salesperson_lastname'];


return;
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Dashboard: <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    
    
    <script type="text/javascript" src="js/jquery-2.1.1.js"></script>


    <script type="text/javascript" src="js/plugins/jqueryCountdownTimer/jquery.countdownTimer.js"></script>

    <script type="text/javascript" src="js/custom/global.timers.js"></script>



    
    <link rel="stylesheet" type="text/css" href="css/plugins/jqueryCountdownTimer/jquery.countdownTimer.css" />

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.sales.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.sales.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>My Sales Dashboard</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Dashboard</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">





                <div class="row border-bottom dashboard-header">
                    <div class="col-lg-4">


                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Lead Snapshots </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><a href="mysales.hrefleads.php"><i class="fa fa-paper-plane"></i> New Leads</a></h3>
                                <small><i class="fa fa-tim"></i> The Last <?php echo $totalRows_find_leads; ?> Leads in the order were received.</small>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">


<?php 
if($totalRows_find_leads != 0):
do { 
?>
  <p></p>
  
                                      <div class="feed-element">
                                        <div>
                                            <small class="timeago pull-right"><abbr class="timeago" title="<?php echo $finalDate=zone_conversion_date($row_find_leads['cust_lead_created_at'], $zone_from, $zone_to); ?>"> <?php echo $row_find_leads['cust_lead_created_at']; ?></abbr></small>
                                            
<?php if($row_find_leads['cust_nickname']){ ?>                                            
"<?php echo $row_find_leads['cust_nickname']; ?>"<br />
<strong><?php echo $row_find_leads['cust_titlename']; ?> <?php echo $row_find_leads['cust_fname']; ?> <?php echo $row_find_leads['cust_lname']; ?></strong>

<?php }elseif(!$row_find_leads['cust_nickname']){ ?>


<strong><?php echo $row_find_leads['cust_titlename']; ?> <?php echo $row_find_leads['cust_fname']; ?> <?php echo $row_find_leads['cust_lname']; ?></strong>

<?php }else{ ?>


<?php } ?>


                                            
                                            
                                            <br />
<a href="mysales.lead.view.php?leadid=<?php echo $row_find_leads['cust_leadid']; ?>">View</a>

<small class="pull-right"><abbr class="" title=""><?php $sid = $row_find_leads['cust_salesperson_id']; if($sid){ display_slspr($sid); }else{ echo 'Unassigned Sales Person';} ?></abbr></small>
                                            
                                            
                                            <div id="fbid" class=""><?php echo $row_find_leads['fbid']; ?></div>
                                            <small class="text-muted"><?php echo $row_find_leads['fbid']; //Today 2:23 pm - 11.06.2014 ?></small>
                                        </div>
                                    </div>

  <?php } while ($row_find_leads = mysqli_fetch_array($find_leads));
   endif;
  
  ?>
                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">Permanent</small>
                                            <strong>Looking For New Leads</strong>
                                            <div>There are many ways to get leads in your account. Did you know that you can also create leads manually?  If you need other ways as well please heck out our marketing and ids store section. Maybe even contact your rep and ask how can I get leads to appear in my account?</div>
                                            <small class="text-muted">about 24 hours ago</small>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    


                    <div class="ibox float-e-margins" style="display:none;">


                        <div class="ibox-title">
                            <h5>New data for the report</h5>
                        </div>



                        <div class="ibox-content ibox-heading">
                        <h3>Stock price up
                            <div class="stat-percent text-navy">34% <i class="fa fa-level-up"></i></div>
                        </h3>
                        <small><i class="fa fa-stack-exchange"></i> New economic data from the previous quarter.</small>
                    </div>



                        <div class="ibox-content">
                            <div>

                                <div class="pull-right text-right">

                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>
                                    <br/>
                                    <small class="font-bold">$ 20 054.43</small>
                                </div>
                                <h4>NYS report new data!
                                    <br/>
                                    <small class="m-r"><a href="#"> Check the stock price! </a> </small>
                                </h4>
                            </div>
                        </div>


                    </div>
                    
                    
                    </div>


                    <div class="col-lg-8">

                        <div class="row">
              

                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Latest Apppointments</h5>
                                </div>
                                <div class="ibox-content ibox-heading">
                                    <h3>Appointments!</h3>
                                    <small><i class="fa fa-map-marker"></i> Latest Appointments Due From Now.</small>
                                </div>
                                <div class="ibox-content inspinia-timeline">
<!-- Appointments From Now -->
<?php 
if($totalRows_appointments_frm_now != 0):
do { 
?>
<?php // echo $row_appointments_frm_now['appt_url_goto']; ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-phone"></i>
                                                <?php echo $finalDate=created_at(zone_conversion_date($row_appointments_frm_now['dlr_appt_startunixtime'], $zone_from, $zone_to)); //7:00 am ?>
                                                <br/>
                                                <small class="text-navy"><span id="start_appt_<?php echo $row_appointments_frm_now['dlr_appt_id']; ?>"></span></small>
                                                
                                                
                                                
            				<script>
                               
                                    $('span#start_appt_<?php echo $row_appointments_frm_now['dlr_appt_id']; ?>').countdowntimer({
                                        dateAndTime : "<?php echo $finalDate=zone_conversion_date($row_appointments_frm_now['dlr_appt_startunixtime'], $zone_from, $zone_to); ?>",
                                        size : "sm"
                                    });
                               
                            </script>

                                                
                                                
                                                
                                            </div>
                                            <div class="col-xs-7 content">
                                                <p class="m-b-xs"><strong><!--a href="appointment.php?appt_token=<?php //echo $row_appointments_frm_now['dlr_appt_token']; ?>" title="<?php //echo $row_appointments_frm_now['dlr_appt_title']; ?>"><?php //echo $row_appointments_frm_now['dlr_appt_title']; ?></a --></strong></p>
                                                <p><?php echo $row_appointments_frm_now['dlr_appt_notes']; ?></p>
                                            </div>
                                        </div>
                                    </div>
  <?php } while ($row_appointments_frm_now = mysqli_fetch_array($appointments_frm_now)); ?>
<?php endif; ?>

                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-briefcase"></i>
                                                6:00 am
                                                <br/>
                                                <small class="text-navy">Our Day Began Here</small>
                                            </div>
                                            <div class="col-xs-7 content no-top-border">
                                                <p class="m-b-xs"><strong>Make Your Next Appointment Today</strong></p>

                                                <p>Never has it been any easier
                                                <a data-toggle="modal" data-target="#newappointmentModal">Making A New Appointment Is Easy Click Here...</a></p>

                                                
                                            </div>
                                        </div>
                                    </div>


<!-- Appointments From Now -->


                                </div>
                            </div>
                        
                        

                            <div class="">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Sales People Appointments</h5>
                                        <div class="ibox-tools">
                                            <span class="label label-warning-light"><?php echo $totalRows_sales_team_appointments; ?> Appts.</span>
                                           </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div>
                                            <div class="feed-activity-list">


<?php
if($totalRows_sales_team_appointments != 0) :
do { 
?>

<?php 
$dlr_appt_startunixtime = $row_sales_team_appointments['dlr_appt_startunixtime'];
$appt_startunixtime = zone_conversion_date($dlr_appt_startunixtime, $zone_from, $zone_to); 
?> 


  
                                                <div class="feed-element">
                                                    <a href="mysales.appointment.php?appt_token=<?php echo $row_sales_team_appointments['dlr_appt_token']; ?>" class="pull-left">
                                                    
	<?php if(!$row_sales_team_appointments['profile_image']): ?>
        <img alt="image"  src="img/logo.png" width="72px">
    <?php else: ?>
        
        <img alt="image" class="img-circle" src="<?php echo $row_sales_team_appointments['profile_image']; ?>">
    <?php endif; ?>
    
                                                    </a>
                                                    <div class="media-body ">

                                                        
                                                        <strong><?php echo $row_sales_team_appointments['dlr_appt_salesname_txt']; ?></strong> Scheduled <strong> <?php echo $row_sales_team_appointments['dlr_appt_title']; ?></strong> <br>
                                                        <small class="text-muted"><?php echo date("M/d/Y h:i a D", strtotime($appt_startunixtime)); ?></small>

                                                        <div class="well">
                                                            <?php echo $row_sales_team_appointments['dlr_appt_notes']; ?>
                                                        </div>



                                                    </div>
                                                </div>


  <p></p>


  <?php 
  } while ($row_sales_team_appointments = mysqli_fetch_array($sales_team_appointments)); 
  endif; 
  ?>
  

                                                <div class="feed-element">
                                                    <a class="pull-left">
                                                        <img alt="image"  src="img/logo.png" width="72px">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right"></small>
                                                        <strong>Over See Appointments With Sales Team.</strong> <br>
                                                        <small class="text-muted">Permanent</small>
                                                        <div class="well">
                                                            Add Sales People To Your New And Exisiting Appointments And See Them in order for when they are appearing next in line.
                                                        </div>

                                                        
                                                    </div>
                                                </div>


                                            </div>

                                            <!--a class="btn btn-primary btn-block m-t" href="salespeople.php"><i class="fa fa-arrow-down"></i> Show Sales People</a -->

                                        </div>

                                    </div>
                                </div>

                            </div>
              
                        
                        
                        </div>

              
              
                        	<div class="col-lg-6">


                    <div id="latest_creditapps" class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Latest Credit Apps</h5>
                        </div>
                        <div class="ibox-content no-padding">
                            <ul class="list-group">


<?php 
if($totalRows_find_credit_apps != 0):
do {
?>
                                  <li class="list-group-item">
                                    <p><a class="text-info" href="mysales.credit-app.php?app_id=<?php echo $row_find_credit_apps['credit_app_fullblown_id']; ?>&amp;app_token=<?php echo $row_find_credit_apps['applicant_app_token']; ?> ">
                                    Name: 
                      <?php echo $row_find_credit_apps['applicant_titlename']; ?>              
<?php if($row_find_credit_apps['applicant_name']){  echo $row_find_credit_apps['applicant_name']; }else{ ?> 
<?php echo $row_find_credit_apps['applicant_fname']; ?> <?php echo $row_find_credit_apps['applicant_lname']; }; ?>
                                    </a>
                                    </p>

                                    <p><?php if($row_find_credit_apps['credit_app_source']){ echo 'From: '.$row_find_credit_apps['credit_app_source']; } ?></a> </p>
                               
                               
                               <small class="block text-muted pull-left"><i class="fa fa-clock-o"></i>
                                <abbr class="timeago" title="<?php echo $finalDate=zone_conversion_date($row_find_credit_apps['application_created_date'], $zone_from, $zone_to); ?>"><?php echo $row_find_credit_apps['application_created_date']; ?></abbr></small>




                                
                                <small class="pull-right"><a class="text-info" href="credit-app.php?app_id=<?php echo $row_find_credit_apps['credit_app_fullblown_id']; ?>&amp;app_token=<?php echo $row_find_credit_apps['applicant_app_token']; ?> ">View</a></small>
<div class="clearfix"></div>
                                           
                                
                                
                                </li>

  <?php 
  } while ($row_find_credit_apps = mysqli_fetch_array($find_credit_apps)); 
 endif;
  ?>


                                
                                <li class="list-group-item">
                                    <p><a class="text-info" >Looking For New Online Apps Today?</a> Check out our marketing and ids store section.  Maybe even contact your rep and ask how can I get new credit applications to appear in my account?</p>
                                    <small class="block text-muted"><i class="fa fa-clock-o"></i> Permanent</small>
                                </li>



                            </ul>
                        </div>
                    </div>

                            
                            
                            </div>
                            
                            
                            <div class="col-lg-6" style="display: none;">
                            
                            
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Task list (<?php echo $totalRows_find_dealertask; ?>) </h5>
                                    </div>
                                    
                                    <div class="ibox-content">
                                        <ul class="todo-list m-t small-list">
<?php 
if($totalRows_find_dealertask != 0):
do { 
?>
                                            <li>
<?php if($row_find_dealertask['task_completed'] != 1): ?>

        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
        <span class="m-l-xs"><?php echo $row_find_dealertask['task_title']; ?></span>

<?php else: ?>

        <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
        <span class="m-l-xs todo-completed"><?php echo $row_find_dealertask['task_title']; ?></span>

<?php endif; ?>


												<small class="label label-primary"><i class="fa fa-clock-o"></i><?php echo $row_find_dealertask['task_endtime_milli']; ?> mins</small>


                                            </li>
    <?php 
	} while ($row_find_dealertask = mysqli_fetch_array($find_dealertask)); 
	endif;
	?>
                                            
                                        </ul>
                                    </div>
                                
                                
                                
                                
                                
                                </div>
                            
                            
                            </div>
<!-- End Tasks -->              
                        
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Auction Transactions</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-hover margin bottom">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 1%" class="text-center">No.</th>
                                                        <th>Transaction</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td> Security doors
                                                            </small></td>
                                                        <td class="text-center small">16 Jun 2014</td>
                                                        <td class="text-center"><span class="label label-primary">$483.00</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td> Wardrobes
                                                        </td>
                                                        <td class="text-center small">10 Jun 2014</td>
                                                        <td class="text-center"><span class="label label-primary">$327.00</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td> Set of tools
                                                        </td>
                                                        <td class="text-center small">12 Jun 2014</td>
                                                        <td class="text-center"><span class="label label-warning">$125.00</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td> Panoramic pictures</td>
                                                        <td class="text-center small">22 Jun 2013</td>
                                                        <td class="text-center"><span class="label label-primary">$344.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td>Phones</td>
                                                        <td class="text-center small">24 Jun 2013</td>
                                                        <td class="text-center"><span class="label label-primary">$235.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td>Monitors</td>
                                                        <td class="text-center small">26 Jun 2013</td>
                                                        <td class="text-center"><span class="label label-primary">$100.00</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="world-map" style="height: 300px;"></div>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
        







<div style="display:none;">        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Todo List</h5>
                    </div>
                    <div class="ibox-content">
        
                    <h2>Things You Need To Do. <small>Use this Form When you want to start fresh.</small></h2>
                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center">4</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center">5</td>
                        <td class="center">C</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </tfoot>
                    </table>
        
                    </div>
                </div>
            </div>
        </div>


        


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Skate Alerts</h5>
                    </div>
                    <div class="ibox-content">
        
                    <h2>Blank Form <small>Use this Form When you want to start fresh.</small></h2>
        
                    </div>
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

    <script type="text/javascript" src="js/plugins/timeago/jquery.timeago.js"></script>

<script>

jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
});

</script>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>