// JavaScript Document
$(document).ready(function(){
	
	

		
			
			





$('button#save_frazersettings').on('click', function(){

		var thisdid = $('input#thisdid').val();

		var feedidfrazer = $('input#feedidfrazer').val();

		if($('input#feedidfrazerActivated').prop('checked')){	
		var feedidfrazerActivated = '1';
		}else{
		var feedidfrazerActivated = '0';
		}

		$.post('script_update_sysdealer.account.php', {
					feedidfrazer: feedidfrazer,
					feedidfrazerActivated: feedidfrazerActivated,
					thisdid: thisdid			
			}, function(data){

			console.log('data: '+data);
			
		});
});




$('button#save_homenetsettings').on('click', function(){

		var thisdid = $('input#thisdid').val();

		var feedhomenetfilename = $('input#feedhomenetfilename').val();
		
		var company = $('input#company').val();
	
		
		if($('input#feedhomenetActivated').prop('checked')){	
			var feedhomenetActivated = '1';
		}else{
			var feedhomenetActivated = '0';
		}
				
		$.post('script_update_sysdealer.account.php', {
			
		feedhomenetfilename: feedhomenetfilename,
		feedhomenetActivated: feedhomenetActivated,
		company: company,
		thisdid: thisdid			
			
			}, function(data){
		
			console.log('data: '+data);
		})

});

$('button#run_creditpurch_transact').on('click', function(){

var thisdid = $('input#thisdid').val();

var slct_choose_creditpackage = document.getElementById('choose_creditpackage');
var choose_creditpackage = slct_choose_creditpackage.options[slct_choose_creditpackage.selectedIndex].value;
var choose_creditpackage_name = slct_choose_creditpackage.options[slct_choose_creditpackage.selectedIndex].text;
			
			
			$.post('script_ajax_create_system_dealer_credits.php', {thisdid: thisdid,choose_creditpackage: choose_creditpackage, choose_creditpackage_name: choose_creditpackage_name }, function(data){
				
				
				$('div#history_ledger').html(data);
				
				
			});
			

			$('select#choose_creditpackage').val('');

});

$('button#email_systemdlr').on('click', function(data){
		

	$('input#prospect_dealer_email').val();

		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('#emailProspectDlrModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



});










$('select#email_template').on('change', function(){

console.log('Email Template Changed!');


					
		var slct_email_template = document.getElementById("email_template");
		var email_template_label = slct_email_template.options[slct_email_template.selectedIndex].text;
		var email_templatefile = slct_email_template.options[slct_email_template.selectedIndex].value;

		var thisdid = $('input#thisdid').val();

		//var email_dealer_templates_body = $('.note-editable').html();
		$.get( "email_templates/?templateid="+email_templatefile+'&dealer='+thisdid, function( data ) {
		  $( ".note-editable" ).html( data );
		});

				
		//$('div#email_systmdlr_templates_body').html(data);


});













	$('button#save_account_settings').on('click', function(){
				
				
				
				save_account_settings();
				
		
	});







	$('button#log_sys_dlrnote').on('click', function(){
		console.log('Clicked System dealer note');
			logg_sysdealer_note();
	});








	$('button#sendthis_dealeranemail').on('click', function(){
			
			 email_thisdealer();
			
	});



	// Events For AJAX Loaded Elements
	$(document).on("click","a#fastclick_reoccuringinvoicesview",function() {
		//Selects the loaded tab uniquely by ID
		$('a[href="#tab-za"]').tab('show'); // Select tab by name
    });
	
	



















		
});
//End Document Redy




$('#email_systmdlr_templates_body').summernote({
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






function save_account_settings(){

var thisdid = $('input#thisdid').val();
var company = $('input#company').val();
var company_legalname = $('input#company_legalname').val();
var contact = $('input#contact').val();

		var slct_dealer_type_id = document.getElementById('dealer_type_id');
		var dealer_type_id = slct_dealer_type_id.options[slct_dealer_type_id.selectedIndex].value;
		var dealer_type_id_name = slct_dealer_type_id.options[slct_dealer_type_id.selectedIndex].text;

		var slct_contact_title = document.getElementById('contact_title');
		var contact_title = slct_contact_title.options[slct_contact_title.selectedIndex].value;
		var contact_title_name = slct_contact_title.options[slct_contact_title.selectedIndex].text;


var dmcontact2 = $('input#dmcontact2').val();
var dmcontact2_title = $('input#dmcontact2_title').val();
var address = $('input#address').val();
var city = $('input#city').val();

		var slct_state = document.getElementById('state');
		var state = slct_state.options[slct_state.selectedIndex].value;
		var state_name = slct_state.options[slct_state.selectedIndex].text;


var zip = $('input#zip').val();
var phone = $('input#phone').val();
var website_url = $('input#website_url').val();
var fax = $('input#fax').val();
var accts_payables_name = $('input#accts_payables_name').val();
var accts_payables_email = $('input#accts_payables_email').val();

var accts_rcvbles_name = $('input#accts_rcvbles_name').val();
var accts_rcvbles_email = $('input#accts_rcvbles_email').val();



		var slct_settingCurrency = document.getElementById('settingCurrency');
		var settingCurrency = slct_settingCurrency.options[slct_settingCurrency.selectedIndex].value;
		var settingCurrency_name = slct_settingCurrency.options[slct_settingCurrency.selectedIndex].text;

		var slct_dealerTimezone = document.getElementById('dealerTimezone');
		var dealerTimezone = slct_dealerTimezone.options[slct_dealerTimezone.selectedIndex].value;
		var dealerTimezone_name = slct_dealerTimezone.options[slct_dealerTimezone.selectedIndex].text;


var dlr_geo_latitude = $('input#dlr_geo_latitude').val();
var dlr_geo_longitude = $('input#dlr_geo_longitude').val();



$.post('script_update_sysdealer.account.php', {
	thisdid: thisdid, 
	company: company, 
	company_legalname: company_legalname, 
	contact: contact, 
	dealer_type_id: dealer_type_id, 
	contact_title: contact_title, 
	dmcontact2: dmcontact2, 
	dmcontact2_title: dmcontact2_title, 
	address: address, 
	city: city, 
	state: state, 
	zip: zip, 
	phone: phone, 
	website_url: website_url, 
	fax:fax, 
	accts_payables_name: accts_payables_name, 
	accts_payables_email: accts_payables_email,
	accts_rcvbles_name: accts_rcvbles_name,
	accts_rcvbles_email: accts_rcvbles_email,
	settingCurrency: settingCurrency, 
	dealerTimezone: dealerTimezone, 
	dlr_geo_latitude: dlr_geo_latitude, 
	dlr_geo_longitude: dlr_geo_longitude
}, function(data){ 
																																																																																																																																																																																																																																																																																																																					  console.log(data); 
																																																																																																																																																																																																																																																																																																																					  });


}






function logg_sysdealer_note(){
	console.log('Running System Dealer note');
			var dudesid = $('input#thisdudesid').val();
			var thisdid = $('input#thisdid').val();
			var sysdlr_lognote_body = $('textarea#sysdlr_lognote_body').val();
			if(!sysdlr_lognote_body){return false; }


			$.post('script_ajaxcreate_sysdealer_note.php', {
				   dudesid: dudesid,
				   thisdid: thisdid,
				   sysdlr_lognote_body: sysdlr_lognote_body
			}, function(data){
				console.log('Note Writing: '+data);
				$('div#log_sysdlrnotes_results').html(data);
			});
			
			$('textarea#sysdlr_lognote_body').val('');




}






function email_thisdealer(){

	
	var dudesid = $('input#thisdudesid').val();
	var thisdid = $('input#thisdid').val();

	var email_to = $('input#email_to').val();
	
	var email_from = $('input#email_from').val();


	var slct_email_template = document.getElementById("email_template");
	var email_template_subject = slct_email_template.options[slct_email_template.selectedIndex].text;
	var email_template = slct_email_template.options[slct_email_template.selectedIndex].value;
	
	var email_systm_templates_body = $('.note-editable').html();


	if (validateEmail(email_to)) {
		console.log(email_to + " is valid :)");
		$(this).addClass('has-success');
	} else {
		//console.log(approval_email + " is not valid :(");
	$(this).addClass('has-error');
		alert('Sorry You Entered An Invalid Email: '+email_to+' is not a good email to use.');
		return false;
	}



	if (validateEmail(email_from)) {
		console.log(email_from + " is valid :)");
		$(this).addClass('has-success');
	} else {
		//console.log(approval_email + " is not valid :(");
	$(this).addClass('has-error');
		alert('Sorry You Entered An Invalid Email: '+email_from+' is not a good email to use.');
		return false;
	}



					swal({
                        title: "Before You Finish?",
                        text: "Your will not be able to recover this email once sent!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1fa91d",
						cancelButtonColor: "#976a26",
                        confirmButtonText: "Yes, Send it!",
                        cancelButtonText: "No, Preview It First!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("Sent!", "Your Email To This Prospect Has Been Sent.", "success");


							$.post('script_emaildlr_capture.send.php', {
								   dudesid: dudesid,
								   thisdid: thisdid,
								   email_to: email_to,
								   email_from: email_from,
								   email_template: email_template,
								   email_template_subject: email_template_subject,
								   email_systm_templates_body: email_systm_templates_body
									}, function(data){ 
									
									console.log('send: '+data);
									
									$('div#email_dlrprospectsent_results').html(data);
									
									//window.top.location.href="";

									});

                        } else {
							
							
                            swal("Preview", "Great Choice :)", "error");



							$.post('script_emaildlr_capture.only.php', {
								   dudesid: dudesid,
								   thisdid: thisdid,
								   email_to: email_to,
								   email_from: email_from,
								   email_template: email_template,
								   email_template_subject: email_template_subject,
								   email_systm_templates_body: email_systm_templates_body
									}, function(data){ 
									
									console.log('preview: '+data);
									
									$('div#email_dlrprospectsent_results').html(data);
									
									//window.top.location.href="";

									});







                        }
                    });

















	
	
	
	
	
}
