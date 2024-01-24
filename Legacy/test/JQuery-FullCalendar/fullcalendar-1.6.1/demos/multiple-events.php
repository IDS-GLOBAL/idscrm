<?php
//echo 'MY Second Current time: ' . date('m/d/Y') . "\n";
$format = 'm/d/Y';
$date = DateTime::createFromFormat($format, '02/15/2013');

?>
<!DOCTYPE html>
<html>
<head>
<link href='../fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../jquery/jquery-1.9.1.min.js'></script>
<script src='../jquery/jquery-ui-1.10.2.custom.min.js'></script>
<script src='../fullcalendar/fullcalendar.min.js'></script>
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
				right: 'month,basicWeek,basicDay'
			},
			editable: true,
			
			
			events: [

        {
            title  : 'PHP event1',
            start  : '<?php echo '07/31/2013'; ?>'
        },

        {
            title  : 'event1',
            start  : '07/31/2013'
        },

        {
            title  : 'My event1',
            start  : '07/30/2013'
        },
        {
            title  : 'event2',
            start  : '07/13/2013',
            end    : '07/14/2013'
        },
        {
            title  : 'Lyrics Birthday',
            start  : '07/16/2013 12:30:00',
            allDay : false // will make the time show
        }
					]
		});
		
	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>
<?php echo "Format: $format; " . $date->format('m/d/Y') . "\n"; ?>
<div id='calendar'></div>
</body>
</html>
