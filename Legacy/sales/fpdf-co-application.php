<?php include('function_pdf_dbconnect.php'); ?>
<?php

require('fpdf.php');

class myPDF extends FPDF {



	public $title = "Online Auto Loan Credit Application";
	public $appdate = '10-25-2015';
	public $apptoken = 'ADFAJH42323KJHLJH4';

	public $appmname = 'MiddleName';
	public $appsuffix = 'SuffixName';
	public $appdob = '1-23-1970';
	public $appsocial = '425-77-1111';
	public $appaddrs = '123 Sylvia St';
	public $appaddrslyrs = '24 Years';
	public $appaddrslmos = '0 Months';
	public $appdriverlcno = '00854698';
	public $appdriverlcst = 'MS';
	
	//Page header method

	function Header() {



		$this->SetFont('Times','',12);

		$w = $this->GetStringWidth($this->title)+120;

		$this->SetDrawColor(0,0,180);

		$this->SetFillColor(170,169,148);

		$this->SetTextColor(0,0,255);

		$this->SetLineWidth(1);

		$this->Cell($w,9,$this->title,1,1,'C',1);

		$this->Ln(10);



	}



	//Page footer method

	function Footer()       {

		//Position at 1.5 cm from bottom

		$this->SetY(-15);

		$this->SetFont('Arial','I',8);

		//$this->Cell(0,0,$this->apptoken, 0 ,0 ,'L');
		
		$this->Cell(0,10,'Application Page '

				.$this->PageNo().'/{nb}',0,0,'C');
	
		
		//$this->Cell(0,10,'Date: '.$this->appdate, 0 ,2 ,'R');
		$this->Cell(0,10,'Standard Credit Application Document ', 0 ,2 ,'R');

	}



}


$pdf = new myPDF('P', 'mm', 'Letter');

$pdf->AliasNbPages();


/*
 * This is Applicant information
 * Explode Defined variables from url paramater
 * Before String ie. Cell(40 = how long the cell is
 * Before String ie. cell(40,9 = space up an down cell spacing.
 * After title the first digit is for border
 * Second digit is break down a line
 * Third Alphabet is for word alignment 
 */ 
 



$pdf->AddPage();


/*
 * Row 1 
 */


$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Credit Application: Applicant Primary', 0,1,'L');

	if(!$appfullnamefml){

		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(190,7,'Title', 1,1,'L');
		
		$pdf->Cell(15,-4,'(Optional)', 0,0,'L');
		
		$pdf->Cell(1,-10,"Last Name:                                       First Name:                                  Initial:                             Suffix:                    Date Of Birth:   $appage              Soc. Sec. # :", 0,0,'L');
		
		
		$pdf->SetFont('Courier','',10);
		$pdf->Cell(40,-4,$appfulltitlename.$applname, 0,0,'L');
		$pdf->Cell(30,-4,$appfname, 0,0,'L');
		$pdf->Cell(25,-4,$appmname, 0,0,'L');
		$pdf->Cell(25,-4,$appsuffix, 0,0,'L');
		$pdf->Cell(25,-4,$appdob, 0,0,'L');
		$pdf->Cell(30,-4,$appsocial, 0,0,'L');
		if(!$appsocial2){}else{$pdf->Cell(30,-4,$appsocial2, 0,0,'L');}


		$pdf->Cell(15,1,'', 0,1,'L');
	
	}else{

		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(190,7,'Title', 1,1,'L');
		
		$pdf->Cell(15,-4,'(Optional)', 0,0,'L');
		
		$pdf->Cell(1,-10,"First Name:      Middle Name:        Last Name:      Suffix:                                                Date Of Birth:  $appage                Soc. Sec. # w/ Last 4:", 0,0,'L');
		
		
		$pdf->SetFont('Courier','',10);
		$pdf->Cell(70,-4,$appfulltitlename.$appfullnamefml, 0,0,'L');
		$pdf->Cell(25,-4,$appsuffix, 0,0,'L');
		$pdf->Cell(30,-4,$appdob, 0,0,'L');
		if(!$appsocial2){
					$pdf->Cell(20,-4,$appsocial, 0,0,'L');
				}else{
					$pdf->Cell(17,-4,$appsocial, 0,0,'L');
					$pdf->Cell(5,-4,$appsocial2, 0,0,'L');
					}

		$pdf->Cell(15,1,'', 0,1,'L');
}




/*
 * Row 2
*/




