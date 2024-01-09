// JavaScript Document
// http://eonasdan.github.io/bootstrap-datetimepicker/
// http://momentjs.com/docs/#/displaying/format/
$(document).ready(function(){



$('button#switch_task_sales_person').click(function(){


			$('div#see_task_manager_team').hide();
			$('div#see_task_collectors_team').hide();
			$('div#see_task_repair_shops').hide();
			$('div#see_task_sales_team').show();
			
	

});

$('button#switch_task_manager_person').click(function(){

				
			$('div#see_task_sales_team').hide();
			$('div#see_task_collectors_team').hide();
			$('div#see_task_repair_shops').hide();
			$('div#see_task_manager_team').show();

});

$('button#switch_task_account_person').click(function(){

				
			$('div#see_task_sales_team').hide();
			$('div#see_task_manager_team').hide();
			$('div#see_task_repair_shops').hide();
			$('div#see_task_collectors_team').show();
});

$('button#switch_task_repair_shops').click(function(){

				
			$('div#see_task_sales_team').hide();
			$('div#see_task_manager_team').hide();
			$('div#see_task_collectors_team').hide();
			$('div#see_task_repair_shops').show();

});


		

        $('#newtaskstart').datetimepicker({
					
                    format: 'YYYY-MM-DD HH:mm:ss a'
					

		});

		$('#newtaskend').datetimepicker({
					
                    format: 'YYYY-MM-DD HH:mm:ss a'
					

		});

		
		$('span.glyphicon.glyphicon-calendar').bind( 'click mouseover', function( event ){
										
			$('input#taskstart_unixtime').removeAttr( "disabled");
			$('input#taskend_unixtime').removeAttr( "disabled");
		});

		$('span.glyphicon.glyphicon-calendar').bind( 'hover mouseenter', function( event ){
										
			$('input#taskstart_unixtime').removeAttr( "disabled");
			$('input#taskend_unixtime').removeAttr( "disabled");
		});

		$('span.glyphicon.glyphicon-calendar').bind( 'dblclick mousedown', function( event ){
										
			$('input#taskstart_unixtime').removeAttr( "disabled");
			$('input#taskend_unixtime').removeAttr( "disabled");
		});

		$('input#taskstart_unixtime').mouseover(function(){
										
			$('input#taskstart_unixtime').attr( "disabled", "true");
			$('input#taskend_unixtime').attr( "disabled", "true");
		});

		$('input#taskend_unixtime').mouseover(function(){
										
			$('input#taskstart_unixtime').attr( "disabled", "true");
			$('input#taskend_unixtime').attr( "disabled", "true");
		});

		
		
		
		
		
        $("#newtaskstart").on("dp.change",function (e) {
            $('#newtaskend_unixtime').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss a').minDate(e.date);
					process_tasktimeview();
        });
		
        $("#newtaskend").on("dp.change",function (e) {
            $('#newtaskstart').data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss a').maxDate(e.date);
        });



		var a = moment();
		var b = moment().add(1, 'seconds');
		a.diff(b) // -1000
		b.diff(a) // 1000
		
		

						   
						   
		$('button#saveOldTask').click( function(){

			process_tasktimeview();
			
			var task_id = $("input#task_id").val().replace(/,/g, '');
			
			if(!task_id){
				
				alert('Sorry This Task Cannot Be Saved');
				window.location.replace('tasks.php');
				return false; 
			}
			
			var thisdid = $("input#thisdid").val().replace(/,/g, '');
			
			var thetimenow = moment();
			
			// 2015-02-23 16:07:36 pm
			var nowformated = thetimenow.format('YYYY-MM-DD HH:mm:ss a');
			
			//$('textarea#task_message').val();
			
			
			var slct_task_action = document.getElementById("task_action");
			var task_action_txt = slct_task_action.options[slct_task_action.selectedIndex].text;
			var task_action = slct_task_action.options[slct_task_action.selectedIndex].value;
			
			
			var task_title =  $('input#task_title').val();

			var slct_task_sid = document.getElementById("task_sid");
			var task_sid_salesname_txt =  slct_task_sid.options[slct_task_sid.selectedIndex].text;
			var task_sid = slct_task_sid.options[slct_task_sid.selectedIndex].value;

			var slct_task_mgr_id = document.getElementById("task_mgr_id");
			var task_mgrname_txt =  slct_task_mgr_id.options[slct_task_mgr_id.selectedIndex].text;
			var task_mgr_id = slct_task_mgr_id.options[slct_task_mgr_id.selectedIndex].value;

			var slct_task_acid = document.getElementById("task_acid");
			var task_acidname_txt =  slct_task_acid.options[slct_task_acid.selectedIndex].text;
			var task_acid_id = slct_task_acid.options[slct_task_acid.selectedIndex].value;

			var slct_task_reprshop_id = document.getElementById("task_reprshop_id");
			var task_reprshopname_txt =  slct_task_reprshop_id.options[slct_task_reprshop_id.selectedIndex].text;
			var task_reprshop_id = slct_task_reprshop_id.options[slct_task_reprshop_id.selectedIndex].value;

			var taskstart_unixtime =  $('input#taskstart_unixtime').val();
			var taskend_unixtime =  $('input#taskend_unixtime').val();
			var task_message =  $('textarea#task_message').val();

			if (document.getElementById('robot_sendemail').checked) {
				var robot_sendemail = 1;
			}
			else{
				var robot_sendemail = 0;
			}

			if (document.getElementById('task_completed').checked) {
				var task_completed = '1';
			}
			else{
				var task_completed = '0';
			}
			//alert(task_completed);
			
			var task_snooze = $('input#task_snooze').val();
			
			
			var tz = jstz.determine();
			
			task_timezone = 'No timezone found';
			
			if (typeof (tz) === 'undefined') {
				task_timezone = 'No timezone found';
			}
			else {
				task_timezone = tz.name(); 
			}

			//alert(robot_sendemail+'@:'+thetimenow+'Soon: '+b);
			
			$.post('script_update_dealertask.php', {task_id: task_id, thisdid: thisdid, task_action: task_action, task_title: task_title, task_sid: task_sid, task_sid_salesname_txt: task_sid_salesname_txt, task_mgrname_txt: task_mgrname_txt, task_mgr_id: task_mgr_id, task_acidname_txt: task_acidname_txt, task_acid_id: task_acid_id, task_reprshopname_txt: task_reprshopname_txt, task_reprshop_id: task_reprshop_id, taskstart_unixtime: taskstart_unixtime, taskend_unixtime: taskend_unixtime, task_message: task_message, task_timezone: task_timezone, robot_sendemail: robot_sendemail, task_completed: task_completed, task_snooze: task_snooze  }, function(data){
			
				$('div#console_debug').html(data);
				console.log(data);
				
				//window.location.replace('tasks.php');																																																	
			
			});
			
			
			
		});

		
		$('input#task_snooze').bind('click keyup', function(){
						process_tasktimeview();				  
		});
		
		
		
		
		
		process_tasktimeview();
});

function process_tasktimeview(){

//debugger;

				console.log('Processing Task View');
				
				
				var endunixtime = $('input#taskstart_unixtime').val();
				//var startdate = moment(endunixtime, "YYYY-MM-DD HH:mm:ss a" );
				
				var enddate = moment(endunixtime, "YYYY-MM-DD HH:mm:ss a" );
				//console.log('startdate: '+startdate);
				// var returned_endate = moment(startdate).add(2, 'hours');				
				
				var howlong = $('input#task_snooze').val();
				var howlong_type = 'minutes';
				
				//console.log('howlong: '+howlong+' howlong_type: '+howlong_type);
				
				//alert('For: '+howlong+' & And '+howlong_type);
				//var cleanedup_startunixtime = startunixtime.replace(" pm","");
				//var cleanedup_startunixtime = startunixtime.replace(" am","");
				
				var returned_endate = moment(enddate).add(howlong, howlong_type).format('YYYY-MM-DD HH:mm:ss a');
				
				//console.log('returned date: '+returned_endate);
				
				var taskhowlong_endtime = $('input#taskend_unixtime').val(returned_endate);
		

				
				//alert('How Long: '+task_thowlong);
				//alert('End: '+task_endunixtime);

}
