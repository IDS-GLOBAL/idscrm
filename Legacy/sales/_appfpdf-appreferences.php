<?php
$pdf->AddPage();


/*
 * Row 1 
 */


$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,"Credit Application: References", 0,1,'L');

//Reference1 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference1:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appnearelativefname, 0,0,'L');
	$pdf->Cell(60,-4,$appnearelativelname, 0,0,'L');
	$pdf->Cell(40,-4,$appnearelativephoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appnearelativerelation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                                              City,                                      State,                                   Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(60,-4,$appnearelativeaddr1, 0,0,'L');
	$pdf->Cell(50,-4,$appnearelativeaddr2, 0,0,'L');
	$pdf->Cell(40,-4,$appnearelativecity, 0,0,'L');
	$pdf->Cell(20,-4,$appnearelativestate, 0,0,'L');
	$pdf->Cell(20,-4,$appnearelativezip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference1 End










//Reference2 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference2:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference2fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference2lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference2phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference2relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference2addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference2addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference2city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference2state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference2zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference2 End













//Reference3 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference3:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference3fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference3lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference3phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference3relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference3addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference3addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference3city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference3state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference3zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference3 End














//Reference4 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference4:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference4fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference4lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference4phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference4relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference4addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference4addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference4city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference4state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference4zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference4 End


















//Reference5 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference5:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference5fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference5lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference5phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference5relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference5addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference5addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference5city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference5state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference5zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference5 End














//Reference6 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference6:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference6fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference6lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference6phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference6relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference6addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference6addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference6city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference6state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference6zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference6 End















//Reference7 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference7:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference3fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference7lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference7phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference7relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference7addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference7addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference7city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference7state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference7zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference7 End


















//Reference8 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference8:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference8fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference8lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference8phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference8relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);
	$pdf->Cell(100,-4,$appreference8addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference8addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference8city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference8state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference8zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference8 End






//Reference9 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference9:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference9fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference9lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference9phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference9relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference9addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference9addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference9city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference9state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference9zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference9 End



















//Reference10 Start
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(195,3,'Reference10:', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'First Name                                                             Last Name,                                                                     Phone                                        Relationship', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(50,-4,$appreference10fname, 0,0,'L');
	$pdf->Cell(60,-4,$appreference10lname, 0,0,'L');
	$pdf->Cell(40,-4,$appreference10phoneno, 0,0,'L');
	$pdf->Cell(40,-4,$appreference10relation, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(195,7,'', 1,1,'L');

$pdf->Cell(1,-10,'Address                                                                                                                                      City,                           State,                                 Zip,', 0,0,'L');

	$pdf->SetFont('Courier','',10);

	$pdf->Cell(100,-4,$appreference3addr1, 0,0,'L');
	//$pdf->Cell(50,-4,$appreference3addr2, 0,0,'L');
	$pdf->Cell(40,-4,$appreference3city, 0,0,'L');
	$pdf->Cell(20,-4,$appreference3state, 0,0,'L');
	$pdf->Cell(20,-4,$appreference3zip, 0,0,'L');
	
$pdf->Cell(15,1,'', 0,1,'L');

//Reference10 End


?>