$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Present Address Line 1:                                                                      Time At Present Address:                                           Drivers License # / State:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(75,-4,$appaddrs, 0,0,'L');
$pdf->Cell(20,-4,$appaddrslyrs, 0,0,'L');
$pdf->Cell(40,-4,$appaddrslmos, 0,0,'L');
$pdf->Cell(20,-4,$appdriverlcno, 0,0,'L');
$pdf->Cell(15,-4,' / '.$appdriverlcst, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 3
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Present Address Line 2:                                           City:                                           County:                           State:                                  ZIP:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$appaddr2, 0,0,'L');
$pdf->Cell(40,-4,$appcity, 0,0,'L');
$pdf->Cell(30,-4,$appcounty, 0,0,'L');
$pdf->Cell(30,-4,$appstate, 0,0,'L');
$pdf->Cell(15,-4,$appzip, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 4
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous Address Line 1:                                                Previous Address 2:                                                  Time At Previous Address | Years/Months:     ', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(70,-4,$appprevaddr, 0,0,'L');
$pdf->Cell(50,-4,$appprevaddr2, 0,0,'L');
$pdf->Cell(30,-4,$appprevaddrlyrs, 0,0,'L');
$pdf->Cell(30,-4,$appprevaddrlmos, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 5
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous  City:                                   Previous County:                       Previous State:                                      Previous ZIP:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$appprevaddrcity, 0,0,'L');
$pdf->Cell(40,-4,$appprevaddrcounty, 0,0,'L');
$pdf->Cell(40,-4,$appprevaddrstate, 0,0,'L');
$pdf->Cell(15,-4,$appzip, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');



/*
 * Row 6
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Home Phone:                                           Cellular Phone:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$apphomephno, 0,0,'L');
$pdf->Cell(45,-4,$appcellphno, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 7
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Eudcation:                                                           No. of Dependents:                                                       Primary Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$appeducation, 0,0,'L');
$pdf->Cell(60,-4,$appnodepndts, 0,0,'L');
$pdf->Cell(30,-4,$appemail, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');

/*
 * Row 8
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Current Employer:                                                        Current Employer Address:                                          Current Employer Address2:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$appemployernm, 0,0,'L');
$pdf->Cell(60,-4,$appemployeraddr, 0,0,'L');
$pdf->Cell(30,-4,$appemployeraddr2 , 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');

/*
 * Row 9
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Current Employer City:                            Current Employer State:                       Current  Employer Zip:             Business Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$appemployercity, 0,0,'L');
$pdf->Cell(40,-4,$appemployerst, 0,0,'L');
$pdf->Cell(10,-4,$appemployerzip , 0,0,'L');
$pdf->Cell(30,-4,$appbusinessemail , 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');

/*
 * Row 9
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Occupation Title                           Employment Status:                                         Employment Type:                                       Time On Job | Years/Months:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$appworktitle, 0,0,'L');
$pdf->Cell(45,-4,$appworkstatus, 0,0,'L');
$pdf->Cell(55,-4,$appworktype, 0,0,'L');
$pdf->Cell(15,-4,$appemployerwkyrs, 0,0,'L');
$pdf->Cell(15,-4,$appemployerwkmos, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 10
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Work Phone Number & Ext:                  Department:                                 Supervisor:                                      Supervisor Phone:                        Hours/Shift: ', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(30,-4,$appemployerphno, 0,0,'L');
$pdf->Cell(10,-4,$appemployerext, 0,0,'L');
$pdf->Cell(40,-4,$appemployerdept, 0,0,'L');
$pdf->Cell(40,-4,$appemployersupervisr, 0,0,'L');
$pdf->Cell(40,-4,$appemployersupervisrphn, 0,0,'L');
$pdf->Cell(25,-4,$appemployerhrshft, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 11
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous Employer Name:                           Previous Occupation/Title:                Prev. Employer Phone Number:                       Time On Previous Job | Years/Months:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$appemployer2nm, 0,0,'L');
$pdf->Cell(45,-4,$appemployer2title, 0,0,'L');
$pdf->Cell(50,-4,$appemployer2phno, 0,0,'L');
$pdf->Cell(20,-4,$appemployer2wkyrs, 0,0,'L');
$pdf->Cell(25,-4,$appemployer2wkmos, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');



/*
 * Row 12
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous Employer Address1:                                    Previous Employer Address2:                                        City:                                      State:                          Zip:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$appemployer2addr, 0,0,'L');
$pdf->Cell(60,-4,$appemployer2addr2, 0,0,'L');
$pdf->Cell(30,-4,$appemployer2city, 0,0,'L');
$pdf->Cell(25,-4,$appemployer2state, 0,0,'L');
$pdf->Cell(25,-4,$appemployer2zip, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 13
*/


$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'Alimony, child support or seperate maintenance income need not to be revealed if you do not wish to have it ', 1,1,'L');
$pdf->Cell(190,-4,'considred as a basis for repaying this obligation.', 0,1,'L');
$pdf->Cell(15,5,'', 0,1,'L');



/*
 * Row 14
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Gross Income:              Income Pay Schedule:             Other Income Source:             Other Income Amount:             Monthly Support/Alimony Received:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(30,-4,$appgrossincome, 0,0,'L');
$pdf->Cell(30,-4,$appgrossincomefreq, 0,0,'L');
$pdf->Cell(45,-4,$appotherincomesrc, 0,0,'L');
$pdf->Cell(35,-4,$appotherincome, 0,0,'L');
$pdf->Cell(25,-4,$appalimonyamount, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 15
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Land Lord/Mortage Company:                                         Mortgage Phone Number:                      Residence Type:                               Monthly Rent/Mortage Payment:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(70,-4,$applandlordname, 0,0,'L');
$pdf->Cell(40,-4,$applandlordphonno, 0,0,'L');
$pdf->Cell(60,-4,$appresidencetype, 0,0,'L');
$pdf->Cell(30,-4,$apprentmortpymt, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');



/*
 * Row 16
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Last Auto Loan Company Name:                  Primary Personal Bank Name:                                               Checking Or Savings: ', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$appautoloan, 0,0,'L');
$pdf->Cell(60,-4,$appbankname, 0,0,'L');


	$pdf->Cell(30,-4,$appbankacctype, 0,0,'L');



$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 17
*/

$pdf->Cell(15,4,'', 0 ,1 ,'L');

		if(!$appauthorizeinitial){

	
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(15,4,'_______', 0 ,0 ,'L');
	
	}else {
	
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(15,4,$appauthorizeinitial, 0 ,0 ,'L');
	}
	
	$pdf->SetFont('Arial','',7);

$pdf->Cell(40,4,'The undersigned hereby authorizes selling dealer to initiate a credit investigation based upon the following information, which information has been voluntarily', 0 ,2 ,'L');
$pdf->Cell(40,4,'provided by myself and warrants the truth and accuracy of this information.  The undersigned further warrants that a bankruptcy proceeding is neither presently',0 ,2 ,'L');
$pdf->Cell(40,4,'in progress nor anticipated and acknowledges receipt of this credit application.',0 ,2 ,'L');
$pdf->Cell(40,3,' ', 0,1,'L');


/*
 * Row 18
*/


	if(!$appequalcreditact){

	$pdf->SetFont('Arial','',7);
	$pdf->Cell(15,4,'_______', 0 ,0 ,'L');
	
	}else {
	
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(15,4,$appequalcreditact, 0 ,0 ,'L');
	
	
	}

	$pdf->SetFont('Arial','',7);

$pdf->Cell(40,4,'The Federal Equal Credit Opportunity Act prohibits creditors from discriminating against credit applicants on the basis of race, color, religion, national origin, sex,', 0 ,2 ,'L');
$pdf->Cell(40,4,'marital status, age (provided that the applicant has the capacity to contrct); because all or part of the applicants income derives from any public assistance',0 ,2 ,'L');
$pdf->Cell(40,4,' program; or because the applicant has in good faith exercised any right under the Consumer Credit Protection Act.  The federal agency that administers ',0 ,2 ,'L');
$pdf->Cell(40,4,'compliance with this law concering this creditor is the Federal Trade Commission, Equal Credit Oppotunity, Washington, D.C. 20580.',0 ,2 ,'L');
$pdf->Cell(40,3,' ', 0,1,'L');




/*
 * Row 19
*/

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,20,'Digital Signature: ', 0,0,'L');

