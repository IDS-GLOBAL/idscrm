// JavaScript Document
// http://eonasdan.github.io/bootstrap-datetimepicker/
// http://momentjs.com/docs/#/displaying/format/
$(document).ready(function(){


            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true
            });

	

            var elem = document.querySelector('.js-apptrobotme');
            var switchery = new Switchery(elem, { color: '#0F0' });





        $("#datetimepicker12").on("dp.change",function (e) {
            //$('input#dlr_appt_startunixtime').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
			console.log('changed datepicker12');
			var well =	$('#datetimepicker12').data("DateTimePicker").date();
			console.log('well: '+well);
			var startdate = moment(well, "YYYY-MM-DD HH:mm:ss a" );
			var startdate2 = startdate.format('YYYY-MM-DD HH:mm:ss a');
			console.log(startdate2);
			$('input#dlr_appt_startunixtime').val(startdate2);

			var dlr_appt_starttime_humanread = startdate.format('MM/DD/YYYY h:mm a');

			$('input#dlr_appt_starttime_humanread').val(dlr_appt_starttime_humanread);
			
				var slct_appthowlong = document.getElementById("appthowlong");
				var dlr_appthowlong = slct_appthowlong.options[slct_appthowlong.selectedIndex].value;
				var dlr_appthowlong_txt = slct_appthowlong.options[slct_appthowlong.selectedIndex].text;
				var myString = dlr_appthowlong;
				var arr = myString.split(':');
				var howlong = arr[0];
				var howlong_type = arr[1];

				
				var returned_endate = moment(startdate).add(howlong, howlong_type).format('YYYY-MM-DD HH:mm:ss a');
				
				var dlr_appt_endtime_humanread = moment(startdate).add(howlong, howlong_type).format('MM/DD/YYYY h:mm a');
				
				var dlr_appt_endunixtime = $('input#dlr_appt_endunixtime').val(returned_endate);
				
				$('input#dlr_appt_endtime_humanread').val(dlr_appt_endtime_humanread);





        });








$('button#switch_sales_person').click(function(){


			$('div#see_manager_team').hide();
			$('div#see_collectors_team').hide();
			$('div#see_repair_shops').hide();
			$('div#see_sales_team').show();
			
	

});

$('button#switch_manager_person').click(function(){

				
			$('div#see_sales_team').hide();
			$('div#see_collectors_team').hide();
			$('div#see_repair_shops').hide();
			$('div#see_manager_team').show();

});

$('button#switch_account_person').click(function(){

				
			$('div#see_sales_team').hide();
			$('div#see_manager_team').hide();
			$('div#see_repair_shops').hide();
			$('div#see_collectors_team').show();
});

