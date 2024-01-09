<?php require_once("db_sales_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Appointment Calendar</title>


 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.sales.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.sales.php"); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>My Sales Appointment Calendar</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="mysales.dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            Appointments
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
                            <h5>Needs Resolution</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div id='external-events'>
                                <p>Unresolved Appointments</p>
                                <div class='external-event navy-bg'>Customer 1</div>
                                <div class='external-event navy-bg'>Customer 2</div>
                                <div class='external-event navy-bg'>Customer 3</div>
                                <div class='external-event navy-bg'>Customer 4</div>
                                <div class='external-event navy-bg'>Customer 5</div>
                                <p class="m-t">
                                    <!--input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>remove after drop</label-->
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="ibox float-e-margins">
                        

                    </div>


                </div>


                <div class="col-lg-9">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Appointment Calendar </h5>
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


    <!-- Mainly scripts -->
	<?php include("inc.end.mysales.body.php"); ?>
    <!-- Full Calendar -->
    <script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <script>

        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

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
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
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
                        //$(this).remove();
                    }

                },
				eventSources: 
				[
					
					<?php include("inc.json_mysales.salesperson_fullcalendar.php"); ?>
					
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
