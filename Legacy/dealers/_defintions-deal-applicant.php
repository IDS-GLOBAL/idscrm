<?php


$appjointorindividual = $row_qryDeal['titleconjucation'];  //'Query Co-Signor'; //$row_creditapp_id_did['joint_or_invidividual'];
$appemail = $row_qryDeal['customer_email']; //$row_creditapp_id_did['applicant_email_address'];
$appbusinessemail = $row_qryDeal['customer_email']; //$row_creditapp_id_did['applicant_email_address2'];



$appdate = $timevar; //$row_creditapp_id_did['application_created_date'];

$appsocial = $row_qryDeal['customer_ssn']; //$row_creditapp_id_did['applicant_ssn'];
$appsocial2 = ''; //$row_creditapp_id_did['applicant_ssn4'];


$appfulltitlename =  $row_qryDeal['customer_title']; //$row_creditapp_id_did['applicant_titlename'].' ';



//Names Seperated
$applname = $row_qryDeal['customer_lname']; //$row_creditapp_id_did['applicant_lname'];
$appfname = $row_qryDeal['customer_fname']; //$row_creditapp_id_did['applicant_fname'];
$appmname = $row_qryDeal['customer_mname']; //$row_creditapp_id_did['applicant_mname'];



//Name Full
$appFULLNAME = "$appfname $appmname $applname";
$appfullnamefml =  $appFULLNAME;


//Standard Definitions
$appsuffix = $row_qryDeal['customer_suffix']; //$row_creditapp_id_did['applicant_suffixname'];
$appdob = $row_qryDeal['customer_dob']; //$row_creditapp_id_did['applicant_dob'];
		
		$appage = ''; //$row_creditapp_id_did['applicant_age'];

$appdriverlcno = $row_qryDeal['customer_dlno']; //$row_creditapp_id_did['applicant_driver_licenses_number'];
$appdriverlcst = $row_qryDeal['customer_dlstate']; //$row_creditapp_id_did['applicant_driver_state_issued'];
		
		$appdriverlcstatus = ''; //$row_creditapp_id_did['applicant_driver_licenses_status'];
		
$appaddrs = $row_qryDeal['customer_home_addr1'];  //$row_creditapp_id_did['applicant_present_address1'];
$appaddrs2 = $row_qryDeal['customer_home_addr2'];  //$row_creditapp_id_did['applicant_present_address1'];

$appaddrslyrs = $row_qryDeal['customer_home_live_years']; //$row_creditapp_id_did['applicant_addr_years'];
$appaddrslmos = $row_qryDeal['customer_home_live_months']; //$row_creditapp_id_did['applicant_addr_months'];
		
$appcity = $row_qryDeal['customer_home_city']; //$row_creditapp_id_did['applicant_present_addr_city'];
$appcounty = $row_qryDeal['customer_home_county']; //$row_creditapp_id_did['applicant_present_addr_county'];
$appstate = $row_qryDeal['customer_home_state']; //$row_creditapp_id_did['applicant_present_addr_state'];
$appzip = $row_qryDeal['customer_home_zip']; //$row_creditapp_id_did['applicant_present_addr_zip'];
$appprevaddr = $row_qryDeal['customer_home_addr1']; //$row_creditapp_id_did['applicant_previous1_addr1'];
$appprevaddr2 = $row_qryDeal['customer_home_addr2']; //$row_creditapp_id_did['applicant_previous1_addr2'];
$appprevaddrcity = $row_qryDeal['customer_home_city']; //$row_creditapp_id_did['applicant_previous1_addr_city'];

			$appprevaddrcounty = ''; //$row_creditapp_id_did['applicant_present_addr_county'];
			$appprevaddrstate = ''; //$row_creditapp_id_did['applicant_previous1_addr_state'];
			$appprevaddrzip = ''; //$row_creditapp_id_did['applicant_previous1_addr_zip'];
			$appprevaddrlyrs = ''; //$row_creditapp_id_did['applicant_previous1_live_years'];
			$appprevaddrlmos = ''; //$row_creditapp_id_did['applicant_previous1_live_months'];

