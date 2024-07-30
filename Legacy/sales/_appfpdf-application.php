<?php
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



$pdf->Cell(1,-10,'Home Phone:                                           Cellular Phone:                                        Primary Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$apphomephno, 0,0,'L');
$pdf->Cell(50,-4,$appcellphno, 0,0,'L');
$pdf->Cell(30,-4,$appemail, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 7
*/


/*
$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Eudcation:                                                           No. of Dependents:                                                       Primary Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$appeducation, 0,0,'L');
$pdf->Cell(60,-4,$appnodepndts, 0,0,'L');
$pdf->Cell(30,-4,$appemail, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');


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



$pdf->Cell(1,-10,'Occupation Title:                           Employment Status:                                         Employment Type:                                       Time On Job | Years/Months:', 0,0,'L');


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



$pdf->Cell(1,-10,'Previous Employer Name:                           Previous Occupation/Title:                        Prev. Employer Phone Number:             Time On Previous Job | Years/Months:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$coappemployer2nm, 0,0,'L');
$pdf->Cell(45,-4,$coappemployer2title, 0,0,'L');
$pdf->Cell(40,-4,$coappemployer2phno, 0,0,'L');
$pdf->Cell(20,-4,$coappemployer2wkyrs, 0,0,'L');
$pdf->Cell(25,-4,$coappemployer2wkmos, 0,0,'L');

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
	//$pdf->Cell(15,4,'_______', 0 ,0 ,'L');
	$pdf->Cell(15,11,'', 0 ,0 ,'L');
	
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
	//$pdf->Cell(15,4,'_______', 0 ,0 ,'L');
	$pdf->Cell(15,11,'', 0 ,0 ,'L');
	
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
	
	if(!$appdigitalsignature){

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(120,20,'___________________________________________________________', 0,0,'L');
		
		
		}else{
			
			$pdf->SetFont('Arial','U',10);
			$pdf->Cell(120,20,$appdigitalsignature, 0,0,'L');
			
			}



$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,'Date: ', 0,0,'L');

	if(!$appdigitalsignaturedate){

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(40,20,'_______________', 0,0,'L');
		
		
		}else{
			

			$pdf->SetFont('Arial','U',10);
			$pdf->Cell(40,20,$appdigitalsignaturedate, 0,1,'L');
			
			}

?>