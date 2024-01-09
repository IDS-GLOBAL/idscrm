// JavaScript Document
$(document).ready(function(){





$('button#update_salesperson').click(function(){
												
		

			var salesperson_id = $('input#salesperson_id').val();
			var position_title = $('input#position_title').val();
			
			var slct_department_id = document.getElementById("salesperson_department_id");
			var department_id_txt = slct_department_id.options[slct_department_id.selectedIndex].text;
			var salesperson_department_id = slct_department_id.options[slct_department_id.selectedIndex].value;




			var slct_team_id = document.getElementById("thisteam_id");
			//console.log('slct_team_id: '+slct_team_id);
			var thisteam_id_txt = slct_team_id.options[slct_team_id.selectedIndex].text;
			var thisteam_id_val = slct_team_id.options[slct_team_id.selectedIndex].value;

			//var team_id = slct_team_id.options[slct_team_id.selectedIndex].value;
			//console.log('team_id: '+team_id_val);








			var slct_acct_status = document.getElementById("acct_status");
			var acct_status_txt = slct_acct_status.options[slct_acct_status.selectedIndex].text;
			var acct_status = slct_acct_status.options[slct_acct_status.selectedIndex].value;

			console.log('acct_status: '+acct_status);

			var slct_salesperson_catchleads = document.getElementById("salesperson_catchleads");
			var salesperson_catchleads_txt = slct_salesperson_catchleads.options[slct_salesperson_catchleads.selectedIndex].text;
			var salesperson_catchleads = slct_salesperson_catchleads.options[slct_salesperson_catchleads.selectedIndex].value;


			var salesperson_firstname = $('input#salesperson_firstname').val();
			var salesperson_lastname = $('input#salesperson_lastname').val();

			var salesperson_nickname = $('input#salesperson_nickname').val();
			
			var salesperson_email = $('input#salesperson_email').val();

			var salesperson_username = $('input#salesperson_username').val();
			
			var salesperson_password = $('input#salesperson_password').val();
			
			var salesperson_mobilephone_number = $('input#salesperson_mobilephone_number').val();
			
			var website_url = $('input#website_url').val();
			
			var sales_pitch = $('textarea#sales_pitch').val();
			
			var prof_motto = $('input#prof_motto').val();
			
			var prof_hometown = $('input#prof_hometown').val();
			
			var prof_sportsteam = $('input#prof_sportsteam').val();
			
			var prof_dreamvact = $('input#prof_dreamvact').val();
			
			var prof_favfood = $('input#prof_favfood').val();
			
			var prof_favtvshow = $('input#prof_favtvshow').val();
									
			var goal_cars_monthly = $('input#goal_cars_monthly').val();
			
			var goal_appts_monthly = $('input#goal_appts_monthly').val();
			
			
			
			
			$.post('script_update_salesperson.php', {salesperson_id: salesperson_id, position_title: position_title, salesperson_department_id: salesperson_department_id, thisteam_id_val: thisteam_id_val, team_name: thisteam_id_txt, acct_status: acct_status, salesperson_catchleads: salesperson_catchleads, salesperson_firstname: salesperson_firstname, salesperson_lastname: salesperson_lastname, salesperson_nickname: salesperson_nickname, salesperson_email: salesperson_email, salesperson_username: salesperson_username, salesperson_password: salesperson_password, salesperson_mobilephone_number: salesperson_mobilephone_number, website_url: website_url, sales_pitch: sales_pitch, prof_motto: prof_motto, prof_hometown: prof_hometown, prof_sportsteam: prof_sportsteam, prof_dreamvact: prof_dreamvact, prof_favfood: prof_favfood, prof_favtvshow: prof_favtvshow, goal_cars_monthly: goal_cars_monthly, goal_appts_monthly: goal_appts_monthly}, function(data){
	 			
				
				console.log(data); 

			});
			
			window.location.assign('salesperson.php?sid='+salesperson_id);
			
});			
			
			
			
			
			
			
});