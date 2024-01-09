// JavaScript Document
$(document).ready(function(){

	$('button#save_dealmatrix_settings').on('click', function(){
				
				
				
				save_dealmatrix_settings();
				
		
	});
	
	$('button#save_signature_btn').on('click', function(){
		console.log('imageView saved');
		$('button#save_signature_btn').prop('disabled', true);
	});
		
});




function save_dealmatrix_settings(){

var thisdid = $('input#thisdid').val();
var usedmatrixcredit_vgoodcredit = $('input#usedmatrixcredit_vgoodcredit').val();
var usedmatrixcredit_jgoodcredit = $('input#usedmatrixcredit_jgoodcredit').val();
var usedmatrixcredit_faircredit = $('input#usedmatrixcredit_faircredit').val();
var usedmatrixcredit_poorcredit = $('input#usedmatrixcredit_poorcredit').val();
var usedmatrixcredit_subprime = $('input#usedmatrixcredit_subprime').val();
var usedmatrixcredit_unknown = $('input#usedmatrixcredit_unknown').val();
var usedmatrixcredit_fminimumprofit = $('input#usedmatrixcredit_fminimumprofit').val();
var usedmatrixcredit_bminimumprofit = $('input#usedmatrixcredit_bminimumprofit').val();

var newmatrixcredit_vgoodcredit = $('input#newmatrixcredit_vgoodcredit').val();
var newmatrixcredit_jgoodcredit = $('input#newmatrixcredit_jgoodcredit').val();
var newmatrixcredit_faircredit = $('input#newmatrixcredit_faircredit').val();
var newmatrixcredit_poorcredit = $('input#newmatrixcredit_poorcredit').val();
var newmatrixcredit_subprime = $('input#newmatrixcredit_subprime').val();
var newmatrixcredit_unknown = $('input#newmatrixcredit_unknown').val();
var newmatrixcredit_fminimumprofit = $('input#newmatrixcredit_fminimumprofit').val();
var newmatrixcredit_bminimumprofit = $('input#newmatrixcredit_bminimumprofit').val();

var settingDefaultTerm = $('input#settingDefaultTerm').val();
var settingDefaultAPR = $('input#settingDefaultAPR').val();
var settingSateSlsTax = $('input#settingSateSlsTax').val();
var settingDocDlvryFee = $('input#settingDocDlvryFee').val();
var settingTitleFee = $('input#settingTitleFee').val();
var settingStateInspectnFee = $('input#settingStateInspectnFee').val();


$.post('script_update_dealmatrix.php', {thisdid: thisdid, usedmatrixcredit_vgoodcredit: usedmatrixcredit_vgoodcredit, usedmatrixcredit_jgoodcredit: usedmatrixcredit_jgoodcredit, usedmatrixcredit_faircredit: usedmatrixcredit_faircredit, usedmatrixcredit_poorcredit: usedmatrixcredit_poorcredit, usedmatrixcredit_subprime: usedmatrixcredit_subprime, usedmatrixcredit_unknown: usedmatrixcredit_unknown, usedmatrixcredit_fminimumprofit: usedmatrixcredit_fminimumprofit, usedmatrixcredit_bminimumprofit: usedmatrixcredit_bminimumprofit, newmatrixcredit_vgoodcredit:newmatrixcredit_vgoodcredit, newmatrixcredit_jgoodcredit: newmatrixcredit_jgoodcredit, newmatrixcredit_faircredit: newmatrixcredit_faircredit, newmatrixcredit_poorcredit: newmatrixcredit_poorcredit, newmatrixcredit_subprime: newmatrixcredit_subprime, newmatrixcredit_unknown: newmatrixcredit_unknown, newmatrixcredit_fminimumprofit: newmatrixcredit_fminimumprofit, newmatrixcredit_bminimumprofit: newmatrixcredit_bminimumprofit, settingDefaultTerm: settingDefaultTerm, settingDefaultAPR: settingDefaultAPR, settingSateSlsTax: settingSateSlsTax, settingDocDlvryFee: settingDocDlvryFee, settingTitleFee:settingTitleFee, settingStateInspectnFee: settingStateInspectnFee}, function(data){ 
																																																																																																																																																																																																																																																																																																																					  console.log(data); 
																																																																																																																																																																																																																																																																																																																					  });


}




function save_dealmatrix_signature(){
}