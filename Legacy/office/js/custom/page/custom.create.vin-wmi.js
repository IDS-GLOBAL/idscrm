$(document).ready(function(){
	
	
	console.log('custom.create.vin-wmi.js loaded')

	
	$("button#create_newwmi_code_123").on("click", function(){

        var slct_car_make = document.getElementById("car_make");
		var car_make_text = slct_car_make.options[slct_car_make.selectedIndex].text;
		var car_makeid = slct_car_make.options[slct_car_make.selectedIndex].value; 

        var car_wmi_code_123 = $("input#car_wmi_code_123").val();

        console.log('input#car_wmi_code_123: ', car_wmi_code_123)
        console.log('car_make_text: ', car_make_text)


        $.post('models/script_ajax_create_newwmi_code_123.php', {
            car_make_text,
            car_wmi_code_123
        }, function(data){
            console.log('data: ', data)
            $('div#script_ajax_model_results').html(data);
        });



    });
	
});