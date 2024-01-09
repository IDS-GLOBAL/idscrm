<?php
echo '
{ events :[
				     {
                        id: "990",
                        title: "Insert My Own 0 Date",
                        start: new Date(2015, 0, 24, 14, 0),
                        end: "",
                        allDay: false,
                        url: "appointment.php?appt_id=990"
                    },
                    {
                        id:"999",
                        title:"Insert My Own 1 Date",
                        start:new Date(2015, 1, 24, 14, 0),
                        end: "",
                        allDay:false,
                        url:"appointment.php?appt_id=991"
                    },
                    {
                        id: 992,
                        title: "Insert My Own 2 Date",
                        start: new Date(2015, 2, 24, 14, 0),
                        end: "",
                        allDay: false,
                        url: "appointment.php?appt_id=992"
                    },
                    {
                        id: 993,
                        title: "Insert My Own 3 Date",
                        start: new Date(2015, 3, 24, 14, 0),
                        end: "",
                        allDay: "false",
                        url: "appointment.php?appt_id=993"
                    }
                ]
	}
';
?>