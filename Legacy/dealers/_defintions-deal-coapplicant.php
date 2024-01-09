<?php

//Cp Applicant Signatures
			$coappdigitalsignature = '';  //$row_creditapp_id_did['coapplicant_digital_signature'];
			$coappdigitalsignaturedate = '';  //$row_creditapp_id_did['coapplicant_digital_signature_date'];
			$coappauthorizeinitial = '';  //$row_creditapp_id_did['co_applicant_hereby_authorize'];
			$coappequalcreditact = '';  //$row_creditapp_id_did['co_equal_credit_opportunity_act'];



//Name Full
$coappfulltitlename = $row_qryDeal['customer2_title']; //$row_creditapp_id_did['co_applicant_titlename'];

//Names Seperated
$coapplname = $row_qryDeal['customer2_lname']; //$row_creditapp_id_did['co_applicant_lname'];
$coappfname = $row_qryDeal['customer2_fname']; //$row_creditapp_id_did['co_applicant_fname'];
$coappmname = $row_qryDeal['customer2_mname']; //$row_creditapp_id_did['co_applicant_lname'];

$coappFULLNAME = "$appjointorindividual $coappfname $coappmname $coapplname";
$coappfullnamefml =  $coappFULLNAME;


//Co App Socials
$coappsocial = $row_qryDeal['customer2_ssn']; //$row_creditapp_id_did['co_applicant_ssn'];
$coappsocial2 = '';  //$row_creditapp_id_did['co_applicant_ssn4'];

//Co Applicant Emails
$coappemail = $row_qryDeal['customer2_email']; //$row_creditapp_id_did['co_applicant_email'];
$coappbusinessemail = $row_qryDeal['customer2_email']; //$row_creditapp_id_did['co_applicant_email2'];

//Standard Definitions
$coappsuffix = $row_qryDeal['customer_suffix']; //$row_creditapp_id_did['co_applicant_suffixname'];
$coappdob = $row_qryDeal['customer2_dob']; //$row_creditapp_id_did['co_applicant_dob'];
	
		$coappage = '';  //$row_creditapp_id_did['co_applicant_age'];

$coappaddrs = $row_qryDeal['customer2_home_addr1'];  // $row_creditapp_id_did['co_applicant_present_addr1'];
$coappaddrs2 = $row_qryDeal['customer2_home_addr2'];  // $row_creditapp_id_did['co_applicant_present_addr2'];

$coappaddrslyrs = $row_qryDeal['customer2_home_live_years']; //$row_creditapp_id_did['co_applicant_present_addr_live_years'];
$coappaddrslmos = $row_qryDeal['customer2_home_live_months']; //$row_creditapp_id_did['co_applicant_present_addr_live_months'];
$coappdriverlcno = $row_qryDeal['customer2_dlno']; //$row_creditapp_id_did['co_applicant_driver_licenses_no'];
$coappdriverlcst = $row_qryDeal['customer2_dlstate']; //$row_creditapp_id_did['co_applicant_driver_licenses_state'];

			$coappdriverlcstatus = '';  //$row_creditapp_id_did['co_applicant_driver_licenses_status'];
			
$coappcity = $row_qryDeal['customer2_home_city']; //$row_creditapp_id_did['co_applicant_present_addr_city'];
$coappcounty = $row_qryDeal['customer2_home_county']; //$row_creditapp_id_did['co_applicant_present_addr_county'];
$coappstate = $row_qryDeal['customer2_dlstate']; //$row_creditapp_id_did['co_applicant_present_addr_state'];
$coappzip = $row_qryDeal['customer2_home_zip']; //$row_creditapp_id_did['co_applicant_present_addr_zip'];

			$coappprevaddr = '';  //$row_creditapp_id_did['co_applicant_previous1_addr1'];
			$coappprevaddr2 = '';  //$row_creditapp_id_did['co_applicant_previous1_addr2'];
			$coappprevaddrcity = '';  //$row_creditapp_id_did['co_applicant_previous1_addr_city'];
			$coappprevaddrcounty = '';  //$row_creditapp_id_did['co_applicant_present_addr_county'];
			$coappprevaddrstate = '';  //$row_creditapp_id_did['co_applicant_previous1_addr_state'];
			$coappprevaddrzip = '';  //$row_creditapp_id_did['co_applicant_previous1_addr_zip'];
			$coappprevaddrlyrs = '';  //$row_creditapp_id_did['co_applicant_previous1_live_years'];
			$coappprevaddrlmos = '';  //$row_creditapp_id_did['co_applicant_previous1_live_months'];

$coapphomephno = $row_qryDeal['customer2_phoneno']; //$row_creditapp_id_did['co_applicant_home_phone'];
$coappcellphno = $row_qryDeal['customer2_cellphone']; //$row_creditapp_id_did['co_applicant_cell_phone'];

			$coappeducation = '';  //$row_creditapp_id_did['co_applicant_employment_type'];
			$coappworktitle = '';  //$row_creditapp_id_did['co_applicant_employer_position'];
			$coappworkstatus = '';  //$row_creditapp_id_did['co_applicant_employment_status'];
			$coappworktype = '';  //$row_creditapp_id_did['co_applicant_employment_type'];

