// JavaScript Document
$(document).ready(function(){

function donextTextimonyModal(){
		$('div#nextTextimonyModal').modal({
		  show: true,
		  backdrop: 'static',
		  keyboard: false
		});
}

		//$('div#nextTextimonyModal').modal('show');

		$('button#save_testimonie').click(function(){
				
		//alert('Clicked');

		var testimony_token = $('input#testimony_token').val();

		var name = $('input#name').val();

		var slct_testimony_status = document.getElementById('testimony_status');
		var testimony_statusval = slct_testimony_status.options[slct_testimony_status.selectedIndex].value;
		var testimony_statustxt = slct_testimony_status.options[slct_testimony_status.selectedIndex].text;


		var email = $('input#email').val();

		var phone = $('input#phone').val();

		var subject = $('input#subject').val();


		var textareabody = $('textarea#body').val();


		$.post('script_create_testiomony.php?testimony_token='+testimony_token, {
			   testimony_token: testimony_token,
   			   name: name,   
			   testimony_statusval: testimony_statusval,
			   testimony_statustxt: testimony_statustxt,
			   email: email,
			   phone: phone,
			   subject: subject,
			   textareabody: textareabody
			   }, function(data){console.log('Posting Testimony Data: '+data);

		
		});
		
		donextTextimonyModal();
		
		
		
		
		
		
		
		
		

	});
		
		
		
});