// JavaScript Document


	
	
$(document).ready(function(){ 

alert('Working');

$('.ajaxtrigger').click(function(){
  var url = $(this).attr('href');
  $('#dealerProspectUpdateView').load(url+' #dealerupdate .gadget');
  return false;
});



});						
						
						
						
						
						
						
						   
