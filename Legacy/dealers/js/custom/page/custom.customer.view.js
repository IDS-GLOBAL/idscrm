// JavaScript Document
$(document).ready(function(){




$('#customer_email_body').summernote({
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































$('button#sendthis_email').click(function(){
		
		var thisdid = $('input#thisdid').val();
		
		
		var email_to = $('input#email_to').val();
		var email_from = $('input#email_from').val();
		
		
		
		var slct_email_template = document.getElementById('email_template');
		var email_template_txt = slct_email_template.options[slct_email_template.selectedIndex].text;
		var email_template_value = slct_email_template.options[slct_email_template.selectedIndex].value;
		
		var aHTML = $('.note-editor .note-editable').code();

		
		$('#emailCustomerModal.modal').modal('hide');
		
		
		$.post('script_smtp_customer_email.php', {
			   thisdid: thisdid,
			   evalue: email_template_value,
			   email_from: email_from,
			   email_to: email_to,
			   email_template_txt: email_template_txt,
			   aHTML: aHTML
			}, function(data){
					
					console.log(data);
		});

});


	$('select#email_template').on('change', function(obj){
		var customer_id = $('input#customer_id').val();
											   
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


	$('button#save_customer_info').click(function(){
												   
			save_customernote();
			
	});


	$('button#save_customer_notes').click(function(){
												   
			save_customernote();
			
	});




	// Preparing The Appointment
	var grb_customer_name = $('span#grb_customer_name').html();
	$('input#dlr_appt_title').val(grb_customer_name);


	var customer_id = $('input#customer_id').val();
	$('input#dlr_appt_customer_id').val(customer_id);







}); //End $(document).ready





function save_customernote(){

		var customer_id = $('input#customer_id').val();

		var customer_sales_person_id = $('input#customer_sales_person_id').val();
		var customer_sales_person2_id = $('input#customer_sales_person2_id').val();

 		var customer_bodynote = $('textarea#customer_bodynote').val();
 
		$.post('script_create_customernote.php', {
			   customer_id: customer_id,
			   customer_sales_person_id: customer_sales_person_id,
			   customer_sales_person2_id: customer_sales_person2_id,
			   customer_bodynote: customer_bodynote

				   }, function(data){
	 			
				
				console.log(data);
			var empty = '';
			$('textarea#customer_bodynote').val(empty);

			$('div#master_customer_notes_layout').html(data);



			});




}












