// JavaScript Document
$(document).ready(function(){




$('input#website').on('change', function(){

var website_input = $(this).val();
	console.log('Changed from:'+website_input);

var res = website_input.replace("http:", "");
var res = res.replace("https://", "");
var res = res.replace("http://", "");
var res = res.replace("www.", "");

	console.log('Changed to:'+res);
	$('input#website').val(res);

});


$('button#email_prospectdlr').on('click', function(data){
		

	$('input#prospect_dealer_email').val();

		// Makes The Modal For Dealer Prospect To Be Static And Open
		$('#emailProspectDlrModal').modal({
				  backdrop:'static',
				  keyboard:false,
				  show:true
		});
		



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


		





$('button#add_prospectanyway').on('click', function(){


	$('select#dudes2_id').val('1');

	$('div#prospect_create_anyway').show();
	$('div#contact_add_box').show();

	//$('div#view_dealerprospect_results').hide();
	$('button#add_prospectanyway').hide();

	create_prospectanyway();

});



		$('button#search_prospectfirst').on('click', function(){
				
				
				console.log('Searching For Prospect First');
				
				
				pull_similarprospects();
				console.log('Loaded Ajax Results');
				
		});



		$('button#create_prospectanyway').on('click', function(){
				
				
				
				create_prospectanyway();
				
		});







});



//This first pull the prospect
function pull_similarprospects() {




	console.log('pull_similarprospects(): Activated');
	
	var token = $('input#dudes_secret_token').val();
	var thisdudesid = $('input#thisdudesid').val();
	var dudes_skillset_id = $('input#dudes_skillset_id').val();
	var howmanydefinets = $('input#howmanydefinets').val();
	var howmanyresults = $('input#howmanyresults').val();
	var madeprospect_id = $('input#madeprospect_id').val();


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

	var website = $('input#website').val();
	
	var finance_primary_name = $('input#finance_primary_name').val();
	
	var finance = $('input#finance').val();

	var finance_contact = $('input#finance_contact').val();

	var finance_contact_email = $('input#finance_contact_email').val();



	
	var sales = $('input#sales').val();

	var sales_contact = $('input#sales_contact').val();

	var sales_email = $('input#sales_email').val();
	var dealer_email = $('input#dealer_email').val();
	var dealer_password = $('input#dealer_password').val();
	var phone = $('input#phone').val();
	var fax = $('input#fax').val();
	var address = $('input#address').val();
	var city = $('input#city').val();

	var slct_state = document.getElementById("state");
	var state_label = slct_state.options[slct_state.selectedIndex].text;
	var state = slct_state.options[slct_state.selectedIndex].value;

	
	var zip = $('input#zip').val();



	console.log('script_ajax_prospect.search.results.php Activated');
	
$.post('script_ajax_prospect.search.results.php', {
				token: token,
				thisdudesid: thisdudesid,
				dudes_skillset_id: dudes_skillset_id,
				howmanydefinets: howmanydefinets,
				howmanyresults: howmanyresults,
				madeprospect_id: madeprospect_id,
				dudes1_id: dudes1_id,
				dudes2_id: dudes2_id,
				prospctdlrid:  prospctdlrid,
				company: company,
				company_legalname: company_legalname,
				dealer_type_id: dealer_type_id,
				dealer_type_id_label: dealer_type_id_label,
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
				dealer_email: dealer_email,
				dealer_password: dealer_password,
				phone: phone,
				fax: fax,
				address: address,
				city: city,
				state: state,
				zip: zip
	   }, function(data){
	
	
			console.log('Data Results From Search'+data);
			
			$('div#ajax_prospect_search_results').html(data);

			$('div#view_dealerprospect_results').show();

			$('button#add_prospectanyway').show();



});




}


//This will create regardless of the fact
function create_prospectanyway() {

		var token = $('input#dudes_secret_token').val();
		console.log('token'+token);
		var thisdudesid = $('input#thisdudesid').val();
		var dudes_skillset_id = $('input#dudes_skillset_id').val();
	   var  howmanydefinets = $('input#howmanydefinets').val();
	   var  howmanyresults = $('input#howmanyresults').val();
	   var  madeprospect_id = $('input#madeprospect_id').val();


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

	var website = $('input#website').val();
	
	var finance_primary_name = $('input#finance_primary_name').val();
	
	var finance = $('input#finance').val();

	var finance_contact = $('input#finance_contact').val();

	var finance_contact_email = $('input#finance_contact_email').val();



	
	var sales = $('input#sales').val();

	var sales_contact = $('input#sales_contact').val();

	var sales_email = $('input#sales_email').val();

	var dealer_email = $('input#dealer_email').val();
	var dealer_password = $('input#dealer_password').val();
	
	
	var phone = $('input#phone').val();
	var fax = $('input#fax').val();
	var address = $('input#address').val();
	var city = $('input#city').val();

	var slct_state = document.getElementById("state");
	var state_label = slct_state.options[slct_state.selectedIndex].text;
	var state = slct_state.options[slct_state.selectedIndex].value;

	
	var zip = $('input#zip').val();

	var dlr_geo_latitude  =	$('input#dlr_geo_latitude').val();
	var dlr_geo_longitude =	$('input#dlr_geo_longitude').val();
	var dlr_ok_googlemp   =	$('input#dlr_ok_googlemp').val();


$.post('script_ajaxcreate_dealer_prospect.php', {
				token: token,
				thisdudesid: thisdudesid,
				dudes1_id: dudes1_id,
				dudes2_id: dudes2_id,
				dudes_skillset_id: dudes_skillset_id,
				howmanydefinets: howmanydefinets,
				howmanyresults: howmanyresults,
				madeprospect_id: madeprospect_id,
				dudes1_id: dudes1_id,
				dudes2_id: dudes2_id,
				prospctdlrid:  prospctdlrid,
				company: company,
				company_legalname: company_legalname,
				dealer_type_id: dealer_type_id,
				dealer_type_id_label: dealer_type_id_label,
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
				dealer_email: dealer_email,
				dealer_password: dealer_password,
				phone: phone,
				fax: fax,
				address: address,
				city: city,
				state: state,
				zip: zip,
				dlr_geo_latitude: dlr_geo_latitude,
				dlr_geo_longitude: dlr_geo_longitude,
				dlr_ok_googlemp: dlr_ok_googlemp

	   }, function(data){
	
	// http://stackoverflow.com/questions/503093/how-do-i-redirect-to-another-page-in-jquery
	
			console.log('Data Results Creating Anyway'+data);
			
			$('div#prospect_search_results_hook').html(data);
	
	
	
});






}