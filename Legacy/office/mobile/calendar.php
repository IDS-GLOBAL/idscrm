



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IDS CRM | Sales Portal</title>
    
    <script type="text/javascript" src="../../dealer/js/jquery-1.3.2.js"></script>
    
<link href='../../test/JQuery-FullCalendar/fullcalendar-1.6.1/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='../../test/JQuery-FullCalendar/fullcalendar-1.6.1/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<!--script src='../test/JQuery-FullCalendar/fullcalendar-1.6.1/jquery/jquery-1.9.1.min.js'></script -->
<script src='../../test/JQuery-FullCalendar/fullcalendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min.js'></script>
<script src='../../test/JQuery-FullCalendar/fullcalendar-1.6.1/fullcalendar/fullcalendar.min.js'></script>
<script>


	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				//right: 'month,basicWeek,basicDay'
				right: 'month,agendaWeek,agendaDay'
				
			},
			editable: true,
			
			
			events: [
					
							
							{
								title  : 'End Of The Month',
								start  : '07/31/2013 19:00:30',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '08/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '09/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '10/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '11/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'Happy New Years',
								start  : '12/31/2013 19:00:00',
								allDay : false // will make the time show
							}
							
							
					]
		});
		
	});
</script>

<style>


</style>
	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, ul#dashboard-buttons li a, .response-msg, #search-bar input');

	</script>
	<![endif]-->
</head>
<body>
		
                    <div id='calendar'></div>



</body>
</html>
