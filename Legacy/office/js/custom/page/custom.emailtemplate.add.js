// JavaScript Document
$(document).ready(function(){






$('.summernote').summernote({
	height: 400,
	focus: true,
	disableLinkTarget: true,     // hide link Target Checkbox
	placeholder: true,           // enable placeholder text
	prettifyHtml: true,           // enable prettifying html while toggling codeview
	onImageUpload: function(files, editor, welEditable) {
		sendFile(files[0], editor, welEditable);
	}
});

        var edit = function() {
            $('.click2edit').summernote({
				focus: true,
				onImageUpload: function(files, editor, welEditable) {
					sendFile(files[0], editor, welEditable);
				}

			});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
			
			
            $('.click2edit').destroy();
        };


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
				//$('.summernote').summernote("insertImage", data, 'filename');

					console.log('welEditable: '+welEditable);
					console.log('url: '+url);
                }
            });
        }









$('select#pullanewtemplate').on('change', function(){


					
		var slct_pullanewtemplate = document.getElementById("pullanewtemplate");
		var pullanewtemplate_label = slct_pullanewtemplate.options[slct_pullanewtemplate.selectedIndex].text;
		var pullanewtemplatefile = slct_pullanewtemplate.options[slct_pullanewtemplate.selectedIndex].value;

console.log('pullanewtemplatefile: email_templates/'+pullanewtemplatefile);

		//var email_dealer_templates_body = $('.note-editable').html();
		$.get( "email_templates/"+pullanewtemplatefile, function( data ) {
		  $( ".note-editable" ).html( data );
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
		
		
		
		
		
		$('a#save_dudestemplate').click(function(){

		//debugger;
		
		var token = $('input#dudes_secret_token').val();
		
		var slct_email_systm_templates_status = document.getElementById("email_systm_templates_status");
		var email_systm_templates_status_txt = slct_email_systm_templates_status.options[slct_email_systm_templates_status.selectedIndex].text;
		var email_systm_templates_status = slct_email_systm_templates_status.options[slct_email_systm_templates_status.selectedIndex].value;



		var email_systm_templates_subject = $('input#email_systm_templates_subject').val();

		var slct_category_id = document.getElementById("category_id");
		var email_dealer_templates_type = slct_category_id.options[slct_category_id.selectedIndex].text;
		var email_dealer_templates_type_id = slct_category_id.options[slct_category_id.selectedIndex].value;
		
		var slct_days_response = document.getElementById("days_response");
		var dlr_days_response_txt = slct_days_response.options[slct_days_response.selectedIndex].text;
		var days_response = slct_days_response.options[slct_days_response.selectedIndex].value;



		
		var email_dealer_templates_body = $('.note-editable').html();
		
		
		
			$.post('script_create_newtemplate.php', {
				token: token,
				email_systm_templates_status: email_systm_templates_status,
				email_systm_templates_subject: email_systm_templates_subject,
				email_dealer_templates_type_id: email_dealer_templates_type_id,
				email_dealer_templates_type: email_dealer_templates_type,
				days_response: days_response,
				email_dealer_templates_body: email_dealer_templates_body
			}, function(data){
  
						console.log(data);
						
						$('div#create_newtemplate_console').html(data);
									
				});

			//window.location.replace('emailtemplates.php');
		
		});
		
		
		

});