$pdf->SetFont('Arial','U',10);
$pdf->Cell(120,20,$appdigitalsignature, 0,0,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,'Date: ', 0,0,'L');

$pdf->SetFont('Arial','U',10);
$pdf->Cell(40,20,$appdigitalsignaturedate, 0,1,'L');













/*
 * Row 20
*/





/*
 * Row 21
*/






/*
 * Row 22
*/





/*
 * Row 23
*/





/*
 * Row 24
*/





/*
 * Row 25
*/





/*
 * Row 26
*/





/*
 * Row 27
*/





/*
 * Row 28
*/





/*
 * Row 29
*/





/*
 * Row 30
*/




/*
 * Row 30
*/






/*
 * This is Co-Applicant information
* Explode Defined variables from url paramater
*/

$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Credit Application: Co-Applicant', 0,1,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(90,10,'Beware the Ides of March!', 1,0,'C');





$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Credit Application', 0,1,'L');
$pdf->SetFont('Arial','',10);

$pdf->Cell(40,20,'This is an application joint credit with another person.', 0,1,'L');


$pdf->Cell(40,20,'We intend to apply for joint credit.', 0,1,'L');

$pdf->Cell(40,10,'Applicant: By    _____________________________________________Date______________________', 0,1,'L');
$pdf->Cell(40,10,'Co-Applicant: By ____________________________________________Date______________________', 0,1,'L');
$pdf->Cell(40,0,'_____________________________________________________________________________________________________', 0,1,'L');

