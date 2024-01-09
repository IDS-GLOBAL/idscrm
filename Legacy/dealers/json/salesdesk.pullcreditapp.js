// JavaScript Document
$(document).ready(function(){

			$('a#pull_credit_app').on('click', function(){
				
				var enter_appno = $('input#creditAppno').val();
				var thisdid = $('input#thisdid').val();
				
				$('div#findCreditAppModal').modal({
				 	backdrop: 'static',
					keyboard: false
				});
				
				var vehicle_urlink = 'inventory.php?vstat=1';
				
				$("div#findCreditAppModal_body").load('' + vehicle_urlink + " #dealer_box", function() {
					$.getScript("js/custom/prospect.dealer.js");
					$.getScript("js/plugins/dropzone/dropzone.js");
					$.getScript("js/custom/page/dropzone.vehicleuploads.js");
	
	
					$('div#pick_aprospect_instate').hide();
					$('div#pick_aprospectdlr_towork').hide();
					$('div#work_aprospect_instate').show();
					$('div#sendtoregistered_que').show();
					$('button#bringup_finalactions').on('click', function(){
							$('div#work_aprospect_instate').hide();
							$('div#pick_aprospectdlr_towork').show();
							$('div#sendtoregistered_que').hide();
					});
				}).show();
				
			});




			$('button#pull_appno').click(function(){

				console.log('Clicked Pull AP');
				
				var enter_appno = $('input#creditAppno').val();
				var thisdid = $('input#thisdid').val();
				
				$.getJSON("script_json.salesdesk.pullcreditapp.php?enter_appno="+enter_appno+"&thisdid="+thisdid, function(data){

						console.log(data);

						console.log(data.return_status.length);
						
						
			

						if (data.return_status.length == 0) {
							
								console.log("No DATA!")
								
								$('div#pull_creditapp_handle').removeClass('has-success').addClass('has-error');
								alert('Sorry Application Not Found! Please Try Again');
								return false;
								
								
						}
						else {
							
  

								console.log("We Have DATA!")

								$(this).hide();
								
								$('div#pull_creditapp_handle').removeClass('has-error').addClass('has-success');

								
								$.each(data.return_status, function(obj){



console.log('return_status: '+this['return_status']);
console.log('credit_app_fullblown_id: '+this['credit_app_fullblown_id']);

$('input#credit_app_fullblown_id').val(this['credit_app_fullblown_id']);

console.log('credit_app_locked: '+this['credit_app_locked']);
console.log('app_deal_number: '+this['app_deal_number']);
console.log('applicant_did: '+this['applicant_did']);
console.log('applicant_sid: '+this['applicant_sid']);
console.log('applicant_sid_name: '+this['applicant_sid_name']);
console.log('applicant_sid2: '+this['applicant_sid2']);
console.log('applicant_sid2_name: '+this['applicant_sid2_name']);


if( this['applicant_sid'] != null){
	var applicant_sid = this['applicant_sid'];
	
	$('input#salesPerson1ID').val(applicant_sid);
	
}

if( this['applicant_sid_name'] != null){
	

	var applicant_sid_name = this['applicant_sid_name'];
	
	$('input#salesPerson1Name').val(applicant_sid_name);

}

if( this['applicant_sid2'] != null){
	

	var applicant_sid2 = this['applicant_sid2'];
	
	$('input#salesPerson2ID').val(applicant_sid2);

}

if( this['applicant_sid2_name'] != null){
	

	var applicant_sid2_name = this['applicant_sid2_name'];
	
	$('input#salesPerson2Name').val(applicant_sid2_name);

}



console.log('applicant_vid: '+this['applicant_vid']);
console.log('applicant_app_token: '+this['applicant_app_token']);
console.log('joint_or_invidividual: '+this['joint_or_invidividual']);
console.log('credit_app_type: '+this['credit_app_type']);
console.log('credit_app_source: '+this['credit_app_source']);
console.log('applicant_titlename: '+this['applicant_titlename']);
console.log('applicant_name: '+this['applicant_name']);
console.log('applicant_fname: '+this['applicant_fname']);
console.log('applicant_mname: '+this['applicant_mname']);
console.log('applicant_lname: '+this['applicant_lname']);
console.log('applicant_suffixname: '+this['applicant_suffixname']);
console.log('applicant_other_name: '+this['applicant_other_name']);

if(this['applicant_name'] == null){
	
	var applicant_titlename = this['applicant_titlename'];
	var applicant_fname = this['applicant_fname'];
	var applicant_mname = this['applicant_mname'];
	var applicant_lname = this['applicant_lname'];


	var applicant_name = applicant_titlename+' '+applicant_fname+' '+applicant_mname+ ' '+applicant_lname;

	}else{

	var applicant_name = this['applicant_name'];
	
	}

$('div#pullcredit_app_results').html(applicant_name);

console.log('applicant_email_address: '+this['applicant_email_address']);
console.log('applicant_email_address2: '+this['applicant_email_address2']);
console.log('co_applicants_email_address: '+this['co_applicants_email_address']);
console.log('co_applicant_titlename: '+this['co_applicant_titlename']);
console.log('co_applicant_name: '+this['co_applicant_name']);
console.log('co_applicant_fname: '+this['co_applicant_fname']);
console.log('co_applicant_mname: '+this['co_applicant_mname']);
console.log('co_applicant_lname: '+this['co_applicant_lname']);
console.log('applilcant_v_stockno: '+this['applilcant_v_stockno']);
console.log('applilcant_v_vin: '+this['applilcant_v_vin']);
console.log('applilcant_v_year: '+this['applilcant_v_year']);
console.log('applilcant_v_make: '+this['applilcant_v_make']);
console.log('applilcant_v_model: '+this['applilcant_v_model']);
console.log('applilcant_v_style: '+this['applilcant_v_style']);
console.log('applilcant_v_ymkmd_txt: '+this['applilcant_v_ymkmd_txt']);
console.log('applilcant_v_asset_type: '+this['applilcant_v_asset_type']);
console.log('applilcant_v_neworused: '+this['applilcant_v_neworused']);





console.log('applilcant_v_trade_year: '+this['applilcant_v_trade_year']);
console.log('applilcant_v_trade_make: '+this['applilcant_v_trade_make']);
console.log('applilcant_v_trade_model: '+this['applilcant_v_trade_model']);
console.log('applilcant_v_trade_vin: '+this['applilcant_v_trade_vin']);



console.log('applilcant_v_trade_owed: '+this['applilcant_v_trade_owed']);
console.log('applilcant_v_trade_lien_holder_name: '+this['applilcant_v_trade_lien_holder_name']);


console.log('applilcant_v_cashprice: '+this['applilcant_v_cashprice']);
console.log('applilcant_v_taxes: '+this['applilcant_v_taxes']);


console.log('applilcant_v_doc_fees: '+this['applilcant_v_doc_fees']);
console.log('title_lic_reg_other_fees: '+this['title_lic_reg_other_fees']);
console.log('applicant_desired_mo_payment: '+this['applicant_desired_mo_payment']);
console.log('applilcant_v_cash_down: '+this['applilcant_v_cash_down']);
console.log('applilcant_v_rebate: '+this['applilcant_v_rebate']);
console.log('applilcant_v_trade_allowance: '+this['applilcant_v_trade_allowance']);


console.log('applilcant_v_gap: '+this['applilcant_v_gap']);
console.log('applilcant_v_srvc_contract: '+this['applilcant_v_srvc_contract']);
console.log('applilcant_v_credit_life: '+this['applilcant_v_credit_life']);
console.log('applilcant_v_disability: '+this['applilcant_v_disability']);
console.log('applilcant_v_other_ins_svc: '+this['applilcant_v_other_ins_svc']);
console.log('applilcant_v_financed_amount: '+this['applilcant_v_financed_amount']);




console.log('applilcant_v_term_months: '+this['applilcant_v_term_months']);
console.log('applilcant_v_cust_rate: '+this['applilcant_v_cust_rate']);
console.log('applilcant_v_total_monthpmts_est: '+this['applilcant_v_total_monthpmts_est']);
console.log('applilcant_v_wholesale_invoice: '+this['applilcant_v_wholesale_invoice']);
console.log('applilcant_v_msrp: '+this['applilcant_v_msrp']);
console.log('applilcant_v_creditbureau_preferred: '+this['applilcant_v_creditbureau_preferred']);
console.log('credit_app_last_modified: '+this['credit_app_last_modified']);
console.log('application_created_date: '+this['application_created_date']);


	if(this['applilcant_v_cashprice'] != null){
		
		var applilcant_v_cashprice = parseFloat(this['applilcant_v_cashprice']).toFixed(2);

		$('input#priceVehicle').val(applilcant_v_cashprice);
	}

	if(this['applilcant_v_trade_year'] != null){
		var applilcant_v_trade_year = this['applilcant_v_trade_year'];		
		
			$('select#vTradeYr').val(applilcant_v_trade_year);
	}

	if(this['applilcant_v_trade_vin'] != null){
		
			$('input#vTradeVin').val(this['applilcant_v_trade_vin']);
	}
	
	if(this['applilcant_v_trade_owed'] != null){
		
			$('input#vTradePayOff').val(this['applilcant_v_trade_owed']);
	}



	if(this['applilcant_v_doc_fees'] != null){
	
		var deliveryFee  = parseFloat(this['applilcant_v_doc_fees']).toFixed(2);

		$('input#deliveryFee').val(deliveryFee);
		
		console.log('Using'+deliveryFee);

	
	}

	if(this['applicant_desired_mo_payment'] != null){
		
		var applicant_desired_mo_payment = this['applicant_desired_mo_payment'];
		
		// http://stackoverflow.com/questions/4937251/why-is-my-tofixed-function-not-working
		// value = parseFloat(value).toFixed(2);
		var applicant_desired_mo_payment = parseFloat(this['applicant_desired_mo_payment']).toFixed(2);



		console.log('applicant_desired_mo_payment: '+applicant_desired_mo_payment);
		
			
		$('span#applicant_desired_mo_payment_results').html('Desired Monthly Payments: '+applicant_desired_mo_payment);
	}


	if(this['applilcant_v_cash_down'] != null){
		
		//var applilcant_v_cash_down = this['applilcant_v_cash_down'];
		//var applilcant_v_cash_down = applilcant_v_cash_down.toFixed(2);
		
				var applilcant_v_cash_down = parseFloat(this['applilcant_v_cash_down']).toFixed(2);

		
		$('input#downPayment').val(applilcant_v_cash_down);
	}


	if(this['applilcant_v_term_months'] != null){
		var applilcant_v_term_months = this['applilcant_v_term_months'];		
		
		$('input#term').val(applilcant_v_term_months);
	}

	if(this['applilcant_v_cust_rate'] != null){
		var applilcant_v_cust_rate = this['applilcant_v_cust_rate'];		
		
		$('input#apr').val(applilcant_v_cust_rate);
	}

	if(this['applilcant_v_msrp'] != null){
		
		var applilcant_v_msrp = this['applilcant_v_msrp'];
		//var applilcant_v_msrp = applilcant_v_msrp.toFixed(2);
		
		$('input#msrp').val(applilcant_v_msrp);
	}









updateMysum();
console.log('Running Update Sum From Json');





















//End Json
								}); //End Json Final
				

			



						}


						//console.log(data.apply);
						//console.log('OBJ: '+obj);
							
							

				
				
				
				});
				
/*				
				
				$.ajax({
					type: "GET",
					url:  "json/pullstockvehicle.php",
					data: "enter_vstockno="+enter_vstockno+"&thisdid="+thisdid,
					dataType: "json",
					success: function(msg,string,jqXHR){
						
						console.log(msg.vid);
						console.log(msg.vstockno);
						
						$("div#pullvehicle_stock_results").html(msg+string+jqXHR);
					}
				});
*/				
				
				
			
			
			});





});