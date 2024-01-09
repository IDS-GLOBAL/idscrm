<?php require_once("db_manager_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_customers = "SELECT * FROM customers WHERE customer_dealer_id = $did ORDER BY customer_id ASC";
$find_customers = mysqli_query($idsconnection_mysqli, $query_find_customers);
$row_find_customers = mysqli_fetch_assoc($find_customers);
$totalRows_find_customers = mysqli_num_rows($find_customers);





function gemerate_random_autorelated_password($genautorelated_password){

$auto_terms = array('car', 'auto', 'drive', 'lucky', 'engine', 'race', 'apr', 'down');

$concat_unique = array('2015', '15', '17', 'vin17', 'tag1', 'stock#', 'last4', 'auction2');


		$auto_terms[rand(0, count($auto_terms)-1)];
		$concat_unique[rand(0, count($concat_unique)-1)];
		
		$genautorelated_password = $auto_terms.$concat_unique;
		
return $genautorelated_password;
return;
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Calendar</title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>


        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>

            
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Calendar</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="manager.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="manager.appointments.timeline.php">Appointments</a>
                    </li>
                    <li class="active">
                        <strong>Appointment Calendar</strong>
                    </li>
                </ol>
            </div>
        </div>
            
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInDown">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Appointment Actions</h5>
                        </div>
                        <div class="ibox-content">
                            <div id='external-events'>
                            	<button id="show_new_appointment" type="button" data-toggle="modal" data-target="#newappointmentModal" class="btn btn-primary">(+) New Appointment</button>
<br />
                            	<a id="appointmentTimeline"  href="manager.appointments.timeline.php" class="btn btn-primary">Appointment TimeLine</a>
                                
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
        
		<?php include("footer.php"); ?>
        
        </div>
    </div>
</div>

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
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>