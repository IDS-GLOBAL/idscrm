$(document).ready(function(){
	
	
function refresh_make_models(){
		
		
		
		window.location.assign("create.make-models.php");
		
}
	

$('button#create_makemodel').on('click', function(){

	$(this).hide();
		
	var dudesid = $('input#thisdudesid').val();
	

	

	var slct_car_year = document.getElementById("car_year");
	var car_year_text = slct_car_year.options[slct_car_year.selectedIndex].text;
	var car_year = slct_car_year.options[slct_car_year.selectedIndex].value;
	
	var slct_car_make = document.getElementById("car_make");
	var car_make_text = slct_car_make.options[slct_car_make.selectedIndex].text;
	var car_makeid = slct_car_make.options[slct_car_make.selectedIndex].value;
	

	
	var car_model = $('input#car_model').val();
	var car_trim = $('input#car_trim').val();
	
	
	
		$.post('script_create_ajax_makeandmodels.php', {
					dudesid: dudesid,
					car_year: car_year,
					car_makeid: car_makeid,
					car_make_text: car_make_text,
					car_model: car_model,
					car_trim: car_trim
			   }, function(result){
		
					
					
					console.log(result);
					
					$('div#script_ajax_model_results').html(result);
		
		
		});
});

	
	
	
});