// JavaScript Document
// http://eonasdan.github.io/bootstrap-datetimepicker/
// http://momentjs.com/docs/#/displaying/format/
$(document).ready(function(){



$('button#switch_appointment_sales_person').click(function(){


			$('div#see_appointment_manager_team').hide();
			$('div#see_appointment_collectors_team').hide();
			$('div#see_appointment_repair_shops').hide();
			$('div#see_appointment_sales_team').show();
			
	

});

$('button#switch_appointment_manager_person').click(function(){

				
			$('div#see_appointment_sales_team').hide();
			$('div#see_appointment_collectors_team').hide();
			$('div#see_appointment_repair_shops').hide();
			$('div#see_appointment_manager_team').show();

});

$('button#switch_appointment_account_person').click(function(){

				
			$('div#see_appointment_sales_team').hide();
			$('div#see_appointment_manager_team').hide();
			$('div#see_appointment_repair_shops').hide();
			$('div#see_appointment_collectors_team').show();
});

$('button#switch_appointment_repair_shops').click(function(){

				
			$('div#see_appointment_sales_team').hide();
			$('div#see_appointment_manager_team').hide();
			$('div#see_appointment_collectors_team').hide();
			$('div#see_appointment_repair_shops').show();

});


		

        $('#newappointmentstart').datetimepicker({
					
                    format: 'YYYY-MM-DD HH:mm:ss a'
					

		});

		$('#newappointmentend').datetimepicker({
					
                    format: 'YYYY-MM-DD HH:mm:ss a'
					

		});

		
		$('span.glyphicon.glyphicon-calendar').bind( 'click mouseover', function( event ){
										
			$('input#dlr_appt_startunixtime').removeAttr( "disabled");
			$('input#dlr_appt_endunixtime').removeAttr( "disabled");
		});

		$('span.glyphicon.glyphicon-calendar').bind( 'hover mouseenter', function( event ){
										
			$('input#dlr_appt_startunixtime').removeAttr( "disabled");
			$('input#dlr_appt_endunixtime').removeAttr( "disabled");
		});

		$('span.glyphicon.glyphicon-calendar').bind( 'dblclick mousedown', function( event ){
										
			$('input#dlr_appt_startunixtime').removeAttr( "disabled");
			$('input#dlr_appt_endunixtime').removeAttr( "disabled");
		});

		$('input#dlr_appt_startunixtime').mouseover(function(){
										
			$('input#dlr_appt_startunixtime').attr( "disabled", "true");
			$('input#dlr_appt_endunixtime').attr( "disabled", "true");
		});

		$('input#dlr_appt_endunixtime').mouseover(function(){
										
			$('input#dlr_appt_startunixtime').attr( "disabled", "true");
			$('input#dlr_appt_endunixtime').attr( "disabled", "true");
		});

		
		
		
		
		
        $("#newappointmentstart").on("dp.change",function (e) {
            $('#newappointmentend_unixtime').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss a').minDate(e.date);
					process_appointmenttimeview();
        });
		
        $("#newappointmentend").on("dp.change",function (e) {
            $('#newappointmentstart').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss a').maxDate(e.date);
        });



		var a = moment();
		var b = moment().add(1, 'seconds');
		a.diff(b) // -1000
		b.diff(a) // 1000
		
		

						   
						   
		$('button#saveOldAppointment').click( function(){

			process_appointmentimeview();
			
			var dlr_appt_id = $("input#dlr_appt_id").val().replace(/,/g, '');
			
			if(!dlr_appt_id){
				
				alert('Sorry This Task Cannot Be Saved');
				window.location.replace('appointments.php');
				return false; 
			}
			
			var thisdid = $("input#thisdid").val().replace(/,/g, '');
			
			var thetimenow = moment();
			
			// 2015-02-23 16:07:36 pm
			var nowformated = thetimenow.format('YYYY-MM-DD HH:mm:ss a');
			
			//$('textarea#dlr_appt_notes').val();
			
			
			var slct_task_action = document.getElementById("task_action");
			var dlr_appt_task_id = slct_task_action.options[slct_task_action.selectedIndex].text;
			var dlr_appt_task_action_id = slct_task_action.options[slct_task_action.selectedIndex].value;
			
			
			var dlr_appt_title =  $('input#dlr_appt_title').val();

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

			var dlr_appt_startunixtime =  $('input#dlr_appt_startunixtime').val();
			var dlr_appt_endunixtime =  $('input#dlr_appt_endunixtime').val();
			var dlr_appt_notes =  $('textarea#dlr_appt_notes').val();

			if (document.getElementById('dlr_appt_robot_sendemail').checked) {
				var dlr_appt_robot_sendemail = 1;
			}
			else{
				var dlr_appt_robot_sendemail = 0;
			}

			if (document.getElementById('appointment_completed').checked) {
				var appointment_completed = '1';
			}
			else{
				var appointment_completed = '0';
			}
			//alert(appointment_completed);
			
			var appointment_snooze = $('input#appointment_snooze').val();
			
			
			var tz = jstz.determine();
			
			dlr_appt_dlrtimezone = 'No timezone found';
			
			if (typeof (tz) === 'undefined') {
				dlr_appt_dlrtimezone = 'No timezone found';
			}
			else {
				dlr_appt_dlrtimezone = tz.name(); 
			}

			//alert(robot_sendemail+'@:'+thetimenow+'Soon: '+b);
			
			$.post('script_update_dealerappointment.php', {dlr_appt_id: dlr_appt_id, thisdid: thisdid, dlr_appt_task_id: dlr_appt_task_id, dlr_appt_task_action_id: dlr_appt_task_action_id, dlr_appt_title: dlr_appt_title, dlr_appt_sid: dlr_appt_sid, dlr_appt_salesname_txt: dlr_appt_salesname_txt, dlr_appt_mgrname_txt: dlr_appt_mgrname_txt, dlr_appt_mgr_id: dlr_appt_mgr_id, dlr_appt_acidname_txt: dlr_appt_acidname_txt, dlr_appt_acid: dlr_appt_acid, dlr_appt_acidname_txt: dlr_appt_acidname_txt, dlr_appt_reprshop_id: dlr_appt_reprshop_id, dlr_appt_reprshopname_txt: dlr_appt_reprshopname_txt, dlr_appt_startunixtime: dlr_appt_startunixtime, dlr_appt_endunixtime: dlr_appt_endunixtime, dlr_appt_notes: dlr_appt_notes, dlr_appt_dlrtimezone: dlr_appt_dlrtimezone, dlr_appt_robot_sendemail: dlr_appt_robot_sendemail, appointment_completed: appointment_completed, appointment_snooze: appointment_snooze  }, function(data){
			
				//$('#name-data').html(data);
				console.log(data);
				
				window.location.replace('appointments.php');																																																	
			
			});
			
			
			
		});

		
		$('input#appointment_snooze').bind('click keyup', function(){
						process_appointmentimeview();				  
		});
		
		
		
		
		
		process_appointmentimeview();
});

function process_appointmentimeview(){

//debugger;

				console.log('Processing Appointment View');
				
				
				var endunixtime = $('input#dlr_appt_startunixtime').val();
				//var startdate = moment(endunixtime, "YYYY-MM-DD HH:mm:ss a" );
				
				var enddate = moment(endunixtime, "YYYY-MM-DD HH:mm:ss a" );
				//console.log('startdate: '+startdate);
				// var returned_endate = moment(startdate).add(2, 'hours');				
				
				var howlong = $('input#appointment_snooze').val();
				var howlong_type = 'minutes';
				
				console.log('howlong: '+howlong+' howlong_type: '+howlong_type);
				
				//alert('For: '+howlong+' & And '+howlong_type);
				//var cleanedup_startunixtime = startunixtime.replace(" pm","");
				//var cleanedup_startunixtime = startunixtime.replace(" am","");
				
				var returned_endate = moment(enddate).add(howlong, howlong_type).format('YYYY-MM-DD HH:mm:ss a');
				
				//console.log('returned date: '+returned_endate);
				
				var appointmenthowlong_endtime = $('input#dlr_appt_endunixtime').val(returned_endate);
		

				
				//alert('How Long: '+appointment_thowlong);
				//alert('End: '+appointment_endunixtime);

}