$('button#switch_repair_shops').click(function(){

				
			$('div#see_sales_team').hide();
			$('div#see_manager_team').hide();
			$('div#see_collectors_team').hide();
			$('div#see_repair_shops').show();

});












		//alert('global appts');

        $('#dlr_appt_startunixtime').datetimepicker({
					
                    format: 'YYYY-MM-DD HH:mm:ss a'
					

		});

		$('#dlr_appt_endunixtime').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss a'
		});

		
		 var makestarttime = moment().add('1', 'seconds').format('YYYY-MM-DD HH:mm:ss a');
		 $('input#dlr_appt_startunixtime').val(makestarttime);
		 

		 var makeendtime = moment().add('1', 'hours').format('YYYY-MM-DD HH:mm:ss a');
		 $('input#dlr_appt_endunixtime').val(makeendtime);





		
		$('span#appt_ical1.glyphicon.glyphicon-calendar').bind( 'click mouseover', function( event ){
										
			$('input#dlr_appt_startunixtime').removeAttr( "disabled");
			$('input#dlr_appt_endunixtime').removeAttr( "disabled");
		});

		$('span#appt_ical2.glyphicon.glyphicon-calendar').bind( 'hover mouseenter', function( event ){
										
			$('input#dlr_appt_startunixtime').removeAttr( "disabled");
			$('input#dlr_appt_endunixtime').removeAttr( "disabled");
		});

		$('span#appt_ical2.glyphicon.glyphicon-calendar').bind( 'dblclick mousedown', function( event ){
										
			$('input#dlr_appt_startunixtime').removeAttr( "disabled");
			$('input#dlr_appt_endunixtime').removeAttr( "disabled");
		});

		$('input#dlr_appt_startunixtime').click(function(){
										
			$('input#dlr_appt_startunixtime').attr( "disabled", "true");
			$('input#dlr_appt_endunixtime').attr( "disabled", "true");
		});

		$('input#dlr_appt_endunixtime').click(function(){
										
			$('input#dlr_appt_startunixtime').attr( "disabled", "true");
			$('input#dlr_appt_endunixtime').attr( "disabled", "true");
		});

		
		
		
		
		
        $("#newdlr_appt_startunixtime").on("dp.change",function (e) {
            $('#newdlr_appt_endunixtime').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss a').minDate(e.date);
			find_process_addtime();
        });
		
        $("#newdlr_appt_endunixtime").on("dp.change",function (e) {
            $('#newdlr_appt_startunixtime').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss a').maxDate(e.date);
        });



		var c = moment();
		var d = moment().add(2, 'hour');
		c.diff(d) // -1000
		d.diff(c) // 1000
		//alert(d);
		
		

		$('select#appthowlong').bind('change click', function(){
				
				
				
				
				var slct_appthowlong = document.getElementById("appthowlong");
				var dlr_appthowlong = slct_appthowlong.options[slct_appthowlong.selectedIndex].value;
				var dlr_appthowlong_txt = slct_appthowlong.options[slct_appthowlong.selectedIndex].text;
				
				
				var startunixtime = $('input#dlr_appt_startunixtime').val();
				var startdate = moment(startunixtime, "YYYY-MM-DD HH:mm:ss a" );
				
				//console.log('startdate: '+startdate);
				// var returned_endate = moment(startdate).add(2, 'hours');
				var myString = dlr_appthowlong;
				var arr = myString.split(':');
				var howlong = arr[0];
				var howlong_type = arr[1];
				
				//console.log('howlong: '+howlong+' howlong_type: '+howlong_type);
				
				//alert('For: '+howlong+' & And '+howlong_type);
				//var cleanedup_startunixtime = startunixtime.replace(" pm","");
				//var cleanedup_startunixtime = startunixtime.replace(" am","");
				
				var returned_endate = moment(startdate).add(howlong, howlong_type).format('YYYY-MM-DD HH:mm:ss a');
				
				//console.log('returned date: '+returned_endate);
				var dlr_appt_endtime_humanread = moment(startdate).add(howlong, howlong_type).format('MM/DD/YYYY h:mm a');
				
				
				var dlr_appt_endunixtime = $('input#dlr_appt_endunixtime').val(returned_endate);


				//var dlr_appt_endtime_humanread = moment(returned_endate).add(howlong, howlong_type).format('MM/DD/YYYY h:mm a');
				
				$('input#dlr_appt_endtime_humanread').val(dlr_appt_endtime_humanread);


				
				//alert('How Long: '+dlr_appthowlong);
				//alert('End: '+dlr_appt_endunixtime);
				
				
		
		});


						   
		$('button#savenewappointmentModal').click( function(){

			var page_refer = $('input#page_refer').val();
			
			var appt_url_goto = $('input#appt_url_goto').val();

			var thisdid = $("input#thisdid").val().replace(/,/g, '');
			var appt_url_goto = $('input#appt_url_goto').val();
			
			var dlr_appt_creditapp_id = $("input#dlr_appt_vid").val();
			var dlr_appt_lead_id = $("input#dlr_appt_lead_id").val();
			
			var dlr_appt_vid = $("input#dlr_appt_vid").val();
			var dlr_appt_vid_descrp = $("input#dlr_appt_vid_descrp").val();

			var dlr_appt_title = $('input#dlr_appt_title').val();
			var dlr_appt_notes = $('input#dlr_appt_notes').val();
			
			var slct_dlr_appt_sid = document.getElementById("dlr_appt_sid");
			var dlr_appt_salesname_txt =  slct_dlr_appt_sid.options[slct_dlr_appt_sid.selectedIndex].text;
			var dlr_appt_sid = slct_dlr_appt_sid.options[slct_dlr_appt_sid.selectedIndex].value;

			var slct_dlr_appt_mgr_id = document.getElementById("dlr_appt_mgr_id");
			var dlr_appt_mgrname_txt =  slct_dlr_appt_mgr_id.options[slct_dlr_appt_mgr_id.selectedIndex].text;
			var dlr_appt_mgr_id = slct_dlr_appt_mgr_id.options[slct_dlr_appt_mgr_id.selectedIndex].value;

			var slct_dlr_appt_acid = document.getElementById("dlr_appt_acid");
			var dlr_appt_acidname_txt =  slct_dlr_appt_acid.options[slct_dlr_appt_acid.selectedIndex].text;
			var dlr_appt_acid = slct_dlr_appt_acid.options[slct_dlr_appt_acid.selectedIndex].value;

			var slct_dlr_appt_reprshop_id = document.getElementById("dlr_appt_reprshop_id");
			var dlr_appt_reprshopname_txt =  slct_dlr_appt_reprshop_id.options[slct_dlr_appt_reprshop_id.selectedIndex].text;
			var dlr_appt_reprshop_id = slct_dlr_appt_reprshop_id.options[slct_dlr_appt_reprshop_id.selectedIndex].value;



			
			var thetimenow = moment();
			
			// 2015-02-23 16:07:36 pm
			var nowformated = thetimenow.format('YYYY-MM-DD HH:mm:ss a');
			
			var dlr_appt_startunixtime = $('input#dlr_appt_startunixtime').val();
			
			var dlr_appt_endunixtime = $('input#dlr_appt_endunixtime').val();
			
			
			if(dlr_appt_startunixtime > dlr_appt_endunixtime){
				
				alert("Appointment Can't End Before Start Later Than Begin Date & Time"); 
				return false; 
			}
			
			
			var tz = $('input#dtimezone').val();
			
			dlr_appt_dlrtimezone = 'No timezone found';
			
			if (typeof (tz) === 'undefined') {
				dlr_appt_dlrtimezone = 'No timezone found';
			}
			else {
				dlr_appt_dlrtimezone = tz; 
			}

			if(dlr_appt_dlrtimezone == 'No timezone found'){ alert("Sorry We Can't Make This Apppointment For You At This Time!"); }
			

                    if ($('input#dlr_appt_robot_sendemail').is(':checked')) {
                        // if so, give robot a 1 value for okay
                        var dlr_appt_robot_sendemail = 1;
                    }else{
						var dlr_appt_robot_sendemail = 0;
					}			
			
			
			$.post('script_create_newdlrappointment.php', {dlr_appt_creditapp_id: dlr_appt_creditapp_id, dlr_appt_lead_id: dlr_appt_lead_id,thisdid: thisdid, appt_url_goto: appt_url_goto, dlr_appt_vid: dlr_appt_vid, dlr_appt_vid_descrp: dlr_appt_vid_descrp, dlr_appt_sid: dlr_appt_sid, dlr_appt_salesname_txt: dlr_appt_salesname_txt, dlr_appt_mgrname_txt: dlr_appt_mgrname_txt, dlr_appt_mgr_id: dlr_appt_mgr_id, dlr_appt_acidname_txt: dlr_appt_acidname_txt, dlr_appt_acid: dlr_appt_acid, dlr_appt_reprshopname_txt: dlr_appt_reprshopname_txt, dlr_appt_reprshop_id: dlr_appt_reprshop_id, dlr_appt_title: dlr_appt_title, dlr_appt_notes: dlr_appt_notes, dlr_appt_startunixtime: dlr_appt_startunixtime, dlr_appt_endunixtime: dlr_appt_endunixtime, dlr_appt_dlrtimezone: dlr_appt_dlrtimezone, dlr_appt_robot_sendemail: dlr_appt_robot_sendemail  }, function(data){
			
				$('div#console_debug').html(data);
				console.log(data);
				// window.location.replace('appointments.timeline.php');																																																	
			
			});
			
			
			
		});

		
		

