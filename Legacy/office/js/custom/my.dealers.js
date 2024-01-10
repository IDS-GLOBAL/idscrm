// JavaScript Document

// Static Function To Set Initialize for dynamic latitude and logitude.
var lat;
var long;

function initialize() {

	var myLatlng = new google.maps.LatLng(lat, long);
	var myOptions = {
		zoom: 15,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	
	$('#data_google_maps_view').fadeOut(300, function() {
		
		var map = new google.maps.Map(document.getElementById('data_google_maps_view'), myOptions);
		
		var marker = new google.maps.Marker({
			position: myLatlng
		});
		
		marker.setMap(map);
		$(this).fadeIn(300);
		
	});

}


$(document).ready(function(){




	$('table#mydataTable1 a#prospctdlrid').on('click', function(){
		console.log('Clicked prospctdlrid');
	
		var prospctdlrid = $(this).attr('rel');
		
		console.log('prospctdlrid'+prospctdlrid);
		
		
		$.post('ajax/myprospect.dealer.view.php', {prospctdlrid: prospctdlrid}, function(data){
			
			$('div#mydealer_ajax_view').html(data);
			//console.log('loading data'+data);
	
		});
	
			$('div#view_aprospect_instate').show();
			$('div#view_prospects_block').hide();
	

	

});

function showprospectview(){

	$('div#work_aprospect_instate').hide();
	$('div#view_aprospect_instate').show();

}

function showprospectwork(){
	$('div#view_aprospect_instate').hide();

	$('div#work_aprospect_instate').show();

}


function hide_myparkinglot_blocks(){
	
	console.log('Hiding All');

	$('div#view_pendingdlrs_block').hide();

	$('div#view_sysdealers_block').hide();
	
	$('div#view_prospects_block').hide();
	$('div#work_aprospect_instate').hide();
	$('div#view_aprospect_instate').hide();


}

setTimeout( hide_myparkinglot_blocks, 3000);





$('button#flip_prospects').on('click', function(){
	
	console.log('Clicked flip_prospects');
	
	
	$('div#view_prospects_block').show();

	$('div#view_sysdealers_block').hide();
	
	$('div#view_pendingdlrs_block').hide();

	$('div#work_aprospect_instate').hide();
	$('div#view_aprospect_instate').hide();



});


$('button#flip_pendingdlrs').on('click', function(){
	
	console.log('Clicked flip_pendingdlrs');

	$('#view_pendingdlrs_block').show();

	$('#view_sysdealers_block').hide();
	
	$('#view_prospects_block').hide();
	$('div#work_aprospect_instate').hide();
	$('div#view_aprospect_instate').hide();



});


$('button#flip_sysdealers').on('click', function(){
	console.log('Clicked sys dealers');
	$('#view_sysdealers_block').show();
	$('#view_pendingdlrs_block').hide();
	$('#view_prospects_block').hide();
	
	$('div#work_aprospect_instate').hide();
	$('div#view_aprospect_instate').hide();

});






$('button#pull_googlemap').on('click', function(){
			
		
		

	var street_address = $('input#address').val();
	var street_city = $('input#city').val();

	var slct_state = document.getElementById("state");
	var state_label = slct_state.options[slct_state.selectedIndex].text;
	var street_state = slct_state.options[slct_state.selectedIndex].value;

	
	var street_zip = $('input#zip').val();
	
	var street_country = 'USA';

			console.log('Pulling Google Map');

		var pc = street_address+' '+street_city+' '+street_state+' '+street_zip+' '+street_country;
		


		console.log(pc);
		
		//var pc = $('#post_code').val();
		
		if (pc != '') {

		console.log('Pulling Json');

			$.getJSON('mod/goog.php?pc='+pc, function(data) {
			
			console.log('Pulling Json Back');
				console.log('Data: '+data);
				//street_no = data.results[0].address_components[0].long_name;
				//route = data.results[0].address_components[1].long_name;

				//neighborhood = data.results[0].address_components[2].long_name;
				//city = data.results[0].address_components[3].long_name;
				//county = data.results[0].address_components[4].long_name;
				//state = data.results[0].address_components[5].short_name;
				//country = data.results[0].address_components[6].long_name;
				//zip = data.results[0].address_components[7].long_name;
				

				
				//address =  data.results[0].formatted_address;
				status = data.status;

				lat = data.results[0].geometry.location.lat;
				long = data.results[0].geometry.location.lng;
				
				$('input#dlr_geo_latitude').val(lat);
				$('input#dlr_geo_longitude').val(long);
				$('input#dlr_ok_googlemp').val(status);
				

				//string = 'Status: <span id="map_status">' + status + '</span><br />Street No.: <span id="map_streetno">'+ street_no +'</span><br /><span id="map_route">' + route + '</span><br />Suggested Address: <span id="map_formatted">' + address + '</span><br />'+'County: <span id="map_county">' + county + '</span><br /> neighborhood: <span id="map_neighborhood">' + neighborhood + '</span><br />City: <span id="map_city">' + city + '</span><br />State: <span id="map_state">'+ state +'</span><br /><span id="entered_address">' + pc + '</span><br />Latitude: <span id="new_latitude">'+lat+'</span> <br />Longitude: <span id="new_longitude">' + long + '</span>';
				
				//$('div#map_ajax_results').html(string);
				$.getScript('http://maps.google.com/maps/api/js?key=AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec&sensor=false&callback=initialize');
			});


			setTimeout(
			  function() 
			  {
						//do something special
						// updating record to record_geo_longitude
				var newstatus = $('input#dlr_ok_googlemp').val();
				
				if(newstatus == 'OK'){
						update_prospect_dealer();
				}
			
			  }, 3000);
			
			
		}
		
		
		
		//$('div#see_mapcord').show();
		//$('div#see_mapview').show();
		
		return false;
			
			
});






$(document).on('change', 'select#email_template2', function(){


					
		var slct_email_template2 = document.getElementById("email_template2");
		var email_template_label2 = slct_email_template2.options[slct_email_template2.selectedIndex].text;
		var email_templatefile2 = slct_email_template2.options[slct_email_template2.selectedIndex].value;

		var dlr_prspct_id = $('input#prospctdlrid').val();
		

		//var email_dealer_templates_body = $('.note-editable').html();
		$.get( "email_templates/?templateid="+email_templatefile2+'&dlr_prspct='+dlr_prspct_id, function( data ) {
		  $( ".note-editable" ).html( data );
		});
		
		
		
		
		
		

});








$('select#email_template').on('change', function(){


					
		var slct_email_template = document.getElementById("email_template");
		var email_template_label = slct_email_template.options[slct_email_template.selectedIndex].text;
		var email_templatefile = slct_email_template.options[slct_email_template.selectedIndex].value;

		var dlr_prspct_id = $('input#prospctdlrid').val();

		//var email_dealer_templates_body = $('.note-editable').html();
		$.get( "email_templates/?templateid="+email_templatefile+'&dlr_prspct='+dlr_prspct_id, function( data ) {
		  $( ".note-editable" ).html( data );
		});
		
		
		
		
		
		

});







$('button#email_prospectdlr').on('click', function(data){
		
console.log('Clicked Prospect Email');

	var prospect_dealer_email = $('input#prospect_dealer_email').val();
	
	
	$('input#email_to2').val(prospect_dealer_email);

		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('#emailProspectDlrModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



});


$('button#money_prospectdlr').on('click', function(data){

console.log('Clicked Prospect Money');


	var prospect_dealer_email = $('input#prospect_dealer_email').val();
	
	
	$('input#email_to').val(prospect_dealer_email);

		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('#moneyProspectDlrModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



});


$('button#appointment_prospectdlr').on('click', function(data){

console.log('Clicked Prospect Appointment');



		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('#appointmentModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



});

$('button#task_prospectdlr').on('click', function(data){



		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('#taskModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



});






$('button#pitch_prospectdlr').on('click', function(){
		
console.log('Clicked Prospect Pitch');

	var dlrposted_token = $('input#dlrpost_token').val();
	
	var dudesid = $('input#thisdudesid').val();

	var prospctdlrid = $('input#prospctdlrid').val();



		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('div#pitchProspectDlrModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



});


$('select#dudes_script_options').on('change', function(){

	var dlrposted_token = $('input#dlrpost_token').val();
	
	var dudesid = $('input#thisdudesid').val();

	var prospctdlrid = $('input#prospctdlrid').val();

				
var slct_dudes_script = document.getElementById("dudes_script_options");
var dudes_script_text = slct_dudes_script.options[slct_dudes_script.selectedIndex].text;
var dudes_script_value = slct_dudes_script.options[slct_dudes_script.selectedIndex].value;


$.post('script_ajax_dd_script_results.php', {
	   		dlrposted_token: dlrposted_token,
			dudesid: dudesid,
			prospctdlrid: prospctdlrid,
			dudes_script_text: dudes_script_text,
	   		dudes_script_value: dudes_script_value
	   }, function(result){

			
			
			console.log(result);
			
			$('div#script_ajax_modal_results').html(result);


});



});









$('#email_systm_templates_body2').summernote({
	height: 200,
	onImageUpload: function(files, editor, welEditable) {
		sendFile(files[0], editor, welEditable);
	}
});


$('#email_systm_templates_body').summernote({
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






	$('button#logg_dealerprospect_note').on('click', function(){
			logg_prospect_note();
	});
	

	$('button#sendthis_prospectanemail').on('click', function(){
			
			 email_thisprospect();
			
	});


});


function logg_prospect_note(){


			var dudesid = $('prospctdlrid#dudesid').val();
			var prospctdlrid = $('input#prospctdlrid').val();
			var prspct_dlr_lognote_body = $('textarea#prspct_dlr_lognote_body').val();
			if(!prspct_dlr_lognote_body){return false; }


			$.post('script_ajaxcreate_dealer_prospect_note.php', {
				   dudesid: prspct_dlr_lognote_body,
				   prospctdlrid: prospctdlrid,
				   prspct_dlr_lognote_body: prspct_dlr_lognote_body
			}, function(data){
				console.log('Note Writing: '+data);
				$('div#log_notes_results').html(data);
			});
			
			$('textarea#prspct_dlr_lognote_body').val('');
}



function email_thisprospect(){

	
	var dudesid = $('input#thisdudesid').val();
	var prospctdlrid = $('input#prospctdlrid').val();

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


							$.post('script_email_capture.send.php', {
								   dudesid: dudesid,
								   prospctdlrid: prospctdlrid,
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



							$.post('script_email_capture.only.php', {
								   dudesid: dudesid,
								   prospctdlrid: prospctdlrid,
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




$('button#bringup_finalactions').on('click', function(){

	update_prospect_dealer();
});


$('button#movethis_prospectanemail').on('click', function(){
														  
		
		

		
		emailcapture_moveprospect();
		
														  

});




function emailcapture_moveprospect(){
	
	var dlrposted_token = $('input#dlrpost_token').val();
	
	var dudesid = $('input#thisdudesid').val();

	var prospctdlrid = $('input#prospctdlrid').val();

	var email_to2 = $('input#email_to2').val();
	
	var email_from2 = $('input#email_from2').val();


	var slct_email_template2 = document.getElementById("email_template2");
	var email_template_subject2 = slct_email_template2.options[slct_email_template2.selectedIndex].text;
	var email_template2 = slct_email_template2.options[slct_email_template2.selectedIndex].value;
	
	var email_systm_templates_body2 = $('.note-editable').html();
	
	console.log('email_systm_templates_body2: '+email_systm_templates_body2);


	if (validateEmail(email_to2)) {
		console.log(email_to2 + " is valid :)");
		$(this).addClass('has-success');
	} else {
		//console.log(approval_email + " is not valid :(");
	$(this).addClass('has-error');
		alert('Sorry You Entered An Invalid Email: '+email_to2+' is not a good email to use.');
		return false;
	}



	if (validateEmail(email_from2)) {
		console.log(email_from2 + " is valid :)");
		$(this).addClass('has-success');
	} else {
		//console.log(approval_email + " is not valid :(");
	$(this).addClass('has-error');
		alert('Sorry You Entered An Invalid Email: '+email_from2+' is not a good email to use.');
		return false;
	}





	var slct_dudes1_id = document.getElementById("dudes1_id");
	var dudes1_id_label = slct_dudes1_id.options[slct_dudes1_id.selectedIndex].text;
	var dudes1_id = slct_dudes1_id.options[slct_dudes1_id.selectedIndex].value;

	var slct_dudes2_id = document.getElementById("dudes2_id");
	var dudes2_id_label = slct_dudes2_id.options[slct_dudes2_id.selectedIndex].text;
	var dudes2_id = slct_dudes2_id.options[slct_dudes2_id.selectedIndex].value;



	var prospctdlrid = $('input#prospctdlrid').val();
	var prospect_dealer_email = $('input#prospect_dealer_email').val();
	var prospect_dealer_password = $('input#prospect_dealer_password').val();


	var contact = $('input#contact').val();


	var slct_contact_title = document.getElementById("contact_title");
	var contact_title_label = slct_contact_title.options[slct_contact_title.selectedIndex].text;
	var	contact_title = slct_contact_title.options[slct_contact_title.selectedIndex].value;

	

	var slct_contact_phone = document.getElementById("contact_phone_type");
	var contact_phone_label = slct_contact_phone.options[slct_contact_phone.selectedIndex].text;
	var	contact_phone = slct_contact_phone.options[slct_contact_phone.selectedIndex].value;




	var slct_contact_mobilecarrier_id = document.getElementById("contact_mobilecarrier_id");
	var contact_mobilecarrier_label = slct_contact_mobilecarrier_id.options[slct_contact_mobilecarrier_id.selectedIndex].text;
	var	contact_mobilecarrier_id = slct_contact_mobilecarrier_id.options[slct_contact_mobilecarrier_id.selectedIndex].value;




	var dmcontact2 = $('input#dmcontact2').val();
	
	var slct_dmcontact2_title = document.getElementById("dmcontact2_title");
	var dmcontact2_title_label = slct_dmcontact2_title.options[slct_dmcontact2_title.selectedIndex].text;
	var	dmcontact2_title = slct_dmcontact2_title.options[slct_dmcontact2_title.selectedIndex].value;
	
	var dmcontact2_phone = $('input#dmcontact2_phone').val();

	var slct_dmcontact2_phone_type = document.getElementById("dmcontact2_phone_type");
	var dmcontact2_phone_label = slct_dmcontact2_phone_type.options[slct_dmcontact2_phone_type.selectedIndex].text;
	var	dmcontact2_phone_type = slct_dmcontact2_phone_type.options[slct_dmcontact2_phone_type.selectedIndex].value;


	var slct_dmcontact2_mobilecarrier_id = document.getElementById("dmcontact2_mobilecarrier_id");
	var dmcontact2_mobilecarrier_label = slct_dmcontact2_mobilecarrier_id.options[slct_dmcontact2_mobilecarrier_id.selectedIndex].text;
	var	dmcontact2_mobilecarrier_id = slct_dmcontact2_mobilecarrier_id.options[slct_dmcontact2_mobilecarrier_id.selectedIndex].value;



	var company = $('input#company').val();
	var company_legalname = $('input#company_legalname').val();

	var slct_dealer_type_id = document.getElementById("dealer_type_id");
	var dealer_type_id_label = slct_dealer_type_id.options[slct_dealer_type_id.selectedIndex].text;
	var dealer_type_id = slct_dealer_type_id.options[slct_dealer_type_id.selectedIndex].value;

	var slct_dealer_stillopenclose = document.getElementById("dealer_stillopenclose");
	var dealer_stillopenclose_label = slct_dealer_stillopenclose.options[slct_dealer_stillopenclose.selectedIndex].text;
	var dealer_stillopenclose = slct_dealer_stillopenclose.options[slct_dealer_stillopenclose.selectedIndex].value;

	var website = $('input#website').val();
	
	var finance_primary_name = $('input#finance_primary_name').val();
	
	var finance = $('input#finance').val();

	var finance_contact = $('input#finance_contact').val();

	var finance_contact_email = $('input#finance_contact_email').val();



	
	var sales = $('input#sales').val();

	var sales_contact = $('input#sales_contact').val();

	var sales_email = $('input#sales_email').val();
	var phone = $('input#phone').val();
	var fax = $('input#fax').val();
	var address = $('input#address').val();
	var city = $('input#city').val();

	var slct_state = document.getElementById("state");
	var state_label = slct_state.options[slct_state.selectedIndex].text;
	var state = slct_state.options[slct_state.selectedIndex].value;

	
	var zip = $('input#zip').val();
	var home_html = $('input#home').val();
	var about_html = $('input#about').val();
	var directions_html = $('input#directions').val();
	var contactus = $('input#contactus').val();
	var mapurl = $('input#mapurl').val();
	var mapframe = $('input#mapframe').val();
	var slogan = $('input#slogan').val();
	var disclaimer = $('input#disclaimer').val();
	var newmatrixcredit_vgoodcredit = $('input#newmatrixcredit_vgoodcredit').val();
	var newmatrixcredit_jgoodcredit = $('input#newmatrixcredit_jgoodcredit').val();
	var newmatrixcredit_faircredit = $('input#newmatrixcredit_faircredit').val();
	var newmatrixcredit_poorcredit = $('input#newmatrixcredit_poorcredit').val();
	var newmatrixcredit_subprime = $('input#newmatrixcredit_subprime').val();
	var newmatrixcredit_unknown = $('input#newmatrixcredit_unknown').val();
	var usedmatrixcredit_vgoodcredit = $('input#usedmatrixcredit_vgoodcredit').val();
	var usedmatrixcredit_jgoodcredit = $('input#usedmatrixcredit_jgoodcredit').val();
	var usedmatrixcredit_faircredit = $('input#usedmatrixcredit_faircredit').val();
	var usedmatrixcredit_poorcredit = $('input#usedmatrixcredit_poorcredit').val();

	var usedmatrixcredit_subprime = $('input#usedmatrixcredit_subprime').val();
	var usedmatrixcredit_unknown = $('input#usedmatrixcredit_unknown').val();
	var settingDefaultAPR = $('input#settingDefaultAPR').val();
	var settingDefaultTerm = $('input#settingDefaultTerm').val();
	var settingSateSlsTax = $('input#settingSateSlsTax').val();
	var settingDocDlvryFee = $('input#settingDocDlvryFee').val();
	var settingTitleFee = $('input#settingTitleFee').val();
	var settingStateInspectnFee = $('input#settingStateInspectnFee').val();

				
	var dlr_geo_latitude  =	$('input#dlr_geo_latitude').val();
	var dlr_geo_longitude =	$('input#dlr_geo_longitude').val();
	var dlr_ok_googlemp   =	$('input#dlr_ok_googlemp').val();


	var slct_wfh_dealer_type = document.getElementById("wfh_dealer_type_id");
	var wfh_dealer_type_label = slct_wfh_dealer_type.options[slct_wfh_dealer_type.selectedIndex].text;
	var wfh_dealer_type_id = slct_wfh_dealer_type.options[slct_wfh_dealer_type.selectedIndex].value;
	
	var slct_dealer_chat = document.getElementById("dealer_chat");
	var dealer_chat_label = slct_dealer_chat.options[slct_dealer_chat.selectedIndex].text;
	var dealer_chat = slct_dealer_chat.options[slct_dealer_chat.selectedIndex].value;


	var slct_fuel_pump_display = document.getElementById("fuel_pump_display");
	var fuel_pump_display_label = slct_fuel_pump_display.options[slct_fuel_pump_display.selectedIndex].text;
	var fuel_pump_display = slct_fuel_pump_display.options[slct_fuel_pump_display.selectedIndex].value;

	var slct_dcommercial_youtube_onoff = document.getElementById("dcommercial_youtube_onoff");
	var dcommercial_youtube_onoff_label = slct_dcommercial_youtube_onoff.options[slct_dcommercial_youtube_onoff.selectedIndex].text;
	var dcommercial_youtube_onoff = slct_dcommercial_youtube_onoff.options[slct_dcommercial_youtube_onoff.selectedIndex].value;

	var craigslist_nickname = $('input#craigslist_nickname').val();
	var metaDescription = $('input#metaDescription').val();
	var metaKeywords = $('input#metaKeywords').val();

	var slct_showPricing = document.getElementById("showPricing");
	var showPricing_label = slct_showPricing.options[slct_showPricing.selectedIndex].text;
	var showPricing_id = slct_showPricing.options[slct_showPricing.selectedIndex].value;
	
	var slct_showMileage = document.getElementById("showMileage");
	var showMileage_label = slct_showMileage.options[slct_showMileage.selectedIndex].text;
	var showMileage = slct_showMileage.options[slct_showMileage.selectedIndex].value;


	var mapframe = $('input#mapframe').val();

	var slct_dealer_listingindex_displayprice = document.getElementById("dealer_listingindex_displayprice");
	var dealer_listingindex_displayprice_label = slct_dealer_listingindex_displayprice.options[slct_dealer_listingindex_displayprice.selectedIndex].text;
	var dealer_listingindex_displayprice = slct_dealer_listingindex_displayprice.options[slct_dealer_listingindex_displayprice.selectedIndex].value;
	
	
	
	$.post('script_email_capture.send.moveprospect.php', {
		    email_to2: email_to2,
			email_from2: email_from2,
			email_template_subject2: email_template_subject2,
			email_template2: email_template2,
			email_systm_templates_body2: email_systm_templates_body2,
		   	dudesid: dudesid,
			dudes1_id: dudes1_id,
			dudes2_id: dudes2_id,
		    prospctdlrid:  prospctdlrid,
			company: company,
			company_legalname: company_legalname,
			dealer_type_id: dealer_type_id,
			dealer_type_id_label: dealer_type_id_label,
			dealer_stillopenclose_label: dealer_stillopenclose_label,
			dealer_stillopenclose:  dealer_stillopenclose,
			contact: contact,
			contact_title: contact_title,
			contact_phone: contact_phone,
			contact_phone_label: contact_phone_label,
			contact_mobilecarrier_id: contact_mobilecarrier_id,
			contact_mobilecarrier_label: contact_mobilecarrier_label,
			dmcontact2: dmcontact2,
			dmcontact2_title: dmcontact2_title,
			dmcontact2_phone: dmcontact2_phone,
			dmcontact2_phone_label: dmcontact2_phone_label,
			dmcontact2_phone_type: dmcontact2_phone_type,
			dmcontact2_mobilecarrier_id: dmcontact2_mobilecarrier_id,
			dmcontact2_mobilecarrier_label: dmcontact2_mobilecarrier_label,
			website: website,
			finance_primary_name: finance_primary_name,
			finance: finance,
			finance_contact: finance_contact,
			finance_contact_email: finance_contact_email,
			sales: sales,
			sales_contact: sales_contact,
			sales_email: sales_email,
			phone: phone,
			fax: fax,
			address: address,
			city: city,
			state: state,
			zip: zip,
			home_html: home_html,
			about_html: about_html,
			directions_html: directions_html,
			contactus: contactus,
			mapurl: mapurl,
			mapframe: mapframe,
			slogan: slogan,
			disclaimer: disclaimer,
			newmatrixcredit_vgoodcredit: newmatrixcredit_vgoodcredit,
			newmatrixcredit_jgoodcredit: newmatrixcredit_jgoodcredit,
			newmatrixcredit_faircredit :newmatrixcredit_faircredit,
			newmatrixcredit_poorcredit: newmatrixcredit_poorcredit,
			newmatrixcredit_subprime: newmatrixcredit_subprime,
			newmatrixcredit_unknown: newmatrixcredit_unknown,
			usedmatrixcredit_vgoodcredit: usedmatrixcredit_vgoodcredit,
			usedmatrixcredit_jgoodcredit: usedmatrixcredit_jgoodcredit,
			usedmatrixcredit_faircredit: usedmatrixcredit_faircredit,
			usedmatrixcredit_poorcredit: usedmatrixcredit_poorcredit,
			usedmatrixcredit_subprime: usedmatrixcredit_subprime,
			usedmatrixcredit_unknown: usedmatrixcredit_unknown,
			settingDefaultAPR: settingDefaultAPR,
			settingDefaultTerm: settingDefaultTerm,
			settingSateSlsTax: settingSateSlsTax,
			settingDocDlvryFee: settingDocDlvryFee,
			settingTitleFee: settingTitleFee,
			settingStateInspectnFee: settingStateInspectnFee,
			wfh_dealer_type_id: wfh_dealer_type_id,
			wfh_dealer_type_label: wfh_dealer_type_label,
			dealer_chat: dealer_chat,
			dealer_chat_label: dealer_chat_label,
			fuel_pump_display_label: fuel_pump_display_label,
			fuel_pump_display: fuel_pump_display,
			dcommercial_youtube_onoff_label: dcommercial_youtube_onoff_label,
			craigslist_nickname: craigslist_nickname,
			metaDescription: metaDescription,
			metaKeywords: metaKeywords,
			showPricing_label: showPricing_label,
			showPricing_id: showPricing_id,
			showMileage_label: showMileage_label,
			showMileage: showMileage,
			mapframe: mapframe,
			dealer_listingindex_displayprice_label: dealer_listingindex_displayprice_label,
			dealer_listingindex_displayprice: dealer_listingindex_displayprice,
			prospect_dealer_email: prospect_dealer_email,
			prospect_dealer_password: prospect_dealer_password
			
		}, function(data){
			
			
			console.log(data);
			
						//window.location.replace('my.dealers.php');

			
		}); <!-- end data  function from ajax post-->
	
	
	
	
	
}<!--End Email Capture Move Prospect -->





function update_prospect_dealer(){
	
	var dudesid = $('input#thisdudesid').val();



	var slct_dudes1_id = document.getElementById("dudes1_id");
	var dudes1_id_label = slct_dudes1_id.options[slct_dudes1_id.selectedIndex].text;
	var dudes1_id = slct_dudes1_id.options[slct_dudes1_id.selectedIndex].value;

	var slct_dudes2_id = document.getElementById("dudes2_id");
	var dudes2_id_label = slct_dudes2_id.options[slct_dudes2_id.selectedIndex].text;
	var dudes2_id = slct_dudes2_id.options[slct_dudes2_id.selectedIndex].value;



	var prospctdlrid = $('input#prospctdlrid').val();
	var prospect_dealer_email = $('input#prospect_dealer_email').val();
	var prospect_dealer_password = $('input#prospect_dealer_password').val();


	var contact = $('input#contact').val();


	var slct_contact_title = document.getElementById("contact_title");
	var contact_title_label = slct_contact_title.options[slct_contact_title.selectedIndex].text;
	var	contact_title = slct_contact_title.options[slct_contact_title.selectedIndex].value;

	

	var slct_contact_phone = document.getElementById("contact_phone_type");
	var contact_phone_label = slct_contact_phone.options[slct_contact_phone.selectedIndex].text;
	var	contact_phone = slct_contact_phone.options[slct_contact_phone.selectedIndex].value;




	var slct_contact_mobilecarrier_id = document.getElementById("contact_mobilecarrier_id");
	var contact_mobilecarrier_label = slct_contact_mobilecarrier_id.options[slct_contact_mobilecarrier_id.selectedIndex].text;
	var	contact_mobilecarrier_id = slct_contact_mobilecarrier_id.options[slct_contact_mobilecarrier_id.selectedIndex].value;




	var dmcontact2 = $('input#dmcontact2').val();
	
	var slct_dmcontact2_title = document.getElementById("dmcontact2_title");
	var dmcontact2_title_label = slct_dmcontact2_title.options[slct_dmcontact2_title.selectedIndex].text;
	var	dmcontact2_title = slct_dmcontact2_title.options[slct_dmcontact2_title.selectedIndex].value;
	
	var dmcontact2_phone = $('input#dmcontact2_phone').val();

	var slct_dmcontact2_phone_type = document.getElementById("dmcontact2_phone_type");
	var dmcontact2_phone_label = slct_dmcontact2_phone_type.options[slct_dmcontact2_phone_type.selectedIndex].text;
	var	dmcontact2_phone_type = slct_dmcontact2_phone_type.options[slct_dmcontact2_phone_type.selectedIndex].value;


	var slct_dmcontact2_mobilecarrier_id = document.getElementById("dmcontact2_mobilecarrier_id");
	var dmcontact2_mobilecarrier_label = slct_dmcontact2_mobilecarrier_id.options[slct_dmcontact2_mobilecarrier_id.selectedIndex].text;
	var	dmcontact2_mobilecarrier_id = slct_dmcontact2_mobilecarrier_id.options[slct_dmcontact2_mobilecarrier_id.selectedIndex].value;



	var company = $('input#company').val();
	var company_legalname = $('input#company_legalname').val();

	var slct_dealer_type_id = document.getElementById("dealer_type_id");
	var dealer_type_id_label = slct_dealer_type_id.options[slct_dealer_type_id.selectedIndex].text;
	var dealer_type_id = slct_dealer_type_id.options[slct_dealer_type_id.selectedIndex].value;

	var slct_dealer_stillopenclose = document.getElementById("dealer_stillopenclose");
	var dealer_stillopenclose_label = slct_dealer_stillopenclose.options[slct_dealer_stillopenclose.selectedIndex].text;
	var dealer_stillopenclose = slct_dealer_stillopenclose.options[slct_dealer_stillopenclose.selectedIndex].value;

	var website = $('input#website').val();
	
	var finance_primary_name = $('input#finance_primary_name').val();
	
	var finance = $('input#finance').val();

	var finance_contact = $('input#finance_contact').val();

	var finance_contact_email = $('input#finance_contact_email').val();



	
	var sales = $('input#sales').val();

	var sales_contact = $('input#sales_contact').val();

	var sales_email = $('input#sales_email').val();
	var phone = $('input#phone').val();
	var fax = $('input#fax').val();
	var address = $('input#address').val();
	var city = $('input#city').val();

	var slct_state = document.getElementById("state");
	var state_label = slct_state.options[slct_state.selectedIndex].text;
	var state = slct_state.options[slct_state.selectedIndex].value;

	
	var zip = $('input#zip').val();
	var home_html = $('input#home').val();
	var about_html = $('input#about').val();
	var directions_html = $('input#directions').val();
	var contactus = $('input#contactus').val();
	var mapurl = $('input#mapurl').val();
	var mapframe = $('input#mapframe').val();
	var slogan = $('input#slogan').val();
	var disclaimer = $('input#disclaimer').val();
	var newmatrixcredit_vgoodcredit = $('input#newmatrixcredit_vgoodcredit').val();
	var newmatrixcredit_jgoodcredit = $('input#newmatrixcredit_jgoodcredit').val();
	var newmatrixcredit_faircredit = $('input#newmatrixcredit_faircredit').val();
	var newmatrixcredit_poorcredit = $('input#newmatrixcredit_poorcredit').val();
	var newmatrixcredit_subprime = $('input#newmatrixcredit_subprime').val();
	var newmatrixcredit_unknown = $('input#newmatrixcredit_unknown').val();
	var usedmatrixcredit_vgoodcredit = $('input#usedmatrixcredit_vgoodcredit').val();
	var usedmatrixcredit_jgoodcredit = $('input#usedmatrixcredit_jgoodcredit').val();
	var usedmatrixcredit_faircredit = $('input#usedmatrixcredit_faircredit').val();
	var usedmatrixcredit_poorcredit = $('input#usedmatrixcredit_poorcredit').val();

	var usedmatrixcredit_subprime = $('input#usedmatrixcredit_subprime').val();
	var usedmatrixcredit_unknown = $('input#usedmatrixcredit_unknown').val();
	var settingDefaultAPR = $('input#settingDefaultAPR').val();
	var settingDefaultTerm = $('input#settingDefaultTerm').val();
	var settingSateSlsTax = $('input#settingSateSlsTax').val();
	var settingDocDlvryFee = $('input#settingDocDlvryFee').val();
	var settingTitleFee = $('input#settingTitleFee').val();
	var settingStateInspectnFee = $('input#settingStateInspectnFee').val();



				
	var dlr_geo_latitude  =	$('input#dlr_geo_latitude').val();
	var dlr_geo_longitude =	$('input#dlr_geo_longitude').val();
	var dlr_ok_googlemp   =	$('input#dlr_ok_googlemp').val();


	var slct_wfh_dealer_type = document.getElementById("wfh_dealer_type_id");
	var wfh_dealer_type_label = slct_wfh_dealer_type.options[slct_wfh_dealer_type.selectedIndex].text;
	var wfh_dealer_type_id = slct_wfh_dealer_type.options[slct_wfh_dealer_type.selectedIndex].value;
	
	var slct_dealer_chat = document.getElementById("dealer_chat");
	var dealer_chat_label = slct_dealer_chat.options[slct_dealer_chat.selectedIndex].text;
	var dealer_chat = slct_dealer_chat.options[slct_dealer_chat.selectedIndex].value;


	var slct_fuel_pump_display = document.getElementById("fuel_pump_display");
	var fuel_pump_display_label = slct_fuel_pump_display.options[slct_fuel_pump_display.selectedIndex].text;
	var fuel_pump_display = slct_fuel_pump_display.options[slct_fuel_pump_display.selectedIndex].value;

	var slct_dcommercial_youtube_onoff = document.getElementById("dcommercial_youtube_onoff");
	var dcommercial_youtube_onoff_label = slct_dcommercial_youtube_onoff.options[slct_dcommercial_youtube_onoff.selectedIndex].text;
	var dcommercial_youtube_onoff = slct_dcommercial_youtube_onoff.options[slct_dcommercial_youtube_onoff.selectedIndex].value;

	var craigslist_nickname = $('input#craigslist_nickname').val();
	var metaDescription = $('input#metaDescription').val();
	var metaKeywords = $('input#metaKeywords').val();

	var slct_showPricing = document.getElementById("showPricing");
	var showPricing_label = slct_showPricing.options[slct_showPricing.selectedIndex].text;
	var showPricing_id = slct_showPricing.options[slct_showPricing.selectedIndex].value;
	
	var slct_showMileage = document.getElementById("showMileage");
	var showMileage_label = slct_showMileage.options[slct_showMileage.selectedIndex].text;
	var showMileage = slct_showMileage.options[slct_showMileage.selectedIndex].value;


	var mapframe = $('input#mapframe').val();

	var slct_dealer_listingindex_displayprice = document.getElementById("dealer_listingindex_displayprice");
	var dealer_listingindex_displayprice_label = slct_dealer_listingindex_displayprice.options[slct_dealer_listingindex_displayprice.selectedIndex].text;
	var dealer_listingindex_displayprice = slct_dealer_listingindex_displayprice.options[slct_dealer_listingindex_displayprice.selectedIndex].value;
	

	console.log('email_systm_templates_body: '+email_systm_templates_body);


	$.post('script_update_dlrprospect.only.php', {
		   	dudesid: dudesid,
			dudes1_id: dudes1_id,
			dudes2_id: dudes2_id,
		    prospctdlrid:  prospctdlrid,
			company: company,
			company_legalname: company_legalname,
			dealer_type_id: dealer_type_id,
			dealer_type_id_label: dealer_type_id_label,
			dealer_stillopenclose_label: dealer_stillopenclose_label,
			dealer_stillopenclose:  dealer_stillopenclose,
			contact: contact,
			contact_title: contact_title,
			contact_phone: contact_phone,
			contact_phone_label: contact_phone_label,
			contact_mobilecarrier_id: contact_mobilecarrier_id,
			contact_mobilecarrier_label: contact_mobilecarrier_label,
			dmcontact2: dmcontact2,
			dmcontact2_title: dmcontact2_title,
			dmcontact2_phone: dmcontact2_phone,
			dmcontact2_phone_label: dmcontact2_phone_label,
			dmcontact2_phone_type: dmcontact2_phone_type,
			dmcontact2_mobilecarrier_id: dmcontact2_mobilecarrier_id,
			dmcontact2_mobilecarrier_label: dmcontact2_mobilecarrier_label,
			website: website,
			finance_primary_name: finance_primary_name,
			finance: finance,
			finance_contact: finance_contact,
			finance_contact_email: finance_contact_email,
			sales: sales,
			sales_contact: sales_contact,
			sales_email: sales_email,
			phone: phone,
			fax: fax,
			address: address,
			city: city,
			state: state,
			zip: zip,
			home_html: home_html,
			about_html: about_html,
			directions_html: directions_html,
			contactus: contactus,
			mapurl: mapurl,
			mapframe: mapframe,
			slogan: slogan,
			disclaimer: disclaimer,
			newmatrixcredit_vgoodcredit: newmatrixcredit_vgoodcredit,
			newmatrixcredit_jgoodcredit: newmatrixcredit_jgoodcredit,
			newmatrixcredit_faircredit :newmatrixcredit_faircredit,
			newmatrixcredit_poorcredit: newmatrixcredit_poorcredit,
			newmatrixcredit_subprime: newmatrixcredit_subprime,
			newmatrixcredit_unknown: newmatrixcredit_unknown,
			usedmatrixcredit_vgoodcredit: usedmatrixcredit_vgoodcredit,
			usedmatrixcredit_jgoodcredit: usedmatrixcredit_jgoodcredit,
			usedmatrixcredit_faircredit: usedmatrixcredit_faircredit,
			usedmatrixcredit_poorcredit: usedmatrixcredit_poorcredit,
			usedmatrixcredit_subprime: usedmatrixcredit_subprime,
			usedmatrixcredit_unknown: usedmatrixcredit_unknown,
			settingDefaultAPR: settingDefaultAPR,
			settingDefaultTerm: settingDefaultTerm,
			settingSateSlsTax: settingSateSlsTax,
			settingDocDlvryFee: settingDocDlvryFee,
			settingTitleFee: settingTitleFee,
			settingStateInspectnFee: settingStateInspectnFee,
			dlr_geo_latitude: dlr_geo_latitude,
			dlr_geo_longitude: dlr_geo_longitude,
			dlr_ok_googlemp: dlr_ok_googlemp,
			wfh_dealer_type_id: wfh_dealer_type_id,
			wfh_dealer_type_label: wfh_dealer_type_label,
			dealer_chat: dealer_chat,
			dealer_chat_label: dealer_chat_label,
			fuel_pump_display_label: fuel_pump_display_label,
			fuel_pump_display: fuel_pump_display,
			dcommercial_youtube_onoff_label: dcommercial_youtube_onoff_label,
			craigslist_nickname: craigslist_nickname,
			metaDescription: metaDescription,
			metaKeywords: metaKeywords,
			showPricing_label: showPricing_label,
			showPricing_id: showPricing_id,
			showMileage_label: showMileage_label,
			showMileage: showMileage,
			mapframe: mapframe,
			dealer_listingindex_displayprice_label: dealer_listingindex_displayprice_label,
			dealer_listingindex_displayprice: dealer_listingindex_displayprice,
			prospect_dealer_email: prospect_dealer_email,
			prospect_dealer_password: prospect_dealer_password
			
		}, function(data){
			
			
			console.log(data);
			
			
		}); <!-- end data  function from ajax post-->

}