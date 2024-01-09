// JavaScript Document
$(document).ready(function(){





$('button#save_accountperson').click(function(){
												


			var slct_collector_acct_status = document.getElementById("collector_acct_status");
			var collector_acct_status_txt = slct_collector_acct_status.options[slct_collector_acct_status.selectedIndex].text;
			var collector_acct_status = slct_collector_acct_status.options[slct_collector_acct_status.selectedIndex].value;

			var account_title = $('input#account_title').val();
			
			var slct_department_id = document.getElementById("account_department_id");
			var department_id_txt = slct_department_id.options[slct_department_id.selectedIndex].text;
			var account_department_id = slct_department_id.options[slct_department_id.selectedIndex].value;


			var slct_team_id = document.getElementById("account_team_id");
			var team_id_txt = slct_team_id.options[slct_team_id.selectedIndex].text;
			var team_id = slct_team_id.options[slct_team_id.selectedIndex].value;

			var slct_account_outgoing_emails = document.getElementById("account_outgoing_emails");
			var account_outgoing_emails_txt = slct_account_outgoing_emails.options[slct_account_outgoing_emails.selectedIndex].text;
			var account_outgoing_emails = slct_account_outgoing_emails.options[slct_account_outgoing_emails.selectedIndex].value;
			
			var slct_account_accept_payments = document.getElementById("account_accept_payments");
			var account_accept_payments = slct_account_accept_payments.options[slct_account_accept_payments.selectedIndex].value;

			var slct_acid_addinv_2main_dealerid = document.getElementById("acid_addinv_2main_dealerid");
			var acid_addinv_2main_dealerid = slct_acid_addinv_2main_dealerid.options[slct_acid_addinv_2main_dealerid.selectedIndex].value;

			var account_firstname = $('input#account_firstname').val();
			var account_lastname = $('input#account_lastname').val();


			if(!account_firstname){ alert('First Name Not Allowed To Be Blank!'); return false;}

			if(!account_lastname){ alert('Last Name Not Allowed To Be Blank!'); return false;}

			if(pass_accountperson_password_good == 0){ alert('Password In Correct Please Correct!'); return false;}

			var account_nickname = $('input#account_nickname').val();
			
			var account_email = $('input#account_email').val();
			if(!account_email){ alert('Email Not Allowed To Be Blank!'); return false;}
			
			var slct_collector_acct_status = document.getElementById("collector_acct_status");
			var collector_acct_status = slct_collector_acct_status.options[slct_collector_acct_status.selectedIndex].value;
			
			var account_username = $('input#account_username').val();
			
			var account_status_changed = $('input#account_status_changed').val();
			
			var account_password = $('input#account_password').val();
			
			var account_main_number = $('input#account_main_number').val();
			
			var account_phone_ext = $('input#account_phone_ext').val();
			
			var account_mobilephone_number = $('input#account_mobilephone_number').val();
			
			var website_url = $('input#website_url').val();
			
			var sales_pitch = $('textarea#sales_pitch').val();
			
			var prof_motto = $('input#prof_motto').val();
			
			var prof_hometown = $('input#prof_hometown').val();
			
			var prof_sportsteam = $('input#prof_sportsteam').val();
			
			var prof_dreamvact = $('input#prof_dreamvact').val();
			
			var prof_favfood = $('input#prof_favfood').val();
			
			var prof_favtvshow = $('input#prof_favtvshow').val();
									
			var goal_monthly_monies_collect = $('input#goal_monthly_monies_collect').val();
			

			var pass_accountperson_email = $('input#pass_accountperson_email').val();
			var pass_accountperson_password_good = $('input#pass_accountperson_password_good').val();

			if(pass_accountperson_email == 0){ alert('Email In Correct Please Correct!'); return false;}

			if(pass_accountperson_password_good == 0){ alert('Password In Correct Please Correct!'); return false;}
			
			
			
			$.post('script_create_accountperson.php', {account_status_changed: account_status_changed, account_title: account_title,account_department_id: account_department_id, team_id: team_id, team_name: team_id_txt, account_outgoing_emails: account_outgoing_emails, account_accept_payments: account_accept_payments, acid_addinv_2main_dealerid: acid_addinv_2main_dealerid, account_firstname: account_firstname, 
				   account_lastname: account_lastname, 
				   account_nickname: account_nickname, 
				   account_email: account_email,
				   account_username: account_username,
				   account_password: account_password,
				   collector_acct_status: collector_acct_status,
				   account_main_number: account_main_number,
				   account_phone_ext: account_phone_ext,
				   account_mobilephone_number: account_mobilephone_number,
				   website_url: website_url,
				   sales_pitch: sales_pitch,
				   prof_motto: prof_motto, 
				   prof_hometown: prof_hometown,
				   prof_sportsteam: prof_sportsteam,
				   prof_dreamvact: prof_dreamvact,
				   prof_favfood: prof_favfood,
				   prof_favtvshow: prof_favtvshow,
				   goal_monthly_monies_collect: goal_monthly_monies_collect
				   }, function(data){
	 			
				
				console.log(data); 

			});
			
			window.location.replace('collectors.php');	

});			
			
			
			
			
			
			
});