<?php include("db_loggedin.php"); ?>
<?php






$dealer_company = $row_userDets['company'];
$dealer_address = $row_userDets['address'];


$dealer_city = $row_userDets['city'];
$dealer_state = $row_userDets['state'];

$dealer_zip = $row_userDets['zip'];

$dealer_url = $row_userDets['website'];

$dealer_infoblocktxt = $dealer_company.'<br />'.$dealer_address.' <br />'. $dealer_city .' , '. $dealer_state .' '. $dealer_zip .'';

$dealer_infolinetxt = $dealer_address.' '. $dealer_city .' , '. $dealer_state .' '. $dealer_zip .'';


if(!$row_find_vehicle['vid'])  header("Location: inventory.php");


$foundtoken = $row_find_vehicle['vtoken'];


$vid = $row_find_vehicle['vid'];




$vyear = $row_find_vehicle['vyear'];
$vmake = strtoupper($row_find_vehicle['vmake']);
$vmodel = strtoupper($row_find_vehicle['vmodel']);
$vtrim = strtoupper($row_find_vehicle['vtrim']);
$vstock = strtoupper($row_find_vehicle['vstockno']);
$vvin = strtoupper($row_find_vehicle['vvin']);

$vtext = $vyear.' '.$vmake.' '.$vmodel.' '.$vtrim;


$X = strtoupper('X');


require_once('../tcpdf/tcpdf.php');


$Today=date('y:m:d');

// add 3 days to date
$NewDate=Date('m-d-Y', strtotime("+3 days"));


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'centrallogo.png';
		
		//$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		//$this->Cell(0, 15, 'Buyers Guide', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		//$this->Cell(0, 15, "foundtoken", 0, false, 'L', 0, '', 0, false, 'M', 'M');

	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('IDSCRM');
//$pdf->SetTitle('TCPDF Example 003');
$pdf->SetTitle('Buyers Guide');
$pdf->SetSubject('PDF Paperwork');
$pdf->SetKeywords('Buyers Guide, PDF, buyers, warranty, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(1, 0, 2, true);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
?>
<?php
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

/*     */
// add a page
$pdf->AddPage();



// Set BackGround Image For Buyers Guide
$mycoder = '<div>
<img src="../tcpdf/examples/images/Buyer+Guide+Front.jpg" alt="test alt attribute" width="2480px" height="3229px" border="0" />

</div>';
// output the HTML content
$pdf->writeHTML($mycoder, true, false, true, false, 'L');



// SET MAKE ON ONE LINE
$pdf->setPageMark();
$pdf->SetXY(14,38); 
// set some text to print
$mytxt = <<<EOD
$vmake                      

EOD;
// print a block of text using Write()
$pdf->Write(0, $mytxt, '', 0, 'L', true, 0, false, false, 0);








// SET MODEL ON ONE LINE
$pdf->setPageMark();
$pdf->SetXY(14,38); 
// set some text to print
$mytxt = <<<EOD
                                    $vmodel                              

EOD;
// print a block of text using Write()
$pdf->Write(0, $mytxt, '', 0, 'L', true, 0, false, false, 0);







// SET YEAR ON ONE LINE
$pdf->setPageMark();
$pdf->SetXY(14,38); 
// set some text to print
$mytxt = <<<EOD
                                                                       $vyear                         

EOD;
// print a block of text using Write()
$pdf->Write(0, $mytxt, '', 0, 'L', true, 0, false, false, 0);






// SET VIN ON ONE LINE
$pdf->setPageMark();
$pdf->SetXY(14,38); 
// set some text to print
$myvintxt = <<<EOD
                                                                                                 $vvin

EOD;
// print a block of text using Write()
$pdf->Write(0, $myvintxt, '', 0, 'L', true, 0, false, false, 0);








$pdf->setPageMark();
$pdf->SetXY(14,48); 
// set some text to print
$mystocktxt = <<<EOD
$vstock

EOD;
// print a block of text using Write()
$pdf->Write(0, $mystocktxt, '', 0, 'L', true, 0, false, false, 0);



$pdf->setPageMark();
$pdf->SetXY(117,46); 
// set some text to print
$mydlrtxt = <<<EOD
$dealer_company

EOD;
// print a block of text using Write()
// print a block of text using Write()
$pdf->Write(0,$mydlrtxt, '', 0, 'L', true, 0, false, false, 0);


$pdf->setPageMark();
$pdf->SetXY(117,51); 
// set some text to print
$mydlrtxt = <<<EOD
$dealer_address
EOD;
// print a block of text using Write()
// print a block of text using Write()
$pdf->Write(0,$mydlrtxt, '', 0, 'L', true, 0, false, false, 0);


$pdf->setPageMark();
$pdf->SetXY(117,56); 
// set some text to print
$mydlrtxt = <<<EOD
$dealer_city, $dealer_state $dealer_zip
EOD;
// print a block of text using Write()
// print a block of text using Write()
$pdf->Write(0,$mydlrtxt, '', 0, 'L', true, 0, false, false, 0);




$pdf->setPageMark();
$pdf->SetXY(117,60); 
// set some text to print
$mydlrtxt = <<<EOD
$dealer_url
EOD;
// print a block of text using Write()
// print a block of text using Write()
$pdf->Write(0,$mydlrtxt, '', 0, 'L', true, 0, false, false, 0);




$pdf->setPageMark();
$pdf->SetXY(25,75); 
// set some text to print
$mytxt = <<<EOD
$X
EOD;
// print a block of text using Write()
// $pdf->Write(0, $mytxt, '', 0, 'L', true, 0, false, false, 0);






// add a page
$pdf->AddPage();

$backbuyersguide = '<div style="text-align:center">
<img src="../tcpdf/examples/images/Buyer+Guide+Back.jpg" alt="test alt attribute" width="2480px" height="3229px" border="0" />

</div>';

// set some text to print
$dlrtxt = <<<EOD
 $company 



EOD;

// output the HTML content
$pdf->writeHTML($backbuyersguide, true, false, true, false, '');


$pdf->setPageMark();
// print a block of text using Write()
$pdf->SetXY(14,187); 
$pdf->Write(0, $dlrtxt, '', 0, 'L', true, 0, false, false, 0);


$dealerinfotxt = "$dealer_infolinetxt";

$pdf->SetXY(14,196); 
// print a block of text using Write()
$pdf->Write(0, $dealerinfotxt, '', 0, 'L', true, 0, false, false, 0);



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output("buyers_guide".$foundtoken.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>