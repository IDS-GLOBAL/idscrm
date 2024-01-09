// JavaScript Document
$(document).ready(function(){






$('.summernote').summernote({
	height: 800,
	focus: true,
	disableLinkTarget: true,     // hide link Target Checkbox
	placeholder: true,           // enable placeholder text
	prettifyHtml: true,           // enable prettifying html while toggling codeview
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
		var email_systm_id = $('input#email_systm_id').val();
		var slct_email_systm_templates_status = document.getElementById("email_systm_templates_status");
		var email_systm_templates_status_txt = slct_email_systm_templates_status.options[slct_email_systm_templates_status.selectedIndex].text;
		var email_systm_templates_status = slct_email_systm_templates_status.options[slct_email_systm_templates_status.selectedIndex].value;



		var email_systm_templates_subject = $('input#email_systm_templates_subject').val();

		var slct_category_id = document.getElementById("category_id");
		var email_systm_templates_type = slct_category_id.options[slct_category_id.selectedIndex].text;
		var email_systm_templates_type_id = slct_category_id.options[slct_category_id.selectedIndex].value;
		
		var slct_days_response = document.getElementById("days_response");
		var days_systm_response_txt = slct_days_response.options[slct_days_response.selectedIndex].text;
		var days_systm_response = slct_days_response.options[slct_days_response.selectedIndex].value;



		
		var email_systm_templates_body = $('.note-editable').html();
		
		
		
			$.post('script_update_newtemplate.php', {
				email_systm_id: email_systm_id,
				email_systm_templates_status: email_systm_templates_status,
				email_systm_templates_subject: email_systm_templates_subject,
				email_systm_templates_type_id: email_systm_templates_type_id,
				email_systm_templates_type: email_systm_templates_type,
				days_systm_response: days_systm_response,
				email_systm_templates_body: email_systm_templates_body
			}, function(data){
  
						console.log(data);
						
						
									
				});

	setTimeout(function(){

			window.location.href = 'emailtemplates.php'; 

    },3000);
		
		
		});
		
		
		

});