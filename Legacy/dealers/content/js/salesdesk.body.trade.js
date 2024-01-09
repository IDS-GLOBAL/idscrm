// JavaScript Document
$(document).ready(function(){




	$('select#vTradeMk').on('change', function(){
				
				var slct_vTradeMk = document.getElementById('vTradeMk');
				var vTradeMk = slct_vTradeMk.options[slct_vTradeMk.selectedIndex].value;
				
				$.post('ajax/pullmodels.php', {themake:vTradeMk}, function(data){
							
							$('select#vTradeModel').html(data);
				});
	});



});