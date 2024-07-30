<?php
$pdf->AddPage();


/*
 * Row 1 
 */


$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Credit Application: Co-Applicant', 0,1,'L');

	if(!$coappfullnamefml){

		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(190,7,'Title', 1,1,'L');
		
		$pdf->Cell(15,-4,'(Optional)', 0,0,'L');
		
		$pdf->Cell(1,-10,"Last Name:                                       First Name:                                  Initial:                             Suffix:                    Date Of Birth:   $coappage              Soc. Sec. # :", 0,0,'L');
		
		
		$pdf->SetFont('Courier','',10);
		$pdf->Cell(40,-4,$coappfulltitlename.$coapplname, 0,0,'L');
		$pdf->Cell(30,-4,$coappfname, 0,0,'L');
		$pdf->Cell(25,-4,$coappmname, 0,0,'L');
		$pdf->Cell(25,-4,$coappsuffix, 0,0,'L');
		$pdf->Cell(25,-4,$coappdob, 0,0,'L');
		$pdf->Cell(30,-4,$coappsocial, 0,0,'L');
		if(!$coappsocial2){
			
			}else{
				$pdf->Cell(30,-4,$coappsocial2, 0,0,'L');
				}


		$pdf->Cell(15,1,'', 0,1,'L');
	
	}else{

		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(190,7,'Title', 1,1,'L');
		
		$pdf->Cell(15,-4,'(Optional)', 0,0,'L');
		
		$pdf->Cell(1,-10,"First Name:      Middle Name:        Last Name:      Suffix:                                                Date Of Birth:  $coappage                Soc. Sec. # w/ Last 4:", 0,0,'L');
		
		
		$pdf->SetFont('Courier','',10);
		$pdf->Cell(70,-4,$coappfulltitlename.$coappfullnamefml, 0,0,'L');
		$pdf->Cell(25,-4,$coappsuffix, 0,0,'L');
		$pdf->Cell(30,-4,$coappdob, 0,0,'L');
		if(!$coappsocial2){
					$pdf->Cell(20,-4,$coappsocial, 0,0,'L');
				}else{
					$pdf->Cell(17,-4,$coappsocial, 0,0,'L');
					$pdf->Cell(5,-4,$coappsocial2, 0,0,'L');
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
$pdf->Cell(75,-4,$coappaddrs, 0,0,'L');
$pdf->Cell(20,-4,$coappaddrslyrs, 0,0,'L');
$pdf->Cell(40,-4,$coappaddrslmos, 0,0,'L');
$pdf->Cell(20,-4,$coappdriverlcno, 0,0,'L');
$pdf->Cell(15,-4,' / '.$coappdriverlcst, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 3
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Present Address Line 2:                                           City:                                           County:                           State:                                  ZIP:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$coappaddrs2, 0,0,'L');
$pdf->Cell(40,-4,$coappcity, 0,0,'L');
$pdf->Cell(30,-4,$coappcounty, 0,0,'L');
$pdf->Cell(30,-4,$coappstate, 0,0,'L');
$pdf->Cell(15,-4,$coappzip, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 4
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous Address Line 1:                                                Previous Address 2:                                                  Time At Previous Address | Years/Months:     ', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(70,-4,$coappprevaddr, 0,0,'L');
$pdf->Cell(50,-4,$coappprevaddr2, 0,0,'L');
$pdf->Cell(30,-4,$coappprevaddrlyrs, 0,0,'L');
$pdf->Cell(30,-4,$coappprevaddrlmos, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 5
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous  City:                                   Previous County:                       Previous State:                                      Previous ZIP:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$coappprevaddrcity, 0,0,'L');
$pdf->Cell(40,-4,$coappprevaddrcounty, 0,0,'L');
$pdf->Cell(40,-4,$coappprevaddrstate, 0,0,'L');
$pdf->Cell(15,-4,$coappzip, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');



/*
 * Row 6
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Home Phone:                                           Cellular Phone:                                        Primary Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$coapphomephno, 0,0,'L');
$pdf->Cell(50,-4,$coappcellphno, 0,0,'L');
$pdf->Cell(30,-4,$coappemail, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 7
*/


/*
$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Eudcation:                                                           No. of Dependents:                                                       Primary Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$coappeducation, 0,0,'L');
$pdf->Cell(60,-4,$coappnodepndts, 0,0,'L');
$pdf->Cell(30,-4,$coappemail, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');


 * Row 8
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Current Employer:                                                        Current Employer Address:                                          Current Employer Address2:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$coappemployernm, 0,0,'L');
$pdf->Cell(60,-4,$coappemployeraddr, 0,0,'L');
$pdf->Cell(30,-4,$coappemployeraddr2 , 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');

/*
 * Row 9
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Current Employer City:                            Current Employer State:                       Current  Employer Zip:             Business Email Address:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(60,-4,$coappemployercity, 0,0,'L');
$pdf->Cell(40,-4,$coappemployerst, 0,0,'L');
$pdf->Cell(10,-4,$coappemployerzip , 0,0,'L');
$pdf->Cell(30,-4,$coappbusinessemail , 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');

/*
 * Row 9
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Occupation Title:                           Employment Status:                                         Employment Type:                                       Time On Job | Years/Months:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(40,-4,$coappworktitle, 0,0,'L');
$pdf->Cell(45,-4,$coappworkstatus, 0,0,'L');
$pdf->Cell(55,-4,$coappworktype, 0,0,'L');
$pdf->Cell(15,-4,$coappemployerwkyrs, 0,0,'L');
$pdf->Cell(15,-4,$coappemployerwkmos, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');


/*
 * Row 10
*/


$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Work Phone Number & Ext:                  Department:                                 Supervisor:                                      Supervisor Phone:                        Hours/Shift: ', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(30,-4,$coappemployerphno, 0,0,'L');
$pdf->Cell(10,-4,$coappemployerext, 0,0,'L');
$pdf->Cell(40,-4,$coappemployerdept, 0,0,'L');
$pdf->Cell(40,-4,$coappemployersupervisr, 0,0,'L');
$pdf->Cell(40,-4,$coappemployersupervisrphn, 0,0,'L');
$pdf->Cell(25,-4,$coappemployerhrshft, 0,0,'L');


$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 11
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Previous Employer Name:                           Previous Occupation/Title:                Prev. Employer Phone Number:                       Time On Previous Job | Years/Months:', 0,0,'L');


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
$pdf->Cell(60,-4,$coappemployer2addr, 0,0,'L');
$pdf->Cell(60,-4,$coappemployer2addr2, 0,0,'L');
$pdf->Cell(30,-4,$coappemployer2city, 0,0,'L');
$pdf->Cell(25,-4,$coappemployer2state, 0,0,'L');
$pdf->Cell(25,-4,$coappemployer2zip, 0,0,'L');

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
$pdf->Cell(30,-4,$coappgrossincome, 0,0,'L');
$pdf->Cell(30,-4,$coappgrossincomefreq, 0,0,'L');
$pdf->Cell(45,-4,$coappotherincomesrc, 0,0,'L');
$pdf->Cell(35,-4,$coappotherincome, 0,0,'L');
$pdf->Cell(25,-4,$coappalimonyamount, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 15
*/

$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Land Lord/Mortage Company:                                         Mortgage Phone Number:                      Residence Type:                               Monthly Rent/Mortage Payment:', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(70,-4,$coapplandlordname, 0,0,'L');
$pdf->Cell(40,-4,$coapplandlordphonno, 0,0,'L');
$pdf->Cell(60,-4,$coappresidencetype, 0,0,'L');
$pdf->Cell(30,-4,$coapprentmortpymt, 0,0,'L');

$pdf->Cell(15,1,'', 0,1,'L');



/*
 * Row 16
*/



$pdf->SetFont('Arial','B',7);
$pdf->Cell(190,7,'', 1,1,'L');



$pdf->Cell(1,-10,'Last Auto Loan Company Name:                  Primary Personal Bank Name:                                               Checking Or Savings: ', 0,0,'L');


$pdf->SetFont('Courier','',10);
$pdf->Cell(50,-4,$coappautoloan, 0,0,'L');
$pdf->Cell(60,-4,$coappbankname, 0,0,'L');


	$pdf->Cell(30,-4,$coappbankacctype, 0,0,'L');



$pdf->Cell(15,1,'', 0,1,'L');




/*
 * Row 17
*/

$pdf->Cell(15,4,'', 0 ,1 ,'L');

		if(!$coappauthorizeinitial){

	
	$pdf->SetFont('Arial','',7);
	//$pdf->Cell(15,4,'_______', 0 ,0 ,'L');
	$pdf->Cell(15,11,'', 0 ,0 ,'L');
	
	}else {
	
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(15,4,$coappauthorizeinitial, 0 ,0 ,'L');
	}
	
	$pdf->SetFont('Arial','',7);

$pdf->Cell(40,4,'The undersigned hereby authorizes selling dealer to initiate a credit investigation based upon the following information, which information has been voluntarily', 0 ,2 ,'L');
$pdf->Cell(40,4,'provided by myself and warrants the truth and accuracy of this information.  The undersigned further warrants that a bankruptcy proceeding is neither presently',0 ,2 ,'L');
$pdf->Cell(40,4,'in progress nor anticipated and acknowledges receipt of this credit application.',0 ,2 ,'L');
$pdf->Cell(40,3,' ', 0,1,'L');


/*
 * Row 18
*/


	if(!$coappequalcreditact){

	$pdf->SetFont('Arial','',7);
	//$pdf->Cell(15,4,'_______', 0 ,0 ,'L');
	$pdf->Cell(15,11,'', 0 ,0 ,'L');
	
	}else {
	
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(15,4,$coappequalcreditact, 0 ,0 ,'L');
	
	
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
	
	if(!$coappdigitalsignature){

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(120,20,'___________________________________________________________', 0,0,'L');
		
		
		}else{
			
			$pdf->SetFont('Arial','U',10);
			$pdf->Cell(120,20,$coappdigitalsignature, 0,0,'L');
			
			}



$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,'Date: ', 0,0,'L');

	if(!$coappdigitalsignaturedate){

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(40,20,'_______________', 0,0,'L');
		
		
		}else{
			

			$pdf->SetFont('Arial','U',10);
			$pdf->Cell(40,20,$coappdigitalsignaturedate, 0,1,'L');
			
			}


?>