$(document).ready(function(){
	
	
	
	
	
	$('button#save_dealer_salespersonprofile').on('click', function(){
		
		alert('Clicked save_dealer_salespersonprofile button');
	});
	

	$('button#sign_inas_dealersalesperson').on('click', function(){
		
		alert('Clicked sign_inas_dealersalesperson button');
	});
	

	$('button#send_email_to_salesperson').on('click', function(){
		
		alert('Clicked send_email_to_salesperson button');
		
		var toemail = $('input#toemail').val();

		var frmemail = $('input#frmemail').val();		

		var subjectemail = $('input#subjectemail').val();		

		var emailbody = $('textarea#dealer_salesperson_emailbody').text();	
		
		$.post('script_smtp_senddealersalesperson_email.php', {
				toemail: toemail,
				frmemail: frmemail,
				subjectemail: subjectemail,
				emailbody: emailbody
			}, function(data){
				
				console.log(data);
		});	

	});
	
	
	
	
	
	
	
	
});
