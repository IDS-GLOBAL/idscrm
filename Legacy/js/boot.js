// JavaScript Document
$(document).ready(function(){


		//alert('Boot.Js is Ready!');

function validateEmail(email) {
  var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return re.test(email);
}

	
	
		$('a#login-window').on('click', function(){
				
				//alert('Open Modal Window!');
				//return false;
				$('div#login_modal').modal({backdrop:'static',keyboard:false, show:true});
		});




		$('a#go_demo_reg').on('click', function(){
				
				//alert('Submitting Demo Instructions!');
				
				var e_demo = $('input#e_demo').val();
				if(!e_demo){ alert('Your Email Is Missing'); return false; };

				if (validateEmail(e_demo)) {
					console.log(e_demo + " is valid :)");
				  } else {
					console.log(e_demo + " is not valid :(");
				   	alert('Sorry Invalid Email');
					return false
				  }
				
				
				var phone_demo = $('input#phone_demo').val();
				if(!phone_demo){ alert('Sorry Your Phone Number Is Missing'); return false; };

				var company_name_demo = $('input#company_name_demo').val();
				if(!company_name_demo){ alert('Sorry Your Company Name Is Missing'); return false; };


				var contact_demo = $('input#contact_demo').val();
				if(!contact_demo){ alert('Sorry Your Contact Name Is Missing'); return false; };
				
				
				var city_demo = $('input#city_demo').val();
				
				var slct_state_demo = document.getElementById("state_demo");
				var state_demo = slct_state_demo.options[slct_state_demo.selectedIndex].value;				
				
				
				var zip_demo = $('input#zip_demo').val();
				

				var slct_postion_demo = document.getElementById("postion_demo");
				var postion_demo = slct_postion_demo.options[slct_postion_demo.selectedIndex].value;				
	
				var slct_bmodel_demo = document.getElementById("bmodel_demo");
				var bmodel_demo = slct_bmodel_demo.options[slct_bmodel_demo.selectedIndex].value;				
	
				var slct_has_frazer = document.getElementById("has_frazer");
				var has_frazer = slct_has_frazer.options[slct_has_frazer.selectedIndex].value;				
				var cookie = $('input#cookie').val();
				
				if(!e_demo){ alert('Sorry We Cant Process You at this Time!'); return false; };
				
				
				
				$.post('script_get_ademo.php', {e_demo: e_demo, phone_demo: phone_demo, company_name_demo: company_name_demo, contact_demo: contact_demo, company_name_demo: company_name_demo, city_demo: city_demo, state_demo: state_demo, zip_demo: zip_demo, postion_demo: postion_demo, bmodel_demo: bmodel_demo, has_frazer: has_frazer, cookie: cookie}, function(data){

					console.log(data);
					$('div#sign_results').html(data);
				});
				return false;
				
		});

	$('a#full_screen_button').on('click', function(){
			   window.location.href = 'dealers/';
	});


	$('a#forgot_password').on('click', function(){
			   window.location.href = 'recoverpass.php';
	});



		$('button#go_signin').on('click', function(){
				
				var e_login = $('input#e_login').val();
				var p_login = $('input#p_login').val();
				
				
				//alert('Submitting Sign In Attempt!');
				
				
				
				$.post('script_signin.php', {e_login: e_login, p_login: p_login}, function(data){

					//console.log(data);
					$('div#sign_results').html(data);
				});
				
				//return false;
				
		});





});