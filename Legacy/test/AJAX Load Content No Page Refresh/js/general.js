// JavaScript Document
// http://www.youtube.com/watch?v=ytKc0QsVRY4
// Php academy
//alert('Working...');


$(document).ready(function(){
						   
		//Intial Preview
		$('#content').load('content/sample.php');
		
		// handle menu clicks
		$('ul#nav li a').click(function(){
				
		//alert('OK');
		
			var page = $(this).attr('href');
		//alert(page);
		
		$('#content').load('content/' + page + '.php');
		
		//Stops the Page From going forward.
		return false;
		
		});
		
		
});


		