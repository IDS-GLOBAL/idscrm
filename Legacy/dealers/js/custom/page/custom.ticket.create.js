$(document).ready(function(){



			$('button#create_ticket').click(function(){
			
				var contact_name = $('input#contact_name').val();
				var contact_phone = $('input#contact_phone').val();
				var contact_email = $('input#contact_email').val();
				var what_happened = $('textarea#what_happened').val();
				var what_you_want_to_happen = $('textarea#what_you_want_to_happen').val();
				var comments_bydlr = $('textarea#comments_bydlr').val();
				
				var slct_priority = document.getElementById("priority");
				var slct_priority_txt =  slct_priority.options[slct_priority.selectedIndex].text;
				var slct_priority = slct_priority.options[slct_priority.selectedIndex].value;
				
				if ($('input#accept_terms').is(':checked')) {
					// if so, give robot a 1 value for okay
					var accept_terms = 1;
				}else{
					var accept_terms = 0;
				}			
			
				var slct_priority = document.getElementById("priority");
				var slct_priority_txt =  slct_priority.options[slct_priority.selectedIndex].text;
				var priority = slct_priority.options[slct_priority.selectedIndex].value;
			
			
			
				
				$.post('script_create_ticket_smtp.php', {
						contact_name: contact_name,
						contact_phone: contact_phone,
						contact_email: contact_email,
						what_happened: what_happened,
						what_you_want_to_happen: what_you_want_to_happen,
						comments_bydlr: comments_bydlr,
						accept_terms: accept_terms,
						priority: priority
				}, function(data){
										
						console.log(data);
				
				});
			
				window.location.replace("ticket.history.php");
			
			});

}); //Document Ready