$pdf->Cell(40,10,'You are applying for credit and information on this documents is evidence on what we are collecting and are relying on your ', 0,1,'L');
$pdf->Cell(50,0,'own income or assets and not the income or assets of another person as the basis for repayment of the credit requested.', 0,1,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,20,'By signing this application:', 0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,4,'I authorize dealer and any finance company, bank or other financial institution to which the Dealer submits my ', 0 ,2 ,'L');
$pdf->Cell(40,4,'application ("you")to investigate my credit and employment history, obtain credit reports, and release information ',0 ,2 ,'L');
$pdf->Cell(40,4,'about your credit experience with me as the law permits.',0 ,2 ,'L');
$pdf->Cell(40,3,' ', 0,1,'L');

$pdf->Cell(40,4,'If an account is created, I authorize you to obtain credit reports for the purpose of reviewing or taking collection action ', 0,1,'L');
$pdf->Cell(40,4,'on the account, or for other legitimate purposes associated with the acount. ', 0 ,1 ,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Monitoring, Recording, and Collection Communications',0 ,5 ,'L');


$pdf->SetFont('Arial','',10);
$pdf->Cell(40,4,'I agree that you, your affiliates, agents and service providers may monitor and record telphone calls regarding my ', 0,1,'L');
$pdf->Cell(40,4,'account to assure the quality of your service or for other reasons.  I also expressly consent and agree to you, you ',0 ,2 ,'L');
$pdf->Cell(40,4,'affilates, agents and service providers using written, electronicc or verbal means to contact me as the law allows. This',0 ,2 ,'L');
$pdf->Cell(40,4,'consent includes, but is not limited to, contact by manual clling methods, prerecorded or artficial oice messages, ',0 ,2 ,'L');
$pdf->Cell(40,4,'text messages, emails and/or automatic telephone dialing systems.  I agree you, your affiliates, agents and service ',0 ,2 ,'L');
$pdf->Cell(40,4,'providers may do so using any em-mail address or any telphone number I provided, no or in the future, including a ',0 ,2 ,'L');
$pdf->Cell(40,4,'number for acellular phone or other wireless device, regardless of whether I incur charges as a result.',0 ,2 ,'L');

$pdf->Cell(40,8,'I certify that I have read and agree to the terms of this application and that the information in it is complete and true.',0 ,2 ,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,4,'If you sign this credit application electronically, you intend that process to be your electronic signature on an',0 ,5 ,'L');
$pdf->Cell(40,4,'electronic application, acknowledge receipt of all disclosures provided on the credit application, and give ',0 ,5 ,'L');
$pdf->Cell(40,4,'your authorization and consent to the recipient(s) of this application to take the actions identified in the credit ',0 ,5 ,'L');
$pdf->Cell(40,4,'application.',0 ,5 ,'L');

$pdf->Cell(50,5,'',0 ,5 ,'L');
$pdf->Cell(50,8,'',0 ,5 ,'L');


$pdf->SetFont('Arial','U',12);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,0,'Credit Application Signature',0 ,5 ,'L');
$pdf->Cell(50,8,'',0 ,5 ,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,8,'Applicant: By       ____________________________________________Date______________________',0 ,5 ,'L');
$pdf->Cell(50,8,'',0 ,5 ,'L');
$pdf->Cell(50,8,'Co-Applicant: By ____________________________________________Date______________________',0 ,5 ,'L');






$pdf->Output();


?>
