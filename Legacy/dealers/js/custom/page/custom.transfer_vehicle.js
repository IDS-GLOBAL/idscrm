// JavaScript Document
$(document).ready(function(){






			
			
			$('a#trasfer_thisvehicletomyinventory').on('click', function(){
					
					
					console.log('clicked trasfer_thisvehicletomyinventory button');
					
					
					var vid = $(this).attr('rel');
					
					var did = $('input#thisdid').val();
					
					console.log('vid: = '+vid);
					
					$.post('script_transferyvehicletodealersinventory.php?vid='+vid, {
						   vid: vid, 
						   did: did
						   }, function(data){
							   
							   
							   console.log('data: '+data);
							   
							   $('div#transfer_console').html(data);
   
					});
					
					
					
			});












});