<?php
require('functions_pdf-sales-inc.php');

require('../dealer/fpdf-BuyersGuide.php');

class myPDF extends FPDF {



	public $title = "Auto Loan Credit Application";
	public $appdate = '10-25-2015';
	
	//Page header method

	function Header() {



		$this->SetFont('Times','B',12);

		$w = $this->GetStringWidth($this->title)+138;

		$this->SetDrawColor(0,0,0);

		$this->SetFillColor(255,255,255);

		$this->SetTextColor(0,0,0);

		$this->SetLineWidth(1);

		$this->Cell($w,9,$this->title,1,1,'C',1);

		//$this->Cell($w,9,$this->tkey2,1,1,'C',1);

		$this->Ln(5);



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
 


/*
 * Primary Applicant Standalone
*/
	
	 include("../dealer/_appfpdf-application.php");




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


	if(!$appjointorindividual){
	
	 	include("../dealer/_appfpdf-appprimaryapplicantsignature.php");
		
	}else{
		
		include("../dealer/_appfpdf-coapplication.php");
		
		include("../dealer/_appfpdf-appcoapplicantsignature.php");

		}




	 	include("../dealer/_appfpdf-appreferences.php");









//Emds Everything by displaying it to the browser.
$pdf->Output();


?>
