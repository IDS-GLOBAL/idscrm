// JavaScript Document
			function mobile_workedyes(){
				
				
				var yeshtml = "<div align='center'><h2>Yes! That Code Matched!</h2><br /> <h3>You Are Now Ready For Mobile Alerts</h3></div>";
				
				
				$('div#mobile_body_viewer').html(yeshtml);
			
			
			}
			
			
			function mobile_workedno(){
				
				
				var nohtml = "<div align='center'><h2>Sorry! That Code Did Not Match!</h2><br /> <h3>Please try again...</h3></div>";
				
				
				$('div#mobile_body_viewer').html(nohtml);
				
				
			}


$(document).ready(function(){





			
			$('button#mobile_activation_btn').on('click', function(){
				
				
				$('div#mobilesettingsviewerModal').modal({backdrop:'static',keyboard:false, show:true});
				
				$.post('ajax/mysales.body.mobileviewmodal.verify.php', {
					
					}, function(data){
					
					
						$('div#mobile_body_viewer').html(data);	
					
					});
				
				
				
				
				
			});
			
			


			$(document).on('click', "button#send_mobile_codetosalesperson", function(){
					
					var txt = $('input#salesperson_mobilephone_number').val();
					
					console.log('mobile_number_verifying: '+txt);
					
					$.post('script_mysales.send_stmp-mobileverify.php', {
							txt: txt
						}, function(data){
						
						$('div#console_debug').html(data);
						
					});
					
					
			});


			$(document).on('click', "button#save_mobile_codeto", function(){
					
					var mobile_number_verifycode = $('input#mobile_number_verifycode').val();
					
					console.log('mobile_number_verifying: '+mobile_number_verifycode);
					
					$.post('script_mysales.verify-mobilecode.php', {
							mobile_number_verifycode: mobile_number_verifycode
						}, function(data){
					console.log('verifying data: '+data);
						$('div#console_debug').html(data);
						
					});
					
					
			});


			
			
			$('a#save_salersperson_settings').on('click', function(){
				
				console.log('Starting');
				
				var slct_salesperson_timezone = document.getElementById('salesperson_timezone');
				var salesperson_timezone_id = slct_salesperson_timezone.options[slct_salesperson_timezone.selectedIndex].value;
				var salesperson_timezone = slct_salesperson_timezone.options[slct_salesperson_timezone.selectedIndex].text;

				
				
				

				var slct_salesperson_mobile_carrier = document.getElementById('salesperson_mobile_carrier');
				var salesperson_mobile_carrier_id = slct_salesperson_mobile_carrier.options[slct_salesperson_mobile_carrier.selectedIndex].value;
				var salesperson_mobile_carrier = slct_salesperson_mobile_carrier.options[slct_salesperson_mobile_carrier.selectedIndex].text;

				var salesperson_mobile_number = $('input#salesperson_mobilephone_number').val();
				
				var salesperson_firstname = $('input#salesperson_firstname').val();
				var salesperson_lastname = $('input#salesperson_lastname').val();
				var salesperson_nickname = $('input#salesperson_nickname').val();
				var website_url = $('input#website_url').val();
				var salesperson_job_title = $('input#salesperson_job_title').val();
				var position_title = $('input#position_title').val();
				var prof_motto = $('input#prof_motto').val();
				var prof_hometown = $('input#prof_hometown').val();
				var prof_sportsteam = $('input#prof_sportsteam').val();
				var prof_dreamvact = $('input#prof_dreamvact').val();
				var prof_favfood = $('input#prof_favfood').val();
				var prof_favtvshow = $('input#prof_favtvshow').val();
				var goal_cars_monthly = $('input#goal_cars_monthly').val();
				var goal_appts_monthly = $('input#goal_appts_monthly').val();
				console.log('Posting');
				
				$.post('script_update.mysales.profile.php', {
					salesperson_timezone_id: salesperson_timezone_id,
					salesperson_timezone: salesperson_timezone,
					salesperson_mobile_number: salesperson_mobile_number,
					salesperson_mobile_carrier_id: salesperson_mobile_carrier_id,
					salesperson_mobile_carrier: salesperson_mobile_carrier,
							salesperson_firstname: salesperson_firstname,
							salesperson_lastname: salesperson_lastname,
							salesperson_nickname: salesperson_nickname,
							website_url: website_url,
							salesperson_job_title: salesperson_job_title,
							position_title: position_title,
							prof_motto: prof_motto,
							prof_hometown: prof_hometown,
							prof_sportsteam: prof_sportsteam,
							prof_dreamvact: prof_dreamvact,
							prof_favfood: prof_favfood,
							prof_favtvshow: prof_favtvshow,
							goal_cars_monthly: goal_cars_monthly,
							goal_appts_monthly: goal_appts_monthly
				}, function(data){
				
				console.log('Returning'+data);

					
				});
				
				
			});
			



});