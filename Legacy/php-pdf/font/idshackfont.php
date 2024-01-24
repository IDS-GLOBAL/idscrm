<?php 


	//http://www.fpdf.org/makefont/index.php
	//Follow the link to make it add a php and z file into the font directory.
	
	$pdf->AddFont('BPdots','','BPdots.php');
	$pdf->AddFont('BPdotsCondensedDiamond','','BPdotsCondensedDiamond.php');

	$pdf->SetFont('BPdotsCondensedDiamond','',15);
	$pdf->Cell(10,7,'ACV', 1,0,'L');
	$pdf->Cell(45,7,'dYNAMIC acv', 1,0,'L');



?>