$apphomephno = $row_qryDeal['customer_phoneno'];  //$row_creditapp_id_did['applicant_main_phone'];
$appcellphno = $row_qryDeal['customer_cellphone']; //$row_creditapp_id_did['applicant_cell_phone'];
		
		$appeducation = ''; //$row_creditapp_id_did['applicant_employment_type'];
		$appnodepndts = ''; //$row_creditapp_id_did['applicants_dependents_many'];
		
			$appworktitle = '';  //$row_creditapp_id_did['applicant_employer1_position'];
			$appworkstatus = ''; //$row_creditapp_id_did['applicant_employment_status'];
			$appworktype = ''; //$row_creditapp_id_did['applicant_employment_type'];
			
$appemployernm = $row_qryDeal['customer_employer_name'];  //$row_creditapp_id_did['applicant_employer1_name'];
$appemployeraddr = $row_qryDeal['customer_employer_addr1']; //$row_creditapp_id_did['applicant_employer1_addr'];
$appemployeraddr2 = $row_qryDeal['customer_employer_addr1'];  //$row_creditapp_id_did['applicant_employer1_addr2'];
$appemployercity = $row_qryDeal['customer_employer_city'];  //$row_creditapp_id_did['applicant_employer1_city'];
$appemployerst = $row_qryDeal['customer_employer_state']; //$row_creditapp_id_did['applicant_employer1_state'];
$appemployerzip = $row_qryDeal['customer_employer_zip']; //$row_creditapp_id_did['applicant_employer1_zip'];
$appemployerphno = $row_qryDeal['customer_employer_phone'];  //$row_creditapp_id_did['applicant_employer1_phone'];
	
	$appemployerext = $row_qryDeal['customer_supervisors_phone_ext']; //$row_creditapp_id_did['applicant_employer1_phone_ext'];
	$appemployerdept = '';  //$row_creditapp_id_did['applicant_employer1_department'];
	
$appemployersupervisr = $row_qryDeal['customer_supervisors_name'];  //$row_creditapp_id_did['applicant_employer1_supervisors_name'];
$appemployersupervisrphn = $row_qryDeal['customer_supervisors_phone'];  //$row_creditapp_id_did['applicant_employer1_supervisors_phone'];
		
		$appemployerhrshft = '';  //$row_creditapp_id_did['applicant_employer1_hours_shift'];

$appemployerwkyrs = $row_qryDeal['customer_employer_years']; //$row_creditapp_id_did['applicant_employer1_work_years'];
$appemployerwkmos = $row_qryDeal['customer_employer_months']; //$row_creditapp_id_did['applicant_employer1_work_months'];

		$appemployer2nm = '';  //$row_creditapp_id_did['applicant_employer2_name'];
		$appemployer2title = '';  //$row_creditapp_id_did['applicant_employer2_position'];
		$appemployer2phno = '';  //$row_creditapp_id_did['applicant_employer2_phone'];
		$appemployer2wkyrs = '';  //$row_creditapp_id_did['applicant_employer2_work_years'];
		$appemployer2wkmos = '';  //$row_creditapp_id_did['applicant_employer2_work_months'];
		$appemployer2addr = '';  //$row_creditapp_id_did['applicant_employer2_addr'];
		$appemployer2addr2 = '';  //$row_creditapp_id_did['applicant_employer2_addr2'];
		$appemployer2city = '';  //$row_creditapp_id_did['applicant_employer2_city'];
		$appemployer2state = '';  //$row_creditapp_id_did['applicant_employer2_state'];
		$appemployer2zip = '';  //$row_creditapp_id_did['applicant_employer2_zip'];
		
