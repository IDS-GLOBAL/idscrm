// JavaScript Document
$(document).ready(function(){




$('#lead_email_body').summernote({
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





























$('button#draftthis_leademail').click(function(){
		
		var thisdid = $('input#thisdid').val();
		
		var cust_leadid = $('input#cust_leadid').val();
		
		
		var email_to = $('input#email_to').val();
		var email_from = $('input#email_from').val();
		
		
		
		var slct_email_template = document.getElementById('email_template');
		var email_template_txt = slct_email_template.options[slct_email_template.selectedIndex].text;
		var email_template_value = slct_email_template.options[slct_email_template.selectedIndex].value;
		
		var aHTML = $('.note-editor .note-editable').code();

		
		$('#emailLeadModal').modal('hide');
		
		// There's also a sript_draft_cust_email.php for drafts.
		// $.post('script_smtp_cust_email.php', {
		
		$.post('script_smtp_cust_email.php', {
			   thisdid: thisdid,
			   cust_leadid: cust_leadid,
			   email_template_value: email_template_value,
			   email_to: email_to,
			   email_from: email_from,
			   email_template_txt: email_template_txt,
			   aHTML: aHTML
			}, function(data){
					
					console.log(data);
					
					window.location.replace('leads.php');					
		});

});


$('button#sendthis_leademail').click(function(){
		
		var thisdid = $('input#thisdid').val();
		
		var cust_leadid = $('input#cust_leadid').val();
		
		
		var email_to = $('input#email_to').val();
		var email_from = $('input#email_from').val();
		
		
		
		var slct_email_template = document.getElementById('email_template');
		var email_template_txt = slct_email_template.options[slct_email_template.selectedIndex].text;
		var email_template_value = slct_email_template.options[slct_email_template.selectedIndex].value;
		
		var aHTML = $('.note-editor .note-editable').code();

		
		$('#emailLeadModal').modal('hide');
		
		// There's also a sript_draft_cust_email.php for drafts.
		// $.post('script_smtp_cust_email.php', {
		
		$.post('script_smtp_cust_email.php', {
			   thisdid: thisdid,
			   cust_leadid: cust_leadid,
			   email_template_value: email_template_value,
			   email_to: email_to,
			   email_from: email_from,
			   email_template_txt: email_template_txt,
			   aHTML: aHTML
			}, function(data){
					
					console.log(data);
					window.location.replace('leads.php');					
		});

});


	$('select#email_template').on('change', function(obj){
		var cust_id = $('input#cust_id').val();
											   
		var evalue = $(this).val();
		var thisdid = $('input#thisdid').val();

				//console.log(evalue);
		if(evalue == '' || evalue == 0){ return false;}

		$.post('ajax/pull_template.php', {
			   evalue: evalue,
			   thisdid: thisdid
				   }, function(data){
	 			
				
				//console.log(data);
				
				var empty = '';

			$('.note-editor .note-editable').html(data);



			});
			
	});


	$('button#save_cust_info').click(function(){
												   
			save_leadnote();
			
	});


	$('button#save_cust_notes').click(function(){
												   
			save_leadnote();
			
	});



	// Preparing The Appointment
	var grb_lead_name = $('span#grb_lead_name').html();
	$('input#dlr_appt_title').val(grb_lead_name);


	var cust_leadid = $('input#cust_leadid').val();
	$('input#dlr_appt_lead_id').val(cust_leadid);






});  // End $(document).ready

	

function save_leadnote(){

		var cust_leadid = $('input#cust_leadid').val();

		var cust_sales_person_id = $('input#cust_sales_person_id').val();
		var cust_sales_person2_id = $('input#cust_sales_person2_id').val();

 		var cust_bodynote = $('textarea#lead_notes').val();
 
		$.post('script_create_leadnote.php', {
			   cust_leadid: cust_leadid,
			   cust_bodynote: cust_bodynote

				   }, function(data){
	 			
				
				console.log(data);
			var empty = '';
			$('textarea#lead_notes').val(empty);

			$('div#master_cust_notes_layout').html(data);



			});




}












