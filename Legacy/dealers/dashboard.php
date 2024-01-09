<?php include("db_loggedin.php"); ?>
<?php

$against_time_now = date("Y-m-d H:i:s");
$against_time_now = zone_conversion_date($against_time_now, $zone_from, $zone_to);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_appointments_frm_now = "
SELECT * 
FROM `idsids_idsdms`.`dealers_appointments` 
WHERE 
`dealers_appointments`.`dlr_appt_did` = '$did'
AND  
`dealers_appointments`.`dlr_appt_startunixtime` > '$against_time_now' 
ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$appointments_frm_now = mysqli_query($idsconnection_mysqli, $query_appointments_frm_now);
$row_appointments_frm_now = mysqli_fetch_assoc($appointments_frm_now);
$totalRows_appointments_frm_now = mysqli_num_rows($appointments_frm_now);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_leads = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_dealer_id` = '$did' ORDER BY `cust_leads`.`cust_leadid` DESC LIMIT 10";
$find_leads = mysqli_query($idsconnection_mysqli, $query_find_leads);
$row_find_leads = mysqli_fetch_assoc($find_leads);
$totalRows_find_leads = mysqli_num_rows($find_leads);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_credit_apps = "SELECT `credit_app_fullblown_id`, `credit_app_locked`, `applicant_did`, `applicant_sid`, `applicant_vid`, `applicant_cid`, `applicant_clid`, `applicant_app_token`, `joint_or_invidividual`, `credit_app_type`, `credit_app_source`, `application_created_date`, `credit_app_fullblown`.`applicant_titlename`, credit_app_fullblown.applicant_name, credit_app_fullblown.applicant_fname, credit_app_fullblown.applicant_lname FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$did' ORDER BY `credit_app_fullblown`.`credit_app_fullblown_id` DESC LIMIT 20";
$find_credit_apps = mysqli_query($idsconnection_mysqli, $query_find_credit_apps);
$row_find_credit_apps = mysqli_fetch_assoc($find_credit_apps);
$totalRows_find_credit_apps = mysqli_num_rows($find_credit_apps);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_team_appointments = "SELECT * FROM `idsids_idsdms`.`dealers_appointments`, `idsids_idsdms`.`sales_person` WHERE `dealers_appointments`.`dlr_appt_sid` = `sales_person`.`salesperson_id` AND `sales_person`.`main_dealerid` = '$did' ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$sales_team_appointments = mysqli_query($idsconnection_mysqli, $query_sales_team_appointments);
$row_sales_team_appointments = mysqli_fetch_assoc($sales_team_appointments);
$totalRows_sales_team_appointments = mysqli_num_rows($sales_team_appointments);

function display_slspr($sid){

global $did;
global $database_idsconnection;
global $idsconnection_mysqli;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_thissalesperson = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE  `sales_person`.`main_dealerid` = '$did' AND `sales_person`.`salesperson_id` = '$sid' LIMIT 1";
$find_thissalesperson = mysqli_query($idsconnection_mysqli, $query_find_thissalesperson);
$row_find_thissalesperson = mysqli_fetch_assoc($find_thissalesperson);
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
    
    <!-- BootstrapCDN by MaxCDN -->
	<!--link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" -->

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

    
        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        
        
        <?php include("_nav_top.php"); ?>
        
        <div class="wrapper wrapper-content">






        <div class="row" style="display:none;">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Deals</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">40 886,200</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Annual</span>
                                <h5>Inventory</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">275,800</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Recently Added</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Today</span>
                                <h5>Leads</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">106,120</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Low value</span>
                                <h5>Credit Apps.</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">80,600</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>In first month</small>
                            </div>
                        </div>
            		</div>
        </div>










        <div class="row border-bottom white-bg dashboard-header" style="display:none;">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>IDS Robot Deal Performer</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Weekly</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Anually</button>

                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="ibox-content">
                                
                                <div class="row">
                                
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">Front: 2,346</h2>
                                            <small>Total deals This Week</small>
                                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">Front: $4,422</h2>
                                            <small>Total deals This Week</small>
                                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">Front: $9,180</h2>
                                            <small>Total deals This Month</small>
                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <h2 class="no-margins ">Front: $49,180 Back End: $90,360</h2>
                                            <small>Total deals This Year</small>
                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>

                                        </ul>
                                </div>


                                </div>


                            </div>
                              

                         </div>
                            
                    </div>
                        
        </div>
 
 
        <div class="row  border-bottom white-bg dashboard-header" style="display:none;">

                    <div class="col-sm-3">
                        <h2>Sales Floor Performer</h2>
                        <small>You have 42 messages and 6 notifications.</small>
                        <ul class="list-group clear-list m-t">
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    09:00 pm
                                </span>
                                <span class="label label-success">1</span> Please contact me
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                <span class="label label-info">2</span> Sign a contract
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    08:22 pm
                                </span>
                                <span class="label label-primary">3</span> Open new shop
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    11:06 pm
                                </span>
                                <span class="label label-default">4</span> Call back to Sylvia
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    12:00 am
                                </span>
                                <span class="label label-primary">5</span> Write a letter to Sandra
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        
                        <div class="flot-chart dashboard-chart">
                            <div class="flot-chart-content" id="flot-sales_teamdashboard-chart"></div>
                        </div>
                        
                        <div class="row text-left">
                            <div class="col-xs-4">
                                <div class=" m-l-md">
                                <span class="h4 font-bold m-t block">$ 406,100</span>
                                <small class="text-muted m-b block">Sales marketing report</small>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">$ 150,401</span>
                                <small class="text-muted m-b block">Annual sales revenue</small>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">$ 16,822</span>
                                <small class="text-muted m-b block">Half-year revenue margin</small>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="statistic-box">
                        <h4>
                            Project Beta progress
                        </h4>
                        <p>
                            You have two project with not compleated task.
                        </p>
                            <div class="row text-center">
                                <div class="col-lg-6">
                                    <canvas id="polarChart" width="80" height="80"></canvas>
                                    <h5 >Kolter</h5>
                                </div>
                                <div class="col-lg-6">
                                    <canvas id="doughnutChart" width="78" height="78"></canvas>
                                    <h5 >Maxtor</h5>
                                </div>
                            </div>
                            <div class="m-t">
                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                            </div>

                        </div>
                    </div>

            </div>



            <div class="row border-bottom white-bg dashboard-header" style="display:none;">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                    <div>
                                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br/>
                                            All sales: 162,862
                                        </span>
                                        <h1 class="m-b-xs">$ 50,992</h1>
                                        <h3 class="font-bold no-margins">
                                            Half-year revenue margin
                                        </h3>
                                        <small>Sales marketing.</small>
                                    </div>

                                <div>
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>

                                <div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on 16.07.2015
                                    </small>
                                   <small>
                                       <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                                   </small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>





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
                                <h3><a href="leads.php"><i class="fa fa-paper-plane"></i> New Leads</a></h3>
                                <small><i class="fa fa-tim"></i> You have <?php echo $totalRows_find_leads; ?> leads waiting to be viewed.</small>
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
                                            
<?php if(isset($row_find_leads['cust_nickname'])){ ?>
"<?php echo $row_find_leads['cust_nickname']; ?>"<br />
<strong><?php echo $row_find_leads['cust_titlename']; ?> <?php echo $row_find_leads['cust_fname']; ?> <?php echo $row_find_leads['cust_lname']; ?></strong>


<?php }else{ ?>

<strong><?php echo $row_find_leads['cust_titlename']; ?> <?php echo $row_find_leads['cust_fname']; ?> <?php echo $row_find_leads['cust_lname']; ?></strong>


<?php } ?>


                                            
                                            
                                            <br />
<a href="lead.view.php?leadid=<?php echo $row_find_leads['cust_leadid']; ?>">CRM View</a>

<small class="pull-right"><abbr class="" title=""><?php $sid = $row_find_leads['cust_salesperson_id']; if($sid){ display_slspr($sid); }else{ echo 'Unassigned Sales Person';} ?></abbr></small>
                                            
                                            <?php if($row_find_leads['fbid']){ ?>
                                            
                                            <div id="fbid" class=""><a href="https://www.facebook.com/app_scoped_user_id/<?php echo $row_find_leads['fbid']; ?>/" target="_blank"><i class="fa fa-facebook-official"></i> <img src="https://graph.facebook.com/<?php echo $row_find_leads['fbid']; ?>/picture?type=normal"></a></div>

                                          <small class="text-muted">><a href="https://www.facebook.com/app_scoped_user_id/<?php echo $row_find_leads['fbid']; ?>/" target="_blank">View On Facebook</a></small>
                                            
                                            <?php } ?>
                                            
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
                                    <small class="m-r"><a href="graph_flot.html"> Check the stock price! </a> </small>
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
                                                <p class="m-b-xs"><strong><a href="appointment.php?appt_token=<?php echo $row_appointments_frm_now['dlr_appt_token']; ?>" title="<?php echo $row_appointments_frm_now['dlr_appt_title']; ?>"><?php echo $row_appointments_frm_now['dlr_appt_title']; ?></a></strong></p>
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
                                                    <a href="appointment.php?appt_token=<?php echo $row_sales_team_appointments['dlr_appt_token']; ?>" class="pull-left">
                                                    
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

                                            <a class="btn btn-primary btn-block m-t" href="salespeople.php"><i class="fa fa-arrow-down"></i> Show Sales People</a>

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
                                    <p><a class="text-info" href="credit-app.php?app_id=<?php echo $row_find_credit_apps['credit_app_fullblown_id']; ?>&amp;app_token=<?php echo $row_find_credit_apps['applicant_app_token']; ?> ">
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
        
        
        
        
        
        
        
        
        </div>

        
        <?php include("_footer.php"); ?>
                
        </div>



</div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>


    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>




    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>


    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>


    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2014, 1, 1), 7], [gd(2014, 1, 2), 9], [gd(2014, 1, 3), 9], [gd(2014, 1, 4), 9],
                [gd(2014, 1, 5), 9], [gd(2014, 1, 6), 7], [gd(2014, 1, 7), 5], [gd(2014, 1, 8), 4],
                [gd(2014, 1, 9), 7], [gd(2014, 1, 10), 8], [gd(2014, 1, 11), 9], [gd(2014, 1, 12), 6],
                [gd(2014, 1, 13), 4], [gd(2014, 1, 14), 5], [gd(2014, 1, 15), 11], [gd(2014, 1, 16), 8],
                [gd(2014, 1, 17), 8], [gd(2014, 1, 18), 11], [gd(2014, 1, 19), 11], [gd(2014, 1, 20), 6],
                [gd(2014, 1, 21), 6], [gd(2014, 1, 22), 8], [gd(2014, 1, 23), 11], [gd(2014, 1, 24), 13],
                [gd(2014, 1, 25), 7], [gd(2014, 1, 26), 9], [gd(2014, 1, 27), 9], [gd(2014, 1, 28), 8],
                [gd(2014, 1, 29), 25], [gd(2014, 1, 30), 8], [gd(2014, 1, 31), 25]
            ];

            var data3 = [
                [gd(2014, 1, 1), 800], [gd(2014, 1, 2), 500], [gd(2014, 1, 3), 600], [gd(2014, 1, 4), 700],
                [gd(2014, 1, 5), 500], [gd(2014, 1, 6), 456], [gd(2014, 1, 7), 800], [gd(2014, 1, 8), 589],
                [gd(2014, 1, 9), 467], [gd(2014, 1, 10), 876], [gd(2014, 1, 11), 689], [gd(2014, 1, 12), 700],
                [gd(2014, 1, 13), 500], [gd(2014, 1, 14), 600], [gd(2014, 1, 15), 700], [gd(2014, 1, 16), 786],
                [gd(2014, 1, 17), 345], [gd(2014, 1, 18), 888], [gd(2014, 1, 19), 888], [gd(2014, 1, 20), 888],
                [gd(2014, 1, 21), 987], [gd(2014, 1, 22), 444], [gd(2014, 1, 23), 999], [gd(2014, 1, 24), 567],
                [gd(2014, 1, 25), 786], [gd(2014, 1, 26), 666], [gd(2014, 1, 27), 888], [gd(2014, 1, 28), 900],
                [gd(2014, 1, 29), 178], [gd(2014, 1, 30), 555], [gd(2014, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#838383"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#838383",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#838383",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0,
                    color: '#838383'
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            WinMove();
            
/*
			setTimeout(function() {
                $.gritter.add({
                    title: 'You have two new messages',
                    text: 'Go to <a href="mailbox.html" class="text-warning">Mailbox</a> to see who wrote to you.<br/> Check the date and today\'s tasks.',
                    time: 2000
                });
            }, 2000);

*/

            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data3 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data4 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            //$("#flot-dashboard-chart").length && $.plot($("#flot-sales_teamdashboard-chart"), [
            $.plot($("#flot-sales_teamdashboard-chart"), [
                data3, data4
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>





    <script>
        $(document).ready(function() {

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

        });
    </script>

    <script type="text/javascript" src="js/plugins/timeago/jquery.timeago.js"></script>

<script>

jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
});

</script>




</body>
</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($appointments_frm_now);

mysqli_free_result($find_credit_apps);

mysqli_free_result($sales_team_appointments);

?>