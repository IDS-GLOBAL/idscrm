// JavaScript Document
$(document).ready(function(){



function validateEmail($email) {
  //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
  
  return ( $email.length > 0 && emailReg.test($email));
}







$('button#check_managerperson_email').click(function(){
			
			
			var manager_email = $('input#manager_email').val();
			var thisdid = $('input#thisdid').val();
			
			if( !validateEmail(manager_email)) { 
				$('input#pass_manager_email').val(0);
				alert('Email Address Not Valid'); return false; 
			}
			
			$.post('ajax/check_manager_email.php', {thisdid: thisdid, manager_email: manager_email}, function(data){
			
					console.log(data);
					$('div#ajax_manager_email_results').html(data);
			});
			
});


$('button#check_managerperson_username').click(function(){
			
			
			var manager_username = $('input#manager_username').val();
			var thisdid = $('input#thisdid').val();
			
			$.post('ajax/check_managerperson_username.php', {thisdid: thisdid, manager_username: manager_username}, function(data){
			
					console.log(data);
					$('div#ajax_managerperson_username_results').html(data);
			});
			
});









$('input#salesperson_password').keyup(function(){
			var that = $(this);
			var salesperson_password = $('input#salesperson_password').val();
			var pass_length = salesperson_password.length;
			if(pass_length > 5){
				$(this).parent().parent().removeClass( "has-error" ).addClass( "has-success" );
				$(this).parent().parent().next().next().addClass( "has-error" );
				$('input#password_good').val(0);
			}else{
				//Marking Confirm Password With Error
				$(this).parent().parent().next().next().addClass( "has-error" );
				$('input#password_good').val(0);
			}
});


$('input#confirm_manager_password').keyup(function(){
		var that = $(this);
		var salesperson_password = $('input#salesperson_password').val();
		var confirm_manager_password = $('input#confirm_manager_password').val();
		var confirm_length = confirm_manager_password.length;
		if(confirm_length > 5 || confirm_manager_password == salesperson_password){
			console.log('Everything Is Okay Do Somethin.');
		}
});


$('input#confirm_manager_password').change(function(){
		var that = $(this);
		var salesperson_password = $('input#salesperson_password').val();
		var confirm_manager_password = $('input#confirm_manager_password').val();
		var confirm_length = confirm_manager_password.length;
		if(confirm_manager_password != salesperson_password){
			alert('Password Incorrect! Please Change Before Continuing');
			$(this).parent().parent().addClass( "has-error" ); 
			$('input#password_good').val(0);

		
		}else if(confirm_manager_password == salesperson_password){
			alert('Password Good');
				$(this).parent().parent().removeClass( "has-error" ).addClass( "has-success" );
				$('input#password_good').val(1);
				//$(this).parent().parent().parent().addClass( "has-success" );
				
		}
});















$('button#save_managerperson').click(function(){
												

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
			
			var manager_email = $('input#manager_email').val();


			var manager_username = $('input#manager_username').val();
			
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
			
			if( !validateEmail( manager_email)) { 
				alert('Email Address Not Valid'); return false; 
			}
			
			var pass_managerperson_email = $('input#pass_managerperson_email').val();
			if(pass_managerperson_email == 0){ return false; }
			
			var manager_email_good = $('input#manager_email_good').val();
			if(manager_email_good == 0){ alert('You Are Not Allowed To Use This Email'); return false; }
			
			$.post('script_create_managerperson.php', {manager_id: manager_id, manager_title: manager_title, manager_department_id: manager_department_id, team_id: team_id, team_name: team_id_txt, manager_reassign_leads: manager_reassign_leads, manager_approvedeals: manager_approvedeals, mgrid_addinv_2main_dealerid: mgrid_addinv_2main_dealerid, manager_firstname: manager_firstname, manager_lastname: manager_lastname, manager_nickname: manager_nickname, manager_email: manager_email,  manager_username: manager_username, manager_password: manager_password, manager_main_number: manager_main_number, manager_phone_ext: manager_phone_ext, manager_mobilephone_number: manager_mobilephone_number, website_url: website_url, sales_pitch: sales_pitch, prof_motto: prof_motto, prof_hometown: prof_hometown, prof_sportsteam: prof_sportsteam, prof_dreamvact: prof_dreamvact, prof_favfood: prof_favfood, prof_favtvshow: prof_favtvshow, goal_cars_monthly: goal_cars_monthly, goal_appts_monthly: goal_appts_monthly, acct_status: acct_status}, function(data){
	 			
				
				console.log(data); 

			});
			
			window.location.replace('managers.php');
			
});			
			
			
			
			
			
			
});