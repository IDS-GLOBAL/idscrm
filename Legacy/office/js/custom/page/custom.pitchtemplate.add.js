// JavaScript Document
$(document).ready(function(){




$('.pitch_summernote').summernote({
	height: 200,
	onImageUpload: function(files, editor, welEditable) {
		sendFile(files[0], editor, welEditable);
	}
});



function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "uploads/single_mediaphoto.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
					console.log('welEditable: '+welEditable);
					console.log('url: '+url);
                }
            });
        }






$('select#pullanewpitchtemplate').on('change', function(){


					console.log('Changed Templated ');
		var slct_pullanewtemplate = document.getElementById("pullanewpitchtemplate");
		var pullanewtemplate_label = slct_pullanewtemplate.options[slct_pullanewtemplate.selectedIndex].text;
		var pullanewtemplatefile = slct_pullanewtemplate.options[slct_pullanewtemplate.selectedIndex].value;

console.log('pullanewtemplatefile: '+pullanewtemplatefile);
		//var email_dealer_templates_body = $('.note-editable').html();
		$.get( "pitch_templates/?pitchid="+pullanewtemplatefile, function( data ) {
		  $( ".note-editable" ).html( data );
		  					console.log('Data: '+data);
		});
		
		
		
		
		
		

});





		$("button#create_new_category").click(function(){
		
				console.log('Clicked');
				var new_category_enter = $('input#new_category_enter').val();
				
				console.log('Value: '+new_category_enter);				
				
				$.post('script_create_newetemplate_cateogory.php', {
					   new_category_enter: new_category_enter
					   }, function(data){
		  
								console.log(data);
								
								$('select#category_id').html(data);
									
				});
		
		
				$('input#new_category_enter').val('');
		
				
		});		






		
		$('a#save_dudes_pitchtemplate').click(function(){

		//debugger;
		
		var dudes_secret_token = $('input#dudes_secret_token').val();
		
		var slct_pitch_systm_templates_status = document.getElementById("pitch_systm_templates_status");
		var pitch_systm_templates_status_txt = slct_pitch_systm_templates_status.options[slct_pitch_systm_templates_status.selectedIndex].text;
		var pitch_systm_templates_status = slct_pitch_systm_templates_status.options[slct_pitch_systm_templates_status.selectedIndex].value;



		var pitch_systm_templates_subject = $('input#pitch_systm_templates_subject').val();

		var slct_category_id = document.getElementById("category_id");
		var dudes_cat_label = slct_category_id.options[slct_category_id.selectedIndex].text;
		var dudes_cat_id = slct_category_id.options[slct_category_id.selectedIndex].value;


		var slct_pullanewtemplate = document.getElementById("pullanewpitchtemplate");
		var pullanewtemplate_label = slct_pullanewtemplate.options[slct_pullanewtemplate.selectedIndex].text;
		var dudes_salespitch_id = slct_pullanewtemplate.options[slct_pullanewtemplate.selectedIndex].value;



		var slct_days_response = document.getElementById("days_response");
		var dlr_days_response_txt = slct_days_response.options[slct_days_response.selectedIndex].text;
		var days_response = slct_days_response.options[slct_days_response.selectedIndex].value;



		
		var dudes_salespitch_body = $('.note-editable').html();
		
		
		
			$.post('script_create_newpitchtemplate.php', {
				dudes_secret_token: dudes_secret_token,
				pitch_systm_templates_status: pitch_systm_templates_status,
				pitch_systm_templates_subject: pitch_systm_templates_subject,
				dudes_salespitch_id: dudes_salespitch_id,
				dudes_cat_id: dudes_cat_id,
				dudes_cat_label: dudes_cat_label,
				days_response: days_response,
				dudes_salespitch_body: dudes_salespitch_body
			}, function(data){
  
						console.log(data);
						
						
									
				});

			window.location.href = 'pitchtemplates.php';
		
		});
		







}); //End Document Ready