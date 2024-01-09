// JavaScript Document
$(document).ready(function(){



function validateEmail($email) {
  //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
  
  return ( $email.length > 0 && emailReg.test($email));
}


$('input#salesperson_email').on("change", function(){

			var salesperson_email = $('input#salesperson_email').val();
			var thisdid = $('input#thisdid').val();
			
			if( !validateEmail(salesperson_email)) {
				$('input#pass_salesperson_email').val(0);
				alert('Email Address Not Valid'); return false; 
			}
			
			$.post('ajax/check_salesperson_email.php', {thisdid: thisdid, salesperson_email: salesperson_email}, function(data){
			
					console.log(data);
					$('div#ajax_salesperson_email_results').html(data);
			});

});

$('button#check_salesperson_email').click(function(){
			
			
			var salesperson_email = $('input#salesperson_email').val();
			var thisdid = $('input#thisdid').val();
			
			if( !validateEmail(salesperson_email)) { 
				$('input#pass_salesperson_email').val(0);
				alert('Email Address Not Valid'); return false; 
			}
			
			$.post('ajax/check_salesperson_email.php', {thisdid: thisdid, salesperson_email: salesperson_email}, function(data){
			
					console.log(data);
					$('div#ajax_salesperson_email_results').html(data);
			});
			
});


$('button#check_salesperson_username').click(function(){
			
			
			var salesperson_email = $('input#salesperson_email').val();
			var thisdid = $('input#thisdid').val();
			
			$.post('ajax/check_salesperson_username.php', {thisdid: thisdid, salesperson_email: salesperson_email}, function(data){
			
					console.log(data);
					$('div#ajax_salesperson_username_results').html(data);
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


$('input#salesperson_confirm_password').keyup(function(){
		var that = $(this);
		var salesperson_password = $('input#salesperson_password').val();
		var salesperson_confirm_password = $('input#salesperson_confirm_password').val();
		var confirm_length = salesperson_confirm_password.length;
		if(confirm_length > 5 || salesperson_confirm_password == salesperson_password){
			console.log('Everything Is Okay Do Somethin.');
		}
});


$('input#salesperson_confirm_password').change(function(){
		var that = $(this);
		var salesperson_password = $('input#salesperson_password').val();
		var salesperson_confirm_password = $('input#salesperson_confirm_password').val();
		var confirm_length = salesperson_confirm_password.length;
		if(confirm_length < 5 || salesperson_confirm_password != salesperson_password){
			alert('Password Incorrect! Please Change Before Continuing');
			$(this).parent().parent().addClass( "has-error" ); 
			$('input#password_good').val(0);

		
		}else if(salesperson_confirm_password == salesperson_password){
			alert('Password Good');
				$(this).parent().parent().removeClass( "has-error" ).addClass( "has-success" );
				$('input#password_good').val(1);
				//$(this).parent().parent().parent().addClass( "has-success" );
				
		}
});












$('button#save_new_salesperson').click(function(){
												



			var position_title = $('input#position_title').val();

			var slct_department_id = document.getElementById("salesperson_department_id");
			var department_id_txt = slct_department_id.options[slct_department_id.selectedIndex].text;
			var salesperson_department_id = slct_department_id.options[slct_department_id.selectedIndex].value;


			var slct_team_id = document.getElementById("team_id");
			var team_id_txt = slct_team_id.options[slct_team_id.selectedIndex].text;
			var team_id = slct_team_id.options[slct_team_id.selectedIndex].value;


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
			
			
			// Validation
			var pass_salesperson_email = $('input#pass_salesperson_email').val();
			var password_good = $('input#password_good').val();
			
			if( !validateEmail(salesperson_email)) { alert('Email Address Not Valid!'); return false; }
			
			if( pass_salesperson_email == 0 ){ alert('Please Use A Valide Email Address!'); return false; }
			if( password_good == 0 ){ alert('Please Check Password & Confirm Password!'); return false; }
			
			$.post('script_create_salesperson.php', {position_title: position_title, salesperson_department_id: salesperson_department_id, team_id: team_id, team_name: team_id_txt, salesperson_catchleads: salesperson_catchleads, salesperson_firstname: salesperson_firstname, salesperson_lastname: salesperson_lastname, salesperson_nickname: salesperson_nickname, salesperson_email: salesperson_email, salesperson_username: salesperson_username, salesperson_password: salesperson_password, salesperson_mobilephone_number: salesperson_mobilephone_number, website_url: website_url, sales_pitch: sales_pitch, prof_motto: prof_motto, prof_hometown: prof_hometown, prof_sportsteam: prof_sportsteam, prof_dreamvact: prof_dreamvact, prof_favfood: prof_favfood, prof_favtvshow: prof_favtvshow, goal_cars_monthly: goal_cars_monthly, goal_appts_monthly: goal_appts_monthly}, function(data){ console.log(data); });
			
		window.location.replace('salespeople.php');	
});			
			
			
			
			
			
			
});