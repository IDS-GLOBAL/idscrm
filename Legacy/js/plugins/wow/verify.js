// JavaScript Document
$(document).ready(function(){


	$('button#walkmein_dude').on('click', function(){

	var prospctdlrid = $('input#prospctdlrid').val();
	var systemdealer_id = $('input#systemdealer_id').val();
	var secret_token = $('input#secret_token').val();
	var dudes_token = $('input#dudes_token').val();

	var company_name = $('input#company_name').val();
	var company_legalname = $('input#company_legalname').val();
	var company_email = $('input#company_email').val();
	var company_password = $('input#company_password').val();
	var company_password2 = $('input#company_password2').val();
	
	var pending_dealerid = $('input#pending_dealerid').val();
	
	if(company_password == ''){ return false; }
	if(company_password2 == ''){ return false; }

	if(!company_password){ return false; }
	if(!company_password2){ return false; }





	if(company_password != company_password2){
		
		alert("Sorry! Passwords Don't Match");
		
		return false;
		
	}else{
		
		
		alert('Success Passwords Match!');
		
		$.post('script_ajaxwalkinsystem_dealer.php', {
			prospctdlrid: prospctdlrid,
			   systemdealer_id: systemdealer_id,
			   pending_dealerid:  pending_dealerid,
			   secret_token: secret_token,
			   dudes_token: dudes_token,
			   company_name: company_name,
			   company_legalname: company_legalname,
			   company_email: company_email,
			   company_password: company_password,
			   company_password2: company_password2			   
			   }, function(data){


				console.log('Data Walking IN: '+data);
				
				$('div#idssole').html(data);
					
					
					
		});
	
	}



	
	});


	
	
	



});