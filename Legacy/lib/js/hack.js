// JavaScript Document


$(document).ready(function(){						   


 //alert('Hi Im Working');

function clickme(){
	
						  
}












								// Only Allows Numbers only
								function validate(evt) {
								  var theEvent = evt || window.event;
								  var key = theEvent.keyCode || theEvent.which;
								  key = String.fromCharCode( key );
								  var regex = /[0-9]|\./;
								  if( !regex.test(key) ) {
									theEvent.returnValue = false;
									if(theEvent.preventDefault) theEvent.preventDefault();
								  }
								}


});