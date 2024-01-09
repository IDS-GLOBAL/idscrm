// JavaScript Document
$(document).ready(function(){





$('button#update_managerperson').click(function(){
												

			var manager_id = $('input#manager_id').val();
			var manager_title = $('input#manager_title').val();
			
			var slct_department_id = document.getElementById("manager_department_id");
			var department_id_txt = slct_department_id.options[slct_department_id.selectedIndex].text;
			var manager_department_id = slct_department_id.options[slct_department_id.selectedIndex].value;


			var slct_team_id = document.getElementById("manager_team_id");
			var team_id_txt = slct_team_id.options[slct_team_id.selectedIndex].text;
			var team_id = slct_team_id.options[slct_team_id.selectedIndex].value;

			var slct_manager_reassign_leads = document.getElementById("manager_reassign_leads");
			var manager_reassign_leads_txt = slct_manager_reassign_leads.options[slct_manager_reassign_leads.selectedIndex].text;
			var manager_reassign_leads = slct_manager_reassign_leads.options[slct_manager_reassign_leads.selectedIndex].value;
			
			var slct_manager_approvedeals = document.getElementById("manager_approvedeals");
			var manager_approvedeals = slct_manager_approvedeals.options[slct_manager_approvedeals.selectedIndex].value;

			var slct_mgrid_addinv_2main_dealerid = document.getElementById("mgrid_addinv_2main_dealerid");
			var mgrid_addinv_2main_dealerid = slct_mgrid_addinv_2main_dealerid.options[slct_mgrid_addinv_2main_dealerid.selectedIndex].value;

			var manager_firstname = $('input#manager_firstname').val();
			var manager_lastname = $('input#manager_lastname').val();

			var manager_nickname = $('input#manager_nickname').val();
			
			var slct_manager_acct_status = document.getElementById("manager_acct_status");
			var acct_status = slct_manager_acct_status.options[slct_manager_acct_status.selectedIndex].value;
			
			var acct_status_changed = $('input#acct_status_changed').val();
			
			var manager_password = $('input#manager_password').val();
			
			var manager_main_number = $('input#manager_main_number').val();
			
			var manager_phone_ext = $('input#manager_phone_ext').val();
			
			var manager_mobilephone_number = $('input#manager_mobilephone_number').val();
			
			var website_url = $('input#website_url').val();
			
			var sales_pitch = $('textarea#sales_pitch').val();
			
			var prof_motto = $('input#prof_motto').val();
			
			var prof_hometown = $('input#prof_hometown').val();
			
			var prof_sportsteam = $('input#prof_sportsteam').val();
			
			var prof_dreamvact = $('input#prof_dreamvact').val();
			
			var prof_favfood = $('input#prof_favfood').val();
			
			var prof_favtvshow = $('input#prof_favtvshow').val();
									
			var goal_cars_monthly = $('input#team_goal_cars_monthly').val();
			
			var goal_appts_monthly = $('input#team_goal_appts_monthly').val();
			
			
			
			
			$.post('script_update_managerperson.php', {manager_id: manager_id, manager_title: manager_title, manager_department_id: manager_department_id, team_id: team_id, team_name: team_id_txt, manager_reassign_leads: manager_reassign_leads, manager_approvedeals: manager_approvedeals, mgrid_addinv_2main_dealerid: mgrid_addinv_2main_dealerid, manager_firstname: manager_firstname, manager_lastname: manager_lastname, manager_nickname: manager_nickname, manager_main_number: manager_main_number, manager_phone_ext: manager_phone_ext, manager_mobilephone_number: manager_mobilephone_number, website_url: website_url, sales_pitch: sales_pitch, prof_motto: prof_motto, prof_hometown: prof_hometown, prof_sportsteam: prof_sportsteam, prof_dreamvact: prof_dreamvact, prof_favfood: prof_favfood, prof_favtvshow: prof_favtvshow, goal_cars_monthly: goal_cars_monthly, goal_appts_monthly: goal_appts_monthly, acct_status: acct_status}, function(data){
	 			
				
				console.log(data); 

			});
			
			window.location.replace('managers.php');
			
});			
			
			
			
			
			
			
});