$coappemployernm = $row_qryDeal['customer2_employer_name']; //$row_creditapp_id_did['co_applicant_employer_name'];
$coappemployeraddr = $row_qryDeal['customer2_employer_addr1']; //$row_creditapp_id_did['co_applicant_employer_addr'];
$coappemployeraddr2 = $row_qryDeal['customer2_employer_addr2']; //$row_creditapp_id_did['co_applicant_employer_addr2'];
$coappemployercity = $row_qryDeal['customer2_employer_city']; //$row_creditapp_id_did['co_applicant_employer_city'];
$coappemployerst = $row_qryDeal['customer2_employer_state']; //$row_creditapp_id_did['co_applicant_employer_state'];
$coappemployerzip = $row_qryDeal['customer2_employer_zip']; //$row_creditapp_id_did['co_applicant_employer_zip'];
$coappemployerphno = $row_qryDeal['customer2_employer_phone']; //$row_creditapp_id_did['co_applicant_employer_phone'];
$coappemployerext = $row_qryDeal['customer2_supervisors_phone_ext']; //$row_creditapp_id_did['co_applicant_employer_phone_ext'];
			
			$coappemployerdept = ''; //$row_creditapp_id_did['co_applicant_employer_department'];
			
$coappemployersupervisr = $row_qryDeal['customer2_supervisors_name'];   //$row_creditapp_id_did['co_applicant_employer_supervisor_name'];
$coappemployersupervisrphn = $row_qryDeal['customer2_supervisors_phone']; //$row_creditapp_id_did['co_applicant_employer_supervisor_phone'];

			$coappemployerhrshft = '';  //$row_creditapp_id_did['co_applicant_employer_hours'];
			
$coappemployerwkyrs = $row_qryDeal['customer2_employer_years'];  //$row_creditapp_id_did['co_applicant_employer_work_years'];
$coappemployerwkmos = $row_qryDeal['customer2_employer_months'];  //$row_creditapp_id_did['co_applicant_employer_work_months'];

			$coappemployer2nm = '';  //$row_creditapp_id_did['co_applicant_employer2_name'];
			$coappemployer2title = '';  //$row_creditapp_id_did['co_applicant_employer2_position'];
			$coappemployer2phno = '';  //$row_creditapp_id_did['co_applicant_employer2_phone'];
			$coappemployer2wkyrs = '';  //$row_creditapp_id_did['co_applicant_employer2_work_years'];
			$coappemployer2wkmos = '';  //$row_creditapp_id_did['co_applicant_employer2_work_months'];
			$coappemployer2addr = '';  //$row_creditapp_id_did['co_applicant_employer2_addr'];
			$coappemployer2addr2 = '';  //$row_creditapp_id_did['co_applicant_employer2_addr2'];
			$coappemployer2city = '';  //$row_creditapp_id_did['co_applicant_employer2_city'];
			$coappemployer2state = '';  //$row_creditapp_id_did['co_applicant_employer2_state'];
			$coappemployer2zip = '';  //$row_creditapp_id_did['co_applicant_employer2_zip'];

//Co Applicant Income
$coappgrossincome = $row_qryDeal['customer2_gross_income'];  //$row_creditapp_id_did['co_applicant_income_bringhome'];
$coappgrossincomefreq = $row_qryDeal['customer2_income_frequency']; //$row_creditapp_id_did['co_applicant_payday_frequency'];

			$coappotherincome = '';  //$row_creditapp_id_did['co_applicant_other_income_amount'];
			$coappotherincomesrc = '';  //$row_creditapp_id_did['co_applicant_income_source'];
			$coappotherincomefreq = '';  //$row_creditapp_id_did['co_applicant_other_income_when_rcvd'];
			$coappapartorhous = '';  //$row_creditapp_id_did['co_applicant_apart_or_house'];
			$coappresidencetype = '';  //$row_creditapp_id_did['co_applicant_buy_own_rent_other'];
			$coapplandlordname = '';  //$row_creditapp_id_did['co_applicant_addr_landlord_mortg'];
			$coapplandlordphonno = '';  //$row_creditapp_id_did['co_applicant_addr_landlord_mortgphoneno'];

			$coappalimonyamount = '';  //$row_creditapp_id_did['coapplicant_alimonyamt'];

//Co Applicant Mortage Information
			$coapprentmortpymt = '';  //$row_creditapp_id_did['co_applicant_house_payment'];
			$coappbankname = '';  //$row_creditapp_id_did['co_applicants_bank_name'];
			$coappbankacctype = '';  //$row_creditapp_id_did['co_applicants_checking_savings_type'];

//Co Applicant Bank References
			$coappcreditref1 = '';  //$row_creditapp_id_did['co_applicant_creditreference1'];
			$coappcreditref1bal = '';  //$row_creditapp_id_did['co_applicant_creditreference1bal'];
			$coappcreditref1mopy = '';  //$row_creditapp_id_did['co_applicant_creditreference1monpay'];
			$coappcreditref2 = '';  //$row_creditapp_id_did['co_applicant_creditreference2'];
			$coappcreditref2bal = '';  //$row_creditapp_id_did['co_applicant_creditreference2bal'];
			$coappcreditref2mopy = '';  //$row_creditapp_id_did['co_applicant_creditreference2monpay'];
			$coappautoloan = '';  //$row_creditapp_id_did['co_applicant_open_autoloan_cname'];
			$coappautoloanacct = '';  //$row_creditapp_id_did['co_applicant_open_autoloan_acctno'];
			$coappautoloanprebal = '';  //$row_creditapp_id_did['co_applicant_open_autoloan_presntbal'];
			$coappautoloanpaymt = '';  //$row_creditapp_id_did['co_applicant_open_autoloan_pymt'];
?>