// JavaScript Document
$(document).ready(function(){

	$('button#save_account_settings').on('click', function(){
				
				
				
				save_account_settings();
				
		
	});
		
});




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

var fax = $('input#fax').val();
var accts_payables_name = $('input#accts_payables_name').val();
var accts_payables_email = $('input#accts_payables_email').val();


		var slct_settingCurrency = document.getElementById('settingCurrency');
		var settingCurrency = slct_settingCurrency.options[slct_settingCurrency.selectedIndex].value;
		var settingCurrency_name = slct_settingCurrency.options[slct_settingCurrency.selectedIndex].text;

		var slct_dealerTimezone = document.getElementById('dealerTimezone');
		var dealerTimezone = slct_dealerTimezone.options[slct_dealerTimezone.selectedIndex].value;
		var dealerTimezone_name = slct_dealerTimezone.options[slct_dealerTimezone.selectedIndex].text;



var dlr_ok_googlemp = $('input#dlr_ok_googlemp').val();
var dlr_geo_latitude = $('input#dlr_geo_latitude').val();
var dlr_geo_longitude = $('input#dlr_geo_longitude').val();



$.post('script_update_account.php', {thisdid: thisdid, company: company, company_legalname: company_legalname, contact: contact, dealer_type_id: dealer_type_id, contact_title: contact_title, dmcontact2: dmcontact2, dmcontact2_title: dmcontact2_title, address: address, city: city, state: state, zip: zip, phone: phone, fax:fax, accts_payables_name: accts_payables_name, accts_payables_email: accts_payables_email, settingCurrency: settingCurrency, dealerTimezone: dealerTimezone, dlr_geo_latitude: dlr_geo_latitude, dlr_geo_longitude: dlr_geo_longitude, dlr_ok_googlemp: dlr_ok_googlemp}, function(data){ 
																																																																																																																																																																																																																																																																																																																					  //console.log(data); 
																																																																																																																																																																																																																																																																																																																					  });
		//console.log('data: '+data);

}