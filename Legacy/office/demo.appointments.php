<?php require_once('db_admin.php'); ?>
<?php


$dudesid = $row_userDudes['dudes_id'];
if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
	$insert_pull_dlrdemos_sql = "`dealers_appointments`.`ids_dudes_id` = '$dudesid'";
}else{
	$insert_pull_dlrdemos_sql = "`dealers_appointments`.`ids_dudes_id` = '$dudesid'";
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dlrdemos = "SELECT * FROM `idsids_idsdms`.`dealers_appointments`, `idsids_idsdms`.`dealers`, `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealers_appointments`.`dlr_appt_did` = `dealers`.`id` OR `dealers_appointments`.`dlr_appt_prospectdlrid` = `dealer_prospects`.`id` AND $insert_pull_dlrdemos_sql GROUP BY `dealers_appointments`.`ids_dudes_id` ORDER BY `dlr_appt_startunixtime` DESC";
$pull_dlrdemos = mysqli_query($idsconnection_mysqli, $query_pull_dlrdemos);
$row_pull_dlrdemos = mysqli_fetch_array($pull_dlrdemos);
$totalRows_pull_dlrdemos = mysqli_num_rows($pull_dlrdemos);


$dudesid = $row_userDudes['dudes_id'];
if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
	$insert_pull_dlrtask_sql = "`dudes_tasks`.`task_dudesid` = '$dudesid'";
}else{
	$insert_pull_dlrtask_sql = "`dudes_tasks`.`task_dudesid` = '$dudesid'";
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pull_dlrtask = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_tasks`, `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dudes_tasks`.`task_dudesid` = '$dudesid' AND `dudes_tasks`.`task_prospectdlrid` = `dealer_prospects`.`id`   ORDER BY `dudes_tasks`.`taskstart_unixtime` DESC";
$pull_dlrtask = mysqli_query($tracking_mysqli, $query_pull_dlrtask);
$row_pull_dlrtask = mysqli_fetch_array($pull_dlrtask);
$totalRows_pull_dlrtask = mysqli_num_rows($pull_dlrtask);
//  SELECT * FROM `dudes_tasks` WHERE `dudes_tasks`.`task_dudesid` = '$dudesid'
// `idsids_idsdms`.`dealers_tasks`, `idsids_idsdms`.`dealers`, `idsids_tracking_idsvehicles`.`dealer_prospects`
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>My Appointments View</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#">Appointments View</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






        <div class="wrapper wrapper-content">
            <div class="row animated fadeInDown">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Appointment Actions</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id='external-events'>
                            	<button id="show_new_appointment" type="button" data-toggle="modal" data-target="#newappointmentModal" class="btn btn-primary">(+) New Appointment</button>
<br />
                            	<a id="appointmentTimeline"  href="appointments.timeline.php" class="btn btn-primary">Appointment TimeLine</a>
                                
                                <!-- p>Drag a event and drop into callendar.</p>
                                <div class='external-event navy-bg'>Go to shop and buy some products.</div>
                                <div class='external-event navy-bg'>Check the new CI from Corporation.</div>
                                <div class='external-event navy-bg'>Send documents to John.</div>
                                <div class='external-event navy-bg'>Phone to Sandra.</div>
                                <div class='external-event navy-bg'>Chat with Michael.</div>
                                <p class="m-t">
                                    <input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>remove after drop</label>
                                </p -->
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                                <h2>Your Dealer Appointment Calendar</h2> 
                                <p>
                                	Here is where you can view your task, appointments, and system events related to your account.
                                </p>
                                
                            <p>
                                <!--a>View Appointment Timeline</a -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Appointment Calendar View</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>









            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Upcoming Appointments <small>Sort, search</small></h5>
                    </div>

<div class="ibox-content">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Presenter</th>
                                                <th>When</th>
                                                <th>Dealer</th>
                                                <th>SalesMan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
<?php do { ?>
                                              <tr id="<?php echo $row_pull_dlrdemos['dlr_appt_id']; ?>">
                                                  <td>
                                                  	<small>Benjamin Carter &amp; <?php echo $row_pull_dlrdemos['dudes_id']; ?></small>\
                                                  </td>
                                                  <td>
                                                  <i class="fa fa-clock-o"></i><?php echo $row_pull_dlrdemos['dlr_appt_startunixtime']; ?> <?php echo $row_pull_dlrdemos['dlr_appt_dlrtimezone']; ?>
                                                  </td>
                                                  <td>
												  <?php echo $row_pull_dlrdemos['company']; ?>
                                                  </td>
                                                  <td class="text-navy"> 
												  <?php echo $row_pull_dlrdemos['dudes_id']; ?>
                                                  </td>
                                                  <td><span class="label label-warning">View Appt</span> </td>
                                              </tr>
  <?php } while ($row_pull_dlrdemos = mysqli_fetch_array($pull_dlrdemos)); ?>
                                            <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <ul class="pagination pull-right"></ul>
                                                </td>
                                            </tr>
                                            </tfoot>
                                            </tbody>
                                        </table>
                                    </div>

                </div>
              </div>
            </div>








            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Upcoming Task <small>Sort, search</small></h5>
                    </div>

<div class="ibox-content">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Task For</th>
                                                <th>When</th>
                                                <th>Action</th>
                                                <th>Dealer</th>
                                                <th>SalesMan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
<?php do { ?>
                                              <tr id="<?php echo $row_pull_dlrtask['task_id']; ?>">
                                                  <td>
                                                  	<small><?php echo $row_pull_dlrtask['task_dudesid']; ?></small>\
                                                  </td>
                                                  <td>
                                                  <i class="fa fa-clock-o"></i><?php echo $row_pull_dlrtask['taskstart_unixtime']; ?> <?php echo $row_pull_dlrtask['task_timezone']; ?>
                                                  </td>
                                                  <td>
												  <?php echo $row_pull_dlrtask['task_title']; ?>
                                                  </td>
                                                  <td>
												  <?php echo $row_pull_dlrtask['company']; ?>
                                                  </td>
                                                  <td class="text-navy"> 
												  <?php echo $row_pull_dlrtask['task_dudesid']; ?>
                                                  </td>
                                                  <td><span class="label label-warning">View Task</span> </td>
                                              </tr>
  <?php } while ($row_pull_dlrtask = mysqli_fetch_array($pull_dlrtask)); ?>
                                            <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <ul class="pagination pull-right"></ul>
                                                </td>
                                            </tr>
                                            </tfoot>
                                            </tbody>
                                        </table>
                                    </div>

                </div>
              </div>
            </div>







            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


    <script>

        $(document).ready(function() {
            /* initialize the external events
             -----------------------------------------------------------------*/

            $('#external-events div.external-event').each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
				dayClick: function(e) {

					//var that_html = $(this).html();
					//console.log('Clicked: '+that_html);
					console.log(e);
					return false;
				},
				
				eventClick: function(calEvent, jsEvent, view) {
			
			
					//console.log('Event: ' + calEvent.title);
					console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
					console.log('View: ' + view.name);
					console.log('Event Url: ' + calEvent.url);
					console.log('Event Id: ' + calEvent.id);
			
					// change the border color just for fun
					$(this).css('border-color', 'green');
					popappointmentViewer(calEvent.id);
					
					return false;
			
				},

                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
				//events: "js/myfeed.php",
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }

                },
				eventSources: 
				[
					
					<?php include("inc.json_dealers_fullcalendar.php"); ?>
					
					{events:[
						{
							id: 993,
							title: 'End Of The Year',
							start: new Date(2016, 11, 31, 00, 01),
							end: new Date(2016, 11, 31, 23, 59),
							allDay: true,
							color: '#17F06C',
							className: 'idsRobot',
							url: ''
						}

							]
					}
					

				]

            });


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