$appgrossincome = $row_qryDeal['customer_gross_income']; //$row_creditapp_id_did['applicant_employer1_salary_bringhome'];
$appgrossincomefreq = $row_qryDeal['customer_income_frequency'];  //$row_creditapp_id_did['applicant_employer1_payday_freq'];

		$appotherincome = '';  //$row_creditapp_id_did['applicant_other_income_amount'];
		$appotherincomesrc = '';  //$row_creditapp_id_did['applicant_other_income_source'];
		$appotherincomefreq = '';  //$row_creditapp_id_did['applicant_other_income_when_rcvd'];
		$appalimonyamount = '';  //$row_creditapp_id_did['applicant_alimonyamt'];
		$appresidencetype = '';  //$row_creditapp_id_did['applicant_buy_own_rent_other'];
		$applandlordname = '';  //$row_creditapp_id_did['applicant_previous1_landlord_name'];
		$applandlordphonno = '';  //$row_creditapp_id_did['applicant_previous1_landlord_name'];

//Creditors
		$apprentmortpymt = '';  //$row_creditapp_id_did['applicant_house_payment'];
		$appbankname = '';  //$row_creditapp_id_did['applicants_bank_name'];
		$appbankacctype = '';  //$row_creditapp_id_did['applicants_checking_savings_type'];
		$appcreditref1 = '';  //$row_creditapp_id_did['applicant_creditreference1'];
		$appcreditref1bal = '';  //$row_creditapp_id_did['applicant_creditreference1bal'];
		$appcreditref1mopy = '';  //$row_creditapp_id_did['applicant_creditreference1monpay'];
		$appcreditref2 = '';  //$row_creditapp_id_did['applicant_creditreference2'];
		$appcreditref2bal = '';  //$row_creditapp_id_did['applicant_creditreference2bal'];
		$appcreditref2mopy = '';  //$row_creditapp_id_did['applicant_creditreference2monpay'];
		$appautoloan = '';  //$row_creditapp_id_did['applicant_open_autoloan_cname'];
		$appautoloanacct = '';  //$row_creditapp_id_did['applicant_open_autoloan_acctno'];
		$appautoloanprebal = '';  //$row_creditapp_id_did['applicant_open_autoloan_presntbal'];
		$appautoloanpaymt = '';  //$row_creditapp_id_did['applicant_open_autoloan_pymt'];



