<?php
require('fpdf.php');


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Hello World! Welcome To PHP To PDF');
	
	// Line break
	$pdf->Ln(10);

$pdf->Cell(40,10,'Powered by FPDF.',0,1,'C');

	// Line break
	$pdf->Ln(0);


$pdf->Cell(59,10,'Really Powered by FPDF.',0,1,'C');

	// Line break
	$pdf->Ln(10);

$pdf->Cell(40,10,'Populate Credit Application Data onto this page');


$pdf->Output();
//$pdf->Output('Test-pdf.pdf');

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PHP To PDF</title>
</head>

<body>
</body>
</html>