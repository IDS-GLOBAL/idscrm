// JavaScript Document
$(document).ready(function(){


	$('button#recover_pass').on('click', function(){
		
		var e_login = $('input#e_login').val();
		var cookie = $('input#cookie').val();
		$.post('script_recoverpass.php', {e_login: e_login, cookie: cookie}, function(data){console.log(data); $('div#recover_rslt').html(data);});
	
	});
	


});