//Signature Initals

		$appauthorizeinitial = '';  //$row_creditapp_id_did['applicant_hereby_authorize'];
		$appequalcreditact = '';  //$row_creditapp_id_did['equal_credit_opportunity_act'];
		
		$appinitialsdisc1 = '';  //$row_creditapp_id_did['applicant_initials_disclosure1'];
		$appinitialsdisc2 = '';  //$row_creditapp_id_did['applicant_initials_disclosure2'];
		
		//References Parents
		
		$appfathername = '';  //$row_creditapp_id_did['applicants_father_name'];
		$appfatherdeceased = '';  //$row_creditapp_id_did['applicants_father_deceased'];
		$appfatheraddr = '';  //$row_creditapp_id_did['applicants_father_address'];
		$appfatherphone =  '';  //$row_creditapp_id_did['applicants_father_mainphone_number'];
		
		$appmothername = '';  //$row_creditapp_id_did['applicants_mother_name'];
		$appmotherdeceased = '';  //$row_creditapp_id_did['applicants_mother_deceased'];
		$appmotheraddr = '';  //$row_creditapp_id_did['applicants_mother_address'];
		$appmotherphone = '';  //$row_creditapp_id_did['applicants_mother_mainphone_number'];
		
		//References 1-10 $row_creditapp_id_did[''];
		$appnearelativelname = '';  //$row_creditapp_id_did['applicants_realative1_lname'];
		$appnearelativefname = '';  //$row_creditapp_id_did['applicants_realative1_fname'];
		$appnearelativeaddr1 = '';  //$row_creditapp_id_did['applicants_realative1_address'];
		$appnearelativeaddr2 = '';  //$row_creditapp_id_did['applicants_realative1_address2'];
		$appnearelativecity = '';  //$row_creditapp_id_did['applicants_realative1_address_city'];
		$appnearelativestate = '';  //$row_creditapp_id_did['applicants_realative1_address_state'];
		$appnearelativezip = '';  //$row_creditapp_id_did['applicants_realative1_address_zip'];
		$appnearelativerelation = '';  //$row_creditapp_id_did['applicants_realative1_relationship'];
		$appnearelativephoneno = '';  //$row_creditapp_id_did['applicants_realative1_mainphone'];
		
		
		$appreference2lname = '';  //$row_creditapp_id_did['applicants_realative2_lname'];
		$appreference2fname = '';  //$row_creditapp_id_did['applicants_realative2_fname'];
		$appreference2addr1 = '';  //$row_creditapp_id_did['applicants_realative2_address'];
		$appreference2city = '';  //$row_creditapp_id_did['applicants_realative2_city'];
		$appreference2state = '';  //$row_creditapp_id_did['applicants_realative2_state'];
		$appreference2zip = '';  //$row_creditapp_id_did['applicants_realative2_zip'];
		$appreference2phoneno = '';  //$row_creditapp_id_did['applicants_realative2_mainphone'];
		$appreference2relation = '';  //$row_creditapp_id_did['applicants_realative2_relationship'];
		
		$appreference3lname = '';  //$row_creditapp_id_did['applicants_realative3_lname'];
		$appreference3fname = '';  //$row_creditapp_id_did['applicants_realative3_fname'];
		$appreference3addr1 = '';  //$row_creditapp_id_did['applicants_realative3_address'];
		$appreference3city = '';  //$row_creditapp_id_did['applicants_realative3_city'];
		$appreference3state = '';  //$row_creditapp_id_did['applicants_realative3_state'];
		$appreference3zip = '';  //$row_creditapp_id_did['applicants_realative3_zip'];
		$appreference3phoneno = '';  //$row_creditapp_id_did['applicants_realative3_mainphone'];
		$appreference3relation = '';  //$row_creditapp_id_did['applicants_realative3_relationship'];
		
		
		$appreference4lname = '';  //$row_creditapp_id_did['applicants_realative4_lname'];
		$appreference4fname = '';  //$row_creditapp_id_did['applicants_realative4_fname'];
		$appreference4addr1 = '';  //$row_creditapp_id_did['applicants_realative4_address'];
		$appreference4city = '';  //$row_creditapp_id_did['applicants_realative4_city'];
		$appreference4state = '';  //$row_creditapp_id_did['applicants_realative4_state'];
		$appreference4zip = '';  //$row_creditapp_id_did['applicants_realative4_zip'];
		$appreference4phoneno = '';  //$row_creditapp_id_did['applicants_realative4_mainphone_number'];
		$appreference4relation = '';  //$row_creditapp_id_did['applicants_realative4_relationship'];
		
		
		$appreference5lname = '';  //$row_creditapp_id_did['applicants_realative5_lname'];
		$appreference5fname = '';  //$row_creditapp_id_did['applicants_realative5_fname'];
		$appreference5addr1 = '';  //$row_creditapp_id_did['applicants_realative5_address'];
		$appreference5city = '';  //$row_creditapp_id_did['applicants_realative5_city'];
		$appreference5state = '';  //$row_creditapp_id_did['applicants_realative5_state'];
		$appreference5zip = '';  //$row_creditapp_id_did['applicants_realative5_zip'];
		$appreference5phoneno = '';  //$row_creditapp_id_did['applicants_realative5_mainphone_number'];
		$appreference5relation = '';  //$row_creditapp_id_did['applicants_realative5_relationship'];
		
		$appreference6lname = '';  //$row_creditapp_id_did['applicants_realative6_lname'];
		$appreference6fname = '';  //$row_creditapp_id_did['applicants_realative6_fname'];
		$appreference6addr1 = '';  //$row_creditapp_id_did['applicants_realative6_address'];
		$appreference6city = '';  //$row_creditapp_id_did['applicants_realative6_city'];
		$appreference6state = '';  //$row_creditapp_id_did['applicants_realative6_state'];
		$appreference6zip = '';  //$row_creditapp_id_did['applicants_realative6_zip'];
		$appreference6phoneno = '';  //$row_creditapp_id_did['applicants_realative6_mainphone'];
		$appreference6relation = '';  //$row_creditapp_id_did['applicants_realative6_relationship'];
		
		$appreference7lname = '';  //$row_creditapp_id_did['applicants_realative7_lname'];
		$appreference7fname = '';  //$row_creditapp_id_did['applicants_realative7_fname'];
		$appreference7addr1 = '';  //$row_creditapp_id_did['applicants_realative7_address'];
		$appreference7city = '';  //$row_creditapp_id_did['applicants_realative7_city'];
		$appreference7state = '';  //$row_creditapp_id_did['applicants_realative7_state'];
		$appreference7zip = '';  //$row_creditapp_id_did['applicants_realative6_zip'];
		$appreference7phoneno = '';  //$row_creditapp_id_did['applicants_realative7_mainphone'];
		$appreference7relation = '';  //$row_creditapp_id_did['applicants_realative7_relationship'];
		
		$appreference8lname = '';  //$row_creditapp_id_did['applicants_realative8_lname'];
		$appreference8fname = '';  //$row_creditapp_id_did['applicants_realative8_fname'];
		$appreference8addr1 = '';  //$row_creditapp_id_did['applicants_realative8_address'];
		$appreference8city = '';  //$row_creditapp_id_did['applicants_realative8_city'];
		$appreference8state = '';  //$row_creditapp_id_did['applicants_realative8_state'];
		$appreference8zip = '';  //$row_creditapp_id_did['applicants_realative8_zip'];
		$appreference8phoneno = '';  //$row_creditapp_id_did['applicants_realative8_mainphone'];
		$appreference8relation = '';  //$row_creditapp_id_did['applicants_realative8_relationship'];
		
		$appreference9lname = '';  //$row_creditapp_id_did['applicants_realative9_lname'];
		$appreference9fname = '';  //$row_creditapp_id_did['applicants_realative9_fname'];
		$appreference9addr1 = '';  //$row_creditapp_id_did['applicants_realative9_address'];
		$appreference9city = '';  //$row_creditapp_id_did['applicants_realative9_city'];
		$appreference9state = '';  //$row_creditapp_id_did['applicants_realative9_state'];
		$appreference9zip = '';  //$row_creditapp_id_did['applicants_realative9_zip'];
		$appreference9phoneno = '';  //$row_creditapp_id_did['applicants_realative9_mainphone'];
		$appreference9relation = '';  //$row_creditapp_id_did['applicants_realative9_relationship'];
		
		$appreference10lname = '';  //$row_creditapp_id_did['applicants_realative10_lname'];
		$appreference10fname = '';  //$row_creditapp_id_did['applicants_realative10_fname'];
		$appreference10addr1 = '';  //$row_creditapp_id_did['applicants_realative10_address'];
		$appreference10city = '';  //$row_creditapp_id_did['applicants_realative10_city'];
		$appreference10state = '';  //$row_creditapp_id_did['applicants_realative10_state'];
		$appreference10zip = '';  //$row_creditapp_id_did['applicants_realative10_zip'];
		$appreference10phoneno = '';  //$row_creditapp_id_did['applicants_realative10_mainphone'];
		$appreference10relation = '';  //$row_creditapp_id_did['applicants_realative10_relationship'];
		
		
		$bankrptcyindicator = '';  //'Bankruptcy Yes';
		$bankruptcydate = '';  //'10-2005';
		$reposessiondate = '';  //'11-1-2009';

$appincomedisclaimer = 'Alimony, child support, or seperate maintenance income need not be revealed if you do not wish to have it';
$appincomedisclaimer2 = 'considered as a basis for repaying this obligation.';

$appdigitalsignature = '';  //$row_creditapp_id_did['applicant_digital_signature'];
$appdigitalsignaturedate = '';  //$row_creditapp_id_did['applicant_digital_signature_date'];


?>