find_process_addtime();
		
});

function find_process_addtime(){


				
				var slct_appthowlong = document.getElementById("appthowlong");
				var dlr_appthowlong = slct_appthowlong.options[slct_appthowlong.selectedIndex].value;
				var dlr_appthowlong_txt = slct_appthowlong.options[slct_appthowlong.selectedIndex].text;
				
				
				var startunixtime = $('input#dlr_appt_startunixtime').val();
				var startdate = moment(startunixtime, "YYYY-MM-DD HH:mm:ss a" );
				
				var myString = dlr_appthowlong;
				var arr = myString.split(':');
				var howlong = arr[0];
				var howlong_type = arr[1];
				
				
				var returned_endate = moment(startdate).add(howlong, howlong_type).format('YYYY-MM-DD HH:mm:ss a');				
				var dlr_appt_endunixtime = $('input#dlr_appt_endunixtime').val(returned_endate);



				var dlr_appt_endtime_humanread = moment(startdate).add(howlong, howlong_type).format('MM/DD/YYYY h:mm a');
				
				//$('input#dlr_appt_endtime_humanread').val(dlr_appt_endtime_humanread);


				

}


function popappointmentViewer(q){

	console.log('q: '+q);
	
	$( "div#appointment_body_viewer" ).load("_quick.appointment.view.php?appt_token="+q );
	$('#quickappointviewerModal').modal('show');
	
	


	
}
