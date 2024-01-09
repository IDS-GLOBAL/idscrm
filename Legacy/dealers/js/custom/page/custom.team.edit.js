// Javascript Document
$(document).ready(function(){



	$('button#save_team_name').click(function(){
			
			var thisdid = $('input#thisdid').val();
			var dlr_team_id = $('input#team_id').val();
			var dlr_team_name = $('input#dlr_team_name').val();
			
			var slct_dlr_team_status = document.getElementById("dlr_team_status");
			var dlr_team_status = slct_dlr_team_status.options[slct_dlr_team_status.selectedIndex].value;


			var dlr_team_description = $('#team_description').code();


			
			$.post('script_update_team.php', {dlr_team_id: dlr_team_id, dlr_team_status: dlr_team_status, dlr_team_name: dlr_team_name, dlr_team_description: dlr_team_description}, function(data){
											 
						 console.log(data);
						 
									 
			});
			
			window.location.replace('team.php?dlr_team_id='+dlr_team_id);
	});
			


            $('#team_description').summernote({

				
				
				
				height: 300,
				disableLinkTarget: true,     // hide link Target Checkbox
				placeholder: true,           // enable placeholder text
      			prettifyHtml: true,           // enable prettifying html while toggling codeview
				onImageUpload: function(files, editor, welEditable) {
					sendFile(files[0], editor, welEditable);
				}


			});




}); //End Document Ready


	function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "uploads/index.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }



