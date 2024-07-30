<?php include('function_pdf_dbconnect.php'); ?>
<?php

require('fpdf.php');

class myPDF extends FPDF {



	public $title = "Online Auto Loan Credit Application";
	public $appdate = '10-25-2015';
	public $apptoken = 'ADFAJH42323KJHLJH4';
	public $tkey2 = "hh";
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

		//$this->Cell($w,9,$this->tkey2,1,1,'C',1);

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
 


/*
 * Primary Applicant Standalone
*/
	
	 include("_appfpdf-application.php");




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
	
	 	include("_appfpdf-appprimaryapplicantsignature.php");
		
	}else{
		
		include("_appfpdf-coapplication.php");
		
		include("_appfpdf-appcoapplicantsignature.php");

		}




	 	include("_appfpdf-appreferences.php");









//Emds Everything by displaying it to the browser.
$pdf->Output();


?>
